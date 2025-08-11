<?php

// Slug Page
function liotech_custom_body_classes($classes)
{
    if (is_page(283)) {
        $classes[] = 'page-terms';
    }

    if (is_page(10)) {
        $classes[] = 'page-return-policy';
    }
    

    return $classes;
}
add_filter('body_class', 'liotech_custom_body_classes');


function webtinus_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_post_type_support('your_custom_post_type', 'thumbnail');

    register_nav_menus(array(
        'header_page' => 'Header',
        'hamburger_menu' => 'MenuBar',
        'footer_page_1' => 'Footer',
        'footer_page_2' => 'Footer2'

    ));
}

add_action('after_setup_theme', 'webtinus_theme_setup');








// About style and js
function webtinus_name_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_style('my-custome-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/swiper/swiper-bundle.min.css');

    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/swiper/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('my-custome-js', get_template_directory_uri() . '/swiper/main.js', array('swiper-js'), time(), true);
}

add_action('wp_enqueue_scripts', 'webtinus_name_scripts');








// About comments
function custom_comments_template($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>
    <div class="single-comment" id="comment-<?php comment_ID(); ?>">
        <div class="comment-meta">
            <span class="comment-author"><?php echo get_comment_author_link(); ?></span>
            <span class="comment-date"><?php echo get_comment_date(); ?></span>
        </div>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
    </div>
    <div class="comment-reply">
        <?php comment_reply_link(array_merge($args, [
            'reply_text' => 'پاسخ',
            'depth' => $depth,
            'max_depth' => $args['max_depth']
        ])); ?>
    </div>
    <?php
}





// About Search box
function search_by_title_only($search, $query)
{
    if (!is_admin() && $query->is_search && $query->is_main_query()) {
        global $wpdb;

        $search = '';
        $search_terms = $query->query_vars['search_terms'];

        foreach ($search_terms as $term) {
            $term = esc_sql($wpdb->esc_like($term));
            $search .= " AND {$wpdb->posts}.post_title LIKE '%{$term}%'";
        }
    }

    return $search;
}
add_filter('posts_search', 'search_by_title_only', 10, 2);




// About THumbnail Of Sub Menu
add_filter('walker_nav_menu_start_el', 'add_acf_image_to_menu', 10, 4);
function add_acf_image_to_menu($item_output, $item, $depth, $args)
{
    // گرفتن آیدی آیتم منو
    $menu_item_id = $item->ID;

    // گرفتن فیلد ACF برای این آیتم
    $image = get_field('submenu_image', $menu_item_id);

    if ($image) {
        $img_tag = '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="menu-icon" />';
        // اضافه کردن تصویر به ابتدای آیتم منو
        $item_output = $img_tag . $item_output;
    }

    return $item_output;
}





// Add Favorite
function my_enqueue_favorite_script()
{
    wp_enqueue_script('favorite-script', get_template_directory_uri() . '/assets/js/favorite.js', ['jquery'], null, true);

    wp_localize_script('favorite-script', 'myAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'my_enqueue_favorite_script');

add_action('wp_ajax_toggle_favorite', 'toggle_favorite');
add_action('wp_ajax_nopriv_toggle_favorite', 'toggle_favorite');

function toggle_favorite()
{
    $product_id = intval($_POST['product_id']);
    $user_id = get_current_user_id();
    $is_favorite = false;
    $fav = [];

    if ($user_id) {
        // برای کاربران وارد شده
        $fav = get_user_meta($user_id, 'user_favorites', true);
        $fav = is_array($fav) ? $fav : [];

        if (in_array($product_id, $fav)) {
            $fav = array_diff($fav, [$product_id]);
        } else {
            $fav[] = $product_id;
            $is_favorite = true;
        }

        update_user_meta($user_id, 'user_favorites', array_values($fav));
    } else {
        // برای مهمان‌ها
        if (isset($_COOKIE['guest_favorites'])) {
            $fav = json_decode(stripslashes($_COOKIE['guest_favorites']), true);
        }

        $fav = is_array($fav) ? $fav : [];

        if (in_array($product_id, $fav)) {
            $fav = array_diff($fav, [$product_id]);
        } else {
            $fav[] = $product_id;
            $is_favorite = true;
        }

        // ذخیره در کوکی برای ۳۰ روز
        setcookie('guest_favorites', json_encode(array_values($fav)), time() + (86400 * 30), "/");
    }

    wp_send_json_success(['is_favorite' => $is_favorite]);
}







// Remove Downloads Link From Dashboard Page
add_filter('woocommerce_account_menu_items' , 'remove_downloads_from_account_menu');

function remove_downloads_from_account_menu($items) {
    unset($items['downloads']);
    return $items;
}


?>