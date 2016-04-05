<?php
/**
 * Post Types
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register and configure the redirect post type.
 */
function gr_post_type_redirect() {

	$labels = array(
		'name'               => esc_html__( 'Redirects',                    'go-redirects' ),
		'singular_name'      => esc_html__( 'Redirect',                     'go-redirects' ),
		'menu_name'          => esc_html__( 'Redirects',                    'go-redirects' ),
		'name_admin_bar'     => esc_html__( 'Redirect',                     'go-redirects' ),
		'add_new'            => esc_html__( 'Add New',                      'go-redirects' ),
		'add_new_item'       => esc_html__( 'Add New Redirect',             'go-redirects' ),
		'new_item'           => esc_html__( 'New Redirect',                 'go-redirects' ),
		'edit_item'          => esc_html__( 'Edit Redirect',                'go-redirects' ),
		'view_item'          => esc_html__( 'View Redirect',                'go-redirects' ),
		'all_items'          => esc_html__( 'All Redirects',                'go-redirects' ),
		'search_items'       => esc_html__( 'Search Redirects',             'go-redirects' ),
		'parent_item_colon'  => esc_html__( 'Parent Redirects:',            'go-redirects' ),
		'not_found'          => esc_html__( 'No redirects found.',          'go-redirects' ),
		'not_found_in_trash' => esc_html__( 'No redirects found in Trash.', 'go-redirects' )
	);

	$args = array(
		'labels'    => $labels,
		'public'    => true,
		'menu_icon' => 'dashicons-admin-links',
		'supports'  => array( 'title', 'revisions' ),
		'rewrite'   => array( 'slug' => 'go', 'with_front' => false )
	);

	register_post_type( 'gr_redirect', apply_filters( 'gr_post_type_redirect', $args ) );

}
add_action( 'init', 'gr_post_type_redirect' );
