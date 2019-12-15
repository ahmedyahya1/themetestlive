<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Comparison
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Image_Comparison extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Image Comparison", 'apcore'),
			"base"			=> "apress_image_comparison",
			"class"			=> "",
			"weight" 		=> 10,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Compare two images", "apcore"),
			"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-image_comparison.png",
			"params"	=> array(	
							array(
								"type"			=> "attach_image",
								"heading"		=> __("Image One", "apcore"),
								"param_name"	=> "image_url",
								"value"			=> "",
								"description"	=> __("Select image from media library.", "apcore")
							),
							array(
								"type"			=> "attach_image",
								"heading"		=> __("Image Two", "apcore"),
								"param_name"	=> "image_2_url",
								"value"			=> "",
								"description"	=> __("Select image from media library.", "apcore")
							),	 
							array(
								"type"			=> "dropdown",
								"heading"		=> __("Orientation",'apcore'),
								"param_name"	=> "image_comparison_orientation",
								"value"			=> array(
									__("Vertical",'apcore') => "image_comparison_vertical",
									__("Horizontal",'apcore') 	=> "image_comparison_horizontal",
								),
								'admin_label'		=> true,
							),   
							array(
								'type'				=> 'zolo_number',
								'class'				=> '',
								'heading'			=> esc_html__('How far from the left the slider should be by default','apcore'),
								"description"		=> __("Varies from 1 - 9 means 10% - 90%", "apcore"),
								'param_name'		=> 'image_comparison_separator',
								'value'				=> '5',
								'min'				=> '1',
								'max'				=> '9',
								'step'				=> '1',
							),
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Extra features', 'apcore'),
								'param_name'		=> 'subtitle_margin_heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							),
							array(
								"type"				=> "textfield",
								"heading"			=> __("Extra class name", "apcore"),
								"param_name"		=> "class",
								"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
							),
							array(
								'type'				=> 'zolo_video_link_param',
								'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
								'param_name'		=> 'tutorials',
								'doc_link'			=> $doc_link,
								'video_link'		=> 'https://youtu.be/Uj43aeihpcE',
							),
						
						),
					) 
				);		
		
			}		