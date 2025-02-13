
<?php

/**
 * @author inkanovansyah
 */
/**
 * Register Global Script
 */

function register_video_post_type() {
    $args = array(
        'label'         => 'Videos',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-video-alt3', // Ikon WordPress untuk video
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author','date'),
        'has_archive'   => true,
        'rewrite'       => array('slug' => 'videos'),
        'show_in_menu'  => 'edit.php', // Menjadikan "Video" submenu dari "Posts"
    );
    
    register_post_type('video', $args);
}
add_action('init', 'register_video_post_type');
