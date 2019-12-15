<?php 
/*-----------------------------------------------------------------------------------*/
/* Gradient Icon Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Gradient_Icon_Box extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Gradient Icon Box", 'apcore'),
			"base"			=> "apress_gradient_icon_box",
			"class"			=> "",
			"weight"		=> 7,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Amazing Gradient Icon Box", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-gradient_icon_box.png",
			"params"		=> array(
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'iconbox_style1' => array(
							'tooltip' => esc_attr__('Icon Box Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style1.jpg'
						),
						'iconbox_style2' => array(
							'tooltip' => esc_attr__('Icon Box Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style2.jpg'
						),
						'iconbox_style3' => array(
							'tooltip' => esc_attr__('Icon Box Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style3.jpg'
						),
						'iconbox_style4' => array(
							'tooltip' => esc_attr__('Icon Box Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style4.jpg'
						),
						'iconbox_style5' => array(
							'tooltip' => esc_attr__('Icon Box Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style5.jpg'
						),
						'iconbox_style6' => array(
							'tooltip' => esc_attr__('Icon Box Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style6.jpg'
						),
						'iconbox_style7' => array(
							'tooltip' => esc_attr__('Icon Box Style7','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style7.gif'
						),
						'iconbox_style8' => array(
							'tooltip' => esc_attr__('Icon Box Style8','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/iconbox_style/iconbox_style8.jpg'
						),
					),					
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Icon Alignment",'apcore'),
					'param_name'		=> 'icon_alignment',
					'value'				=> array(
						__('Center', 'apcore')	=> 'center',
						__('Top Left', 'apcore') 	=> 'top_left',
						__('Top Right', 'apcore')	=> 'top_right',
						__('Left', 'apcore') 	=> 'left',
						__('Right', 'apcore')	=> 'right',
						
					),
					"admin_label"		=> true,
				),
				array(
					'type'				=> 'textarea_html',
					'heading'			=> esc_html__('Title', 'apcore'),
					'param_name'		=> 'content',
					'value'				=> esc_html__('Title','apcore'),
					'admin_label'		=> true,
				),
				array(
					'type'				=> 'textarea',
					'heading'			=> esc_html__('Description', 'apcore'),
					'param_name'		=> 'description',
					'value'				=> esc_html__('Description area','apcore'),
				),
				
				array(
					"type"				=> "vc_link",
					"heading"			=> __("Link",'apcore'),
					"param_name"		=> "box_link",
					"description"		=> __("http://example.com",'apcore'),
				 ),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Box Background Color",'apcore'),
					"param_name"		=> "box_bg_color",
					"value"				=> '#ffffff',
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Select Color Scheme",'apcore'),
					"param_name"		=> "color_scheme",
					"value"				=> array(
						__("Primary Color",'apcore') 	=> "primary_color_scheme",
						__("Color Scheme 1",'apcore') 	=> "color_scheme1",
						__("Color Scheme 2",'apcore') 	=> "color_scheme2",
						__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
						__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
						__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
						__("Custom Color",'apcore') 		=> "design_your_own"
					),
				),	
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					"param_name"		=> "custom_color",
					"value"				=> '#549ffc',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
				),	
				
				
				
				array(
					'type' 		=> 'zolo_number',
					'heading' 	=> __("Border Width",'apcore'),
					'param_name'=> 'highlight_border_width',
					"value" => 3,
					"step" => 1,
					'suffix'=> 'px',
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style8')),
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> __("Border Color",'apcore'),
					"param_name"	=> "highlight_border_color",
					"value"			=> '#e5e5e5',
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style8')),
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Border Hover Color Scheme",'apcore'),
					"param_name"	=> "border_hover_color_scheme",
					"value"			=> array(
						__("Primary Color",'apcore') 	=> "primary_color_scheme",
						__("Color Scheme 1",'apcore') 	=> "color_scheme1",
						__("Color Scheme 2",'apcore') 	=> "color_scheme2",
						__("Gradient Scheme 1",'apcore') => "gradient_scheme1",
						__("Gradient Scheme 2",'apcore') => "gradient_scheme2",
						__("Gradient Scheme 3",'apcore') => "gradient_scheme3",
						__("Custom Color",'apcore') 	=> "design_your_own"
					),
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style8')),
				),
				array(
					"type"			=> "colorpicker",
					"heading"		=> __("Border Hover Color",'apcore'),
					"param_name"	=> "border_hover_color",
					"value"			=> '#003ba3',
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
					'dependency'	=> array('element' => 'border_hover_color_scheme', 'value' => array('design_your_own')),
				),
				array(
				   'type'    => 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Box Shadow', 'apcore'),
				   'param_name' => 'box_shadow',
				   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:2|shadow_blur:10|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.08)',
				   'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				),
				array(
				   'type'    => 'zolo_box_shadow_param',
				   'heading'	=> esc_html__('Box Hover Shadow', 'apcore'),
				   'param_name' => 'box_hover_shadow',
				   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:90|shadow_spread:-38|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
				   'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				),
				
				array(
					"type" 			=> "zolo_number",
					"heading" 		=> __("Box top Padding",'apcore'),
					'description' 	=> __( 'Enter value without px', 'apcore' ),
					"param_name" 	=> "box_top_padding",
					"value" 		=> '40',
					'edit_field_class'	=> 'vc_column vc_col-sm-3',
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				 ),
				 array(
					"type" 			=> "zolo_number",
					"heading" 		=> __("Box Right Padding",'apcore'),
					'description' 	=> __( 'Enter value without px', 'apcore' ),
					"param_name" 	=> "box_right_padding",
					"value" 		=> '40',
					'edit_field_class'=> 'vc_column vc_col-sm-3',
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				 ),						 
				 array(
					"type" 			=> "zolo_number",
					"heading" 		=> __("Box Bottom Padding",'apcore'),
					'description' 	=> __( 'Enter value without px', 'apcore' ),
					"param_name" 	=> "box_bottom_padding",
					"value" 		=> '40',
					'edit_field_class'=> 'vc_column vc_col-sm-3',
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				 ),	
				 array(
					"type" 			=> "zolo_number",
					"heading" 		=> __("Box Left Padding",'apcore'),
					'description' 	=> __( 'Enter value without px', 'apcore' ),
					"param_name" 	=> "box_left_padding",
					"value" 		=> '40',
					'edit_field_class'=> 'vc_column vc_col-sm-3',
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style7', 'iconbox_style8')),
				 ),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Icon Shadow', 'apcore'),
					'param_name'		=> 'icon_shadow',
					'value'				=> 'yes',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'dependency'		=> array('element' => 'style', 'value' => array('iconbox_style2', 'iconbox_style4')),
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
					'video_link'		=> 'https://youtu.be/Gk6g0uOC9V0',
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Icon Type', 'apcore'),
					'param_name'		=> 'icon_type',
					'value'				=> 'icon',
					'options'			=> array(
						esc_html__('Icon', 'apcore')	=> 'icon',
						esc_html__('Image', 'apcore')	=> 'image',
						esc_html__('Animated SVG', 'apcore')	=> 'icon_svg',
					),
					'group'				=> esc_html__('Icon', 'apcore'),
				),	
				array(
					"type"				=> "attach_image",
					"class"				=> "",
					"heading"			=> __("Image", "apcore"),
					"param_name"		=> "icon_image",
					"value"				=> "",
					'dependency'		=> array('element' => 'icon_type', 'value' => array('image', 'icon_svg')),
					'group'				=> esc_html__('Icon', 'apcore'),
				),			
				array(
					"type"				=> "textfield",
					"heading"			=> esc_html__('SVG Animation Duration', 'apcore'),
					"param_name"		=> "icon_svg_animation_duration",
					"value"				=> '100',
					"description"		=> esc_html__( "Add delay in milliseconds.", "apcore" ),
					"dependency"		=> array( 'element' => "icon_type", 'value' => array( 'icon_svg' ) ),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Start Color",'apcore'),
					'param_name'		=> "start_color",
					"value"				=> '#0467e6',
					"dependency"		=> array( 'element' => "icon_type", 'value' => array( 'icon_svg' ) ),
					'group'				=> esc_html__('Icon', 'apcore'),
					'edit_field_class' 	=> 'vc_column vc_col-sm-6',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("End Color",'apcore'),
					'param_name'		=> "end_color",
					"value"				=> '#5295ea',
					"dependency"		=> array( 'element' => "icon_type", 'value' => array( 'icon_svg' ) ),
					'group'				=> esc_html__('Icon', 'apcore'),
					'edit_field_class' 	=> 'vc_column vc_col-sm-6',
				),
				array(
					'type'				=> 'dropdown',
					'heading'			=> __( 'Icon library', 'apcore' ),
					'value'				=> array(
						__( 'Font Awesome', 'apcore' )	=> 'fontawesome',
						__( 'Open Iconic', 'apcore' )	=> 'openiconic',
						__( 'Typicons', 'apcore' )		=> 'typicons',
						__( 'Entypo', 'apcore' )		=> 'entypo',
						__( 'Linecons', 'apcore' )		=> 'linecons',
						__( 'Mono Social', 'apcore' )	=> 'monosocial',
						__( 'Linea', 'apcore' ) 	=> 'linea',
					),
					'save_always' 		=> true,
					'param_name' 		=> 'icon_family',
					'description' 		=> __( 'Select icon library.', 'apcore' ),
					'dependency'		=> array('element' => 'icon_type', 'value' => 'icon'),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __('Icon', 'apcore'),
					'param_name'		=> 'icon_fontawesome',
					'value'				=> 'fa fa-adjust',
					'settings'			=> array( 'emptyIcon' => false, 'iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family', 'value' => 'fontawesome'),
					'description'		=> __('Select icon from library.', 'apcore'),
					'group'				=> esc_html__('Icon', 'apcore'),
				),	
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __( 'Icon', 'apcore' ),
					'param_name'		=> 'icon_openiconic',
					'value'				=> 'vc-oi vc-oi-dial',
					'settings'			=> array('emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family','value' => 'openiconic'),
					'description'		=> __( 'Select icon from library.', 'apcore' ),
					'group'				=> esc_html__('Icon', 'apcore'),
				),	
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __( 'Icon', 'apcore' ),
					'param_name'		=> 'icon_typicons',
					'value'				=> 'typcn typcn-adjust-brightness',
					'settings'			=> array('emptyIcon' => false,'type' => 'typicons','iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family','value' => 'typicons'),
					'description'		=> __( 'Select icon from library.', 'apcore'),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type' 				=> 'iconpicker',
					'heading' 			=> __( 'Icon', 'apcore' ),
					'param_name' 		=> 'icon_entypo',
					'value' 			=> 'entypo-icon entypo-icon-note',
					'settings' 			=> array('emptyIcon' => false,'type' => 'entypo','iconsPerPage' => 4000),
					'dependency' 		=> array('element' => 'icon_family','value' => 'entypo'),
					'description' 		=> __( 'Select icon from library.', 'apcore' ),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type' 				=> 'iconpicker',
					'heading' 			=> __( 'Icon', 'apcore' ),
					'param_name' 		=> 'icon_linecons',
					'value' 			=> 'vc_li vc_li-heart',
					'settings' 			=> array('emptyIcon' => false,'type' => 'linecons','iconsPerPage' => 4000),
					'dependency' 		=> array('element' => 'icon_family','value' => 'linecons'),
					'description' 		=> __( 'Select icon from library.', 'apcore' ),
					'group'				=> esc_html__('Icon', 'apcore'),
				),	
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __( 'Icon', 'apcore' ),
					'param_name'		=> 'icon_monosocial',
					'value'				=> 'vc-mono vc-mono-fivehundredpx',
					'settings'			=> array('emptyIcon' => false,'type' => 'monosocial','iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family','value' => 'monosocial'),
					'description'		=> __( 'Select icon from library.', 'apcore' ),
					'group'				=> esc_html__('Icon', 'apcore'),
				),	
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __('Icon', 'apcore'),
					'param_name'		=> 'icon_linea',
					'value'				=> 'icon-basic-heart',
					'settings'			=> array( 'emptyIcon' => true, 'type' => 'linea', 'iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family', 'value' => 'linea'),
					'description'		=> __('Select icon from library.', 'apcore'),
					'group'				=> esc_html__( 'Icon', 'apcore' ),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading'			=> esc_html__('Icon size','apcore'),
					'param_name'		=> 'gradient_icon_size',
					'value'				=> '30',
					'step'				=> '1',
					'suffix'			=> 'px',
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Title Typography', 'apcore'),
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
					'text'				=> esc_html__('Description Typography', 'apcore'),
					'param_name'		=> 'description_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Description Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'description_font_options',
					'settings'				=> array(
						'fields'			=> array(
							'font_size',							
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
					'group'				=> esc_html__('Description Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'description_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Description Typography', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'description_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'dependency' => array( 'element' => 'description_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Description Typography', 'apcore'),
				),					
				),
			) 
		);		
		
	}		