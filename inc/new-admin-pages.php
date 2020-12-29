<?php

/**
 * ADDITIONAL ADMIN PAGES
 * ACTION: ADMIN_MENU
 */
add_action( 'admin_menu', 'labor_formen_form' );

// FOREMAN FORM PAGE
function labor_formen_form() {
    add_menu_page( 'Foreman Daily Form',
        'Formeman Form',
        'delete_published_posts',
        'labor_foreman_form',
        'labor_foreman_form_page',
        'dashicons-welcome-write-blog',
        5
    );
}
function labor_foreman_form_page() {
    get_template_part( 'template-parts/forms/foremanraw', 'daily' );
}

// DAILY FORM REPORTS PAGE
function daily_forms_report_page() {
    add_menu_page( 'Daily Report Page',
        'Daily Report',
        'delete_published_posts',
        'daily_report_page',
        'daily_forms_report_page_func',
        'dashicons-media-spreadsheet',
        6
    );
}
add_action( 'admin_menu', 'daily_forms_report_page' );

// PROJECT REPORTS PAGE
function project_report_page() {
    add_submenu_page(
        'edit.php?post_type=projects',
        'Projects Report Page',
        'Projects Report',
        'delete_published_posts',
        'project_report_page',
        'project_report_page_func'
    );
}
add_action( 'admin_menu', 'project_report_page' );

// TEAM REPORTS PAGE
function team_report_page() {
    add_submenu_page(
        'edit.php?post_type=teams',
        'Teams Report Page',
        'Teams Report',
        'delete_published_posts',
        'team_report_page',
        'team_report_page_func'
    );
}
add_action( 'admin_menu', 'team_report_page' );

// USER REPORTS PAGE
function user_report_page() {
    add_submenu_page(
        'users.php',
        'Users Report Page',
        'Users Report',
        'delete_published_posts',
        'user_report_page',
        'user_report_page_func'
    );
}
add_action( 'admin_menu', 'user_report_page' );

function daily_forms_report_page_func() {

    $id = get_field('daily_report_table_id', 'option');
    echo do_shortcode( '[wpdatatable id=' . $id . ']' );

}
function project_report_page_func() {

    $id = get_field('project_report_table_id', 'option');
    echo do_shortcode( '[wpdatatable id=' . $id . ']' );

}
function team_report_page_func() {

    $id = get_field('team_report_table_id', 'option');
    echo do_shortcode( '[wpdatatable id=' . $id . ']' );

}
function user_report_page_func() {

    $id = get_field('user_report_table_id', 'option');
    echo do_shortcode( '[wpdatatable id=' . $id . ']' );

}