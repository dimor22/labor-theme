<?php
/**
 * DASHBOARD META BOXES
 */
add_action( 'wp_dashboard_setup', 'my_custom_dashboard_widgets' );

function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;

    wp_add_dashboard_widget( 'labor_projects_completion_widget', '&#187; Project Completion', 'labor_projects_completion' );
    wp_add_dashboard_widget( 'labor_team_performance_widget', '&#187; Team Performance', 'labor_team_performance' );
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
    $teams_obj = get_posts(['post_type' => 'teams', 'numberposts' => -1]);

    $chart['labels'][] = ''; // team names
    $chart['values'][] = ''; // team average points

    foreach ($teams_obj as $team) {
        // get team post_meta
        $chart['labels'][] = $team->post_name;
        $team_meta = get_post_meta( $team->ID, LABOR_Json_Tables::$team_report_key );
        $points = 0;
        foreach ($team_meta as $meta) {
            $points += $meta['points'];
        }
        $chart['values'][] = $points / count($team_meta);
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

function get_team_data( $team_id ) {
    $data = [];

    $res = get_post_meta( $team_id, LABOR_Json_Tables::$team_report_key );

    foreach ($res as $meta) {
        $data['labels'][] = $meta['date'];
        $data['data'][] = number_format($meta['points']);
    }

    return $data;
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
    $project_data = get_project_data( $post->ID);
    ?>

    <canvas
        id="meta-box-project-progress-chart"
        data-chart-data='<?php echo json_encode($project_data);?>'
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

// TODO: Review this, not working good
function team_performance_callback( $post ) {

    $team_data = get_team_data( $post->ID);

    wp_add_inline_script('chart-js', 'var teamChartData = ' . json_encode( $team_data ) . ';', 'after');

    get_template_part( 'template-parts/charts/team-performance-chart' );
}
add_action( 'add_meta_boxes_teams', 'team_performance_meta_box' );