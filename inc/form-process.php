<?php

add_action('admin_init', function() {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['form_identifier']) && $_POST['form_identifier'] == 'product_rqst_form') {
          $name = htmlspecialchars($_POST['name']);
          $phone = htmlspecialchars($_POST['phone']);
          $link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Неизвестно';
          $current_date_time = date('Y-m-d H:i:s');

          // Подготовка сообщения
          $message_encoded = urlencode("Дата и время: $current_date_time\nИмя: $name\nТелефон: $phone\nСсылка на страницу товара: $link");

          // Номер телефона, на который будет отправлено сообщение (в международном формате без плюса)
          $whatsapp_number = carbon_get_theme_option('crb_whatsapp');
          
          // Возвращаем JSON-ответ с ссылкой
          
          echo json_encode(['success' => true, 'whatsapp_number' => $whatsapp_number, 'message' => $message_encoded]);
          exit();
      }
  }
});