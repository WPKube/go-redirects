<?php
/**
 * Plugin Name: Go Redirects URL Forwarder
 * Plugin URI:  https://github.com/galengidman/go-redirects
 * Description: A super-simple URL forwarder WordPress.
 * Author:      Galen Gidman
 * Author URI:  http://galengidman.com/
 * Version:     1.2.0
 * Text Domain: go-redirects
 * Domain Path: /languages
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Define constants.
 */
if ( ! defined( 'GR_VERSION' ) ) define( 'GR_VERSION', '1.2.0' );
if ( ! defined( 'GR_PATH' ) )    define( 'GR_PATH',    plugin_dir_path( __FILE__ ) );
if ( ! defined( 'GR_URL' ) )     define( 'GR_URL',     esc_url( plugin_dir_url( __FILE__ ) ) );

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
