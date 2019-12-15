<?php 
/*-----------------------------------------------------------------------------------*/
/* Process
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Process extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Process", 'apcore'),
			"base"			=> "apress_process",
			"as_child"	=> array('only' => 'apress_process_wrapper'), 
			"class"			=> "",
			"weight"		=> 20,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Process in awesome design", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-process.png",
			"params" => array(
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'process_style1' => array(
							'tooltip' => esc_attr__('Process Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/process/process_style1.jpg'
						),
						'process_style2' => array(
							'tooltip' => esc_attr__('Process Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/process/process_style2.jpg'
						),
						'process_style3' => array(
							'tooltip' => esc_attr__('Process Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/process/process_style3.jpg'
						),
						'process_style4' => array(
							'tooltip' => esc_attr__('Process Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/process/process_style4.jpg'
						),
						
					),
					"admin_label"	=> true,
				),
				array(
					'type'				=> 'attach_image',
					'heading'			=> esc_html__('Image', 'apcore'),
					'param_name'		=> 'process_image',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style2')),
				),
				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('Title', 'apcore'),
					'param_name'		=> 'title',
					'value'				=> esc_html__('Process Title','apcore'),
					'admin_label'		=> true,
				),
				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('Step', 'apcore'),
					'param_name'		=> 'process_step',
					'value'				=> esc_html__('01','apcore'),
					'admin_label'		=> true,
				),
				array(
					'type' => 'zolo_number',
					'heading' => esc_html__('Step from top','apcore'),
					'param_name' => 'step_from_top',
					'step' => '1',
					'value'	=> '50',
					'suffix' => 'px',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style2','process_style3')),
					"edit_field_class"	=> "vc_column vc_col-sm-6",
				),
				array(
					'type' => 'zolo_number',
					'heading' => esc_html__('Step from left','apcore'),
					'param_name' => 'step_from_left',
					'step' => '1',
					'value'	=> '50',
					'suffix' => 'px',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style2','process_style3')),
					"edit_field_class"	=> "vc_column vc_col-sm-6",
				),
				array(
					'type'				=> 'textarea_html',
					'heading'			=> esc_html__('Content', 'apcore'),
					'param_name'		=> 'content',
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Content Alignment', 'apcore'),
					'param_name'		=> 'content_alignment',
					'value'				=> 'center',
					'options'			=> array(
						esc_html__('Left', 'apcore')	=> 'left',
						esc_html__('Center', 'apcore') => 'center',
						esc_html__('Right', 'apcore')	=> 'right'
					),
					'dependency'		=> array('element' => 'style', 'value' => array('process_style2','process_style3')),
				),
				array(
				   'type'    	=> 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Shadow', 'apcore'),
				   'param_name' => 'box_shadow',
				   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
				   'dependency'		=> array('element' => 'style', 'value' => array('process_style1','process_style4')),
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
					'video_link'		=> 'https://youtu.be/Hh3aA1_2AxU',
				),				
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Icon to display', 'apcore'),
					'param_name'		=> 'icon_to_display',
					'value'				=> 'icon',
					'options'			=> array(
						esc_html__('Icon', 'apcore')	=> 'icon',
						esc_html__('Image', 'apcore')	=> 'image',
					),
					'dependency'		=> array('element' => 'style', 'value' => 'process_style1'),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type' => 'dropdown',
					'heading' => __( 'Icon library', 'apcore' ),
					'value' => array(
						__( 'Font Awesome', 'apcore' ) => 'fontawesome',
						__( 'Open Iconic', 'apcore' ) => 'openiconic',
						__( 'Typicons', 'apcore' ) => 'typicons',
						__( 'Entypo', 'apcore' ) => 'entypo',
						__( 'Linecons', 'apcore' ) => 'linecons',
						__( 'Mono Social', 'apcore' ) => 'monosocial',
						__( 'Linea', 'apcore' ) 	=> 'linea',
					),
					'save_always'=> true,
					'param_name' => 'icon_family',
					'description'=> __( 'Select icon library.', 'apcore' ),
					'dependency'		=> array('element' => 'icon_to_display', 'value' => 'icon'),
					'group'		=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __('Icon', 'apcore'),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-adjust',
					'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family', 'value' => 'fontawesome'),
					'description' => __('Select icon from library.', 'apcore'),
					'group'		=> esc_html__('Icon', 'apcore'),					
				),	
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial',
					'settings' => array('emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'openiconic'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'		=> esc_html__('Icon', 'apcore'),	
				),	
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness',
					'settings' => array('emptyIcon' => false,'type' => 'typicons','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'typicons'),
					'description' => __( 'Select icon from library.', 'apcore'),
					'group'		=> esc_html__('Icon', 'apcore'),	
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note',
					'settings' => array('emptyIcon' => false,'type' => 'entypo','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'entypo'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'		=> esc_html__('Icon', 'apcore'),	
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart',
					'settings' => array('emptyIcon' => false,'type' => 'linecons','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'linecons'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'		=> esc_html__('Icon', 'apcore'),	
				),	
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_monosocial',
					'value' => 'vc-mono vc-mono-fivehundredpx',
					'settings' => array('emptyIcon' => false,'type' => 'monosocial','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'monosocial'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'		=> esc_html__('Icon', 'apcore'),	
				),
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __('Icon', 'apcore'),
					'param_name'		=> 'icon_linea',
					'value'				=> 'icon-basic-heart',
					'settings'			=> array( 'emptyIcon' => true, 'type' => 'linea', 'iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family', 'value' => 'linea'),
					'description'		=> __('Select icon from library.', 'apcore'),
					'group'				=> __( 'Icon', 'apcore' ),
				),
				array(
					'type'				=> 'attach_image',
					'heading'			=> esc_html__('Upload Image', 'apcore'),
					'param_name'		=> 'upload_image',
					'dependency'		=> array('element' => 'icon_to_display', 'value' => array('image')),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type' => 'zolo_number',
					'heading' => esc_html__('Icon size','apcore'),
					'param_name' => 'icon_size',
					'step' => '1',
					'suffix' => 'px',
					'dependency'		=> array('element' => 'style', 'value' => 'process_style1'),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Icon Background Color",'apcore'),
					"param_name" => "icon_bg_color",
					"value" => '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style1')),
					'group'				=> esc_html__('Icon', 'apcore'),
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
					'dependency'		=> array('element' => 'icon_to_display', 'value' => 'icon'),
					'group'				=> esc_html__('Icon', 'apcore'),
				),	
				array(
					"type" => "colorpicker",
					"heading" => __("Icon Color",'apcore'),
					"param_name" => "icon_color",
					"value" => '',
					"description" => __("Select icon color.",'apcore'),
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Icon Border Color",'apcore'),
					"param_name" => "icon_border_color",
					"value" => '',
					"description" => __("Select icon border color.",'apcore'),
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'group'				=> esc_html__('Icon', 'apcore'),
				),				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_typo_heading',
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'title_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'tag' => 'h1',
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
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
					'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Step Typography & Style', 'apcore'),
					'param_name'		=> 'step_typo_heading',
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'step_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'tag' => 'h1',
							'font_size'=>'100',							
							'line_height'=>'',	
							'letter_spacing',
							'font_style',
							'color'=>'#f1f1f1',	
						),
					),
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'step_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'step_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'dependency' => array( 'element' => 'step_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				
				array(
					"type" => "colorpicker",
					"heading" => __("Hover Font Color",'apcore'),
					"param_name" => "step_hover_text_color",
					"value" => '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style4')),
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Background Color",'apcore'),
					"param_name" => "step_bg_color",
					"value" => '#ffffff',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style4')),
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Hover Background Color",'apcore'),
					"param_name" => "step_bg_color_hover",
					"value" => '#f1f1f1',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style4')),
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				array(
					"type" => "colorpicker",
					"heading" => __("Border Color",'apcore'),
					"param_name" => "step_border_color",
					"value" => '#549ffc',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'style', 'value' => array('process_style4')),
					'group'				=> esc_html__('Step Typography & Style', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Content Typography', 'apcore'),
					'param_name'		=> 'content_typo_heading',
					'group'				=> esc_html__('Content Typography', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'content_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'tag' => 'div',
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
					'group'				=> esc_html__('Content Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'content_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Content Typography', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'content_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'dependency' => array( 'element' => 'content_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Content Typography', 'apcore'),
				),
				
				
				array(
					'type'				=> 'zolo_param_responsive_text',
					'heading'			=> esc_html__('Title responsive settings', 'apcore'),
					'param_name'		=> 'title_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_responsive_text',
					'heading'			=> esc_html__('Step responsive settings', 'apcore'),
					'param_name'		=> 'step_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
								
				),
				
			//"js_view" => 'VcColumnView'
			) 
		);		
		
	}		