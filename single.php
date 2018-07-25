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
		<h1 class="text-center innerpage-title"><?php the_title(); ?></h1>
	</header>
	<div class="container">
		<div id="primary" class="content-area">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				}
			?>				
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

				do_action( 'storefront_single_post_before' );

				get_template_part( 'content', 'single' );

				do_action( 'storefront_single_post_after' );

			endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
do_action( 'storefront_sidebar' );
get_footer();
