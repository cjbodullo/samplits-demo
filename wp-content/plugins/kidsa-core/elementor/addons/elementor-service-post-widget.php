<?php
/**
 * Elementor Widget
 * @package kidsa
 * @since 1.0.0
 */

namespace Elementor;
class Service_Post extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'kidsa-service-grid-list-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Service Post', 'kidsa-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-post';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['kidsa_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'kidsa-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'style',
            [
                'label'   => esc_html__( 'Select Style', 'kidsa-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => array(
                    'style1'   => esc_html__( 'Style One', 'kidsa-core' ),
                    'style2'   => esc_html__( 'Style Two', 'kidsa-core' ),
                    'style3'   => esc_html__( 'Style Three', 'kidsa-core' ),
                    'style4'   => esc_html__( 'Style Four', 'kidsa-core' ),
                ),
            ]
        );
        $this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter your button text', 'kidsa-core' ),
				'default' => esc_html__('Read More', 'kidsa-core'),
			]
		);
        $this->add_control('service_grid', [
            'label' => esc_html__('Service Grid', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'kidsa-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'kidsa-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'kidsa-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'kidsa-core'),
            ),
            'default' => 'col-lg-3',
            'description' => esc_html__('Select Case Study Grid', 'kidsa-core')
        ]);

        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'kidsa-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'kidsa-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => kidsa_core()->get_terms_names('service-cat', 'id'),
            'default' => [24],
            'include' => [],
            'exclude' => [],
            'description' => esc_html__('Select category as you want, leave it blank for all categories', 'kidsa-core'),
        ]);  
        $this->add_control('order', [
            'label' => esc_html__('Order', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'kidsa-core'),
                'DESC' => esc_html__('Descending', 'kidsa-core'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'kidsa-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'kidsa-core'),
                'title' => esc_html__('Title', 'kidsa-core'),
                'date' => esc_html__('Date', 'kidsa-core'),
                'rand' => esc_html__('Random', 'kidsa-core'),
                'comment_count' => esc_html__('Most Comments', 'kidsa-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'kidsa-core')
        ]);       

        $this->add_control(
			'text_word_count',
			[
				'label'       => __( 'Text Word Count', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Text Words Number', 'kidsa-core' ),
				'default'   => 7,				
			]
		);
      
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'kidsa-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'kidsa-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'kidsa-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'kidsa-core'),
                    'center' => esc_html__('Center Align', 'kidsa-core'),
                    'right' => esc_html__('Right Align', 'kidsa-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'kidsa-core'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
            ]
        );
        $this->end_controls_section();


    // Subtitle Settings ================== 

        $this->start_controls_section(
            'subtitle_settings',
            [
                'label' => __( 'Sub Title Setting', 'kidsa-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Show Sub Title Control
        $this->add_control(
            'show_subtitle',
            [
                'label'     => esc_html__( 'Show Sub Title', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'show' => [
                        'title' => esc_html__( 'Show', 'kidsa-core' ),
                        'icon'  => 'eicon-check-circle',
                    ],
                    'none' => [
                        'title' => esc_html__( 'Hide', 'kidsa-core' ),
                        'icon'  => 'eicon-close-circle',
                    ],
                ],
                'default'   => 'show',
                'selectors' => [
                    '{{WRAPPER}} .event-box-items .event-content ul li span' => 'display: {{VALUE}} !important',
                ],
            ]
        );

        // Subtitle Alignment Control
        $this->add_control(
            'subtitle_alignment',
            [
                'label'     => esc_html__( 'Alignment', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'condition' => [ 'show_subtitle' => 'show' ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .event-box-items .event-content ul li span' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );

        // Subtitle Padding Control
        $this->add_control(
            'subtitle_padding',
            [
                'label'       => __( 'Padding', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => [ 'px', '%', 'em' ],
                'condition'   => [ 'show_subtitle' => 'show' ],
                'selectors'   => [
                    '{{WRAPPER}} .event-box-items .event-content ul li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Subtitle Margin Control
        $this->add_control(
            'subtitle_margin',
            [
                'label'       => __( 'Margin', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => [ 'px', '%', 'em' ],
                'condition'   => [ 'show_subtitle' => 'show' ],
                'selectors'   => [
                    '{{WRAPPER}} .event-box-items .event-content ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Subtitle Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'       => 'subtitle_typography',
                'label'      => __( 'Typography', 'kidsa-core' ),
                'selector'   => '{{WRAPPER}} .event-box-items .event-content ul li span',
                'condition'  => [ 'show_subtitle' => 'show' ],
            ]
        );

        // Subtitle Color Control
        $this->add_control(
            'subtitle_color',
            [
                'label'      => __( 'Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'separator'  => 'after',
                'condition'  => [ 'show_subtitle' => 'show' ],
                'selectors'  => [
                    '{{WRAPPER}} .event-box-items .event-content ul li span' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        // Subtitle Background Color Control
        $this->add_control(
            'subtitle_bg_color',
            [
                'label'      => __( 'Background Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'separator'  => 'after',
                'condition'  => [ 'show_subtitle' => 'show' ],
                'selectors'  => [
                    '{{WRAPPER}} .event-box-items .event-content ul li span' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

        // End of Subtitle Settings ==================

        //========== Title Settings ==========================
        $this->start_controls_section(
            'title_settings',
            [
                'label' => __( 'Title Settings', 'kidsa-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Show/Hide Title Control
        $this->add_control(
            'show_title',
            [
                'label'     => esc_html__( 'Show Title', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'show' => [
                        'title' => esc_html__( 'Show', 'kidsa-core' ),
                        'icon'  => 'eicon-check-circle',
                    ],
                    'none' => [
                        'title' => esc_html__( 'Hide', 'kidsa-core' ),
                        'icon'  => 'eicon-close-circle',
                    ],
                ],
                'default'   => 'show',
                'selectors' => [
                    '{{WRAPPER}} .event-box-items .event-content h3 a' => 'display: {{VALUE}} !important',
                ],
            ]
        );

        // Title Alignment Control
        $this->add_control(
            'title_alignment',
            [
                'label'     => esc_html__( 'Alignment', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__( 'Left', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__( 'Right', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => '',
                'condition' => ['show_title' => 'show'],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .event-box-items .event-content h3 a' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        // Title Margin Control
        $this->add_control(
            'title_margin',
            [
                'label'       => __( 'Margin', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => ['px', '%', 'em'],
                'condition'   => ['show_title' => 'show'],
                'selectors'   => [
                    '{{WRAPPER}} .event-box-items .event-content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Title Padding Control
        $this->add_control(
            'title_padding',
            [
                'label'       => __( 'Padding', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => ['px', '%', 'em'],
                'condition'   => ['show_title' => 'show'],
                'selectors'   => [
                    '{{WRAPPER}} .event-box-items .event-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Title Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'       => 'title_typography',
                'label'      => __( 'Typography', 'kidsa-core' ),
                'condition'  => ['show_title' => 'show'],
                'selector'   => '{{WRAPPER}} .event-box-items .event-content h3 a',
            ]
        );

        // Title Color Control
        $this->add_control(
            'title_color',
            [
                'label'      => __( 'Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'condition'  => ['show_title' => 'show'],
                'selectors'  => [
                    '{{WRAPPER}} .event-box-items .event-content h3 a' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        // Title Hover Color Control
        $this->add_control(
            'title_hover_color',
            [
                'label'      => __( 'Hover Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'condition'  => ['show_title' => 'show'],
                'selectors'  => [
                    '{{WRAPPER}} .event-box-items .event-content h3 a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Title Settings

        //========== Button with Background ===================================
        $this->start_controls_section(
            'button_control',
            [
                'label' => __( 'Button Settings', 'kidsa-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Show/Hide Button Control
        $this->add_control(
            'show_button',
            [
                'label'   => esc_html__( 'Show Button', 'kidsa-core' ),
                'type'    => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'show' => [
                        'title' => esc_html__( 'Show', 'kidsa-core' ),
                        'icon'  => 'eicon-check-circle',
                    ],
                    'none' => [
                        'title' => esc_html__( 'Hide', 'kidsa-core' ),
                        'icon'  => 'eicon-close-circle',
                    ],
                ],
                'default'   => 'show',
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'display: {{VALUE}} !important',
                ],
            ]
        );

        // Button Alignment Control
        $this->add_control(
            'button_alignment',
            [
                'label'     => esc_html__( 'Alignment', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'condition' => [ 'show_button' => 'show' ],
                'options'   => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'kidsa-core' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => '',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );

        // Button Color Control
        $this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Color', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'show_button' => 'show' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        // Button Background Color Control
        $this->add_control(
            'button_bg_color',
            [
                'label'     => __( 'Button Background Color', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'show_button' => 'show' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        // Button Hover Color Control
        $this->add_control(
            'button_hover_color',
            [
                'label'     => __( 'Button Hover Color', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'show_button' => 'show' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        // Button Background Hover Color Control
        $this->add_control(
            'button_bg_hover_color',
            [
                'label'     => __( 'Button Background Hover Color', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'condition' => [ 'show_button' => 'show' ],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn::before' => 'background: {{VALUE}} !important',
                    '{{WRAPPER}} .theme-btn::after' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        // Button Padding Control
        $this->add_control(
            'button_padding',
            [
                'label'     => __( 'Padding', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'condition' => [ 'show_button' => 'show' ],
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ],
            ]
        );

        // Button Margin Control
        $this->add_control(
            'button_margin',
            [
                'label'     => __( 'Margin', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'condition' => [ 'show_button' => 'show' ],
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ],
            ]
        );

        // Button Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'      => 'button_typography',
                'condition' => [ 'show_button' => 'show' ],
                'label'     => __( 'Typography', 'kidsa-core' ),
                'selector'  => '{{WRAPPER}} .theme-btn',
            ]
        );

        // Button Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'      => 'border',
                'condition' => [ 'show_button' => 'show' ],
                'selector'  => '{{WRAPPER}} .theme-btn',
            ]
        );

        // Button Border Radius Control
        $this->add_control(
            'border_radius',
            [
                'label'     => __( 'Border Radius', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::DIMENSIONS,
                'condition' => [ 'show_button' => 'show' ],
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Button


    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'service-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>

        
<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

//write js code under this line 

const eventSlider = new Swiper(".event-slider", {
    spaceBetween: 30,
    speed: 1300,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".dot",
        clickable: true,
    },

    breakpoints: {
        1199: {
            slidesPerView: 3,
        },
        991: {
            slidesPerView: 2,
        },
        767: {
            slidesPerView: 2,
        },
        575: {
            slidesPerView: 1,
        },
        0: {
            slidesPerView: 1,
        },
    },
});

//write code above the line 

  });
</script>';

?>

<?php  if ( 'style1' === $settings['style'] ) : ?>

    <!-- Event Section Start -->
    <div class="container">
        <div class="row g-4">
            <?php while ($post_data->have_posts()): $post_data->the_post(); 
                $img_id = get_post_thumbnail_id(get_the_ID());
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                $service_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_service_options', true);
                $service_icon = isset($service_single_meta_data['service_icon']) && !empty($service_single_meta_data['service_icon']) ? $service_single_meta_data['service_icon'] : '';
                $service_icon_shape = isset($service_single_meta_data['service_icon_shape']) && !empty($service_single_meta_data['service_icon_shape']) ? $service_single_meta_data['service_icon_shape'] : '';
                $service_icon_shape_2 = isset($service_single_meta_data['service_icon_shape_2']) && !empty($service_single_meta_data['service_icon_shape_2']) ? $service_single_meta_data['service_icon_shape_2'] : '';
                $service_line_shape = isset($service_single_meta_data['service_line_shape']) && !empty($service_single_meta_data['service_line_shape']) ? $service_single_meta_data['service_line_shape'] : '';
                $service_content = isset($service_single_meta_data['service_content']) && !empty($service_single_meta_data['service_content']) ? $service_single_meta_data['service_content'] : '';
                $service_content_2 = isset($service_single_meta_data['service_content_2']) && !empty($service_single_meta_data['service_content_2']) ? $service_single_meta_data['service_content_2'] : '';

            ?> 
            <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="event-box-items mt-0 box-shadow">
                    <div class="event-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="event-shape">
                            <?php if (!empty($service_line_shape) && is_array($service_line_shape)) : ?>
                            <?php $first_icon = reset($service_line_shape); ?>
                                <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                            <?php endif; ?>
                        </div>
                        <ul class="post-date">
                            <li>
                                <i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date('F j, Y');?>
                            </li>
                        </ul>
                    </div>
                    <div class="event-content">
                        <ul>
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>    
                                    <?php 
                                        $text_word_count = $this->get_settings('text_word_count');
                                        echo wp_trim_words($service_content, $text_word_count);
                                    ?>
                                </span>
                            </li>
                        </ul>
                        <h3>
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h3>
                        <div class="event-author">
                            <a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo $settings['button'];?> <i class="fa-solid fa-arrow-right-long"></i></a>
                            <div class="author-ratting">
                                <?php echo $service_content_2; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile;
                wp_reset_query(); ?>
        </div>
    </div>

    <?php  elseif ( 'style2' === $settings['style'] ) : ?>

    <div class="container">
        <div class="swiper event-slider">
            <div class="swiper-wrapper">
                <?php while ($post_data->have_posts()): $post_data->the_post(); 
                    $img_id = get_post_thumbnail_id(get_the_ID());
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                    $service_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_service_options', true);
                    $service_icon = isset($service_single_meta_data['service_icon']) && !empty($service_single_meta_data['service_icon']) ? $service_single_meta_data['service_icon'] : '';
                    $service_icon_shape = isset($service_single_meta_data['service_icon_shape']) && !empty($service_single_meta_data['service_icon_shape']) ? $service_single_meta_data['service_icon_shape'] : '';
                    $service_icon_shape_2 = isset($service_single_meta_data['service_icon_shape_2']) && !empty($service_single_meta_data['service_icon_shape_2']) ? $service_single_meta_data['service_icon_shape_2'] : '';
                    $service_line_shape = isset($service_single_meta_data['service_line_shape']) && !empty($service_single_meta_data['service_line_shape']) ? $service_single_meta_data['service_line_shape'] : '';
                    $service_content = isset($service_single_meta_data['service_content']) && !empty($service_single_meta_data['service_content']) ? $service_single_meta_data['service_content'] : '';
                    $service_content_2 = isset($service_single_meta_data['service_content_2']) && !empty($service_single_meta_data['service_content_2']) ? $service_single_meta_data['service_content_2'] : '';

                ?> 
                <div class="swiper-slide">
                    <div class="event-box-items mt-0 box-shadow style-bottom">
                        <div class="event-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            <div class="event-shape">
                            <?php if (!empty($service_line_shape) && is_array($service_line_shape)) : ?>
                            <?php $first_icon = reset($service_line_shape); ?>
                                <img src="<?php echo esc_url($first_icon); ?>" alt="icon-img">
                            <?php endif; ?>
                            </div>
                            <ul class="post-date">
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    <?php echo get_the_date('F j, Y');?>
                                </li>
                            </ul>
                        </div>
                        <div class="event-content">
                            <ul>
                                <li>
                                    <i class="fa-solid fa-location-dot"></i> <span><?php echo get_the_date('F j, Y');?></span>
                                </li>
                            </ul>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h3>
                            <div class="event-author">
                                <a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo $settings['button'];?> <i class="fa-solid fa-arrow-right-long"></i></a>
                                <div class="author-ratting">
                                    <?php echo $service_content_2; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
            <div class="swiper-dot text-center mb-55">
                <div class="dot"></div>
            </div>
        </div>
    </div>

<?php endif ;?>	


        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Service_Post());