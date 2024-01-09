<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Style Load Start  -->
    <?php wp_head(); ?>
    <!-- Style Load End  -->
</head>

<body <?php body_class(); ?>>
    <main class="main-wrraper">
        <!-- Navbar Section Start -->
        <?php if (!is_single()) {
        ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent" id="navbar">
                <div class="container-fluid">
                    <?php
                    if (has_custom_logo()) {
                        echo get_custom_logo();
                    } else {
                        bloginfo('name');
                    }
                    ?>
                    <?php echo get_search_form(); ?>
                    <div id="navlink">
                        <a href="home" target="_self" class="btn btn-small contact-btn ms-2">Home</a>
                        <a href="about" target="_self" class="btn btn-small contact-btn">About me</a>
                    <a href="<?php echo esc_url(get_theme_mod('pexels_user_upwork_profile')); ?>" target="_blank" class="btn btn-small contact-btn">Contact me
                    </a>
                </div>
                </div>
            </nav>
        <?php } ?>