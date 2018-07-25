<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>
	<header class="innerpage-header p-5">
		<h1 class="text-center innerpage-title">Page not found.</h1>
	</header>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<dl>
					<dt>The page you requested was not found, and we have a fine guess why.</dt>
					<dd>
						<ul class="disc">
							<li>If you typed the URL directly, please make sure the spelling is correct.</li>
							<li>If you clicked on a link to get here, the link is outdated.</li>
						</ul>
					</dd>
				</dl>
				<dl>
					<dt>What can you do?</dt>
					<dd>Have no fear, help is near! There are many ways you can get back on track with this site.</dd>
					<dd>
						<ul class="disc">
							<li><a href="#" onclick="history.go(-1); return false;">Go back</a> to the previous page.</li>
							<li>Use the search bar at the top of the page to search.</li>
							<li>Follow these links to get you back on track! <a href="<?php echo get_site_url(); ?>">Home</a> 
						</ul>
					</dd>
				</dl>
				<dl>
					<dt>Sitemap</dt>
					<dd>
						<ul class="disc">
							<?php
								echo wp_nav_menu( 
									array(
										'menu' => 'primary'
									)
								);
							?>
						</ul>
					</dd>
				</dl>				
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php do_action( 'storefront_sidebar' ); ?>
<?php get_footer();
