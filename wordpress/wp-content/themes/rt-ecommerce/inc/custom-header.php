<?php
/**
 * @package RT Ecommerce
 * Setup the WordPress core custom header feature.
 *
 * @uses rt_ecommerce_header_style()
*/
function rt_ecommerce_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'rt_ecommerce_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 85,
		'wp-head-callback'       => 'rt_ecommerce_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'rt_ecommerce_custom_header_setup' );

if ( ! function_exists( 'rt_ecommerce_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see rt_ecommerce_custom_header_setup().
 */
function rt_ecommerce_header_style() {

		$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.masthead{
					background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
					background-position: center top;
					background-size: 100% 100%;
				}
			<?php endif; ?>	
		</style>
	<?php

}
endif; // rt_ecommerce_header_style