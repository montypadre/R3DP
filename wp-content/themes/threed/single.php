<?php
$args['next_text']='Newer <img src="'.get_template_directory_uri().'/images/right-arrow.png">';
$args['prev_text']='<img src="'.get_template_directory_uri().'/images/left-arrow.png"> Older';

$hide_sidebar = get_post_meta( get_the_ID() , '_threed_page_hide_sidebar',1 );
$sidebar_position = get_post_meta( get_the_ID(), '_threed_page_sidebar_position', true );
$sidebar_position_class = 'col-md-12';
if(!$hide_sidebar)
{
	if ($sidebar_position === 'right' || $sidebar_position ==='' )
	{
		 $sidebar_position_class = 'col-md-8 sidebar-position-right';
	}
	if ($sidebar_position === 'left')
	{
		$sidebar_position_class = 'col-md-8 sidebar-position-left';
	}
}

get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr($sidebar_position_class); ?>">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			<div class="custome-nav row">
			  <?php the_post_navigation($args); ?>
       		</div>
			<?php
				if(threed_get_option('gn-author-checkbox')==1)
				{
			?>
			<div class="author-box">
		        <div class="author-box-inner">
		          <div class="author-image">
		              <?php echo get_avatar( get_the_author_meta( 'user_email' ),89);  ?>
		          </div>
		          <div class="author-description">
	              <h3 class="about-author"><?php printf( __( '<a class="author_name" href="%1$s">%2$s</a>', 'threed' ),esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),get_the_author() ); ?></h3>
                <span class="threed-author-article"><?php echo count_user_posts( get_the_author_meta( 'ID' ) ); ?> <?php esc_html__('Articles','threed'); ?></span>
	              <p><?php the_author_meta( 'description' ); ?></p>
		          </div>
		        </div>
	      	</div>

			<?php
				}
				if(threed_get_option('gn-comments-checkbox')==1)
				{
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				}
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

		$hide_sidebar ?  '' :  get_sidebar();
		get_footer();

?>
