<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
# Usage - 
	array(
		"type"             => "zolo_param_heading",
		"param_name"       => "Parameter Name",
		"text"             => __( "Heading Text", "apcore" ),
		"value"            => "",
		"class"            => ""
	)
*/
if(!class_exists('Zolo_Heading')) {
	class Zolo_Heading {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('zolo_param_heading' , array(&$this, 'zolo_heading_param_callback' ));
			}
		}
		function zolo_heading_param_callback($settings, $value){
			$type = isset($settings['zolo_param_heading']) ? $settings['zolo_param_heading'] : '';
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$text = isset($settings['text']) ? $settings['text'] : '';
			$output = '<h4 class="wpb_vc_param_value '.esc_attr($class).'">'.$text.'</h4>';
			$output .= '<input type="hidden"  class="wpb_vc_param_value ' . esc_attr($param_name . ' ' . $type . ' ' . $class) . '" name="' . esc_attr($param_name) . '" value="'.$value.'" />';
			return $output;
		}
		
	}
	
	$Zolo_Heading = new Zolo_Heading();
}
