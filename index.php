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
                                                <header class="container d-flex justify-content-between align-items-center">
                                                    <div class="author-header">
                                                        <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                                        <div class="single-author-head">
                                                            <h5><?php the_author(); ?></h5>
                                                            <small>
                                                                <?php _e('Available for Hire','pexels');?>
                                                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-check" class="svg-inline--fa fa-circle-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                                    <path fill="currentColor" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM371.8 211.8l-128 128C238.3 345.3 231.2 348 224 348s-14.34-2.719-19.81-8.188l-64-64c-10.91-10.94-10.91-28.69 0-39.63c10.94-10.94 28.69-10.94 39.63 0L224 280.4l108.2-108.2c10.94-10.94 28.69-10.94 39.63 0C382.7 183.1 382.7 200.9 371.8 211.8z">
                                                                    </path>
                                                                </svg>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    
                                                    <a href="<?php echo esc_url(get_theme_mod('pexels_user_upwork_profile')); ?>" target="_blank" class="btn btn-small contact-btn">Contact me</a>
                                                    <h6 class="modal-title" id="">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </h6>
                                                    
                                                </header>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="<?php the_permalink(); ?>" id="iframe<?php echo esc_attr($pn); ?>" width="100%" height="900px">
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
                <div class="text-center py-3">
                    <a href="<?php next_posts(); ?>" class="btn btn-info">Load More</a>
                </div>
            </div>

        </div>
    </section>
    <!-- Blog post Section End   -->

</div>
</main>


<?php get_footer(); ?>