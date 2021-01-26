<?php
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