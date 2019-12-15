<?php 
/*-----------------------------------------------------------------------------------*/
/* Cascading Parent
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Process_Wrapper extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Process Wrapper', 'apcore' ),
		"base"						=> "apress_process_wrapper",
		"as_parent"					=> array('only' => 'apress_process'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __("Beutiful Process Design", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-cascadingwrapper.png",
		"show_settings_on_create" 	=> false,
		"js_view"					=> 'VcColumnView',
		'params'					=> array(
			
			array(
				"type"				=> "dropdown",
				"class"				=> "",
				"heading"			=> __("Number of Items per row",'apcore'),
				"param_name"		=> "process_item_per_row",
				"value"		=> array(
							__("Six",'apcore')		=> "six",
							__("Five",'apcore')		=> "five",
							__("Four",'apcore')		=> "four",
							__("Three",'apcore')	=> "three",
							__("Two",'apcore')		=> "two"
							),
				'std' => 'four',
			),
			array(
				'type'				=> 'zolo_single_checkbox',
				'heading'			=> esc_html__('Conector Enable?', 'apcore'),
				'param_name'		=> 'conector_enable',
				'value'				=> 'no',
				'options'			=> array(
					'yes'			=> array(
						'on'				=> 'Yes',
						'off'				=> 'No',
					),
				),
				'description'	=> esc_html__('Connector will only work in style 1', 'apcore')
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Conector Type', 'apcore'),
				'param_name'		=> 'conector_type',
				'value'				=> 'dashed',
				'options'			=> array(
						__("Dashed",'apcore')	=> "dashed",
						__("Solid",'apcore')	=> "solid",
				),
				"dependency"	=> array('element' => "conector_enable", 'value' => array('yes')),
			),
			array(
				"type" => "colorpicker",
				"class" => "",
				"heading" => __("Conector color",'apcore'),
				"param_name" => "conector_color",
				"value" => '#ddd',
				"dependency"	=> array('element' => "conector_enable", 'value' => array('yes')),
			),
			
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Extra class name', 'apcore'),
				'param_name'	=> 'el_class',
				'description'	=> esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'apcore')
			),
		)
	));		
}		
