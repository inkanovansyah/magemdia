<?php 
/**
 * @author @inka novansyah
 * Add view Count to article
 */
 
// Fungsi untuk mendapatkan jumlah tampilan posting

function custom_xendit_payment_process() {
    // Check nonce for security
    if (!isset($_POST['action']) || $_POST['action'] !== 'custom_xendit_payment_process') {
        wp_die('Invalid request');
    }

    // Sanitize and validate input
    $payment_method = sanitize_text_field($_POST['payment_method']);

    // Include Xendit API integration here
    // Example: Xendit API credentials and processing

    // Redirect after processing
    wp_redirect(home_url('/thank-you'));
    exit;
}

// Hook the function to the 'admin_post_' action
add_action('admin_post_custom_xendit_payment_process', 'custom_xendit_payment_process');
add_action('admin_post_nopriv_custom_xendit_payment_process', 'custom_xendit_payment_process');
