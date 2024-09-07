<?php
$whatsapp_number = carbon_get_theme_option('crb_whatsapp');
$whatsapp_logo_id = carbon_get_theme_option('whatsapp_logo');
$whatsapp_logo_url = wp_get_attachment_image_url($whatsapp_logo_id, 'full');

if ($whatsapp_number && $whatsapp_logo_url) {
    // Удаляем лишние символы и создаем ссылку для перехода в WhatsApp
    $whatsapp_link = 'https://wa.me/' . preg_replace('/\D/', '', $whatsapp_number);
    
    echo '<a class="flex items-center" href="' .
        esc_url($whatsapp_link) .
        '" target="_blank" rel="noopener noreferrer">';
    echo '<img src="' .
        esc_url($whatsapp_logo_url) .
        '" alt="WhatsApp" class="h-10 ">';
    echo '<span>WhatsApp</span></a>';
}
?>