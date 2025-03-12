<?php

/** 
 * ==========================================================================
 * @author inka novansyah
 * Add section ads
 * ==========================================================================
 */
function mg_theme_customizer_branding($wp_customize)
{
    $wp_customize->add_section('mg_section_branding', array(
        'title' => 'Branding',
        'panel' => 'mg_theme_customizer_panel',
        'priority' => 126,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_branding_copyright', array());
    $wp_customize->add_control('mg_theme_customizer_control_branding_copyright', array(
        'label' => 'Copyright',
        'type' => 'text',
        'section' => 'mg_section_branding',
        'priority' => 1,
    ));
};
add_action('customize_register', 'mg_theme_customizer_branding');
