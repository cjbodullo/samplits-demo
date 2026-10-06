<?php
/**
 * Theme Footer Template
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kidsa
 */

$page_container_meta = Kidsa_Group_Fields_Value::page_container('kidsa', 'header_options');
?>

</div><!-- #content -->

<?php
$copyright_text = sprintf(
	esc_html__( '© %1$s %2$s. All rights reserved.', 'kidsa' ),
	date( 'Y' ),
	get_bloginfo( 'name' )
);

$footer_2_logo    = cs_get_option( 'footer_2_logo' );
$footer_2_socials = cs_get_option( 'footer_2_socials' );
$back_top_enable  = cs_get_option( 'back_top_enable' );
$back_top_icon    = cs_get_option( 'back_top_icon' );

$footer_2_text = __( 'Connecting brands with consumers through trusted sampling experiences and data-driven marketing programs.', 'kidsa' );

$quick_links = array(
	array( 'label' => __( 'Home', 'kidsa' ), 'url' => home_url( '/' ) ),
	array( 'label' => __( 'Programs', 'kidsa' ), 'url' => home_url( '/programs/' ) ),
	array( 'label' => __( 'About Us', 'kidsa' ), 'url' => home_url( '/about-us/' ) ),
	array( 'label' => __( 'Contact Us', 'kidsa' ), 'url' => home_url( '/contact-us/' ) ),
	array( 'label' => __( 'For Consumer', 'kidsa' ), 'url' => home_url( '/for-consumer/' ) ),
);

$program_links = array(
	array( 'label' => __( 'Social Click', 'kidsa' ), 'url' => home_url( '/social-click/' ) ),
	array( 'label' => __( 'Lead Boost', 'kidsa' ), 'url' => home_url( '/lead-boost/' ) ),
	array( 'label' => __( 'Family Connect', 'kidsa' ), 'url' => home_url( '/family-connect/' ) ),
	array( 'label' => __( 'BabyBrands Gift Club', 'kidsa' ), 'url' => home_url( '/babybrands-gift-club/' ) ),
);

$socials = array();
if ( ! empty( $footer_2_socials ) && is_array( $footer_2_socials ) ) {
	foreach ( $footer_2_socials as $item ) {
		$icon = isset( $item['footer_2_socials_icon'] ) ? $item['footer_2_socials_icon'] : '';
		if ( is_array( $icon ) ) {
			$icon = ! empty( $icon['value'] ) ? $icon['value'] : '';
		}
		if ( ! empty( $icon ) ) {
			$socials[] = array(
				'icon' => $icon,
				'url'  => ! empty( $item['footer_2_socials_icon_url'] ) ? $item['footer_2_socials_icon_url'] : '#',
			);
		}
	}
}
?>

<footer class="footer-section footer-samplits">
	<div class="footer-widgets-wrapper">
		<div class="container">
			<div class="footer-samplits-grid">
				<div class="footer-samplits-brand wow fadeInUp" data-wow-delay=".3s">
					<div class="widget-head">
						<?php
						if ( is_array( $footer_2_logo ) && ! empty( $footer_2_logo['url'] ) ) {
							printf(
								'<a href="%1$s"><img src="%2$s" alt="%3$s"></a>',
								esc_url( home_url( '/' ) ),
								esc_url( $footer_2_logo['url'] ),
								esc_attr( ! empty( $footer_2_logo['alt'] ) ? $footer_2_logo['alt'] : get_bloginfo( 'name' ) )
							);
						} elseif ( has_custom_logo() ) {
							the_custom_logo();
						} else {
							printf(
								'<a class="footer-site-title" href="%1$s">%2$s</a>',
								esc_url( home_url( '/' ) ),
								esc_html( get_bloginfo( 'name' ) )
							);
						}
						?>
					</div>
					<div class="footer-content">
						<p><?php echo esc_html( $footer_2_text ); ?></p>
						<?php if ( ! empty( $socials ) ) : ?>
						<div class="social-icon">
							<?php foreach ( $socials as $item ) : ?>
								<a href="<?php echo esc_url( $item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
									<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
								</a>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="footer-samplits-links wow fadeInUp" data-wow-delay=".5s">
					<h3><?php esc_html_e( 'Quick Links', 'kidsa' ); ?></h3>
					<ul class="footer-link-list">
						<?php foreach ( $quick_links as $link ) : ?>
							<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="footer-samplits-links wow fadeInUp" data-wow-delay=".7s">
					<h3><?php esc_html_e( 'Programs', 'kidsa' ); ?></h3>
					<ul class="footer-link-list">
						<?php foreach ( $program_links as $link ) : ?>
							<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-wrapper">
				<p class="footer-copyright wow fadeInLeft" data-wow-delay=".3s"><?php echo esc_html( $copyright_text ); ?></p>
				<ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
					<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'kidsa' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/terms-of-use/' ) ); ?>"><?php esc_html_e( 'Terms of Use', 'kidsa' ); ?></a></li>
				</ul>
			</div>
		</div>
		<?php if ( $back_top_enable ) : ?>
			<a href="#" id="scrollUp" class="scroll-icon">
				<i class="<?php echo esc_attr( $back_top_icon ); ?>"></i>
			</a>
		<?php endif; ?>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
