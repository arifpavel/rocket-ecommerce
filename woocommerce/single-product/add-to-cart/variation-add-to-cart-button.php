<?php
/**
 * Single variation cart button
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
?>

<?php if($isDesignable['can-design-from-blank'] == 1){ ?>
	<!--CUSTOM SCRIPT-->
		<h2>Design Options</h2>		
		<table style="display:block" class="wccpf_fields_table design_now-wrapper variation_design_now">
		   <tbody>
			  <tr>
				 <td class="wccpf_label"><label for="design_now">1. Design Now : <a class="foobox" href="<?php echo get_site_url().'/wp-content/uploads/documentation.jpg'; ?>">Tutorial Here</a></label></td>
				 <td class="wccpf_value">
					SELECT AN OPTION
				 </td>
			  </tr>
		   </tbody>
		</table>
		<?php
			$variations = $product->get_available_variations();
			foreach ($variations as $variation){
				//var_dump($variation['attributes']['attribute_pa_size']);
				$var_id = $variation['variation_id'];
				$var_att_size = "";
				if(!empty($variation['attributes']['attribute_pa_size'])){
					$var_att_size = $variation['attributes']['attribute_pa_size'];
				}else if(!empty($variation['attributes']['attribute_size'])){
					$var_att_size = $variation['attributes']['attribute_size'];
				}
				//var_dump($variation['attributes']['attribute_size']);
				$color_lock = '';
				$link = get_site_url().'/product-designer/design/'.$var_id;
				if(get_field("color_lock")!=null && get_field("color_lock")!='none'){
					$color_lock = get_field("color_lock");
					$link = get_site_url().'/product-designer/design/'.$var_id.'/?color='.$color_lock;
				}
				
				echo '
					<table style="display:none" class="option-name-'.$var_att_size.' option-id-='.$var_id.' wccpf_fields_table design_now-wrapper variation_design_now">
					   <tbody>
						  <tr>
							 <td class="wccpf_label"><label for="design_now">1. Design Now : <a class="foobox" href="'.get_site_url().'/wp-content/uploads/documentation.jpg'.'">Tutorial Here</a></label></td>
							 <td class="wccpf_value">
								<a href="'.$link.'" class="design-now btn btn-primary">Design Now</a>
							 </td>
						  </tr>
					   </tbody>
					</table>
				';
			}
		?>		
		<script type="text/javascript">
			$x = jQuery.noConflict();
			$x(function(){
				//console.log('Loaded'); 
				//var variations = $x('select#pa_size');
				var variations = $x('select[id$=size]');
				var target = $x('.variation_design_now');
				variations.change(function(){ 
					var size = $x(this).val();
					var _class = size.replace(/ /g,".");
					var dec = size.split(".");
					
					//console.log('option-name-'+size);
				
					target.attr({'style':'display:none;'});
					$x('.option-name-'+_class).attr({'style':'display:block;'});
					
					console.log('Variation : option-name-'+_class);
					
					if(dec.length > 1){
						console.log(dec.length);
						dec = size.substr(0, size.indexOf('.'));
						$x('table[class^="option-name-'+dec+'"]').attr({'style':'display:block;'});
						//console.log($x('table[class^="option-name-'+dec+'"]').attr({'style':'display:block;'}));
					}
					
					//console.log('option-name-'+_class);
				});
				
				//Select Product Options
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
	<!--./CUSTOM SCRIPT-->
<?php 
}else{
	echo '
	<style>
		.wccpf-fields-group-1{visibility:hidden;}
	</style>
	';
} 
?>
<div class="woocommerce-variation-add-to-cart variations_button">
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

	<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>

