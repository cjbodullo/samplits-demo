<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Team_Members extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-team-members-widget';
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
		return esc_html__( 'Team Members', 'kidsa-core' );
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
			'team-members',
			[
				'label' => esc_html__( 'Team members', 'kidsa-core' ),
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
            'description' => esc_html__('Select Team Grid', 'kidsa-core'),
			'condition'	=> ['style' => ['style3']],
        ]);

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

						'block_title' =>
						[
							'name' => 'block_title',
							'label' => esc_html__('Title', 'kidsa-core'),
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

                        'block_show' =>
                        [
                            'name' => 'block_show',
                            'label' => __( 'Show Share Icon', 'kidsa-core' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'label_on' => __( 'Show', 'kidsa-core' ),
                            'label_off' => __( 'Hide', 'kidsa-core' ),
                            'return_value' => 'yes',
                            'default' => 'yes',
                        ],

                        'block_button_link' =>
						
						[
						  'name' => 'block_button_link',
						  'label' => __( 'Facebook Url', 'kidsa-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '#',
							'is_external' => true,
							'nofollow' => true,
						  ],
					   ],
				
						'block_button_link2' =>
						
						[
						  'name' => 'block_button_link2',
						  'label' => __( 'Twitter Url', 'kidsa-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					   ],
				
						'block_button_link3' =>
						
						[
						  'name' => 'block_button_link3',
						  'label' => __( 'Youtube Url', 'kidsa-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					   ],
				
						'block_button_link4' =>
						
						[
						  'name' => 'block_button_link4',
						  'label' => __( 'linkedIn Url', 'kidsa-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						  ],
					   ],
				
						'block_button_link5' =>
						
						[
						  'name' => 'block_button_link5',
						  'label' => __( 'Instagram Url', 'kidsa-core' ),
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

//js code end

  });
</script>';


?>


<?php  if ( 'style1' === $settings['style'] ) : ?>

<div class="swiper team-slider">
    <div class="swiper-wrapper">
    <?php foreach($settings['repeat'] as $item):?>	
        <div class="swiper-slide">
            <div class="team-items">
                <div class="team-image">
                    <div class="shape-img">
                        <?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
                            <img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
                        <?php endif;?>
                    </div>
                    <?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
                        <img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
                    <?php endif;?>

                    <?php  if ( 'yes' === $item['block_show'] ) : ?>
                     
                    <div class="social-profile">
                        <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                        <ul>
                            <?php if (!empty($item['block_button_link']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="fab fa-facebook-f"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link2']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link2']['url']);?>"><i class="fab fa-twitter"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link3']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link3']['url']);?>"><i class="fab fa-youtube"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link4']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link4']['url']);?>"><i class="fab fa-linkedin-in"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link5']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link5']['url']);?>"><i class="fab fa-instagram"></i></a></li>
							<?php endif; ?> 
                        </ul>
                    </div>

                    <?php endif ;?>	

                </div>
                <div class="team-content">
                    <h3>
                        <?php echo wp_kses($item['block_title'], $allowed_tags);?>
                    </h3>
                    <p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

    <div class="swiper team-slider-2">
        <div class="swiper-wrapper">
        <?php foreach($settings['repeat'] as $item):?>	
            <div class="swiper-slide">
                <div class="team-box-items">
                    <div class="bg-shape-1">
						<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
                            <img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
                        <?php endif;?>
                    </div>
                    <div class="team-image">
					<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
                        <img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
                    <?php endif;?>
                    </div>
                    <div class="team-content">
						<h3>
							<?php echo wp_kses($item['block_title'], $allowed_tags);?>
						</h3>
						<p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
						<?php  if ( 'yes' === $item['block_show'] ) : ?>
                        <div class="social-icon d-flex align-items-center">
							<?php if (!empty($item['block_button_link']['url'])) : ?>
                                <a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="fab fa-facebook-f"></i></a>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link2']['url'])) : ?>
                                <a href="<?php echo esc_url($item['block_button_link2']['url']);?>"><i class="fab fa-twitter"></i></a>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link3']['url'])) : ?>
                                <a href="<?php echo esc_url($item['block_button_link3']['url']);?>"><i class="fab fa-youtube"></i></a>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link4']['url'])) : ?>
                                <a href="<?php echo esc_url($item['block_button_link4']['url']);?>"><i class="fab fa-linkedin-in"></i></a>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link5']['url'])) : ?>
                                <a href="<?php echo esc_url($item['block_button_link5']['url']);?>"><i class="fab fa-instagram"></i></a>
							<?php endif; ?> 
                        </div>
						<?php endif; ?> 
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php  elseif ( 'style3' === $settings['style'] ) : ?>

        <div class="row g-4">
            <?php foreach($settings['repeat'] as $item):?>	
            <div class="<?php echo esc_attr($settings['column_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="team-items mt-0">
                    <div class="team-image">
                        <div class="shape-img">
						<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
                            <img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
                        <?php endif;?>
                        </div>
						<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
                        	<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
                    	<?php endif;?>
						<?php  if ( 'yes' === $item['block_show'] ) : ?>
                        <div class="social-profile">
                            <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                            <ul>
							<?php if (!empty($item['block_button_link']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="fab fa-facebook-f"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link2']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link2']['url']);?>"><i class="fab fa-twitter"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link3']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link3']['url']);?>"><i class="fab fa-youtube"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link4']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link4']['url']);?>"><i class="fab fa-linkedin-in"></i></a></li>
							<?php endif; ?> 
							<?php if (!empty($item['block_button_link5']['url'])) : ?>
                                <li><a href="<?php echo esc_url($item['block_button_link5']['url']);?>"><i class="fab fa-instagram"></i></a></li>
							<?php endif; ?> 
                            </ul>
                        </div>
						<?php endif; ?> 
                    </div>
                    <div class="team-content">
						<h3>
							<?php echo wp_kses($item['block_title'], $allowed_tags);?>
						</h3>
						<p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php  elseif ( 'style4' === $settings['style'] ) : ?>

            <div class="container">
                <div class="swiper team-slider">
                    <div class="swiper-wrapper">
                    <?php foreach($settings['repeat'] as $item):?>	
                        <div class="swiper-slide">
                            <div class="team-items mt-0">
                                <div class="team-image">
                                    <div class="shape-img">
									<?php if(!empty(wp_get_attachment_url($item['block_image2']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
									<?php endif;?>
                                    </div>
									<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
									<?php  if ( 'yes' === $item['block_show'] ) : ?>
                                    <div class="social-profile">
                                        <span class="plus-btn"><i class="fas fa-share-alt"></i></span>
                                        <ul>
										<?php if (!empty($item['block_button_link']['url'])) : ?>
											<li><a href="<?php echo esc_url($item['block_button_link']['url']);?>"><i class="fab fa-facebook-f"></i></a></li>
										<?php endif; ?> 
										<?php if (!empty($item['block_button_link2']['url'])) : ?>
											<li><a href="<?php echo esc_url($item['block_button_link2']['url']);?>"><i class="fab fa-twitter"></i></a></li>
										<?php endif; ?> 
										<?php if (!empty($item['block_button_link3']['url'])) : ?>
											<li><a href="<?php echo esc_url($item['block_button_link3']['url']);?>"><i class="fab fa-youtube"></i></a></li>
										<?php endif; ?> 
										<?php if (!empty($item['block_button_link4']['url'])) : ?>
											<li><a href="<?php echo esc_url($item['block_button_link4']['url']);?>"><i class="fab fa-linkedin-in"></i></a></li>
										<?php endif; ?> 
										<?php if (!empty($item['block_button_link5']['url'])) : ?>
											<li><a href="<?php echo esc_url($item['block_button_link5']['url']);?>"><i class="fab fa-instagram"></i></a></li>
										<?php endif; ?> 
										</ul>
                                    </div>
									<?php endif; ?>
                                </div>
                                <div class="team-content">
								<h3>
									<?php echo wp_kses($item['block_title'], $allowed_tags);?>
								</h3>
								<p><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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

Plugin::instance()->widgets_manager->register_widget_type(new Team_Members());