<?php
/**
 * Internationalization
 */

/**
 * Load textdomain.
 */
function gr_load_textdomain() {

	load_plugin_textdomain( 'go-redirects', false, GR_PATH . 'languages' );

}
add_action( 'plugins_loaded', 'gr_load_textdomain' );
