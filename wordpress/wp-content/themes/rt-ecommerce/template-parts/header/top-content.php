<?php
/**
 * To fetch top bar content
 */
?>

<div class="content_top pt-2 pb-2">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<ul>
					<?php if( get_theme_mod( 'rt_ecommerce_call','' ) != '') { ?>
						<li><i class="fas fa-phone-volume"></i><span class="content_li pl-3"><?php echo esc_html( get_theme_mod('rt_ecommerce_call','') ); ?></span></li>
					<?php }  if( get_theme_mod( 'rt_ecommerce_email','' ) != '') {?>
						<li><i class="far fa-envelope-open"></i><span class="content_li pl-3"><?php echo esc_html( get_theme_mod('rt_ecommerce_email','') ); ?></span></li>
					<?php }  if( get_theme_mod( 'rt_ecommerce_location','' ) != '') {?>
						<li><i class="fas fa-map-marker-alt"></i><span class="content_li pl-3 pr-3"><?php echo esc_html( get_theme_mod('rt_ecommerce_location','') ); ?></li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-3">
				<div class="social_profile float-right">
					<?php if( get_theme_mod( 'rt_ecommerce_facebook','' ) != '') { ?>
						<a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f align-middle " aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_twitter','' ) != '') {?>
						<a class="twitter" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter align-middle" aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_instagram','' ) != '') {?>
						<a class="insta" href="" target="_blank"><i class="fab fa-instagram align-middle" aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_pinterest','' ) != '') {?>
						<a class="pintrest" href="https://pinterest.com/" target="_blank"><i class="fab fa-pinterest-p align-middle " aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_linkedin','' ) != '') {?>
						<a class="linkedin" href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in align-middle" aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_youtube','' ) != '') {?>
						<a class="linkedin" href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube align-middle" aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_tumbler','' ) != '') {?>
						<a class="tumbler" href="https://www.tumblr.com/" target="_blank"><i class="fab fa-tumblr align-middle" aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_gplus','' ) != '') {?>
						<a class="gplus" href="https://plus.google.com/" target="_blank"><i class="fab fa-google-plus-g align-middle" aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_vk','' ) != '') {?>
						<a class="flicker" href="https://www.flickr.com/" target="_blank"><i class="fab fa-flickr align-middle " aria-hidden="true"></i></a>
					<?php }  if( get_theme_mod( 'rt_ecommerce_vk','' ) != '') {?>
						<a class="vk" href="https://vk.com/" target="_blank"><i class="fab fa-vk align-middle " aria-hidden="true"></i></a>
					<?php }?>
                </div>
			</div>
		</div>
	</div>
</div>