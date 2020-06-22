<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * located in the inc/template-tags.php file.
 *
 * @package E-commerce Shop
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;',  'e-commerce-shop' ), esc_html (get_the_title()) );
                } else {
                    printf(
                        esc_html(
                           /* translators: 1: number of comments, 2: post title */
                           _nx( 
                               '%1$s thought on &ldquo;%2$s&rdquo;',
                               '%1$s thoughts on &ldquo;%2$s&rdquo;',
                               $comments_number,
                               'comments title',
                               'e-commerce-shop'
                            )
                        ),
                        esc_html (number_format_i18n( $comments_number ) ),
                        esc_html (get_the_title())
                    );
                }
            ?>
        </h2>
        <div class="pre">
            <?php the_comments_navigation(); ?>
        </div>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 42,
                ) );
            ?>
        </ol>

        <div class="nex">
            <?php the_comments_navigation(); ?>
        </div>

    <?php endif; // Check for have_comments(). ?>
    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'e-commerce-shop' ); ?></p>
    <?php endif; ?>

    <?php
        comment_form( array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
        ) );
    ?>
</div>