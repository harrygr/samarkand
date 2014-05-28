<footer class="content-info top-buffer" role="contentinfo">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
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