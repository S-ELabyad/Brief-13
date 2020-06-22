<?php
/**
 * Template Name:Page with Right Sidebar
 */

get_header(); ?>

<?php do_action( 'rt_ecommerce_header_pageright' ); ?>

<div class="container">
    <div class="row">       
		<div class="col-md-9" id="content-rt" >
			<?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content();?>
                </article>
            <?php endwhile; // end of the loop. ?>
            <?php
                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
            ?>
        </div>
        <div class="col-md-3">
			<?php get_sidebar('page'); ?>
		</div>
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'rt_ecommerce_footer_pageright' ); ?>

<?php get_footer(); ?>