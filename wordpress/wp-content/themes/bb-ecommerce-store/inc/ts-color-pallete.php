<?php
	
	$bb_ecommerce_store_theme_color = get_theme_mod('bb_ecommerce_store_theme_color');

	$bb_ecommerce_store_custom_css = '';

	if($bb_ecommerce_store_theme_color != false){
		$bb_ecommerce_store_custom_css .='#slider .more-btn a, .topbar, form.woocommerce-product-search button[type="submit"],button.search-submit, #our-service,#comments a.comment-reply-link, #sidebar h3, #sidebar input[type="submit"], #sidebar .tagcloud a:hover,.copyright-wrapper .tagcloud a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination a:hover, .pagination .current, .copyright, .toggle a,  input.search-submit, #our-products a.button, a.blogbutton-small:hover, .top-header,#menu-sidebar input[type="submit"],.tags p a:hover,.meta-nav:hover, .header form.woocommerce-product-search button[type="submit"], .copyright-wrapper form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button, .copyright-wrapper .woocommerce a.button:hover, .copyright-wrapper .woocommerce button.button:hover, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle{';
			$bb_ecommerce_store_custom_css .='background-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$bb_ecommerce_store_custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$bb_ecommerce_store_custom_css .='#comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$bb_ecommerce_store_custom_css .='background-color: '.esc_html($bb_ecommerce_store_theme_color).'!important;';
		$bb_ecommerce_store_custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$bb_ecommerce_store_custom_css .='a,.woocommerce-message::before, .post-password-form input[type=password],.cart_icon i, .copyright-wrapper li a:hover, .primary-navigation ul ul a,.tags i,#sidebar ul li a:hover,.metabox a:hover,.woocommerce td.product-name a, .woocommerce ul#shipping_method li label, .woocommerce-cart .cart-collaterals .shipping-calculator-button, .woocommerce-MyAccount-content p a{';
			$bb_ecommerce_store_custom_css .='color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$bb_ecommerce_store_custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$bb_ecommerce_store_custom_css .='.primary-navigation ul ul,.copyright-wrapper form.woocommerce-product-search button, #sidebar form.woocommerce-product-search button{';
			$bb_ecommerce_store_custom_css .='border-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$bb_ecommerce_store_custom_css .='}';
	}
	if($bb_ecommerce_store_theme_color != false){
		$bb_ecommerce_store_custom_css .='.inner-service, .woocommerce-message{';
			$bb_ecommerce_store_custom_css .='border-top-color: '.esc_html($bb_ecommerce_store_theme_color).';';
		$bb_ecommerce_store_custom_css .='}';
	}

	// media
	$bb_ecommerce_store_custom_css .='@media screen and (max-width:1000px) {';
	if($bb_ecommerce_store_theme_color){
	$bb_ecommerce_store_custom_css .='#contact-info, #menu-sidebar, .primary-navigation li a:hover, .primary-navigation li:hover a,.primary-navigation ul ul ul ul{
	background-image: linear-gradient(-90deg, #000 0%, '.esc_html($bb_ecommerce_store_theme_color).' 120%);
		}';
	}
	$bb_ecommerce_store_custom_css .='}';

	/*---------------------------Width Layout -------------------*/
	$bb_ecommerce_store_theme_lay = get_theme_mod( 'bb_ecommerce_store_width_theme_options','Default');
    if($bb_ecommerce_store_theme_lay == 'Default'){
		$bb_ecommerce_store_custom_css .='body{';
			$bb_ecommerce_store_custom_css .='max-width: 100%;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Container'){
		$bb_ecommerce_store_custom_css .='body{';
			$bb_ecommerce_store_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Box Container'){
		$bb_ecommerce_store_custom_css .='body{';
			$bb_ecommerce_store_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$bb_ecommerce_store_custom_css .='}';
		$bb_ecommerce_store_custom_css .='.header .logo{';
			$bb_ecommerce_store_custom_css .='padding-left:20px;';
		$bb_ecommerce_store_custom_css .='}';
	}

	// css
	$bb_ecommerce_store_show_header = get_theme_mod( 'bb_ecommerce_store_slider_hide_show', false);
	if($bb_ecommerce_store_show_header == false){
		$bb_ecommerce_store_custom_css .='#our-service{';
			$bb_ecommerce_store_custom_css .='margin: 2% 0;';
		$bb_ecommerce_store_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$bb_ecommerce_store_theme_lay = get_theme_mod( 'bb_ecommerce_store_slider_content_alignment','Right');
    if($bb_ecommerce_store_theme_lay == 'Left'){
		$bb_ecommerce_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_ecommerce_store_custom_css .='text-align:left; left:10%; right:40%;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Center'){
		$bb_ecommerce_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$bb_ecommerce_store_custom_css .='text-align:center; left:20%; right:20%;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Right'){
		$bb_ecommerce_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$bb_ecommerce_store_custom_css .='left:40%; right:10%;';
		$bb_ecommerce_store_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/
	$bb_ecommerce_store_theme_lay = get_theme_mod( 'bb_ecommerce_store_slider_image_opacity','0.7');
	if($bb_ecommerce_store_theme_lay == '0'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.1'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.1';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.2'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.2';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.3'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.3';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.4'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.4';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.5'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.5';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.6'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.6';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.7'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.7';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.8'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.8';
		$bb_ecommerce_store_custom_css .='}';
		}else if($bb_ecommerce_store_theme_lay == '0.9'){
		$bb_ecommerce_store_custom_css .='#slider img{';
			$bb_ecommerce_store_custom_css .='opacity:0.9';
		$bb_ecommerce_store_custom_css .='}';
		}

	/*-------------------------- Button Settings option------------------*/
	$bb_ecommerce_store_button_padding_top_bottom = get_theme_mod('bb_ecommerce_store_button_padding_top_bottom');
	$bb_ecommerce_store_button_padding_left_right = get_theme_mod('bb_ecommerce_store_button_padding_left_right');
	if($bb_ecommerce_store_button_padding_top_bottom != false || $bb_ecommerce_store_button_padding_left_right != false){
		$bb_ecommerce_store_custom_css .='#slider .more-btn a, #comments .form-submit input[type="submit"],.blogbutton-small{';
			$bb_ecommerce_store_custom_css .='padding-top: '.esc_html($bb_ecommerce_store_button_padding_top_bottom).'px; padding-bottom: '.esc_html($bb_ecommerce_store_button_padding_top_bottom).'px; padding-left: '.esc_html($bb_ecommerce_store_button_padding_left_right).'px; padding-right: '.esc_html($bb_ecommerce_store_button_padding_left_right).'px; display:inline-block;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_button_border_radius = get_theme_mod('bb_ecommerce_store_button_border_radius');
	if($bb_ecommerce_store_button_border_radius != false){
		$bb_ecommerce_store_custom_css .='#slider .more-btn a, #comments .form-submit input[type="submit"], .blogbutton-small{';
			$bb_ecommerce_store_custom_css .='border-radius: '.esc_html($bb_ecommerce_store_button_border_radius).'px;';
		$bb_ecommerce_store_custom_css .='}';
	}

	/*-----------------------------Responsive Setting --------------------*/
	$bb_ecommerce_store_slider = get_theme_mod( 'bb_ecommerce_store_responsive_slider',false);
	if($bb_ecommerce_store_slider == true && get_theme_mod( 'bb_ecommerce_store_slider_hide_show', false) == false){
    	$bb_ecommerce_store_custom_css .='#slider{';
			$bb_ecommerce_store_custom_css .='display:none;';
		$bb_ecommerce_store_custom_css .='} ';
	}
    if($bb_ecommerce_store_slider == true){
    	$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#slider{';
			$bb_ecommerce_store_custom_css .='display:block;';
		$bb_ecommerce_store_custom_css .='} }';
	}else if($bb_ecommerce_store_slider == false){
		$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#slider{';
			$bb_ecommerce_store_custom_css .='display:none;';
		$bb_ecommerce_store_custom_css .='} }';
	}

	$bb_ecommerce_store_slider = get_theme_mod( 'bb_ecommerce_store_responsive_scroll',true);
	if($bb_ecommerce_store_slider == true && get_theme_mod( 'bb_ecommerce_store_enable_disable_scroll', true) == false){
    	$bb_ecommerce_store_custom_css .='#scroll-top{';
			$bb_ecommerce_store_custom_css .='display:none !important;';
		$bb_ecommerce_store_custom_css .='} ';
	}
    if($bb_ecommerce_store_slider == true){
    	$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#scroll-top{';
			$bb_ecommerce_store_custom_css .='display:block;';
		$bb_ecommerce_store_custom_css .='} }';
	}else if($bb_ecommerce_store_slider == false){
		$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#scroll-top{';
			$bb_ecommerce_store_custom_css .='display:none !important;';
		$bb_ecommerce_store_custom_css .='} }';
	}

	$bb_ecommerce_store_sidebar = get_theme_mod( 'bb_ecommerce_store_responsive_sidebar',true);
    if($bb_ecommerce_store_sidebar == true){
    	$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#sidebar{';
			$bb_ecommerce_store_custom_css .='display:block;';
		$bb_ecommerce_store_custom_css .='} }';
	}else if($bb_ecommerce_store_sidebar == false){
		$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#sidebar{';
			$bb_ecommerce_store_custom_css .='display:none;';
		$bb_ecommerce_store_custom_css .='} }';
	}

	$bb_ecommerce_store_loader = get_theme_mod( 'bb_ecommerce_store_responsive_preloader', true);
	if($bb_ecommerce_store_loader == true && get_theme_mod( 'bb_ecommerce_store_preloader_option', true) == false){
    	$bb_ecommerce_store_custom_css .='#loader-wrapper{';
			$bb_ecommerce_store_custom_css .='display:none;';
		$bb_ecommerce_store_custom_css .='} ';
	}
    if($bb_ecommerce_store_loader == true){
    	$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#loader-wrapper{';
			$bb_ecommerce_store_custom_css .='display:block;';
		$bb_ecommerce_store_custom_css .='} }';
	}else if($bb_ecommerce_store_loader == false){
		$bb_ecommerce_store_custom_css .='@media screen and (max-width:575px) {';
		$bb_ecommerce_store_custom_css .='#loader-wrapper{';
			$bb_ecommerce_store_custom_css .='display:none;';
		$bb_ecommerce_store_custom_css .='} }';
	}

	/*------------------ Skin Option  -------------------*/
	$bb_ecommerce_store_theme_lay = get_theme_mod( 'bb_ecommerce_store_background_skin_mode','Transparent Background');
    if($bb_ecommerce_store_theme_lay == 'With Background'){
		$bb_ecommerce_store_custom_css .='.page-box,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$bb_ecommerce_store_custom_css .='background-color: #fff;';
		$bb_ecommerce_store_custom_css .='}';
		$bb_ecommerce_store_custom_css .='#sidebar{';
			$bb_ecommerce_store_custom_css .='background: none;';
		$bb_ecommerce_store_custom_css .='}';
	}else if($bb_ecommerce_store_theme_lay == 'Transparent Background'){
		$bb_ecommerce_store_custom_css .='article.tag-sticky-2,#sidebar, .inner-service,.page-box-single{';
			$bb_ecommerce_store_custom_css .='background-color: transparent;';
		$bb_ecommerce_store_custom_css .='}';
	}

	/*------------ Woocommerce Settings  --------------*/
	$bb_ecommerce_store_top_bottom_product_button_padding = get_theme_mod('bb_ecommerce_store_top_bottom_product_button_padding', 10);
	if($bb_ecommerce_store_top_bottom_product_button_padding != false){
		$bb_ecommerce_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce div.product form.cart .button{';
			$bb_ecommerce_store_custom_css .='padding-top: '.esc_html($bb_ecommerce_store_top_bottom_product_button_padding).'px; padding-bottom: '.esc_html($bb_ecommerce_store_top_bottom_product_button_padding).'px;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_left_right_product_button_padding = get_theme_mod('bb_ecommerce_store_left_right_product_button_padding', 16);
	if($bb_ecommerce_store_left_right_product_button_padding != false){
		$bb_ecommerce_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce .cart .button, .woocommerce .cart input.button, .woocommerce div.product form.cart .button{';
			$bb_ecommerce_store_custom_css .='padding-left: '.esc_html($bb_ecommerce_store_left_right_product_button_padding).'px; padding-right: '.esc_html($bb_ecommerce_store_left_right_product_button_padding).'px;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_product_button_border_radius = get_theme_mod('bb_ecommerce_store_product_button_border_radius', 0);
	if($bb_ecommerce_store_product_button_border_radius != false){
		$bb_ecommerce_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce .cart .button, .woocommerce .cart input.button{';
			$bb_ecommerce_store_custom_css .='border-radius: '.esc_html($bb_ecommerce_store_product_button_border_radius).'px;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_show_related_products = get_theme_mod('bb_ecommerce_store_show_related_products',true);
	if($bb_ecommerce_store_show_related_products == false){
		$bb_ecommerce_store_custom_css .='.related.products{';
			$bb_ecommerce_store_custom_css .='display: none;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_show_wooproducts_border = get_theme_mod('bb_ecommerce_store_show_wooproducts_border', false);
	if($bb_ecommerce_store_show_wooproducts_border == true){
		$bb_ecommerce_store_custom_css .='.products li{';
			$bb_ecommerce_store_custom_css .='border: 1px solid #cccccc;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_top_bottom_wooproducts_padding = get_theme_mod('bb_ecommerce_store_top_bottom_wooproducts_padding',0);
	if($bb_ecommerce_store_top_bottom_wooproducts_padding != false){
		$bb_ecommerce_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$bb_ecommerce_store_custom_css .='padding-top: '.esc_html($bb_ecommerce_store_top_bottom_wooproducts_padding).'px !important; padding-bottom: '.esc_html($bb_ecommerce_store_top_bottom_wooproducts_padding).'px !important;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_left_right_wooproducts_padding = get_theme_mod('bb_ecommerce_store_left_right_wooproducts_padding',0);
	if($bb_ecommerce_store_left_right_wooproducts_padding != false){
		$bb_ecommerce_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$bb_ecommerce_store_custom_css .='padding-left: '.esc_html($bb_ecommerce_store_left_right_wooproducts_padding).'px !important; padding-right: '.esc_html($bb_ecommerce_store_left_right_wooproducts_padding).'px !important;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_wooproducts_border_radius = get_theme_mod('bb_ecommerce_store_wooproducts_border_radius',0);
	if($bb_ecommerce_store_wooproducts_border_radius != false){
		$bb_ecommerce_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$bb_ecommerce_store_custom_css .='border-radius: '.esc_html($bb_ecommerce_store_wooproducts_border_radius).'px;';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_wooproducts_box_shadow = get_theme_mod('bb_ecommerce_store_wooproducts_box_shadow',0);
	if($bb_ecommerce_store_wooproducts_box_shadow != false){
		$bb_ecommerce_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$bb_ecommerce_store_custom_css .='box-shadow: '.esc_html($bb_ecommerce_store_wooproducts_box_shadow).'px '.esc_html($bb_ecommerce_store_wooproducts_box_shadow).'px '.esc_html($bb_ecommerce_store_wooproducts_box_shadow).'px #eee;';
		$bb_ecommerce_store_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$bb_ecommerce_store_copyright_content_align = get_theme_mod('bb_ecommerce_store_copyright_content_align');
	if($bb_ecommerce_store_copyright_content_align != false){
		$bb_ecommerce_store_custom_css .='.copyright{';
			$bb_ecommerce_store_custom_css .='text-align: '.esc_html($bb_ecommerce_store_copyright_content_align).';';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_footer_content_font_size = get_theme_mod('bb_ecommerce_store_footer_content_font_size', 15);
	if($bb_ecommerce_store_footer_content_font_size != false){
		$bb_ecommerce_store_custom_css .='.copyright p, .copyright a{';
			$bb_ecommerce_store_custom_css .='font-size: '.esc_html($bb_ecommerce_store_footer_content_font_size).'px';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_footer_widget_bg_color = get_theme_mod('bb_ecommerce_store_footer_widget_bg_color');
	if($bb_ecommerce_store_footer_widget_bg_color != false){
		$bb_ecommerce_store_custom_css .='.copyright-wrapper{';
			$bb_ecommerce_store_custom_css .='background-color: '.esc_html($bb_ecommerce_store_footer_widget_bg_color).';';
		$bb_ecommerce_store_custom_css .='}';
	}

	$bb_ecommerce_store_footer_widget_bg_image = get_theme_mod('bb_ecommerce_store_footer_widget_bg_image');
	if($bb_ecommerce_store_footer_widget_bg_image != false){
		$bb_ecommerce_store_custom_css .='.copyright-wrapper{';
			$bb_ecommerce_store_custom_css .='background: url('.esc_html($bb_ecommerce_store_footer_widget_bg_image).');';
		$bb_ecommerce_store_custom_css .='}';
	}

	// scroll to top
	$bb_ecommerce_store_scroll_font_size_icon = get_theme_mod('bb_ecommerce_store_scroll_font_size_icon', 22);
	if($bb_ecommerce_store_scroll_font_size_icon != false){
		$bb_ecommerce_store_custom_css .='#scroll-top .fas{';
			$bb_ecommerce_store_custom_css .='font-size: '.esc_html($bb_ecommerce_store_scroll_font_size_icon).'px;';
		$bb_ecommerce_store_custom_css .='}';
	}



