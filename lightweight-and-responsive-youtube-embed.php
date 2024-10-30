<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpszaki.hu
 * @since             1.0.0
 * @package           Wp_Youtube_lightweight_Embed
 *
 * @wordpress-plugin
 * Plugin Name:       Lightweight and Responsive Youtube Embed
 * Description:       Make your embedded Youtube videos responsive & lightweight with this plugin. Reduce the loading time of your site and increase the user experience. Just use this shortcode to get started: [youtube_embed url="Insert YT video URL here"]
 * Version:           1.0.0
 * Author:            WPSzaki
 * Author URI:        https://wpszaki.hu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lightweight_and_responsive_youtube_embed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

add_filter( 'plugin_action_links', 'yt_embedder_action', 10, 5 );
function yt_embedder_action( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = plugin_basename(__FILE__);
	if ($plugin == $plugin_file) {

			$settings = array('settings' => '<a href="admin.php?page=wordpress-youtube-lightweight-settings">' . __('Settings', 'General') . '</a>');
			$site_link = array('support' => '<a href="https://wpszaki.hu" target="_blank">Support</a>');
		
    			$actions = array_merge($settings, $actions);
				$actions = array_merge($site_link, $actions);
			
		}
		
		return $actions;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-youtube-lightweight-embed-activator.php
 */
function activate_wp_youtube_lightweight_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-youtube-lightweight-embed-activator.php';
	Wp_Youtube_lightweight_Embed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-youtube-lightweight-embed-deactivator.php
 */
function deactivate_wp_youtube_lightweight_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-youtube-lightweight-embed-deactivator.php';
	Wp_Youtube_lightweight_Embed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_youtube_lightweight_embed' );
register_deactivation_hook( __FILE__, 'deactivate_wp_youtube_lightweight_embed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-youtube-lightweight-embed.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_youtube_lightweight_embed() {

	$plugin = new Wp_Youtube_lightweight_Embed();
	$plugin->run();

}
run_wp_youtube_lightweight_embed();
