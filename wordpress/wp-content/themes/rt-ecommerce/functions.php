<?php
/**
 * RT Ecommerce functions and definitions
 *
 * @package RT Ecommerce
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Theme Setup */
if ( ! function_exists( 'rt_ecommerce_setup' ) ) :

function rt_ecommerce_setup() {

	$GLOBALS['content_width'] = apply_filters( 'rt_ecommerce_content_width', 640 );
	
	load_theme_textdomain( 'rt-ecommerce', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// makes our theme WC compatible
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	add_image_size('rt-ecommerce-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rt-ecommerce' ),
	) );

    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', rt_ecommerce_font_url() ) );
}
endif;
add_action( 'after_setup_theme', 'rt_ecommerce_setup' );

/**
 * Register widgets area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rt_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'rt-ecommerce' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on page sidebar', 'rt-ecommerce' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 3', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on page sidebar', 'rt-ecommerce' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on footer 1', 'rt-ecommerce' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on footer 2', 'rt-ecommerce' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on footer 3', 'rt-ecommerce' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'rt-ecommerce' ),
		'description'   => esc_html__( 'Appears on footer 4', 'rt-ecommerce' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'rt_ecommerce_widgets_init' );

/* Theme Font URL */
function rt_ecommerce_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins';
	$font_family[] = 'Libre+Baskerville';
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}
	
/* Theme enqueue scripts */
function rt_ecommerce_scripts() {
	wp_enqueue_style( 'rt-ecommerce-font', rt_ecommerce_font_url(), array() );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'rt-ecommerce-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'rt-ecommerce-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );

	// Paragraph
	    $rt_ecommerce_paragraph_color = get_theme_mod('rt_ecommerce_paragraph_color', '');
	    $rt_ecommerce_paragraph_font_family = get_theme_mod('rt_ecommerce_paragraph_font_family', '');
	    $rt_ecommerce_paragraph_font_size = get_theme_mod('rt_ecommerce_paragraph_font_size', '');
	// "a" tag
		$rt_ecommerce_anchortag_color  = get_theme_mod('rt_ecommerce_anchortag_color ', '');
	    $rt_ecommerce_anchortag_font_family = get_theme_mod('rt_ecommerce_anchortag_font_family', '');
	// "li" tag
		$rt_ecommerce_list_color = get_theme_mod('rt_ecommerce_list_color', '');
	    $rt_ecommerce_list_font_family = get_theme_mod('rt_ecommerce_list_font_family', '');
	// H1
		$rt_ecommerce_heading1_color = get_theme_mod('rt_ecommerce_heading1_color', '');
	    $rt_ecommerce_heading1_font_family = get_theme_mod('rt_ecommerce_heading1_font_family', '');
	    $rt_ecommerce_heading1_font_size = get_theme_mod('rt_ecommerce_heading1_font_size', '');
	// H2
		$rt_ecommerce_heading2_color = get_theme_mod('rt_ecommerce_heading2_color', '');
	    $rt_ecommerce_heading2_font_family = get_theme_mod('rt_ecommerce_heading2_font_family', '');
	    $rt_ecommerce_heading2_font_size = get_theme_mod('rt_ecommerce_heading2_font_size', '');
	// H3
		$rt_ecommerce_heading3_color = get_theme_mod('rt_ecommerce_heading3_color', '');
	    $rt_ecommerce_heading3_font_family = get_theme_mod('rt_ecommerce_heading3_font_family', '');
	    $rt_ecommerce_heading3_font_size = get_theme_mod('rt_ecommerce_heading3_font_size', '');
	// H4
		$rt_ecommerce_heading4_color = get_theme_mod('rt_ecommerce_heading4_color', '');
	    $rt_ecommerce_heading4_font_family = get_theme_mod('rt_ecommerce_heading4_font_family', '');
	    $rt_ecommerce_heading4_font_size = get_theme_mod('rt_ecommerce_heading4_font_size', '');
	// H5
		$rt_ecommerce_heading5_color = get_theme_mod('rt_ecommerce_heading5_color', '');
	    $rt_ecommerce_heading5_font_family = get_theme_mod('rt_ecommerce_heading5_font_family', '');
	    $rt_ecommerce_heading5_font_size = get_theme_mod('rt_ecommerce_heading5_font_size', '');
	// H6
		$rt_ecommerce_heading6_color = get_theme_mod('rt_ecommerce_heading6_color', '');
	    $rt_ecommerce_heading6_font_family = get_theme_mod('rt_ecommerce_heading6_font_family', '');
	    $rt_ecommerce_heading6_font_size = get_theme_mod('rt_ecommerce_heading6_font_size', '');


		$custom_css ='
			p ,span{
			    color:'.esc_html($rt_ecommerce_paragraph_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_paragraph_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_paragraph_font_size).'!important;
			}
			a{
			    color:'.esc_html($rt_ecommerce_anchortag_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_anchortag_font_family).';
			}
			li{
			    color:'.esc_html($rt_ecommerce_list_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_list_font_family).';
			}
			h1{
			    color:'.esc_html($rt_ecommerce_heading1_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_heading1_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_heading1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($rt_ecommerce_heading2_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_heading2_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_heading2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($rt_ecommerce_heading3_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_heading3_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_heading3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($rt_ecommerce_heading4_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_heading4_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_heading4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($rt_ecommerce_heading5_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_heading5_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_heading5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($rt_ecommerce_heading6_color).'!important;
			    font-family: '.esc_html($rt_ecommerce_heading6_font_family).'!important;
			    font-size: '.esc_html($rt_ecommerce_heading6_font_size).'!important;
			}

			';
		wp_add_inline_style( 'rt-ecommerce-basic-style',$custom_css );
	wp_enqueue_style( 'slick-style', get_template_directory_uri().'/css/slick.css' );
	wp_enqueue_script( 'slick-slider-js', get_template_directory_uri() . '/js/slick.js', array('jquery') );
	wp_enqueue_script( 'superfish-menu-js', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'rt-ecommerce-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rt_ecommerce_scripts' );

function rt_ecommerce_ie_stylesheet(){
	wp_enqueue_style('rt-ecommerce-ie', get_template_directory_uri().'/css/ie.css');
	wp_style_add_data( 'rt-ecommerce-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','rt_ecommerce_ie_stylesheet');

define('RT_ECOMMERCE_CREDIT','http://www.rationaltheme.com/'); 

if ( ! function_exists( 'rt_ecommerce_credit' ) ) {
	function rt_ecommerce_credit(){
		echo "<a href=".esc_url(RT_ECOMMERCE_CREDIT)." target='_blank'>".esc_html('rationaltheme','rt-ecommerce')."</a>";
	}
}

/*radio button sanitization*/

 function rt_ecommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';