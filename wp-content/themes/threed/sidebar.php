<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) 
{
	return;
}
?>
<div id="secondary" class="widget-area col-xs-12 col-md-4" role="complementary">
<?php 
  if ( class_exists( 'woocommerce' ) ) 
  {
    if (is_shop() || is_singular('product') || is_product_category() || is_checkout())
    {
        if (is_active_sidebar('woocom-sidebar'))
        {
           dynamic_sidebar('woocom-sidebar');
        }      
    }
    else
    {
      if (is_active_sidebar('sidebar-1'))
      {
        dynamic_sidebar( 'sidebar-1' );
      }
    }
	}
  else
  {  
  	if (is_active_sidebar('sidebar-1'))
  	{
  		dynamic_sidebar( 'sidebar-1' );
  	}
  }
?>

</div>

