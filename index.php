<?php get_header(); ?>
<!-- Navbar Section End -->
<div class="container-fluid">
    <!-- Hero Slider Section Start  -->
    <?php get_template_part('hero'); ?>
    <!-- Hero Slider Section End -->

    <!-- Blog post Section Start   -->
    <section class="row content">
        <div class="col-md-12">
            <div class="menu-container">
                <ul class="nav flex-nowrap filter-nav" id="scrollbar-horiz">
                    <li class="nav-item"><button class="nav-link active" aria-current="page" date-name="*"><?php _e("All", "pexels"); ?></button></li>
                    <?php
                    $cat_list = get_terms(array(
                        'taxonomy' => 'category'
                    ));
                    $counter = 0;
                    foreach ($cat_list as $cat) {
                        $counter++;
                    ?>
                        <li class="nav-item">
                            <button class="nav-link" aria-current="page" data-name="<?php echo "." . esc_attr($cat->slug); ?>">
                                <?php echo esc_html($cat->name); ?>
                            </button>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="gallery">
                <div id="grid" class="grid row row-cols-sm-2 row-cols-2 row-cols-md-4 g-4" data-masonry='{"percentPosition": true }'>
                    <?php
                    $pn = 0;
                    while (have_posts()) {
                        the_post();
                        $pn++;
                        // $cat =  get_the_category($id)[0]->slug;
                    ?>
                        <article class="grid-item col <?php
                                                        $cat_data =  get_the_category();
                                                        foreach ($cat_data as $cat) {
                                                            $cat = $cat->slug;
                                                            echo $cat . " ";
                                                        }
                                                        ?>">
                            <div class="card">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium-large', array('class' => 'card-img h-auto'));
                                }
                                ?>

                                <a href="<?php the_permalink(); ?>" data-bs-toggle="modal" data-bs-target="#post<?php echo esc_attr($pn); ?>">
                                    <div class="img-info-section">
                                        <div class="img-thumb">
                                            <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                        </div>
                                        <div class="img-info">
                                            <h4><?php the_author(); ?></h4>
                                            <p class="author_designation">
                                                <?php echo esc_html(get_theme_mod('pexels_author_designation')); ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <div class="modal fade-in-up" id="post<?php echo esc_attr($pn); ?>" tabindex="-1" aria-labelledby="post<?php echo esc_attr($pn); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </h6>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="<?php the_permalink(); ?>" id="iframe<?php echo esc_attr($pn); ?>" width="100%" height="1800px">
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
                <div class="text-center py-3 d-none">
                    <a href="<?php next_posts(); ?>" class="btn btn-info">Load More</a>
                </div>
            </div>

        </div>
    </section>
    <!-- Blog post Section End   -->

</div>
</main>


<?php get_footer(); ?>