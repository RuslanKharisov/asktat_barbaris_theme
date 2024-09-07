<body class=" min-h-screen flex flex-col">
  <?php get_header(); ?>

  <main class="grow min-h-screen flex flex-col">

    <!-- Секция баннера #1 -->
    <section class="w-full md:pt-12 bg-primary-100 flex flex-col items-center justify-center">
      <?php
      // Устанавливаем переменную с названием баннера
      set_query_var('banner_title', 'banner №1');

      // Подключаем шаблонный файл banner-gallery.php
      get_template_part('template-parts/banner-gallery');
      ?>
    </section>

    <!-- Секция с текстом -->
    <section class="max-w-screen-xl mx-auto px-1 md:px-20 md:py-10">
      <div class="flex flex-col gap-5 items-center justify-center pt-10 lg-py-20 text-center">
        <h1 class="text-xl uppercase font-semibold">
          <?php echo esc_html(
            carbon_get_theme_option('crb_lighting_section_title')
          ); ?>
        </h1>
        <p class="font-light">
          <?php echo esc_html(
            carbon_get_theme_option('crb_lighting_section_description')
          ); ?>
        </p>
      </div>
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
      <div class="thumbnail-carousel home__thumbnail-carousel mt-4"
        data-flickity='{"groupCells": true, "contain": true, "pageDots": false, "prevNextButtons": false }'>

        <?php while ($query->have_posts()):
          $query->the_post();

          // Подключаем шаблонный файл product-carousel-item.php
          get_template_part('template-parts/product-carousel-item');
        endwhile;endif;
      wp_reset_postdata();
      ?>

      </div>
    </section>





  </main>

  <?php get_footer();
?>