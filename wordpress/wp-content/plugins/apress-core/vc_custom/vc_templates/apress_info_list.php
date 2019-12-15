<?php 
/*-----------------------------------------------------------------------------------*/
/* Process
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'title'					=> 'Process Title',
	'icon_type'				=> 'icon',
	'info_list_number'		=> '01',
	'icon_family'			=> '',
	'icon_fontawesome'		=> 'fa fa-adjust',
	'icon_openiconic'		=> 'vc-oi vc-oi-dial',
	'icon_typicons'			=> 'typcn typcn-adjust-brightness',
	'icon_entypo'			=> 'entypo-icon entypo-icon-note',
	'icon_linecons'			=> 'vc_li vc_li-heart',
	'icon_monosocial'		=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'			=> 'icon-basic-heart',
	'icon_color'			=> '#549ffc',
	'icon_border_color'		=> '#549ffc',
	'icon_bg_color'			=> '#ffffff',
	'title_font_options'	=> '',
	'title_google_fonts'	=> '',
	'title_custom_fonts'	=> '',
	'content_font_options'	=> '',
	'content_google_fonts'	=> '',
	'content_custom_fonts'	=> '',
	'title_responsive'		=> '',
	'box_shadow'			=> '',
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

//icon font family
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
	$uniqid = uniqid(rand());
	$zolo_info_list_id = 'zolo_info_list_element_'.$uniqid;
	$info_list_icon_html = $title_html = $content_html = $info_list_step_html = '';
	$title_google_fonts = 'yes';
?>	
<?php
	// Title HTML.
	if (!empty($title)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_info_list_title', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<' . $title_options['tag'] . ' class="zolo_info_list_title ' . $title_options['class'] . '" ' . $title_options['style'] . '>' . esc_html($title) . '</' . $title_options['tag'] . '>';
	}
	
	// Content HTML.
	if (!empty($content)) {
		$content_options = _zolo_parse_text_shortcode_params($content_font_options, 'zolo_info_list_content', $content_google_fonts, $content_custom_fonts);
		$content_html .= '<' . $content_options['tag'] . ' class="zolo_info_list_content ' . $content_options['class'] . '" ' . $content_options['style'] . '>' . wpb_js_remove_wpautop($content) . '</' . $content_options['tag'] . '>';
	}
	
//Icon
if($icon_type == 'icon'){
	$info_list_icon_html .= '<div class="zolo_info_list_icon_wrap"><div class="info_list_icon circle"><i class="'.$icon.'"></i></div></div>';
}else{
	$info_list_icon_html .= '<div class="zolo_info_list_icon_wrap"><div class="info_list_icon circle">'.$info_list_number.'</div></div>';
	}

	$output = '<li class="'.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'"> <div class="zolo_info_list_box"><div id="'.$zolo_info_list_id.'" class="zolo_info_list_element">';
	
	$output .= $info_list_icon_html;
	$output .= '<div class="zolo_info_list_detail">';
	$output .= $title_html;
	$output .= $content_html;
	$output .= '</div>';
	
	$output .= '</div>';
	
	$output .= '</div></li>';	
	echo $output;
	
	
	$module_css = Zolo_Resposive_Text_Param::responsive_css($title_responsive, '#' . esc_js($zolo_info_list_id) . '.zolo_info_list_element .zolo_info_list_title');

	$custom_css = '';
	$custom_css .= $module_css;
	$custom_css .= '#'.$zolo_info_list_id.'.zolo_info_list_element .info_list_icon{ border:1px solid transparent;border-color:'.$icon_border_color.';color:'.$icon_color.';background:'.$icon_bg_color.';}';
	
	$custom_css .= '#'.$zolo_info_list_id.'.zolo_info_list_element:hover .info_list_icon{ border:1px solid transparent;border-color:'.$icon_color.';color:#fff;background:'.$icon_color.';}';
apcore_save_plugin_dyn_styles( $custom_css );