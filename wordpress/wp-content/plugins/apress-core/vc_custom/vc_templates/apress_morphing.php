<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'image'					=> '',
	'start_bg_color' 		=> '#0467e6',
	'end_bg_color' 			=> '#5295ea',
  	'desktop_height' 		=> '500',
	'small_desktop_height' 	=> '400',
	'tablet_height' 		=> '300',
	'mobile_height' 		=> '250',
	'opacity' 				=> '0.7',
	'z_index' 				=> '',
	'element_position' 		=> 'relative',
	'top' 					=> '',
	'right' 				=> '',
	'bottom' 				=> '',
	'left' 					=> '',
	'duration'				=> '8000',
	
	'class'					=> '',
	'data_animation'		=> 'No Animation',
	'data_delay'			=> '500',
), $atts ) );


	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	
	
	$imageSrc = wp_get_attachment_image_src($image, 'full');
	
	if($imageSrc != ''){
		$imageurl = $imageSrc[0];
	}else{
		$imageurl = '';
	}

$uniqid = uniqid(rand());
$morphing_id = 'apress_morphing_id_'.$uniqid;
$morphing_gradient = 'morphing_gradient_id_'.$uniqid;
$morphing_sundown_class = 'morphing_sundown_class_'.$uniqid;

$wrapperClass = 'apress_morphing_wrap';

$morphing_wrapper_style = array();

if ( ! empty( $z_index ) ) {
	$morphing_wrapper_style[] = 'z-index:'.$z_index.';';
}
if ( ! empty( $element_position ) ) {
	$morphing_wrapper_style[] = 'position:'.$element_position.';';
}
if ( ! empty( $top ) ) {
	$morphing_wrapper_style[] = 'top:'.$top.';';
}
if ( ! empty( $right ) ) {
	$morphing_wrapper_style[] = 'right:'.$right.';';
}
if ( ! empty( $left ) ) {
	$morphing_wrapper_style[] = 'left:'.$left.';';
}
if ( ! empty( $bottom ) ) {
	$morphing_wrapper_style[] = 'bottom:'.$bottom.';';
}
$morphing_wrapper_style = implode( ' ', $morphing_wrapper_style );


echo '<div id="'.$morphing_id.'" class="'.$wrapperClass.' '.$class.' '.$animatedclass.'" style=" '.$morphing_wrapper_style.'" data-duration="'.$duration.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" data-uniqid = "'.$uniqid.'" data-morphingduration = "'.$duration.'">';
echo '<div class="apress_morphing_box">';

echo '<div class="illustration">';
?>
<?php echo '<svg class="apress_morphing_svg_1" width="100%" height="100%" viewBox="0 0 1080 894" xml:space="preserve">
<linearGradient id="'.$morphing_gradient.'">
  <stop offset="0%" stop-color="'.$start_bg_color.'" />
  <stop offset="100%" stop-color="'.$end_bg_color.'" />
</linearGradient>		
<path id="apress_morphing_path'.$uniqid.'" class="'.$morphing_sundown_class.'" d="M1009.6,511.6c0,218.7-263.4,380.6-500.5,380.6S26.7,626.5,26.7,407.8S370.3,18.5,607.4,18.5S1009.6,292.9,1009.6,511.6z"/>

<clipPath id="apress_morphing_clippath'.$uniqid.'">
		<use xlink:href="#apress_morphing_path'.$uniqid.'"  style="overflow:visible;"/>
	</clipPath>
<g transform="matrix(1 0 0 1 1.862645e-09 0)" style="clip-path:url(#apress_morphing_clippath'.$uniqid.');"> 
  <image style="opacity:'.$opacity.';overflow:visible;" width="1500" height="1242" xlink:href="'.$imageurl.'"  transform="matrix(0.7198 0 0 0.7198 -2.581610e-02 -0.3868)"></image>
</g>

</svg>';

?>
</div>
</div>
</div>
<?php
$custom_css = '';
$custom_css .= '.'.$morphing_sundown_class.'{fill:url(#'.$morphing_gradient.')}';
$custom_css .= '#'.$morphing_id.'.apress_morphing_wrap .apress_morphing_box{height:'.$desktop_height.'px;}';
$custom_css .= '@media (max-width:1050px) {#'.$morphing_id.'.apress_morphing_wrap .apress_morphing_box{height:'.$small_desktop_height.'px;}}';
$custom_css .= '@media (max-width:800px) {#'.$morphing_id.'.apress_morphing_wrap .apress_morphing_box{height:'.$tablet_height.'px;}}';
$custom_css .= '@media (max-width:600px) {#'.$morphing_id.'.apress_morphing_wrap .apress_morphing_box{height:'.$mobile_height.'px;}}';
apcore_save_plugin_dyn_styles( $custom_css );
