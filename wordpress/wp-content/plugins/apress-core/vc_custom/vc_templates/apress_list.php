<?php 
/*-----------------------------------------------------------------------------------*/
/* List
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(

	'list_title'				=> 'Title area',
	'color_scheme'				=> 'primary_color_scheme',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'icon_family'				=> 'fontawesome',
	'icon_fontawesome'			=> 'fa fa-adjust',
	'icon_openiconic'			=> 'vc-oi vc-oi-dial',
	'icon_typicons'				=> 'typcn typcn-adjust-brightness',
	'icon_entypo'				=> 'entypo-icon entypo-icon-note',
	'icon_linecons'				=> 'vc_li vc_li-heart',
	'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'				=> 'icon-basic-heart',
	'icon_size'					=> '18',
	'list_item_margin'			=> '10',
	'list_border'				=> 'no',
	'list_border_color'			=> '#f2f2f2',
	'icon_style'				=> 'simple',
	'list_icon_color'			=> '#549ffc',
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
		
	global $apress_data;

	
	$uniqid = uniqid(rand());
	$zolo_list_element_id = 'zolo_list_element_'.$uniqid;
	
	$title_html = '';

	$title_google_fonts = 'yes';
	

if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
	}
$background_color_scheme = apcore_shortcodes_background_color_scheme($key);
$text_color_scheme = apcore_shortcodes_text_color_scheme($key);
$border_color_scheme = apcore_shortcodes_border_color_scheme($key);

if($color_scheme == 'design_your_own'){
	
	if($icon_style == 'simple'){
	
		$icon_color = 'color:'.$list_icon_color.';';
		$icon_background = 'background:none;';
		
	}else if($icon_style == 'circle_background' || $icon_style == 'square_background'){
	
		$icon_color = 'color:#fff;';
		$icon_background = 'background:'.$list_icon_color.';';
	}
	
}else{
	
	if($icon_style == 'simple'){

		$icon_color = $text_color_scheme;
		$icon_background = 'background:none;';
		
	}else if($icon_style == 'circle_background' || $icon_style == 'square_background'){
	
		$icon_color = 'color:#fff;';
		$icon_background = $background_color_scheme;
	}
}
?>	

<?php
	// Title HTML.
	if (!empty($list_title)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<'.$title_options['tag'].' class="zolo_list_text" ' . $title_options['style'] . '>' . esc_html($list_title) .'</'.$title_options['tag'].'>';
	}
	
	$output = '<div id="'.$zolo_list_element_id.'" class="zolo_list_element '.$animatedclass.' '.$icon_style.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	$output .= '<div class="zolo_list_item">';
	
	$output .= '<div class="zolo_list_icon_warp"><div class="zolo_list_icon"><i class="'.$icon.'"></i></div></div>';
	
	$output .= '<div class="zolo_list_text_wrap">' .$title_html. '</div>';
	
	$output .= '</div></div>';
	
	echo $output;
	
	$custom_css = '';
	if($list_border == 'yes'){
		$custom_css .= '#'.$zolo_list_element_id .'.zolo_list_element{ border-bottom:1px solid '.$list_border_color.';}';
	}
	$custom_css .= '#'.$zolo_list_element_id .'.zolo_list_element{ padding:'.$list_item_margin.'px 0;}';
	$custom_css .= '#'.$zolo_list_element_id .'.zolo_list_element .zolo_list_icon{ font-size:'.$icon_size.'px;'.$icon_background.'}';
	$custom_css .= '#'.$zolo_list_element_id .'.zolo_list_element .zolo_list_icon,
	#'.$zolo_list_element_id .'.zolo_list_element .zolo_list_icon i,
	#'.$zolo_list_element_id .'.zolo_list_element .zolo_list_icon i:before{'.$icon_color.'}';
	apcore_save_plugin_dyn_styles( $custom_css );