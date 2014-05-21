<?php 
if ( function_exists('is_woocommerce') && is_woocommerce() ) {
	dynamic_sidebar('sidebar-shop'); 
} else {
	dynamic_sidebar('sidebar-primary');
}
?>