<?php
/**
 * Theme Options
 * @package kidsa
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

    $allowed_html = kidsa()->kses_allowed_html(array('mark'));
    $prefix = 'kidsa';
    // Create options
    CSF::createOptions($prefix . '_theme_options', array(
        'menu_title' => esc_html__('Theme Options', 'kidsa'),
        'menu_slug' => 'kidsa_theme_options',
        'menu_parent' => 'kidsa_theme_options',
        'menu_type' => 'submenu',
        'footer_credit' => ' ',
        'menu_icon' => 'fa fa-filter',
        'show_footer' => false,
        'enqueue_webfont' => false,
        'show_search' => true,
        'show_reset_all' => true,
        'show_reset_section' => true,
        'show_all_options' => false,
        'theme' => 'dark',
        'framework_title' => kidsa()->get_theme_info('name')
    ));

    /*-------------------------------------------------------
        ** General  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('General', 'kidsa'),
        'id' => 'general_options',
        'icon' => 'fas fa-cogs',
    ));
    /* Preloader */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Preloader & SVG Enable', 'kidsa'),
        'id' => 'theme_general_preloader_options',
        'icon' => 'fa fa-spinner',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Preloader Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'preloader_enable',
                'title' => esc_html__('Preloader', 'kidsa'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to enable/disable preloader', 'kidsa'), $allowed_html),
                'default' => false,
            ),
            array(
                'id' => 'preloader_bg_color',
                'title' => esc_html__('Preloader Background Color', 'kidsa'),
                'type' => 'color',
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>overlay color</mark> for preloader background image', 'kidsa'), $allowed_html),
                'dependency' => array('preloader_enable', '==', 'true')
            ),
            array(
                'id'      => 'preloader_title',
                'type'    => 'text',
                'title'   => esc_html__('Preloader Title', 'kidsa'),
                'desc'    => esc_html__('Enter the title to display during preloading. If left empty, the site name will be used.', 'kidsa'),
                'default' => get_bloginfo('name'),
                'dependency' => array('preloader_enable', '==', 'true')
            ),

            array(
                'id'      => 'loading_text',
                'type'    => 'text',
                'title'   => esc_html__('Preloader Loading Text', 'kidsa'),
                'desc'    => esc_html__('Enter the text to display below the loading animation.', 'kidsa'),
                'default' => '',
                'dependency' => array('preloader_enable', '==', 'true')
            ),            
              
            array(
                'id' => 'enable_svg_upload',
                'type' => 'switcher',
                'title' => esc_html__('Enable Svg Upload ?', 'kidsa'),
                'desc' => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'kidsa'),
                'default' => true,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Typography  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'typography',
        'title' => esc_html__('Typography', 'kidsa'),
        'icon' => 'fas fa-text-height',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body Font Options', 'kidsa') . '</h3>',
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'kidsa'),
                'id' => '_body_font',
                'default' => array(
                    'font-family' => 'Source Sans 3',
                    'font-size' => '16',
                    'line-height' => '26',
                    'unit' => 'px',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'body_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'kidsa'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'kidsa'),
                    '400' => esc_html__('Regular 400', 'kidsa'),
                    '500' => esc_html__('Medium 500', 'kidsa'),
                    '600' => esc_html__('Semi Bold 600', 'kidsa'),
                    '700' => esc_html__('Bold 700', 'kidsa'),
                    '800' => esc_html__('Extra Bold 800', 'kidsa'),
                ),
                'default' => array('400', '500', '600', '700')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading Font Options', 'kidsa') . '</h3>',
            ),
            array(
                'type' => 'switcher',
                'id' => 'heading_font_enable',
                'title' => esc_html__('Heading Font', 'kidsa'),
                'desc' => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'kidsa'), $allowed_html),
                'default' => true
            ),
            array(
                'type' => 'typography',
                'title' => esc_html__('Typography', 'kidsa'),
                'id' => 'heading_font',
                'default' => array(
                    'font-family' => 'Quicksand',
                    'type' => 'google',
                ),
                'color' => false,
                'subset' => false,
                'text_align' => false,
                'text_transform' => false,
                'letter_spacing' => false,
                'font_size' => false,
                'line_height' => false,
                'desc' => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2,h3,h4,h5,h6', 'kidsa'), $allowed_html),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
            array(
                'id' => 'heading_font_variant',
                'type' => 'select',
                'title' => esc_html__('Load Font Variant', 'kidsa'),
                'multiple' => true,
                'chosen' => true,
                'options' => array(
                    '300' => esc_html__('Light 300', 'kidsa'),
                    '400' => esc_html__('Regular 400', 'kidsa'),
                    '500' => esc_html__('Medium 500', 'kidsa'),
                    '600' => esc_html__('Semi Bold 600', 'kidsa'),
                    '700' => esc_html__('Bold 700', 'kidsa'),
                    '800' => esc_html__('Extra Bold 800', 'kidsa'),
                ),
                'default' => array('400', '500', '600', '700'),
                'dependency' => array('heading_font_enable', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Back To Top  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Back To Top', 'kidsa'),
        'id' => 'theme_general_back_top_options',
        'icon' => 'fa fa-arrow-up',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Back Top Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'back_top_enable',
                'title' => esc_html__('Back Top', 'kidsa'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'kidsa'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'back_top_icon',
                'title' => esc_html__('Back Top Icon', 'kidsa'),
                'type' => 'icon',
                'default' => 'fa-solid fa-arrow-up-long',
                'desc' => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'kidsa'), $allowed_html),
                'dependency' => array('back_top_enable', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
        ** Menu Sidebar  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Menu Sidebar', 'kidsa'),
        'id' => 'theme_general_sidebar_options',
        'icon' => 'fas fa-bars',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Menu Sidebar Option', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'sidebar_logo',
                'type' => 'media',
                'title' => esc_html__('Sidebar Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_text',
                'type' => 'textarea',
                'title' => esc_html__('Sidebar Text', 'kidsa'),
                'default' => esc_html__('We understand better that enim ad minim veniam, consectetur adipis cing elit, sed do', 'kidsa'),
            ),
            array(
                'id' => 'sidebar_title',
                'type' => 'text',
                'title' => esc_html__('Sidebar Title', 'kidsa'),
                'default' => esc_html__('Contact Info', 'kidsa'),
            ),
            array(
                'id'        => 'sidebar_contact_info',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'sidebar_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fa-solid fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'sidebar_contact_text',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'sidebar_contact_text_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'sidebar_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'sidebar_btn_text',
                'type' => 'text',
                'title' => esc_html__('Button Text', 'kidsa'),
                'default' => 'Get A Quote',
                'dependency' => array('sidebar_btn_enabled', '==', 'true')
            ),
            array(
                'id' => 'sidebar_btn_text_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
                'dependency' => array('sidebar_btn_enabled', '==', 'true')
            ),
            array(
                'id'        => 'sidebar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'sidebar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'sidebar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Theme Color  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Theme Colors', 'kidsa'),
        'id' => 'theme_color',
        'icon' => 'fa fa-palette',
        'parent' => 'general_options',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Theme Color Option', 'kidsa') . '</h3>'
            ),
            array(
            'id'      => 'theme_body_color',
            'type'    => 'color',
            'title'   => 'Body Color',
            'default' => '#FFFFFF'
              ),
              array(
            'id'      => 'theme_black_color',
            'type'    => 'color',
            'title'   => 'Black Color',
            'default' => '#000000'
              ),
              array(
            'id'      => 'theme_white_color',
            'type'    => 'color',
            'title'   => 'White Color',
            'default' => '#FFFFFF'
              ), 
            array(
            'id'      => 'theme_color_1',
            'type'    => 'color',
            'title'   => 'Primary Color',
            'default' => '#F39F5F'
            ),
            array(
            'id'      => 'theme_color_2',
            'type'    => 'color',
            'title'   => 'Secondary Color',
            'default' => '#70A6B1'
            ),       
            array(
            'id'      => 'theme_header_color',
            'type'    => 'color',
            'title'   => 'Header Color',
            'default' => '#385469'
            ),
            array(
            'id'      => 'theme_text_1_color',
            'type'    => 'color',
            'title'   => 'Text Color',
            'default' => '#5C707E'
            ),             
            array(
            'id'      => 'theme_text_2_color',
            'type'    => 'color',
            'title'   => 'Text Color 2',
            'default' => '#ffffffcc'
            ), 
            array(
            'id'      => 'theme_border_color',
            'type'    => 'color',
            'title'   => 'Border Color 1',
            'default' => '#E5E5E5'
            ),
            array(
            'id'      => 'theme_border_color_2',
            'type'    => 'color',
            'title'   => 'Border Color 2',
            'default' => '#242449'
            ),  
            array(
            'id'      => 'theme_bg_1_color',
            'type'    => 'color',
            'title'   => 'Border Color 1',
            'default' => '#F4EEE5'
            ),
            array(
            'id'      => 'theme_bg_2_color',
            'type'    => 'color',
            'title'   => 'Border Color 2',
            'default' => '#EFF5F6'
            ),           
            array(
            'id'      => 'theme_bg_3_color',
            'type'    => 'color',
            'title'   => 'Border Color 3',
            'default' => '#70A6B1'
            ),           
              
        )
    ));

    /*----------------------------------
        Header & Footer Style
    -----------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Set Header & Footer Type', 'kidsa'),
        'id' => 'header_footer_style_options',
        'icon' => 'eicon-banner',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Header Style', 'kidsa'),
            ),
            array(
                'id' => 'navbar_type',
                'title' => esc_html__('Navbar Type', 'kidsa'),
                'type' => 'image_select',
                'options' => array(
                    '' => KIDSA_THEME_SETTINGS_IMAGES . '/header/01.png',
                    'style-01' => KIDSA_THEME_SETTINGS_IMAGES . '/header/02.png',
                    'style-02' => KIDSA_THEME_SETTINGS_IMAGES . '/header/03.png',
                    'style-03' => KIDSA_THEME_SETTINGS_IMAGES . '/header/04.png',
                    'style-04' => KIDSA_THEME_SETTINGS_IMAGES . '/header/rtl.png',
                    'style-05' => KIDSA_THEME_SETTINGS_IMAGES . '/header/05.png',
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'kidsa'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Global Footer Style', 'kidsa'),
            ),
            array(
                'id' => 'footer_type',
                'title' => esc_html__('Footer Type', 'kidsa'),
                'type' => 'image_select',
                'options' => array(
                    '' => KIDSA_THEME_SETTINGS_IMAGES . '/footer/01.png',
                    'style-01' => KIDSA_THEME_SETTINGS_IMAGES . '/footer/02.png',
                    'style-02' => KIDSA_THEME_SETTINGS_IMAGES . '/footer/03.png',
                    'style-03' => KIDSA_THEME_SETTINGS_IMAGES . '/footer/04.png',
                    'style-04' => KIDSA_THEME_SETTINGS_IMAGES . '/footer/rtl.png',
                    'style-05' => KIDSA_THEME_SETTINGS_IMAGES . '/footer/05.png',
                ),
                'default' => '',
                'desc' => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'kidsa'), $allowed_html),
            ),
        )
    ));

    /*-------------------------------------------------------
       ** Entire Site Header Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'headers_settings',
        'title' => esc_html__('Headers', 'kidsa'),
        'icon' => 'fa fa-home'
    ));
    /* Header Style 01 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header One', 'kidsa'),
        'id' => 'theme_header_one_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header One', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_one_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_one_shape',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_one_category_menu_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Category Menu', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> Category Menu from here', 'kidsa'), $allowed_html),
            ),
			   array(
                'id' => 'header_default_cart_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Cart Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> cart button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_one_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_one_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'kidsa'),
                'default' => 'Get A Quote',
                'dependency' => array('header_one_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_one_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
                'dependency' => array('header_one_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_one_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_one_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'kidsa'), $allowed_html),
            ),          
              
            array(
                'id'        => 'header_1_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('header_one_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_1_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_1_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_1_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_1_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'dependency' => array('header_one_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_1_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_1_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));

    /* Header Style 02 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Two', 'kidsa'),
        'id' => 'theme_header_two_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Two', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_two_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_two_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_two_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'kidsa'),
                'default' => 'Get A Quote',
            ),
            array(
                'id' => 'header_two_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
            ),
            array(
                'id' => 'header_two_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_two_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id'        => 'header_2_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('header_two_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_2_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_2_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_2_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_2_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'dependency' => array('header_two_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_2_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_2_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));

    /* Header Style 03 */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Three', 'kidsa'),
        'id' => 'theme_header_three_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Three', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_three_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),         
            array(
                'id' => 'header_three_phone_number_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Phone Number', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar phone number', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_three_phone_title',
                'type' => 'text',
                'title' => esc_html__('Phone Title', 'kidsa'),
                'default' => 'Call us',
                'dependency' => array('header_three_phone_number_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_three_phone_number',
                'type' => 'text',
                'title' => esc_html__('Phone Text', 'kidsa'),
                'default' => '+208-555-0112',
                'dependency' => array('header_three_phone_number_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_three_phone_number_url',
                'type' => 'text',
                'title' => esc_html__('Phone Input', 'kidsa'),
                'default' => esc_html__('tel:+2085550112', 'kidsa'),
                'dependency' => array('header_three_phone_number_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_three_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_three_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'kidsa'),
                'default' => 'Get A Quote',
                'dependency' => array('header_three_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_three_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
                'dependency' => array('header_three_right_btn_enabled', '==', 'true'),
            ),          
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_three_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id'        => 'header_3_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('header_three_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_3_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_3_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_3_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_3_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'dependency' => array('header_three_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_3_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_3_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));


     /* Header Style 04 */
     CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Four', 'kidsa'),
        'id' => 'theme_header_four_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Four', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_4_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_4_shape',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_4_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_4_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'kidsa'),
                'default' => 'Get A Quote',
                'dependency' => array('header_4_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_4_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
                'dependency' => array('header_4_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_4_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_4_top_bar_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Header Top', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header', 'kidsa'), $allowed_html),
            ),          
              
            array(
                'id'        => 'header_4_top_bar_contacts',
                'type'      => 'repeater',
                'title'     => 'Contact Info Repeater',
                'dependency' => array('header_4_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_4_top_bar_icon',
                    'type'  => 'icon',
                    'default' => 'fas fa-phone-volume',
                    'title' => 'Info Icon',
                  ),              
                  array(
                    'id'    => 'header_4_top_bar_info',
                    'type'  => 'text',
                    'title' => 'Info Text',
                  ),
                  array(
                    'id'    => 'header_4_top_bar_info_url',
                    'type'  => 'text',
                    'title' => 'Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'header_4_top_bar_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'dependency' => array('header_4_top_bar_enabled', '==', 'true'),
                'fields'    => array(
              
                  array(
                    'id'    => 'header_4_top_bar_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'header_4_top_bar_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
              
        )
    ));


       /* Header Style 05 */
       CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Header Five', 'kidsa'),
        'id' => 'theme_header_five_options',
        'icon' => 'fa fa-image',
        'parent' => 'headers_settings',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Logo Options | Header Five', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'header_5_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_5_right_btn_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Right Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'header_5_right_btn_text',
                'type' => 'text',
                'title' => esc_html__('Right Button Text', 'kidsa'),
                'default' => 'Get A Quote',
                'dependency' => array('header_5_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_5_right_btn_url',
                'type' => 'text',
                'title' => esc_html__('Right Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
                'dependency' => array('header_5_right_btn_enabled', '==', 'true'),
            ),
            array(
                'id' => 'header_5_search_enabled',
                'type' => 'switcher',
                'title' => esc_html__('Show Search Button', 'kidsa'),
                'default' => true,
                'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'kidsa'), $allowed_html),
            ),
              
        )
    ));

   /* Header Style RTL */
   CSF::createSection($prefix . '_theme_options', array(
    'title' => esc_html__('Header RTL', 'kidsa'),
    'id' => 'theme_header_rtl_options',
    'icon' => 'fa fa-image',
    'parent' => 'headers_settings',
    'fields' => array(
        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Logo Options | Header RTL', 'kidsa') . '</h3>'
        ),
        array(
            'id' => 'header_rtl_logo',
            'type' => 'media',
            'title' => esc_html__('Logo', 'kidsa'),
            'library' => 'image',
            'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
        ),
        array(
            'id' => 'header_rtl_shape',
            'type' => 'media',
            'title' => esc_html__('Shape Image', 'kidsa'),
            'library' => 'image',
            'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
        ),
        array(
            'id' => 'header_rtl_category_menu_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Category Menu', 'kidsa'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> Category Menu from here', 'kidsa'), $allowed_html),
        ),
           array(
            'id' => 'header_rtl_cart_btn_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Cart Button', 'kidsa'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> cart button of header one', 'kidsa'), $allowed_html),
        ),
        array(
            'id' => 'header_rtl_right_btn_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Right Button', 'kidsa'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar button of header one', 'kidsa'), $allowed_html),
        ),
        array(
            'id' => 'header_rtl_right_btn_text',
            'type' => 'text',
            'title' => esc_html__('Right Button Text', 'kidsa'),
            'default' => 'Get A Quote',
            'dependency' => array('header_rtl_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_rtl_right_btn_url',
            'type' => 'text',
            'title' => esc_html__('Right Button Url', 'kidsa'),
            'default' => esc_html__('#', 'kidsa'),
            'dependency' => array('header_rtl_right_btn_enabled', '==', 'true'),
        ),
        array(
            'id' => 'header_rtl_search_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Search Button', 'kidsa'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> navbar search button of header one', 'kidsa'), $allowed_html),
        ),
        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Top Bar Options', 'kidsa') . '</h3>'
        ),
        array(
            'id' => 'header_rtl_top_bar_enabled',
            'type' => 'switcher',
            'title' => esc_html__('Show Header Top', 'kidsa'),
            'default' => true,
            'desc' => wp_kses(__('you can <mark> show/hide</mark> top bar of header one', 'kidsa'), $allowed_html),
        ),          
          
        array(
            'id'        => 'header_rtl__top_bar_contacts',
            'type'      => 'repeater',
            'title'     => 'Contact Info Repeater',
            'dependency' => array('header_rtl_top_bar_enabled', '==', 'true'),
            'fields'    => array(
          
              array(
                'id'    => 'header_rtl__top_bar_icon',
                'type'  => 'icon',
                'default' => 'fas fa-phone-volume',
                'title' => 'Info Icon',
              ),              
              array(
                'id'    => 'header_rtl__top_bar_info',
                'type'  => 'text',
                'title' => 'Info Text',
              ),
              array(
                'id'    => 'header_rtl__top_bar_info_url',
                'type'  => 'text',
                'title' => 'Info Url',
              ),
          
            )
        ),
        array(
            'id'        => 'header_rtl__top_bar_socials',
            'type'      => 'repeater',
            'title'     => 'Socials Info Repeater',
            'dependency' => array('header_rtl_top_bar_enabled', '==', 'true'),
            'fields'    => array(
          
              array(
                'id'    => 'header_rtl__top_bar_socials_icon',
                'type'  => 'icon',
                'default' => 'fa fa-facebook',
                'title' => 'Socials Info Icon',
              ),  
              array(
                'id'    => 'header_rtl__top_bar_socials_icon_url',
                'type'  => 'text',
                'title' => 'Socials Info Url',
              ),
          
            )
        ),
          
    )
));


  /* Sticky Header */
  CSF::createSection($prefix . '_theme_options', array(
    'title' => esc_html__('Sticky Header', 'kidsa'),
    'id' => 'sticky_header_options',
    'icon' => 'eicon-header',
    'fields' => array(
        array(
            'type' => 'subheading',
            'content' => '<h3>' . esc_html__('Sticky Header Option', 'kidsa') . '</h3>'
        ),
        array(
            'id' => 'sticky_header_enabled',
            'title' => esc_html__('Sticky Header Enable', 'kidsa'),
            'type' => 'switcher',
            'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide sticky header', 'kidsa'), $allowed_html),
            'default' => true,
        ),

        )
    ));

    /* Breadcrumb */
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Breadcrumb', 'kidsa'),
        'id' => 'breadcrumb_options',
        'icon' => ' eicon-product-breadcrumbs',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Breadcrumb Options', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'breadcrumb_enabled',
                'title' => esc_html__('Breadcrumb', 'kidsa'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'kidsa'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb_main_image',
                'type' => 'media',
                'title' => esc_html__('Background Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>background image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_2',
                'type' => 'media',
                'title' => esc_html__('Shape Image 2', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_3',
                'type' => 'media',
                'title' => esc_html__('Shape Image 3', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_4',
                'type' => 'media',
                'title' => esc_html__('Shape Image 4', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_5',
                'type' => 'media',
                'title' => esc_html__('Shape Image 5', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
            array(
                'id' => 'breadcrumb_shape_image_6',
                'type' => 'media',
                'title' => esc_html__('Shape Image 6', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark>shape image</mark> here.', 'kidsa'), $allowed_html),
                'dependency' => array('breadcrumb_enabled', '==', 'true')
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Footer', 'kidsa'),
        'id' => 'footer_options',
        'icon' => ' eicon-footer',
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Footer One', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer One Settings', 'kidsa') . '</h3>'
            ),
            array(
                'id'        => 'footer_1_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(  
                  array(
                    'id'    => 'footer_1_contact_icon',
                    'type'  => 'media',
                    'title' => 'Contact Info Icon Image',
                    'library' => 'image',
                  ),
                  array(
                    'id'    => 'footer_1_contact_title',
                    'type'  => 'text',
                    'title' => 'Contact Info Title',
                  ),
                  array(
                    'id'    => 'footer_1_contact_text',
                    'type'  => 'text',
                    'title' => 'Contact Info Text',
                  ),
                  array(
                    'id'    => 'footer_1_contact_url',
                    'type'  => 'text',
                    'title' => 'Contact Info Url',
                  ),
              
                )
            ), 
            array(
                'id' => 'footer_1_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_1_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_1_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_1_shape_3',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_1_shape_4',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_1_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'kidsa'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'kidsa')
            ),
            array(
                'id'        => 'footer_1_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_1_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_1_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_1_blog_title',
                'type' => 'text',
                'title' => esc_html__('Footer Blog Heading', 'kidsa'),
                'default' => esc_html__('Recent Posts', 'kidsa')
            ),    
            
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'kidsa') . '</h3>'
            ),          
           
            array(
                'id' => 'copyright_text',
                'title' => esc_html__('Copyright Area Text', 'kidsa'),
                'type' => 'textarea',
                'desc' => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'kidsa'), $allowed_html)
            ),
            array(
                'id'        => 'footer_1_terms',
                'type'      => 'repeater',
                'title'     => 'Footer Terms & Condition Repeater',
                'fields'    => array(
                  array(
                    'id'    => 'footer_1_terms_text',
                    'type'  => 'text',
                    'title' => 'Terms Text',
                  ),
                  array(
                    'id'    => 'footer_1_terms_url',
                    'type'  => 'text',
                    'title' => 'Terms Url',
                  ),
              
                )
            ),
          
        )
    ));

    /*-------------------------------------------------------
           ** Footer Style Two
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_two_options',
        'title' => esc_html__('Footer Two', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Two', 'kidsa') . '</h3>'
            ),           
            array(
                'id' => 'footer_2_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_2_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Two Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_2_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Two Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_2_shape_3',
                'type' => 'media',
                'title' => esc_html__('Footer Two Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_2_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'kidsa'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'kidsa')
            ),
            array(
                'id'        => 'footer_2_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_2_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_2_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
			array(
                'id' => 'footer_2_gall_text',
                'type' => 'text',
                'title' => esc_html__('Text Here', 'kidsa'),
                'default' => esc_html__('Our Galleries', 'kidsa')
            ),
            array(
                'id'        => 'footer_2_gallery',
                'type'      => 'repeater',
                'title'     => 'Gallery Image Repeater',
                'fields'    => array(              
                    array(
                        'id' => 'footer_2_gallery_img',
                        'type' => 'media',
                        'title' => esc_html__('Footer Two Gallery', 'kidsa'),
                        'library' => 'image',
                    ),
              
                )
            ),                     
          
        )
    ));


      /*-------------------------------------------------------
           ** Footer Style Three
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_three_options',
        'title' => esc_html__('Footer Three', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Three', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'footer_3_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_3_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_3_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_3_shape_3',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_3_text',
                'type' => 'textarea',
                'title' => esc_html__('About Text', 'kidsa'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'kidsa')
            ),
            array(
                'id' => 'footer_3_contact_btn',
                'type' => 'text',
                'title' => esc_html__('Contact Button', 'kidsa'),
                'default' => esc_html__('Contact Us', 'kidsa')
            ),
            array(
                'id' => 'footer_3_contact_btn_url',
                'type' => 'text',
                'title' => esc_html__('Contact Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa')
            ),
            array(
                'id'        => 'footer_3_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_3_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_3_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_3_newsletter_title',
                'type' => 'text',
                'title' => esc_html__('Newsletter Title', 'kidsa'),
                'default' => esc_html__('Newsletter', 'kidsa')
            ),                     
            array(
                'id' => 'footer_3_newsletter_text',
                'type' => 'text',
                'title' => esc_html__('Newsletter Text', 'kidsa'),
                'default' => esc_html__('Sign up to seargin weekly newsletter to get the latest updates.', 'kidsa')
            ),  
            array(
                'id' => 'footer_3_form',
                'type' => 'text',
                'title' => esc_html__('Newsletter Form Shortcode', 'kidsa'),
                'desc' => wp_kses(__('Use <mark> MC4WP/Mailchimp</mark> shorcode here', 'kidsa'), $allowed_html),
            ),                   
          
        )
    ));


    /*-------------------------------------------------------
           ** Footer Style Four
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_four_options',
        'title' => esc_html__('Footer Four', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Four', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'footer_4_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_4_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_4_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_4_shape_3',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_4_text',
                'type' => 'text',
                'title' => esc_html__('Footer About Text', 'kidsa'),
                'default' => esc_html__('Sign up to searing weekly newsletter to get the latest updates.', 'kidsa')
            ),
            array(
                'id' => 'footer_4_form',
                'type' => 'text',
                'title' => esc_html__('Newsletter Form Shortcode', 'kidsa'),
                'desc' => wp_kses(__('Use <mark> MC4WP/Mailchimp</mark> shorcode here', 'kidsa'), $allowed_html),
            ),         
            array(
                'id' => 'footer_4_contact_btn',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'kidsa'),
                'default' => esc_html__('Get A Quote', 'kidsa')
            ),
            array(
                'id' => 'footer_4_contact_btn_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa')
            ),
            array(
                'id'        => 'footer_4_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_4_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_4_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
			array(
                'id' => 'footer_4_contact_text',
                'type' => 'text',
                'title' => esc_html__('Contact Title', 'kidsa'),
                'default' => esc_html__('Contact us', 'kidsa')
            ),
            array(
                'id'        => 'footer_4_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_4_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Contact Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_4_contact_title',
                    'type'  => 'text',
                    'title' => 'Title',
                  ),
                  array(
                    'id'    => 'footer_4_contact_url',
                    'type'  => 'text',
                    'title' => 'Url',
                  ),
              
                )
            ),                  
          
        )
    ));


    /*-------------------------------------------------------
           ** Footer Style Five
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_five_options',
        'title' => esc_html__('Footer Five', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Settings Five', 'kidsa') . '</h3>'
            ),
            array(
                'id' => 'footer_5_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_5_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Bg Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_5_text',
                'type' => 'text',
                'title' => esc_html__('Footer About Text', 'kidsa'),
                'default' => esc_html__('Sign up to searing weekly newsletter to get the latest updates.', 'kidsa')
            ),         
            array(
                'id' => 'footer_5_contact_btn',
                'type' => 'text',
                'title' => esc_html__('Button Title', 'kidsa'),
                'default' => esc_html__('Get A Quote', 'kidsa')
            ),
            array(
                'id' => 'footer_5_contact_btn_url',
                'type' => 'text',
                'title' => esc_html__('Button Url', 'kidsa'),
                'default' => esc_html__('#', 'kidsa')
            ),
            array(
                'id'        => 'footer_5_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_5_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_5_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id'        => 'footer_5_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_5_contact_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Contact Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_5_contact_title',
                    'type'  => 'text',
                    'title' => 'Title',
                  ),
                  array(
                    'id'    => 'footer_5_contact_url',
                    'type'  => 'text',
                    'title' => 'Url',
                  ),
              
                )
            ),                  
          
        )
    ));

    /*-------------------------------------------------------
        ** Footer Style RTL
    --------------------------------------------------------*/

    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'footer_options',
        'id' => 'footer_general_options',
        'title' => esc_html__('Footer RTL', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer RTL Settings', 'kidsa') . '</h3>'
            ),
            array(
                'id'        => 'footer_rtl_contact_us',
                'type'      => 'repeater',
                'title'     => 'Contact Us Repeater',
                'fields'    => array(  
                  array(
                    'id'    => 'footer_rtl_contact_icon',
                    'type'  => 'media',
                    'title' => 'Contact Info Icon Image',
                    'library' => 'image',
                  ),
                  array(
                    'id'    => 'footer_rtl_contact_title',
                    'type'  => 'text',
                    'title' => 'Contact Info Title',
                  ),
                  array(
                    'id'    => 'footer_rtl_contact_text',
                    'type'  => 'text',
                    'title' => 'Contact Info Text',
                  ),
                  array(
                    'id'    => 'footer_rtl_contact_url',
                    'type'  => 'text',
                    'title' => 'Contact Info Url',
                  ),
              
                )
            ), 
            array(
                'id' => 'footer_rtl_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_rtl_shape_1',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_rtl_shape_2',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_rtl_shape_3',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_rtl_shape_4',
                'type' => 'media',
                'title' => esc_html__('Footer Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'footer_rtl_text',
                'type' => 'textarea',
                'title' => esc_html__('Paragraph Text Here', 'kidsa'),
                'default' => esc_html__('Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur lacinia mollis', 'kidsa')
            ),
            array(
                'id'        => 'footer_rtl_socials',
                'type'      => 'repeater',
                'title'     => 'Socials Info Repeater',
                'fields'    => array(
              
                  array(
                    'id'    => 'footer_rtl_socials_icon',
                    'type'  => 'icon',
                    'default' => 'fa fa-facebook-f',
                    'title' => 'Socials Info Icon',
                  ),  
                  array(
                    'id'    => 'footer_rtl_socials_icon_url',
                    'type'  => 'text',
                    'title' => 'Socials Info Url',
                  ),
              
                )
            ),
            array(
                'id' => 'footer_rtl_blog_title',
                'type' => 'text',
                'title' => esc_html__('Footer Blog Heading', 'kidsa'),
                'default' => esc_html__('Recent Posts', 'kidsa')
            ),
          
        )
    ));


    /*-------------------------------------------------------
          ** Blog  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_settings',
        'title' => esc_html__('Blog Settings', 'kidsa'),
        'icon' => 'fa fa-book'
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_post_options',
        'title' => esc_html__('Blog Post', 'kidsa'),
        'icon' => 'fa fa-list-ul',
        'fields' => Kidsa_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'kidsa'))
    ));
    CSF::createSection($prefix . '_theme_options', array(
        'parent' => 'blog_settings',
        'id' => 'blog_single_post_options',
        'title' => esc_html__('Single Post', 'kidsa'),
        'icon' => 'fa fa-list-alt',
        'fields' => Kidsa_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'kidsa'))
    )); 

    /*-------------------------------------------------------
          ** Pages & templates Options
   --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'pages_and_template',
        'title' => esc_html__('Pages Settings', 'kidsa'),
        'icon' => 'fa fa-files-o'
    ));
    /*  404 page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => '404_page',
        'title' => esc_html__('404 Page', 'kidsa'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-exclamation-triangle',
        'fields' => array(
            array(
                'id' => 'error_bg_switch',
                'title' => esc_html__('404 Image Enable', 'kidsa'),
                'type' => 'switcher',
                'desc' => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'kidsa'), $allowed_html),
                'default' => true,
            ),
            array(
                'id' => 'error_bg',
                'title' => esc_html__('404 Image', 'kidsa'),
                'type' => 'media',
                'desc' => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'kidsa'), $allowed_html),
                'dependency' => array('error_bg_switch', '==', 'true')
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('404 Page Options', 'kidsa') . '</h3>',
            ),
            array(
                'id' => '404_bg_color',
                'type' => 'color',
                'title' => esc_html__('Page Background Color', 'kidsa'),
                'default' => ''
            ),
            array(
                'id' => '404_title',
                'title' => esc_html__('Title', 'kidsa'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>title</mark> of 404 page', 'kidsa'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'kidsa'))
            ),
            array(
                'id' => '404_paragraph',
                'title' => esc_html__('Paragraph', 'kidsa'),
                'type' => 'textarea',
                'info' => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'kidsa'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'kidsa'))
            ),
            array(
                'id' => '404_button_text',
                'title' => esc_html__('Button Text', 'kidsa'),
                'type' => 'text',
                'info' => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'kidsa'), $allowed_html),
                'attributes' => array('placeholder' => esc_html__('back to home', 'kidsa'))
            ),
            array(
                'id' => '404_spacing_top',
                'title' => esc_html__('Page Spacing Top', 'kidsa'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'kidsa'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
            array(
                'id' => '404_spacing_bottom',
                'title' => esc_html__('Page Spacing Bottom', 'kidsa'),
                'type' => 'slider',
                'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'kidsa'), $allowed_html),
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'unit' => 'px',
                'default' => 120,
            ),
        )
    ));

    /*  blog page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_page',
        'title' => esc_html__('Blog Page', 'kidsa'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Kidsa_Group_Fields::page_layout_options(esc_html__('Blog', 'kidsa'), 'blog')
    ));
    /*  blog single page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'blog_single_page',
        'title' => esc_html__('Blog Single Page', 'kidsa'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-indent',
        'fields' => Kidsa_Group_Fields::page_layout_options(esc_html__('Blog Single', 'kidsa'), 'blog_single')
    ));
    /*  archive page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'archive_page',
        'title' => esc_html__('Archive Page', 'kidsa'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-archive',
        'fields' => Kidsa_Group_Fields::page_layout_options(esc_html__('Archive', 'kidsa'), 'archive')
    ));
    /*  search page options */
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'search_page',
        'title' => esc_html__('Search Page', 'kidsa'),
        'parent' => 'pages_and_template',
        'icon' => 'fa fa-search',
        'fields' => Kidsa_Group_Fields::page_layout_options(esc_html__('Search', 'kidsa'), 'search')
    ));

    /*-------------------------------------------------------
        ** RTL  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'rtl-support',
        'title' => esc_html__('Enable RTL', 'kidsa'),
        'icon' => 'eicon-rtl',
        'fields' => array(
            array(
                'id'      => 'enable_rtl',
                'type'    => 'switcher',
                'title'   =>  esc_html__('RTL support on/off', 'kidsa'),
                'default' => false,
            ),
        )
    ));

    /*-------------------------------------------------------
           ** Backup  Options
    --------------------------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'id' => 'backup',
        'title' => esc_html__('Import / Export', 'kidsa'),
        'icon' => 'eicon-export-kit',
        'fields' => array(
            array(
                'type' => 'notice',
                'style' => 'warning',
                'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'kidsa'),
            ),
            array(
                'type' => 'backup',
                'title' => esc_html__('Backup & Import', 'kidsa')
            )
        )
    ));
}
