<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta name="google-site-verification" content="dsM7GVeiMNxQCSJ8TZAnGiF2zyTJWUqpTTjHrOc9Zak" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">

	<header class="bg-white">
		<div class="topmost">
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<span><i aria-hidden="true" class="fa fa-map-marker"></i>230 W. Baseline Rd. Suite 103A Tempe, AZ 85283 </span>
						<span><i aria-hidden="true" class="fa fa-phone"></i><a href="tel:480-968-0900">480-968-0900</a></span>
						<span><i aria-hidden="true" class="fa fa-envelope"></i><a href="mailto:info@tempetrophy.com">info@tempetrophy.com</a></span>
					</div>
					<div class="col-md-5 text-right">
						<span><i aria-hidden="true" class="fa fa-user"></i><a rel="nofollow" href="<?php echo get_site_url(); ?>/account">My Account</a></span>
						<span><i aria-hidden="true" class="fa fa-shopping-cart"></i><a rel="nofollow" href="<?php echo get_site_url(); ?>/cart">My Cart</a></span>
						<span><i aria-hidden="true" class="fa fa-check"></i><a rel="nofollow" href="<?php echo get_site_url(); ?>/cart/checkout">Checkout</a></span>
						<span><i aria-hidden="true" class="fa fa-lock"></i>
							<?php
								if(is_user_logged_in()){
									echo '<a rel="nofollow" href="'.wp_logout_url.'">Logout</a>';
								}else{
									echo '<a rel="nofollow" href="'.get_site_url().'/account/">Login / Register</a>';
								}
							?>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="header-mid">
			<div class="container">
				<div class="row">
					<div class="col-md-2"><a href="/"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/logo.png" /></a></div>
					<div class="col-md-7"><?php get_search_form(); ?></div>
					<div class="col-md-3"><?php echo storefront_header_cart(); ?></div>
				</div>
			</div>
		</div>
		<div class="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php echo rocket_get_navigation(); ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	//do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div>

		<?php
