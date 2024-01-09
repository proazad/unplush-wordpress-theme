<?php
$pexels_banner_heading = get_theme_mod('pexels_banner_heading', __('This is  Banner Heading', 'pexels'));
$pexels_banner_sub_heading = get_theme_mod('pexels_banner_subheading', __('This is  Banner Sub Heading', 'pexels'));
$pexels_banner_text = get_theme_mod('pexels_banner_other_text', __('This is  Banner Other Text', 'pexels'));
$pexels_banner_image_id = get_theme_mod('pexels_banner_image');
$pexels_banner_image_url = wp_get_attachment_image_src($pexels_banner_image_id, 'medium-large');
?>
<header class="row hero">
    <div class="col-12">
        <div class="hero_background">
            <img src="<?php echo esc_url($pexels_banner_image_url[0]); ?>" alt="">
        </div>
        <div class="author-intro">

            <h1>Hi, I'm
                <span class="author-name">
                    <?php echo esc_html($pexels_banner_heading); ?>
                </span>
            </h1>
            <h2 class="author-designation">
                <?php echo esc_html($pexels_banner_sub_heading); ?>
            </h2>
            <?php
            echo apply_filters('the_content', $pexels_banner_text);
            ?>
        </div>
    </div>
</header>