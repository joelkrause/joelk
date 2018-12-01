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

function joelkrause_styles() {
	// wp_enqueue_style( 'main', get_stylesheet_directory_uri() .'/library/styles/css/main.css', array(), filemtime(get_stylesheet_directory() .'/library/styles/css/main.css'), 'all' );
	
	wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.0.7/js/all.js');
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-latest.min.js', array(), null, true);
	wp_enqueue_script( 'pace', get_stylesheet_directory_uri() .'/library/scripts/pace.min.js', array(), filemtime(get_stylesheet_directory() .'/library/scripts/pace.min.js'), 'all' );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() .'/library/scripts/scripts.js', array(), filemtime(get_stylesheet_directory() .'/library/scripts/scripts.js'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'joelkrause_styles' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// ajax load more
function misha_my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/library/scripts/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'template-parts/post-loop');
			// for the test purposes comment the line above and uncomment the below one
			// the_title();
 
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
?>