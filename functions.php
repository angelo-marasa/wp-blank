<?php
define( 'WP_BLANK_VERSION', 1.0 );

add_theme_support( 'automatic-feed-links' );

register_nav_menus(
    array(
        'primary'	=>	__( 'Primary Menu', 'wp_blank' ), // Register the Primary menu
        // Copy and paste the line above right here if you want to make another menu,
        // just change the 'primary' to another name
    )
);

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
        // Copy and paste the lines above right here if you want to make another sidebar,
        // just change the values of id and name to another word/name
    ));
}
add_action( 'widgets_init', 'wp_blank_register_sidebars' );

function wp_blank_styles()  {
    wp_enqueue_style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css');
    wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'wp_blank_styles' );

/**
 * Deregister WordPress default jQuery
 * Register and Enqueue Google CDN jQuery
 */
function wp_blank_jquery_enqueue() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", false, null );
    wp_enqueue_script( 'jquery' );
}
if ( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'wp_blank_jquery_enqueue', 11 );
}