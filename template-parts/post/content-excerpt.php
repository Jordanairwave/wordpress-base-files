<?php
/**
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Bass Wordpress
 * @since 1.0
 * @version 1.0
 */

?>

			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<img src="<?php echo wp_get_attachment_image_url( get_the_ID(), 'post-thumbnail' ); ?>" alt="<?php the_title(); ?> thumbnail image" />
				<?php the_excerpt(); ?>
			</section>

