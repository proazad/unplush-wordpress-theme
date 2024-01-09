<?php get_header(); ?>
<!-- Navbar Section End -->
<div class="container-fluid">
    <!-- Hero Slider Section Start  -->
    <?php get_template_part('hero'); ?>
    <!-- Hero Slider Section End -->
    <!-- Blog post Section Start   -->
    <section class="row content">
        <div class="col-md-12">
            <div class="my-5 text-center">
                <h1>
                    <?php _e('You Search For: ');
                    the_search_query(); ?>
                    </h1>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <?php if (!have_posts()) {
            ?>
                <h1 class="text-center">
                    <?php _e("No Result Found!", "pexels"); ?>
                </h1>
            <?php
            }
            ?>
        </div>
        <div class="col-md-12">
            <div class="gallery">
                <div class="grid row row-cols-1 row-cols-md-4 g-4" data-masonry='{"percentPosition": true }'>
                    <?php
                    $pn = 0;
                    while (have_posts()) {
                        the_post();
                        $pn++;
                    ?>
                        <article class="grid-item col">
                            <div class="card">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('class' => 'card-img h-auto'));
                                }
                                ?>

                                <a href="<?php the_permalink(); ?>" data-bs-toggle="modal" data-bs-target="#post<?php echo esc_attr($pn); ?>">
                                    <div class="img-info-section">
                                        <div class="img-thumb">
                                            <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                        </div>
                                        <div class="img-info">
                                            <h4><?php the_author(); ?></h4>
                                            <?php the_author_meta('description') ?>
                                        </div>
                                    </div>
                                </a>
                                <div class="modal fade-in-up" id="post<?php echo esc_attr($pn); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalToggleLabel2">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="<?php the_permalink(); ?>" width="100%" height="1800px">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog post Section End   -->

</div>
</main>


<?php get_footer(); ?>