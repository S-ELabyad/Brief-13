<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package RT Ecommerce
 */

get_header(); ?>

<?php do_action( 'rt_ecommerce_header_page' ); ?>

<div id="primary" class="content-area container mt-4 mb-4">
    <main id="main" class="site-main" role="main">
		<?php 
        while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php if(has_post_thumbnail()){?>
            	<img src="<?php the_post_thumbnail_url('full'); ?>">
                <?php }?>

                <h3><?php the_title(); ?></h3>

                <?php the_content();?>

            </article>
        <?php endwhile; // end of the loop. ?>
        <?php
        	//If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
                comments_template();
        ?>
        <div class="clearfix"></div>
    </main>
</div>

<?php do_action( 'rt_ecommerce_footer_page' ); ?>

<?php get_footer(); ?>