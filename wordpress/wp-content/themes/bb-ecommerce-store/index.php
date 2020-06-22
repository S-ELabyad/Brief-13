<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Ecommerce Store
 */
get_header(); ?>

<?php do_action( 'bb_ecommerce_store_index_header' ); ?>

<main role="main" id="maincontent">
  <div class="container">
    <?php
    $bb_ecommerce_store_left_right = get_theme_mod( 'bb_ecommerce_store_theme_options','Right Sidebar');
    if($bb_ecommerce_store_left_right == 'Left Sidebar'){ ?> 
      <div class="row">
        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
        <div id="our-services" class="services col-lg-8 col-md-8">         
          <?php if ( have_posts() ) :
            /* Start the Loop */

              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                  'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
              ) );
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">                   
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                  'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
              ) );
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'One Column'){ ?>
      <div id="our-services" class="services">                  
        <?php if ( have_posts() ) :
          /* Start the Loop */
            
            while ( have_posts() ) : the_post();

              get_template_part( 'template-parts/content', get_post_format() ); 
            
            endwhile;

            else :

              get_template_part( 'no-results' ); 

            endif; 
        ?>
        <div class="navigation">
          <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                  'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
              ) );
          ?>
          <div class="clearfix"></div>
        </div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Three Columns'){ ?>
      <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-6 col-md-6">         
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                  'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
              ) );
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Four Columns'){ ?>
      <div class="row">
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
        <div id="our-services" class="services col-lg-3 col-md-3">         
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                  'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
              ) );
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
        <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
      </div>
    <?php }else if($bb_ecommerce_store_left_right == 'Grid Layout'){ ?>
      <div id="our-services" class="services row">      
        <?php if ( have_posts() ) :
          /* Start the Loop */
            
            while ( have_posts() ) : the_post();

              get_template_part( 'template-parts/grid-layout' ); 
            
            endwhile;

            else :

              get_template_part( 'no-results' ); 

            endif; 
        ?>
        <div class="navigation">
          <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
            ) );
          ?>
          <div class="clearfix"></div>
        </div>
      </div>
    <?php }else {?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">                  
          <?php if ( have_posts() ) :
            /* Start the Loop */
              
              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', get_post_format() ); 
              
              endwhile;

              else :

                get_template_part( 'no-results' ); 

              endif; 
          ?>
          <div class="navigation">
            <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                  'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
              ) );
            ?>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
      </div>
    <?php }?>
  </div>
</main>

<?php do_action( 'bb_ecommerce_store_index_footer' ); ?>

<?php get_footer(); ?>