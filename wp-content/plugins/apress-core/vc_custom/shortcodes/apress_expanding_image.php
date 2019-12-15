<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Expanding Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Expanding_Image extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(		
		"name" => __("Expanding Image", "apcore"),
		"base" => "apress_expanding_image",
		"icon" => APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-expanding.png",
		"weight" => 32,
		"category" => __('Apress', 'apcore'),
		"description" => __('Simple image with CSS animation', 'apcore'),
		"params" => array(			
			array(
				'type' => 'dropdown',
				'heading' => __( 'Image source', 'apcore' ),
				'param_name' => 'source',
				'value' => array(
					__( 'Media library', 'apcore' ) => 'media_library',
					__( 'External link', 'apcore' ) => 'external_link',
				),
				'std' => 'media_library',
				'description' => __( 'Select image source.', 'apcore' ),
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', 'apcore' ),
				'param_name' => 'image',
				'value' => '',
				'description' => __( 'Select image from media library.', 'apcore' ),
				'dependency' => array(
					'element' => 'source',
					'value' => 'media_library',
				),
				'admin_label' => true,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'External link', 'apcore' ),
				'param_name' => 'custom_src',
				'description' => __( 'Select external link.', 'apcore' ),
				'dependency' => array(
					'element' => 'source',
					'value' => 'external_link',
				),
				'admin_label' => true,
			),	
			array(
				'type' => 'textfield',
				'heading' => __( 'Image size', 'apcore' ),
				'param_name' => 'img_size',
				'value' => 'thumbnail',
				'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'apcore' ),
				'dependency' => array(
					'element' => 'source',
					'value' => 'media_library',
				),
			),		
			array(
				'type' => 'textfield',
				'heading' => __( 'Image size', 'apcore' ),
				'param_name' => 'external_img_size',
				'value' => '',
				'description' => __( 'Enter image size in pixels. Example: 200x100 (Width x Height).', 'apcore' ),
				'dependency' => array(
					'element' => 'source',
					'value' => 'external_link',
				),
			),					
			array(
				'type' => 'dropdown',
				'heading' => __( 'Image alignment', 'apcore' ),
				'param_name' => 'alignment',
				'value' => array(
					__( 'Left', 'apcore' ) => 'left',
					__( 'Right', 'apcore' ) => 'right',
					__( 'Center', 'apcore' ) => 'center',
				),
				'description' => __( 'Select image alignment.', 'apcore' ),
			),			
			array(
				'type' => 'dropdown',
				'heading' => __( 'On click action', 'apcore' ),
				'param_name' => 'onclick',
				'value' => array(
					__( 'None', 'apcore' ) => '',
					__( 'Open prettyPhoto', 'apcore' ) => 'link_image',
					__( 'Open custom link', 'apcore' ) => 'custom_link',
				),
				'description' => __( 'Select action for click action.', 'apcore' ),
				'std' => '',
			),
			array(
				'type' => 'href',
				'heading' => __( 'Image link', 'apcore' ),
				'param_name' => 'link',
				'description' => __( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).', 'apcore' ),
				'dependency' => array(
					'element' => 'onclick',
					'value' => 'custom_link',
				),
			),	
			array(
				'type' => 'dropdown',
				'heading' => __( 'Link Target', 'apcore' ),
				'param_name' => 'img_link_target',
				'value' => array(
					__( 'Same window', 'apcore' ) => '_self',
					__( 'New window', 'apcore' ) => '_blank',
				),
				'dependency' => array(
					'element' => 'onclick',
					'value' => 'custom_link',
				),
			),		
					
			array(
			  "type" => "dropdown",
			  "heading" => __("Max Width", "apcore"),
			  'save_always' => true,
			  "param_name" => "max_width",
			  "value" => array(
					__("100%", "apcore") => "100%",
					__("125%", "apcore") => "125%", 
					__("150%", "apcore") => "150%",
					__("165%", "apcore") => "165%",  
					__("175%", "apcore") => "175%", 
					__("200%", "apcore") => "200%", 
					__("225%", "apcore") => "225%", 
					__("250%", "apcore") => "250%"
			  ),
			  "description" => __("Select your desired max width here - by default images are not allowed to display larger than the column they're contained in. Changing this to a higher value will allow you to create designs where your image overflows out of the column partially off screen.", "apcore")
			),
			array(
			   'type'    	=> 'zolo_box_shadow_param',
			   'heading'	=> esc_html__('Shadow', 'apcore'),
			   'param_name' => 'expanding_image_shadow',
			   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			),
			array(
				'type' 		=> 'zolo_number',
				'heading' 	=> __("Border Radius",'apcore'),
				'param_name'=> 'border_radius',
				'value'		=> '0',
				'suffix'	=> 'px',
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
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'apcore' ),
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
				"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
				'dependency'		=> array('element' => 'animation_type', 'value' => 'default'),
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