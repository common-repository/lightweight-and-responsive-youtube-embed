<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpszaki.hu
 * @since      1.0.0
 *
 * @package    Wp_Youtube_lightweight_Embed
 * @subpackage Wp_Youtube_lightweight_Embed/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Youtube_lightweight_Embed
 * @subpackage Wp_Youtube_lightweight_Embed/admin
 * @author     WPSzaki <info@wpszaki.hu>
 */
class Wp_Youtube_lightweight_Embed_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_menu', array($this,'wp_youtube_lightweight_add_page' ) );
		add_action( 'admin_init', array( $this, 'wordpress_youtube_lightweight_settings_page_init' ) );
		
	}

	public function wp_youtube_lightweight_add_page(){
		add_menu_page(
		        __( 'Wordpress Embed Light Weight Youtube Video', 'textdomain' ),
		        'Youtube Embed',
		        'manage_options',
		        'wordpress-youtube-lightweight-settings',
		        array($this,'wordpress_youtube_lightweight_settings_create_admin_page'),
		        plugins_url( 'lightweight-and-responsive-youtube-embed/images/youtube-icon.png' ),
		        10
		    );
		}

	public function wordpress_youtube_lightweight_settings_create_admin_page() {
		$this->wordpress_youtube_lightweight_settings_options = get_option( 'wordpress_youtube_lightweight_settings_option_name' ); ?>

		<div class="wrap">
			<h2>Lightweight and Responsive Youtube Embed</h2>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'wordpress_youtube_lightweight_settings_option_group' );
					do_settings_sections( 'wordpress-youtube-lightweight-settings-admin' );
					submit_button();
				?>
			</form>
			
			<div style="text-align:center;">If you like this plugin, buy us a beer (or two)!
			
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="ferenc@szepesiweb.com">
			<input type="hidden" name="lc" value="HU">
			<input type="hidden" name="item_name" value="WPSzaki">
			<input type="hidden" name="no_note" value="0">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

			
			</div>
			
		</div>
	<?php }


	public function wordpress_youtube_lightweight_settings_page_init() {
		register_setting(
			'wordpress_youtube_lightweight_settings_option_group', // option_group
			'wordpress_youtube_lightweight_settings_option_name', // option_name
			array( $this, 'wordpress_youtube_lightweight_settings_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'wordpress_youtube_lightweight_settings_setting_section', // id
			'Settings', // title
			array( $this, 'wordpress_youtube_lightweight_settings_section_info' ), // callback
			'wordpress-youtube-lightweight-settings-admin' // page
		);

		add_settings_field(
			'width_0', // id
			'Width', // title
			array( $this, 'width_0_callback' ), // callback
			'wordpress-youtube-lightweight-settings-admin', // page
			'wordpress_youtube_lightweight_settings_setting_section' // section
		);


		add_settings_field(
			'show_controls_2', // id
			'Show Controls', // title
			array( $this, 'show_controls_2_callback' ), // callback
			'wordpress-youtube-lightweight-settings-admin', // page
			'wordpress_youtube_lightweight_settings_setting_section' // section
		);

		add_settings_field(
			'disable_fullscreen_3', // id
			'Disable fullscreen', // title
			array( $this, 'disable_fullscreen_3_callback' ), // callback
			'wordpress-youtube-lightweight-settings-admin', // page
			'wordpress_youtube_lightweight_settings_setting_section' // section
		);

		add_settings_field(
			'video_alignment_4', // id
			'Video Alignment', // title
			array( $this, 'video_alignment_4_callback' ), // callback
			'wordpress-youtube-lightweight-settings-admin', // page
			'wordpress_youtube_lightweight_settings_setting_section' // section
		);

		add_settings_field(
			'related_videos_5', // id
			'Related Videos', // title
			array( $this, 'related_videos_5_callback' ), // callback
			'wordpress-youtube-lightweight-settings-admin', // page
			'wordpress_youtube_lightweight_settings_setting_section' // section
		);

	}

	public function wordpress_youtube_lightweight_settings_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['width_0'] ) ) {
			$sanitary_values['width_0'] = sanitize_text_field( $input['width_0'] );
		}

		if ( isset( $input['show_controls_2'] ) ) {
			$sanitary_values['show_controls_2'] = $input['show_controls_2'];
		}

		if ( isset( $input['disable_fullscreen_3'] ) ) {
			$sanitary_values['disable_fullscreen_3'] = $input['disable_fullscreen_3'];
		}

		if ( isset( $input['video_alignment_4'] ) ) {
			$sanitary_values['video_alignment_4'] = $input['video_alignment_4'];
		}

		if ( isset( $input['related_videos_5'] ) ) {
			$sanitary_values['related_videos_5'] = $input['related_videos_5'];
		}

		return $sanitary_values;
	}

	public function wordpress_youtube_lightweight_settings_section_info() {
		echo '<p>These parameters will affect all of the embedded videos unless you specify a different height/align attribute in the shortcodes individually.</p>';
	}

	public function width_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="wordpress_youtube_lightweight_settings_option_name[width_0]" id="width_0" value="%s" placeholder="100"> <em>Only percentage value is allowed. You just need to enter a number. (1-100)</em>',
			isset( $this->wordpress_youtube_lightweight_settings_options['width_0'] ) ? esc_attr( $this->wordpress_youtube_lightweight_settings_options['width_0']) : ''
		);
	}

	public function show_controls_2_callback() {
		?> <fieldset><?php $checked = ( isset( $this->wordpress_youtube_lightweight_settings_options['show_controls_2'] ) && $this->wordpress_youtube_lightweight_settings_options['show_controls_2'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="show_controls_2-0"><input type="radio" name="wordpress_youtube_lightweight_settings_option_name[show_controls_2]" id="show_controls_2-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->wordpress_youtube_lightweight_settings_options['show_controls_2'] ) && $this->wordpress_youtube_lightweight_settings_options['show_controls_2'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="show_controls_2-1"><input type="radio" name="wordpress_youtube_lightweight_settings_option_name[show_controls_2]" id="show_controls_2-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function disable_fullscreen_3_callback() {
		?> <fieldset><?php $checked = ( isset( $this->wordpress_youtube_lightweight_settings_options['disable_fullscreen_3'] ) && $this->wordpress_youtube_lightweight_settings_options['disable_fullscreen_3'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="disable_fullscreen_3-0"><input type="radio" name="wordpress_youtube_lightweight_settings_option_name[disable_fullscreen_3]" id="disable_fullscreen_3-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->wordpress_youtube_lightweight_settings_options['disable_fullscreen_3'] ) && $this->wordpress_youtube_lightweight_settings_options['disable_fullscreen_3'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="disable_fullscreen_3-1"><input type="radio" name="wordpress_youtube_lightweight_settings_option_name[disable_fullscreen_3]" id="disable_fullscreen_3-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}

	public function video_alignment_4_callback() {
		?> <select name="wordpress_youtube_lightweight_settings_option_name[video_alignment_4]" id="video_alignment_4">
			<?php $selected = (isset( $this->wordpress_youtube_lightweight_settings_options['video_alignment_4'] ) && $this->wordpress_youtube_lightweight_settings_options['video_alignment_4'] === 'Left') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Left</option>
			<?php $selected = (isset( $this->wordpress_youtube_lightweight_settings_options['video_alignment_4'] ) && $this->wordpress_youtube_lightweight_settings_options['video_alignment_4'] === 'Center') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Center</option>
			<?php $selected = (isset( $this->wordpress_youtube_lightweight_settings_options['video_alignment_4'] ) && $this->wordpress_youtube_lightweight_settings_options['video_alignment_4'] === 'Right') ? 'selected' : '' ; ?>
			<option <?php echo $selected; ?>>Right</option>
		</select> <?php
	}

	public function related_videos_5_callback() {
		?> <fieldset><?php $checked = ( isset( $this->wordpress_youtube_lightweight_settings_options['related_videos_5'] ) && $this->wordpress_youtube_lightweight_settings_options['related_videos_5'] === 'Yes' ) ? 'checked' : '' ; ?>
		<label for="related_videos_5-0"><input type="radio" name="wordpress_youtube_lightweight_settings_option_name[related_videos_5]" id="related_videos_5-0" value="Yes" <?php echo $checked; ?>> Yes</label><br>
		<?php $checked = ( isset( $this->wordpress_youtube_lightweight_settings_options['related_videos_5'] ) && $this->wordpress_youtube_lightweight_settings_options['related_videos_5'] === 'No' ) ? 'checked' : '' ; ?>
		<label for="related_videos_5-1"><input type="radio" name="wordpress_youtube_lightweight_settings_option_name[related_videos_5]" id="related_videos_5-1" value="No" <?php echo $checked; ?>> No</label></fieldset> <?php
	}


}