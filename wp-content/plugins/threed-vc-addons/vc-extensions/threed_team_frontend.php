<?php
if ( !defined( 'WPB_VC_VERSION' ) )
{
    return;
}

add_shortcode( 'threed_team_section', 'threed_team_section_function' );
function threed_team_section_function( $atts ,$content=null) {
   extract( shortcode_atts( array(

      'threed_team_layout'=>'Simple',
      'threed_team_item_slide' => '4',
      'threed_team_navigation'=>'DOTS',
      'threed_team_item_col'=>'4',
      'threed_team_post_image'=>'Yes',
      'threed_team_post_title'=>'Yes',
      'threed_team_post_designation'=>'Yes',
      'threed_team_post_details'=>'Yes',
      'threed_team_post_link_text'=>'View More',
      'threed_team_post_order'=>'ASC',
      'threed_team_post_ids'=>'',
      'threed_team_post_no'=>'4',

 ), $atts,'threed_team_section' ) );

  $simple_class='';
  $slider_class="";
  $col_count=intval(12/$threed_team_item_col);
  if($threed_team_layout=='Slider')
  {
      $slider_class="team-vc-slider";
      wp_enqueue_script( 'threed-owl-team-script',  plugins_url(). '/threed-vc-addons/js/owl-team-script.js', array( 'jquery' ), '','1.6.2',true );
      wp_localize_script( 'threed-owl-team-script', ' threedsettings', array('team_item'=>$threed_team_item_slide,'team_navigation'=>$threed_team_navigation ) );
  }
  else
  {
    $simple_class='col-xs-12 col-sm-6 col-md-4';
    if(!empty($threed_team_item_col))
    {

      $simple_class='col-md-'.$col_count;
    }

  }

  $args['post_type']="team-member";
  $args['order']="ASC";
  if(!empty($threed_team_post_order))
  {
     if($threed_team_post_order=='IDS')
     {
        if(!empty($threed_service_post_ids))
        {
           $args['post__in']=explode(",",$threed_service_post_ids);
           $args['posts_per_page']=-1;
           unset($args['order']);
        }
     }
     else
     {
         $args['order']=$threed_team_post_order;
         $args['posts_per_page']=$threed_team_post_no;
     }
  }

  $team_posts=new WP_Query($args);


  $output='<section class="team-wrapper row '.esc_attr($slider_class).'">';

    if ( $team_posts->have_posts() ) : while ( $team_posts->have_posts() ) : $team_posts->the_post();   //post loop

        $output.='<div class="team-member-view '.esc_attr($simple_class).'">';
          if(!empty($threed_team_post_image))
          {
            if(has_post_thumbnail())
            {
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'threed_team_member_image' );
                $url = $thumb['0'];
                $output.='<div class="team-image">';
                  $output.='<img src="'.esc_url($url).'" alt="post-image-'.get_the_ID().'">';
                  if($threed_team_post_details=='Yes')
                  {
                    $output.='<div class="modal-view-more">';

                      $output.='<a href="'.get_the_permalink().'">'.$threed_team_post_link_text.'</a>';
                    $output.='</div>';
                  }
                $output.='</div>';
            }
          }
          $output.='<div class="team-info">';
          if(!empty($threed_team_post_title))
          {
            if($threed_team_post_details=='Yes')
            {
              $output.='<a href="'.get_the_permalink().'">';
            }
            $output.='<h4>'.get_the_title().'</h4>';
            if($threed_team_post_details=='Yes')
            {
              $output.='</a>';
            }
          }
          if(!empty($threed_team_post_designation))
          {
            $designation=get_post_meta(get_the_ID(),'_threed_team_designation',true);
            if(!empty($designation))
            {
              $output.='<h6>'.$designation.'</h6>';
            }
          }
          $output.='</div>';

        $output.='</div>';

    endwhile;endif;
    wp_reset_postdata();
    wp_reset_query();

  $output.='</section>';

  return $output;
}
