<?php
/*
* THREED POPULAR AND RECENT POST WIDGET
*/
class threed_tabbed_widget extends WP_Widget {

	public function __construct()
	{
		$widget_ops = array('classname' => 'threed_recent_entries', 'description' => esc_attr__( "Tabbed Widget to Show Recent and Popular Posts",'threed') );
		parent::__construct('threed-tabbed-widget', esc_attr__('Threed Recent & Popular Posts','threed'), $widget_ops);
		$this->alt_option_name = 'threed_recent_entries';


	}

	public function widget($args, $instance)
	{
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'threed-recent-posts', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();


		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_attr__( 'Recent Posts','threed' );
		$recent_title = ( ! empty( $instance['recent_title'] ) ) ? $instance['recent_title'] : esc_attr__('Recent Post','threed' );
		$popular_title = ( ! empty( $instance['popular_title'] ) ) ? $instance['popular_title'] : esc_attr__('Popular Post','threed' );
		$show_title = ( ! empty( $instance['show_title'] )) ? (bool) $instance['show_title'] : false;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$content_excerpt =  ( ! empty(  $instance['content_excerpt'] ) )?  $instance['content_excerpt'] : 0;

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
		{
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$allowed_tags_before_after=array('div' => array('class'=>array(),'id'=>array()),'h3'=>array('class'=>array(),),'span'=>array(),'aside'=>array('class'=>array(),'id'=>array()));
		echo wp_kses($args['before_widget'],$allowed_tags_before_after);
		 ?>
				<?php
								if(trim($title)!='')
								{
									printf('%s',$args['before_title']);
									printf(__('%s','threed'),$title);
									printf('%s',$args['after_title']);
								}
					?>


					<div class="news-widget" >

							<ul class="nav nav-tabs" role="tablist">
							<?php
								if ( trim($recent_title)!='')
								{
							?>
							    <li role="presentation" class="active">
								  <a href="#recent_posts" aria-controls="recent_posts" role="tab" data-toggle="tab">
								     <?php printf(__('%1$s','threed'),$recent_title);?>
								  </a>
							    </li>
							<?php
								}
								if(trim($popular_title)!='' )
								{
							?>
								  <li role="presentation">
									  <a href="#popular_posts" aria-controls="popular_posts" role="tab" data-toggle="tab">
									     <?php printf(__('%1$s','threed'),$popular_title);?>
									  </a>
								  </li>
							<?php
								}
							?>
							</ul>
				<?php

						$popular_posts = new WP_Query( apply_filters( 'widget_posts_args', array(
							'posts_per_page'      => $number,
							'no_found_rows'       => true,
							'post_status'         => 'publish',
							'orderby' => 'comment_count',
							'ignore_sticky_posts' => true
						) ) );
				?>
						<div class="tab-content clearfix">
								<?php
									if ($popular_posts->have_posts())
									{
								?>
								    	<ul class="tab-pane  news-list" id="popular_posts">
							                  <?php while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>
							                  	<?php $no_thumb = 'no_thumb'; ?>
							                    <li class="blog-holder clearfix">
							                        <?php
							                       		if ( has_post_thumbnail() )
							                       		{
							                       			$no_thumb='';
							                       	?>
							                        <div class="news-img">
                                        <a href="<?php the_permalink();?>">
								                        <?php
								                        	$image=wp_get_attachment_image_src(get_post_thumbnail_id(),'threed_tabbed_widget_image_size');
								                        ?>
								                        <img src="<?php printf(__('%s','threed'),esc_url($image[0])); ?>">
                                      </a>
							                        </div>
							                        <?php
							                      		}
							                      	?>
							                        <div class="news-desc <?php echo esc_attr($no_thumb); ?>">
							                        	<?php
							                        		if($show_title==1)
							                        		{
							                        	?>
							                          	<a href="<?php the_permalink();?>">
							                          		<?php get_the_title() ? the_title('<h6>','</h6>') : the_ID(); ?>
							                          	</a>
							                          	<?php
							                          		}
							                          		if($show_date==1)
							                          		{
							                          	?>
							                          	<div class="widget_date"><?php echo get_the_date(); ?></div>
							                          	<?php
							                          		}
							                          		if($content_excerpt>0)
							                          		{
							                          	?>
							                          	<p><?php echo wp_trim_words( get_the_content(), $content_excerpt, '...' ); ?></p>
							                          	<?php
							                          		}
							                          	?>
							                        </div>
							                    </li>

							                    <?php endwhile; ?>
						            	</ul>
						        <?php
						            }
						            wp_reset_postdata();

						            $recent_posts = new WP_Query( apply_filters( 'widget_posts_args', array(
						            'posts_per_page'      => $number,
						            'no_found_rows'       => true,
						            'post_status'         => 'publish',
						            'ignore_sticky_posts' => true
						            ) ) );
						            if ($recent_posts->have_posts())
						            {
						        ?>
						              	<ul  class="tab-pane news-list active" id="recent_posts">
							                  <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
							                    <li class="blog-holder clearfix">
							                    	<?php
							                    		$no_thumb = 'no_thumb';
							                       		if ( has_post_thumbnail() )
							                       		{
							                       			$no_thumb='';
							                       	?>
							                        <div class="news-img">
                                        <a href="<?php the_permalink();?>">
								                        <?php
								                        	$image=wp_get_attachment_image_src(get_post_thumbnail_id(),'threed_tabbed_widget_image_size');
								                        ?>
								                        <img src="<?php printf(__('%s','threed'),esc_url($image[0])); ?>">
                                      </a>
							                        </div>
							                        <?php
							                      		}
							                      	?>
							                        <div class="news-desc <?php echo esc_attr($no_thumb); ?>">
							                          	<?php
							                        		if($show_title==1)
							                        		{
							                        	?>
							                          	<a href="<?php the_permalink();?>">
							                          		<?php get_the_title() ? the_title('<h6>','</h6>') : the_ID(); ?>
							                          	</a>
							                          	<?php
							                          		}
							                          		if($show_date==1)
							                          		{
							                          	?>
							                          	<div class="widget_date"><?php echo get_the_date(); ?></div>
							                          	<?php
							                          		}
							                          		if($content_excerpt>0)
							                          		{
							                          	?>
							                          	<p><?php echo wp_trim_words( get_the_content(), $content_excerpt, '...' ); ?></p>
							                          	<?php
							                          		}
							                          	?>
							                        </div>
							                    <?php endwhile; ?>
						                </ul>
								<?php
									}
									wp_reset_postdata();
								?>
				       	</div>

		            </div>


		<?php
		echo wp_kses($args['after_widget'],$allowed_tags_before_after);

		if ( ! $this->is_preview() )
		{
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'ideas-recent-posts', $cache, 'widget' );
		}
		else
		{
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['recent_title'] = strip_tags($new_instance['recent_title']);
		$instance['popular_title']=strip_tags($new_instance['popular_title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_title'] = isset( $new_instance['show_title'] ) ? (bool) $new_instance['show_title'] : false;
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['content_excerpt'] = (int) $new_instance['content_excerpt'];

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['threed_recent_entries']) )
		{
			delete_option('threed_recent_entries');
		}
		return $instance;
	}

	public function form( $instance )
	{
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$recent_title     = isset( $instance['recent_title'] ) ? esc_attr( $instance['recent_title'] ) : '';
		$popular_title     = isset( $instance['popular_title'] ) ? esc_attr( $instance['popular_title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_title = isset( $instance['show_title'] ) ? (bool) $instance['show_title'] : false;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$content_excerpt = isset( $instance['content_excerpt'] ) ? absint( $instance['content_excerpt'] ) : 0;
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
			<?php esc_html_e( 'Widget Title:','threed' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title','threed' ); ?>" type="text" value="<?php printf(__('%s','threed'),$title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'recent_title' ); ?>">
			<?php esc_html_e( 'Title For Recent Post Tab:','threed' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'recent_title' ); ?>" name="<?php echo $this->get_field_name( 'recent_title','threed' ); ?>" type="text" value="<?php printf(__('%s','threed'),$recent_title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'popular_title' ); ?>">
			<?php esc_html_e( 'Title For Popular Post Tab:','threed' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'popular_title' ); ?>" name="<?php echo $this->get_field_name( 'popular_title' ); ?>" type="text" value="<?php printf(__('%s','threed'),$popular_title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>">
			<?php esc_html_e( 'Number of posts to show:','threed' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php printf(__('%s','threed'),$number); ?>"  />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>">
			<?php esc_html_e( 'Show Title:','threed' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" type="checkbox" <?php checked( $show_title ); ?>  />

			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>">
			<?php esc_html_e( 'Show Date:','threed' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" type="checkbox" <?php checked( $show_date ); ?>  />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'content_excerpt' ); ?>">
			<?php esc_html_e( 'Word Limit for post content:','threed' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id( 'content_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'content_excerpt' ); ?>" type="text" value="<?php printf(__('%s','threed'),$content_excerpt); ?>"  />
		</p>

<?php
	}
}
function threed_tabbed_widget_function()
{
      register_widget('threed_tabbed_widget');
}
add_action('widgets_init', 'threed_tabbed_widget_function');
