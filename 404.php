<?php
/**
 *
 * @package WordPress
 * @subpackage blank starter
 * @since 1.0
 * @version 1.0
 */

?>
<?php get_header(); ?>
		<div class="grid-container">
			
			<article id="main-content">
				<header>
					<h1>404 Page Not Found</h1>
				</header>
				<section>
					<p>Sorry but the page you requested could not be found</p>
					<?php get_search_form(); ?>
				</section>
			</article>
			
			<?php get_sidebar(); ?>
		
		</div>
<?php get_footer(); ?>