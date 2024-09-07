<?php
/* Template Name: Contact Page */
?>

<body class=" min-h-screen flex flex-col">
  <?php get_header(); ?>

  <main class="grow">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
        <h2 class="mb-4 text-center text-4xl tracking-tight font-extrabold text-mineshaft-900 ">
          Как заказать
        </h2>
      </div>
      <div>
        <?php
        // Получаем шаги заказа из поля 'crb_step'
        $steps = carbon_get_theme_option('crb_step');

        // Проверяем, что шаги существуют
        if (!empty($steps)): ?>
        <ol class="w-full flex flex-col gap-8">
          <?php foreach ($steps as $index => $step): ?>
          <li class="flex flex-col gap-3 items-center text-center text-mineshaft-600">
            <span class="flex items-center justify-center w-8 h-8 border border-mineshaft-600 rounded-full shrink-0">
              <?php echo esc_html($index + 1); // Вывод номера шага ?>
            </span>
            <h3 class="text-lg font-medium tracking-tight text-mineshaft-700">
              <?php echo esc_html($step['step_item_title']); // Заголовок шага ?>
            </h3>
            <p class="text-base font-normal text-mineshaft-500">
              <?php echo esc_html($step['step_item_description']); // Описание шага ?>
            </p>
          </li>
          <?php endforeach; ?>
        </ol>
        <?php else: ?>
        <p>Шаги заказа пока не добавлены.</p>
        <?php endif;
        ?>
      </div>



  </main>

  <?php get_footer(); ?>
</body>