<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<?php

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action( 'woocommerce_shop_loop_header' );

$product_col = is_active_sidebar('product-sidebar') ? '9' : '12';

if ( woocommerce_product_loop() ) {?>

	<div class="row">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop.
		*
		* @hooked woocommerce_output_all_notices - 10
		* @hooked woocommerce_result_count - 20
		* @hooked woocommerce_catalog_ordering - 30
		*/
		do_action('woocommerce_before_shop_loop');
		?>
		<div class="col-xl-<?php echo esc_attr($product_col);?> col-lg-8 order-1 order-md-2 wow fadeInUp" data-wow-delay=".5s">		
			<div class="sort-bar">
				<div class="row g-sm-0 gy-20 justify-content-between align-items-center">
					<div class="col-md">
						<p class="woocommerce-result-count"><?php woocommerce_result_count();?></p>
					</div>

					<div class="col-md-auto">
						<?php woocommerce_catalog_ordering();?>
					</div>
					<div class="col-md-auto">
						<ul class="nav nav-pills" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="pills-grid-tab" data-bs-toggle="pill"
									data-bs-target="#pills-grid" type="button" role="tab"
									aria-controls="pills-grid" aria-selected="true"><i
										class="fa-solid fa-grid"></i></button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="pills-list-tab" data-bs-toggle="pill"
									data-bs-target="#pills-list" type="button" role="tab"
									aria-controls="pills-list" aria-selected="false"><i
										class="fa-solid fa-list"></i></button>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
					aria-labelledby="pills-grid-tab" tabindex="0">
					<div class="dishes-card-wrap">

							<?php

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

						?>

					</div>
				</div>
				<div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab"
					tabindex="0">
					<div class="dishes-card-wrap style3 mt-5">

						<?php

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product-list' );
								}
							}

						?>

					</div>
				</div>
			</div>
			<?php
			/**
			 * Hook: woocommerce_before_shop_loop.
			*
			* @hooked woocommerce_output_all_notices - 10
			* @hooked woocommerce_result_count - 20
			* @hooked woocommerce_catalog_ordering - 30
			*/
			do_action('woocommerce_after_shop_loop');
			?>
		</div>		

		<?php if(is_active_sidebar('product-sidebar')) : ?>	
			<div class="col-xl-3 col-lg-4 order-2 order-md-1 wow fadeInUp" data-wow-delay=".3s">
				<div class="main-sidebar">
					<?php dynamic_sidebar('product-sidebar'); ?>
				</div>
			</div>
		<?php endif;?>

	</div>

<?php

} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
