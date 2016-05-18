<?php
/**
 * Meta Box
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Include CT Meta Box if it's not already loaded.
 */
if ( ! class_exists( 'CT_Meta_Box' ) ) {
	require_once GR_PATH . 'includes/vendor/ct-meta-box/ct-meta-box.php';
}

/**
 * Define CT Meta Box URL if it's not already defined.
 */
if ( ! defined( 'CTMB_URL' ) ) {
	define( 'CTMB_URL', GR_URL . 'includes/vendor/ct-meta-box' );
}
