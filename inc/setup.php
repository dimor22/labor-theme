<?php
/**
 * LOAD THEME STYLES
 */
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'twentynineteen', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'laborapp-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'twentynineteen' ),
        wp_get_theme()->get( 'Version' )
    );
    wp_enqueue_style('laborapp-css-front', get_stylesheet_directory_uri() . '/css/laborapp-front.css','',
        wp_get_theme()->get('Version'));
    wp_enqueue_script( 'laborapp-js-front', get_stylesheet_directory_uri() . '/js/laborapp-front.js', [
        'jquery',
        'lodash'
    ], '', true );
    wp_localize_script( 'laborapp-js-front', 'laborappSettings', array(
        'ajax_url'  => admin_url( 'admin-ajax.php' ),
        'admin_url' => admin_url(),
        'account'   => home_url('account'),
        'nonce'     => wp_create_nonce( "new_hire_form_nonce" ),
        'sections' => [
            [
                'display' => __('Personal', 'laborapp'),
                'short' => 'pers'
            ],
            [
                'display' => __('Password', 'laborapp'),
                'short' => 'pass'
            ],
            [
                'display'   => __('Skills', 'laborapp'),
                'short'     => 'skil'
            ],
            [
                'display'   => __('Leadership', 'laborapp'),
                'short'     => 'lead'
            ]
        ],
        'validation_msgs' => [
                    ['error'         => __(' section is not completed.', 'laborapp')],
                    ['success'       => __('Form Submitted Successfully', 'laborapp')],
                    ['processing'       => __('Creating your Profile', 'laborapp')],
                    ['fail'          => __('Something bad happened. Please try again in a few minutes', 'laborapp')],
            ['show'          => __('Show', 'laborapp')],
            ['hide'          => __('Hide', 'laborapp')]
        ]
    ) );
    wp_enqueue_script( 'sweet-alert-2', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', '', '', true );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/**
 * LOAD ADMIN SCRIPTS
 */
function load_admin_scripts() {
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
    wp_enqueue_style( 'labor-swipe-css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
    wp_enqueue_style( 'labor-admin-css', get_stylesheet_directory_uri() . '/css/admin.css', false, '1.0.0' );

    // Check anyone < ADMIN
    if ( ! current_user_can( 'update_core' ) ) {
        wp_enqueue_style( 'cleanup-admin-css', get_stylesheet_directory_uri() . '/css/less-admin.css', false, '1.0.0' );
    }

    wp_enqueue_script( 'labor-swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'labor-numeral', '//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'chart-js', 'https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js', '', '', true );
    wp_enqueue_script( 'chart-dashboard', get_stylesheet_directory_uri() . '/js/dashboard-charts.js', '', '', true );
    wp_register_script( 'laborapp-js', get_stylesheet_directory_uri() . '/js/laborapp-admin.js', [
        'jquery',
        'lodash'
    ], '', true );
    wp_localize_script( 'laborapp-js', 'labor_form_ajax', array(
        'ajax_url'  => admin_url( 'admin-ajax.php' ),
        'admin_url' => admin_url()
    ) );
    wp_enqueue_script( 'laborapp-js', null, [ 'jquery', 'lodash' ], '', true );
    wp_enqueue_script( 'sweet-alert-2', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', '', '', true );
    wp_enqueue_script('gauge-library', get_stylesheet_directory_uri() . '/js/gauge.min.js');

}
add_action( 'admin_enqueue_scripts', 'load_admin_scripts' );


/**
 * LOAD THEME TRANSLATIONS FOLDER LABOR/LANGUAGES
 */
function my_theme_load_theme_textdomain() {
    load_child_theme_textdomain( 'laborapp', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );


/**
 * HIDE ADMIN BAR ITEMS
 */
function remove_from_admin_bar( $wp_admin_bar ) {

    if ( ! current_user_can( 'update_core' ) ) {
        // Example of removing item generated by plugin. Full ID is #wp-admin-bar-si_menu
        $wp_admin_bar->remove_node( 'si_menu' );
        // WordPress Core Items (uncomment to remove)
        $wp_admin_bar->remove_node( 'updates' );
        $wp_admin_bar->remove_node( 'comments' );
        $wp_admin_bar->remove_node( 'new-content' );
        //$wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node( 'site-name' );
        //$wp_admin_bar->remove_node('my-account');
        //$wp_admin_bar->remove_node('search');
        //$wp_admin_bar->remove_node('customize');
    }
}
add_action( 'admin_bar_menu', 'remove_from_admin_bar', 999 );


/**
 * REMOVE TOP-LEVEL ADMIN MENU
 */
function wpdocs_remove_menus() {

    // Check anyone < AUTHOR
//	if ( ! current_user_can( 'delete_others_pages' ) ) {
//		remove_menu_page( 'index.php' );    //Dashboard
//
//	}

    // Check anyone < ADMIN
    if ( ! current_user_can( 'update_core' ) ) {
        remove_menu_page( 'tools.php' );                  //Tools
        remove_menu_page( 'options-general.php' );        //Settings
        remove_menu_page( 'edit.php?post_type=acf-field-group' );    //ACF
        //remove_menu_page( 'upload.php' );                 //Media
    }

//	remove_menu_page( 'jetpack' );                    //Jetpack*
//	remove_menu_page( 'edit.php' );                   //Posts

//	remove_menu_page( 'edit.php?post_type=page' );    //Pages
//	remove_menu_page( 'edit-comments.php' );          //Comments
//	remove_menu_page( 'themes.php' );                 //Appearance
//	remove_menu_page( 'plugins.php' );                //Plugins
//	remove_menu_page( 'users.php' );                  //Users


}
add_action( 'admin_menu', 'wpdocs_remove_menus' );


/**
 * ADDS CUSTOM LOGO
 */
function wpb_custom_logo() {
//	echo '
//<style type="text/css">
//#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
//background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/labor-logo-xs.png) !important;
//background-position: center;
//background-repeat: no-repeat;
//color:rgba(0, 0, 0, 0);
//}
//#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
//background-position: 0 0;
//}
//</style>
//';

    echo '
<style type="text/css">
@media screen and (max-width: 782px){
#wpadminbar #wp-admin-bar-menu-toggle .ab-icon:before {
background-image: url(' . get_bloginfo( 'stylesheet_directory' ) . '/images/labor-logo-xs.png) !important;
background-position: center;
background-repeat: no-repeat;
color:rgba(0, 0, 0, 0);
}
.wp-responsive-open #wpadminbar #wp-admin-bar-menu-toggle .ab-icon:before{
color: transparent;
}}
</style>
';

}
add_action( 'wp_before_admin_bar_render', 'wpb_custom_logo' );


/**
 * ADDS MANIFEST PWA META TAG TO THE HEAD
 */
function add_meta_tags() {
    ?>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/labor-ico.png"/>
    <link rel="manifest" href="<?php echo get_home_url(); ?>/manifest.json">
    <meta name="apple-mobile-web-app-title" content="Labor App">
    <link rel="apple-touch-startup-image" href="<?php echo get_home_url(); ?>/launch.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_home_url(); ?>/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_home_url(); ?>/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_home_url(); ?>/touch-icon-ipad-retina.png">
<?php }

add_action( 'admin_head', 'add_meta_tags' );  // admin area
add_action( 'login_head', 'add_meta_tags' );  // login page
add_action( 'wp_head', 'add_meta_tags' );     // front end


/**
 * REMOVES ADMIN DASHBOARD WIDGETS
 */
function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments'] );
    unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
    unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'] );

}
add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );


/**
 * REDIRECTS HOME PAGE TO ADMIN DASHBOARD
 */
//function back_to_admin() {
//    if ( is_front_page() ) {
//        wp_redirect( admin_url() );
//    }
//}
//add_action( 'template_redirect', 'back_to_admin' );

/**
 * Saves post date as the title of the post ONLY for Daily-Plan post type
 */
add_filter( 'wp_insert_post_data' , 'filter_post_data' , '99', 2 );
function filter_post_data( $data , $postarr ) {
    // Change post title
    global $post;

    if ( $post->post_type == 'daily-plan' ) {
        $data['post_title'] = date('F j, Y', strtotime( $data['post_date']) );
    }

    return $data;
}


function filter_query_by_foreman( $query ) {

    if ( ! user_can( get_current_user_id(), 'delete_others_pages') ) {

        // Run for Foremen Only
        if ( $query->query['post_type'] == 'teams') {
            // For teams posts
            $query->set('meta_key','labor_select_foreman');
            $query->set('meta_value', get_current_user_id());
        }
        if ( $query->query['post_type'] == 'projects') {
            // For projects posts
            $query->set('meta_key','labor_project_lead_foreman');
            $query->set('meta_value', get_current_user_id());
        }
        if ( $query->query['post_type'] == 'daily-plan') {
            // For daily plan
            $query->set('author', get_current_user_id());
        }
    }


}
add_action( 'pre_get_posts', 'filter_query_by_foreman');

//
//function wporg_debug() {
//    if ( current_action() == 'pre_get_posts') {
//        echo '<p>' . current_action() . '</p>';
//    }
//}
//add_action( 'all', 'wporg_debug' );


//add_action('admin_init', 'testing');
//function testing() {
//    echo "<h1 id='#testing'>" . get_current_user_id() . "</h1>";
//    if ( ! user_can( get_current_user_id(), 'delete_others_pages') ) {
//        echo 'User is NOT Admin';
//    } else {
//        echo 'You are ADMIN';
//    }
//}


