<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
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

			<?php if ( have_posts() ) : ?>

				<?php get_template_part( 'loop' );

			else :

				get_template_part( 'content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
do_action( 'storefront_sidebar' );
get_footer();
