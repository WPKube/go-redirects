<?php
/**
 * Plugin Name: Go Redirects
 * Plugin URI:  http://galengidman.com/plugins/go-redirects/
 * Description: A simple redirect system for WordPress.
 * Author:      Galen Gidman
 * Author URI:  http://galengidman.com/
 * Version:     1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Define constants.
 */
if ( ! defined( 'GR_VERSION' ) ) define( 'GR_VERSION', '1.1.0' );
if ( ! defined( 'GR_PATH' ) )    define( 'GR_PATH', plugin_dir_path( __FILE__ ) );
if ( ! defined( 'GR_URL' ) )     define( 'GR_URL', esc_url( plugin_dir_url( __FILE__ ) ) );

/**
 * Includes.
 */
require_once GR_PATH . 'includes/post-types.php';
require_once GR_PATH . 'includes/templates.php';

/**
 * Admin includes.
 */
if ( is_admin() ) {
	require_once GR_PATH . 'includes/admin/assets.php';
	require_once GR_PATH . 'includes/admin/meta-box.php';
	require_once GR_PATH . 'includes/admin/notices.php';
	require_once GR_PATH . 'includes/admin/redirect-columns.php';
	require_once GR_PATH . 'includes/admin/redirect-fields.php';
}
