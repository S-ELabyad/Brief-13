<?php
/**
 * To fetch Header content
 */
?>

<div class="masthead">  
	<div class="container">
	  <div class="row pt-2 pb-2 m-0">
	    <div class="col-md-4 col-sm-12">
	      <div class="logo">        
	        <?php if( has_custom_logo() ){ rt_ecommerce_the_custom_logo();
	           }else{ ?>
	          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	          <?php $description = get_bloginfo( 'description', 'display' );
	          if ( $description || is_customize_preview() ) : ?> 
	            <p class="site-description"><?php echo esc_html($description); ?></p>       
	        <?php endif; }?>
	      </div>
	    </div>
	    <div class="col-md-8 col-sm-12">
	      <div class="row pt-4 pb-4">
	        <div class="col-md-8 col-sm-12">
	        	<?php get_search_form(); ?>
	        </div>
	        <div class="col-md-4 col-sm-12">
	          <ul class="extras_box">
	             <?php if (is_user_logged_in()) { ?>
	            <li class="login_logout">
	              <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>"><i class="far fa-user"></i><?php echo esc_html('Log out','rt-ecommerce'); ?>
	              </a>
	            </li>
	            <?php } else {?>
	            <li class="login_logout"><a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html('Login','rt-ecommerce'); ?></a></li>
	            <?php }?>
	            <?php if ( class_exists( 'WooCommerce' ) ) {?>
		            <li class="cartbox">
		              <a class="cart_link_box" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
		                <i class="fas fa-shopping-basket" aria-hidden="true"></i>
		                <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
		              </a>
		              <div class="content_cart">
		                <?php the_widget( 'WC_Widget_Cart', '' ); ?>
		              </div>
		            </li>
	            <?php } else {
	            	echo esc_html_e('Install Woocommerce','rt-ecommerce');
	            } ?>
	            </ul>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="clearfix"></div>
</div>