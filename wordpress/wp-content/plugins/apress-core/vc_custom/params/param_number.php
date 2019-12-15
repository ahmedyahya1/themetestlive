<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
# Usage - 
	array(
		'type' => 'zolo_number',
		'class' => '',
		'heading' => esc_html__('Slides to show','apcore'),
		'param_name' => 'slides_to_show',
		'value' => '1',
		'min' => '1',
		'max' => '25',
		'step' => '1',
		'suffix' => 'px'
	)
*/
if(!class_exists('Zolo_Number_Param')) {
	class Zolo_Number_Param {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('zolo_number' , array(&$this, 'number_settings_field' ));
			}
		}
	
		function number_settings_field($settings, $value){
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$type = isset($settings['type']) ? $settings['type'] : '';
			$min = isset($settings['min']) ? $settings['min'] : '';
			$max = isset($settings['max']) ? $settings['max'] : '';
			$step = isset($settings['step']) ? $settings['step'] : '';
			$suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$output = '<input type="number" min="'.esc_attr($min).'" max="'.esc_attr($max).'" step="'.esc_attr($step).'" class="wpb_vc_param_value ' . esc_attr($param_name . ' ' . $type . ' ' . $class) . '" name="' . esc_attr($param_name) . '" value="'.$value.'" style="max-width:200px;float: left;" /><span class="zolo_suffix_value">'.$suffix.'</span>';
			return $output;
		}
		
	}
	
	$Zolo_Number_Param = new Zolo_Number_Param();
}
