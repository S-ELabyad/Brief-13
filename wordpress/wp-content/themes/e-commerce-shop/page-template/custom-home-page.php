<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main role="main" id="maincontent">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9">
				<?php do_action( 'bb_ecommerce_store_before_slider' ); ?>

				<?php if( get_theme_mod('bb_ecommerce_store_slider_hide_show') != ''){ ?>
					<section id="slider">
					  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
						    <?php $slider_pages = array();
						      	for ( $count = 1; $count <= 4; $count++ ) {
							        $mod = intval( get_theme_mod( 'bb_ecommerce_store_slider' . $count ));
							        if ( 'page-none-selected' != $mod ) {
							          $slider_pages[] = $mod;
							        }
						      	}
						      	if( !empty($slider_pages) ) :
						        $args = array(
						          	'post_type' => 'page',
						          	'post__in' => $slider_pages,
						          	'orderby' => 'post__in'
						        );
						        $query = new WP_Query( $args );
						        if ( $query->have_posts() ) :
						          $i = 1;
						    ?>     
						    <div class="carousel-inner" role="listbox">
						      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
						        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
						          	<?php the_post_thumbnail(); ?>
						          	<div class="carousel-caption">
							            <div class="inner_carousel">
							              	<h1><?php the_title();?></h1>
							              	<div class="more-btn">            
					                        	<a href="<?php the_permalink(); ?>" alt="<?php esc_html_e( 'READ MORE','e-commerce-shop' );?>"><?php esc_html_e('READ MORE','e-commerce-shop'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','e-commerce-shop' );?></span></a>
					                        </div>		            
							            </div>
						          	</div>
						        </div>
						      	<?php $i++; endwhile; 
						      	wp_reset_postdata();?>
						    </div>
						    <?php else : ?>
						    <div class="no-postfound"></div>
						      <?php endif;
						    endif;?>
						    <a class="carousel-control-prev" href="#carouselExampleIndicators" alt="<?php esc_html_e( 'Previous','e-commerce-shop' );?>" role="button" data-slide="prev">
						      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
						      <span class="screen-reader-text"><?php esc_html_e( 'Previous','e-commerce-shop' );?></span>
						    </a>
						    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" alt="<?php esc_html_e( 'Next','e-commerce-shop' );?>">
						      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
						      <span class="screen-reader-text"><?php esc_html_e( 'Next','e-commerce-shop' );?></span>
						    </a>
					  	</div>  
					  	<div class="clearfix"></div>
					</section>
				<?php }?>

				<?php do_action( 'bb_ecommerce_store_after_slider' ); ?>

				<?php if( get_theme_mod('bb_ecommerce_store_services_category') != ''){ ?> 
					<section id="our-service">					
						<div class="row">
						    <?php 
							  $catData=  get_theme_mod('bb_ecommerce_store_services_category');
							  if($catData){
						    $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'e-commerce-shop')));?>
						     	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
						     		<div class="col-lg-4 col-md-4">
						     			<div class="service">
						          			<a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><strong><?php the_title(); ?></strong><span class="screen-reader-text"><?php the_title(); ?></span></a>
						          			<p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_ecommerce_store_string_limit_words( $excerpt,10 ) ); ?></p>
						          		</div>
						        	</div>
					     	<?php endwhile;
					     	wp_reset_postdata();
							}?>
						</div>
					</section>
				<?php }?>

				<?php do_action( 'bb_ecommerce_store_after_services_category' ); ?>

				<section id="our-products">
				    <div class="text-center innerlightbox">
				        <?php if( get_theme_mod('bb_ecommerce_store_sec1_title') != ''){ ?>     
				            <strong><?php echo esc_html(get_theme_mod('bb_ecommerce_store_sec1_title','')); ?></strong>
				        <?php }?>
				    </div>
					<?php $slider_pages = array();
						$mod = intval( get_theme_mod( 'bb_ecommerce_store_servicesettings' ));
						if ( 'page-none-selected' != $mod ) {
						  $slider_pages[] = $mod;
						}
					if( !empty($slider_pages) ) :
					  $args = array(
					    'post_type' => 'page',
					    'post__in' => $slider_pages,
					    'orderby' => 'post__in'
					  );
					  $query = new WP_Query( $args );
					  if ( $query->have_posts() ) :
					   
							while ( $query->have_posts() ) : $query->the_post(); ?>
							    <div class="row box-image text-center">
							        <p><?php the_content(); ?></p>
							        <div class="clearfix"></div>
							    </div>
							<?php endwhile; ?>
					  <?php else : ?>
					      <div class="no-postfound"></div>
					  <?php endif;
					endif;
					wp_reset_postdata();?>
				    <div class="clearfix"></div> 
				</section>

				<?php do_action( 'bb_ecommerce_store_after_productsec' ); ?>

				<section id="shop-now">
				    <div class="shopimage">
					    <?php if( get_theme_mod( 'ecommerce_shop_image')  != '') { ?>
				          	<img  src="<?php echo esc_url( get_theme_mod('ecommerce_shop_image',get_template_directory_uri().'images/gift.jpg') ); ?>" alt="shop image">
				        <?php } ?>
				        <div class="shomain">
				        <?php if( get_theme_mod('ecommerce_shop_title') != ''){ ?>     
				            <h3><?php echo esc_html(get_theme_mod('ecommerce_shop_title','')); ?></h3>
				        <?php }?>
				        <?php if( get_theme_mod('ecommerce_shop_linkname') != ''){ ?>     
				        <a href="<?php echo esc_url(get_theme_mod('ecommerce_shop_link','')); ?>"><p class="testparabt"><?php echo esc_html(get_theme_mod('ecommerce_shop_linkname','')); ?></p><span class="screen-reader-text"><?php esc_html_e( 'SHOP NOW','e-commerce-shop' );?></span></a>
					    </div>
					    <?php }?>
				    </div>
				</section>

			</div>
			<div class="col-lg-3 col-md-3 static-sidebar">
				<div class="cathead"><i class="fas fa-bars"></i><span><?php echo esc_html('ALL CATEGORIES') ?></span></div>
				<div class="sidepro">
					<?php dynamic_sidebar('static-sidebar');?>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</main>

<?php get_footer(); ?>