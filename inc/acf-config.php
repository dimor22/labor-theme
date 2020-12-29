<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Labor App Settings',
        'menu_title'	=> 'Labor App Settings',
        'menu_slug' 	=> 'labor-app-settings',
        'capability'	=> 'activate_plugins',
        'redirect'		=> true
    ));

}