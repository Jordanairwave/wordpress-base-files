<?php get_header(); ?>
		<article id="main-content">
<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/post/content', 'excerpt' );
    endwhile;
    else :
        get_template_part( 'template-parts/post/content', 'none' );
    endif;	
?>
		</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>