<?php 
	add_action( 'wp_enqueue_scripts', 'kidsa_child_them_enqueue_styles' );
	function kidsa_child_them_enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }

	add_action( 'wp_enqueue_scripts', 'kidsa_child_hide_single_banner_dots', 30 );
	function kidsa_child_hide_single_banner_dots() {
		$script = <<<'JS'
jQuery(function($) {
	$('.hero-slider').each(function() {
		var $slider = $(this);
		var count = $slider.find('.swiper-slide:not(.swiper-slide-duplicate)').length;
		if (!count) {
			count = $slider.find('.swiper-slide').length;
		}
		if (count <= 1) {
			$slider.addClass('is-single-slide');
		}
	});
});
JS;
		wp_add_inline_script( 'kidsa-main-script', $script );
    }

	add_action( 'wp_enqueue_scripts', 'kidsa_child_restore_scroll_fade_animations', 35 );
	function kidsa_child_restore_scroll_fade_animations() {
		$script = <<<'JS'
jQuery(function($) {
	function applyWowToElementorSections() {
		var step = 0;

		$('.elementor-page .e-con.e-parent').each(function() {
			var $section = $(this);

			if ($section.hasClass('hero-section') || $section.closest('.hero-section').length) {
				return;
			}

			if ($section.hasClass('wow') || $section.find('.wow').length) {
				return;
			}

			$section.addClass('wow fadeInUp');
			$section.attr('data-wow-delay', (Math.min(step, 4) * 0.1) + 's');
			step++;
		});
	}

	function refreshWow() {
		if (typeof WOW === 'undefined') {
			return;
		}

		if (!window.kidsaScrollWow) {
			window.kidsaScrollWow = new WOW({
				live: true,
				offset: 100,
				mobile: true
			});
			window.kidsaScrollWow.init();
			return;
		}

		window.kidsaScrollWow.sync();
	}

	function bootScrollAnimations() {
		applyWowToElementorSections();
		refreshWow();
	}

	setTimeout(bootScrollAnimations, 0);

	$(window).on('load', bootScrollAnimations);

	$(window).on('elementor/frontend/init', bootScrollAnimations);
});
JS;
		wp_add_inline_script( 'kidsa-main-script', $script );
	}

	// Remove a specific action if it's part of the header
	remove_action('kidsa_header', 'kidsa_default_header_function'); // Replace with actual function name

	// Add a custom header function
	add_action('kidsa_header', 'my_custom_header_function');
	function my_custom_header_function() {
?>
		<header>
			<!-- Custom HTML for the header here -->
			<div class="my-custom-header">
				<h1>Welcome to My Custom Site</h1>
				<!-- Add more custom HTML as needed -->
			</div>
		</header>
<?php
	}



function related_posts_shortcode() {
    $categories = get_the_category();
    if (empty($categories)) return '';

    $category_ids = array();
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }

    $related_posts = new WP_Query(array(
        'category__in'   => $category_ids,
        'post__not_in'   => array(get_the_ID()),
        'posts_per_page' => 3,
        'orderby'        => 'rand'
    ));

    if (!$related_posts->have_posts()) return '';

    $output = '<div class="related-posts row"><h3>Related Posts</h3>';
    while ($related_posts->have_posts()) {
        $related_posts->the_post();
        $output .= '<div class="related-post-item col-sm-4 col-12"><div class="inner-related">';
        $output .= '<a href="' . get_permalink() . '">';
        if (has_post_thumbnail()) {
            $output .= get_the_post_thumbnail(get_the_ID(), 'large');
        }
		 $output .= '<span class="post-date"><i class="fa fa-calendar"></i>' . get_the_date() . '</span>';
        $output .= '<h4>' . get_the_title() . '</h4></a>';
        $output .= '<p>' . wp_trim_words(get_the_excerpt(), 15) . '</p>';
		$output .= '<a class="read-more-btn" href="' . get_permalink() . '">Read More</a>';
        $output .= '</div></div>';
    }
	 $output .= '</div>';
    wp_reset_postdata();

    return $output;
}

add_shortcode('related_posts', 'related_posts_shortcode');

function child_override_kidsa_menu_sidebar() {
    // Remove the parent's method hooked to 'kidsa_after_body'
    // Assuming $kidsa_theme_obj is the global instance (replace with actual if different)
    global $kidsa_theme_obj; 
    
    if ( isset($kidsa_theme_obj) && is_object($kidsa_theme_obj) && method_exists($kidsa_theme_obj, 'menu_sidebar') ) {
        remove_action('kidsa_after_body', array($kidsa_theme_obj, 'menu_sidebar'));
    }

    // Add your own function to the same hook
    add_action('kidsa_after_body', 'child_menu_sidebar');
}
add_action('init', 'child_override_kidsa_menu_sidebar', 20);

function child_menu_sidebar() {
     $sidebar_logo = cs_get_option('sidebar_logo');
            $sidebar_text = cs_get_option('sidebar_text');
            $sidebar_title = cs_get_option('sidebar_title');
            $sidebar_contact_info = cs_get_option('sidebar_contact_info');
            $sidebar_btn_enabled = cs_get_option('sidebar_btn_enabled');
            $sidebar_btn_text = cs_get_option('sidebar_btn_text');
            $sidebar_btn_text_url = cs_get_option('sidebar_btn_text_url');
            $sidebar_socials = cs_get_option('sidebar_socials');            
            ?>
            <div class="fix-area">
                <div class="offcanvas__info">
                    <div class="offcanvas__wrapper">
                        <div class="offcanvas__content">
                            <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                                <div class="offcanvas__logo">
                                    <?php
                                    if (has_custom_logo() && empty($sidebar_logo['id'])) {
                                        the_custom_logo();
                                    } elseif (!empty($sidebar_logo['id'])) {
                                        printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $sidebar_logo['url'], $sidebar_logo['alt']);
                                    } else {
                                        printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                                    }
                                    ?>
                                </div>
                                <div class="offcanvas__close">
                                    <button>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                           
                            <div class="mobile-menu fix mb-3">
                                <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class'     => 'offcanvas-nav',
                                        'container'      => false,
                                        'fallback_cb'    => false,
                                    ));
                                ?>
                            </div>
                            <div class="offcanvas__contact">
                                <h4><?php echo esc_html($sidebar_title); ?></h4>
                                <?php                       
                                if (!empty($sidebar_contact_info)) {
                                    echo '<ul>';
                                    foreach ($sidebar_contact_info as $contact_info) {
                                        echo '<li class="d-flex align-items-center">';
                                        echo '<div class="offcanvas__contact-icon mr-15">';
                                        echo '<i class="' . esc_attr($contact_info['sidebar_contact_icon']) . '"></i>';
                                        echo '</div>';
                                        echo '<div class="offcanvas__contact-text">';
                                        echo '<a href="' . esc_url($contact_info['sidebar_contact_text_url']) . '">' . esc_html($contact_info['sidebar_contact_text']) . '</a>';
                                        echo '</div>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>
							 <p class="text d-none d-lg-block">
                                <?php echo esc_html($sidebar_text); ?>
                            </p>
                                <?php 
                                if( $sidebar_btn_enabled ): ?>
                                    <div class="header-button mt-4">
                                        <a href="<?php echo esc_url($sidebar_btn_text_url); ?>" class="theme-btn text-center">
                                            <span>
                                                <?php echo esc_html($sidebar_btn_text); ?>
                                                <i class="fa-solid fa-arrow-right-long"></i>
                                            </span>
                                        </a>
                                    </div>
                                <?php 
                                endif; ?>

                                <?php                   
                                if (!empty($sidebar_socials)) {
                                    echo '<div class="social-icon d-flex align-items-center">';
                                    foreach ($sidebar_socials as $icon) {
                                        echo '<a href="' . esc_url($icon['sidebar_socials_icon_url']) . '"><i class="' . esc_attr($icon['sidebar_socials_icon']) . '"></i></a>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas__overlay"></div>
    <?php
}

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');
?>

