<?php 
/*-----------------------------------------------------------------------------------*/
/* Device Slider
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'device_image'				=> '',
	'device_image_bring_to_front'=> 'no',
	'images'					=> '',
	'img_size' 					=> 'full',
	'slider_position_top' 	=> '7.3%',
	'slider_position_right' 	=> '10.4%',
	'slider_position_bottom' 	=> '11.3%',
	'slider_position_left' 		=> '10.8%',
	
    'slick_autoplay' 			=> 'no',
    'slick_autoplay_duration'	=> '2000',
	'slick_hide_arrow_navigation'=> 'yes',
	'arrows_style'				=> 'arrows_style1',
	'arrows_color'				=> '#ffffff',
	'arrows_bg'					=> '#549ffc',
	'slick_bullet_navigation' 	=> 'yes',
    'bullet_navigation_style' 	=> '',
	'bullet_bg'					=> '#000000',
	'z_index' 					=> '',
	'element_position' 			=> 'relative',
	'top' 						=> '',
	'right' 					=> '',
	'bottom' 					=> '',
	'left' 						=> '',
	'slider_border_radius' 		=> '0',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
), $atts ) );
			
//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

$uniqid = uniqid(rand());
$zolo_element_uniqid = 'zolo_element_id'.$uniqid;
	
$slick_autoplay = ($slick_autoplay == 'yes')? 'true' : 'false';
$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
$slick_bullet_navigation = ($slick_bullet_navigation == 'yes')? 'true' : 'false';

if($slick_bullet_navigation != 'false'){$wrap_class[] = 'slick_bullet_active';}

$wrap_class[] = $bullet_navigation_style;
$wrap_class[] = $arrows_style;

$wrap_class = implode( ' ', $wrap_class );

// settings
$options_array = array(
	'class'						=> 'zolo_slick_slider zolo_device_slider_wrap '.$class.' '.$animatedclass,
	'data-dots'					=> $slick_bullet_navigation,
	'data-infinite'				=> true,
	'data-speed'				=> 900,
	'data-desktop-show'			=> 1,
	'data-small-desktop-show'	=> 1,
	'data-tablet-show'			=> 1,
	'data-slidestoscroll'		=> 1,

	'data-autoplay'				=> $slick_autoplay,
	'data-autoplay-speed'		=> $slick_autoplay_duration,
	'data-arrows'				=> $slick_hide_arrow_navigation,
	'data-focusonselect'		=> false,
	
	'data-animation'			=> $data_animation,
	'data-delay'				=> $data_delay,
	
);
?>


<?php
$default_src = vc_asset_url( 'vc/no_image.png' );
$gallery_images = '';
$images = explode( ',', $images );

foreach ( $images as $i => $image ) {
	
	if ( $image > 0 ) {
		$img = wpb_getImageBySize( array(
			'attach_id' => $image,
			'thumb_size' => $img_size,
		) );
		$thumbnail = $img['thumbnail'];
		$large_img_src = $img['p_img_large'][0];
		
	} else {
		$large_img_src = $default_src;
		$thumbnail = '<img src="' . $default_src . '"/>';
	}
	
	$gallery_images .= '<li><div>'. $thumbnail .'</div></li>';
}

$device_img = wp_get_attachment_image_src($device_image,'full');
$deviceimg = $device_img[0];

if($device_image_bring_to_front == 'yes'){
		$device_image_bring_to_front = 'device_image_bring_to_front';
	}else{
		$device_image_bring_to_front = '';
	}

$device_slider_wrapper_style = array();

if ( ! empty( $z_index ) ) {
	$device_slider_wrapper_style[] = 'z-index:'.$z_index.';';
}
if ( ! empty( $element_position ) ) {
	$device_slider_wrapper_style[] = 'position:'.$element_position.';';
}
if ( ! empty( $top ) ) {
	$device_slider_wrapper_style[] = 'top:'.$top.';';
}
if ( ! empty( $right ) ) {
	$device_slider_wrapper_style[] = 'right:'.$right.';';
}
if ( ! empty( $left ) ) {
	$device_slider_wrapper_style[] = 'left:'.$left.';';
}
if ( ! empty( $bottom ) ) {
	$device_slider_wrapper_style[] = 'bottom:'.$bottom.';';
}
$device_slider_wrapper_style = implode( ' ', $device_slider_wrapper_style );

?>	

<?php
$output = '<div id="'.$zolo_element_uniqid.'_wrap" '.array_to_data( $options_array ).'><div class="zolo_device_slider_content_area" style=" '.$device_slider_wrapper_style.'">';

if($deviceimg != ''){
$output .= '<img class="zolo_deviceimg '.$device_image_bring_to_front.'" src="'.$deviceimg.'" alt="device"/>';
}else{
$output .= '<img class="zolo_deviceimg '.$device_image_bring_to_front.'" src="'.APRESS_EXTENSIONS_PLUGIN_URL. 'vc_custom/assets/images/mockup1.png" alt="device"/>';
}

$output .= '<div class="zolo_device_slider_content">';
$output .= '<div class="zolo_device_slider_content_inner">';
$output .= '<div id="'.$zolo_element_uniqid.'" class="zolo_image_slider zolo_device_slider '.$wrap_class.' '.$class.'">';

$output .= '<ul class="zolo_slick_slider_holder image_slider_holder">'.$gallery_images.'</ul>';

$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div></div>';

echo $output;

//CSS
$shortcode_css = '';
$shortcode_css .= '#'.$zolo_element_uniqid.'_wrap.zolo_device_slider_wrap .zolo_device_slider_content{ top:'.$slider_position_top.'; right:'.$slider_position_right.'; bottom:'.$slider_position_bottom.'; left:'.$slider_position_left.'; -moz-border-radius:'.$slider_border_radius.'px; -webkit-border-radius:'.$slider_border_radius.'px; -ms-border-radius:'.$slider_border_radius.'px; border-radius:'.$slider_border_radius.'px; overflow:hidden;}';
$shortcode_css .= '#'.$zolo_element_uniqid.'_wrap.zolo_device_slider_wrap .zolo_device_slider_content{ top:'.$slider_position_top.'; right:'.$slider_position_right.'; bottom:'.$slider_position_bottom.'; left:'.$slider_position_left.'; -moz-border-radius:'.$slider_border_radius.'px; -webkit-border-radius:'.$slider_border_radius.'px; -ms-border-radius:'.$slider_border_radius.'px; border-radius:'.$slider_border_radius.'px; overflow:hidden;}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider{ width:100%; float:left;}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider .slick-arrow{ color:'.$arrows_color.'}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider .slick-arrow:after{ background:'.$arrows_color.'}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider.arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider.arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider .slick-arrow{ background:'.$arrows_bg.'}';
}

$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.';}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider ul.slick-dots li button::after{box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$shortcode_css .= '#'.$zolo_element_uniqid.'.zolo_image_slider.dots_style3 ul.slick-dots li button::after{ background:'.$bullet_bg.';}';
apcore_save_plugin_dyn_styles( $shortcode_css );