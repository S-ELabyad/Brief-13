<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section
 *
 * @package RT Ecommerce
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php /*Top content */
    get_template_part( 'template-parts/header/top-content' );
    
    // Site Header
    get_template_part( 'template-parts/header/site-header' ); 

    // Site Navigation
    get_template_part( 'template-parts/header/site-navigation' ); 
  
  ?>