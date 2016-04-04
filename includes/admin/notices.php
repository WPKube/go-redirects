<?php
/**
 * Notices
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Displays an error message if Pretty Permalinks aren't enabled.
 */
function gr_notice_permalinks() {

	if ( get_option( 'permalink_structure' ) ) {
		return;
	}

	echo '<div class="error"><p>' . sprintf( __( 'Pretty Permalinks must be enabled for Go Redirects to work. %1$sPermalink Settings &rarr;%2$s', 'go-redirects' ), '<a href="options-permalink.php">', '</a>' ) . '</p></div>';

}
add_action( 'admin_notices', 'gr_notice_permalinks' );
