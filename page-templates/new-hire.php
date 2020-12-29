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
                    <?php if ( ! twentynineteen_can_show_post_thumbnail() ) : ?>
<!--                    <header class="entry-header">-->
<!--                        --><?php //get_template_part( 'template-parts/header/entry', 'header' ); ?>
<!--                    </header>-->
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->

                <!-- ONBOARDING FORM -->

                    <!-- Personal information -->

                    <!-- Certifications -->

                    <!-- Skill Level -->

                    <!-- Leading and training ( checkbox ) -->

                    <!-- Other info ( textbox )-->






                <!-- END OF ONBOARDING FORM -->


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