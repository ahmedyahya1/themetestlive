<?php 
/*-----------------------------------------------------------------------------------*/
/* Heading
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Heading extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Heading", 'apcore'),
			"base"			=> "apress_heading",
			"class"			=> "",
			"weight"		=> 8,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Heading with Google fonts", "apcore"),			
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-heading.png",
			"params"		=> array(					
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'options'     => array(
						'heading_style1' => array(
							'tooltip' => esc_attr__('Heading Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style1.jpg'
						),
						'heading_style2' => array(
							'tooltip' => esc_attr__('Heading Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style2.jpg'
						),
						'heading_style3' => array(
							'tooltip' => esc_attr__('Heading Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style3.jpg'
						),
						'heading_style4' => array(
							'tooltip' => esc_attr__('Heading Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style4.jpg'
						),
						'heading_style5' => array(
							'tooltip' => esc_attr__('Heading Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style5.jpg'
						),
						'heading_style6' => array(
							'tooltip' => esc_attr__('Heading Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style6.jpg'
						),
						'heading_style7' => array(
							'tooltip' => esc_attr__('Heading Style7','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style7.jpg'
						),
						'heading_style8' => array(
							'tooltip' => esc_attr__('Heading Style8','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style8.jpg'
						),
						
						'heading_style9' => array(
							'tooltip' => esc_attr__('Heading Style9','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style9.jpg'
						),
						'heading_style10' => array(
							'tooltip' => esc_attr__('Heading Style10','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style10.jpg'
						),
						'heading_style11' => array(
							'tooltip' => esc_attr__('Heading Style11','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style11.jpg'
						),
						'heading_style12' => array(
							'tooltip' => esc_attr__('Heading Style12','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style12.jpg'
						),
						'heading_style13' => array(
							'tooltip' => esc_attr__('Heading Style13','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style13.jpg'
						),
						'heading_style14' => array(
							'tooltip' => esc_attr__('Heading Style14','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/heading/heading_style14.jpg'
						),
						
					),					
				),
				array(
					'type'				=> 'textarea_html',
					'heading'			=> esc_html__('Heading', 'apcore'),
					'param_name'		=> 'content',
					'value'				=> esc_html__('Heading','apcore'),
					'admin_label'		=> true,
				),
				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('Sub Heading', 'apcore'),
					'param_name'		=> 'sub_title',
					'value'				=> esc_html__('Sub Heading','apcore'),
					'admin_label'		=> true,
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Line Color', 'apcore'),
					'param_name'		=> 'sub_title_bg_color',
					"value" 			=> '#f2f2f2', 
					'dependency'		=> array('element' => 'style', 'value' => array('heading_style11', 'heading_style12')),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Content alignment', 'apcore'),
					'param_name'		=> 'content_alignment',
					'value'				=> 'center',
					'options'			=> array(
						esc_html__('Left', 'apcore')	=> 'left',
						esc_html__('Center', 'apcore') => 'center',
						esc_html__('Right', 'apcore')	=> 'right'
					),
					'dependency'		=> array('element' => 'style', 'value' => array('heading_style1', 'heading_style2', 'heading_style3', 'heading_style4', 'heading_style5', 'heading_style6', 'heading_style7', 'heading_style8', 'heading_style11', 'heading_style12', 'heading_style13')),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				),	
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title margins', 'apcore'),
					'param_name'		=> 'title_margin_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				),
				array(
					'type'				=> 'zolo_margins',
					'heading'			=> '',
					'param_name'		=> 'heading_margin',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Bottom', 'apcore') => "bottom",
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Subtitle margins', 'apcore'),
					'param_name'		=> 'subtitle_margin_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				),
				array(
					'type'				=> 'zolo_margins',
					'heading'			=> '',
					'param_name'		=> 'subheading_margin',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Bottom', 'apcore') => "bottom",
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Extra features', 'apcore'),
					'param_name'		=> 'subtitle_margin_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Animations', 'apcore'),
					'param_name'		=> 'animation_type',
					'value'				=> 'default',
					'options'			=> array(
						esc_html__('Default', 'apcore')	=> 'default',
						esc_html__('Clipping', 'apcore')=> 'clipping',
					),
				),
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Choose Style",'apcore'),
					"param_name"		=> "clipping_animation_type",
					'value' => array(
						__("Clipping left to right",'apcore') 	=> "clipping_left_to_right",
						__("Clipping right to left",'apcore') 	=> "clipping_right_to_left",
						__("Clipping bottom to top",'apcore') 	=> "clipping_bottom_to_top",
						__("Clipping top to bottom",'apcore') 	=> "clipping_top_to_bottom",
					),
					'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Clipping Color', 'apcore'),
					'param_name'		=> 'clipping_color',
					"value" 			=> '#f2f2f2',
					'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
				),
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("CSS Animation",'apcore'),
					"param_name"		=> "data_animation",
					"value"				=> apress_data_animations(),
					"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin',
					'dependency'		=> array('element' => 'animation_style', 'value' => 'default'),
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
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Delimiter', 'apcore'),
					'param_name'		=> 'enable_delimiter_9_10',
					'value'				=> 'yes',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'dependency'		=> array('element' => 'style', 'value' => array('heading_style9', 'heading_style10')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Delimiter style', 'apcore'),
					'param_name'		=> 'delimiter_style_9_10',
					'value'				=> 'line',
					'options'			=> array(
						esc_html__('Line', 'apcore')	=> 'line',
						esc_html__('Image', 'apcore')	=> 'image',
					),
					'dependency'		=> array('element' => 'enable_delimiter_9_10', 'value' => 'yes'),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Choose Style",'apcore'),
					"param_name"		=> "delimiter_line_style_9_10",
					'value' => array(
						__("Solid",'apcore') 	=> "solid",
						__("Dotted",'apcore') 	=> "dotted",
						__("Dashed",'apcore') 	=> "dashed",
						__("Double",'apcore') 	=> "double"
					),
					'dependency'		=> array('element' => 'delimiter_style_9_10', 'value' => array('line')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Delimiter Height', 'apcore'),
					'param_name'		=> 'delimiter_line_height_9_10',
					'value'				=> 50,
					'suffix' 			=> 'px',
					'dependency'		=> array('element' => 'delimiter_style_9_10', 'value' => array('line')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Line Color', 'apcore'),
					'param_name'		=> 'delimiter_line_color_9_10',
					'edit_field_class'	=> 'vc_column vc_col-sm-6',
					'dependency'		=> array('element' => 'delimiter_style_9_10', 'value' => array('line')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'attach_image',
					'heading'			=> esc_html__('Delimiter Image', 'apcore'),
					'param_name'		=> 'delimiter_image_9_10',
					'dependency'		=> array('element' => 'delimiter_style_9_10', 'value' => array('image')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				
				
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Delimiter', 'apcore'),
					'param_name'		=> 'enable_delimiter',
					'value'				=> 'yes',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'dependency'		=> array('element' => 'style', 'value' => array('heading_style1', 'heading_style2', 'heading_style3', 'heading_style4', 'heading_style5', 'heading_style6', 'heading_style7', 'heading_style8', 'heading_style13', 'heading_style14')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Delimiter style', 'apcore'),
					'param_name'		=> 'delimiter_style',
					'value'				=> 'line',
					'options'			=> array(
						esc_html__('Line', 'apcore')	=> 'line',
						esc_html__('Icon', 'apcore')	=> 'icon',
						esc_html__('Image', 'apcore')	=> 'image',
						esc_html__('Line with icon', 'apcore')=> 'line_with_icon',
					),
					'dependency'		=> array('element' => 'enable_delimiter', 'value' => 'yes'),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				
				array(
					"type"				=> "dropdown",
					"heading"			=> __("Choose Style",'apcore'),
					"param_name"		=> "delimiter_line_style",
					'value' => array(
						__("Solid",'apcore') 	=> "solid",
						__("Dotted",'apcore') 	=> "dotted",
						__("Dashed",'apcore') 	=> "dashed",
						__("Double",'apcore') 	=> "double"
					),
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('line', 'line_with_icon')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Delimiter Height', 'apcore'),
					'param_name'		=> 'delimiter_line_height',
					'value'				=> 3,
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'delimiter_line_style', 'value' => array('solid','dotted','dashed','double')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Delimiter Width', 'apcore'),
					'param_name'		=> 'delimiter_line_width',
					'value'				=> 80,
					'suffix' 			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'delimiter_line_style', 'value' => array('solid','dotted','dashed','double')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Line Color', 'apcore'),
					'param_name'		=> 'delimiter_line_color',
					'edit_field_class'	=> 'vc_column vc_col-sm-6',
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('line','line_with_icon')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Space between Line & Icon', 'apcore'),
					'param_name'		=> 'space_between_line_icon',
					'value'				=> 20,
					'suffix' 			=> 'px',
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('line_with_icon')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
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
					'save_always' 	=> true,
					'param_name' 	=> 'icon_family',
					'description' 	=> __( 'Select icon library.', 'apcore' ),
					'dependency'	=> array('element' => 'delimiter_style', 'value' => array('icon', 'line_with_icon')),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __('Icon', 'apcore'),
					'param_name' => 'icon_fontawesome',
					'value' => 'fa fa-adjust',
					'settings' => array( 'emptyIcon' => false, 'iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family', 'value' => 'fontawesome'),
					'description' => __('Select icon from library.', 'apcore'),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),	
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_openiconic',
					'value' => 'vc-oi vc-oi-dial',
					'settings' => array('emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'openiconic'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),	
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_typicons',
					'value' => 'typcn typcn-adjust-brightness',
					'settings' => array('emptyIcon' => false,'type' => 'typicons','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'typicons'),
					'description' => __( 'Select icon from library.', 'apcore'),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_entypo',
					'value' => 'entypo-icon entypo-icon-note',
					'settings' => array('emptyIcon' => false,'type' => 'entypo','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'entypo'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_linecons',
					'value' => 'vc_li vc_li-heart',
					'settings' => array('emptyIcon' => false,'type' => 'linecons','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'linecons'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),	
				array(
					'type' => 'iconpicker',
					'heading' => __( 'Icon', 'apcore' ),
					'param_name' => 'icon_monosocial',
					'value' => 'vc-mono vc-mono-fivehundredpx',
					'value' => 'vc-mono vc-mono-fivehundredpx',
					'settings' => array('emptyIcon' => false,'type' => 'monosocial','iconsPerPage' => 4000),
					'dependency' => array('element' => 'icon_family','value' => 'monosocial'),
					'description' => __( 'Select icon from library.', 'apcore' ),
					'group'			=> esc_html__('Delimiter', 'apcore'),
				),	
				array(
					'type'				=> 'iconpicker',
					'heading'			=> __('Icon', 'apcore'),
					'param_name'		=> 'icon_linea',
					'value'				=> 'icon-basic-heart',
					'settings'			=> array( 'emptyIcon' => true, 'type' => 'linea', 'iconsPerPage' => 4000),
					'dependency'		=> array('element' => 'icon_family', 'value' => 'linea'),
					'description'		=> __('Select icon from library.', 'apcore'),
					'group'				=> __( 'Delimiter', 'apcore' ),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Icon size','apcore'),
					'param_name'		=> 'delimiter_icon_size',
					'value'				=> '30',
					'step'				=> '1',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('icon', 'line_with_icon')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),				
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Color', 'apcore'),
					'param_name'		=> 'icon_color',
					'edit_field_class'	=> 'vc_column vc_col-sm-6',
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('icon', 'line_with_icon')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
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
						esc_html__('Design your own', 'apcore')		=> 'design_your_own',
						
					),
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('icon', 'line_with_icon')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Background Color', 'apcore'),
					'param_name'		=> 'icon_background_color',
					"value" 			=> '#eeeeee', 
					'dependency'		=> array('element' => 'icon_style', 'value' => array( 'circle_background','square_background','design_your_own' )),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Background Size','apcore'),
					'param_name'		=> 'icon_background_size',
					'value'				=> '50',
					'step'				=> '1',
					'suffix'			=> 'px',
					'dependency'		=> array('element' => 'icon_style', 'value' => array( 'design_your_own' )),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					"type" => "dropdown",
					"heading" => __("Icon Border Style",'apcore'),
					"param_name" => "icon_border_style",
					'value' => array(
						__("None",'apcore') 	=> "none",
						__("Solid",'apcore') 	=> "solid",
						__("Dotted",'apcore') 	=> "dotted",
						__("Dashed",'apcore') 	=> "dashed",
						__("Double",'apcore') 	=> "double",
						__("Inset",'apcore') 	=> "inset",
						__("Outset",'apcore') 	=> "outset"
					),
					'dependency'		=> array('element' => 'icon_style', 'value' => array( 'design_your_own' )),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Border Width','apcore'),
					'param_name'		=> 'icon_border_width',
					'value'				=> '1',
					'step'				=> '1',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'icon_border_style', 'value' => array('solid', 'dotted', 'dashed', 'double', 'inset', 'outset')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_number',
					'heading'			=> esc_html__('Border Radius','apcore'),
					'param_name'		=> 'icon_border_radius',
					'value'				=> '300',
					'step'				=> '1',
					'suffix'			=> 'px',
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
					'dependency'		=> array('element' => 'icon_border_style', 'value' => array('solid', 'dotted', 'dashed', 'double', 'inset', 'outset')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Border Color', 'apcore'),
					'param_name'		=> 'icon_border_color',
					"value" 			=> '#eaeaea', 
					'dependency'		=> array('element' => 'icon_border_style', 'value' => array('solid', 'dotted', 'dashed', 'double', 'inset', 'outset')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'attach_image',
					'heading'			=> esc_html__('Delimiter Image', 'apcore'),
					'param_name'		=> 'delimiter_image',
					'dependency'		=> array('element' => 'delimiter_style', 'value' => array('image')),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
			
				array(
					'type'				=> 'zolo_margins',
					'heading'			=> esc_html__('Delimiter Margins', 'apcore'),
					'param_name'		=> 'delimiter_margin',
					'positions'			=> array(
						esc_html__('Top', 'apcore') => "top",
						esc_html__('Bottom', 'apcore') => "bottom",
					),
					'value'				=> 'margin-top:10|margin-bottom:10',
					'dependency'		=> array('element' => 'enable_delimiter', 'not_empty' => true),
					'group'				=> esc_html__('Delimiter', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_t_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
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
						),
					),
					'group'				=> esc_html__('Title Typography', 'apcore'),
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
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Font Color",'apcore'),
					"param_name"		=> "main_heading_color",
					"value"				=> '',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
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
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Title Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Subtitle Typography', 'apcore'),
					'param_name'		=> 'subtitle_t_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Subtitle Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'subtitle_font_options',
					'settings'			=> array(
						'fields'			=> array(
							'tag' => 'div',
							'font_size',
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
					'group'				=> esc_html__('Subtitle Typography', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'subtitle_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Subtitle Typography', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'subtitle_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'dependency' => array( 'element' => 'subtitle_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Subtitle Typography', 'apcore'),
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
					'heading'			=> esc_html__('Sub Title responsive settings', 'apcore'),
					'param_name'		=> 'subtitle_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
			),
		) 
	);		
		
}		