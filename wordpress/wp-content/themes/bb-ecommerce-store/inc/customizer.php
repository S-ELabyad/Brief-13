<?php
/**
 * Ecommerce Store Theme Customizer
 *
 * @package Ecommerce Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bb_ecommerce_store_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'bb_ecommerce_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'bb-ecommerce-store' ),
	    'description' => __( 'Description of what this panel does.', 'bb-ecommerce-store' ),
	) );

	// font array
	$bb_ecommerce_store_font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal',
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre',
        'Bangers' =>  'Bangers',
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' =>'Bree Serif',
        'BenchNine' => 'BenchNine',
        'Cabin' => 'Cabin',
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum',
        'Cookie' => 'Cookie',
        'Chewy' => 'Chewy',
        'Days One' => 'Days One',
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' =>'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee',
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata',
        'Indie Flower' => 'Indie Flower',
        'IM Fell English SC' => 'IM Fell English SC',
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab',
        'Josefin Sans' => 'Josefin Sans',
        'Kanit' => 'Kanit',
        'Lobster' => 'Lobster',
        'Lato' =>'Lato',
        'Lora' => 'Lora',
        'Libre Baskerville' => 'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli',
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans',
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' => 'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' => 'Playfair Display',
        'PT Sans' =>  'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' => 'Quattrocento Sans',
        'Raleway' => 'Raleway',
        'Rubik' => 'Rubik',
        'Rokkitt' => 'Rokkitt',
        'Russo One' => 'Russo One',
        'Righteous' =>'Righteous',
        'Slabo' => 'Slabo',
        'Source Sans Pro' => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light' =>'Shadows Into Light',
        'Sacramento' => 'Sacramento',
        'Shrikhand' => 'Shrikhand',
        'Tangerine' =>'Tangerine',
        'Ubuntu' => 'Ubuntu',
        'VT323' => 'VT323',
        'Varela Round' => 'Varela Round',
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz'
    );

	//Typography
	
	$wp_customize->add_section( 'bb_ecommerce_store_typography', array(
    	'title'      => __( 'Typography', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_paragraph_color', array(
		'label' => __('Paragraph Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_paragraph_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'Paragraph Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	$wp_customize->add_setting('bb_ecommerce_store_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_atag_color', array(
		'label' => __('"a" Tag Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_atag_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( '"a" Tag Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_li_color', array(
		'label' => __('"li" Tag Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_li_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( '"li" Tag Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h1_color', array(
		'label' => __('H1 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h1_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'H1 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h1_font_size',array(
		'label'	=> __('H1 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h2_color', array(
		'label' => __('h2 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h2_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h2 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h2_font_size',array(
		'label'	=> __('h2 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h3_color', array(
		'label' => __('h3 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h3_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h3 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h3_font_size',array(
		'label'	=> __('h3 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h4_color', array(
		'label' => __('h4 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h4_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h4 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h4_font_size',array(
		'label'	=> __('h4 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h5_color', array(
		'label' => __('h5 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h5_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h5 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h5_font_size',array(
		'label'	=> __('h5 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'bb_ecommerce_store_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_h6_color', array(
		'label' => __('h6 Color', 'bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_typography',
		'settings' => 'bb_ecommerce_store_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('bb_ecommerce_store_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'bb_ecommerce_store_h6_font_family', array(
	    'section'  => 'bb_ecommerce_store_typography',
	    'label'    => __( 'h6 Fonts','bb-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $bb_ecommerce_store_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('bb_ecommerce_store_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_h6_font_size',array(
		'label'	=> __('h6 Font Size','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_typography',
		'setting'	=> 'bb_ecommerce_store_h6_font_size',
		'type'	=> 'text'
	));	

	$wp_customize->add_setting('bb_ecommerce_store_background_skin_mode',array(
        'default' => __('Transparent Background','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_background_skin_mode',array(
        'type' => 'select',
        'label' => __('Background Type','bb-ecommerce-store'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background','bb-ecommerce-store'),
            'Transparent Background' => __('Transparent Background','bb-ecommerce-store'),
        ),
	) );

	// woocommerce section
	$wp_customize->add_setting('bb_ecommerce_store_show_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_related_products',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Product','bb-ecommerce-store'),
       'section' => 'woocommerce_product_catalog',
    ));

	$wp_customize->add_setting('bb_ecommerce_store_show_wooproducts_border',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_show_wooproducts_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Border','bb-ecommerce-store'),
       'section' => 'woocommerce_product_catalog',
    ));

    $wp_customize->add_setting( 'bb_ecommerce_store_wooproducts_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_wooproducts_per_columns', array(
		'label'    => __( 'Display Product Per Columns', 'bb-ecommerce-store' ),
		'section'  => 'woocommerce_product_catalog',
		'type'     => 'select',
		'choices'  => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
		),
	)  );

	$wp_customize->add_setting('bb_ecommerce_store_wooproducts_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('bb_ecommerce_store_wooproducts_per_page',array(
		'label'	=> __('Display Product Per Page','bb-ecommerce-store'),
		'section'	=> 'woocommerce_product_catalog',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_top_bottom_wooproducts_padding',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_top_bottom_wooproducts_padding',	array(
		'label' => esc_html__( 'Top Bottom Product Padding','bb-ecommerce-store' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_left_right_wooproducts_padding',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'bb_ecommerce_store_left_right_wooproducts_padding',	array(
		'label' => esc_html__( 'Right Left Product Padding','bb-ecommerce-store' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_wooproducts_border_radius',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_wooproducts_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','bb-ecommerce-store' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_wooproducts_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_wooproducts_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','bb-ecommerce-store' ),
		'section' => 'woocommerce_product_catalog',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_section('bb_ecommerce_store_product_button_section', array(
		'title'    => __('Product Button Settings', 'bb-ecommerce-store'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_top_bottom_product_button_padding',array(
		'default' => 10,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_top_bottom_product_button_padding',	array(
		'label' => esc_html__( 'Product Button Top Bottom Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_product_button_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'bb_ecommerce_store_left_right_product_button_padding',array(
		'default' => 16,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_left_right_product_button_padding',array(
		'label' => esc_html__( 'Product Button Right Left Padding','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_product_button_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_product_button_border_radius',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_product_button_border_radius',array(
		'label' => esc_html__( 'Product Button Border Radius','bb-ecommerce-store' ),
		'section' => 'bb_ecommerce_store_product_button_section',
		'type'		=> 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	 // Add the Theme Color Option section.
	$wp_customize->add_section( 'bb_ecommerce_store_theme_color_option', array( 
		'panel' => 'bb_ecommerce_store_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'bb-ecommerce-store'
	) )	);
	
  	$wp_customize->add_setting( 'bb_ecommerce_store_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bb_ecommerce_store_theme_color', array(
  		'label' => 'Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'bb-ecommerce-store'),
	    'section' => 'bb_ecommerce_store_theme_color_option',
	    'settings' => 'bb_ecommerce_store_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section( 'bb_ecommerce_store_left_right', array(
    	'title'      => __( 'Layout Settings', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_preloader_option',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_preloader_option',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_left_right'
    ));

	$wp_customize->add_setting( 'bb_ecommerce_store_shop_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_shop_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Woocommerce Page Sidebar','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_left_right'
    ));

	$wp_customize->add_setting( 'bb_ecommerce_store_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Single Product Page Sidebar','bb-ecommerce-store'),
		'section' => 'bb_ecommerce_store_left_right'
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('bb_ecommerce_store_theme_options',array(
        'default' =>  __('Right Sidebar', 'bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'	        
	) );
	$wp_customize->add_control('bb_ecommerce_store_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Layouts','bb-ecommerce-store'),
	        'section' => 'bb_ecommerce_store_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','bb-ecommerce-store'),
	            'Right Sidebar' => __('Right Sidebar','bb-ecommerce-store'),
	            'One Column' => __('One Column','bb-ecommerce-store'),
	            'Three Columns' => __('Three Columns','bb-ecommerce-store'),
	            'Four Columns' => __('Four Columns','bb-ecommerce-store'),
	            'Grid Layout' => __('Grid Layout','bb-ecommerce-store')
	        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_single_page_sidebar_layout', array(
		'default'           => __('One Column', 'bb-ecommerce-store'),
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'bb-ecommerce-store'),
			'One Column'    => __('One Column', 'bb-ecommerce-store'),
		),
	));

	$wp_customize->add_setting('bb_ecommerce_store_single_post_sidebar_layout', array(
		'default'           => __('Right Sidebar', 'bb-ecommerce-store'),
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_single_post_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Post Layouts', 'bb-ecommerce-store'),
		'section'        => 'bb_ecommerce_store_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'bb-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'bb-ecommerce-store'),
			'One Column'    => __('One Column', 'bb-ecommerce-store'),
		),
	));

	$wp_customize->add_setting('bb_ecommerce_store_width_theme_options',array(
        'default' => __('Default','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_width_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','bb-ecommerce-store'),
        'description' => __('Here you can change the Width layout. ','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_left_right',
        'choices' => array(
            'Default' => __('Default','bb-ecommerce-store'),
            'Container' => __('Container','bb-ecommerce-store'),
            'Box Container' => __('Box Container','bb-ecommerce-store'),
        ),
	) );

	// Button
	$wp_customize->add_section( 'bb_ecommerce_store_theme_button', array(
		'title' => __('Button Option','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_padding_top_bottom',array(
		'label'	=> __('Top and Bottom Padding','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_padding_left_right',array(
		'label'	=> __('Left and Right Padding','bb-ecommerce-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'bb_ecommerce_store_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'bb_ecommerce_store_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_theme_button',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    //Topbar section
	$wp_customize->add_section('bb_ecommerce_store_topbar',array(
		'title'	=> __('Topbar Section','bb-ecommerce-store'),
		'description'	=> __('Add Header Content here','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'bb_ecommerce_store_display_topbar',array(
		'default' => false,
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_display_topbar',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_topbar'
    ));

    //Sticky Header
	$wp_customize->add_setting( 'bb_ecommerce_store_sticky_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'sanitize_text_field'
    ) );
    $wp_customize->add_control('bb_ecommerce_store_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','bb-ecommerce-store' ),
        'section' => 'bb_ecommerce_store_topbar'
    ));

	$wp_customize->add_setting('bb_ecommerce_store_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_contact',array(
		'label'	=> __('Add Phone Number','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_topbar',
		'setting'	=> 'bb_ecommerce_store_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_email',array(
		'label'	=> __('Add Email','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_topbar',
		'setting'	=> 'bb_ecommerce_store_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('bb_ecommerce_store_social',array(
		'title'	=> __('Social Icon Section','bb-ecommerce-store'),
		'description'	=> __('Add Header Content here','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_youtube_url',array(
		'label'	=> __('Add Youtube link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_youtube_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_facebook_url',array(
		'label'	=> __('Add Facebook link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_twitter_url',array(
		'label'	=> __('Add Twitter link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_instagram_url',array(
		'label'	=> __('Add Instagram link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_instagram_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('bb_ecommerce_store_rss_url',array(
		'label'	=> __('Add RSS link','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_social',
		'setting'	=> 'bb_ecommerce_store_rss_url',
		'type'	=> 'url'
	) );

    //home page slider
	$wp_customize->add_section( 'bb_ecommerce_store_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'bb-ecommerce-store' ),
		'panel' => 'bb_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('bb_ecommerce_store_slider_hide_show',array(
      'default' => false,
      'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','bb-ecommerce-store'),
	  'section' => 'bb_ecommerce_store_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'bb_ecommerce_store_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'bb_ecommerce_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'bb_ecommerce_store_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'bb-ecommerce-store' ),
			'section'  => 'bb_ecommerce_store_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
    $wp_customize->add_setting('bb_ecommerce_store_slider_content_alignment',array(
    'default' => __('Right','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_slidersettings',
        'choices' => array(
            'Center' => __('Center','bb-ecommerce-store'),
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
        ),
	) );

	//Opacity
	$wp_customize->add_setting('bb_ecommerce_store_slider_image_opacity',array(
      'default'              => 0.7,
      'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control( 'bb_ecommerce_store_slider_image_opacity', array(
	'label'       => esc_html__( 'Slider Image Opacity','bb-ecommerce-store' ),
	'section'     => 'bb_ecommerce_store_slidersettings',
	'type'        => 'select',
	'settings'    => 'bb_ecommerce_store_slider_image_opacity',
	'choices' => array(
		'0' =>  esc_attr('0','bb-ecommerce-store'),
		'0.1' =>  esc_attr('0.1','bb-ecommerce-store'),
		'0.2' =>  esc_attr('0.2','bb-ecommerce-store'),
		'0.3' =>  esc_attr('0.3','bb-ecommerce-store'),
		'0.4' =>  esc_attr('0.4','bb-ecommerce-store'),
		'0.5' =>  esc_attr('0.5','bb-ecommerce-store'),
		'0.6' =>  esc_attr('0.6','bb-ecommerce-store'),
		'0.7' =>  esc_attr('0.7','bb-ecommerce-store'),
		'0.8' =>  esc_attr('0.8','bb-ecommerce-store'),
		'0.9' =>  esc_attr('0.9','bb-ecommerce-store')
	),
	));

	// SERVICES
	$wp_customize->add_section('bb_ecommerce_store_services',array(
		'title'	=> __('Services','bb-ecommerce-store'),
		'description'=> __('This section will appear below the slider.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('bb_ecommerce_store_services_category',array(
	'default'	=> 'select',
	'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('bb_ecommerce_store_services_category',array(
	'type'    => 'select',
	'choices' => $cat_post,
	'label' => __('Select Category to display post','bb-ecommerce-store'),
	'section' => 'bb_ecommerce_store_services',
	));

	//OUR PRODUCTS
	$wp_customize->add_section('bb_ecommerce_store_product',array(
		'title'	=> __('Products','bb-ecommerce-store'),
		'description'=> __('This section will appear below the services.','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));
	
	$wp_customize->add_setting('bb_ecommerce_store_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_sec1_title',array(
		'label'	=> __('Section Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_product',
		'setting'=> 'bb_ecommerce_store_sec1_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'bb_ecommerce_store_servicesettings', array(
		'default'           => '',
		'sanitize_callback' => 'bb_ecommerce_store_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'bb_ecommerce_store_servicesettings', array(
		'label'    => __( 'Select Page', 'bb-ecommerce-store' ),
		'section'  => 'bb_ecommerce_store_product',
		'type'     => 'dropdown-pages'
	));

	//404 Page Setting
	$wp_customize->add_section('bb_ecommerce_store_404_page_setting',array(
		'title'	=> __('404 Page','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_title_404_page',array(
		'default'=> __('404 Not Found', 'bb-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_title_404_page',array(
		'label'	=> __('404 Page Title','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_content_404_page',array(
		'default'=> __('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','bb-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_content_404_page',array(
		'label'	=> __('404 Page Content','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_button_404_page',array(
		'default'=> __( 'Back to Home Page', 'bb-ecommerce-store' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_404_page',array(
		'label'	=> __('404 Page Button','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_404_page_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('bb_ecommerce_store_responsive_setting',array(
		'title'	=> __('Responsive Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_sticky_header',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_sticky_header',array(
       'type' => 'checkbox',
       'label' => __('Sticky Header','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_slider',array(
       'type' => 'checkbox',
       'label' => __('Slider','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_scroll',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_scroll',array(
       'type' => 'checkbox',
       'label' => __('Scroll To Top','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Sidebar','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_responsive_preloader',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_responsive_preloader',array(
       'type' => 'checkbox',
       'label' => __('Preloader','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_responsive_setting'
    ));

	//Blog Post
	$wp_customize->add_section('bb_ecommerce_store_blog_post',array(
		'title'	=> __('Blog Page Settings','bb-ecommerce-store'),
		'panel' => 'bb_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('bb_ecommerce_store_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('bb_ecommerce_store_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','bb-ecommerce-store'),
       'section' => 'bb_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('bb_ecommerce_store_blog_post_description_option',array(
    	'default'   => 'Excerpt Content',
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_blog_post',
        'choices' => array(
            'No Content' => __('No Content','bb-ecommerce-store'),
            'Excerpt Content' => __('Excerpt Content','bb-ecommerce-store'),
            'Full Content' => __('Full Content','bb-ecommerce-store'),
        ),
	) );

    $wp_customize->add_setting( 'bb_ecommerce_store_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'number',
		'settings'    => 'bb_ecommerce_store_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'bb_ecommerce_store_post_suffix_option', array(
		'default'   => __('...','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'bb_ecommerce_store_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','bb-ecommerce-store' ),
		'section'     => 'bb_ecommerce_store_blog_post',
		'type'        => 'text',
		'settings'    => 'bb_ecommerce_store_post_suffix_option',
	) );

	$wp_customize->add_setting('bb_ecommerce_store_button_text',array(
		'default'=> __('READ MORE','bb-ecommerce-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_button_text',array(
		'label'	=> __('Add Button Text','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('bb_ecommerce_store_footer_section',array(
		'title'	=> __('Footer Text','bb-ecommerce-store'),
		'priority'	=> null,
		'panel' => 'bb_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('bb_ecommerce_store_footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices',
    ));
    $wp_customize->add_control('bb_ecommerce_store_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'bb-ecommerce-store'),
        'section'     => 'bb_ecommerce_store_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'bb-ecommerce-store'),
        'choices' => array(
            '1'     => __('One', 'bb-ecommerce-store'),
            '2'     => __('Two', 'bb-ecommerce-store'),
            '3'     => __('Three', 'bb-ecommerce-store'),
            '4'     => __('Four', 'bb-ecommerce-store')
        ),
    ));

    $wp_customize->add_setting('bb_ecommerce_store_footer_widget_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bb_ecommerce_store_footer_widget_bg_color', array(
		'label'    => __('Footer Widget Background Color', 'bb-ecommerce-store'),
		'section'  => 'bb_ecommerce_store_footer_section',
	)));

	$wp_customize->add_setting('bb_ecommerce_store_footer_widget_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'bb_ecommerce_store_footer_widget_bg_image',array(
        'label' => __('Footer Widget Background Image','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section'
	)));
	
	$wp_customize->add_setting('bb_ecommerce_store_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('bb_ecommerce_store_footer_copy',array(
		'label'	=> __('Copyright Text','bb-ecommerce-store'),
		'section'	=> 'bb_ecommerce_store_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('bb_ecommerce_store_copyright_content_align',array(
        'default' => __('center','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_copyright_content_align',array(
        'type' => 'select',
        'label' => __('Copyright Text Alignment ','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
        'choices' => array(
            'left' => __('Left','bb-ecommerce-store'),
            'right' => __('Right','bb-ecommerce-store'),
            'center' => __('Center','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_footer_content_font_size',array(
		'default'=> 15,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_footer_content_font_size',array(
		'label' => esc_html__( 'Copyright Font Size','bb-ecommerce-store' ),
		'section'=> 'bb_ecommerce_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	));

	$wp_customize->add_setting('bb_ecommerce_store_enable_disable_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('bb_ecommerce_store_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','bb-ecommerce-store'),
      	'section' => 'bb_ecommerce_store_footer_section',
	));

	$wp_customize->add_setting('bb_ecommerce_store_scroll_setting',array(
        'default' => __('Right','bb-ecommerce-store'),
        'sanitize_callback' => 'bb_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('bb_ecommerce_store_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','bb-ecommerce-store'),
        'section' => 'bb_ecommerce_store_footer_section',
        'choices' => array(
            'Left' => __('Left','bb-ecommerce-store'),
            'Right' => __('Right','bb-ecommerce-store'),
            'Center' => __('Center','bb-ecommerce-store'),
        ),
	) );

	$wp_customize->add_setting('bb_ecommerce_store_scroll_font_size_icon',array(
		'default'=> 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control('bb_ecommerce_store_scroll_font_size_icon',array(
		'label'	=> __('Scroll Icon Font Size','bb-ecommerce-store'),
		'section'=> 'bb_ecommerce_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	) );
		
}
add_action( 'customize_register', 'bb_ecommerce_store_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class BB_Ecommerce_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'BB_Ecommerce_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new BB_Ecommerce_Store_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'BB Ecommerce Pro', 'bb-ecommerce-store' ),
					'pro_text' => esc_html__( 'Go Pro','bb-ecommerce-store' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/ecommerce-store-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'bb-ecommerce-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'bb-ecommerce-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
BB_Ecommerce_Store_Customize::get_instance();