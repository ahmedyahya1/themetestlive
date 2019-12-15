<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
# Usage - 
	array(
		  "type" => "dropdown_multi",
		  "heading" => "",
		  "param_name" => "category",
		  "admin_label" => true,
		  "value" => $types_options,
		  "save_always" => true,
		  "description" => ''
	)
*/

if(!class_exists('Zolo_Taxonomy_Multiselect_Param')) {
	class Zolo_Taxonomy_Multiselect_Param extends Zolo_Params_Constructor {
		function __construct() {	
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('zolo_taxonomy_multiselect' , array(&$this, 'zolo_taxonomy_multiselect' ) );
			}
		}
	
		function zolo_taxonomy_multiselect($param, $value = '') {

			 $param_line = '';
			 $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
						foreach ( $param['value'] as $text_val => $val ) {
							if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
								$text_val = $val;
							}
							$text_val = __($text_val, "apcore");
							$selected = '';
	
							if(!is_array($value)) {
								$param_value_arr = explode(',',$value);
							} else {
								$param_value_arr = $value;
							}
							
							if ($value!=='' && in_array($val, $param_value_arr)) {
								$selected = ' selected="selected"';
							}
							$param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
						}
						$param_line .= '</select>';
	
		   return  $param_line;
		}
	}
	
	$Zolo_Taxonomy_Multiselect_Param = new Zolo_Taxonomy_Multiselect_Param();
}