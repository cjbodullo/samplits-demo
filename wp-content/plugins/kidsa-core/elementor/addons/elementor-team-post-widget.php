<?php
/**
 * Elementor Widget
 * @package kidsa
 * @since 1.0.0
 */

namespace Elementor;

class Team_Post extends Widget_Base
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
        return 'team-post';
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
        return esc_html__('Team Post Widgets', 'kidsa-core');
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
            'slider_settings_section',
            [
                'label' => esc_html__('Team Settings', 'kidsa-core'),
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
                    'style5'   => esc_html__( 'Style Five', 'kidsa-core' ),
                    'style6'   => esc_html__( 'Style Six', 'kidsa-core' ),
                ),
            ]
        );

        $this->add_control('column_grid', [
            'label' => esc_html__('Column Grid', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'kidsa-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'kidsa-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'kidsa-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'kidsa-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Team Grid', 'kidsa-core')
        ]);

        $this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
                  'condition'	=> ['style' => ['style1']],
				]
		);	
		
		$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'kidsa-core' ),
                'condition'	=> ['style' => ['style1']],
			]
		);

        $this->add_control(
			'image2',
				[
				  'label' => __( 'Image 2', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
                  'condition'	=> ['style' => ['style1']],
				]
		);	
		
		$this->add_control(
			'alt_text2',
			[
				'label'       => __( 'Alt text', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'kidsa-core' ),
                'condition'	=> ['style' => ['style1']],
			]
		);

        $this->add_control(
            'subtitle',
            [
                'label'       => __( 'Sub Title', 'kidsa-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your sub title', 'kidsa-core' ),
                'condition'	=> ['style' => ['style1']],
            ]
        );
    
        $this->add_control(
                'title',
                [
                    'label'       => __( 'Title', 'kidsa-core' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'dynamic'     => [
                        'active' => true,
                    ],
                    'placeholder' => __( 'Enter your title', 'kidsa-core' ),
                    'condition'	=> ['style' => ['style1']],
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
				'default' => esc_html__('All Member', 'kidsa-core'),
                'condition'	=> ['style' => ['style1']],
			]
		);	

	    $this->add_control(
			'button_link',
			[
			  'label' => __( 'Button Url', 'kidsa-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
              'condition'	=> ['style' => ['style1']],			
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
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'kidsa-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many course you want in masonry , enter -1 for unlimited course.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'kidsa-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => kidsa_core()->get_terms_names('team-cat', 'id'),
            'default' => [88],
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

        $this->end_controls_section();


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
                '{{WRAPPER}} .team-items .team-content h3 a' => 'display: {{VALUE}} !important',
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
                '{{WRAPPER}} .team-items .team-content h3 a' => 'text-align: {{VALUE}}',
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
                '{{WRAPPER}} .team-items .team-content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                '{{WRAPPER}} .team-items .team-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
            'selector'   => '{{WRAPPER}} .team-items .team-content h3 a',
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
                '{{WRAPPER}} .team-items .team-content h3 a' => 'color: {{VALUE}} !important',
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
                '{{WRAPPER}} .team-items .team-content h3 a:hover' => 'color: {{VALUE}} !important',
            ],
        ]
    );

    $this->end_controls_section();
    // End of Title Settings


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
                '{{WRAPPER}} .team-items .team-content p' => 'display: {{VALUE}} !important',
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
                '{{WRAPPER}} .team-items .team-content p' => 'text-align: {{VALUE}} !important',
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
                '{{WRAPPER}} .team-items .team-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                '{{WRAPPER}} .team-items .team-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
            ],
        ]
    );

    // Subtitle Typography Control
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name'       => 'subtitle_typography',
            'label'      => __( 'Typography', 'kidsa-core' ),
            'selector'   => '{{WRAPPER}} .team-items .team-content p',
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
                '{{WRAPPER}} .team-items .team-content p' => 'color: {{VALUE}} !important',
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
                '{{WRAPPER}} .team-items .team-content p' => 'background-color: {{VALUE}} !important',
            ],
        ]
    );

    $this->end_controls_section();

    // End of Subtitle Settings ==================



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
            'post_type' => 'team',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'team-cat',
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
 jQuery(document).ready(function($)
 {

// js code start

const teamSlider = new Swiper(".team-slider", {
    spaceBetween: 30,
    speed: 1300,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".array-prev",
        prevEl: ".array-next",
    },
    pagination: {
        el: ".dot",
        clickable: true,
    },
    breakpoints: {
        1299: {
            slidesPerView: 4,
        },
        1199: {
            slidesPerView: 3,
        },
        767: {
            slidesPerView: 2,
        },
        575: {
            slidesPerView: 2,
        },
        0: {
            slidesPerView: 1,
        },
    },
});


const teamSlider2 = new Swiper(".team-slider-2", {
    spaceBetween: 30,
    speed: 1500,
    loop: true,
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".array-prev",
        prevEl: ".array-next",
    },
    breakpoints: {
        1199: {
            slidesPerView: 3,
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


 const teamSlider3 = new Swiper(".team-slider-3", {
            spaceBetween: 30,
            speed: 1500,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".array-prev",
                prevEl: ".array-next",
            },
            breakpoints: {
                1199: {
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

//js code end

  });
</script>';


?>


<?php  if ( 'style1' === $settings['style'] ) : ?>


<div class="swiper team-slider">
    <div class="swiper-wrapper">
        <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                $team_shape = isset($team_single_meta_data['team_shape']) && !empty($team_single_meta_data['team_shape']) ? $team_single_meta_data['team_shape'] : '';

            ?>
        <div class="swiper-slide">
            <div class="team-items">
                <div class="team-image">
                    <div class="shape-img">
                        <?php if (!empty($team_shape) && is_array($team_shape)) : ?>
                        <?php $first_shape = reset($team_shape); ?>
                            <img src="<?php echo esc_url($first_shape); ?>" alt="shape-img">
                        <?php endif; ?>
                    </div>
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                    <div class="social-profile">
                        <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        <ul>
                            <?php
                                if (!empty($social_icons)) {
                                    foreach ($social_icons as $item) {
                                        printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="team-content">
                    <h3>
                        <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                    </h3>
                    <p><?php echo $team_single_meta_data['designation']; ?></p>
                </div>
            </div>
        </div>
        <?php
            endwhile;
            wp_reset_query();
        ?> 
    </div>
</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

    <div class="swiper team-slider-2">
        <div class="swiper-wrapper">
        <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                $team_shape = isset($team_single_meta_data['team_shape']) && !empty($team_single_meta_data['team_shape']) ? $team_single_meta_data['team_shape'] : '';
                $team_shape_2 = isset($team_single_meta_data['team_shape_2']) && !empty($team_single_meta_data['team_shape_2']) ? $team_single_meta_data['team_shape_2'] : '';

            ?>
            <div class="swiper-slide">
                <div class="team-box-items">
                    <div class="bg-shape-1">
                        <?php if (!empty($team_shape_2) && is_array($team_shape_2)) : ?>
                        <?php $first_shape = reset($team_shape_2); ?>
                            <img src="<?php echo esc_url($first_shape); ?>" alt="shape-img">
                        <?php endif; ?>
                    </div>
                    <div class="team-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                    </div>
                    <div class="team-content">
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                        </h3>
                        <p><?php echo $team_single_meta_data['designation']; ?></p>
                        <div class="social-icon d-flex align-items-center">
                            <?php
                                if (!empty($social_icons)) {
                                    foreach ($social_icons as $item) {
                                        printf('<a href="%1$s"><i class="%2$s"></i></a>', $item['url'], $item['icon']);
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_query();
        ?> 
        </div>
    </div>

    <?php  elseif ( 'style3' === $settings['style'] ) : ?>

        <div class="row g-4">
        <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa-team-slider-one', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                $team_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_team_options', true);
                $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                $team_shape = isset($team_single_meta_data['team_shape']) && !empty($team_single_meta_data['team_shape']) ? $team_single_meta_data['team_shape'] : '';
                $team_shape_2 = isset($team_single_meta_data['team_shape_2']) && !empty($team_single_meta_data['team_shape_2']) ? $team_single_meta_data['team_shape_2'] : '';

            ?>
            <div class="<?php echo esc_attr($settings['column_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="team-items mt-0">
                    <div class="team-image">
                        <div class="shape-img">
                            <?php if (!empty($team_shape) && is_array($team_shape)) : ?>
                            <?php $first_shape = reset($team_shape); ?>
                                <img src="<?php echo esc_url($first_shape); ?>" alt="shape-img">
                            <?php endif; ?>
                        </div>
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        <div class="social-profile">
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            <ul>
                                <?php
                                    if (!empty($social_icons)) {
                                        foreach ($social_icons as $item) {
                                            printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                        </h3>
                        <p><?php echo $team_single_meta_data['designation']; ?></p>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_query();
        ?> 
        </div>

        <?php  elseif ( 'style4' === $settings['style'] ) : ?>

            <div class="container">
                <div class="swiper team-slider">
                    <div class="swiper-wrapper">
                    <?php
                        while ($post_data->have_posts()) : $post_data->the_post();
                            $post_id = get_the_ID();
                            $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa-team-slider-one', false) : '';
                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                            $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);                     

                            $team_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_team_options', true);
                            $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                            $team_shape = isset($team_single_meta_data['team_shape']) && !empty($team_single_meta_data['team_shape']) ? $team_single_meta_data['team_shape'] : '';
                            $team_shape_2 = isset($team_single_meta_data['team_shape_2']) && !empty($team_single_meta_data['team_shape_2']) ? $team_single_meta_data['team_shape_2'] : '';

                        ?>
                        <div class="swiper-slide">
                            <div class="team-items mt-0">
                                <div class="team-image">
                                    <div class="shape-img">
                                        <?php if (!empty($team_shape) && is_array($team_shape)) : ?>
                                        <?php $first_shape = reset($team_shape); ?>
                                            <img src="<?php echo esc_url($first_shape); ?>" alt="shape-img">
                                        <?php endif; ?>
                                    </div>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                    <div class="social-profile">
                                        <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                        <ul>
                                            <?php
                                                if (!empty($social_icons)) {
                                                    foreach ($social_icons as $item) {
                                                        printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                                    }
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <h3>
                                        <a href="<?php echo get_the_permalink(); ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                                    </h3>
                                    <p><?php echo $team_single_meta_data['designation']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_query();
                        ?> 
                    </div>
                    <div class="swiper-dot text-center pt-5">
                        <div class="dot"></div>
                    </div>
                </div>
            </div>

<?php endif ;?>	


        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Team_Post());