<?php
/**
 * Redirect Template
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Store redirect info
$id     = get_the_id();
$url    = esc_url_raw( get_post_meta( $id, '_gr_redirect_url', true ) );
$visits = (int) get_post_meta( $id, '_gr_redirect_visits', true );

// Update redirect visits count
if ( $visits < 1 ) {
	add_post_meta( $id, '_gr_redirect_visits', 1, true );
} else {
	update_post_meta( $id, '_gr_redirect_visits', ++$visits );
}

// Redirect or display error on fail
if ( ! empty( $url ) ) {
	wp_redirect( $url, '302' );
	exit;
} else {
	wp_die( esc_html__( 'Redirect URL not found.', 'go-redirects' ), esc_html__( 'Error', 'go-redirects' ) );
}
