<?php 
/*-----------------------------------------------------------------------------------*/
/* SVG morphing
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Morphing extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(		
		"name"			=> __("Morphing", "apcore"),
		"base"			=> "apress_morphing",
		"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-morphing.png",
		"weight"		=> 32,
		"category"		=> __('Apress', 'apcore'),
		"description"	=> __("Amazing SVG Morphing", "apcore"),
		"params"		=> array(			
			array(
				"type"             => "zolo_param_heading",
				"param_name"       => "choose_color",
				"text"             => __( "Amazing SVG Morphing", "apcore" ),
				"value"            => "",
				"class"            => ""
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("Start Color",'apcore'),
				'param_name'		=> "start_bg_color",
				"value"				=> '#0467e6',
				'edit_field_class' 	=> 'vc_column vc_col-sm-6',
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> __("End Color",'apcore'),
				'param_name'		=> "end_bg_color",
				"value"				=> '#5295ea',
				'edit_field_class' 	=> 'vc_column vc_col-sm-6',
			),
			array(
				'type' 			=> 'attach_image',
				'heading' 		=> __( 'Image', 'apcore' ),
				'param_name' 	=> 'image',
				'description' 	=> __( 'Minimun Image dimension 1080px X 894px.</br><strong style="color: #333;">Higher image size needs to be same aspect ratio.</strong>', 'apcore' ),
				'value' 		=> '',
			),
			array(
				'type'			=> 'zolo_number',
				'heading'		=> __("Image Opacity",'apcore'),
				'param_name'	=> 'opacity',
				"value"			=> 0.7,
				"min"			=> 0.0,
				"max"			=> 1.0,
				"step"			=> 0.1,
			),	
			array(
				  "type"				=> "zolo_number",
				  "heading"				=> __("Desktop", 'apcore'),
				  'description' 		=> __( 'Enter height for Desktop', 'apcore' ),
				  "param_name"			=> "desktop_height",
				  'value'				=> 500,
				  'suffix' 				=> 'px',
				  'save_always'			=> true,
				  'edit_field_class'	=> 'vc_column vc_col-sm-6',
			),
			array(
				  "type"				=> "zolo_number",
				  "heading"				=> __("Desktop( Max-width-1050px )", 'apcore'),
				  'description' 		=> __( 'Enter height for Desktop - Max-width-1050px', 'apcore' ),
				  "param_name"			=> "small_desktop_height",
				  'value'				=> 400,
				  'suffix'				=> 'px',
				  'save_always'			=> true,
				  'edit_field_class'	=> 'vc_column vc_col-sm-6',
			),
			array(
				  "type"				=> "zolo_number",
				  "heading"				=> __("Tablet", 'apcore'),
				  'description'			=> __( 'Enter height for Tablet', 'apcore' ),
				  "param_name"			=> "tablet_height",
				  'value'				=> 300,
				  'suffix' 				=> 'px',
				  'save_always'			=> true,
				  'edit_field_class'	=> 'vc_column vc_col-sm-6',
			),
			array(
				  "type"				=> "zolo_number",
				  "heading"				=> __("Mobile", 'apcore'),
				  'description'			=> __( 'Enter height for Mobile', 'apcore' ),
				  "param_name"			=> "mobile_height",
				  'value'				=> 250,
				  'suffix' 				=> 'px',
				  'save_always'			=> true,
				  'edit_field_class'	=> 'vc_column vc_col-sm-6',
			),
			array(
				"type"					=> "textfield",
				"heading"				=> __("Z-Index","apcore"),
				"param_name"			=> "z_index",
				"value"					=> "",
				'group'					=> esc_html__('Advance', 'apcore'),
			),
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Position', 'apcore'),
				'param_name'		=> 'element_position',
				'value'				=> 'relative',
				'options'			=> array(
					esc_html__('Relative', 'apcore') => 'relative',
					esc_html__('Absolute', 'apcore') => 'absolute',
				),
				'group'				=> esc_html__('Advance', 'apcore'),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Top","apcore"),
				"param_name"		=> "top",
				"value"				=> "",
				'description' 		=> __( 'enter value in px or % ex: 10px.', 'apcore' ),
				'edit_field_class'	=> 'vc_column vc_col-sm-3',
				'dependency'		=> array('element' => 'element_position', 'value' => array('absolute')),
				'group'				=> esc_html__('Advance', 'apcore'),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Right","apcore"),
				"param_name"		=> "right",
				"value"				=> "",
				'description' 		=> __( 'enter value in px or % ex: 10px.', 'apcore' ),
				'edit_field_class'	=> 'vc_column vc_col-sm-3',
				'dependency'		=> array('element' => 'element_position', 'value' => array('absolute')),
				'group'				=> esc_html__('Advance', 'apcore'),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Bottom","apcore"),
				"param_name"		=> "bottom",
				"value"				=> "",
				'description' 		=> __( 'enter value in px or % ex: 10px.', 'apcore' ),
				'edit_field_class'	=> 'vc_column vc_col-sm-3',
				'dependency'		=> array('element' => 'element_position', 'value' => array('absolute')),
				'group'				=> esc_html__('Advance', 'apcore'),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Left","apcore"),
				"param_name"		=> "left",
				"value"				=> "",
				'description' 		=> __( 'enter value in px or % ex: 10px.', 'apcore' ),
				'edit_field_class'	=> 'vc_column vc_col-sm-3',
				'dependency'		=> array('element' => 'element_position', 'value' => array('absolute')),
				'group'				=> esc_html__('Advance', 'apcore'),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> __("Duration","apcore"),
				"param_name"		=> "duration",
				"value"				=> "8000",
				'group'				=> esc_html__('Advance', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Extra features', 'apcore'),
				'param_name'		=> 'subtitle_margin_heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'apcore' ),
				'param_name' => 'class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apcore' ),
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
				"value"				=> "0",
				"description"		=> __("Delay","apcore"),
				"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
			),
			array(
				"type"				=> "zolo_video_link_param",
				"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
				"param_name"		=> "tutorials",
				"doc_link"			=> $doc_link,
				"video_link"		=> "https://youtu.be/OrK1A77Prjc",
			),
		)
	) );		
		
}		