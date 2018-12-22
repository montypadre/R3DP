<?php

		/**** Extracting the Font container Styles*****/
		function threed_extract_font_container($font_container)
		{
			$font_container_data_array=explode("|",$font_container);
			$arr_elements=array();
			for($i=0;$i<count($font_container_data_array);$i++)
			{
				$arr_elements=explode(":",$font_container_data_array[$i]);
				$font_container_data[$arr_elements[0]]=$arr_elements[1];
			}
			return $font_container_data;
		}//end of function

		add_action('wp_ajax_nopriv_loadGalleryImages', 'threed_loadGalleryImages' ); //witout logged in
		add_action("wp_ajax_loadGalleryImages","threed_loadGalleryImages");           //logged in
		function threed_loadGalleryImages()
		{
			$offset=$_POST['offset'];
			$per_item=$_POST['per_item'];
			$image_ids=$_POST['image_ids'];
			$page_id=$_POST['page_id'];
			$threed_gallery_grid_col=$_POST['threed_gallery_grid_col'];
			$threed_gallery_on_click=$_POST['threed_gallery_on_click'];

			$image_ids_arr=explode(',',$image_ids);
			$image_arr=array_slice($image_ids_arr,$offset,$per_item);
			$result=array();

			$output='';
			$grid_col=0;
            $grid_item=0;
            $grid_col_class='';
			foreach($image_arr as $gallery_image_id)
            {
	            $grid_col++;
	            $grid_item++;
	            $grid_col_class='';
	            if($threed_gallery_grid_col>1)
	            {
	              if($grid_col==1)
	              {
	                $grid_col_class="grid-col-first";
	              }
	              if($grid_col==$threed_gallery_grid_col)
	              {
	                  $grid_col_class='grid-col-last';
	                  $grid_col=0;
	              }
	            }
	            $image_size='threed_gallery_'.$threed_gallery_grid_col.'_size';
	            $output.='<li class="gallery-list '.esc_attr($grid_col_class).'">';
	              if($threed_gallery_on_click=='Open prettyPhoto')
	              {
	                $gallery_full_image=wp_get_attachment_image_src($gallery_image_id,'threed_gallery_1_size');
	                $output.='<a href="'.esc_url($gallery_full_image[0]).'" class="prettyphoto" rel="gridprettyPhoto[rel-'.$page_id.']">';
	              }
	              $gallery_image=wp_get_attachment_image_src( $gallery_image_id,$image_size);
	              $url = $gallery_image['0'];
	                $output.='<img src="'.esc_url($url).'" alt="Threed Gallery Image" id="gallery-image-'.$gallery_image_id.'">';
	              $output.='</a>';
	            $output.='</li>';
	            if($grid_item==$per_item)
	            {
	                break;
	            }
            }

			$result['html']=$output;
   			$result['new_offset']=$offset+$per_item;

			 echo json_encode($result);

			die();
		}//end of function
		add_action('wp_ajax_nopriv_loadPortfolioPosts', 'threed_loadPortfolioPosts' ); //witout logged in
		add_action("wp_ajax_loadPortfolioPosts","threed_loadPortfolioPosts");           //logged in
		function threed_loadPortfolioPosts()
		{
			//print_r($_POST);
			$threed_portfolio_post_order=$_POST['post_order'];
			$threed_portfolio_post_no=$_POST['per_item'];
			$offset=$_POST['offset'];
			$threed_portfolio_grid_col=$_POST['portfolio_grid_col'];
			$threed_portfolio_post_title=$_POST['show_title'];
			$threed_portfolio_post_content=$_POST['show_content'];
			$word_limit=$_POST['word_limit'];
			$args['post_type']="portfolio";
			$grid_col=0;

		  	if($threed_portfolio_post_order!="IDS")
		  	{
			    $args['order']=$threed_portfolio_post_order;
			    if(!empty($threed_portfolio_post_no) && $threed_portfolio_post_no!='')
			    {
			      $args['posts_per_page']=$threed_portfolio_post_no;
			    }
		  	}
		  	if($offset!='')
		  	{
		  		$args['offset']=$offset;
		  	}


	      	$image_size='threed_gallery_'.$threed_portfolio_grid_col.'_size';
		  	$portfolio_posts=new WP_Query($args);
		  	$output='';
		  	if ( $portfolio_posts->have_posts() ) : while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();   //post loop

		  		$grid_col++;
		        if($threed_portfolio_grid_col>1)
		        {
		          if($grid_col==1)
		          {
		            $grid_col_class="grid-col-first";
		          }
		          if($grid_col==$threed_portfolio_grid_col)
		          {
		              $grid_col_class='grid-col-last';
		              $grid_col=0;
		          }
		        }
		        $output.='<li class="portfolio-list '.esc_attr($grid_col_class).'">';
		          $output.='<div class="portfolio-grid-wrapper">';
		              if(has_post_thumbnail())
		              {
		                  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $image_size );
		                  $url = $thumb['0'];
		                  $output.='<a href="'.get_the_permalink().'">';
		                    $output.='<img src="'.esc_url($url).'" alt="post-image-'.get_the_ID().'" data="'.$image_size.'">';
		                  $output.='</a>';
		              }
		              if($threed_portfolio_post_title=='Yes' || $threed_portfolio_post_content=='Yes')
             		  {
             		  		$output.='<a href="'.get_the_permalink().'">';
		              		$output.='<div class="portfolio-info">';
				              $output.='<div class="portfolio-info-inner">';
				              if($threed_portfolio_post_title=='Yes')
				              {
				                $output.='<h3 class="portfolio-title">'.get_the_title().'</h3>';
				              }
				              if($threed_portfolio_post_content=='Yes')
				              {
				                $output.= wpautop(threed_get_the_excerpt($word_limit));
				              }
				              $output.='</div>';
		              		$output.='</div>';
		              		$output.='</a>';
		          		}
		          $output.='</div>';
		        $output.='</li>';

		    endwhile; endif;
		    wp_reset_postdata();
		    wp_reset_query();

		    $result['html']=$output;
   			$result['new_offset']=$offset+$threed_portfolio_post_no;


   			echo json_encode($result);
		    die();
		}//end of functions

?>
