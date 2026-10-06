<?php
/**
 * Footer Style 04
 * @package kidsa
 * @since 1.0.0
 */

$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text'): esc_html__('Copyright © 2024 kidsa All Rights Reserved.','kidsa');
$copyright_text = str_replace('{copy}','&copy;',$copyright_text);
$copyright_text = str_replace('{year}',date('Y'),$copyright_text);

$footer_4_shape_1 = cs_get_option('footer_4_shape_1');
$footer_4_shape_2 = cs_get_option('footer_4_shape_2');
$footer_4_shape_3 = cs_get_option('footer_4_shape_3');
$footer_4_logo = cs_get_option('footer_4_logo');
$footer_4_text = cs_get_option('footer_4_text');
$footer_4_form = cs_get_option('footer_4_form');

$footer_4_contact_btn_url = cs_get_option('footer_4_contact_btn_url');
$footer_4_contact_btn = cs_get_option('footer_4_contact_btn');
$footer_4_contact_text = cs_get_option('footer_4_contact_text');

$back_top_enable = cs_get_option('back_top_enable');
$back_top_icon = cs_get_option('back_top_icon');  

?>

<footer class="footer-section section-bg fix">
            <div class="tree-shape float-bob-x">
                <img src="<?php echo esc_url($footer_4_shape_1['url']); ?>" alt="">
            </div>
            <div class="zebra-shape-2 float-bob-y">
                <img src="<?php echo esc_url($footer_4_shape_2['url']); ?>" alt="">
            </div>
        <div class="footer-widgets-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 pe-md-5 wow fadeInUp" data-wow-delay=".3s">
                        <div class="single-footer-widget">
                                <?php if (!empty($footer_4_logo)) { ?>
                                    <div class="widget-head">
                                        <a href="<?php echo esc_url(home_url('/')) ?>"><img src="<?php echo esc_url($footer_4_logo['url']); ?>" alt="footer-logo"></a>
                                    </div>
                                <?php } ?>
                            <div class="footer-content">
                                <p><?php echo esc_html($footer_4_text); ?></p>
                                <div class="footer-input">
                                    <?php echo do_shortcode($footer_4_form); ?>
                                </div>
                                <div class="social-icon d-flex align-items-center">
                                <?php   
                                    $footer_4_socials = cs_get_option('footer_4_socials');
                                    if ( $footer_4_socials ) {
                                            foreach ( $footer_4_socials as $item ) {
                                                if ( isset( $item['footer_4_socials_icon'] ) && isset( $item['footer_4_socials_icon_url'] ) ) {
                                                    echo '<a href="' . esc_url( $item['footer_4_socials_icon_url'] ) . '">';
                                                    echo '<i class="' . esc_attr( $item['footer_4_socials_icon'] ) . '"></i>';
                                                    echo '</a>';
                                                }
                                            }                            
                                        }                    
                                    ?>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                       <!-- footer menu 1 -->
                       <?php get_template_part('template-parts/content/footer-widget'); ?>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".5s">
                          <!-- footer menu 2 -->
                          <?php get_template_part('template-parts/content/footer-widget-two'); ?>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 ps-xl-5 wow fadeInUp" data-wow-delay=".5s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3><?php echo esc_html($footer_4_contact_text); ?></h3>
                            </div>
                            <div class="footer-content">
                                <?php
                                    $footer_4_contact_us = cs_get_option('footer_4_contact_us');

                                    if ($footer_4_contact_us) {
                                    ?>
                                        <ul class="contact-info">
                                            <?php foreach ($footer_4_contact_us as $contact_info): ?>
                                                <?php if (isset($contact_info['footer_4_contact_icon'], $contact_info['footer_4_contact_title'], $contact_info['footer_4_contact_url'])): ?>
                                                    <li>
                                                        <i class="<?php echo esc_attr($contact_info['footer_4_contact_icon']); ?>"></i>
                                                        <a href="<?php echo esc_url($contact_info['footer_4_contact_url']); ?>"><?php echo esc_html($contact_info['footer_4_contact_title']); ?></a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php
                                    }
                                ?>
                                <a href="<?php echo esc_url($footer_4_contact_btn_url); ?>" class="theme-btn mt-4"><?php echo esc_html($footer_4_contact_btn); ?><i class="fa-solid fa-arrow-right-long"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="f-bottom-shape">
                <img src="<?php echo esc_url($footer_4_shape_3['url']); ?>" alt="">
            </div>
            <div class="container">
                <div class="footer-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                    <?php
                        echo wp_kses($copyright_text, kidsa()->kses_allowed_html(array('a')));
                    ?>
                    </p>
                    <ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
                        <?php   
                        $footer_1_terms = cs_get_option('footer_1_terms');
                        if ($footer_1_terms) {
                            foreach ($footer_1_terms as $term_item) {
                                if (isset($term_item['footer_1_terms_text']) && isset($term_item['footer_1_terms_url'])) {
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($term_item['footer_1_terms_url']); ?>">
                                            <?php echo esc_html($term_item['footer_1_terms_text']); ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                        }                    
                        ?>
                    </ul>
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

