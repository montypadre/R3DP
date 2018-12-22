<?php

/*
* SERVICE POST TYPE
*/

function threed_service_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'threed' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'threed' ),
		'menu_name'           => esc_html__( 'Services', 'threed' ),
		'parent_item_colon'   => esc_html__( 'Parent Service', 'threed' ),
		'all_items'           => esc_html__( 'All Services', 'threed' ),
		'view_item'           => esc_html__( 'View Service', 'threed' ),
		'add_new_item'        => esc_html__( 'Add New Service', 'threed' ),
		'add_new'             => esc_html__( 'Add New', 'threed' ),
		'edit_item'           => esc_html__( 'Edit Service', 'threed' ),
		'update_item'         => esc_html__( 'Update Service', 'threed' ),
		'search_items'        => esc_html__( 'Search Service', 'threed' ),
		'not_found'           => esc_html__( 'Not Found', 'threed' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'threed' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => esc_html__( 'services', 'threed' ),
		'description'         => esc_html__( 'Service news and reviews', 'threed' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'service', $args );

}

add_action( 'init', 'threed_service_post_type', 0 );


//CMB fieds for SERVICE post type

add_filter( 'cmb2_init', 'threed_service_common_field' );
function threed_service_common_field()
{	

	$prefix = '_threed_';
	$cmb_service = new_cmb2_box( array(
		'id'            => $prefix . 'service_metabox',
		'title'         => esc_html__( 'Service Settings', 'threed' ),
		'object_types'  => array('service'), // Post type			
	) );
        $cmb_service->add_field( array(
                'name'    => esc_html__( 'Single Service Title ', 'threed' ),
                'desc'    => esc_html__( 'This title shows in Single service page', 'threed' ),
                'id'      => $prefix . 'single_service_title',
                'type'    => 'textarea_small',
            ) );
        $cmb_service->add_field( array(
                'name'    => esc_html__( 'Service Page Subtile ', 'threed' ),
                'desc'    => esc_html__( 'This is service page subtitle, this shows under main title', 'threed' ),
                'default' => esc_html__( 'Service Subtile Here', 'threed' ),
                'id'      => $prefix . 'service_subtile',
                'type'    => 'textarea_small'
            ) );
        
        $cmb_service->add_field( array(
                'name'             => esc_html__('Service icon Type','threed'),
                'desc'             => esc_html__('chose Service Icon Type You Want to show','threed'),
                'id'               => $prefix . 'service_icon_type',
                'type'             => 'select',
                'options'          => array(
                    'image' => esc_html__('Uploaded Image', 'threed' ),
                    'fontawesome'   =>esc_html__('fontawesome', 'threed' ),
                ),
            ) );
        
        $cmb_service->add_field( array(
                'name'    => esc_html__( 'Service Icon Image', 'threed' ),
                'desc'    => esc_html__( 'This icon shows in another service page', 'threed' ),
                'id'      => $prefix . 'service_icon',
                'type'    => 'file',
                'before_row'   => '<div class="service_upload_image" style="display:none;">',
                'after_row'    => '</div>',

            ) );
        
       
        $cmb_service->add_field( array(
                'name'    => esc_html__( 'Service Icon FontAwesome', 'threed' ),
                'desc'    => esc_html__( 'This icon shows in another service page', 'threed' ),
                'id'      => $prefix . 'another_service_icon',
                'type'    => 'fontawesome_icon',
                'before_row'   => '<div class="service_font_icon" style="display:none;">',
                'after_row'    => '</div>',
            ) );
        
        
        //For SERVICE layout settings
	$cmb_service->add_field( array(
		'name' => esc_html__( 'Choose Layout', 'threed' ),
		'desc' => esc_html__( 'Choose Service Page Layout', 'threed' ),
		'id'   => $prefix . 'service_layout',
		'type' => 'radio_inline',
                'options' => array(
                    'layout-1' => esc_html__( 'Layout 1 (archive main product)', 'threed' ),
                    'layout-2'   => esc_html__( 'Layout 2 (archive woocommerce product)', 'threed' ),
                    'layout-3'     => esc_html__( 'Layout 3 ( content)', 'threed' ),
                ),
                'default' => 'layout-3',
		
	) );
        //Depends On Service Layout
                
        
                        $cmb_service->add_field( array(
                        'name' => esc_html__( 'Title For Layout', 'threed' ),
                        'desc' => esc_html__( 'this title shows as laeyout title', 'threed' ),
                        'id'   => $prefix . 'layout_title',
                        'type' => 'text',                    
                        ) );
                        
                        $cmb_service->add_field( array(
                        'name' => esc_html__( 'Subtitle For Layout', 'threed' ),
                        'desc' => esc_html__( 'this Subtitle shows as laeyout title', 'threed' ),
                        'id'   => $prefix . 'layout_subtitle',
                        'type' => 'text',                    
                        ) );
                        
                        //For MAIN PRODUCT
                        if(post_type_exists('main-product') )
                        {
                            $cmb_service->add_field(
                                    array(
                                    'name' => esc_html__( 'Chose Main Product Category', 'cmb2' ),
                                    'desc' => esc_html__( 'Chose Main Product Category', 'cmb2' ),
                                    'id'   => $prefix .'main_product_cat',		
                                    'type' => 'multicheck',
                                    'options' => threed_main_product_category(),

                            ) ); 
                        }
                        
                        //For WOOCOMMERCE PRODUCT
                        
                        
                        if ( class_exists( 'WooCommerce' ) ) 
                        {

                            $cmb_service->add_field(
                                    array(
                                    'name' => esc_html__( 'Chose Woocommerce Product Category', 'cmb2' ),
                                    'desc' => esc_html__( 'Chose Woocommerce Product Category which you want to show this page', 'cmb2' ),
                                    'id'   => $prefix .'woo_product_cat',		
                                    'type' => 'multicheck',
                                    'options' => threed_woocommerce_product_categories_cmb2(),

                            ) ); 
                        }
                        
     
                        
                        

}

add_filter( 'cmb2_init', 'threed_service_for_vc_element' );
function threed_service_for_vc_element()
{
    $prefix = '_threed_';
	$cmb_service_vc = new_cmb2_box( array(
		'id'            => $prefix . 'service_vc_metabox',
		'title'         => esc_html__( 'Service Visual Composer Settings', 'threed' ),
		'object_types'  => array('service'), // Post type			
	) );

        $cmb_service_vc->add_field( array(
        'name' => esc_html__( 'Choose Layout', 'threed' ),
        'desc' => esc_html__( 'Select Service Element Image options', 'threed' ),
        'id'   => $prefix . 'service_vc_image',
        'type' => 'radio_inline',
                'options' => array(
                    'static-image' => esc_html__( 'Static Image', 'threed' ),
                    'slider'   => esc_html__( 'Slider Shortcode', 'threed' ),                   
                ),
                'default' => 'static-image',
        
        ) );
        //For Vc element use
        $cmb_service_vc->add_field( array(
                'name'    => esc_html__( 'Featured Image For Visual Composer Element', 'threed' ),
                'desc'    => esc_html__( 'This image used for Visual Composer Element layout 1 and/or Layout 2', 'threed' ),
                'id'      => $prefix . 'service_vc_featured_image',
                'type'    => 'file'
        ) );
         $cmb_service_vc->add_field( array(
                'name'    => esc_html__( 'Slider Shortcode', 'threed' ),
                'desc'    => esc_html__( 'Slider will appear only on layout 1 of VC Elements', 'threed' ),
                'id'      => $prefix . 'service_vc_slider',
                'type'    => 'text'
        ) );
        $cmb_service_vc->add_field( array(
                'name'    => esc_html__( 'Service Background', 'threed' ),
                'desc'    => esc_html__( 'This image shoes as backgorund in visual composer element layout 3', 'threed' ),
                'id'      => $prefix . 'service_vc_background_image',
                'type'    => 'file'
            ) );
}


add_filter( 'cmb2_init', 'threed_service_for_other_service_page' );
function threed_service_for_other_service_page()
{
    
        $prefix = '_threed_';
	$cmb_other_service = new_cmb2_box( array(
		'id'            => $prefix . 'for_other_service_page_metabox',
		'title'         => esc_html__( 'For Other Service Page Settings', 'threed' ),
		'object_types'  => array('service'), // Post type			
	) );


//For another service page settings
        $cmb_other_service->add_field( array(
                'name'    => esc_html__( 'Subtitle For Other Service', 'threed' ),
                'desc'    => esc_html__( 'This subtitle of other service section  ', 'threed' ),
                'id'      => $prefix . 'other_service_section_subtitle',
                'type'    => 'text'
            ) );
        
        $cmb_other_service->add_field( array(
                'name'    => esc_html__( 'Tag Line', 'threed' ),
                'desc'    => esc_html__( 'This Tagline Show In another service page  ', 'threed' ),
                'id'      => $prefix . 'tag_line_other_service',
                'type'    => 'textarea'
            ) );
        
        $cmb_other_service->add_field( array(
                'name'    => esc_html__( 'Service Background', 'threed' ),
                'desc'    => esc_html__( 'This image shoes as backgorund in another service page', 'threed' ),
                'id'      => $prefix . 'other_service_background',
                'type'    => 'file'
            ) );
        
        
        //choose which services shown in this current service
        
         $cmb_other_service->add_field(
                                    array(
                                    'name' => esc_html__( 'Choose Services', 'cmb2' ),
                                    'desc' => esc_html__( 'Chose services which you want to show as other services', 'cmb2' ),
                                    'id'   => $prefix .'other_services',		
                                    'type' => 'multicheck',
                                    'options' => threed_other_service_ids(),

                            ) ); 
        
        
}

