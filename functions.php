<?php
/**
 * Doly Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Epaper News
 */

if ( ! defined( 'EPAPER_NEWS_VERSION' ) ) {
	$epaper_news_theme = wp_get_theme();
	define( 'EPAPER_NEWS_VERSION', $epaper_news_theme->get( 'Version' ) );
}

/**
 * Enqueue scripts and styles.
 */
function epaper_news_scripts() {
    wp_enqueue_style( 'epaper-news-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','epaper-default-block','epaper-style'), '', 'all');
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style( 'epaper-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), EPAPER_NEWS_VERSION, 'all');
     wp_enqueue_script( 'epaper-news-main-js', get_stylesheet_directory_uri() . '/assets/js/epaper-news-main.js',array('jquery','epaper-script'), EPAPER_NEWS_VERSION, true );
   
}
add_action( 'wp_enqueue_scripts', 'epaper_news_scripts' );

/**
 * Load Epaper News Tags files.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';