<?php
/** wp-google-suggest.php
 *
 * Plugin Name: WP Google Suggest
 * Plugin URI:  http://en.wp.obenland.it/wp-google-suggest/#utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-google-suggest
 * Description: Uses the Google Suggest API to suggest related search terms.
 * Version:     1.4.0
 * Author:      Konstantin Obenland
 * Author URI:  http://en.wp.obenland.it/#utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-google-suggest
 * Text Domain: wp-google-suggest
 * Domain Path: /lang
 * License:     GPLv2
 */


if ( ! class_exists( 'Obenland_Wp_Plugins_v300' ) ) {
	require_once( 'obenland-wp-plugins.php' );
}


class Obenland_Wp_Google_Suggest extends Obenland_Wp_Plugins_v300 {


	///////////////////////////////////////////////////////////////////////////
	// METHODS, PUBLIC
	///////////////////////////////////////////////////////////////////////////

	/**
	 * Constructor.
	 *
	 * @author Konstantin Obenland
	 * @since  1.0 - 10.05.2011
	 * @access public
	 *
	 * @return Obenland_Wp_Google_Suggest
	 */
	public function __construct() {
		parent::__construct( array(
			'textdomain'     => 'wp-google-suggest',
			'plugin_path'    => __FILE__,
			'donate_link_id' => 'LYYF6RDJ5A2EA',
		));

		if ( ! is_admin() ) {
			$this->hook( 'init', 9 ); // Set to 9, so they can easily be deregistered.
			$this->hook( 'wp_print_scripts' );
			$this->hook( 'wp_print_styles'  );
		}
	}


	/**
	 * Registers the script and stylesheet.
	 *
	 * The scripts and stylesheets can easilz be deregeistered be calling
	 * <code>wp_deregister_script( 'wp-search-suggest' );</code> or
	 * <code>wp_deregister_style( 'wp-search-suggest' );</code> on the init
	 * hook.
	 *
	 * @author Konstantin Obenland
	 * @since  1.0 - 10.05.2011
	 * @access public
	 *
	 * @return void
	 */
	public function init() {
		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '.dev' : '';

		wp_register_script(
			$this->textdomain,
			plugins_url( "/js/{$this->textdomain}{$suffix}.js", __FILE__ ),
			array( 'jquery-ui-autocomplete' ),
			false,
			true
		);

		wp_register_style(
			$this->textdomain,
			plugins_url( "/css/{$this->textdomain}{$suffix}.css", __FILE__ ),
			array(),
			false
		);
	}


	/**
	 * Enqueues the script.
	 *
	 * @author Konstantin Obenland
	 * @since  1.0 - 10.05.2011
	 * @access public
	 *
	 * @return void
	 */
	public function wp_print_scripts() {
		wp_enqueue_script( $this->textdomain );
	}


	/**
	 * Enqueues the stylesheet.
	 *
	 * @author Konstantin Obenland
	 * @since  1.0 - 10.05.2011
	 * @access public
	 *
	 * @return void
	 */
	public function wp_print_styles() {
		wp_enqueue_style( $this->textdomain );
	}

}  // End of class Obenland_Wp_Google_Suggest.


new Obenland_Wp_Google_Suggest;


/* End of file wp-google-suggest.php */
/* Location: ./wp-content/plugins/wp-google-suggest/wp-google-suggest.php */