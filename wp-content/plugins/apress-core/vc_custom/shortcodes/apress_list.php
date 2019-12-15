<?php 
/*-----------------------------------------------------------------------------------*/
/* List
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_List extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("List", 'apcore'),
			"base"			=> "apress_list",
			"class"			=> "",
			"weight"		=> 7,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __("Beutiful List Designs", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-list.png",
			"params"		=> array(
				
				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('Title', 'apcore'),
					'param_name'		=> 'list_title',
					'value'				=> esc_html__('Title area','apcore'),
				),
				array(
					'type' 				=> 'zolo_number',
					'heading'			=> esc_html__('List Item Margin','apcore'),
					'param_name'		=> 'list_item_margin',
					'value'				=> '10',
					'step'				=> '1',
					'suffix'			=> 'px',
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('List Border', 'apcore'),
					'param_name'		=> 'list_border',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Border Color",'apcore'),
					"param_name"		=> "list_border_color",
					"value"				=> '#f2f2f2',
					'dependency'		=> array('element' => 'list_border', 'value' => array('yes')),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Extra features', 'apcore'),
					'param_name'		=> 'features_heading',
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
					'param_name'		=> 'icon_size',
					'value'				=> '18',
					'step'				=> '1',
					'suffix'			=> 'px',
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Icon style', 'apcore'),
					'param_name'		=> 'icon_style',
					'value'				=> 'simple',
					'options'			=> array(
						esc_html__('Simple', 'apcore')	=> 'simple',
						esc_html__('Circle Background', 'apcore')	=> 'circle_background',
						esc_html__('Square Background', 'apcore')	=> 'square_background',
					),
					'group'				=> esc_html__('Icon', 'apcore'),
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
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Icon Color",'apcore'),
					"param_name"		=> "list_icon_color",
					"value"				=> '#549ffc',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'group'				=> esc_html__('Icon', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'title_font_options',
					'settings'				=> array(
						'fields'				=> array(
							'tag' => 'h5',
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
					'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Typography', 'apcore'),
				),
					
				),
			) 
		);		
		
	}		