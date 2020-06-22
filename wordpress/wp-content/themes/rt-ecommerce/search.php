<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package RT Ecommerce
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <?php
            $theme_lay = get_theme_mod( 'rt_ecommerce_theme_options','One Column');
            if($theme_lay == 'Left Sidebar'){ ?>
                <div class="col-md-4 col-sm-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                <section id="primary" class="content-area col-md-8 col-sm-8">
                    <main id="main" class="site-main" role="main">
                        <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>      
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/post/content' ); 
                          
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
                <div class="clearfix"></div>
            <?php }else if($theme_lay == 'Right Sidebar'){ ?>
                <section id="primary" class=" content-areacol-md-8 col-sm-8">
                    <main id="main" class="site-main" role="main">
                        <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>        
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/post/content' ); 
                          
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
            <?php }else if($theme_lay == 'One Column'){ ?>
                <section id="primary" class="content-area col-md-12">
                    <main id="main" class="site-main" role="main">
                       <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>         
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/post/content' ); 
                          
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
                <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                <section id="primary" class="content-area col-md-6 col-sm-6">
                    <main id="main" class="site-main" role="main">
                        <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>        
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/post/content' ); 
                          
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
            <?php }else if($theme_lay == 'Four Columns'){ ?>
                <div class="col-md-3 col-sm-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
                <section id="primary" class="content-area col-md-3 col-sm-3">
                    <main id="main" class="site-main m-0" role="main">
                        <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>        
                        <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/post/content' ); 
                          
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
            <?php }else if($theme_lay == 'Grid Layout'){ ?>
                <section id="primary" class=" content-area flipInX col-md-9">
                    <main id="main" class="site-main row m-0" role="main">
                        <h1 class="entry-title w-100"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>        
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
            <?php } ?>
        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>