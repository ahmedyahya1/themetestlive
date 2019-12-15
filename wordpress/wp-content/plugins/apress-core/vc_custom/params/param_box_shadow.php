<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

 /**  # W3Schools
  *   - box-shadow: none|h-shadow v-shadow blur spread color |inset|initial|inherit;
  */

if(!class_exists('Zolo_Box_Shadow_Param')) {
	
	class Zolo_Box_Shadow_Param extends Zolo_Params_Constructor {
	  
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('zolo_box_shadow_param', array($this, 'box_shadow_param'), APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/js/additional_param.js' );
			}
//			add_action( 'admin_enqueue_scripts', array( $this, 'box_shadow_param_param_scripts' ) );
		}
		function get_dropdown_options() {
			return array(
				'disable' => esc_html__('Disable','apcore'),
				'enable' => esc_html__('Enable','apcore'),
			);
		}
		function box_shadow_param($settings, $value) {
			$label = isset($settings['label']) ? $settings['label'] : esc_html__('Box shadow style','apcore');
			$unit = isset($settings['unit']) ? $settings['unit'] : 'px';

			$values = Apcore_Theme_Helpers::vc_param_parse_value($value, 'vc_box_shadow_get_params');
			
			$dropdown_options = self::get_dropdown_options();
			
			$html  = '<div class="zolo-box-shadow-param-container">';

			$html .= '	<div class="zolo-box-shadow-enable">';
			$html .= '		<div class="border-select-block">';
			$html .= '			<ul class="vc_container_form_field-box_shadow_enable wpb_vc_param_value">';
			foreach($dropdown_options as $k => $v) {
				$html .=				$this->input_radio($values['box_shadow_enable'], $k, $v, true);
			}
			$html .= '			</ul>';
			$html .= '		</div>';
			$html .= '	</div>';
			
			$html .= '	<div class="zolo-box-shadow-sizes">';
			$html .= '		<div class="wpb_element_label">'.esc_html__('Shadow parameters','apcore').'</div>';
			$html .= '		<div class="inputs-block">';
			$borders = array(
				'shadow_horizontal' => esc_html__('Horizontal','apcore'),
				'shadow_vertical' => esc_html__('Vertical','apcore'),
				'shadow_blur' => esc_html__('Blur','apcore'),
				'shadow_spread' => esc_html__('Spread','apcore'),
			);
			foreach($borders as $k => $v) {
				$html .=		'<div class="input-wrap crum-number-field-wrap">'.$this->input_number($values[$k], $k, $v).'</div>';
			}
			$html .= '		</div>';
			$html .= '	</div>';
			
			$html .= $this->color($values['box_shadow_color']);
			
			$html .= '</div>';
			
			$html .= '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="hidden" value="' . $value . '" />';
			
			return $html;
		}
		function box_shadow_param_param_scripts($hook) {
			wp_enqueue_style( 'zolo_box_shadow_param_param_css', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/css/zolo_boxshadow.css' );
		}
		public static function box_shadow_css($value) {
			if(!$value || empty($value)) return;
			
			$css = '';

			$values = Apcore_Theme_Helpers::vc_param_parse_value($value, 'vc_box_shadow_get_params');

			if(isset($values['box_shadow_enable']) && $values['box_shadow_enable'] == 'enable') {
				$css .= '-webkit-box-shadow: '.$values['shadow_horizontal'].'px '.$values['shadow_vertical'].'px '.$values['shadow_blur'].'px '.$values['shadow_spread'].'px '.$values['box_shadow_color'].';';
				$css .= '-moz-box-shadow: '.$values['shadow_horizontal'].'px '.$values['shadow_vertical'].'px '.$values['shadow_blur'].'px '.$values['shadow_spread'].'px '.$values['box_shadow_color'].';';
				$css .= '-o-box-shadow: '.$values['shadow_horizontal'].'px '.$values['shadow_vertical'].'px '.$values['shadow_blur'].'px '.$values['shadow_spread'].'px '.$values['box_shadow_color'].';';
				$css .= 'box-shadow: '.$values['shadow_horizontal'].'px '.$values['shadow_vertical'].'px '.$values['shadow_blur'].'px '.$values['shadow_spread'].'px '.$values['box_shadow_color'].';';
			} else {
				$css .= '-webkit-box-shadow: none;-moz-box-shadow: none;-o-box-shadow: none;box-shadow: none;';
			}
			return $css;
		}
	}
}
if(class_exists('Zolo_Box_Shadow_Param')) {
  $Zolo_Box_Shadow_Param = new Zolo_Box_Shadow_Param();
}