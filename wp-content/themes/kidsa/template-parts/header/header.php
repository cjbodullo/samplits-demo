<?php
/**
 * Theme Default Header
 * @package kidsa
 * @since 1.0.0
 */
?>

<?php
 $header_one_top_bar_enabled = cs_get_option('header_one_top_bar_enabled'); 

 $header_one_shape = cs_get_option('header_one_shape');
 $header_one_category_menu_enabled = cs_get_option('header_one_category_menu_enabled');

 $header_1_top_bar_contacts = cs_get_option('header_1_top_bar_contacts');
 $header_1_top_bar_socials = cs_get_option('header_1_top_bar_socials');

 $header_one_logo = cs_get_option('header_one_logo');

 $header_one_search_enabled = cs_get_option('header_one_search_enabled');          
 $header_one_right_btn_text = cs_get_option('header_one_right_btn_text');
 $header_one_right_btn_url = cs_get_option('header_one_right_btn_url'); 
 $header_one_right_btn_enabled = cs_get_option('header_one_right_btn_enabled');  

 $header_default_cart_btn_enabled = cs_get_option('header_default_cart_btn_enabled'); 
?> 


<?php 
if( $header_one_top_bar_enabled ): ?>
    <!-- Header Top Section Start -->
    <div class="header-top-section">
        <div class="header-top-shape">
            <img src="<?php echo esc_url($header_one_shape['url']); ?>" alt="shape-img">
        </div>
        <div class="container-fluid">
            <div class="header-top-wrapper">
                <?php
                    if ($header_1_top_bar_contacts) {
                        ?><ul class="contact-list"><?php
                        foreach ($header_1_top_bar_contacts as $item) {
                            ?><li><?php
                            if (isset($item['header_1_top_bar_icon'])) {
                                ?><i class="<?php echo esc_attr($item['header_1_top_bar_icon']); ?>"></i><?php
                            }
                            if (isset($item['header_1_top_bar_info'])) {
                                ?><a href="<?php echo esc_url($item['header_1_top_bar_info_url']); ?>" class="link"><?php echo esc_html($item['header_1_top_bar_info']); ?></a><?php
                            }
                            ?></li><?php
                        }
                        ?></ul><?php
                    }
                ?>
                <div class="social-icon d-flex align-items-center">
                    <span>Follow Us On:</span>

                    <?php   
                    if ($header_1_top_bar_socials) {
                        foreach ($header_1_top_bar_socials as $item) {
                            if (isset($item['header_1_top_bar_socials_icon'], $item['header_1_top_bar_socials_icon_url'])) {
                                $icon_url = esc_url($item['header_1_top_bar_socials_icon_url']);
                                $icon_class = esc_attr($item['header_1_top_bar_socials_icon']);

                                ?><a href="<?php echo esc_attr($icon_url); ?>"><i class="<?php echo esc_attr($icon_class); ?>"></i></a><?php
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
<!-- Header Section Start -->
<header id="header-sticky" class="header-1" data-sticky="<?php echo esc_attr($sticky_header_enabled ? 'true' : 'false'); ?>">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                        <?php                               
                        if (has_custom_logo() && empty($header_one_logo['id'])) {
                            the_custom_logo();
                        } elseif (!empty($header_one_logo['id'])) {
                            printf('<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
                        } else {
                            printf('<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                        }
                        ?>
                    </div>
					<?php 
					if( $header_one_category_menu_enabled ): ?>
                    <div class="category-oneadjust">
                        <i class="me-2 fa fa-th-large"></i>
                        <span>Category</span>
                        <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'category-menu',
                                    'menu_class' => '',
                                    'container' => 'div',
                                    'container_class' => '',
                                    'container_id' => 'kidsa_category_menu',
                                    'fallback_cb' => 'kidsa_theme_fallback_menu',
                                ));
                        ?>
                    </div>
					<?php endif; ?>
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
                    if( $header_default_cart_btn_enabled ): ?>
                    <div class="header__cart">
                        <?php if(class_exists('WooCommerce')) : ?>
                            <a class="mukit_action_btn" href="#"> <i class="fa-sharp fa-regular fa-cart-shopping"></i> <span id="mukit-cart-item" class="cart__count"><?php echo esc_html(WC()->cart->cart_contents_count);?></span></a>
                        <?php echo mukit_shopping_cart();?>
                        <?php 
                        endif; ?> 
                    </div>                                   
                    <?php 
                    endif; ?> 

                    <?php 
                    if( $header_one_search_enabled ): ?>
                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                    <?php 
                    endif; ?>  
                    <div class="header-button">
                        <?php 
                        if( $header_one_right_btn_enabled ): ?>
                            <a href="<?php echo esc_url($header_one_right_btn_url); ?>" class="theme-btn">
                                <span>
                                    <?php echo esc_html($header_one_right_btn_text); ?>
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