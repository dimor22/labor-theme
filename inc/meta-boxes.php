<?php
/**
 * DASHBOARD META BOXES
 */
add_action( 'wp_dashboard_setup', 'my_custom_dashboard_widgets' );

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget( 'labor_projects_completion_widget', '&#187; Project Completion', 'labor_projects_completion' );
    wp_add_dashboard_widget( 'labor_team_performance_widget', '&#187; Team Performance', 'labor_team_performance' );
//    wp_add_dashboard_widget( 'labor_tomorrows_plan_widget', '&#187; Tomorrow\'s Plan Feed', 'labor_tomorrows_plan' );
}

function labor_projects_completion() {

    $projects = new WP_Query( array(
        'post_type'   => 'Projects',
        'numberposts' => - 1
    ) );

    $chart = [];

    // The Loop
    if ( $projects->have_posts() ) :
        while ( $projects->have_posts() ) :
            $projects->the_post();
            $chart['labels'][] = get_the_title();
            $chart['values'][] = get_field('project_completed');
        endwhile; ?>
        <canvas id="dashboard-project-progress-chart"
                data-chart-data='<?php echo json_encode($chart);?>'
                width="400"
                height="400">
        </canvas>
    <?php else : ?>
        <p>Go create a Project.</p>
    <?php endif;
    /* Restore original Post Data */
    wp_reset_postdata();
}

function labor_team_performance() {

    // get team ids
    $team_posts = get_posts([
            'post_type' => 'teams',
            'status'    => 'published',
            'numberposts' => -1
    ]);

    $chart['labels'] = []; // team names
    $chart['values'] = []; // team average points

    foreach ($team_posts as $team_post) {

        global $wpdb;

        $table_name = $wpdb->prefix . 'team_reports';

        $query = "SELECT date, team_name, points FROM $table_name WHERE team_id = '{$team_post->ID}'";

        $teams = $wpdb->get_results($query, 'OBJECT');

        // get team post_meta


        $chart['labels'][] = $team_post->post_title;
        //$team_meta = get_post_meta( $team->ID, LABOR_Json_Tables::$team_report_key );
        $points = 0;
        foreach ($teams as $team_data) {
            $points += $team_data->points;
        }

        if ( $points > count($teams) ) {
            $chart['values'][] = $points / count($teams);
        } else {
            $chart['values'][] = 0;
        }


    }

    ?>
    <canvas id="dashboard-team-performance-chart"
            data-chart-data='<?php echo json_encode($chart);?>'
            width="400"
            height="400">
    </canvas>
    <?php
    /* Restore original Post Data */
    wp_reset_postdata();
}

function labor_tomorrows_plan() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'daily_reports';

    $query = "SELECT date, foreman_id, foreman_name, tomorrows_plan FROM $table_name ORDER BY date DESC LIMIT 30";

    $daily_report = $wpdb->get_results($query, 'OBJECT');

    ?>
    <ul>
        <?php foreach ($daily_report as $report) :
            $user_img = get_avatar_url($report->foreman_id);
        ?>

        <li class="tomorrows-plan">
            <div class="user-card">
                <img src="<?php echo $user_img;?>" alt="<?php echo $report->foreman_name;?> Photo">
                <div class="user-card-info">
                    <h4><?php echo $report->foreman_name;?></h4>
                    <time datetime="<?php echo $report->date;?>"><?php echo $report->date;?></time>
                </div>
            </div>
            <p><?php echo ( strlen($report->tomorrows_plan) > 0 ) ? $report->tomorrows_plan : '<span style="color:red;">Nothing reported.</span>';
            ?></p>
        </li>
            <hr>
        <?php endforeach;?>
    </ul>

    <?php
}

function get_project_data( $project_id ) {
    $data = [];

    $res = get_post_meta( $project_id, LABOR_Json_Tables::$project_report_key );
    foreach ($res as $meta) {
        $data['labels'][] = $meta['date'];
        $data['data'][] = number_format($meta['progress']);
    }

    return $data;
}


/**
 * META BOX IN PROJECTS SCREEN
 */
function project_public_info_meta_box() {

    global $post;

    add_meta_box(
        'project-public-info',
        __( 'Project Public Info', 'laborapp' ),
        'project_public_info_callback',
        'projects'
    );
}
function project_public_info_callback( $post ) {
    get_template_part( 'template-parts/project-table' );
}
add_action( 'add_meta_boxes', 'project_public_info_meta_box' );

function project_progress_meta_box() {

    global $post;

    add_meta_box(
        'project-progress',
        __( 'Project Progress', 'laborapp' ),
        'project_progress_callback',
        'projects'
    );
}
function project_progress_callback( $post ) {
    global $wpdb;

    $table_name = $wpdb->prefix . 'project_reports';

    $query = "SELECT * FROM $table_name WHERE project_id = '{$post->ID}'";

    $projects = $wpdb->get_results($query, 'OBJECT');

    foreach ($projects as $project_data) {
        $chart['labels'][] = $project_data->date;
        $chart['values'][] =  $project_data->percent;
    }
    ?>

    <canvas
        id="meta-box-project-progress-chart"
        data-chart-data='<?php echo json_encode($chart);?>'
        width="400"
        height="400">

    </canvas>
    <?php
}
add_action( 'add_meta_boxes', 'project_progress_meta_box' );


/**
 * META BOX IN TEAM SCREEN
 */
function team_performance_meta_box() {

    global $post;

    add_meta_box(
        'team-performance',
        __( 'Team Performance Chart', 'laborapp' ),
        'team_performance_callback'
    );
}

function team_performance_callback( $post ) {

    global $wpdb;

    $table_name = $wpdb->prefix . 'team_reports';

    $query = "SELECT * FROM $table_name WHERE team_id = '{$post->ID}'";

    $teams = $wpdb->get_results($query, 'OBJECT');



    //$team_meta = get_post_meta( $team->ID, LABOR_Json_Tables::$team_report_key );
    $points = 0;
    foreach ($teams as $team_data) {
        $chart['labels'][] = $team_data->date;
        $chart['values'][] =  $team_data->points;
    }
    ?>

    <canvas id="team-performance-chart"
            data-chart-data='<?php echo json_encode($chart); ?>'
            width="400"
            height="400"></canvas>

<?php
}
add_action( 'add_meta_boxes_teams', 'team_performance_meta_box' );

/**
 * DISPLAY META BOX IN DAILY PLAN SCREEN
 */

function daily_plan_metabox(){
    add_meta_box(
            'project-tasks',
        __('Project Tasks Completion Goal', 'laborapp'),
        'daily_plan_meta_html',
        'daily-plan'
    );
}
function daily_plan_meta_html(){
    global $post;

    $daily_plan_post_id = $post->ID;

    $user_id = get_current_user_id();

    $args = [
            'post_type'     => 'projects',
            'post_status'   => 'publish',
            'meta_key'      => 'labor_project_lead_foreman',
            'meta_value'    => $user_id
    ];

    // ** FOR ONLY ADMINS ** //
    if ( user_can( get_current_user_id(), 'delete_others_pages' ) ) {

        $post_author_id = get_post_field( 'post_author', $post->ID );
        $args = [
            'post_type'     => 'projects',
            'post_status'   => 'publish',
            'meta_key'      => 'labor_project_lead_foreman',
            'meta_value'    => $post_author_id
        ];
    }
    // ** END FOR ONLY ADMINS ** //

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $project_id = get_the_ID();

            the_title('<h3>','</h3>');

            if( have_rows('project_tasks') ) {
                ?>

                    <div class="tasks-completed-foreman-form-row tasks-completed-foreman-form-row--header">
                        <div class="tasks-completed-foreman-form-row__name">TASK NAME</div>
                        <div class="tasks-completed-foreman-form-row__total">TOTAL</div>
                        <div class="tasks-completed-foreman-form-row__ttd">TTD</div>
                        <div class="tasks-completed-foreman-form-row__today">TOMORROW</div>
                    </div>

                <?php
                while (have_rows('project_tasks')) {
                    the_row();
                    $task_name = get_sub_field('project_task_name');
                    $task_value = get_sub_field('project_task_count');

                    $task_ttd_db_name = 'task_ttd_' . strtolower(str_replace(' ', '-', $task_name));
                    $task_ttd = get_post_meta(
                            $project_id,
                            $task_ttd_db_name,
                            true);


                    $planned_task_db_name = 'planned_task_' . $project_id . '_' . strtolower(str_replace(' ', '-',
                            $task_name));
                    $planned_task_value = get_post_meta(
                            $daily_plan_post_id,
                            $planned_task_db_name,
                            true);
                    ?>

                    <div class="tasks-completed-foreman-form-row">
                        <div class="tasks-completed-foreman-form-row__name"><?php echo $task_name;?></div>
                        <div class="tasks-completed-foreman-form-row__total"><?php echo $task_value;?></div>
                        <div class="tasks-completed-foreman-form-row__ttd"><?php echo $task_ttd;?></div>
                        <div class="tasks-completed-foreman-form-row__today">
                            <input type="tel"
                                   data-db="<?php echo $planned_task_value;?>"
                                   id="<?php echo $planned_task_db_name;?>"
                                   name="<?php echo $planned_task_db_name;?>"
                                    value="<?php echo $planned_task_value;?>">
                        </div>
                    </div>

                    <?php

                }
            } else {
                echo 'This Project has no tasks yet.';
            }

        }
    }

    wp_reset_postdata();
}

add_action( 'add_meta_boxes', 'daily_plan_metabox');


/**
 * SAVE DAILY PLAN META BOX INPUT DATA
 * @param $post_id
 */
function daily_plan_save_meta( $post_id ){
    foreach ( $_POST as $field_name => $field_value ) {
        if ( strpos($field_name, "planned_task_") !== false ) {
            update_post_meta($post_id, $field_name, $field_value);
        }
    }
}
add_action('save_post_daily-plan', 'daily_plan_save_meta');