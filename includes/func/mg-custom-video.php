<?php
ob_start(); // Menangani output buffer untuk mencegah kesalahan header

/**
 * @author inkanovansyah
 */

/**
 * Register Custom Post Types (Video & Event Film)
 */
function register_custom_post_types() {
    $post_types = array(
        'video' => array(
            'label'         => 'Videos',
            'menu_icon'     => 'dashicons-video-alt3',
            'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author', 'date'),
            'rewrite'       => array('slug' => 'videos'),
        ),
        'film_event' => array(
            'label'         => 'Film Events',
            'menu_icon'     => 'dashicons-calendar-alt',
            'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author', 'date'),
            'rewrite'       => array('slug' => 'film-events'),
        ),
    );

    foreach ($post_types as $key => $args) {
        $args = array_merge($args, array(
            'public'        => true,
            'menu_position' => 5,
            'has_archive'   => true,
            'show_in_menu'  => true,
        ));
        register_post_type($key, $args);
    }
}
add_action('init', 'register_custom_post_types');

ob_end_flush(); // Mengeluarkan buffer output
?>
