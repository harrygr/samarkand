<footer class="content-info top-buffer" role="contentinfo">
	<div class="container">
		<div class="row top-buffer" id="footer-widgets">
			<?php dynamic_sidebar('sidebar-footer'); ?>
		</div>
		<?php 
		$social_icons = [
		'twitter'	=> of_get_option('twitter_url', ''),
		'instagram'	=> of_get_option('instagram_url', ''),
		'facebook'	=> of_get_option('facebook_url', ''),
		'pinterest' => of_get_option('pinterest_url', ''),
		]; 
		?>
		<div class="row">
			
			<div class="col-sm-6">
				<ul class="social-icons">
					<?php 
					foreach ($social_icons as $classname => $url) : 
						if ( $url && $url != '' ) :
							?>
						<li>
							<a target="_blank" href="<?php echo $url ?>">
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-<?php echo $classname; ?> fa-stack-1x fa-inverse social-icon"></i>
								</span>
							</a>
						</li>
						<?php 
						endif;
					endforeach; 
					?>
					</ul>
				</div>

				<div class="col-sm-6 copyright">&copy; <?php echo date('Y') . ' '; bloginfo('name'); ?></div>

			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
	<?php if(!isset($woocommerce)) global $woocommerce; ?>
	<script type="text/javascript">
	jQuery(function($){
  // use the custom woocommerce cookie to determine if the empty cart icon should show in the header or the full cart icon should show
  var cartCount = $.cookie("woocommerce_cart_count");
  var cartTotal = $.cookie("woocommerce_cart_total");
  if ( typeof(cartTotal) === "undefined") cartTotal = "£0.00";

  var cart_url = "<?php echo $woocommerce->cart->get_cart_url(); ?>";
  var shop_url = "<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>";

  if (typeof(cartCount) !== "undefined" && parseInt(cartCount, 10) > 0) {
  	$('#micro-cart .cart_link').html(cartCount + ' items');
  	$('#micro-cart .cart_link').attr('href', cart_url);
  } else {
  	$('#micro-cart .cart_link').html('Basket Empty');
  	$('#micro-cart .cart_link').attr('href', shop_url);
  }
  $('#micro-cart .cart_amount').html(cartTotal);
});
	</script>