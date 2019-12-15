<?php 
/*-----------------------------------------------------------------------------------*/
/* Text Link Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Text_Link_Box extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Text Link Box", 'apcore'),
					"base"			=> "apress_text_link_box",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Text Link Box", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-linkbox.png",
					"params"		=> array(						
						
						array(
							'type'				=> 'textarea_html',
							'heading'			=> esc_html__('Heading', 'apcore'),
							'param_name'		=> 'content',
							'value'				=> esc_html__('Heading','apcore'),
							'admin_label'		=> true,
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Read More Text",'apcore'),
							"param_name"		=> "readmore_text",
							"value"				=> 'Read More',
						),
						array(
							"type"				=> "vc_link",
							"class"				=> "",
							"heading"			=> __("Link",'apcore'),
							"param_name"		=> "box_link",
							"description"		=> __("http://example.com",'apcore')
						),	
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Text Align",'apcore'),
							"param_name"		=> "box_text_align",
							"value"				=> array (
								"Left"		=> "left", 
								"Right" 	=> "right",
								"Center" 	=> "center",
								), 
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "box_bg_color",
							'value'				=> '#ffffff',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Top Border",'apcore'),
							'param_name'=> 'border_top',
							'value'		=> '0',
							'suffix'	=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc apress-number-wrap apress-number-wrap-forborder',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Right Border",'apcore'),
							'param_name'=> 'border_right',
							'value'		=> '0',
							'suffix'	=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc apress-number-wrap apress-number-wrap-forborder',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Bottom Border",'apcore'),
							'param_name'=> 'border_bottom',
							'value'		=> '0',
							'suffix'	=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc apress-number-wrap apress-number-wrap-forborder',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Left Border",'apcore'),
							'param_name'=> 'border_left',
							'value'		=> '0',
							'suffix'	=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-3 crum_vc apress-number-wrap apress-number-wrap-forborder',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Border Color",'apcore'),
							"param_name"		=> "box_border_color",
							'value'				=> '#eeeeee',
						),
						array(
						   'type'    	=> 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.3)',
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing On Hover', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'on',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'border_radius',
							'value'		=> '0',
							'suffix'	=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Custom Height', 'apcore'),
							'param_name'		=> 'custom_height_opt',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Cstom Height",'apcore'),
							'param_name'=> 'custom_height',
							'value'		=> '120',
							'suffix'	=> 'px',
							'dependency'		=> array('element' => 'custom_height_opt', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Read More Style', 'apcore'),
							'param_name'		=> 'readmore_text_heading',
							'group'				=> esc_html__('Read More Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Button Border Color",'apcore'),
							'param_name'		=> "button_border_color",
							"value"				=> '#dddddd',
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Button Hover Border Color Scheme",'apcore'),
							"description"	=> __("Options available in Theme Options > Colors for and Theme Options > Button",'apcore'),
							"param_name"	=> "color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore')=> "gradient_scheme1",
								__("Gradient Scheme 2",'apcore')=> "gradient_scheme2",
								__("Gradient Scheme 3",'apcore')=> "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Button Hover Border Color",'apcore'),
							'param_name'		=> "button_hover_border_color",
							"value"				=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'	=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_number',
							'heading'			=> esc_html__('Button Border Height','apcore'),
							'param_name'		=> 'button_border_height',
							'step'				=> '1',
							'value'				=> '2',
							'suffix'			=> 'px',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("CSS Animation",'apcore'),
							"param_name"		=> "data_animation",
							"value"				=> apress_data_animations(),
							"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
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
							"type"				=> "textfield",
							"heading"			=> __("Extra class name", "apcore"),
							"param_name"		=> "class",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
						),
						array(
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Title Style', 'apcore'),
							'param_name'		=> 'title_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'title_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'tag' => 'h2',
									'font_size',
									'line_height',
									'letter_spacing',
									'font_style',
									'color',
								),
							),
							'group'			=> esc_html__('Title Style', 'apcore'),
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
							'group'				=> esc_html__('Title Style', 'apcore'),
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
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'readmore_text_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Button Style', 'apcore'),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'readmore_text_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'readmore_text_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'readmore_text_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Read More color', 'apcore' ),
							"param_name"	=> "readmore_text_color",
							'value'			=> '#000000',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Button Style', 'apcore'),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Read More Hover color', 'apcore' ),
							"param_name"	=> "readmore_text_hover_color",
							'value'			=> '#0000ef',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Button Style', 'apcore'),
						),
					),
					) );		
		
			}		