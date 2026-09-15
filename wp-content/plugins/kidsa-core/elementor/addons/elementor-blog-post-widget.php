<?php
/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */

namespace Elementor;

class Blog_Post extends Widget_Base
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
        return 'kidsa-blog-post-widget';
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
        return esc_html__('Blog Post', 'kidsa-core');
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
                    'style5'   => esc_html__( 'Style Five', 'kidsa-core' ),
                ),
            ]
        );
        
        $this->add_control('blog_grid', [
            'label' => esc_html__('Blog Grid', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'kidsa-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'kidsa-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'kidsa-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'kidsa-core'),
                'col-lg-12' => esc_html__('col-lg-12', 'kidsa-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Blog Grid', 'kidsa-core')
        ]);   
        
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
   
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'kidsa-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('offset', [
            'label' => esc_html__('Offset Posts', 'kidsa-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '0',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'kidsa-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => kidsa_core()->get_terms_names('category', 'id'),
            'default' => [12],
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
            'default' => 'DESC',
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
            'image_thumb_display',
            [
                'label' => esc_html__('Image Display', 'kidsa-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'kidsa-core'),
            ]
        );
        
        $this->add_control(
            'thumb_date',
            [
                'label' => esc_html__('Thumb Date Show/Hide', 'kidsa-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'kidsa-core'),
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
            'category_display',
            [
                'label' => esc_html__('Category Display', 'kidsa-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('Show  Or Hide Category.', 'kidsa-core'),
            ]
        );

          $this->add_control(
            'tag_display',
            [
                'label' => esc_html__('Tags Display', 'kidsa-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('Show  Or Hide Tags.', 'kidsa-core'),
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a' => 'display: {{VALUE}} !important',
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a' => 'text-align: {{VALUE}}',
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                'selector'   => '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a',
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a' => 'color: {{VALUE}} !important',
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content h3 a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Title Settings


        //========== Text Settings ==========================
        $this->start_controls_section(
            'text_settings',
            [
                'label' => __( 'Text Settings', 'kidsa-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Show/Hide Text Control
        $this->add_control(
            'show_text',
            [
                'label'     => esc_html__( 'Show Text', 'kidsa-core' ),
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
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content p' => 'display: {{VALUE}} !important',
                ],
            ]
        );

        // Text Alignment Control
        $this->add_control(
            'text_alignment',
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
                'condition' => ['show_text' => 'show'],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content p' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );

        // Text Margin Control
        $this->add_control(
            'text_margin',
            [
                'label'       => __( 'Margin', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => ['px', '%', 'em'],
                'condition'   => ['show_text' => 'show'],
                'selectors'   => [
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Text Padding Control
        $this->add_control(
            'text_padding',
            [
                'label'       => __( 'Padding', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => ['px', '%', 'em'],
                'condition'   => ['show_text' => 'show'],
                'selectors'   => [
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Text Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'       => 'text_typography',
                'label'      => __( 'Typography', 'kidsa-core' ),
                'condition'  => ['show_text' => 'show'],
                'selector'   => '{{WRAPPER}} .news-wrapper .news-single-items .news-content p',
            ]
        );

        // Text Color Control
        $this->add_control(
            'text_color',
            [
                'label'      => __( 'Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'condition'  => ['show_text' => 'show'],
                'separator'  => 'after',
                'selectors'  => [
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content p' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        // Text Hover Color Control
        $this->add_control(
            'text_hover_color',
            [
                'label'      => __( 'Hover Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'condition'  => ['show_text' => 'show'],
                'separator'  => 'after',
                'selectors'  => [
                    '{{WRAPPER}} .news-wrapper .news-single-items .news-content p:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Text Settings


        //========== icon Settings===================================
		
		$this->start_controls_section(
			'icon_control',
			array(
				'label' => __( 'Icon Settings', 'kidsa-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'show_icon',
			array(
				'label' => esc_html__( 'Show Icon', 'kidsa-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'kidsa-core' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'kidsa-core' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i' => 'display: {{VALUE}} !important',
				),
			)
		);
		
		$this->add_control(
			'icon_alignment',
			array(
				'label' => esc_html__( 'Alignment', 'kidsa-core' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'condition'    => array( 'show_icon' => 'show' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'kidsa-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'kidsa-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'kidsa-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i, 
                    .news-wrapper .news-right-items .news-content ul li i' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
		
		$this->add_control(
			'icon_color',
			array(
				'label'     => __( ' Color', 'kidsa-core' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i,
                    .news-wrapper .news-right-items .news-content ul li i' => 'color: {{VALUE}} !important',

				),
			)
		);
		
		$this->add_control(
			'icon_bgcolor',
			array(
				'label'     => __( 'Background Color', 'kidsa-core' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i' => 'background: {{VALUE}} !important',

				),
			)
		);
		
		
		$this->add_control(
			'icon_hover_color',
			array(
				'label'     => __( ' Hover Color', 'kidsa-core' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i:hover' => 'color: {{VALUE}} !important',

				),
			)
		);
		
		$this->add_control(
			'icon_hover_bgcolor',
			array(
				'label'     => __( 'Background Hover Color', 'kidsa-core' ),
				'condition'    => array( 'show_icon' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i:hover' => 'background: {{VALUE}} !important',

				),
			)
		);
		
		$this->add_control(
			'icon_padding',
			array(
				'label'     => __( 'Padding', 'kidsa-core' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'icon_margin',
			array(
				'label'     => __( 'Margin', 'kidsa-core' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'icon_typography',
				'condition'    => array( 'show_icon' => 'show' ),
				'label'    => __( 'Typography', 'kidsa-core' ),
				'selector' => '{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i',
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'icon_border',
				'condition'    => array( 'show_icon' => 'show' ),
				'selector' => '{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i',
			)
		);
		
		$this->add_control(
			'icon_border_radius',
			array(
				'label'     => __( 'Icon Border Radius', 'kidsa-core' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_icon' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .news-wrapper .news-single-items .news-content ul li i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);


		$this->end_controls_section();		
		
		//End of icon

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
        $offset = $settings['offset'];

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'offset' => $offset,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
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

const newsSlider = new Swiper(".news-slider", {
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

        <div class="news-wrapper">
            <div class="row g-4 align-items-center">
            <?php while ($post_data->have_posts()):$post_data->the_post(); 
                   $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                   $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_blog_12', false) : '';
                   $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                   $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                   $comments_count = get_comments_number(get_the_ID());
                   $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                   ?> 
                <div class="<?php echo esc_attr($settings['blog_grid']); ?> wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-single-items">
                        <?php if(!empty($settings['image_thumb_display'])) : ?>
                        <div class="news-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        </div>
                        <?php endif; ?>
                        <div class="news-content">
                            <ul>
                                <?php if(!empty($settings['tag_display'])) : ?>
                                <li>
                                    <i class="fas fa-tag"></i> 
                                    <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            $first_tag = reset($post_tags);
                                            echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                        } else {
                                            echo "No tags found";
                                        }
                                    ?>                       
                                </li>
                                <?php endif; ?>

                                <?php if(!empty($settings['category_display'])) : ?>
                                <li>
                                    <i class="fa-solid fa-folder-open"></i> 
                                    <?php
                                        $post_category = get_the_category();
                                        if ($post_category) {
                                            $first_category = reset($post_category);
                                            echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                        } else {
                                            echo "No category found";
                                        }
                                    ?>                       
                                </li>
                                <?php endif; ?>

                                <?php if(!empty($settings['thumb_date'])) : ?>
                                <li>
                                    <i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date('F j, Y');?>                        
                                </li>
                                <?php endif; ?>
                            </ul>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p>
                                <?php print wp_trim_words( get_the_content(), 20, null ); ?>
                            </p>
                            <div class="post-author-items">
                                <div class="post-items">
                                    <div class="thumb">
                                        <?php
                                            $author_id = get_the_author_meta('ID');
                                            $author_avatar = get_avatar_url($author_id);
                                            if ($author_avatar) {
                                                echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr(get_the_author()) . '" />';
                                            } else {                                         
                                                echo 'No Image';
                                            }
                                        ?>
                                    </div>
                                    <div class="content">
                                        <span>By Author</span>
                                        <h6><?php the_author(); ?></h6>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="theme-btn">
                                <?php echo $settings['button'];?> <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
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

        <?php  elseif ( 'style2' === $settings['style'] ) : ?>

        <div class="news-wrapper">
                <div class="row g-4 align-items-center">                
                    <div class="col-xl-12 mt-5 mt-xl-0">
                        <?php while ($post_data->have_posts()):$post_data->the_post(); 
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_blog_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                        ?> 
                        <div class="news-right-items wow fadeInUp" data-wow-delay=".4s">
                            <?php if(!empty($settings['image_thumb_display'])) : ?>
                            <div class="news-thumb">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="news-content">
                                <ul>
                                    <?php if(!empty($settings['tag_display'])) : ?>
                                    <li>
                                        <i class="fas fa-tag"></i> 
                                        <?php
                                            $post_tags = get_the_tags();
                                            if ($post_tags) {
                                                $first_tag = reset($post_tags);
                                                echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                            } else {
                                                echo "No tags found";
                                            }
                                        ?>                       
                                    </li>
                                    <?php endif; ?>

                                    <?php if(!empty($settings['category_display'])) : ?>
                                    <li>
                                        <i class="fa-solid fa-folder-open"></i> 
                                        <?php
                                            $post_category = get_the_category();
                                            if ($post_category) {
                                                $first_category = reset($post_category);
                                                echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                            } else {
                                                echo "No category found";
                                            }
                                        ?>                       
                                    </li>
                                    <?php endif; ?>

                                    <?php if(!empty($settings['thumb_date'])) : ?>
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date('F j, Y');?>                        
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="post-items">
                                    <div class="thumb">
                                        <?php
                                            $author_id = get_the_author_meta('ID');
                                            $author_avatar = get_avatar_url($author_id);
                                            if ($author_avatar) {
                                                echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr(get_the_author()) . '" />';
                                            } else {                                         
                                                echo 'No Image';
                                            }
                                        ?>
                                    </div>
                                    <div class="content">
                                        <span>By Author</span>
                                        <h6><?php the_author(); ?></h6>
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
            </div>

        <?php  elseif ( 'style3' === $settings['style'] ) : ?>

            <div class="row">
                <?php while ($post_data->have_posts()):$post_data->the_post(); 
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_blog_12', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                ?> 
                <div class="<?php echo esc_attr($settings['blog_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="news-card-items">
                        <div class="news-image">
                            <?php if(!empty($settings['image_thumb_display'])) : ?>
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            <div class="news-layer-wrapper">
                                <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                            </div>
                            <?php endif; ?>
                            <div class="post">
                                <?php if(!empty($settings['tag_display'])) : ?>
                                <span class="me-3">
                                    <i class="me-1 fa-solid fa-tags"></i> 
                                    <?php
                                        $post_tags = get_the_tags();
                                        if ($post_tags) {
                                            $first_tag = reset($post_tags);
                                            echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                        } else {
                                            echo "No tags found";
                                        }
                                    ?>  
                                </span>
                                <?php endif; ?>
                                <?php if(!empty($settings['category_display'])) : ?>
                                    <span>
                                        <i class="me-1 fa-solid fa-folder-open"></i> 
                                        <?php
                                            $post_category = get_the_category();
                                            if ($post_category) {
                                                $first_category = reset($post_category);
                                                echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                            } else {
                                                echo "No category found";
                                            }
                                        ?>                       
                                    </span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="news-content">
                            <ul>
                                <?php if(!empty($settings['thumb_date'])) : ?>
                                <li>
                                    <i class="fas fa-calendar-alt"></i>
                                    <?php echo get_the_date('F j, Y');?>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <i class="far fa-user"></i>
                                    By <?php the_author(); ?>
                                </li>
                            </ul>
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3"><?php echo $settings['button'];?> <i class="fas fa-long-arrow-right"></i></a>
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
                <div class="swiper news-slider">
                    <div class="swiper-wrapper">
                        <?php while ($post_data->have_posts()):$post_data->the_post(); 
                            $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                            $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_blog_12', false) : '';
                            $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                            $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                            $comments_count = get_comments_number(get_the_ID());
                            $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                        ?> 
                        <div class="swiper-slide">
                            <div class="news-card-items mt-0">
                                <div class="news-image">
                                    <?php if(!empty($settings['image_thumb_display'])) : ?>
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                    <div class="news-layer-wrapper">
                                        <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                        <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                        <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                        <div class="news-layer-image" style="background-image: url('<?php echo esc_url($img_url); ?>');"></div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="post">
                                        <?php if(!empty($settings['tag_display'])) : ?>
                                       <span class="me-3">
                                       <i class="me-1 fa-solid fa-tags"></i> 
                                       <?php
                                            $post_tags = get_the_tags();
                                            if ($post_tags) {
                                                $first_tag = reset($post_tags);
                                                echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                            } else {
                                                echo "No tags found";
                                            }
                                        ?>  
                                       </span>
                                       <?php endif; ?>
                                        <?php if(!empty($settings['category_display'])) : ?>
                                        <span>
                                            <i class="me-1 fa-solid fa-folder-open"></i> 
                                            <?php
                                                $post_category = get_the_category();
                                                if ($post_category) {
                                                    $first_category = reset($post_category);
                                                    echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                                } else {
                                                    echo "No category found";
                                                }
                                            ?>                       
                                        </span>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="news-content">
                                    <ul>
                                        <?php if(!empty($settings['thumb_date'])) : ?>
                                        <li>
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php echo get_the_date('F j, Y');?>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <i class="far fa-user"></i>
                                            By <?php the_author(); ?>
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <a href="<?php the_permalink(); ?>" class="theme-btn-2 mt-3"><?php echo $settings['button'];?> <i class="fas fa-long-arrow-right"></i></a>
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

        <?php  elseif ( 'style5' === $settings['style'] ) : ?>
            <div class="news-wrapper">
                <div class="row g-4 align-items-center">
                    <?php while ($post_data->have_posts()):$post_data->the_post(); 
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_blog_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';
                    ?>
                    <div class="<?php echo esc_attr($settings['blog_grid']); ?> wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-right-items style-2">
                            <?php if(!empty($settings['image_thumb_display'])) : ?>
                            <div class="news-thumb">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                            </div>
                            <?php endif; ?>
                            <div class="news-content">
                                <ul>
                                    <?php if(!empty($settings['tag_display'])) : ?>
                                    <li>
                                            <i class="fas fa-tag"></i> 

                                        <?php
                                            $post_tags = get_the_tags();
                                            if ($post_tags) {
                                                $first_tag = reset($post_tags);
                                                echo '<a href="' . get_tag_link($first_tag->term_id) . '">' . $first_tag->name . '</a>';
                                            } else {
                                                echo "No tags found";
                                            }
                                        ?>                               
                                    </li>
                                    <?php endif; ?>
                                    <?php if(!empty($settings['category_display'])) : ?>
                                    <li>
                                        <i class="fa-solid fa-folder-open"></i> 
                                        <?php
                                            $post_category = get_the_category();
                                            if ($post_category) {
                                                $first_category = reset($post_category);
                                                echo '<a href="' . get_tag_link($first_category->term_id) . '">' . $first_category->name . '</a>';
                                            } else {
                                                echo "No category found";
                                            }
                                        ?>                       
                                    </li>
                                    <?php endif; ?>

                                    <?php if(!empty($settings['thumb_date'])) : ?>
                                    <li>
                                        <i class="fa-solid fa-calendar-days"></i> 
                                        <?php echo get_the_date('F j, Y');?>                    
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="post-items">
                                    <div class="thumb">
                                        <?php
                                            $author_id = get_the_author_meta('ID');
                                            $author_avatar = get_avatar_url($author_id);
                                            if ($author_avatar) {
                                                echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr(get_the_author()) . '" />';
                                            } else {                                         
                                                echo 'No Image';
                                            }
                                        ?>
                                    </div>
                                    <div class="content">
                                        <span>By Admin</span>
                                        <h6><?php the_author(); ?></h6>
                                    </div>
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
        <?php endif ;?>	

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Blog_Post());