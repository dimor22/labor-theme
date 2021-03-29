<?php
$includes = [
    'inc/setup.php',
    'inc/post-types.php',
    'inc/user-edit-page-fields.php',
    'inc/daily-foreman-form.php',
    'inc/new-hire-form.php',
    'inc/login-page.php',
    'inc/new-admin-pages.php',
    'inc/meta-boxes.php',
    'inc/acf-config.php',
    'inc/onboarding-data.php',
    'inc/admin-table-columns.php'

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


/**
 * AJAX CALL TO GET TEAM MEMBERS
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

/**
 * AJAX CALL TO GET PROJECT TASKS
 */
function get_project_tasks_func() {

    $project_id = $_REQUEST['payload'];

    $project_tasks = [];

    if( have_rows('project_tasks', $project_id) ) {
        while (have_rows('project_tasks', $project_id)) {
            the_row();
            $task_name = get_sub_field('project_task_name');
            $task_total_count = get_sub_field('project_task_count');
            $task_total_hours = get_sub_field('project_task_hours');
            $task_unit_hours = round($task_total_hours / $task_total_count, 2);
            $task_ttd = get_post_meta($project_id, "task_ttd_" . strtolower(str_replace(" ", "-", $task_name)), true);

            $project_tasks[] = [
                'projectId' => $project_id,
                'projectName' => 'title placeholder',
                'taskList'  => [
                    'name' => $task_name,
                    'total' => $task_total_count,
                    'ttd'   => $task_ttd != false ? $task_ttd : 0,
                    'hours' => $task_unit_hours
                ]
            ];
        }
    }

    echo wp_send_json( $project_tasks );
}
add_action( 'wp_ajax_get_project_tasks', 'get_project_tasks_func' );






