<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Ecommerce Store
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'bb-ecommerce-store' ) ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
      wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  } ?>
  <header role="banner">
    <?php if(get_theme_mod('bb_ecommerce_store_preloader_option',true) != '' || get_theme_mod('bb_ecommerce_store_responsive_preloader', true) != ''){ ?>
      <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <?php }?>
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'bb-ecommerce-store' ); ?></a>
    <?php if( get_theme_mod('bb_ecommerce_store_display_topbar', false) != ''){ ?>
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="top-contact col-lg-3 col-md-3">
              <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
              <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?></span>
              <?php } ?>
            </div>
            <div class="top-contact col-lg-3 col-md-4">
              <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
              <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?></span>
              <?php } ?>
            </div>
            <div class="social-media col-lg-6 col-md-5">
              <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','bb-ecommerce-store' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'RSS','bb-ecommerce-store' );?></span></a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    <?php } ?>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="logo  col-lg-3 col-md-3">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php else: ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif; ?>
              <?php endif; ?>
              <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
                ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php endif; ?>
            <?php endif; ?>
          </div>      
          <div class="side_search  col-lg-6 col-md-5">
            <?php if(class_exists('woocommerce')){ ?>
              <?php get_product_search_form()?>
            <?php } ?>
          </div>
          <div class="cart-btn-box col-lg-3 col-md-4">
            <div class="cart_icon"><i class="fas fa-shopping-bag"></i><a href="<?php the_permalink((get_option('woocommerce_cart_page_id'))); ?>"><?php echo esc_html_e('SHOPPING CART','bb-ecommerce-store'); ?><span class="screen-reader-text"><?php esc_attr_e( 'SHOPPING CART','bb-ecommerce-store' );?></span></a></div>
          </div>
        </div>
      </div>
      <div class="toggle-menu responsive-menu <?php if( get_theme_mod( 'bb_ecommerce_store_responsive_sticky_header',false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <button role="tab" class="mobiletoggle" onclick="bb_ecommerce_store_resmenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','bb-ecommerce-store'); ?></span></button>
      </div>
      <div class="top-header">
        <div class="container">
          <div class="row">
            <div class=" col-lg-3 col-md-3">
            </div>
            <div class=" col-lg-9 col-md-9">
              <div id="menu-sidebar" class="nav sidebar <?php if( get_theme_mod( 'bb_ecommerce_store_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'bb-ecommerce-store' ); ?>">
                  <?php 
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  ?>
                  <div id="contact-info">
                    <div class="top-contact">
                      <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
                      <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?></span>
                      <?php } ?>
                    </div>
                    <div class="top-contact">
                      <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
                      <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?></span>
                      <?php } ?>
                    </div>
                    <div class="social-media">
                      <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'RSS','bb-ecommerce-store' );?></span></a>
                      <?php } ?>
                    </div>
                    <?php get_search_form();?>
                  </div>
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="bb_ecommerce_store_resmenu_close()"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','bb-ecommerce-store'); ?></span></a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </header>