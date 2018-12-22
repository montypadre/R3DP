<?php
		$files = get_post_meta( get_the_ID(), 'threed_gallery_post_format_gallery',true);		
		if(is_array($files))
		{
?>	
			  <div class="gallery_post_format">
					 <?php                                     
                            foreach ($files as $attachment_id => $attachment_url ) 
                            {
                              $thumb_url= wp_get_attachment_image_src($attachment_id,'threed_single_post_image');
                              $large_thumb_url= wp_get_attachment_image_src($attachment_id,'threed_single_post_image');
	                  ?>
	                          <div class="item"><a href="<?php echo esc_url($large_thumb_url[0]); ?>"><img src="<?php echo esc_url($thumb_url[0]);?>"></a></div>
	                  <?php 
	                        } 
	                  ?>
			  </div>
<?php
		}
		else
		{			
			if(has_post_thumbnail())
            {
				  echo get_the_post_thumbnail(get_the_ID(),'threed_single_post_image');   
            }   
		}
?>