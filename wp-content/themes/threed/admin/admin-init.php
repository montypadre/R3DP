<?php

    // Load the embedded Redux Framework
    if ( file_exists( trailingslashit( get_template_directory() ).'admin/redux-framework/framework.php' ) ) {
        require_once trailingslashit( get_template_directory() ).'admin/redux-framework/framework.php';
    }
    // Load the theme/plugin options
    if ( file_exists(trailingslashit( get_template_directory() ).'admin/options-init.php' ) ) {
        require_once trailingslashit( get_template_directory() ) . 'admin/options-init.php';
    }
    // Load Redux extensions
    if ( file_exists( trailingslashit( get_template_directory() ).'admin/redux-extensions/extensions-init.php' ) ) 
    {
        require_once trailingslashit( get_template_directory() ).'admin/redux-extensions/extensions-init.php';
    }
