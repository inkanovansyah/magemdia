<?php 
/**
 * @author @inka novansyah
 * Add view Count to article
 */
 
// Fungsi untuk mendapatkan jumlah tampilan posting
function mg_theme_get_post_view($post_id) {
    $count = get_post_meta($post_id, 'post_views_count', true);
    if ($count == '') {
        delete_post_meta($post_id, 'post_views_count');
        add_post_meta($post_id, 'post_views_count', '0');
        return "0 views";
    }
    return "$count views";
}

// Fungsi untuk mengatur jumlah tampilan posting
function mg_theme_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta($post_id, $key, true);
    
    // Memeriksa apakah pengunjung sudah melihat postingan ini
    if (!isset($_COOKIE['viewed_post_' . $post_id])) {
        $count++;
        update_post_meta($post_id, $key, $count);
        
        // Set cookie untuk menandai bahwa pengunjung telah melihat postingan ini
        setcookie('viewed_post_' . $post_id, '1', time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
    }
}


// Menambahkan kolom 'Views' ke tabel posting
function mg_theme_posts_column_views($columns) {
    $columns['post_views'] = 'Views';
    return $columns;
}

// Menampilkan jumlah tampilan di kolom 'Views'
function mg_theme_posts_custom_column_views($column, $post_id) {
    if ($column === 'post_views') {
        echo mg_theme_get_post_view($post_id);
    }
}

// Melacak tampilan posting
function mg_theme_track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    mg_theme_set_post_view();
}

// Menambahkan action dan filter yang diperlukan
add_filter('manage_posts_columns', 'mg_theme_posts_column_views');
add_action('manage_posts_custom_column', 'mg_theme_posts_custom_column_views', 10, 2);
add_action('wp_head', 'mg_theme_track_post_views');
