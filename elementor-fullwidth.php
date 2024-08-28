<?php
/* Template Name: Elementor Fullwidth */

get_header(); ?>

<div class="elementor-fullwidth">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>

<?php get_footer();
