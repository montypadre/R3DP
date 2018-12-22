<?php
		$files = get_post_meta( get_the_ID(), 'threed_video_post_format_video',true);         		

		if(!empty($files))
		{
?>
			<video width="100%" height="" controls>
                <source src="<?php echo esc_url($files); ?>" type="video/mp4">
                <source src="<?php echo esc_url($files); ?>" type="video/ogg">
              Your browser does not support the video tag.
            </video>
<?php			
		}
			
?>