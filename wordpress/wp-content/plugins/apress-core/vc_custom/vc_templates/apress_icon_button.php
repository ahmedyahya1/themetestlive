<?php 
/*-----------------------------------------------------------------------------------*/
/* Icon Button
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'						=> 'style1',
	'button_link'				=> '',
	'icon_color'				=> '#e0e0e0',
	'icon_hover_color'			=> '#e0e0e0',
	'background_color'			=> '#0000d6',
	'hover_background_color'	=> '#0000d6',
	'border_color'				=> '#0000d6',
	'hover_border_color'		=> '#0000d6',
	'button_alignment'			=> 'inline',
	'button_shadow'				=> 'no',
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
	

	$attributes = array();
	$uniqid = uniqid(rand());
	$zolo_icon_button_id = 'zolo_icon_button_element_'.$uniqid;
	

	
//parse link
$button_link = ( '||' === $button_link ) ? '' : $button_link;
$button_link = vc_build_link( $button_link );
$use_button_link = false;
if ( strlen( $button_link['url'] ) > 0 ) {
	$use_button_link = true;
	$a_href = $button_link['url'];
	$a_title = $button_link['title'];
	$a_target = $button_link['target'];
	$a_rel = $button_link['rel'];
}

if ( $use_button_link ) {
	$attributes[] = 'href="' . trim( $a_href ) . '"';
	$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
	if ( ! empty( $a_target ) ) {
		$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
	}
	if ( ! empty( $a_rel ) ) {
		$attributes[] = 'rel="' . esc_attr( trim( $a_rel ) ) . '"';
	}
}

$button_icon = '';

if($style == 'style1' || $style == 'style2'){
	$button_style = 'button_style_none';
	
}else if($style == 'style3' || $style == 'style4' || $style == 'style7' || $style == 'style8'){
	$button_style = 'button_style_circle';

}else if($style == 'style5' || $style == 'style6' || $style == 'style9' || $style == 'style10'){
	$button_style = 'button_style_square';
}

if($style == 'style1' || $style == 'style7' || $style == 'style8' || $style == 'style9' || $style == 'style10'){
	
	$button_icon ='<span class="zolo_button_icon zolo_arrow_icon"></span>';

}else if($style == 'style2' || $style == 'style3' || $style == 'style4' || $style == 'style5' || $style == 'style6'){
	$button_icon ='<span class="zolo_button_icon zolo_plus_icon"></span>';
	}



$iconbutton_class = 'zolo_iconbutton_tag iconbutton_'.$style.' '.$button_style;
$attributes = implode( ' ', $attributes );

$output = '<div id="'. $zolo_icon_button_id .'" class="zolo_icon_button_element alignment_'.$button_alignment.' '. $animatedclass .' '. $class .'" data-animation = "'. $data_animation .'" data-delay = "'. $data_delay .'">';

	$output .=  '<a ' . $attributes . ' class="'.$iconbutton_class.'">' . $button_icon . '</a>';
	
$output .= '</div>';
	
echo $output;

// CSS

$shortcode_css = '';

$shortcode_css .= '#'.$zolo_icon_button_id.'.alignment_center{ text-align:center}';
$shortcode_css .= '#'.$zolo_icon_button_id.'.alignment_right{ text-align:right}';
$shortcode_css .= '#'.$zolo_icon_button_id.'.alignment_left{ text-align: left}';
if($style == 'style1' || $style == 'style2'){
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:before{ color:'.$icon_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:before{ background:'.$icon_color.';}';

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:before{ color:'.$icon_hover_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:before{ background:'.$icon_hover_color.';}';

}else if($style == 'style3' || $style == 'style5' || $style == 'style7' || $style == 'style9'){

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:before{ color:'.$icon_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:before{ background:'.$icon_color.';}';

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:before{ color:'.$icon_hover_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:before{ background:'.$icon_hover_color.';}';

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_button_icon{background:'.$background_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_button_icon{background:'.$hover_background_color.';}';

if($button_shadow == 'yes'){
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_button_icon{box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_button_icon:hover{box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -1px rgba(0, 0, 0, 0.2)}';
}

}else if($style == 'style4' || $style == 'style6' || $style == 'style8' || $style == 'style10'){

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:before{ color:'.$border_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:before{ background:'.$border_color.';}';

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:before{ color:'.$hover_border_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:after,
#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:before{ background:'.$hover_border_color.';}';

$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag .zolo_button_icon{ border:1px solid '.$border_color.';}';
$shortcode_css .= '#'.$zolo_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_button_icon{border:1px solid '.$hover_border_color.';}';

}

apcore_save_plugin_dyn_styles( $shortcode_css );