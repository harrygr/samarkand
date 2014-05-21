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