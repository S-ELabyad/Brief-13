<?php
	add_action( 'wp_enqueue_scripts', 'ecommerce_shop_enqueue_styles' );
	function ecommerce_shop_enqueue_styles() {
			$parent_style = 'bb-ecommerce-store-style'; // Style handle of parent theme.
			wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
			wp_enqueue_style( 'ecommerce_shop-style', get_stylesheet_uri(), array( $parent_style ) );
	}

	function ecommerce_shop_customize_register() {     
		global $wp_customize;
		$wp_customize->remove_section( 'bb_ecommerce_store_theme_color_option' );  //Modify this line as needed  
	} 
	add_action( 'customize_register', 'ecommerce_shop_customize_register', 11 );

	define('ECOMMERCE_SHOP_CREDIT',__('https://www.themeshopy.com/themes/wp-ecommerce-store-wordpress-theme/','e-commerce-shop'));
		if ( ! function_exists( 'ecommerce_shop_credit' ) ) {
		function ecommerce_shop_credit(){
			echo "<a href=".esc_url(ECOMMERCE_SHOP_CREDIT)." target='_blank'>". esc_html__('Ecommerce WordPress Theme','e-commerce-shop')."</a>";
		}
	}

	function ecommerce_shop_customizer ( $wp_customize ) {
		//OUR services
		$wp_customize->add_section('ecommerce_shop_shopnow',array(
			'title'	=> __('Shop Now Section','e-commerce-shop'),
			'description'=> __('This section will appear below the slider.','e-commerce-shop'),
			'panel' => 'bb_ecommerce_store_panel_id',
		));

		$wp_customize->add_setting('ecommerce_shop_image',array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'ecommerce_shop_image',array(
            'label' => __('Background image (1440x700)','e-commerce-shop'),
            'section' => 'ecommerce_shop_shopnow',
            'settings' => 'ecommerce_shop_image'
		)));

		$wp_customize->add_setting('ecommerce_shop_title',array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		
		$wp_customize->add_control('ecommerce_shop_title',array(
			'label'	=> __('Title','e-commerce-shop'),
			'section'	=> 'ecommerce_shop_shopnow',
			'setting'	=> 'ecommerce_shop_title',
			'type'		=> 'text'
		));

		$wp_customize->add_setting('ecommerce_shop_linkname',array(
			'default'	=> 'Shop now',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	

		$wp_customize->add_control('ecommerce_shop_linkname',array(
				'label'	=> __('Lable','e-commerce-shop'),
				'section'	=> 'ecommerce_shop_shopnow',
				'setting'	=> 'ecommerce_shop_linkname',
				'type'		=> 'text'
		));

		$wp_customize->add_setting('ecommerce_shop_link',array(
			'default'	=> '#link',
			'sanitize_callback'	=> 'esc_url_raw',
		));

		$wp_customize->add_control('ecommerce_shop_link',array(
			'label'	=> __('Shop now link','e-commerce-shop'),
			'section'	=> 'ecommerce_shop_shopnow',
			'type'		=> 'text'
		));
	}

	add_action( 'customize_register', 'ecommerce_shop_customizer' );
