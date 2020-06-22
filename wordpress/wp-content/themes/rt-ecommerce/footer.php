<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package RT Ecommerce
 */
?>

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
  	<div class="copyright text-center">
        <p><?php echo esc_html(get_theme_mod('rt_ecommerce_footer_copy',__('Ecommerce Wordpress Theme By','rt-ecommerce'))); ?> <span class="copyright_credit"><?php echo esc_html(rt_ecommerce_credit(),'rt-ecommerce'); ?></span></p>
  	</div>
  	<div class="clear"></div>
</footer>

<?php wp_footer(); ?>
</body>
</html>