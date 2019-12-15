<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * @var $centered_text
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = $centered_text = $apress_parallax_type = $apress_parallax_speed = $apress_parallax_directions = $apress_parallax_image_url = $column_custom_position = $position_top = $position_bottom = $position_left = $position_right = $apress_column_overlay_color = $apress_column_overlay_hover_color = $apress_column_hover_effect = $apress_column_font_color = $column_shadow = $column_shadow_h = $box_swing = $apress_zindex = $datadepth = '';

$apress_choose_parallax_style = $column_move_x = $column_move_y = $column_invert_x = $column_invert_y = $column_limit_x = $column_limit_y = $column_scalar_x = $column_scalar_y = $column_friction_x = $column_friction_y = $apress_parallax_speed_bg = $apress_parallax_directions_bg = $link_start = $link_end = $apress_column_link = $animation_type = $clipping_animation_type = $clipping_color = $data_delay = '';



$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script('zt-column-parallax-hover');
wp_enqueue_script('zt-column-parallax');
wp_enqueue_script('tilt.jquery.min');
wp_enqueue_script( 'wpb_composer_front_js' );


$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$el_class = $this->getExtraClass($el_class);
if($centered_text == 'true') $el_class .= ' centered-text';

$css_classes = array(
	$el_class . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}


$wrapper_attributes = array();
	
	if($apress_parallax_type == 'background'){
	
			$wrapper_attributes[] = 'data-paroller-type="' . esc_attr( $apress_parallax_type ) . '"'; // parallax type

		if(! empty( $apress_parallax_speed_bg )){
			$wrapper_attributes[] = 'data-paroller-factor="' . esc_attr( $apress_parallax_speed_bg/10 ) . '"'; // parallax speed
		}
		if(! empty( $apress_parallax_directions_bg )){
			$wrapper_attributes[] = 'data-paroller-direction="' . esc_attr( $apress_parallax_directions_bg ) . '"'; // parallax direction
		}
	}

if($apress_parallax_type == 'foreground'){
	if($apress_choose_parallax_style == 'on_scroll_parallax'){
	if($apress_parallax_type != 'none'){
		$wrapper_attributes[] = 'data-paroller-type="' . esc_attr( $apress_parallax_type ) . '"'; // parallax type
	}
	if(! empty( $apress_parallax_speed )){
		$wrapper_attributes[] = 'data-paroller-factor="' . esc_attr( $apress_parallax_speed/10 ) . '"'; // parallax speed
	}
	if(! empty( $apress_parallax_directions )){
		$wrapper_attributes[] = 'data-paroller-direction="' . esc_attr( $apress_parallax_directions ) . '"'; // parallax direction
	}
}
}

$image_src = wp_get_attachment_image_src($apress_parallax_image_url, 'full');
$apress_parallax_image_url = $image_src[0];

if($apress_parallax_type == 'background'){
	$wrapper_attributes[] = 'style="background:url('.esc_attr($apress_parallax_image_url).')"';
}

$position = '';
if(! empty( $position_top )) {
	$position .= 'top: '.esc_attr($position_top).'px;';
}
if(! empty( $position_bottom )) {
	$position .= 'bottom: '.esc_attr($position_bottom).'px;';
}
if(! empty( $position_left )) {
	$position .= 'left: '.esc_attr($position_left).'px;';
}
if(! empty( $position_right )) {
	$position .= 'right: '.esc_attr($position_right).'px;';
}

if(! empty( $position_top ) || ! empty( $position_bottom ) || ! empty( $position_left ) || ! empty( $position_right )){
	$wrapper_attributes[] = 'style="'.$position.'"'; 
}

$uniqid = uniqid(rand());
$col_id = 'apress_col_id_'.$uniqid;

$css_classes[] = $col_id;

if($apress_column_hover_effect != 'none' || $apress_column_hover_effect != ''){
$css_classes[] = 'hover_style_'.$apress_column_hover_effect;
}

//Animation
if($animation_type == 'clipping'){
	
	$css_classes[] = 'animated clipping-hide apcore-clipping-animation';
	$wrapper_attributes[] = 'data-animation = "'.$clipping_animation_type.'"';
	$wrapper_attributes[] = 'data-delay = "'.$data_delay.'"';

}


if($apress_column_hover_effect == '3deffect'){
	$data_tilt = ' data-tilt data-tilt-glare="false" data-tilt-max="10"'; 
}else{
	$data_tilt = '';
	}

if($apress_choose_parallax_style == 'parallax_with_mousemove'){
	
	$columnmove_x = ($column_move_x == 'yes') ? 'true' : 'false';
	$columnmove_y = ($column_move_y == 'yes') ? 'true' : 'false';
	
	$columninvert_x = ($column_invert_x == 'yes') ? 'true' : 'false';
	$columninvert_y = ($column_invert_y == 'yes') ? 'true' : 'false';
	
	$wrapper_attributes[] = '
	data-calibrate-x="'.$columnmove_x.'" 
    data-calibrate-y="'.$columnmove_y.'" 
    data-invert-x="'.$columninvert_x.'"  
    data-invert-y="'.$columninvert_y.'" 
    data-limit-x="'.$column_limit_x.'" 
    data-limit-y="'.$column_limit_y.'" 
    data-scalar-x="'.$column_scalar_x.'" 
    data-scalar-y="'.$column_scalar_y.'" 
    data-friction-x="'.$column_friction_x.'"
 	data-friction-y="'.$column_friction_y.'"';
	
	$datadepth = 'data-depth="1"';
	}


$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if($apress_column_link != ''){
$link_start = '<a href="'.$apress_column_link.'">';
$link_end = '</a>';
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= $link_start.'<div class="layer vc_column-inner ' . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . '" '.$data_tilt.' '.$datadepth.'>';
$output .= '<div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>'.$link_end;
// jQuery
if($apress_choose_parallax_style == 'parallax_with_mousemove'){
	$output .= '<script type="text/javascript" charset="utf-8">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).ready(function( $ ) {
		j$(".wpb_column.'.$col_id.'").parallax();	
	});
	</script>';
}

$output .= '</div>';
echo $output;

	// Style
	if((substr_count($column_shadow, 'disable') == 0) || (substr_count($column_shadow_h, 'disable') == 0) || ! empty( $apress_column_overlay_color ) || ! empty( $clipping_color ) || ! empty( $apress_column_overlay_hover_color ) || ! empty( $apress_column_font_color ) || $apress_column_hover_effect != 'none' || $apress_zindex != '' || $box_swing == 'yes'){
		
	$style = '';
	$style .= '.'.$col_id.' .apcore-clipping-overlay{ background:'.$clipping_color.';}';
	$style .= '.'.$col_id.'{ position:relative;z-index:'.$apress_zindex.';}';
	if(substr_count($column_shadow, 'disable') == 0) {
		$column_shadow = Zolo_Box_Shadow_Param::box_shadow_css($column_shadow);	
		$style .= '.'.$col_id.'.wpb_column > .vc_column-inner{'.$column_shadow.'}';
	}
	if(substr_count($column_shadow_h, 'disable') == 0) {
		$column_shadow_h = Zolo_Box_Shadow_Param::box_shadow_css($column_shadow_h);	
		$style .= '.'.$col_id.'.wpb_column > .vc_column-inner:hover{'.$column_shadow_h.'}';
	}
	//box_swing
	if($box_swing == 'yes'){
		$style .= '.'.$col_id.'.wpb_column .vc_column-inner:hover{ transform:translateY(-10px);-moz-transform:translateY(-10px);-webkit-transform:translateY(-10px);-ms-transform:translateY(-10px);-o-transform:translateY(-10px);}';
	}
	
	$style .= '.'.$col_id.' .vc_column-inner:before, .'.$col_id.' .vc_column-inner,.hover_style_zoomout, .hover_style_zoomin{-moz-transition: .3s ease;-webkit-transition: .3s ease;-ms-transition: .3s ease;-o-transition: .3s ease;transition: .3s ease;}';
	
	if(! empty( $apress_column_overlay_color ) || ! empty( $apress_column_overlay_hover_color )){
		$style .= '.'.$col_id.' .vc_column-inner{ position:relative;}';
		$style .= '.'.$col_id.' > .vc_column-inner:before{ position:absolute; top:0; left:0px; width:100%; height:100%; content:""; display:block;}';
		$style .= '.'.$col_id.' > .vc_column-inner:before{background:'.$apress_column_overlay_color.';}';
		$style .= '.'.$col_id.' > .vc_column-inner:hover:before{background:'.$apress_column_overlay_hover_color.';}';
		$style .= '.wpb_wrapper{ position:relative; z-index:1;}';
		
	}
	
	if(! empty( $apress_column_font_color )){
		$style .= '.'.$col_id.' .vc_column-inner{color:'.$apress_column_font_color.';}';
	}
	
	if($apress_column_hover_effect == 'zoomout'){
		$style .= '.hover_style_zoomout:hover{ z-index:6;-moz-transform: scale(1.1);-webkit-transform: scale(1.1);transform: scale(1.1);}';	
	}else if($apress_column_hover_effect == 'zoomin'){
		$style .= '.hover_style_zoomin:hover{ z-index:6;-moz-transform: scale(0.9);-webkit-transform: scale(0.9);transform: scale(0.9);}';
	}else if($apress_column_hover_effect == 'zoomin_Inside'){
		$style .= '.hover_style_zoomin_Inside{ overflow:hidden;}';
		$style .= '.hover_style_zoomin_Inside .vc_column-inner{-moz-transform: scale(1.04);-webkit-transform: scale(1.04);transform: scale(1.04);}';
		$style .= '.hover_style_zoomin_Inside:hover .vc_column-inner{ z-index:6;-moz-transform: scale(1);-webkit-transform: scale(1);transform: scale(1);}';	
	}else if($apress_column_hover_effect == 'zoomout_Inside'){
		$style .= '.hover_style_zoomout_Inside{ overflow:hidden;}';
		$style .= '.hover_style_zoomout_Inside .vc_column-inner{-moz-transform: scale(1);-webkit-transform: scale(1);transform: scale(1);}';
		$style .= '.hover_style_zoomout_Inside:hover .vc_column-inner{z-index:6;-moz-transform: scale(1.05);-webkit-transform: scale(1.05);transform: scale(1.05);}';	
	}else if($apress_column_hover_effect == '3deffect'){
		$style .= '.hover_style_3deffect .vc_column-inner {
		  -webkit-transform-style: preserve-3d;
				  transform-style: preserve-3d;
		  -webkit-transform: perspective(500px);
				  transform: perspective(500px);
		  position: relative;
		}';
		$style .= '.hover_style_3deffect .vc_column-inner > .wpb_wrapper {
		  display: block;
		  -webkit-transform: translateZ(30px)  scale(1);
				  transform: translateZ(30px) scale(1);
		}';
	}
}
apcore_save_plugin_dyn_styles( $style );