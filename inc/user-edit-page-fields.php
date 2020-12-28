<?php
/**
 * ADD EXTRA FIELDS TO USER EDIT PAGE
 */
function extra_user_profile_fields( $user ) { ?>
    <h2><?php _e( "Extra profile information", "labor" ); ?></h2>

    <table class="form-table">
        <tr>
            <th><label for="user-profile-phone"><?php _e( "Phone", 'labor-app' ); ?></label></th>
            <td>
                <input type="text" name="user-profile-phone" id="user-profile-phone"
                       value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>"
                       class="regular-text"/><br>
                <span class="description"><?php _e( "Please enter your phone number.", 'labor-app' ); ?></span>
            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('Skills Chart', 'labor');?></h3>
            </th>
            <td>
                <?php

                if ( get_current_screen()->id === 'user-edit' ) {
                    $user = $_REQUEST['user_id'];
                } else {
                    $user = get_current_user_id();
                }

                // This var is used by other sections
                $user_id = $user;

                $user = "user_{$user}";
                $options = [];
                // read ACF data for current user
                if ( have_rows('skills', $user) ) {
                    while ( have_rows('skills', $user) ){
                        the_row();
                        $options[get_sub_field('skills')] = get_sub_field('level');
                    }
                }

                ?>

                <div class="card profile-skills-card">
                    <?php if ( ! empty($options) ) :
                        ?>
                        <canvas id="user-skills-chart" data-options='<?php echo json_encode($options);?>'></canvas>
                    <?php else : ?>
                        <p>Start working on your Skills!</p>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('Performance Chart', 'labor');?></h3>
            </th>
            <td>
                <div style="text-align: center;" class="card profile-performance-card">
                    <canvas id="user-performance-gauge" data-value="<?php echo get_user_performance( $user_id );?>"></canvas>
                </div>

            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('Behavior Chart', 'labor');?></h3>
            </th>
            <?php $behavior_chart_data = get_user_behavior( $user_id );?>
            <td class="profile-behavior-card" data-behavior-data='<?php echo $behavior_chart_data;?>'>
                <?php if ( ! empty($behavior_chart_data) ) : ?>
                    <div class="card">
                        <canvas id="user-behavior-chart-safety"></canvas>
                    </div>
                    <div class="card">
                        <canvas id="user-behavior-chart-quality"></canvas>
                    </div>
                    <div class="card">
                        <canvas id="user-behavior-chart-leadership"></canvas>
                    </div>
                    <div class="card">
                        <canvas id="user-behavior-chart-trust"></canvas>
                    </div>
                <?php else : ?>
                    <div class="card">
                        <p>No data yet.</p>
                    </div>
                <?php endif;?>
            </td>
        </tr>
    </table>
<?php }
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function get_user_behavior( $user_id ) {
    global $wpdb;

    $data['safety'] = [];
    $data['quality'] = [];
    $data['leadership'] = [];
    $data['trust'] = [];

    $query = "SELECT * FROM `wp_usermeta` WHERE `user_id` = %d AND `meta_key` = %s";
    $user_meta = $wpdb->get_results($wpdb->prepare($query, $user_id, 'worker_daily_form'));

    if ( ! empty($user_meta) ) {
        foreach ($user_meta as $row) {
            $reports[] = maybe_unserialize($row->meta_value);
        }

        foreach ($reports as $meta) {
            $data['safety']['labels'][]       = $meta['date'];
            $data['safety']['values'][]       = $meta['safety'];

            $data['quality']['labels'][]       = $meta['date'];
            $data['quality']['values'][]       = $meta['quality'];

            $data['leadership']['labels'][]    = $meta['date'];
            $data['leadership']['values'][]    = $meta['leadership'];

            $data['trust']['labels'][]          = $meta['date'];
            $data['trust']['values'][]          = $meta['trust'];
        }
        return json_encode($data);
    }

    return false;
}

function get_user_performance($user_id){
    global $wpdb;

    $user_performance_value = 0;
    $total_points = 0;
    $points = [];
    $query = "SELECT * FROM `wp_usermeta` WHERE `user_id` = %d AND `meta_key` = %s";
    $user_meta = $wpdb->get_results($wpdb->prepare($query, $user_id, 'worker_daily_form'));

    if ( ! empty($user_meta) ) {
        foreach ($user_meta as $row) {
            $reports[] = maybe_unserialize($row->meta_value);
        }
        foreach ($reports as $meta) {
            $points[] = $meta['points'];
            $total_points += $meta['points'];
        }
        return $user_performance_value = floor($total_points / count($reports));
    }
    return $user_performance_value;
}


/**
 * SAVE THE EXTRA FIELDS FROM THE EDIT PAGE
 */
function save_extra_user_profile_fields( $user_id ) {
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
    update_user_meta( $user_id, 'phone', $_POST['user-profile-phone'] );
}
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

