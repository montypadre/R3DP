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

	<div id="primary" class="content-area clearfix">
		<div class="author clearfix <?php echo esc_attr($sidebar_position_class); ?>"> <!--individual blog posts-->

    <?php if ( have_posts() ) : ?>
        <div class="author-box">
          <div class="author-box-inner">
            <div class="author-image">
                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 150);  ?>
            </div>
            <div class="author-description">
              <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
              <span class="threed-author-article"><?php echo count_user_posts( get_the_author_meta( 'ID' ) ); ?> Articles</span>
              <p><?php the_author_meta( 'description' ); ?></p>
            </div>
          </div>
        </div>
    <?php endif; ?>
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<section class="blog-area">
			<?php
				  while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				  endwhile;
			?>
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
</div> <!-- individual BLOG POSTS ends -->
<?php get_footer(); ?>
