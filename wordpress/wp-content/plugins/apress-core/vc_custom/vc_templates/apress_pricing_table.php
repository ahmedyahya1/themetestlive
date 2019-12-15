<?php 
/*-----------------------------------------------------------------------------------*/
/* Pricing Table
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'						=> 'pricing_table_style1',
	'content_alignment'			=> 'center',
	'color_scheme'				=> 'default_button_color_scheme',
	'main_bg_color'				=> '#ffffff',
	'highlight_color'			=> '#5270d0',
	'title'						=> 'Pricing Title',
	'currency_symbol'			=> '$',
	'price'						=> '29',
	'recurring_fee'				=> '/mo',
	'featured_pricing'			=> 'on',
	'pricing_box_swing'			=> 'on',
	'pricing_shadow'			=> 'yes',
	'price_table_height'		=> '',
	'enable_icon'				=> 'no',
	'icon_to_display'			=> 'icon',
	'icon_family'				=> '',
	'icon_fontawesome'			=> 'fa fa-adjust',
	'icon_openiconic'			=> 'vc-oi vc-oi-dial',
	'icon_typicons'				=> 'typcn typcn-adjust-brightness',
	'icon_entypo'				=> 'entypo-icon entypo-icon-note',
	'icon_linecons'				=> 'vc_li vc_li-heart',
	'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
	'icon_linea'				=> 'icon-basic-heart',
	'upload_image'				=> '',
	'icon_size'					=> '40',
	'button_text'				=> 'Button text',
	'button_size'				=> 'small',
	'padding_top_bottom'		=> '15',
	'padding_right_left'		=> '25',
	'button_shape' 				=> 'square',
	'button_hover_style'		=> 'hoverstyle1',
	'button_link' 				=> '',
	'button_bg_color'			=> '#5295ea',
	'button_bg_color_h'			=> '#418aea',
	'button_text_color'			=> '#ffffff',
	'button_text_color_h'		=> '#ffffff',
	'button_border_color'		=> '#5295ea',
	'button_border_color_h'		=> '#418aea',
	
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	
	'currency_symbol_font_options'	=> '',
	'currency_symbol_google_fonts'	=> '',
	'currency_symbol_custom_fonts'	=> '',
	
	'price_font_options'		=> '',
	'price_google_fonts'		=> '',
	'price_custom_fonts'		=> '',
	
	'recurring_fee_font_options'	=> '',
	'recurring_fee_google_fonts'	=> '',
	'recurring_fee_custom_fonts'	=> '',
	
	'content_features_font_options'	=> '',
	'content_features_google_fonts'	=> '',
	'content_features_custom_fonts'	=> '',
	
	'button_font_options'		=> '',
	'button_google_fonts'		=> '',
	'button_custom_fonts'		=> '',
	
	'label'						=> '',
	'label_font_options'		=> '',
	'label_google_fonts'		=> '',
	'label_custom_fonts'		=> '',
	'label_bg_color'			=> '',
	
	'box_styling_enable'		=> 'no',
	'box_bg_color_scheme'		=> 'primary_color_scheme',
	'box_bg_color'				=> '',
	'box_bg_color_opacity'		=> '1',
	'box_bg_image'				=> '',
	'box_hover_bg_color_scheme'	=> 'primary_color_scheme',
	'box_hover_bg_color'		=> '',
	'box_hover_bg_color_opacity'=> '1',
	'box_hover_bg_image'		=> '',
	'box_hover_text_color'		=> '',
		
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

if($featured_pricing == 'yes'){
	$featured_class = 'featured_'.$featured_pricing;
}else{
	$featured_class = 'featured_no';
}

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

global $apress_data;
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
	$zolo_pricing_table_id = 'zolo_pricing_table_element_'.$uniqid;
	
	$pricing_table_html = $title_html = $currency_symbol_html = $price_html = $recurring_fee_html = $content_features_html = $button_html = $label_class_for_wrap = $label_html = '';
	
	$title_google_fonts = 'yes';
	
if($color_scheme == 'design_your_own'){
	$key = '';
	
	$highlight_background = 'background:'.$highlight_color;
	$text_color = 'color:'.$highlight_color;
	$border_color = 'border-color:'.$highlight_color;

	
}else{
	$key = $color_scheme;
	
$color_scheme_css_for_background = apcore_shortcodes_background_color_scheme($key);
$color_scheme_css_for_text = apcore_shortcodes_text_color_scheme($key);
$color_scheme_css_for_border = apcore_shortcodes_border_color_scheme($key);

$highlight_background = $color_scheme_css_for_background;
$text_color = $color_scheme_css_for_text;
$border_color = $color_scheme_css_for_border;

} 

if($box_bg_color_scheme == 'design_your_own'){
	$key = '';
	
	$box_background_color_scheme = 'background:'.$box_bg_color;
}else{
	$key = $box_bg_color_scheme;
	$box_background_color_scheme = apcore_shortcodes_background_color_scheme($key);
	}
if($box_hover_bg_color_scheme == 'design_your_own'){
	$key = '';
	
	$box_hover_background_color_scheme = 'background:'.$box_hover_bg_color;
}else{
	$key = $box_hover_bg_color_scheme;
	$box_hover_background_color_scheme = apcore_shortcodes_background_color_scheme($key);
	}

$button_wrap_class[] = 'zolo_button_'.$button_hover_style;
$button_wrap_class[] = 'zolo_pricing_table_button';

$button_class[] = 'zolo_button';
$button_class[] = 'zolo_button_'.$button_shape;
$button_class[] = 'zolo_button_size_'.$button_size;
$button_class[] = 'zolo_ripplelink';
$button_class = implode( ' ', $button_class );
$button_wrap_class = implode( ' ', $button_wrap_class );


/* 	link 	*/
$href = $url = $link_title = $target = $rel = '';
if($button_link!='') {
	$href 			= 	vc_build_link($button_link);
	$url 			= ( isset( $href['url'] ) && $href['url'] !== '' ) ? $href['url']  : '';
	$target 		= ( isset( $href['target'] ) && $href['target'] !== '' ) ? "target='" . esc_attr( trim( $href['target'] ) ) . "'" : '';
	$link_title 	= ( isset( $href['title'] ) && $href['title'] !== '' ) ? "title='".esc_attr($href['title'])."'" : '';
	$rel 			= ( isset( $href['rel'] ) && $href['rel'] !== '' ) ? "rel='".esc_attr($href['rel'])."'" : '';
}

$img = wp_get_attachment_image_src($box_bg_image,'full');
$box_bg_image_url = $img[0];
$img = wp_get_attachment_image_src($box_hover_bg_image,'full');
$box_hover_bg_image_url = $img[0];
?>
<?php

	// Label HTML.
	if (!empty($label)) {
		$label_class_for_wrap = 'label_added';
		$label_options = _zolo_parse_text_shortcode_params($label_font_options, '', $label_google_fonts, $label_custom_fonts);
		$label_html .= '<span class="zolo_pricing_table_label" ' . $label_options['style'] . '>' . esc_html($label) . '</span>';
	}
	
	// Title HTML.
	if (!empty($title)) {
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_pricing_table_title', $title_google_fonts, $title_custom_fonts);
		$title_html .= '<' . $title_options['tag'] . ' class="zolo_pricing_table_title ' . $title_options['class'] . '" ' . $title_options['style'] . '>' . esc_html($title) . '</' . $title_options['tag'] . '>';
	}
	
	// Currency Symbol HTML.
	if (!empty($currency_symbol)) {
		$currency_symbol_options = _zolo_parse_text_shortcode_params($currency_symbol_font_options, 'zolo_pricing_table_currency_symbol', $currency_symbol_google_fonts, $currency_symbol_custom_fonts);
		$currency_symbol_html .= '<span class="zolo_pricing_table_currency_symbol ' . $currency_symbol_options['class'] . '" ' . $currency_symbol_options['style'] . '>' . esc_html($currency_symbol) . '</span>';
	}
	
	// Price Symbol HTML.
	if (!empty($price)) {
		$price_options = _zolo_parse_text_shortcode_params($price_font_options, 'zolo_pricing_table_price', $price_google_fonts, $price_custom_fonts);
		$price_html .= '<span class="zolo_pricing_table_price ' . $price_options['class'] . '" ' . $price_options['style'] . '>' . esc_html($price) . '</span>';
	}
	// Recurring Fee HTML.
	if (!empty($recurring_fee)) {
		$recurring_fee_options = _zolo_parse_text_shortcode_params($recurring_fee_font_options, 'zolo_pricing_table_recurring_fee', $recurring_fee_google_fonts, $recurring_fee_custom_fonts);
		$recurring_fee_html .= '<span class="zolo_pricing_table_recurring_fee ' . $recurring_fee_options['class'] . '" ' . $recurring_fee_options['style'] . '>' . esc_html($recurring_fee) . '</span>';
	}
	
	// Content/Features HTML.
	if (!empty($content)) {
		$content_features_options = _zolo_parse_text_shortcode_params($content_features_font_options, 'zolo_pricing_table_content_features', $content_features_google_fonts, $content_features_custom_fonts);
		$content_features_html .= '<' . $content_features_options['tag'] . ' class="zolo_pricing_table_content_features ' . $content_features_options['class'] . '" ' . $content_features_options['style'] . '>' . wpb_js_remove_wpautop($content) . '</' . $content_features_options['tag'] . '>';
	}
	
	// Button HTML.
	if (!empty($button_text)) {
		$button_options = _zolo_parse_text_shortcode_params($button_font_options, 'zolo_pricing_table_button', $button_google_fonts, $button_custom_fonts);
		$button_html .= '<' . $button_options['tag'] . ' class="'.$button_wrap_class.' '. $button_options['class'] . '">';
		$button_html .= '<a class="'.$button_class.'" ' . $button_options['style'] . ' href="'.esc_url($url).'" '. $link_title .' '. $target .' '. $rel .'><span class="zolo_button_text">' . esc_html($button_text) . '</span></a>';
		$button_html .= '</' . $button_options['tag'] . '>';
	} 

if($enable_icon == 'yes'){
if($icon_to_display == 'icon'){
	$pricing_table_html .= '<div class="zolo_pricing_icon_wrap"><div class="pricing_icon" style=" line-height:'.$icon_size.'px;font-size:'.$icon_size.'px;"><i class="'.$icon.'"></i></div></div>';
}else if($icon_to_display == 'image'){
	$icon_img_src = wp_get_attachment_image_src($upload_image, 'full');
	$pricing_table_html .= '<div class="zolo_pricing_icon_wrap"><div class="pricing_image" style=" width:100%;max-width:'.$icon_size.'px;"><img alt="Icon Image" src="'.$icon_img_src[0].'"></div></div>';
	}
}

	$output = '<div class="zolo_pricing_table_box" style="text-align:'.$content_alignment.'"><div id="'.$zolo_pricing_table_id.'" class="zolo_pricing_table_element '.$style.' '.$label_class_for_wrap.' '.$featured_class.' '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';
	$output .= '<div class="zolo_pricing_table_element_bg"></div>';
	$output .= $label_html;
	$output .= '<div class="zolo_pricing_table_content">';
	$output .= $pricing_table_html;
	$output .= $title_html;
	$output .= '<div class="zolo_price_wrap">';
	$output .= $currency_symbol_html;
	$output .= $price_html;
	$output .= $recurring_fee_html;
	$output .= '</div>';
	$output .= $content_features_html;
	$output .= $button_html;
	$output .= '</div></div></div>';	
	echo $output;

$custom_css = '';
//box_styling_enable Start
if($box_styling_enable == 'yes'){

if($box_bg_image_url){
	$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element{background-image: url('.$box_bg_image_url.');}';
	 }
	 $custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:after{ opacity:'.$box_bg_color_opacity.'; '.$box_background_color_scheme.'}';

if($box_hover_bg_image_url){
 $custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element .zolo_pricing_table_element_bg{background-image: url('.$box_hover_bg_image_url.');}';
}
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element .zolo_pricing_table_element_bg:after{opacity:'.$box_hover_bg_color_opacity.';'.$box_hover_background_color_scheme.'}';

}
//box_styling_enable End 

$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element .zolo_pricing_table_label{ background:'.$label_bg_color.'}';
if($price_table_height){
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element{min-height:'.$price_table_height.'px;}';
}
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element.pricing_table_style2:before{'.$highlight_background.'}';
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element.pricing_table_style3 .zolo_pricing_table_title{ '.$highlight_background.'}';
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element .pricing_icon i{ '.$text_color.'}';

if($pricing_shadow == 'yes'){
 $custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element{box-shadow:0px 25px 60px rgba(0,0,0,0.2);}';
}
if($pricing_box_swing == 'yes'){
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element.featured_yes:hover{ top:-40px;}';
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover{ top:-20px;}';
}
$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element .zolo_button.zolo_button_size_design_your_own{padding:'.$padding_top_bottom.'px '.$padding_right_left.'px;}';

if($color_scheme == 'design_your_own'){
// Design Your Own CSS Start
$custom_css .= '#'.$zolo_pricing_table_id.' .zolo_button_hoverstyle1 .zolo_button,#'.$zolo_pricing_table_id.' .zolo_button{background:'.$button_bg_color.';color:'.$button_text_color.';border:1px solid '.$button_border_color.'}';

$custom_css .= '#'.$zolo_pricing_table_id.' .zolo_button:focus,#'.$zolo_pricing_table_id.' .zolo_button:hover{color:'.$button_text_color_h.';}';

$custom_css .= '#'.$zolo_pricing_table_id.' .zolo_button_hoverstyle1 .zolo_button:hover,#'.$zolo_pricing_table_id.' .zolo_button:after{background:'.$button_bg_color_h.';color:'.$button_text_color_h.'; border:1px solid '.$button_border_color_h.'; opacity:1;}';

//Design Your Own CSS End
}else{
$custom_css .= '#'.$zolo_pricing_table_id.' .zolo_button,#'.$zolo_pricing_table_id.' .zolo_button:focus,#'.$zolo_pricing_table_id.' .zolo_button:hover{'.$highlight_background.' color:'.$apress_data["button_text_color"].';}';

}


if($box_hover_text_color){
	$custom_css .= '#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover .zolo_pricing_table_title,
#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover .zolo_pricing_table_currency_symbol,
#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover .zolo_pricing_table_price,
#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover .zolo_pricing_table_recurring_fee,
#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover .zolo_pricing_table_content_features,
#'.$zolo_pricing_table_id.'.zolo_pricing_table_element:hover .zolo_pricing_table_content_features a{color:'.$box_hover_text_color.'!important;}';
}
apcore_save_plugin_dyn_styles( $custom_css );