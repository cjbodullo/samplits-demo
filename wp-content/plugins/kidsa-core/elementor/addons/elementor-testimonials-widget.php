<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Testimonials extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-testimonials-widget';
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
		return esc_html__( 'Testimonials Widget', 'kidsa-core' );
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
			'testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'kidsa-core' ),
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
				'condition'	=> ['style' => ['style2']],
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
					'condition'	=> ['style' => ['style2']],
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
				'type'        => Controls_Manager::TEXTAREA,
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
				'type'        => Controls_Manager::TEXTAREA,
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

						'block_rating' =>
						[
							'name' => 'block_rating',
							'label'   => esc_html__( 'Select Rating', 'kidsa-core' ),
							'type'    => Controls_Manager::SELECT,
							'default' => 'rat1',
							'options' => array(
								'rat1'   => esc_html__( 'Rating One', 'kidsa-core' ),
								'rat2'   => esc_html__( 'Rating Two', 'kidsa-core' ),
								'rat3'   => esc_html__( 'Rating Three', 'kidsa-core' ),
								'rat4'   => esc_html__( 'Rating Four', 'kidsa-core' ),
								'rat5'   => esc_html__( 'Rating Five', 'kidsa-core' ),
							),
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

						'block_title1' =>
						[
							'name' => 'block_title1',
							'label' => esc_html__('Title', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
						],
						
						'block_subtitle1' =>
						[
							'name' => 'block_subtitle1',
							'label' => esc_html__('Subtitle', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
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

						'block_title2' =>
						[
							'name' => 'block_title2',
							'label' => esc_html__('Style Class', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
						],
						'block_title3' =>
						[
							'name' => 'block_title3',
							'label' => esc_html__('Background Class', 'kidsa-core'),
							'type' => Controls_Manager::TEXTAREA,
							'default' => esc_html__('', 'kidsa-core')
						],
						
					],
				'title_field' => '{{block_title}}',
			 ]
	);
		
		
	$this->end_controls_section();	


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
				'{{WRAPPER}} .testimonial-items .testimonial-content p' => 'display: {{VALUE}} !important',
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
				'{{WRAPPER}} .testimonial-items .testimonial-content p' => 'text-align: {{VALUE}} !important',
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
				'{{WRAPPER}} .testimonial-items .testimonial-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'{{WRAPPER}} .testimonial-items .testimonial-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
			'selector'   => '{{WRAPPER}} .testimonial-items .testimonial-content p',
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
				'{{WRAPPER}} .testimonial-items .testimonial-content p' => 'color: {{VALUE}} !important',
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
				'{{WRAPPER}} .testimonial-items .testimonial-content p:hover' => 'color: {{VALUE}} !important',
			],
		]
	);

	$this->end_controls_section();
	// End of Text Settings


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
					'{{WRAPPER}} .testimonial-items .testimonial-content h6' => 'display: {{VALUE}} !important',
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
					'{{WRAPPER}} .testimonial-items .testimonial-content h6' => 'text-align: {{VALUE}}',
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
					'{{WRAPPER}} .testimonial-items .testimonial-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
					'{{WRAPPER}} .testimonial-items .testimonial-content h6' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
				'selector'   => '{{WRAPPER}} .testimonial-items .testimonial-content h6',
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
					'{{WRAPPER}} .testimonial-items .testimonial-content h6' => 'color: {{VALUE}} !important',
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
					'{{WRAPPER}} .testimonial-items .testimonial-content h6:hover' => 'color: {{VALUE}} !important',
				],
			]
		);
	
		$this->end_controls_section();
		// End of Title Settings
	

	
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

const testimonialSlider = new Swiper(".testimonial-slider", {
	spaceBetween: 30,
	speed: 1500,
	loop: true,
	autoplay: {
		delay: 1000,
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

const testimonialSlider2 = new Swiper(".testimonial-slider-2", {
	spaceBetween: 30,
	speed: 1500,
	loop: true,
	autoplay: {
		delay: 1000,
		disableOnInteraction: false,
	},
	navigation: {
		nextEl: ".array-prev",
		prevEl: ".array-next",
	},
});

const testimonialSlider3 = new Swiper(".testimonial-slider-3", {
	spaceBetween: 30,
	speed: 1500,
	loop: true,
	autoplay: {
		delay: 1000,
		disableOnInteraction: false,
	},
	navigation: {
		nextEl: ".array-prev",
		prevEl: ".array-next",
	},
});

// js code end 

  });
</script>';


?>

<?php  if ( 'style1' === $settings['style'] ) : ?>	

<div class="swiper testimonial-slider">
		<div class="swiper-wrapper">
		<?php foreach($settings['repeat'] as $item):?>	
			<div class="swiper-slide">
				<div class="testimonial-items <?php echo wp_kses($item['block_title2'], $allowed_tags);?>">
					<div class="icon">
					<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
					<?php endif;?>
					</div>
					<div class="testimonial-bg <?php echo wp_kses($item['block_title3'], $allowed_tags);?>"></div>
					<div class="testimonial-content">
						<p>
							<?php echo wp_kses($item['block_text'], $allowed_tags);?> 
						</p>
						<h6><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h6>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="swiper-dot text-center pt-5">
			<div class="dot"></div>
		</div>
	</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>		

    <section class="testimonial-section-2 fix">
            <div class="container">
                <div class="testimonial-wrapper section-padding">
                    <div class="shape-1">
					<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
					<?php endif;?>
                    </div>
                    <div class="shape-2">
					<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
					<?php endif;?>
                    </div>
                    <div class="testimonial-bg"></div>
                    <div class="section-title text-center">
                        <span class="wow fadeInUp"><?php echo $settings['subtitle'];?></span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s"><?php echo $settings['title'];?></h2>
                    </div>
                    <div class="swiper testimonial-slider-2">
                        <div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
                            <div class="swiper-slide">
                                <div class="testimonial-box-items">
                                    <p>
										<?php echo wp_kses($item['block_text'], $allowed_tags);?> 
                                    </p>
                                    <div class="client-info">
									<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
                                        <div class="content">
                                            <h5><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h5>
                                            <p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                    <div class="array-button">
                        <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                        <button class="array-next"><i class="fal fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </section>

		<?php  elseif ( 'style3' === $settings['style'] ) : ?>	

			<div class="testimonial-wrapper-2">
				<div class="testimonial-rights">
					<div class="array-button">
						<button class="array-prev"><i class="fa-solid fa-arrow-up"></i></button>
						<button class="array-next"><i class="fa-solid fa-arrow-down"></i></button>
					</div>				
					<div class="swiper testimonial-slider-3">
						<div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
							<div class="swiper-slide">
								<div class="testimonial-content mt-4 mt-md-0">
									<div class="star">
									<?php if ( 'rat1' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat2' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat3' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat4' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="far fa-star"></i>
									<?php elseif ( 'rat5' === $item['block_rating'] ) : ?>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									<?php endif; ?>
									</div>
									<p>
										<?php echo wp_kses($item['block_text'], $allowed_tags);?> 
									</p>
									<div class="client-info">
										<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
											<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
										<?php endif;?>
										<div class="content">
											<h5><?php echo wp_kses($item['block_title1'], $allowed_tags);?></h5>
                                            <p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
										</div>
									</div>
									<div class="icon">
										<img src="<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>" alt="">
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					
				</div>
			</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Testimonials());