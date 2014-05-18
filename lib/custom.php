<?php
/**
 * Custom functions
 */
function samarkand_styles(){
	$fonts = array(
		'Cabin:400,500,600,700,400italic,500italic',
		'Raleway:400,700',
		);
	$font_stylesheet = '//fonts.googleapis.com/css?family=' . implode('|', $fonts);
	wp_register_style( 'google_font', $font_stylesheet );

	wp_enqueue_style( 'google_font' );

}
add_action('wp_enqueue_scripts', 'samarkand_styles', 100);