<?php
/**
 * Admin Assets
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Include admin style and script assets.
 */
function gr_assets() {

	$screen = get_current_screen();

	if ( $screen->id === 'edit-gr_redirect' ) {
		wp_enqueue_script( 'jquery-zeroclipboard', GR_URL . 'assets/vendor/jquery.zeroclipboard/jquery.zeroclipboard.min.js', array( 'jquery' ), GR_VERSION );
		wp_enqueue_script( 'gr-admin', GR_URL . 'assets/js/gr-admin.js', array( 'jquery', 'jquery-zeroclipboard' ), GR_VERSION );
	}

}
add_action( 'admin_enqueue_scripts', 'gr_assets' );
