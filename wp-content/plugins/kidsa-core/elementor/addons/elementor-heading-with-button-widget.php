<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Heading_With_Button extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-heading-with-button-widget';
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
		return esc_html__( 'Heading With Button', 'kidsa-core' );
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
		return 'eicon-welcome';
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
			'heading_with_button',
			[
				'label' => esc_html__( 'Title', 'kidsa-core' ),
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
			'text_align',
			[
				'label'   => esc_html__( 'Text Align', 'kidsa-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'center'   => esc_html__( 'Center', 'kidsa-core' ),
					'left'   => esc_html__( 'Left', 'kidsa-core' ),
					'right'   => esc_html__( 'Right', 'kidsa-core' ),
					'condition'	=> ['style' => ['style2']],
				),
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
					'{{WRAPPER}} .section-title span' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .section-title span' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
				],
			]
		);

		// Subtitle Typography Control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'       => 'subtitle_typography',
				'label'      => __( 'Typography', 'kidsa-core' ),
				'selector'   => '{{WRAPPER}} .section-title span',
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
					'{{WRAPPER}} .section-title span' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .section-title span' => 'background-color: {{VALUE}} !important',
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
					'{{WRAPPER}} .section-title h2' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .section-title h2' => 'text-align: {{VALUE}}',
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
					'{{WRAPPER}} .section-title h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .section-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'selector'   => '{{WRAPPER}} .section-title h2',
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
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .section-title h2:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button:hover' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button::before' => 'background: {{VALUE}} !important',
					'{{WRAPPER}} .array-button button::after' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .array-button button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .array-button button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
				'selector'  => '{{WRAPPER}} .array-button button',
				'selector'  => '{{WRAPPER}} .theme-btn',
			]
		);

		// Button Border Control
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'      => 'border',
				'condition' => [ 'show_button' => 'show' ],
				'selector'  => '{{WRAPPER}} .array-button button',
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
					'{{WRAPPER}} .array-button button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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



<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<div class="section-title-area">
		<div class="section-title">
			<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>
			<h2 class="wow fadeInUp" data-wow-delay=".3s">
				<?php echo $settings['title'];?>
			</h2>
		</div>
		<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn wow fadeInUp" data-wow-delay=".5s">
			<?php echo $settings['button'];?>
			<i class="fa-solid fa-arrow-right-long"></i>
		</a>
	</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="section-title text-<?php echo $settings['text_align']; ?>">
		<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>  
		<h2 class="wow fadeInUp" data-wow-delay=".3s">
			<?php echo $settings['title'];?>
		</h2>  
	</div>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

	<div class="section-title-area">
		<div class="section-title">
			<span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>  
			<h2 class="wow fadeInUp" data-wow-delay=".3s">
				<?php echo $settings['title'];?>
			</h2>  
		</div>
		<div class="array-button wow fadeInUp" data-wow-delay=".5s">
			<button class="array-prev"><i class="fal fa-arrow-left"></i></button>
			<button class="array-next"><i class="fal fa-arrow-right"></i></button>
		</div>
	</div>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>

	<div class="section-title-area">
		<div class="section-title">
			<span class="text-white wow fadeInUp"><?php echo $settings['subtitle'];?></span>  
			<h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
				<?php echo $settings['title'];?>
			</h2>  
		</div>
		<div class="array-button wow fadeInUp" data-wow-delay=".5s">
			<button class="array-prev border-white"><i class="fal fa-arrow-right"></i></button>
			<button class="array-next"><i class="fal fa-arrow-left"></i></button>
		</div>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Heading_With_Button());