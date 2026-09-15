<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Banner_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-banner-slider-widget';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Banner Slider', 'kidsa-core' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flash';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories()
    {
        return ['kidsa_widgets'];
    }
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		// Tab Start - 1

		$this->start_controls_section(
			'banner_slider',
			[
				'label' => esc_html__( 'Banner Slider', 'kidsa-core' ),
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
				),
			]
		);
		
		$this->add_control(
			'image',
				[
				'label' => __( 'Image', 'kidsa-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'kidsa-core' ),
				'condition'	=> ['style' => ['style2']],
			]
		);
		
		$this->add_control(
			'image2',
				[
				'label' => __( 'Image', 'kidsa-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'condition'	=> ['style' => ['style2']],
				]
		);	
		
		$this->add_control(
			'alt_text2',
			[
				'label'       => __( 'Alt text', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'kidsa-core' ),
				'condition'	=> ['style' => ['style2']],
			]
		);


		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Block', 'kidsa-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
		  'repeat', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						['block_title' => esc_html__('Projects Completed', 'kidsa-core')],
					],
				'fields' => 
					[						

						'block_bg_image' =>
						[
							'name' => 'block_bg_image',
							'label' => esc_html__('Background image', 'kidsa-core'),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],

						'block_image' =>
						[
							'name' => 'block_image',
							'label' => __( 'Image', 'kidsa-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text' =>
						
						[
						'name' => 'block_alt_text',
						'label' => esc_html__('Image Text', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
						],	

						'block_image2' =>
						[
							'name' => 'block_image2',
							'label' => __( 'Image', 'kidsa-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text2' =>
						
						[
						'name' => 'block_alt_text2',
						'label' => esc_html__('Image Text', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
						],	

						'block_image3' =>
						[
							'name' => 'block_image3',
							'label' => __( 'Image', 'kidsa-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text3' =>
						
						[
						'name' => 'block_alt_text3',
						'label' => esc_html__('Image Text', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
						],	

						'block_image4' =>
						[
							'name' => 'block_image4',
							'label' => __( 'Image', 'kidsa-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text4' =>
						
						[
						'name' => 'block_alt_text4',
						'label' => esc_html__('Image Text', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
						],	

						'block_image5' =>
						[
							'name' => 'block_image5',
							'label' => __( 'Image', 'kidsa-core' ),
							'type' => Controls_Manager::MEDIA,
							'default' => ['url' => Utils::get_placeholder_image_src(),],
						],	

						'block_alt_text5' =>
						
						[
						'name' => 'block_alt_text5',
						'label' => esc_html__('Image Text', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
						],	

						'block_subtitle' =>
						[
							'name' => 'block_subtitle',
							'label' => esc_html__('Subtitle', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
						],

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
						],

						'block_text' =>
						[
							'name' => 'block_text',
							'label' => esc_html__('Text', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
						],

						'block_button' =>
						[
							'name' => 'block_button',
							'label'       => __( 'Button', 'kidsa-core' ),
							'type'        => Controls_Manager::TEXT,
							'dynamic'     => [
								'active' => true,
							],
							'placeholder' => __( 'Enter your Button Title', 'kidsa-core' ),
							'default' => esc_html__('Read More', 'kidsa-core'),
						],
				
						'block_button_link' =>
						
						[
						  'name' => 'block_button_link',
						  'label' => __( 'Button Url', 'kidsa-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					   ],

					   'block_button2' =>
					   [
						   'name' => 'block_button2',
						   'label'       => __( 'Button', 'kidsa-core' ),
						   'type'        => Controls_Manager::TEXT,
						   'dynamic'     => [
							   'active' => true,
						   ],
						   'placeholder' => __( 'Enter your Button Title', 'kidsa-core' ),
						   'default' => esc_html__('Read More', 'kidsa-core'),
					   ],
			   
					   'block_button_link2' =>
					   
					   [
						 'name' => 'block_button_link2',
						 'label' => __( 'Button Url', 'kidsa-core' ),
						 'type' => Controls_Manager::URL,
						 'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						 'show_external' => true,
						 'default' => [
						   'url' => '',
						   'is_external' => true,
						   'nofollow' => true,
						 ],
					  ],
						
					],
				'title_field' => '{{block_title}}',
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
					'{{WRAPPER}} .hero-3 .hero-content h5' => 'display: {{VALUE}} !important',
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
				'default'   => '',
				'condition' => [ 'show_subtitle' => 'show' ],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .hero-3 .hero-content h5' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			]
		);
	
		// Subtitle Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'       => 'subtitle_typography',
				'label'      => __( 'Typography', 'kidsa-core' ),
				'selector'   => '{{WRAPPER}} .hero-3 .hero-content h5',
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
					'{{WRAPPER}} .hero-3 .hero-content h5' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content h5' => 'background-color: {{VALUE}} !important',
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
						'{{WRAPPER}} .hero-3 .hero-content h1' => 'display: {{VALUE}} !important',
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
						'{{WRAPPER}} .hero-3 .hero-content h1' => 'text-align: {{VALUE}}',
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
						'{{WRAPPER}} .hero-3 .hero-content h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
						'{{WRAPPER}} .hero-3 .hero-content h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'selector'   => '{{WRAPPER}} .hero-3 .hero-content h1',
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
						'{{WRAPPER}} .hero-3 .hero-content h1' => 'color: {{VALUE}} !important',
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
						'{{WRAPPER}} .hero-3 .hero-content h1:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content p' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content p' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'selector'   => '{{WRAPPER}} .hero-3 .hero-content p',
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
					'{{WRAPPER}} .hero-3 .hero-content p' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .hero-3 .hero-content p:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();
		// End of Text Settings


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
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>

<?php
	  echo '
	 <script>
 jQuery(document).ready(function($) {

// js code start

const sliderActive1 = ".hero-slider";
const sliderInit1 = new Swiper(sliderActive1, {
	loop: true,
	slidesPerView: 1,
	effect: "fade",
	speed: 2000,
	autoplay: {
	delay: 4000,
	disableOnInteraction: false,
	},
	pagination: {
		el: ".dot",
		clickable: true,
	},
	
});
// content animation when active start here
function animated_swiper(selector, init) {
	 let animated = function animated() {
		 $(selector + " [data-animation]").each(function () {
			 let anim = $(this).data("animation");
			 let delay = $(this).data("delay");
			 let duration = $(this).data("duration");
			 $(this)
				 .removeClass("anim" + anim)
				 .addClass(anim + " animated")
				 .css({
					 webkitAnimationDelay: delay,
					 animationDelay: delay,
					 webkitAnimationDuration: duration,
					 animationDuration: duration,
				 })
				 .one("animationend", function () {
					 $(this).removeClass(anim + " animated");
				 });
		 });
	 };
	 animated();
	 init.on("slideChange", function () {
		 $(sliderActive1 + " [data-animation]").removeClass("animated");
	 });
	 init.on("slideChange", animated);
}
animated_swiper(sliderActive1, sliderInit1);

// js code end 

  });
</script>';


?>

<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<section class="hero-section hero-3">
		<div class="swiper hero-slider">
			<div class="swiper-wrapper">
			<?php foreach($settings['repeat'] as $item):?>	
				<div class="swiper-slide">
					<div class="slider-image bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');">
						<div class="parasuit-shape" data-animation="fadeInLeft" data-delay="2.1s">
						<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
						<?php endif;?>
						</div>
						<div class="doll-shape" data-animation="fadeInLeft" data-delay="2.3s">
						<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
						<?php endif;?>
						</div>
						<div class="bus-shape" data-animation="fadeInLeft" data-delay="2.4s">
						<?php if(!empty(wp_get_attachment_url($item['block_image3']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image3']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text3'], $allowed_tags);?>">
						<?php endif;?>
						</div>
						<div class="bee-shape" data-animation="fadeInUp" data-delay="2.5s">
						<?php if(!empty(wp_get_attachment_url($item['block_image4']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image4']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text4'], $allowed_tags);?>">
						<?php endif;?>
						</div>
						<div class="star-shape" data-animation="fadeInUp" data-delay="2.4s">
						<?php if(!empty(wp_get_attachment_url($item['block_image5']['id']))): ?>
							<img src="<?php echo wp_get_attachment_url($item['block_image5']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text5'], $allowed_tags);?>">
						<?php endif;?>
						</div>
						<div class="container">
							<div class="row g-4 align-items-center">
								<div class="col-lg-8">
									<div class="hero-content">
										<h5  data-animation="fadeInUp" data-delay="1.3s"><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h5>
										<h1 data-animation="fadeInUp" data-delay="1.5s">
											<?php echo wp_kses($item['block_title'], $allowed_tags);?>
										</h1>
										<p data-animation="fadeInUp" data-delay="1.7s">
											<?php echo wp_kses($item['block_text'], $allowed_tags);?>
										</p>
										<div class="hero-button">
											<a href="<?php echo esc_url($item['block_button_link']['url']);?>" data-animation="fadeInUp" data-delay="1.7s" class="theme-btn hover-white">
												<?php echo wp_kses($item['block_button'], $allowed_tags);?>
												<i class="fa-solid fa-arrow-right-long"></i>
											</a>
											<a href="<?php echo esc_url($item['block_button_link2']['url']);?>" data-animation="fadeInUp" data-delay="1.7s" class="theme-btn transparent-2">
												<?php echo wp_kses($item['block_button2'], $allowed_tags);?>
												<i class="fa-solid fa-arrow-right-long"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="swiper-dot text-center pt-5">
				<div class="dot"></div>
			</div>
		</div>
	</section>

	<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<section class="hero-section-5 hero-5">
		<div class="swiper hero-slider">
			<div class="swiper-wrapper">
				<?php foreach($settings['repeat'] as $item):?>	
				<div class="swiper-slide">

					<div class="hero-slider-items  bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');">

						<div class="overlay-bg bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_image']['id']);?>');"></div>

							<div class="container">
								<div class="row g-4">
									<div class="col-lg-12">
										<div class="hero-content">
											<p data-animation="fadeInUp" data-delay="1.3s"><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
											<h1 data-animation="fadeInUp" data-delay="1.5s"><?php echo wp_kses($item['block_title'], $allowed_tags);?></h1>
											<div class="hero-button">
												<a href="<?php echo esc_url($item['block_button_link']['url']);?>" data-animation="fadeInUp" data-delay="1.7s" class="theme-btn hover-white">
													<?php echo wp_kses($item['block_button'], $allowed_tags);?>
													<i class="fa-solid fa-arrow-right-long"></i>
												</a>
												<a href="<?php echo esc_url($item['block_button_link2']['url']);?>" data-animation="fadeInUp" data-delay="1.7s" class="theme-btn transparent-2">
													<?php echo wp_kses($item['block_button2'], $allowed_tags);?>
													<i class="fa-solid fa-arrow-right-long"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="arrow-button">
				<div class="arrow-left-image">
					<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
					<?php endif;?>
					<button class="array-prev"><i class="fa-solid fa-arrow-left-long"></i></button>
				</div>
				<div class="arrow-right-image">
					<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
					<?php endif;?>
					<button class="array-next"><i class="fa-solid fa-arrow-right-long"></i></button>
				</div>
			</div>
		</div>
	</section>

	<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Banner_Slider());