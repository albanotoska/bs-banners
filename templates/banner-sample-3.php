<?php 
// Template for Sample 3
//BUILDING LINK
$color = null;
$fontsize = null;
$accentcolor = null;
$color2 = null;
$fontsize2 = null;
$accentcolor = null;
if ( class_exists( 'WPBakeryShortCode' ) ) {
$post = get_post();
if($url) {
$atts['link'] = vc_build_link($atts['url']);
$a_href = $atts['link']['url'];
$a_target = $atts['link']['target'];
}
if(isset($atts['title_color'])) {
$color = $atts['title_color'];
}
if(isset($atts['title_font'])) {
$fontsize = $atts['title_font'];
}
if(isset($atts['title2_color'])) {
$color2 = $atts['title2_color'];
}
if(isset($atts['title2_font'])) {
$fontsize2 = $atts['title2_font'];
}
if(isset($atts['accent_color'])) {
$accentcolor = $atts['accent_color'];
}
}
 ?>
<figure class="bunny-banner bunny-sample-3">  <img src="<?php  echo $image_src; ?>" alt="bunny-sample" class="<?php if( $checkbox =='true') {echo 'add_zoom';} ?>" />
  <figcaption>
    <h3 style="color:<?php echo $color; ?>;font-size: <?php echo $fontsize; ?>;"><?php echo $title; ?></h3>
   <h5 style="color:<?php echo $color2; ?>;font-size: <?php echo $fontsize2; ?>; background-color: <?php echo $accentcolor ?>"><?php echo $title2; ?></h5>
  </figcaption> <a <?php if($url) { ?> href="<?php if ( $post && preg_match( '/vc_row/', $post->post_content ) ) { echo $a_href; } else { echo $url; }  ?>"<?php }?> target="<?php echo $a_target; ?>"></a>
</figure>




