<?php 
// Template for Sample 10
//BUILDING LINK
if ( class_exists( 'WPBakeryShortCode' ) ) {
$post = get_post();
$atts['link'] = vc_build_link($atts['url']);
$a_href = $atts['link']['url'];
$a_target = $atts['link']['target'];
}
?>
<figure class="bunny-banner bunny-sample-10">
  <img src="<?php  echo $image_src; ?>" alt="bunny-sample" />
  <figcaption>
    <div><i class="fa fa-search-plus"></i></div>
  </figcaption>
    <a href="<?php if ( $post && preg_match( '/vc_row/', $post->post_content ) ) { echo $a_href; } else { echo $url; }  ?>" target="<?php echo $a_target; ?>"></a>
</figure>