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
$el_class = $css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
extract( $atts );

$this->setGlobalTtaInfo();

$this->enqueueTtaStyles();
$this->enqueueTtaScript();

// It is required to be before tabs-list-top/left/bottom/right for tabs/tours
$prepareContent = $this->getTemplateVariable( 'content' );

$class_to_filter = $this->getTtaGeneralClasses();
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


$c_align = empty($atts['c_align'])?'':$atts['c_align'];
$c_title_spacing = empty($atts['c_title_spacing'])?'':$atts['c_title_spacing'];
$c_title_spacing = empty($atts['c_title_spacing'])?'':$atts['c_title_spacing'];
$c_title_spacing = empty($atts['c_title_spacing'])?'':$atts['c_title_spacing'];
$c_content_spacing = empty($atts['c_content_spacing'])?'':$atts['c_content_spacing'];
$title_color = empty($atts['title_color'])?'':$atts['title_color'];
$title_bg_color = empty($atts['title_bg_color'])?'':$atts['title_bg_color'];
$border_color = empty($atts['border_color'])?'':$atts['border_color'];
$content_text_color = empty($atts['content_text_color'])?'':$atts['content_text_color'];
$content_bg_color = empty($atts['content_bg_color'])?'':$atts['content_bg_color'];
$ct_l_padding = empty($atts['ct_l_padding'])?'':$atts['ct_l_padding'];
$ct_r_padding = empty($atts['ct_r_padding'])?'':$atts['ct_r_padding'];

$ct_tb_padding = empty($atts['ct_tb_padding'])?'':$atts['ct_tb_padding'];
$cc_lr_padding = empty($atts['cc_lr_padding'])?'':$atts['cc_lr_padding'];
$icon_border = empty($atts['icon_border'])?'':$atts['icon_border'];
$c_position = empty($atts['c_position'])?'':$atts['c_position'];
$content_border_color = empty($atts['content_border_color'])?'':$atts['content_border_color'];

$accordian_titleborder = empty($atts['accordian_titleborder'])?'':$atts['accordian_titleborder'];


if($icon_border == 1){
	$icon_border_yesno = 'icon_border_yes';
	}else{
	$icon_border_yesno = 'icon_border_no';	
	}
$accordion_ran_id = RandomString(20);

$output = '<div ' . $this->getWrapperAttributes() . '>';
$output .= $this->getTemplateVariable( 'title' );
$output .= '<div id="accordion'.$accordion_ran_id.'" class="'.$icon_border_yesno.' '. esc_attr( $css_class ) . '">';
$output .= $this->getTemplateVariable( 'tabs-list-top' );
$output .= $this->getTemplateVariable( 'tabs-list-left' );
$output .= '<div class="vc_tta-panels-container">';
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

echo $output;


$ct_l_padding_bor = (int)$ct_l_padding + 14;
$ct_r_padding_bor = (int)$ct_r_padding + 14;

$icon_position_l = (int)$ct_l_padding / 2;
$icon_position_r = (int)$ct_r_padding / 2;


$c_content_spacing = (!empty($c_content_spacing) ? $c_content_spacing : '0');
$ct_l_padding_bor = (!empty($ct_l_padding_bor) ? $ct_l_padding_bor : '0');
$ct_r_padding_bor = (!empty($ct_r_padding_bor) ? $ct_r_padding_bor : '0');
$ct_l_padding = (!empty($ct_l_padding) ? $ct_l_padding : '0');
$ct_r_padding = (!empty($ct_r_padding) ? $ct_r_padding : '0');


// css start

$style = '';

if($c_position == 'left' && $icon_border == 1){ 

	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.icon_border_yes.vc_tta.vc_general .vc_tta-panel-heading .vc_tta-panel-title.vc_tta-controls-icon-position-left > a:before{ position:absolute; left:'.$ct_l_padding.'px; top:0; content:""; border-right:1px solid '.$border_color.';height:100%;}';
	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.icon_border_yes.vc_tta.vc_general .vc_tta-panel-heading .vc_tta-panel-title.vc_tta-controls-icon-position-left > a{ padding-left:'.$ct_l_padding_bor.'px}';


}elseif($c_position == 'right' && $icon_border == 1){
	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.icon_border_yes.vc_tta.vc_general .vc_tta-panel-heading .vc_tta-panel-title.vc_tta-controls-icon-position-right > a:before{ position:absolute; right:'.$ct_r_padding.'px; top:0; content:""; border-right:1px solid '.$border_color.';height:100%;}';
	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.icon_border_yes.vc_tta.vc_general .vc_tta-panel-heading .vc_tta-panel-title.vc_tta-controls-icon-position-right > a{ padding-right:'.$ct_r_padding_bor.'px}';

} 
if($accordian_titleborder == 'titleborder_all'){
	
	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-heading{border:1px solid '.$border_color.';}';
	
}elseif($accordian_titleborder == 'titleborder_bottom'){
	
	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-heading{border:0px;border-bottom:1px solid '.$border_color.';}';

}else{ 

	$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-heading{border:0px;}';
}

$style .= '#accordion'.$accordion_ran_id.' .vc_tta-panel{margin-bottom:'.$c_title_spacing.'px;}';
$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-heading{background:'.$title_bg_color.';}';
$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-heading h4{ padding:0;}';
$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-heading .vc_tta-panel-title > a{color:'.$title_color.';padding:'. $ct_tb_padding.'px '.$ct_r_padding.'px '.$ct_tb_padding.'px '.$ct_l_padding.'px;}';
$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-body{padding:'.$c_content_spacing.'px 0px '.$c_content_spacing.'px 0px; border:0;}';

$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general .vc_tta-panel-body .vc_tta-panel-body-content{color:'.$content_text_color.'; background:'. $content_bg_color.';padding-top:20px;padding-bottom:20px;padding:20px '.$cc_lr_padding.'px;border:1px solid '.$content_border_color.';display: flex;}';
$style .= '#accordion'.$accordion_ran_id.'.vc_tta.vc_tta-accordion .vc_tta-controls-icon-position-left .vc_tta-controls-icon{ left:'.$icon_position_l.'px;margin-left:-6px;}';
$style .= '#accordion'.$accordion_ran_id.'.vc_tta.vc_tta-accordion .vc_tta-controls-icon-position-right .vc_tta-controls-icon{ right:'.$icon_position_r.'px; margin-right:-6px;}';

$style .= '.vc_tta-container #accordion'.$accordion_ran_id.'.vc_tta.vc_general.vc_tta-tabs .vc_tta-panel-body .vc_tta-panel-body-content{ border:0; padding:20px 30px;}';
$style .= '#accordion'.$accordion_ran_id.'.vc_tta.vc_general.vc_tta-tabs .vc_tta-tab > a{ padding:7px 20px;}';
$style .= '#accordion'.$accordion_ran_id.'.vc_tta.vc_tta-style-outline.vc_tta-tabs .vc_tta-panels,
#accordion'.$accordion_ran_id.'.vc_tta.vc_tta-tabs.vc_tta-style-outline .vc_tta-panel-body, 
#accordion'.$accordion_ran_id.'.vc_tta.vc_tta-tabs.vc_tta-style-outline .vc_tta-panel-heading, 
#accordion'.$accordion_ran_id.'.vc_tta.vc_tta-tabs.vc_tta-style-outline .vc_tta-tab > a{ border-width:1px;}';

$style .= '#accordion'.$accordion_ran_id.'.vc_tta.vc_general.vc_tta-o-no-fill.vc_tta-tabs-position-left .vc_tta-panel-body .vc_tta-panel-body-content, 
#accordion'.$accordion_ran_id.'.vc_tta.vc_general.vc_tta-o-no-fill.vc_tta-tabs-position-right .vc_tta-panel-body .vc_tta-panel-body-content {
    padding-bottom: 0;
    padding-top: 0;
}';

$style .= '#accordion'.$accordion_ran_id.'.vc_tta.vc_general.vc_tta-o-no-fill.vc_tta-tabs-position-bottom .vc_tta-panel-body .vc_tta-panel-body-content, 
#accordion'.$accordion_ran_id.'.vc_tta.vc_general.vc_tta-o-no-fill.vc_tta-tabs-position-top .vc_tta-panel-body .vc_tta-panel-body-content {
    padding-left: 0;
    padding-right: 0;
}';
apcore_save_plugin_dyn_styles( $style );