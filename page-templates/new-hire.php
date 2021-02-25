<?php
/**
 * Template Name: New Hire
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php

            // Start the Loop.
            while ( have_posts() ) :
                the_post();

                /**
                 * Template content start
                 */
                ?>


                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>

                        <!-- ONBOARDING FORM -->
                        <form action="<?php echo admin_url( 'admin-post.php' ); ?>"
                              method="POST"
                              id="new-hire-form">



                            <!-- Personal information -->
                            <h4><?php _e('Personal Information', 'laborapp');?></h4>
                            <div class="personal-info-section">
                                <input type="text" placeholder="<?php _e('First Name','laborapp');?>"
                                       name="personal-fname">
                                <input type="text" placeholder="<?php _e('Last Name','laborapp');?>"
                                       name="personal-lname">
                                <input type="text" placeholder="<?php _e('Nick Name','laborapp');?>"
                                       name="nickname">
                                <input type="email" placeholder="<?php _e('Email','laborapp');?>"
                                       name="personal-email">
                                <input type="tel" placeholder="<?php _e('Phone','laborapp');?>" name="personal-phone">
                            </div>



                            <!--  Password -->
                            <h4><?php _e('Account Password', 'laborapp'); ?></h4>
                            <p><?php _e('With this password you will be able to login to your account and review the status of your application.', 'laborapp'); ?></p>
                            <div class="personal-password">
                                <label for="personal-pwd"><?php _e('Password', 'laborapp'); ?></label>
                                <input type="password" id="personal-password" name="password">
                                <input type='checkbox' id='toggle-pwd-visibility' value='0'>
                                <span id='toggleText'><?php _e('Show', 'laborapp'); ?></span>
                            </div>




                            <!-- Certifications -->
                            <h4><?php _e('Certifications', 'laborapp');?></h4>
                            <p><?php _e('If you have certifications you must have a copy.', 'laborapp');?></p>
                            <div class="grid-two-columns">
                                <label for="osha10">Osha 10</label>
                                <input type="checkbox"
                                       id="osha10"
                                       value="Osha 10"
                                       name="cert-osha10">

                                <label for="osha30">Osha 30</label>
                                <input id="osha30"
                                       type="checkbox"
                                       value="Osha 30"
                                       name="cert-osha30">

                                <label for="forkliftCert">Forklift Cert</label>
                                <input id="forkliftCert"
                                       type="checkbox"
                                       value="Forklift"
                                       name="cert-forkliftCert">

                                <label for="manliftCert">Manlift Cert</label>
                                <input id="manliftCert"
                                       type="checkbox"
                                       value="Manlift"
                                       name="cert-manliftCert">

                                <label for="welderCert">Welder Cert</label>
                                <input id="welderCert"
                                       type="checkbox"
                                       value="Welder"
                                       name="cert-welderCert">
                            </div>


                            <label for="whatCerts">What Certs</label>
                            <textarea id="whatCerts" name="whatcerts"></textarea>



                            <!-- Skill Level -->
                            <h4><?php _e('Skills', 'laborapp');?></h4>
                            <p><?php _e('What is your Skill Level.', 'laborapp');?></p>

                            <!-- Safety Trained -->
                            <div class="skill-row">
                                <p><?php _e('Safety Trained', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="safetyTrained1">1</label>
                                        <input id="safetyTrained1" type="radio" value="1"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained2">2</label>
                                        <input id="safetyTrained2" type="radio" value="2"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained3">3</label>
                                        <input id="safetyTrained3" type="radio" value="3"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained4">4</label>
                                        <input id="safetyTrained4" type="radio" value="4"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained5">5</label>
                                        <input id="safetyTrained5" type="radio" value="5"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained6">6</label>
                                        <input id="safetyTrained6" type="radio" value="6"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained7">7</label>
                                        <input id="safetyTrained7" type="radio" value="7"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained8">8</label>
                                        <input id="safetyTrained8" type="radio" value="8"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained9">9</label>
                                        <input id="safetyTrained9" type="radio" value="9"
                                               name="skill-safetyTrained">
                                    </li>
                                    <li>
                                        <label for="safetyTrained10">10</label>
                                        <input id="safetyTrained10" type="radio" value="10"
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
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings2">2</label>
                                        <input id="readdrawings2" type="radio" value="2"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings3">3</label>
                                        <input id="readdrawings3" type="radio" value="3"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings4">4</label>
                                        <input id="readdrawings4" type="radio" value="4"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings5">5</label>
                                        <input id="readdrawings5" type="radio" value="5"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings6">6</label>
                                        <input id="readdrawings6" type="radio" value="6"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings7">7</label>
                                        <input id="readdrawings7" type="radio" value="7"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings8">8</label>
                                        <input id="readdrawings8" type="radio" value="8"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings9">9</label>
                                        <input id="readdrawings9" type="radio" value="9"
                                               name="skill-readdrawings">
                                    </li>
                                    <li>
                                        <label for="readdrawings10">10</label>
                                        <input id="readdrawings10" type="radio" value="10"
                                               name="skill-readdrawings">
                                    </li>
                                </ul>
                            </div>

                            <!-- Field / Layout -->
                            <div class="skill-row">
                                <p><?php _e('Field / Layout', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="Fieldlayout1">1</label>
                                        <input id="Fieldlayout1" type="radio" value="1"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout2">2</label>
                                        <input id="Fieldlayout2" type="radio" value="2"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout3">3</label>
                                        <input id="Fieldlayout3" type="radio" value="3"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout4">4</label>
                                        <input id="Fieldlayout4" type="radio" value="4"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Sakeout5">5</label>
                                        <input id="Fieldlayout5" type="radio" value="5"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout6">6</label>
                                        <input id="Fieldlayout6" type="radio" value="6"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout7">7</label>
                                        <input id="Fieldlayout7" type="radio" value="7"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout8">8</label>
                                        <input id="Fieldlayout8" type="radio" value="8"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout9">9</label>
                                        <input id="Fieldlayout9" type="radio" value="9"
                                               name="skill-fieldlayout">
                                    </li>
                                    <li>
                                        <label for="Fieldlayout10">10</label>
                                        <input id="Fieldlayout10" type="radio" value="10"
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
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift2">2</label>
                                        <input id="Forklift2" type="radio" value="2"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift3">3</label>
                                        <input id="Forklift3" type="radio" value="3"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift4">4</label>
                                        <input id="Forklift4" type="radio" value="4"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift5">5</label>
                                        <input id="Forklift5" type="radio" value="5"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift6">6</label>
                                        <input id="Forklift6" type="radio" value="6"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift7">7</label>
                                        <input id="Forklift7" type="radio" value="7"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift8">8</label>
                                        <input id="Forklift8" type="radio" value="8"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift9">9</label>
                                        <input id="Forklift9" type="radio" value="9"
                                               name="skill-forklift">
                                    </li>
                                    <li>
                                        <label for="Forklift10">10</label>
                                        <input id="Forklift10" type="radio" value="10"
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
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector2">2</label>
                                        <input id="Connector2" type="radio" value="2"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector3">3</label>
                                        <input id="Connector3" type="radio" value="3"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector4">4</label>
                                        <input id="Connector4" type="radio" value="4"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector5">5</label>
                                        <input id="Connector5" type="radio" value="5"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector6">6</label>
                                        <input id="Connector6" type="radio" value="6"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector7">7</label>
                                        <input id="Connector7" type="radio" value="7"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector8">8</label>
                                        <input id="Connector8" type="radio" value="8"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector9">9</label>
                                        <input id="Connector9" type="radio" value="9"
                                               name="skill-connector">
                                    </li>
                                    <li>
                                        <label for="Connector10">10</label>
                                        <input id="Connector10" type="radio" value="10"
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
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder2">2</label>
                                        <input id="welder2" type="radio" value="2"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder3">3</label>
                                        <input id="welder3" type="radio" value="3"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder4">4</label>
                                        <input id="welder4" type="radio" value="4"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder5">5</label>
                                        <input id="welder5" type="radio" value="6"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder6">6</label>
                                        <input id="welder6" type="radio" value="6"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder7">7</label>
                                        <input id="welder7" type="radio" value="7"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder8">8</label>
                                        <input id="welder8" type="radio" value="8"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder9">9</label>
                                        <input id="welder9" type="radio" value="9"
                                               name="skill-welder">
                                    </li>
                                    <li>
                                        <label for="welder10">10</label>
                                        <input id="welder10" type="radio" value="10"
                                               name="skill-welder">
                                    </li>
                                </ul>
                            </div>

                            <!-- Shop Layout Fit Up -->
                            <div class="skill-row">
                                <p><?php _e('Shop Layout Fit Up', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="shoplayout1">1</label>
                                        <input id="shoplayout1" type="radio" value="1"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout2">2</label>
                                        <input id="shoplayout2" type="radio" value="2"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout3">3</label>
                                        <input id="shoplayout3" type="radio" value="3"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout4">4</label>
                                        <input id="shoplayout4" type="radio" value="4"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout5">5</label>
                                        <input id="shoplayout5" type="radio" value="5"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout6">6</label>
                                        <input id="shoplayout6" type="radio" value="6"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout7">7</label>
                                        <input id="shoplayout7" type="radio" value="7"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout8">8</label>
                                        <input id="shoplayout8" type="radio" value="8"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout9">9</label>
                                        <input id="shoplayout9" type="radio" value="9"
                                               name="skill-shoplayout">
                                    </li>
                                    <li>
                                        <label for="shoplayout10">10</label>
                                        <input id="shoplayout10" type="radio" value="10"
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
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist2">2</label>
                                        <input id="joist2" type="radio" value="2"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist3">3</label>
                                        <input id="joist3" type="radio" value="3"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist4">4</label>
                                        <input id="joist4" type="radio" value="4"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist5">5</label>
                                        <input id="joist5" type="radio" value="5"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist6">6</label>
                                        <input id="joist6" type="radio" value="6"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist7">7</label>
                                        <input id="joist7" type="radio" value="7"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist8">8</label>
                                        <input id="joist8" type="radio" value="8"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist9">9</label>
                                        <input id="joist9" type="radio" value="9"
                                               name="skill-joist">
                                    </li>
                                    <li>
                                        <label for="joist10">10</label>
                                        <input id="joist10" type="radio" value="10"
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
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck2">2</label>
                                        <input id="weldeck2" type="radio" value="2"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck3">3</label>
                                        <input id="weldeck3" type="radio" value="3"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck4">4</label>
                                        <input id="weldeck4" type="radio" value="4"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck5">5</label>
                                        <input id="weldeck5" type="radio" value="5"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck6">6</label>
                                        <input id="weldeck6" type="radio" value="6"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck7">7</label>
                                        <input id="weldeck7" type="radio" value="7"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck8">8</label>
                                        <input id="weldeck8" type="radio" value="8"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck9">9</label>
                                        <input id="weldeck9" type="radio" value="9"
                                               name="skill-weldeck">
                                    </li>
                                    <li>
                                        <label for="weldeck10">10</label>
                                        <input id="weldeck10" type="radio" value="10"
                                               name="skill-weldeck">
                                    </li>
                                </ul>
                            </div>

                            <!-- Stairs and Rail -->
                            <div class="skill-row">
                                <p><?php _e('Stairs and Rail', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="stairsrails1">1</label>
                                        <input id="stairsrails1" type="radio" value="1"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails2">2</label>
                                        <input id="stairsrails2" type="radio" value="2"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails3">3</label>
                                        <input id="stairsrails3" type="radio" value="3"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails4">4</label>
                                        <input id="stairsrails4" type="radio" value="4"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails5">5</label>
                                        <input id="stairsrails5" type="radio" value="5"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails6">6</label>
                                        <input id="stairsrails6" type="radio" value="6"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails7">7</label>
                                        <input id="stairsrails7" type="radio" value="7"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails8">8</label>
                                        <input id="stairsrails8" type="radio" value="8"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails9">9</label>
                                        <input id="stairsrails9" type="radio" value="9"
                                               name="skill-stairsrails">
                                    </li>
                                    <li>
                                        <label for="stairsrails10">10</label>
                                        <input id="stairsrails10" type="radio" value="10"
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
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc2">2</label>
                                        <input id="familiaraisc2" type="radio" value="2"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc3">3</label>
                                        <input id="familiaraisc3" type="radio" value="3"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc4">4</label>
                                        <input id="familiaraisc4" type="radio" value="4"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc5">5</label>
                                        <input id="familiaraisc5" type="radio" value="5"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc6">6</label>
                                        <input id="familiaraisc6" type="radio" value="6"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc7">7</label>
                                        <input id="familiaraisc7" type="radio" value="7"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc8">8</label>
                                        <input id="familiaraisc8" type="radio" value="8"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc9">9</label>
                                        <input id="familiaraisc9" type="radio" value="9"
                                               name="skill-familiaraisc">
                                    </li>
                                    <li>
                                        <label for="familiaraisc10">10</label>
                                        <input id="familiaraisc10" type="radio" value="10"
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
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms2">2</label>
                                        <input id="computerprograms2" type="radio" value="2"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms3">3</label>
                                        <input id="computerprograms3" type="radio" value="3"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms4">4</label>
                                        <input id="computerprograms4" type="radio" value="4"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms5">5</label>
                                        <input id="computerprograms5" type="radio" value="5"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms6">6</label>
                                        <input id="computerprograms6" type="radio" value="6"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms7">7</label>
                                        <input id="computerprograms7" type="radio" value="7"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms8">8</label>
                                        <input id="computerprograms8" type="radio" value="8"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms9">9</label>
                                        <input id="computerprograms9" type="radio" value="9"
                                               name="skill-computerprograms">
                                    </li>
                                    <li>
                                        <label for="computerprograms10">10</label>
                                        <input id="computerprograms10" type="radio" value="10"
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
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty2">2</label>
                                        <input id="familiarclarkcounty2" type="radio" value="2"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty3">3</label>
                                        <input id="familiarclarkcounty3" type="radio" value="3"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty4">4</label>
                                        <input id="familiarclarkcounty4" type="radio" value="4"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty5">5</label>
                                        <input id="familiarclarkcounty5" type="radio" value="5"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty6">6</label>
                                        <input id="familiarclarkcounty6" type="radio" value="6"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty7">7</label>
                                        <input id="familiarclarkcounty7" type="radio" value="7"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty8">8</label>
                                        <input id="familiarclarkcounty8" type="radio" value="8"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty9">9</label>
                                        <input id="familiarclarkcounty9" type="radio" value="9"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                    <li>
                                        <label for="familiarclarkcounty10">10</label>
                                        <input id="familiarclarkcounty10" type="radio" value="10"
                                               name="skill-familiarclarkcounty">
                                    </li>
                                </ul>
                            </div>
                            
                            
                            <!-- PPE -->
                            <h4><?php _e('PPE', 'laborapp'); ?></h4>
                            <div class="grid-two-columns">
                                <label for="hard-hat"><?php _e('Hard Hat', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="hard-hat"
                                       value="Hard Hat"
                                       name="ppe-hard-hat">

                                <label for="hard-vest"><?php _e('Vest', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="hard-vest"
                                       value="Vest"
                                       name="ppe-vest">

                                <label for="safety-glasses"><?php _e('Safety Glasses', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="safety-glasses"
                                       value="Safety Glasses"
                                       name="ppe-safety-glasses">

                                <label for="harness"><?php _e('Harness', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="harness"
                                       value="Harness"
                                       name="ppe-harness">

                                <label for="weldy-hood"><?php _e('Weldy Hood', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="weldy-hood"
                                       value="Weldy Hood"
                                       name="ppe-weldy-hood">

                            </div>

                            <!-- TOOLS -->
                            <h4><?php _e('Tools', 'laborapp'); ?></h4>
                            <div class="grid-two-columns">
                                <label for="tape-measure"><?php _e('Tape Measure', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="tape-measure"
                                       value="Tape Measure"
                                       name="tools-tape-measure">

                                <label for="spud-wrench"><?php _e('Spud Wrench', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="spud-wrench"
                                       value="Spud Wrench"
                                       name="tools-spud-wrench">

                                <label for="sleeve-tool"><?php _e('Sleeve Tool', 'laborapp'); ?></label>
                                <input type="checkbox"
                                       id="sleeve-tool"
                                       value="Sleeve Tool"
                                       name="tools-sleeve-tool">
                            </div>

                            <!-- HISTORY -->
                            <h4><?php _e('Work History', 'laborapp'); ?></h4>
                            <div class="grid-two-columns">
                                <label for="steel-shop"><?php _e('Years in Steel Shop', 'laborapp'); ?></label>
                                <input type="text"
                                       id="steel-shop"
                                       name="history-steel-shop">

                                <label for="harness-steel"><?php _e('Years in Field Hanging Steel', 'laborapp');?></label>
                                <input type="text"
                                       id="harness-steel"
                                       name="history-harness-steel">
                            </div>

                            <!-- PRIOR JOBS -->
                            <h4><?php _e('Prior Steel Companies', 'laborapp'); ?></h4>
                            <h6><?php _e('Company', 'laborapp'); ?> 1</h6>
                            <div class="personal-info-section">
                                <input type="text"
                                       placeholder="<?php _e('Company Name', 'laborapp'); ?>"
                                       id="company1name"
                                       name="company1[name]">
                                <input type="text"
                                       placeholder="<?php _e('Years Worked', 'laborapp'); ?>"
                                       id="company1time"
                                       name="company1[time]">
                                <input type="text"
                                       placeholder="<?php _e('Wage', 'laborapp'); ?>"
                                       id="company1wage"
                                       name="company1[wage]">
                            </div>

                            <hr/>

                            <h6><?php _e('Company', 'laborapp'); ?> 2</h6>
                            <div class="personal-info-section">
                                <input type="text"
                                       placeholder="<?php _e('Company Name', 'laborapp'); ?>"
                                       id="company2name"
                                       name="company2[name]">
                                <input type="text"
                                       placeholder="<?php _e('Years Worked', 'laborapp'); ?>"
                                       id="company2time"
                                       name="company2[time]">
                                <input type="text"
                                       placeholder="<?php _e('Wage', 'laborapp'); ?>"
                                       id="company2wage"
                                       name="company2[wage]">
                            </div>

                            <hr/>

                            <h6><?php _e('Company', 'laborapp'); ?> 3</h6>
                            <div class="personal-info-section">
                                <input type="text"
                                       placeholder="<?php _e('Company Name', 'laborapp'); ?>"
                                       id="company3name"
                                       name="company3[name]">
                                <input type="text"
                                       placeholder="<?php _e('Years Worked', 'laborapp'); ?>"
                                       id="company3time"
                                       name="company3[time]">
                                <input type="text"
                                       placeholder="<?php _e('Wage', 'laborapp'); ?>"
                                       id="company3wage"
                                       name="company3[wage]">
                            </div>


                            <!-- Leading and training ( checkbox ) -->
                            <h4><?php _e('Leadership', 'laborapp');?></h4>
                            <p><?php _e('How Confortable are you leading and training', 'laborapp'); ?></p>
                            <div class="grid-two-columns">
                                <label for="leadership0"><?php _e('Prefer not to', 'laborapp'); ?></label>
                                <input id="leadership0" type="radio" value="0"
                                       name="leadership">
                                <label for="leadership1"><?php _e('1 other person', 'laborapp'); ?></label>
                                <input id="leadership1" type="radio" value="1"
                                       name="leadership">
                                <label for="leadership2"><?php _e('2 other people', 'laborapp'); ?></label>
                                <input id="leadership2" type="radio" value="2"
                                       name="leadership">
                                <label for="leadership3"><?php _e('3 other people', 'laborapp'); ?></label>
                                <input id="leadership3" type="radio" value="3"
                                       name="leadership">
                                <label for="leadership4"><?php _e('4 other people', 'laborapp'); ?></label>
                                <input id="leadership4" type="radio" value="4"
                                       name="leadership">
                                <label for="leadership5"><?php _e('5 or more other people', 'laborapp'); ?></label>
                                <input id="leadership5" type="radio" value="5"
                                       name="leadership">
                            </div>


                            <!-- Other info ( textbox )-->
                            <h4><?php _e('More Info', 'laborapp');?></h4>
                            <p><?php _e('Other helpful information about yourself', 'laborapp'); ?></p>
                            <textarea name="more-info"></textarea>

                            <p><?php _e('If Hired, When would you be available?', 'laborapp'); ?></p>
                            <textarea name="available"></textarea>

                            <input type="hidden" name="action" value="new_hire_form">

                            <div class="submit-btn">
                                <input type="submit" value="<?php _e('Register', 'laborapp'); ?>" class="labor-btn mt-1">
                            </div>

                        </form>

                        <!-- END OF ONBOARDING FORM -->

                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                /**
                 * Template content ends
                 */

            endwhile; // End the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();