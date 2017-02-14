<?php
define( 'WP_BLANK_VERSION', 1.0 );

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

/** ADD MORE THUMBNAIL IMAGE SIZES **/
// add_image_size( 'image-size-name-here', 640, 480, true );
/** Copy and paste the line above and add more to add more image sizes. */

/** REGISTER NAV MENUS **/
register_nav_menus(
    array(
        'Header Navigation'	=>	__( 'Header Navigation', 'wp_blank' ), // Register the Primary menu
        /** Copy and paste the line above right here if you want to make another menu,
         * just change the 'primary' to another name */
    )
);

/** REGISTER SIDEBARS **/
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

/** ENQUEUE STYLESHEETS **/
function wp_blank_scripts() {
    wp_enqueue_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('core', get_stylesheet_directory_uri() . '/css/core.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
    
    wp_enqueue_script( 'bootstrapjs', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array('jquery'), '3.3.7', true );
}
add_action( 'wp_enqueue_scripts', 'wp_blank_scripts' );
