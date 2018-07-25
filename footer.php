<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3>Contact Us</h3>
					<div class="media">
					  <i class="fa fa-map-marker" aria-hidden="true"></i>
					  <div class="media-body">
						230 W. Baseline Rd. Suite 103A 
						Tempe, AZ 85283 USA
					  </div>
					</div>	
					<div class="media">
					  <i class="fa fa-phone" aria-hidden="true"></i>
						<div class="media-body"><a style="color:#898989;" href="tel:480-968-0900">+ (480) 968-0900</a></div>
					</div>	
					<div class="media">
					  <i class="fa fa-envelope" aria-hidden="true"></i>
					  <div class="media-body">
						<a style="color:#898989;" href="mailto:info@tempetrophy.com">info@tempetrophy.com</a>
					  </div>
					</div>						
				</div>
				<div class="col-md-3">
					<h3>Quick Links</h3>
					<ul>
						<li><a  href="<?php echo get_site_url();?>/terms-conditions">Terms & Conditions</a></li>
						<li><a  href="<?php echo get_site_url();?>/privacy-policy">Privacy Policy</a></li>					
						<li>
							<?php
								if(is_user_logged_in()){
									echo '<a rel="nofollow" href="'.wp_logout_url.'">Logout</a>';
								}else{
									echo '<a rel="nofollow" href="'.get_site_url().'/account/">Login / Register	</a>';
									
								}
							?>
						</li>
						<li><a rel="nofollow" href="<?php echo get_site_url();?>/account">My Account</a></li>
						<li><a rel="nofollow" href="<?php echo get_site_url();?>/cart">My Cart</a></li>
						<li><a rel="nofollow" href="<?php echo get_site_url();?>/cart/checkout">Checkout</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h3>Special Order products</h3>
					<ul>
						<li><a target="_blank" href="/media/pdfs/tempetrophy_Visions_Award_Craft_Catalog.pdf">Vision Awards</a></li>
						<li><a target="_blank" href="/media/pdfs/tempetrophy_PrecisionCutBrochure.pdf">Precision Cut Awards</a></li>
						<li><a target="_blank" href="http://www.americanacrylicaward.com/">American Acrylic Awards</a></li>
						<li><a target="_blank" href="/media/pdfs/tempetrophy_Showstopper_Dfcat_16-17.pdf">Show Stoppers Crystal Awards</a></li>
						<li><a target="_blank" href="http://www.prismcrystal.com/home.php">Prism Crystal Awards</a></li>
						<li><a target="_blank" href="/media/pdfs/tempetrophy_AIF_Catalog_62_and_Retail_Price_List.pdf">AIF Acrylic Awards</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h3>About Us</h3>
					<p>Tempe Trophy is a family owned and operated company, representing three generations of expertise in the awards industry.</p> 
					<p>For more than 30 years we have been creating awards and products of the finest quality.</p>
				</div>
			</div>
		</div><!-- .col-full -->
	</footer><!-- #colophon -->
	<div class="trust-icons p-3">
           <div class="container">
                <div class="row">
					<div class="col-md-6 mb-sm-4">
						<a target="_blank" href="https://www.facebook.com/pages/Tempe-Trophy/436306049748319"><i class="fa fa-facebook"></i></a>
						<a target="_blank" href="https://twitter.com/TempeTrophy"><i class="fa fa-twitter"></i></a>
						<a target="_blank" href="https://plus.google.com/111225238427714903013?gl=us&hl=en"><i class="fa fa-google-plus"></i></a>
						<a target="_blank" href="https://www.pinterest.com/tempetrophy/"><i class="fa fa-pinterest"></i></a>
						<a target="_blank" href="https://www.instagram.com/tempetrophy/"><i class="fa fa-instagram"></i></a>
						<a target="_blank" href="https://www.youtube.com/channel/UCFCzcl9fwPTSI9HJijfSnIw"><i class="fa fa-youtube"></i></a>
					</div>
					<div class="col-md-6 text-right text-sm-center">
						<span class="amex-xs"></span>
						<span class="dinersclub-xs"></span>
						<span class="discover-xs"></span>
						<span class="jcb-xs"></span>
						<span class="mastercard-xs"></span>
						<span class="visa-xs"></span>
					</div>
                </div>
           </div>
	</div>
	<div class="copy p-3">
		<p class="m-0 text-center">All Rights Reserved &copy; <?php echo date('Y'); ?> Tempe Trophy.</p>
		<!--<p class="m-0 text-center">Web Design & Development by <a href="https://www.urvirtualpartners.com" target="_blank">UR Virtual Partners.</a></p>-->
	</div>
	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->
<!--Start of Zopim Live Chat Script by Diglin GmbH-->
<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	$.src='//v2.zopim.com/?4Epq2rDCYTgByglZpOwQBZgzKfrcfjQM';z.t=+new Date;$.
	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script><!--End of Zopim Live Chat Script by Diglin GmbH-->
<!--Zopim Options by Diglin GmbH-->
<script>
	$zopim(function(){
		$zopim.livechat.setLanguage('en');
	});
</script>
<!--EOF Zopim Options by Diglin GmbH-->
<?php wp_footer(); ?>

</body>
</html>
