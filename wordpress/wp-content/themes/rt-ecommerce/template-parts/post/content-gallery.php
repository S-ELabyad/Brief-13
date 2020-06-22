<?php
/**
 * The template part for displaying slider
 *
 * @package RT Ecommerce 
 * @subpackage rt_ecommerce
 * @since RT Ecommerce 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row outer_post">
    	<div class="post_thumb col-md-5"> 
  	<?php
  		if ( ! is_single() ) {

  			// If not a single post, highlight the gallery.
  			if ( get_post_gallery() ) {
  				echo '<div class="entry-gallery">';
  					echo ( get_post_gallery() );
  				echo '</div>';
  			};

  		};
  	?>
    	</div>
    	<div class="new-text col-md-7">
        	<div class="post_content">
            	<h4><?php the_title();?></h4>
            	<div class="metabox">
                	<span class="entry-date"><?php the_date(); ?></span>
                	<span class="entry-author"><?php the_author(); ?></span>
                	<span class="entry-comments"> <?php comments_number( __('no responses','rt-ecommerce'), __('one response','rt-ecommerce'), __('% responses','rt-ecommerce') ); ?></span>
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