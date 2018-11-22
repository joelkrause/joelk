<?php
include_once( get_template_directory() . '/template-parts/acf/acf.php' );


if ( ! function_exists( 'joelkrause' ) ) :
	function joelkrause() {
	
		load_theme_textdomain( 'joelkrause', get_template_directory() . '/languages' );
	 
		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );
	 
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add page title to head
		 */
		add_theme_support( 'title-tag' );
	 
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'main-nav'   => __( 'Main Navigation', 'joelkrause' ),
		) );
	 
		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
	endif; // joelkrause
	add_action( 'after_setup_theme', 'joelkrause' );

add_action('wp_enqueue_scripts', 'joelkrause_jquery');

function joelkrause_styles() {
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/library/styles/css/main.css', array(), filemtime(get_stylesheet_directory() .'/library/styles/css/main.css'), 'all' );
	wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.0.7/js/all.js');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js');
	wp_enqueue_script( 'mainscript', get_stylesheet_directory_uri() .'/library/scripts/scripts.js', array(), filemtime(get_stylesheet_directory() .'/library/scripts/scripts.js'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'joelkrause_styles' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
?>