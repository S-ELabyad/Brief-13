<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package E-commerce Shop
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header role="banner">
    <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_html_e( 'Skip to content', 'e-commerce-shop' ); ?>"><?php esc_html_e( 'Skip to content', 'e-commerce-shop' ); ?></a>
    <?php if( get_theme_mod('bb_ecommerce_store_display_topbar',true) != ''){ ?>
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="top-contact col-lg-3 col-xs-12 col-md-4">
              <?php if( get_theme_mod( 'bb_ecommerce_store_contact','' ) != '') { ?>
                <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_contact','' )); ?></span>
               <?php } ?>
            </div>
            <div class="top-contact col-lg-3 col-xs-12 col-md-4">
              <?php if( get_theme_mod( 'bb_ecommerce_store_email','' ) != '') { ?>
                <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('bb_ecommerce_store_email','') ); ?></span>
              <?php } ?>
            </div>
            <div class="social-media col-lg-6 col-md-4 col-xs-12">
              <?php if( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','e-commerce-shop' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','e-commerce-shop' );?></span></a>
              <?php } ?>
              <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'RSS','e-commerce-shop' );?></span></a>
              <?php } ?>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    <?php } ?>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="logo">
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
      	    <div class="clearfix"></div>
          </div>
          <div class="side_search col-lg-6 col-md-6">
            <div class="responsive_search">
            </div>
            <div class="search_form">
              <?php get_search_form(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="<?php if( get_theme_mod( 'bb_ecommerce_store_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="toggle-menu responsive-menu">
          <button role="tab" onclick="resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','e-commerce-shop'); ?></span></button>
        </div>
        <div class="nav">
      		<div class="container">
            <div id="menu-sidebar" class="nav sidebar">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'e-commerce-shop' ); ?>">
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','e-commerce-shop'); ?></span></a>
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
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_youtube_url','' ) ); ?>"><i class="fab fa-youtube" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_facebook_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_facebook_url','' ) ); ?>"><i class="fab fa-facebook" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_twitter_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_instagram_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_instagram_url','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','e-commerce-shop' );?></span></a>
                      <?php } ?>
                      <?php if( get_theme_mod( 'bb_ecommerce_store_rss_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'bb_ecommerce_store_rss_url','' ) ); ?>"><i class="fas fa-rss" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_attr_e( 'RSS','e-commerce-shop' );?></span></a>
                      <?php } ?>
                    </div>
                    <?php get_search_form();?>
                  </div>
                </nav>
              </div>
      		</div>
        </div><!-- nav -->
      </div>
      <div class="clear"></div>
    </div><!-- aligner -->
  </header>