<?php
if (!defined('ABSPATH')) {
  exit();
}

require __DIR__ . '/theme-options.php';
require __DIR__ . '/fields-product.php';
require __DIR__ . '/fields-for-banner-gallery.php';
require __DIR__ . '/fields_for-rewievs.php';



// add_action('after_setup_theme', 'crb_load');

// function crb_load()
// {
//   require_once __DIR__ . '/../../vendor/autoload.php';
//   \Carbon_Fields\Carbon_Fields::boot();
// }