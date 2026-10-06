<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

	//
	// Set a unique slug-like ID
	$td_menu_meta = 'td_menu_meta';

	//
	// Create profile options
	CSF::createNavMenuOptions( $td_menu_meta, array(
		'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
	) );

	//
	// Create a section
	CSF::createSection( $td_menu_meta, array(
		'fields' => array(
			array(
				'id'       => 'enable_mega_menu',
				'type'     => 'switcher',
				'title'    => esc_html__( 'Enable Mega Menu', 'kidsa-core' ),
				'text_on'  => esc_html__( 'Yes', 'kidsa-core' ),
				'text_off' => esc_html__( 'No', 'kidsa-core' ),
				'default'  => false,
			),

			array(
				'id'      => 'mega_menu_column',
				'type'    => 'select',
				'title'   => esc_html__( 'Column', 'kidsa-core' ),
				'options' => array(
					'td-mega-col-3' => '3 Column',
					'td-mega-col-6' => '6 Column',
				),
				'default' => 'td-mega-col-6',
				'dependency' => array( 'enable_mega_menu', '==', 'true' ),
				'desc'    => esc_html__( 'Select Column', 'kidsa-core' ),
			),

			array(
				'id'           => 'menu_image',
				'type'         => 'media',
				'title'        => esc_html__( 'Menu Image', 'kidsa-core' ),
				'library'      => 'image',
				'url'          => false,
				'desc' => esc_html__( 'Use same size image for all menu item.', 'kidsa-core' ),
				'button_title' => esc_html__( 'Upload Image', 'kidsa-core' ),
				'dependency' => array( 'enable_mega_menu', '!=', 'true' ),
			),

		)
	) );

}

function td_add_mega_menu_class($classes, $item){
	if(get_post_meta( $item->ID, 'td_menu_meta', true )){
		$menu_meta = get_post_meta( $item->ID, 'td_menu_meta', true );
	}else{
		$menu_meta = array();
	}

	if(is_array($menu_meta) && array_key_exists('menu_image', $menu_meta) && $menu_meta['menu_image']['url']){
		$image_enable = 'td-mega-menu-image';
	}else{
		$image_enable = '';
	}

	if(is_array($menu_meta) && array_key_exists('enable_mega_menu', $menu_meta) && $menu_meta['enable_mega_menu'] == true){
		$classes[] = 'td-mega-menu '.$menu_meta['mega_menu_column'];
	}

	if(is_array($menu_meta) && array_key_exists('menu_image', $menu_meta) && $menu_meta['menu_image']['url']){
		$classes[] = $image_enable;
	}
	return $classes;
}
add_filter('nav_menu_css_class' , 'td_add_mega_menu_class' , 10 , 2);




function td_wp_nav_menu_objects( $items, $args ) {
	foreach ( $items as $item ) {
		if(get_post_meta( $item->ID, 'td_menu_meta', true )){
			$menu_meta = get_post_meta( $item->ID, 'td_menu_meta', true );
		}else{
			$menu_meta = array();
		}

		if( is_array($menu_meta) && array_key_exists('menu_image', $menu_meta) && $menu_meta['menu_image']['url'] ) {
			$item->title = '<img src="'.$menu_meta['menu_image']['url'].'" alt="'.$menu_meta['menu_image']['alt'].'" title="'.$menu_meta['menu_image']['title'].'">' . '<span class="td-menu-text">'.$item->title.'</span>' ;
		}
	}

	return $items;

}

add_filter( 'wp_nav_menu_objects', 'td_wp_nav_menu_objects', 10, 2 );
