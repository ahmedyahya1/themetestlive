<?php 
/*-----------------------------------------------------------------------------------*/
/* Button
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Icon_Button extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Icon Button", 'apcore'),
			"base"			=> "apress_icon_button",
			"weight"		=> 4,
			"class"			=> "",
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Button with gradient options", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-button.png",
			"params"		=> array(
			
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'style1' => array(
							'tooltip' => esc_attr__('Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style1.jpg'
						),
						'style2' => array(
							'tooltip' => esc_attr__('Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style2.jpg'
						),
						'style3' => array(
							'tooltip' => esc_attr__('Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style3.jpg'
						),
						'style4' => array(
							'tooltip' => esc_attr__('Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style4.jpg'
						),
						'style5' => array(
							'tooltip' => esc_attr__('Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style5.jpg'
						),
						'style6' => array(
							'tooltip' => esc_attr__('Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style6.jpg'
						),
						'style7' => array(
							'tooltip' => esc_attr__('Style7','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style7.jpg'
						),
						'style8' => array(
							'tooltip' => esc_attr__('Style8','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style8.jpg'
						),
						'style9' => array(
							'tooltip' => esc_attr__('Style9','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style9.jpg'
						),
						'style10' => array(
							'tooltip' => esc_attr__('Style10','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style10.jpg'
						),
					),					
				),
				array(
					"type"			=> "vc_link",
					"heading"		=> __("Button Link",'apcore'),
					"param_name"	=> "button_link",
					"description"	=> __("http://example.com",'apcore'),
				 ),
				 array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					'param_name'		=> "icon_color",
					"value"				=> '#e0e0e0',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style5', 'style7', 'style9')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Hover Color",'apcore'),
					'param_name'		=> "icon_hover_color",
					"value"				=> '#e0e0e0',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style5', 'style7', 'style9')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Background Color",'apcore'),
					'param_name'		=> "background_color",
					"value"				=> '#0000d6',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('style3', 'style5', 'style7', 'style9')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Hover Background Color",'apcore'),
					'param_name'		=> "hover_background_color",
					"value"				=> '#0000d6',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('style3', 'style5', 'style7', 'style9')),
				),
				 array(
					"type"				=> "colorpicker",
					"heading"			=> __("Border Color",'apcore'),
					'param_name'		=> "border_color",
					"value"				=> '#0000d6',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('style4', 'style6', 'style8', 'style10')),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Hover Border Color",'apcore'),
					'param_name'		=> "hover_border_color",
					"value"				=> '#0000d6',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('style4', 'style6', 'style8', 'style10')),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Alignment', 'apcore'),
					'param_name'		=> 'button_alignment',
					'value'				=> 'inline',
					'options'			=> array(
						esc_html__('Inline', 'apcore')	=> 'inline',
						esc_html__('Left', 'apcore') 	=> 'left',
						esc_html__('Right', 'apcore')	=> 'right',
						esc_html__('Center', 'apcore')	=> 'center'
					),
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Button Shadow', 'apcore'),
					'param_name'		=> 'button_shadow',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'dependency'		=> array('element' => 'style', 'value' => array('style3', 'style5', 'style7', 'style9')),
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
					'type'				=> 'zolo_video_link_param',
					'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
					'param_name'		=> 'tutorials',
					'doc_link'			=> $doc_link,
					'video_link'		=> 'https://youtu.be/d5rL7pfQ0_Q',
				),
										
				),
				
			//"js_view" => 'VcColumnView'
			) 
		);		
		
	}		