<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Faq_With_Image extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-faq-with-image-widget';
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
		return esc_html__( 'Faq', 'kidsa-core' );
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
			'faq_with_image',
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
			'image',
				[
				  'label' => __( 'Shape Image', 'kidsa-core' ),
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
				  'label' => __( 'Shape Image', 'kidsa-core' ),
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

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Main Image', 'kidsa-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  'condition'	=> ['style' => ['style1']],
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
				'condition'	=> ['style' => ['style1']],
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
		$sentence = wp_kses_post( preg_replace('/[^a-zA-Z0-9_ -]/s',' ', 'subtitle') );
		$sentence .= 'faq-';
		$faq_id = str_replace(' ', '', strtolower($sentence));
		$faq_id .= mt_rand();
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

	       <!--<< Faq Section Start >>-->
		   <section class="faq-section fix">
            <div class="container">
                <div class="faq-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="faq-left">
                                <ul class="nav" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#trust" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">
                                            Trust & Safety
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#general" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                            General
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#programs" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                            Programs
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#kindergarten" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                            Kindergarten
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
							<div class="faq-content style-3">
								<div class="faq-accordion">
									<div class="accordion" id="accordionExample-st-2<?php print esc_attr( $faq_id ); ?>">
										<div class="bd-faq-group">
											<?php 
											foreach ( $settings['repeat'] as $key => $item ) :
												$active_class = ($key == 0 ) ? '' : 'collapsed';
												$show = ($key == 0 ) ? 'show' : '';
												?>
										<div class="accordion-item mb-3">
											<h5 class="accordion-header" id="heading<?php print esc_attr($item['_id']); ?>-st-2">
												<button class="accordion-button <?php echo esc_attr( $active_class ); ?>" type="button" data-bs-toggle="collapse"
													data-bs-target="#collapse<?php print esc_attr($item['_id']); ?>-st-2" aria-expanded="true"
													aria-controls="collapse<?php print esc_attr($item['_id']); ?>-st-2">

													<?php echo wp_kses($item['block_title'], $allowed_tags);?>

												</button>
											</h5>
											<div id="collapse<?php print esc_attr($item['_id']); ?>-st-2" class="accordion-collapse collapse <?php print esc_attr($show); ?>"
												aria-labelledby="heading<?php print esc_attr($item['_id']); ?>-st-2" data-bs-parent="#accordionExample-st-2<?php print esc_attr( $faq_id ); ?>">
												<div class="accordion-body">

													<?php echo wp_kses($item['block_text'], $allowed_tags);?>

												</div>
											</div>
										</div>
										<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

<div class="faq-content style-3">
  <div class="faq-accordion">
  	<div class="accordion" id="accordionExample-st-2<?php print esc_attr( $faq_id ); ?>">
		<div class="bd-faq-group">
			<?php 
			foreach ( $settings['repeat'] as $key => $item ) :
				$active_class = ($key == 0 ) ? '' : 'collapsed';
				$show = ($key == 0 ) ? 'show' : '';
				?>
		<div class="accordion-item mb-3">
			<h5 class="accordion-header" id="heading<?php print esc_attr($item['_id']); ?>-st-2">
				<button class="accordion-button <?php echo esc_attr( $active_class ); ?>" type="button" data-bs-toggle="collapse"
					data-bs-target="#collapse<?php print esc_attr($item['_id']); ?>-st-2" aria-expanded="true"
					aria-controls="collapse<?php print esc_attr($item['_id']); ?>-st-2">

					<?php echo wp_kses($item['block_title'], $allowed_tags);?>

				</button>
			</h5>
			<div id="collapse<?php print esc_attr($item['_id']); ?>-st-2" class="accordion-collapse collapse <?php print esc_attr($show); ?>"
				aria-labelledby="heading<?php print esc_attr($item['_id']); ?>-st-2" data-bs-parent="#accordionExample-st-2<?php print esc_attr( $faq_id ); ?>">
				<div class="accordion-body">

					<?php echo wp_kses($item['block_text'], $allowed_tags);?>

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

Plugin::instance()->widgets_manager->register_widget_type(new Faq_With_Image());