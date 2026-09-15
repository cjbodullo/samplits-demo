<?php
/**
 * Header Style 2
 * @package kidsa
 * @since 1.0.0
 */
?>

<?php 
    $header_two_search_enabled = cs_get_option('header_two_search_enabled');          
    $header_two_right_btn_text = cs_get_option('header_two_right_btn_text');
    $header_two_right_btn_url = cs_get_option('header_two_right_btn_url'); 
    $header_two_right_btn_enabled = cs_get_option('header_two_right_btn_enabled');   
    
    $header_two_top_bar_enabled = cs_get_option('header_two_top_bar_enabled');
    $header_2_top_bar_contacts = cs_get_option('header_2_top_bar_contacts');
    $header_2_top_bar_socials = cs_get_option('header_2_top_bar_socials');
?> 

<header class="header-section">
<?php 
    if( $header_two_top_bar_enabled ): ?>
    <div class="header-top-section">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="contact-list">
                <?php                    
                    if ( $header_2_top_bar_contacts ) {
                        echo '<ul class="contact-list">';
                        foreach ( $header_2_top_bar_contacts as $item ) {
                            echo '<li>';
                            if ( isset( $item['header_2_top_bar_icon'] ) ) {
                                echo '<i class="' . esc_attr( $item['header_2_top_bar_icon'] ) . '"></i>';
                            }
                            if ( isset( $item['header_2_top_bar_info'] ) ) {
                                echo '<a href="'. esc_url( $item['header_2_top_bar_info_url'] ) .'" class="link">' . esc_html( $item['header_2_top_bar_info'] ) . '</a>';
                            }
                            echo '</li>';
                        }
                        echo '</ul>';
                    }          
                ?>
                </ul>
                <div class="social-icon d-flex align-items-center">
                    <span>Follow Us On:</span>
                        <?php                           
                            if ( $header_2_top_bar_socials ) {
                                foreach ( $header_2_top_bar_socials as $item ) {
                                    if ( isset( $item['header_2_top_bar_socials_icon'] ) && isset( $item['header_2_top_bar_socials_icon_url'] ) ) {
                                        echo '<a href="' . esc_url( $item['header_2_top_bar_socials_icon_url'] ) . '">';
                                        echo '<i class="' . esc_attr( $item['header_2_top_bar_socials_icon'] ) . '"></i>';
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
    <div id="header-sticky" class="header-2" data-sticky="<?php echo esc_attr($sticky_header_enabled ? 'true' : 'false'); ?>">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main style-2">
                    <div class="header-left">
                        <div class="logo">
                        <?php
                            $header_two_logo = cs_get_option('header_two_logo');
                            if (has_custom_logo() && empty($header_two_logo['id'])) {
                                the_custom_logo();
                            } elseif (!empty($header_two_logo['id'])) {
                                printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_two_logo['url'], $header_two_logo['alt']);
                            } else {
                                printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
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
                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                        <div class="header-button">
                            <?php 
                            if( $header_two_right_btn_enabled ): ?>
                                <a href="<?php echo esc_url($header_two_right_btn_url); ?>" class="theme-btn">
                                    <span>
                                        <?php echo esc_html($header_two_right_btn_text); ?>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                    </span>
                                </a>
                            </div>
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
    </div>
</header>
