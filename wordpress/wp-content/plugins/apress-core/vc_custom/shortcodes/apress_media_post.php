<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Media_Post extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Media Post", 'apcore'),
					"base"			=> "apress_media_post",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Media Post", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-media_post.png",
					"params"		=> array(						
						
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image", "apcore"),
							"param_name"		=> "box_image",
							"value"				=> "",
						),
						array(
						  "type"		=> "textfield",
						  "heading"		=> __("Image Size", 'apcore'),
						  "param_name"	=> "img_size",
						  "value"		=> "",
						  "description"	=> __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \"thumbnail\" size.", 'apcore'),
						  "dependency"	=> array('element' => "style", 'value' => array('slider_style1', 'slider_style2', 'slider_style3', 'slider_style5', 'slider_style6'))
						),
						array(
							"type"				=> "textarea",
							"class"				=> "",
							"heading"			=> __("Title",'apcore'),
							"param_name"		=> "box_title",
							"value"				=> 'Your Title',
							"admin_label"		=> true,
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Website Name",'apcore'),
							"param_name"		=> "website_name",
							"value"				=> 'google.com',
						),
						array(
							"type"				=> "vc_link",
							"class"				=> "",
							"heading"			=> __("Link",'apcore'),
							"param_name"		=> "box_link",
							"description"		=> __("http://example.com",'apcore')
						),	
						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "box_bg_color",
							'value'				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
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
						   'type'    	=> 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'border_radius',
							'value'		=> '0',
							'suffix'	=> 'px',
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
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'custom_height',
							'value'		=> '130',
							'suffix'	=> 'px',
							'dependency'		=> array('element' => 'custom_height_opt', 'value' => 'yes'),
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
							'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
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
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Title color', 'apcore' ),
							"param_name"	=> "title_color",
							'value'			=> '#000000',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Title Style', 'apcore'),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Title Hover color', 'apcore' ),
							"param_name"	=> "title_hover_color",
							'value'			=> '#0000ef',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Website Name Style', 'apcore'),
							'param_name'		=> 'website_name_heading',
							'group'				=> esc_html__('Website Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'website_name_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Website Style', 'apcore'),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'website_name_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Website Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'website_name_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'website_name_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Website Style', 'apcore'),
						),
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'View More color', 'apcore' ),
							"param_name"	=> "website_name_color",
							'value'			=> '#000000',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Website Style', 'apcore'),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'View More Hover color', 'apcore' ),
							"param_name"	=> "website_name_hover_color",
							'value'			=> '#0000ef',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Website Style', 'apcore'),
						),
						
					),
					) );		
		
			}		