<?php
/*
Plugin Name: Go Redirects
Plugin URI:  http://galengidman.com/plugins/go-redirects/
Description: A simple redirect system for WordPress.
Author:      Galen Gidman
Author URI:  http://galengidman.com/
Version:     1.0.1
*/

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Includes.
 */
require_once( plugin_dir_path( __FILE__ ) . 'includes/post-types.php' );

if ( is_admin() ) {

  if ( ! class_exists( 'CT_Meta_Box' ) ) {
    require_once( plugin_dir_path( __FILE__ ) . 'includes/library/ct-meta-box/ct-meta-box.php' );
  }

  if ( ! defined( 'CTMB_URL' ) ) {
    define( 'CTMB_URL', plugin_dir_url( __FILE__ ) . 'includes/library/ct-meta-box' );
  }

  require_once( plugin_dir_path( __FILE__ ) . 'includes/admin/redirect-fields.php' );

}

/**
 * Load custom template for single gr_redict posts.
 */
function gr_redirect_template( $single_template ) {

  global $post;

  if ( $post->post_type == 'gr_redirect' ) {
    $single_template = plugin_dir_path( __FILE__ ) . 'templates/single-gr_redirect.php';
  }

  return $single_template;

}
add_action( 'single_template', 'gr_redirect_template' );
