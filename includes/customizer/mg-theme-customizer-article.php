<?php

/**
 * @author Muhammad Randa Syafridamara
 * Add customizer to Home
 */
function mg_theme_customizer_article($wp_customize)
{

    $wp_customize->add_section('article', array(
        'title' => 'PAGE - Article',
        'panel' => 'mg_theme_customizer_panel',
        'priority' => 126,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_article_ads_top', array());
    $wp_customize->add_control('mg_theme_customizer_control_article_ads_top', array(
        'label' => 'Advertisement Top',
        'type' => 'textarea',
        'section' => 'article',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_article_ads_midle_articel', array());
    $wp_customize->add_control('mg_theme_customizer_control_article_ads_midle_articel', array(
        'label' => 'Advertisement Middle Articel',
        'type' => 'textarea',
        'description'=>'add <br> {MG_MIDDLE_ADS} <br> inside editor on wordpress',
        'section' => 'article',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_article_ads_middle', array());
    $wp_customize->add_control('mg_theme_customizer_control_article_ads_middle', array(
        'label' => 'Advertisement Middle',
        'type' => 'textarea',
        'section' => 'article',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_article_ads_end', array());
    $wp_customize->add_control('mg_theme_customizer_control_article_ads_end', array(
        'label' => 'Advertisement Bottom',
        'type' => 'textarea',
        'description'=>'add <br> {MG_MIDDLE_ADS} <br> inside editor on wordpress',
        'section' => 'article',
        'priority' => 1,
    ));
}
add_action('customize_register', 'mg_theme_customizer_article');