<?php
/**
 * Displays main navigation
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */
?>

<div class="responsive-menu">
  <div class="hamburger-bar down"></div>
  <div class="hamburger-bar fade"></div>
  <div class="hamburger-bar up"></div>
</div>

<nav id="site-navigation" class="main-navigation" role="navigation">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'header-menu',
		'menu_id'        => 'main-nav',
	) );
	?>
</nav>