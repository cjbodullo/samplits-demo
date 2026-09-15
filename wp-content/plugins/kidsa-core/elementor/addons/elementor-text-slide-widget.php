<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Text_Slide extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-text-slide-widget';
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
		return esc_html__( 'Text Slide', 'kidsa-core' );
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
			'text_slide',
			[
				'label' => esc_html__( 'Text Slide', 'kidsa-core' ),
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

						'block_text' =>

						[
							'name' => 'block_text',
							'label' => esc_html__('Text', 'kidsa-core'),
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

<?php  if ( 'style1' === $settings['style'] ) : ?>	


	<div class="marque-section section-padding pt-0">
		<div class="container-fluid">
			<div class="marquee-wrapper text-slider">
				<div class="marquee-inner to-left">
					<ul class="marqee-list d-flex">
						<li class="marquee-item">
							<?php foreach($settings['repeat'] as $item):?>	
							<span class="text-slider"><img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>"></span><span class="text-slider text"><?php echo wp_kses($item['block_text'], $allowed_tags);?> </span>
							<?php endforeach; ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>		

	<div class="marque-section-2 pb-2 fix">
            <div class="container-fluid">
                <div class="marquee-wrapper text-slider">
                    <div class="marquee-inner to-left">
                        <ul class="marqee-list d-flex">
                            <li class="marquee-item">
							<?php foreach($settings['repeat'] as $item):?>	
							<span class="text-slider"><img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>"></span><span class="text-slider text-color-2"><?php echo wp_kses($item['block_text'], $allowed_tags);?> </span>
							<?php endforeach; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Text_Slide());