<?php
/* Template Name: Catalog Page */
?>

<body class=" min-h-screen flex flex-col">
  <?php get_header(); ?>

  <main class="grow">
    <section class="bg-white ">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
        <div class="mx-auto mb-8 max-w-screen-lg lg:mb-16">
          <h1 class="mb-8 text-4xl tracking-tight font-extrabold text-mineshaft-900 ">
            Выбрать и заказать датчики давления
          </h1>
          <p class="font-light text-mineshaft-500 sm:text-xl ">
            В каталоге представлен ассортимент поставляемой продукции. Вы можете закзать датчики давления направив
            в наш адресс заполненные опросные листы. Наши специалисты осуществят подбор необходимых преобразователей
            давления и осущесвят поставку в минимальные сроки.
          </p>
        </div>
        <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 lg:grid-cols-3">

          <?php
          $args = [
            'post_type' => 'product',
            'posts_per_page' => -1,
          ];
          $query = new WP_Query($args);
          if ($query->have_posts()):
            while ($query->have_posts()):
              $query->the_post(); ?>


          <a href="<?php the_permalink(); ?>">
            <div class="text-center text-mineshaft-500 ">
              <div class="mx-auto mb-4 w-80 md:w-96">
                <?php
                $thumbnail_id = carbon_get_post_meta(
                  get_the_ID(),
                  'product_thumbnail'
                );
                $image_url = wp_get_attachment_image_url($thumbnail_id, 'full');
                ?>
              </div>
              <img class="mx-auto aspect-square object-cover shadow-lg mb-8" src="<?php echo esc_url($image_url); ?>" alt="" />
              <h3 class="mb-3 text-lg font-medium tracking-tight text-mineshaft-700">
                <?php the_title(); ?>
              </h3>
              <p class="mb-5">
                <?php echo carbon_get_post_meta(
                  get_the_ID(),
                  'product_short_description'
                ); ?>
              </p>
              <div class="flex gap-3 justify-center items-end">
                <p class=""> от
                  <?php echo carbon_get_post_meta(
                    get_the_ID(),
                    'product-price-regular'
                  ); ?> Руб.
                </p>
              </div>
            </div>
          </a>

          <?php
            endwhile;
          endif;
          wp_reset_postdata();
          ?>

        </div>
      </div>
    </section>

  </main>

  <?php get_footer();
?>