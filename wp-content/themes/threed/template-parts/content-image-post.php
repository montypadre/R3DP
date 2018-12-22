<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
			$hide_title = get_post_meta( get_the_ID(), '_threed_page_hide_title', true );
			if(!$hide_title)
			{
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php
			}
	?>
	<div class="entry-content">
		<div class="content-image-wrapper">
			<?php
				echo wp_get_attachment_image( get_the_ID(), 'full' );
			?>
		</div>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="custome-nav row">
			<div class="nav-previous">
				<?php previous_image_link( false, 'Previous Image' ); ?>
			</div>
			<div class="nav-next">
				<?php next_image_link( false, 'Next Image' ); ?>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
