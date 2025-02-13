<?php

/** 
 * ==========================================================================
 * @author Muhammad Randa Syafridamara
 * Add section ads
 * ==========================================================================
 */
function mg_theme_customizer_advertisement($wp_customize)
{
    $wp_customize->add_section(
        'mg_theme_customizer_section_ads',
        array(
            'title' => 'Advertisment google',
            'description' => '© PT Magecine<br /> Panel For customizing Ads <br /> <br /> Google Ads Example : <br /> <pre style="white-space:pre-wrap" >'
                . esc_attr('
<ins class="adsbygoogle" style="display:block; text-align:center;" 
data-ad-format="horizontal" 
data-ad-client="ca-pub-1234" 
data-ad-slot="5678" 
data-full-width-responsive="false">
</ins>
<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>')
. '</pre><br /> Image Example : <br /> <pre style="white-space:pre-wrap">'
                . esc_attr('
<a href="/" target="_blank">
<img src="https://via.placeholder.com/1296x280" class="img-fluid" alt="">
</a>')
                . '</pre>',
            'panel' => 'mg_theme_customizer_panel',
            'priority' => 126,
        )
    );
    $wp_customize->add_setting('mg_theme_customizer_control_header_ads', array());
    $wp_customize->add_control('mg_theme_customizer_control_header_ads', array(
        'label' => 'Header Ads',
        'type' => 'textarea',
        'section' => 'mg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_footer_ads', array());
    $wp_customize->add_control('mg_theme_customizer_control_footer_ads', array(
        'label' => 'mid Ads',
        'type' => 'textarea',
        'section' => 'mg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_sidebar_ads_1', array());
    $wp_customize->add_control('mg_theme_customizer_control_sidebar_ads_1', array(
        'label' => 'Sidebar Ads home',
        'type' => 'textarea',
        'section' => 'mg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_sidebar_ads_2', array());
    $wp_customize->add_control('mg_theme_customizer_control_sidebar_ads_2', array(
        'label' => 'Sidebar Ads Post',
        'type' => 'textarea',
        'section' => 'mg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('mg_theme_customizer_control_floating_bottom_ads', array());
    $wp_customize->add_control('mg_theme_customizer_control_floating_bottom_ads', array(
        'label' => 'Floating Bottom Mobile',
        'type' => 'textarea',
        'section' => 'vg_theme_customizer_section_ads',
        'priority' => 1,
    ));
}
add_action('customize_register', 'mg_theme_customizer_advertisement');