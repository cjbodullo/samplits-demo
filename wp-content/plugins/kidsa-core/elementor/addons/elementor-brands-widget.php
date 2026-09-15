<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Brands extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-brands-widget';
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
		return esc_html__( 'Brands Slide', 'kidsa-core' );
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
			'brands',
			[
				'label' => esc_html__( 'Brands Slider', 'kidsa-core' ),
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
				'placeholder' => __( 'Enter your sub-title', 'kidsa-core' ),
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

						'block_icons' =>
						[
							'name' => 'block_icons',
							'label' => esc_html__('Enter The icons', 'kidsa-core'),
							'type' => Controls_Manager::ICONS,							
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
 jQuery(document).ready(function($) {

// js code start

const instagramBannerSlider = new Swiper(".instagram-banner-slider", {
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
	breakpoints: {
		1399: {
			slidesPerView: 6,
		},
		1199: {
			slidesPerView: 5,
		},
		991: {
			slidesPerView: 4,
		},
		767: {
			slidesPerView: 3,
		},
		650: {
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

const brandSlider = new Swiper(".brand-slider", {
	spaceBetween: 30,
	speed: 1300,
	loop: true,
	centeredSlides: true,
	autoplay: {
		delay: 2000,
		disableOnInteraction: false,
	},

	breakpoints: {
		1199: {
			slidesPerView: 5,
		},
		991: {
			slidesPerView: 4,
		},
		767: {
			slidesPerView: 3,
		},
		575: {
			slidesPerView: 2,
		},
		0: {
			slidesPerView: 1,
		},
	},
});

// js code end 

  });
</script>';


?>

<?php  if ( 'style1' === $settings['style'] ) : ?>	

	<div class="instagram-banner fix">
            <div class="instagram-wrapper">
				<?php if($settings['title']): ?>
                <h3 class="text-center wow fadeInUp" data-wow-delay=".3s"><?php echo esc_attr($settings['title']);?></h3>
				<?php endif; ?>
                <div class="swiper instagram-banner-slider">
                    <div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
                        <div class="swiper-slide">
                            <div class="instagram-banner-items">
                                <div class="banner-image">
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
                                    <a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="icon">
                                        <i class="<?php echo str_replace("icon ", " ", esc_attr( $item['block_icons']['value']));?>"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="brand-section fix">
            <div class="container">
                <div class="brand-wrapper">
                    <h6 class="text-center wow fadeInUp" data-wow-delay=".3s"><?php echo esc_attr($settings['title']);?></h6>
                    <div class="swiper brand-slider">
                        <div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
                            <div class="swiper-slide">
                                <div class="brand-image">
                                <img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
                                </div>
                            </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<?php  elseif ( 'style3' === $settings['style'] ) : ?>

		<div class="instagram-banner fix">
			<?php if($settings['title']): ?>
            <div class="section-title text-center style-2">
                <span class="wow fadeInUp"><?php echo esc_attr($settings['subtitle']);?></span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s"><?php echo esc_attr($settings['title']);?></h2>
            </div>
			<?php endif; ?>
            <div class="instagram-wrapper style-2">
                <div class="swiper instagram-banner-slider">
                    <div class="swiper-wrapper">
						<?php foreach($settings['repeat'] as $item):?>	
                        <div class="swiper-slide">
                            <div class="instagram-banner-items">
                                <div class="banner-image">
									<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
                                    <a href="index.html" class="icon">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
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

Plugin::instance()->widgets_manager->register_widget_type(new Brands());