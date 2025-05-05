<?php
/**
 * Meta tags for Facebook (Open Graph) and Twitter Card
 * Author: Inka Novansyah
 */

function mg_social_meta_tags() {
    if (is_singular()) {
        global $post;
        setup_postdata($post);

        $title = get_the_title($post->ID);
        $description = has_excerpt($post->ID) ? get_the_excerpt($post->ID) : wp_trim_words($post->post_content, 25);
        $url = get_permalink($post->ID);
        $image = get_the_post_thumbnail_url($post->ID, 'full');


        if ($image) {
            $img_size = @getimagesize($image); // Gunakan @ untuk mencegah warning jika URL tidak valid
            $width = isset($img_size[0]) ? $img_size[0] : '';
            $height = isset($img_size[1]) ? $img_size[1] : '';
        
            echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
            echo '<meta name="twitter:title" content="' . esc_attr($title) . '" />' . "\n";
            echo '<meta name="twitter:description" content="' . esc_attr($description) . '" />' . "\n";
            echo '<meta name="twitter:site" content="@MageMdia" />' . "\n";
            echo '<meta name="twitter:url" content="' . esc_url($url) . '" />' . "\n";
            echo '<meta name="twitter:image:src" content="' . esc_url($image) . '" />' . "\n";
            echo '<meta property="og:image" content="' . esc_url($image) . '" />' . "\n";
        
            // Tambahkan ukuran jika tersedia
            if ($width && $height) {
                echo '<meta property="og:image:width" content="' . $width . '" />' . "\n";
                echo '<meta property="og:image:height" content="' . $height . '" />' . "\n";
            }
        }
                
        wp_reset_postdata();
    }
}
add_action('wp_head', 'mg_social_meta_tags', 5);
