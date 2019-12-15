<?php 
/*-----------------------------------------------------------------------------------*/
/* Button
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'button_text'							=> 'Button',
	'button_link'							=> '',
	'color_scheme'							=> 'default_button_color_scheme',
	'color_scheme2'							=> 'default_button_color_scheme',
	'button_border_height_for_style4'		=> '2',
	'button_border_color_for_style4'		=> '#e5e5e5',
	'button_border_height_for_style4'		=> '2',
	'padding_top_bottom_for_style4'			=> '12',
	'button_border_color_for_style5'		=> '#e5e5e5',
	'button_hover_border_color_for_style5'	=> '#549ffc',
	'icon_bg_color_for_style6'				=> '#e5e5e5',
	'icon_hover_bg_color_for_style6'		=> '#549ffc',
	'icon_bg_color_show'		=> 'no',
	'button_bg_color'			=> '#5295ea',
	'button_bg_color_h'			=> '#418aea',
	'button_text_color'			=> '',
	'button_text_color_h'		=> '',
	'button_border_color'		=> '#5295ea',
	'button_border_color_h'		=> '#418aea',
	'button_hover_style'		=> 'hoverstyle1',
	'button_shape'				=> 'square',
	'button_size'				=> 'small',
	'padding_top_bottom'		=> '15',
	'padding_right_left'		=> '25',
	'button_alignment'			=> 'inline',
	'button_left_margin'		=> '6',
	'button_right_margin'		=> '6',
	'box_shadow'				=> 'box_shadow_enable:enable|shadow_horizontal:1|shadow_vertical:2|shadow_blur:4|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'box_hover_shadow'			=> 'box_shadow_enable:enable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
	'button_swing'				=>'no',
	'icon_family'				=> 'fontawesome',
	'icon_fontawesome'			=> 'fa fa-adjust',
	'icon_openiconic'			=> 'vc-oi vc-oi-dial',
	'icon_typicons'				=> 'typcn typcn-adjust-brightness',
	'icon_entypo'				=> 'entypo-icon entypo-icon-note',
	'icon_linecons'				=> 'vc_li vc_li-heart',
	'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'				=> 'icon-basic-heart',
	'icon_size'					=> '16',
	'icon_color'				=> '#333333',
	'icon_hover_color'			=> '#ffffff',
	'button_font_options'		=> '',
	'button_google_fonts'		=> '',
	'button_custom_fonts'		=> '',
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
	
	//icon
switch($icon_family) {
	case 'fontawesome':
		$icon = $icon_fontawesome;
		break;
	case 'openiconic':
		$icon = $icon_openiconic;
		break;
	case 'typicons':
		$icon = $icon_typicons;
		break;
	case 'entypo':
		$icon = $icon_entypo;
		break;
	case 'linecons':
		$icon = $icon_linecons;
		break;
	case 'monosocial':
		$icon = $icon_monosocial;
		break;
	case 'linea':
		$icon = $icon_linea;
		break;	
	case 'default_arrow':
		$icon = 'icon-button-arrow';
		break;
	default:
		$icon = '';
		break;
}
if(!empty($icon_family) && $icon_family != 'none') {
	$circle_icon = $icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_family );

//regular(grad) linea
if(!empty($icon_family) && $icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
}
	global $apress_data;
	
	$attributes = array();
	$button_class = array();
	$button_wrap_class = array();
	$uniqid = uniqid(rand());
	$zolo_button_id = 'zolo_button_element_'.$uniqid;
	$button_html = '';
	$title_google_fonts = 'yes';
	
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

$button_class[] = 'zolo_button';
$button_class[] = 'zolo_button_'.$button_shape;
$button_class[] = 'zolo_ripplelink';

$button_wrap_class[] = 'zolo_button_'.$button_alignment;
$button_wrap_class[] = 'zolo_button_size_'.$button_size;

if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style7' || $button_shape == 'style10'){
$button_wrap_class[] = 'zolo_button_'.$button_hover_style;
}
	
$attributes = implode( ' ', $attributes );
$button_class = implode( ' ', $button_class );
$button_wrap_class = implode( ' ', $button_wrap_class );

	if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style7' || $button_shape == 'style10'){
		if($color_scheme == 'design_your_own'){
			$key = '';
		}else{
			$key = $color_scheme;
		} 
	}else if($button_shape == 'style4' || $button_shape == 'style6' || $button_shape == 'style8'){
		$key = $color_scheme2;
	}

if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style4' || $button_shape == 'style6' || $button_shape == 'style7' || $button_shape == 'style8' || $button_shape == 'style10'){
	$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
}
$icon_html = '';
if($button_shape == 'style5' || $button_shape == 'style6' || $button_shape == 'style7' || $button_shape == 'style8' || $button_shape == 'style9' || $button_shape == 'style10'){

$icon_html = '<span class="button_icon" style="font-size:'.$icon_size.'px;"><i class="'.$icon.'"></i></span>';
	}
	
if($button_shape == 'style7' || $button_shape == 'style10'){
echo '<script>
(function($) {
"use strict";
$(document).ready(function(){
var zolo_buttonheight = $("#'.$zolo_button_id.' .zolo_button_style7, #'.$zolo_button_id.' .zolo_button_style10").outerHeight();
$("#'.$zolo_button_id.' .zolo_button_style7 .button_icon, #'.$zolo_button_id.' .zolo_button_style10 .button_icon").height(zolo_buttonheight);
$("#'.$zolo_button_id.' .zolo_button_style7 .button_icon, #'.$zolo_button_id.' .zolo_button_style10 .button_icon").width(zolo_buttonheight);
$("#'.$zolo_button_id.' .zolo_button_style7 .button_icon, #'.$zolo_button_id.' .zolo_button_style10 .button_icon").css("line-height", zolo_buttonheight+"px");

})
})(jQuery);
</script>';
}

?>

<?php
	// Button Text HTML.
	if (!empty($button_text)) {
		$button_options = _zolo_parse_text_shortcode_params($button_font_options, 'zolo_button_text', $button_google_fonts, $button_custom_fonts);
		$button_html .= '<span class="zolo_button_text" ' . $button_options['style'] . '>' . esc_html($button_text) . '</span>'.$icon_html;
	}



	$output = '<div id="'.$zolo_button_id.'" class="zolo_button_element '.$button_wrap_class.' '.$color_scheme.' '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';

	if ( $use_button_link ) {
		$output .=  '<a ' . $attributes . ' class="'.$button_class.'">' . $button_html . '</a>';
	}else{
		$output .=  '<button ' . $attributes . ' class="'.$button_class.'">' . $button_html . '</button>';
	}
	
	$output .= '</div>';
	
	echo $output;

// CSS Start
$shortcode_css = '';

if($button_swing == 'yes'){
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button:hover{ transform:translateY(-3px); -moz-transform:translateY(-3px); -webkit-transform:translateY(-3px); -ms-transform:translateY(-3px); -o-transform:translateY(-3px);}';
}

	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element.zolo_button_inline .zolo_button{ margin:0 '.$button_right_margin.'px 0 '.$button_left_margin.'px;}';


if($button_shape == 'square' || $button_shape == 'rounded' || $button_shape == 'round' || $button_shape == 'style7' || $button_shape == 'style10'){
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button{'.$box_shadow.'}';
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button:hover{'.$box_hover_shadow.'}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$padding_top_bottom.'px '.$padding_right_left.'px;}';

	if($color_scheme == 'design_your_own'){

		$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
		#'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
		#'.$zolo_button_id.' .zolo_button{background:'.$button_bg_color.';border-color:'.$button_border_color.';}';
		
		$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button:hover,
		#'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button:hover,
		#'.$zolo_button_id.' .zolo_button:after{ background:'.$button_bg_color_h.';border-color:'.$button_border_color_h.'; }';		
	
	}else{
		
		$shortcode_css .= '#'.$zolo_button_id.' .zolo_button,#'.$zolo_button_id.' .zolo_button:hover{'.$color_scheme_css.'}';
	}


}else if($button_shape == 'style4'){ 

	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button_style4{color:'.$apress_data["button_text_color"].';}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button_style4:before{ background-color:'.$button_border_color_for_style4.'; height:'.$button_border_height_for_style4.'px;}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button_style4:after{height:'.$button_border_height_for_style4.'px;'.$color_scheme_css.'}';
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button{padding:'.$padding_top_bottom_for_style4.'px 0px;}';

}else if($button_shape == 'style5' || $button_shape == 'style9'){
			
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button{ border-color:'.$button_border_color_for_style5.';}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button:hover{border-color:'.$button_hover_border_color_for_style5.';}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$button_border_color_for_style5.';color:'.$icon_color.';}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button:hover .button_icon{ background:'.$button_hover_border_color_for_style5.';color:'.$icon_hover_color.';}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_size_design_your_own .zolo_button{padding:'.$padding_top_bottom.'px '.$padding_right_left.'px;}';
	
}else if($button_shape == 'style6' || $button_shape == 'style8'){	
		
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button_style6.zolo_button{padding:'.$padding_top_bottom_for_style4.'px 5px '.$padding_top_bottom_for_style4.'px 0px;}';
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button_style8.zolo_button{padding:'.$padding_top_bottom_for_style4.'px 0px '.$padding_top_bottom_for_style4.'px 5px;}';
	
		if($icon_bg_color_show == 'yes'){
			$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ background:'.$icon_bg_color_for_style6.';color:'.$icon_color.';margin-left:12px;width:2em; height:2em; line-height:1.9em;line-height: 31px;}';
			$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button:hover .button_icon{ background:'.$icon_hover_bg_color_for_style6.';color:'.$icon_hover_color.';}';
		} 
}
if($button_shape == 'style7' || $button_shape == 'style10'){
		
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button .button_icon{ color:'.$icon_color.'; width:40px; height:40px; line-height:40px;}';
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_element .zolo_button:hover .button_icon{ color:'.$icon_hover_color.';}';
}

if($button_text_color != ''){
	
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button,
	#'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button,
	#'.$zolo_button_id.' .zolo_button{color:'.$button_text_color.';}';
	
	$shortcode_css .= '#'.$zolo_button_id.'.zolo_button_hoverstyle6 .zolo_button:hover,
	#'.$zolo_button_id.'.zolo_button_hoverstyle1 .zolo_button:hover,
	#'.$zolo_button_id.' .zolo_button:after,
	#'.$zolo_button_id.' .zolo_button:focus,
	#'.$zolo_button_id.' .zolo_button:hover{color:'.$button_text_color_h.';}';
	
}else{
	
	$shortcode_css .= '#'.$zolo_button_id.' .zolo_button,
	#'.$zolo_button_id.' .zolo_button:focus,
	#'.$zolo_button_id.' .zolo_button:hover{'.$color_scheme_css.' color:'.$apress_data["button_text_color"].';}';
}
apcore_save_plugin_dyn_styles( $shortcode_css );
