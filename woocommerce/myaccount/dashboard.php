<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="dashboard-users">
	<div class="dashboard-information">
		<?php $current_user_id = get_current_user_id();
		$profile_image = get_field('profile_picture', 'user_' . $current_user_id);
		$profile_url = site_url('/edit-profile');
		if ($profile_image) {
			$profile_image_url = wp_get_attachment_image_url($profile_image, 'thumbnail');
		} else {
			$profile_image_url = get_template_directory_uri() . '/Images/profile1.jpg';
		}
		echo '<a href= "' . esc_url($profile_url) . '"><img src=" ' . esc_url($profile_image_url) . '"alt="profile" class="dashboard_profile_image" /></a>';
		?>
		<p>
			<?php
			printf(
				/* translators: 1: user display name 2: logout url */
				wp_kses(__('سلام %1$s', 'woocommerce'), $allowed_html),
				'<strong>' . esc_html($current_user->display_name) . '</strong>',
				esc_url(wc_logout_url())
			);
			?>
		</p>
	</div>
	<div class="dashboard-biography">
		<div class="dashboard-details">
			<div>
				<h3>سبد خرید</h3>
				<a href="/سبد-خرید/">
					<img src="<?php echo get_template_directory_uri(); ?>/Images/icons8-shopping-cart-64.png" alt="سبد خرید">
					<p><?php echo WC()->cart->get_cart_contents_count(); ?></p>
				</a>
			</div>
			<div>
				<h3>سفارش ها</h3>
				<a href="/حساب-کاربری-من/orders/">
					<?php 
					$current_userId = get_current_user_id();
					$args = array(
						'customer_id' => $current_userId,
						'post_status' => array('wc-completed' , 'wc-processing' , 'wc-on-hold'),
						'return' => 'ids'
					);
					$orders = wc_get_orders($args);
					$orders_count =	count($orders);				
					?>
					<img src="<?php echo get_template_directory_uri(); ?>/Images/icons8-box-70.png" alt="سبد خرید">
					<p><?php echo $orders_count; ?></p>
				</a>
			</div>
		</div>
		<p>
			<?php
			/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
			$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
			if (wc_shipping_enabled()) {
				/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
				$dashboard_desc = __('From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce');
			}
			printf(
				wp_kses($dashboard_desc, $allowed_html),
				esc_url(wc_get_endpoint_url('orders')),
				esc_url(wc_get_endpoint_url('edit-address')),
				esc_url(wc_get_endpoint_url('edit-account'))
			);
			?>
		</p>
	</div>
</div>

<?php
/**
 * My Account dashboard.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_dashboard');

/**
 * Deprecated woocommerce_before_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_before_my_account');

/**
 * Deprecated woocommerce_after_my_account action.
 *
 * @deprecated 2.6.0
 */
do_action('woocommerce_after_my_account');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
