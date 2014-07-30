<?php 
add_theme_support( 'woocommerce' );

//prevent loading of default woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//hide the sales badge
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash() {
	return false;
}

//Prevent related products appearing too quickly
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'sam_after_single_product_detail', 'woocommerce_output_related_products', 20 );

//Remove product meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );



//Hide the "add to cart button" on shop pages
add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_woocommerce_loop_add_to_cart_link' );
function custom_woocommerce_loop_add_to_cart_link( $button ) {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	// if ( $product->product_type == 'variable' ) return '';
	// return false;
	// return $button;
}

//Customise the add to cart message
add_filter( 'wc_add_to_cart_message', 'sam_cart_message', 99);
function sam_cart_message($message){
		$message = str_replace('class="button', 'class="btn btn-primary', $message);
		return $message;
}

// Update the custom cart cookie
// this should only ever fire on non-cached pages (so it SHOULD fire
// whenever we add to cart / update cart / etc
function update_cart_total_cookie() {
    global $woocommerce;
    $cart_total = $woocommerce->cart->get_cart_total();
    $cart_count = $woocommerce->cart->cart_contents_count;
    setcookie('woocommerce_cart_count', $cart_count, 0, '/');
    setcookie('woocommerce_cart_total', $cart_total, 0, '/');
}
if(!is_admin()){
add_action('init', 'update_cart_total_cookie');
}

//NUMBER OF PRODUCTS TO DISPLAY ON SHOP PAGE
add_filter('loop_shop_per_page', 'wg_view_all_products');
function wg_view_all_products(){
	if(isset($_GET['view']) && $_GET['view'] === 'all'){
		return '9999';
	} else {
		return '12';
	}
}

// Hide unwanted tabs
add_filter( 'woocommerce_product_tabs', 'serge_remove_product_tabs', 98 );
function serge_remove_product_tabs( $tabs ) {
    //unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}
 ?>