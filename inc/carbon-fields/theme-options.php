<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if ( !defined(constant_name: "ABSPATH")) {
  exit;
}

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_tab( 'Общие настройки',  [
            Field::make( 'image', 'crb_logo', 'Логотип сайта' ),
            Field::make( 'text', 'crb_adress', 'Адрес компании' ),
            Field::make( 'text', 'crb_phone', 'Номер телефона' )
                       -> set_width(50),
            Field::make( 'text', 'crb_email', 'Адрес электронной почты')
            -> set_width(50),
            Field::make('image', 'whatsapp_logo', __('иконка WhatsApp'))
                        ->set_help_text('Загрузите иконку')
                        -> set_width(50),
            Field::make( 'text', 'crb_whatsapp', 'WhatsApp' )
            -> set_width(50),
        ] )
        ->add_tab( 'Этапы заказа',  [
          Field::make('complex', 'crb_step', 'Шаг' )
          -> set_collapsed( true )
          -> add_fields([
            Field::make('text', 'step_item_title', 'Заголовок шага'),
            Field::make('textarea', 'step_item_description', 'Описание шага'),
          ]),
        ]);
}