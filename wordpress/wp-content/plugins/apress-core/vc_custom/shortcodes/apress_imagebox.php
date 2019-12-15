<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Imagebox extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Image Box", 'apcore'),
					"base"			=> "apress_imagebox",
					"weight"		=> 12,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Image Box", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-imagebox.png",
					"params"		=> array(						
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Image Box Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'imagebox_style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/imagebox_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/imagebox_style2.jpg'
								),
							),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "imagebox_bg_color",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "imagebox_bor_color",
							'value'				=> '#dddddd',
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style1', 'style2')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image", "apcore"),
							"param_name"		=> "imagebox_image",
							"value"				=> "",
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Title",'apcore'),
							"param_name"		=> "imagebox_title",
							"value"				=> 'Your Title',
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
							"admin_label"		=> true,
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Title Font Size",'apcore'),
							"description"		=> __("Enter value without px", "apcore"),
							"param_name"		=> "imagebox_title_fonsize",
							"value"				=> '18',							
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Title font Color",'apcore'),
							"param_name"		=> "imagebox_title_color",
							'value'				=> '#777777',
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
						),
						array(
							"type"				=> "textarea_html",
							"class"				=> "",
							"heading"			=> __("Description Text Area",'apcore'),
							"param_name"		=> "content",
							"value"				=> 'Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.',
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Description font Color",'apcore'),
							"param_name"		=> "imagebox_description_color",
							'value'				=> '#777777',
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Text Align",'apcore'),
							"param_name"		=> "imagebox_align",
							"value"				=> array (
								"Center" => "center",
								"Left" => "left", 
								"Right" => "right" 
								), 
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style2')),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Button Design', 'apcore'),
							'param_name'		=> 'image_box_button_heading',
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Button Size",'apcore'),
							"param_name"		=> "imagebox_button_size",
							"value"				=> array (
								"Small" => "small",
								"Medium" => "medium", 
								"Large" => "large" 
							), 
							"admin_label"		=> true,
						),
						array(
							"type"				=> "checkbox",
							"class"				=> "",
							"heading"			=> __("Button Show on hover",'apcore'),
							"param_name"		=> "imagebox_button_show_onhover",
							'value'				=> array(  'Yes'  => true ),
							"description"		=> __("Check the box to display Button Show on hover",'apcore'),
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style1') ),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Button Position",'apcore'),
							"param_name"		=> "imagebox_button_position",
							"value"				=> array (
								"Middle" => "middle",
								"Top" => "top", 
								"Bottom" => "bottom" 
							), 
							'dependency'		=> array( 'element' => 'imagebox_style', 'value' => array('style1')),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Button Text",'apcore'),
							"param_name"		=> "imagebox_button_text",
							"value"				=> 'Read More',
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Button Text Font Size",'apcore'),
							"description"		=> __("Enter value without px", "apcore"),
							"param_name"		=> "imagebox_button_fontsize",
							"value"				=> '15',
						),
						array(
							"type" 				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Button Border Radius",'apcore'),
							"param_name"		=> "imagebox_button_border_radius",
							'value' 			=> array(
							__("Box",'apcore')		=> "0",
							__("Rounded",'apcore')	=> "100"
						),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Button Hover Style",'apcore'),
							"param_name"		=> "imagebox_button_hover_style",
							"value"				=> array (
								"Hover Style 1" => "hoverstyle1",
								"Hover Style 2" => "hoverstyle2",
								"Hover Style 3" => "hoverstyle3",
								"Hover Style 4" => "hoverstyle4",
								"Hover Style 5" => "hoverstyle5"
							), 
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button font Color",'apcore'),
							"param_name"		=> "imagebox_buttonfontcolor",
							'value'				=> '#eeeeee',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover font Color",'apcore'),
							"param_name"		=> "imagebox_buttonfontcolorhover",
							'value'				=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Background Color",'apcore'),
							"param_name"		=> "imagebox_buttonbackgroundcolor",
							'value'				=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Background Color",'apcore'),
							"param_name"		=> "imagebox_buttonbackgroundcolorhover",
							'value'				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button border Color",'apcore'),
							"param_name"		=> "imagebox_buttonbordercolor",
							'value'				=> '#777777',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover border Color",'apcore'),
							"param_name"		=> "imagebox_buttonbordercolorhover",
							'value'				=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),	
						array(
							"type"				=> "vc_link",
							"class"				=> "",
							"heading"			=> __("Image Box Link",'apcore'),
							"param_name"		=> "imagebox_link",
							"description"		=> __("http://example.com",'apcore')
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
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
					),
					) );		
		
			}		