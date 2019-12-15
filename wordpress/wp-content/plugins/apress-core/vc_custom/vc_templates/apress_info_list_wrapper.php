<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$uniqid = uniqid(rand());
$zolo_info_list_wrap = 'zolo_info_list_wrap_'.$uniqid;

if($conector_enable == 'yes'){	
	$conectortype = 'conector_type_'.$conector_type;
	$conectorenable = 'conector_enable';
}else{
	$conectortype = '';
	$conectorenable = 'conector_disable';
	}
	
$output .= '<div class="apress_info_list_parent_wrap '.$conectortype.' '.$conectorenable.' '.$zolo_info_list_wrap.' '.$el_class.'"><ul class="apress_info_list_items">';
$output .= do_shortcode($content);

$output .= '</ul>';
$output .= '</div>';

print $output;

$custom_css = '';
if($conector_type == 'solid'){
$custom_css .= '.'.$zolo_info_list_wrap.' .zolo_info_list_element .zolo_info_list_icon_wrap:after{ border:1px solid '.$conector_color.';}';	
}else{
$custom_css .= '.'.$zolo_info_list_wrap.' .zolo_info_list_element .zolo_info_list_icon_wrap:after{ border:1px dashed '.$conector_color.';}';	
}
apcore_save_plugin_dyn_styles( $custom_css );


