<?php
$includes = [
    'inc/setup.php',
    'inc/post-types.php',
    'inc/user-edit-page-fields.php',
    'inc/daily-foreman-form.php',
    'inc/login-page.php',
    'inc/new-admin-pages.php',
    'inc/meta-boxes.php'

];

foreach($includes as $file){
    if (!$filepath = locate_template($file)){
        trigger_error(sprintf(__('Error locating %s for inclusion', 'esportstalk'), $file), E_USER_ERROR);
    }
    require_once $filepath;
}
unset($file, $filepath);


/**
 * LABOR APP Child Theme functions and definitions
 *
 *
 *
 * 1. LOAD THEME STYLES
 * 2. LOAD ADMIN STYLES
 * 3. LOAD THEME TRANSLATIONS
 * 4. CREATE CUSTOM POST TYPE
 * 5. ADD EXTRA FIELDS TO USER EDIT PAGE
 * 6. SAVE EXTRA FIELDS TO USER EDIT PAGE
 *
 */

/**
 * APP ROLES
 *
 * ADMINISTRATOR -> ME
 * EDITOR -> ADMIN (ADMINISTRATOR CAPABILITIES)
 * AUTHOR -> FOREMAN
 * CONTRIBUTOR -> WORKER
 * SUBSCRIBER -> PROSPECT
 */


function get_team_members_func() {

    // Becuase this call returns a single result it needs to be added to an array
    // to nicely merge into the other multiple array
	$foreman[] = get_field('labor_select_foreman', $_REQUEST['payload']);

	$team = get_field( 'labor_select_worker', $_REQUEST['payload'] );

	$full_team = array_merge($foreman, $team);

    //var_dump(json_encode($full_team));die;

	echo wp_send_json( $full_team );
}
add_action( 'wp_ajax_get_team_members', 'get_team_members_func' );






