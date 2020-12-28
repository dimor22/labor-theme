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

//class LABOR_Json_Tables {
//    public $daily_report_post_type     = 'daily_reports';
//    public static $daily_report_key    = 'daily_report_form';
//    public $daily_report_path          = '';
//
//    public $team_report_post_type      = 'teams';
//    public static $team_report_key     = 'team_daily_form';
//    public $team_report_path           = '';
//
//    public $project_report_post_type   = 'projects';
//    public static $project_report_key  = 'project_daily_form';
//    public $project_report_path        = '';
//
//    public $user_report_post_type      = 'user';
//    public static $user_report_key     = 'worker_daily_form';
//    public $user_report_path           = '';
//
//    public function __construct()
//    {
//        $document_root = $_SERVER['DOCUMENT_ROOT'];
//        $this->daily_report_path    = $document_root . '/wp-content/themes/labor/template-parts/json-tables/daily-report.json';
//        $this->team_report_path     = $document_root . '/wp-content/themes/labor/template-parts/json-tables/team-report.json';
//        $this->project_report_path  = $document_root . '/wp-content/themes/labor/template-parts/json-tables/project-report.json';
//        $this->user_report_path     = $document_root . '/wp-content/themes/labor/template-parts/json-tables/user-report.json';
//    }
//
//    public function generate_json_table($post_type, $key, $path) {
//        global $wpdb;
//        $reports = [];
//
//        if ($post_type === 'user') {
//            $query = "SELECT *  FROM `wp_usermeta` WHERE `meta_key` = %s ORDER BY `umeta_id`  DESC";
//            $user_meta = $wpdb->get_results($wpdb->prepare($query, 'worker_daily_form'));
//            foreach ($user_meta as $row) {
//                $reports[] = maybe_unserialize($row->meta_value);
//            }
//        } else {
////        $posts = get_posts( ['numberposts' => -1, 'post_type' => $post_type, 'meta_key' => $key] );
////
////        foreach ( $posts as $post_row ) {
////            $reports[] = get_post_meta( $post_row->ID, $key, true );
////        }
//            $query = "SELECT *  FROM `wp_postmeta` WHERE `meta_key` = %s ORDER BY `meta_id`  DESC";
//            $post_meta = $wpdb->get_results($wpdb->prepare($query, $key));
//            foreach ($post_meta as $row) {
//                $reports[] = maybe_unserialize($row->meta_value);
//            }
//        }
//
//        if ( $fp = fopen( $path, 'w' ) ) {
//            if ( fwrite( $fp, json_encode( $reports ) ) ) {
//                if ( false === fclose( $fp ) ){
//                    error_log("Failed to close json file for $post_type.", 0);
//                }
//            } else {
//                error_log("Failed to write json file for $post_type.", 0);
//            }
//
//        } else {
//            error_log("Failed to open json file for $post_type", 0);
//        }
//
//
//    }
//
//    public function create_daily_report_json_tables(){
//
//
//        $this->generate_json_table(
//            $this->daily_report_post_type,
//            self::$daily_report_key,
//            $this->daily_report_path);
//
//        $this->generate_json_table(
//            $this->team_report_post_type,
//            self::$team_report_key,
//            $this->team_report_path);
//
//        $this->generate_json_table(
//            $this->project_report_post_type,
//            self::$project_report_key,
//            $this->project_report_path);
//
//        $this->generate_json_table(
//            $this->user_report_post_type,
//            self::$user_report_key,
//            $this->user_report_path);
//    }
//
//}
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

    $form = $_REQUEST['payload'];

    $fd     = []; // form data
    $errors = [];
    $time   = time();

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
    $oldProgress = (int) get_field( 'project_completed', $fd['project-id'] );
    $newProgress = $fd['percentage-completed'] + $oldProgress;

    if ( update_field( 'project_completed', number_format($newProgress), $fd['project-id'] ) ) {

        // get team data
        $foreman = get_field( 'labor_select_foreman', $fd['team-id'] );

        $data = [
            'date'              => date( 'm-d-Y', $time ),
            'project-id'        => $fd['project-id'],
            'project-name'      => get_the_title( $fd['project-id'] ),
            'team-id'           => $fd['team-id'],
            'team-name'         => get_the_title( $fd['team-id'] ),
            'progress'          => number_format($fd['percentage-completed']),
            'points'            => number_format($fd['team-points'])
        ];
        add_post_meta( $fd['project-id'], 'project_daily_form', $data );

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

    $data = [
        'date'          => date( 'm-d-Y', $time ),
        'team-id'       => $fd['team-id'],
        'team-name'     => get_the_title( $fd['team-id'] ),
        'project-id'    => $fd['project-id'],
        'project-name'  => get_the_title( $fd['project-id'] ),
        'progress'      => number_format($fd['percentage-completed']),
        'points'        => number_format($fd['team-points']),
        'foreman-id'    => $foreman['ID'],
        'foreman-name'  => $foreman['display_name'],
        'member-ids'    => implode( ', ', $member_ids ),
        'members'       => implode( ', ', $member_names )
    ];

    if ( ! add_post_meta( $fd['team-id'], 'team_daily_form', $data ) ) {
        $errors[] = 'Failed saving team data.';
    }


    // USER_META ( WORKER_DAILY_FORM )
    foreach ( $users as $user ) {
        $data = [
            'date'                  => date( 'm-d-Y', $time ),
            'user-id'               => $user['user-id'],
            'user-name'             => get_user_by( 'id', $user['user-id'] )->display_name,
            'points'                => number_format($user['daily-points']),
            'start-time'            => $user['start-time'],
            'break-time'            => $user['break-time'],
            'lunch-time'            => $user['lunch-time'],
            'finish-time'           => $user['finish-time'],
            'hours-worked'          => cal_hours_worked( $user['start-time'], $user['finish-time'] ),
            'leadership'            => $user['leadership'],
            'leadership-notes'      => $user['leadership-notes'],
            'trust'                 => $user['trust'],
            'trust-notes'           => $user['trust-notes'],
            'safety'                => $user['safety'],
            'safety-notes'          => $user['safety-notes'],
            'quality'               => $user['quality'],
            'quality-notes'         => $user['quality-notes']
        ];
        if ( ! add_user_meta( $user['user-id'], 'worker_daily_form', $data ) ) {
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


    $data = [
        'date'              => date( 'm-d-Y', $time ),
        'project-id'        => $fd['project-id'],
        'project-name'      => get_the_title( $fd['project-id'] ),
        'foreman-id'        => $foreman['ID'],
        'foreman-name'      => $foreman['display_name'],
        'team-id'           => $fd['team-id'],
        'team-name'         => get_the_title( $fd['team-id'] ),
        'team-members'      => implode( ', ', $member_names ),
        'team-points'       => number_format($fd['team-points']),
        'percent'           => $fd['percentage-completed'],
        'work-performed'    => $fd['work-performed'],
        'jha'               => (isset($fd['jha'])) ? 'Yes' : 'No',
        'hot-work-tomorrow' => $fd['hot-work-tomorrow'],
        'inspections'       => $fd['inspections'],
        'weather'           => implode(', ', $weather),
        'equipment-used'    => $fd['equipment-used'],
        'tekla'             => (isset($fd['tekla'])) ? 'Yes' : 'No',
        'other-conditions'  => $fd['other-conditions'],
        'tomorrows-plan'    => $fd['tomorrows-plan'],
        'productivity'      => $fd['productivity']

    ];

    $new_daily_report_post = wp_insert_post( [
        'post_title'   => 'daily report ' . time(),
        'post_type'    => 'daily_reports',
        'post_status'  => 'publish',
        'post_content' => 'Daily report.',
    ] );

    if ( ! $new_daily_report_post ) {
        $errors[] = 'Failed creating new report.';
    } else {
        if ( ! add_post_meta( $new_daily_report_post, 'daily_report_form', $data ) ) {
            $errors[] = 'Failed saving report data.';
        }
    }

    if ( empty( $errors ) ) {
        create_daily_report_json_tables();
        wp_send_json_success( 'saved!', 200 );
    } else {
        error_log(implode(' ', $errors), 0);
        wp_send_json_error( [ 'message' => 'bad!', 'errors' => $errors ], 500 );
    }

}

add_action( 'wp_ajax_foreman_daily_form', 'foreman_daily_form_func' );


//function create_daily_report_json_tables(){
//
//    $jt = new LABOR_Json_Tables();
//
//    $jt->create_daily_report_json_tables();
//
//}
//add_action( 'init', 'create_daily_report_json_tables' );