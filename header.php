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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>
	<div class="topmost">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					TOPMOST
				</div>
			</div>
		</div>
	</div>
	<div class="header-mid">
		<div class="container">
			<div class="row">
				<div class="col-md-4">LOGO</div>
				<div class="col-md-5"><?php get_search_form(); ?></div>
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
	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div>

		<?php
		do_action( 'storefront_content_top' );
