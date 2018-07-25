<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$prod_meta = get_post_meta(get_the_ID());
$isDesignable = unserialize($prod_meta['wpc-metas'][0]);
//var_dump($isDesignable['can-design-from-blank']);

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<?php if($isDesignable['can-design-from-blank'] == 1){ ?>	
	<?php
	//echo get_site_url();
		$color_lock = '';
		$link = get_site_url().'/product-designer/design/'.get_the_ID();
		if(get_field("color_lock")!=null && get_field("color_lock")!='none'){
			$color_lock = get_field("color_lock");
			$link = get_site_url().'/product-designer/design/'.get_the_ID().'/?color='.$color_lock;
		}
	?>
	<h2>Design Options</h2>
	<table style="" class="wccpf_fields_table  design_now-wrapper">
	   <tbody>
		  <tr>
			 <td class="wccpf_label"><label for="design_now">1. Design Now : <a class="foobox" href="<?php echo get_site_url().'/wp-content/uploads/documentation.jpg'; ?>">Tutorial Here</a></label></td>
			 <td class="wccpf_value">
				<a href="<?php echo $link; ?>" class="design-now btn btn-primary">Design Now</a>
			 </td>
		  </tr>
	   </tbody>
	</table>	
	<script type="text/javascript">
		$ = jQuery.noConflict();
		$(function(){
			
			var textfield = $('textarea.wccpf-field');
			var file = $('input.wccpf-field');
			
			$('button.single_add_to_cart_button.button.alt').click(function(e){
				if(textfield.val() == '' && file.get(0).files.length === 0){
					e.preventDefault();
					alert('Please Select design Option');
				}else{
					if (confirm('I have thoroughly reviewed the artwork and confirm that it is correct and is ready for engraving. I understand that I will be responsible for reproduction costs if artwork mistakes are found after the order has been produced.')) {
						return true;
					} else {
						e.preventDefault();
					}
				}
			});
		});
	</script>
	<?php 
		}else{
			echo '
			<style>
				.wccpf-fields-group-1{visibility:hidden;}
			</style>
			';
		}  
		?>
	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		) );

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>

