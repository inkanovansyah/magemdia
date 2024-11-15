<?php

/** 
 * ==========================================================================
 * @author Muhammad Randa Syafridamara
 * Add section ads
 * ==========================================================================
 */
function vg_theme_customizer_advertisement($wp_customize)
{
    $wp_customize->add_section(
        'vg_theme_customizer_section_ads',
        array(
            'title' => 'Advertisment',
            'description' => '© PT Sepuluh Sebelas Digital Agency <br /> Panel For customizing Ads <br /> <br /> Google Ads Example : <br /> <pre style="white-space:pre-wrap" >'
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
                    <img src="https://via.placeholder.com/728x90" class="img-fluid" alt="">
                    </a>')
                . '</pre>',
            'panel' => 'vg_theme_customizer_panel',
            'priority' => 126,
        )
    );
    $wp_customize->add_setting('vg_theme_customizer_control_header_ads', array());
    $wp_customize->add_control('vg_theme_customizer_control_header_ads', array(
        'label' => 'Header Ads',
        'type' => 'textarea',
        'section' => 'vg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('vg_theme_customizer_control_footer_ads', array());
    $wp_customize->add_control('vg_theme_customizer_control_footer_ads', array(
        'label' => 'Footer Ads',
        'type' => 'textarea',
        'section' => 'vg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('vg_theme_customizer_control_sidebar_ads_1', array());
    $wp_customize->add_control('vg_theme_customizer_control_sidebar_ads_1', array(
        'label' => 'Sidebar Ads',
        'type' => 'textarea',
        'section' => 'vg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('vg_theme_customizer_control_sidebar_ads_2', array());
    $wp_customize->add_control('vg_theme_customizer_control_sidebar_ads_2', array(
        'label' => 'Sidebar Ads',
        'type' => 'textarea',
        'section' => 'vg_theme_customizer_section_ads',
        'priority' => 1,
    ));
    $wp_customize->add_setting('vg_theme_customizer_control_floating_bottom_ads', array());
    $wp_customize->add_control('vg_theme_customizer_control_floating_bottom_ads', array(
        'label' => 'Floating Bottom Mobile',
        'type' => 'textarea',
        'section' => 'vg_theme_customizer_section_ads',
        'priority' => 1,
    ));
}
add_action('customize_register', 'vg_theme_customizer_advertisement');