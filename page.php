<?php
/**
 * Template Name: Default page
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>
		<div id="page-wrap">
			
			<article id="main-content">
				<header>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
				<section>
					<?php if( has_post_thumbnail() ): ?>
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> featured image" class="featured_image" />
					<?php endif; ?>
					<?php
					while ( have_posts() ) : the_post();
		
						the_content();
		
					endwhile; // End of the loop.
					?>
				</section>
				<?php // If comments are open or we have at least one comment, load up the comment template.
				 if ( comments_open() ) :
				     comments_template();
				 endif; ?>
			</article>
			
			<?php get_sidebar(); ?>
		
		</div>
<?php get_footer(); ?>