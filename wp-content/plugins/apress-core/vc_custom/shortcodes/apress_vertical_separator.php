<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Separator
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Vertical_Separator extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Vertical Separator", 'apcore'),
			"base"			=> "apress_vertical_separator",
			"class"			=> "",
			"weight" 		=> 28,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Style content with Vertical Separator", "apcore"),
			"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-vertical_separator.png",
			"params"	=> array(	
							array(
								"type"             => "zolo_param_heading",
								"param_name"       => "separator_heading_height_width",
								"text"             => __( "Separator Height and Width", "apcore" ),
							),				
							array(
								"type"			=> "zolo_number",
								"heading"		=> __("Separator Width", "apcore"),
								"param_name" 	=> "vertical_separator_width",
								"value"			=> 1,
								"suffix"		=> "px",
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),
							array(
								"type"			=> "zolo_number",
								"heading"		=> __("Separator Height", "apcore"),
								"param_name"	=> "vertical_separator_height",
								"value"			=> 100,
								"suffix"		=> "px",
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),
							array(
								"type"			=> "dropdown",
								"heading"		=> __("Separator Style", "apcore"),
								"param_name"	=> "vertical_separator_style",
								"admin_label"	=> true,
								"value"			=> array(
									__("Solid","apcore")	=> "solid",
									__("Dashed","apcore")	=> "dashed",
									__("Dotted","apcore")	=> "dotted",
									__("Double","apcore")	=> "double",
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),							
							array(
								"type"			=> "dropdown",
								"heading"		=> __("Separator Align", "apcore"),
								"param_name"	=> "vertical_separator_align",
								"admin_label"	=> true,
								"value"			=> array(
									__("Left","apcore")		=> "left",
									__("Center","apcore")	=> "center",
									__("Right","apcore") 	=> "right",
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-6',
							),	
							array(
								"type"			=> "colorpicker",
								"heading"		=> __("Separator Color", "apcore"),
								"param_name"	=> "vertical_separator_color",
								"value"			=> "#cccccc",
							),						
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Extra features', 'apcore'),
								'param_name'		=> 'subtitle_margin_heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("CSS Animation",'apcore'),
								"param_name" => "data_animation",
								"value" => apress_data_animations(),
								"description" => __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin',
							),  
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Delay",'apcore'),
								"param_name" => "data_delay",
								"value" => '500',
								"description" => __("Delay",'apcore'),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin',
							),
							array(
								"type" => "textfield",
								"heading" => __("Extra class name", "apcore"),
								"param_name" => "class",
								"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
							),
							array(
								'type'				=> 'zolo_video_link_param',
								'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
								'param_name'		=> 'tutorials',
								'doc_link'			=> $doc_link,
								'video_link'		=> 'https://youtu.be/hlYoxCI4xow',
							),
						
						),
					) 
				);		
		
			}		