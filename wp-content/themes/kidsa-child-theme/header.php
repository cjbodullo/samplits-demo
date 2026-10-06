<?php
/**
 * Theme Header Template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidsa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php
    do_action( 'kidsa_after_body' );
    $page_container_meta = Kidsa_Group_Fields_Value::page_container( 'kidsa', 'header_options' );
?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kidsa' ); ?></a>
    <header id="masthead" class="site-header">
        <?php 
            $header_two_search_enabled = cs_get_option('header_two_search_enabled');          
            $header_two_right_btn_text = cs_get_option('header_two_right_btn_text');
            $header_two_right_btn_url = cs_get_option('header_two_right_btn_url'); 
            $header_two_right_btn_enabled = cs_get_option('header_two_right_btn_enabled');   
            
            $header_two_top_bar_enabled = cs_get_option('header_two_top_bar_enabled');
            $header_2_top_bar_contacts = cs_get_option('header_2_top_bar_contacts');
            $header_2_top_bar_socials = cs_get_option('header_2_top_bar_socials');
            $sticky_header_enabled = cs_get_option('sticky_header_enabled');
        ?> 

        <header class="header-section">
            
            <div id="header-sticky" class="header-2" data-sticky="<?php echo esc_attr( $sticky_header_enabled ? 'true' : 'false' ); ?>">
                <div class="bg-white mega-menu-wrapper">
                    <div class="container header-main pb-0 pe-0 ps-0 pt-1 style-2">
                        <div class="header-left">
                            <div class="logo">
                            <?php
                                $header_two_logo = cs_get_option('header_two_logo');
                                if ( has_custom_logo() && empty( $header_two_logo['id'] ) ) {
                                    the_custom_logo();
                                } elseif ( ! empty( $header_two_logo['id'] ) ) {
                                    printf(
                                        '<a class="d-inline-block site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>',
                                        esc_url( get_home_url() ),
                                        esc_url( $header_two_logo['url'] ),
                                        esc_attr( $header_two_logo['alt'] )
                                    );
                                } else {
                                    printf( '<a class="d-inline-block site-title" href="%1$s">%2$s</a>', esc_url( get_home_url() ), esc_html( get_bloginfo( 'title' ) ) );
                                }
                                ?>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="mean__menu-wrapper">
                                <div class="main-menu d-none d-lg-block">
                                    <?php
                                        wp_nav_menu(array(
                                        'theme_location' => 'main-menu',
                                        'menu_class' => '',
                                        'container' => 'div',
                                        'container_class' => '',
                                        'container_id' => 'kidsa_main_menu',
                                        'fallback_cb' => 'kidsa_theme_fallback_menu',
                                        ));
                                    ?>
                                </div>
                            </div>
                            	<div class="header-button">
                                <?php 
                                if( $header_two_right_btn_enabled ): ?>
                                    <a href="<?php echo esc_url($header_two_right_btn_url); ?>" target="_blank" class="text-uppercase theme-btn theme-btn-primary">
                                        <span> <?php echo esc_html($header_two_right_btn_text); ?> </span>
                                    </a>
                                <?php endif; ?> 
								</div>
                            </div>
                            <div class="header__hamburger d-lg-none my-auto">
                                <div class="sidebar__toggle">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </header><!-- #masthead -->
	<?php do_action( 'kidsa_before_page_content' ) ?>
    <div id="content" class="site-content">
