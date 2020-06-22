<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'bb_ecommerce_store_pageleft_header' ); ?>

<div class="container">
    <main role="main" id="maincontent" class="middle-align row">       
		<div id="sidebar" class="col-lg-4 col-md-4">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>		 
		<div class="background-img-skin col-lg-8 col-md-8" class="content-bb" >
			<?php while ( have_posts() ) : the_post(); ?>                
                <h1><?php esc_html(the_title());?></h1>
                <?php the_post_thumbnail(); ?>
                <div class="entry-content"><?php the_content();?></div>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bb-ecommerce-store' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );               
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="clear"></div>    
    </main>
</div>

<?php do_action( 'bb_ecommerce_store_pageleft_footer' ); ?>

<?php get_footer(); ?>