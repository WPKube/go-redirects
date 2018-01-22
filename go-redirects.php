<?php
/**
 * Plugin Name: Go Redirects URL Forwarder
 * Description: A super-simple URL forwarder WordPress.
 * Version:     2.0.0
 * Author:      Galen Gidman
 * Author URI:  https://galengidman.com/
 * License:     GPL2+
 * Text Domain: go-redirects
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GR_VERSION', '2.0.0' );
define( 'GR_FILE',    __FILE__ );
define( 'GR_PATH',    plugin_dir_path( GR_FILE ) );
define( 'GR_URL',     plugin_dir_url( GR_FILE ) );

add_action( 'plugins_loaded', 'gr_load_plugin_textdomain' );

if ( ! version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	add_action( 'admin_notices', 'gr_fail_php_version' );
} elseif ( ! version_compare( get_bloginfo( 'version' ), '4.7', '>=' ) ) {
	add_action( 'admin_notices', 'gr_fail_wp_version' );
} else {
	include GR_PATH . 'includes/class-gr-plugin.php';
}

function gr_load_plugin_textdomain() {

	load_plugin_textdomain( 'go-redirects' );

}

function gr_fail_php_version() {

	$message = sprintf( esc_html__( 'Go Redirects requires PHP version %s+, plugin is currently NOT ACTIVE.', 'go-redirects' ), '5.4' );
	$message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );

	echo wp_kses_post( $message );

}

function gr_fail_wp_version() {

	$message = sprintf( esc_html__( 'Go Redirects requires WordPress version %s+, plugin is currently NOT ACTIVE.', 'go-redirects' ), '4.5' );
	$message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );

	echo wp_kses_post( $message );

}
