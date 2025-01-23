<?php

/**
 * @author inkanovansyah
 */
/**
 * Register Global Script
 */
function mg_register_script_global()
{
  wp_enqueue_script('mg_theme_script_jquery', get_template_directory_uri().'/compiledjs/jquery-3.6.0.min.js', array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('mg_theme_script_boot', get_template_directory_uri().'/compiledjs/bootstrap.min.js', array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('mg_theme_script_images',  get_template_directory_uri().'/compiledjs/imagesloaded.pkgd.min.js', array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('mg_theme_script_odometer',  get_template_directory_uri().'/compiledjs/odometer.min.js', array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('mg_theme_script_appear',  get_template_directory_uri().'/compiledjs/jquery-appear.js', array(), wp_get_theme()->get('Version'), true);
  
  wp_enqueue_script('mg_theme_script_apps', get_template_directory_uri().'/compiledjs/app.js', array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('mg_theme_script_apps_2', get_template_directory_uri().'/compiledjs/apps.js', array(), wp_get_theme()->get('Version'), true);
  wp_enqueue_script('sliker_js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), null, true);

//   wp_enqueue_script('vg_theme_script_dark_mode', get_template_directory_uri() . '/compiledjs/darkMode.js', array(), wp_get_theme()->get('Version'), true);
//   if (is_front_page()) {
//     wp_enqueue_script('vg_theme_script_home', get_template_directory_uri() . '/compiledjs/home.js', array(), wp_get_theme()->get('Version'), true);
//   }
//   if (is_category() || is_tag() || is_author()) {
//     wp_enqueue_script('vg_theme_script_category', get_template_directory_uri() . '/compiledjs/category.js', array(), wp_get_theme()->get('Version'), true);
//   }
//   if( is_single() ){
//     wp_enqueue_script('vg_theme_script_category', get_template_directory_uri() . '/compiledjs/article.js', array(), wp_get_theme()->get('Version'), true);
//   }
}
add_action('wp_enqueue_scripts', 'mg_register_script_global');



/**
 * Register Styesheet
 */
function mg_register_style_global()
{
  $themeUrl = get_template_directory_uri();

  wp_enqueue_style('vg_theme_style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'), 'all');
  wp_enqueue_style('vg_theme_style_boostreap', $themeUrl.'assets/css/vendor/bootstrap.min.css' );
  wp_enqueue_style('vg_theme_style_font-awesome', $themeUrl.'/assets/css/vendor/font-awesome.css' );
  wp_enqueue_style('vg_theme_style_font-icon-font', $themeUrl.'/assets/css/vendor/icon-font.css' );
  wp_enqueue_style('vg_theme_style_font-remixicon', $themeUrl.'/assets/css/vendor/remixicon.css' );
  
  //Site Stylesheet 
  wp_enqueue_style('vg_theme_style_apps', $themeUrl.'/assets/css/app.css' );
  wp_enqueue_style('vg_theme_style_responsive', $themeUrl.'/assets/css/responsive.css' );
  wp_enqueue_style('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'mg_register_style_global');
