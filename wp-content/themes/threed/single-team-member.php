<?php

$sidebar_position_class = 'col-md-12';
get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr($sidebar_position_class); ?>">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content-single', 'team' ); ?>			

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 			
		get_footer(); 

?>
