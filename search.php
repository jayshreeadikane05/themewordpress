<?php get_header(); ?>
<div class="serach-div">
<div class="search-results">
    <h1>Search Results for: <span class="search-query"><?php echo esc_html(get_search_query()); ?></span></h1>
    <div class="search-results-list">
        <!-- Loop through search results -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="search-result-item">
                    <a href="<?php the_permalink(); ?>">
                        <div class="search-result-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="search-result-content">
                            <h2 class="search-result-title"><?php the_title(); ?></h2>
                            <p class="search-result-excerpt"><?php the_excerpt(); ?></p>

                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
            <!-- Pagination -->
            <div class="pagination">
                <?php
                // Display pagination
                echo paginate_links();
                ?>
            </div>
        <?php else : ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>
</div>
</div>

<?php get_footer(); ?>