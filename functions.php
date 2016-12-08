<?php
define( 'WP_BLANK_VERSION', 1.0 );

add_theme_support( 'automatic-feed-links' );

register_nav_menus(
    array(
        'Header Navigation'	=>	__( 'Header Navigation', 'wp_blank' ), // Register the Primary menu
        /** Copy and paste the line above right here if you want to make another menu,
         * just change the 'primary' to another name */
    )
);

add_filter('default_hidden_meta_boxes', 'be_hidden_meta_boxes', 10, 2);
function be_hidden_meta_boxes($hidden, $screen) {
    if ( 'post' == $screen->base || 'page' == $screen->base )
        $hidden = array('slugdiv', 'trackbacksdiv', 'postexcerpt', 'commentstatusdiv', 'commentsdiv', 'authordiv', 'revisionsdiv');
    // removed 'postcustom',
    return $hidden;
}

function wp_blank_register_sidebars() {
    register_sidebar(array(				// Start a series of sidebars to register
        'id' => 'sidebar', 					// Make an ID
        'name' => 'Sidebar',				// Name it
        'description' => 'This is a sidebar.', // Dumb description for the admin side
        'before_widget' => '<div>',	// What to display before each widget
        'after_widget' => '</div>',	// What to display following each widget
        'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
        'after_title' => '</h3>',		// What to display following each widget's title
        'empty_title'=> '',					// What to display in the case of no title defined for a widget
    ));
    /** Copy and paste the lines above right here if you want to make another sidebar,
     * just change the values of id and name to another word/name */
}
add_action( 'widgets_init', 'wp_blank_register_sidebars' );

function wp_blank_styles()  {
    wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('core', get_stylesheet_directory_uri() . '/css/core.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'wp_blank_styles' );

/** ADD MORE IMAGE SIZES */
add_theme_support( 'post-thumbnails' );
// add_image_size( 'image-size-name-here', 640, 480, true );
/** Copy and paste the line above and add more to add more image sizes. */



/**
 * Automatically move JavaScript code to page footer, speeding up page loading time.
 */
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);

/** Enqueue Javascripts */
function wp_blank_js_enqueue() {
    wp_deregister_script( 'jquery' ); /** Removes default WP JQuery */
    wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null, true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrapjs', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", false, null, true );
}
if ( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'wp_blank_js_enqueue', 11 );
}

/** Custom Footer Code */
function wp_blank_footer_scripts() {

} add_action('wp_footer', 'wp_blank_footer_scripts');


/** Add ACF Theme Options */
/*
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
	));
}
*/