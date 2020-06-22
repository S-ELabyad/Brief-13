<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Ecommerce Store
 */

get_header(); ?>

<?php do_action( 'bb_ecommerce_store_single_header' ); ?>

<div class="container">
    <main role="main" id="maincontent" class="middle-align">
    	<?php
        $bb_ecommerce_store_left_right = get_theme_mod( 'bb_ecommerce_store_single_post_sidebar_layout','Right Sidebar');
        if($bb_ecommerce_store_left_right == 'Left Sidebar'){ ?> 
	        <div class="row">
		    	<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2'); ?></div>
				<div class="col-lg-8 col-md-8" class="content-bb">
					<?php if ( have_posts() ) :

		               while ( have_posts() ) : the_post();
		                 	get_template_part( 'template-parts/content-single' ); 
		               endwhile;

		               else :
		                 	get_template_part( 'no-results' );
		               endif; 
		            ?>
		       	</div>
	        </div>
	    <?php }else if($bb_ecommerce_store_left_right == 'Right Sidebar'){ ?>
	    	<div class="row">
		       	<div class="col-lg-8 col-md-8" class="content-bb">
					<?php if ( have_posts() ) :

		               while ( have_posts() ) : the_post();
		                 	get_template_part( 'template-parts/content-single' ); 
		               endwhile;

		               else :
		                 	get_template_part( 'no-results' );
		               endif; 
		            ?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
			</div>
		<?php }else if($bb_ecommerce_store_left_right == 'One Column'){ ?>
			<div class="content-bb">
				<?php if ( have_posts() ) :

	               while ( have_posts() ) : the_post();
	                 	get_template_part( 'template-parts/content-single' ); 
	               endwhile;

	               else :
	                 	get_template_part( 'no-results' );
	               endif; 
	            ?>
	       	</div>
		<?php }else {?>
			<div class="row">
		       	<div class="col-lg-8 col-md-8" class="content-bb">
					<?php if ( have_posts() ) :

		                while ( have_posts() ) : the_post();
		                 	get_template_part( 'template-parts/content-single' ); 
		                endwhile;

		                else :
		                 	get_template_part( 'no-results' );
		                endif; 
		            ?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
			</div>
		<?php }?>
	    <div class="clearfix"></div>
    </main>
</div>

<?php do_action( 'bb_ecommerce_store_single_footer' ); ?>

<?php get_footer(); ?>