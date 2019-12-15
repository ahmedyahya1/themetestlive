<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*

# Usage - 
	array(
		"type" => "zolo_padding",
		"positions" => array(
			"Top" => "top",
			"Bottom" => "bottom",
			"Left" => "left",
			"Right" => "right"
		),
	),

*/
if(!class_exists('Zolo_Param_Padding')) {
	class Zolo_Param_Padding {
		function __construct() {
			if(defined('WPB_VC_VERSION') && version_compare(WPB_VC_VERSION, 4.8) >= 0) {
				if(function_exists('vc_add_shortcode_param'))
				{
					vc_add_shortcode_param('zolo_padding', array(&$this, 'zolo_padding_param'), APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/js/additional_param.js' );
				}
			} else {
				if(function_exists('add_shortcode_param'))
				{
					add_shortcode_param('zolo_padding', array(&$this, 'zolo_padding_param'), APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/js/additional_param.js' );
				}
			}
		}
	
		function zolo_padding_param($settings, $value) {
			$positions = isset($settings['positions']) ? $settings['positions'] : array();

			$orig_val = isset($value) && !empty($value) ? $value : '';
			if($orig_val == '' && isset($settings['value'])) {
				$orig_val = $settings['value'];
			}
			$values = Apcore_Theme_Helpers::vc_param_parse_value($orig_val, 'vc_padding_get_params');
			
			$html = '<div class="zolo-paddings clearfix" style="padding: 0 -15px;">';
					foreach($positions as $key => $position)
						$html .= $this->input_number($values['padding-'.$position], 'padding-'.$position, $key);
			$html .= '  <input type="text" style="display:none" name="'.$settings['param_name'].'" class="wpb_vc_param_value zolo-delimiter-value '.$settings['param_name'].' '.$settings['type'].'_field" value="'.$orig_val.'" />';
			$html .= '</div>';
			return $html;
		}
		function input_number($value, $class, $placeholder) {
			$html = '';
			$name = isset($name) && !empty($name) ? $name : '';
			$value = isset($value) && !empty($value) ? $value : '';
			$class = isset($class) && !empty($class) ? $class : '';
			
			$html .= '<div class="vc_col-xs-3">'
						. '<div class="wpb_element_label">'.esc_attr($placeholder).'</div>'
						. '<div class="crum-number-field-wrap">'
							. '<input class="wpb_vc_param_value crum_number_field vc_padding_container_form_field-'.esc_attr($class).'" value="'.$value.'" />'
						. '</div>'
					. '</div>';
			
			return $html;
		}
		public static function paddings_css($value) {
			if(!$value || empty($value)) return;
			
			$css = '';
			$value = str_replace(";", "|", $value);
			$values = Apcore_Theme_Helpers::vc_param_parse_value($value, 'vc_padding_get_params');
			
			if(isset($values['padding-top']) && $values['padding-top'] != '') {
				$css .= 'padding-top: '.esc_attr($values['padding-top']).'px;';
			}
			if(isset($values['padding-bottom']) && $values['padding-bottom'] != '') {
				$css .= 'padding-bottom: '.esc_attr($values['padding-bottom']).'px;';
			}
			if(isset($values['padding-left']) && $values['padding-left'] != '') {
				$css .= 'padding-left: '.esc_attr($values['padding-left']).'px;';
			}
			if(isset($values['padding-right']) && $values['padding-right'] != '') {
				$css .= 'padding-right: '.esc_attr($values['padding-right']).'px;';
			}
			
			return $css;
		}
	}
}

if(class_exists('Zolo_Param_Padding')) {
	$Zolo_Param_Padding = new Zolo_Param_Padding();
}
