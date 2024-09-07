<?php
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/whatsapp/', array(
        'methods' => 'POST',        
        'mode' => 'no-cors',
        'callback' => 'redirect_to_whatsapp',
    ));
});

function redirect_to_whatsapp(WP_REST_Request $request) {
    $phone = sanitize_text_field($request->get_param('phone'));
    $name = sanitize_text_field($request->get_param('name'));
    $size = sanitize_text_field($request->get_param('selected_size'));
    $color = sanitize_text_field($request->get_param('selected_color'));

    $api_url = "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($text);

    // Редирект на WhatsApp URL
    wp_redirect($api_url);
    exit; // Не забудьте завершить выполнение скрипта
}

?>