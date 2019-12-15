<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!class_exists('ApcoreMetaBoxSettings')) {
	/**
	 * Metaboxes and options values
	 *
	 *
	 * @class 		ApcoreMetaBoxSettings
	 * @version		1.0
	 * @category	Class
	 * @author 		Apress
	 */
	class ApcoreMetaBoxSettings {
		/**
		 * Returns metabox option.
		 *
		 * @param $name
		 *
		 * @return string|bool
		 */
		public static function get($name) {
			global $post;

			if (isset($post) && !empty($post->ID) && !is_archive() && !is_search()) {
				return get_post_meta($post->ID, $name, true);
			}

			return false;
		}
		/**
		 * Checks if metabox value is defined then checks if param value is defined from theme options.
		 *
		 * @param $name
		 * @param $default
		 *
		 * @return string|bool
		 */
		public static function compared($name, $default = '') {
			global $zolo_native;

			$value = self::get($name);
			if($value || $value != '') {
				return $value;
			} elseif(!$value && isset($zolo_native[$name]) && !empty($zolo_native[$name])) {
				return $zolo_native[$name];
			} else {
				return $default;
			}
		}
	}
}
if(!class_exists('Apcore_Theme_Helpers')) {
	/**
	 * Theme core helpers class
	 *
	 *
	 * @class 		Apcore_Theme_Helpers
	 * @version		1.0
	 * @category	Class
	 * @author 		Apress
	 */
	class Apcore_Theme_Helpers {		
		/**
		 * Returns responsive typography VC param options array
		 *
		 * @return array
		 */
		public static function vc_responsive_text_get_params() {
			return array(
				'font_size_desktop' => '',
				'line_height_desktop' => '',
				'letter_spacing_desktop' => '',
				'font_size_tablet' => '',
				'line_height_tablet' => '',
				'letter_spacing_tablet' => '',
				'font_size_mobile' => '',
				'line_height_mobile' => '',
				'letter_spacing_mobile' => '',
			);
		}
		/**
		 * Returns margin VC param options array
		 *
		 * @return array
		 */
		public static function vc_margin_get_params() {
			return array(
				'margin-top' => '',
				'margin-bottom' => '',
				'margin-left' => '',
				'margin-right' => '',
			);
		}
		/**
		 * Returns padding VC param options array
		 *
		 * @return array
		 */
		public static function vc_padding_get_params() {
			return array(
				'padding-top' => '',
				'padding-bottom' => '',
				'padding-left' => '',
				'padding-right' => '',
			);
		}
		/**
		 * Returns box-shadow VC param options array
		 *
		 * @return array
		 */
		public static function vc_box_shadow_get_params() {
			return array(
				'box_shadow_enable' => 'disable',
				'shadow_horizontal' => '0',
				'shadow_vertical' => '15',
				'shadow_blur' => '50',
				'shadow_spread' => '0',
				'box_shadow_color' => 'rgba(0,0,0,.35)',
			);
		}
		/**
		 * Parses custom VC params values
		 *
		 * @param mixed $value
		 * @param string $method
		 *
		 * @return string
		 */
		public static function vc_param_parse_value($value, $method = '') {
			if($method != '' && method_exists('Apcore_Theme_Helpers', $method)) {
				$params = self::$method();
			
				$values = vc_parse_multi_attribute($value, $params);
			}
			
			return $values;
		}
	}
}
