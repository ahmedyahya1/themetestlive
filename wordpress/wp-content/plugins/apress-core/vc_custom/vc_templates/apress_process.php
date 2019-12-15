<?php 
/*-----------------------------------------------------------------------------------*/
/* Process
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'					=> 'process_style1',
	'title'					=> 'Process Title',
	'process_image'			=> '',
	'process_step'			=> '01',
	'step_from_top'			=> '50',
	'step_from_left'		=> '50',
	'content_alignment'		=> 'center',
	'icon_to_display'		=> 'icon',
	'icon_family'			=> '',
	'icon_fontawesome'		=> 'fa fa-adjust',
	'icon_openiconic'		=> 'vc-oi vc-oi-dial',
	'icon_typicons'			=> 'typcn typcn-adjust-brightness',
	'icon_entypo'			=> 'entypo-icon entypo-icon-note',
	'icon_linecons'			=> 'vc_li vc_li-heart',
	'icon_monosocial'		=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'			=> 'icon-basic-heart',
	'upload_image'			=> '',
	'icon_size'				=> '',
	'color_scheme'			=> 'primary_color_scheme',
	'icon_color'			=> '',
	'icon_border_color'		=> '',
	'title_font_options'	=> '',
	'title_google_fonts'	=> '',
	'title_custom_fonts'	=> '',
	'step_font_options'		=> '',
	'step_google_fonts'		=> '',
	'step_custom_fonts'		=> '',
	'step_hover_text_color'	=> '#ffffff',
	'step_bg_color'			=> '#ffffff',
	'step_bg_color_hover'	=> '#f1f1f1',
	'step_border_color'		=> '#549ffc',
	'content_font_options'	=> '',
	'content_google_fonts'	=> '',
	'content_custom_fonts'	=> '',
	'title_responsive'		=> '',
	'step_responsive'		=> '',
	'icon_bg_color'			=> '#fff',
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



if($color_scheme == 'design_your_own'){
	$key = '';
	
	$text_color = 'color:'.$icon_color.';';
	$border_color = 'border-color:'.$icon_border_color.';';
	$background_color = 'background:'.$icon_color.';';
}else{
	$key = $color_scheme;
	
$color_scheme_css_for_text = apcore_shortcodes_text_color_scheme($key);
$color_scheme_css_for_border = apcore_shortcodes_border_color_scheme($key);
$background_color_scheme = apcore_shortcodes_background_color_scheme($key);

$text_color = $color_scheme_css_for_text;
$border_color = $color_scheme_css_for_border;

$background_color = $background_color_scheme;
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
	$zolo_process_id = 'zolo_process_element_'.$uniqid;
	
	$process_icon_html = $title_html = $content_html = $process_step_html = '';

	$title_google_fonts = 'yes';
	
//RTL Colde
if ( is_rtl() ){
	if($content_alignment == 'left'){
		$contentalignment = 'right';
	}else if($content_alignment == 'right'){
		$contentalignment = 'left';
	}else{
		$contentalignment = 'center';
	}
}else{
	$contentalignment = $content_alignment;
}

?>	
<?php
	// Title HTML.
	if (!empty($title)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_process_title', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<' . $title_options['tag'] . ' class="zolo_process_title ' . $title_options['class'] . '" ' . $title_options['style'] . '>' . esc_html($title) . '</' . $title_options['tag'] . '>';
	}
	
	// Process Step No HTML.
	if (!empty($process_step)) {
		$process_step_options = _zolo_parse_text_shortcode_params($step_font_options, 'zolo_process_step', $step_google_fonts, $step_custom_fonts);
		$process_step_html .= '<' . $process_step_options['tag'] . ' class="zolo_process_step ' . $process_step_options['class'] . '" ' . $process_step_options['style'] . '>' . esc_html($process_step) . '</' . $process_step_options['tag'] . '>';
}	
	// Content HTML.
	$content_options = _zolo_parse_text_shortcode_params($content_font_options, 'zolo_process_content', $content_google_fonts, $content_custom_fonts);
	if (!empty($content)) {
		$content_html .= '<' . $content_options['tag'] . ' class="zolo_process_content ' . $content_options['class'] . '" ' . $content_options['style'] . '>' . wpb_js_remove_wpautop($content) . '</' . $content_options['tag'] . '>';
	}
	
if($style == 'process_style1'){
	if($icon_to_display == 'icon'){
		$process_icon_html .= '<div class="zolo_process_icon_wrap"><div class="process_icon circle" style=" font-size:'.$icon_size.'px;"><i class="'.$icon.'"></i></div></div>';
	}else if($icon_to_display == 'image'){
		$icon_img_src = wp_get_attachment_image_src($upload_image, 'full');
		$process_icon_html .= '<div class="zolo_process_icon_wrap"><div class="process_image" style=" width:'.$icon_size.'px;"><img alt="Icon Image" src="'.$icon_img_src[0].'"></div></div>';
	}
}else if($style == 'process_style2'){
	$process_image_src = wp_get_attachment_image_src($process_image, 'full');
	$process_icon_html .= '<div class="zolo_process_icon_wrap"><div class="process_image">'.$process_step_html.'<img alt="Icon Image" src="'.$process_image_src[0].'"></div></div>';
	
}else if($style == 'process_style4'){
	$process_icon_html .= '<div class="zolo_process_icon_wrap"><div class="process_icon circle" ' . $process_step_options['style'] . '>'.esc_html($process_step).'</div></div>';
	
}

	$output = '<div class="zolo_process_box" style="text-align:'.$contentalignment.';"><div id="'.$zolo_process_id.'" class="zolo_process_element '.$style.' '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	
	$output .= $process_icon_html;
	$output .= '<div class="zolo_process_detail">';
	if($style == 'process_style1' || $style == 'process_style3'){$output .= $process_step_html;}
	$output .= $title_html;
	$output .= $content_html;
	$output .= '</div>';
	
	$output .= '</div>';
	
	$output .= '</div>';	
	echo $output;
		
$module_css = Zolo_Resposive_Text_Param::responsive_css($title_responsive, '#' . esc_js($zolo_process_id) . '.zolo_process_element .zolo_process_title');
$module_css .= Zolo_Resposive_Text_Param::responsive_css($step_responsive, '#' . esc_js($zolo_process_id) . '.zolo_process_element .zolo_process_step');
	
$custom_css = '';
$custom_css .= $module_css;

$custom_css .= '#'.$zolo_process_id.'.zolo_process_element .process_icon{background:'.$icon_bg_color.'; border:1px solid transparent;'.$border_color.$text_color.'}';
$custom_css .= '#'.$zolo_process_id.'.zolo_process_element:hover .process_icon{ color:#fff;border:1px solid transparent;'.$border_color.$background_color.'}';


$custom_css .= '#'.$zolo_process_id.'.zolo_process_element.process_style4 .process_icon{background:'.$step_bg_color.'; border:1px solid '.$step_border_color.';}';
$custom_css .= '#'.$zolo_process_id.'.zolo_process_element.process_style4:hover .process_icon{ color:'.$step_hover_text_color.'!important; border:1px solid '.$step_border_color.'; background:'.$step_bg_color_hover.'}';



$custom_css .= '#'.$zolo_process_id.'.zolo_process_element.process_style3,
			#'.$zolo_process_id.'.zolo_process_element.process_style2{padding-top:'.$step_from_top.'px;}';
//RTL Colde
if ( is_rtl() ){
	$custom_css .= '#'.$zolo_process_id.'.zolo_process_element.process_style3,
				#'.$zolo_process_id.'.zolo_process_element.process_style2{padding-right:'.$step_from_left.'px;}';
}else{
	$custom_css .= '#'.$zolo_process_id.'.zolo_process_element.process_style3,
				#'.$zolo_process_id.'.zolo_process_element.process_style2{padding-left:'.$step_from_left.'px;}';
}
			

 //box_shadow
 if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$custom_css .= '#'.$zolo_process_id.'.zolo_process_element .process_icon{'.$box_shadow.'}';
}


apcore_save_plugin_dyn_styles( $custom_css );
