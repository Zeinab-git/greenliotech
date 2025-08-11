<?php
/* Template Name : Favorites Page */
get_header();

$user_id = get_current_user_id();
$fav_ids = [];

if ($user_id) {
    $fav_ids = get_user_meta($user_id, 'user_favorites', true);
} elseif (isset($_COOKIE['guest_favorites'])) {
    $fav_ids = json_decode(stripslashes($_COOKIE['guest_favorites']), true);
}

if (!is_array($fav_ids) || empty($fav_ids)) {
    echo "<p style='text-align:center;'>هنوز هیچ محصولی به علاقه‌مندی‌ها اضافه نکردی 😔</p>";
} else {
    $query = new WP_Query([
        'post_type' => 'product',
        'post__in' => $fav_ids,
        'orderby' => 'post__in' // ترتیب بر اساس لیست علاقه‌مندی
    ]);

    if ($query->have_posts()):
        echo '<h1 class="header_pageFavorite">علاقه‌مندی‌ها</h1>';
        echo '<div class="products-grid">';
        while ($query->have_posts()):
            $query->the_post();
            // نمایش محصول
            wc_get_template_part('content', 'product');
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else:
        echo "<p style='text-align:center;'>محصولی پیدا نشد.</p>";
    endif;
}

get_footer(); ?>