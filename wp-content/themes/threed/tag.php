<?php
get_header(); 
$sidebar=threed_sidebar_settings('blog');
$sidebar_position_class="col-md-12";
if ($sidebar == 3) 
{ 
	$sidebar_position_class = 'col-md-8 is-sidebar sidebar-position-right'; 
}
if ($sidebar == 2) 
{ 
	$sidebar_position_class = 'col-md-8 is-sidebar sidebar-position-left'; 
}		

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo esc_attr($sidebar_position_class); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
            <section class="blog-area">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>
            </section>
            <div class="blog">
				<div class="blog">
					<?php threed_pagination(); ?>
	        	</div>
	        </div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if($sidebar!=1){	get_sidebar(); 	} ?>
<?php get_footer(); ?>
