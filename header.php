<?php
$header_logo = get_theme_mod( 'header_logo' );
$header_bg_color = get_theme_mod( 'header_background_color', '#ffffff' );
$header_text_color = get_theme_mod( 'header_text_color', '#000000' );
?>

<header style="background-color: <?php echo esc_attr( $header_bg_color ); ?>; color: <?php echo esc_attr( $header_text_color ); ?>;">
    <?php if ( $header_logo ) : ?>
        <img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <?php else : ?>
        <h1><?php bloginfo( 'name' ); ?></h1>
    <?php endif; ?>

    <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
</header>
