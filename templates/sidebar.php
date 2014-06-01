<?php 
if ( function_exists('is_woocommerce') && is_woocommerce() || is_page(['cart', 'checkout', 'my-account'])) {
	dynamic_sidebar('sidebar-shop'); 
} else {
	dynamic_sidebar('sidebar-primary');
}
?>