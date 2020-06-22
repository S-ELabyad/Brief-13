<?php
/**
 * To fetch Site Navigation
 */
?>

<div id="header" class="menubar">
    <div class="menubox innermenubox">
      <div class="container">
        <div class="toggle-nav">
          <span></span>
        </div>
        <nav id="site-navigation" class="main-navigation">
          <?php 
            wp_nav_menu( array( 
              'theme_location' => 'primary',
              'container_class' => 'menu clearfix' ,
              'menu_class' => 'clearfix',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'fallback_cb' => 'rt_ecommerce_primary_menu_fallback',
            ) ); 
          ?>
        </nav>
      </div>
    </div>
    <div class="clearfix"></div>
</div>