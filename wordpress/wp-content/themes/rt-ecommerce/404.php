<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package RT Ecommerce
 */

get_header(); ?>

<div id="content" class="site-content">
	<div class="container">
		<div id="primary" class="content-area">
			<main>
				<article>
					<header class="entry-header">
						<h3><?php printf( '<strong>%s</strong> %s', esc_html__( '404', 'rt-ecommerce' ), esc_html__( 'Not Found', 'rt-ecommerce' ) ) ?></h3>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'rt-ecommerce' ); ?></p>
						<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'rt-ecommerce' ); ?></p>
						<div class="read-moresec">
		            		<a href="<?php echo esc_url( home_url() ) ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to Home Page', 'rt-ecommerce' ); ?></a>
						</div>
					</div>
				</article>
    		</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>