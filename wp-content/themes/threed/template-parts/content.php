<article <?php post_class('blog-wrapper'); ?> id="post-<?php the_ID(); ?>" >
  <div class="entry-content row">
    <div class="blog-list clearfix">
    <?php
      $blog_content_class = 'no-image';
      if (has_post_thumbnail()) {
        $blog_content_class = '';
      ?>
        <div class="blog-image">
          <div class="blog-image-inner">
            <?php the_post_thumbnail('threed_blog_list_image'); ?>
          </div>
        </div>
      <?php } ?>
      <div class="blog-content-wrapper <?php echo esc_attr($blog_content_class); ?>">
        <div class="blog-content clearfix">
          <div class="above-title-section row">
            <h3 class="post-date"><?php threed_posted_on(); ?></h3>
          </div>
          <?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

          <div class="entry-content">
            <div class="excerpt">
            <?php
              $excerpt_word_limit = 20;
              $post_excerpt_length = 10;
              if (is_home()) {
                $post_excerpt_length = threed_get_option('post-excerpt-length');
                if (!empty($post_excerpt_length)) {
                  $excerpt_word_limit = $post_excerpt_length;
                }
              }
              printf(__('%s','threed'),threed_get_excerpt($excerpt_word_limit));
            ?>
            </div>
            <div class="author-row">
              <div class="about-author">

              </div>
            </div>
          </div>
        </div>
      </div>
      <div >
        <div class="col-xs-12 col-md-9">
          <div class="below-title-section">

            <?php
              // Author
              if(threed_get_option('gn-author-checkbox')==1) {
                $byline = sprintf(
                  esc_html_x( '%s', 'author', 'threed' ),
                  '<span class="blog-meta threed-author">
                    <i class="fa fa-user"></i>
                    <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( ucwords(get_the_author()) ) . '</a></span>'
                );

                printf(__('%s','threed'),$byline); // WPCS: XSS OK.
              }

              // Post Tags
              threed_post_tags();

              // Post Categories
              threed_post_categories();

              // Post Comments
              threed_post_comments();
            ?>
          </div>
        </div>
        <div class="col-xs-12 col-md-3">
          <div class="readmore-btn">
            <a href="<?php echo get_permalink(); ?>" class="button-medium button-medium--red"><?php esc_html_e('Read More', 'threed'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div><!-- .entry-content -->
</article><!-- #post-## -->
