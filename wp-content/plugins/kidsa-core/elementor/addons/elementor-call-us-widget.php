<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Call_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-call-us-widget';
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
		return esc_html__( 'Call Us', 'kidsa-core' );
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
			'call_us',
			[
				'label' => esc_html__( 'Call Us', 'kidsa-core' ),
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
			
		   ]
		);

		$this->end_controls_section();


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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'background: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon:hover' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon:hover' => 'background: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'icon_typography',
				'condition'    => array( 'show_icon' => 'show' ),
				'label'    => __( 'Typography', 'kidsa-core' ),
				'selector' => '{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon',
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'icon_border',
				'condition'    => array( 'show_icon' => 'show' ),
				'selector' => '{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);


		$this->end_controls_section();		
		
		//End of icon


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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a' => 'text-align: {{VALUE}}',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'selector'   => '{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content h5 a:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			]
		);

		// Subtitle Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'       => 'subtitle_typography',
				'label'      => __( 'Typography', 'kidsa-core' ),
				'selector'   => '{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-wrapper .about-content .about-author .author-icon .content span' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();

		// End of Subtitle Settings ==================


	
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


	
	<div class="about-wrapper">
		<div class="about-content">
			<div class="about-author mt-0">
				<div class="author-icon wow fadeInUp" data-wow-delay=".5s">
					<div class="icon">
						<i class="fa-solid fa-phone"></i>
					</div>
					<div class="content">
						<span><?php echo $settings['title'];?></span>
						<h5>
							<a href="<?php echo esc_url($settings['button_link']['url']);?>"><?php echo $settings['button'];?></a>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Call_Us());