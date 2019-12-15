<?php 
/*-----------------------------------------------------------------------------------*/
/* Cascading Parent
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Cascading_Wrapper extends WPBakeryShortCodesContainer {}

if ( function_exists( 'vc_map' ) ) {
vc_map( array(
		"name"						=>  __( 'Cascading Wrapper', 'apcore' ),
		"base"						=> "apress_cascading_wrapper",
		"as_parent"					=> array('only' => 'apress_cascading_image'), 
		"content_element"			=> true,
		"category"					=> __( "Apress", "apcore"),
		"description"				=> __("Beutiful Cascading Design", "apcore"),
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-cascadingwrapper.png",
		"show_settings_on_create" 	=> false,
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
