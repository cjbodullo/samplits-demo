<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Project_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-project-slider-widget';
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
		return esc_html__( 'Project Slider', 'kidsa-core' );
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
			'project-slider',
			[
				'label' => esc_html__( 'project slider', 'kidsa-core' ),
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
                ),
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

                        'block_button_link' =>
						
						[
						  'name' => 'block_button_link',
						  'label' => __( 'Url', 'kidsa-core' ),
						  'type' => Controls_Manager::URL,
						  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
						  'show_external' => true,
						  'default' => [
							'url' => '#',
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

 const programSlider = new Swiper(".program-slider", {
	spaceBetween: 30,
	speed: 1300,
	loop: true,
	autoplay: {
		delay: 2000,
		disableOnInteraction: false,
	},
	pagination: {
		el: ".dot2",
		clickable: true,
	},

	breakpoints: {
		1199: {
			slidesPerView: 4,
		},
		991: {
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

		<div class="program-wrapper-5 mt-0">
			<div class="row">
				<div class="swiper program-slider">
					<div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
						<div class="swiper-slide">
							<div class="programer-box-items-5">
								<div class="thumb">
								<?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
								<?php endif;?>
								</div>
								<div class="program-content">
									<h3>
										<a href="<?php echo esc_url($item['block_button_link']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a>
									</h3>
									<span><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></span>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="swiper-dot style-2 text-center mt-5">
					<div class="dot2"></div>
				</div>
			</div>
		</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Project_Slider());