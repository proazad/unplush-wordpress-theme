<?php
require_once(get_theme_file_path('inc/customizer.php'));
require_once(get_theme_file_path('inc/tgm.php'));

/**
 * Cache Busting 
 */

if ('http://localhost/pexels' == site_url()) {
    define('VERSION', time());
} else {
    define('VERSION', wp_get_theme()->get('Version'));
}

/**
 * Themes Essential Bootstrapping 
 */
function pexels_theme_bootstrapping()
{
    load_theme_textdomain('pexels');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    $custom_logo = array(
        'width' => 70,
        'height' => 'auto',
        'flex-width' => true,
        'flex-height' => true
    );
    add_theme_support('custom-logo', $custom_logo);
    add_image_size('after-before', '600', '400', false);
    add_theme_support('html5', array('search-form', 'comment-list'));
    add_theme_support('automatic_feed_link');
}
add_action('after_setup_theme', 'pexels_theme_bootstrapping');

/**
 * Theme Assets 
 */
function pexels_assets()
{
    // Load Styles 
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('/assets/lib/bootstrap/css/bootstrap.min.css'), false, VERSION);
    wp_enqueue_style('twentytwenty-css', get_theme_file_uri('assets/lib/beforeafter/css/twentytwenty.css'), false, VERSION);
    wp_enqueue_style('common-css', get_theme_file_uri('/assets/css/common.css'), false, VERSION);

    wp_enqueue_style('main-style', get_stylesheet_uri(), false, VERSION);

    // Load Scripts 
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/lib/bootstrap/js/bootstrap.bundle.min.js'), array('jquery'), null, true);
    wp_enqueue_script('masonry-js', get_theme_file_uri('/assets/lib/mesonry/masonry.pkgd.min.js'), array('jquery'), null, true);
    if (is_front_page() || is_search()) {
        wp_enqueue_script('isotope', get_theme_file_uri('/assets/lib/isotope/isotope.pkgd.min.js'), array('jquery'), null, true);
    }
    if (is_single()) {
        // wp_enqueue_script('beforeafter-js', get_theme_file_uri('assets/lib/beforeafter/beforeafter.jquery-1.0.0.min.js'), array('jquery'), null, true);
        wp_enqueue_script('beforeafter-event-js', get_theme_file_uri('assets/lib/beforeafter/js/jquery.event.move.js'), array('jquery'), null, true);
        wp_enqueue_script('beforeafter-twentytwenty-js', get_theme_file_uri('assets/lib/beforeafter/js/jquery.twentytwenty.js'), array('jquery'), null, true);
    }
    wp_enqueue_script('infinite-scroll-js', '//unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', array('jquery'), null, true);

    if (is_home() || is_search()) {
        wp_enqueue_script('home-js', get_theme_file_uri('/assets/js/home.js'), array('jquery'), null, true);
    }
    if (is_single()) {
        wp_enqueue_script('single-js', get_theme_file_uri('/assets/js/single.js'), array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'pexels_assets');
add_action('wp_enqueue_scripts', 'pexels_assets');

/**
 * Related Posts
 */
function cats_related_post()
{

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category($post_id);

    if (!empty($categories) && !is_wp_error($categories)) :
        foreach ($categories as $category) :
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array(
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
    );

    $related_cats_post = new WP_Query($query_args);

    if ($related_cats_post->have_posts()) {
        $mo = 0;
        while ($related_cats_post->have_posts()) {
            $related_cats_post->the_post();
            $mo++;
?>
            <div class="col">
                <div class="card">
                    <a href="<?php the_permalink(); ?>" id="modal"">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium', array('class' => 'card-img h-auto'));
                        };
                        ?>
                    </a>
                </div>
            </div>

<?php }
        wp_reset_postdata();
    }
}


/*
 * Set post views count using post meta
 */
function customSetPostViews($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}



// Add customizer postMessage Assets 

function cust_customizer_assets()
{
    wp_enqueue_script('customizer-preview-js', get_theme_file_uri('/assets/js/customizer.js'), array('jquery', 'customize-preview'), time(), true);
}
add_action('customize_preview_init', 'cust_customizer_assets');


// Before After Image 
add_action('cmb2_init', 'befaf_add_metabox');
function befaf_add_metabox()
{

    $prefix = '_pexels_';

    $cmb = new_cmb2_box(array(
        'id'           => $prefix . 'before_after_image',
        'title'        => __('Before After Image', 'pexels'),
        'object_types' => array('post'),
        'context'      => 'normal',
        'priority'     => 'default',
    ));

    $cmb->add_field(array(
        'name' => __('Before Image', 'pexels'),
        'id' => $prefix . 'before_image',
        'type' => 'file',
    ));

    $cmb->add_field(array(
        'name' => __('After Image', 'pexels'),
        'id' => $prefix . 'after_image',
        'type' => 'file',
    ));
}
