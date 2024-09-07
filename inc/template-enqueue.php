<?php

if ( !defined(constant_name: "ABSPATH")) {
  exit;
}

function my_custom_theme_enqueue_styles() {
  // Подключение основных стилей темы
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), null);

  // Подключение дополнительных CSS файлов
  // wp_enqueue_style('flickity-css', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.min.css', array(), '3.0.0');

  wp_enqueue_style('flickity-css', get_stylesheet_directory_uri() . '/assets/css/flickity.min.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/flickity.min.css'));
  wp_enqueue_style('custom-tailwind-css', get_stylesheet_directory_uri() . '/assets/css/custom-style.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/custom-style.css'));

  // Подключение JS файлов
  // wp_enqueue_script('flickity-script', 'https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js', array(), '3.0.0', true);
  wp_enqueue_script('flickity-script', get_template_directory_uri() . '/assets/js/flickity.pkgd.min.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/flickity.pkgd.min.js'), true);

  wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/scripts.js'), true);
  // Скрипт для страницы продукта
  if (is_singular('product')) {
    wp_enqueue_script('product-page-js', get_template_directory_uri() . '/assets/js/product-page.js', array('jquery'), filemtime(get_template_directory() . '/assets/js/product-page.js'), true);
}
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');


function include_google_fonts() {
	if (!is_admin()) {
		wp_register_style('google', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), null, 'all');
		wp_enqueue_style('google');
	}
}
add_action('wp_enqueue_scripts', 'include_google_fonts');