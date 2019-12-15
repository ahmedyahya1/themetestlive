<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$uniqid = uniqid(rand());
$zolo_process_wrap = 'zolo_process_wrap_'.$uniqid;

if($conector_enable == 'yes'){	
	$conectortype = 'conector_type_'.$conector_type;
	$conectorenable = 'conector_enable';
}else{
	$conectortype = '';
	$conectorenable = 'conector_disable';
	}
	
$output .= '<div class="apress_process_parent_wrap apress_process_col_'.$process_item_per_row.' '.$conectortype.' '.$conectorenable.' '.$zolo_process_wrap.' '.$el_class.'"><div class="apress_process_list">';
$output .= do_shortcode($content);
$output .= '</div>';
$output .= '</div>';

print $output;

$custom_css = '';
if($conector_type == 'solid'){
	$custom_css .= '.'.$zolo_process_wrap.' .zolo_process_element.process_style1 .zolo_process_icon_wrap:after{ border:1px solid '.$conector_color.';}';	
}else{
	$custom_css .= '.'.$zolo_process_wrap.' .zolo_process_element.process_style1 .zolo_process_icon_wrap:after{ border:1px dashed '.$conector_color.';}';	
}
apcore_save_plugin_dyn_styles( $custom_css );