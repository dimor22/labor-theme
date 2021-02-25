<?php
/**
 * Template Name: WP USER PAGE
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
                    <?php the_title( '<h1 class="entry-title">', '</h1>' );?>

                    <?php the_content(); ?>
                    <?php $onboarding_data = get_onboarding_data( get_current_user_id() ); ?>


                    <div class="onboarding-info-page">
                        <section class="certs">
                            <h4><?php _e('Certifications', 'laborapp');?></h4>
                            <?php if ( ! empty($onboarding_data['cert']) && count($onboarding_data['cert']) > 0 ) : ?>
                                <ul>
                                <?php foreach ($onboarding_data['cert'] as $cert ) : ?>
                                    <li>
                                        <?php echo $cert; ?>
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            <?php else : ?>
                                <p><?php _e('No Certifications Yet.', 'laborapp'); ?></p>
                            <?php endif;?>

                        </section>
                        <section class="skills">
                            <h4><?php _e('Skills', 'laborapp');?></h4>
                            <ul>
                            <?php foreach ($onboarding_data['skill'] as $name => $value ) : ?>
                                    <li>
                                        <span class="skill-name"><?php echo ucfirst($name); ?></span>
                                        <span class="skill-value"><?php echo ucfirst($value);?></span>
                                    </li>
                            <?php endforeach;?>
                            </ul>
                        </section>
                        <section class="ppe">
                            <h4><?php _e('PPE', 'laborapp'); ?></h4>
                                <?php if ( ! empty($onboarding_data['ppe']) && count($onboarding_data['ppe']) > 0 ) : ?>
                                    <ul>
                                        <?php foreach ($onboarding_data['ppe'] as $cert ) : ?>
                                            <li>
                                                <?php echo $cert; ?>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php else : ?>
                                    <p><?php _e('No PPE.', 'laborapp'); ?></p>
                                <?php endif;?>
                        </section>
                        <section class="tools">
                            <h4><?php _e('Tools', 'laborapp'); ?></h4>
                                <?php if ( ! empty($onboarding_data['tools']) && count($onboarding_data['tools']) > 0 )
                                    : ?>
                                    <ul>
                                        <?php foreach ($onboarding_data['tools'] as $tool ) : ?>
                                            <li>
                                                <?php echo $tool; ?>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php else : ?>
                                    <p><?php _e('No Tools.', 'laborapp'); ?></p>
                                <?php endif;?>
                        </section>
                        <section class="history">
                            <h4><?php _e('History', 'laborapp'); ?></h4>
                            <p><?php _e('Years in Steel Shop', 'laborapp'); ?>
                            <?php
                                    if ( ! empty($onboarding_data['history']['steel-shop']) && count($onboarding_data['history']['steel-shop']) > 0 ) {
                                        echo ': ' . $onboarding_data['history']['steel-shop'];
                                    } else {
                                        echo ': 0';
                                    }
                                ?>
                            </p>
                            <p><?php _e('Years in Field Hanging Steel', 'laborapp'); ?>
                            <?php
                                if ( ! empty($onboarding_data['history']['harness-steel']) && count($onboarding_data['history']['harness-steel']) > 0 ) {
                                    echo ': ' . $onboarding_data['history']['harness-steel'];
                                } else {
                                    echo ': 0';
                                }
                            ?>
                            </p>
                        </section>
                        <section class="leadership">
                            <h4><?php _e('Leadership', 'laborapp');?></h4>
                            <p><?php echo __('Number of people confortable to lead', 'laborapp') . ': ' .
                                    $onboarding_data['leadership'];?></p>
                        </section>
                        <section class="more-info">
                            <h4><?php _e('More Info', 'laborapp');?></h4>
                            <?php if ( ! empty($onboarding_data['more-info']) && count($onboarding_data['more-info']) > 0 ): ?>
                                <p><?php echo $onboarding_data['more-info'];?></p>
                                <?php else : ?>
                                <p><?php _e('Empty', 'laborapp'); ?></p>
                            <?php endif;?>
                        </section>
                    </div>
                </div>
            </article>


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