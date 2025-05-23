<?php


/**
 * @author Inka Novansyah
 * @description 
 */

// include required Theme support
include_once(get_template_directory().'/includes/func/mg-assets.php');
//include_once(get_template_directory().'/includes/func/mg-post.php');
include_once(get_template_directory().'/includes/class/mg-nav-walker.php');
include_once(get_template_directory().'/includes/func/mg-custom-video.php');
include_once(get_template_directory().'/includes/func/mg-custom-breadcrumbs.php');
include_once(get_template_directory().'/includes/func/mg-menu.php');
include_once(get_template_directory().'/includes/func/mg-keranjang.php');
include_once(get_template_directory().'/includes/func/mg-custom-pagination.php');
include_once(get_template_directory().'/includes/func/mg-komentar.php');
include_once(get_template_directory().'/includes/func/mg-meta.php');
include_once(get_template_directory().'/includes/func/mg-theme-customizer.php');
include_once(get_template_directory().'/includes/func/mg-custom-post-viewer.php');
include_once(get_template_directory().'/includes/func/mg-xendit.php');
include_once(get_template_directory().'/includes/customizer/mg-menu-suport.php');
include_once(get_template_directory().'/includes/func/mg-order.php');
include_once(get_template_directory().'/includes/func/mg-theme-support.php');
include_once(get_template_directory().'/includes/func/mg-meta-costume.php');


// Nonaktifkan rel="next" dan rel="prev" dari Yoast SEO
add_filter('wpseo_next_rel_link', '__return_false');
add_filter('wpseo_prev_rel_link', '__return_false');