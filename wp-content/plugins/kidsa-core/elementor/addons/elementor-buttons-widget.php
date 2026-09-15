<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Buttons extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-buttons-widget';
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
		return esc_html__( 'Buttons', 'kidsa-core' );
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
			'buttons',
			[
				'label' => esc_html__( 'Buttons', 'kidsa-core' ),
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'text-align: {{VALUE}} !important',
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'background: {{VALUE}} !important',
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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
				'selector'  => '{{WRAPPER}} .custom-hero-button .video-btn',
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
					'{{WRAPPER}} .custom-hero-button .video-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
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




// js code end 

  });
</script>';


?>

<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn">
		<?php echo $settings['button'];?>
		<i class="fa-solid fa-arrow-right-long"></i>
	</a>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn bg-white">
		<?php echo $settings['button'];?>
		<i class="fa-solid fa-arrow-right-long"></i>
	</a>

<?php  elseif ( 'style3' === $settings['style'] ) : ?>

	<div class="section-title-area">
		<div class="video-box">
			<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="video-btn ripple video-popup">
				<i class="fa-solid fa-play"></i>
			</a>
		</div>
	</div>

<?php  elseif ( 'style4' === $settings['style'] ) : ?>


		<div class="custom-hero-button">
			<span class="button-text wow fadeInUp" data-wow-delay=".8s">
				<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="video-btn ripple video-popup">
					<i class="fa-solid fa-play"></i>
				</a>
				<span class="ms-4 d-line"><?php echo $settings['button'];?></span>
			</span>
		</div> 

<?php  elseif ( 'style5' === $settings['style'] ) : ?>

	<a href="<?php echo esc_url($settings['button_link']['url']);?>" class="theme-btn transparent">
		<?php echo $settings['button'];?>
		<i class="fa-solid fa-arrow-right-long"></i>
	</a>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Buttons());