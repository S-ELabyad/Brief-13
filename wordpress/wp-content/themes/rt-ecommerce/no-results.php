<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RT Ecommerce
 */
?>
<header>
	<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'rt-ecommerce' ); ?></h1>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( esc_html( 'Ready to publish your first post? Get started here.', 'rt-ecommerce' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rt-ecommerce' ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'rt-ecommerce' ); ?></p><br />
		<div class="read-moresec">
			<div><a href="<?php echo esc_url(); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to Home Page', 'rt-ecommerce' ); ?></a></div>
		</div>
<?php endif; ?>