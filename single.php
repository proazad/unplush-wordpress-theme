<?php
get_header();
the_post();
?>
<?php
$link = get_the_permalink();
$title = get_the_title();
$text_encoded = urlencode($title);

$fb_link = add_query_arg('u', urlencode($link), 'https://www.facebook.com/sharer/sharer.php');
$tw_link = add_query_arg('status', $title . ' ' . urlencode($link), 'https://twitter.com/home');
$ln_link = add_query_arg(array(
    'url' => urlencode($link),
    'title' => urlencode($title),
    'summary' => urlencode($title),
), 'https://www.linkedin.com/shareArticle?mini=true');
?>
<main class="main-wrraper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                $pexels_before_image = get_post_meta(get_the_ID(), '_pexels_before_image', true);
                $pexels_after_image = get_post_meta(get_the_ID(), '_pexels_after_image', true);
                if ($pexels_before_image && $pexels_after_image) {
                    $pexels_beforeImage_id = attachment_url_to_postid($pexels_before_image);
                    $pexels_afterImage_id = attachment_url_to_postid($pexels_after_image);
                    $pexels_before_image = wp_get_attachment_image_src($pexels_beforeImage_id, 'large');
                    $pexels_after_image = wp_get_attachment_image_src($pexels_afterImage_id, 'large');
                ?>
                    <div class="befaf">
                        <div class="beforeAfter">
                            <img src="<?php echo esc_url($pexels_before_image[0]); ?>" />
                            <img src="<?php echo esc_url($pexels_after_image[0]); ?>" />
                        </div>
                        <?php
                        echo get_next_post_link('%link', '<');
                        echo get_previous_post_link('%link', '>');
                        ?>
                    </div>
                <?php
                } else {
                    _e('<p class="text-center">Add Before After Image</p>', 'pexels');
                }
                ?>

                <div class="view-share d-flex justify-content-between align-center mx-md-5">

                    <div class="view">
                        
                        <?php
                        _e('Views ','pexels');
                        customSetPostViews(get_the_ID());
                        $post_views_count = get_post_meta(get_the_ID(), 'post_views_count', true);
                        // Check if the custom field has a value.
                        if (!empty($post_views_count)) {
                            echo " {$post_views_count}";
                        }
                        ?>

                    </div>
                    <div class="share">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="share" class="svg-inline--fa fa-share" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M503.7 226.2l-176 151.1c-15.38 13.3-39.69 2.545-39.69-18.16V272.1C132.9 274.3 66.06 312.8 111.4 457.8c5.031 16.09-14.41 28.56-28.06 18.62C39.59 444.6 0 383.8 0 322.3c0-152.2 127.4-184.4 288-186.3V56.02c0-20.67 24.28-31.46 39.69-18.16l176 151.1C514.8 199.4 514.8 216.6 503.7 226.2z">
                            </path>
                        </svg>
                        <?php _e('Share','pexels');?>
                        <div class="share-container">
                            <div class="share-btn">
                                <a href="<?php echo esc_url($fb_link); ?>" target="_blank">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.3V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0 -48-48z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url($tw_link); ?>" target="_blank">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" class="svg-inline--fa fa-twitter-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8 .2 5.7 .2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3 .6 10.4 .8 15.8 .8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.45 65.45 0 0 1 -29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url($ln_link); ?>" target="_blank">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin" class="svg-inline--fa fa-linkedin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url($link); ?>" target="_blank">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" class="svg-inline--fa fa-link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <path fill="currentColor" d="M598.6 41.41C570.1 13.8 534.8 0 498.6 0s-72.36 13.8-99.96 41.41l-43.36 43.36c15.11 8.012 29.47 17.58 41.91 30.02c3.146 3.146 5.898 6.518 8.742 9.838l37.96-37.96C458.5 72.05 477.1 64 498.6 64c20.67 0 40.1 8.047 54.71 22.66c14.61 14.61 22.66 34.04 22.66 54.71s-8.049 40.1-22.66 54.71l-133.3 133.3C405.5 343.1 386 352 365.4 352s-40.1-8.048-54.71-22.66C296 314.7 287.1 295.3 287.1 274.6s8.047-40.1 22.66-54.71L314.2 216.4C312.1 212.5 309.9 208.5 306.7 205.3C298.1 196.7 286.8 192 274.6 192c-11.93 0-23.1 4.664-31.61 12.97c-30.71 53.96-23.63 123.6 22.39 169.6C293 402.2 329.2 416 365.4 416c36.18 0 72.36-13.8 99.96-41.41L598.6 241.3c28.45-28.45 42.24-66.01 41.37-103.3C639.1 102.1 625.4 68.16 598.6 41.41zM234 387.4L196.1 425.3C181.5 439.1 162 448 141.4 448c-20.67 0-40.1-8.047-54.71-22.66c-14.61-14.61-22.66-34.04-22.66-54.71s8.049-40.1 22.66-54.71l133.3-133.3C234.5 168 253.1 160 274.6 160s40.1 8.048 54.71 22.66c14.62 14.61 22.66 34.04 22.66 54.71s-8.047 40.1-22.66 54.71L325.8 295.6c2.094 3.939 4.219 7.895 7.465 11.15C341.9 315.3 353.3 320 365.4 320c11.93 0 23.1-4.664 31.61-12.97c30.71-53.96 23.63-123.6-22.39-169.6C346.1 109.8 310.8 96 274.6 96C238.4 96 202.3 109.8 174.7 137.4L41.41 270.7c-27.6 27.6-41.41 63.78-41.41 99.96c-.0001 36.18 13.8 72.36 41.41 99.97C69.01 498.2 105.2 512 141.4 512c36.18 0 72.36-13.8 99.96-41.41l43.36-43.36c-15.11-8.012-29.47-17.58-41.91-30.02C239.6 394.1 236.9 390.7 234 387.4z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row my-4 border-top">
            <div class="col-md-12">
                <h4 class="my-3"><?php _e('Related Photos', 'pexeld'); ?></h4>
            </div>
        </div>
        <div class="grid row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" data-masonry='{"percentPosition": true }'>
            <?php
            cats_related_post();
            ?>
        </div>
    </div>

</main>


<?php get_footer(); ?>