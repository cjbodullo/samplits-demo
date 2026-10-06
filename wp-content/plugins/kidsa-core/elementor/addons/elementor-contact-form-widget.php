<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Contact_Form extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-contact-form-widget';
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
		return esc_html__( 'Contact Form', 'kidsa-core' );
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
			'contact_form',
			[
				'label' => esc_html__( 'Text Slider', 'kidsa-core' ),
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

		
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your sub title', 'kidsa-core' ),
				'condition'	=> ['style' => ['style1']],
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
					'condition'	=> ['style' => ['style1']],
				]
			);

		$this->add_control(
			'contact_form_7',
			[
				'label'       => __( 'Contact Form 7 Url', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'kidsa-core' ),
				'default'     => __( '', 'kidsa-core' ),
				'condition'	=> ['style' => ['style1','style2']],
			]
		);

		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
			]
		);

		$this->end_controls_section();


		//========== Background Color Settings ==========================
		$this->start_controls_section(
			'bg_color_block_settings',
			[
				'label' => __( 'Background Color Settings', 'kidsa-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Section Background Color Control
		$this->add_control(
			'block_bg_color',
			[
				'label'     => __( 'Background Color', 'kidsa-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-wrapper' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->end_controls_section();
		// End of Background Color Settings




	
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

		<section class="contact-section section-padding">
            <div class="container">
                <div class="contact-wrapper style-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="contact-content">
                                <div class="section-title">
                                    <span class="text-white wow fadeInUp"><?php echo $settings['subtitle'];?></span>
                                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s"><?php echo $settings['title'];?></h2>
                                </div>
								<?php echo do_shortcode( $settings['contact_form_7'] );?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-image wow fadeInUp" data-wow-delay=".4s">
								<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
									<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
								<?php endif;?>
                                <div class="cricle-shape">
								<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
									<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
								<?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

	<div class="contact-wrapper-2">
		<div class="contact-content">
			<?php echo do_shortcode( $settings['contact_form_7'] );?>
		</div>
	</div>

<?php endif ;?>	

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Contact_Form());