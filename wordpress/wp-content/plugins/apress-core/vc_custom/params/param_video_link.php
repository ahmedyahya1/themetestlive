<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!class_exists('Zolo_Video_Link_Param')) {
	class Zolo_Video_Link_Param {
		function __construct() {
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('zolo_video_link_param' , array($this, 'zolo_video_link_param_callback'));
			}
		}
	
		function zolo_video_link_param_callback($settings, $value) {
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$doc_link = isset($settings['doc_link']) ? $settings['doc_link'] : '';
			$video_link = isset($settings['video_link']) ? $settings['video_link'] : '';
			$type = "";
			$output = '<div class="zolo-tutorials-param-wrapper">';			
			if($doc_link != '') {
				$output .= '<div class="zolo-documentation-link"><a href="'.esc_html($doc_link).'">'.esc_html__('Theme documentation','apcore').'</a></div>';
			}			
			if($video_link != '') {
				$output .= '<div class="zolo-video-tutorial-link"><a href="'.esc_html($video_link).'">'.esc_html__('Video tutorial','apcore').'</a></div>';
			}			
			$output .= '</div>';
			$output .= '<input type="hidden"  class="wpb_vc_param_value ' . esc_attr($param_name . ' ' . $type . ' ' . $class) . '" name="' . esc_attr($param_name) . '" value="'.$value.'" />';
			return $output;
		}
		
	}
	
	$Zolo_Video_Link_Param = new Zolo_Video_Link_Param();
}
