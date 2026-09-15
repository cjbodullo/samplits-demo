<?php
/**
 * Theme Social Share Widget
 * @package Kidsa
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('kidsa_social_share_widget', array(
        'title' => esc_html__('Kidsa: Social Share', 'kidsa-core'),
        'classname' => 'kidsa-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'kidsa-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'kidsa-core'),
                'default' => esc_html__('Never Miss News', 'kidsa-core')
            ),
            array(
                'id' => 'kidsa-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'kidsa-core'),
                'fields' => array(
                    array(
                        'id' => 'kidsa-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'kidsa-core'),
                        'default' => 'fab fa-facebook'
                    ),
                    array(
                        'id' => 'kidsa-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'kidsa-core'),
                        'default' => '#'
                    ),
                ),
            ),
        )
    ));


    if (!function_exists('kidsa_social_share_widget')) {
        function kidsa_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];
            

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['kidsa-social-icon-repeater']) && !empty($instance['kidsa-social-icon-repeater']) ? $instance['kidsa-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-icon style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['kidsa-social-icon']), esc_url($icon['kidsa-social-text']));
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