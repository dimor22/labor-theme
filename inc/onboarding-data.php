<?php

function get_onboarding_data( $user_id ) {

    $data = [];


    /**
     * Update User meta
     */

    $data['leadership'] = get_user_meta($user_id, 'leadership', true);

    $data['skill']['safety-Trained'] =     get_user_meta($user_id, 'skill-safetyTrained', true);
    $data['skill']['read-drawings'] =  get_user_meta($user_id, 'skill-readdrawings', true);
    $data['skill']['shakeout'] =  get_user_meta($user_id, 'skill-shakeout', true);
    $data['skill']['forklift'] =  get_user_meta($user_id, 'skill-forklift', true);
    $data['skill']['connector'] =     get_user_meta($user_id, 'skill-connector', true);
    $data['skill']['welder'] =    get_user_meta($user_id, 'skill-welder', true);
    $data['skill']['columns'] =   get_user_meta($user_id, 'skill-columns', true);
    $data['skill']['beams'] =     get_user_meta($user_id, 'skill-beams', true);
    $data['skill']['ledger'] =    get_user_meta($user_id, 'skill-ledger', true);
    $data['skill']['joist'] =     get_user_meta($user_id, 'skill-joist', true);
    $data['skill']['bridging'] =  get_user_meta($user_id, 'skill-bridging', true);
    $data['skill']['place-deck'] =     get_user_meta($user_id, 'skill-placedeck', true);
    $data['skill']['attach-deck'] =    get_user_meta($user_id, 'skill-attachdeck', true);

    $data['certs'][] = get_user_meta($user_id, 'cert-osha10', true);
    $data['certs'][] = get_user_meta($user_id, 'cert-osha30', true);
    $data['certs'][] = get_user_meta($user_id, 'cert-forkliftCert', true);
    $data['certs'][] = get_user_meta($user_id, 'cert-manliftCert', true);
    $data['certs'][] = get_user_meta($user_id, 'cert-welderCert', true);

    $data['certs']['more'] = get_user_meta($user_id, 'whatcerts', true);
    $data['more-info'] = get_user_meta($user_id, 'more-info', true);


    return $data;
}