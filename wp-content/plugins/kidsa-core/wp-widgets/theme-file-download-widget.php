<?php
/**
 * Theme File Download Widget
 * @package Kidsa
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('kidsa_file_download_widget', array(
        'title' => esc_html__('Kidsa: File Download', 'kidsa-core'),
        'classname' => 'kidsa-widget-file-download',
        'description' => esc_html__('Display File Download widget', 'kidsa-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'Kidsa-core'),
                'default' => esc_html__('Download', 'kidsa-core')
            ),

            array(
                'id' => 'kidsa-file-download-repeater',
                'type' => 'repeater',
                'title' => esc_html__('File Download', 'kidsa-core'),
                'fields' => array(
                    array(
                        'id' => 'kidsa-file-download',
                        'type' => 'media',
                        'title' => esc_html__('File', 'kidsa-core'),
                    ),
                    array(
                        'id' => 'kidsa-file-download-text',
                        'type' => 'text',
                        'title' => esc_html__('File Text', 'kidsa-core'),
                        'default' => esc_html__('Company Profile', 'kidsa-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('kidsa_file_download_widget')) {
        function kidsa_file_download_widget($args, $instance)
        {

            echo $args['before_widget'];

            $title = $instance['title'] ?? '';
            $file_download = is_array($instance['kidsa-file-download-repeater']) && !empty($instance['kidsa-file-download-repeater']) ? $instance['kidsa-file-download-repeater'] : [];


            ?>
            <div class="widget_download">
                <h5 class="widget-headline style-01"><?php echo esc_html($title); ?></h5>               
                <ul>
                    <?php
                        foreach ($file_download as $file) {
                            echo '<li class="mb-0 mt-0">
                                <a download href="'.$file['kidsa-file-download']['url'].'">
                                    ' . $file['kidsa-file-download-text'] . '
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                            </li>';
                        };
                    ?>
                </ul>
            </div>
            <?php

            echo $args['after_widget'];

        }
    }

}

?>