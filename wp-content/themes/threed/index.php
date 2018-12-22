<?php
  get_header();
  $sidebar=threed_sidebar_settings('blog');
  $sidebar_position_class="col-md-12";
  if ($sidebar == 3)
  {
    $sidebar_position_class = 'col-md-8 is-sidebar sidebar-position-right';
  }
  if ($sidebar == 2)
  {
    $sidebar_position_class = 'col-md-8 is-sidebar sidebar-position-left';
  }

?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main <?php echo esc_attr($sidebar_position_class); ?>">
    <?php

      if ( is_home())
      {
        $blog_page_title=threed_get_option('blog-page-title');
        $blog_page_content=threed_get_option('blog-page-content');

        printf('%s',$blog_page_title);
        printf('%s',wpautop($blog_page_content));
      }
    ?>

    <?php if ( have_posts() ) : ?>

      <?php if ( is_home() && ! is_front_page() ) : ?>
        <header>
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
      <?php endif; ?>

      <?php /* Start the Loop */ ?>
      <section class="blog-area">
      <?php while ( have_posts() ) : the_post(); ?>

        <?php
          get_template_part( 'template-parts/content', get_post_format() );
        ?>
      <?php endwhile; ?>
      </section>
      <?php threed_pagination(); ?>
    <?php else : ?>

      <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->
<?php if($sidebar!=1){  get_sidebar();  } ?>
<?php get_footer(); ?>
