<?php
/**
 * The template for displaying all pages
 *
 * @package ittech
 */

get_header(); ?>

<div id="content" class="site-content">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>
    </div>
</div>

<?php get_footer(); ?>
