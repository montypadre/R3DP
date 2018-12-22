<?php
function threed_demo_menus($items,$args)
{
  $menu_class='';
  $page_url=get_permalink();

  if($args->menu_id=='main-menu')
  {
        $items.='<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-demo">
          <a>'.esc_html__('DEMOS','threed').'</a>
          <ul class="sub-menu demo-submenu">';

          if(basename($page_url)=='threed-businessthemes')
          {
              $menu_class='active-demo-menu';
          }

            $items.='<li id="menu-item-demo-1" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-demo-1 '.esc_attr($menu_class).'">
              <div class="menu-wrapper-demo">
                <a href="'.get_home_url().'">
                <img src="'.get_template_directory_uri().'/images/demo-images/demo-1.jpg" width="322" height="162" alt="demo-image-1">
                <span>'.esc_html__('Single Bussiness','threed').'</span>
                </a>
              </div>
            </li>';
          $menu_class='';
          if(basename($page_url)=='creative-agency-home')
          {
              $menu_class='active-demo-menu';
          }

            $items.='<li id="menu-item-demo-2" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-demo-2 '.esc_attr($menu_class).'">
              <div class="menu-wrapper-demo">
              <a href="'.get_home_url().'/creative-agency-home/">
                <img src="'.get_template_directory_uri().'/images/demo-images/demo-2.jpg" width="322" height="162" alt="demo-image-2">
                <span>'.esc_html__('Creative Agency','threed').'</span>
              </a>
              </div>
            </li>';

          $menu_class='';
          if(basename($page_url)=='architect-home')
          {
              $menu_class='active-demo-menu';
          }

            $items.='<li id="menu-item-demo-3" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-demo-3 '.esc_attr($menu_class).'">
              <div class="menu-wrapper-demo">
                <a href="'.get_home_url().'/architect-home/">
                <img src="'.get_template_directory_uri().'/images/demo-images/demo-3.jpg" width="322" height="162" alt="demo-image-3">
                <span>'.esc_html__('Architecture','threed').'</span>
                </a>
              </div>
            </li>';
          $items.='</ul>
        </li>';
    }
    return $items;

}
add_filter('wp_nav_menu_items','threed_demo_menus',10,2);
