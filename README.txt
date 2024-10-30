=== Lightweight and Responsive Youtube Embed ===
Contributors: wpszaki
Donate link: https://wpszaki.hu
Tags: youtube, responsive, embed, lightweight, video, speed optimize
Requires at least: 3.0.0
Tested up to: 4.9.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Make your embedded Youtube videos responsive & lightweight with this plugin. Reduce the loading time of your site and increase the user experience.

== Description ==

If you are embedding Youtube video(s) into your site then you will need this plugin. As you may (or may not) know the default Youtube embed code is not responsive and in order to load the player itself your browser has to download more than 1MB of data from Youtube's servers. That is way too much and this is the reason why we made this plugin. A video player has to be lightweight and responsive. Period.

This plugin is replacing the default Youtube player with the video's high quality thumbnail and a play button. The real player and the video won't load until you click on the play button or the thumbnail itself. With this easy trick you will have a much lighter and faster website and the thumbnail + the actual player will be responsive too.

Our plugin is only 60KB without any extra library or unnecessary function.

If you are speed-optimizing your site or if you want to reduce the loading times of your pages then you are at the right place.

### This plugin will:

* Make all of the embedded Youtube videos responsive automatically
* Will reduce the size of your pages (where you have embedded videos)
* Will make your site faster
* Will improve the user experience

### You can also:

* Manually insert a different thumbnail for each embedded video with the 'thumb_url' parameter.

`[youtube_embed url="video_url" thumb-url="custom_thumb_url"]`

* Manually set a different width for each video with the 'width' parameter.

`[youtube_embed url="video_url" width="50"]`

* Manually align each video to left, right or center with the 'align' parameter.

`[youtube_embed url="video_url" align="center"]`

* Disable the related videos
* Disable the video controls
* Disable the fullscreen option
* Align the videos globally or individually
* Set the custom video width for all videos or to just a single video with a shortcode parameter

### Comparison

Here's a quick comparison with the built-in TwentySeventeen theme (without any other plugin).

We placed a default Youtube video embed code in a new and empty page, ran the tests and then replaced it with our solution before running the tests again.

Total page size with the traditional Youtube embed code: 2.18MB
Total page size with our lightweight & responsive embedder: 472KB

Page load time with the traditional Youtube embed code: 5.33s
Page load time with our lightweight & responsive embedder: 2.52s

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin folder to the /wp-content/plugins/ directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the [youtube_embed url="https://youtube_video_url_comes_here"] shortcode in your post/page to embed a video

== Frequently Asked Questions ==

Nothing at the moment.

== Screenshots ==

1. The code in action.
2. The options panel.
3. The basic shortcode.

== Changelog ==

= 1.0 =
* Initial release of the plugin.