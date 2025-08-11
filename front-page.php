<?php
/* Template Name : Home Page */
get_header();
?>


<?php
$category = array(
    array(
        'slug' => 'هدفون',
        'title' => 'هدفون',
        'class' => 'headPhone'
    ),
    array(
        'slug' => 'گجت های خودرو',
        'title' => 'گجت های خودرو',
        'class' => 'parts'
    )
);

$category2 = array(
    array(
        'slug' => 'ابزار دیجیتال و کامپیوتر',
        'title' => 'ابزار دیجیتال و کامپیوتر',
        'class' => 'tools'
    ),
    array(
        'slug' => 'کیف و تجهیزات حمل',
        'title' => 'کیف و تجهیزات حمل',
        'class' => 'bag'
    )
)
    ?>

<div class="home_container">
    <!-- Modal Cart -->
    <div class="modal_cart">
        <p>به سبد خرید اضافه شد.</p>
        <button><a href="<?php echo wc_get_cart_url(); ?>">مشاهده سبد خرید</a></button>
    </div>
    <!-- Poster Header -->
    <div class="poster_container">
        <?php
        $image1 = get_field('first_picture');
        $image2 = get_field('second_picture');
        $image3 = get_field('third_picture');
        $image4 = get_field('forth_picture');
        $image5 = get_field('fifth_picture');
        $image6 = get_field('sixth_picture');
        ?>
        <div class="poster_right">
            <div class="card_normal-right">
                <div class="normal_poster-right"
                    style="background-image: url('<?php echo esc_url($image4['url']) ?>');"></div>
                <div class="card_text">
                    <h2><?php echo esc_html($image4['title']); ?></h2>
                    <button class="shop"><a
                            href="<?php echo esc_url(get_term_link('کیس-ایرپاد', 'product_cat')) ?>">خرید
                            <?php echo esc_html($image4['title']) ?></a></button>
                </div>
            </div>
            <div class="card_normal-right">
                <div class="normal_poster-right"
                    style="background-image: url('<?php echo esc_url($image2['url']) ?>');"></div>
                <div class="card_text">
                    <h2><?php echo esc_html($image2['title']); ?></h2>
                    <button class="shop"><a
                            href="<?php echo esc_url(get_term_link('ساعت-هوشمند', 'product_cat')) ?>">خرید
                            <?php echo esc_html($image2['title']) ?></a></button>
                </div>
            </div>
            <div class="card_normal-right">
                <div class="normal_poster-right"
                    style="background-image: url('<?php echo esc_url($image3['url']) ?>');"></div>
                <div class="card_text">
                    <h2><?php echo esc_html($image3['title']); ?></h2>
                    <button class="shop"><a href="<?php echo esc_url(get_term_link('کیف-دستی', 'product_cat')) ?>">خرید <?php echo esc_html($image3['title']) ?></a></button>
                </div>
            </div>
        </div>
        <div class="poster_left">
            <div class="card_special">
                <div class="special_poster" style="background-image: url('<?php echo esc_url($image5['url']) ?>');">
                </div>
                <div class="card_text">
                    <h2><?php echo esc_html($image5['title']); ?></h2>
                    <button class="shop"><a href="<?php echo esc_url(get_term_link('هدفون', 'product_cat')) ?>">خرید
                            <?php echo esc_html($image5['title']) ?></a></button>
                </div>
            </div>
            <div>
                <div class="card_normal-left">
                    <div class="normal_poster-left"
                        style="background-image: url('<?php echo esc_url($image1['url']) ?>');"></div>
                    <div class="card_text">
                        <h2><?php echo esc_html($image1['title']); ?></h2>
                        <button class="shop"><a
                                href="<?php echo esc_url(get_term_link('لوازم-جانبی-موبایل', 'product_cat')) ?>">خرید
                                <?php echo esc_html($image1['title']) ?></a></button>
                    </div>
                </div>
                <div class="card_normal-left">
                    <div class="normal_poster-left"
                        style="background-image: url('<?php echo esc_url($image6['url']) ?>');"></div>
                    <div class="card_text">
                        <h2><?php echo esc_html($image6['title']); ?></h2>
                        <button class="shop"><a href="<?php echo esc_url(get_term_link('اسپیکر-بلوتوث', 'product_cat')) ?>">خرید <?php echo esc_html($image6['title']) ?></a></button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Phone Swiper -->
    <div class="swiper swiper-accessoriesphone">
        <?php $term = get_term_by('slug', 'لوازم جانبی موبایل', 'product_cat');
        $link = get_term_link($term); ?>
        <div class="swiper_title">
            <h1>لوازم جانبی موبایل</h1>
            <button><a href="<?php echo esc_url($link); ?>">مشاهده همه</a></button>
        </div>
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'لوازم جانبی موبایل',
                    ),
                ),
            );

            $loop = new WP_Query($args);
            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    ?>
                    <div class="swiper-slide accessoriesphone-slide"><?php wc_get_template_part('content', 'product'); ?></div>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-button-prev accessoriesphone-prev"></div>
        <div class="swiper-button-next accessoriesphone-next"></div>
        <div class="swiper-pagination accessoriesphone-page"></div>
    </div>

    <!-- Trend Products -->
    <div class="trend_container">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => 'product',
                ),
            ),
        );

        $loop = new WP_Query($args);
        if ($loop->have_posts()):
            while ($loop->have_posts()):
                $loop->the_post();
                ?>
                <div class="trend_product">
                    <div>
                        <?php woocommerce_template_loop_product_title(); ?>
                        <p><?php echo the_excerpt(); ?></p>
                        <div class="trend_cart">
                            <?php woocommerce_template_loop_price();
                            do_action('woocommerce_after_shop_loop_item');
                            ?>
                        </div>
                    </div>
                    <?php woocommerce_template_loop_product_thumbnail(); ?>
                </div>
                <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>

    <!-- Swiper Crousel 1  -->
    <?php foreach ($category as $cat):
        $term = get_term_by('slug', $cat['slug'], 'product_cat');
        $link = get_term_link($term); ?>
        <div class="swiper swiper-<?php echo $cat['class']; ?>">
            <div class="swiper_title">
                <h1><?php echo $cat['title']; ?></h1>
                <button><a href="<?php echo esc_url($link); ?>">مشاهده همه</a></button>
            </div>
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $cat['slug'],
                        ),
                    ),
                );

                $loop = new WP_Query($args);
                if ($loop->have_posts()):
                    while ($loop->have_posts()):
                        $loop->the_post();
                        ?>
                        <div class="swiper-slide <?php echo $cat['class']; ?>-slide">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="swiper-button-prev <?php echo $cat['class']; ?>-prev"></div>
            <div class="swiper-button-next <?php echo $cat['class']; ?>-next"></div>
            <div class="swiper-pagination <?php echo $cat['class']; ?>-page"></div>
        </div>
    <?php endforeach; ?>

    <!-- Poster Of Product -->
    <div class="posterOfProduct">
        <?php $image7 = get_field('seventh_picture');
        $image8 = get_field('eight_picture'); ?>
        <div class="posterOfProduct_child" style="background-image: url('<?php echo esc_url($image7['url']) ?>');">
        </div>
        <div class="posterOfProduct_child" style="background-image: url('<?php echo esc_url($image8['url']) ?>');">
        </div>
        <div class="posterOfProduct_text">
            <h3>کیف دستی مردانه ، انتخابی شایسته برای آقایان خوش سلیقه</h3>
            <p>ترکیبی از طراحی مدرن ، کیفیت بالا و کاربرد روزمره</p>
            <p>اکنون انتخاب کنید و ظاهر خود را متمایز کنید.</p>
            <button class="bag_button"><a
                    href="<?php echo esc_url(get_term_link('کیف-دستی', 'product_cat')) ?>">خرید</a></button>
        </div>
    </div>

    <!-- Swiper Crousel 2  -->
    <?php foreach ($category2 as $cat2):
        $term2 = get_term_by('slug', $cat2['slug'], 'product_cat');
        $link2 = get_term_link($term2); ?>
        <div class="swiper swiper-<?php echo $cat2['class']; ?>">
            <div class="swiper_title">
                <h1><?php echo $cat2['title']; ?></h1>
                <button><a href="<?php echo esc_url($link2); ?>">مشاهده همه</a></button>
            </div>
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 12,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'slug',
                            'terms' => $cat2['slug'],
                        ),
                    ),
                );

                $loop = new WP_Query($args);
                if ($loop->have_posts()):
                    while ($loop->have_posts()):
                        $loop->the_post();
                        ?>
                        <div class="swiper-slide <?php echo $cat2['class']; ?>-slide">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="swiper-button-prev <?php echo $cat2['class']; ?>-prev"></div>
            <div class="swiper-button-next <?php echo $cat2['class']; ?>-next"></div>
            <div class="swiper-pagination <?php echo $cat2['class']; ?>-page"></div>
        </div>
    <?php endforeach; ?>

    <!-- Poster Of Product -->
    <?php $image9 = get_field('nineth_picture'); ?>
    <div class="posterOfProduct2" style="background-image: url('<?php echo esc_url($image9['url']) ?>');">
        <div class="posterOfProduct2_text">
            <h3>اسپیکر باکیفیت ، طراحی مدرن و صدایی شفاف در هر محیط</h3>
            <p>اتصال سریع ، بی سیم و بدون مرز</p>
            <p>انتخابی ایده آل برای لحظات خاص شما</p>
            <button class="bag_button"><a
                    href="<?php echo esc_url(get_term_link('اسپیکر-بلوتوث', 'product_cat')) ?>">خرید</a></button>
        </div>
    </div>

    <!-- Watch Swiper -->
    <div class="swiper swiper-watch">
        <?php $term = get_term_by('slug', 'ساعت و مچ بند هوشمند', 'product_cat');
        $link = get_term_link($term); ?>
        <div class="swiper_title">
            <h1>ساعت و مچ بند هوشمند</h1>
            <button><a href="<?php echo esc_url($link); ?>">مشاهده همه</a></button>
        </div>
        <div class="swiper-wrapper">
            <?php
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => 'ساعت و مچ بند هوشمند',
                    ),
                ),
            );

            $loop = new WP_Query($args);
            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
                    ?>
                    <div class="swiper-slide watch-slide"><?php wc_get_template_part('content', 'product'); ?></div>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </div>
        <div class="swiper-button-prev watch-prev"></div>
        <div class="swiper-button-next watch-next"></div>
        <div class="swiper-pagination watch-page"></div>
    </div>
</div>


<?php get_footer(); ?>