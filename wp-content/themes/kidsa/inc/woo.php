<?php

// shop page hooks
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);


remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


// shop details page hooks

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);


// wishlist false
add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosw_button_position_single', '__return_false' );

// compare false
add_filter( 'woosc_button_position_archive', '__return_false' );
add_filter( 'woosc_button_position_single', '__return_false' );



function mukit_product_grid(){

    global $product;
    global $post;
    global $woocommerce;

    ?>

        <div class="dishes-card style2">
            <div class="dishes-thumb">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="dishes-content">
                <a href="<?php the_permalink(); ?>">
                    <h3 class="mb-2"><?php the_title(); ?></h3>
                </a>

                <?php
                if ( $product && $product->get_average_rating() > 0 ) : ?>
                    <div class="star mt-2">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>
                <?php endif; ?>

                <p class="text mt-3"><?php echo wp_trim_words( get_the_content(), 3, '...' ); ?></p>
                <h6><?php woocommerce_template_loop_price(); ?></h6>
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>
        </div>


    <?php

}

add_action( 'woocommerce_before_shop_loop_item', 'mukit_product_grid');


function mukit_product_list(){

    global $product;
    global $post;
    global $woocommerce;

    ?>

        <div class="dishes-card style4 list">
            <div class="dishes-thumb">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="dishes-content">
                <a href="<?php the_permalink(); ?>">
                    <h3 class="mb-2"><?php the_title(); ?></h3>
                </a>
                <div class="icon">
                    <?php echo do_shortcode('[woosw]'); ?>
                </div>
                <?php
                if ( $product && $product->get_average_rating() > 0 ) : ?>
                    <div class="star mt-2">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>
                <?php endif; ?>
                <p class="text"><?php echo wp_trim_words( get_the_content()); ?></p>
                <h6><?php woocommerce_template_loop_price(); ?></h6>
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>
        </div>

    <?php

}

add_action( 'woocommerce_before_shop_loop_item_list', 'mukit_product_list');


// shop details 

function mukit_product_details(){

    global $product;
    global $post;
    global $woocommerce;

    $rating_count = $product->get_rating_count();
    $review_count = $product->get_review_count();
    $average      = $product->get_average_rating();

    $stock_label = $product->get_stock_status() == 'instock' ? 'In Stock' : '';

    ?>

    <div class="product-about">
        <?php if(!empty($product->get_stock_quantity())) : ?>
            <span class="stock-qty border py-2 px-3 mb-3 d-inline-block"><?php echo esc_html($product->get_stock_quantity()); ?> <?php echo esc_html($stock_label); ?></span>
        <?php endif; ?>
        <div class="title-wrapper">
            <h2 class="product-title"><?php the_title(); ?></h2>
            <div class="price"> <?php woocommerce_template_single_price(); ?></div>
        </div>

        <div class="product-rating">
            <?php if(!empty(woocommerce_template_single_rating())) : ?>
            <div class="star pb-3">
                <?php woocommerce_template_single_rating(); ?>
            </div>
            <?php endif; ?>
        </div>
        <p class="text"><?php woocommerce_template_single_excerpt(); ?></p>

        <div class="actions">
            <div class="quantity">
                <?php woocommerce_template_single_add_to_cart(); ?>            
            </div>           
        </div>
        <?php woocommerce_template_single_meta(); ?>

        <div class="share mt-3">
            <h6>Share:</h6>

            <ul class="social-media">
                <?php
                $current_url = urlencode(get_permalink()); // Get the current product URL
                $product_title = urlencode(get_the_title()); // Get the current product title

                // Social share URLs
                $socials = [
                    'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$current_url}",
                    'twitter' => "https://twitter.com/intent/tweet?url={$current_url}&text={$product_title}",
                    'linkedin' => "https://www.linkedin.com/shareArticle?url={$current_url}&title={$product_title}",
                    'pinterest' => "https://pinterest.com/pin/create/button/?url={$current_url}&description={$product_title}",
                    'whatsapp' => "https://wa.me/?text={$product_title}%20{$current_url}",
                    'instagram' => "https://www.instagram.com/?url={$current_url}",
                ];

                // Social icons
                $icons = [
                    'facebook' => 'fa-brands fa-facebook-f',
                    'twitter' => 'fa-brands fa-twitter',
                    'linkedin' => 'fa-brands fa-linkedin-in',
                    'pinterest' => 'fa-brands fa-pinterest-p',
                    'whatsapp' => 'fa-brands fa-whatsapp',
                    'instagram' => 'fa-brands fa-instagram',
                ];

                // Loop through socials
                foreach ($socials as $key => $url) {
                    echo '<li><a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer">';
                    echo '<i class="' . esc_attr($icons[$key]) . '"></i>';
                    echo '</a></li>';
                }
                ?>
            </ul>

        </div>


    </div>

    <?php
}

add_action( 'woocommerce_single_product_summary', 'mukit_product_details');



// product add to cart button
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'theme-btn style6',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }


         // check product type 
         if( $product->is_type( 'simple' ) ){
            $btntext = esc_html__("Add to Cart",'kidsa');
         } elseif( $product->is_type( 'variable' ) ){
            $btntext = esc_html__("Select Options",'kidsa');
         } elseif( $product->is_type( 'external' ) ){
            $btntext = esc_html__("Buy Now",'kidsa');
         } elseif( $product->is_type( 'grouped' ) ){
            $btntext = esc_html__("View Products",'kidsa');
         }
         else{
            $btntext = esc_html__("Add to Cart",'kidsa');
         } 

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'theme-btn style6' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="fa-regular fa-basket-shopping me-2"></i>'.$btntext.' '
        );
}


// woocommerce mini cart content
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <div class="mini_shopping_cart_box">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['.mini_shopping_cart_box'] = ob_get_clean();
    return $fragments;
});

// woocommerce mini cart count icon
if ( ! function_exists( 'mukit_header_add_to_cart_fragment' ) ) {
    function mukit_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>
        <span class="cart__count" id="mukit-cart-item">
            <?php echo esc_html( WC()->cart->cart_contents_count ); ?>
        </span>
        <?php
        $fragments['#mukit-cart-item'] = ob_get_clean();

        return $fragments;
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'mukit_header_add_to_cart_fragment' );


// mukit_shopping_cart
function mukit_shopping_cart(){
    ob_start();
    ?>

    <div class="header__right__dropdown__wrapper">
        <div class="header__right__dropdown__inner">
            <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}