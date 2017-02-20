<?php
/**
 * Template part for displaying content
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */

?>
<header>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>
<section>
	<?php if( has_post_thumbnail() ): ?>
	<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> featured image" class="featured_image" />
	<?php endif; ?>
	<?php the_content(); ?>
</section>
<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() ) :
		comments_template();
	else : ?>
		<h3>Comments are closed</h3>
<?php endif; ?>