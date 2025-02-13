<?php
/**
 * @author inka novansyah
 * Register Custom Menu So the menu can add active class according to bootstrap
 */
function my_custom_function_name() {
    $app_id = 1823418891736011; // Ganti dengan App ID Facebook Anda
    $tag = '<meta property="fb:app_id" content="%d" />';
    echo sprintf($tag, $app_id); // Perbaikan: gunakan $app_id, bukan $num
  }
  add_action( 'wp_head', 'my_custom_function_name' );