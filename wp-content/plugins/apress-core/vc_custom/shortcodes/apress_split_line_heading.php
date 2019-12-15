<?php 
/*-----------------------------------------------------------------------------------*/
/* Split Line Heading
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

class WPBakeryShortCode_Apress_Split_Line_Heading extends WPBakeryShortCode {}

	
			
$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
	vc_map( array(
	"name"			=> __("Split Line Heading", 'apcore'),
	"base"			=> "apress_split_line_heading",
	"class"			=> "",
	//"weight"		=> 2,
	"category"		=> __( "Apress", "apcore"),
	"description"	=> __("Animated multi line heading", "apcore"),
	"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-spacer.png",
	"params"		=> array(		
		array(
			"type"				=> "textarea_html",
			"holder"			=> "div",
			"heading"			=> esc_html__("Text Content", "apcore"),
			"param_name"		=> "content",
			"value"				=> '',
			"description"		=> esc_html__("Each Line of this editor will be animated separately. Separate text with the Enter or Return key on your Keyboard.", "apcore"),
			"admin_label"		=> false
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
			'video_link'		=> 'https://youtu.be/uE3CsoShEd0',
		),
		
		array(
			'type'				=> 'zolo_param_heading',
			'text'				=> esc_html__('Title Typography', 'apcore'),
			'param_name'		=> 'title_t_heading',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
			'group'				=> esc_html__('Typography', 'apcore'),
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
			'group'				=> esc_html__('Typography', 'apcore'),
		),
		
		array(
			"type"			=> "dropdown",
			"heading"		=> __("Select Color Scheme",'apcore'),
			"param_name"	=> "color_scheme",
			"value"			=> array(
				__("Primary Color",'apcore') 	=> "primary_color_scheme",
				__("Color Scheme 1",'apcore') 	=> "color_scheme1",
				__("Color Scheme 2",'apcore') 	=> "color_scheme2",
				__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
				__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
				__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
				__("Custom Color",'apcore') 	=> "design_your_own"
			),
			'group'				=> esc_html__('Typography', 'apcore'),
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> __("Font Color",'apcore'),
			"param_name"		=> "main_heading_color",
			"value"				=> '',
			'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
			'group'				=> esc_html__('Typography', 'apcore'),
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
			'group'				=> esc_html__('Typography', 'apcore'),
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
			'group'				=> esc_html__('Typography', 'apcore'),
		),
		
		
		
	),
	) 
		);
	}
