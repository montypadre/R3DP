<?php get_header(); ?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();

        //Get Cmb2 valus
        global $service_icon_url,$another_service_icon,$service_icon_type;
        $service_subtitle =  get_post_meta(get_the_ID(),'_threed_service_subtile',true);
        $service_single_title =  get_post_meta(get_the_ID(),'_threed_single_service_title',true);
        $service_icon_url = get_post_meta(get_the_ID(),'_threed_service_icon',true);
        $another_service_icon = get_post_meta(get_the_ID(),'_threed_another_service_icon',true);
        $service_icon_type = get_post_meta(get_the_ID(),'_threed_service_icon_type',true);

        $other_service_section_subtitle = get_post_meta(get_the_ID(),'_threed_other_service_section_subtitle',true);

        global $layout_title,$layout_subtitle;
        $layout_title= get_post_meta(get_the_ID(),'_threed_layout_title',true);
        $layout_subtitle= get_post_meta(get_the_ID(),'_threed_layout_subtitle',true);

        $buisness_icon= threed_get_option(array('opt-bussiness-icon','url'));

        $allowed_html = array(
                        //formatting
                        'strong' => array(),
                        'em'     => array(),
                        'b'      => array(),
                        'i'      => array(),
                        'br'      => array(),
                        'span'      => array(),

                        //links
                        'a'     => array(
                            'href' => array()
                        )
                    );

?>
<!-- Service Content Open -->
    <section class="service-con">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="section-heading02">
                <?php if($service_single_title){ ?>
                <h2><?php echo  wp_kses(sprintf(__('%s', 'threed' ),$service_single_title),$allowed_html) ;?></h2>
                <?php }else{
                     the_title( '<h2>', '</h2>' );
                }?>
                <?php if($service_subtitle){ ?>
                <h3><?php echo  wp_kses(sprintf(__('%s', 'threed' ),$service_subtitle),$allowed_html) ;?></h3>
                <?php } ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="service-image">
                <?php if(has_post_thumbnail()){the_post_thumbnail('full');} ?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="or-spacer">
              <div class="mask"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Service Content Close -->

    <?php
     $layout_type=  get_post_meta(get_the_ID(),'_threed_service_layout', true);

        if($layout_type == 'layout-1')
        {
            require_once get_template_directory() . '/inc/service-layouts/layout-1.php';
        }
        if($layout_type == 'layout-2')
        {
            require_once get_template_directory() . '/inc/service-layouts/layout-2.php';
        }
        if($layout_type == 'layout-3')
        {
            require_once get_template_directory().'/inc/service-layouts/layout-3.php';
        }


        $other_service_ids = get_post_meta( get_the_ID(), '_threed_other_services',true);

    if( isset($other_service_ids[0]) ){

        $args = array(
            'post_type'=> 'service',
            'post__not_in'=>array(get_the_ID()),
            'post__in'=>$other_service_ids,
            'posts_per_page'=>count($other_service_ids),
            );
        query_posts( $args );
        if (have_posts()) :

    ?>
    <!-- Other Service Open -->
    <section class="other-service section-row-v1">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
                <?php
                    if($buisness_icon)
                    {
                ?>
                        <img src="<?php echo esc_url($buisness_icon); ?>" alt="" class="service-icon">
                <?php
                    }
               ?>
                <h2><?php esc_html_e('Checkout','threed');?><br>
                   <?php esc_html_e('other services','threed');?>
                </h2>
               <?php if($other_service_section_subtitle){ ?>
               <p><?php printf(__('%1$s','threed'),$other_service_section_subtitle);?></p>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="other-service-wrapper row">
            <?php
            while ( have_posts() ) : the_post();

            $service_type= get_post_meta(get_the_ID(),'_threed_service_layout', true);
            $service_icon_other = get_post_meta(get_the_ID(),'_threed_service_icon',true);
            $another_service_icon = get_post_meta(get_the_ID(),'_threed_another_service_icon',true);
            $service_icon_type = get_post_meta(get_the_ID(),'_threed_service_icon_type',true);
            $tagline= get_post_meta(get_the_ID(),'_threed_tag_line_other_service', true);
            $background_image_url= get_post_meta(get_the_ID(),'_threed_other_service_background', true);
            $str_styl='style="background:url('.esc_url($background_image_url).');"';
            ?>
            <div class="col-md-6 service-version service-version--type2" <?php printf(__('%s','threed'),$str_styl); ?>>

            <?php
                if($service_type == 'layout-1'){$service_tag = '#01';}
                if($service_type == 'layout-2'){$service_tag = '#02';}
                if($service_type == 'layout-3'){$service_tag = '#03';}
            ?>
            <div class="service-tag"><h3><?php printf(__('%1$s','threed'),$service_tag); ?></h3></div>
            <?php
                if($service_icon_type == 'image')
                {
                    if($service_icon_url)
                    {
            ?>
                      <img src="<?php echo esc_url($service_icon_url); ?>" alt="">

            <?php
                    }
                }
                if($service_icon_type == 'fontawesome')
                {
                    if($another_service_icon)
                    {
            ?>
                        <i class="service-icon fa <?php printf(__('%1$s','threed'),$another_service_icon); ?>"></i>
            <?php
                    }
                }
            ?>
            <?php
                    if($tagline)
                    {
            ?>
                        <h2><?php echo  wp_kses(printf(__('%1$s', 'threed' ),$tagline),$allowed_html) ;?></h2>
            <?php
                    }
                    else
                    {
            ?>
                        <h2><?php the_title();?></h2>
            <?php
                    }
            ?>
            <?php
                    if(($service_type == 'layout-1') || ($service_type == 'layout-2') )
                    {
            ?>
                    <a href="<?php the_permalink();?>" class="button-services button-services--green"><?php esc_html_e('Shop Now','threed');?></a>
            <?php
                    }
                    else
                    {
            ?>
                        <a href="<?php the_permalink();?>" class="button-services button-services--black"><?php esc_html_e('Know more','threed');?></a>
            <?php
                    }
            ?>

          </div>
          <?php
          endwhile;
          wp_reset_query();
          ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php } //checking close isset($other_service_ids)?>
    <!-- Other Service Close -->
    <?php
	endwhile;
else :
	esc_html_e('Sorry, No Services Found ','threed');
endif;?>
<?php get_footer(); ?>
