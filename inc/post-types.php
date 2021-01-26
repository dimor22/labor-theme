<?php
/**
 * CPT PROJECTS
 */
function team_members_init() {
    $args = array(
        'labels'      => array(
            'name'          => __( 'Projects', 'laborapp' ),
            'singular_name' => __( 'Project', 'laborapp' ),
            'add_new_item'  => __( 'New Project Name', 'laborapp' ),
            'edit_item'     => __( 'Edit Project', 'laborapp' )
        ),
        'public'      => true,
        'menu_icon'   => 'dashicons-portfolio',
        'has_archive' => true,
        'rewrite'     => true,
        'query_var'   => true,
        'supports'    => array( 'title', 'editor', 'custom-fields', 'post-formats' )
    );
    register_post_type( 'Projects', $args );
}
add_action( 'init', 'team_members_init' );


/**
 * CPT TEAMS
 */
function labor_teams_page() {
    $args = array(
        'labels'      => array(
            'name'          => __( 'Teams', 'laborapp' ),
            'singular_name' => __( 'Team', 'laborapp' ),
            'add_new_item'  => __( 'New Team Name', 'laborapp' ),
            'edit_item'     => __( 'Edit Team', 'laborapp' )
        ),
        'public'      => true,
        'menu_icon'   => 'dashicons-groups',
        'has_archive' => true,
        'rewrite'     => true,
        'query_var'   => true,
        'supports'    => array( 'title', 'editor', 'custom-fields', 'post-formats' )
    );
    register_post_type( 'Teams', $args );
}
add_action( 'init', 'labor_teams_page' );


/**
 * CPT DAILY_FORM
 */
function daily_reports() {

    $args = [
        'supports' => array(
            'title',
            'editor',
            'comments',
            'revisions',
            'trackbacks',
            'author',
            'excerpt',
            'page-attributes',
            'thumbnail',
            'custom-fields',
            'post-formats'
        )
    ];

    // NO UI FOR THIS POST TYPE, ONLY FOR STORAGE PURPOSES
    register_post_type( 'daily_reports', $args );
}
add_action( 'init', 'daily_reports' );

// DAILY PLAN IS CREATED WITH "CPT UI"