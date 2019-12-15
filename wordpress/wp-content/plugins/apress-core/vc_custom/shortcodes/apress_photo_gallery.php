<?php 
/*-----------------------------------------------------------------------------------*/
/* Photo Gallery
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Photo_Gallery extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"			=> __("Photo Gallery", 'apcore'),
			"base"			=> "apress_photo_gallery",
			"class"			=> "",
			"weight"		=> 14,
			"category"		=> __( "Apress", "apcore"),
			"description"	=> __( "Beautiful Photo Gallery", "apcore"),
			"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-photo-gallery.png",
			"params" => array(
				array(
					"type"        => "attach_images",
					"heading"     => esc_html__( "Images", "apcore" ),
					"description" => esc_html__( "Select images from media library.", "apcore" ),
					"param_name"  => "images",
					"value"       => "",
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Gallery type", "apcore"),
					"description"	=> __("Select gallery type.", "apcore"),
					"param_name"	=> "photo_gallery_type",
					"value"			=> array(
						__("Image Grid", "apcore") 		=> "image_grid",
						__("Image Masonry", "apcore") 	=> "image_masonry",
						__("Image Justify", "apcore") 	=> "image_justify"
					),
					'admin_label'		=> true,
				),
				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('Image Size', 'apcore'),
					"description"		=> esc_html__( "Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \"thumbnail\" size.", "apcore" ),
					'param_name'		=> 'images_size',
					'value'				=> '',
					'dependency'		=> array('element' => 'photo_gallery_type', 'value' => array('image_grid', 'image_masonry')),
				),
				
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Number of Items per row", "apcore"),
					"description"	=> __("Select gallery type.", "apcore"),
					"param_name"	=> "number_items_per_row",
					"value"			=> array(
						__("Four", "apcore") 	=> "four",
						__("Five", "apcore") 	=> "five",
						__("Six", "apcore") 	=> "six",
						__("Three", "apcore") 	=> "three",
						__("Two", "apcore") 	=> "two"
					),
				'dependency'		=> array('element' => 'photo_gallery_type', 'value' => array('image_grid', 'image_masonry')),
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Row Height', 'apcore'),
					'param_name'	=> 'image_justify_row_height',
					'value'			=> '150',
					'dependency'	=> array('element' => 'photo_gallery_type', 'value' => array('image_justify')),
				),
				array(
					'type'			=> 'zolo_number',
					'heading'		=> esc_html__('Image Gutter', 'apcore'),
					'param_name'	=> 'image_gutter',
					'value'			=> 10,
					'suffix' 		=> 'px',
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Last Row", "apcore"),
					"param_name"	=> "image_justify_lastrow",
					"value"			=> array(
						__("No Justify", "apcore") => "nojustify",
						__("Justify", "apcore") => "justify",
						__("Center", "apcore") 	=> "center",
						__("Right", "apcore") 	=> "right",
						__("Hide", "apcore") 	=> "hide",
					),
					'dependency'	=> array('element' => 'photo_gallery_type', 'value' => array('image_justify')),
				),
				
				array(
					'type'				=> 'zolo_radio_advanced',
					"heading"			=> __("Lightbox", "apcore"),
					'param_name'		=> 'use_lightbox',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					)
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Hover Effect", "apcore"),
					"description" 	=> __("Select the hover effect.", "apcore"),
					"param_name"	=> "hover_effects",
					"value"			=> array(
						__("Fade", "apcore") 		=> "fade_effect",
						__("Zoom In", "apcore") 	=> "zoomin_effect",
						__("Zoom Out", "apcore") 	=> "zoomout_effect",
						__("B/W to Color", "apcore")=> "bwtocolor_effect",
						__("Color To B/W", "apcore")=> "colortobw_effect",
					),
					'admin_label'		=> true,
				),
				array(
					"type"			=> "dropdown",
					"heading"		=> __("Select Color Scheme",'apcore'),
					"param_name"	=> "color_scheme",
					"value"			=> array(
						__("Primary Color",'apcore') 	=> "primary_color_scheme",
						__("Color Scheme 1",'apcore') 	=> "color_scheme1",
						__("Color Scheme 2",'apcore') 	=> "color_scheme2",
						__("Gradient Scheme 1",'apcore')=> "gradient_scheme1",
						__("Gradient Scheme 2",'apcore')=> "gradient_scheme2",
						__("Gradient Scheme 3",'apcore')=> "gradient_scheme3",
						__("Design Your Own",'apcore') 	=> "design_your_own"
					),
					'dependency'		=> array('element' => 'hover_effects', 'value' => array('fade_effect', 'zoomin_effect', 'zoomout_effect')),
				),
				
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Overlay Color",'apcore'),
					"param_name"		=> "overlay_color",
					"value"				=> 'rgba(0,0,0,0.1)',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
				),
				array(
					"type"				=> "colorpicker",
					"heading"			=> __("Overlay Hover Color",'apcore'),
					"param_name"		=> "overlay_color_h",
					"value"				=> 'rgba(0,0,0,0.3)',
					'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
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
					"value"				=> "100",
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
					'video_link'		=> 'https://youtu.be/igeFW_LfRc4',
				),
				
				),
			) 
		);		
		
	}		