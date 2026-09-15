<?php
/**
 * The template for displaying 404 Error page
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kidsa
 */

get_header();
$get_404_options_value = Kidsa_Group_Fields_Value::get_404_options_value();
$error_bg = cs_get_option('error_bg');
?>

    <section class="Error-section section-padding fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="error-items">
                        <?php if (!empty($error_bg)): ?>
                        <div class="error-image">
                            <img src="<?php echo esc_url($error_bg['url']) ?>" alt="<?php echo esc_attr($error_bg['alt']) ?>">
                        </div>
                        <?php endif; ?>
                        <h2>
                            <?php echo esc_html($get_404_options_value['title']); ?>
                        </h2>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="theme-btn wow fadeInUp" data-wow-delay=".8s">
                            <?php echo esc_html($get_404_options_value['btn_text']); ?>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>




<?php
get_footer();
