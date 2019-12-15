<?php 
/*-----------------------------------------------------------------------------------*/
/* Heading
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'						=> '',
	'sub_title'					=> 'Sub Heading',
	'sub_title_bg_color'		=> '#f2f2f2',
	'content_alignment'			=> 'center',
	'heading_margin'			=> '',
	'subheading_margin'			=> '',
	'enable_delimiter'			=> 'yes',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'color_scheme'				=> 'primary_color_scheme',
	'main_heading_color'		=> '',
	'subtitle_font_options'		=> '',
	'subtitle_google_fonts'		=> '',
	'subtitle_custom_fonts'		=> '',
	
	'delimiter_style'			=> 'line',
	'icon_family'				=> 'fontawesome',
	'icon_fontawesome'			=> 'fa fa-adjust',
	'icon_openiconic'			=> 'vc-oi vc-oi-dial',
	'icon_typicons'				=> 'typcn typcn-adjust-brightness',
	'icon_entypo'				=> 'entypo-icon entypo-icon-note',
	'icon_linecons'				=> 'vc_li vc_li-heart',
	'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'				=> 'icon-basic-heart',
	'delimiter_margin'			=> '',
	'delimiter_line_style'		=> 'solid',
	'delimiter_line_height'		=> '3',
	'delimiter_line_width'		=> '80',
	'delimiter_line_color'		=> '',
	'space_between_line_icon'	=> '20',
	'delimiter_icon_size'		=> '30',
	'icon_color'				=> '',
	'icon_style'				=> 'simple',
	'icon_background_color'		=> '#eeeeee',
	'icon_background_size'		=> '50',
	'icon_border_style'			=> '',
	'icon_border_width'			=> '1',
	'icon_border_radius'		=> '300',
	'icon_border_color'			=> '#eaeaea',
	'delimiter_image'			=> '',
	
	'enable_delimiter_9_10'		=> 'yes',
	'delimiter_style_9_10'		=> 'line',
	'delimiter_line_style_9_10'	=> 'solid',
	'delimiter_line_height_9_10'=> '50',
	'delimiter_line_color_9_10'	=> '',
	'delimiter_image_9_10'		=> '',
	'title_responsive'			=> '',
	'subtitle_responsive'		=> '',
	'animation_type'			=>'default',
	'clipping_animation_type'	=>'clipping_left_to_right',
	'clipping_color'			=>'#f2f2f2',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
	
), $atts ) );
			
//Animation
if($animation_type == 'clipping'){
	
	$animatedclass = 'animated clipping-hide apcore-clipping-animation';
	$data_animation_value = $clipping_animation_type;

}else{
	
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
		}
	$data_animation_value = $data_animation;
	
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
	
	$uniqid = uniqid(rand());
	$zolo_heading_element_id = 'zolo_heading_element_'.$uniqid;

	$title_html = '';
	$subtitle_html = '';
	$delimiter_html = '';
	$title_google_fonts = 'yes';
	
if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_css = apcore_shortcodes_text_color_scheme($key);

//RTL Colde
if ( is_rtl() ){
		if($content_alignment == 'left'){
			$content_alignment = 'right';
		}else if($content_alignment == 'right'){
			$content_alignment = 'left';
		}else{
			$content_alignment = 'center';
		}
		
	}else{
		$content_alignment = $content_alignment;
	}

	?>	
<?php
	// Title HTML.
	if (!empty($content)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo-content-title-big', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<'.$title_options['tag']. ' class="zolo-title ' . $title_options['class'] . '"><span class="title_text" ' . $title_options['style'] . '>'.wpb_js_remove_wpautop($content).'</span></' . $title_options['tag'].'>';
	}
	
// Delimiter HTML.
if( $style == 'heading_style1' || $style == 'heading_style2' || $style == 'heading_style3' || $style == 'heading_style4' || $style == 'heading_style5' || $style == 'heading_style6' || $style == 'heading_style7' || $style == 'heading_style8' || $style == 'heading_style13' || $style == 'heading_style14'){

if($enable_delimiter == 'yes'){

if($delimiter_style == 'line'){
	
		$delimiter_html = '<div class="zolo-heading-delimiter"> <span class="delimiter_style_line"></span> </div>';
	
	}elseif($delimiter_style == 'icon'){
		
		$delimiter_html = '<div class="zolo-heading-delimiter"><div class="zolo_icon '.$icon_style.'"><i class="'.$icon.'"></i></div></div>';
		
	}elseif($delimiter_style == 'image'){
		
		$delimiter_img_src = wp_get_attachment_image_src($delimiter_image, 'full');
		$delimiter_html = '<div class="zolo-heading-delimiter"> <img alt="Delimiter Image" src="'.$delimiter_img_src[0].'"> </div>';
		
	}elseif($delimiter_style == 'line_with_icon'){
		
		$delimiter_html = '<div class="zolo-heading-delimiter alignment_'.$content_alignment.'"><div class="space_between_line_icon"><div class="zolo_icon '.$icon_style.'"><i class="'.$icon.'"></i></div></div></div>';
	}
}

$delimiter_lineheight = $delimiter_line_height;
$delimiter_linestyle = $delimiter_line_style;
$delimiter_linecolor = $delimiter_line_color;
$delimiter_linewidth = $delimiter_line_width;
$contentalignment = $content_alignment;

}else if( $style == 'heading_style9' || $style == 'heading_style10'){
	
$delimiter_lineheight = $delimiter_line_height_9_10;
$delimiter_linestyle = $delimiter_line_style_9_10;
$delimiter_linecolor = $delimiter_line_color_9_10;
$delimiter_linewidth = 2;
$contentalignment = 'left';
	
// heading Style 9 & 10	
if($enable_delimiter_9_10 == 'yes'){
	if($delimiter_style_9_10 == 'line'){
	
		$delimiter_html = '<div class="zolo-heading-delimiter"> <span class="delimiter_style_line"></span> </div>';
	
	}elseif($delimiter_style_9_10 == 'image'){
		
		$delimiter_img_src = wp_get_attachment_image_src($delimiter_image_9_10, 'full');
		$delimiter_html = '<div class="zolo-heading-delimiter"> <img alt="Delimiter Image" src="'.$delimiter_img_src[0].'"> </div>';
	}
}
	
	}

// Subtitle HTML.
if( $style == 'heading_style13' ){
	
	if( $contentalignment == 'left'){
		$delimiter_html_left = $delimiter_html;
		$delimiter_html_right = '';
		
	}else if( $contentalignment == 'right' ){
		$delimiter_html_left = '';
		$delimiter_html_right = $delimiter_html;
		
	}else if( $contentalignment == 'center' ){
		$delimiter_html_left = $delimiter_html;
		$delimiter_html_right = $delimiter_html;
	}
	
	if (!empty($sub_title)) {
		$subtitle_options = _zolo_parse_text_shortcode_params($subtitle_font_options, 'zolo-content-subtitle', $subtitle_google_fonts, $subtitle_custom_fonts);
		$subtitle_html .= '<' . $subtitle_options['tag'] . ' class="zolo-sub-title align_'.$contentalignment.' ' . $subtitle_options['class'] . '" ' . $subtitle_options['style'] . '>' .$delimiter_html_left. '<span class="zolo-sub-title-text">' . esc_html($sub_title) . '</span>' .$delimiter_html_right. '</' . $subtitle_options['tag'] . '>';
	}
	
}else if( $style == 'heading_style14' ){
	
	if (!empty($sub_title)) {
		$subtitle_options = _zolo_parse_text_shortcode_params($subtitle_font_options, 'zolo-content-subtitle', $subtitle_google_fonts, $subtitle_custom_fonts);
		$subtitle_html .= '<' . $subtitle_options['tag'] . ' class="zolo-sub-title align_'.$contentalignment.' ' . $subtitle_options['class'] . '" ' . $subtitle_options['style'] . '>' .$delimiter_html. '<span class="zolo-sub-title-text">' . esc_html($sub_title) . '</span> </' . $subtitle_options['tag'] . '>';
	}
	
	
}else{
	
	if (!empty($sub_title)) {
		$subtitle_options = _zolo_parse_text_shortcode_params($subtitle_font_options, 'zolo-content-subtitle', $subtitle_google_fonts, $subtitle_custom_fonts);
		$subtitle_html .= '<' . $subtitle_options['tag'] . ' class="zolo-sub-title ' . $subtitle_options['class'] . '" ' . $subtitle_options['style'] . '><span class="zolo-sub-title-text">' . esc_html($sub_title) . '</span></' . $subtitle_options['tag'] . '>';
	}
	
}
	
	$output = '<div id="'.$zolo_heading_element_id.'" class="zolo_heading_element '.$style.' '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation_value.'" data-delay = "'.$data_delay.'" style=" text-align:'.$content_alignment.'">';

	//Top Delimiter
	if( $style == 'heading_style3' || $style == 'heading_style4' || $style == 'heading_style7' ){
		$output .= $delimiter_html;
	}


	if( $style == 'heading_style1' || $style == 'heading_style3' || $style == 'heading_style5' || $style == 'heading_style7' || $style == 'heading_style8' || $style == 'heading_style9' || $style == 'heading_style12' ){
		$output .= '<div class="zolo_heading_element_text">';
		$output .= $title_html;
		
	}elseif($style == 'heading_style2' || $style == 'heading_style4' || $style == 'heading_style6' || $style == 'heading_style10' || $style == 'heading_style11' || $style == 'heading_style13' || $style == 'heading_style14' ){
		$output .= '<div class="zolo_heading_element_text">';
		$output .= $subtitle_html;	
		
		}


	//Middle Delimiter
	if( $style == 'heading_style1' || $style == 'heading_style2' || $style == 'heading_style9' || $style == 'heading_style10' ){
		$output .= $delimiter_html;
	}
	
	
	if( $style == 'heading_style1' || $style == 'heading_style3' || $style == 'heading_style5' || $style == 'heading_style7' || $style == 'heading_style8' || $style == 'heading_style9' || $style == 'heading_style12' ){
		
		$output .= $subtitle_html;	
		$output .= '</div>';
		
	}elseif($style == 'heading_style2' || $style == 'heading_style4' || $style == 'heading_style6' || $style == 'heading_style10' || $style == 'heading_style11' || $style == 'heading_style13' || $style == 'heading_style14'){
		
		$output .= $title_html;
		$output .= '</div>';
		}
		
		
	//Bottom Delimiter
	if( $style == 'heading_style5' || $style == 'heading_style6' || $style == 'heading_style8' ){
		$output .= $delimiter_html;
	}
	
	
	$output .= '</div>';	
	

	
	//echo $heading_margin.'px';
	
	$module_css = '#'. esc_js($zolo_heading_element_id) .' .zolo-title {' . esc_js(Zolo_Param_Margin::margins_css($heading_margin)) . '}';
	$module_css .= '#'. esc_js($zolo_heading_element_id) .' .zolo-sub-title {' . esc_js(Zolo_Param_Margin::margins_css($subheading_margin)) . '}';
	$module_css .= '#'. esc_js($zolo_heading_element_id) .' .zolo-heading-delimiter {' . esc_js(Zolo_Param_Margin::margins_css($delimiter_margin)) . '}';
	
	if(isset($title_responsive) && $title_responsive != '') {
		$module_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '#' . esc_js($zolo_heading_element_id) . ' .zolo-title span.title_text');
	}
	if(isset($subtitle_responsive) && $subtitle_responsive != '') {
		$module_css .= Zolo_Resposive_Text_Param::responsive_css($subtitle_responsive, '#' . esc_js($zolo_heading_element_id) . ' .zolo-sub-title');
	}

echo $output;
 
$shortcode_css = '';

$shortcode_css .= $module_css;
if($color_scheme == 'design_your_own'){
/*Design Your Won CSS Start*/
$shortcode_css .= '#'.$zolo_heading_element_id.' .zolo-title span.title_text{color:'.$main_heading_color.';}';

/*Design Your Won CSS End*/
}else{
$shortcode_css .= '#'.$zolo_heading_element_id.' .zolo-title span.title_text{ display:inline-block;'.$color_scheme_css.'}';
}
$shortcode_css .= '#'.$zolo_heading_element_id.'.heading_style11 .zolo-sub-title span.zolo-sub-title-text,
#'.$zolo_heading_element_id.'.heading_style12 .zolo-sub-title span.zolo-sub-title-text{ background:'.$sub_title_bg_color.'; padding:7px 15px;}';

$shortcode_css .= '#'.$zolo_heading_element_id.' .delimiter_style_line { display:inline-block; border-bottom:'.$delimiter_lineheight.'px '.$delimiter_linestyle.' '.$delimiter_linecolor.';width:'.$delimiter_linewidth.'px;}';

$shortcode_css .= '#'.$zolo_heading_element_id.' .zolo_icon{ font-size:'.$delimiter_icon_size.'px; color:'.$icon_color.';}';
$shortcode_css .= '#'.$zolo_heading_element_id.' .zolo_icon.circle_background,
#'.$zolo_heading_element_id.' .zolo_icon.square_background{ background:'.$icon_background_color.';}';

$shortcode_css .= '#'.$zolo_heading_element_id.' .zolo_icon.design_your_own{ width:'.$icon_background_size.'px; height:'.$icon_background_size.'px;line-height:'.$icon_background_size.'px;background:'.$icon_background_color.';border:'.$icon_border_width.'px '.$icon_border_style.' '.$icon_border_color.'; -moz-border-radius:'.$icon_border_radius.'px; -webkit-border-radius:'.$icon_border_radius.'px;-ms-border-radius:'.$icon_border_radius.'px;-o-border-radius:'.$icon_border_radius.'px;border-radius:'.$icon_border_radius.'px;}';

$shortcode_css .= '#'.$zolo_heading_element_id.' .space_between_line_icon{ padding:0 '.$space_between_line_icon.'px; display:inline-block; position:relative;}';

if($delimiter_line_width){$delimiter_line_width_value = $delimiter_line_width; }else{ $delimiter_line_width_value = '9999';}

$shortcode_css .= '#'.$zolo_heading_element_id.' .space_between_line_icon:before,
#'.$zolo_heading_element_id.' .space_between_line_icon:after{border-bottom:'.$delimiter_lineheight.'px '.$delimiter_linestyle.' '.$delimiter_linecolor.';width:'.$delimiter_line_width_value.'px;}';

$shortcode_css .='#'.$zolo_heading_element_id.' .apcore-clipping-overlay{ background:'.$clipping_color.'}';

apcore_save_plugin_dyn_styles( $shortcode_css );
