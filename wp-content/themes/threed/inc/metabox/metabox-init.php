<?php 
// Load the embedded Redux Framework
if ( file_exists( trailingslashit( get_template_directory() ).'inc/metabox/metabox-page.php' ) ) 
{	
    require_once trailingslashit( get_template_directory() ).'inc/metabox/metabox-page.php';
}
if ( file_exists( trailingslashit( get_template_directory() ).'inc/metabox/metabox-post.php' ) ) 
{	
    require_once trailingslashit( get_template_directory() ).'inc/metabox/metabox-post.php';
}