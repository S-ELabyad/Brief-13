<?php
/**
 * Template Name: Section Home
 */

get_header(); ?>

<?php do_action( 'rt_ecommerce_above_slider' ); ?>

<?php /** slider section **/ ?>
	<?php
	// Get pages set in the customizer (if any)
	$pages = array();
	for ( $count = 1; $count <= 5; $count++ ) {
	$mod = absint( get_theme_mod( 'rt_ecommerce_slidersettings-page-' . $count ));
	if ( 'page-none-selected' != $mod ) {
	  $pages[] = $mod;
	}
	}
	if( !empty($pages) ) :
	  $args = array(
	    'post_type' => 'page',
	    'post__in' => $pages,
	    'orderby' => 'post__in'
	  );
	  $query = new WP_Query( $args );
	  if ( $query->have_posts() ) :
	    $count = 1;
	    ?>
		<div class="slider-main">
	    	<div id="slider" class="banner_slider">
		      <?php
		        $rt_ecommerce_n = 0;
				while ( $query->have_posts() ) : $query->the_post();?>
					<div class="slider_content">
					  	<?php
						  $rt_ecommerce_n++;
						  $rt_ecommerce_slideno[] = $rt_ecommerce_n;
					  	?>				   
						<img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $rt_ecommerce_n ); ?>" />
						<div class="slide_inner">
							<h2><?php echo esc_html(the_title()); ?></h2>
							<p><?php echo esc_html(the_content()); ?></p>		            
							<a class="read-more" href="<?php echo esc_url(the_permalink()); ?>"><?php esc_html_e( 'More About Us','rt-ecommerce' ); ?></a>
						</div>
				    </div>
			  	<?php
					$count++;
					endwhile;
					wp_reset_postdata();
		      	?>
		    </div>
		</div>
	  <?php else : ?>
	      <div class="header-no-slider"></div>
	    <?php
	  endif;
	endif;
?>
<div class="clearfix"></div>

<?php do_action( 'rt_ecommerce_below_slider' ); ?>

<?php if ( class_exists( 'WooCommerce' ) ) {?>
	<section id="featured-products" class="mt-4 mb-4">
		<div class="container">
		    <div class="text-center">
		    	<?php if( get_theme_mod('rt_ecommerce_subtitle') != ''){ ?>     
		            <p><?php echo esc_html(get_theme_mod('rt_ecommerce_subtitle',__('All the Styles in this spring','rt-ecommerce'))); ?></p>
		        <?php }?>
		        <?php if( get_theme_mod('rt_ecommerce_maintitle') != ''){ ?>     
		            <h3><?php echo esc_html(get_theme_mod('rt_ecommerce_maintitle',__('Featured Products','rt-ecommerce'))); ?></h3>
		        <?php }?>
		    </div>
			<?php $pages = array();
			for ( $count = 0; $count <= 0; $count++ ) {
				$mod = absint( get_theme_mod( 'rt_ecommerce_page' . $count ));
				if ( 'page-none-selected' != $mod ) {
				  $pages[] = $mod;
				}
			}
			if( !empty($pages) ) :
			  $args = array(
			    'post_type' => 'page',
			    'post__in' => $pages,
			    'orderby' => 'post__in'
			  );
			  $query = new WP_Query( $args );
			  if ( $query->have_posts() ) :
			    $count = 0;
					while ( $query->have_posts() ) : $query->the_post(); ?>
					    <div class="row post_thumb text-center m-0">
					        <?php the_content(); ?>
					        <div class="clearfix"></div>
					    </div>
					<?php $count++; endwhile; ?>
			  <?php else : ?>
			      <div class="no-postfound"></div>
			  <?php endif;
			endif;
			wp_reset_postdata()?>
		    <div class="clearfix"></div> 
		</div>
	</section>
<?php } else {
	echo esc_html_e('Install Woocommerce','rt-ecommerce');
} ?>


<?php do_action( 'rt_ecommerce_below_about' ); ?>

<?php get_footer(); ?>