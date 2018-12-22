<?php
    /*
    Template Name:Main Product Download Files
    */
   get_header();
?>
<!-- Product Section Open -->
    <section class="product-area section-row-v1">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="section-heading">
              <?php
                global $post;
                $post->ID;
                $cat_list = get_post_meta( $post->ID, '_threed_page_main_product_cat',true);
                $escape_main_products = get_post_meta( $post->ID, '_threed_page_escaped_main_product',true);
                $subtitle = get_post_meta( $post->ID, '_threed_page_download_page_subtitle',true);
                           
                global $service_icon_url,$another_service_icon,$service_icon_type;
                $buisness_icon= threed_get_option(array('opt-bussiness-icon','url'));
              
                if($buisness_icon)
                { 
              ?>
                    <img src="<?php echo esc_url($buisness_icon); ?>" alt="">
              <?php 
                } 
              ?>
                  <h2><?php the_title(); ?></h2>
              <?php 
                    if($subtitle)
                    {
              ?> 
                      <h3><?php printf(__('%1$s','threed'),$subtitle); ?></h3>
              <?php 
                    } 
              ?>
            </div>
          </div>
          <div class="col-md-8">
            <div class="isotope-menu clearfix">
            <div class="service-isotope-menu"> <a href="javascript:void(0);" class="active btn button-stroke btn-block" data-filter="*"><?php esc_html_e('All','threed'); ?></a></div>
          <?php
            if($cat_list)
            {
                foreach ($cat_list as $c)
                {
                $cat = get_term($c,'main_product_category');
          ?>
                  <div class="service-isotope-menu" ><a href="javascript:void(0);" class="btn button-stroke btn-block" data-filter="<?php printf('.%s',esc_attr($cat->slug)); ?>"><?php printf('%s',$cat->name); ?></a></div>
          <?php 
                }
            }
          ?>                    
            </div>
          </div>
        </div>
           <div class="row product-col-3">
         <?php   
          if($cat_list)
          { 
             $args = array(
                    'post_type'=> 'main-product',
                    'posts_per_page'=>-1,
                    'post__not_in' => $escape_main_products,
                    'tax_query' => array(
                        array(
                          'taxonomy' => 'main_product_category',
                          'terms'    => $cat_list,
                                        ),
                                    ),
                                 );
          }else
          {
             $args = array(
                  'post_type'=> 'main-product',
                  'posts_per_page'=>-1,
                  'post__not_in' => $escape_main_products,
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
                  
                  $download_file= get_post_meta(get_the_ID(), '_threed_download_file',true);
                  if($download_file){
                  ?>
                  </p>
                  <a href="<?php echo esc_url($download_file);?>" class="button-product"><?php esc_html_e('Download Software','threed'); ?></a>
                  <?php } ?>
                </div>
              </div>
            </div>            
            <?php
                endwhile; // end of the loop.
                wp_reset_query(); 
            ?>
          
          </div>
        </div>
     
    </section>
    <!-- Product Section Close -->
    
<?php get_footer(); ?>