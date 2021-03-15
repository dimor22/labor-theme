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
        <tr id="user-profile-certifications">
            <th><label for="user-profile-certifications"><?php _e( "Certifications", 'laborapp' ); ?></label></th>
            <td>
                <div class="grid-two-columns">
                    <label for="osha10">Osha 10</label>
                    <input type="checkbox"
                           id="osha10"
                            <?php if ( ! empty( get_the_author_meta( 'cert-osha10', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-osha10">

                    <label for="osha30">Osha 30</label>
                    <input id="osha30"
                           type="checkbox"
                        <?php if ( ! empty( get_the_author_meta( 'cert-osha30', $user->ID ) ) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="cert-osha30">

                    <label for="forkliftCert">Forklift Cert</label>
                    <input id="forkliftCert"
                           type="checkbox"
                            <?php if ( ! empty( get_the_author_meta( 'cert-forkliftCert', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-forkliftCert">

                    <label for="manliftCert">Manlift Cert</label>
                    <input id="manliftCert"
                           type="checkbox"
                            <?php if ( ! empty( get_the_author_meta( 'cert-manliftCert', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-manliftCert">

                    <label for="welderCert">Welder Cert</label>
                    <input id="welderCert"
                           type="checkbox"
                            <?php if ( ! empty( get_the_author_meta( 'cert-welderCert', $user->ID ) ) ) : ?>
                                checked="checked"
                            <?php endif;?>
                           name="cert-welderCert">
                </div>
            </td>
        </tr>
        <tr id="user-profile-more-certifications">
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
        <tr id="user-profile-skill-list">
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

                <!-- Field / Layout -->
                <div class="skill-row">
                    <p><?php _e('Field / Layout', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="fieldlayout1">1</label>
                            <input id="fieldlayout1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout2">2</label>
                            <input id="fieldlayout2" type="radio" value="2"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout3">3</label>
                            <input id="fieldlayout3" type="radio" value="3"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout4">4</label>
                            <input id="fieldlayout4" type="radio" value="4"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="Sakeout5">5</label>
                            <input id="fieldlayout5" type="radio" value="5"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout6">6</label>
                            <input id="fieldlayout6" type="radio" value="6"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout7">7</label>
                            <input id="fieldlayout7" type="radio" value="7"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout8">8</label>
                            <input id="fieldlayout8" type="radio" value="8"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout9">9</label>
                            <input id="fieldlayout9" type="radio" value="9"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
                        </li>
                        <li>
                            <label for="fieldlayout10">10</label>
                            <input id="fieldlayout10" type="radio" value="10"
                                   <?php if ( get_the_author_meta( 'skill-fieldlayout', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-fieldlayout">
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

                <!-- Shop Layout -->
                <div class="skill-row">
                    <p><?php _e('Shop Layout Fit Up', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="shoplayout1">1</label>
                            <input id="shoplayout1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout2">2</label>
                            <input id="shoplayout2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout3">3</label>
                            <input id="shoplayout3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout4">4</label>
                            <input id="shoplayout4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout5">5</label>
                            <input id="shoplayout5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout6">6</label>
                            <input id="shoplayout6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout7">7</label>
                            <input id="shoplayout7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout8">8</label>
                            <input id="shoplayout8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout9">9</label>
                            <input id="shoplayout9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                        <li>
                            <label for="shoplayout10">10</label>
                            <input id="shoplayout10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-shoplayout', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-shoplayout">
                        </li>
                    </ul>
                </div>

                <!-- Joist / Deck -->
                <div class="skill-row">
                    <p><?php _e('Joist / Deck', 'laborapp');?></p>
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


                <!-- Weld Deck -->
                <div class="skill-row">
                    <p><?php _e('Weld Deck', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="weldeck1">1</label>
                            <input id="weldeck1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck2">2</label>
                            <input id="weldeck2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck3">3</label>
                            <input id="weldeck3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck4">4</label>
                            <input id="weldeck4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck5">5</label>
                            <input id="weldeck5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck6">6</label>
                            <input id="weldeck6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck7">7</label>
                            <input id="weldeck7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck8">8</label>
                            <input id="weldeck8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck9">9</label>
                            <input id="weldeck9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                        <li>
                            <label for="weldeck10">10</label>
                            <input id="weldeck10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-weldeck', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-weldeck">
                        </li>
                    </ul>
                </div>

                <!-- Stairs and Rails -->
                <div class="skill-row">
                    <p><?php _e('Stairs and Rail', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="stairsrails1">1</label>
                            <input id="stairsrails1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails2">2</label>
                            <input id="stairsrails2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails3">3</label>
                            <input id="stairsrails3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails4">4</label>
                            <input id="stairsrails4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails5">5</label>
                            <input id="stairsrails5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails6">6</label>
                            <input id="stairsrails6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails7">7</label>
                            <input id="stairsrails7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails8">8</label>
                            <input id="stairsrails8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails9">9</label>
                            <input id="stairsrails9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                        <li>
                            <label for="stairsrails10">10</label>
                            <input id="stairsrails10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-stairsrails', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-stairsrails">
                        </li>
                    </ul>
                </div>

                <!-- Familiar with AISC, AWS, Codes -->
                <div class="skill-row">
                    <p><?php _e('Familiar with AISC, AWS, Codes', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="familiaraisc1">1</label>
                            <input id="familiaraisc1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc2">2</label>
                            <input id="familiaraisc2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc3">3</label>
                            <input id="familiaraisc3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc4">4</label>
                            <input id="familiaraisc4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc5">5</label>
                            <input id="familiaraisc5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc6">6</label>
                            <input id="familiaraisc6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc7">7</label>
                            <input id="familiaraisc7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc8">8</label>
                            <input id="familiaraisc8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc9">9</label>
                            <input id="familiaraisc9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                        <li>
                            <label for="familiaraisc10">10</label>
                            <input id="familiaraisc10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-familiaraisc', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiaraisc">
                        </li>
                    </ul>
                </div>

                <!-- Computer Programs Excel / Word -->
                <div class="skill-row">
                    <p><?php _e('Computer Programs Excel / Word', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="computerprograms1">1</label>
                            <input id="computerprograms1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms2">2</label>
                            <input id="computerprograms2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms3">3</label>
                            <input id="computerprograms3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms4">4</label>
                            <input id="computerprograms4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms5">5</label>
                            <input id="computerprograms5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms6">6</label>
                            <input id="computerprograms6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms7">7</label>
                            <input id="computerprograms7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms8">8</label>
                            <input id="computerprograms8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms9">9</label>
                            <input id="computerprograms9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                        <li>
                            <label for="computerprograms10">10</label>
                            <input id="computerprograms10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-computerprograms', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-computerprograms">
                        </li>
                    </ul>
                </div>

                <!-- Familiar with AISC / Clark County Approved Fabricator QC Requirements -->
                <div class="skill-row">
                    <p><?php _e('Familiar with AISC / Clark County Approved Fabricator QC Requirements', 'laborapp');?></p>
                    <ul>
                        <li>
                            <label for="familiarclarkcounty1">1</label>
                            <input id="familiarclarkcounty1" type="radio" value="1"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 1 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty2">2</label>
                            <input id="familiarclarkcounty2" type="radio" value="2"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 2 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty3">3</label>
                            <input id="familiarclarkcounty3" type="radio" value="3"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 3 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty4">4</label>
                            <input id="familiarclarkcounty4" type="radio" value="4"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 4 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty5">5</label>
                            <input id="familiarclarkcounty5" type="radio" value="5"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 5 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty6">6</label>
                            <input id="familiarclarkcounty6" type="radio" value="6"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 6 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty7">7</label>
                            <input id="familiarclarkcounty7" type="radio" value="7"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 7 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty8">8</label>
                            <input id="familiarclarkcounty8" type="radio" value="8"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 8 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty9">9</label>
                            <input id="familiarclarkcounty9" type="radio" value="9"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 9 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                        <li>
                            <label for="familiarclarkcounty10">10</label>
                            <input id="familiarclarkcounty10" type="radio" value="10"
                                <?php if ( get_the_author_meta( 'skill-familiarclarkcounty', $user->ID ) == 10 ) : ?>
                                    checked="checked"
                                <?php endif;?>
                                   name="skill-familiarclarkcounty">
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        <tr id="user-profile-ppe">
            <th>
                <h3><?php _e('PPE', 'laborapp');?></h3>
            </th>
            <td>
                <div class="grid-two-columns">
                    <label for="ppe-hard-hat"><?php _e('Hard Hat', 'laborapp'); ?></label>
                    <input id="ppe-hard-hat"
                           type="checkbox"
                           value="Hard Hat"
                        <?php if ( ! empty(get_the_author_meta( 'ppe-hard-hat', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="ppe-hard-hat">
                    <label for="ppe-vest"><?php _e('Vest', 'laborapp'); ?></label>
                    <input id="ppe-vest"
                           type="checkbox"
                           value="Vest"
                        <?php if ( !empty(get_the_author_meta( 'ppe-vest', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="ppe-vest">
                    <label for="ppe-safety-glasses"><?php _e('Safety Glasses', 'laborapp'); ?></label>
                    <input id="ppe-safety-glasses"
                           type="checkbox"
                           value="Safety Glasses"
                        <?php if ( !empty(get_the_author_meta( 'ppe-safety-glasses', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="ppe-safety-glasses">
                    <label for="ppe-harness"><?php _e('Harness', 'laborapp'); ?></label>
                    <input id="ppe-harness"
                           type="checkbox"
                           value="Harness"
                        <?php if ( ! empty(get_the_author_meta( 'ppe-harness', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="ppe-harness">
                    <label for="ppe-weldy-hood"><?php _e('Weldy Hood', 'laborapp'); ?></label>
                    <input id="ppe-weldy-hood"
                           type="checkbox"
                           value="Weldy Hood"
                        <?php if ( ! empty(get_the_author_meta( 'ppe-weldy-hood', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="ppe-weldy-hood">

                </div>
            </td>
        </tr>
        <tr id="user-profile-tools">
            <th>
                <h3><?php _e('Tools', 'laborapp');?></h3>
            </th>
            <td>
                <div class="grid-two-columns">
                    <label for="tools-tape-measure"><?php _e('Tape Measure', 'laborapp'); ?></label>
                    <input id="tools-tape-measure"
                           type="checkbox"
                           value="Tape Measure"
                        <?php if ( ! empty(get_the_author_meta( 'tools-tape-measure', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="tools-tape-measure">
                    <label for="tools-spud-wrench"><?php _e('Spud Wrench', 'laborapp'); ?></label>
                    <input id="tools-spud-wrench"
                           type="checkbox"
                           value="Spud Wrench"
                        <?php if ( !empty(get_the_author_meta( 'tools-spud-wrench', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="tools-spud-wrench">
                    <label for="tools-sleeve-tool"><?php _e('Sleeve tool', 'laborapp'); ?></label>
                    <input id="tools-sleeve-tool"
                           type="checkbox"
                           value="Sleeve tool"
                        <?php if ( !empty(get_the_author_meta( 'tools-sleeve-tool', $user->ID )) ) : ?>
                            checked="checked"
                        <?php endif;?>
                           name="tools-sleeve-tool">
                </div>
            </td>
        </tr>
        <tr id="user-profile-work-history">
            <th>
                <h3><?php _e('Work History', 'laborapp'); ?></h3>
            </th>
            <td>
                <div class="grid-two-columns">
                    <label for="history-steel-shop"><?php _e('Years in Steel Shop', 'laborapp'); ?>:</label>
                    <input id="history-steel-shop"
                           type="text"
                        <?php if ( !empty(get_the_author_meta( 'history-steel-shop', $user->ID )) ) : ?>
                            value="<?php echo get_the_author_meta( 'history-steel-shop', $user->ID );?>"
                        <?php else : ?>
                            value="0"
                        <?php endif;?>
                           name="history-steel-shop">
                    <label for="history-harness-steel"><?php _e('Years in Field Hanging Steel', 'laborapp'); ?>:</label>
                    <input id="history-harness-steel"
                           type="text"
                        <?php if ( !empty(get_the_author_meta( 'history-harness-steel', $user->ID )) ) : ?>
                            value="<?php echo get_the_author_meta( 'history-harness-steel', $user->ID );?>"
                        <?php else : ?>
                            value="0"
                        <?php endif;?>
                           name="history-harness-steel">
                </div>
            </td>
        </tr>
        <tr id="user-profile-employer-experience">
            <th>
                <h3><?php _e('Employer Experience', 'laborapp'); ?></h3>
            </th>
            <td>
                <?php
                $comp1_message = __('No Data.','laborapp');
                $comp2_message = __('No Data.','laborapp');
                $comp3_message = __('No Data.','laborapp');
                $comp1 = unserialize(get_the_author_meta('company1', $user->ID));
                $comp2 = unserialize(get_the_author_meta('company2', $user->ID));
                $comp3 = unserialize(get_the_author_meta('company3', $user->ID));
                if ( ! empty($comp1)) {
                    $comp1_message = "{$comp1['name']} &middot;
                                        {$comp1['time']} Years &middot;
                                        Wage {$comp1['wage']}";
                }
                if ( ! empty($comp2)) {
                    $comp2_message = "{$comp2['name']} &middot;
                                            {$comp2['time']} Years &middot;
                                            Wage {$comp2['wage']}";
                }
                if ( ! empty($comp3)) {
                    $comp3_message = "{$comp3['name']} &middot;
                                            {$comp3['time']} Years &middot;
                                            Wage {$comp3['wage']}";
                }
                ?>
                <p>Company 1: <?php echo $comp1_message?></p>
                <p>Company 2: <?php echo $comp2_message;?></p>
                <p>Company 3: <?php echo $comp3_message;?></p>
            </td>
        </tr>
        <tr id="user-profile-leadership">
            <th>
                <h3><?php _e('Leadership', 'laborapp');?></h3>
            </th>
            <td>
                <div class="grid-two-columns">
                    <label for="leadership0"><?php _e('Prefer not to', 'laborapp'); ?></label>
                    <input id="leadership0" type="radio" value="0"
                           <?php if ( get_the_author_meta( 'leadership', $user->ID ) === 0 ) : ?>
                           checked="checked"
                           <?php endif;?>
                           name="leadership">
                    <label for="leadership1"><?php _e('1 other person', 'laborapp'); ?></label>
                    <input id="leadership1" type="radio" value="1"
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
        <tr id="user-profile-more">
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
                $options['Safety Trained'] = get_the_author_meta( 'skill-safetyTrained', $user_id );
                $options['Read Drawings'] = get_the_author_meta( 'skill-readdrawings', $user_id );
                $options['Field Layout'] = get_the_author_meta( 'skill-fieldlayout', $user_id );
                $options['Forklift'] = get_the_author_meta( 'skill-forklift', $user_id );
                $options['Connector'] = get_the_author_meta( 'skill-connector', $user_id );
                $options['Welder'] = get_the_author_meta( 'skill-welder', $user_id );
                $options['Shop Layout'] = get_the_author_meta( 'skill-shoplayout', $user_id );
                $options['Joist / Deck'] = get_the_author_meta( 'skill-joist', $user_id );
                $options['Weld Deck'] = get_the_author_meta( 'skill-weldeck', $user_id );
                $options['Stairs'] = get_the_author_meta( 'skill-stairsrails', $user_id );
                $options['Codes'] = get_the_author_meta( 'skill-familiaraisc', $user_id );
                $options['Computer'] = get_the_author_meta( 'skill-computerprograms', $user_id );
                $options['Clark County'] = get_the_author_meta( 'skill-familiarclarkcounty', $user_id );

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
    update_user_meta( $user_id, 'skill-fieldlayout', $_POST['skill-fieldlayout'] );
    update_user_meta( $user_id, 'skill-forklift', $_POST['skill-forklift'] );
    update_user_meta( $user_id, 'skill-connector', $_POST['skill-connector'] );
    update_user_meta( $user_id, 'skill-welder', $_POST['skill-welder'] );
    update_user_meta( $user_id, 'skill-shoplayout', $_POST['skill-shoplayout'] );
    update_user_meta( $user_id, 'skill-joist', $_POST['skill-joist'] );
    update_user_meta( $user_id, 'skill-weldeck', $_POST['skill-weldeck'] );
    update_user_meta( $user_id, 'skill-stairsrails', $_POST['skill-stairsrails'] );
    update_user_meta($user_id, 'skill-familiaraisc', $_POST['skill-familiaraisc']);
    update_user_meta($user_id, 'skill-computerprograms', $_POST['skill-computerprograms']);
    update_user_meta($user_id, 'skill-familiarclarkcounty', $_POST['skill-familiarclarkcounty']);

    update_user_meta($user_id, 'ppe-hard-hat', $_POST['ppe-hard-hat']);
    update_user_meta($user_id, 'ppe-vest', $_POST['ppe-vest']);
    update_user_meta($user_id, 'ppe-safety-glasses', $_POST['ppe-safety-glasses']);
    update_user_meta($user_id, 'ppe-harness', $_POST['ppe-harness']);
    update_user_meta($user_id, 'ppe-weldy-hood', $_POST['ppe-weldy-hood']);

    update_user_meta($user_id, 'tools-tape-measure', $_POST['tools-tape-measure']);
    update_user_meta($user_id, 'tools-spud-wrench', $_POST['tools-spud-wrench']);
    update_user_meta($user_id, 'tools-sleeve-tool', $_POST['tools-sleeve-tool']);

    update_user_meta($user_id, 'history-steel-shop', $_POST['history-steel-shop']);
    update_user_meta($user_id, 'history-harness-steel', $_POST['history-harness-steel']);


    update_user_meta( $user_id, 'leadership', $_POST['leadership'] );
    update_user_meta( $user_id, 'more-info', $_POST['more-info'] );




}
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

