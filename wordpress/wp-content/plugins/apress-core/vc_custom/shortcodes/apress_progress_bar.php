<?php 
/*-----------------------------------------------------------------------------------*/
/* Progress Bar
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Progress_Bar extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
				  "name"		=> __("Progress Bar",'apcore'),
				  "base"		=> "apress_progress_bar",
				  "class"		=> "",
				  "weight"		=> 21,
				  "category"	=> __( "Apress", "apcore"),
				  "description"	=> __( "Animated Progress Bar", "apcore"),
				  "icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-progressbar.png",
				  "params" => array(
					array(
						"type"			=> "dropdown",
						"class"			=> "",
						"heading"		=> __("Progress bar style",'apcore'),
						"param_name"	=> "style",
						"value"			=> array (
							"Box" => "box", 
							"Rounded" => "rounded" 
							), 
						"description"	=> __("Choose the Progress bar style ( visual )",'apcore'),
						"admin_label"	=> true,
						),
					array(
						"type"			=> "textfield",
						"class"			=> "",
						"heading"		=> __("Container Height",'apcore'),
						"param_name"	=> "cnt_height",
						"value"			=> __("10",'apcore'),
						"description"	=> __("Enter the height for the progress bar  ( e.g 10 )",'apcore'),
						),
					 array(
						"type"			=> "textfield",
						"class"			=> "",
						"heading"		=> __("Progress bar padding",'apcore'),
						"param_name"	=> "cnt_padding",
						"value"			=> __("0",'apcore'),
						"description"	=> __("Enter padding for the progress bar ( e.g 0 )",'apcore'),
						),						
					array(
						"type"			=> "textfield",
						"class"			=> "",
						"heading"		=> __("Progress bar Top/Bottom Margin",'apcore'),
						"param_name"	=> "cnt_margin",
						"value"			=> __("14",'apcore'),
						"description"	=> __("Enter Margin for the progress bar ( e.g 14 )",'apcore'),
						),
					 array(
						"type"			=> "textfield",
						"class"			=> "",
						"heading"		=> __("Progress bar title",'apcore'),
						"param_name"	=> "title",
						"value"			=> __("Webdesign",'apcore'),
						"description"	=> __("Enter the title for the progress bar",'apcore'),
						"admin_label"	=> true,
						),
					 array(
						"type"			=> "dropdown",
						"class"			=> "",
						"heading"		=> __("Progress bar Title position",'apcore'),
						"description"	=> __("Choose title position",'apcore'),
						"param_name"	=> "title_position",
						"value"			=> array (
								"Top" => "top", 
								"Center" => "center", 
								"Bottom" => "bottom"
							), 						
						),
					 array(
						"type"			=> "textfield",
						"class"			=> "",
						"heading"		=> __("Percentage",'apcore'),
						"description"	=> __("Enter the percentage ( e.g 80 )",'apcore'),
						"param_name"	=> "percentage",
						"value"			=> __("80",'apcore'),	
						"admin_label"	=> true,					
						),
					 array(
						"type"			=> "dropdown",
						"class"			=> "",
						"heading"		=> __("Percentage Style",'apcore'),
						"description"	=> __("Choose Percentage Style",'apcore'),
						"param_name"	=> "percentage_style",
						"value"			=> array (
								"Style1" => "z_percentage_1", 
								"Style2" => "z_percentage_2", 
								"Style3" => "z_percentage_3"
							), 						
						),
					 array(
						"type"			=> "dropdown",
						"class"			=> "",
						"heading"		=> __("Tooltip Style",'apcore'),
						"param_name"	=> "tooltip_style",
						"value"			=> array (
								"Scroll" => "tooltip_scroll", 
								"Hover" => "tooltip_hover"
							), 
						"description"	=> __("Choose Tooltip Style",'apcore'),
						"dependency"	=> array( "element" => "percentage_style", "value" => array("z_percentage_3"))
						),	
					 array(
						"type"			=> "colorpicker",
						"class"			=> "",
						"heading"		=> __("Tooltip Text Color","apcore"),
						"param_name"	=> "tooltip_text_color",
						"value"			=> "#eeeeee", 
						"description"	=> __("Choose Tooltip Text Color","apcore"),
						"dependency"	=> array( "element" => "percentage_style", "value" => array("z_percentage_3"))
						),
					 array(
						"type"			=> "colorpicker",
						"class"			=> "",
						"heading"		=> __("Tooltip Background Color","apcore"),
						"param_name"	=> "tooltip_bg_color",
						"value"			=> "#2c3e50", 
						"description"	=> __("Choose Tooltip Background Color","apcore"),
						"dependency"	=> array( 
							"element"	=> "percentage_style", 
							"value"		=> array("z_percentage_3")
							),
						),
					 array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Tooltip Border Color","apcore"),
						"param_name"		=> "tooltip_bor_color",
						"value"				=> "#eeeeee", 
						"description"		=> __("Choose Tooltip Border Color","apcore"),
						"dependency"		=> array( 
								"element" => "percentage_style", 
								"value" => array("z_percentage_3")
							),
						),
					 array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Title Color","apcore"),
						"param_name"		=> "title_color",
						"value"				=> "#777777", 
						"description"		=> __("Choose Title color","apcore"),
						),
					 array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Progress bar color",'apcore'),
						"param_name"		=> "pb_color",
						"value"				=> '#549ffc', 
						"description"		=> __("Choose Progress bar color",'apcore'),
						),
					 array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Progress bar second color",'apcore'),
						"param_name"		=> "pb_alt_color",
						"value"				=> '', 
						"description"		=> __("Add this color to create gradient (optional)",'apcore'),
						),
					 array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Progress bar container color",'apcore'),
						"param_name"		=> "pb_ctn_color",
						"value"				=> '#f7f7f7', 
						"description"		=> __("Choose Progress container color",'apcore'),
						),
					array(
						'type'				=> 'zolo_single_checkbox',
						'heading'			=> esc_html__('Border', 'apcore'),
						'param_name'		=> 'enable_border',
						'value'				=> 'no',
						'options'			=> array(
							'yes'			=> array(
								'on'				=> 'Yes',
								'off'				=> 'No',
							),
						),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					 array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Border color",'apcore'),
						"param_name"		=> "border_color",
						"value"				=> '#efeff0', 
						"description"		=> __("Choose border color",'apcore'),
						'dependency'		=> array('element' => 'enable_border', 'value' => array('yes')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					 array(
						'type'				=> 'checkbox',
						'heading'			=> __("Add Stripe?",'apcore'),
						'description'		=> __("Select if you want to add stripe to the bar",'apcore'),
						'param_name'		=> 'stripe',
						'value'				=> array(  'Yes'  => 'yes' ),						
					),	
					 array(
						'type'				=> 'checkbox',
						'heading'			=> __("Animate the stripe?",'apcore'),
						'description'		=> __("Select if you want to make the stripe move",'apcore'),
						'param_name'		=> 'stripe_animation',
						'value'				=> array(  'Yes'  => 'yes' ),						
					),
					array(
						'type'				=> 'zolo_param_heading',
						'text'				=> esc_html__('Extra features', 'apcore'),
						'param_name'		=> 'subtitle_margin_heading',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
					),	
					array(
						'type'				=> 'zolo_video_link_param',
						'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
						'param_name'		=> 'tutorials',
						'doc_link'			=> $doc_link,
						'video_link'		=> 'https://youtu.be/yb-57HpU9TY',
					),
					
					array(
						'type'				=> 'zolo_param_heading',
						'text'				=> esc_html__('Title Typography', 'apcore'),
						'param_name'		=> 'title_t_heading',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						'group'				=> esc_html__('Title Typography', 'apcore'),
					),
					array(
						'type'				=> 'zolo_font_container',
						'heading'			=> '',
						'param_name'		=> 'title_font_options',
						'settings'				=> array(
							'fields'				=> array(
								'font_size',							
								'line_height',
								'letter_spacing',
								'font_style',
							),
						),
						'group'				=> esc_html__('Title Typography', 'apcore'),
					),
					array(
						'type'				=> 'zolo_radio_advanced',
						'heading'			=> esc_html__('Custom font family', 'apcore'),
						'param_name'		=> 'title_google_fonts',
						'value'				=> 'no',
						'options'			=> array(
							esc_html__('Yes', 'apcore')	=> 'yes',
							esc_html__('No', 'apcore') => 'no',
						),
						'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
						'group'				=> esc_html__('Title Typography', 'apcore'),
					),
					array(
						'type'				=> 'google_fonts',
						'param_name'		=> 'title_custom_fonts',
						'settings'			=> array(
							'fields'			=> array(
								'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
								'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
							),
						),
						'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
						'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
						'group'				=> esc_html__('Title Typography', 'apcore'),
					),
					array(
						'type'			=> 'zolo_number',
						'heading'		=> esc_html__('Percentage Font Size', 'apcore'),
						'param_name'	=> 'percentage_font_size',
						'value'			=> '',
						'suffix' 		=> 'px',
						'group'				=> esc_html__('Title Typography', 'apcore'),
					),
						
			
				),
			) );		
		
			}		