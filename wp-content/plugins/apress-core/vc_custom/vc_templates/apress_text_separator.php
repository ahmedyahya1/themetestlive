<?php 
/*-----------------------------------------------------------------------------------*/
/* Text Separator
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
extract(shortcode_atts(array(
	'title'						=> 'Title',
	'title_align'				=> 'separator_align_center',
	'align'						=> 'align_center',
	'color'						=> '',
	'style'						=> 'border',
	'border_width'				=> '',
	'el_width'					=> '',
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',	
	'el_class'					=> '',
	'css'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
), $atts));

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$zolo_sep_id = 'zolo_sep_'.$uniqid;

$title_html = $inline_css = '';

$class = 'vc_separator wpb_content_element';

$class .= ( '' !== $title_align ) ? ' vc_' . $title_align : '';
$class .= ( '' !== $el_width ) ? ' vc_sep_width_' . $el_width : ' vc_sep_width_100';
$class .= ( '' !== $style ) ? ' vc_sep_' . $style : '';
$class .= ( '' !== $border_width ) ? ' vc_sep_border_width_' . $border_width : '';
$class .= ( '' !== $align ) ? ' vc_sep_pos_' . $align : '';

$inline_css = 'style="border-color:'.$color.'"';

$title_google_fonts = 'yes';
$class_to_filter = $class;
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$css_class = esc_attr( trim( $css_class ) );

$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo-content-title-big', $title_google_fonts, $title_custom_fonts);

$title_html .= '<' . $title_options['tag'] . ' class="zolo-separator-title ' . $title_options['class'] . '" ' . $title_options['style'] . '>' . wpb_js_remove_wpautop($title) . '</' . $title_options['tag'] . '>';

echo '<div id="'.$zolo_sep_id.'" class="'.$css_class.' '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" ><span class="vc_sep_holder vc_sep_holder_l"><span '.$inline_css.' class="vc_sep_line"></span></span>'.$title_html.'<span class="vc_sep_holder vc_sep_holder_r"><span '.$inline_css.' class="vc_sep_line"></span></span>
</div>';

$custom_css = '';
// style 1
$custom_css .= '#'.$zolo_sep_id .'.vc_separator.vc_sep_style1 .zolo-separator-title{ background:'.$color.';}';
// style 2
$custom_css .= '#'.$zolo_sep_id .'.vc_separator.vc_sep_style2 .zolo-separator-title{ background:'.$color.';}';
$custom_css .= '#'.$zolo_sep_id .'.vc_separator.vc_sep_style2:before{background:'.$color.'; height:'.$border_width.'px;}';
// style 3
$custom_css .= '#'.$zolo_sep_id .'.vc_separator.vc_sep_style3 .zolo-separator-title:before,
#'.$zolo_sep_id .'.vc_separator.vc_sep_style3 .zolo-separator-title:after{background:'.$color.';}';
// style 4
$custom_css .= '#'.$zolo_sep_id .'.vc_separator.vc_sep_style4 .zolo-separator-title:before,
#'.$zolo_sep_id .'.vc_separator.vc_sep_style4 .zolo-separator-title:after{border-color:'.$color.';border-left:2px solid '.$color.';}';
// style 5
$custom_css .= '#'.$zolo_sep_id .'.vc_separator.vc_sep_style5{background:'.$color.';}';
apcore_save_plugin_dyn_styles( $custom_css );