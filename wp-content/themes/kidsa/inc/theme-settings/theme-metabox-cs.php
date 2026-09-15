<?php
/**
 * Theme Metabox Options
 * @package kidsa
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = kidsa()->kses_allowed_html(array('mark'));

    $prefix = 'kidsa';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'kidsa'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'kidsa'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'kidsa'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'kidsa'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'kidsa'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'kidsa'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'kidsa'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'kidsa'),
        'icon' => 'fa fa-columns',
        'fields' => Kidsa_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'kidsa'),
        'icon' => 'fa fa-header',
        'fields' => Kidsa_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'kidsa'),
        'icon' => 'fa fa-file-o',
        'fields' => Kidsa_Group_Fields::Page_Container_Options('container_options')
    ));
    //	Service Meta Box
    CSF::createMetabox($prefix . '_service_options', array(
        'title' => esc_html__('Service Options', 'kidsa'),
        'post_type' => 'service',
    ));
    CSF::createSection($prefix . '_service_options', array(
        'fields' => array(
            array(
                'id' => 'service_icon',
                'type' => 'media',
                'title' => esc_html__('Icon', 'kidsa'),
                'desc' => wp_kses(__('Select Your Icon', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'service_icon_shape',
                'type' => 'media',
                'title' => esc_html__('Icon Shape', 'kidsa'),
                'desc' => wp_kses(__('Select Your Icon Shape', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'service_icon_shape_2',
                'type' => 'media',
                'title' => esc_html__('Icon Shape 2', 'kidsa'),
                'desc' => wp_kses(__('Select Your Icon Shape 2', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'service_line_shape',
                'type' => 'media',
                'title' => esc_html__('Line Shape', 'kidsa'),
                'desc' => wp_kses(__('Select Your Shape', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'service_content',
                'type' => 'textarea',
                'title' => esc_html__('Service content', 'kidsa'),
                'desc' => wp_kses(__('Select Your service content', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'service_content_2',
                'type' => 'textarea',
                'title' => esc_html__('Service Review', 'kidsa'),
                'desc' => wp_kses(__('Your service review', 'kidsa'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
     Team Options
    -------------------------------------*/
    
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'kidsa'),
        'post_type' => array('team'),
        'priority' => 'high'
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Team Info', 'kidsa'),
        'id' => 'kidsa-info',
        'fields' => array(
            array(
                'id' => 'team_shape',
                'type' => 'media',
                'title' => esc_html__('Shape Image', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'team_shape_2',
                'type' => 'media',
                'title' => esc_html__('Background Shape', 'kidsa'),
                'library' => 'image',
                'desc' => wp_kses(__('you can upload <mark> shape image</mark> here', 'kidsa'), $allowed_html),
            ),
            array(
                'id' => 'designation',
                'type' => 'text',
                'title' => esc_html__('Designation', 'kidsa'),
            ),
            array(
                'id' => 'team_content',
                'type' => 'textarea',
                'title' => esc_html__('Team content', 'kidsa'),
                'desc' => wp_kses(__('Write Your content', 'kidsa'), $allowed_html)
            )
        )
    ));
    CSF::createSection($prefix . '_team_options', array(
        'title' => esc_html__('Social Info', 'kidsa'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'social-icons',
                'type' => 'repeater',
                'title' => esc_html__('Social Info', 'kidsa'),
                'fields' => array(
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'kidsa'),
                        'default' => 'fa fa-facebook-f'

                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('URL', 'kidsa')
                    ),

                ),
            ),
        )
    ));

    //	Project Meta Box
    CSF::createMetabox($prefix . '_project_options', array(
        'title' => esc_html__('Project Options', 'kidsa'),
        'post_type' => 'project',
    ));

    CSF::createSection($prefix . '_project_options', array(
        'fields' => array(
            array(
                'id' => 'project_icon',
                'type' => 'text',
                'title' => esc_html__('Project Icon', 'kidsa'),
                'desc' => wp_kses(__('Write your Project Icon Text', 'kidsa'), $allowed_html)
            ),
			 array(
                'id' => 'project_subtitle_2',
                'type' => 'text',
                'title' => esc_html__('Project Subtitle Single', 'kidsa'),
                'desc' => wp_kses(__('Write your Project Subtitle', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'project_subtitle',
                'type' => 'textarea',
                'title' => esc_html__('Project Subtitle List', 'kidsa'),
                'desc' => wp_kses(__('Write your Project Subtitle', 'kidsa'), $allowed_html)
            ),
            array(
                'id' => 'project_content',
                'type' => 'textarea',
                'title' => esc_html__('Project content', 'kidsa'),
                'desc' => wp_kses(__('Write your Project content', 'kidsa'), $allowed_html)
            ),
        )
    ));

    //	Courses Meta Box
    CSF::createMetabox($prefix . '_courses_options', array(
        'title' => esc_html__('Courses Options', 'kidsa'),
        'post_type' => 'courses',
    ));

    CSF::createSection($prefix . '_courses_options', array(
        'title' => esc_html__('Social Info', 'kidsa'),
        'id' => 'social-info',
        'fields' => array(
            array(
                'id' => 'course_start_date_option',
                'type' => 'text',
                'title' => esc_html__('Start From', 'kidsa'),
                'default' => esc_html__('Thursday, Nov 4, 2023', 'kidsa'),
            ),
            array(
                'id' => 'study-option',
                'type' => 'repeater',
                'title' => esc_html__('Study Options', 'kidsa'),
                'fields' => array(

                    array(
                        'id' => 'qualification',
                        'type' => 'text',
                        'title' => esc_html__('Qualification', 'kidsa'),
                        'default' => esc_html__('Bachelor of Aviation (Hons)', 'kidsa'),
                    ),
                    array(
                        'id' => 'length',
                        'type' => 'text',
                        'title' => esc_html__('Length', 'kidsa'),
                        'default' => esc_html__('9 months full time', 'kidsa'),
                    ),
                    array(
                        'id' => 'code',
                        'type' => 'text',
                        'title' => esc_html__('Code', 'kidsa'),
                        'default' => esc_html__('ba1x', 'kidsa'),
                    ),
                ),
            ),
            array(
                'id' => 'course_module_option',
                'type' => 'text',
                'title' => esc_html__('Course Module Title', 'kidsa'),
                'default' => esc_html__('Download full course Module', 'kidsa'),
            ),
            array(
                'id' => 'course_module_button_title',
                'type' => 'text',
                'title' => esc_html__('Course Module Button Title', 'kidsa'),
                'default' => esc_html__('Download', 'kidsa'),
            ),
            array(
                'id' => 'course_module_button_url',
                'type' => 'text',
                'title' => esc_html__('Course Module Button URL', 'kidsa'),
                'default' => esc_html__('#', 'kidsa'),
            ),
        )
    ));
}//endif