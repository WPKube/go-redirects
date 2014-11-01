<?php
/**
 * Redirect Fields
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

/**
 * Register and configure the redirect settings meta box.
 */
function gr_add_meta_box_redirect_settings() {

  $args = array(
    'id'        => 'gr-redirect-settings',
    'title'     => __( 'Redirect Settings', 'go-redirects' ),
    'post_type' => 'gr_redirect',
    'context'   => 'normal',
    'priority'  => 'high',
    'fields'    => array(
      '_gr_redirect_url' => array(
        'name'       => __( 'URL', 'go-redirects' ),
        'after_name' => __( '(Required)', 'go-redirects' ),
        'type'       => 'url'
      ),
      '_gr_redirect_views' => array(
        'name' => __( 'Views', 'go-redirects' ),
        'type' => 'text',
        'attributes' => array(
          'readonly' => 'readonly',
          'value'    => ( isset( $_GET['post'] ) ? get_post_meta( $_GET['post'], '_gr_redirect_visits', true ) : '' )
        )
      )
    )
  );

  new CT_Meta_Box( $args );

}
add_action( 'admin_init', 'gr_add_meta_box_redirect_settings' );