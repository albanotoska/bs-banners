<?php 
// Template for Sample 7
//BUILDING LINK
if ( class_exists( 'WPBakeryShortCode' ) ) {
$post = get_post();
$atts['link'] = vc_build_link($atts['url']);
$a_href = $atts['link']['url'];
$a_target = $atts['link']['target'];
}
?>
<figure class="bunny-banner bunny-sample-7">
  <img src="<?php  echo $image_src; ?>" alt="bunny-sample" />
  <figcaption>
   <h3><?php echo $title; ?></h3>
    <p><?php echo $title2; ?></p>
  </figcaption>
    <a href="<?php if ( $post && preg_match( '/vc_row/', $post->post_content ) ) { echo $a_href; } else { echo $url; }  ?>" target="<?php echo $a_target; ?>"></a>
</figure>