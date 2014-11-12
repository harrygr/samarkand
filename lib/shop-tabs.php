<?php
// Hide unwanted tabs
add_filter( 'woocommerce_product_tabs', 'samarkand_remove_product_tabs', 98 );
function samarkand_remove_product_tabs( $tabs ) {
    //unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}


// Add Custom Tabs
add_filter( 'woocommerce_product_tabs', 'samarkand_custom_product_tabs', 100 );
function samarkand_custom_product_tabs( $tabs ) {
	
	global $post; global $sa_settings;

	//The general tab
	if ( $tab_content = of_get_option('delivery_tab_content') ){
		$tabs['delivery_tab'] = array(
			'title' 	=> __( 'Delivery/Returns', 'woocommerce' ),
			'priority' 	=> 60,
			'callback' 	=> 'samarkand_global_tab_content'
			);
	}

	return $tabs;
}

//Delivery & returns
function  samarkand_global_tab_content() {

	if ($tab_content = of_get_option('delivery_tab_content') ) {
		echo $tab_content;
	}
}

// Size & fit
function  samarkand_custom_tab_content_2() {
	global $post;
	if ($tab_content = get_post_meta($post->ID, 'samarkand_tab_content_2', true)) {
		echo $tab_content;
	}
}

//Details & care
function samarkand_custom_tab_content_1() {
	global $post;
	if ($tab_content = get_post_meta($post->ID, 'samarkand_tab_content', true)) {
		echo $tab_content;
	}
}