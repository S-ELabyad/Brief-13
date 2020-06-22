<?php
/**
 * Footer widgets
 *
 * @package RT Ecommerce
 */
if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) {
?>
	<aside id="footer-widgets" class="widget-area" role="complementary">
		<div class="container">
			<?php
				$column_number = 0;
				for ( $i = 1; $i <= 4; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						$column_number++;
					}
				}
				if($column_number ==1 ) {
					$column_class = 'col-md-12 col-sm-12';
				}
				else if($column_number == 2 ){
					$column_class = 'col-md-6 col-sm-6';
				}
				else if($column_number == 3 ){
					$column_class = 'col-md-4 col-sm-6';
				}
				else if($column_number == 4 ){
					$column_class = 'col-md-3 col-sm-6';
				}
			 ?>
			<div class="inner-footer row">
				<?php
				for ( $i = 1; $i <= 4 ; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						?>
						<div class="<?php echo esc_attr($column_class); ?>">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
						<?php
					}
				}
				?>
			</div><!-- .inner-wrapper -->
		</div><!-- .container -->
	</aside><!-- footer-widgets -->
<?php } ?>

