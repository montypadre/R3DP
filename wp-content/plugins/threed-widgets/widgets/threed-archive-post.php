<?php

class threed_archive_post extends WP_Widget {

	public function __construct() 
	{
		$widget_ops = array('classname' => 'widget_archive', 'description' => esc_attr__( 'Widget to show your site&#8217;s archive Posts with post count.') );
		parent::__construct('threed_archive_post', esc_attr__('Threed Archive Posts'), $widget_ops);
	}
	
	public function widget( $args, $instance ) 
	{	
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_attr__( 'Threed Archive Posts' ) : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) 
		{
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
		<?php
				$html=wp_get_archives( apply_filters( 'widget_archives_args', array(
					'type'            => 'monthly',
					'show_post_count' => 1,
					'echo'=>false
				) ) );
				echo $html=str_replace('(','<span class="threed_archive_post_count">',str_replace(')','</span>',$html));
		?>
		</ul>
		
	<?php
		echo $args['after_widget'];
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = $new_instance['count'] ? 1 : 0;		

		return $instance;
	}

	
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
		$title = sanitize_text_field( $instance['title'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
		<?php
	}
}
function threed_archive_widget_function() 
{
      register_widget('threed_archive_post');
}
add_action('widgets_init', 'threed_archive_widget_function');