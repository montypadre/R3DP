<?php
	 
	$sidebar=threed_sidebar_settings('blog');
	$sidebar_position_class="col-md-12";
	if ($sidebar == 3) 
	{ 
		$sidebar_position_class = 'col-md-8 is-sidebar sidebar-position-left'; 
	}
	if ($sidebar == 2) 
	{ 
		$sidebar_position_class = 'col-md-8 is-sidebar sidebar-position-right'; 
	}
	get_header(); 

?>

	<div id="primary" class="content-area <?php echo esc_attr($sidebar_position_class); ?>">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'image-post' ); ?>			
			<?php				
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if($sidebar!=1){	get_sidebar(); 	} ?>
<?php get_footer(); ?>