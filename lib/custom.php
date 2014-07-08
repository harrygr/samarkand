<?php
/**
 * Custom functions
 */


/**
* Add gallery attribute to galleries for lightbox
*/
add_filter( 'wp_get_attachment_link' , 'sa_add_gallery_rel' );
function sa_add_gallery_rel( $attachment_link ) {
	global $post;
	$attachment_link = str_replace('<a', '<a data-fancybox-group="group-' . $post->ID . '"', $attachment_link);
	return $attachment_link;
}

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
		$optionsframework_settings = get_option('optionsframework');
	// Gets the unique option id
		$option_name = $optionsframework_settings['id'];
		if ( get_option($option_name) ) {
			$options = get_option($option_name);
		}
		if ( isset($options[$name]) ) {
			return $options[$name];
		} else {
			return $default;
		}
	}
}