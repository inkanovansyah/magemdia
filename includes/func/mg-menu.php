<?php
/**
 * @author inka novansyah
 * Register Custom Menu So the menu can add active class according to bootstrap
 */
function custom_theme_setup() {
    add_theme_support( 'menus' );
    register_nav_menu( 'primary', __( 'Primary Menu', 'text-domain' ) );
    
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
