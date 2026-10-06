<?php
/**
 * Header Style 5
 * @package kidsa
 * @since 1.0.0
 */
?>

<?php 
 $header_5_top_bar_enabled = cs_get_option('header_5_top_bar_enabled'); 

 $header_5_shape = cs_get_option('header_5_shape');

 $header_5_top_bar_contacts = cs_get_option('header_5_top_bar_contacts');
 $header_5_top_bar_socials = cs_get_option('header_5_top_bar_socials');

 $header_5_logo = cs_get_option('header_5_logo');

 $header_5_search_enabled = cs_get_option('header_5_search_enabled');          
 $header_5_right_btn_text = cs_get_option('header_5_right_btn_text');
 $header_5_right_btn_url = cs_get_option('header_5_right_btn_url'); 
 $header_5_right_btn_enabled = cs_get_option('header_5_right_btn_enabled');  

 $sticky_header_enabled = cs_get_option('sticky_header_enabled');

?> 

<header id="header-sticky" class="header-5" data-sticky="<?php echo esc_attr($sticky_header_enabled ? 'true' : 'false'); ?>">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                        <?php
                            $header_5_logo = cs_get_option('header_5_logo');
                            if (has_custom_logo() && empty($header_5_logo['id'])) {
                                the_custom_logo();
                            } elseif (!empty($header_5_logo['id'])) {
                                printf('<a class="header-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_5_logo['url'], $header_5_logo['alt']);
                            } else {
                                printf('<a class="d-inline-block site-title header-logo" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                            }
                        ?>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => '',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => 'mobile-menu',
                                    'fallback_cb' => 'kidsa_theme_fallback_menu',
                                ));
                            ?>
                        </div>
                    </div>
                   
                    <?php 
                        if( $header_5_search_enabled ): ?>
                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                    <?php 
                    endif; ?> 
                    <?php 
                        if( $header_5_right_btn_enabled ): ?>
                    <div class="header-button">
                        <a href="<?php echo esc_url($header_5_right_btn_url); ?>" class="theme-btn">
                            <span>
                                <?php echo esc_html($header_5_right_btn_text); ?>
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </span>
                        </a>
                    </div>
                    <?php 
                    endif; ?> 
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
