<?php
/**
 * The template part for displaying slider
 *
 * @package RT Ecommerce
 * @subpackage rt-ecommerce
 * @since RT Ecommerce 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div id="content-rt" class="metabox">
        <span class="entry-date"><?php echo get_the_date(); ?></span>
        <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        <span class="entry-comments"> <?php comments_number( __('no responses','rt-ecommerce'), __('one response','rt-ecommerce'), __('% responses','rt-ecommerce') ); ?> </span>
    </div><!-- metabox -->
    <h1><?php the_title(); ?></h1>
    <?php if(has_post_thumbnail()) { ?>
            <div class="feature-box">   
                <img src="<?php the_post_thumbnail_url('full'); ?>"  width="100%">
            </div>                 
        <?php } the_content();
        the_tags(); ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'rt-ecommerce' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'rt-ecommerce' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'rt-ecommerce' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'rt-ecommerce' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'rt-ecommerce' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
</article>