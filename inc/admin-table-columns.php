<?php
/**
 * DAILY PLAN TABLE COLUMNS
 */

add_filter('manage_daily-plan_posts_columns', 'daily_plan_table_head');
function daily_plan_table_head( $defaults ) {

    $defaults['author'] = 'Foreman';
    $defaults['tasks']   = 'Tasks';

    $custom_col_order = array(
        'title' => $defaults['title'],
        'author' => $defaults['author'],
        'tasks' => $defaults['tasks'],
        'date' => $defaults['date']
    );

    return $custom_col_order;
}

add_action( 'manage_daily-plan_posts_custom_column', 'daily_plan_table_content', 10, 2 );
function daily_plan_table_content( $column_name, $post_id ) {
    if ($column_name == 'tasks') {
        $tasks = get_field('task');
        echo count($tasks);
    }
}

add_filter( 'manage_edit-daily-plan_sortable_columns', 'daily_plan_table_sorting' );
function daily_plan_table_sorting( $columns ) {
    $columns['author'] = 'author';
    return $columns;
}

add_filter( 'request', 'daily_plan_task_column_orderby' );
function daily_plan_task_column_orderby( $vars ) {
    if ( isset( $vars['orderby'] ) && 'author' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'orderby' => 'post_author'
        ) );
    }

    return $vars;
}

/**
 * PROJECT TABLE COLUMNS
 */

add_filter('manage_projects_posts_columns', 'projects_table_head');
function projects_table_head( $defaults ){

    if ( user_can( get_current_user_id(), 'delete_others_pages' ) ) {
        $defaults['author'] = 'Created by';
        $defaults['lead_foreman'] = 'Lead Foreman';

        $custom_col_order = array(
            'title' => $defaults['title'],
            'lead_foreman' => $defaults['lead_foreman'],
            'author' => $defaults['author'],
            'date' => $defaults['date']
        );

        return $custom_col_order;
    } else {
        return $defaults;
    }
}

add_action( 'manage_projects_posts_custom_column', 'projects_table_content', 10, 2);
function projects_table_content( $column_name, $post_id ) {
    if ( user_can( get_current_user_id(), 'delete_others_pages' ) ) {
        if ( $column_name == 'lead_foreman') {
            $lead_foreman = get_field('labor_project_lead_foreman'); ?>

            <div class="project-row-lead-foreman-card">
                <div class="project-row-lead-foreman-card__image"><?php echo $lead_foreman['user_avatar'];?></div>
                <div class="project-row-lead-foreman-card__name"><?php echo $lead_foreman['display_name'];?></div>
            </div>
    <?php
        }
    }
}