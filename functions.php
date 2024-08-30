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

		add_theme_support( 'wp-block-styles' );

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
    wp_enqueue_style( 'poppins-font', 'https://fonts.googleapis.com/css?family=Outfit', false );
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
                var control = wp.customize('header_created_with_elementor');
                if (!control.get()) {
                    console.log('Hiding Elementor edit button');
                    $('#customize-control-header_elementor_edit_button').hide();
                }

                control.bind(function(newValue) {
                    if (newValue) {
                        console.log('Showing Elementor edit button');
                        $('#customize-control-header_elementor_edit_button').show();
                    } else {
                        console.log('Hiding Elementor edit button');
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


// Sidebar Option for page and post

function ittech_register_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'ittech' ),
        'id'            => 'main-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the Primary sidebar.', 'ittech' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Secondary Sidebar', 'ittech' ),
        'id'            => 'secondary-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the secondary sidebar.', 'ittech' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ittech_register_sidebars' );
function ittech_sidebar_meta_box() {
    add_meta_box(
        'ittech_sidebar_meta_box',       
        __( 'Sidebar Selection', 'ittech' ), 
        'ittech_sidebar_meta_box_callback', 
        'post',        
        'side',                             
        'default'                        
    );
}
add_action( 'add_meta_boxes', 'ittech_sidebar_meta_box' );


function ittech_sidebar_meta_box_callback( $post ) {
    $sidebar = get_post_meta( $post->ID, '_ittech_sidebar', true );

    // Retrieve custom widget areas from the correct option name
    $custom_widget_areas = get_option( 'ittech_widget_areas', array() );

    ?>
    <p>
        <label for="ittech_sidebar"><?php _e( 'Select Sidebar:', 'ittech' ); ?></label>
        <select name="ittech_sidebar" id="ittech_sidebar">
            <option value="none" <?php selected( $sidebar, 'none' ); ?>><?php _e( 'No Sidebar', 'ittech' ); ?></option>
            <option value="main-sidebar" <?php selected( $sidebar, 'main-sidebar' ); ?>><?php _e( 'Main Sidebar', 'ittech' ); ?></option>
            <option value="secondary-sidebar" <?php selected( $sidebar, 'secondary-sidebar' ); ?>><?php _e( 'Secondary Sidebar', 'ittech' ); ?></option>

            <?php if ( ! empty( $custom_widget_areas ) ) : ?>
                <optgroup label="<?php _e( 'Custom Widget Areas', 'ittech' ); ?>">
                    <?php foreach ( $custom_widget_areas as $id => $name ) : ?>
                        <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $sidebar, $id ); ?>>
                            <?php echo esc_html( $name ); ?>
                        </option>
                    <?php endforeach; ?>
                </optgroup>
            <?php endif; ?>
        </select>
    </p>
    <?php
}


function ittech_save_sidebar_meta_box_data( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['ittech_sidebar_nonce'] ) ) {
        return $post_id;
    }
    $nonce = $_POST['ittech_sidebar_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'ittech_sidebar_nonce_action' ) ) {
        return $post_id;
    }

    // Check if this is an autosave.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    // Check the user's permissions.
    if ( 'post' === $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
    } else {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    // Sanitize and save the data.
    $sidebar = sanitize_text_field( $_POST['ittech_sidebar'] );
    update_post_meta( $post_id, '_ittech_sidebar', $sidebar );
}
add_action( 'save_post', 'ittech_save_sidebar_meta_box_data' );

// Save the sidebar selection
// function ittech_save_sidebar_meta_box_data( $post_id ) {
//     if ( array_key_exists( 'ittech_sidebar', $_POST ) ) {
//         update_post_meta(
//             $post_id,
//             '_ittech_sidebar',
//             $_POST['ittech_sidebar']
//         );
//     }
// }
// add_action( 'save_post', 'ittech_save_sidebar_meta_box_data' );

function ittech_save_sidebar_selection( $post_id ) {
    // Check if the sidebar is set and sanitize it before saving
    if ( isset( $_POST['ittech_sidebar'] ) ) {
        $sidebar = sanitize_text_field( $_POST['ittech_sidebar'] );
        update_post_meta( $post_id, '_ittech_sidebar', $sidebar );
    }
}
add_action( 'save_post', 'ittech_save_sidebar_selection' );

//Feature Images of post support 

function ittech_theme_setup() {
  
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'ittech_theme_setup' );

function custom_thumbnail_size() {
    add_image_size( 'custom-thumb', 600, 400, true ); 
}

add_action( 'after_setup_theme', 'custom_thumbnail_size' );

function ittech_enqueue_styles() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ittech_enqueue_styles' );

function truncate_text($text, $word_limit = 8) {
    $words = explode(' ', $text);
    if (count($words) > $word_limit) {
        $words = array_slice($words, 0, $word_limit);
        return implode(' ', $words) . '...';
    }
    return $text;
}

function add_custom_classes_to_widgets( $params ) {
    if ( isset( $params[0]['widget_id'] ) ) {
        // Check for specific widgets and add classes
        switch ( $params[0]['widget_id'] ) {
            case 'recent-posts':
                $params[0]['before_widget'] = str_replace('class="', 'class="custom-recent-posts ', $params[0]['before_widget']);
                break;
            case 'categories':
                $params[0]['before_widget'] = str_replace('class="', 'class="custom-categories ', $params[0]['before_widget']);
                break;
            // Add more cases for other widgets
        }
    }
    return $params;
}
add_filter( 'dynamic_sidebar_params', 'add_custom_classes_to_widgets' );

// Add menu page for Widget Area Management in Appearance menu
function ittech_add_widget_area_management_page() {
    add_theme_page(
        __( 'Widget Area Management', 'ittech' ),    // Page title
        __( 'Widget Areas', 'ittech' ),              // Menu title
        'manage_options',                            // Capability
        'widget-area-management',                    // Menu slug
        'ittech_widget_area_management_page'         // Callback function
    );
}
add_action( 'admin_menu', 'ittech_add_widget_area_management_page' );

// Register settings for widget areas
function ittech_register_widget_area_settings() {
    register_setting(
        'ittech_widget_area_options', // Option group
        'ittech_widget_areas'         // Option name
    );
}
add_action( 'admin_init', 'ittech_register_widget_area_settings' );

// Handle the creation of new widget areas
function ittech_add_widget_area() {
    if ( isset( $_POST['widget_area_name'] ) && ! empty( $_POST['widget_area_name'] ) ) {
        $widget_area_name = sanitize_text_field( $_POST['widget_area_name'] );
        $widget_areas = get_option( 'ittech_widget_areas', array() );
        $widget_area_id = sanitize_title( $widget_area_name );

        if ( ! isset( $widget_areas[ $widget_area_id ] ) ) {
            $widget_areas[ $widget_area_id ] = $widget_area_name;
            update_option( 'ittech_widget_areas', $widget_areas );
            register_sidebar( array(
                'name'          => $widget_area_name,
                'id'            => $widget_area_id,
                'description'   => sprintf( __( 'Widgets in this area will be shown in the %s.', 'ittech' ), $widget_area_name ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widgettitle">',
                'after_title'   => '</h2>',
            ) );
            wp_redirect( admin_url( 'themes.php?page=widget-area-management' ) );
            exit;
        }
    }
}
add_action( 'admin_post_ittech_add_widget_area', 'ittech_add_widget_area' );

// Callback function for the widget area management page
function ittech_widget_area_management_page() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'Manage Widget Areas', 'ittech' ); ?></h1>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="ittech_add_widget_area" />
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e( 'Widget Area Name', 'ittech' ); ?></th>
                    <td><input type="text" name="widget_area_name" value="" class="regular-text" /></td>
                </tr>
            </table>
            <?php submit_button( __( 'Add Widget Area', 'ittech' ) ); ?>
        </form>
        <h2><?php _e( 'Existing Widget Areas', 'ittech' ); ?></h2>
        <ul>
            <?php
            $widget_areas = get_option( 'ittech_widget_areas', array() );
            foreach ( $widget_areas as $id => $name ) {
                echo '<li>' . esc_html( $name ) . ' - <a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">' . __( 'Manage Widgets', 'ittech' ) . '</a></li>';
            }
            ?>
        </ul>
    </div>
    <?php
}

// Register dynamic widget areas during theme initialization
function ittech_register_dynamic_sidebars() {
    $widget_areas = get_option( 'ittech_widget_areas', array() );
    foreach ( $widget_areas as $id => $name ) {
        register_sidebar( array(
            'name'          => $name,
            'id'            => $id,
            'description'   => sprintf( __( 'Widgets in this area will be shown in the %s.', 'ittech' ), $name ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action( 'widgets_init', 'ittech_register_dynamic_sidebars' );


// Header footer show for page we need


function ittech_page_visibility_meta_box() {
    add_meta_box(
        'ittech_page_visibility_meta_box',
        __( 'Page Visibility Options', 'ittech' ),
        'ittech_page_visibility_meta_box_callback',
        'page',  // Only for pages
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'ittech_page_visibility_meta_box' );

function ittech_page_visibility_meta_box_callback( $post ) {
    // Get current settings
    $disable_title = get_post_meta( $post->ID, '_ittech_disable_title', true );
    $disable_header = get_post_meta( $post->ID, '_ittech_disable_header', true );
    $disable_footer = get_post_meta( $post->ID, '_ittech_disable_footer', true );

    // Use default values if not set
    $disable_title = ($disable_title === '') ? 'yes' : $disable_title;
    $disable_header = ($disable_header === '') ? 'yes' : $disable_header;
    $disable_footer = ($disable_footer === '') ? 'yes' : $disable_footer;
    ?>
    <p>
        <input type="checkbox" id="ittech_disable_title" name="ittech_disable_title" value="no" <?php checked( $disable_title, 'yes' ); ?> />
        <label for="ittech_disable_title"><?php _e( 'Disable Page Title', 'ittech' ); ?></label>
    </p>
    <p>
        <input type="checkbox" id="ittech_disable_header" name="ittech_disable_header" value="no" <?php checked( $disable_header, 'yes' ); ?> />
        <label for="ittech_disable_header"><?php _e( 'Disable Header', 'ittech' ); ?></label>
    </p>
    <p>
        <input type="checkbox" id="ittech_disable_footer" name="ittech_disable_footer" value="no" <?php checked( $disable_footer, 'yes' ); ?> />
        <label for="ittech_disable_footer"><?php _e( 'Disable Footer', 'ittech' ); ?></label>
    </p>
    <?php
}



function ittech_save_page_visibility_meta( $post_id ) {
    if ( isset( $_POST['ittech_disable_title'] ) ) {
        update_post_meta( $post_id, '_ittech_disable_title', 'yes' );
    } else {
        update_post_meta( $post_id, '_ittech_disable_title', 'no' );
    }

    if ( isset( $_POST['ittech_disable_header'] ) ) {
        update_post_meta( $post_id, '_ittech_disable_header', 'yes' );
    } else {
        update_post_meta( $post_id, '_ittech_disable_header', 'no' );
    }

    if ( isset( $_POST['ittech_disable_footer'] ) ) {
        update_post_meta( $post_id, '_ittech_disable_footer', 'yes' );
    } else {
        update_post_meta( $post_id, '_ittech_disable_footer', 'no' );
    }
}
add_action( 'save_post', 'ittech_save_page_visibility_meta' );




function ittech_postgrid_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'post_grid_settings',
        array(
            'title'    => __( 'Post Grid Settings', 'ittech' ),
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'post_grid_columns',
        array(
            'default' => 'three',
            'transport' => 'refresh',
        )
    );

    $wp_customize->add_control(
        'post_grid_columns',
        array(
            'label'   => __( 'Number of Columns', 'ittech' ),
            'section' => 'post_grid_settings',
            'type'    => 'select',
            'choices' => array(
                'one'   => __( 'One Column', 'ittech' ),
                'two'   => __( 'Two Columns', 'ittech' ),
                'three' => __( 'Three Columns', 'ittech' ),
                'four'  => __( 'Four Columns', 'ittech' ),
            ),
        )
    );
}
add_action( 'customize_register', 'ittech_postgrid_customize_register' );

function register_post_grid_widget() {
    if ( defined( 'ELEMENTOR_VERSION' ) ) {
        $widget_file = get_template_directory() . '/widgets/elementor-post-grid-widget.php';
        if ( file_exists( $widget_file ) ) {
            require_once( $widget_file );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Post_Grid_Widget() );
        } else {
            error_log('Elementor Post Grid Widget file not found: ' . $widget_file);
        }
    }
}
add_action( 'elementor/widgets/register', 'register_post_grid_widget' );



