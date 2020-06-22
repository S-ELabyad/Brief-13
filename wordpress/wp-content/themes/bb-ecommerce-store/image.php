<?php
/**
 * The template for displaying image attachments.
 *
 * @package Ecommerce Store
 */
get_header(); ?>

<main role="main" id="maincontent" class="content-bb">
    <div class="container">
        <div class="middle-align">
            <?php
            $bb_ecommerce_store_left_right = get_theme_mod( 'bb_ecommerce_store_theme_options','Right Sidebar');
            if($bb_ecommerce_store_left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div class="col-lg-8 col-md-8">
            			<?php while ( have_posts() ) : the_post(); ?>    
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php esc_html(the_title());?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_ecommerce_store_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            <?php }else if($bb_ecommerce_store_left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php esc_html(the_title());?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_ecommerce_store_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($bb_ecommerce_store_left_right == 'One Column'){ ?>
                <?php while ( have_posts() ) : the_post(); ?>    
                    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php esc_html(the_title());?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php bb_ecommerce_store_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </div>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            <?php }else if($bb_ecommerce_store_left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div class="col-lg-6 col-md-6">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php esc_html(the_title());?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_ecommerce_store_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($bb_ecommerce_store_left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div class="col-lg-3 col-md-3">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php esc_html(the_title());?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_ecommerce_store_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($bb_ecommerce_store_left_right == 'Grid Layout'){ ?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php esc_html(the_title());?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_ecommerce_store_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <h1><?php esc_html(the_title());?></h1>    
                                    <div class="entry-attachment">
                                        <div class="attachment">
                                            <?php bb_ecommerce_store_the_attached_image(); ?>
                                        </div>
                
                                        <?php if ( has_excerpt() ) : ?>
                                            <div class="entry-caption">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>    
                                    <?php
                                        the_content();
                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'bb-ecommerce-store' ),
                                            'after'  => '</div>',
                                        ) );
                                    ?>
                                </div>    
                                <?php edit_post_link( __( 'Edit', 'bb-ecommerce-store' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                            </div>    
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                            ?>    
                        <?php endwhile; // end of the loop. ?>
                    </div>
                    <div id="sidebar" class="col-lg-4 col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }?>
            <div class="clear"></div>
        </div>
    </div>
</main>