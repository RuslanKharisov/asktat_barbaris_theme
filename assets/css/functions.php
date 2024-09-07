<?php

// Don't forget import the php file.

require get_template_directory() . '/inc/carbon-fields/index.php';
require get_template_directory() . '/inc/form-process.php';
require get_template_directory() . '/inc/template-hooks.php';
require get_template_directory() . '/inc/template-enqueue.php';

function theme_setup()
{
  register_nav_menus([
    'primary' => __('Primary Menu', 'your-theme-textdomain'),
  ]);
}
add_action('after_setup_theme', 'theme_setup');

function register_my_menus()
{
  register_nav_menus([
    'header-menu' => __('Header Menu'),
    'footer-menu' => __('Footer Menu'),
  ]);
}
add_action('init', 'register_my_menus');



