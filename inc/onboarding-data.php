<?php

function get_onboarding_data( $user_id ) {

    $data = [];


    /**
     * Update User meta
     */

    $data['leadership'] = get_user_meta($user_id, 'leadership', true);

    // ** SKILLS ** //
    buildDataArray($data, $user_id, 'safetyTrained', 'skill');
    buildDataArray($data, $user_id, 'readdrawings', 'skill');
    buildDataArray($data, $user_id, 'fieldlayout', 'skill');
    buildDataArray($data, $user_id, 'forklift', 'skill');
    buildDataArray($data, $user_id, 'connector', 'skill');
    buildDataArray($data, $user_id, 'welder', 'skill');
    buildDataArray($data, $user_id, 'shoplayout', 'skill');
    buildDataArray($data, $user_id, 'joist', 'skill');
    buildDataArray($data, $user_id, 'weldeck', 'skill');
    buildDataArray($data, $user_id, 'stairsrails', 'skill');
    buildDataArray($data, $user_id, 'familiaraisc', 'skill');
    buildDataArray($data, $user_id, 'computerprograms', 'skill');
    buildDataArray($data, $user_id, 'familiarclarkcounty', 'skill');

    // ** PPE ** //
    buildDataArray($data, $user_id, 'hard-hat', 'ppe');
    buildDataArray($data, $user_id, 'vest', 'ppe');
    buildDataArray($data, $user_id, 'safety-glasses', 'ppe');
    buildDataArray($data, $user_id, 'harness', 'ppe');
    buildDataArray($data, $user_id, 'weldy-hood','ppe');

    // ** TOOLS ** //
    buildDataArray($data, $user_id, 'tape-measure', 'tools');
    buildDataArray($data, $user_id, 'spud-wrench', 'tools');
    buildDataArray($data, $user_id, 'sleeve-tool', 'tools');

    // ** HISTORY ** //
    buildDataArray($data, $user_id, 'steel-shop', 'history');
    buildDataArray($data, $user_id, 'harness-steel', 'history');

    // ** CERTS ** //
    buildDataArray($data, $user_id, 'osha10', 'cert');
    buildDataArray($data, $user_id, 'osha30', 'cert');
    buildDataArray($data, $user_id, 'forkliftCert', 'cert');
    buildDataArray($data, $user_id, 'manliftCert', 'cert');
    buildDataArray($data, $user_id, 'welderCert', 'cert');

    // ** EMPLOYERS ** //
    $comp1 = get_user_meta($user_id, 'company1');
    if ( ! empty($comp1) ) {
        $data['comp1'] = unserialize($comp1[0]);
    }

    $comp2 = get_user_meta($user_id, 'company2');
    if ( ! empty($comp2) ) {
        $data['comp2'] = unserialize($comp2[0]);
    }
    $comp3 = get_user_meta($user_id, 'company3');
    if ( ! empty($comp3) ) {
        $data['comp3'] = unserialize($comp3[0]);
    }

    $data['certs']['more'] = get_user_meta($user_id, 'whatcerts', true);
    $data['more-info'] = get_user_meta($user_id, 'more-info', true);


    return $data;
}

function buildDataArray( &$data_array, $user_id, $name, $type) {

    $field = get_user_meta($user_id, $type . '-' . $name, true);

    if ( ! empty( $field ) ) {
        $data_array[$type][$name] = $field;
    }

    return false;
}