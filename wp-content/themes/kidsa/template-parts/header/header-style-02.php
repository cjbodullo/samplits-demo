<?php
/**
 * Header Style 3
 * @package kidsa
 * @since 1.0.0
 */
?>

<?php         
    $header_three_right_btn_text = cs_get_option('header_three_right_btn_text');
    $header_three_right_btn_url = cs_get_option('header_three_right_btn_url'); 
    $header_three_right_btn_enabled = cs_get_option('header_three_right_btn_enabled');   
    
    $header_three_top_bar_enabled = cs_get_option('header_three_top_bar_enabled');
    $header_3_top_bar_contacts = cs_get_option('header_3_top_bar_contacts');
    $header_3_top_bar_socials = cs_get_option('header_3_top_bar_socials');

    $header_three_phone_number_enabled = cs_get_option('header_three_phone_number_enabled');
    $header_three_phone_number_url = cs_get_option('header_three_phone_number_url');
    $header_three_phone_number = cs_get_option('header_three_phone_number');
    $header_three_phone_title = cs_get_option('header_three_phone_title');
?> 



<?php 
    if( $header_three_top_bar_enabled ): ?>
    <div class="header-top-section-3">
        <div class="container">
            <div class="header-top-wrapper style-2">
                <?php                    
                    if ( $header_3_top_bar_contacts ) {
                        echo '<ul class="contact-list">';
                        foreach ( $header_3_top_bar_contacts as $item ) {
                            echo '<li>';
                            if ( isset( $item['header_3_top_bar_icon'] ) ) {
                                echo '<i class="' . esc_attr( $item['header_3_top_bar_icon'] ) . '"></i>';
                            }
                            if ( isset( $item['header_3_top_bar_info'] ) ) {
                                echo '<a href="'. esc_url( $item['header_3_top_bar_info_url'] ) .'" class="link">' . esc_html( $item['header_3_top_bar_info'] ) . '</a>';
                            }
                            echo '</li>';
                        }
                        echo '</ul>';
                    }          
                ?>
                <div class="social-icon d-flex align-items-center">
                    <?php                           
                            if ( $header_3_top_bar_socials ) {
                                foreach ( $header_3_top_bar_socials as $item ) {
                                    if ( isset( $item['header_3_top_bar_socials_icon'] ) && isset( $item['header_3_top_bar_socials_icon_url'] ) ) {
                                        echo '<a href="' . esc_url( $item['header_3_top_bar_socials_icon_url'] ) . '">';
                                        echo '<i class="' . esc_attr( $item['header_3_top_bar_socials_icon'] ) . '"></i>';
                                        echo '</a>';
                                    }
                                }                            
                            }                    
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    endif; ?> 

<?php
$sticky_header_enabled = cs_get_option('sticky_header_enabled');
?>

<header id="header-sticky" class="header-3" data-sticky="<?php echo esc_attr($sticky_header_enabled ? 'true' : 'false'); ?>">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                    <?php
                        $header_three_logo = cs_get_option('header_three_logo');
                        if (has_custom_logo() && empty($header_three_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($header_three_logo['id'])) {
                            printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_three_logo['url'], $header_three_logo['alt']);
                        } else {
                            printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                        ?>
                    </div>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => 'mobile-custom',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => 'mobile-menu',
                                    'fallback_cb' => false,
                                ));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                        <?php 
                        if( $header_three_phone_number_enabled ): ?>
                            <div class="author-icon">
                                <div class="icon">
                                        <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="content">
                                    <span><?php echo esc_html($header_three_phone_title); ?></span>
                                    <h5>
                                        <a href="<?php echo esc_url($header_three_phone_number_url); ?>"><?php echo esc_html($header_three_phone_number); ?></a>
                                    </h5>
                                </div>
                            </div>
                        <?php 
                        endif; ?> 
                    <div class="header-button">
                        <?php 
                        if( $header_three_right_btn_enabled ): ?>
                            <a href="<?php echo esc_url($header_three_right_btn_url); ?>" class="theme-btn">
                                <span>
                                    <?php echo esc_html($header_three_right_btn_text); ?>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </a>
                            <?php 
                        endif; ?> 
                    </div>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
