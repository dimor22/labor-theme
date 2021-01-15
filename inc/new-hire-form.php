<?php

function new_hire_form_func()
{
    $form = $_REQUEST['payload'];

    $fd = [];

    foreach ( $form['formData'] as $field ) {
        $fd[ $field['name'] ] = $field['value'];
    }

    if ( check_ajax_referer( 'new_hire_form_nonce', 'security', false ) == false ) {
        wp_send_json_error('Security did not pass.', 400);
    }

    /**
     * Create user
     */

    $userdata = array(
        'user_login'    => $fd['personal-lname'] . ucfirst($fd['personal-fname']),
        'first_name'    => $fd['personal-fname'],
        'last_name'     => $fd['personal-lname'],
        'user_email'    => $fd['personal-email'],
        'user_pass'     => '1234567890'
    );

    $user_id = wp_insert_user( $userdata ) ;

    // On Error.
    if ( is_wp_error( $user_id ) ) {
        wp_send_json_error($user_id->get_error_message());
    }


    /**
     * Update User meta
     */

    // Radio inputs (mandatory)
    update_user_meta($user_id, 'personal-phone', $fd['personal-phone']);
    update_user_meta($user_id, 'leadership', $fd['leadership']);

    update_user_meta($user_id, 'skill-safetyTrained', $fd['skill-safetyTrained']);
    update_user_meta($user_id, 'skill-readdrawings', $fd['skill-readdrawings']);
    update_user_meta($user_id, 'skill-shakeout', $fd['skill-shakeout']);
    update_user_meta($user_id, 'skill-forklift', $fd['skill-forklift']);
    update_user_meta($user_id, 'skill-connector', $fd['skill-connector']);
    update_user_meta($user_id, 'skill-welder', $fd['skill-welder']);
    update_user_meta($user_id, 'skill-columns', $fd['skill-columns']);
    update_user_meta($user_id, 'skill-beams', $fd['skill-beams']);
    update_user_meta($user_id, 'skill-ledger', $fd['skill-ledger']);
    update_user_meta($user_id, 'skill-joist', $fd['skill-joist']);
    update_user_meta($user_id, 'skill-bridging', $fd['skill-bridging']);
    update_user_meta($user_id, 'skill-placedeck', $fd['skill-placedeck']);
    update_user_meta($user_id, 'skill-attachdeck', $fd['skill-attachdeck']);

    update_user_meta($user_id, 'cert-osha10', $fd['cert-osha10']);
    update_user_meta($user_id, 'cert-osha30', $fd['cert-osha30']);
    update_user_meta($user_id, 'cert-forkliftCert', $fd['cert-forkliftCert']);
    update_user_meta($user_id, 'cert-manliftCert', $fd['cert-manliftCert']);
    update_user_meta($user_id, 'cert-welderCert', $fd['cert-welderCert']);


    // Textarea inputs (optionals)
    if ( ! empty( $fd['whatcerts']) ) {
        update_user_meta($user_id, 'whatcerts', $fd['whatcerts']);
    }

    if ( ! empty( $fd['more-info']) ) {
        update_user_meta($user_id, 'more-info', $fd['more-info']);
    }

    // LOG IN USER
    $creds = array(
        'user_login'    => $fd['personal-lname'] . ucfirst($fd['personal-fname']),
        'user_password' => '1234567890',
        'remember'      => true
    );
    wp_signon($creds, true);

    wp_die();

}

add_action('wp_ajax_nopriv_new_hire_form', 'new_hire_form_func');
add_action('wp_ajax_new_hire_form', 'new_hire_form_func');