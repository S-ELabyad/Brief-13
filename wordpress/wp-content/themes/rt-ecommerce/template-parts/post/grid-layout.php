<?php
/**
 * The template part for displaying slider
 *
 * @package RT Ecommerce
 * @subpackage rt-ecommerce
 * @since RT Ecommerce 1.0
 */
?>
<article class="col-md-4 col-sm-4">
	<div class="row outer_post">
  	<div class="post_thumb ">
        <?php the_post_thumbnail();  ?>
  	</div>
    <div class="new-text">
    	<div class="post_content">
        <h4><?php the_title();?></h4>
        <div class="metabox">
        	<span class="entry-date"><?php the_date(); ?></span>
        	<span class="entry-author"><?php the_author(); ?></span>
        	<span class="entry-comments"> <?php comments_number( __('no responses','rt-ecommerce'), __('one response','rt-ecommerce'), __('% responses','rt-ecommerce') ); ?> </span>
        </div>
      	<hr class="big">
      	<hr class="small">
      	<p><?php the_excerpt(); ?></p>
      	<a href="<?php echo esc_url( get_permalink() );?>" class="btn_read_more" title="<?php esc_attr_e( 'Read More', 'rt-ecommerce' ); ?>"><?php esc_html_e('Read More','rt-ecommerce'); ?></a>
    	</div>
    </div>
    <div class="clearfix"></div> 
  </div>
</article>