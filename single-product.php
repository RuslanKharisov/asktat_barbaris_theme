<?php
get_header();

if (have_posts()):
  while (have_posts()):
    the_post(); ?>
<main class="grow">
  <section class="bg-white ">
    <div class="gap-8 py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
      <div>
        <section class="product-slider">
          <div class="main-carousel"
            data-flickity='{ "pageDots": false, "prevNextButtons": false, "wrapAround": true }'>
            <?php
            $gallery_ids = carbon_get_post_meta(
              get_the_ID(),
              'product-gallery'
            );

            if (!empty($gallery_ids)) {
              foreach ($gallery_ids as $id) {
                $image_url = wp_get_attachment_image_url($id, 'full');
                if ($image_url) { ?>
            <div class="carousel-cell product__carousel-cell ">
              <img src="<?php echo esc_url(
                $image_url
              ); ?>" alt="Product Image" class="w-full h-full object-cover aspect-square" />
            </div>
            <?php }
              }
            }
            ?>
          </div>

          <div class="thumbnail-carousel product__thumbnail-carousel mt-4 h-full"
            data-flickity='{ "asNavFor": ".main-carousel", "contain": true, "pageDots": false, "prevNextButtons": false }'>

            <?php
            $gallery_ids = carbon_get_post_meta(
              get_the_ID(),
              'product-gallery'
            );

            if (!empty($gallery_ids)) {
              foreach ($gallery_ids as $id) {
                $image_url = wp_get_attachment_image_url($id, 'full');
                if ($image_url) { ?>
            <div class="carousel-cell product__carousel-cell me-1 w-1/5 h-[100px]">
              <img src="<?php echo esc_url(
                $image_url
              ); ?>" alt="thumbnail" class="w-full h-full object-cover aspect-square shadow-lg" />
            </div>
            <?php }
              }
            }
            ?>
          </div>
        </section>
      </div>

      <div class="pt-8 md:mt-0">
        <h2 class="mb-5 text-lg md:text-2xl lg:text-4xl uppercase font-normal tracking-tight text-primary-900">
          <?php the_title(); ?>
        </h2>

        <div class="mb-5 text-primary-950">
          <?php echo carbon_get_post_meta(get_the_ID(), 'product_description'); ?>
        </div>


        <div class="options text-primary-950 mb-5">
          <?php get_template_part('template-parts/product-characteristics'); ?>
        </div>



        <div class="font-light text-primary-500 md:text-lg mb-8">
          <p class="text-sm">Цена:
            <span class="product-price text-base font-medium ms-2">
              <span>от </span>
              <?php echo carbon_get_post_meta(
          get_the_ID(),
          'product-price-regular'
        ); ?>
            </span>
            <span class="text-base font-medium"> &#x20bd</span>
          </p>
        </div>



        <!--  -->

        <?php get_permalink(); ?>
        <div
          class="max-w-xs md:max-w-full mx-auto options py-6 border-2 rounded-md p-3 border-primary-300 font-light text-primary-500 md:text-lg">
          <form id="contactForm" method="POST">
            <input type="hidden" name="form_identifier" value="product_rqst_form">
            <input type="hidden" name="selected_size" id="selectedSize" value="">
            <input type="hidden" name="selected_color" id="selectedColor" value="">
            <input type="hidden" name="product_lnk" id="productLink" value="<?php get_permalink(); ?>">
            <!-- Другие поля формы -->
            <div class="grid lg:grid-cols-2 md:gap-6 mb-5">
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                  placeholder="Ваше имя" required />
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="tel" name="phone" id="phone"
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                  placeholder="Номер телефона" required />
              </div>
            </div>
            <input type="submit" value="Узнать цену сроки" class="w-full rounded-sm uppercase py-4 px-5 text-xs font-semibold text-primary-900
                hover:text-primary-100 bg-primary-50 border border-primary-200 hover:bg-primary-400 duration-300">
            </input>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>


<?php
  endwhile;
else:
  echo '<p>Продукт не найден</p>';
endif;

get_footer();