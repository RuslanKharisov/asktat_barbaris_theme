<!-- template-parts/review-content.php -->

<div class="flex flex-col gap-5 items-center justify-center py-10 lg-py-20 text-center">
    <h2 class="text-sm uppercase"><?php echo esc_html($reviewer_name); ?></h2>
    <p class="test-sm font-light"><?php echo esc_html($review_description); ?></p>
    <?php
    set_query_var('rating', $review_rating);
    get_template_part('template-parts/review-rating');
    ?>
</div>
