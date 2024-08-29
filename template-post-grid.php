<?php
/* Template Name: Post Grid Layout */
get_header();
?>

<div class="post-grid-container">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // Show all posts
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
    ?>
        <div class="post-grid-item">
            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium'); ?>
                </a>
            <?php endif; ?>
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-excerpt"><?php the_excerpt(); ?></div>
        </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
