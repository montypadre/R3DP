<?php

    /*
    Template Name: Landing Page
    */
    get_header();
?>
    <div id="primary" class="content-area col-md-12">
        <main id="main" class="site-main">
            <?php while ( have_posts() ) : the_post();  ?>
                <?php the_content(); ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>
