<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php threed_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
			$hide_title = get_post_meta( get_the_ID(), '_threed_page_hide_title', true );
			if(!$hide_title)
			{
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<div class="blog-info-area clearfix">

				<?php

		            $format=get_post_format();
		            if($format==='')
		            {
		                $format='standard';
		            }

				    if($format!='gallery' && $format!='video')
		            {
		               	if (has_post_thumbnail())
		               	{
		            ?>
						<div class="content-image-wrapper">
			            	<?php the_post_thumbnail('threed_single_post_image'); ?>
						</div>
		            <?php
						}
					}
					if(get_post_format()== 'gallery')
		            {
		            ?>
			            <div class="content-image-wrapper">
			            	<?php require_once get_template_directory() . '/template-parts/post-gallery.php'; ?>
			            </div>
		            <?php
		            }
		            if(get_post_format()== 'video')
		            {
		            ?>
			            <div class="content-image-wrapper">
			            	<?php require_once get_template_directory() . '/template-parts/post-video.php'; ?>
						</div>
		            <?php
		            }
				?>

				<div class="blog-content">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'threed' ),
							'after'  => '</div>',
						) );
					?>
				</div>
		</div>

	</div><!-- .entry-content -->
	<div class="below-post-content">
		<div class="row">
		<?php
			if(threed_get_option('threed-share-checkbox')==1 || threed_get_option('threed-share-checkbox')=='')
			{
				$share_it_text=threed_get_option('social-share-text');
		?>
				<div class="threed-share-options">
					<?php
						if($share_it_text!='')
						{
					?>
					<h6 class="share_it"><?php printf('%s',esc_html($share_it_text)); ?></h6>
					<?php
						}
					?>
					<?php printf(__('%s','threed'),threed_SocialMeta()); ?>
				</div>
		<?php
			}
		?>

		<div class="wrapper-comment">
			<?php printf(__('%s','threed'),threed_single_post_meta()); ?>
		</div>
		</div>
	</div>
	<footer class="entry-footer post-footer clearfix">
		<span class="threed-post-tags"><?php threed_post_tags(); ?></span>
		<span class="threed-post-cats"><?php threed_post_categories(); ?></span>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
