<?php
/**
 *Theme Group Fields
 * @package kidsa
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('Kidsa_Group_Fields')) {

    class Kidsa_Group_Fields
    {
        
        /**
         * $instance
         * @since 1.0.0
         */
        private static $instance;


        /**
         * construct()
         * @since 1.0.0
         */
        public function __construct()
        {

        }

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout()
        {
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => esc_html__('Page Layouts & Colors Options', 'kidsa'),
                ),
                array(
                    'id' => 'page_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'kidsa'),
                    'options' => array(
                        'default' => KIDSA_THEME_SETTINGS_IMAGES . '/page/default.png',
                        'left-sidebar' => KIDSA_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'right-sidebar' => KIDSA_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'blank' => KIDSA_THEME_SETTINGS_IMAGES . '/page/blank.png',
                    ),
                    'default' => 'default'
                ),
                array(
                    'id' => 'page_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'kidsa'),
                    'default' => ''
                ),
                array(
                    'id' => 'page_content_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Background Color', 'kidsa'),
                    'default' => ''
                ),
                array(
                    'id' => 'page_content_text_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Text Color', 'kidsa'),
                    'default' => ''
                )

            );

            return $fields;
        }

        /**
         * Page container options
         * @since 1.0.0
         */
        public static function Page_Container_Options($type)
        {
            $fields = array();
            $allowed_html = kidsa()->kses_allowed_html(array('mark'));
            if ('header_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Header, Footer & Breadcrumb Options', 'kidsa'),
                    ),
                    array(
                        'id' => 'page_title',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Title', 'kidsa'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page title.', 'kidsa'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'kidsa'),
                        'text_off' => esc_html__('No', 'kidsa'),
                        'default' => true
                    ),
                    array(
                        'id' => 'page_breadcrumb',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Breadcrumb', 'kidsa'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page breadcrumb.', 'kidsa'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'kidsa'),
                        'text_off' => esc_html__('No', 'kidsa'),
                        'default' => true
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
                        'desc' => wp_kses(__('you can set <mark>navbar type</mark> transparent type or solid background.', 'kidsa'), $allowed_html),
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
                        'desc' => wp_kses(__('you can set <mark>footer type</mark> transparent type or solid background.', 'kidsa'), $allowed_html),
                    ),

                );
            } elseif ('container_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Width & Padding Options', 'kidsa'),
                    ),
                    array(
                        'id' => 'page_container',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Full Width', 'kidsa'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page container full width.', 'kidsa'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'kidsa'),
                        'text_off' => esc_html__('No', 'kidsa'),
                        'default' => false
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Spacing Options', 'kidsa'),
                    ),
                    array(
                        'id' => 'page_spacing_top',
                        'title' => esc_html__('Page Spacing Top', 'kidsa'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page container.', 'kidsa'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'id' => 'page_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'kidsa'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page container.', 'kidsa'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Content Spacing Options', 'kidsa'),
                    ),
                    array(
                        'id' => 'page_content_spacing',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Content Spacing', 'kidsa'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page content spacing.', 'kidsa'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'kidsa'),
                        'text_off' => esc_html__('No', 'kidsa'),
                        'default' => false
                    ),
                    array(
                        'id' => 'page_content_spacing_top',
                        'title' => esc_html__('Page Spacing Bottom', 'kidsa'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'kidsa'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'kidsa'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'kidsa'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_left',
                        'title' => esc_html__('Page Spacing Left', 'kidsa'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Left</mark> for page content area.', 'kidsa'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_right',
                        'title' => esc_html__('Page Spacing Right', 'kidsa'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Right</mark> for page content area.', 'kidsa'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                );
            }

            return $fields;
        }


        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout_options($title, $prefix)
        {
            $allowed_html = kidsa()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Page Options', 'kidsa') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'kidsa'),
                    'options' => array(
                        'right-sidebar' => KIDSA_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'left-sidebar' => KIDSA_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'no-sidebar' => KIDSA_THEME_SETTINGS_IMAGES . '/page/no-sidebar.png',
                    ),
                    'default' => 'right-sidebar'
                ),
                array(
                    'id' => $prefix . '_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'kidsa'),
                    'default' => ''
                ),
                array(
                    'id' => $prefix . '_spacing_top',
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
                    'id' => $prefix . '_spacing_bottom',
                    'title' => esc_html__('Page Spacing Bottom', 'kidsa'),
                    'type' => 'slider',
                    'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'kidsa'), $allowed_html),
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'unit' => 'px',
                    'default' => 120,
                ),
            );

            return $fields;
        }

        /**
         * Post meta
         * @since 1.0.0
         */
        public static function post_meta($prefix, $title)
        {
            $allowed_html = kidsa()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Post Options', 'kidsa') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_posted_by',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted By', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted by.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                )
            );

            if ('blog_post' == $prefix) {
                $fields[] = array(
                    'id' => $prefix . '_posted_cat',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_readmore_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Read More Button', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide read more button.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_readmore_btn_text',
                    'type' => 'text',
                    'title' => esc_html__('Read More Text', 'kidsa'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'kidsa'), $allowed_html),
                    'default' => esc_html__('Read More', 'kidsa'),
                    'dependency' => array($prefix . '_readmore_btn', '==', 'true')
                );
                $fields[] = array(
                    'id' => $prefix . '_excerpt_more',
                    'type' => 'text',
                    'title' => esc_html__('Excerpt More', 'kidsa'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'kidsa'), $allowed_html),
                    'attributes' => array(
                        'placeholder' => esc_html__('....', 'kidsa')
                    )
                );
                $fields[] = array(
                    'id' => $prefix . '_excerpt_length',
                    'type' => 'select',
                    'options' => array(
                        '25' => esc_html__('Short', 'kidsa'),
                        '55' => esc_html__('Regular', 'kidsa'),
                        '100' => esc_html__('Long', 'kidsa'),
                    ),
                    'title' => esc_html__('Excerpt Length', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark> excerpt length</mark> for post.', 'kidsa'), $allowed_html),
                );
            } elseif ('blog_single_post' == $prefix) {

                $fields[] = array(
                    'id' => $prefix . '_posted_category',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
				  $fields[] = array(
                    'id' => $prefix . '_post_date',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Date', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post date.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_posted_tag',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Tags', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post tags.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_posted_share',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Share', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post share.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_next_post_nav_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Navigation', 'kidsa'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post navigation button.', 'kidsa'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'kidsa'),
                    'text_off' => esc_html__('No', 'kidsa'),
                    'default' => true
                );
            }

            return $fields;
        }

    }//end class

}//end if

