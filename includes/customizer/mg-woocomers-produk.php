<?php

/**
 * @author inkanovansyah
 */
/**
 * Register Global Script
 */

// Tambahkan meta data produk saat produk ditambahkan ke keranjang
add_filter('woocommerce_add_cart_item_data', 'custom_add_checkout_page_meta', 10, 2);

function custom_add_checkout_page_meta($cart_item_data, $product_id) {
    // Atur aturan sesuai kebutuhan Anda
    $checkout_page_id = get_post_meta($product_id, 'checkout_page_id', true);
    if ($checkout_page_id) {
        $cart_item_data['checkout_page_id'] = $checkout_page_id;
    }
    return $cart_item_data;
}

// Arahkan pengguna ke halaman checkout sesuai dengan meta data produk
add_filter('woocommerce_add_to_cart_redirect', 'custom_redirect_to_checkout');

function custom_redirect_to_checkout($url) {
    // Periksa apakah ada produk dengan meta data checkout_page_id
    foreach (WC()->cart->get_cart() as $cart_item) {
        if (!empty($cart_item['checkout_page_id'])) {
            $checkout_page_id = $cart_item['checkout_page_id'];
            $checkout_url = get_permalink($checkout_page_id);
            return $checkout_url;
        }
    }
    return $url;
}
