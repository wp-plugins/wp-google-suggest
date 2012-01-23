<?php
/** wp-google-suggest.php
 *
 * Plugin Name:	WP Google Suggest
 * Plugin URI:	http://www.obenlands.de/en/2011/05/wp-google-suggest/?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-google-suggest
 * Description:	Uses the Google Suggest API to suggest related search terms
 * Version:		1.2
 * Author:		Konstantin Obenland
 * Author URI:	http://www.obenlands.de/en/?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-google-suggest
 * Text Domain: wp-google-suggest
 * Domain Path: /lang
 * License:		GPLv2
 */


if( ! class_exists('Obenland_Wp_Plugins') ) {
	require_once('obenland-wp-plugins.php');
}


class Obenland_Wp_Google_Suggest extends Obenland_Wp_Plugins {
	
	
	///////////////////////////////////////////////////////////////////////////
	// METHODS, PUBLIC
	///////////////////////////////////////////////////////////////////////////
	
	/**
	 * Constructor
	 *
	 * @author	Konstantin Obenland
	 * @since	1.0 - 10.05.2011
	 * @access	public
	 *
	 * @return	Obenland_Wp_Google_Suggest
	 */
	public function __construct() {

		parent::__construct( array(
			'textdomain'		=>	'wp-google-suggest',
			'plugin_name'		=>	plugin_basename(__FILE__),
			'donate_link_id'	=>	'LYYF6RDJ5A2EA'
		));
		
		if ( ! is_admin() ) {
			add_filter( 'init', array(
				&$this,
				'register_scripts_styles'
			), 9); // Set to 9, so they can easily be deregistered
				
			add_filter( 'wp_print_scripts', array(
				&$this,
				'print_scripts'
			));
			
			add_filter( 'wp_print_styles', array(
				&$this,
				'print_styles'
			));
		}
	}
	
	
	/**
	 * Registers the script and stylesheet
	 *
	 * The scripts and stylesheets can easilz be deregeistered be calling
	 * <code>wp_deregister_script( 'wp-search-suggest' );</code> or
	 * <code>wp_deregister_style( 'wp-search-suggest' );</code> on the init
	 * hook
	 *
	 * @author	Konstantin Obenland
	 * @since	1.0 - 10.05.2011
	 * @access	public
	 *
	 * @return	void
	 */
	public function register_scripts_styles() {
		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '.dev' : '';

		wp_register_script(
			$this->textdomain,
			plugins_url("/js/wp-google-suggest$suffix.js", __FILE__),
			array('jquery-ui-autocomplete'),
			false,
			true
		);
		
		wp_register_style(
			$this->textdomain,
			plugins_url("/css/wp-google-suggest$suffix.css", __FILE__),
			array(),
			false
		);
	}
	
	
	/**
	 * Enqueues the script
	 *
	 * @author	Konstantin Obenland
	 * @since	1.0 - 10.05.2011
	 * @access	public
	 *
	 * @return	void
	 */
	public function print_scripts() {
		wp_enqueue_script( $this->textdomain );
	}
	
	
	/**
	 * Enqueues the stylesheet
	 *
	 * @author	Konstantin Obenland
	 * @since	1.0 - 10.05.2011
	 * @access	public
	 *
	 * @return	void
	 */
	public function print_styles() {
		wp_enqueue_style( $this->textdomain );
	}

}  // End of class Obenland_Wp_Google_Suggest


new Obenland_Wp_Google_Suggest;


/* End of file wp-google-suggest.php */
/* Location: ./wp-content/plugins/wp-google-suggest/wp-google-suggest.php */