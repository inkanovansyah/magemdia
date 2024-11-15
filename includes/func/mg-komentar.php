<?php
/**
 * @author inka novansyah
 * Register Custom Menu So the menu can add active class according to bootstrap
 */
// Add action for handling reader's post submission
add_action('admin_post_submit_reader_post', 'handle_reader_post_submission');
add_action('admin_post_nopriv_submit_reader_post', 'handle_reader_post_submission');

function handle_reader_post_submission() {
    // Check if the nonce is set
    if ( isset($_POST['reader_post_nonce']) && wp_verify_nonce($_POST['reader_post_nonce'], 'reader_post_nonce') ) {
        // Check if the content is set and not empty
        if ( isset($_POST['reader_post_content']) && !empty($_POST['reader_post_content']) ) {
            // Sanitize the content
            $content = sanitize_textarea_field($_POST['reader_post_content']);
            
            // Insert the post
            $post_data = array(
                'post_title'    => 'Reader Post',
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_author'   => 1 // Change this to the desired author ID
            );

            $post_id = wp_insert_post($post_data);

            if ($post_id) {
                // Redirect back to the page
                wp_redirect($_SERVER['HTTP_REFERER']);
                exit;
            }
        }
    }

    // If something went wrong, redirect back to the page with an error message
    wp_redirect($_SERVER['HTTP_REFERER']);
    exit;
}
