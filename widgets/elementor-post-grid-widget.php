<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Post_Grid_Widget extends Widget_Base {

    public function get_name() {
        return 'post_grid_widget';
    }

    public function get_title() {
        return __( 'Post Grid', 'plugin-name' );
    }

    public function get_icon() {
        return 'eicon-posts-ticker';
    }
    public function get_categories() {
        return [ 'a_ittech-addons' ];
    }

    public function _register_controls() {
        // Content Controls
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __( 'Posts Per Page', 'plugin-name' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );

        $this->add_control(
            'display_date',
            [
                'label' => __( 'Display Date', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_categories',
            [
                'label' => __( 'Display Categories', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_excerpt',
            [
                'label' => __( 'Display Excerpt', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'display_featured_image',
            [
                'label' => __( 'Display Featured Image', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $categories = get_terms( array(
            'taxonomy' => 'category',
            'hide_empty' => false,
        ) );

        $category_options = array();
        foreach ( $categories as $category ) {
            $category_options[ $category->term_id ] = $category->name;
        }

        $this->add_control(
            'selected_categories',
            [
                'label' => __( 'Select Categories', 'plugin-name' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $category_options,
                'multiple' => true,
                'default' => [],
            ]
        );

        $tags = get_terms( array(
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
        ) );

        $tag_options = array();
        foreach ( $tags as $tag ) {
            $tag_options[ $tag->term_id ] = $tag->name;
        }

        $this->add_control(
            'selected_tags',
            [
                'label' => __( 'Select Tags', 'plugin-name' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $tag_options,
                'multiple' => true,
                'default' => [],
            ]
        );
        $this->add_control(
            'show_read_more',
            [
                'label' => __( 'Show Read More Button', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        
        $posts = get_posts( array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ) );
        
        $post_options = array();
        foreach ( $posts as $post ) {
            $post_options[ $post->ID ] = $post->post_title . ' (' . $post->post_name . ')'; 
        }
        
        $this->add_control(
            'selected_posts',
            [
                'label' => __( 'Select Posts (by Title or Slug)', 'plugin-name' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $post_options,
                'multiple' => true,
                'label_block' => true,
                'default' => [],
            ]
        );
        
      
        
        $this->add_responsive_control(
            'columns_mobile',
            [
                'label' => __( 'Columns (we adjuct mobile and tablet)', 'plugin-name' ),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __( '1 Column', 'plugin-name' ),
                    '2' => __( '2 Columns', 'plugin-name' ),
                    '3' => __( '3 Columns', 'plugin-name' ),
                    '4' => __( '4 Columns', 'plugin-name' ),
                    '5' => __( '5 Columns', 'plugin-name' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-container' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
                'mobile_breakpoint' => 480, // Change this if needed
            ]
        );
        

        $this->add_control(
            'order_by',
            [
                'label' => __( 'Order', 'plugin-name' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => __( 'Ascending', 'plugin-name' ),
                    'desc' => __( 'Descending', 'plugin-name' ),
                ],
                'default' => 'desc',
            ]
        );
        
        $this->add_control(
            'orderby',
            [
                'label' => __( 'Order By', 'plugin-name' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'date'  => __( 'Date', 'plugin-name' ),
                    'title' => __( 'Title', 'plugin-name' ),
                    'modified' => __( 'Modified', 'plugin-name' ),
                    'author' => __( 'Author', 'plugin-name' ),
                    'rand' => __( 'Random', 'plugin-name' ),
                
                ],
                'default' => 'date',
            ]
        );
        

        $this->end_controls_section();

        $this->start_controls_section(
            'style_featured_image_section',
            [
                'label' => __( 'Featured Image', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'featured_image_width',
            [
                'label' => __( 'Width', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'featured_image_width_tablet',
            [
                'label' => __( 'Width (Tablet)', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'tablet', // Specify the responsive key
            ]
        );
        
        $this->add_responsive_control(
            'featured_image_width_mobile',
            [
                'label' => __( 'Width (Mobile)', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', // Specify the responsive key
            ]
        );
        
        $this->add_control(
            'featured_image_height',
            [
                'label' => __( 'Height', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'featured_image_height_tablet',
            [
                'label' => __( 'Height (Tablet)', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'tablet', // Specify the responsive key
            ]
        );
        
        $this->add_responsive_control(
            'featured_image_height_mobile',
            [
                'label' => __( 'Height (Mobile)', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', // Specify the responsive key
            ]
        );
        
        $this->add_control(
            'featured_image_border_radius',
            [
                'label' => __( 'Border Radius', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'featured_image_border_radius_tablet',
            [
                'label' => __( 'Border Radius (Tablet)', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'tablet', // Specify the responsive key
            ]
        );
        
        $this->add_responsive_control(
            'featured_image_border_radius_mobile',
            [
                'label' => __( 'Border Radius (Mobile)', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-grid-item img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', // Specify the responsive key
            ]
        );
        
        $this->end_controls_section();
        
        

        $this->start_controls_section(
            'style_title_section',
            [
                'label' => __( 'Post Title', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'plugin-name' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .post-title',
            ]
        );

        $this->end_controls_section();

        // Style controls for Post Date
        $this->start_controls_section(
            'style_date_section',
            [
                'label' => __( 'Post Date', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'date_color',
            [
                'label' => __( 'Color', 'plugin-name' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-date' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .post-date',
            ]
        );

        $this->end_controls_section();

        // Style controls for Excerpt
        $this->start_controls_section(
            'style_excerpt_section',
            [
                'label' => __( 'Excerpt', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => __( 'Color', 'plugin-name' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-excerpt' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .post-excerpt',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'read_more_button_style_section',
            [
                'label' => __( 'Read More Button', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'read_more_button_background_color',
            [
                'label' => __( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'read_more_button_text_color',
            [
                'label' => __( 'Text Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'read_more_button_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'read_more_button_margin',
            [
                'label' => __( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'read_more_button_typography',
                'label' => __( 'Typography', 'plugin-name' ),
                'selector' => '{{WRAPPER}} .read-more-button',
            ]
        );
        

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'read_more_button_border',
                'label' => __( 'Border', 'plugin-name' ),
                'selector' => '{{WRAPPER}} .read-more-button',
            ]
        );

        $this->add_control(
            'read_more_button_border_radius',
            [
                'label' => __( 'Border Radius', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .read-more-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        
        
        
        $this->end_controls_section();
        
      
        

    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        // Generate a unique ID for this instance
        $unique_id = 'post-grid-' . $this->get_id();
        
        $columns = !empty($settings['columns']) ? intval($settings['columns']) : 3;
        $columns_tablet = !empty($settings['columns_tablet']) ? intval($settings['columns_tablet']) : 2;
        $columns_mobile = !empty($settings['columns_mobile']) ? intval($settings['columns_mobile']) : 1;
    
        $item_width = 100 / $columns; 
    
        echo '<style>
            .' . esc_attr($unique_id) . ' .post-grid-container {
                display: grid;
                grid-template-columns: repeat(' . esc_attr($columns) . ', 1fr);
                gap: 20px;
            }
            @media (max-width: 768px) {
                .' . esc_attr($unique_id) . ' .post-grid-container {
                    grid-template-columns: repeat(' . esc_attr($columns_tablet) . ', 1fr);
                }
            }
            @media (max-width: 480px) {
                .' . esc_attr($unique_id) . ' .post-grid-container {
                    grid-template-columns: repeat(' . esc_attr($columns_mobile) . ', 1fr);
                }
            }
        </style>';
    
        $featured_image_width = !empty($settings['featured_image_width']['size']) ? $settings['featured_image_width']['size'] . $settings['featured_image_width']['unit'] : 'auto';
        $featured_image_height = !empty($settings['featured_image_height']['size']) ? $settings['featured_image_height']['size'] . $settings['featured_image_height']['unit'] : 'auto';
    
        echo '<style>
            .' . esc_attr($unique_id) . ' .post-grid-item img {
                width: ' . esc_attr($featured_image_width) . ';
                height: ' . esc_attr($featured_image_height) . ';
                object-fit: cover; /* Adjust as needed */
            }
        </style>';
    
        echo '<div class="' . esc_attr($unique_id) . '">';

        $order_by = !empty($settings['order_by']) ? $settings['order_by'] : 'desc';
        $order = !empty($settings['order_by']) ? $settings['order_by'] : 'desc';


        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'orderby' => $order,
            'order' => $order_by, 
            'category__in' => !empty($settings['selected_categories']) ? $settings['selected_categories'] : '',
            'tag__in' => !empty($settings['selected_tags']) ? $settings['selected_tags'] : '',
            'post__in' => !empty($settings['selected_posts']) ? $settings['selected_posts'] : [], 

        );
        $query = new WP_Query($args);
        
        if ($query->have_posts()) :
            echo '<div class="post-grid-container">';
            while ($query->have_posts()) : $query->the_post();
                echo '<div class="post-grid-item">';
        
                if ('yes' === $settings['display_featured_image'] && has_post_thumbnail()) {
                    echo '<a href="' . get_the_permalink() . '">';
                    the_post_thumbnail('medium');
                    echo '</a>';
                }
        
                echo '<h2 class="post-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
        
                if ('yes' === $settings['display_date']) {
                    echo '<div class="post-date">' . get_the_date() . '</div>';
                }
        
                if ('yes' === $settings['display_categories']) {
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<div class="post-categories">';
                        foreach ($categories as $category) {
                            echo '<a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a> ';
                        }
                        echo '</div>';
                    }
                }
        
                if ('yes' === $settings['display_excerpt']) {
                    echo '<div class="post-excerpt">' . get_the_excerpt() . '</div>';
                }
        
                if ('yes' === $settings['show_read_more']) {
                    echo '<a href="' . get_the_permalink() . '" class="read-more-button">Read More</a>';
                }
        
                echo '</div>';
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<p>No posts found.</p>';
        endif;
        
        echo '</div>'; 
    }
    
    
    
    
}
