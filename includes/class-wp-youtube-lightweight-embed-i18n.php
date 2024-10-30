<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wpszaki.hu
 * @since      1.0.0
 *
 * @package    Wp_Youtube_lightweight_Embed
 * @subpackage Wp_Youtube_lightweight_Embed/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Youtube_lightweight_Embed
 * @subpackage Wp_Youtube_lightweight_Embed/includes
 * @author     WPSzaki <info@wpszaki.hu>
 */
class Wp_Youtube_lightweight_Embed_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-youtube-lightweight-embed',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
