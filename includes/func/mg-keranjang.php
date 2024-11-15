<?php
/**
 * @author inka novansyah
 * Register Custom Menu So the menu can add active class according to bootstrap
 */
add_action('wp_ajax_add_to_cart', 'add_to_cart_ajax');
add_action('wp_ajax_nopriv_add_to_cart', 'add_to_cart_ajax');

function add_to_cart_ajax() {
    $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    if ($product_id > 0) {
        $cart = WC()->cart;
        $cart->add_to_cart($product_id);
        echo $cart->get_cart_contents_count();
    }

    wp_die();
}
