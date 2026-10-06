<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Pricing extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-pricing-widget';
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
		return esc_html__( 'Pricing Widgets', 'kidsa-core' );
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
			'pricing',
			[
				'label' => esc_html__( 'Pricing Tab', 'kidsa-core' ),
			]
		);		
		

		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text3',
			[
				'label'       => __( 'Alt text', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'kidsa-core' ),
			]
		);

		$this->end_controls_section();

		// Tab Start - 2

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Month Block', 'kidsa-core' ),
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

				

					'block_subtitle' =>
					[
						'name' => 'block_subtitle',
						'label' => esc_html__('Tag Title', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
					],

					'block_title' =>
					[
						'name' => 'block_title',
						'label' => esc_html__('Price', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
					],

					'block_title1' =>
					[
						'name' => 'block_title1',
						'label' => esc_html__('Class', 'kidsa-core'),
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

	$this->start_controls_section(
		'content_section_1',
		[
			'label' => __( 'Year Block', 'kidsa-core' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);	

	$this->add_control(
		'repeat_1', 
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

				

					'block_subtitle' =>
					[
						'name' => 'block_subtitle',
						'label' => esc_html__('Tag Title', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
					],

					'block_title' =>
					[
						'name' => 'block_title',
						'label' => esc_html__('Price', 'kidsa-core'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'kidsa-core')
					],

					'block_title1' =>
					[
						'name' => 'block_title1',
						'label' => esc_html__('Class', 'kidsa-core'),
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




// js code end 

  });
</script>';


?>




<section class="pricing-section section-padding">
            <div class="tree-shape float-bob-x">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
            </div>
            <div class="pencil-shape">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
            </div>
            <div class="top-shape">
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
            </div>
            <div class="container">
                <div class="pricing-wrapper">
                    <div class="section-title text-center mb-0"> 
                        <span class="wow fadeInUp">Our pricing</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Select a plan according to <br> your requirements</h2>
                    </div>
                    <ul class="nav" role="tablist">
                        <li class="nav-item wow fadeInUp" data-wow-delay=".3s" role="presentation">
                            <a href="#monthly" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">
                                Monthly
                            </a>
                        </li>
                        <li class="nav-item wow fadeInUp" data-wow-delay=".5s" role="presentation">
                            <a href="#yearly" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                Yearly
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="monthly" class="tab-pane fade show active" role="tabpanel">
                        <div class="row">
						<?php foreach($settings['repeat'] as $item):?>	
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="pricing-items <?php echo wp_kses($item['block_title1'], $allowed_tags);?>">
                                    <div class="icon bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');">
                                        <i class="icon-icon-22"></i>
                                     </div>
                                     <div class="element-shape">
									 <?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
                                     </div>
                                    <div class="pricing-header">
                                        <h4><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h4>
                                        <h2><?php echo wp_kses($item['block_title'], $allowed_tags);?> <span>/monthly</span></h2>
                                    </div>
                                    <ul class="pricing-list">
										<?php echo wp_kses($item['block_text'], $allowed_tags);?>
                                    </ul>
                                    <a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="theme-btn">
                                        Choose Plan <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                    <div id="yearly" class="tab-pane fade" role="tabpanel">
                        <div class="row">
						<?php foreach($settings['repeat_1'] as $item):?>	
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="pricing-items <?php echo wp_kses($item['block_title1'], $allowed_tags);?>">
                                    <div class="icon bg-cover" style="background-image: url('<?php echo wp_get_attachment_url($item['block_bg_image']['id']);?>');">
                                        <i class="icon-icon-22"></i>
                                     </div>
                                     <div class="element-shape">
									 <?php if(!empty(wp_get_attachment_url($item['block_image']['id']))): ?>
										<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
									<?php endif;?>
                                     </div>
                                    <div class="pricing-header">
                                        <h4><?php echo wp_kses($item['block_subtitle'], $allowed_tags);?></h4>
                                        <h2><?php echo wp_kses($item['block_title'], $allowed_tags);?> <span>/yearly</span></h2>
                                    </div>
                                    <ul class="pricing-list">
										<?php echo wp_kses($item['block_text'], $allowed_tags);?>
                                    </ul>
                                    <a href="<?php echo esc_url($item['block_button_link']['url']);?>" class="theme-btn">
                                        Choose Plan <i class="fa-solid fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
							<?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>





             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Pricing());