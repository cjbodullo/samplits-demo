<?php
/**
 * Elementor Widget
 * @package kidsa
 * @since 1.0.0
 */

namespace Elementor;
class Project_Post extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'kidsa-project-post-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Project Post Widgets', 'kidsa-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-post';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['kidsa_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'kidsa-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
		
        $this->add_control('service_grid', [
            'label' => esc_html__('Project Grid', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'col-lg-2' => esc_html__('col-lg-2', 'kidsa-core'),
                'col-lg-3' => esc_html__('col-lg-3', 'kidsa-core'),
                'col-lg-4' => esc_html__('col-lg-4', 'kidsa-core'),
                'col-lg-6' => esc_html__('col-lg-6', 'kidsa-core'),
            ),
            'default' => 'col-lg-4',
            'description' => esc_html__('Select Grid', 'kidsa-core'),
        ]);

        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'kidsa-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'kidsa-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => kidsa_core()->get_terms_names('project-cat', 'id'),
            'default' => [68],
            'include' => [],
            'exclude' => [],
            'description' => esc_html__('Select category as you want, leave it blank for all categories', 'kidsa-core'),
        ]);  
        $this->add_control('order', [
            'label' => esc_html__('Order', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'kidsa-core'),
                'DESC' => esc_html__('Descending', 'kidsa-core'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'kidsa-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'kidsa-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'kidsa-core'),
                'title' => esc_html__('Title', 'kidsa-core'),
                'date' => esc_html__('Date', 'kidsa-core'),
                'rand' => esc_html__('Random', 'kidsa-core'),
                'comment_count' => esc_html__('Most Comments', 'kidsa-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'kidsa-core')
        ]);
		$this->add_control('offset', [
            'label' => esc_html__('Offset Posts', 'kidsa-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for offset post.')
        ]);
        $this->add_control(
			'text_word_count',
			[
				'label'       => __( 'Text Word Count', 'kidsa-core' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type Text Words Number', 'kidsa-core' ),
				'default'   => 7,				
			]
		);
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'kidsa-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'kidsa-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'kidsa-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'kidsa-core'),
                    'center' => esc_html__('Center Align', 'kidsa-core'),
                    'right' => esc_html__('Right Align', 'kidsa-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'kidsa-core'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
            ]
        );
        $this->end_controls_section();



        //========== Background Color Settings ==========================
        $this->start_controls_section(
            'card_bg_color_block_settings',
            [
                'label' => __( 'Card Background Color Settings', 'kidsa-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Section Background Color Control
        $this->add_control(
            'card_block_bg_color',
            [
                'label'     => __( 'Card Background Color', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .program-box-items .program-bg' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .program-box-items-2 .program-bg' => 'background-color: {{VALUE}} !important',
                    '{{WRAPPER}} .clases-items .clases-bg' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        // Card Background Color Control
        $this->add_control(
            'card_block_btn_color',
            [
                'label'     => __( 'Card Button Color', 'kidsa-core' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .program-box-items .program-content .arrow-icon' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Background Color Settings


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
                    '{{WRAPPER}} h4 a' => 'display: {{VALUE}} !important',
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
                    '{{WRAPPER}} h4 a' => 'text-align: {{VALUE}}',
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
                    '{{WRAPPER}} h4 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                    '{{WRAPPER}} h4 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                'selector'   => '{{WRAPPER}} h4 a',
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
                    '{{WRAPPER}} h4 a' => 'color: {{VALUE}} !important',
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
                    '{{WRAPPER}} h4 a:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Title Settings


        // Subtitle Settings ================== 

        $this->start_controls_section(
            'subtitle_settings',
            [
                'label' => __( 'Sub Title Setting', 'kidsa-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Show Sub Title Control
        $this->add_control(
            'show_subtitle',
            [
                'label'     => esc_html__( 'Show Sub Title', 'kidsa-core' ),
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
                    '{{WRAPPER}} .program-box-items .program-content span' => 'display: {{VALUE}} !important',
                ],
            ]
        );

        // Subtitle Alignment Control
        $this->add_control(
            'subtitle_alignment',
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
                'default'   => 'left',
                'condition' => [ 'show_subtitle' => 'show' ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .program-box-items .program-content span' => 'text-align: {{VALUE}} !important',
                ],
            ]
        );

        // Subtitle Padding Control
        $this->add_control(
            'subtitle_padding',
            [
                'label'       => __( 'Padding', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => [ 'px', '%', 'em' ],
                'condition'   => [ 'show_subtitle' => 'show' ],
                'selectors'   => [
                    '{{WRAPPER}} .program-box-items .program-content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Subtitle Margin Control
        $this->add_control(
            'subtitle_margin',
            [
                'label'       => __( 'Margin', 'kidsa-core' ),
                'type'        => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'  => [ 'px', '%', 'em' ],
                'condition'   => [ 'show_subtitle' => 'show' ],
                'selectors'   => [
                    '{{WRAPPER}} .program-box-items .program-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
                ],
            ]
        );

        // Subtitle Typography Control
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'       => 'subtitle_typography',
                'label'      => __( 'Typography', 'kidsa-core' ),
                'selector'   => '{{WRAPPER}} .program-box-items .program-content span',
                'condition'  => [ 'show_subtitle' => 'show' ],
            ]
        );

        // Subtitle Color Control
        $this->add_control(
            'subtitle_color',
            [
                'label'      => __( 'Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'separator'  => 'after',
                'condition'  => [ 'show_subtitle' => 'show' ],
                'selectors'  => [
                    '{{WRAPPER}} .program-box-items .program-content span' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        // Subtitle Background Color Control
        $this->add_control(
            'subtitle_bg_color',
            [
                'label'      => __( 'Background Color', 'kidsa-core' ),
                'type'       => \Elementor\Controls_Manager::COLOR,
                'separator'  => 'after',
                'condition'  => [ 'show_subtitle' => 'show' ],
                'selectors'  => [
                    '{{WRAPPER}} .program-box-items .program-content span' => 'background-color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();

        // End of Subtitle Settings ==================


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
                    '{{WRAPPER}} p' => 'display: {{VALUE}} !important',
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
                    '{{WRAPPER}} p' => 'text-align: {{VALUE}} !important',
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
                    '{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                    '{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important',
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
                'selector'   => '{{WRAPPER}} p',
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
                    '{{WRAPPER}} p' => 'color: {{VALUE}} !important',
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
                    '{{WRAPPER}} p:hover' => 'color: {{VALUE}} !important',
                ],
            ]
        );

        $this->end_controls_section();
        // End of Text Settings


		

    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        $offset = $settings['offset'];

        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];

        //setup query
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
			'offset' => $offset,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>

<?php
	  echo '
	 <script>
 jQuery(document).ready(function($)
 {

// js code start

const clasesSlider = new Swiper(".clases-slider", {
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
        1199: {
            slidesPerView: 3,
        },
        991: {
            slidesPerView: 2,
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

<div class="row">

    <?php while ($post_data->have_posts()):$post_data->the_post(); 
    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

    $comments_count = get_comments_number(get_the_ID());
    $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

    $project_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_project_options', true);
    $project_icon = isset($project_single_meta_data['project_icon']) && !empty($project_single_meta_data['project_icon']) ? $project_single_meta_data['project_icon'] : '';
    $project_subtitle = isset($project_single_meta_data['project_subtitle']) && !empty($project_single_meta_data['project_subtitle']) ? $project_single_meta_data['project_subtitle'] : '';
    $project_subtitle_2 = isset($project_single_meta_data['project_subtitle_2']) && !empty($project_single_meta_data['project_subtitle_2']) ? $project_single_meta_data['project_subtitle_2'] : '';
    $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
    ?> 

    <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 color-class wow fadeInUp" data-wow-delay=".3s">
        <div class="program-box-items">
            <div class="program-bg"></div>
            <div class="program-image">
                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
            </div>
            <div class="program-content text-center">
                <h4>
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </h4>
                <span><?php echo $project_subtitle_2; ?></span>
                <p>
                    <?php echo wp_trim_words($project_content, $this->get_settings('text_word_count')); ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="arrow-icon">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    </div>
    <?php
        endwhile;
        wp_reset_query();
    ?> 
</div>

<?php  elseif ( 'style2' === $settings['style'] ) : ?>

    <div class="row">
        <?php while ($post_data->have_posts()):$post_data->the_post(); 
        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

        $comments_count = get_comments_number(get_the_ID());
        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

        $project_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_project_options', true);
        $project_icon = isset($project_single_meta_data['project_icon']) && !empty($project_single_meta_data['project_icon']) ? $project_single_meta_data['project_icon'] : '';
        $project_subtitle = isset($project_single_meta_data['project_subtitle']) && !empty($project_single_meta_data['project_subtitle']) ? $project_single_meta_data['project_subtitle'] : '';
        $project_subtitle_2 = isset($project_single_meta_data['project_subtitle_2']) && !empty($project_single_meta_data['project_subtitle_2']) ? $project_single_meta_data['project_subtitle_2'] : '';
        $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
        ?> 
        <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 color-class wow fadeInUp" data-wow-delay=".2s">
            <div class="program-box-items-2">
                <div class="program-bg"></div>
                <div class="icon">
                    <i class="<?php echo $project_icon; ?>"></i>
                </div>
                <div class="content text-center">
                    <h4>
                        <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                    </h4>
                    <span><?php echo $project_subtitle_2; ?></span>
                    <p>
                    <?php echo wp_trim_words($project_content, $this->get_settings('text_word_count')); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="arrow-icon">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php
        endwhile;
        wp_reset_query();
    ?> 
    </div>

    <?php  elseif ( 'style3' === $settings['style'] ) : ?>

        <div class="swiper clases-slider">
            <div class="swiper-wrapper">
            <?php while ($post_data->have_posts()):$post_data->the_post(); 
                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                $project_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_project_options', true);
                $project_icon = isset($project_single_meta_data['project_icon']) && !empty($project_single_meta_data['project_icon']) ? $project_single_meta_data['project_icon'] : '';
                $project_subtitle = isset($project_single_meta_data['project_subtitle']) && !empty($project_single_meta_data['project_subtitle']) ? $project_single_meta_data['project_subtitle'] : '';
                $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                ?> 
                <div class="swiper-slide">
                    <div class="clases-items mt-0">
                        <div class="clases-bg style-2"></div>
                        <div class="clases-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                        </div>
                        <div class="clases-content">
                            <h4>
                                <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h4>
                            <p><?php echo wp_trim_words($project_content, $this->get_settings('text_word_count')); ?> </p>
                            <ul class="clases-schedule">
                                <?php echo $project_subtitle; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_query();
            ?> 
            </div>
            <div class="swiper-dot text-center pt-5">
                <div class="dot"></div>
            </div>
        </div>

        <?php  elseif ( 'style4' === $settings['style'] ) : ?>
        
        <div class="row g-4">
            <?php while ($post_data->have_posts()):$post_data->the_post(); 
                $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
                $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                $comments_count = get_comments_number(get_the_ID());
                $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                $project_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_project_options', true);
                $project_icon = isset($project_single_meta_data['project_icon']) && !empty($project_single_meta_data['project_icon']) ? $project_single_meta_data['project_icon'] : '';
                $project_subtitle = isset($project_single_meta_data['project_subtitle']) && !empty($project_single_meta_data['project_subtitle']) ? $project_single_meta_data['project_subtitle'] : '';
                $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                ?> 
            <div class="<?php echo esc_attr($settings['service_grid']); ?> col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="clases-items mt-0">
                    <div class="clases-bg style-2"></div>
                    <div class="clases-image">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                    </div>
                    <div class="clases-content">
                        <h4>
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </h4>
                        <p><?php echo wp_trim_words($project_content, $this->get_settings('text_word_count')); ?> </p>
                        <ul class="clases-schedule">
                            <?php echo $project_subtitle; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            ?> 
        </div>

        <?php  elseif ( 'style5' === $settings['style'] ) : ?>

            <div class="container">
                <div class="array-button">
                    <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
                    <button class="array-next"><i class="fal fa-arrow-right"></i></button>
                </div>
                <div class="swiper clases-slider">
                    <div class="swiper-wrapper">
                    <?php while ($post_data->have_posts()):$post_data->the_post(); 
                        $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                        $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'kidsa_grid_service_12', false) : '';
                        $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                        $comments_count = get_comments_number(get_the_ID());
                        $comment_text = ($comments_count > 1) ? 'Comments (' . $comments_count . ')' : 'Comment (' . $comments_count . ')';

                        $project_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_project_options', true);
                        $project_icon = isset($project_single_meta_data['project_icon']) && !empty($project_single_meta_data['project_icon']) ? $project_single_meta_data['project_icon'] : '';
                        $project_subtitle = isset($project_single_meta_data['project_subtitle']) && !empty($project_single_meta_data['project_subtitle']) ? $project_single_meta_data['project_subtitle'] : '';
                        $project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';
                        ?> 
                        <div class="swiper-slide">
                            <div class="clases-items">
                                <div class="clases-bg"></div>
                                <div class="clases-image">
                                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                </div>
                                <div class="clases-content">
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                </h4>
                                <p><?php echo wp_trim_words($project_content, $this->get_settings('text_word_count')); ?> </p>
                                    <ul class="clases-schedule">
                                        <?php echo $project_subtitle; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_query();
                        ?> 
                    </div>
                </div>
            </div>

        <?php endif ;?>	

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Project_Post());