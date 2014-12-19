<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	//$themename = get_option( 'stylesheet' );
	//$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$themename = 'samarkand';

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {
	$options = [];

	$options[] = [
	'name' => __('General Settings', 'options_check'),
	'type' => 'heading',
	];
	$options[] = [
	'name' => __('Facebook Page URL', 'options_check'),
	'desc' => __('Used for the footer facebook button', 'options_check'),
	'id' => 'facebook_url',
	'std' => '',
	'type' => 'text'
	];
	$options[] = [
	'name' => __('Twitter Profile URL', 'options_check'),
	'desc' => __('Used for the footer twitter button', 'options_check'),
	'id' => 'twitter_url',
	'std' => '',
	'type' => 'text'
	];
	
	$options[] = [
	'name' => __('Instagram Profile URL', 'options_check'),
	'desc' => __('Used for the footer Instagram Icon', 'options_check'),
	'id' => 'instagram_url',
	'std' => '',
	'type' => 'text'
	];
	
	$options[] = [
	'name' => __('Google Analytics ID', 'options_check'),
	'desc' => __('', 'options_check'),
	'id' => 'analytics_id',
	'std' => '',
	'type' => 'text'
	];

	$options[] = array(
		'name' => __('Shop Settings', 'options_check'),
		'type' => 'heading');

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => false,
		);

	$options[] = array(
		'name' => __('Delivery Tab Content', 'options_check'),
		'desc' => 'The content in the Delivery/Return tab for products',
		'id' => 'delivery_tab_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'name' => __('Disable purchasing. Products can still be viewed but not added to cart', 'options_check'),
		'desc' => 'Close the Store',
		'id' => 'close_store',
		'type' => 'checkbox',	);
	
	$options[] = array(
		'name' => __('Store wide notice', 'options_check'),
		'desc' => 'Show notice',
		'id' => 'store_notice_visible',
		'type' => 'checkbox',	);
		
	$options[] = array(
		'name' => null,
		'desc' => 'Store wide notice content',
		'id' => 'store_notice_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

				//------------------------//




	return $options;
}