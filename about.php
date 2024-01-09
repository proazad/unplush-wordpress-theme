<?php
/*
Template Name: About Page
*/
get_header();
 ?>

<main id="main" class="site-main">
<?php get_template_part('hero'); ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><div class="entry-content">
                <?php the_content(); ?>
            </div><?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post */
                                __( 'Edit %s', 'textdomain' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><?php endif; ?>

        </article><?php endwhile; // End of the loop. ?>

</main><?php get_footer(); ?>
