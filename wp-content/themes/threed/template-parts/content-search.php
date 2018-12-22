<article class= "blog-wrapper" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content row">

			<div class="blog-list clearfix">
				<?php
					$blog_content_class="no-image";
					if (has_post_thumbnail())
					{
						$blog_content_class="";
				?>
	               	<div class="blog-image">
	               		<div class="blog-image-inner">
	                		<?php the_post_thumbnail('threed_blog_list_image'); ?>
	                	</div>
	                </div>
	            <?php
	            	}
	            ?>
	            <div class="blog-content-wrapper <?php echo esc_attr($blog_content_class); ?>">
	             	 <div class="blog-content clearfix">
		                <div class="above-title-section row">
		                	<h3 class="post-date"><?php threed_posted_on(); ?></h3>
		                	<span class="threed-post-tags"><?php threed_post_tags(); ?></span>
		                </div>
		                <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<div class="below-title-section">
						 	<span class="threed-post-cats"><?php threed_post_categories(); ?></span>
						 	<span class="threed-comment"><?php threed_post_comments(); ?></span>
						</div>
		                <div class="entry-content">
		                	<div class="excerpt">
							<?php
									$excerpt_word_limit=20;
									$post_excerpt_length=10;
									if(is_home())
									{
										$post_excerpt_length=threed_get_option('post-excerpt-length');
										if(!empty($post_excerpt_length))
										{
											$excerpt_word_limit=$post_excerpt_length;
										}
									}
									printf(__('%s','threed'),threed_get_the_excerpt($excerpt_word_limit));
							?>
							</div>
		                </div>
		                <div class="row author-row">
		                  <div class="col-xs-12 col-md-6">
		                    <div class="about-author">
		                      <?php threed_posted_by(); ?>
		                    </div>
		                  </div>
		                  <div class="col-xs-12 col-md-6">
		                    <div class="readmore-btn">
		                      <a href="<?php echo get_permalink(); ?>" class="button-medium button-medium--red"><?php esc_html_e('Read More','threed'); ?></a>
		                    </div>
		                  </div>
		                </div>
	              	</div>
	            </div>
		    </div>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
