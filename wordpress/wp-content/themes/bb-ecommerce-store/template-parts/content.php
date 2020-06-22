<?php
/**
 * The template part for displaying slider
 *
 * @package BB Ecommerce Store 
 * @subpackage bb_ecommerce_store
 * @since Ecommerce Store 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <h2 class="ecomercepost-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php esc_html(the_title());?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h2>
  <div class="metabox">
    <?php if( get_theme_mod( 'bb_ecommerce_store_date_hide',true) != '') { ?>
      <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
    <?php } ?>
    <?php if( get_theme_mod( 'bb_ecommerce_store_author_hide',true) != '') { ?>
      <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?></a></span>
    <?php } ?>
    <?php if( get_theme_mod( 'bb_ecommerce_store_comment_hide',true) != '') { ?>
      <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'bb-ecommerce-store'), __('0 Comments', 'bb-ecommerce-store'), __('% Comments', 'bb-ecommerce-store') ); ?> </span>
    <?php } ?>
  </div>
  <div class="box-image">
    <?php 
      if(has_post_thumbnail()) { 
        the_post_thumbnail(); 
      }
    ?>	
  </div>
  <div class="new-text">
    <?php if(get_theme_mod('bb_ecommerce_store_blog_post_description_option') == 'Full Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if(get_theme_mod('bb_ecommerce_store_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_ecommerce_store_string_limit_words( $excerpt, esc_attr(get_theme_mod('bb_ecommerce_store_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('bb_ecommerce_store_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('bb_ecommerce_store_button_text','READ MORE') != ''){ ?>
      <div class="read-btn">
        <a href="<?php esc_url(the_permalink());?>" class="blogbutton-small" title="<?php esc_attr_e( 'READ MORE', 'bb-ecommerce-store' ); ?>"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('bb_ecommerce_store_button_text','READ MORE'));?></span></a>
      </div>
    <?php }?>
  </div>
  <div class="clearfix"></div>
</article>