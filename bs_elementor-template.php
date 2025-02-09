<?php
/**
 * Elementor BS Banner Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BS_Banner_Elementor_Widget extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'BS Banners';
    }

    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'BS Banners', 'bs-banners' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-desktop';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'bs-banners' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'banner_style',
            [
                'label' => __( 'Banner Style', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( '1', 'bs-banners' ),
                    '2' => __( '2', 'bs-banners' ),
                    '3' => __( '3', 'bs-banners' ),
                    '4' => __( '4', 'bs-banners' ),
                    '5' => __( '5', 'bs-banners' ),
                    '6'  => __( '6', 'bs-banners' ),
                    '7' => __( '7', 'bs-banners' ),
                    '8' => __( '8', 'bs-banners' ),
                    '9' => __( '9', 'bs-banners' ),
                    '10' => __( '10', 'bs-banners' ),
                    '11' => __( '11', 'bs-banners' ),
                    '12' => __( '12', 'bs-banners' ),
                    '13' => __( '13', 'bs-banners' ),
                    '14' => __( '14', 'bs-banners' ),
                    '15' => __( '15', 'bs-banners' ),
                    '16' => __( '16', 'bs-banners' ),
                    '17' => __( '17', 'bs-banners' ),
                    '18' => __( '18', 'bs-banners' ),
                    '19' => __( '19', 'bs-banners' ),
                    '20' => __( '20', 'bs-banners' ),
                ],
                
            ]
        );
            
        

        $this->add_control(
            'title1_banner',
            [
                'label' => __( 'Title', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Default title', 'bs-banners' ),
                'placeholder' => __( 'Type your title here', 'bs-banners' ),
            
            'conditions' => [
                'terms' => [
                    [
                        'name' => 'banner_style',
                        'operator' => '!in',
                        'value' => [
                            '10'
                            ],
                        ],
                    ],
                ], 
            ]
        );

        $this->add_control(
            'title2_banner',
            [
                'label' => __( 'Subtitle', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Default description', 'bs-banners' ),
                'placeholder' => __( 'Type your description here', 'bs-banners' ),
                'conditions' => [
            'terms' => [
                [
                    'name' => 'banner_style',
                    'operator' => '!in',
                    'value' => [
                        '1','4', '5', '8', '10', '13'
                    ],
                ],
            ],
        ],
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => __( 'Link', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'bs-banners' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        ); 

        $this->add_control(
            'add_zoom',
            [
                'label' => __( 'Add Zoom Effect on Hover', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => __( 'Add Zoom', 'bs-banners' ),                
             
        ]
        );  
        
        $this->end_controls_section();

       $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style Section', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
       $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'bs-banners' ),
                'selector' => '{{WRAPPER}} h3, {{WRAPPER}} h2', 
            ]
        );

    $this->start_controls_tabs( 'tabs_title_style' );

    $this->start_controls_tab(
      'tab_title_normal',
      [
        'label' => __( 'Normal', 'elementor' ),
      ]
    );

    $this->add_control(
      'title_color',
            [
                'label' => __( 'Title Color', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}  h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  h3' => 'color: {{VALUE}}',
                ],
            ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'tab_title_hover',
      [
        'label' => __( 'Hover', 'elementor' ),
      ]
    );

    $this->add_control(
            'title_color_hover',
            [
                'label' => __( 'Title Color Hover', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover  h2' => 'color: {{VALUE}}',
                    '{{WRAPPER}}:hover  h3' => 'color: {{VALUE}}',
                ],
            ]
        );

    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_control(
      'hr_title',
      [
        'type' => \Elementor\Controls_Manager::DIVIDER,
      ]
    );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __( 'Subtitle Typography', 'bs-banners' ),
                'selector' => '{{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h3>span, {{WRAPPER}} p, {{WRAPPER}} .white', 
            ]
        );

        $this->start_controls_tabs( 'tabs_subtitle_style' );

    $this->start_controls_tab(
      'tab_subtitle_normal',
      [
        'label' => __( 'Normal', 'elementor' ),
      ]
    );

    $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle Color', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}  h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  h3 > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  p' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .white' => 'color: {{VALUE}}',
                ],
            ]
        );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'tab_subtitle_hover',
      [
        'label' => __( 'Hover', 'elementor' ),
      ]
    );

    $this->add_control(
            'subtitle_color_hover',
            [
                'label' => __( 'Subtitle Color Hover', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover  h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}}:hover  h5' => 'color: {{VALUE}}',
                    '{{WRAPPER}}:hover  h3 > span' => 'color: {{VALUE}}',
                    '{{WRAPPER}}:hover  p' => 'color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .white' => 'color: {{VALUE}}',
                ],
            ]
        );

        
    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->add_control(
      'hr_subtitle',
      [
        'type' => \Elementor\Controls_Manager::DIVIDER,
      ]
    );

    $this->start_controls_tabs( 'tabs_accent_style' );

    $this->start_controls_tab(
      'tab_accent_normal',
      [
        'label' => __( 'Normal', 'elementor' ),
      ]
    );

    $this->add_control(
            'accent_color',
            [
                'label' => __( 'Accent Color', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .bunny-banner.bunny-sample-1 h3' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-banner.bunny-sample-3 h5' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-6:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-7:before, .bunny-sample-7:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-7 figcaption:before, .bunny-sample-7 figcaption:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-8' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-9:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-13:after' => 'border-color: transparent transparent transparent {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-13:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  figure.bunny-sample-16:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  figure.bunny-sample-18 h4' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-17 figcaption' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}  .bunny-sample-17:after' => 'border-color: {{VALUE}} transparent transparent transparent',
                    '{{WRAPPER}}  .bunny-sample-17 figcaption:before' => 'border-color: transparent {{VALUE}} transparent transparent',
                    
                ],
            ]
        );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'tab_accent_hover',
      [
        'label' => __( 'Hover', 'elementor' ),
      ]
    );

    $this->add_control(
            'accent_color_hover',
            [
                'label' => __( 'Accent Color Hover', 'bs-banners' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover  .bunny-banner.bunny-sample-1 h3' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-banner.bunny-sample-3 h5' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-6:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-7:before, .bunny-sample-7:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-7 figcaption:before, .bunny-sample-7 figcaption:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-8' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-9:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-13:after' => 'border-color: transparent transparent transparent {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-13:before' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  figure.bunny-sample-16:after' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  figure.bunny-sample-18 h4' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-17 figcaption' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}}:hover  .bunny-sample-17:after' => 'border-color: {{VALUE}} transparent transparent transparent',
                    '{{WRAPPER}}:hover  .bunny-sample-17 figcaption:before' => 'border-color: transparent {{VALUE}} transparent transparent',
                    
                ],
            ]
        );

    $this->end_controls_tab();

    $this->end_controls_tabs();

        $this->end_controls_section();

    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();
        //STYLE
        $style = $settings['banner_style'];

        //TITLE
        $title = $settings['title1_banner'];

        //TITLE 2 or Description
        $title2 = $settings['title2_banner'];

        //URL
        $target = $settings['url']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['url']['nofollow'] ? ' rel="nofollow"' : '';
        $url = $settings['url']['url'];

        //IMAGE
        $image = $settings['image']['url'];

        //IMAGE ZOOM


        //BANNER CONTENT 
        if ( $style!='21') { ?>
        <figure class="bunny-banner bunny-sample-<?php echo $style; ?>">
          <img src="<?php  echo $image; ?>" alt="bunny-sample" <?php if('yes'===$settings['add_zoom']) {?>class="add_zoom" <?php } ?>  />
          <?php if ($style!='18') { ?>
          <figcaption>
            <?php if ($style=='16') { ?>
                <h4><?php echo $title2; ?></h4> <?php
            }
            if ($style !='10' && $style !='12') { ?>
            <h3><?php echo $title; if($style=='6' || $style=='9' || $style=='15') {?><span><?php echo $title2; ?></span>
            <?php } } ?> </h3> <?php if($style=="2" || $style=="3") {?>
            <h5><?php echo $title2; ?></h5> <?php } if ($style=='7' || $style=='11' || $style=='17' || $style=='19' || $style=='20') { ?>
                <p><?php echo $title2; ?></p>
           <?php } if ($style=='10') { ?>
            <div><i class="fa fa-search-plus"></i></div>
        <?php }
            if ($style=="12") { ?>
                <div><h2><?php echo $title; ?></h2></div>
                <div><p><?php echo $title2; ?></p></div>
            <?php } 
            if ($style=="14") { ?>
                <div class="left">
                  <h3><?php echo $title; ?></h3>
                </div>
                <div class="right">
                  <h3 class="white"><?php echo $title2; ?></h3>
                </div>
            <?php } ?>
          </figcaption> <?php } if ($style=='14') {
            echo '<div class="center"><i class="fa fa-repeat"></i></div>';
          } ?>
          <?php if ($style=='17') {
            echo '<i class="fa fa-link"></i>';
          } 
          if ($style=='18') { ?>
            <div class="title">
                <div>
                  <h2><?php echo $title; ?></h2>
                  <h4><?php echo $title2; ?></h4>
                </div>
              </div> <?php
          } ?>
          <a href="<?php echo $url;?>" <?php echo $target; ?> <?php echo $nofollow; ?>></a>
        </figure>
        <?php }
        

    }

}
add_action( 'elementor/widgets/widgets_registered', function() {
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BS_Banner_Elementor_Widget() );
} );