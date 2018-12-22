<?php
if ( defined( 'WPB_VC_VERSION' ) )
{
  //remove_filter( 'vc_font_container_get_allowed_tags');
  function threed_custom_title_container() {
    $allowed_tags = array(
      'h1',
      'h2',
      'h3',
      'h4',
      'h5',
      'h6',
      'p',
      'div',
      'span',
    );

    return $allowed_tags;

  }
  add_filter( 'vc_font_container_get_allowed_tags','threed_custom_title_container',10  );
  vc_map( array(
     "name" => esc_html__("Custom Title","threed"),
     "base" => "threed_custom_title",
     "category" => esc_html__("Threed Elements","threed"),
     "icon" =>  "vc-addon-icon",
     "params" => array(
                /*** TITLE SECTION STARTS **/
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Section Class", "threed"),
                   "param_name" => "threed_custom_section_class",
                   "group" => esc_html__( "Title Options", "threed" ),
                ),
                array(
                   "type" => "textarea",
                   "heading" => esc_html__("Title", "threed"),
                   "param_name" => "threed_custom_title_text",
                   "group" => esc_html__( "Title Options", "threed" ),
                ),
                array(
                  "type" => "font_container",
                  "param_name" => "threed_custom_title_font_container",
                  "value" => "tag:h2",
                  "settings" => array(
                    "fields" => array(
                      "tag" => "h2", // default value h2
                      "font_size",
                      "color",
                      "tag_description" => esc_html__( "Select element tag.", "threed"  ),
                      "text_align_description" => esc_html__( "Select text alignment.", "threed"  ),
                      "font_size_description" => esc_html__( "Enter font size.", "threed"  ),
                      "color_description" => esc_html__( "Select heading color.", "threed"  ),
                    ),
                  ),
                  "group" => esc_html__( "Title Options", "threed" ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Title Class", "threed"),
                   "param_name" => "threed_custom_title_class",
                   "group" => esc_html__( "Title Options", "threed" ),

                ),
                /*** TITLE SECTION ENDS **/
                /*** SUB TITLE SECTION STARTS **/
                array(
                   "type" => "textarea",
                   "heading" => esc_html__("Sub Title", "threed"),
                   "param_name" => "threed_custom_subtitle",
                   "group" => esc_html__( "Subtitle Options", "threed" ),
                ),
                array(
                  "type" => "font_container",
                  "param_name" => "threed_custom_subtitle_font_container",
                  "value" => "tag:h3",
                  "settings" => array(
                    "fields" => array(
                      "tag" => "h3", // default value h2
                      "font_size",
                      "color",
                      "tag_description" => esc_html__( "Select element tag.", "threed"  ),
                      "text_align_description" => esc_html__( "Select text alignment.", "threed"  ),
                      "font_size_description" => esc_html__( "Enter font size.", "threed"  ),
                      "color_description" => esc_html__( "Select heading color.", "threed"  ),
                    ),
                  ),
                  "group" => esc_html__( "Subtitle Options", "threed" ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Subtitle Class", "threed"),
                   "param_name" => "threed_custom_subtitle_class",
                   "group" => esc_html__( "Subtitle Options", "threed" ),

                ),

                /*** SUBTITLE SECTION ENDS **/
                /*** CONTENT SECTION STARTS **/
                array(
                   "type" => "textarea_html",
                   "heading" => esc_html__("Content", "threed"),
                   "param_name" => "threed_custom_content",
                   "description" => esc_html__("Paste content here", "threed"),
                   "group" => esc_html__( "Content", "threed" ),
                ),
                 array(
                   "type" => "textfield",
                   "heading" => esc_html__("Content Class", "threed"),
                   "param_name" => "threed_custom_content_class",
                   "group" => esc_html__( "Content", "threed" ),
                ),
                array(
                   "type" => "textfield",
                   "heading" => esc_html__("Content Limit", "threed"),
                   "param_name" => "threed_custom_content_limit",
                   "description" => esc_html__("limit in words", "threed"),
                   "group" => esc_html__( "Content", "threed" ),
                ),

                /*** CONTENT SECTION ENDS **/
                /*** IMAGE SECTION STARTS **/
                array(
                  "type" => "attach_image",
                  "heading" => esc_html__("Title Icon", "threed"),
                  "param_name" => "threed_custom_title_icon",
                  "group" => esc_html__( "Image", "threed" ),
                ),
                array(
                   "type" => "dropdown",
                   "heading" => esc_html__("Icon Alignment", "threed"),
                   "param_name" => "threed_custom_title_icon_align",
                   "value" => array( "Top","Left", "Right" ),
                   "group" => esc_html__( "Image", "threed" ),
                ),
                /*** IMAGE SECTION ENDS **/
                array(
                    "type" => "css_editor",
                    "heading" => esc_html__( "Css", "threed" ),
                    "param_name" => "threed_custom_title_style",
                    "group" => esc_html__( "Style options", "threed" ),
                ),
              )
  ) );
}
