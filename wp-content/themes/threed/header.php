<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php
		threed_get_favicon();
		wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div class="threed-loading"></div>
<div id="page" class="hfeed site">
	<?php
		if(!is_404())
		{
			$site_loader=0;
			$loader_image='';
			$loader_image_url='';
			if(threed_get_option('site-loader')==1)
			{
				printf(__('%s','threed'),threed_site_loader());
			}
        if(!is_page_template("page_templates/page-landing.php")) //not for landing template
        {
	?>
        	<header class="header_area <?php echo esc_attr(threed_menu_class()); ?>">
              <!-- Menu Open -->
        	      <div class="top_header">
        		        <div class="container">
        		          <div class="row threed-header-area">
        		            <div class="col-xs-6 col-md-2 logo_area">
        		              	<a href="<?php echo site_url('/'); ?>">
        		              		<?php
                									$logo_image=threed_get_option('opt-logo-image');
                									$logo_url=get_template_directory_uri().'/images/logo.png';
                									if(!empty($logo_image['url']))
                									{
                										$logo_url=$logo_image['url'];
                									}
                							?>
        							        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo get_bloginfo('name'); ?>">
        		              	</a>
        		            </div>

        		            <div class="col-xs-6 col-md-10 threed-menu-wrap-area">
        		              <nav class="menu_area  clearfix">

        		                    <!-- Brand and toggle get grouped for better mobile display -->
        		                    <div class="navbars-header">
                                    <div class="hamburger hamburger--3dx-r" tabindex="0"
                                         aria-label="Menu" role="button" >
                                      <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                      </div>
                                    </div>
        		                    </div>

        		                    <!-- Collect the nav links, forms, and other content for toggling -->
        		                    <div class="navbar-wrapper" >
        		                     	<?php threed_menu_navigation();	?>
        		                    </div>

        		              </nav>
        		            </div>

        		          </div>
        		        </div>
        	      </div>
              <!-- Header Close -->

              <!-- Banner Open -->
            <?php
            	echo threed_banner_content();
            ?>
          </header>
  <?php
        }
    	}//end of if not 404
    	if(is_home())
	    {
	        if (is_active_sidebar('blog-before-content-widget-area'))
	        {
	?>
	             <div class="Advertising-header">
	              <div class="container">
	                <div class="Advertising-inner">
	                  <?php  dynamic_sidebar( 'blog-before-content-widget-area' ); ?>
	                </div>
	              </div>
	            </div>
	<?php
	        }
	    }

            $content_class="site-content";
            if(get_post_meta(get_the_ID(),'_threed_page_remove_padding',true))
            {
            	$content_class="no-site-content";
            }
	?>
  <!-- Header Close -->
	<div id="content" class="<?php echo esc_attr($content_class); ?> container">
		<div class="row">
