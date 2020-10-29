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

add_theme_support( 'woocommerce' );

function woocommerce_activate_lightbox() {
  add_theme_support( 'wc-product-gallery-lightbox' );
}

/*--------------------------------------------------------------------------------
	Remove big image size threshold of 2560px -if using cloudinary or another service
---------------------------------------------------------------------------------*/
add_filter( 'big_image_size_threshold', '__return_false' );

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

/*
 * Custom Post Type
 */
// function custom_post_component() {
// 	$labels = array(
// 		'name'               => _x( 'Components', 'post type general name' ),
// 		'singular_name'      => _x( 'Component', 'post type singular name' ),
// 		'add_new'            => _x( 'Add New', 'component' ),
// 		'add_new_item'       => __( 'Add New Component' ),
// 		'edit_item'          => __( 'Edit Component' ),
// 		'new_item'           => __( 'New Component' ),
// 		'all_items'          => __( 'All Components' ),
// 		'view_item'          => __( 'View Component' ),
// 		'search_items'       => __( 'Search Components' ),
// 		'not_found'          => __( 'No components found' ),
// 		'not_found_in_trash' => __( 'No components found in the Trash' ), 
// 		'parent_item_colon'  => '',
// 		'menu_name'          => 'Components'
// 	);
// 	$args = array(
// 		'labels'        => $labels,
// 		'description'   => 'Holds our components and component specific data',
// 		'public'        => true,
// 		'publicly_queryable'  => false,
// 		'menu_position' => 14,
// 		'menu_icon' => 'dashicons-hammer',
// 		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
// 		'has_archive'   => false,
// 	);
// 	register_post_type( 'component', $args );	
// }
// add_action( 'init', 'custom_post_component' );

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

/*--------------------------------------------------------------------------------
	Remove Guttenburg editor from Post and Pages - To be replaced with ACF fields
---------------------------------------------------------------------------------*/
add_action( 'init', function() {
	remove_post_type_support( 'post', 'editor' );
	remove_post_type_support( 'page', 'editor' );
}, 9);

// Fully Disable Gutenberg editor.
add_filter('use_block_editor_for_post_type', '__return_false', 10);

//Remove Gutenberg Block Library CSS from loading on the frontend
function gutenberg_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}
add_action( 'wp_enqueue_scripts', 'gutenberg_remove_wp_block_library_css', 100 );

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

 /**
 * Remove admin bar from frontend
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Restrict Dashboard to admins Only (Uncomment if needed)
 */
// add_action( 'init', 'blockusers_init' );
// function blockusers_init() {
// 	if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
// 		wp_redirect( home_url() );
// 		exit;
// 	}
// }

/**
 * Gravity Forms CSS spinner (Uncomment if needed) - https://mattrad.uk/gravity-forms-css-spinner/
 */
// function gf_spinner_replace( $image_src, $form ) {
// 	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
// }
// add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );
 
 ?>