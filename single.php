<?php
/**
 * Template for single posts
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

	<div id="page-wrap">

		<article id="main-content" class="grid-70">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/post/content', 'full' );
		endwhile;
		?>
		</article>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>