<?php
//TODO: FIX documentation
function mg_theme_customizer($wp_customize)
{
    /**
     * @author inka novansyah
     * function Register Customizer Panel
     */
    $wp_customize->add_panel('mg_theme_customizer_panel', array(
        'title' => 'Magecine Menu',
        'description' => '© PT Males Gerak',
        'priority' => 10,
        'capability' => 'edit_theme_options'
    ));
    
}
add_filter('widget_text', 'do_shortcode');
add_action('customize_register', 'mg_theme_customizer');

include_once(get_template_directory() . '/includes/customizer/mg-theme-customizer-advertisement.php');
include_once(get_template_directory() . '/includes/customizer/mg-theme-customizer-branding.php');
include_once(get_template_directory() . '/includes/customizer/mg-theme-customizer-home.php');
include_once(get_template_directory() . '/includes/customizer/mg-theme-customizer-article.php');
include_once(get_template_directory() . '/includes/customizer/mg-theme-customizer-social-media.php');
