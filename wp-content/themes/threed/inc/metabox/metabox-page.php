<?php
add_action( 'cmb2_after_form', 'threed_metabox_page_scripts' , 10, 4 );
function threed_metabox_page_scripts ()
{
	    wp_enqueue_script('metabox-tab',get_stylesheet_directory_uri() . '/inc/metabox/tab.js',array( 'jquery' ));
	    wp_enqueue_style('metabox-tab',get_stylesheet_directory_uri() . '/inc/metabox/metabox.css');
}

add_action( 'cmb2_init', 'threed_page_metabox' );

add_action( 'admin_enqueue_scripts', 'setup_admin_scripts');
function setup_admin_scripts()
{
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'threed-cmb2-rgba-picker-js', get_stylesheet_directory_uri() . '/js/threed-cmb2-rgba-picker.js', array( 'wp-color-picker' ), '1.1.0', true );
}
add_action( 'cmb2_render_rgba_colorpicker','render_color_picker', 10, 5 );
function render_color_picker( $field, $field_escaped_value, $field_object_id, $field_object_type, $field_type_object )
{
    echo $field_type_object->input( array(
      'class'              => 'cmb2-colorpicker color-picker',
      'data-default-color' => $field->args( 'default' ),
      'data-alpha'         => 'true',
    ) );
}
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function threed_page_metabox() {

	if(is_admin() && isset($_GET['action']))
	{
		if($_GET['action']=='edit' && isset($_GET['post']))
		{
			if(get_option('page_for_posts')==$_GET['post'])
			{
				return;
			}
		}
	}
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_threed_page_';
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_page = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Page Options', 'threed' ),
		'object_types'  => array( 'page','post' ), // Post type
	) );



	$cmb_page->add_field( array(
	           'name' => 'Layout',
	           'id'   => 'layout',
	           'type' => 'title',
	           'before_row' => '<div id="tab-1" class="metabox-tab-container">',
	           'before_field'  => '<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Test Metabox</span><span class="toggle-indicator" aria-hidden="true"></span></button>',
	       ) );

	$cmb_page->add_field( array(
	    'name'             => 'Sidebar Position',
	    'desc'             => 'Select an option',
	    'id'               => $prefix .'sidebar_position',
	    'before_row' => '<div class="metabox-tab-content">', // start tab
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'right' => esc_html__( 'Right Position', 'threed' ),
	        'left'     => esc_html__( 'Left Position', 'threed' ),
	    ),
	) );

			$cmb_page->add_field( array(
	            'name'    => 'Hide Sidebar',
	            'id'      => $prefix .'hide_sidebar',
	            'type'    => 'checkbox',
	        ) );

			$cmb_page->add_field( array(
	            'name'    => 'Hide Title',
	            'id'      => $prefix .'hide_title',
	            'type'    => 'checkbox',

	        ) );

	        $cmb_page->add_field( array(
	            'name'    => 'Remove Top and Bottom Padding',
	            'id'      => $prefix .'remove_padding',
	            'type'    => 'checkbox',
	            'after_row' => '</div></div>', //close  tab
	        ) );


			$cmb_page->add_field( array(
	           'name' => 'Menu Options',
	           'id'   => 'header-options',
	           'type' => 'title',
	           'before_field'  => '<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Test Metabox</span><span class="toggle-indicator" aria-hidden="true"></span></button>',
	           'before_row' => '<div id="tab-2" class="metabox-tab-container">'
	       ) );

	        $cmb_page->add_field( array(
	            'name'    => 'Transparent Header',
	            'id'      => $prefix .'transparent_menu',
	            'before_row' => '<div class="metabox-tab-content">',
	            'type'    => 'checkbox',
	        ) );

          $cmb_page->add_field(array(
              'name'    => esc_html__( 'Header Background Color', 'threed' ),
              'desc'    => esc_html__( 'Only for the Transparent header', 'threed' ),
              'id'   => $prefix . 'header_bg_color',
              'type' => 'rgba_colorpicker',
              'before_row'=>'<div class="transparent-header-option border-bottom">'
          ));
          $cmb_page->add_field( array(
            'name'    => esc_html__( 'Header Font Color', 'threed' ),
            'desc'    => esc_html__( 'Set Header font color', 'threed' ),
            'id'      => $prefix . 'header_font_color',
            'type'    => 'colorpicker',

          ) );
          $cmb_page->add_field( array(
            'name'    => esc_html__( 'Sub Menu Hover Background Color', 'threed' ),
            'desc'    => esc_html__( 'background color on submenu hover', 'threed' ),
            'id'      => $prefix . 'sub_menu_hover_color',
            'type'    => 'colorpicker',

          ) );
          $cmb_page->add_field( array(
            'name'    => esc_html__( 'Sub Menu Hover Font Color', 'threed' ),
            'desc'    => esc_html__( 'font color on submenu hover', 'threed' ),
            'id'      => $prefix . 'sub_menu_font_color',
            'type'    => 'colorpicker',
            'after_row'=>'</div>'

          ) );


	        $cmb_page->add_field( array(
	            'name'    => 'Sticky Header',
	            'id'      => $prefix .'sticky_menu',
	            'type'    => 'checkbox',
	        ) );
			$cmb_page->add_field( array(
	            'name'    => 'Page Navigation menu',
	            'id'      => $prefix . 'main-menu',
	            'desc' => esc_html__( 'By Default It will show the default menu', 'threed' ),
	            'type'    => 'select',
	            'after_row' => '</div></div>', //close  tab
	            'options' => threed_get_all_menus(),
	        ) );

      $cmb_page->add_field( array(
           'name' => 'Footer Options',
           'id'   => 'footer-options',
           'type' => 'title',
           'before_field'  => '<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Test Metabox</span><span class="toggle-indicator" aria-hidden="true"></span></button>',
           'before_row' => '<div id="tab-3" class="metabox-tab-container">'
        ) );


       $cmb_page->add_field( array(
                  'name'    => 'Footer Style',
                  'id'      => $prefix .'footer_type',
                  'before_row' => '<div class="metabox-tab-content">',
                  'type'    => 'select',
                  'options'          => array(
                  0 => esc_html__( 'Default Footer', 'threed' ),
                  1 => esc_html__( 'Footer Style 1','threed' ),
                  2 => esc_html__( 'Footer Style 2','threed' ),
                  3 => esc_html__( 'No Footer','threed' ),
                ),
        ) );

        $cmb_page->add_field( array(
                  'name'    => 'Above Footer Widget Area',
                  'id'      => $prefix .'above_footer_area',
                  'type'    => 'select',
                  'options'          => array(
                  0 => esc_html__( 'No', 'threed' ),
                  1 => esc_html__( 'Yes','threed' ),
                ),
        ) );


       $cmb_page->add_field( array(
          'name'    => esc_html__( 'Footer Background Color', 'threed' ),
          'desc'    => esc_html__( 'Set footer background color', 'threed' ),
          'id'      => $prefix . 'footer_bg_color',
          'desc'    => esc_html__( 'Background Image will get priority on background color', 'threed' ),
          'type'    => 'colorpicker',
          'before_row' => '<div class="footer-bg-settings border-bottom">',

        ) );
       $cmb_page->add_field( array(
        'name'    => 'Footer Background Image',
        'id'      => $prefix . 'footer_widget_bg_image',
        'desc'    => esc_html__( 'if not set default background image will be shown from theme option panel', 'threed' ),

        'type'    => 'file',
       ) );

        $cmb_page->add_field( array(
        'name'    => esc_html__( 'Bottom Footer Background Color', 'threed' ),
        'desc'    => esc_html__( 'Set bottom footer background color', 'threed' ),
        'id'      => $prefix . 'footer_bot_bg_color',
        'after_row' => '</div></div></div>', //close  tab
        'type'    => 'colorpicker',

      ) );

}

add_action( 'cmb2_init', 'threed_main_product_download_files' );
function threed_main_product_download_files(){
    $prefix = '_threed_page_';
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_page_download_files = new_cmb2_box( array(
		'id'            => $prefix . 'download_files_metabox',
		'title'         => esc_html__( 'Main Product Download Files Option', 'threed' ),
		'object_types'  => array( 'page' ), // Post type
                'context'      => 'side',
                'priority'     => 'core',
	) );
    if(post_type_exists('main-product') )
    {
        $cmb_page_download_files->add_field(
                array(
                'name' => esc_html__( 'Choose Main Product Category', 'threed' ),
                'desc' => esc_html__( 'Choose Main Product Category', 'threed' ),
                'id'   => $prefix .'main_product_cat',
                'type' => 'multicheck',
                'options' => threed_main_product_category(),

        ) );
        $cmb_page_download_files->add_field(
                array(
                'name' => esc_html__( 'Choose Main Product To Exclude', 'threed' ),
                'desc' => esc_html__( 'This products not shows in this page', 'threed' ),
                'id'   => $prefix .'escaped_main_product',
                'type' => 'multicheck',
                'options' => threed_main_product_ids(),

        ) );
    }
    $cmb_page_download_files->add_field(
                array(
                'name' => esc_html__( 'Page Subtitle', 'threed' ),
                'desc' => esc_html__( 'This is page subtitle', 'threed' ),
                'id'   => $prefix .'download_page_subtitle',
                'type' => 'text',
    ) );

}
