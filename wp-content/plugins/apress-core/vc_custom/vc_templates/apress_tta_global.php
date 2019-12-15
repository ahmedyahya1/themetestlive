<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Accordion|WPBakeryShortCode_VC_Tta_Tabs|WPBakeryShortCode_VC_Tta_Tour|WPBakeryShortCode_VC_Tta_Pageable
 */
$an_class = $data_delay = $data_animation = $tab_border_radius = $full_width_tabs = $active_tab_title_color = $tab_title_color = $tab_highlight_border = $active_tab_color = $color_scheme = $style = $tab_background_color = $class = $tab_border_color = $tab_title_font_options = $tab_title_google_fonts = $tab_title_custom_fonts = $active_tab_icon_color = $icon_size = $tab_icon_color = $tab_panel_body_padding = $icon_position = $box_shadow = $box_shadow_tour = $top_bottom_padding = '';

$gutter_space = '';

$type = $this->getShortcode();
if (!function_exists("check_property")) {

	function check_property(&$property) {
		$result = (isset($property) && (!empty($property) || $property == 0));
		if (is_int($property) && $result) {
			return $property >= 0;
		}
		if ($result) {
			return true;
		}
		return false;
	}
}
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
extract( $atts );

$this->setGlobalTtaInfo();

$this->enqueueTtaStyles();
$this->enqueueTtaScript();



$style = check_property($style) ? esc_attr($style) : "";
$tab_background_color = check_property($tab_background_color) ? esc_attr($tab_background_color) : "";
$tab_border_color = check_property($tab_border_color) ? esc_attr($tab_border_color) : "";
$color_scheme = check_property($color_scheme) ? esc_attr($color_scheme) : "";
$active_tab_color = check_property($active_tab_color) ? esc_attr($active_tab_color) : "";
$tab_highlight_border = check_property($active_tab_highlight_border_height) ? esc_attr($active_tab_highlight_border_height) : "";
$tab_title_color = check_property($tab_title_color) ? esc_attr($tab_title_color) : "";
$active_tab_title_color = check_property($active_tab_title_color) ? esc_attr($active_tab_title_color) : "";
$full_width_tabs = check_property($full_width_tabs) ? esc_attr($full_width_tabs) : "";
$tab_border_radius = check_property($tab_border_radius) ? esc_attr($tab_border_radius) : "";
$tab_panel_body_padding = check_property($tab_panel_body_padding) ? esc_attr($tab_panel_body_padding) : "";
$class = check_property($class) ? esc_attr($class) : "";
$data_animation = check_property($data_animation) ? esc_attr($data_animation) : "";
$data_delay = check_property($data_delay) ? esc_attr($data_delay) : "";
$tab_background_dimension = check_property($tab_background_dimension) ? esc_attr($tab_background_dimension) : "";

//Accordion
$gutter_space = check_property($gutter_space) ? esc_attr($gutter_space) : "";

$tour_panel_body_padding = check_property($tour_panel_body_padding) ? esc_attr($tour_panel_body_padding) : "";


if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 

$color_scheme_bg_css = apcore_shortcodes_background_color_scheme($key);

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
if(substr_count($box_shadow_tour, 'disable') == 0) {
	$boxshadow_tour = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow_tour);
}

$id = uniqid();
//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

// It is required to be before tabs-list-top/left/bottom/right for tabs/tours
$prepareContent = $this->getTemplateVariable( 'content' );

$class_to_filter = $this->getTtaGeneralClasses();
$class_to_filter.=" " . $type . " ".$style." ";

$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );
$output = '<div class="apress_tabs_block '.$an_class.' '.$animatedclass.'" id="tabid_' . $id . '" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'">';

$output .= '<div ' . $this->getWrapperAttributes() . '>';
$output .= $this->getTemplateVariable( 'title' );
$output .= '<div class="' . esc_attr( $css_class ) . '">';
$output .= $this->getTemplateVariable( 'tabs-list-top' );
$output .= $this->getTemplateVariable( 'tabs-list-left' );
$output .= '<div class="vc_tta-panels-container ' . $style . '">';
$output .= $this->getTemplateVariable( 'pagination-top' );
$output .= '<div class="vc_tta-panels">';
$output .= $prepareContent;
$output .= '</div>';
$output .= $this->getTemplateVariable( 'pagination-bottom' );
$output .= '</div>';
$output .= $this->getTemplateVariable( 'tabs-list-bottom' );
$output .= $this->getTemplateVariable( 'tabs-list-right' );
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';

echo $output;
$id = "#tabid_" . $id;

/*------------------------------Tabs-------------------------------------*/
 if ($this->layout =="tabs") :
	
	$apress_tabs_style = '';
	
	if(isset($tab_title_font_options) && $tab_title_font_options != '' || isset($tab_title_custom_fonts) && $tab_title_custom_fonts != '') {
		$title_options = _zolo_parse_text_shortcode_params($tab_title_font_options, '', $tab_title_google_fonts, $tab_title_custom_fonts);
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title a,
			'.$id.'.apress_tabs_block .vc_tta-tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a {'.esc_attr($title_options["style"]).'}';
	}
	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:before,'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:after{display:none;}';
	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{padding:0.7em 2em;background:none;}';
	
	
///tabs Container Background Color Start
if($style == 'tab_style2' || $style == 'tab_style4' || $style == 'tab_style6' || $style == 'tab_style7' || $style == 'tab_style8' || $style == 'tab_style9' || $style == 'tab_style11'){
	
	if(isset($tab_background_color) && $tab_background_color != '') {
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{background: '.$tab_background_color.';}';
	}
	
}else if($style == 'tab_style1'){
	
	if(isset($tab_background_color) && $tab_background_color != '') {
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tabs.tab_style1 .vc_tta-tabs-container,'
		.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{background: '.$tab_background_color.';}';
	}
}
///tabs Container Background Color End
	
//active tab Background Color	
if($style == 'tab_style1' || $style == 'tab_style2' || $style == 'tab_style4' || $style == 'tab_style6' || $style == 'tab_style7' || $style == 'tab_style8' || $style == 'tab_style9' || $style == 'tab_style11'){
	
	if($color_scheme == 'design_your_own'){
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_active .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:hover,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a{background:'.$active_tab_color.';}';
	}else{
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_active .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:hover,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a{'.$color_scheme_bg_css.';}';
	}
	
}else if($style == 'tab_style3' || $style == 'tab_style5' || $style == 'tab_style10'){
		
	if($color_scheme == 'design_your_own'){
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active:after{background:'.$active_tab_color.';}';
	}else{
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active:after{'.$color_scheme_bg_css.';}';
		}
	}
	
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child a{border-left:1px solid '.$tab_border_color.';}';

//Tab Style 1
if($style == 'tab_style1'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container{border:1px solid '.$tab_border_color.'; border-left:0px; border-right:0px; }';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:0px;border-right:1px solid '.$tab_border_color.';}';
	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title{border:1px solid '.$tab_border_color.';}';
}


//Tab Style 2
if($style == 'tab_style2'){
if($full_width_tabs == 'yes'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list{ -moz-box-direction: normal; -moz-box-orient: horizontal; display: flex; flex-flow: row wrap;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li{-moz-box-flex: 1;flex-grow: 1;}';
	}
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:1px solid '.$tab_border_color.';border-left:0px}';
}

//Tab Style 3
if($style == 'tab_style3'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:after,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after{height:'.$tab_highlight_border.'px;}';

if($full_width_tabs == 'yes'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list{ -moz-box-direction: normal; -moz-box-orient: horizontal; display: flex; flex-flow: row wrap;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li{-moz-box-flex: 1;flex-grow: 1;}';
	}
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:1px solid '.$tab_border_color.';border-left:0px}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title{border:1px solid '.$tab_border_color.';}';
}

//Tab Style 4
if($style == 'tab_style4'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list{ -moz-box-direction: normal; -moz-box-orient: horizontal; display: flex; flex-flow: row wrap;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li{-moz-box-flex: 1;flex-grow: 1;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs.tab_style4{'.$box_shadow.';}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:0px;border-right:1px solid '.$tab_border_color.';border-bottom:1px solid '.$tab_border_color.';}';
	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title{border:0px;border-top:1px solid '.$tab_border_color.';}';
	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child a{border-left:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:last-child a{border-right:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:1px solid '.$tab_border_color.';border-left:0px}';
}

//Tab Style 5
if($style == 'tab_style5'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{margin:0 0.7em;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{padding:0.7em 0;border:0px;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child a{border-left:0;}';
	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:before,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:before{background:'.$tab_border_color.';}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:after,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:before,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:before{height:'.$tab_highlight_border.'px;}';
}

//Tab Style 6 & 7
if($style == 'tab_style6' || $style == 'tab_style7'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{margin:0 6px;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child{margin-left:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:last-child{margin-right:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:1px solid '.$tab_border_color.';}';
}

//Tab Style 8 & 9
if($style == 'tab_style8' || $style == 'tab_style9'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{margin:0 6px; border-radius:'.$tab_border_radius.'px;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child{margin-left:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:last-child{margin-right:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:1px solid '.$tab_border_color.'; border-radius:'.$tab_border_radius.'px;}';
}
if($style == 'tab_style7' || $style == 'tab_style9'){
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:0px}';
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container,'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list{overflow: visible;}';
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{margin:0 14px;}';	
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:hover,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_active .vc_tta-panel-heading .vc_tta-panel-title,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:hover,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active{'.$box_shadow.';}';	
}

//Tab Style 10
if($style == 'tab_style10'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{margin:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{padding:0.7em 0.8em;border:0px;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child a{border-left:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:before,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list:before{background:'.$tab_border_color.';}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:before,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:after,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after,
	'.$id.'.apress_tabs_block .apress_tta_tabs.tab_style10 .vc_tta-tabs-container .vc_tta-tabs-list:before{height:'.$tab_highlight_border.'px;}';
}

//Tab Style 11
if($style == 'tab_style11'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list{display: flex; flex-flow: row wrap;justify-content: space-between;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{border-radius:'.$tab_background_dimension.'px;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{display:inline-block;border:0px; border-radius:'.$tab_background_dimension.'px;padding:0;height:'.$tab_background_dimension.'px;line-height:'.$tab_background_dimension.'px;width:'.$tab_background_dimension.'px;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child a{border-left:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs.tab_style11 .vc_tta-tabs-container .vc_tta-tabs-list:after{background:'.$tab_border_color.';}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list{overflow: visible;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_active .vc_tta-panel-heading .vc_tta-panel-title,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:hover,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:hover,
	'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active{'.$box_shadow.';}';	
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title a{padding: 0;}';
}

//Tab Title Color
	if(isset($tab_title_color) && $tab_title_color != '') {
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title a,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{color:'.$tab_title_color.';}';
	}
//Active Tab Title Color
	if(isset($active_tab_title_color) && $active_tab_title_color != '') {
		$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title a:hover,
		 '.$id.'.apress_tabs_block .apress_tta_tabs .vc_active .vc_tta-panel-heading .vc_tta-panel-title a,
		 '.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover,
		'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a{color:'.$active_tab_title_color.';}';
	}

//Icon Style
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc_tta-icon{color:'.$tab_icon_color.';font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;vertical-align: middle; text-decoration: none;}';

$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_active .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panel-heading .vc_tta-panel-title:hover a .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a .vc_tta-icon{color:'.$active_tab_icon_color.';}';
$apress_tabs_style .= '.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc-mono::before{font-size:'.$icon_size.'px; line-height:'.$icon_size.'px;vertical-align: middle;}';

//Panel Body Padding
$tab_panel_body_padding = Zolo_Param_Padding::paddings_css($tab_panel_body_padding);
$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-panels-container .vc_tta-panel-body{'.$tab_panel_body_padding.';border:0px;}';

if($icon_position == 'icon_top'){
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc_tta-title-text{margin-left:0; display: block;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc_tta-icon{margin-left:0;}';
	$apress_tabs_style .= $id.'.apress_tabs_block .apress_tta_tabs .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{text-align:center;}';
	}
	

	
	apcore_save_plugin_dyn_styles( $apress_tabs_style );
	
	endif;
	
/*------------------------Accordion---------------------------------------*/
if ($this->layout =="accordion") :
		 
	$accordion_styles = '';
			
	//Font Style
	if(isset($tab_title_font_options) && $tab_title_font_options != '' || isset($tab_title_custom_fonts) && $tab_title_custom_fonts != '') {
		$title_options = _zolo_parse_text_shortcode_params($tab_title_font_options, '', $tab_title_google_fonts, $tab_title_custom_fonts);
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title{'.esc_attr($title_options["style"]).'}';
		
	}
	$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel{margin-bottom: '.$gutter_space.'px;}';

		
	$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title{padding:0px;}';	
	$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading{border:0px;}';	
		
	///accordion Background Color Start
	if($style == 'accordion_style1' || $style == 'accordion_style2' || $style == 'accordion_style3'){
		
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading{background: '.$tab_background_color.';}';
	
	}
	//active accordion Background Color	
	if($style == 'accordion_style1' || $style == 'accordion_style2' || $style == 'accordion_style3'){
		if($color_scheme == 'design_your_own'){
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading,
			'.$id.'.apress_tabs_block  .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading:hover{background:'.$active_tab_color.';}';
		}else{
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading,
			'.$id.'.apress_tabs_block  .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading:hover{'.$color_scheme_bg_css.'}';
		}
	}



	if($style == 'accordion_style1' || $style == 'accordion_style2' || $style == 'accordion_style3' || $style == 'accordion_style4' || $style == 'accordion_style5' || $style == 'accordion_style6'){
	 
	 if($top_bottom_padding != ''){$topbottom_padding = $top_bottom_padding.'px'; }else{$topbottom_padding = '18px';}
	 
	}else if($style == 'accordion_style7' || $style == 'accordion_style8' || $style == 'accordion_style9'){
		
		if($top_bottom_padding != ''){$topbottom_padding = $top_bottom_padding.'px'; }else{$topbottom_padding = '5px';}
	}
	
	//Style 1
	if($style == 'accordion_style1'){
	$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 20px;}';	
	}

	//Style 2
	if($style == 'accordion_style2'){
		if ( is_rtl() ){
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 50px '.$topbottom_padding.' 20px;}';	
		}else{
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 20px '.$topbottom_padding.' 50px;}';
		}
}
	//Style 3
	if($style == 'accordion_style3'){
		if ( is_rtl() ){
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 70px '.$topbottom_padding.' 20px;}';	
		}else{
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 20px '.$topbottom_padding.' 70px;}';
		}
}

	//Style 4
	if($style == 'accordion_style4'){
		if ( is_rtl() ){
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 70px '.$topbottom_padding.' 20px;}';
		}else{
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 20px '.$topbottom_padding.' 70px;}';
		}
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{border:1px solid '.$tab_border_color.';}';	
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style4 .vc_tta-panel .vc_tta-panel-heading:after{background: '.$tab_background_color.';}';	
	}

	//Style 5 & 6
	if($style == 'accordion_style5' || $style == 'accordion_style6'){
		if ( is_rtl() ){
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 50px '.$topbottom_padding.' 20px;}';
		}else{
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 20px '.$topbottom_padding.' 50px;}';
		}
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{border:1px solid '.$tab_border_color.';}';	
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading:after{background: '.$tab_background_color.';}';	
	}


	//Style 7, 8 & 9
	if($style == 'accordion_style7' || $style == 'accordion_style8' || $style == 'accordion_style9'){
			
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 0;}';
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title{display:inline-block; position:relative;}';
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:before,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:before,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style7 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style7 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:before{height: '.$tab_highlight_border.'px;}';	
		
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:before,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:before,
		'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style7 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:before{background: '.$tab_border_color.';}';	
		
		if($color_scheme == 'design_your_own'){
				$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
				'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
				'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style7 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after{ background:'.$active_tab_color.';}';
			}else{
				$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
				'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after,
				'.$id.'.apress_tabs_block .vc_tta-accordion.accordion_style7 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title:after{'.$color_scheme_bg_css.'}';
			}
	}
	if($style == 'accordion_style8'){
		if ( is_rtl() ){
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 30px '.$topbottom_padding.' 0;}';
		}else{
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 0 '.$topbottom_padding.' 30px;}';
		}
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style8 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title{display:block; position:relative;}';
	}
	if($style == 'accordion_style9'){
		if ( is_rtl() ){
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 0px '.$topbottom_padding.' 30px;}';
		}else{
			$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{padding:'.$topbottom_padding.' 30px '.$topbottom_padding.' 0;}';
		}
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion.accordion_style9 .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title{display:block; position:relative;}';
	}

	//box_shadow
	if($style == 'accordion_style1' || $style == 'accordion_style2' || $style == 'accordion_style3' || $style == 'accordion_style4' || $style == 'accordion_style5' || $style == 'accordion_style6'){
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading{'.$box_shadow.';}';
	
	}

	//Tab Title Color
	if(isset($tab_title_color) && $tab_title_color != '') {
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a{color:'.$tab_title_color.';}';
		
	}
	//Active Tab Title Color
	if(isset($active_tab_title_color) && $active_tab_title_color != '') {
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:hover,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a{color:'.$active_tab_title_color.';}';	
	}

	//plus Icon color
	if($style == 'accordion_style2' || $style == 'accordion_style3' || $style == 'accordion_style8' || $style == 'accordion_style9'){
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:before{background:'.$tab_title_color.';}';
			
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a:before,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:hover:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:hover:before{background:'.$active_tab_title_color.';}';
	}else if($style == 'accordion_style4' || $style == 'accordion_style5' || $style == 'accordion_style6'){
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:before{background:#ffffff;}';
			
		$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a:before,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:hover:after,
		'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:hover:before{background:#ffffff;}';
	}

//Icon Style
$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-icon{color:'.$tab_icon_color.';font-size:'.$icon_size.'px;}';

$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-icon,
'.$id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panel .vc_tta-panel-heading .vc_tta-panel-title a:hover .vc_tta-icon{color:'.$active_tab_icon_color.';}';


$accordion_styles .= $id.'.apress_tabs_block .vc_tta-accordion .vc_tta-panels-container .vc_tta-panel-body{padding:0px;border:0px;}';
	apcore_save_plugin_dyn_styles( $accordion_styles );	
	endif;
	
    /*----------------------------- Tour----------------------------------*/
	
	$apress_tour_styles = '';
	
	//Font Style
	if(isset($tab_title_font_options) && $tab_title_font_options != '' || isset($tab_title_custom_fonts) && $tab_title_custom_fonts != '') {
		$title_options = _zolo_parse_text_shortcode_params($tab_title_font_options, '', $tab_title_google_fonts, $tab_title_custom_fonts);
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title a,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tab a{'.esc_attr($title_options["style"]).'}';
	}
 
// Tour Style 1
if($style == 'tour_style1'){
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title a{padding:14px 0px!important;}';
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{padding:0.7em 0;border:0px;}';
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:first-child a{border-left:0;}';
	
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:before,
	'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:before{background:'.$tab_border_color.';}';
	
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:after,
	'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:before,
	'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after,
	'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:before{height:'.$tab_highlight_border.'px;}';
	
	if($color_scheme == 'design_your_own'){
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after{background:'.$active_tab_color.';}';
	}else{
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:after,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab:after{'.$color_scheme_bg_css.';}';
		}
}
// Tour Style 2 & 3
if($style == 'tour_style2' || $style == 'tour_style3'){
	
	if(isset($tab_background_color) && $tab_background_color != '') {
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{background: '.$tab_background_color.';}';
	}
	
	if($color_scheme == 'design_your_own'){
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_active .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:hover,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a{background:'.$active_tab_color.';}';
		
	}else{
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_active .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:hover,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a{'.$color_scheme_bg_css.';}';
	}
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{padding:0.5em 1em;}';
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab{margin:0 0 6px;}';
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border:0px;}';
	
	if(substr_count($box_shadow_tour, 'disable') == 0) {
		
		$apress_tour_styles .= '.wpb-js-composer ' .$id.'.apress_tabs_block .vc_tta-tabs.apress_tta_tour .vc_tta-tabs-list,
		.wpb-js-composer ' .$id.'.apress_tabs_block .vc_tta-tabs.apress_tta_tour .vc_tta-tabs-container{overflow: visible;}';
		
		$apress_tour_styles .= '.wpb-js-composer ' .$id.'.apress_tabs_block .vc_tta-tabs.apress_tta_tour .vc_tta-tabs-list li.vc_tta-tab{margin:0 0 26px;}';
		$apress_tour_styles .= '.wpb-js-composer ' .$id.'.apress_tabs_block .vc_tta-tabs.apress_tta_tour .vc_tta-tabs-list li.vc_tta-tab.vc_active a,'
		.$id.'.apress_tabs_block .apress_tta_tour .vc_active .vc_tta-panel-heading .vc_tta-panel-title a{'.$boxshadow_tour.'}';
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_active .vc_tta-panel-heading .vc_tta-panel-title{margin-bottom:26px!important;}';
		
		
		}
	
}

// Tour Style 3
if($style == 'tour_style3'){
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{border-radius:'.$tab_border_radius.'px;}';
}
	
//Tab Title Color
	if(isset($tab_title_color) && $tab_title_color != '') {
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title a,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tab a{color:'.$tab_title_color.';}';
		
	}
//Active Tab Title Color
	if(isset($active_tab_title_color) && $active_tab_title_color != '') {
		$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title a:hover,
		 '.$id.'.apress_tabs_block .apress_tta_tour .vc_active .vc_tta-panel-heading .vc_tta-panel-title a,
		 '.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tab a:hover,
		'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tab.vc_active a{color:'.$active_tab_title_color.';}';	
	}

//Panel Body Padding
$tour_panel_body_padding = Zolo_Param_Padding::paddings_css($tour_panel_body_padding);
$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panels-container .vc_tta-panel-body{'.$tour_panel_body_padding.';border:0px;}';


//Icon Style
$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc_tta-icon{color:'.$tab_icon_color.';font-size:'.$icon_size.'px;line-height:'.$icon_size.'px;vertical-align: middle; text-decoration: none;}';

$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_active .vc_tta-panel-heading .vc_tta-panel-title a .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-panel-heading .vc_tta-panel-title:hover a .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a:hover .vc_tta-icon,
'.$id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab.vc_active a .vc_tta-icon{color:'.$active_tab_icon_color.';}';
$apress_tour_styles .= '.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc-mono::before{font-size:'.$icon_size.'px; line-height:'.$icon_size.'px;vertical-align: middle;}';

if($icon_position == 'icon_top'){
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc_tta-title-text{margin-left:0; display: block;}';
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a .vc_tta-icon{margin-left:0;}';
	$apress_tour_styles .= $id.'.apress_tabs_block .apress_tta_tour .vc_tta-tabs-container .vc_tta-tabs-list li.vc_tta-tab a{text-align:center;}';
}
apcore_save_plugin_dyn_styles( $apress_tour_styles );	