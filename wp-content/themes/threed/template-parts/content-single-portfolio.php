<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
			
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>	
		
	</header><!-- .entry-header -->	
	<div class="entry-content">
		<div class="portfolio-info-area clearfix">	
			<div class="portfolio-list-single">	
				<article class="portfolio-carousel">
					<div class="owl-carousel-portfolio">  
                    <?php
                    		$files=get_post_meta( get_the_ID(), '_threed_portfolio_screenshots', 1 );  
                    		if(!empty($files))
                    		{                  		
	                    		foreach($files  as  $image_id=>$image_url)
	                    		{
	                    			$screenshot_image=wp_get_attachment_image_src( $image_id,'threed_portfolio_single');  
	                    			$url = $screenshot_image['0'];                 
				    ?>
					    			<div class="portdolio-image">
					                 	<img src="<?php echo esc_url($url); ?>" alt="post-image-<?php echo get_the_ID(); ?>">
					                </div>
				    <?php 
                    			}
                    		}
                    ?>
                    </div>
                </article> 
				<div class="portfolio-content">
					<?php the_content(); ?>					
				</div>	
        </div>
				<?php																			
					$args = array('post_type' => 'portfolio','posts_per_page' => 0,'post_status'=>'publish','post__not_in' => array(get_the_ID()));
					$portfolio_posts = new WP_Query( $args );	
				?>	
				<article class="portfolio-other-wrapper">   
	        <h3 class="other_works_heading"><?php esc_html_e('Our Other works','threed'); ?></h3> 
	               
	                <div class="owl-portfolio-other">     
	              <?php if ( $portfolio_posts->have_posts() ) : while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();   //post loop ?>
	                                  		                     
		                <div class="portdolio-image">                                                       	                                                   				    	                                                               
		                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'threed_portfolio_others'); ?></a>                                                                                                             
						</div>                                                                                                                                                  
					
				   <?php
                	endwhile;endif
                	?>
                	</div>
                </article>

               

			
		
  </div>
	</div><!-- .entry-content -->		
</article><!-- #post-## -->