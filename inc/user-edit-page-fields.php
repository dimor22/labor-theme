<?php
/**
 * ADD EXTRA FIELDS TO USER EDIT PAGE
 */
function extra_user_profile_fields( $user ) { ?>
    <h2><?php _e( "(New Hire) Extra profile information", "laborapp" ); ?></h2>

    <table class="form-table">
        <tr>
            <th><label for="user-profile-phone"><?php _e( "Phone", 'laborapp' ); ?></label></th>
            <td>
                <input type="text" name="personal-phone" id="personal-phone"
                       value="<?php echo esc_attr( get_the_author_meta( 'personal-phone', $user->ID ) ); ?>"
                       class="regular-text"/><br>
                <span class="description"><?php _e( "Please enter your phone number.", 'laborapp' ); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="user-profile-certifications"><?php _e( "Certifications", 'laborapp' ); ?></label></th>
            <td>
                <div class="grid-two-columns">
                    <label for="osha10">Osha 10</label>
                    <input type="checkbox"
                           id="osha10"
                           value="osha10"
                            <?php if ( ! empty( get_the_author_meta( 'cert-osha10', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-osha10">

                    <label for="osha30">Osha 30</label>
                    <input id="osha30"
                           type="checkbox"
                           value="osha30"
                        <?php if ( ! empty( get_the_author_meta( 'cert-osha30', $user->ID ) ) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="cert-osha30">

                    <label for="forkliftCert">Forklift Cert</label>
                    <input id="forkliftCert"
                           type="checkbox"
                           value="forkliftCert"
                            <?php if ( ! empty( get_the_author_meta( 'cert-forkliftCert', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-forkliftCert">

                    <label for="manliftCert">Manlift Cert</label>
                    <input id="manliftCert"
                           type="checkbox"
                           value="manliftCert"
                            <?php if ( ! empty( get_the_author_meta( 'cert-manliftCert', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-manliftCert">

                    <label for="welderCert">Welder Cert</label>
                    <input id="welderCert"
                           type="checkbox"
                           value="welderCert"
                            <?php if ( ! empty( get_the_author_meta( 'cert-welderCert', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-welderCert">
                </div>
            </td>
        </tr>
        <tr>
            <th><label for="user-profile-more-certifications">
                    <?php _e( "More Certifications", 'laborapp' ); ?>
                </label>
            </th>
            <td>
                <textarea type="text"
                          name="whatcerts"
                          id="user-profile-more-certifications"
                          class="regular-text"><?php
                        echo esc_html(trim( get_the_author_meta( 'whatcerts', $user->ID )));
                    ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="user-skill-list"><?php _e( "Skill List", 'laborapp' ); ?></label></th>
            <td>

                <!-- Safety Trained -->
                <div class="skill-row">
                    <p><?php _e('Safety Trained', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="safetyTrained1">1</label>
                            <input id="safetyTrained1" type="radio" value="1"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained2">2</label>
                            <input id="safetyTrained2" type="radio" value="2"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained3">3</label>
                            <input id="safetyTrained3" type="radio" value="3"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained4">4</label>
                            <input id="safetyTrained4" type="radio" value="4"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained5">5</label>
                            <input id="safetyTrained5" type="radio" value="5"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained6">6</label>
                            <input id="safetyTrained6" type="radio" value="6"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained7">7</label>
                            <input id="safetyTrained7" type="radio" value="7"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained8">8</label>
                            <input id="safetyTrained8" type="radio" value="8"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained9">9</label>
                            <input id="safetyTrained9" type="radio" value="9"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                        <li>
                            <label for="safetyTrained10">10</label>
                            <input id="safetyTrained10" type="radio" value="10"
                                   <?php if ( get_the_author_meta( 'skill-safetyTrained', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-safetyTrained">
                        </li>
                    </ul>
                </div>

                <!-- Read Drawings -->
                <div class="skill-row">
                    <p><?php _e('Read Drawings', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="readdrawings1">1</label>
                            <input id="readdrawings1" type="radio" value="1"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings2">2</label>
                            <input id="readdrawings2" type="radio" value="2"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings3">3</label>
                            <input id="readdrawings3" type="radio" value="3"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings4">4</label>
                            <input id="readdrawings4" type="radio" value="4"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings5">5</label>
                            <input id="readdrawings5" type="radio" value="5"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings6">6</label>
                            <input id="readdrawings6" type="radio" value="6"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings7">7</label>
                            <input id="readdrawings7" type="radio" value="7"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings8">8</label>
                            <input id="readdrawings8" type="radio" value="8"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings9">9</label>
                            <input id="readdrawings9" type="radio" value="9"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                        <li>
                            <label for="readdrawings10">10</label>
                            <input id="readdrawings10" type="radio" value="10"
                                   <?php if ( get_the_author_meta( 'skill-readdrawings', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-readdrawings">
                        </li>
                    </ul>
                </div>

                <!-- Shakeout / Layout -->
                <div class="skill-row">
                    <p><?php _e('Shakeout / Layout', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="Shakeout1">1</label>
                            <input id="Shakeout1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout2">2</label>
                            <input id="Shakeout2" type="radio" value="2"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout3">3</label>
                            <input id="Shakeout3" type="radio" value="3"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout4">4</label>
                            <input id="Shakeout4" type="radio" value="4"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Sakeout5">5</label>
                            <input id="Shakeout5" type="radio" value="5"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout6">6</label>
                            <input id="Shakeout6" type="radio" value="6"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout7">7</label>
                            <input id="Shakeout7" type="radio" value="7"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout8">8</label>
                            <input id="Shakeout8" type="radio" value="8"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout9">9</label>
                            <input id="Shakeout9" type="radio" value="9"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                        <li>
                            <label for="Shakeout10">10</label>
                            <input id="Shakeout10" type="radio" value="10"
                                   <?php if ( get_the_author_meta( 'skill-shakeout', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shakeout">
                        </li>
                    </ul>
                </div>

                <!-- Forklift operator -->
                <div class="skill-row">
                    <p><?php _e('Forklift Operator', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="Forklift1">1</label>
                            <input id="Forklift1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift2">2</label>
                            <input id="Forklift2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift3">3</label>
                            <input id="Forklift3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift4">4</label>
                            <input id="Forklift4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift5">5</label>
                            <input id="Forklift5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift6">6</label>
                            <input id="Forklift6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift7">7</label>
                            <input id="Forklift7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift8">8</label>
                            <input id="Forklift8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift9">9</label>
                            <input id="Forklift9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                        <li>
                            <label for="Forklift10">10</label>
                            <input id="Forklift10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-forklift', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-forklift">
                        </li>
                    </ul>
                </div>

                <!-- Connector -->
                <div class="skill-row">
                    <p><?php _e('Connector', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="Connector1">1</label>
                            <input id="Connector1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector2">2</label>
                            <input id="Connector2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector3">3</label>
                            <input id="Connector3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector4">4</label>
                            <input id="Connector4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector5">5</label>
                            <input id="Connector5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector6">6</label>
                            <input id="Connector6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector7">7</label>
                            <input id="Connector7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector8">8</label>
                            <input id="Connector8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector9">9</label>
                            <input id="Connector9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                        <li>
                            <label for="Connector10">10</label>
                            <input id="Connector10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-connector', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-connector">
                        </li>
                    </ul>
                </div>

                <!-- Welder -->
                <div class="skill-row">
                    <p><?php _e('Welder', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="welder1">1</label>
                            <input id="welder1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder2">2</label>
                            <input id="welder2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder3">3</label>
                            <input id="welder3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder4">4</label>
                            <input id="welder4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder5">5</label>
                            <input id="welder5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder6">6</label>
                            <input id="welder6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder7">7</label>
                            <input id="welder7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder8">8</label>
                            <input id="welder8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder9">9</label>
                            <input id="welder9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                        <li>
                            <label for="welder10">10</label>
                            <input id="welder10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-welder', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-welder">
                        </li>
                    </ul>
                </div>

                <!-- Columns -->
                <div class="skill-row">
                    <p><?php _e('Columns', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="columns1">1</label>
                            <input id="columns1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns2">2</label>
                            <input id="columns2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns3">3</label>
                            <input id="columns3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns4">4</label>
                            <input id="columns4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns5">5</label>
                            <input id="columns5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns6">6</label>
                            <input id="columns6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns7">7</label>
                            <input id="columns7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns8">8</label>
                            <input id="columns8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns9">9</label>
                            <input id="columns9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                        <li>
                            <label for="columns10">10</label>
                            <input id="columns10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-columns', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-columns">
                        </li>
                    </ul>
                </div>

                <!-- Beams -->
                <div class="skill-row">
                    <p><?php _e('Beams', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="beams1">1</label>
                            <input id="beams1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams2">2</label>
                            <input id="beams2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams3">3</label>
                            <input id="beams3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams4">4</label>
                            <input id="beams4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams5">5</label>
                            <input id="beams5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams6">6</label>
                            <input id="beams6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams7">7</label>
                            <input id="beams7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams8">8</label>
                            <input id="beams8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams9">9</label>
                            <input id="beams9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                        <li>
                            <label for="beams10">10</label>
                            <input id="beams10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-beams', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-beams">
                        </li>
                    </ul>
                </div>

                <!-- Ledger -->
                <div class="skill-row">
                    <p><?php _e('Ledger', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="ledger1">1</label>
                            <input id="ledger1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger2">2</label>
                            <input id="ledger2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger3">3</label>
                            <input id="ledger3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger4">4</label>
                            <input id="ledger4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger5">5</label>
                            <input id="ledger5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger6">6</label>
                            <input id="ledger6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger7">7</label>
                            <input id="ledger7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger8">8</label>
                            <input id="ledger8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger9">9</label>
                            <input id="ledger9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                        <li>
                            <label for="ledger10">10</label>
                            <input id="ledger10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-ledger', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-ledger">
                        </li>
                    </ul>
                </div>

                <!-- Joist / Girters -->
                <div class="skill-row">
                    <p><?php _e('Joist / Girters', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="joist1">1</label>
                            <input id="joist1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist2">2</label>
                            <input id="joist2" type="radio" value="2"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist3">3</label>
                            <input id="joist3" type="radio" value="3"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist4">4</label>
                            <input id="joist4" type="radio" value="4"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist5">5</label>
                            <input id="joist5" type="radio" value="5"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist6">6</label>
                            <input id="joist6" type="radio" value="6"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist7">7</label>
                            <input id="joist7" type="radio" value="7"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist8">8</label>
                            <input id="joist8" type="radio" value="8"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist9">9</label>
                            <input id="joist9" type="radio" value="9"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                        <li>
                            <label for="joist10">10</label>
                            <input id="joist10" type="radio" value="10"
                                   <?php if ( get_the_author_meta( 'skill-joist', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-joist">
                        </li>
                    </ul>
                </div>

                <!-- Bridging / Frames -->
                <div class="skill-row">
                    <p><?php _e('Bridging / Frames', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="bridging1">1</label>
                            <input id="bridging1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging2">2</label>
                            <input id="bridging2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging3">3</label>
                            <input id="bridging3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging4">4</label>
                            <input id="bridging4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging5">5</label>
                            <input id="bridging5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging6">6</label>
                            <input id="bridging6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging7">7</label>
                            <input id="bridging7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging8">8</label>
                            <input id="bridging8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging9">9</label>
                            <input id="bridging9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                        <li>
                            <label for="bridging10">10</label>
                            <input id="bridging10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-bridging', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-bridging">
                        </li>
                    </ul>
                </div>

                <!-- Place Deck -->
                <div class="skill-row">
                    <p><?php _e('Place Deck', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="placedeck1">1</label>
                            <input id="placedeck1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck2">2</label>
                            <input id="placedeck2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck3">3</label>
                            <input id="placedeck3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck4">4</label>
                            <input id="placedeck4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck5">5</label>
                            <input id="placedeck5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck6">6</label>
                            <input id="placedeck6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck7">7</label>
                            <input id="placedeck7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck8">8</label>
                            <input id="placedeck8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck9">9</label>
                            <input id="placedeck9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                        <li>
                            <label for="placedeck10">10</label>
                            <input id="placedeck10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-placedeck', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-placedeck">
                        </li>
                    </ul>
                </div>

                <!-- Attach Deck -->
                <div class="skill-row">
                    <p><?php _e('Attach Deck', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="placedeck1">1</label>
                            <input id="attachdeck1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck2">2</label>
                            <input id="attachdeck2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck3">3</label>
                            <input id="attachdeck3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck4">4</label>
                            <input id="attachdeck4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck5">5</label>
                            <input id="attachdeck5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck6">6</label>
                            <input id="attachdeck6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck7">7</label>
                            <input id="attachdeck7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck8">8</label>
                            <input id="attachdeck8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck9">9</label>
                            <input id="attachdeck9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                        <li>
                            <label for="placedeck10">10</label>
                            <input id="attachdeck10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-attachdeck', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-attachdeck">
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('Leadership', 'laborapp');?></h3>
            </th>
            <td>
                <div class="grid-two-columns">
                    <label for="leadership1"><?php _e('Prefer not to', 'laborapp'); ?></label>
                    <input id="leadership1" type="radio" value="0"
                           <?php if ( get_the_author_meta( 'leadership', $user->ID ) === 0 ) : ?>
                           checked="checked"
                           <?php endif;?>
                           name="leadership">
                    <label for="leadership2"><?php _e('1 other person', 'laborapp'); ?></label>
                    <input id="leadership2" type="radio" value="1"
                        <?php if ( get_the_author_meta( 'leadership', $user->ID ) == 1 ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="leadership">
                    <label for="leadership2"><?php _e('2 other people', 'laborapp'); ?></label>
                    <input id="leadership2" type="radio" value="2"
                        <?php if ( get_the_author_meta( 'leadership', $user->ID ) == 2 ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="leadership">
                    <label for="leadership3"><?php _e('3 other people', 'laborapp'); ?></label>
                    <input id="leadership3" type="radio" value="3"
                        <?php if ( get_the_author_meta( 'leadership', $user->ID ) == 3 ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="leadership">
                    <label for="leadership4"><?php _e('4 other people', 'laborapp'); ?></label>
                    <input id="leadership4" type="radio" value="4"
                        <?php if ( get_the_author_meta( 'leadership', $user->ID ) == 4 ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="leadership">
                    <label for="leadership5"><?php _e('5 or more other people', 'laborapp'); ?></label>
                    <input id="leadership5" type="radio" value="5"
                        <?php if ( get_the_author_meta( 'leadership', $user->ID ) == 5 ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="leadership">
                </div>
            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('More', 'laborapp');?></h3>
            </th>
            <td>
                <textarea name="more-info"><?php
                    echo esc_html(trim( get_the_author_meta( 'more-info', $user->ID ))); ?></textarea>
            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('Skills Chart', 'laborapp');?></h3>
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
                <h3><?php _e('Performance Chart', 'laborapp');?></h3>
            </th>
            <td>
                <div style="text-align: center;" class="card profile-performance-card">
                    <canvas id="user-performance-gauge" data-value="<?php echo get_user_performance( $user_id );?>"></canvas>
                </div>

            </td>
        </tr>
        <tr>
            <th>
                <h3><?php _e('Behavior Chart', 'laborapp');?></h3>
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

    $table_name = $wpdb->prefix . 'user_reports';
    $query = "SELECT * FROM $table_name WHERE `user_id` = %d";
    $user_meta = $wpdb->get_results($wpdb->prepare($query, $user_id), 'OBJECT');

    if ( ! empty($user_meta) ) {
        foreach ($user_meta as $meta) {
            $data['safety']['labels'][]       = $meta->date;
            $data['safety']['values'][]       = $meta->safety;

            $data['quality']['labels'][]       = $meta->date;
            $data['quality']['values'][]       = $meta->quality;

            $data['leadership']['labels'][]    = $meta->date;
            $data['leadership']['values'][]    = $meta->leadership;

            $data['trust']['labels'][]          = $meta->date;
            $data['trust']['values'][]          = $meta->trust;
        }

        return json_encode($data);
    }

    return false;
}

function get_user_performance($user_id){
    global $wpdb;

    $user_performance_value = 0;
    $total_points = 0;
    $table_name = $wpdb->prefix . 'user_reports';
    $query = "SELECT * FROM $table_name WHERE `user_id` = %d";
    $user_meta = $wpdb->get_results($wpdb->prepare($query, $user_id), 'OBJECT');


    if ( ! empty($user_meta) ) {
        
        foreach ($user_meta as $meta) {
            $total_points += $meta->points;
        }
        return floor($total_points / count($user_meta));
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

    update_user_meta( $user_id, 'personal-phone', $_POST['personal-phone'] );

    /* new hire user fields */
    update_user_meta( $user_id, 'osha10', $_POST['osha10'] );
    update_user_meta( $user_id, 'osha30', $_POST['osha30'] );
    update_user_meta( $user_id, 'cert-forkliftCert', $_POST['cert-forkliftCert'] );
    update_user_meta( $user_id, 'cert-manliftCert', $_POST['cert-manliftCert'] );
    update_user_meta( $user_id, 'cert-welderCert', $_POST['cert-welderCert'] );
    update_user_meta( $user_id, 'whatcerts', $_POST['whatcerts'] );

    update_user_meta( $user_id, 'skill-safetyTrained', $_POST['skill-safetyTrained'] );
    update_user_meta( $user_id, 'skill-readdrawings', $_POST['skill-readdrawings'] );
    update_user_meta( $user_id, 'skill-shakeout', $_POST['skill-shakeout'] );
    update_user_meta( $user_id, 'skill-forklift', $_POST['skill-forklift'] );
    update_user_meta( $user_id, 'skill-connector', $_POST['skill-connector'] );
    update_user_meta( $user_id, 'skill-welder', $_POST['skill-welder'] );
    update_user_meta( $user_id, 'skill-columns', $_POST['skill-columns'] );
    update_user_meta( $user_id, 'skill-beams', $_POST['skill-beams'] );
    update_user_meta( $user_id, 'skill-ledger', $_POST['skill-ledger'] );
    update_user_meta( $user_id, 'skill-joist', $_POST['skill-joist'] );
    update_user_meta( $user_id, 'skill-bridging', $_POST['skill-bridging'] );
    update_user_meta( $user_id, 'skill-placedeck', $_POST['skill-placedeck'] );
    update_user_meta( $user_id, 'skill-attachdeck', $_POST['skill-attachdeck'] );

    update_user_meta( $user_id, 'leadership', $_POST['leadership'] );
    update_user_meta( $user_id, 'more-info', $_POST['more-info'] );




}
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

