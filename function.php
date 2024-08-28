<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
function ittech_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'header_builder_section', array(
        'title'       => __( 'Header Builder', 'ittech-theme' ),
        'description' => __( 'Customize your site header here.', 'ittech-theme' ),
        'priority'    => 30,
    ) );

    $wp_customize->add_setting( 'header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
        'label'    => __( 'Header Logo', 'ittech-theme' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_logo',
    ) ) );

    $wp_customize->add_setting( 'header_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
        'label'    => __( 'Header Background Color', 'ittech-theme' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_background_color',
    ) ) );

    $wp_customize->add_setting( 'header_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
        'label'    => __( 'Header Text Color', 'ittech-theme' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_text_color',
    ) ) );

        $wp_customize->add_setting( 'header_menu_layout', array(
        'default'           => 'horizontal',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'header_menu_layout', array(
        'label'    => __( 'Menu Layout', 'ittech-theme' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_menu_layout',
        'type'     => 'select',
        'choices'  => array(
            'horizontal' => __( 'Horizontal', 'ittech-theme' ),
            'vertical'   => __( 'Vertical', 'ittech-theme' ),
        ),
    ) );
}
add_action( 'customize_register', 'ittech_customize_register' );