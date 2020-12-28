<?php
/**
 * CPT PROJECTS
 */
function team_members_init() {
    $args = array(
        'labels'      => array(
            'name'          => __( 'Projects', 'labor-app' ),
            'singular_name' => __( 'Project', 'labor-app' ),
            'add_new_item'  => __( 'New Project Name', 'labor-app' ),
            'edit_item'     => __( 'Edit Project', 'labor-app' )
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
            'name'          => __( 'Teams', 'labor-app' ),
            'singular_name' => __( 'Team', 'labor-app' ),
            'add_new_item'  => __( 'New Team Name', 'labor-app' ),
            'edit_item'     => __( 'Edit Team', 'labor-app' )
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