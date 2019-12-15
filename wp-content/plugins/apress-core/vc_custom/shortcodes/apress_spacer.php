<?php 
/*-----------------------------------------------------------------------------------*/
/* Spacer
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Spacer')) {
	class Apress_Spacer {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_spacer_init' ) );
			add_shortcode( 'apress_spacer', array( &$this, 'apress_spacer' ) );
		}
		
		function apress_spacer_init() {	
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
				"name"				=> __("Spacer / Gap", 'apcore'),
				"base"				=> "apress_spacer",
				"class"			=> "",
				"weight"		=> 2,
				"category"		=> __( "Apress", "apcore"),
				"description"	=> __("Posts, pages or custom posts modern designs", "apcore"),
				"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-spacer.png",
				"params"		=> array(		
					array(
						"type" => "zolo_number",
						"class" => "",
						"heading" => __("<i class='dashicons dashicons-desktop'></i> Desktop", "apcore"),
						"param_name" => "height",
						"admin_label" => true,
						"value" => 10,
						"min" => 1,
						"max" => 500,
						"suffix" => "px",
						"description" => __("Enter value in pixels", "apcore"),
						//"edit_field_class" => "vc_col-sm-4 vc_column"
					),
					array(
						"type" => "zolo_number",
						"class" => "",
						"heading" => __("<i class='dashicons dashicons-tablet' style='transform: rotate(90deg);'></i> Tabs", "apcore"),
						"param_name" => "height_on_tabs",
						"admin_label" => true,
						"value" => '',
						"min" => 1,
						"max" => 500,
						"suffix" => "px",
						//"description" => __("Enter value in pixels", "apcore"),
						"edit_field_class" => "vc_col-sm-6 vc_column"
					),
					array(
						"type" => "zolo_number",
						"class" => "",
						"heading" => __("<i class='dashicons dashicons-tablet'></i> Tabs", "apcore"),
						"param_name" => "height_on_tabs_portrait",
						"admin_label" => true,
						"value" => '',
						"min" => 1,
						"max" => 500,
						"suffix" => "px",
						//"description" => __("Enter value in pixels", "apcore"),
						"edit_field_class" => "vc_col-sm-6 vc_column"
					),
					array(
						"type" => "zolo_number",
						"class" => "",
						"heading" => __("<i class='dashicons dashicons-smartphone' style='transform: rotate(90deg);'></i> Mobile", "apcore"),
						"param_name" => "height_on_mob_landscape",
						"admin_label" => true,
						"value" => '',
						"min" => 1,
						"max" => 500,
						"suffix" => "px",
						//"description" => __("Enter value in pixels", "apcore"),
						"edit_field_class" => "vc_col-sm-6 vc_column"
					),
					array(
						"type" => "zolo_number",
						"class" => "",
						"heading" => __("<i class='dashicons dashicons-smartphone'></i> Mobile", "apcore"),
						"param_name" => "height_on_mob",
						"admin_label" => true,
						"value" => '',
						"min" => 1,
						"max" => 500,
						"suffix" => "px",
						//"description" => __("Enter value in pixels", "apcore"),
						"edit_field_class" => "vc_col-sm-6 vc_column"
					),
					array(
						'type'				=> 'zolo_param_heading',
						'text'				=> esc_html__('Extra features', 'apcore'),
						'param_name'		=> 'subtitle_margin_heading',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
					),				
					array(
						'type'				=> 'zolo_video_link_param',
						'heading'			=> esc_html__('Video tutorial and Theme documentation','apcore'),
						'param_name'		=> 'tutorials',
						'doc_link'			=> $doc_link,
						'video_link'		=> 'https://youtu.be/KNMkJsHn5Q4',
					),	
				),
			) 
				);
			}
		}

function apress_spacer( $atts, $content=null ){
			$height = $output = $height_on_tabs = $height_on_mob = '';
			extract(shortcode_atts(array(
				"height" => "",
				"height_on_tabs" => "",
				"height_on_tabs_portrait" => "",
				"height_on_mob" => "",
				"height_on_mob_landscape" => ""
			),$atts));
			if($height_on_mob == "" && $height_on_tabs == "")
				$height_on_mob = $height_on_tabs = $height;
			$style = 'clear:both;';
			$style .= 'display:block;';
			$uid = uniqid();
			$output .= '<div class="apress-spacer spacer-'.esc_attr($uid).'" data-id="'.esc_attr($uid).'" data-height="'.esc_attr($height).'" data-height-mobile="'.esc_attr($height_on_mob).'" data-height-tab="'.esc_attr($height_on_tabs).'" data-height-tab-portrait="'.esc_attr($height_on_tabs_portrait).'" data-height-mobile-landscape="'.esc_attr($height_on_mob_landscape).'" style="'.esc_attr($style).'"></div>';
			return $output;
		}
}
	
	$Apress_Spacer = new Apress_Spacer;
}
