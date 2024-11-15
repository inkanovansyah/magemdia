<?php 
/**
 * @author @muhammad Randa Syafridamara
 * Add view Count to article
 */
function vg_theme_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
function vg_theme_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function vg_theme_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function vg_theme_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo vg_theme_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'vg_theme_posts_column_views' );
add_action( 'manage_posts_custom_column', 'vg_theme_posts_custom_column_views' );
