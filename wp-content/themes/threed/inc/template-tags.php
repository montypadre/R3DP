<?php

if ( ! function_exists( 'threed_posted_on' ) ) :

function threed_posted_on()
{
	$posted_on='';
	if(threed_get_option('gn-date-checkbox')==1)
	{
		$date_format=threed_get_option('date-format-text');
		$posted_on = sprintf(
			esc_html_x( ' %s', 'post date', 'threed' ),
			esc_html( get_the_date($date_format))
		);
	}
	if($posted_on!='')
	{
		printf(__('<span class="posted-on">%s</span>','threed'),$posted_on);
	}
}
endif;

if ( ! function_exists( 'threed_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function threed_posted_by()
{
	global $post;
	$byline='';
	if(threed_get_option('gn-author-checkbox')==1)
	{
		$byline = sprintf(
			esc_html_x( '%s %s', 'post author', 'threed' ),'<div class="author-img">'.get_avatar( $post->post_author, 46 ).'</div>',
			'<div class="author-bio"><h4><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( ucwords(get_the_author()) ) . '</a></h4></div>'
		);
	}
	printf(__('%s','threed'),$byline); // WPCS: XSS OK.

}
endif;
if ( ! function_exists( 'threed_post_tags' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function threed_post_tags()
{
	if(threed_get_option('gn-tags-checkbox')==1)
	{
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'threed' ) );
		if ( $tags_list )
		{
			printf( __('<span class="blog-meta tags-links"> <i class="fa fa-tags"></i> %1$s </span>','threed'), $tags_list ); // WPCS: XSS OK.
		}
	}

}
endif;
if ( ! function_exists( 'threed_post_categories' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function threed_post_categories()
{
		$categories_list = get_the_category_list( esc_html__( ', ', 'threed' ) );
		if(threed_get_option('gn-cat-checkbox')==1)
		{
			if ( $categories_list )
			{
				printf(__('<span class="blog-meta cat-links"> <i class="fa fa-folder-open"></i> %1$s </span>','threed'), $categories_list ); // WPCS: XSS OK.
			}
		}
}
endif;
if ( ! function_exists( 'threed_post_comments' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function threed_post_comments()
{
		$postinfo_meta='<span class="blog-meta threed-comment">';
		if(comments_open())
    	{
    		$postinfo_meta .= ' <i class="fa fa-comments"></i> ';
    	}
    	if(!comments_open())
    	{
    		$postinfo_meta .= ' <i class="fa fa-ban"></i> ';
    	}
		$postinfo_meta .=threed_get_comments_popup_link( ''.esc_html__(' 0 Comment','threed'), esc_html__(' 1 Comment','threed'), ' %'.esc_html__(' Comments','threed') ) .'</span>';
		printf(__('%s','threed'),$postinfo_meta);

}
endif;
