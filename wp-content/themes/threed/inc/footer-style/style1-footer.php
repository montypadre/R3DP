<div class="footer-bot">
  <div class="container clearfix">
    <div class="col-xs-12 col-md-4 threed-widget">
      <?php
        if(threed_get_option('footer-text')!='')
        {
            $allowed_tags_before_after=array('p' => array('class'=>array(),'id'=>array()),'a'=>array('class'=>array(),'id'=>array(),'href'=>array(),'title'=>array(),'target'=>array()));
            echo wp_kses(sprintf(__('%s','threed'), threed_get_option('footer-text')),$allowed_tags_before_after);
        }
      ?>
    </div>
    <div class="col-xs-12 col-md-8">
      <?php threed_SocialIcon(); ?>
    </div>
  </div>
</div>

<div class="container clearfix">
  <div class="col-xs-12 threed-widget">
    <?php
        if (is_active_sidebar( 'footer-widget-area-1' ) )
        {
          dynamic_sidebar( 'footer-widget-area-1' );
        }
    ?>
  </div>
</div>



<div class="scrollToTop">
    <i class="fa fa-fw fa-chevron-up">
    </i>
</div>
