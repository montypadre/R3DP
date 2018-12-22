 <!-- Our Verticals Open -->
    <section class="verticals-area section-row-v1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <?php
                global $post;
                $post->ID;
                $cat_list = get_post_meta( $post->ID, '_threed_main_product_cat',true);
              
              
              
              global $service_icon_url,$another_service_icon,$service_icon_type;
              $buisness_icon= threed_get_option(array('opt-bussiness-icon','url'));?>
               <?php if($buisness_icon){ ?>
                    <img src="<?php echo esc_url($buisness_icon); ?>" alt="">
                <?php } ?>
              
              <?php global $layout_title,$layout_subtitle;?>
              <?php if($layout_title){?>
              <h2><?php printf(__('%1$s','threed'),$layout_title); ?></h2>
              <?php } ?>
              <?php if($layout_subtitle){?> 
              <h3><?php printf(__('%1$s','threed'),$layout_subtitle); ?></h3>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php 
          $vc_stat= get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
            if($vc_stat=='true'){
              the_content();
            }else{?>
                <div class="row">
                    <?php the_content();?> 
                </div>
            
        <?php } ?>
      </div>
    </section>
    <!-- Our Verticals Close -->
    