<?php
/**
 * Template part for displaying posts with excerpts
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	<?php if( has_post_thumbnail() ): ?>
	<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> thumbnail image" />
	<?php endif; ?>
	<?php the_excerpt(); ?>
	
</section>

