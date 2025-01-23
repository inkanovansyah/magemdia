<?php

function mg_theme_customizer_social_media($wp_customize)
{
    $wp_customize->add_section(
        'vg_theme_customizer_section_socialmedia',
        array(
            'title' => 'Social Media',
            'description' => '© PT Magecine <br /> Panel For customizing Social Media <br /> <i> Full Social Media Url </i>',
            'panel' => 'mg_theme_customizer_panel',
            'priority' => 126,
        )
    );
    $wp_customize->add_setting('mg_theme_customizer_control_socialmedia_instagram', array());
    $wp_customize->add_control('mg_theme_customizer_control_socialmedia_instagram', array(
        'label' => 'Instagram',
        'section' => 'mg_theme_customizer_section_socialmedia',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_socialmedia_facebook', array());
    $wp_customize->add_control('mg_theme_customizer_control_socialmedia_facebook', array(
        'label' => 'Facebook',
        'section' => 'mg_theme_customizer_section_socialmedia',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_socialmedia_twitter', array());
    $wp_customize->add_control('mg_theme_customizer_control_socialmedia_twitter', array(
        'label' => 'Twitter',
        'section' => 'mg_theme_customizer_section_socialmedia',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_socialmedia_youtube', array());
    $wp_customize->add_control('mg_theme_customizer_control_socialmedia_youtube', array(
        'label' => 'Youtube',
        'section' => 'mg_theme_customizer_section_socialmedia',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_socialmedia_twitch', array());
    $wp_customize->add_control('mg_theme_customizer_control_socialmedia_twitch', array(
        'label' => 'Twitch',
        'section' => 'mg_theme_customizer_section_socialmedia',
        'priority' => 1,
    ));
}

add_action('customize_register', 'mg_theme_customizer_social_media');
