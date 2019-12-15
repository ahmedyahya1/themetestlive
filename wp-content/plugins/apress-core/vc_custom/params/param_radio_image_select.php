<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
# Usage - 
	array(
		'type' => 'radio_image_select',
		'options'     => array(
			'one' => array(
				'tooltip' => esc_attr__('Tooltip text 1','apcore'),
				'src' => get_template_directory_uri() . '/images/SinglePortfolio_Layout1.jpg'
			),
			'two' => array(
				'tooltip' => esc_attr__('Tooltip text 2','apcore'),
				'src' => get_template_directory_uri() . '/images/SinglePortfolio_Layout1.jpg'
			)
		)
	)
*/
if(!class_exists('Zolo_Radio_Image_Select')) {
	class Zolo_Radio_Image_Select {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param( 'radio_image_select', array( $this, 'radio_image_settings_field' ));				
			}
		}
	
		function radio_image_settings_field($settings, $value){
			$options      = isset( $settings['options'] ) ? $settings['options'] : '';			
			$class      = isset( $settings['class'] ) ? $settings['class'] : '';
			$output = $selected = '';
			$css_option = str_replace( '#', 'hash-', vc_get_dropdown_option( $settings, $value ) );

			$output .= '<select name="'
			           . $settings['param_name']
			           . '" class="wpb_vc_param_value wpb-input wpb-select ' . $class
			           . ' ' .$settings['param_name']
			           . ' ' . $settings['type']
			           . ' ' . $css_option
			           . '" data-option="' . $css_option . '">';

			if ( is_array( $options ) ) {
				foreach ( $options as $key => $val ) {

					if ( '' !== $css_option && $css_option === $key ) {
						$selected = ' selected="selected"';
					} else {
						$selected = '';
					}
					
					$tooltip = ($val['tooltip']) ? $val['tooltip'] : '';
					$img_url = ($val['src']) ? $val['src'] : '';

					$output .= '<option data-tooltip="'.esc_attr($tooltip).'"  data-img-src="' . esc_url($img_url) . '"  value="' . esc_attr($key) . '" ' . $selected . '>';
				}
			}
			$output .= '</select>';

			return $output;
		}
		
	}
	
	$Zolo_Radio_Image_Select = new Zolo_Radio_Image_Select();
}
