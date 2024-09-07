<?php
/**
 * Template Part for displaying product characteristics
 */

 $characteristics = carbon_get_post_meta(get_the_ID(), 'product-characteristic');

if (!empty($characteristics)) :
    ?>
<div class="product-characteristics">
  <h2 class = " font-semibold">Характеристики</h2>
  <ul>
    <?php foreach ($characteristics as $characteristic) :
                    $variants = implode('; ', explode(';', $characteristic['variants']));
                ?>
    <li><p class = "font-semibold"><?php echo esc_html($characteristic['name']); ?>: <span class=" font-normal "><?php echo $variants; ?></span> </p> </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php
endif;