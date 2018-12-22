<?php
if ( class_exists( 'WooCommerce' ) )
{
	function threed_woocommerce_product_categories_cmb2()
	{
		$args = array( 'taxonomy' => 'product_cat' );
		$terms = get_terms('product_cat', $args);
		$cat_arr=array();
		if (count($terms) > 0)
		{
			foreach ($terms as $term)
			{
				$cat_arr[$term->term_id]= $term->name;
			}
		}
		return $cat_arr;
	}//end of function

	add_filter( 'loop_shop_per_page', 'threed_shop_products', 20 );
	function threed_shop_products($cols)
	{
		$product_per_page=threed_get_option('opt-products-number'); //will be changed later
		return $product_per_page;
	}

	if ( class_exists( 'WooCommerce' ) )
	{
		function threed_remove_cart()
		{
			if(threed_get_option('opt-cart-off'))
			{
				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			}
		}
		add_action('wp_head','threed_remove_cart');
	}
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	add_action('woocommerce_before_main_content', 'threed_theme_wrapper_start', 10);
	function threed_theme_wrapper_start()
	{
	   $col_class="col-md-8";
	   if(threed_get_option('opt-shop-layout')==1)
	   {
	   		$col_class="col-md-12";
	   		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	   }
	   else if(threed_get_option('opt-shop-layout')==2)
	   {
	   		$col_class.=" sidebar-position-left";
	   }
	   else
	   {
	   		$col_class.=" sidebar-position-right";
	   }
	   if(threed_get_option('opt-grid-number')!=3)
	   {
	   		$grid_no=threed_get_option('opt-grid-number')+1;
	   		$col_class.=" col-shop-".$grid_no;
	   }
	   printf(__('<div id="primary" class="%1$s"><main><div id="woo-content">','threed'),$col_class);
	}
	add_filter( 'loop_shop_columns', 'threed_loop_columns' );
	if ( !function_exists('threed_loop_columns'))
	{
		function threed_loop_columns()
		{
			$grid_no=threed_get_option('opt-grid-number')+1;
			return $grid_no; // 3 products per row
		}
	}
	function threed_add_cart_menu($items,$args)
	{
			$template_dir = get_template_directory_uri();
			wp_enqueue_style( 'font-awesome', $template_dir . '/css/font-awesome.min.css', array() );

	      if(threed_get_option('opt-cart-menu')==1 && threed_get_option('opt-cart-off')==0)
	      {
  	      if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'main-menu' !== $args->menu_id )
  				{
  					return $items;
  				}
    				ob_start();
    				global $woocommerce;
  	            $items .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-cart menu-item-has-children">';
  	            $items .='<a href="'.$woocommerce->cart->get_cart_url().'">';
  	            $class_cart="display_none";
  	            if($woocommerce->cart->cart_contents_count>0)
  	            {
  	            	$class_cart="";
  	            }
  	            $items .='<span class="item-count '.$class_cart.'">'.sprintf(__('%d', 'threed'), $woocommerce->cart->cart_contents_count).'</span>';
  	            $items .='</a>';

  	            // Start of Sub Menu //
  	            $items .='<ul class="sub-menu"><li>';
  	            if($woocommerce->cart->cart_contents_count>0)
  	            {
    		        	$items .= '<a class="cart-amount" href="'.$woocommerce->cart->get_cart_url().'">'.sprintf(__('Total Amount : %s','threed'),$woocommerce->cart->get_cart_total()).'</a>';
    		        }
    		        else
    		        {
    		        	$items .= '<a class="cart-amount" href="'.$woocommerce->cart->get_cart_url().'"><span class="no-cart-item">Cart is Empty</span></a>';
    		        }
  		        $items .= '</li></ul>';
  		        //End of submenu
  		       	$items .= '</li>'; //main menu li
	      }

	    return $items;
	}
	add_filter('wp_nav_menu_items','threed_add_cart_menu',10,2);

	add_action('wp_ajax_nopriv_cartMenuTextUpdate', 'threed_cartMenuTextUpdate' );
	add_action("wp_ajax_cartMenuTextUpdate","threed_cartMenuTextUpdate");
	function threed_cartMenuTextUpdate()
	{
		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) )
		{
			return $items;
		}
		ob_start();
		global $woocommerce;
		echo sprintf(__('Total Amount : %s','threed'), $woocommerce->cart->get_cart_total());
		die();
	}
}
