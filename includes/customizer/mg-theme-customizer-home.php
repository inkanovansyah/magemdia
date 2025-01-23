<?php

/**
 * @author Muhammad Randa Syafridamara
 * Add customizer to Home
 */
function mg_theme_customizer_home($wp_customize)
{

    $wp_customize->add_section('mg_section_home', array(
        'title' => 'PAGE - Home',
        'panel' => 'mg_theme_customizer_panel',
        'priority' => 126,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_home_widget_1', array());
    $wp_customize->add_control('mg_theme_customizer_control_home_widget_1', array(
        'label' => 'Wigets IMDB',
        'type' => 'textarea',
        'section' => 'mg_section_home',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_home_widget_2', array());
    $wp_customize->add_control('mg_theme_customizer_control_home_widget_2', array(
        'label' => 'Klasemen',
        'type' => 'textarea',
        'section' => 'mg_section_home',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_home_ads_1', array());
    $wp_customize->add_control('mg_theme_customizer_control_home_ads_1', array(
        'label' => 'Advertistment',
        'type' => 'textarea',
        'section' => 'mg_section_home',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_home_socialmedia_feed', array());
    $wp_customize->add_control('mg_theme_customizer_control_home_socialmedia_feed', array(
        'label' => 'social Media Feed Shortcode',
        'type' => 'text',
        'section' => 'mg_section_home',
        'priority' => 1,
    ));
}
add_action('customize_register', 'mg_theme_customizer_home');
