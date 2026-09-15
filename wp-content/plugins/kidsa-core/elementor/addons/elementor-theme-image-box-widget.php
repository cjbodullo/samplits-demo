<?php
namespace Elementor;

/**
 * Elementor Widget
 * @package Kidsa
 * @since 1.0.0
 */ 
 
class Theme_Image_Box extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'kidsa-theme-image-box-widget';
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
		return esc_html__( 'Theme Image Box', 'kidsa-core' );
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
			'theme_image_box',
			[
				'label' => esc_html__( 'Theme Image Box', 'kidsa-core' ),
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
					'style6'   => esc_html__( 'Style Six', 'kidsa-core' ),
					'style7'   => esc_html__( 'Style Seven', 'kidsa-core' ),
					'style8'   => esc_html__( 'Style Eight', 'kidsa-core' ),
				),
			]
		);

		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image2',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text2',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image3',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text3',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'image4',
				[
				  'label' => __( 'Image', 'infotek-core' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);	
		
		$this->add_control(
			'alt_text4',
			[
				'label'       => __( 'Alt text', 'infotek-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Your Text', 'infotek-core' ),
			]
		);

		$this->add_control(
			'video_link',
			[
			  'label' => __( 'Video Url', 'kidsa-core' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'kidsa-core' ),
			  'show_external' => true,
			  'default' => [
				'url' => 'https://www.youtube.com/watch?v=Cn4G2lZ_g2I',
				'is_external' => true,
				'nofollow' => true,
			  ],
			
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

	<div class="about-wrapper">
		<div class="about-image-items">
			<div class="about-image wow fadeInUp" data-wow-delay=".3s">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			</div>
			<div class="about-image-2">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
			</div>
			<div class="border-shape-1">
			<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
			<?php endif;?>
			</div>
		</div>  
    </div>

	<?php  elseif ( 'style2' === $settings['style'] ) : ?>	

	<div class="about-activities-wrapper">
		<div class="activities-img-items">
			<div class="activities-image">
			<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
			<?php endif;?>
			</div>
			<div class="radius-shape">
			<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
			<?php endif;?>
			</div>
		</div>       
    </div>

	<?php  elseif ( 'style3' === $settings['style'] ) : ?>	

		<div class="about-activities-wrapper style-2">
			<div class="activities-image-items">
				<div class="main-img">
				<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php endif;?>
				</div>
				<div class="radius-shape">
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
				</div>
				<div class="circle-shape">
				<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
				<?php endif;?>
				</div>
			</div>
        </div>

	<?php  elseif ( 'style4' === $settings['style'] ) : ?>	
	
		<div class="about-wrapper-2">
			<div class="about-image-items">
				<div class="border-shape">
				<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php endif;?>
				</div>
				<div class="thumb">
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
				</div>
			</div>
		</div>

	<?php  elseif ( 'style5' === $settings['style'] ) : ?>	

		<div class="feature-items">
			<div class="bg-1">
				<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php endif;?>
			</div>
			<div class="feature-image">
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
			</div>
		</div>

	<?php  elseif ( 'style6' === $settings['style'] ) : ?>	

		<div class="about-wrapper-3">
			<div class="about-image-area">
				<div class="radius-shape">
				<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php endif;?>
				</div>
				<div class="circle-shape">
				<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
					<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
				<?php endif;?>
				</div>
				<div class="about-image">
					<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
						<img class="wow fadeInUp" data-wow-delay=".3s" src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
					<?php endif;?>
					<div class="about-image-2 wow fadeInLeft" data-wow-delay=".5s">
					<?php  if ( !empty(esc_url($settings['image4']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image4']['id']);?>" alt="<?php echo esc_attr($settings['alt_text4']);?>"/>
					<?php endif;?>
					</div>
				</div>
			</div>
		</div>

		<?php  elseif ( 'style7' === $settings['style'] ) : ?>	

			<div class="about-wrapper-5">
				<div class="about-image wow fadeInUp" data-wow-delay=".3s">
					<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
					<?php endif;?>
					<a href="<?php echo esc_url($settings['video_link']['url']) ;?>" class="video-btn ripple video-popup">
						<i class="fa-duotone fa-play"></i>
					</a>
					<div class="yellow-shape">
					<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
					<?php endif;?>
					</div>
				</div>
			</div>

	<?php  elseif ( 'style8' === $settings['style'] ) : ?>	

		<div class="choose-us-wrapper">
			<div class="row">
				<div class="col-md-6 wow fadeInUp" data-wow-delay=".3s">
					<div class="choose-us-image">
						<?php  if ( !empty(esc_url($settings['image']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
						<?php endif;?>
						<div class="radius-shape">
						<?php  if ( !empty(esc_url($settings['image2']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
						<?php endif;?>
						</div>
					</div>
				</div>
				<div class="col-md-6 wow fadeInUp" data-wow-delay=".5s">
					<div class="choose-us-image style-2">
						<?php  if ( !empty(esc_url($settings['image3']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
						<?php endif;?>
						<div class="radius-shape-2">
						<?php  if ( !empty(esc_url($settings['image4']['id']) )) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image4']['id']);?>" alt="<?php echo esc_attr($settings['alt_text4']);?>"/>
						<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif ;?>

             
		<?php 
	}


}

Plugin::instance()->widgets_manager->register_widget_type(new Theme_Image_Box());