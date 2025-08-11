<?php
/* Template Name : sale Page */
get_header();
?>



<div class="container_pageSale">
    <h1>فروش ویژه</h1>
    <?php woocommerce_breadcrumb(); ?>


    <div class="products_pageSale">
        <?php


        $products = wc_get_products(array(
            'limit' => -1,
            'status' => 'publish',
        ));

        foreach ($products as $product) {
            if ($product->is_on_sale()) {
                setup_postdata($product->get_id());
                global $product;
                // Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
                if (!is_a($product, WC_Product::class) || !$product->is_visible()) {
                    return;
                }
                ?>
                <li <?php wc_product_class('', $product); ?>>
                    <?php
                    /**
                     * Hook: woocommerce_before_shop_loop_item.
                     *
                     * @hooked woocommerce_template_loop_product_link_open - 10
                     */
                    do_action('woocommerce_before_shop_loop_item');

                    /**
                     * Hook: woocommerce_before_shop_loop_item_title.
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action('woocommerce_before_shop_loop_item_title');

                    /**
                     * Hook: woocommerce_shop_loop_item_title.
                     *
                     * @hooked woocommerce_template_loop_product_title - 10
                     * do_action('woocommerce_shop_loop_item_title');
                
                     * Hook: woocommerce_after_shop_loop_item_title.
                     *
                     * @hooked woocommerce_template_loop_rating - 5
                     * @hooked woocommerce_template_loop_price - 10
                     * do_action('woocommerce_after_shop_loop_item_title');
                     */
                    ?>

                    <div class="product_pageSaleInfo">
                        <h2><a href="<?php  echo get_permalink($product->get_id()); ?>"><?php echo $product->get_title(); ?></a></h2>
                        <?php
                        do_action('woocommerce_after_shop_loop_item_title');
                        ?>
                        <p><?php echo $product->get_short_description(); ?></p>
                        <?php
                        do_action('woocommerce_after_shop_loop_item');
                        ?>
                        <button></button>
                    </div>

                    <?php
                    /**
                     * Hook: woocommerce_after_shop_loop_item.
                     *
                     * @hooked woocommerce_template_loop_product_link_close - 5
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     * do_action('woocommerce_after_shop_loop_item');
                     */
                    ?>
                </li>
                <?php
            }
        }
        wp_reset_postdata();?>
        
    </div>

</div>





<?php get_footer(); ?>