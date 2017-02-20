<?php
/**
 * F3 starter index
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

?>

<?php get_header(); ?>

	<div id="page-wrap">

		<article>
		<?php
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post/content', 'excerpt' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;	
		?>
		</article>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>