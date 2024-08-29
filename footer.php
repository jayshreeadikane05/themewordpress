<?php
if ( is_page() ) {
    $display_footer = get_post_meta( get_queried_object_id(), '_ittech_display_footer', true );
    if ( $display_footer === 'no' ) {
        // If footer is disabled, do not render the footer
        return;
    }
}
?>

<footer id="site-footer" class="header-footer-group">
    <div class="container">
        <div class="footer-content">
            <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
