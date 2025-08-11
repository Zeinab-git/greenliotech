<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;

if (!$product || !$product instanceof WC_Product) {
	return '';
}

$attachment_ids = $product->get_gallery_image_ids();
if ($product->get_image_id()) {
	array_unshift($attachment_ids, $product->get_image_id());
}
?>

<div class="product-gallery">
	<div class="main-image">
		<img id="mainProductImage" src="<?php echo wp_get_attachment_image_url($attachment_ids[0], 'large'); ?>"
			alt="تصویر محصول" />
	</div>

	<div class="thumbnails">
		<?php foreach ($attachment_ids as $id): ?>
			<img class="thumb-image" src="<?php echo wp_get_attachment_image_url($id, 'thumbnail'); ?>"
				data-full="<?php echo wp_get_attachment_image_url($id, 'large'); ?>" />
		<?php endforeach; ?>
	</div>
</div>