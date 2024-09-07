<!-- template-parts/banner-gallery.php -->

<?php
$banner_title = get_query_var('banner_title', 'banner №1'); // Получаем заголовок баннера, переданный через set_query_var

$query = new WP_Query([
    'post_type' => 'folder',
    'title' => $banner_title,
    'posts_per_page' => 1,
]);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $gallery = carbon_get_post_meta(get_the_ID(), 'banner_gallery');
        $banner_title = carbon_get_post_meta(get_the_ID(), 'banner_title');
        ?>

        <div class="w-full border-y-2 border-primary-100">
            <div class="py-6 container mx-auto grid grid-rows-2 md:grid-rows-1 grid-flow-col auto-cols-min justify-center gap-2 md:gap-4 no-scrollbar overflow-x-auto">
                <?php if ($gallery) : 
                    foreach ($gallery as $image_id) :
                        $image_url = wp_get_attachment_image_url($image_id, 'full'); ?>
                        <div class="w-[150px] md:min-w-[150px] shadow-lg ">
                            <img class="aspect-square md:aspect-[3/4] w-full h-auto object-cover" src="<?php echo esc_url($image_url); ?>" alt="адресная табличка" />
                        </div>
                    <?php endforeach; 
                endif; ?>
            </div>
        </div>
        <h2 class="py-2 md:py-5 text-sm md:text-xl tracking-tight text-primary-900 text-center">
            <?php echo esc_html($banner_title); ?>
        </h2>

    <?php
    endwhile;
    wp_reset_postdata();
else :
    echo '<p>Баннер с указанным заголовком не найден.</p>';
endif;
?>
