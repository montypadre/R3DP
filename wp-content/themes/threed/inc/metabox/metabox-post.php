<?php 

add_filter( 'cmb2_init', 'threed_gallery_post_format_meta_box' );
function threed_gallery_post_format_meta_box()
{	
	$prefix = 'threed_gallery_post_format_';
	$cmb_gallery_post = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Gallery Format Settings', 'threed' ),
		'object_types'  => array('post'), // Post type			
	) );
	$cmb_gallery_post->add_field( array(
		'name' => esc_html__( 'Upload Gallery Images', 'threed' ),
		'desc' => esc_html__( 'Upload Your Gallery Images', 'threed' ),
		'id'   => $prefix . 'gallery',
		'type' => 'file_list',
		
	) );

}
add_filter( 'cmb2_init', 'threed_video_post_format_meta_box' );
function threed_video_post_format_meta_box()
{	

	$prefix = 'threed_video_post_format_';
	$cmb_gallery_post = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Video Format Settings', 'threed' ),
		'object_types'  => array('post'), // Post type			
	) );
	$cmb_gallery_post->add_field( array(
		'name' => esc_html__( 'Upload Video', 'threed' ),
		'desc' => esc_html__( 'Upload Your video', 'threed' ),
		'id'   => $prefix . 'video',
		'type' => 'file',
		
	) );
}
