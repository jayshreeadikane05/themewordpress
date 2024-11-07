<?php
namespace Elementor;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

class Custom_Post_Grid_Widget extends Widget_Base {

    public function get_name() {
        return 'custom_post_grid';
    }

    public function get_title() {
        return __('Custom Post Grid', 'text-domain');
    }

    public function get_icon() {
        return 'eicon-posts-ticker';
    }

   
    public function get_categories() {
        return [ 'a_ittech-addons' ];
    }


    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'text-domain'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'layout',
            [
                'label' => __('Select Layout', 'text-domain'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'layout2' => __('Layout 2: Large Post Left', 'text-domain'),
                    'layout3' => __('Layout 3: Large Post Right', 'text-domain'),
                ],
                'default' => 'grid',
            ]
        );
    
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'text-domain'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
            ]
        );
      
    
        // Display options
        $this->add_control(
            'show_title',
            [
                'label' => __('Show Title', 'text-domain'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'text-domain'),
                'label_off' => __('Hide', 'text-domain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
        $this->add_control(
            'show_image',
            [
                'label' => __('Show Featured Image', 'text-domain'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'text-domain'),
                'label_off' => __('Hide', 'text-domain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_image_small',
            [
                'label' => __('Show Featured Image (small list)', 'text-domain'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'text-domain'),
                'label_off' => __('Hide', 'text-domain'),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'display_date_small',
            [
                'label' => __( 'Display Date small', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
        $this->add_control(
            'show_read_more',
            [
                'label' => __('Show Read More Link', 'text-domain'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'text-domain'),
                'label_off' => __('Hide', 'text-domain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
        $this->add_control(
            'show_read_more_small',
            [
                'label' => __('Show Read More Link small', 'text-domain'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'text-domain'),
                'label_off' => __('Hide', 'text-domain'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
        $this->add_control(
            'order',
            [
                'label' => __('Order', 'text-domain'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'date' => __('Date', 'text-domain'),
                    'title' => __('Title', 'text-domain'),
                    'modified' => __('Modified', 'text-domain'),
                    'rand' => __('Random', 'text-domain'),
                ],
                'default' => 'date',
            ]
        );
    
        $this->add_control(
            'order_by',
            [
                'label' => __('Order By', 'text-domain'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => __('Ascending', 'text-domain'),
                    'DESC' => __('Descending', 'text-domain'),
                ],
                'default' => 'DESC',
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
            'display_excerpt_small',
            [
                'label' => __( 'Display Excerpt small', 'plugin-name' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'plugin-name' ),
                'label_off' => __( 'No', 'plugin-name' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
    
          $this->add_control(
            'excerpt_word_count',
            [
                'label' => __( 'Excerpt Word Count', 'plugin-name' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,  // Default word count
                'condition' => [
                    'display_excerpt_small' => 'yes',
                ],
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
                    '{{WRAPPER}} .post-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .post-title',
            ]
        );
        
        $this->add_responsive_control(
            'title_button_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'title_button_margin',
            [
                'label' => __( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        


        $this->end_controls_section();


        $this->start_controls_section(
            'small_style_title_section',
            [
                'label' => __( 'Small Post Title', 'plugin-name' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'small_title_color',
            [
                'label' => __( 'Color', 'plugin-name' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .small-post-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'small_title_typography',
                'label' => __('Typography', 'text-domain'),
                'selector' => '{{WRAPPER}} .small-post-title',
            ]
        );
        
        $this->add_responsive_control(
            'small_title_button_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .small-post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'small_title_button_margin',
            [
                'label' => __( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .small-post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        


        $this->end_controls_section();
        

        $this->start_controls_section(
            'small_style_featured_image_section',
            [
                'label' => __( 'Small List Featured Image', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'small_featured_image_width',
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
                    '{{WRAPPER}} .small-post-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'small_featured_image_width_tablet',
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
                    '{{WRAPPER}} .small-post-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'tablet', // Specify the responsive key
            ]
        );
        
        $this->add_responsive_control(
            'small_featured_image_width_mobile',
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
                    '{{WRAPPER}} .small-post-image img' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', // Specify the responsive key
            ]
        );
        
        $this->add_control(
            'small_featured_image_height',
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
                    '{{WRAPPER}} .small-post-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'small_featured_image_height_tablet',
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
                    '{{WRAPPER}} .small-post-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'tablet', // Specify the responsive key
            ]
        );
        
        $this->add_responsive_control(
            'small_featured_image_height_mobile',
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
                    '{{WRAPPER}} .small-post-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', // Specify the responsive key
            ]
        );
        
        $this->add_control(
            'small_featured_image_border_radius',
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
                    '{{WRAPPER}} .small-post-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'small_featured_image_border_radius_tablet',
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
                    '{{WRAPPER}} .small-post-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'tablet', // Specify the responsive key
            ]
        );
        
        $this->add_responsive_control(
            'small_featured_image_border_radius_mobile',
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
                    '{{WRAPPER}} .small-post-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', 
            ]
        );
        
        $this->end_controls_section();

        //Large Screen

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
                    '{{WRAPPER}} .post-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .post-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
                'responsive' => 'mobile', 
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


        $this->start_controls_section(
            'small_read_more_button_style_section',
            [
                'label' => __( 'Small Read More Button', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'small_read_more_button_background_color',
            [
                'label' => __( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .small-read-more-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'small_read_more_button_text_color',
            [
                'label' => __( 'Text Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .small-read-more-button' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'small_read_more_button_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .small-read-more-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'small_read_more_button_margin',
            [
                'label' => __( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .small-read-more-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'small_read_more_button_typography',
                'label' => __( 'Typography', 'plugin-name' ),
                'selector' => '{{WRAPPER}} .small-read-more-button',
            ]
        );
        

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'small_read_more_button_border',
                'label' => __( 'Border', 'plugin-name' ),
                'selector' => '{{WRAPPER}} .small-read-more-button',
            ]
        );

        $this->add_control(
            'small_read_more_button_border_radius',
            [
                'label' => __( 'Border Radius', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .small-read-more-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        
        
        
        $this->end_controls_section();

       
        $this->start_controls_section(
            'background_color_smallpost_style_section',
            [
                'label' => __( 'Small Post Design', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'background_color_smallpost_background_color',
            [
                'label' => __( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .small-post' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'smallpost_button_border',
                'label' => __( 'Border', 'plugin-name' ),
                'selector' => '{{WRAPPER}} .small-post',
            ]
        );

        $this->add_control(
            'smallpost_button_border_radius',
            [
                'label' => __( 'Border Radius', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .small-post' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'smallpost_button_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .small-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'smallpost_button_margin',
            [
                'label' => __( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .small-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'background_color_largepost_style_section',
            [
                'label' => __( 'Large Post Design', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control(
            'background_color_largepost_background_color',
            [
                'label' => __( 'Background Color', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .large-post' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'largepost_button_border',
                'label' => __( 'Border', 'plugin-name' ),
                'selector' => '{{WRAPPER}} .large-post',
            ]
        );

        $this->add_control(
            'largepost_button_border_radius',
            [
                'label' => __( 'Border Radius', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .large-post' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        
        $this->add_responsive_control(
            'largepost_button_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .large-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'largepost_button_margin',
            [
                'label' => __( 'Margin', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .large-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'min_width',
            [
                'label' => __( 'Minimum Width', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .small-posts' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->end_controls_section();

    }

  

 
   

    protected function render() {
        $settings = $this->get_settings_for_display();
        $layout = $settings['layout'];
        $posts_per_page = !empty($settings['posts_per_page']) ? intval($settings['posts_per_page']) : 10;
        $order = !empty($settings['order']) ? $settings['order'] : 'date';
        $order_by = !empty($settings['order_by']) ? $settings['order_by'] : 'DESC';
        $selected_categories = !empty($settings['selected_categories']) ? $settings['selected_categories'] : [];
        $selected_tags = !empty($settings['selected_tags']) ? $settings['selected_tags'] : [];
        $show_title = $settings['show_title'] === 'yes';
        $show_image = $settings['show_image'] === 'yes';
        $show_image_small = $settings['show_image_small'] === 'yes';
        $display_date = $settings['display_date'] === 'yes';
        $show_read_more = $settings['show_read_more'] === 'yes';
        $display_date_small = $settings['display_date_small'] === 'yes';
        $show_read_more_small = $settings['show_read_more_small'] === 'yes';
        $display_excerpt = $settings['display_excerpt'] === 'yes';
        $display_excerpt_small = $settings['display_excerpt_small'] === 'yes';
		 $excerpt_word_count = $settings['excerpt_word_count'];
        
    
        $featured_image_width = !empty($settings['featured_image_width']['size']) ? $settings['featured_image_width']['size'] . $settings['featured_image_width']['unit'] : 'auto';
        $featured_image_height = !empty($settings['featured_image_height']['size']) ? $settings['featured_image_height']['size'] . $settings['featured_image_height']['unit'] : 'auto';
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'orderby' => $order,
            'order' => $order_by,
            'category__in' => !empty($settings['selected_categories']) ? $settings['selected_categories'] : '',
            'tag__in' => !empty($settings['selected_tags']) ? $settings['selected_tags'] : '',
            'post__in' => !empty($settings['selected_posts']) ? $settings['selected_posts'] : [], 
        );
    
        $query = new \WP_Query($args);
    
        if ($query->have_posts()) {
            echo '<div class="custom-post-grid ' . esc_attr($layout) . '">';
           if ($layout == 'layout2') {
                if ($query->post_count > 0) {
                    $query->the_post();
                    echo '<div class="large-post">';
                    if ($show_image && has_post_thumbnail()) {
                        echo '<a href="' . get_the_permalink() . '" target="_blank">';
                        echo '<div class="post-image zoom-effect"><div class="image-inner">' . get_the_post_thumbnail() . '</div></div>';
                        echo '</a>';    
                    }
                    if ($show_title) {
                        echo '<a href="' . get_the_permalink() . '" target="_blank">';
                        echo ' <h2 class="post-title hover-effect">' . get_the_title() . '</h2>';
                        echo '</a>';
                    }
                    if ('yes' === $settings['display_excerpt']) {
                        echo '<div class="post-excerpt">' . get_the_excerpt() . '</div>';
                    }
                    if ($display_date) {
                        echo '<div class="post-date">' . get_the_date() . '</div>';
                    }
                    if ($display_excerpt) {
                       $excerpt = wp_trim_words( get_the_excerpt(), $excerpt_word_count );

                        echo '<div class="post-excerpt">' . $excerpt . '</div>';
                    }
                    if ($show_read_more) {
                        echo '<a href="' . get_permalink() . '" target="_blank" class="read-more-button">' . __('Read More', 'text-domain') . '</a>';
                    }
                    echo '</div>';
                    echo '<div class="small-posts">';
                    while ($query->have_posts()) {
                        $query->the_post();
                        echo '<div class="small-post">';
                        if ($show_image_small && has_post_thumbnail()) {
                            echo '<a href="' . get_the_permalink() . '" target="_blank">';
                            echo '<div class="small-post-image zoom-effect"><div class="image-inner">' . get_the_post_thumbnail() . '</div></div>';
                            echo '</a>';
                        }
                        echo '<div class="post-content">';
                        if ($show_title) {
                            echo '<a href="' . get_the_permalink() . '" target="_blank">';
                            echo ' <h2 class="small-post-title hover-effect">' . get_the_title() . '</h2>';
                            echo '</a>';
                        }
                        if ($display_date_small) {
                            echo '<div class="post-date">' . get_the_date() . '</div>';
                        }
                        if ($display_excerpt_small) {
                         $excerpt = wp_trim_words( get_the_excerpt(), $excerpt_word_count );
                            echo '<div class="post-excerpt">' . $excerpt . '</div>';
                        }
                        if ($show_read_more_small) {
                            echo '<a href="' . get_permalink() . '" target="_blank" class="read-more small-read-more-button">' . __('Read More', 'text-domain') . '</a>';
                        }
                     
                      
                        echo '</div>';
                        echo '</div>';
                        
                    }
                    echo '</div>';
                }
            }  elseif ($layout == 'layout3') {
                $posts = $query->get_posts();
                $total_posts = count($posts);
                if (count($posts) > 1) {
                    echo '<div class="small-posts layout3">';
                    for ($i = 0; $i < $total_posts - 1; $i++) {
                        $post = $posts[$i]; 
                        $GLOBALS['post'] = $post; 
                        setup_postdata($post); 
                        echo '<div class="small-post">';
                        echo '<div class="post-content">'; 
                        if ($show_title) {
                            echo '<a href="' . get_the_permalink() . '" target="_blank">';
                            echo ' <h2 class="small-post-title hover-effect">' . get_the_title() . '</h2>';
                            echo '</a>';
                        }
                      
                        if ($display_date_small) {
                            echo '<div class="post-date">' . get_the_date('', $post->ID) . '</div>';
                        }
                        if ($display_excerpt_small) {
                         $excerpt = wp_trim_words( get_the_excerpt(), $excerpt_word_count );
                            echo '<div class="post-excerpt">' . $excerpt . '</div>'; 
                        }
                        if ($show_read_more_small) {
                            echo '<a href="' . get_permalink($post->ID) . '" target="_blank" class="read-more small-read-more-button">' . __('Read More', 'text-domain') . '</a>';
                        }
                        echo '</div>';
            
                        if ($show_image_small && has_post_thumbnail($post->ID)) {
                            echo '<div class="small-post-image zoom-effect"><div class="image-inner">' . get_the_post_thumbnail($post->ID) . '</div></div>';

                        }
            
                        echo '</div>'; 
                    }
                    echo '</div>';
            
                    $last_post = $posts[count($posts) - 1];
                    echo '<div class="large-post">';
                    
                    if ($show_image && has_post_thumbnail($last_post->ID)) {
                        echo '<a href="' . get_the_permalink($last_post->ID) . '" target="_blank">';
                  
                        echo '<div class="post-image zoom-effect"><div class="image-inner">' . get_the_post_thumbnail($last_post->ID) . '</div></div>';

                        echo '</a>';
                    }
                    if ($show_title) {
                        echo '<a href="' . get_permalink($last_post->ID) . '" target="_blank">';
                        echo '<h3 class="hover-effect">' . get_the_title($last_post->ID) . '</h3>'; 
                        echo '</a>';
                    }
                    if ($display_excerpt) {
                    $excerpt = wp_trim_words( get_the_excerpt(), $excerpt_word_count );
                        echo '<div class="post-excerpt">' . $excerpt . '</div>';
                    }
                    if ($display_date) {
                        echo '<div class="post-date">' . get_the_date('', $last_post->ID) . '</div>';
                    }
                    if ($show_read_more) {
                        echo '<a href="' . get_permalink($post->ID) . '" target="_blank" class="read-more read-more-button">' . __('Read More', 'text-domain') . '</a>';
                    }
                  
                    echo '</div>';
                }
            }
            
    
            echo '</div>';
        } else {
            echo '<p>' . __('No posts found.', 'text-domain') . '</p>';
        }
    }
    

 
}