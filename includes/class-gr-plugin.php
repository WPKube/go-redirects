<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'GR_Plugin' ) ) :

class GR_Plugin {

	public function __construct() {

		add_action( 'plugins_loaded',  [ $this, 'include_vendor' ] );

		add_action( 'init', [ $this, 'register_post_type' ] );

		add_action( 'cmb2_admin_init', [ $this, 'meta_box' ] );

		add_filter( 'manage_gr_redirect_posts_columns', [ $this, 'redirect_columns' ] );

		add_action( 'manage_gr_redirect_posts_custom_column', [ $this, 'redirect_columns_content' ], 10, 2 );

		add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets' ] );

		add_action( 'admin_notices', [ $this, 'pretty_permalinks_notice' ] );

		add_action( 'template_redirect', [ $this, 'do_redirect' ] );

	}

	public function include_vendor() {

		include GR_PATH . 'includes/vendor/cmb2/init.php';

	}

	public function register_post_type() {

		$labels = [
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
			'not_found_in_trash' => esc_html__( 'No redirects found in Trash.', 'go-redirects' ),
		];

		$args = [
			'labels'    => $labels,
			'public'    => true,
			'menu_icon' => 'dashicons-admin-links',
			'supports'  => [ 'title' ],
			'rewrite'   => [ 'slug' => 'go', 'with_front' => false ],
		];

		register_post_type( 'gr_redirect', $args );

	}

	public function meta_box() {

		$prefix = '_gr_';

		$cmb = new_cmb2_box( [
			'id'           => $prefix . 'metabox',
			'title'        => esc_html__( 'Redirect Settings', 'go-redirects' ),
			'object_types' => [ 'gr_redirect' ],
		] );

		$cmb->add_field( [
			'name'       => esc_html__( 'URL', 'go-redirects' ),
			'id'         => $prefix . 'redirect_url',
			'type'       => 'text_url',
			'attributes' => [
				'type' => 'url',
				'required' => 'required',
			],
		] );

		$cmb->add_field( [
			'name'       => esc_html__( 'Visits', 'go-redirects' ),
			'id'         => $prefix . 'redirect_visits',
			'type'       => 'text_small',
			'attributes' => [
				'readonly' => 'readonly',
				'value'    => isset( $_GET['post'] ) ? (int) get_post_meta( $_GET['post'], '_gr_redirect_visits', true ) : 0,
			],
		] );

	}

	public function redirect_columns() {

		return [
			'cb'     => '<input type="checkbox" />',
			'title'  => esc_html__( 'Title', 'go-redirects' ),
			'copy'   => '<span class="dashicons dashicons-clipboard"></span>',
			'visits' => '<span class="dashicons dashicons-chart-bar"></span>'
		];

	}

	public function redirect_columns_content( $column, $post_id ) {

		switch ( $column ) {
			case 'copy' :
				$url = esc_attr( get_the_permalink( $post_id ) );
				$button_label = esc_html__( 'Copy to Clipboard', 'go-redirects' );
				$button = sprintf( "<button type='button' class='gr-copy button button-small' data-clipboard-text='{$url}'>%s</button>", $button_label );
				$check = '<span class="dashicons dashicons-yes" style="display: none"></span>';
				echo $button . $check;
				break;

			case 'url' :
				echo esc_url( get_post_meta( $post_id, '_gr_redirect_url', true ) );
				break;

			case 'visits' :
				echo absint( get_post_meta( $post_id, '_gr_redirect_visits', true ) );
				break;
		}

	}

	public function admin_assets() {

		$screen = get_current_screen();

		if ( 'gr_redirect' !== $screen->post_type ) {
			return;
		}

		wp_enqueue_style(
			'gr-admin',
			esc_url( GR_URL . 'assets/css/gr-admin.css' ),
			false,
			GR_VERSION
		);

		wp_enqueue_script(
			'clipboard',
			esc_url( GR_URL . 'assets/vendor/clipboard.min.js' ),
			[ 'jquery' ],
			GR_VERSION,
			true
		);

		wp_enqueue_script(
			'gr-admin',
			esc_url( GR_URL . 'assets/js/gr-admin.js' ),
			[ 'jquery', 'clipboard' ],
			GR_VERSION,
			true
		);

		wp_localize_script( 'gr-admin', 'grAdminL10n', [
			'promptText' => esc_attr__( "Here's the URL:", 'go-redirects' ),
		] );

	}

	public function pretty_permalinks_notice() {

		if ( get_option( 'permalink_structure' ) ) {
			return;
		}

		$link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'options-permalink.php' ) ),
			esc_html__( 'Permalink Settings', 'go-redirects' )
		);

		$message = sprintf( esc_html__( 'Go Redirects is not compatible with Plain Permalinks. Please choose a different setting in %s.', 'go-redirects' ), $link );
		$message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );

		echo wp_kses_post( $message );

	}

	public function do_redirect() {

		$id        = get_the_ID();
		$url       = get_post_meta( $id, '_gr_redirect_url', true );
		$visits    = absint( get_post_meta( $id, '_gr_redirect_visits', true ) );

		update_post_meta( $id, '_gr_redirect_visits', $visits < 1 ? 1 : ++$visits );

		if ( $url ) {
			wp_redirect( $url, '302' );
			exit;
		} else {
			wp_die( esc_html__( 'Redirect URL not found.', 'go-redirects' ) );
		}

	}

}

endif;

new GR_Plugin();
