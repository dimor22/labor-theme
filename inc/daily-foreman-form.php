<?php
/**
 * HANDLE DAILY FOREMAN DAILY FORM
 */

/**
 *
 * Calculate hours worked from the format ['10:00'], ['14:00'], etc
 *
 * @param $break
 * @param $lunch
 *
 * @return array
 */


function break_time( $break, $lunch ) {
    $break_time  = $break;
    $lunch_time  = $lunch;
    $total_break = [];

    // break time
    // [a + b < 60], [a + b >= 60], [a + b >= 120]

    // [a + b < 60]
    if ( $break_time + $lunch_time < 60 ) {
        $total_break = [ '00', $break_time + $lunch_time ];
    }
    // [a + b >= 60]
    if ( ( $break_time + $lunch_time ) >= 120 ) {
        $total_break = [ '02', $break_time + $lunch_time - 120 ];
    }
    // [a + b >= 120]
    if ( ( $break_time + $lunch_time ) >= 60 ) {
        $total_break = [ '01', $break_time + $lunch_time - 60 ];
    }

    return $total_break;
}

function time_difference( $earlier, $older ) {

    $hours = 0;
    $min   = 0;

    //var_dump($earlier, $older);

    // minutes 3 options
    // [a == b], [a > b], [a < b]

    // [a == b]
    if ( $earlier[1] === $older[1] ) {
        $min = '00';
    }
    // [a > b]
    if ( $earlier[1] > $older[1] ) {
        if ( $older[1] > 0 ) {
            $min = $earlier[1] - $older[1];
        }
        $min = 60 - $earlier[1];
    }
    // [a < b]
    if ( $earlier[1] < $older[1] ) {
        $min = $older[1] - $earlier[1];
    }

    // hours
    $hours = $older[0] - $earlier[0];

    return [ $hours, $min ];
}

function cal_hours_worked( $start, $finish ) {
    $time1 = explode( ":", $start );
    $time2 = explode( ":", $finish );

    $total_time = time_difference( $time1, $time2 );

    $total_break = break_time( '15', '30' );

    $time_worked = time_difference( $total_break, $total_time );

    return implode( ':', $time_worked );
}

function foreman_daily_form_func() {

    global $wpdb;

    $form       = $_REQUEST['payload'];
    $fd         = []; // form data
    $errors     = [];
    $date_time  = current_time( 'mysql');

    foreach ( $form['formData'] as $field ) {
        $fd[ $field['name'] ] = $field['value'];
    }

    /**
     * Form data keys
     *
     * project-id           number
     * percentage-completed number
     * team-points          number
     *
     * user_field_x[user-id]            number
     * user_field_x[daily-points]       number
     * user_field_x[start-time]         time
     * user_field_x[break-time]         time
     * user_field_x[lunch-time]         time
     * user_field_x[finish-time]        time
     * user_field_x[leadership]         checkbox
     * user_field_x[leadership-notes]   text
     * user_field_x[trust]              checkbox
     * user_field_x[trust-notes]        text
     * user_field_x[safety]             checkbox
     * user_field_x[safety-notes]       text
     * user_field_x[quality]            checkbox
     * user_field_x[quality-notes]      text
     *
     * work-performed   text
     * jha              checkbox
     * hot-work-tomorrow    text
     * inspections      text
     * weather-sunny    checkbox
     * weather-windy    checkbox
     * weather-snowy    checkbox
     * weather-rainy    checkbox
     * equipment-used   text
     * tekla        checkbox
     * other-conditions text
     * tomorrows-plan   text
     * productivity     text
     * team-id          number
     *
     */
    $users = [];
    foreach ( $form['users'] as $userPrefix ) {
        foreach ( $fd as $field => $value ) {
            if ( strpos( $field, $userPrefix ) > - 1 ) {
                $clean_field_name                          = substr( $field, strlen( $userPrefix ) ); // removes prefix
                $clean_field_name                          = substr( $clean_field_name, 1, - 1 ); // removes "[" and "]"
                $users[ $userPrefix ][ $clean_field_name ] = $value;
            }
        }
    }


    // POST_META ( PROJECT_DAILY_FORM )
    $oldProgress = (float) get_field( 'project_completed', $fd['project-id'] );

    $percent_completed_today = (float) $fd['percentage-completed'];
    $percent_completed_today_format = number_format($percent_completed_today, 2);

    $newProgress = $percent_completed_today + $oldProgress;
    $newProgress_float_format = number_format($newProgress, 2);

    $today_points_float = (float) $fd['team-points'];
    $today_points_float_format = number_format($today_points_float, 2);

    if ( update_field( 'project_completed', $newProgress_float_format, $fd['project-id'] ) ) {

        // get team data
        $foreman = get_field( 'labor_select_foreman', $fd['team-id'] );


        // ****************************************
        // PROJECT - SAVE TO PROJECT REPORTS TABLE
        // ****************************************
        $table_name = $wpdb->prefix . 'project_reports';

        $project_form_insert = $wpdb->insert(
            $table_name,
            array(
                'date' => $date_time,
                'project_id' => $fd['project-id'],
                'project_name'  => get_the_title( $fd['project-id'] ),
                'team_id' => $fd['team-id'],
                'team_name' => get_the_title( $fd['team-id'] ),
                'percent' => $percent_completed_today,
                'points' => $today_points_float_format
            )
        );

        if ( $project_form_insert === false ) {
            $errors[] = 'Failed updating project progress field.';
        }

        // ****************************************
        // PROJECT - SAVE TASKS TO PROJECT META DATA
        // ****************************************

        foreach ( $fd as $field_name => $field_value ) {
            if ( strpos($field_name, "task_ttd_") !== false ) {
                $old_value = get_post_meta($fd['project-id'], $field_name, true);
                if ( empty($old_value) ) {
                    $old_value = 0;
                } else {
                    $field_value = intval($field_value) + intval($old_value);
                }

                update_post_meta($fd['project-id'], $field_name, $field_value);
            }
        }

        //add_post_meta( $fd['project-id'], 'project_daily_form', $data );

    } else {
        $errors[] = 'Failed saving project data.';
    }

    // POST_META ( TEAM_DAILY_FORM )
    $member_ids   = [];
    $member_names = [];
    foreach ( $users as $user ) {
        $member_ids[]   = $user['user-id'];
        $member_names[] = get_user_by( 'id', $user['user-id'] )->display_name;
    }


    // **********************************
    // TEAM - SAVE TO TEAM REPORTS TABLE
    // **********************************

    $table_name = $wpdb->prefix . 'team_reports';

    $team_form_insert = $wpdb->insert(
        $table_name,
        array(
            'date'          => $date_time,
            'team_id'       => $fd['team-id'],
            'team_name'     => get_the_title( $fd['team-id'] ),
            'project_id'    => $fd['project-id'],
            'project_name'  => get_the_title( $fd['project-id'] ),
            'foreman_id'    => $foreman['ID'],
            'foreman_name'  => $foreman['display_name'],
            'percent'       => $percent_completed_today,
            'points'        => $today_points_float_format,
            'member_ids'    => implode( ', ', $member_ids ),
            'members'       => implode( ', ', $member_names )
        )
    );

    if ( $team_form_insert === false ) {
        $errors[] = 'Failed saving team data.';
    }


    // USER_META ( WORKER_DAILY_FORM )
    foreach ( $users as $user ) {

        $user_points = (float) $user['daily-points'];

        // **********************************
        // USER - SAVE TO USER REPORTS TABLE
        // **********************************

        $table_name = $wpdb->prefix . 'user_reports';

        $user_form_insert = $wpdb->insert(
            $table_name,
            array(
                'date'          => $date_time,
                'user_id'       => $user['user-id'],
                'user_name'     => get_user_by( 'id', $user['user-id'] )->display_name,
                'points'        => number_format($user_points, 2),
                'start_time'       => $user['start-time'],
                'break'            => $user['break-time'],
                'lunch'            => $user['lunch-time'],
                'finish'           => $user['finish-time'],
                'hours_worked'          => cal_hours_worked( $user['start-time'], $user['finish-time'] ),
                'leadership'            => $user['leadership'],
                'leadership_notes'      => $user['leadership-notes'],
                'trust'                 => $user['trust'],
                'trust_notes'           => $user['trust-notes'],
                'safety'                => $user['safety'],
                'safety_notes'          => $user['safety-notes'],
                'quality'               => $user['quality'],
                'quality_notes'         => $user['quality-notes']
            )
        );

        if ( $user_form_insert === false ) {
            $errors[] = 'Failed saving user data.';
        }
    }

    // POST_META ( DAILY_REPORT_FORM )

    // fix weather string
    $weather   = [];
    if ( isset( $fd['weather-sunny'] ) ) {
        $weather[] = 'Sunny';
    }
    if (isset( $fd['weather-windy'] ) ) {
        $weather[] = 'Windy';
    }
    if (isset( $fd['weather-snowy'] ) ) {
        $weather[] = 'Snowy';
    }
    if (isset( $fd['weather-rainy'] ) ) {
        $weather[] = 'Rainy';
    }



    // ***********************************
    // DAILY - SAVE TO DAILY REPORTS TABLE
    // ***********************************

    $table_name = $wpdb->prefix . 'daily_reports';

    $daily_form_insert = $wpdb->insert(
        $table_name,
        array(
            'date'          => $date_time,
            'project_id'    => $fd['project-id'],
            'project_name'  => get_the_title( $fd['project-id'] ),
            'foreman_id'    => $foreman['ID'],
            'foreman_name'  => $foreman['display_name'],
            'team_id'       => $fd['team-id'],
            'team_name'     => get_the_title( $fd['team-id'] ),
            'member_ids'    => implode( ', ', $member_ids ),
            'members'       => implode( ', ', $member_names ),
            'points'        => $today_points_float_format,
            'percent'       => $percent_completed_today_format,
            'work_performed'    => $fd['work-performed'],
            'jha'               => (isset($fd['jha'])) ? 'Yes' : 'No',
            'hot_work_tomorrow' => $fd['hot-work-tomorrow'],
            'inspections'       => $fd['inspections'],
            'weather'           => implode(', ', $weather),
            'equipment_used'    => $fd['equipment-used'],
            'tekla'             => (isset($fd['tekla'])) ? 'Yes' : 'No',
            'other_conditions'  => $fd['other-conditions'],
            'tomorrows_plan'    => $fd['tomorrows-plan'],
            'productivity'      => $fd['productivity']
        )
    );


    if ( $daily_form_insert === false) {
        $errors[] = 'Failed creating new daily report.';
    }

    if ( empty( $errors ) ) {
        //create_daily_report_json_tables();
        wp_send_json_success( 'saved!', 200 );
    } else {
        error_log(implode(' ', $errors), 0);
        wp_send_json_error( [ 'message' => 'bad!', 'errors' => $errors ], 500 );
    }

}

add_action( 'wp_ajax_foreman_daily_form', 'foreman_daily_form_func' );

