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
                    <header class="entry-header">
                        <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
                    </header>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->

                    <?php if ( get_edit_post_link() ) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                /* translators: %s: Post title. Only visible to screen readers. */
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
                            '</span>'
                        );
                        ?>
                    </footer><!-- .entry-footer -->
                    <?php endif; ?>
                </article><!-- #post-<?php the_ID(); ?> -->


                <?php
                /**
                 * Template content ends
                 */



                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }

            endwhile; // End the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();