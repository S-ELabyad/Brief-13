<?php
/**
 * @package BB Ecommerce Store
 * Setup the WordPress core custom header feature.
 *
 * @uses bb_ecommerce_store_header_style()
*/
function bb_ecommerce_store_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bb_ecommerce_store_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'bb_ecommerce_store_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'bb_ecommerce_store_custom_header_setup' );

if ( ! function_exists( 'bb_ecommerce_store_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see bb_ecommerce_store_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'bb_ecommerce_store_header_style' );
function bb_ecommerce_store_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$bb_ecommerce_store_custom_css = "
        .header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'bb-ecommerce-store-basic-style', $bb_ecommerce_store_custom_css );
	endif;
}
endif; // bb_ecommerce_store_header_style