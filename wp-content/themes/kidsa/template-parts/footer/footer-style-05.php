<?php
/**
 * Footer Style 04
 * @package kidsa
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2025 kidsa All Rights Reserved.','kidsa');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_5_shape_1 = cs_get_option('footer_5_shape_1');
$footer_5_logo = cs_get_option('footer_5_logo');
$footer_5_text = cs_get_option('footer_5_text');

$footer_5_contact_btn_url = cs_get_option('footer_5_contact_btn_url');
$footer_5_contact_btn = cs_get_option('footer_5_contact_btn');

$back_top_enable = cs_get_option('back_top_enable');
$back_top_icon = cs_get_option('back_top_icon');  

?>

<footer class="footer-section-5 bg-cover fix" style="background-image: url(<?php echo esc_url($footer_5_shape_1['url']); ?>);">
    <div class="footer-widgets-wrapper style-2">
            <div class="footer-top wow fadeInUp" data-wow-delay=".3s">
            <?php if (!empty($footer_5_logo)) { ?>
                <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_5_logo['url']); ?>" alt="footer-logo"></a>
            <?php } ?>
            <p>
                <?php echo esc_html($footer_5_text); ?>
            </p>
            </div>
                <?php
                $footer_5_contact_us = cs_get_option('footer_5_contact_us');

                if ($footer_5_contact_us) {
                ?>
                    <ul class="footer-list">
                        <?php foreach ($footer_5_contact_us as $index => $contact_info): ?>
                            <?php if (isset($contact_info['footer_5_contact_icon'], $contact_info['footer_5_contact_title'], $contact_info['footer_5_contact_url'])): ?>
                                <li class="wow fadeInUp" data-wow-delay="<?php echo esc_attr(0.3 + ($index * 0.2)); ?>s">
                                    <i class="<?php echo esc_attr($contact_info['footer_5_contact_icon']); ?>"></i>
                                    <a href="<?php echo esc_url($contact_info['footer_5_contact_url']); ?>">
                                        <?php echo esc_html($contact_info['footer_5_contact_title']); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php
                }
                ?>
            <div class="footer-middle-btn wow fadeInUp" data-wow-delay=".3s">
                <a href="<?php echo esc_url($footer_5_contact_btn_url); ?>" class="theme-btn">
                <?php echo esc_html($footer_5_contact_btn); ?> <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
    </div>
        <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper style-2 d-flex align-items-center justify-content-between">
                <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                <?php
                    echo wp_kses($copyright_text, kidsa()->kses_allowed_html(array('a')));
                ?>
                </p>
                <div class="social-icon d-flex align-items-center wow fadeInUp" data-wow-delay=".5s">
                <?php   
                    $footer_5_socials = cs_get_option('footer_5_socials');
                    if ( $footer_5_socials ) {
                            foreach ( $footer_5_socials as $item ) {
                                if ( isset( $item['footer_5_socials_icon'] ) && isset( $item['footer_5_socials_icon_url'] ) ) {
                                    echo '<a href="' . esc_url( $item['footer_5_socials_icon_url'] ) . '">';
                                    echo '<i class="' . esc_attr( $item['footer_5_socials_icon'] ) . '"></i>';
                                    echo '</a>';
                                }
                            }                            
                        }                    
                    ?>
                </div>
            </div>
        </div>
        <?php 
        if( $back_top_enable ): ?>
        <a href="#" id="scrollUp" class="scroll-icon">
                <i class="<?php echo esc_attr($back_top_icon)?>"></i>
            </a>
        <?php 
        endif; ?> 
    </div>
</footer>

