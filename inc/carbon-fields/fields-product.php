<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (!defined(constant_name: 'ABSPATH')) {
  exit();
}

add_action('carbon_fields_register_fields', 'crb_product_fields');
function crb_product_fields()
{
  Container::make('post_meta', 'Информация о товаре')
    ->where('post_type', '=', 'product')
    ->add_tab('Общие', [
      Field::make('text', 'product-price-regular', 'Цена от'),
      Field::make('rich_text', 'product_short_description', 'Краткое описание'),
      Field::make('rich_text', 'product_description', 'Описание'),
      Field::make('image', 'product_thumbnail', 'Изображение')->set_width(20),
      Field::make('media_gallery', 'product-gallery', 'Галерея изображений')
        ->set_width(80)
        ->set_type(['image', 'video']),
    ])
    ->add_tab('Характеристики', [
      Field::make('complex', 'product-characteristic', 'Характеристики')
                ->set_collapsed(true)
                ->add_fields([
                    Field::make('text', 'name', 'Название характеристики'),
                    Field::make('text', 'variants', 'Варианты')
                        ->set_help_text('Введите варианты через запятую')
                ])
                ]);
}






