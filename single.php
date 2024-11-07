<?php get_header(); ?>

<div class="blog-container">
    <div class="content">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <h1 class="post-title"><?php the_title(); ?></h1>
            
            <div class="post-date">
                <p class="postdate">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo get_the_date(); ?>
                </p>
            </div>
            
              <div class="post-categories">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $category ) {
                            $category_link = get_category_link( $category->term_id );
                            echo '<a href="' . esc_url( $category_link ) . '" class="category-badge">' . esc_html( $category->name ) . '</a>';
                        }
                    }
                    ?>
            </div>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            
            <div class="post-content">
                <?php the_content(); ?>
            </div>
            
        </article>
    </div>

<!-- Sidebar -->
<?php
$selected_sidebar = get_post_meta( get_the_ID(), '_ittech_sidebar', true ); // Get the selected sidebar

// Check if a sidebar is selected and it is not set to 'none'
if ( !empty( $selected_sidebar ) && $selected_sidebar != 'none' && is_active_sidebar( $selected_sidebar ) ) : ?>
    <div class="sidebar sidebar-widget blog-sidebar">
        <?php dynamic_sidebar( $selected_sidebar ); // Display the selected sidebar ?>
    </div>
<?php endif; ?>


</div>
<div class="bottom-sidebar">
<?php
        $selected_sidebar_bottom = isset( $selected_sidebar_bottom ) ? $selected_sidebar_bottom : 'custom-bottom-ads'; 


// Check if a sidebar is selected and it is not set to 'none'
if ( !empty( $selected_sidebar_bottom ) && $selected_sidebar_bottom != 'none' && is_active_sidebar( $selected_sidebar_bottom ) ) : ?>
    <div class="bottom-sidebar-append">
        <?php dynamic_sidebar( $selected_sidebar_bottom ); // Display the selected sidebar ?>
    </div>
<?php endif; ?>
</div>


<div class="blog-container-post">
    <div class="recent-posts-navigation">
        <div class="previous-post">
            <h3>Previous</h3>
            <?php
            $prev_post = get_previous_post();
            if ( !empty( $prev_post ) ) {
                $prev_title = get_the_title( $prev_post->ID );
                $prev_title_truncated = truncate_text( $prev_title );
                previous_post_link( '%link', '<i class="fa fa-chevron-left" aria-hidden="true"></i> ' . $prev_title_truncated );
            } else {
                echo '<p>No previous post</p>';
            }
            ?>
        </div>
        <div class="next-post">
            <h3>Next</h3>
            <?php
            $next_post = get_next_post();
            if ( !empty( $next_post ) ) {
                $next_title = get_the_title( $next_post->ID );
                $next_title_truncated = truncate_text( $next_title );
                next_post_link( '%link', $next_title_truncated . ' <i class="fa fa-chevron-right" aria-hidden="true"></i>' );
            } else {
                echo '<p>No next post</p>';
            }
            ?>
        </div>
    </div>
</div>



    </div>

    <?php get_footer(); ?>