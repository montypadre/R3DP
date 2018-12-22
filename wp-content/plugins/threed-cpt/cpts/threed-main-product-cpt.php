<?php
/*
* Creating a function to create our CPT
*/

function threed_main_product_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Main Products', 'Post Type General Name', 'threed' ),
		'singular_name'       => _x( 'Main Product', 'Post Type Singular Name', 'threed' ),
		'menu_name'           => esc_html__( 'Main Products', 'threed' ),
		'parent_item_colon'   => esc_html__( 'Parent Main Product', 'threed' ),
		'all_items'           => esc_html__( 'All Main Products', 'threed' ),
		'view_item'           => esc_html__( 'View Main Product', 'threed' ),
		'add_new_item'        => esc_html__( 'Add New Main Product', 'threed' ),
		'add_new'             => esc_html__( 'Add New', 'threed' ),
		'edit_item'           => esc_html__( 'Edit Main Product', 'threed' ),
		'update_item'         => esc_html__( 'Update Main Product', 'threed' ),
		'search_items'        => esc_html__( 'Search Main Product', 'threed' ),
		'not_found'           => esc_html__( 'Not Found', 'threed' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'threed' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => esc_html__( 'main products', 'threed' ),
		'description'         => esc_html__( 'Main Product news and reviews', 'threed' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'main_product_category' ),
			
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
		'capability_type'     => 'post',
	);
	
	
	register_post_type( 'main-product', $args );
        add_image_size( 'for_service_page', 370, 327, true );
        //Add taxonomies
        $labels = array(
		'name'              => _x( 'Categoryies', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => esc_html__( 'Search Categories' ),
		'all_items'         => esc_html__( 'All Categorys' ),
		'parent_item'       => esc_html__( 'Parent Category' ),
		'parent_item_colon' => esc_html__( 'Parent Category:' ),
		'edit_item'         => esc_html__( 'Edit Category' ),
		'update_item'       => esc_html__( 'Update Category' ),
		'add_new_item'      => esc_html__( 'Add New Category' ),
		'new_item_name'     => esc_html__( 'New Category Name' ),
		'menu_name'         => esc_html__( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'main_product_category', array( 'main-product' ), $args );

}


add_action( 'init', 'threed_main_product_post_type', 0 );


/*********************************************/
/** Main Product Meta Box **/
/*********************************************/


add_filter( 'cmb2_init', 'threed_main_product_metabox' );
function threed_main_product_metabox()
{
    
        $prefix = '_threed_';
	$cmb_main_product = new_cmb2_box( array(
		'id'            => $prefix . 'main_product_settings',
		'title'         => esc_html__( 'Main Product Settings', 'threed' ),
		'object_types'  => array('main-product'), // Post type			
	) );


//main settings
      
        $cmb_main_product->add_field( array(
                'name'    => esc_html__( 'Subtitle For Main Product', 'threed' ),
                'desc'    => esc_html__( 'This subtitle of main product  ', 'threed' ),
                'id'      => $prefix . 'main_product_subtitle',
                'type'    => 'text'
            ) );
        
        $cmb_main_product->add_field( array(
                'name'    => esc_html__( 'Show Form', 'threed' ),
                'desc'    => esc_html__( 'check "Yes" if you want to show the Form (default is "yes")', 'threed' ),
                'id'      => $prefix . 'show_form',
                'type'    => 'radio_inline',
                'default'          => 'yes',
                    'options'          => array(
                        'yes' => __( 'Yes', 'threed' ),
                        'no'   => __( 'No', 'threed' ),
                    ),
            ) );
                    $cmb_main_product->add_field( array(
                        'name'    => esc_html__( 'Form Type', 'threed' ),
                        'desc'    => esc_html__( 'Chose your Form Type (default is "inbuilt")', 'threed' ),
                        'id'      => $prefix . 'form_type',
                        'type'    => 'radio_inline',
                        'default'          => 'inbuilt',
                            'options'          => array(
                                'inbuilt' => esc_html__( 'Inbuilt', 'threed' ),
                                'cf7'   => esc_html__( 'Contact Form 7', 'threed' ),
                            ),
                     ) );
                    
                            //if inbuilt form chose
                            $cmb_main_product->add_field( array(
                                'name'    => esc_html__( 'Email To Get Response', 'threed' ),
                                'desc'    => esc_html__( 'put the Email Id where the response goes (Default:Admin Email)', 'threed' ),
                                'id'      => $prefix . 'rec_email',
                                'default' => get_option('admin_email'),
                                'type'    => 'text'
                            ) );
                            //if contact form 7 chose
                            $cmb_main_product->add_field( array(
                                'name'    => esc_html__( 'Contact Form 7 Shortcode', 'threed' ),
                                'desc'    => esc_html__( 'put the contact form 7 Shortcode Here ', 'threed' ),
                                'id'      => $prefix . 'cf7_shortcode',
                                'type'    => 'text'
                            ) );
                            
                            $cmb_main_product->add_field( array(
                                'name'    => esc_html__( 'Put or Upload file', 'threed' ),
                                'desc'    => esc_html__( 'This is downloadeble file', 'threed' ),
                                'id'      => $prefix . 'download_file',
                                'type'    => 'file'
                            ) );
                            $cmb_main_product->add_field( array(
                                'name'    => esc_html__( 'Put External Link Text', 'threed' ),
                                'desc'    => esc_html__( 'This is shows as button text', 'threed' ),
                                'id'      => $prefix . 'external_link_text',
                                'default' => esc_html__( 'View', 'threed' ),
                                'type'    => 'text'
                            ) );
                            $cmb_main_product->add_field( array(
                                'name'    => esc_html__( 'Put External link Url', 'threed' ),
                                'desc'    => esc_html__( 'This is shows in Single view page', 'threed' ),
                                'id'      => $prefix . 'external_link_url',
                                'type'    => 'text'
                            ) );


        
}
