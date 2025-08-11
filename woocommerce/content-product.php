<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

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
	 */
	do_action('woocommerce_shop_loop_item_title'); ?>
	<?php
	$fav = [];
	$user_id = get_current_user_id();

	if ($user_id) {
		$fav = get_user_meta($user_id, 'user_favorites', true);
	} elseif (isset($_COOKIE['guest_favorites'])) {
		$fav = json_decode(stripslashes($_COOKIE['guest_favorites']), true);
	}

	$fav = is_array($fav) ? $fav : [];
	$is_fav = in_array(get_the_ID(), $fav);
	?>
	<div class="favorite_container">
		<button class="add-to-favorite" data-product-id="<?php echo get_the_ID(); ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/Images/<?php echo $is_fav ? 'favorite1.png' : 'favorite.png'; ?>"
				data-default-src="<?php echo get_template_directory_uri(); ?>/Images/favorite.png"
				data-active-src="<?php echo get_template_directory_uri(); ?>/Images/favorite1.png"
				class="heart-icon <?php echo $is_fav ? 'active' : ''; ?>" alt="افزودن به علاقه‌مندی" />
		</button>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 * do_action('woocommerce_after_shop_loop_item_title');
	 */
	?>
	<div class="price_conatiner">
		<?php woocommerce_template_loop_price(); ?>
		<?php do_action('woocommerce_after_shop_loop_item'); ?>
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