<?php
/**
 * Redirect Post Template
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

// Make $post globally accessible
global $post;

// Store the redirect URL
$url = esc_url( get_post_meta( $post->ID, '_gr_redirect_url', true ) );

// Store the visit count
$visits = (int) get_post_meta( $post->ID, '_gr_redirect_visits', true );

// Check to see if a visit count has already been stored
if ( ! empty( $visits ) ) {

  // Add an additional visit
  update_post_meta( $post->ID, '_gr_redirect_visits', ++$visits );

} else {

  // Add the first visit
  add_post_meta( $post->ID, '_gr_redirect_visits', 1, true );

}

// Check to see if a redirect URL exists
if ( ! empty( $url ) ) {

  // Redirect to the URL
  wp_redirect( $url, '302' );

  // And then exit
  exit;

} else {

  // Otherwise, display and error message and exit
  wp_die( __( 'Redirect URL not found.', 'go-redirects' ), __( 'Error', 'go-redirects' ) );

}
