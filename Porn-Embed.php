<?php
/*
Plugin Name: Porn-Embed
Plugin URI: http://scobiform.com/wordpress-porn-embed-plugin
Description: Adds Embed support for xhamster.com, xvideos.com, youporn.com, tub8.com and pornhub.com in WordPress posts, pages and custom post types.
Version: 0.0.2
Author: Scobiform
Author URI: http://scobiform.com
License: GPL2
*/


/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 */
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function prefix_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}


/**
 * ##############################################################################################
 */

//Xhamster embed Handler
wp_embed_register_handler( 'xhamster', '#http://.*\.xhamster.com/movies/(.+?)($|&)#i', 'wp_embed_handler_xhamster' );


function wp_embed_handler_xhamster( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
			'<div id="xhamster-iframe"><iframe src="http://xhamster.com/xembed.php?video=%1$s" ></iframe></div>',
			esc_attr($matches[1])
			);

	return apply_filters( 'embed_xhamster', $embed, $matches, $attr, $url, $rawattr );
}

//Xvideos embed Handler
wp_embed_register_handler( 'xvideos', '#http://.*\.xvideos.com/video(.+?)($|&)#i', 'wp_embed_handler_xvideos' );


function wp_embed_handler_xvideos( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
			'<div id="xvideos-iframe"><iframe src="http://www.xvideos.com/embedframe/%1$s"></iframe></div>',
			esc_attr($matches[1])
			);

	return apply_filters( 'embed_xvideos', $embed, $matches, $attr, $url, $rawattr );
}

//Pornhub embed Handler
wp_embed_register_handler( 'pornhub', '#http://.*\.pornhub.com/view_video.php\?viewkey=(.+?)($|&)#i', 'wp_embed_handler_pornhub' );


function wp_embed_handler_pornhub( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
			'<div id="pornhub-iframe"><iframe src="http://www.pornhub.com/embed/%1$s" class="noScrolling"></iframe></div>',
			esc_attr($matches[1])
			);

	return apply_filters( 'embed_pornhub', $embed, $matches, $attr, $url, $rawattr );
}


//Youporn embed Handler
wp_embed_register_handler( 'youporn', '#http://.*\.youporn.com/watch/(.+)#i', 'wp_embed_handler_youporn' );


function wp_embed_handler_youporn( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
			'<div id="youporn-iframe"><iframe src="http://www.youporn.com/embed/%1$s" class="noScrolling"></iframe></div>',
			esc_attr($matches[1])
			);

	return apply_filters( 'embed_youporn', $embed, $matches, $attr, $url, $rawattr );
}


//Tube8 embed Handler
wp_embed_register_handler( 'tube8', '#http://.*\.tube8.com/(.+)#i', 'wp_embed_handler_tube8' );


function wp_embed_handler_tube8( $matches, $attr, $url, $rawattr ) {

	$embed = sprintf(
			'<div id="tube8-iframe"><iframe src="http://www.tube8.com/embed/%1$s" class="noScrolling"></iframe></div>',
			esc_attr($matches[1])
			);

	return apply_filters( 'embed_tube8', $embed, $matches, $attr, $url, $rawattr );
}
?>