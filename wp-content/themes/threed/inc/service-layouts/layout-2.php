<!-- Product Section Open -->
    <section class="product-area section-row-v1">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="section-heading">
              <?php
             
                global $post;
                $post->ID;
                $cat_list = get_post_meta( $post->ID, '_threed_woo_product_cat',true);
              
              
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
          </div>
          <div class="col-md-8">
            <div class="isotope-menu clearfix">
            <div class="service-isotope-menu"> <a href="javascript:void(0);" class="active btn button-stroke btn-block" data-filter="*">All</a></div>
            
            <?php
            if($cat_list){
                foreach ($cat_list as $c)
                    {
                    $cat = get_term($c,'main_product_category');
          ?>
            <div class="service-isotope-menu"><a href="javascript:void(0);" class="btn button-stroke btn-block" data-filter="<?php printf('.%s',esc_attr($cat->slug)); ?>"><?php printf('%s',$cat->name); ?></a></div>
               <?php }
          }
          ?>                         
            </div>
          </div>
        </div>
        <div class="row product-col-3">
          <?php 
  
        if($cat_list){    
         
         $args = array(
                'post_type'=> 'product',
                'posts_per_page'=>-1,
                'tax_query' => array(
                    array(
                      'taxonomy' => 'product_cat',
                      'terms'    => $cat_list,
                                    ),
                                ),
                             );
        }else{
           $args = array(
                'post_type'=> 'product',
                'posts_per_page'=>-1,
               );
        }
               
            query_posts( $args );
              while ( have_posts() ) : the_post();
              
              $taxonomy='product_cat';
                  $slugs_arr=wc_get_product_terms( get_the_ID(), $taxonomy , array( 'fields' => 'slugs' ) );
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
                <h3><?php global $product; printf('%s',$product->get_price_html());?></h3>
                <?php
                global $product;
                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                  sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s button-product button-product--pink ajax_add_to_cart">Add To Cart</a>',
                    esc_url( $product->add_to_cart_url() ),
                    esc_attr( $product->id ),
                    esc_attr( $product->get_sku() ),
                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                    esc_attr( $product->product_type )
                    ),
                  $product );
                  ?>
                
              </div>
            </div>
          </div>
          
          
          <?php endwhile; // end of the loop. ?>
              <?php wp_reset_query(); ?>
          
          
        </div>
      </div>
    </section>
    <!-- Product Section Close -->
    
    