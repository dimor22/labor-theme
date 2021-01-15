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
                    <?php //var_dump($onboarding_data);?>


                    <div class="onboarding-info-page">
                        <section class="certs">
                            <h4><?php _e('Certifications', 'laborapp');?></h4>
                            <ul>
                            <?php foreach ($onboarding_data['certs'] as $cert ) : ?>
                                <?php if ( ! empty($cert) ) : ?>
                                <li>
                                    <?php echo $cert; ?>
                                </li>
                                <?php endif;?>
                            <?php endforeach;?>
                            </ul>
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
                        <section class="leadership">
                            <h4><?php _e('Leadership', 'laborapp');?></h4>
                            <p><?php echo __('Number of people confortable to lead', 'laborapp') . ': ' .
                                    $onboarding_data['leadership'];?></p>
                        </section>
                        <section class="more-info">
                            <h4><?php _e('More Info', 'laborapp');?></h4>
                            <p><?php echo $onboarding_data['more-info'];?></p>
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