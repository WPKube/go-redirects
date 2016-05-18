<?php
/**
 * Redirect Columns
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Modify redirect columns.
 */
function gr_redirect_columns( $columns ) {

	$columns = array(
		'cb'     => '<input type="checkbox" />',
		'title'  => esc_html__( 'Title', 'go-redirects' ),
		'copy'   => '<span class="dashicons dashicons-clipboard"></span>',
		'url'    => '<span class="dashicons dashicons-admin-links"></span>',
		'visits' => '<span class="dashicons dashicons-chart-bar"></span>'
	);

	return $columns;

}
add_filter( 'manage_gr_redirect_posts_columns', 'gr_redirect_columns' );

/**
 * Populate custom redirect columns.
 */
function gr_manage_redirect_columns( $column, $post_id ) {

	switch ( $column ) {

		case 'copy' :
			$url = esc_url_raw( get_the_permalink( $post_id ) );
			printf( "<span class='button button-small gr-copy' data-zclip-text='$url'>%s</span>", esc_html__( 'Copy to Clipboard', 'go-redirects' ) );
			break;

		case 'url' :
			$url = esc_url( get_post_meta( $post_id, '_gr_redirect_url', true ) );
			echo $url;
			break;

		case 'visits' :
			$visits = (int) get_post_meta( $post_id, '_gr_redirect_visits', true );
			echo "<strong>$visits</strong>";
			break;

		default :
			break;

	}

}
add_action( 'manage_gr_redirect_posts_custom_column', 'gr_manage_redirect_columns', 10, 2 );
