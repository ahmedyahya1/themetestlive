<?php 
/*-----------------------------------------------------------------------------------*/
/* Alternate Image
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Alternate_Image extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Alternate Image", 'apcore'),
					"base"			=> "apress_alternate_image",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Show different image on hover", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-alternate.png",
					"params"		=> array(							
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image 1", "apcore"),
							"param_name"		=> "image",
							"value"				=> "",
						),
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image 2", "apcore"),
							"param_name"		=> "image2",
							"value"				=> "",
						),
						array(
							"type"				=> "vc_link",
							"class"				=> "",
							"heading"			=> __("Link",'apcore'),
							"param_name"		=> "box_link",
							"description"		=> __("http://example.com",'apcore')
						),	
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name","apcore"),
							"param_name"		=> "class",
							"value"				=> "",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.","apcore"),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Animations', 'apcore'),
							'param_name'		=> 'animation_type',
							'value'				=> 'default',
							'options'			=> array(
								esc_html__('Default', 'apcore')	=> 'default',
								esc_html__('Clipping', 'apcore')=> 'clipping',
							),
						),
						array(
							"type"				=> "dropdown",
							"heading"			=> __("Choose Style",'apcore'),
							"param_name"		=> "clipping_animation_type",
							'value' => array(
								__("Clipping left to right",'apcore') 	=> "clipping_left_to_right",
								__("Clipping right to left",'apcore') 	=> "clipping_right_to_left",
								__("Clipping bottom to top",'apcore') 	=> "clipping_bottom_to_top",
								__("Clipping top to bottom",'apcore') 	=> "clipping_top_to_bottom",
							),
							'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							'type'				=> 'colorpicker',
							'heading'			=> esc_html__('Clipping Color', 'apcore'),
							'param_name'		=> 'clipping_color',
							"value" 			=> '#f2f2f2',
							'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("CSS Animation",'apcore'),
							"param_name"		=> "data_animation",
							"value"				=> apress_data_animations(),
							"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
							'dependency'		=> array('element' => 'animation_type', 'value' => 'default'),
						),  
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Delay","apcore"),
							"param_name"		=> "data_delay",
							"value"				=> "500",
							"description"		=> __("Delay","apcore"),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
						),
						array(
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
					),
					) );		
		
			}		