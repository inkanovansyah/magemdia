<?php
/**
 * @author inka novansyah
 * Register Custom Menu So the menu can add active class according to bootstrap
 */
function mg_get_order_summary() {
    $order_summary = [];
    
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        $_product = $cart_item['data'];
        $order_summary[] = [
            'name' => $_product->get_name(),
            'price' => wc_price( $_product->get_price() ),
        ];
    }

    return [
        'items' => $order_summary,
        'total' => wc_price( WC()->cart->get_total( 'edit' ) ),
    ];
}

function mg_is_cart_empty() {
    return WC()->cart->is_empty();
}
