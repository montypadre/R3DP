<?php 
	
	$vc_stat= get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
    if($vc_stat=='true')
    {

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<div class="blog-info-area clearfix">	
				<div class="row">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</article>
<?php
	}
	else
	{

		/**** WITHOUT VISUAL COMPOSER *****/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">		
		<?php
			$hide_title = get_post_meta( get_the_ID(), '_threed_page_hide_title', true );
			if(!$hide_title)
			{
				the_title( '<h1 class="entry-title">', '</h1>' ); 
			}
		?>		
	</header><!-- .entry-header -->	
	<div class="entry-content">
		<div class="team-info-area clearfix">	
			<div class="row">		
				<div class="content-image-wrapper">
				<?php 		           
	               	if (has_post_thumbnail()) 
	               	{
	       				the_post_thumbnail('threed_single_post_image'); 
					}					
				?>
				</div>	
				<div class="team-content">
					<?php the_content(); ?>					
				</div>	
			</div>
		</div>

	</div><!-- .entry-content -->
	<?php
		 
	                    $exclude_ids=array();
	                    $exclude_ids[0]=get_the_ID();
	                        $team_posts = new WP_Query( array( 'post_type' => 'team-member' ,'posts_per_page'=>-1,'post__not_in'=>$exclude_ids) );                                             
	                        if ( $team_posts->have_posts() ) 
	                        {
	?>
								 <div class="other-member-wrapper">
					                <h3 class="other-member-title"><?php esc_html_e('Other Members','threed'); ?></h3>
					                <ul class="other-member-slider">
	<?php  							
									while ( $team_posts->have_posts() ) : $team_posts->the_post();  
			                        if(has_post_thumbnail())
			                        {                          
    ?>            
    								<a href="<?php the_permalink(); ?>">
                              		<li>
                              			<?php the_post_thumbnail('threed_single_member_slider'); ?>  
                              			<div class="member-info"><?php the_title('<h4>','</h4>'); ?></div>
                              		</li> 
                            		</a>
    <?php 
                        			}
    				                endwhile; 
    ?>
				                  	</ul>
				              	</div>
	<?php                        	
	                        }
	                    
    ?>
	
</article><!-- #post-## -->
<?php
	}
?>