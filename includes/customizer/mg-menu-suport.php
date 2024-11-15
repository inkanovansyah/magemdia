<?php
/**
 * @author inka novansyah
 * Register Custom Menu So the menu can add active class according to bootstrap
 */
// Fungsi untuk menambahkan kelas "has-children" ke item menu yang memiliki submenu
function add_has_children_class( $classes, $item ) {
    // Periksa apakah item menu memiliki submenu atau merupakan dropdown parent
    if ( in_array( 'menu-item-has-children', $item->classes ) || ( $item->current_item_parent && $item->ID != get_the_ID() ) ) {
        $classes[] = 'has-children';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_has_children_class', 10, 2 );
