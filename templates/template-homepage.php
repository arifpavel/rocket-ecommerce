<?php
   /**
    * The template for displaying the homepage.
    *
    * This page template will display any functions hooked into the `homepage` action.
    * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
    * use the Homepage Control plugin.
    * https://wordpress.org/plugins/homepage-control/
    *
    * Template name: Homepage
    *
    * @package storefront
    */
   
   get_header(); ?>
<div id="primary" class="content-area">
   <main id="main" class="site-main" role="main">
      <div class="container">
         <div class="row">
            <div class="col-md-3 hp-sidebar">
				<!--SIDEBAR-->
					<?php echo do_shortcode('[php snippet=3]'); ?>
				<!--./SIDEBAR-->
            </div>
            <div class="col-md-9 hp-content">
               <section class="slider-container">
                  <?php echo do_shortcode('[rev_slider alias="homepage-slider"]'); ?>
               </section>
               <section class="buying-process">
					<div class="container-fluid np">
						<div class="row">
							<div class="col-md-4">
								<div class="p-3 bg-white shadow my-md-4 mb-sm-2">
									<span aria-hidden="true" class="fa fa-hand-point-up"></span>
									<h3>Select a product</h3>
									<p class="text-center">Go to <a href="/shop">Shop</a> page and choose your desired products.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-3 bg-white shadow my-md-4 mb-sm-2">
									<span aria-hidden="true" class="fa fa-paint-brush"></span>
									<h3>Design it!</h3>
									<p class="text-center">Customize or upload your own design or have our designer to do it for you.</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="p-3 bg-white shadow my-md-4 mb-sm-2">
									<span aria-hidden="true" class="fa fa-shopping-cart"></span>
									<h3>Checkout</h3>
									<p class="text-center">Fill out the checkout information and wait for your shipment.</p>
								</div>
							</div>
						</div>
					</div>
               </section>
               <section class="featured-products">
                  <div class="p-3 bg-white shadow mb-4">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6 text-left">
                              <h3>Featured Products</h3>
                           </div>
                           <div class="col-md-6 text-right">
                              <a href="<?php echo get_site_url(); ?>/shop">View more</a>
                           </div>
                        </div>
                        <hr/>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo do_shortcode('[products limit="4" columns="4" visibility="featured" ]'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="banner-promo-1">
                  <div class="np container-fluid">
                     <div class="row">
                        <div class="col-md-12 text-center">
                           <a href="<?php echo get_site_url(); ?>/shop"><img src="<?=get_site_url().'/wp-content/uploads/awards.jpg';?>" alt="" title="" draggable="false" /></a>
                        </div>
                       <!-- <div class="col-md-5 text-center">
							<img src="<?php echo get_site_url(); ?>/wp-content/uploads/banner-2-1.jpg" alt="" title="" draggable="false" />
                        </div>-->
                     </div>
                  </div>
               </section>				   
               <section class="acrylic-awards">
                  <div class="p-3 bg-white shadow my-md-4 mb-sm-2">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-6 text-left">
                              <h3>Acrylic Awards</h3>
                           </div>
                           <div class="col-md-6 text-right">
                              <a href="<?php echo get_site_url(); ?>/shop">View more</a>
                           </div>
                        </div>
                        <hr/>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo do_shortcode('[products limit="4" columns="4" category="acrylic" ]'); ?>
                              <?php //echo do_shortcode('[products limit="4" columns="4" visibility="featured" ]'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="glass-awards">
                  <div class="p-3 bg-white shadow my-md-4 mb-sm-2">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-6 text-left">
                              <h3>Glass Awards</h3>
                           </div>
                           <div class="col-md-6 text-right">
                              <a href="<?php echo get_site_url(); ?>/shop">View more</a>
                           </div>
                        </div>
                        <hr/>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo do_shortcode('[products limit="4" columns="4" category="glass" ]'); ?>
                              <?php //echo do_shortcode('[products limit="4" columns="4" visibility="featured" ]'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <section class="blog-section">
					<div class="p-3 bg-white shadow my-md-4 mb-sm-2">
						<div class="container-fluid">
							<div class="row"> 
								<div class="col-md-12">
									<h3>Blogs</h3>
								</div>
							</div>
							<div class="row"> 
								<?php echo do_shortcode('[recent-posts cat=3 posts=3 template="homepage"]'); ?>
							</div>
						</div>
					</div> 
               </section>	
		   
               <!--<section class="crystal-awards">
                  <div class="p-3 bg-white shadow my-md-4 mb-sm-2">
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-6 text-left">
                              <h3>Crystal Awards</h3>
                           </div>
                           <div class="col-md-6 text-right">
                              <a href="<?php echo get_site_url(); ?>/shop">View more</a>
                           </div>
                        </div>
                        <hr/>
                        <div class="row">
                           <div class="col-md-12">
                              <?php echo do_shortcode('[products limit="4" columns="4" category="crystal" ]'); ?>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>-->
               <section class="banner-promo-2 my-4">
                  <div class="np container-fluid">
                     <div class="row">
                        <div class="col-md-12 text-center">
                           <!--<img src="//placehold.it/848x201" alt="" title="" draggable="false" />-->
							<a href="<?php echo get_site_url(); ?>/blogs"> <img src="<?php echo get_site_url(); ?>/wp-content/uploads/banner-3.jpg" alt="" title="" draggable="false" /></a>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </main> <!-- #main -->
</div><!-- #primary -->
<?php
get_footer();