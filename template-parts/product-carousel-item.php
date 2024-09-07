<!-- product-carousel-item.php -->
<div class="carousel-cell home__carousel-cell">
  <a href="<?php the_permalink(); ?>">
    <div class="text-center text-mineshaft-500">

      <div class="mx-auto mb-4 max-w-[320px] shadow-lg ">
        <?php
        $thumbnail_id = carbon_get_post_meta(get_the_ID(), 'product_thumbnail');
        $image_url = wp_get_attachment_image_url($thumbnail_id, 'full');
        ?>
        <img class="mx-auto aspect-[3/4] object-cover" src="<?php echo esc_url($image_url); ?>" alt="" />
      </div>

      <div class="flex flex-col">
        <h3 class="mt-5 lg:text-lg font-medium tracking-tight text-mineshaft-700">
          <?php the_title(); ?>
        </h3>
        <div class="mt-1 flex gap-3 justify-center items-end">
          <p class="text-sm lg:text-base">от
            <?php echo carbon_get_post_meta(get_the_ID(), 'product-price-regular'); ?> Руб.
          </p>
        </div>
      </div>

    </div>
  </a>
</div>