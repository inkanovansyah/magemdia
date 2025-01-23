<?php

/**
 * @author inka novansyah
 * 
 * Register All Theme support according to wordpress codex
 */
function mg_register_theme_support()
{
  add_theme_support('title-tag');
  add_theme_support('custom-header');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script', 'figure'));
  add_theme_support('post-formats', array('gallery', 'video'));
  add_theme_support('customize-selective-refresh-widgets');
  $args = array(
    'default-text-color' => '000',
    'width'              => 128,
    'height'             => 32,
    'flex-width'         => true,
    'flex-height'        => true,
  );
  add_theme_support('custom-header', $args);
  add_theme_support('custom-logo', $args);
}
add_action('init', 'mg_register_theme_support');
