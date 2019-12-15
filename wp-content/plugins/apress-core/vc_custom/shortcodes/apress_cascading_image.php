<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Cascading Image
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Cascading_Image extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

$image_offset_array = array(
	'-100%' => '-100%',
	'-95%' => '-95%',
	'-90%' => '-90%',
	'-85%' => '-85%',
	'-80%' => '-80%',
	'-75%' => '-75%',
	'-70%' => '-70%',
	'-65%' => '-65%',
	'-60%' => '-60%',
	'-55%' => '-55%',
	'-50%' => '-50%',
	'-45%' => '-45%',
	'-40%' => '-40%',
	'-35%' => '-35%',
	'-30%' => '-30%',
	'-25%' => '-25%',
	'-20%' => '-20%',
	'-15%' => '-15%',
	'-10%' => '-10%',
	'-5%'  => '-5%',
	'0%'  => '0%',
	'5%'  => '5%',
	'10%' => '10%',
	'15%' => '15%',	
	'20%' => '20%',
	'25%' => '25%',
	'30%' => '30%',
	'35%' => '35%',	
	'40%' => '40%',
	'45%' => '45%',	
	'50%' => '50%',
	'55%' => '55%',
	'60%' => '60%',
	'65%' => '65%',	
	'70%' => '70%',
	'75%' => '75%',	
	'80%' => '80%',
	'85%' => '85%',	
	'90%' => '90%',
	'95%' => '95%',	
	'100%' => '100%'
);

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(		
		"name"		=> __("Cascading Image", "apcore"),
		"base"		=> "apress_cascading_image",
		"as_child"	=> array('only' => 'apress_cascading_wrapper'), 
		"icon"		=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-cascadingimage.png",
		"weight"	=> 32,
		"category"	=> __('Apress', 'apcore'),
		"params"	=> array(			
			array(
				'type'			=> 'attach_image',
				'heading'		=> __( 'Image', 'apcore' ),
				'param_name'	=> 'image',
				'value'			=> '',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> __( 'Image size', 'apcore' ),
				'param_name'	=> 'img_size',
				'value'			=> 'full',
				'description'	=> __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'apcore' ),
			),
			array(
			  "type"			=> "dropdown",
			  "heading"			=> __("Offset X", "apcore"),
			  'save_always'		=> true,
			  "param_name"		=> "offset_x",
			  "value"			=> $image_offset_array,
			  "std"				=> "0%"
			),
			array(
			  "type"			=> "dropdown",
			  "heading"			=> __("Offset Y", "apcore"),
			  'save_always'		=> true,
			  "param_name"		=> "offset_y",
			  "value"			=> $image_offset_array,
			  "std"				=> "0%"
			),
			array(
			   'type'    		=> 'zolo_box_shadow_param',
			   'heading'		=> esc_html__('Shadow', 'apcore'),
			   'param_name' 	=> 'image_shadow',
			   "value"			=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			),
			array(
				'type' 			=> 'zolo_number',
				'heading' 		=> __("Border Radius",'apcore'),
				'param_name'	=> 'border_radius',
				'value'			=> '0',
				'suffix'		=> 'px',
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Extra features', 'apcore'),
				'param_name'		=> 'subtitle_margin_heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> __( 'Extra class name', 'apcore' ),
				'param_name'		=> 'el_class',
				'description'		=> __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apcore' ),
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