<?php
/**
 * F3 starter Category
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

?>

<?php get_header(); ?>

	<div id="page-wrap">

		<div class="grid-<?php echo $col; ?>">
			<h2 class="archive-title">Category: <?php single_cat_title( '', true ); ?></h2>
		<?php
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/post/content', 'excerpt' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;	
		?>
		</div>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>