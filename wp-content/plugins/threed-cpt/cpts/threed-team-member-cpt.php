<?php
/*
* TEAM MEMBER POST TYPE
*/

function threed_team_member_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Team Members', 'Post Type General Name', 'threed' ),
		'singular_name'       => _x( 'Team Member', 'Post Type Singular Name', 'threed' ),
		'menu_name'           => esc_html__( 'Team Members', 'threed' ),
		'parent_item_colon'   => esc_html__( 'Parent Team Member', 'threed' ),
		'all_items'           => esc_html__( 'All Team Members', 'threed' ),
		'view_item'           => esc_html__( 'View Team Member', 'threed' ),
		'add_new_item'        => esc_html__( 'Add New Team Member', 'threed' ),
		'add_new'             => esc_html__( 'Add New', 'threed' ),
		'edit_item'           => esc_html__( 'Edit Team Member', 'threed' ),
		'update_item'         => esc_html__( 'Update Team Member', 'threed' ),
		'search_items'        => esc_html__( 'Search Team Member', 'threed' ),
		'not_found'           => esc_html__( 'Not Found', 'threed' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'threed' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => esc_html__( 'team members', 'threed' ),
		'description'         => esc_html__( 'Team Member news and reviews', 'threed' ),
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
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'team-member', $args );

}


add_action( 'init', 'threed_team_member_post_type', 0 );

add_action( 'cmb2_init', 'threed_team_metabox' );
function threed_team_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_threed_team_';
	$cmb_team = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Team Member Settings', 'threed' ),
		'object_types'  => array( 'team-member' ), // Post type		
	) );	

	$cmb_team->add_field( array(
		'name' => esc_html__( 'Designation', 'threed' ),
		'desc' => esc_html__( 'designation of commentors', 'threed' ),
		'id'   => $prefix . 'designation',
		'type' => 'text',			
	) );
}
