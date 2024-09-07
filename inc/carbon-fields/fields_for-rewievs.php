<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (!defined(constant_name: 'ABSPATH')) {
  exit();
}

add_action('carbon_fields_register_fields', 'crb_rewiev_fields');
function crb_rewiev_fields()
{
  Container::make('post_meta', 'Информация об отзыве')
    ->where('post_type', '=', 'reviews')
    ->add_fields([
      Field::make('text', 'reviewer_name', 'Имя остави')->set_width(50),
      Field::make('rich_text', 'review_description', 'Описание'),
      Field::make('image', 'product_thumbnail', 'Изображение')->set_width(20),
      Field::make('select', 'review_rating', 'Рейтинг')
        ->set_width(50)
        ->add_options([
          '1' => '1 звезда',
          '2' => '2 звезды',
          '3' => '3 звезды',
          '4' => '4 звезды',
          '5' => '5 звезд',
        ]),
    ]);
}
