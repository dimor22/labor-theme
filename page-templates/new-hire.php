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
                              id="new-hire-form">_



                            <!-- Personal information -->
                            <h4><?php _e('Personal Information', 'laborapp');?></h4>
                            <div class="personal-info-section">
                                <input type="text" placeholder="<?php _e('First Name','laborapp');?>"
                                       name="personal-fname">
                                <input type="text" placeholder="<?php _e('Last Name','laborapp');?>"
                                       name="personal-lname">
                                <input type="email" placeholder="<?php _e('Email','laborapp');?>"
                                       name="personal-email">
                                <input type="tel" placeholder="<?php _e('Phone','laborapp');?>" name="personal-phone">
                            </div>




                            <!-- Certifications -->
                            <h4><?php _e('Certifications', 'laborapp');?></h4>
                            <p><?php _e('If you have certifications you must have a copy.', 'laborapp');?></p>
                            <div class="grid-two-columns">
                                <label for="osha10">Osha 10</label>
                                <input type="checkbox"
                                       id="osha10"
                                       value="osha10"
                                       name="cert-osha10">

                                <label for="osha30">Osha 30</label>
                                <input id="osha30" type="checkbox" value="osha30" name="cert-osha30">

                                <label for="forkliftCert">Forklift Cert</label>
                                <input id="forkliftCert" type="checkbox" value="forkliftCert" name="cert-forkliftCert">

                                <label for="manliftCert">Manlift Cert</label>
                                <input id="manliftCert" type="checkbox" value="manliftCert" name="cert-manliftCert">

                                <label for="welderCert">Welder Cert</label>
                                <input id="welderCert" type="checkbox" value="welderCert" name="cert-welderCert">
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

                            <!-- Shakeout / Layout -->
                            <div class="skill-row">
                                <p><?php _e('Shakeout / Layout', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="Shakeout1">1</label>
                                        <input id="Shakeout1" type="radio" value="1"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout2">2</label>
                                        <input id="Shakeout2" type="radio" value="2"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout3">3</label>
                                        <input id="Shakeout3" type="radio" value="3"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout4">4</label>
                                        <input id="Shakeout4" type="radio" value="4"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Sakeout5">5</label>
                                        <input id="Shakeout5" type="radio" value="5"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout6">6</label>
                                        <input id="Shakeout6" type="radio" value="6"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout7">7</label>
                                        <input id="Shakeout7" type="radio" value="7"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout8">8</label>
                                        <input id="Shakeout8" type="radio" value="8"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout9">9</label>
                                        <input id="Shakeout9" type="radio" value="9"
                                               name="skill-shakeout">
                                    </li>
                                    <li>
                                        <label for="Shakeout10">10</label>
                                        <input id="Shakeout10" type="radio" value="10"
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

                            <!-- Columns -->
                            <div class="skill-row">
                                <p><?php _e('Columns', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="columns1">1</label>
                                        <input id="columns1" type="radio" value="1"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns2">2</label>
                                        <input id="columns2" type="radio" value="2"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns3">3</label>
                                        <input id="columns3" type="radio" value="3"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns4">4</label>
                                        <input id="columns4" type="radio" value="4"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns5">5</label>
                                        <input id="columns5" type="radio" value="5"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns6">6</label>
                                        <input id="columns6" type="radio" value="6"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns7">7</label>
                                        <input id="columns7" type="radio" value="7"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns8">8</label>
                                        <input id="columns8" type="radio" value="8"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns9">9</label>
                                        <input id="columns9" type="radio" value="9"
                                               name="skill-columns">
                                    </li>
                                    <li>
                                        <label for="columns10">10</label>
                                        <input id="columns10" type="radio" value="10"
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
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams2">2</label>
                                        <input id="beams2" type="radio" value="2"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams3">3</label>
                                        <input id="beams3" type="radio" value="3"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams4">4</label>
                                        <input id="beams4" type="radio" value="4"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams5">5</label>
                                        <input id="beams5" type="radio" value="5"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams6">6</label>
                                        <input id="beams6" type="radio" value="6"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams7">7</label>
                                        <input id="beams7" type="radio" value="7"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams8">8</label>
                                        <input id="beams8" type="radio" value="8"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams9">9</label>
                                        <input id="beams9" type="radio" value="9"
                                               name="skill-beams">
                                    </li>
                                    <li>
                                        <label for="beams10">10</label>
                                        <input id="beams10" type="radio" value="10"
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
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger2">2</label>
                                        <input id="ledger2" type="radio" value="2"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger3">3</label>
                                        <input id="ledger3" type="radio" value="3"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger4">4</label>
                                        <input id="ledger4" type="radio" value="4"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger5">5</label>
                                        <input id="ledger5" type="radio" value="5"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger6">6</label>
                                        <input id="ledger6" type="radio" value="6"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger7">7</label>
                                        <input id="ledger7" type="radio" value="7"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger8">8</label>
                                        <input id="ledger8" type="radio" value="8"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger9">9</label>
                                        <input id="ledger9" type="radio" value="9"
                                               name="skill-ledger">
                                    </li>
                                    <li>
                                        <label for="ledger10">10</label>
                                        <input id="ledger10" type="radio" value="10"
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

                            <!-- Bridging / Frames -->
                            <div class="skill-row">
                                <p><?php _e('Bridging / Frames', 'laborapp');?></p>
                                <ul>
                                    <li>
                                        <label for="bridging1">1</label>
                                        <input id="bridging1" type="radio" value="1"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging2">2</label>
                                        <input id="bridging2" type="radio" value="2"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging3">3</label>
                                        <input id="bridging3" type="radio" value="3"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging4">4</label>
                                        <input id="bridging4" type="radio" value="4"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging5">5</label>
                                        <input id="bridging5" type="radio" value="5"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging6">6</label>
                                        <input id="bridging6" type="radio" value="6"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging7">7</label>
                                        <input id="bridging7" type="radio" value="7"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging8">8</label>
                                        <input id="bridging8" type="radio" value="8"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging9">9</label>
                                        <input id="bridging9" type="radio" value="9"
                                               name="skill-bridging">
                                    </li>
                                    <li>
                                        <label for="bridging10">10</label>
                                        <input id="bridging10" type="radio" value="10"
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
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck2">2</label>
                                        <input id="placedeck2" type="radio" value="2"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck3">3</label>
                                        <input id="placedeck3" type="radio" value="3"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck4">4</label>
                                        <input id="placedeck4" type="radio" value="4"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck5">5</label>
                                        <input id="placedeck5" type="radio" value="5"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck6">6</label>
                                        <input id="placedeck6" type="radio" value="6"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck7">7</label>
                                        <input id="placedeck7" type="radio" value="7"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck8">8</label>
                                        <input id="placedeck8" type="radio" value="8"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck9">9</label>
                                        <input id="placedeck9" type="radio" value="9"
                                               name="skill-placedeck">
                                    </li>
                                    <li>
                                        <label for="placedeck10">10</label>
                                        <input id="placedeck10" type="radio" value="10"
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
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck2">2</label>
                                        <input id="attachdeck2" type="radio" value="2"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck3">3</label>
                                        <input id="attachdeck3" type="radio" value="3"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck4">4</label>
                                        <input id="attachdeck4" type="radio" value="4"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck5">5</label>
                                        <input id="attachdeck5" type="radio" value="5"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck6">6</label>
                                        <input id="attachdeck6" type="radio" value="6"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck7">7</label>
                                        <input id="attachdeck7" type="radio" value="7"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck8">8</label>
                                        <input id="attachdeck8" type="radio" value="8"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck9">9</label>
                                        <input id="attachdeck9" type="radio" value="9"
                                               name="skill-attachdeck">
                                    </li>
                                    <li>
                                        <label for="placedeck10">10</label>
                                        <input id="attachdeck10" type="radio" value="10"
                                               name="skill-attachdeck">
                                    </li>
                                </ul>
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
                            <h4><?php _e('More', 'laborapp');?></h4>
                            <p><?php _e('Other helpful information about yourself', 'laborapp'); ?></p>
                            <textarea name="more-info"></textarea>


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