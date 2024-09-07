<?php
if ( !defined(constant_name: "ABSPATH")) {
  exit;
}

add_action( 'init', 'crb_custom_post_types' );
function crb_custom_post_types() {
    register_post_type( 'product', [
      'labels' => [
        'name' => 'Товар',
        'singular_name' => 'Товар',
        'add_new' => 'Добавить товар',
        'add_new_item' => 'Добавить новый товар',
        'edit_item' => 'Редактировать товар',
        'new_item' => 'Новый товар',
        'all_items' => 'Все товары',
        'view_items' => 'Посмотреть товар на сайте',
        'search_items' => 'Искать товар',
        'not_found' => 'Товары не найдены',
        'not_found_in_trash' => 'Корзина пуста',
        'menu_name' => 'Товары',
      ],
      'public' => true,
      'show_ui' => true,
      'has_archive' => true,
      'menu_position' => 25,
      'supports' => ['title'],
      'show_in_rest' => false,
    ] );
}

add_action( 'init', 'create_custom_post_type' );
function create_custom_post_type() {
  register_post_type( 'folder',
      array(
          'labels' => array(
              'name' => __( 'Баннеры' ),
              'singular_name' => __( 'Баннер' ),              
              'add_new' => 'Добавить баннер',
              'add_new_item' => 'Добавить новый баннер',
              'edit_item' => 'Редактировать баннер',
              'new_item' => 'Новый баннер',
              'all_items' => 'Все баннеры',
          ),
          'public' => true,
          'has_archive' => true,
          'supports' => array( 'title', 'thumbnail' ),
          'rewrite' => array( 'slug' => 'folders' ),
      )
  );
}

add_action( 'init', 'create_custom_post_rewievs' );
function create_custom_post_rewievs() {
  register_post_type( 'reviews',
      array(
          'labels' => array(
              'name' => __( 'Отзывы' ),
              'singular_name' => __( 'Отзыв' ),              
              'add_new' => 'Добавить отзыв',
              'add_new_item' => 'Добавить новый отзыв',
              'edit_item' => 'Редактировать отзыв',
              'new_item' => 'Новый отзыв',
              'all_items' => 'Все отзывы',
          ),
          'public' => true,
          'has_archive' => true,
          'supports' => array( 'title', 'thumbnail' ),
          'rewrite' => array( 'slug' => 'folders' ),
      )
  );
}


add_action( 'init', 'create_product_category_taxonomy' );
function create_product_category_taxonomy() {
  register_taxonomy(
      'product_category', // Слаг таксономии
      'product',          // Тип записи, к которому привязывается таксономия
      [
          'label' => __( 'Категории' ),
          'rewrite' => ['slug' => 'product-category'],
          'hierarchical' => true, // Если нужна иерархия как у категорий постов
      ]
  );
}
