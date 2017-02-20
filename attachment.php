<?php
/**
 * Template for attachments
 *
 * @package WordPress
 * @subpackage Base Wordpress Theme
 * @since 1.0
 * @version 1.0
 */
?>

<?php get_header(); ?>

	<div class="grid-container">

		<article>
		<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/post/content', 'full' );
		endwhile;
		?>
		<?php
			$images = array();
			$image_sizes = get_intermediate_image_sizes();
			array_unshift( $image_sizes, 'full' );
			foreach( $image_sizes as $image_size ) {
				$image = wp_get_attachment_image_src( get_the_ID(), $image_size );
				$name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
				$images[] = '<a href="' . $image[0] . '">' . $name . '</a>';
			}
			echo implode( ' | ', $images );
		?>
		</article>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>