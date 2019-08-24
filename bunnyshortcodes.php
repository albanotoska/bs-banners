<?php
/**
 * Plugin Name: BS Banners
 * Description: Different banner style shortcodes, with awesome effects. Compatible with VisualComposer and wordpress editor. Just add shortcode [bunnyshortcode style="" title="" title2="" url="" img=""], or simply add the element via Visual Composer.
 * Plugin URI: https://albanotoska.com/banner-plugin/
 * Version: 1.0
 * Author: Albano Toska
 * Author URI: http://www.albanotoska.com
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */
if ( ! defined( 'ABSPATH' ) ) exit;
/* CREATE SHORTCODE BASED ON STYLES */
function bs_banner_shortcode( $atts ) {
  ob_start();
    extract( shortcode_atts(
               array(
                       'style' => '1',
                       'title' => 'Lorem Ipsum',
                       'title2' => 'Dolor sit amet',
                       'url' => '',
                       'img' => ''
               ),
               $atts
       ));
    $image_src = $img;
     if (is_numeric($img)) {
            $image_src = wp_get_attachment_url($img);
        }
        if($style=='1') {
        include('templates/banner-sample-1.php');
        }
        if($style=='2') {
        include('templates/banner-sample-2.php');
        }
        if($style=='3') {
        include('templates/banner-sample-3.php');
        }
        if($style=='4') {
        include('templates/banner-sample-4.php');
        }
        if($style=='5') {
        include('templates/banner-sample-5.php');
        }
        if($style=='6') {
        include('templates/banner-sample-6.php');
        }
        if($style=='7') {
        include('templates/banner-sample-7.php');
        }
        if($style=='8') {
        include('templates/banner-sample-8.php');
        }
        if($style=='9') {
        include('templates/banner-sample-9.php');
        }
        if($style=='10') {
        include('templates/banner-sample-10.php');
        }
      return ob_get_clean();
    }
add_shortcode( 'bs_banner', 'bs_banner_shortcode' );

/******* TinyMCE Interface Registration *******/
 // init process for registering our button
 add_action('init', 'bs_banner_TinyMCE_registration');
 function bs_banner_TinyMCE_registration() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "bs_banner_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'bs_banner_shortcodeonTINYMCE');
}

//This callback registers our plug-in
function bs_banner_register_tinymce_plugin($plugin_array) {
    $plugin_array['bs_banner_shortcodebtn'] = plugins_url('js/main.js',__FILE__ );
    return $plugin_array;
}

//This callback adds our button to the toolbar
function bs_banner_shortcodeonTINYMCE($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "bs_banner_shortcodebtn";
    return $buttons;
}

/* VISUAL COMPOSER COMPATIBILITY */
// Before VC Init
add_action( 'vc_before_init', 'bs_vcbanner_before_init_actions' );
 
function bs_vcbanner_before_init_actions() {
    // Require new custom Element
    require_once('bs_vc-template.php'); 
     
}

/* VISUAL COMPOSER ELEMENT STYLING */
add_action('admin_head', 'bs_vcbanner_element_style');

function bs_vcbanner_element_style() {
  echo '<style>
    .bunny-image-class {
      width: 80px;
}
.bunny-banners-shortcodes-container {
  border: 2px solid #d2d1d1;
} 
.bunny-banners-shortcodes-container h4.wpb_element_title {
    display:grid;
    font-size: 16px;
    letter-spacing: 2px;
    margin-bottom:15px !important;
}
.bunny-banners-shortcodes-container h3, .bunny-banners-shortcodes-container h5, .bunny-banners-shortcodes-container p {
  margin:0px;
}
  </style>';
}

add_action('wp_enqueue_scripts', 'bs_banner_shortcode_scripts');
function bs_banner_shortcode_scripts() {
	//CSS LOADING
    wp_register_style('bs_banner_shortcode_style', plugins_url('css/style.css',__FILE__ ));
    wp_enqueue_style('bs_banner_shortcode_style');

    //JS & JQUERY LOADING
    wp_register_script( 'bs_banner_shortcode_jsscripts', plugins_url('js/main.js',__FILE__ ));
    wp_enqueue_script('bs_banner_shortcode_jsscripts');
    /* FONT AWESOME */
     wp_register_style( 'bs_banner_shortcode_fontawesome_script', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bs_banner_shortcode_fontawesome_script');
}