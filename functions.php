<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Rocket Customization
 */
if (!is_admin() ) {
	//wp_enqueue_style( 'custom-fonts',  get_template_directory_uri() . '/assets/css/fonts.css');
 	wp_enqueue_style( 'rocket-open-sans', '//fonts.googleapis.com/css?family=Open+Sans' );
    wp_enqueue_style( 'rocket-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'rocket-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'rocket-responsive',  get_template_directory_uri() . '/assets/css/rocket/responsive.css');	
	 
	wp_enqueue_script( 'rocket-popper',  'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js',array('jquery'));
	wp_enqueue_script( 'rocket-js',  'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js',array('jquery'));
	wp_enqueue_script( 'script-js',  get_template_directory_uri().'/assets/js/script.js',array('jquery'));
}
 
function removeScriptVersion( $src ){
	$parts = explode( '?ver', $src );  
	return $parts[0];
} 
add_filter( 'script_loader_src', 'removeScriptVersion', 15, 1 );
add_filter( 'style_loader_src', 'removeScriptVersion', 15, 1 );
 
function rocket_get_navigation(){
	$nav =  wp_nav_menu( 
				array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 4,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse desktop',
					'container_id'      => 'bs-navbar-collapse',
					'menu_class'        => 'nav navbar-nav'
				)
			);
	return $nav;
}
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}
function get_all_tags(){
    $terms = get_terms( array( 
        'hide_empty' => false, // only if you want to hide false
        'taxonomy' => 'product_tag',
		'orderby' => 'count',
		'order' => 'DESC'
     ) 
    );
    $html = '';
    if($terms){
		$ctr = 0;
        foreach($terms as $term){
			if($ctr>=12){ break; }
            $html .= "<a href='".get_term_link($term)."'><span class='woo-tag'>$term->name</span></a>";
			$ctr++;
        }
    }
    return $html;
}
function rocketPage() {
	global $wp_query;
	$big = 999999999; // need an unlikely integer
	
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text'          => __('«'),
		'next_text'          => __('»'),
		'total' => $wp_query->max_num_pages
	) );
}
function text_truncate($str,$length) {
	$return = '';
	if(strlen($str) >= $length){
		$return =  substr($str,0,$length).'...';
	}else{
		$return = $str;
	}
	return $return;
}
//Pull Post
function pull_blog_posts($atts, $content = null){
	    extract(shortcode_atts(array(
		   'posts' => 1,
		   'cat' => 1,
		   'template'  => 'blogs'
	    ), $atts));
		
		$return = '';
		
		$args = array(
			'orderby' => 'date', 
			'order' => 'DESC' , 
			'showposts' => $posts, 
			'cat' => $cat
		);
		
		$query = new WP_Query($args);
		
		$return = array();
		
		if($query->have_posts()){
			while($query->have_posts()){  
			$query->the_post();
				/*Pull news template*/
					$return['homepage'] .= '
						<div class="col-md-4">';
							if(has_post_thumbnail(get_the_ID())){
								$image = wp_get_attachment_image_src( get_post_thumbnail_id(  get_the_ID() ), 'single-post-thumbnail' );
								$return['homepage'] .= '<img title="'.get_the_title().'" alt="'.get_the_title().'" data-src="'.$image[0].'" style="" src="'.$image[0].'" data-holder-rendered="true" />';
							}else{
								$return['homepage'] .= '<img title="'.get_the_title().'" alt="'.get_the_title().'"  src="//placehold.it/400x250" data-holder-rendered="true" /> ';
							}
							$return['homepage'] .= ' 
							<h4>'.text_truncate(get_the_title(),50).'</h4>
							<p>'.text_truncate(get_the_excerpt(),150).'</p>
							<a href="'.get_the_permalink().'">Read more</a>
						</div> 
					';
				/*End Pull news template*/		
				
			}
		}
		switch($template){
			case 'homepage' : 			
				$return = $return['homepage'];
			break;
		}
		wp_reset_query();
	    return $return;
}
add_shortcode('recent-posts', 'pull_blog_posts'); //[recent-posts cat=5 post=5 template=homepage ]


function woocommerce_template_loop_stock() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() )
        echo '<p class="stock out-of-stock">Out of Stock</p>';
}
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );


//Load on backend
if(is_admin()){
	wp_enqueue_style('backend-css-styles', get_template_directory_uri().'/assets/backend/style.css');	
}

add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');
function custom_woocommerce_placeholder_img_src( $src ) {
	$upload_dir = wp_upload_dir();
	$uploads = untrailingslashit( $upload_dir['baseurl'] );
	// replace with path to your image
	$src = $uploads . '/2018/06/thumb.png';
	 
	return $src;
}