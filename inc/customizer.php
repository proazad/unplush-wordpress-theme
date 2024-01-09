<?php
function pexels_customizer_settings($wp_customizer)
{
    $wp_customizer->add_section('pexels_banner_section', array(
        'title' => __('Banner Section', 'pexels'),
        'priority' => 40,
    ));
    $wp_customizer->add_setting('pexels_banner_heading', array(
        'default' => __('This is Banner Heading', 'pexels'),
        'transport' => 'postMessage'
    ));
    $wp_customizer->add_control('pexels_banner_heading_ctrl', array(
        'label' => __('Banner Heading', 'pexels'),
        'section' => 'pexels_banner_section',
        'settings' => 'pexels_banner_heading',
        'type' => 'text'
    ));
    $wp_customizer->add_setting('pexels_banner_subheading', array(
        'default' => __('This is Banner Sub Heading', 'pexels'),
        'transport' => 'postMessage'
    ));
    $wp_customizer->add_control('pexels_banner_subheading_ctrl', array(
        'label' => __('Banner Sub Heading', 'pexels'),
        'section' => 'pexels_banner_section',
        'settings' => 'pexels_banner_subheading',
        'type' => 'text'
    ));
    $wp_customizer->add_setting('pexels_banner_other_text', array(
        'default' => __('Add Banner Other Text', 'pexels'),
        'transport' => 'refresh'
    ));
    $wp_customizer->add_control('pexels_banner_other_text_ctrl', array(
        'label' => __('Banner Others Text', 'pexels'),
        'section' => 'pexels_banner_section',
        'settings' => 'pexels_banner_other_text',
        'type' => 'textarea'
    ));
    $wp_customizer->add_setting('pexels_banner_image', array(
        'transport' => 'refresh'
    ));
    $wp_customizer->add_control(new WP_Customize_Media_Control($wp_customizer, 'pexels_banner_image_ctrl', array(
        'label' => __('Banner Background Image', 'pexels'),
        'section' => 'pexels_banner_section',
        'settings' => 'pexels_banner_image',
    )));

    /**
     * Other Information Section
     */

    $wp_customizer->add_section('pexels_other_info_section', array(
        'title' => __('Other Information Section', 'pexels'),
        'priority' => 40,
    ));
    $wp_customizer->add_setting('pexels_author_designation', array(
        'default' => __('Graphics Designer', 'pexels'),
        'transport' => 'refresh'
    ));
    $wp_customizer->add_control('pexels_author_designation_ctrl', array(
        'label' => __('Author ', 'pexels'),
        'section' => 'pexels_other_info_section',
        'settings' => 'pexels_author_designation',
        'type' => 'text'
    ));
    $wp_customizer->add_setting('pexels_user_upwork_profile', array(
        'default' => __('https://upwork.com/', 'pexels'),
        'transport' => 'refresh'
    ));
    $wp_customizer->add_control('pexels_user_upwork_profile_ctrl', array(
        'label' => __('Upwork Url', 'pexels'),
        'section' => 'pexels_other_info_section',
        'settings' => 'pexels_user_upwork_profile',
        'type' => 'url'
    ));
}
add_action('customize_register', 'pexels_customizer_settings');
