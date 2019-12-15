<?php 
/*-----------------------------------------------------------------------------------*/
/* Light Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Lightbox extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Light Box", 'apcore'),
			"base"			=> "apress_lightbox",
			"class"			=> "",
			"weight" 		=> 13,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Lightbox for both image and video", "apcore"),
			"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-lightbox.png",
			"params"	=> array(	
							array(
								"type"       => "dropdown",
								"param_name" => "lightbox_type",
								"heading"    => esc_html__( "Lightbox type", "apcore" ),
								"value"      => array(
									esc_html__( "Image", "apcore" )  => "image",
									esc_html__( "Video", "apcore" )  => "video",
								),
								"admin_label" => true,								
							),
							array(
								"type"        => "textfield",
								"param_name"  => "link",
								"heading"     => esc_html__( "Lightbox link", "apcore" ),
								"description" => __("The URL to your image or video e.g. <br/> http://apressthemes.com/wp-content/uploads/2017/07/apress.png <br /> https://vimeo.com/9405917 <br/> https://www.youtube.com/watch?v=yUCFRL43Zm4", "apcore")
							),
							array(
								"type"			=> "dropdown",
								"heading"		=> __("Link Style", "apcore"),
								"param_name"	=> "link_style",
								"value"			=> array(
									"Link Icon"						=> "link_icon",
									"Link Icon With text"			=> "link_icon_with_text",
									"Link Icon With Preview Image"	=> "link_icon_preview_image",
								),
								"save_always"	=> true,
								"admin_label"	=> true,
								"description"	=> __("Please select your link style", "apcore" ),	 
							),
							array(
								"type"			=> "textfield",
								"heading"		=> __("Link Text", "apcore"),
								"param_name"	=> "link_text",
								"admin_label"	=> false,
								"dependency"	=> array('element' => "link_style", 'value' => "link_icon_with_text"),
								"description"	=> __("The text that will be displayed for your link", "apcore")
							),
							array(
								"type"			=> "textfield",
								"heading"		=> __("Icon Hover Caption", "apcore"),
								"param_name"	=> "link_hover_caption",
								"admin_label"	=> false,
								'dependency'=> array('element' => 'link_style', 'value' => array('link_icon', 'link_icon_preview_image')),	
								"description"	=> __("The text that will be displayed for your link", "apcore")
							),
							array(
								"type"			=> "attach_image",
								"heading"		=> __("Preview Image", "apcore"),
								"param_name"	=> "image_url",
								"value"			=> "",
								"dependency"	=> array("element" => "link_style", "value" => "link_icon_preview_image"),
								"description"	=> __("Select image from media library.", "apcore")
							),
							array(
								"type" => "colorpicker",
								"heading" => __("Icon Color",'apcore'),
								"param_name" => "button_imageicon_color",
								"value" => '#8E54E9',
								'dependency'=> array('element' => 'lightbox_type', 'value' => array('image')),
							),
							
							array(
								'type'        => 'radio_image_select',
								'heading'     => esc_html__( 'Select Link Icon', 'apcore' ),
								'param_name'  => 'select_button_style',
								'simple_mode' => false,
								'options'     => array(
									'video_icon_style1' => array(
										'tooltip' => esc_attr__('Icon Box Style1','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/lightbox/video_style1.jpg'
									),
									'video_icon_style2' => array(
										'tooltip' => esc_attr__('Icon Box Style2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/lightbox/video_style2.jpg'
									),
									'video_icon_style3' => array(
										'tooltip' => esc_attr__('Icon Box Style3','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/lightbox/video_style3.jpg'
									),
									'video_icon_style4' => array(
										'tooltip' => esc_attr__('Icon Box Style4','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/lightbox/video_style4.jpg'
									),
									'video_icon_style5' => array(
										'tooltip' => esc_attr__('Icon Box Style5','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/lightbox/video_style5.jpg'
									),
								),	
								'group'				=> esc_html__('Icon', 'apcore'),	
								'dependency'=> array('element' => 'lightbox_type', 'value' => array('video')),			
							),
							array(
								"type" => "colorpicker",
								"heading" => __("Icon Color",'apcore'),
								"param_name" => "button_icon_color",
								"value" => '#8E54E9',
								'dependency'=> array('element' => 'lightbox_type', 'value' => array('video')),
								'group'		=> esc_html__('Icon', 'apcore'),
							),
							array(
								"type" => "colorpicker",
								"heading" => __("Icon Hover Color",'apcore'),
								"param_name" => "button_icon_hover_color",
								"value" => '#000000',
								'dependency'		=> array('element' => 'select_button_style', 'value' => array('video_icon_style5')),
								'group'				=> esc_html__('Icon', 'apcore'),
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Hover effect?', 'apcore'),
								'param_name'		=> 'lightbox_hover_effect',
								'value'				=> 'no',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'group'				=> esc_html__('Icon', 'apcore'),	
								'dependency'		=> array('element' => 'select_button_style', 'value' => array('video_icon_style1', 'video_icon_style2', 'video_icon_style3')),	
							),
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Extra features', 'apcore'),
								'param_name'		=> 'subtitle_margin_heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							),
							array(
								"type"			=> "textfield",
								"heading"		=> __("Extra class name", "apcore"),
								"param_name"	=> "class",
								"description"	=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
							),
							array(
								"type"			=> "zolo_video_link_param",
								"heading"		=> esc_html__("Video tutorial and theme documentation article","apcore"),
								"param_name"	=> "tutorials",
								"doc_link"		=> $doc_link,
								"video_link"	=> "https://youtu.be/3hRzBcMIrjw",
							),
							
							array(
								'type'				=> 'zolo_font_container',
								'heading'			=> '',
								'param_name'		=> 'videolink_font_options',
								'settings'				=> array(
									'fields'				=> array(
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
								'param_name'		=> 'videolink_google_fonts',
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
								'param_name'		=> 'videolink_custom_fonts',
								'settings'			=> array(
									'fields'			=> array(
										'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
										'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
									),
								),
								'dependency' => array( 'element' => 'videolink_google_fonts', 'value' => 'yes'),
								'group'				=> esc_html__('Typography', 'apcore'),
							),	
							
						
						),
					) 
				);		
		
			}		