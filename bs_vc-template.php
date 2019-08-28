<?php 
/*
Element Description: BS BANNERS VISUAL COMPOSER ELEMENT
*/
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_bannerscontainer extends WPBakeryShortCodesContainer {
  }
}
// Element Class 
if ( class_exists( 'WPBakeryShortCode' ) ) {
class bs_banner_vc_element extends WPBakeryShortCode {
    // Element Init
    
    function __construct() {
        add_action( 'init', array( $this, 'vc_infobox_mapping' ) );
        add_shortcode( 'bs_banner', 'bs_banner_shortcode' );
    }
     
    // Element Mapping
    public function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        vc_map( 
            array(
                'name' => __('BS Banners', 'bs-banners-domain'),
                'base' => 'bs_banner',
                'class' => 'bunny-banners-shortcodes-container',
                'description' => __('Another simple VC Banner', 'bs-banners-domain'), 
                'category' => __('BS BANNERS', 'bs-banners-domain'),   
                'icon' => plugins_url('/images/icon.png',__FILE__ ),            
                'params' => array(   
                      
                    array(
                        'type'        => 'dropdown',
                        'heading'     => __('Choose your style'),
                        'param_name'  => 'style',
                        'admin_label' => true,
                        'value'       => array(
                        '1'   => '1',
                        '2'   => '2',
                        '3' => '3',
                        '4'  => '4',
                        '5'   => '5',
                        '6'   => '6',
                        '7' => '7',
                        '8'  => '8',
                        '9'   => '9',
                        '10'   => '10'
                        ),
                        'std' => '1',
                        'group' => 'Banner Type',
                    ), 

      
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'bunny-title-class',
                        'heading' => __( 'Title', 'bs-banners-domain' ),
                        'param_name' => 'title',
                        'value' => __( 'Lorem Ipsum', 'bs-banners-domain' ),
                        'dependency'    => array(
                            'element'   => 'style',
                            'value'     => array('1', '2', '3', '4', '5', '6', '7', '8', '9'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Styling',
                    ),  

                    array(
                        'type' => 'textfield',
                        'holder' => 'h5',
                        'class' => 'bunny-title-class',
                        'heading' => __( 'Title 2', 'bs-banners-domain' ),
                        'param_name' => 'title2',
                        'value' => __( 'Lorem Ipsum', 'bs-banners-domain' ),
                        'dependency'    => array(
                            'element'   => 'style',
                            'value'     => array('2', '3', '6', '7', '9'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Styling',
                    ),
                     
                    array(
                        'type' => 'vc_link',
                        'class' => 'link-class',
                        'heading' => __( 'Link', 'bs-banners-domain' ),
                        'param_name' => 'url',
                        'value' => __( 'Default value', 'bs-banners-domain' ),
                        'description' => __( 'Link of the banner', 'bs-banners-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Styling',
                    ), 
                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        'class' => 'bunny-image-class',
                        'heading' => __( 'Image', 'bs-banners-domain' ),
                        'param_name' => 'img',
                        'value' => __( 'Default value', 'bs-banners-domain' ),
                        'description' => __( 'Image of the banner', 'bs-banners-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Styling',
                    ),                      
                        
                ),
            )
        );                                                                                                                                                                                                        
    }
     
}
}
 
// Element Class Init
new bs_banner_vc_element()
?>
