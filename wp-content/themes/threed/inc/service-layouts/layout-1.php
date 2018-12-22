<!-- Product Section Open -->
    <section class="product-area section-row-v1">
      <div class="container">
        <div class="row">
          <div class="col-xs-12  col-md-4">
            <div class="section-heading">
              <?php
                global $post;
                $post->ID;
                $cat_list = get_post_meta( $post->ID, '_threed_main_product_cat',true);
              
              
              
              
               global $service_icon_url,$another_service_icon,$service_icon_type;
               $buisness_icon= threed_get_option(array('opt-bussiness-icon','url'));
               ?>
                
                
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
          </div>  <!-- col-md-4-->
          <div class="col-xs-12 col-md-8">
            <div class="isotope-menu clearfix">
              <div class="service-isotope-menu"> <a href="javascript:void(0);" class="active btn button-stroke btn-block" data-filter="*">All</a></div>
              <?php
              if($cat_list){
                  foreach ($cat_list as $c)
                      {
                      $cat = get_term($c,'main_product_category');
              ?>
              <div class="service-isotope-menu" >
                <a href="javascript:void(0);" class="btn button-stroke btn-block" data-filter="<?php printf('.%s',esc_attr($cat->slug)); ?>"><?php printf('%s',$cat->name); ?></a>
              </div> <!-- col-md-3-->
                 <?php }
                }
              ?>                    
            </div><!-- item-menu-->
          </div>
        </div> <!-- row-->
        <div class="row product-col-3">
           <?php 
    
          if($cat_list){    
         
          $args = array(
                'post_type'=> 'main-product',
                'posts_per_page'=>-1,
                'tax_query' => array(
                    array(
                      'taxonomy' => 'main_product_category',
                      'terms'    => $cat_list,
                                    ),
                                ),
                             );
              }else{
              $args = array(
                'post_type'=> 'main-product',
                'posts_per_page'=>-1,
               );
          }
               
            query_posts( $args );
              while ( have_posts() ) : the_post();
              $taxonomy='main_product_category';
                  $slugs_arr=wp_get_object_terms( get_the_ID(), $taxonomy , array( 'fields' => 'slugs' ) );
                  $slug=implode(' ', $slugs_arr);
                   
            ?>
       
            <div class="product-wrapper col-xs-12 col-sm-6 col-md-4 <?php printf('%s',esc_attr($slug)); ?>">
              <div class="product-item">
                  <?php if(has_post_thumbnail()){?>
                <div class="product-img-area"><?php the_post_thumbnail('for_service_page'); ?></div>
                  <?php } ?>
                <div class="item-content">
                  <h2><?php the_title(); ?></h2>
                  <p>
                    <?php
                    $excerpt=get_the_excerpt();
                    $treed_trimed_excerpt=wp_trim_words($excerpt,10,'');
                    printf(__('%s','threed'),$treed_trimed_excerpt);
                    ?>
                  </p>
                  <a href="<?php the_permalink();?>" class="button-product"><?php esc_html_e('ask a quote','threed'); ?></a>
                </div> <!-- item-content-->
              </div> <!-- product item -->
            </div> <!-- product wrapper-->

            
           <?php endwhile; // end of the loop. ?>
              <?php wp_reset_query(); ?>
          
          </div>  <!-- product-col-3 -->
        </div>
    </section>
    <!-- Product Section Close -->
    
    