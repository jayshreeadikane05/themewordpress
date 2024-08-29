<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

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

    public function _register_controls() {
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

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $settings['posts_per_page'],
            'category__in' => !empty( $settings['selected_categories'] ) ? $settings['selected_categories'] : '',
            'tag__in' => !empty( $settings['selected_tags'] ) ? $settings['selected_tags'] : '',
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
            echo '<div class="post-grid-container">';
            while ( $query->have_posts() ) : $query->the_post();
                echo '<div class="post-grid-item">';
                
                if ( 'yes' === $settings['display_featured_image'] && has_post_thumbnail() ) {
                    echo '<a href="' . get_the_permalink() . '">';
                    the_post_thumbnail('medium');
                    echo '</a>';
                }

                echo '<h2 class="post-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
                
                if ( 'yes' === $settings['display_date'] ) {
                    echo '<div class="post-date">' . get_the_date() . '</div>';
                }

                if ( 'yes' === $settings['display_categories'] ) {
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<div class="post-categories">';
                        foreach ( $categories as $category ) {
                            echo '<a href="' . get_category_link( $category->term_id ) . '">' . esc_html( $category->name ) . '</a> ';
                        }
                        echo '</div>';
                    }
                }

                if ( 'yes' === $settings['display_excerpt'] ) {
                    echo '<div class="post-excerpt">' . get_the_excerpt() . '</div>';
                }
                
                echo '</div>';
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        else :
            echo '<p>No posts found.</p>';
        endif;
    }
}
