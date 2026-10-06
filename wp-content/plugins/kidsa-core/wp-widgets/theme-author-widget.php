<?php
/**
 * Theme Author Widget
 * @package Kidsa
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('kidsa_author_widget', array(
        'title' => esc_html__('Kidsa: Author', 'kidsa-core'),
        'classname' => 'kidsa-widget-author',
        'description' => esc_html__('Display Author widget', 'kidsa-core'),
        'fields' => array(
            array(
                'id' => 'image',
                'type' => 'media',
                'title' => esc_html__('Image', 'Kidsa-core')
            ),
            array(
                'id' => 'name',
                'type' => 'text',
                'title' => esc_html__('Name', 'Kidsa-core'),
                'default' => esc_html__('Leslie Alexander', 'kidsa-core')
            ),
            array(
                'id' => 'phone',
                'type' => 'text',
                'title' => esc_html__('Phone', 'Kidsa-core'),
                'default' => esc_html__('(480) 555-0103', 'kidsa-core')
            ),

            array(
                'id' => 'kidsa-author-social-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Author', 'kidsa-core'),
                'fields' => array(
                    array(
                        'id' => 'kidsa-author-social',
                        'type' => 'icon',
                        'title' => esc_html__('author social', 'kidsa-core'),
                    ),
                    array(
                        'id' => 'kidsa-author-social-url',
                        'type' => 'text',
                        'title' => esc_html__('author social', 'kidsa-core'),
                        'default' => esc_html__('#', 'kidsa-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('kidsa_author_widget')) {
        function kidsa_author_widget($args, $instance)
        {

            echo $args['before_widget'];
            $image = $instance['image'];
            $img_id = $image['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id,'full')[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            $name = $instance['name'] ?? '';
            $phone = $instance['phone'] ?? '';
            $author = is_array($instance['kidsa-author-social-repeater']) && !empty($instance['kidsa-author-social-repeater']) ? $instance['kidsa-author-social-repeater'] : [];
            ?>

            <div class="widget_author text-center">  
                <?php
                    if (!empty($img_print)) {
                        printf('<div class="thumb"><img src="%1$s" alt="%2$s"/></div>', esc_url($img_print), esc_attr($alt_text));
                    }
                ?> 
                <div class="details">
                    <h5><?php echo esc_html($name); ?></h5>
                    <h6><?php echo esc_html($phone); ?></h6>
                    <ul class="social-media-list">
                        <?php
                            foreach ($author as $socials) {
                                echo '<li>
                                    <a href="'.$socials['kidsa-author-social-url'].'">
                                        <i class="' . $socials['kidsa-author-social'] . '"></i>
                                    </a>
                                </li>';
                            };
                        ?>
                    </ul>
                </div>
            </div>
            <?php

            echo $args['after_widget'];

        }
    }

}

?>