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
        add_action( 'vc_before_init', array( $this, 'vc_infobox_mapping' ) );
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
                        '10'   => '10',
                        '11'   => '11',
                        '12'   => '12',
                        '13'   => '13',
                        '14'   => '14',
                        '15'   => '15',
                        '16'   => '16',
                        '17'   => '17',
                        '18'   => '18',
                        '19'   => '19',
                        '20'   => '20'
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
                            'value'     => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
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
                            'value'     => array('2', '3', '6', '7', '9', '11', '12', '14', '15', '16', '17', '18', '19', '20'),
                        ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Content',
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
                        'group' => 'Content',
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
                        'group' => 'Content',
                    ),                      
                    array(
					  'type' => 'checkbox',
					  'class' => '',
					  'heading' => __( 'Add Zoom', 'bs-banners-domain' ),
					  'param_name' => 'zoomimg',
					  'value' => array(
                                   'Zoom'=>'true'),
					  'std' => 'zoomed',
					  'description' => __( 'Add zoom on hover', 'bs-banners-domain' ),
					  'group' => 'Content'
					),

					array(
					  'type' => 'colorpicker',
					  'class' => '',
					  'heading' => __( 'Title Color', 'my-text-domain' ),
					  'param_name' => 'title_color',
					  'value' => '', 
					  'description' => __( 'Main Title Color', 'my-text-domain' ),
					  'dependency'    => array(
                            'element'   => 'style',
                            'value'     => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                        ),
					  'group' => 'Style'
					),

					array(
					  'type' => 'textfield',
					  'class' => '',
					  'heading' => __( 'Title Font Size', 'my-text-domain' ),
					  'param_name' => 'title_font',
					  'value' => '', 
					  'description' => __( 'Make sure to put the unit in the end. Example : 12px', 'my-text-domain' ),
					  'dependency'    => array(
                            'element'   => 'style',
                            'value'     => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20'),
                        ),
					  'group' => 'Style'
					),

					array(
					  'type' => 'colorpicker',
					  'class' => '',
					  'heading' => __( 'Title 2 Color', 'my-text-domain' ),
					  'param_name' => 'title2_color',
					  'value' => '', 
					  'dependency'    => array(
                            'element'   => 'style',
                            'value'     => array('2', '3', '6', '7', '9', '11', '12', '14', '15', '16', '17', '18', '19', '20'),
                        ),
					  'description' => __( 'Second Title Color', 'my-text-domain' ),
					  'group' => 'Style'
					),

					array(
					  'type' => 'textfield',
					  'class' => '',
					  'heading' => __( 'Second Font Size', 'my-text-domain' ),
					  'param_name' => 'title2_font',
					  'value' => '', 
					  'dependency'    => array(
                            'element'   => 'style',
                            'value'     => array('2', '3', '6', '7', '9', '11', '12', '14', '15', '16', '17', '18', '19', '20'),
                        ),
					  'description' => __( 'Make sure to put the unit in the end. Example : 12px', 'my-text-domain' ),
					  'group' => 'Style'
					),

					array(
					  'type' => 'colorpicker',
					  'class' => '',
					  'heading' => __( 'Accent Color', 'my-text-domain' ),
					  'param_name' => 'accent_color',
					  'value' => '', 
					  'description' => __( 'Other Accents Color', 'my-text-domain' ),
					  'group' => 'Style'
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
