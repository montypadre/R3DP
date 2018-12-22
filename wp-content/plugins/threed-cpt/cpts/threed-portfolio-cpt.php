<?php
/*
* THREED PORTFOLIO POST TYPE
*/
function threed_portfolio_post_type() {

	// Set UI labels for Custom Post Type
	$labels = array(
		'name' 					=> _x( 'Portfolios', 'post type general name', 'threed' ),
		'singular_name' 		=> _x( 'Portfolio', 'post type singular name', 'threed' ),
		'add_new'				=> _x( 'Add New', 'portfolio item', 'threed' ),
		'add_new_item'			=> esc_html__( 'Add Portfolio', 'threed' ),
		'edit_item' 			=> esc_html__( 'Edit Portfolio', 'threed' ),
		'new_item' 				=> esc_html__( 'New Portfolio', 'threed' ),
		'all_items' 			=> esc_html__( 'All Portfolios', 'threed' ),
		'view_item' 			=> esc_html__( 'View Portfolios', 'threed' ),
		'search_items' 			=> esc_html__( 'Search Portfolios', 'threed' ),
		'not_found' 			=> esc_html__( 'No portfolio found', 'threed' ),
		'not_found_in_trash' 	=> esc_html__( 'No Portfolio found in Trash', 'threed' ),
		'parent_item_colon' 	=> ''
	);

	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'rewrite' 				=> apply_filters( 'threed_portfolio_posttype_rewrite_args', array( 'slug' => 'portfolio', 'with_front' => false ) ),
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'menu_position' 		=> null,
		'exclude_from_search'	=> true,		
		'supports' 				=> array( 'title', 'editor','thumbnail' )
	);

	register_post_type( 'portfolio' , $args );
	flush_rewrite_rules();
}
add_action( 'init', 'threed_portfolio_post_type', 0 );

add_action( 'cmb2_init', 'threed_portfolio_metabox' );
function threed_portfolio_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_threed_portfolio_';
	$cmb_portfolio = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Project Details', 'threed' ),
		'object_types'  => array( 'portfolio' ), // Post type		
	) );	
	
	$cmb_portfolio->add_field( array(
		'name' => esc_html__( 'Project Screenshots', 'threed' ),
		'desc' => esc_html__( 'Upload project related screenshots', 'threed' ),
		'id'   => $prefix . 'screenshots',
		'type' => 'file_list',			
	) );

	$cmb_portfolio->add_field( array(
        'name'             => esc_html__('Masonry Image Size ','threed'),
        'desc'             => esc_html__('Vc elements use only','threed'),
        'id'               => $prefix . 'vc_masonry_image_size',
        'type'             => 'select',
        'options'          => array(
            'threed_portfolio_image_size_1' => esc_html__('Portfolio Masonry Size (370X455)', 'threed' ),
            'threed_portfolio_image_size_2' => esc_html__('Portfolio Masonry Size (370X334)', 'threed' ),
            'threed_portfolio_image_size_3' => esc_html__('Portfolio Masonry Size (370X576)', 'threed' ),
        ),
    ) );
}

