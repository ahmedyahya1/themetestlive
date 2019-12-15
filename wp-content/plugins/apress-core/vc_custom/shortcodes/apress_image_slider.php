<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Slider
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Image_Slider extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"				=> __("Image Slider", 'apcore'),
			"base"				=> "apress_image_slider",
			"weight"			=> 11,
			"class"				=> "",
			"category"			=> __( "Apress", "apcore"),
			"description"		=> __( "Create amazing slider", "apcore"),
			"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-image_slider.png",
			"params"			=> array(
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Style', 'apcore' ),
					'param_name'  => 'style',
					'simple_mode' => false,
					'admin_label' => true,
					'options'     => array(
						'slider_style1' => array(
							'tooltip' => esc_attr__('Slider Style1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/slider_style1.jpg'
						),
						'slider_style2' => array(
							'tooltip' => esc_attr__('Slider Style2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/slider_style2.jpg'
						),
						'slider_style3' => array(
							'tooltip' => esc_attr__('Slider Style3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/slider_style3.jpg'
						),
						'slider_style4' => array(
							'tooltip' => esc_attr__('Slider Style4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/slider_style4.jpg'
						),
						'slider_style5' => array(
							'tooltip' => esc_attr__('Slider Style5','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/slider_style5.jpg'
						),
						'slider_style6' => array(
							'tooltip' => esc_attr__('Slider Style6','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/slider_style6.jpg'
						),
						
					),
				),
				array(
					  "type"		=> "attach_images",
					  "heading"		=> __("Images", 'apcore'),
					  "description"	=> __("Select images from media library.", 'apcore'),
					  "param_name"	=> "images",
					  "value"		=> "",
				),
				array(
					  "type"		=> "textfield",
					  "heading"		=> __("Image Size", 'apcore'),
					  "param_name"	=> "img_size",
					  "value"		=> "",
					  "description"	=> __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \"thumbnail\" size.", 'apcore'),
					  "dependency"	=> array('element' => "style", 'value' => array('slider_style1', 'slider_style2', 'slider_style3', 'slider_style5', 'slider_style6'))
				),
				
				array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Desktop Items", 'apcore'),
				  "param_name"	=> "desktop_no_of_items",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
						"7" => "7",
						"8" => "8",
						"9" => "9",
						"10" => "10"
					),
				  "description" => __("No of slides to show.", 'apcore'),
				  'save_always'	=> true,
				  'edit_field_class' => 'vc_column vc_col-sm-4',
				  "dependency"	=> array('element' => "style", 'value' => array('slider_style2'))
				),
				array(
				  "type"		=> "dropdown",
				  "heading"		=> __("Desktop Items", 'apcore'),
				  "param_name"	=> "desktop_no_of_items2",
				  "value"		=> array(
						"1" => "1",
						"2" => "2",
						"3" => "3",
						"4" => "4",
						"5" => "5",
						"6" => "6",
						"7" => "7",
						"8" => "8",
						"9" => "9",
						"10" => "10"
					),
				  "description" => __("No of slides to show.", 'apcore'),
				  'save_always'	=> true,
				  'std'  => '3',
				  'edit_field_class' => 'vc_column vc_col-sm-4',
				  "dependency"	=> array('element' => "style", 'value' => array('slider_style3'))
				),
				array(
					  "type"		=> "dropdown",
					  "heading"		=> __("Small Desktop Items", 'apcore'),
					  "param_name"	=> "small_desktop_no_of_items",
					  "value"		=> array(
							"1" => "1",
							"2" => "2",
							"3" => "3",
							"4" => "4",
							"5" => "5",
							"6" => "6",
						),
					  "description" => __("No of slides to show.", 'apcore'),
					  'save_always'	=> true,
					  'edit_field_class' => 'vc_column vc_col-sm-4',
					  "dependency"	=> array('element' => "style", 'value' => array('slider_style2', 'slider_style3'))
				),
				array(
					  "type"		=> "dropdown",
					  "heading"		=> __("Tablet Items", 'apcore'),
					  "param_name"	=> "tablet_no_of_items",
					  "value"		=> array(
							"1" => "1",
							"2" => "2",
							"3" => "3",
							"4" => "4",
							"5" => "5",
							"6" => "6",
						),
					  "description" => __("No of slides to show.", 'apcore'),
					  'save_always'	=> true,
					  'edit_field_class' => 'vc_column vc_col-sm-4',
					  "dependency"	=> array('element' => "style", 'value' => array('slider_style2', 'slider_style3'))
				),
				array(
					'type'			=> 'zolo_number',
					'heading'		=> esc_html__('Item Gutter', 'apcore'),
					'param_name'	=> 'slider_gutter',
					'value'			=> 10,
					'suffix' 		=> 'px',
					"dependency"	=> array('element' => "style", 'value' => array('slider_style2', 'slider_style3', 'slider_style4'))
				),
				
				
				array(
					"type"			=> 'textfield',
					"heading"		=> __("Desktop Padding", 'apcore'),
					"param_name"	=> "slick_center_desktop_padding",
					"value"			=> '100px',
					"dependency"	=> array('element' => "style", 'value' => array('slider_style2','slider_style5'))
				),
				array(
					"type"			=> 'textfield',
					"heading"		=> __("Small Desktop Padding", 'apcore'),
					"param_name"	=> "slick_center_small_desktop_padding",
					"value"			=> '80px',
					"dependency"	=> array('element' => "style", 'value' => array('slider_style2','slider_style5'))
				),
				array(
					"type"			=> 'textfield',
					"heading"		=> __("Tablet Padding", 'apcore'),
					"param_name"	=> "slick_center_tablet_padding",
					"value"			=> '60px',
					"dependency"	=> array('element' => "style", 'value' => array('slider_style2','slider_style5'))
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Fade effect?', 'apcore'),
					'param_name'		=> 'slick_fade_effect',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					"dependency"	=> array('element' => "style", 'value' => array('slider_style1'))
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Focus on Select?', 'apcore'),
					"description"	=> __("Would you like to focus On Select the slider?", 'apcore'),
					'param_name'		=> 'slick_focusonselect',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					"dependency"	=> array('element' => "style", 'value' => array('slider_style2', 'slider_style3'))
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Shadow?', 'apcore'),
					'param_name'		=> 'slick_item_shadow',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('LazyLoad?', 'apcore'),
					'param_name'		=> 'slick_lazyload',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
				),
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Enable Auto Play', 'apcore'),
					"description"	=> __("Will cause your images to auto play until user interaction", 'apcore'),
					'param_name'		=> 'slick_autoplay',
					'value'				=> 'no',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
				),
				array(
					"type"			=> 'textfield',
					"heading"		=> __("Auto Play Duration", 'apcore'),
					"param_name"	=> "slick_autoplay_duration",
					"description"	=> __("Enter a custom duration in milliseconds between auto play advances e.g. 5000", 'apcore'),
					"value"			=> '2000',
					'save_always'	=> true,
					"dependency"	=> array('element' => "slick_autoplay", 'value' => array('yes')),
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
				),
				
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "navigation_arrows",
					"text"             => __( "Navigation Arrows", 'apcore' ),
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "style", 'value' => array('slider_style1', 'slider_style2', 'slider_style3', 'slider_style4', 'slider_style5')),
				),
				
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Arrow Navigation?', 'apcore'),
					'param_name'		=> 'slick_hide_arrow_navigation',
					'value'				=> 'yes',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						),
					),
					"dependency"	=> array('element' => "style", 'value' => array('slider_style1', 'slider_style2', 'slider_style3', 'slider_style4', 'slider_style5')),
					'group'			=> esc_html__('Navigation','apcore'),
				),
										
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Arrows Style', 'apcore' ),
					'param_name'  => 'arrows_style',
					'simple_mode' => false,
					'options'     => array(
						'arrows_style1' => array(
							'tooltip' => esc_attr__('Arrows Style 1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style1.jpg'
						),
						'arrows_style2' => array(
							'tooltip' => esc_attr__('Arrows Style 2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style2.jpg'
						),
						'arrows_style3' => array(
							'tooltip' => esc_attr__('Arrows Style 3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style3.jpg'
						),
						'arrows_style4' => array(
							'tooltip' => esc_attr__('Arrows Style 4','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style4.jpg'
						),
					),
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))

				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Arrows color",'apcore'),
					"param_name" => "arrows_color",
					"value" => '#ffffff',
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Arrows background",'apcore'),
					"param_name" => "arrows_bg",
					"value" => '#549ffc',
					'dependency' => array( 'element' => 'arrows_style', 'value' => array('arrows_style2', 'arrows_style3')),
					'group'=> esc_html__('Navigation','apcore'),
				),			
				array(
					"type"             => "zolo_param_heading",
					"param_name"       => "navigation_dots",
					"text"             => __( "Navigation dots", 'apcore' ),
					'group'=> esc_html__('Navigation','apcore'),
				),
				
				array(
					'type'				=> 'zolo_single_checkbox',
					'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
					"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
					'param_name'		=> 'slick_bullet_navigation',
					'value'				=> 'yes',
					'options'			=> array(
						'yes'			=> array(
							'on'				=> 'Yes',
							'off'				=> 'No',
						), 				
					),
					'group'			=> esc_html__('Navigation','apcore'),
				),
			
				array(
					'type'        => 'radio_image_select',
					'heading'     => esc_html__( 'Bullet Style', 'apcore' ),
					'param_name'  => 'bullet_navigation_style', 	
					'simple_mode' => false,
					'options'     => array(
						'dots_style1' => array(
							'tooltip' => esc_attr__('Dots Style 1','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style1.jpg'
						),
						'dots_style2' => array(
							'tooltip' => esc_attr__('Dots Style 2','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style2.jpg'
						),
						'dots_style3' => array(
							'tooltip' => esc_attr__('Dots Style 3','apcore'),
							'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style3.jpg'
						),	
					),
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
				),
				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Bullet background",'apcore'),
					"param_name" => "bullet_bg",
					"value" => '#000000',
					'group'=> esc_html__('Navigation','apcore'),
					"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
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
					'video_link'		=> 'https://youtu.be/ftlAOJt7px4',
				),
				
				),
			) 
		);		
		
	}		