<?php
	get_header(); 
?>
	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
		<?php while ( have_posts() ) : the_post(); ?>		  
			<?php get_template_part( 'template-parts/content-single', 'portfolio' ); ?>
		<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 			
	get_footer(); 
?>
