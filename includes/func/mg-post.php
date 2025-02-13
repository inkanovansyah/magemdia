<?php 
/**
 * @author @muhammad Randa Syafridamara
 * Add view Count to article
 */
function mg_theme_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    return "$count views";
}
function mg_theme_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function mg_theme_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function mg_theme_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo mg_theme_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'mg_theme_posts_column_views' );
add_action( 'manage_posts_custom_column', 'mg_theme_posts_custom_column_views' );
