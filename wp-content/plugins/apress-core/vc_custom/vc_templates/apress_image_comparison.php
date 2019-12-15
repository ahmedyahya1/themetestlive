<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Comparison
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
extract(shortcode_atts(array(
  "image_url"						=> '',
  "image_2_url"						=> '',
  "image_comparison_orientation"	=> 'image_comparison_vertical',
  "image_comparison_separator"		=> '5',
  "class"							=> '',
),
$atts));

wp_enqueue_script('twentytwenty');
wp_enqueue_style('twentytwenty');

$uniqid = uniqid(rand());
$zolo_image_comparison_id = 'image_comparison_'.$uniqid;

if($image_comparison_orientation == 'image_comparison_vertical'){
	$image_orientation = 'orientation: "vertical",';
}else{
	$image_orientation = '';
}
$alt_tag = null;
$alt_tag_2 = null;

if(!empty($image_url)) {
		
	if(!preg_match('/^\d+$/',$image_url)){
			
		$image_url = $image_url;
	
	} else {

		$wp_img_alt_tag = get_post_meta( $image_url, '_wp_attachment_image_alt', true );
		if(!empty($wp_img_alt_tag)) $alt_tag = $wp_img_alt_tag;

		$image_src = wp_get_attachment_image_src($image_url, 'full');
		
		$image_url = $image_src[0];
	}
	
} else 
	$image_url = vc_asset_url( 'images/before.jpg' );

if(!empty($image_2_url)) {
		
	if(!preg_match('/^\d+$/',$image_2_url)){
			
		$image_2_url = $image_2_url;
	
	} else {
		
		$wp_img_alt_tag_2 = get_post_meta( $image_2_url, '_wp_attachment_image_alt', true );
		if(!empty($wp_img_alt_tag_2)) $alt_tag_2 = $wp_img_alt_tag_2;

		$image_src = wp_get_attachment_image_src($image_2_url, 'full');
		$image_2_url = $image_src[0];
	}
	
} else 
	$image_2_url = vc_asset_url( 'images/after.jpg' );

echo '<script type="text/javascript" charset="utf-8">

var j$ = jQuery;
j$.noConflict();
"use strict";
j$(window).load(function() {	
j$("#'.$zolo_image_comparison_id.'.twentytwenty-container").each(function(){
	var $that = j$(this);
	j$(this).imagesLoaded(function(){
		$that.twentytwenty({
			default_offset_pct: 0.'.$image_comparison_separator.',
			no_overlay: true,
			'.$image_orientation.'
			}
		);
	});
});
});
</script>';

echo "<div id='".$zolo_image_comparison_id."' class='twentytwenty-container ".$class."'>
  <img src='".$image_url."' alt='".$alt_tag."'>
  <img src='".$image_2_url."' alt='".$alt_tag_2."'>
</div>";
