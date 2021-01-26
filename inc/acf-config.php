<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Labor App Settings',
        'menu_title'	=> 'Labor App Settings',
        'menu_slug' 	=> 'laborapp-settings',
        'capability'	=> 'activate_plugins',
        'redirect'		=> true
    ));

}


/**
 * Filter Relationship field "TEAM" from "DAILY PLAN" post INPUT
 */
add_filter('acf/fields/relationship/query/name=task_team', 'my_acf_fields_relationship_query', 10, 3);
function my_acf_fields_relationship_query( $args, $field, $post_id ) {

    if ( user_can( get_current_user_id(), 'delete_others_pages' ) ) {
        // For Admins Only
        $args['meta_key'] = 'labor_select_foreman';
        $args['meta_value'] = get_post_field( 'post_author', $post_id );
    }

    return $args;
}


