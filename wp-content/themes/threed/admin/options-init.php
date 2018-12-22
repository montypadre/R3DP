<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "threed_theme_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'threed_theme_options',
        'footer_credit'  => 'ThreeD Option Panel',
        'use_cdn' => TRUE,
        'display_name' => '<img src="'.get_template_directory_uri().'/images/logo-64x64.png" style="top:7px;position:relative;margin-right:5px;"><br>ThreeD Options',
        'display_version' => '1.0.0',
        'page_title' => 'ThreeD Options Panel',
        'update_notice' => false,
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => 'ThreeD Options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'default_mark' => '*',
        // Options need to true for developer
        'dev_mode' => false,
        'show_options_object' => false,
        //
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'page_slug'            => 'threed_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'theme_check'=>FALSE,
        'google_api_key' => 'AIzaSyAgQXv0kI0bb8yjdbuN8QJcm4QKcXMBY4I'
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'threed' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'threed' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'threed' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'threed' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'threed' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */


    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General Settings', 'threed' ),
        'id'    => 'section-general-settings',
        'desc'  => esc_html__( 'Basic fields as subsections.', 'threed' ),
        'icon'  => 'el el-home'
    ) );




    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo & Favicon', 'threed' ),
        'id'         => 'subsection-logo-settings',
        'icon'      => 'el el-certificate',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-logo-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__('Add/Edit Logo', 'threed'),
            ),
            array(
                'id'       => 'opt-favicon-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__('Add/Edit Favicon', 'threed'),
            ),
             array(
                'id'       => 'opt-bussiness-icon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__('Add/Edit Bussiness Icon', 'threed'),
            ),
            array(
                'id'        => 'site-loader',
                'type'      => 'switch',
                'title'     => esc_html__('Site Loader', 'threed'),
                'on'       => 'Yes',
                'off'        => 'No',
                'default'   => 0
            ),
            array(
                'id'        => 'site-loader-start',
                'type'      => 'section',
                'title'     => esc_html__('Site Loader Settings', 'threed'),
                'indent'    => true,
                'required'  => array('site-loader', "=", 1),
            ),
            array(
                    'id'        => 'site-loader-bgcolor',
                    'type'      => 'color',
                    'title'     => esc_html__('Loader Background Color', 'threed'),
                    'default'  => '#000000',
                    'validate' => 'color',
                    'transparent'=>false,
            ),
            array(
                'id'       => 'site-loader-type',
                'type'     => 'button_set',
                'options' => array(
                    '1' => 'Predefined CSS Loader',
                    '2' => 'Image Loader',
                    '3' => 'Custom Loader Code'
                 ),
                'default' => 1,
            ),

            array(
                    'id'        => 'site-loader-css',
                    'type'      => 'select',
                    'title'     => esc_html__('Predefined CSS Loader', 'threed'),
                    'subtitle'  => esc_html__('All Css loader has been taken fron Spinkit', 'threed'),
                    'options'   => array(
                        '1' => 'Rotate Plane',
                        '2' =>'Single Bounce',
                        '3' => 'Double Bounce',
                        '4' => 'Rectangle',
                        '5'=>'Cube',
                        '6'=>'Cube Grid',
                        '7'=>'Cube Folding',
                        '8'=>'Scaleout',
                    ),
                    'default' => 1,
                    'required'  => array('site-loader-type', "=", '1'),
            ),
            array(
                'id'       => 'site-loader-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__('Site Loader Image', 'threed'),
                'required'  => array('site-loader-type', "=", '2'),
            ),

            array(
                'id'        => 'site-loader-custom-css',
                'type'      => 'ace_editor',
                'title'     => esc_html__('Custom CSS Code for Loader', 'threed'),
                'subtitle'  => esc_html__('Paste your CSS code here.', 'threed'),
                'mode'      => 'css',
                'theme'     => 'monokai',
                'required'  => array('site-loader-type', "=", '3'),
            ),
            array(
                'id'        => 'site-loader-custom-html',
                'type'      => 'textarea',
                'title'     => esc_html__('Custom HTML Code for Loader', 'threed'),
                'subtitle'  => esc_html__('Paste your HTML code here.', 'threed'),
                'required'  => array('site-loader-type', "=", '3'),
            ),

            array(
                'id'        => 'site-loader-end',
                'type'      => 'section',
                'indent'    => false,
                'required'  => array('site-loader', "=", 1),
            ),
        )
    ) );



    Redux::setSection( $opt_name,array(
                'icon'      => 'el el-screen',
                'title'     => esc_html__('Banner Options', 'threed'),
                'subsection'=> true,
                'fields'    => array(

                                        array(
                                            'id'        => 'home-page-banner',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Home Page banner', 'threed'),
                                            'on'       => 'Static',
                                            'off'        => 'Slider',
                                            'default'   => 1
                                        ),
                                        array(
                                            'id'        => 'home-page-start',
                                            'type'      => 'section',
                                            'title'     => esc_html__('Static Banner', 'threed'),
                                            'indent'    => true,
                                            'required'  => array('home-page-banner', "=", 1),
                                        ),
                                        array(
                                            'id'       => 'home-page-static-banner',
                                            'type'     => 'media',
                                            'url'      => true,
                                            'title'    => esc_html__('Home Page Static Banner', 'threed'),
                                        ),

                                        array(
                                            'id'        => 'home-page-end',
                                            'type'      => 'section',
                                            'indent'    => false,
                                            'required'  => array('home-page-banner', "=", 1),
                                        ),
                                        /*****************************************************/
                                        array(
                                            'id'        => 'home-slider-start',
                                            'type'      => 'section',
                                            'title'     => esc_html__('Home Page slider', 'threed'),
                                            'indent'    => true,
                                            'required'  => array('home-page-banner', "=", 0),
                                        ),
                                        array(
                                            'id'       => 'opt-header-slider-shortcode',
                                            'type'     => 'text',
                                            'title'    => esc_html__('Slider shortcode', 'threed'),
                                        ),

                                        array(
                                            'id'        => 'home-slider-end',
                                            'type'      => 'section',
                                            'indent'    => false,
                                            'required'  => array('home-page-banner', "=", 0),
                                        ),



                                    ),
            ));

            Redux::setSection( $opt_name,array(
                'icon'      => 'el el-photo',
                'title'     => esc_html__('Footer Options', 'threed'),
                'subsection'=> true,
                'fields'    => array(

                                        array(
                                            'id'       => 'footer-bg-img',
                                            'type'     => 'media',
                                            'url'      => true,
                                            'title'    => esc_html__('Footer Background Image', 'threed'),
                                        ),

                                            array(
                                                'id'        => 'footer-text',
                                                'type'      => 'ace_editor',
                                                'title'     => esc_html__('Footer Text', 'threed'),
                                                'subtitle'  => esc_html__('Paste your Footer Text here.', 'threed'),
                                                'mode'      => 'html',
                                                'theme'     => 'monokai',
                                                'default'   => '<p> &copy; <a href="#">0effortthemes</a> Developed by ITOBUZ</p>'
                                            ),

                                    ),
            ));

          Redux::setSection( $opt_name, array(
                    'title'      => esc_html__( 'Posts Options', 'threed' ),
                    'id'         => 'section-layout-settings',
                    'icon'       => 'el-icon-list',
                    'subsection'=> true,
                    'fields'     => array(
                                array(
                                    'id'        => 'gn-author-checkbox',
                                    'type'      => 'switch',
                                    'title'     => esc_html__('Author', 'threed'),
                                    'default'=> '1',
                                ),
                                array(
                                    'id'        => 'gn-cat-checkbox',
                                    'type'      => 'switch',
                                    'title'     => esc_html__('Category', 'threed'),
                                    'default'=> '1',

                                ),
                                array(
                                    'id'        => 'gn-comments-checkbox',
                                    'type'      => 'switch',
                                    'title'     => esc_html__('Comments', 'threed'),
                                    'default'=> '1',
                                ),
                                array(
                                    'id'        => 'gn-tags-checkbox',
                                    'type'      => 'switch',
                                    'title'     => esc_html__('Tags', 'threed'),
                                    'default'=> '1',
                                ),

                                array(
                                    'id'        => 'gn-date-checkbox',
                                    'type'      => 'switch',
                                    'title'     => esc_html__('Date', 'threed'),
                                    'default'=> '1',
                                ),

                                 array(
                                    'id'        => 'gn-date-start',
                                    'type'      => 'section',
                                    'title'     => esc_html__('Date Format Settings', 'threed'),
                                    'indent'    => true, // Indent all options below until the next 'section' option is set.
                                    'required'  => array('gn-date-checkbox', "=", 1),
                                ),
                                array(
                                    'id'        => 'date-format-text',
                                    'type'      => 'text',
                                    'title'     => esc_html__('Date Format', 'threed'),
                                    'desc'      => 'Please enter date format you want, to get the formats please check codex.wordpress.org/Formatting_Date_and_Time',
                                    'default'   => 'dS F, Y'
                                ),
                                array(
                                    'id'        => 'gn-date-end',
                                    'type'      => 'section',
                                    'indent'    => false, // Indent all options below until the next 'section' option is set.
                                    'required'  => array('gn-date-checkbox', "=", 1),
                                ),

                                /***********************************/

                                /************************************/

                                 array(
                                            'id'        => 'threed-share-checkbox',
                                            'type'      => 'switch',
                                            'title'     =>'Show Social Share',
                                            'default'   => 1

                                        ),
                                        array(
                                            'id'        => 'social-share-start',
                                            'type'      => 'section',
                                            'title'     => esc_html__('Social Sharing', 'threed'),
                                            'indent'    => true, // Indent all options below until the next 'section' option is set.
                                            'required'  => array('threed-share-checkbox', "=", 1),
                                        ),
                                        array(
                                            'id'        => 'social-share-text',
                                            'type'      => 'text',
                                            'title'     =>  esc_html__('Share It Text', 'threed'),
                                            'desc'      => 'Social Share Text, If not required make it blank',
                                            'default'   => 'Share It'
                                        ),

                                        array(
                                            'id'        => 'twitter-share',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Share in Twitter', 'threed'),
                                            'default'   => 1

                                        ),
                                         array(
                                            'id'        => 'fb-share',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Share in Facebook', 'threed'),
                                            'default'   => 1

                                        ),
                                          array(
                                            'id'        => 'pinterest-share',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Share in Pinterest', 'threed'),
                                            'default'   => 1

                                        ),

                                        array(
                                            'id'        => 'gp-share',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Share in Google Plus', 'threed'),
                                            'default'   => 1

                                        ),

                                        array(
                                            'id'        => 'linkedin-share',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Share in Linkedin', 'threed'),
                                            'default'   => 1

                                        ),

                                        array(
                                            'id'        => 'social-share-end',
                                            'type'      => 'section',
                                            'indent'    => false, // Indent all options below until the next 'section' option is set.
                                            'required'  => array('threed-share-checkbox', "=", 1),
                                        ),

                    /***********************************/

                    )
        ) );
         Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social Links', 'threed' ),
        'id'    => 'section-sociallinks-settings',
        'icon'  => 'el el-icon-link',
        'subsection'=> true,
        'fields'=> array(

                    /***** Social Media One Starts HERE **/

                    array(
                        'id'        => 'social-media-one-checkbox',
                        'type'      => 'switch',
                        'title'     => esc_html__('Social Media One', 'threed'),

                    ),
                    array(
                        'id'        => 'social-media-one-start',
                        'type'      => 'section',
                        'title'     => esc_html__('Social One', 'threed'),
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-one-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-one-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Social One Title', 'threed'),
                        'desc'      => esc_html__('Please enter the title for Social One', 'threed'),
                    ),
                    array(
                        'id'        => 'social-one-url',
                        'type'      => 'text',
                        'title'     => esc_html__('Social One URL', 'threed'),
                        'desc'      => esc_html__('Please enter your social one page', 'threed'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social-one-icon',
                        'type'      => 'select',
                        'title'     => esc_html__('Social Icons', 'threed'),
                        'subtitle'  => esc_html__('Selected Icon will be shown in called sections', 'threed'),
                        'options'   => array(
                            'fa-facebook' => 'Facebook',
                            'fa-google-plus' => 'Google+',
                            'fa-twitter' => 'Twitter',
                            'fa-dribbble'=>'Dribble',
                            'fa-pinterest'=>'Pinterest',
                            'fa-instagram'=>'Instagram',
                            'fa-linkedin'=>'Linkedin',
                            'fa-reddit'=>'Red IT',
                            'fa-flickr'=>'Flickr',
                            'fa-behance'=>'Behance',
                            'fa-digg'=>'Digg',
                            'fa-youtube'=>'Youtube',
                            'fa-tumblr'=>'Tumblr',
                            'fa-delicious'=>'Delicious',
                            'fa-vimeo-square'=>'Vimeo'
                        ),
                    ),
                    array(
                            'id'        => 'social-one-bgcolor',
                            'type'      => 'color',
                            'title'     => esc_html__('Social One Background Color', 'threed'),
                            'validate' => 'color',
                            'transparent'=>false,
                    ),
                    array(
                        'id'        => 'social-media-one-end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-one-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-media-two-checkbox',
                        'type'      => 'switch',
                        'title'     => esc_html__('Social Media Two', 'threed'),
                    ),
                    array(
                        'id'        => 'social-media-two-start',
                        'type'      => 'section',
                        'title'     => esc_html__('Social Two', 'threed'),
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-two-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-two-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Two Title', 'threed'),
                        'desc'      => esc_html__('Please enter the title for Social Two', 'threed'),
                    ),
                    array(
                        'id'        => 'social-two-url',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Two URL', 'threed'),
                        'desc'      => esc_html__('Please enter your social two page', 'threed'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social-two-icon',
                        'type'      => 'select',
                        'title'     => esc_html__('Social Icons', 'threed'),
                        'subtitle'  => esc_html__('Selected Icon will be shown in called sections', 'threed'),
                        'options'   => array(
                            'fa-facebook' => 'Facebook',
                            'fa-google-plus' => 'Google+',
                            'fa-twitter' => 'Twitter',
                            'fa-dribbble'=>'Dribble',
                            'fa-pinterest'=>'Pinterest',
                            'fa-instagram'=>'Instagram',
                            'fa-linkedin'=>'Linkedin',
                            'fa-reddit'=>'Red IT',
                            'fa-flickr'=>'Flickr',
                            'fa-behance'=>'Behance',
                            'fa-digg'=>'Digg',
                            'fa-youtube'=>'Youtube',
                            'fa-tumblr'=>'Tumblr',
                            'fa-delicious'=>'Delicious',
                            'fa-vimeo-square'=>'Vimeo'
                        ),
                    ),
                    array(
                            'id'        => 'social-two-bgcolor',
                            'type'      => 'color',
                            'title'     => esc_html__('Social Two Background Color', 'threed'),
                            'validate' => 'color',
                            'transparent'=>false,
                    ),
                    array(
                        'id'        => 'social-media-two-end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-two-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-media-three-checkbox',
                        'type'      => 'switch',
                        'title'     => esc_html__('Social Media Three', 'threed'),

                    ),
                    array(
                        'id'        => 'social-media-three-start',
                        'type'      => 'section',
                        'title'     => esc_html__('Social Three', 'threed'),
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-three-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-three-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Three Title', 'threed'),
                        'desc'      => esc_html__('Please enter the title for Social Three', 'threed'),
                    ),
                    array(
                        'id'        => 'social-three-url',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Three URL', 'threed'),
                        'desc'      => esc_html__('Please enter your social three page', 'threed'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social-three-icon',
                        'type'      => 'select',
                        'title'     => esc_html__('Social Icons', 'threed'),
                        'subtitle'  => esc_html__('Selected Icon will be shown in called sections', 'threed'),
                        'options'   => array(
                            'fa-facebook' => 'Facebook',
                            'fa-google-plus' => 'Google+',
                            'fa-twitter' => 'Twitter',
                            'fa-dribbble'=>'Dribble',
                            'fa-pinterest'=>'Pinterest',
                            'fa-instagram'=>'Instagram',
                            'fa-linkedin'=>'Linkedin',
                            'fa-reddit'=>'Red IT',
                            'fa-flickr'=>'Flickr',
                            'fa-behance'=>'Behance',
                            'fa-digg'=>'Digg',
                            'fa-youtube'=>'Youtube',
                            'fa-tumblr'=>'Tumblr',
                            'fa-delicious'=>'Delicious',
                            'fa-vimeo-square'=>'Vimeo'
                        ),
                    ),
                    array(
                            'id'        => 'social-three-bgcolor',
                            'type'      => 'color',
                            'title'     => esc_html__('Social Three Background Color', 'threed'),
                            'validate' => 'color',
                            'transparent'=>false,
                    ),
                    array(
                        'id'        => 'social-media-three-end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-three-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-media-four-checkbox',
                        'type'      => 'switch',
                        'title'     => esc_html__('Social Media Four', 'threed'),
                    ),
                    array(
                        'id'        => 'social-media-four-start',
                        'type'      => 'section',
                        'title'     => esc_html__('Social Four', 'threed'),
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-four-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-four-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Four Title', 'threed'),
                        'desc'      => esc_html__('Please enter the title for Social Four', 'threed'),
                    ),
                    array(
                        'id'        => 'social-four-url',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Four URL', 'threed'),
                        'desc'      => esc_html__('Please enter your social three page', 'threed'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social-four-icon',
                        'type'      => 'select',
                        'title'     => esc_html__('Social Icons', 'threed'),
                        'subtitle'  => esc_html__('Selected Icon will be shown in called sections', 'threed'),
                        'options'   => array(
                            'fa-facebook' => 'Facebook',
                            'fa-google-plus' => 'Google+',
                            'fa-twitter' => 'Twitter',
                            'fa-dribbble'=>'Dribble',
                            'fa-pinterest'=>'Pinterest',
                            'fa-instagram'=>'Instagram',
                            'fa-linkedin'=>'Linkedin',
                            'fa-reddit'=>'Red IT',
                            'fa-flickr'=>'Flickr',
                            'fa-behance'=>'Behance',
                            'fa-digg'=>'Digg',
                            'fa-youtube'=>'Youtube',
                            'fa-tumblr'=>'Tumblr',
                            'fa-delicious'=>'Delicious',
                            'fa-vimeo-square'=>'Vimeo'
                        ),
                    ),
                    array(
                            'id'        => 'social-four-bgcolor',
                            'type'      => 'color',
                            'title'     => esc_html__('Social Four Background Color', 'threed'),
                            'validate' => 'color',
                            'transparent'=>false,
                    ),
                    array(
                        'id'        => 'social-media-four-end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-four-checkbox', "=", 1),
                    ),

                    array(
                        'id'        => 'social-media-five-checkbox',
                        'type'      => 'switch',
                        'title'     => esc_html__('Social Media Five', 'threed'),
                    ),
                    array(
                        'id'        => 'social-media-five-start',
                        'type'      => 'section',
                        'title'     => esc_html__('Social Five', 'threed'),
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-five-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-five-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Five Title', 'threed'),
                        'desc'      => esc_html__('Please enter the title for Social five', 'threed'),
                    ),
                    array(
                        'id'        => 'social-five-url',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Five URL', 'threed'),
                        'desc'      => esc_html__('Please enter your social three page', 'threed'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social-five-icon',
                        'type'      => 'select',
                        'title'     => esc_html__('Social Icons', 'threed'),
                        'subtitle'  => esc_html__('Selected Icon will be shown in called sections', 'threed'),
                        'options'   => array(
                            'fa-facebook' => 'Facebook',
                            'fa-google-plus' => 'Google+',
                            'fa-twitter' => 'Twitter',
                            'fa-dribbble'=>'Dribble',
                            'fa-pinterest'=>'Pinterest',
                            'fa-instagram'=>'Instagram',
                            'fa-linkedin'=>'Linkedin',
                            'fa-reddit'=>'Red IT',
                            'fa-flickr'=>'Flickr',
                            'fa-behance'=>'Behance',
                            'fa-digg'=>'Digg',
                            'fa-youtube'=>'Youtube',
                            'fa-tumblr'=>'Tumblr',
                            'fa-delicious'=>'Delicious',
                            'fa-vimeo-square'=>'Vimeo'
                        ),
                    ),
                    array(
                            'id'        => 'social-five-bgcolor',
                            'type'      => 'color',
                            'title'     => esc_html__('Social Five Background Color', 'threed'),
                            'validate' => 'color',
                            'transparent'=>false,
                    ),
                    array(
                        'id'        => 'social-media-five-end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-five-checkbox', "=", 1),
                    ),

                    array(
                        'id'        => 'social-media-six-checkbox',
                        'type'      => 'switch',
                        'title'     => esc_html__('Social Media Six', 'threed'),
                    ),
                    array(
                        'id'        => 'social-media-six-start',
                        'type'      => 'section',
                        'title'     => esc_html__('Social Six', 'threed'),
                        'indent'    => true, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-six-checkbox', "=", 1),
                    ),
                    array(
                        'id'        => 'social-six-text',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Six Title', 'threed'),
                        'desc'      => esc_html__('Please enter the title for Social six', 'threed'),
                    ),
                    array(
                        'id'        => 'social-six-url',
                        'type'      => 'text',
                        'title'     => esc_html__('Social Six URL', 'threed'),
                        'desc'      => esc_html__('Please enter your social three page', 'threed'),
                        'validate'  => 'url',
                    ),
                    array(
                        'id'        => 'social-six-icon',
                        'type'      => 'select',
                        'title'     => esc_html__('Social Icons', 'threed'),
                        'subtitle'  => esc_html__('Selected Icon will be shown in called sections', 'threed'),
                        'options'   => array(
                            'fa-facebook' => 'Facebook',
                            'fa-google-plus' => 'Google+',
                            'fa-twitter' => 'Twitter',
                            'fa-dribbble'=>'Dribble',
                            'fa-pinterest'=>'Pinterest',
                            'fa-instagram'=>'Instagram',
                            'fa-linkedin'=>'Linkedin',
                            'fa-reddit'=>'Red IT',
                            'fa-flickr'=>'Flickr',
                            'fa-behance'=>'Behance',
                            'fa-digg'=>'Digg',
                            'fa-youtube'=>'Youtube',
                            'fa-tumblr'=>'Tumblr',
                            'fa-delicious'=>'Delicious',
                            'fa-vimeo-square'=>'Vimeo'
                        ),
                    ),
                    array(
                            'id'        => 'social-six-bgcolor',
                            'type'      => 'color',
                            'title'     => esc_html__('Social Six Background Color', 'threed'),
                            'validate' => 'color',
                            'transparent'=>false,
                    ),
                    array(
                        'id'        => 'social-media-six-end',
                        'type'      => 'section',
                        'indent'    => false, // Indent all options below until the next 'section' option is set.
                        'required'  => array('social-media-six-checkbox', "=", 1),
                    ),



            ),
    ) );

        Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page Settings', 'threed' ),
        'id'         => 'fourofour-page-settings',
        'icon'       => 'el-icon-list',
        'fields'     => array(
                                array(
                                    'id'       => 'banner-404-image',
                                    'type'     => 'media',
                                    'url'      => true,
                                    'title'    => esc_html__('Banner Image for 404', 'threed'),
                                ),
                                array(
                                    'id'               => '404-page-text',
                                    'type'             => 'editor',
                                    'title'            => esc_html__('Page Text', 'threed'),
                                    'default'          => 'sorry the page you were  <span>looking for doesnot exist</span>',
                                    'args'   => array(
                                        'media_buttons'    => false,
                                        'teeny'            => true,
                                        'textarea_rows'    => 10
                                    )
                                ),

                            )
    ) );

     Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Blog Page Settings', 'threed' ),
            'id'         => 'blog-page-settings',
            'icon'       => 'el-icon-list',
            'fields'     => array(
                                            array(
                                                'id'               => 'blog-page-title',
                                                'type'             => 'editor',
                                                'title'            => esc_html__('Blog Page Title', 'threed'),
                                                'default'   => '<h2 class="header-title-post">Latest <span>news/blog<span></h2>',
                                                'args'   => array(
                                                    'media_buttons'    => false,
                                                    'teeny'            => true,
                                                    'textarea_rows'    => 10
                                                )
                                            ),
                                            array(
                                                'id'               => 'blog-page-content',
                                                'type'             => 'editor',
                                                'title'            => esc_html__('Blog Page Content', 'threed'),
                                                'default'   => '<p>Blog Page content</p>',
                                                'args'   => array(
                                                    'media_buttons'    => false,
                                                    'teeny'            => true,
                                                    'textarea_rows'    => 10
                                                )
                                            ),
                                            array(
                                                'id'        => 'post-excerpt-length',
                                                'type'      => 'text',
                                                'title'     => esc_html__('Post Excerpt Length [ Word Limit ]', 'threed'),
                                                'desc'      => esc_html__('Excerpt length in word', 'threed'),
                                                'validate'  => 'numeric',
                                            ),
                                            array(
                                                    'id'        => 'opt-blog-layout',
                                                    'type'      => 'image_select',
                                                    'title'     => esc_html__('Blog Page Sidebar', 'threed'),
                                                    'subtitle'  => esc_html__('sidebar settings for blog details page', 'threed'),
                                                    'options'  => array(
                                                                    '1'      => array(
                                                                        'alt'   => '1 Column',
                                                                        'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                                                                    ),
                                                                    '2'      => array(
                                                                        'alt'   => '2 Column Left',
                                                                        'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                                                                    ),
                                                                    '3'      => array(
                                                                        'alt'   => '2 Column Right',
                                                                        'img'  => ReduxFramework::$_url.'assets/img/2cr.png',

                                                                    ),
                                                                ),
                                                    'default' => '3'
                                                ),


                                )
        ) );



    if ( class_exists( 'woocommerce' ) )
    {
        Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Shop Settings', 'threed' ),
            'id'         => 'section-woocommerce-settings',
            'icon'       => 'el-icon-shopping-cart-sign',
            'fields'     => array(


                                array(
                                        'id'        => 'opt-cart-menu',
                                        'type'      => 'switch',
                                        'title'     => esc_html__('Cart in Top Menu', 'threed'),
                                        'on'       => 'Yes',
                                        'off'        => 'No',
                                        'default'   =>0
                                    ),


                                array(
                                            'id'        => 'opt-cart-off',
                                            'type'      => 'switch',
                                            'title'     => esc_html__('Catalogue Mode', 'threed'),
                                            'on'       => 'Yes',
                                            'off'        => 'No',
                                            'default'   =>0
                                        ),

                                array(
                                    'id'        => 'opt-products-number',
                                    'type'      => 'text',
                                    'title'     => esc_html__('Number of products in shop page', 'threed'),
                                    'subtitle'  => esc_html__('products per page', 'threed'),
                                    'validate'  => 'no_special_chars',
                                    'default'   => '9'
                                ),
                                array(
                                            'id'        => 'opt-grid-number',
                                            'type'      => 'image_select',
                                            'title'     => esc_html__('Grid Column', 'threed'),

                                            'options'   => array(
                                                '1' => array('alt' => 'Two Column',   'title' => '2 Column',     'img' =>get_template_directory_uri() . '/images/shop-settings-images/2.png'),
                                                '2' => array('alt' => 'Three Column',   'title' => '3 Column',     'img' => get_template_directory_uri() . '/images/shop-settings-images/3.png'),
                                                '3' => array('alt' => 'Four Column', 'class'=>'col-4-shop',  'title' => '4 Column',     'img' => get_template_directory_uri() . '/images/shop-settings-images/4.png'),

                                            ),
                                            'default'   => '2'
                                ),

                                array(
                                    'id'        => 'opt-shop-layout',
                                    'type'      => 'image_select',
                                    'title'     => esc_html__('Shop Page Layout', 'threed'),
                                    'options'  => array(
                                                    '1'      => array(
                                                        'alt'   => '1 Column',
                                                        'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                                                    ),
                                                    '2'      => array(
                                                        'alt'   => '2 Column Left',
                                                        'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                                                    ),
                                                    '3'      => array(
                                                        'alt'   => '2 Column Right',
                                                        'img'  => ReduxFramework::$_url.'assets/img/2cr.png',

                                                    ),
                                                ),
                                    'default' => '3'
                                ),

             )
        ) );
    }




    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Styling Option', 'threed' ),
        'id'         => 'section-styling-settings',
        'icon'       => 'el-icon-fontsize',
        'fields'     => array(

                array(
                        'id'            => 'opt-typography-h1',
                        'type'          => 'typography',
                        'title'         => esc_html__('H1 Font, size and color', 'threed'),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        //'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        'line-height'   => false,
                        //'color'=>true,
                        'text-align'=>false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h2.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler'      => array('h2.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Typography option with each property can be called individually.', 'threed'),

                ),


                  array(
                        'id'            => 'opt-typography-h2',
                        'type'          => 'typography',
                        'title'         => esc_html__('H2 Font, size and color', 'threed'),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        //'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        'line-height'   => false,
                        'text-align'=>false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h2'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler'      => array('h2'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Typography option with each property can be called individually.', 'threed'),

                ),

                 array(
                        'id'            => 'opt-typography-h3',
                        'type'          => 'typography',
                        'title'         => esc_html__('H3 Font, size and color', 'threed'),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        //'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        'line-height'   => false,
                        'text-align'=>false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h3.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler'      => array('h3.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Typography option with each property can be called individually.', 'threed'),

                ),

                 array(
                        'id'            => 'opt-typography-h4',
                        'type'          => 'typography',
                        'title'         => esc_html__('H4 Font, size and color', 'threed'),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        //'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        'line-height'   => false,
                        'text-align'=>false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h4.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler'      => array('h4.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Typography option with each property can be called individually.', 'threed'),

                ),

                 array(
                        'id'            => 'opt-typography-h5',
                        'type'          => 'typography',
                        'title'         => esc_html__('H5 Font, size and color', 'threed'),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        //'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        'line-height'   => false,
                        'text-align'=>false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h5.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler'      => array('h5.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Typography option with each property can be called individually.', 'threed'),

                ),
                 array(
                        'id'            => 'opt-typography-h6',
                        'type'          => 'typography',
                        'title'         => esc_html__('H6 Font, size and color', 'threed'),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        'google'        => true,    // Disable google fonts. Won't work if you haven't defined your google api key
                        //'font-backup'   => true,    // Select a backup non-google font in addition to a google font
                        'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        'line-height'   => false,
                        'text-align'=>false,
                        'all_styles'    => true,    // Enable all Google Font style/weight variations to be added to the page
                        'output'        => array('h6.site-description, .entry-title'), // An array of CSS selectors to apply this font style to dynamically
                        'compiler'      => array('h6.site-description-compiler'), // An array of CSS selectors to apply this font style to dynamically
                        'units'         => 'px', // Defaults to px
                        'subtitle'      => esc_html__('Typography option with each property can be called individually.', 'threed'),

                ),
        )
    ) );



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Codes', 'threed' ),
        'id'         => 'section-customcode-settings',
        'icon'       => 'el-icon-tag',
        'fields'     => array(

             array(
                'id'        => 'opt-ace-editor-css',
                'type'      => 'ace_editor',
                'title'     => esc_html__('CSS Code', 'threed'),
                'subtitle'  => esc_html__('Paste your CSS code here.', 'threed'),
                'mode'      => 'css',
                'theme'     => 'monokai',
                'default'   => "#header{\nmargin: 0 auto;\n}"
            ),

            array(
                'id' => 'opt-ace-editor-js',
                'type' => 'ace_editor',
                'title' => esc_html__('Javascript Code', 'threed'),
                'subtitle' => esc_html__('Paste your Javascript code here.', 'threed'),
                'mode' => 'javascript',
                'theme' => 'monokai',
                'default' => ""
            )
        )
    ) );

    /*
     * <--- END SECTIONS
     */
