<?php 
// Template for Sample 14
//BUILDING LINK
if ( class_exists( 'WPBakeryShortCode' ) ) {
$post = get_post();
$atts['link'] = vc_build_link($atts['url']);
$a_href = $atts['link']['url'];
$a_target = $atts['link']['target'];
}
?>
<figure class="bunny-banner bunny-sample-14">
  <img src="<?php  echo $image_src; ?>" alt="bunny-sample" />
  <figcaption>
  	<div class="left">
      <h3><?php echo $title; ?></h3>
    </div>
   	<div class="right">
      <h3 class="white"><?php echo $title2; ?></h3>
    </div>
  </figcaption> 
  <div class="center"><i class="fa fa-repeat"></i></div>
   <a href="<?php if ( $post && preg_match( '/vc_row/', $post->post_content ) ) { echo $a_href; } else { echo $url; }  ?>" target="<?php echo $a_target; ?>"></a>
</figure>