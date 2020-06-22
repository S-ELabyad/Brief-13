<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Ecommerce Store
 */
get_header(); ?>

<?php do_action( 'bb_ecommerce_store_page_header' ); ?>

<main role="main" id="maincontent" class="content-bb">
    <div class="container">
        <?php
        $bb_ecommerce_store_left_right = get_theme_mod( 'bb_ecommerce_store_single_page_sidebar_layout','One Column');
        if($bb_ecommerce_store_left_right == 'Left Sidebar'){ ?>
            <div class="row">
                <div id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
                <div class="col-lg-8 col-md-8 background-img-skin">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_post_thumbnail(); ?>
                        <h1><?php esc_html(the_title()); ?></h1>
                        <div class="entry-content"><?php the_content();?></div>
                    <?php endwhile; // end of the loop. ?>
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                    <div class="clear"></div>
                </div>
            </div>
        <?php }else if($bb_ecommerce_store_left_right == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-8 col-md-8 background-img-skin">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_post_thumbnail(); ?>
                        <h1><?php esc_html(the_title()); ?></h1>
                        <div class="entry-content"><?php the_content();?></div>
                    <?php endwhile; // end of the loop. ?>
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                    <div class="clear"></div>
                </div>
                <div id="sidebar" class="col-lg-4 col-md-4">
                    <?php dynamic_sidebar('sidebar-1'); ?>
                </div>
            </div>
        <?php }else if($bb_ecommerce_store_left_right == 'One Column'){ ?>
            <div class="container background-img-skin">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                    <h1><?php esc_html(the_title()); ?></h1>
                    <div class="entry-content"><?php the_content();?></div>
                <?php endwhile; // end of the loop. ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
                <div class="clear"></div>
            </div>
        <?php }?>
    </div>
</main>

<?php do_action( 'bb_ecommerce_store_page_footer' ); ?>

<?php get_footer(); ?>