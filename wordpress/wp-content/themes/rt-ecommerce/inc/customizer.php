<?php
/**
 * RT Ecommerce Theme Customizer
 *
 * @package RT Ecommerce
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rt_ecommerce_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'rt_ecommerce_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'RT Settings', 'rt-ecommerce' ),
	    'description' => __( 'A Panel for the theme settings.', 'rt-ecommerce' ),
	) );

	$wp_customize->add_section( 'rt_ecommerce_left_right', array(
    	'title'      => __( 'General Settings', 'rt-ecommerce' ),
		'priority'   => 30,
		'panel' => 'rt_ecommerce_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('rt_ecommerce_theme_options',array(
	        'default' =>  __( 'One Column', 'rt-ecommerce' ),
	        'sanitize_callback' => 'rt_ecommerce_sanitize_choices'	        
	) );
	$wp_customize->add_control('rt_ecommerce_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'rt-ecommerce' ),
	        'section' => 'rt_ecommerce_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','rt-ecommerce'),
	            'Right Sidebar' => __('Right Sidebar','rt-ecommerce'),
	            'One Column' => __('One Column','rt-ecommerce'),
	            'Three Columns' => __('Three Columns','rt-ecommerce'),
	            'Four Columns' => __('Four Columns','rt-ecommerce'),
	            'Grid Layout' => __('Grid Layout','rt-ecommerce')
	        ),
	) );

	$font_array = array(
        '' => __( 'No Fonts', 'rt-ecommerce' ),
        'Abril Fatface' => __( 'Abril Fatface', 'rt-ecommerce' ),
        'Acme' => __( 'Acme', 'rt-ecommerce' ),
        'Anton' => __( 'Anton', 'rt-ecommerce' ),
        'Architects Daughter' => __( 'Architects Daughter', 'rt-ecommerce' ),
        'Arimo' => __( 'Arimo', 'rt-ecommerce' ),
        'Arsenal' => __( 'Arsenal', 'rt-ecommerce' ),
        'Arvo' => __( 'Arvo', 'rt-ecommerce' ),
        'Alegreya' => __( 'Alegreya', 'rt-ecommerce' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'rt-ecommerce' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'rt-ecommerce' ),
        'Bangers' => __( 'Bangers', 'rt-ecommerce' ),
        'Boogaloo' => __( 'Boogaloo', 'rt-ecommerce' ),
        'Bad Script' => __( 'Bad Script', 'rt-ecommerce' ),
        'Bitter' => __( 'Bitter', 'rt-ecommerce' ),
        'Bree Serif' => __( 'Bree Serif', 'rt-ecommerce' ),
        'BenchNine' => __( 'BenchNine', 'rt-ecommerce' ),
        'Cabin' => __( 'Cabin', 'rt-ecommerce' ),
        'Cardo' => __( 'Cardo', 'rt-ecommerce' ),
        'Courgette' => __( 'Courgette', 'rt-ecommerce' ),
        'Cherry Swash' => __( 'Cherry Swash', 'rt-ecommerce' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'rt-ecommerce' ),
        'Crimson Text' => __( 'Crimson Text', 'rt-ecommerce' ),
        'Cuprum' => __( 'Cuprum', 'rt-ecommerce' ),
        'Cookie' => __( 'Cookie', 'rt-ecommerce' ),
        'Chewy' => __( 'Chewy', 'rt-ecommerce' ),
        'Days One' => __( 'Days One', 'rt-ecommerce' ),
        'Dosis' => __( 'Dosis', 'rt-ecommerce' ),
        'Droid Sans' => __( 'Droid Sans', 'rt-ecommerce' ),
        'Economica' => __( 'Economica', 'rt-ecommerce' ),
        'Fredoka One' => __( 'Fredoka One', 'rt-ecommerce' ),
        'Fjalla One' => __( 'Fjalla One', 'rt-ecommerce' ),
        'Francois One' => __( 'Francois One', 'rt-ecommerce' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'rt-ecommerce' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'rt-ecommerce' ),
        'Great Vibes' => __( 'Great Vibes', 'rt-ecommerce' ),
        'Handlee' => __( 'Handlee', 'rt-ecommerce' ),
        'Hammersmith One' => __( 'Hammersmith One', 'rt-ecommerce' ),
        'Inconsolata' => __( 'Inconsolata', 'rt-ecommerce' ),
        'Indie Flower' => __( 'Indie Flower', 'rt-ecommerce' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'rt-ecommerce' ),
        'Julius Sans One' => __( 'Julius Sans One', 'rt-ecommerce' ),
        'Josefin Slab' => __( 'Josefin Slab', 'rt-ecommerce' ),
        'Josefin Sans' => __( 'Josefin Sans', 'rt-ecommerce' ),
        'Kanit' => __( 'Kanit', 'rt-ecommerce' ),
        'Lobster' => __( 'Lobster', 'rt-ecommerce' ),
        'Lato' => __( 'Lato', 'rt-ecommerce' ),
        'Lora' => __( 'Lora', 'rt-ecommerce' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'rt-ecommerce' ),
        'Lobster Two' => __( 'Lobster Two', 'rt-ecommerce' ),
        'Merriweather' => __( 'Merriweather', 'rt-ecommerce' ),
        'Monda' => __( 'Monda', 'rt-ecommerce' ),
        'Montserrat' => __( 'Montserrat', 'rt-ecommerce' ),
        'Muli' => __( 'Muli', 'rt-ecommerce' ),
        'Marck Script' => __( 'Marck Script', 'rt-ecommerce' ),
        'Noto Serif' => __( 'Noto Serif', 'rt-ecommerce' ),
        'Open Sans' => __( 'Open Sans', 'rt-ecommerce' ),
        'Overpass' => __( 'Overpass', 'rt-ecommerce' ),
        'Overpass Mono' => __( 'Overpass Mono', 'rt-ecommerce' ),
        'Oxygen' => __( 'Oxygen', 'rt-ecommerce' ),
        'Orbitron' => __( 'Orbitron', 'rt-ecommerce' ),
        'Patua One' => __( 'Patua One', 'rt-ecommerce' ),
        'Pacifico' => __( 'Pacifico', 'rt-ecommerce' ),
        'Padauk' => __( 'Padauk', 'rt-ecommerce' ),
        'Playball' => __( 'Playball', 'rt-ecommerce' ),
        'Playfair Display' => __( 'Playfair Display', 'rt-ecommerce' ),
        'PT Sans' => __( 'PT Sans', 'rt-ecommerce' ),
        'Philosopher' => __( 'Philosopher', 'rt-ecommerce' ),
        'Permanent Marker' => __( 'Permanent Marker', 'rt-ecommerce' ),
        'Poiret One' => __( 'Poiret One', 'rt-ecommerce' ),
        'Quicksand' => __( 'Quicksand', 'rt-ecommerce' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'rt-ecommerce' ),
        'Raleway' => __( 'Raleway', 'rt-ecommerce' ),
        'Rubik' => __( 'Rubik', 'rt-ecommerce' ),
        'Rokkitt' => __( 'Rokkitt', 'rt-ecommerce' ),
        'Russo One' => __( 'Russo One', 'rt-ecommerce' ),
        'Righteous' => __( 'Righteous', 'rt-ecommerce' ),
        'Slabo' => __( 'Slabo', 'rt-ecommerce' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'rt-ecommerce' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'rt-ecommerce'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'rt-ecommerce' ),
        'Sacramento' => __( 'Sacramento', 'rt-ecommerce' ),
        'Shrikhand' => __( 'Shrikhand', 'rt-ecommerce' ),
        'Tangerine' => __( 'Tangerine', 'rt-ecommerce' ),
        'Ubuntu' => __( 'Ubuntu', 'rt-ecommerce' ),
        'VT323' => __( 'VT323', 'rt-ecommerce' ),
        'Varela Round' => __( 'Varela Round', 'rt-ecommerce' ),
        'Vampiro One' => __( 'Vampiro One', 'rt-ecommerce' ),
        'Vollkorn' => __( 'Vollkorn', 'rt-ecommerce' ),
        'Volkhov' => __( 'Volkhov', 'rt-ecommerce' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'rt-ecommerce' )
    );

	//Typography Settings
	$wp_customize->add_section( 'rt_ecommerce_typography', array(
    	'title'      => __( 'Typography Settings', 'rt-ecommerce' ),
		'priority'   => 30,
		'panel' => 'rt_ecommerce_panel_id'
	) );
	
	$wp_customize->add_setting( 'rt_ecommerce_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_paragraph_color', array(
		'label' => __('Paragraph Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_paragraph_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_paragraph_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Paragraph Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_paragraph_font_size',array(
		'default'	=> '14px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_paragraph_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'rt_ecommerce_anchortag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_anchortag_color', array(
		'label' => __('Anchor Tag Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_anchortag_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_anchortag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_anchortag_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Anchor Tag Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'rt_ecommerce_list_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_list_color', array(
		'label' => __('list Tag Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_list_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_list_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_list_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'list Tag Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting( 'rt_ecommerce_heading1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_heading1_color', array(
		'label' => __('Heading1 Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_heading1_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_heading1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_heading1_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Heading1 Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_heading1_font_size',array(
		'default'	=> '32px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_heading1_font_size',array(
		'label'	=> __('Heading1 Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_heading1_font_size',
		'type'	=> 'text'
	));


	$wp_customize->add_setting( 'rt_ecommerce_heading2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_heading2_color', array(
		'label' => __('Heading2 Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_heading2_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_heading2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_heading2_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Heading2 Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_heading2_font_size',array(
		'default'	=> '24px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_heading2_font_size',array(
		'label'	=> __('Heading2 Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_heading2_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'rt_ecommerce_heading3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_heading3_color', array(
		'label' => __('Heading3 Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_heading3_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_heading3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_heading3_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Heading3 Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_heading3_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_heading3_font_size',array(
		'label'	=> __('Heading3 Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_heading3_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'rt_ecommerce_heading4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_heading4_color', array(
		'label' => __('Heading4 Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_heading4_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_heading4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_heading4_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Heading4 Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_heading4_font_size',array(
		'default'	=> '16px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_heading4_font_size',array(
		'label'	=> __('Heading4 Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_h4_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'rt_ecommerce_heading5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_heading5_color', array(
		'label' => __('Heading5 Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_heading5_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_heading5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_heading5_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Heading5 Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_heading5_font_size',array(
		'default'	=> '13px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_heading5_font_size',array(
		'label'	=> __('Heading5 Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_heading5_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting( 'rt_ecommerce_heading6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rt_ecommerce_heading6_color', array(
		'label' => __('Heading6 Color', 'rt-ecommerce'),
		'section' => 'rt_ecommerce_typography',
		'settings' => 'rt_ecommerce_heading6_color',
	)));

	$wp_customize->add_setting('rt_ecommerce_heading6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'rt_ecommerce_sanitize_choices'
	));
	$wp_customize->add_control(
	    'rt_ecommerce_heading6_font_family', array(
	    'section'  => 'rt_ecommerce_typography',
	    'label'    => __( 'Heading6 Fonts','rt-ecommerce'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('rt_ecommerce_heading6_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_heading6_font_size',array(
		'label'	=> __('Heading6 Font Size','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_typography',
		'setting'	=> 'rt_ecommerce_heading6_font_size',
		'type'	=> 'text'
	));

	//Top Bar Settings options here
	$wp_customize->add_section('rt_ecommerce_contact',array(
		'title'	=> __('Top Bar','rt-ecommerce'),
		'description'	=> __('Add contact us here','rt-ecommerce'),
		'priority'	=> null,
		'panel' => 'rt_ecommerce_panel_id',
	));

	$wp_customize->add_setting('rt_ecommerce_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_call',array(
		'label'	=> __('Phone Number','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('rt_ecommerce_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_location',array(
		'label'	=> __('Address 1','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('rt_ecommerce_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_email',array(
		'label'	=> __('Email','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));

	/* Social Icons */
	$wp_customize->add_setting('rt_ecommerce_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_facebook',array(
		'label'	=> __('Facebook Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_twitter',array(
		'label'	=> __('Twitter Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_instagram',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_instagram',array(
		'label'	=> __('Instagram Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_pinterest',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_pinterest',array(
		'label'	=> __('Pinterest Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_youtube',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_youtube',array(
		'label'	=> __('Youtube Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_linkedin',array(
		'label'	=> __('Youtube Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_tumbler',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_tumbler',array(
		'label'	=> __('Tumbler Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_gplus',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_gplus',array(
		'label'	=> __('Google Plus Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_flicker',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_flicker',array(
		'label'	=> __('Flicker Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('rt_ecommerce_vk',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('rt_ecommerce_vk',array(
		'label'	=> __('VK Url','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_contact',
		'type'		=> 'text'
	));
	
	//home page slider
	$wp_customize->add_section( 'rt_ecommerce_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'rt-ecommerce' ),
		'priority'   => 30,
		'panel' => 'rt_ecommerce_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'rt_ecommerce_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'rt_ecommerce_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'rt-ecommerce' ),
			'section'  => 'rt_ecommerce_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Featured Products
	$wp_customize->add_section('rt_ecommerce_products',array(
		'title'	=> __('Featured Products','rt-ecommerce'),
		'description'=> __('Check Featured Products Section settings here.','rt-ecommerce'),
		'panel' => 'rt_ecommerce_panel_id',
	));	

	$wp_customize->add_setting('rt_ecommerce_subtitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_subtitle',array(
		'label'	=> __('Section Sub Title','rt-ecommerce'),
		'section'=> 'rt_ecommerce_products',
		'setting'=> 'rt_ecommerce_subtitle',
		'type'=> 'text'
	));	
	
	$wp_customize->add_setting('rt_ecommerce_maintitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('rt_ecommerce_maintitle',array(
		'label'	=> __('Section Title','rt-ecommerce'),
		'section'=> 'rt_ecommerce_products',
		'setting'=> 'rt_ecommerce_maintitle',
		'type'=> 'text'
	));	

	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'rt_ecommerce_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'rt_ecommerce_page' . $count, array(
			'label'    => __( 'Select Page', 'rt-ecommerce' ),
			'section'  => 'rt_ecommerce_products',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer Settings
	$wp_customize->add_section('rt_ecommerce_footer_section',array(
		'title'	=> __('Footer Text','rt-ecommerce'),
		'description'	=> __('Check footer related settings here.','rt-ecommerce'),
		'priority'	=> null,
		'panel' => 'rt_ecommerce_panel_id',
	));
	
	$wp_customize->add_setting('rt_ecommerce_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('rt_ecommerce_footer_copy',array(
		'label'	=> __('Copyright Text','rt-ecommerce'),
		'section'	=> 'rt_ecommerce_footer_section',
		'type'		=> 'text'
	));
	/** End home page section here**/	
}
add_action( 'customize_register', 'rt_ecommerce_customize_register' );