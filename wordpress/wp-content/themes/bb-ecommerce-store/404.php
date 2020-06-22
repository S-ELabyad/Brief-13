<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Ecommerce Store
 */

get_header(); ?>

<main role="main" id="maincontent" class="content-bb">
    <div class="container">
        <div class="page-content">
            <h1><?php echo esc_html(get_theme_mod('bb_ecommerce_store_title_404_page',__('404 Not Found','bb-ecommerce-store')));?></h1>
            <p class="text-404"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_content_404_page',__('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','bb-ecommerce-store')));?></p>
            <?php if( get_theme_mod('bb_ecommerce_store_button_404_page','Back to Home Page') != ''){ ?>
                <div class="read-moresec">
                    <a href="<?php echo esc_url(home_url()); ?>" class="button"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_404_page',__('Back to Home Page','bb-ecommerce-store')));?><span class="screen-reader-text"><?php esc_html_e( 'Back to Home Page', 'bb-ecommerce-store' ); ?></span></a>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>