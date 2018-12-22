		</div> <!-- #Row -->
	</div><!-- #content -->
  <?php
    if(!is_404())
    {
       if(is_home())
        {
            if (is_active_sidebar('blog-before-footer-widget-area'))
            {
    ?>
          <div class="Advertising-footer">
            <div class="container">
              <div class="Advertising-inner">
                <?php
                        dynamic_sidebar( 'blog-before-footer-widget-area' );
                ?>
              </div>
            </div>
          </div>
    <?php
          }
      }
      $above_footer_area=get_post_meta(get_the_ID(),'_threed_page_above_footer_area',true);
      if (is_active_sidebar( 'above-footer-widget-area' ) && $above_footer_area==1 )
      {
    ?>
    	<section class="subscribe-area">
          <div class="container">
            <div class="row">
              <?php dynamic_sidebar( 'above-footer-widget-area' );    ?>
            </div>
          </div>
      </section>
    <?php
      }
      $footer_type=get_post_meta(get_the_ID(),'_threed_page_footer_type',true);
      $footer_style="footer-style-default";
      $file_name="default-footer.php";
      if($footer_type!=3)
      {
          switch ($footer_type)
          {
            default:
            case 0:
                  $file_name="default-footer";
                  $footer_style="footer-style-default";
                  break;
            case 1:
                  $file_name="style1-footer";
                  $footer_style="footer-style-1";
                break;
            case 2:
                $file_name="style2-footer";
                $footer_style="footer-style-2";
                break;
          }
          if(!is_page_template("page_templates/page-landing.php")) //not for landing template
          {
    ?>
            	<footer class="footer-area <?php echo esc_attr($footer_style); ?>">
                <?php echo get_template_part('inc/footer-style/'.$file_name)?>
              </footer>
  <?php
          }
    }
  }//if not is 404
  ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
