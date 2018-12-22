<?php get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();

 $allowed_html = array(
                        //formatting
                        'strong' => array(),
                        'em'     => array(),
                        'b'      => array(),
                        'i'      => array(),
                        'br'      => array(),

                        //links
                        'a'     => array(
                            'href' => array()
                        )
                    );

 //Meta Box Values

  $main_product_subtitle =  get_post_meta(get_the_ID(),'_threed_main_product_subtitle',true);
  $show_form = get_post_meta(get_the_ID(),'_threed_show_form',true);
  $form_type = get_post_meta(get_the_ID(),'_threed_form_type',true);
  $rec_email = get_post_meta(get_the_ID(),'_threed_rec_email',true);
  $cf7_shortcode = get_post_meta(get_the_ID(),'_threed_cf7_shortcode',true);
  $download_link= get_post_meta(get_the_ID(),'_threed_download_file',true);

  $link_text= get_post_meta(get_the_ID(),'_threed_external_link_text',true);
  $link_url= get_post_meta(get_the_ID(),'_threed_external_link_url',true);


  $buisness_icon= threed_get_option(array('opt-bussiness-icon','url'));
?>
<!-- Request Area Open -->
    <section class="request-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="section-heading03">
              <h2><?php echo  wp_kses(__('Your request <br>for', 'threed' ),$allowed_html) ;?></h2>
              <h3><?php the_title(); ?></h3>
              <?php if($main_product_subtitle){ ?>
              <h4><?php echo  wp_kses(sprintf(__('%s', 'threed' ),$main_product_subtitle),$allowed_html) ;?></h4>
              <?php } ?>

            </div>
            <?php the_content(); ?>

            <div class="button-wrapper">
              <!-- two button code -->

              <!-- button One -->
              <?php if($download_link){?>
              <a href="<?php echo esc_url($download_link); ?>" class="button-blueDownload"><span><?php esc_html_e('Download Software','threed'); ?></span></a>
              <?php }?>

              <!-- button two -->
              <?php if($link_url){?>
              <a href="<?php echo esc_url($link_url); ?>" class="button-pinkView"><span><?php printf(__('%s','threed'),$link_text); ?></span></a>
              <?php }?>
            </div>
          </div>
          <div class="col-md-5">
            <div class="req-image">
               <?php if(has_post_thumbnail()){the_post_thumbnail('full');} ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Request Area Close -->


    <?php if($show_form == 'yes'){ ?>
    <!-- Request Form Open -->
    <section class="request-form-section">
      <div class="container">
        <h2><?php echo  wp_kses(__('Fill the following <br>request form', 'threed' ),$allowed_html) ;?></h2>

        <div class="ask-a-quote-form-wrapper">
        <?php if($form_type == 'inbuilt'){ ?>

            <p class="response"></p>

              <form  id="ask_quote" class="ask-a-quote-form clearfix" action="<?php the_permalink(); ?>" method="post">
                <div class="form-group">
                  <input id="message_name" type="text" class="form-control" placeholder="<?php esc_html_e('Enter Your Name','threed'); ?>" name="message_name" required>
                </div>
                <div class="form-group">
                  <input id="message_email" type="email" class="form-control" placeholder="<?php esc_html_e('Enter Your Email','threed'); ?>" name="message_email" required>
                </div>
                <div class="form-group">
                  <input id="message_phno" type="tel" class="form-control" placeholder="<?php esc_html_e('Enter your Phone Number','threed'); ?>" name="message_phno">
                </div>
                <div class="form-group">
                  <input id="message_company" type="url" class="form-control" placeholder="<?php esc_html_e('Enter your company name ( if any )','threed'); ?>" name="message_company">
                </div>
                <div class="form-group-textarea">
                  <textarea id="message_text" placeholder="<?php esc_html_e('Write some additonal requirements.','threed'); ?>" type="text" name="message_text"></textarea>
                </div>
                  <input id="submitted" type="hidden" name="submitted" value="1">
                  <input id="to_email" type="hidden" name="to_email" value="<?php printf('%s',$rec_email); ?>">
                  <input id="post_id" type="hidden" name="post_id" value="<?php the_ID(); ?>">
                <div class="from-button">
                  <input id="submit" type="submit" value="submit now">

                </div>
              </form>

            <!------For POP UP---->
            <!------star success---->
                <div id="success" class="modal fade modal-singleProduct" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php if($buisness_icon){ ?>
                          <img src="<?php echo esc_url($buisness_icon); ?>" alt="" class="buisnes_icon">
                        <?php } ?>
                        <p class="starting_line"><?php esc_html_e('Your query has been successfully sent','threed'); ?><span></span></p>
                        <h2><?php echo  wp_kses(__('Thank you <br/>for your query', 'threed' ),$allowed_html) ;?></h2>
                        <p class="ending_line"><?php esc_html_e('We will get back soon','threed');?></p>
                      </div>

                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            <!------end success---->
            <!------star error---->
                <div id="error" class="modal fade modal-singleProduct" tabindex="-1" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php if($buisness_icon){ ?>
                          <img src="<?php echo esc_url($buisness_icon); ?>" alt="" class="buisnes_icon">
                        <?php } ?>
                        <p class="starting_line"><?php esc_html_e('There was a problem sending the email','threed'); ?><span></span></p>
                        <h2><?php echo  wp_kses(__('Please<br/>Try Again !!', 'threed' ),$allowed_html) ;?></h2>
                        <!-- <p class="ending_line"><?php //esc_html_e('We will Get Back To You within 1 Buisness Day','threed');?></p> -->
                      </div>
                    </div>
                  </div>
                </div>
            <!------end error---->

        <?php }
            if($form_type == 'cf7'){echo do_shortcode($cf7_shortcode);}
        ?>
        </div>
      </div>
    </section>
    <!-- Request Form Close -->
    <?php } ?>


    <?php endwhile;
else :
	echo wpautop( 'Sorry, no Products were found' );
endif;
?>

<?php get_footer();
