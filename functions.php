<?php
/**
 * F3 starter functions and definitions
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

//* Making jQuery to load from Google Library
function f3_replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false , null, true);
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'f3_replace_jquery');

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );

//* Register menus
function f3_add_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header menu' ),
      'footer-menu' => __( 'Footer menu' )
    )
  );
}
add_action( 'init', 'f3_add_menus' );
 
 
 ?>