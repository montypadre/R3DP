<?php

add_shortcode( 'threed_instagram_section', 'threed_instagram_section_function' );
function threed_instagram_section_function( $atts ,$content=null) {
   extract( shortcode_atts( array(
      'threed_instagram_section_layout'=>'Static',
      'threed_instgram_col'=>'4',
      'threed_instagram_item_slide' => '4',
      'threed_instgram_navigation'=>'DOTS',
      'threed_instagram_username'=>'',
      'threed_instagram_image_size'=>'Original',
      'threed_instagram_post_no'=>'8',

 ), $atts,'threed_instagram_section' ) );

    $output ='';
    $username = strtolower( $threed_instagram_username );
    $username = str_replace( '@', '', $username );

    if ( false === ( $instagram = get_transient( 'instagram-a4-'.sanitize_title_with_dashes( $username ) ) ) )
    {
      $remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );
      if ( is_wp_error( $remote ) )
      {
        echo 'Unable to communicate with Instagram.';
        return;
      }

      if ( 200 != wp_remote_retrieve_response_code( $remote ) )
      {
        echo 'Instagram did not return a 200.';
        return;
      }

      $shards = explode( 'window._sharedData = ', $remote['body'] );
      $insta_json = explode( ';</script>', $shards[1] );
      $insta_array = json_decode( $insta_json[0], TRUE );

      if ( ! $insta_array )
      {
        echo 'Instagram has returned invalid data.';
        return;
      }

      if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) )
      {
        $images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
      } else
      {
        echo 'Instagram has returned invalid data.';
        return;
      }

      if ( ! is_array( $images ) )
      {
        echo 'Instagram has returned invalid data.';
        return;
      }

      $instagram = array();

      foreach ( $images as $image ) {

        $image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $image['thumbnail_src'] );
        $image['display_src'] = preg_replace( '/^https?\:/i', '', $image['display_src'] );

        // handle both types of CDN url
        if ( (strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
          $image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
          $image['small'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
        } else {
          $urlparts = wp_parse_url( $image['thumbnail_src'] );
          $pathparts = explode( '/', $urlparts['path'] );
          array_splice( $pathparts, 3, 0, array( 's160x160' ) );
          $image['thumbnail'] = '//' . $urlparts['host'] . implode('/', $pathparts);
          $pathparts[3] = 's320x320';
          $image['small'] = '//' . $urlparts['host'] . implode('/', $pathparts);
        }

        $image['large'] = $image['thumbnail_src'];

        if ( $image['is_video'] == true ) {
          $type = 'video';
        } else {
          $type = 'image';
        }

        $caption = __( 'Instagram Image', 'ibt_widgets' );
        if ( ! empty( $image['caption'] ) ) {
          $caption = $image['caption'];
        }

        $instagram[] = array(
          'description'   => $caption,
          'link'        => trailingslashit( '//instagram.com/p/' . $image['code'] ),
          'time'        => $image['date'],
          'comments'      => $image['comments']['count'],
          'likes'     => $image['likes']['count'],
          'thumbnail'   => $image['thumbnail'],
          'small'     => $image['small'],
          'large'     => $image['large'],
          'original'    => $image['display_src'],
          'type'        => $type
        );
      }

      // do not set an empty transient - should help catch private or empty accounts
      if ( ! empty( $instagram ) ) {
        $instagram = base64_encode( serialize( $instagram ) );
        set_transient( 'instagram-a4-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*1 ) );
      }
    }

    if ( ! empty( $instagram ) ) {

      $instagram = unserialize( base64_decode( $instagram ) );
      $instagram=array_slice( $instagram, 0, $threed_instagram_post_no );
    }
    else
    {
      echo 'Instagram did not return any images.';
    }

    $image_size=strtolower($threed_instagram_image_size);

    $col_class='col-xs-12 col-md-';
    if($threed_instagram_section_layout=='Static')
    {
      if($threed_instgram_col==2)
      {
        $col_class.='6';
      }
      if($threed_instgram_col==3)
      {
        $col_class.='4';
      }
      if($threed_instgram_col==4)
      {
        $col_class.='3';
      }
      if($threed_instgram_col==6)
      {
        $col_class.='2';
      }
      $output.='<div class="instagram-container">';
        $output.='<div class="row">';
          foreach($instagram as $insimg)
          {
              $output.='<div class="'.$col_class.' instagram-list-wrap" style="background-image:url('.$insimg[$image_size].');height:400px;background-size:cover;background-postion:center;bacground-repeat:no-repeat;">';
                $output.='<div class="instagram-info row">';
                    $output.='<div class="col-xs-4 col-md-4 instagram-list">';
                        $output.='<i class="fa fa-thumbs-o-up">';
                        $output.='</i>';
                      $output.='<span class="">'.$insimg['likes'].'</span>';
                    $output.='</div>';
                    $output.='<div class="col-xs-4 col-md-4 instagram-list">';
                      $output.='<i class="fa fa-comment-o">';
                      $output.='</i>';
                      $output.='<span class="">'.$insimg['comments'].'</span>';
                    $output.='</div>';
                    $output.='<div class="col-xs-4 col-md-4 instagram-list">';
                      $output.='<a href="'.esc_url($insimg['link']).'" target="_blank">';
                        $output.='<i class="fa fa-share-square-o">';
                        $output.='</i>';
                      $output.='</a>';
                    $output.='</div>';
                $output.='</div>';
              $output.='</div>';
          }
        $output.='</div>';
      $output.='</div>';
    }

  return $output;
}
