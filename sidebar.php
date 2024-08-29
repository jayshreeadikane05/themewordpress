<?php
// Get the selected sidebar for the current post or page
$sidebar = get_post_meta( get_the_ID(), '_ittech_sidebar', true );

if ( $sidebar && $sidebar != 'none' ) {
    dynamic_sidebar( $sidebar );
}
