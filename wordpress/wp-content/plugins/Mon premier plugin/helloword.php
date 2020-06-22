<?php
/**
 * @package Monpremierplugin
 * @version 1.0.0
 */
/*
Plugin Name: Mon premier plugin !
Plugin URI: https://salouaelabyad.com
Description: un super plugin pour pour but de personnaliser le footer de mes pages
Author: saloua elabyad
Version: 1.0.0
Author URI: https://salouaelabyad.com
*/

// add_action('wp_footer', 'say_hello');
// add_filter('default_content', 'contenu_par_defaut');
// add_filter('the_content' , 'insererApresContenu');
// add_action('admin_menu','test_plugin_setup_menu');


if(!defined('ABSPATH'))
{
    exit;
}

?>
<?php
add_action('admin_menu','my_admin_menu');
////////////////////////////////////////////////////////////

// déclenchons une action dans WordPress
// function test_plugin_setup_menu(){
// // chercher les informations nécessaires pour notre menu
// //     La première option ‘Test Plugin Page‘ est le titre de notre page d’options.

// // Le deuxième paramètre ‘Test Plugin‘ est l’étiquette de notre panneau d’administration.

// // Le troisième paramètre détermine quels utilisateurs peuvent voir l’option 

// // ‘test-plugin‘ est le « slug » qui sert à identifier le menu.

// //  ‘test_init‘ est le nom de la fonction que nous appelons lorsque l’option est sélectionnée. Cela nous permet d’ajouter du code à la sortie HTML dans notre page. Dans ce cas, nous écrivons simplement «Salut tous le monde!».
//       add_menu_page('Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
// }
// function test_init(){
//       echo"<h1>Salut tous le monde!</h1>";
// }

function my_admin_menu(){
  //add_menu_page('Page title', 'Top-level menu title', 'manage_options', 'my-top-level-handle', 'my_magic_function');
            add_menu_page('Footer Text title', 'Footer Settings', 'manage_options', 'footer_setting_page', 'mt_settings_page' );
            add_submenu_page('footer_setting_page','Page title','Sub-menu title','manage_options','child-submenu-handle','my_magic_function');

      }
function footer_text_admin_page(){
     
      echo 'copyrghit';
}   
function mt_settings_page(){
      echo "<h2>" .__('Footer Settings Configurations','menu-test' ) . "</h2>";
      include_once('footer_settings_page.php');
}
      // function test_init(){
      //       echo"<h1>Salut tous le monde!</h1>";
      // }
?>

<?php
add_action('wp_footer', 'your_function');

function your_function(){
      echo "<div style='color: white;text-align: center;font-size: 17px; background-color: black; width: 100%; height: 39px;'>".get_option('footer_text')."</div>";
}
?>
 