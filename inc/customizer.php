<?php
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
