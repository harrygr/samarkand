<?php 
add_theme_support( 'woocommerce' );

// TEMPORARY
// Hide add to cart

if (of_get_option('close_store', false))
{
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	if (of_get_option('store_notice_visible', false))
	{
		add_action('woocommerce_before_main_content', 'samarkand_store_wide_notice');
	}
}


function samarkand_store_wide_notice()
{
	echo "<div class='alert alert-info top-buffer'>" . of_get_option('store_notice_content', '') . "</div>";
}

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

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	foreach ($fields as $k1 => $subfields)
	{
		foreach ($subfields as $k2 => $field) 
		{
			// add classes
			$fields[$k1][$k2]['class'][] = 'form-group';
			$fields[$k1][$k2]['input_class'][] = 'form-control';
		}
	}
	//pr($fields);
     // $fields['billing']['billing_first_name']['placeholder'] = 'My new placeholder';
     // $fields['billing']['billing_first_name']['label'] = 'My new label';
	return $fields;
}

add_filter( 'woocommerce_credit_card_form_fields' , 'custom_credit_card_fields', 10, 2 );
/**
 * Filter the default WooCommerce Credit Card form fields to provide bootstrap styling
 * @param  Array $fields The default fields
 * @param  string $id The identifier of the gateway
 * @return Array An array of the payment fields
 */
function custom_credit_card_fields($fields, $id)
{
	$args['fields_have_names'] = 0;
	$fields = array(
		'card-number-field' => '<p class="form-row form-row-wide form-group col-md-6">
		<label for="' . esc_attr( $id ) . '-card-number">' . __( 'Card Number', 'woocommerce' ) . ' <span class="required">*</span></label>
		<input id="' . esc_attr( $id ) . '-card-number" class="form-control input-text wc-credit-card-form-card-number" type="text" maxlength="20" autocomplete="off" placeholder="•••• •••• •••• ••••" name="' . ( $args['fields_have_names'] ? 1 . '-card-number' : '' ) . '" />
		</p>',
		'card-expiry-field' => '<p class="form-row form-row-first form-group col-md-3 col-xs-6">
		<label for="' . esc_attr( $id ) . '-card-expiry">' . __( 'Expiry (MM/YY)', 'woocommerce' ) . ' <span class="required">*</span></label>
		<input id="' . esc_attr( $id ) . '-card-expiry" class="form-control input-text wc-credit-card-form-card-expiry" type="text" autocomplete="off" placeholder="' . __( 'MM / YY', 'woocommerce' ) . '" name="' . ( $args['fields_have_names'] ? 1 . '-card-expiry' : '' ) . '" />
		</p>',
		'card-cvc-field' => '<p class="form-row form-row-last form-group col-md-3 col-xs-6">
		<label for="' . esc_attr( $id ) . '-card-cvc">' . __( 'Card Code', 'woocommerce' ) . ' <span class="required">*</span></label>
		<input id="' . esc_attr( $id ) . '-card-cvc" class="form-control input-text wc-credit-card-form-card-cvc" type="text" autocomplete="off" placeholder="' . __( 'CVC', 'woocommerce' ) . '" name="' . ( $args['fields_have_names'] ? 1 . '-card-cvc' : '' ) . '" />
		</p>',
		'card-info-message'	=>	'<div class="clearfix"></div><p class="col-sm-12">Payment is processed securely by <a href="http://stripe.com" title="Stripe Website" target="_blank">Stripe</a>. ' . get_bloginfo('name') . ' does not store your card details.</p>'
		);
return $fields;
}
 ?>
