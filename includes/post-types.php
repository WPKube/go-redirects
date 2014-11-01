<?php
/**
 * Post Types
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

/**
 * Register and configure the redirect post type.
 */
function gr_register_post_type_redirect() {

  $labels = array(
    'name'               => __( 'Redirects',                    'go-redirects' ),
    'singular_name'      => __( 'Redirect',                     'go-redirects' ),
    'menu_name'          => __( 'Redirects',                    'go-redirects' ),
    'name_admin_bar'     => __( 'Redirect',                     'go-redirects' ),
    'add_new'            => __( 'Add New',                      'go-redirects' ),
    'add_new_item'       => __( 'Add New Redirect',             'go-redirects' ),
    'new_item'           => __( 'New Redirect',                 'go-redirects' ),
    'edit_item'          => __( 'Edit Redirect',                'go-redirects' ),
    'view_item'          => __( 'View Redirect',                'go-redirects' ),
    'all_items'          => __( 'All Redirects',                'go-redirects' ),
    'search_items'       => __( 'Search Redirects',             'go-redirects' ),
    'parent_item_colon'  => __( 'Parent Redirects:',            'go-redirects' ),
    'not_found'          => __( 'No redirects found.',          'go-redirects' ),
    'not_found_in_trash' => __( 'No redirects found in Trash.', 'go-redirects' )
  );

  $args = array(
    'labels'    => $labels,
    'public'    => true,
    'menu_icon' => 'dashicons-admin-links',
    'supports'  => array(
      'title',
      'revisions'
    ),
    'rewrite'   => array(
      'slug'       => 'go',
      'with_front' => false
    )
  );

  register_post_type( 'gr_redirect', $args );

}
add_action( 'init', 'gr_register_post_type_redirect' );