<?php
/**
 * Displays header
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('name') . wp_title('-'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

	<!-- Geo Location - http://www.geo-tag.de/generator/en.html-->
	<meta name="geo.region" content="GB-OXF" />
	<meta name="geo.placename" content="oxford" />
	<meta name="geo.position" content="55.378051;-3.435973" />
	<meta name="ICBM" content="55.378051, -3.435973" />

	<!-- Facebook -->
	<meta property=”og:title” content=<?php bloginfo('name') . wp_title('-'); ?>>
	<meta property=”og:type” content=”website”>
	<meta property=”og:image” content=<?php echo bloginfo( 'wpurl' ) . "/social.png"; ?>>
	<meta property=”og:url” content=<?php echo get_permalink( $post->ID ); ?>>
	<meta property=”og:description” content=<?php bloginfo( 'description' ); ?>>

	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content=<?php bloginfo('name') . wp_title('-'); ?>>
	<meta name="twitter:description" content=<?php bloginfo( 'description' ); ?>>
	<meta name="twitter:image:src" content=<?php echo bloginfo( 'wpurl' ) . "/social.png"; ?>>
	<meta name="twitter:url" content=<?php echo get_permalink( $post->ID ); ?>>
	
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<header>
		<section>

			<h1><a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>


			<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
				<!--<nav>
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header-menu' ) ); ?>
				</nav>-->
				<?php get_template_part( 'template-parts/navigation/main'); ?>
			<?php endif; ?>


		</section>
    </header>
