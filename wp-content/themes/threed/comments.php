<?php
if ( post_password_required() ) {
	return;
}
$comments_by_type = separate_comments($comments); 
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'threed' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'threed' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'threed' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'threed' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<?php if ( ! empty($comments_by_type['comment']) ) : ?>
			<ul class="list-comments clearfix">
				<?php wp_list_comments( array('type'=>'comment','callback'=>'threed_custom_comments_template') ); ?>
			</ul>
		<?php endif; ?>
		<?php if ( ! empty($comments_by_type['pings']) ) : ?>
			<div id="trackbacks">
				<h3 id="trackbacks-title"><?php esc_html_e('Trackbacks/Pingbacks','threed') ?></h3>
				<ol class="pinglist">
					<?php wp_list_comments('type=pings&callback=threed_list_pings'); ?>
				</ol>
			</div>
		<?php endif; ?>
			
	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'threed' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array(			  		 
			  	'fields' => array(
					'author'=>'<p class="comment-form-author"><input placeholder="'.sprintf(esc_html__('Enter Your Name*','threed')).'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" '.( $req ? ' aria-required="true"' : '' ).' /></p>',
					'email'=>'<p class="comment-form-email"><input placeholder="'.sprintf(esc_html__('Enter Your Email*','threed')).'" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" '.( $req ? ' aria-required="true"' : '' ).' /></p>',
					'url' =>'<p class="comment-form-url"><input placeholder="'.sprintf(esc_html__('Enter site URL here','threed')).'" id="url" name="url" type="text" value="'. esc_attr( $commenter['comment_author_url'] ).'" size="30" /></p>',			  	),

		  	  	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" cols="45" rows="8" placeholder="'.sprintf(esc_html__('Comments*','threed')).'"></textarea></p>',
			)); ?>

</div><!-- #comments -->
