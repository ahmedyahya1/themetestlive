<?php 
/*-----------------------------------------------------------------------------------*/
/* Text Separator
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Text_Separator extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name" => __("Text Separator", 'apcore'),
			"base" => "apress_text_separator",
			"class" => "",
			"weight" => 27,
			"category" => __( "Apress", "apcore"),
			"description"	=> __( "Style content with Text Separator", "apcore"),
			"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-text_separator.png",
				"params" => array(
					array(
						'type'				=> 'zolo_param_heading',
						'text'				=> esc_html__('Main Content Section', 'apcore'),
						'param_name'		=> 'text_t_separator',
						'edit_field_class'	=> 'vc_column vc_col-sm-12 no-top-margin',
					),					
					array(
						'type' => 'textfield',
						'heading' => __( 'Title', 'apcore' ),
						'param_name' => 'title',
						'holder' => 'div',
						'value' => __( 'Title', 'apcore' ),
						'description' => __( 'Add text to separator.', 'apcore' ),
					),				
					array(
						'type' => 'dropdown',
						'heading' => __( 'Title position', 'apcore' ),
						'param_name' => 'title_align',
						'value' => array(
							__( 'Center', 'apcore' ) => 'separator_align_center',
							__( 'Left', 'apcore' ) => 'separator_align_left',
							__( 'Right', 'apcore' ) => 'separator_align_right',
						),
						'description' => __( 'Select title location.', 'apcore' ),
						"edit_field_class"	=> "vc_column vc_col-sm-6",
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Separator alignment', 'apcore' ),
						'param_name' => 'align',
						'value' => array(
							__( 'Center', 'apcore' ) => 'align_center',
							__( 'Left', 'apcore' ) => 'align_left',
							__( 'Right', 'apcore' ) => 'align_right',
						),
						'description' => __( 'Select separator alignment.', 'apcore' ),
						"edit_field_class"	=> "vc_column vc_col-sm-6",
					),					
					array(
						'type' => 'colorpicker',
						'heading' => __( 'Color', 'apcore' ),
						'param_name' => 'color',
						'description' => __( 'Separator color for your element.', 'apcore' ),
					),
					array(
						'type'				=> 'dropdown',
						'heading'			=> __( 'Style', 'apcore' ),
						'param_name'		=> 'style',
						"admin_label"		=> true,
						'value'				=> array(
							__( 'Border', 'apcore' ) => 'border',
							__( 'Dashed', 'apcore' ) => 'dashed',
							__( 'Dotted', 'apcore' ) => 'dotted',
							__( 'Double', 'apcore' ) => 'double',
							__( 'Shadow', 'apcore' ) => 'shadow',
							__( 'Style 1', 'apcore' ) => 'style1',
							__( 'Style 2', 'apcore' ) => 'style2',
							__( 'Style 3', 'apcore' ) => 'style3',
							__( 'Style 4', 'apcore' ) => 'style4',
							__( 'Style 5', 'apcore' ) => 'style5',
							),
						'description'		=> __( 'Separator display style.', 'apcore' ),
						"edit_field_class"	=> "vc_column vc_col-sm-4",
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Border width', 'apcore' ),
						'param_name' => 'border_width',
						'value' => array(
							'1px' => '',
							'2px' => '2',
							'3px' => '3',
							'4px' => '4',
							'5px' => '5',
							'6px' => '6',
							'7px' => '7',
							'8px' => '8',
							'9px' => '9',
							'10px' => '10',
						),
						'description' => __( 'Select border width (pixels).', 'apcore' ),
						"edit_field_class"	=> "vc_column vc_col-sm-4",
						'dependency'	=> array('element' => 'style', 'value' => array('border', 'dashed', 'dotted', 'double', 'shadow', 'style1', 'style2', 'style3', 'style4')),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Element width', 'apcore' ),
						'param_name' => 'el_width',
						'value' => array(
							'100%' => '',
							'90%' => '90',
							'80%' => '80',
							'70%' => '70',
							'60%' => '60',
							'50%' => '50',
							'40%' => '40',
							'30%' => '30',
							'20%' => '20',
							'10%' => '10',
						),
						'description' => __( 'Separator element width in percents.', 'apcore' ),
						"edit_field_class"	=> "vc_column vc_col-sm-4",
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
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin',
					),  
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Delay",'apcore'),
						"param_name"		=> "data_delay",
						"value"				=> '500',
						"description"		=> __("Delay",'apcore'),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin',
					),
					array(
						"type"				=> "textfield",
						"heading"			=> __("Extra class name", "apcore"),
						"param_name"		=> "el_class",
						"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
					),
					array(
						'type'				=> 'zolo_video_link_param',
						'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
						'param_name'		=> 'tutorials',
						'doc_link'			=> $doc_link,
						'video_link'		=> 'https://youtu.be/YHVJwWNL3SA',
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
						'settings'			=> array(
							'fields'		=> array(
								'tag' => 'h2',
								'font_size',							
								'line_height',
								'letter_spacing',
								'font_style',
								'color',
							),
						),
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
					array(
						'type' => 'css_editor',
						'heading' => __( 'CSS box', 'apcore' ),
						'param_name' => 'css',
						'group' => __( 'Design Options', 'apcore' ),
					),
				),
				
			//"js_view" => 'VcColumnView'
			) 
		);		
		
	}		