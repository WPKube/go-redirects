<?php
/**
 * Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Load custom template for single gr_redirect posts.
 */
function gr_template_redirect( $single_template ) {

	global $post;

	if ( $post->post_type === 'gr_redirect' ) {
		$single_template = GR_PATH . 'templates/single-gr_redirect.php';
	}

	return apply_filters( 'gr_template_redirect', $single_template );

}
add_action( 'single_template', 'gr_template_redirect' );
