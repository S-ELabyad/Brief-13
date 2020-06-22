<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package RT Ecommerce
 */

get_header();
?>

<div class="container">
  <div class="mt-4 mb-4">
    <?php
        $theme_lay = get_theme_mod( 'rt_ecommerce_theme_options','One Column');
        if($theme_lay == 'Left Sidebar'){ ?>
        <div class="row">
          <div class="col-md-4 col-sm-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
          <section id="primary" class="content-area col-md-8 col-sm-8">
            <main id="main" class="site-main" role="main">         
              <?php if ( have_posts() ) :
                /* Start the Loop */
                  
                  while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/post/content', get_post_format() ); 
                  
                  endwhile;

                  else :

                    get_template_part( 'no-results' );

                  endif; 
              ?>
              <div class="navigation">
                <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text'          => __( 'Previous page', 'rt-ecommerce' ),
                        'next_text'          => __( 'Next page', 'rt-ecommerce' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rt-ecommerce' ) . ' </span>',
                    ) );
                ?>
                  <div class="clearfix"></div>
              </div>
            </main>
          </section>
        </div>
        <div class="clearfix"></div>
    <?php }else if($theme_lay == 'Right Sidebar'){ ?>
      <div class="row">
        <section id="primary" class=" content-areacol-md-8 col-sm-8">
          <main id="main" class="site-main" role="main">          
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' , get_post_format()  ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' );

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'rt-ecommerce' ),
                      'next_text'          => __( 'Next page', 'rt-ecommerce' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rt-ecommerce' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </main>
        </section>
        <div class="col-md-4 col-sm-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else if($theme_lay == 'One Column'){ ?>
        <section id="primary" class="content-area col-md-12">
          <main id="main" class="site-main" role="main">          
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' , get_post_format() ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' );

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'rt-ecommerce' ),
                      'next_text'          => __( 'Next page', 'rt-ecommerce' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rt-ecommerce' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </main>
        </section>
    <?php }else if($theme_lay == 'Three Columns'){ ?>
      <div class="row">
        <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <section id="primary" class="content-area col-md-6 col-sm-6">
          <main id="main" class="site-main" role="main">         
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' , get_post_format() ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' );

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'rt-ecommerce' ),
                      'next_text'          => __( 'Next page', 'rt-ecommerce' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rt-ecommerce' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </main>
        </section>
        <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
      </div>
    <?php }else if($theme_lay == 'Four Columns'){ ?>
      <div class="row">
        <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
        <section id="primary" class="content-area col-md-3 col-sm-3">
          <main id="main" class="site-main" role="main">          
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/content' , get_post_format() ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' );

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'rt-ecommerce' ),
                      'next_text'          => __( 'Next page', 'rt-ecommerce' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rt-ecommerce' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </main>
        </section>
        <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
        <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-3');?></div>
      </div>
    <?php }else if($theme_lay == 'Grid Layout'){ ?>
      <div class="row">
        <section id="primary" class=" content-area flipInX col-md-9">
          <main id="main" class="site-main row" role="main">         
            <?php if ( have_posts() ) :
              /* Start the Loop */
                
                while ( have_posts() ) : the_post();

                  get_template_part( 'template-parts/post/grid-layout' ); 
                
                endwhile;

                else :

                  get_template_part( 'no-results' );

                endif; 
            ?>
            <div class="navigation">
              <?php
                  // Previous/next page navigation.
                  the_posts_pagination( array(
                      'prev_text'          => __( 'Previous page', 'rt-ecommerce' ),
                      'next_text'          => __( 'Next page', 'rt-ecommerce' ),
                      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'rt-ecommerce' ) . ' </span>',
                  ) );
              ?>
                <div class="clearfix"></div>
            </div>
          </main>
        </section>
        <div class="col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php } ?>
    <div class="clearfix"></div>
  </div>
</div>

<?php get_footer(); ?>