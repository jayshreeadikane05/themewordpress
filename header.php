<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package ittech
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$header_created_with_elementor = get_theme_mod( 'header_created_with_elementor', false );
echo '<!-- Header Created with Elementor: ' . esc_html($header_created_with_elementor) . ' -->';

if ( ! $header_created_with_elementor ) :
?>
    <header id="site-header" class="header-footer-group" style="background-color: <?php echo esc_attr( get_theme_mod( 'header_background_color', '#ffffff' ) ); ?>; color: <?php echo esc_attr( get_theme_mod( 'header_text_color', '#000000' ) ); ?>;">
        <div class="header-container container">
            <div class="header-inner">
                <!-- Display the header logo -->
                <?php if ( get_theme_mod( 'header_logo' ) ) : ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Menu Layout -->
                <nav id="site-navigation" class="primary-navigation <?php echo esc_attr( get_theme_mod( 'header_menu_layout', 'horizontal' ) ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_class'     => 'menu-wrapper',
                            'container_class' => 'primary-menu-container',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>
<?php
else :
    echo '<p>Header is created with Elementor. Please edit with Elementor.</p>';
endif;
?>

<style>
    #site-navigation .menu-wrapper li a {
        color: <?php echo esc_attr( get_theme_mod( 'header_menu_color', '#000000' ) ); ?>;
    }

    #site-navigation .menu-wrapper li a:hover {
        color: <?php echo esc_attr( get_theme_mod( 'header_menu_hover_color', '#ff5722' ) ); ?>;
    }
</style>

<div id="content" class="site-content">
