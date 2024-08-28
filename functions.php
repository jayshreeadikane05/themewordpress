<?php
/**
 * ittech functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ittech
 * @since ittech
 */


if ( ! function_exists( 'ittech_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since ittech 1.0
	 *
	 * @return void
	 */
	function ittech_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
        add_theme_support( 'elementor' );
	}

endif;

add_action( 'after_setup_theme', 'ittech_support' );

if ( ! function_exists( 'ittech_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since ittech-Two 1.0
	 *
	 * @return void
	 */
	function ittech_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'ittech-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		wp_enqueue_style( 'ittech-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'ittech_styles' );


if ( ! isset( $content_width ) ) {
	$content_width = 1140; 
}
function ittech_elementor_styles() {
    if ( did_action( 'elementor/loaded' ) ) {
        wp_enqueue_style( 'ittech-elementor', get_template_directory_uri() . '/elementor.css', [], '1.0.0' );
    }
}

add_action( 'wp_enqueue_scripts', 'ittech_elementor_styles' );

function ittech_register_menus() {
    register_nav_menus(
        array(
            'menu-1' => __( 'Primary Menu', 'ittech' ),
        )
    );
}
add_action( 'init', 'ittech_register_menus' );

function ittech_enqueue_fonts() {
    wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'ittech_enqueue_fonts' );


if( is_customize_preview() && ! current_theme_supports( 'widgets' ) ) {
	add_theme_support( 'widgets' );
}
if ( class_exists( 'WP_Customize_Control' ) ) {
    class WP_Customize_Redirect_Button_Control extends WP_Customize_Control {
        public $type = 'redirect_button';

        public function render_content() {
            if ( isset( $this->label ) ) {
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
            }
            if ( isset( $this->description ) ) {
                echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
            }
            if ( isset( $this->input_attrs['button_url'] ) ) {
                echo '<a href="' . esc_url( $this->input_attrs['button_url'] ) . '" class="button button-primary" target="_blank">' . esc_html( $this->input_attrs['button_label'] ) . '</a>';
            }
        }
    }
}


function ittech_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'header_builder_section', array(
        'title'       => __( 'Header Builder', 'ittech' ),
        'description' => __( 'Customize your site header here.', 'ittech' ),
        'priority'    => 30,
    ) );

 
    $wp_customize->add_setting( 'header_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
        'label'    => __( 'Header Logo', 'ittech' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_logo',
    ) ) );

    $wp_customize->add_setting( 'header_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
        'label'    => __( 'Header Background Color', 'ittech' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_background_color',
    ) ) );

   
    $wp_customize->add_setting( 'header_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
        'label'    => __( 'Header Text Color', 'ittech' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_text_color',
    ) ) );

    $wp_customize->add_setting( 'header_menu_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color', array(
        'label'    => __( 'Menu Link Color', 'ittech' ),
        'section'  => 'header_builder_section',
        'settings' => 'header_menu_color',
    ) ) );
    $wp_customize->add_setting( 'header_menu_hover_color', array(
            'default'           => '#ff5722',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_hover_color', array(
            'label'    => __( 'Menu Link Hover Color', 'ittech' ),
            'section'  => 'header_builder_section',
            'settings' => 'header_menu_hover_color',
        ) ) );

        $wp_customize->add_setting( 'header_created_with_elementor', array(
            'default'           => false,
            'sanitize_callback' => 'sanitize_text_field',
        ) );
    
        $wp_customize->add_control( 'header_created_with_elementor', array(
            'type'    => 'checkbox',
            'label'   => __( 'Header Created with Elementor', 'ittech' ),
            'section' => 'header_builder_section',
            'settings' => 'header_created_with_elementor',
        ) );
    
        // Check if the checkbox is checked
        $wp_customize->add_setting( 'header_created_with_elementor', array(
            'default'           => false,
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        
        $wp_customize->add_control( 'header_created_with_elementor', array(
            'type'    => 'checkbox',
            'label'   => __( 'Header Created with Elementor', 'ittech' ),
            'section' => 'header_builder_section',
            'settings' => 'header_created_with_elementor',
        ) );
    
        // Elementor Edit Button
        $wp_customize->add_setting( 'header_elementor_edit_button', array(
            'transport' => 'postMessage',
        ) );
    
        $wp_customize->add_control( new WP_Customize_Redirect_Button_Control( $wp_customize, 'header_elementor_edit_button', array(
            'label'       => __( 'Edit Header with Elementor', 'ittech' ),
            'section'     => 'header_builder_section',
            'input_attrs' => array(
                'button_label' => __( 'Edit Header', 'ittech' ),
                'button_url'   => wp_nonce_url( admin_url( 'post.php?post=' . get_option( 'elementor_active_kit' ) . '&action=elementor' ), 'edit_elementor' ),
            ),
        ) ) );
       
}
add_action( 'customize_register', 'ittech_customize_register' );
function ittech_customizer_controls_js() {
    ?>
    <script type="text/javascript">
        (function($) {
            wp.customize.bind('ready', function() {
                if (!wp.customize('header_created_with_elementor').get()) {
                    $('#customize-control-header_elementor_edit_button').hide();
                }

                wp.customize('header_created_with_elementor').bind(function(newValue) {
                    if (newValue) {
                        $('#customize-control-header_elementor_edit_button').show();
                    } else {
                        $('#customize-control-header_elementor_edit_button').hide();
                    }
                });
            });
        })(jQuery);
    </script>
    <?php
}
add_action( 'customize_controls_print_footer_scripts', 'ittech_customizer_controls_js' );


function ittech_customize_preview_js() {
    wp_enqueue_script( 'ittech-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'ittech_customize_preview_js' );
