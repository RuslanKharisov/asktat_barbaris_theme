<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (!defined(constant_name: 'ABSPATH')) {
  exit();
}

add_action('carbon_fields_register_fields', 'crb_banner_fields');
function crb_banner_fields()
{
  Container::make('post_meta', 'Информация о баннере')
    ->where('post_type', '=', 'folder')
    ->add_fields([
      Field::make('text', 'banner_title', 'Заголовок баннера')->set_width(50),
      Field::make('media_gallery', 'banner_gallery', 'Галерея изображений')
        ->set_width(100)
        ->set_type(['image', 'video']),
      Field::make('date', 'banner_start_date', 'Дата начала')->set_width(50),
      Field::make('date', 'banner_end_date', 'Дата окончания')->set_width(50),
    ]);
}
