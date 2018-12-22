<?php

get_header();

// Grab the metadata from the database
$prefix = '_threed_page_';
$hide_sidebar = get_post_meta( get_the_ID(), $prefix . 'hide_sidebar', true );
$primary_grid_class =  $hide_sidebar ? 'col-md-12' :  'col-md-8';
$sidebar_position = get_post_meta( get_the_ID(), $prefix . 'sidebar_position', true );
$sidebar_position_class = '';
if(!$hide_sidebar)
{
	if ($sidebar_position === 'right' || $sidebar_position ==='' ) { $sidebar_position_class = 'sidebar-position-right'; }
	if ($sidebar_position === 'left') { $sidebar_position_class = 'sidebar-position-left'; }

}
$is_cart=0;
if ( class_exists( 'woocommerce' ) )
{
  if(is_cart() || is_checkout())
  {
    $is_cart=1;
    $sidebar_position_class = '';
    $primary_grid_class = 'col-md-12 col-xs-12';
  }
}

$page_metas=get_post_meta(get_the_ID());
?>

	<div id="primary" class="content-area <?php echo esc_attr($primary_grid_class); ?> <?php echo esc_attr($sidebar_position_class); ?>">

		<main id="main" class="site-main">

			<?php

				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
      if(!$is_cart)
      {
          $hide_sidebar ?  '' :  get_sidebar();
      }
  ?>
<?php get_footer(); ?>
