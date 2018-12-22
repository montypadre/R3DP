<?php 

function threed_widgets_init() 
{
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'threed' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Above Footer Widget', 'threed' ),
		'id'            => 'above-footer-widget-area',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="col-xs-12 col-md-6">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 1', 'threed' ),
		'id'            => 'footer-widget-area-1',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget 2', 'threed' ),
		'id'            => 'footer-widget-area-2',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name' 		=> esc_html__( 'Woocomerce Sidebar','threed'),
		'id' 		=> 'woocom-sidebar',
		'class'         => 'clearfix',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h4>',
		'after_title' 	=> '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Page Before Content Widget', 'threed' ),
		'id'            => 'blog-before-content-widget-area',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog Page Before Footer Widget', 'threed' ),
		'id'            => 'blog-before-footer-widget-area',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'threed_widgets_init' );