<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpszaki.hu
 * @since      1.0.0
 *
 * @package    Wp_Youtube_lightweight_Embed
 * @subpackage Wp_Youtube_lightweight_Embed/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Youtube_lightweight_Embed
 * @subpackage Wp_Youtube_lightweight_Embed/public
 * @author     WPSzaki <info@wpszaki.hu>
 */
class Wp_Youtube_lightweight_Embed_Public {

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
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $thumbnail    Youtube video thumbnail.
	 */
	public $thumbnail;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode('youtube_embed', array($this, 'wp_youtube_video_shortcode'));

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Youtube_lightweight_Embed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Youtube_lightweight_Embed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-youtube-lightweight-embed-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */



	public function wp_youtube_video_shortcode($atts)
	{

		$wordpress_youtube_lightweight_settings_options = get_option( 'wordpress_youtube_lightweight_settings_option_name' );
	   	
	    $wp_szaki_shortcode_render = shortcode_atts(array(
	        'width' => (int)$wordpress_youtube_lightweight_settings_options['width_0'],
	        'show-controls' => $wordpress_youtube_lightweight_settings_options['show_controls_2'],
	        'disable-full_screen' => $wordpress_youtube_lightweight_settings_options['disable_fullscreen_3'],
	        'align' => $wordpress_youtube_lightweight_settings_options['video_alignment_4'],
	        'show-related' => $wordpress_youtube_lightweight_settings_options['related_videos_5'],
	        'url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
	        'thumb-url' => '',
	    ), $atts);

	    $thumb_url = $wp_szaki_shortcode_render['thumb-url'];
		
		$width = $wp_szaki_shortcode_render['width'];
	    
	    if( $width == '' ){
	    	$width = '100';
	    }

    	$youtube_id  = $this->getID_youtube( $wp_szaki_shortcode_render['url'] );
	    $alignment = lcfirst($wp_szaki_shortcode_render['align']);
	    $output = '<div class="video-'. $alignment .'" style="width:'. $width .'%">';
	    $output .= '<div class="youtube-player" data-id="'. $youtube_id .'" data-img="'.$thumb_url.'"></div>';
		$output .= '</div>';

	    return $output;
	    
	}

	public function getID_youtube($url)
	{
	    parse_str(parse_url($url, PHP_URL_QUERY), $ID_youtube);
	    return $ID_youtube['v'];
	}


	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Youtube_lightweight_Embed_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Youtube_lightweight_Embed_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-youtube-lightweight-embed-public.js', array( 'jquery' ), $this->version, false );
		//$video_atts = $this->wp_youtube_video_shortcode;
		$wordpress_youtube_lightweight_settings_options = get_option( 'wordpress_youtube_lightweight_settings_option_name' );

		$dataToBePassed = array(
		    'width'            => $wordpress_youtube_lightweight_settings_options['width_0'],
		    'allowfullscreen' => $wordpress_youtube_lightweight_settings_options['disable_fullscreen_3'],
		    'showcontrols' => $wordpress_youtube_lightweight_settings_options['show_controls_2'],
		    'thumbnail' => $this->thumbnail,
		    'showrelated' => $wordpress_youtube_lightweight_settings_options['related_videos_5'],
		);

		wp_localize_script( $this->plugin_name, 'video_atts', $dataToBePassed );

	}

}
