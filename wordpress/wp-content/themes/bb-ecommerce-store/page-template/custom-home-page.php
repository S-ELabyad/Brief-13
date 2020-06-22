<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main role="main" id="maincontent">
	<div class="container">
		<div class="row">
			<?php do_action( 'bb_ecommerce_store_before_static_sidebar' ); ?>
			<div class="col-lg-3 col-md-3 static-sidebar">
		        <div class="cathead">
		          <i class="fa fa-bars" aria-hidden="true"></i><span><?php echo esc_html_e('ALL CATEGORIES','bb-ecommerce-store'); ?></span>
		        </div>
		        <?php if(class_exists('woocommerce')){ ?>
		        <div class="product-category">
		            <?php
		              $args = array(
		                //'number'     => $number,
		                'orderby'    => 'title',
		                'order'      => 'ASC',
		                'hide_empty' => 0,
		                'parent'  => 0
		                //'include'    => $ids
		              );
		              $product_categories = get_terms( 'product_cat', $args );
		              $count = count($product_categories);
		              if ( $count > 0 ){
		                  foreach ( $product_categories as $product_category ) {
		                      $cats_id   = $product_category->term_id;
		                    $cat_link = get_category_link( $cats_id );
		                    $thumbnail_id = get_term_meta( $product_category->term_id, 'thumbnail_id', true ); // Get Category Thumbnail
		                    $image = wp_get_attachment_url( $thumbnail_id );
		                    if ($product_category->category_parent == 0) {
		                      ?>
		                    <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
			                    <?php
			                    if ( $image ) {
				                  echo '<img class="thumd_img" src="' . esc_url( $image ) . '" alt="<?php esc_html(the_title()); ?>" role="img" />';
				                }
			                    echo esc_html( $product_category->name ); ?><span class="screen-reader-text"><?php esc_html_e( 'Product Category','bb-ecommerce-store' );?></span></a></li>
		                    	<?php
		                    }
		                }
		              }
		            ?>
		          </div>
		        <?php } ?>
		       	<div id="sidebar">
		       		<?php dynamic_sidebar('homepage'); ?>
		       	</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<?php do_action( 'bb_ecommerce_store_before_slider' ); ?>
				
				<?php if( get_theme_mod('bb_ecommerce_store_slider_hide_show', false) != '' || get_theme_mod('bb_ecommerce_store_responsive_slider', false) != ''){ ?>
					<section id="slider">
					  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
						    <?php $bb_ecommerce_store_slider_pages = array();
						      	for ( $count = 1; $count <= 4; $count++ ) {
							        $mod = intval( get_theme_mod( 'bb_ecommerce_store_slider' . $count ));
							        if ( 'page-none-selected' != $mod ) {
							          $bb_ecommerce_store_slider_pages[] = $mod;
							        }
						      	}
						      	if( !empty($bb_ecommerce_store_slider_pages) ) :
						        $args = array(
						          	'post_type' => 'page',
						          	'post__in' => $bb_ecommerce_store_slider_pages,
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
							              	<h1><?php esc_html(the_title());?></h1>
							              	<div class="more-btn">            
					                        	<a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('READ MORE','bb-ecommerce-store'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','bb-ecommerce-store' );?></span></a>
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
						    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
						      <span class="screen-reader-text"><?php esc_html_e( 'Previous','bb-ecommerce-store' );?></span>
						    </a>
						    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
						      <span class="screen-reader-text"><?php esc_html_e( 'Next','bb-ecommerce-store' );?></span>
						    </a>
					  	</div>  
					  	<div class="clearfix"></div>
					</section> 
				<?php }?>

				<?php do_action( 'bb_ecommerce_store_after_slider' ); ?>

				<?php if( get_theme_mod('bb_ecommerce_store_services_category') != false){ ?> 
					<section id="our-service">					
						<div class="row">
						    <?php 
							$bb_ecommerce_store_catData=  get_theme_mod('bb_ecommerce_store_services_category');
							if($bb_ecommerce_store_catData){
						    $page_query = new WP_Query(array( 'category_name' => esc_html($bb_ecommerce_store_catData,'bb-ecommerce-store')));?>
					     	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
					     		<div class="col-lg-4 col-md-4">
					     			<div class="service">
					          			<strong><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></strong>
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

				<?php if( get_theme_mod('bb_ecommerce_store_sec1_title') != ''){ ?>   
					<section id="our-products">
					    <div class="text-center innerlightbox">
					        <?php if( get_theme_mod('bb_ecommerce_store_sec1_title') != ''){ ?>     
					            <strong><?php echo esc_html(get_theme_mod('bb_ecommerce_store_sec1_title',__('New Products','bb-ecommerce-store'))); ?></strong>
					        <?php }?>
					    </div>
						<?php $bb_ecommerce_store_slider_pages = array();
							$mod = intval( get_theme_mod( 'bb_ecommerce_store_servicesettings' ));
							if ( 'page-none-selected' != $mod ) {
							  $bb_ecommerce_store_slider_pages[] = $mod;
							}
						if( !empty($bb_ecommerce_store_slider_pages) ) :
						  $args = array(
						    'post_type' => 'page',
						    'post__in' => $bb_ecommerce_store_slider_pages,
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
				<?php }?>

				<?php do_action( 'bb_ecommerce_store_after_productsec' ); ?>

				<div class="content-bb" class="container">
					<?php while ( have_posts() ) : the_post(); ?>
				        <?php the_content(); ?>
				    <?php endwhile; // end of the loop. ?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>