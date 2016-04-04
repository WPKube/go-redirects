<?php
/**
 * Redirect Fields
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register and configure the redirect settings meta box.
 */
function gr_redirect_fields() {

	$args = array(
		'id'        => 'gr-redirect-settings',
		'title'     => esc_html__( 'Redirect Settings', 'go-redirects' ),
		'post_type' => 'gr_redirect',
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(
			'_gr_redirect_url' => array(
				'name'       => esc_html__( 'URL', 'go-redirects' ),
				'after_name' => esc_html__( '(Required)', 'go-redirects' ),
				'type'       => 'url'
			),
			'_gr_redirect_visits' => array(
				'name' => esc_html__( 'Visits', 'go-redirects' ),
				'type' => 'number',
				'attributes' => array(
					'readonly' => 'readonly',
					'value'    => isset( $_GET['post'] ) ? (int) get_post_meta( $_GET['post'], '_gr_redirect_visits', true ) : 0
				)
			)
		)
	);

	new CT_Meta_Box( apply_filters( 'gr_redirect_fields', $args ) );

}
add_action( 'admin_init', 'gr_redirect_fields' );
