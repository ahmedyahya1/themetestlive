<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Split Slider
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Vertical_Split_Slider extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Vertical Split Slider', 'apcore' ),
		"base"						=> "apress_vertical_split_slider",
		"as_parent"					=> array('only' => 'apress_vertical_left_sliding_panel,apress_vertical_right_sliding_panel'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __( "Vertical Split Slider", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-split_slider.png",
		"show_settings_on_create"	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra class name', 'apcore'),
				'param_name'	=> 'el_class',
				'description'	=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
		)
	));		
}		
class WPBakeryShortCode_Apress_Vertical_Left_Sliding_Panel  extends WPBakeryShortCodesContainer {}
if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Left Sliding Panel', 'apcore' ),
		"base"						=> "apress_vertical_left_sliding_panel",
		"as_parent"					=> array('only' => 'apress_vertical_slide_content_item'),
		"as_child"					=> array('only' => 'apress_vertical_split_slider'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-split_slider_left_panel.png",
		"show_settings_on_create"	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra class name', 'apcore'),
				'param_name'	=> 'el_class',
				'description'	=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
		)
	));		
}	
class WPBakeryShortCode_Apress_Vertical_Right_Sliding_Panel  extends WPBakeryShortCodesContainer {}	
if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Right Sliding Panel', 'apcore' ),
		"base"						=> "apress_vertical_right_sliding_panel",
		"as_parent"					=> array('only' => 'apress_vertical_slide_content_item'),
		"as_child"					=> array('only' => 'apress_vertical_split_slider'),
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-split_slider_right_panel.png",
		"show_settings_on_create"	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra class name', 'apcore'),
				'param_name'	=> 'el_class',
				'description'	=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
		)
	) );		
}		
class WPBakeryShortCode_Apress_Vertical_Slide_Content_Item  extends WPBakeryShortCodesContainer {}
if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Slide Content Item', 'apcore' ),
		"base"						=> "apress_vertical_slide_content_item",
		'as_parent'					=> array('except' => 'apress_vertical_split_slider, apress_vertical_left_sliding_panel, apress_vertical_right_sliding_panel, apress_vertical_slide_content_item'),
  		'as_child'					=> array('only' => 'apress_vertical_left_sliding_panel, apress_vertical_right_sliding_panel'),
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-split_slider_item.png",
		"show_settings_on_create" 	=> true,
		"js_view"					=> 'VcColumnView',
		"params"				=> array(			
			array(
				"type"				=> "textfield",
				"heading"			=> __("Tool Tip Name",'apcore'),
				"description"		=> __("Navigation Tool Tips name",'apcore'),
				"param_name"		=> "split_navigation_tool_tip",
				'value'				=> '', 
			),
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__('Select Slide Background Style', 'apcore'),
				'param_name'		=> 'slide_bg_check',
				'value'				=> array(
					esc_html__('Light', 'apcore')	=> 'light',
					esc_html__('Dark', 'apcore')	=> 'dark'
				),
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Extra class name', 'apcore'),
				'param_name'		=> 'el_class',
				'description'		=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
			
			array(
				'type'				=> 'css_editor',
				'edit_field_class'	=> 'vc_col-xs-12 vc_column apress_side_by_side_item_custom_class',
				'heading'			=> esc_html__( 'CSS box', 'apcore' ),
				'param_name'		=> 'css',
				'group'				=> esc_html__( 'Design Options', 'apcore' )
			),
				
		)
	) );		
}	