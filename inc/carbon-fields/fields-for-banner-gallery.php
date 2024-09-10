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
      Field::make('text', 'banner_text_block_title', __('Заголовок секции'))
        ->set_help_text(__('Введите заголовок секции')),
      Field::make('textarea', 'banner_text_block', __('Техтовое поле секции'))
        ->set_help_text(__('Введите текст секции')),
      Field::make('text', 'banner_title', 'Заголовок баннера')->set_width(50),
      Field::make('media_gallery', 'banner_gallery', 'Галерея изображений')
        ->set_width(100)
        ->set_type(['image', 'video']),
    ]);
}