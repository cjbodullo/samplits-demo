<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Theme_Icon_Box extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-theme-icon-box-widget';
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
		return esc_html__( 'Theme Icon Box', 'kidsa-core' );
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
			'theme_icon_box',
			[
				'label' => esc_html__( 'Theme Icon Box', 'kidsa-core' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'kidsa-core' ),
			]
		);

		$this->add_control(
			'icons',
				[
					'label' => esc_html__('Enter The icons', 'kidsa-core'),
					'type' => Controls_Manager::ICONS,
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'background: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon:hover' => 'color: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon:hover' => 'background: {{VALUE}} !important',

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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'icon_typography',
				'condition'    => array( 'show_icon' => 'show' ),
				'label'    => __( 'Typography', 'kidsa-core' ),
				'selector' => '{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon',
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'icon_border',
				'condition'    => array( 'show_icon' => 'show' ),
				'selector' => '{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5' => 'text-align: {{VALUE}}',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'selector'   => '{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items .content h5:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'selector'   => '{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .about-activities-wrapper.style-2 .activities-content .icon-items p:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();
		// End of Text Settings




	
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

<div class="about-activities-wrapper style-2">
	<div class="activities-content">
		<div class="icon-items">
			<div class="icon">
				<i class="<?php echo str_replace("icon ", "", esc_attr( $settings['icons']['value']));?>"></i>
			</div>
			<div class="content">
				<h5><?php echo $settings['title'];?></h5>
				<p><?php echo $settings['subtitle'];?></p>
			</div>
		</div>
	</div>
</div>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Theme_Icon_Box());