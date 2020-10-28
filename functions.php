<?php
/**
 * F3 starter functions and definitions
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

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
function blank_add_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header menu' ),
      'footer-menu' => __( 'Footer menu' )
    )
  );
}
add_action( 'init', 'blank_add_menus' );

//* Register sidebar
function blank_add_sidebar() {
    register_sidebar( array(
        'name'          => __('Primary Sidebar'),
        'id'            => 'sidebar',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'blank_add_sidebar' );

//* Add CSS
function blank_add_styles() {
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main-min.css' );
}
add_action( 'wp_enqueue_scripts', 'blank_add_styles' );

//* Add JS
function blank_add_scripts() {
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/min/main-min.js', array ( 'jquery' ) , 1.1, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blank_add_scripts' );

//* Add support for thumbnails
add_theme_support('post-thumbnails');
//add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );
//add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

/**
 * Removes width and height attributes from image tags
 */
function remove_image_size_attributes( $html ) {
    return preg_replace( '/(width|height)="\d*"/', '', $html );
}

// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );

// Remove image size attributes from images added to a WordPress post
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );

//Remove query strings from static resources
function blank_remove_script_version( $src ){
    $parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src', 'blank_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'blank_remove_script_version', 15, 1 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 */
function blank_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'blank_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 */
function blank_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'blank_post_thumbnail_sizes_attr', 10, 3 );

/*function to add defer to all scripts*/
function js_async_attr($tag){

	# Add async to all remaining scripts
	return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );
 
 
 ?>