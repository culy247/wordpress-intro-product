<?php 

/**
 * Plugin Name: Webdevia main plugin
 * Plugin URI: http://www.themeforest.net/user/Mymoun
 * Description: Add features to Mymoun themes.
 * Version: 3.2
 * Author: Mymoun
 * Author URI: http://www.themeforest.net/user/Mymoun
 */


class WebdeviaMainPlugin {
    function __construct()
    {

require_once(  plugin_dir_path( __FILE__ ).'post-types.php' );
require_once(  plugin_dir_path( __FILE__ ).'meta-box.php' );
require_once(  plugin_dir_path( __FILE__ ).'/import/wd-import.php' );

require_once(  plugin_dir_path( __FILE__ ).'widgets/widget.php' );


include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_image_with_text.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_recent_blog.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_portfolio.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_icon_text.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_testimonial.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_clients.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_separator_title.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_countup.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_team.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_call_to_action.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_edge_animation.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_slider.php' );
include_once( plugin_dir_path( __FILE__ ).'shortcode/wd_empty_spaces.php' );

    }
}
new WebdeviaMainPlugin;
function wd_wpcf7_addShortcodeText() {
	wpcf7_add_shortcode(
		array( 'text', 'text*', 'email', 'email*', 'url', 'url*', 'tel', 'tel*' ),
		'wd_wpcf7_text_shortcode_handler', true );
}

if (!function_exists('flooring_get_categories')) {
    function flooring_get_categories($taxonomy = '')
    {

        global $wpdb;
	    $output = array();

        $categories = $wpdb->get_results("SELECT * FROM $wpdb->terms WHERE term_id IN 
( SELECT term_taxonomy_id FROM $wpdb->term_taxonomy WHERE taxonomy = '$taxonomy' )");
        if(!empty($categories)) {
            foreach( $categories as $category ) {
                $output[$category->name] = $category->slug;
            }
        }
        return $output;
    }
}

if (!function_exists('image_from_url_relative')) {
    function image_from_url_relative($image_url)
    {
        $images = array();
        $images = explode('/', $image_url);
        $position = array_search('uploads', $images);
        $content = array();
        if ($position) {
            for ($i = $position; $i < count($images); $i++) array_push($content, $images[$i]);
            $image_relative_link = get_site_url() . '/wp-content/' . implode('/', $content);
            if ($image_url != $image_relative_link) update_post_meta(get_the_ID(), 'pciture', $image_relative_link);
            return $image_relative_link;
        } else {
            return $image_url;
        }
    }
}