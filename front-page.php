<body class=" min-h-screen flex flex-col">
  <?php get_header(); ?>

  <main class="grow min-h-screen flex flex-col">

    <!-- Секция баннера #1 -->
    <section class="w-full py-10 bg-primary-100 flex flex-col items-center justify-center">
      <?php
      // Устанавливаем переменную с названием баннера
      set_query_var('banner_title', 'banner №1');

      // Подключаем шаблонный файл banner-gallery.php
      get_template_part('template-parts/banner-gallery');
      ?>
    </section>

    <!-- Секция карусели каталога категории #1 -->
    <section class="product-slider py-5 lg:py-10">

      <?php
      $args = [
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => [
          [
            'taxonomy' => 'product_category',
            'field' => 'slug',
            'terms' => 'intellektualnye-datchiki-davleniya',
          ],
        ],
      ];
      $query = new WP_Query($args);
      if ($query->have_posts()): ?>

      <div class="w-full flex justify-center mb-10">
        <a href="<?php echo esc_url(
          get_permalink(get_page_by_path('katalog'))
        ); ?>"
          class="uppercase py-4 px-10 text-xs font-medium text-primary-900 focus:outline-none bg-primary-100 rounded-md hover:bg-primary-300 duration-300">
          Перейти в каталог
        </a>
      </div>
      <div class="carousel mt-4" data-flickity='{"contain": true, "pageDots": false, "prevNextButtons": false }'>

        <?php while ($query->have_posts()):
          $query->the_post();

          // Подключаем шаблонный файл product-carousel-item.php
          get_template_part('template-parts/product-carousel-item');
        endwhile;endif;
      wp_reset_postdata();
      ?>

      </div>
    </section>

        <!-- Секция баннера #2 -->
        <section class="w-full py-10 bg-primary-100 flex flex-col items-center justify-center">
      <?php
      // Устанавливаем переменную с названием баннера
      set_query_var('banner_title', 'banner №2');

      // Подключаем шаблонный файл banner-gallery.php
      get_template_part('template-parts/banner-gallery');
      ?>
    </section>




  </main>

  <?php get_footer();
?>