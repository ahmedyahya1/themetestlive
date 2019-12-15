<?php 
/*-----------------------------------------------------------------------------------*/
/* Portfolio Slider
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Portfolio_Slider_Module')) {
	class Apress_Portfolio_Slider_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_portfolio_slider_init' ) );
			add_shortcode( 'apress_portfolio_slider', array( &$this, 'apress_portfolio_slider' ) );
		}
		
		function apress_portfolio_slider_init() {			
			$is_admin = is_admin();	
			$portfolio_types = ($is_admin) ? get_terms('catportfolio') : array('All' => 'all');
			$types_options = array("All" => "all");
			if($is_admin) {
				foreach ($portfolio_types as $type) {
					$types_options[$type->name] = $type->slug;
				}
			} else {
				$types_options['All'] = 'all';
			}
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"				=> __("Portfolio Slider", 'apcore'),
					"base"				=> "apress_portfolio_slider",
					"class"				=> "",
					"weight"			=> 15,
					"category"			=> __( "Apress", "apcore"),
					"description"		=> __("Beautiful Portfolio Slider", "apcore"),
					"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-portfolio_slider.png",
					"params"			=> array(		
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Style', 'apcore' ),
							'param_name'  => 'style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'portfolio_slider1' => array(
									'tooltip' => esc_attr__('Portfolio Slider 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_slider/portfolio_slider1.jpg'
								),
								'portfolio_slider2' => array(
									'tooltip' => esc_attr__('Portfolio Slider 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_slider/portfolio_slider2.jpg'
								),
								'portfolio_slider3' => array(
									'tooltip' => esc_attr__('Portfolio Slider 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_slider/portfolio_slider3.jpg'
								),
								'portfolio_slider4' => array(
									'tooltip' => esc_attr__('Portfolio Slider 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_slider/portfolio_slider4.jpg'
								),
								'portfolio_slider5' => array(
									'tooltip' => esc_attr__('Portfolio Slider 5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_slider/portfolio_slider5.jpg'
								),
								'portfolio_slider6' => array(
									'tooltip' => esc_attr__('Portfolio Slider 6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_slider/portfolio_slider6.jpg'
								),
							),
						),
						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Categories", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $types_options,
							'save_always'		=> true,
							"description"		=> __("Please select the categories you would like to display for your portfolio. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore")
						),
																
						array(
							"type"				=> "textfield",
							"heading"			=> __("Number of Portfolios",'apcore'),
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),
							"param_name"		=> "num",
							'value'				=> '4', 
						),
						array(
						  "type"		=> "dropdown",
						  "heading"		=> __("Text Align", 'apcore'),
						  "param_name"	=> "text_align_for_style1",
						  "value"		=> array(
								"Left" 	=> "left",
								"Center"=> "center",
								"Right" => "right",
							),
						  'std'         => 'left',
						  'save_always'	=> true,
						  "dependency"	=> array('element' => "style", 'value' => array('portfolio_slider1'))
						),
						array(
						  "type"		=> "dropdown",
						  "heading"		=> __("Text Align", 'apcore'),
						  "param_name"	=> "text_align_for_style2",
						  "value"		=> array(
								"Right" => "right",
								"Left" 	=> "left",
							),
						  'std'         => 'right',
						  'save_always'	=> true,
						  "dependency"	=> array('element' => "style", 'value' => array('portfolio_slider2'))
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("View More",'apcore'),
							"description"		=> __("Enter your button text.",'apcore'),
							"param_name"		=> "portfolio_viewmore",
							'value'				=> 'View Project...', 
							"dependency"	=> array('element' => "style", 'value' => array('portfolio_slider1', 'portfolio_slider2'))
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
						  'std'         => '3',
						  "description" => __("No of slides to show.", 'apcore'),
						  'save_always'	=> true,
						  'edit_field_class' => 'vc_column vc_col-sm-4',
						  "dependency"	=> array('element' => "style", 'value' => array('portfolio_slider3', 'portfolio_slider4'))
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
							  'std'         => '3',
							  "description" => __("No of slides to show.", 'apcore'),
							  'save_always'	=> true,
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  "dependency"	=> array('element' => "style", 'value' => array('portfolio_slider3', 'portfolio_slider4'))
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
								'std'         => '2',
							  "description" => __("No of slides to show.", 'apcore'),
							  'save_always'	=> true,
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  "dependency"	=> array('element' => "style", 'value' => array('portfolio_slider3', 'portfolio_slider4'))
						),
						array(
							'type'			=> 'zolo_number',
							'heading'		=> esc_html__('Item Gutter', 'apcore'),
							'param_name'	=> 'slider_gutter',
							'value'			=> 0,
							'suffix' 		=> 'px',
							"dependency"	=> array('element' => "style", 'value' => array('portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6'))
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable Auto Play', 'apcore'),
							"description"	=> __("Will cause your images to auto play until user interaction", 'apcore'),
							'param_name'		=> 'slick_autoplay',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							"dependency"	=> array('element' => "style", 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6'))
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
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable mouse wheel scroll', 'apcore'),
							'param_name'		=> 'slick_mouse_wheel_scroll',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'			=> 'Yes',
									'off'			=> 'No',
								),
							),
							"dependency"	=> array('element' => "style", 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6'))
						),
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Title Style', 'apcore'),
							'param_name'		=> 'portfolio_title_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'portfolioslider_title_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'tag' => 'h2',
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Title Style', 'apcore'),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'portfolioslider_title_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'portfolioslider_title_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'portfolioslider_title_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Portfolio Title color', 'apcore' ),
							"param_name"	=> "portfolioslider_title_color",
							'value'			=> '#000000',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Title Style', 'apcore'),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Portfolio Title Hover color', 'apcore' ),
							"param_name"	=> "portfolioslider_title_hover_color",
							'value'			=> '#0000ef',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('View More Style', 'apcore'),
							'param_name'		=> 'portfolio_viewmore_heading',
							'group'				=> esc_html__('View More Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider2')),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'portfolioslider_viewmore_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('View More Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider2')),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'portfolioslider_viewmore_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('View More Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider2')),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'portfolioslider_viewmore_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'portfolioslider_viewmore_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('View More Style', 'apcore'),
						),
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'View More color', 'apcore' ),
							"param_name"	=> "portfolioslider_viewmore_color",
							'value'			=> '#000000',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('View More Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider2')),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'View More Hover color', 'apcore' ),
							"param_name"	=> "portfolioslider_viewmore_hover_color",
							'value'			=> '#0000ef',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'group'			=> esc_html__('View More Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider2')),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Category Style', 'apcore'),
							'param_name'		=> 'portfolio_category_heading',
							'group'				=> esc_html__('Category Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6')),
							
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'portfolioslider_category_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Category Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6')),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'portfolioslider_category_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Category Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6')),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'portfolioslider_category_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'portfolioslider_category_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Category color', 'apcore' ),
							"param_name"	=> "portfolioslider_category_color",
							'value'			=> '#000000',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6')),
							'group'			=> esc_html__('Category Style', 'apcore'),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Category Hover color', 'apcore' ),
							"param_name"	=> "portfolioslider_category_hover_color",
							'value'			=> '#0000ef',
							'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4', 'portfolio_slider5', 'portfolio_slider6')),
							'group'			=> esc_html__('Category Style', 'apcore'),
						),
						
						array(
							"type" 			=> "colorpicker",
							'heading'   	=> esc_html__( 'Navigation color', 'apcore' ),
							"param_name"	=> "navigation_color",
							'value'			=> '#000000',
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider2')),
							'group'			=> esc_html__('Navigation', 'apcore'),
						),

						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_arrows",
							"text"             => __( "Navigation Arrows", 'apcore' ),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4')),
							'group'=> esc_html__('Navigation','apcore'),
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
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4')),
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
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4')),
							'group'=> esc_html__('Navigation','apcore'),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
							"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
							'param_name'		=> 'slick_bullet_navigation',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency' => array( 'element' => 'style', 'value' => array('portfolio_slider1', 'portfolio_slider3', 'portfolio_slider4')),
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
							'type'				=> 'zolo_param_responsive_text',
							'heading'			=> esc_html__('Title responsive settings', 'apcore'),
							'param_name'		=> 'title_responsive',
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
							'group'				=> esc_html__('Responsive', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'extra_features_heading',
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
							'type'				=> 'zolo_video_link_param',
							'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
							'param_name'		=> 'tutorials',
							'doc_link'			=> $doc_link,
							'video_link'		=> 'https://youtu.be/pXGp4hBJU6c',
						),
					),
					) );
			}
		}

function apress_portfolio_slider( $atts, $content=null ){
  ob_start();
   extract(shortcode_atts(array(
				'style'								=>'portfolio_slider1',
				'category' 							=> '',
				'num' 								=> '4',
				'text_align_for_style1'				=> 'left',
				'text_align_for_style2'				=> 'right',
				'portfolio_viewmore'				=> 'View Project...',
				'portfolioslider_title_font_options'=> '',
				'portfolioslider_title_google_fonts'=> '',
				'portfolioslider_title_custom_fonts'=> '',
				'portfolioslider_title_color'		=> '#000000',
				'portfolioslider_title_hover_color'	=> '#0000ef',
				'portfolioslider_viewmore_font_options'=> '',
				'portfolioslider_viewmore_google_fonts'=> '',
				'portfolioslider_viewmore_custom_fonts'=> '',
				'portfolioslider_viewmore_color'	=> '#000000',
				'portfolioslider_viewmore_hover_color'=> '#0000ef',
				
				'portfolioslider_category_font_options'=> '',
				'portfolioslider_category_google_fonts'=> '',
				'portfolioslider_category_custom_fonts'=> '',
				'portfolioslider_category_color'	=> '#000000',
				'portfolioslider_category_hover_color'=> '#0000ef',
				
				'navigation_color'					=> '#000000',
				'slick_hide_arrow_navigation'		=> 'yes',
				'arrows_style'						=> 'arrows_style1',
				'arrows_color'						=> '#ffffff',
				'arrows_bg'							=> '#549ffc',
				'slick_bullet_navigation' 			=> 'no',
				'bullet_navigation_style'			=> 'dots_style1',
				'bullet_bg'							=> '#000000',
				
				'desktop_no_of_items' 				=> '3',
				'small_desktop_no_of_items' 		=> '3',
				'tablet_no_of_items'				=> '2',
				'slider_gutter' 					=> '0',
				'slick_autoplay' 					=> 'yes',
    			'slick_autoplay_duration' 			=> '2000',
				'slick_mouse_wheel_scroll' 			=> 'no',
				
				
				'title_responsive'					=> '',
				'data_animation'					=>'No Animation',
				'data_delay'						=>'500'
				
		), $atts));
		
wp_enqueue_script('zt-portfolioslider');

wp_enqueue_script('zt-velocity');
//wp_enqueue_script( 'zt-velocity_script' );

$uniqid = uniqid(rand());
$zolo_portfolioslider_class = 'portfolioslider_'.$uniqid;

//Animation
if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

static $c = 1;

$wrap_class[] = $arrows_style;
$wrap_class[] = $bullet_navigation_style;
$wrap_class[] = $animatedclass;
$wrap_class[] = 'zolo_portfolioslider'.$c;
$wrap_class[] = 'zt_'.$style;
$wrap_class[] = $zolo_portfolioslider_class;
$wrap_class[] = 'align_'.$text_align_for_style1;
$wrap_class[] = 'zolo_portfolioslider_holder';


$wrap_class = implode( ' ', $wrap_class );


$slick_autoplay = ($slick_autoplay == 'yes')? 'true' : 'false';
$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
$slick_bullet_navigation = ($slick_bullet_navigation == 'yes')? 'true' : 'false';


if($style == 'portfolio_slider1'){
	$slidesfade = 'fade:true,';
	$slidesToShow_variable = 'slidesToShow: 1,';
	$slidesToShow_small_desktop_no_of_items = 'slidesToShow: 1,';
	$slidesToShow_tablet_no_of_items = 'slidesToShow: 1,';
	$slick_autoplay = $slick_autoplay;
	$slick_autoplay_duration = $slick_autoplay_duration;
	$variableWidth = '';
	
	
}else if($style == 'portfolio_slider3' || $style == 'portfolio_slider4'){
	$slidesfade = '';
	
	$slidesToShow_variable = 'slidesToShow: '.$desktop_no_of_items.',';
	$slidesToShow_small_desktop_no_of_items = 'slidesToShow: '.$small_desktop_no_of_items.',';
	$slidesToShow_tablet_no_of_items = 'slidesToShow: '.$tablet_no_of_items.',';
	
	$slick_autoplay = $slick_autoplay;
	$slick_autoplay_duration = $slick_autoplay_duration;
	$variableWidth = '';


}else if($style == 'portfolio_slider5' || $style == 'portfolio_slider6'){
	$slidesfade = '';
	$slidesToShow_variable = 'slidesToShow: 3,';
	$slidesToShow_small_desktop_no_of_items = 'slidesToShow: 3,';
	$slidesToShow_tablet_no_of_items = 'slidesToShow:2,';
	
	$slick_autoplay = $slick_autoplay;
	$slick_autoplay_duration = $slick_autoplay_duration;
	$variableWidth = 'variableWidth: true,';
	
	}

if($style == 'portfolio_slider1' || $style == 'portfolio_slider3' || $style == 'portfolio_slider4' || $style == 'portfolio_slider5' || $style == 'portfolio_slider6'){
echo '<script type="text/javascript" charset="utf-8">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).on("ready", function() {
if(j$("body").hasClass("rtl")){ var rtlvar = true }else{ var rtlvar = false }
j$(".'.$zolo_portfolioslider_class.'").slick({
		  dots: '.$slick_bullet_navigation.',
		  infinite: true,
		  speed: 900,
		  rtl: rtlvar,
		  slidesToScroll: 1,
		  autoplay: '.$slick_autoplay.',
  		  autoplaySpeed:'.$slick_autoplay_duration.',
		  arrows: '.$slick_hide_arrow_navigation.',
		  '. $slidesfade . $slidesToShow_variable.$variableWidth.'
		  
		  responsive: [
			{
			  breakpoint: 1050,
			  settings: {
				'.$slidesToShow_small_desktop_no_of_items.'
				slidesToScroll: 1,
			  }
			},
			{
			  breakpoint: 800,
			  settings: {
			  '.$slidesToShow_tablet_no_of_items.'
			  slidesToScroll: 1,
			  }
			},
		  ]
		});
	});
	</script>';

if($slick_mouse_wheel_scroll == 'yes'){	
echo '<script type="text/javascript" charset="utf-8">
var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).on("ready", function() {
j$(".'.$zolo_portfolioslider_class.'").on("wheel", (function(e) {
  e.preventDefault();

  if (e.originalEvent.deltaY < 0) {
    j$(this).slick("slickPrev");
  } else {
    j$(this).slick("slickNext");
  }
}));

});
</script>';
}

}
	global $post;
	
	if($category == 'all') {
		$category = null;
	}				
	$portfolio = array(
		'posts_per_page' => $num,
		'post_type' => 'zt_portfolio',
		'catportfolio'=> $category
	);
	$port_query = new WP_Query($portfolio);
	?>

		  <div class="zolo_portfolio_slider_area <?php echo 'zolo_portfolio_slider_no_'.$c?>">
            
            <?php if($style == 'portfolio_slider2'){
				 	echo '<div class="'.$zolo_portfolioslider_class.' zolo_portfolioslider'.$c.' '.$animatedclass.' zt_'.$style.' align_'.$text_align_for_style2.'" data-animation="'.$data_animation.'" data-delay="'.$data_delay.'"><ul>';
			
				}else{
					 echo '<div class="'.$wrap_class.'" data-animation="'.$data_animation.'" data-delay="'.$data_delay.'">';
				}?>
            
            
			  <?php $i = 1;
			  if ($port_query->have_posts()) : while ($port_query->have_posts()) : $port_query->the_post();?>
			 
<?php 
// Title HTML
	$title_options = _zolo_parse_text_shortcode_params($portfolioslider_title_font_options, '', $portfolioslider_title_google_fonts, $portfolioslider_title_custom_fonts);
	
	$viewmore_options = _zolo_parse_text_shortcode_params($portfolioslider_viewmore_font_options, '', $portfolioslider_viewmore_google_fonts, $portfolioslider_viewmore_custom_fonts);

$category_options = _zolo_parse_text_shortcode_params($portfolioslider_category_font_options, '', $portfolioslider_category_google_fonts, $portfolioslider_category_custom_fonts);
			  
	  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
			if( $thumb ){
			$thumb_url = $thumb['0'];
			}else {
			$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			}
		?>
	  <!--Blog Box Area Start-->

              <?php if($style == 'portfolio_slider2'){?>
                  <li>
                    <div class="zolo_portfolio_slider_thumb" style="background-image:url(<?php echo $thumb_url ?>);"></div>
                    <div class="zolo_portfolio_caption">
                      <?php echo '<'.$title_options['tag']. ' class="entry-title zolo_portfolio_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
					  <a href="<?php the_permalink()?>"> <?php the_title();?> </a>
					  <?php echo '</'. $title_options['tag'].'>';?>
                       
                      <?php if($portfolio_viewmore != ''){ ?>
                      <a href="<?php the_permalink()?>" class="zolo_portfolio_slider_viewmore" <?php echo $viewmore_options['style'];?>><?php echo $portfolio_viewmore;?></a>
                      <?php }?>
                      
                    </div>
                  </li>
               <?php }else if($style == 'portfolio_slider1'){?>
        		<div class="zolo_portfolio_slider_box">
		<!--Thumb Area Start-->
		<div class="zolo_portfolio_slider_thumb" style="background-image:url(<?php echo $thumb_url ?>); min-height:200px;"></div>
		<!--Thumb Area End-->
		<div class="zolo_portfolio_caption">
		<div class="zolo-container">
		<span class="zolo_portfolio_category" <?php echo $category_options['style'];?>>
		<?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){
				echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); 
			 } ?>
		</span>
		  <?php echo '<'.$title_options['tag']. ' class="entry-title zolo_portfolio_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
          <a href="<?php the_permalink()?>"> <?php the_title();?> </a>
          <?php echo '</'. $title_options['tag'].'>';?>
          <?php if($portfolio_viewmore != ''){ ?>
          	<a href="<?php the_permalink()?>" class="zolo_portfolio_slider_viewmore" <?php echo $viewmore_options['style'];?>><?php echo $portfolio_viewmore;?></a>
          <?php }?>
          </div>		
        </div>
      </div>  
      
        <?php }else{?>
        <div class="zolo_portfolio_slider_box">
		<!--Thumb Area Start-->
        <?php if($style == 'portfolio_slider3' || $style == 'portfolio_slider4'){?>
			<span class="zolo_portfolio_slider_thumb_wrap"><a href="<?php the_permalink()?>" class="zolo_portfolio_slider_thumb" style="background:url(<?php echo $thumb_url ?>);"></a></span>
        <?php }else if($style == 'portfolio_slider5' || $style == 'portfolio_slider6'){?>
        	<span class="zolo_portfolio_slider_thumb_wrap"><a href="<?php the_permalink()?>" class="zolo_portfolio_slider_thumb"><img src="<?php echo $thumb_url ?>"/></a></span>
        <?php }?>
		
        <?php /*?><img src="<?php echo $thumb_url ?>" /><?php */?>
		<!--Thumb Area End-->
		<div class="zolo_portfolio_caption">
		  <?php echo '<'.$title_options['tag']. ' class="entry-title zolo_portfolio_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
          <a href="<?php the_permalink()?>"> <?php the_title();?> </a>
          <?php echo '</'. $title_options['tag'].'>';?>
          <span class="zolo_portfolio_category" <?php echo $category_options['style'];?>>
		<?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){
				echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); 
			 } ?>
		</span>
            </div>		
      </div>
              
   <?php }?>
  
  <!--Blog Box Area End-->
  
  <?php $i++;  endwhile; endif; ?>
 <?php if($style == 'portfolio_slider2'){ echo '</ul>';}?>
</div>
</div>
            

<?php
$css_output = '';
if(isset($title_responsive) && $title_responsive != '') {
	$css_output .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '.zolo_portfolio_slider_no_'. esc_js($c) .' .zt_portfolio_slider2 .zolo_portfolio_caption .zolo_portfolio_title');
	}
$css_output .= '.zolo_portfolio_title a,.zolo_portfolio_category a{ text-decoration:inherit;}';
if($style == 'portfolio_slider1'){


}else if($style == 'portfolio_slider2'){

$css_output .= '.zt_portfolio_slider2 .prev::before, .zt_portfolio_slider2 .next::before {border-right-color: '.$navigation_color.';}';
$css_output .= '.zt_portfolio_slider2 .prev::after, .zt_portfolio_slider2 .next::after{background: '.$navigation_color.';}';
$css_output .= '.zt_portfolio_slider2 .next::before {border-left-color: '.$navigation_color.';}';
$css_output .= '.zt_portfolio_slider2 .counter {color:'.$navigation_color.';}';

}else if($style == 'portfolio_slider3'){

$css_output .= '.zolo_portfolio_slider_area{ width:100%; height:100vh;}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider3 .slick-list{ margin:0 -'.$slider_gutter.'px;}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider3 .zolo_portfolio_slider_box{ padding:0 '.$slider_gutter.'px;}';

}else if($style == 'portfolio_slider4'){

$css_output .= '.zolo_portfolio_slider_area{ width:100%; height:100vh;}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider4 .slick-list{ margin:0 -'.$slider_gutter.'px;}';
$css_output .= '.zolo_portfolio_slider_area .zt_portfolio_slider4 .zolo_portfolio_slider_box{ padding:0 '.$slider_gutter.'px;}';


}else if($style == 'portfolio_slider5' || $style == 'portfolio_slider6'){

$css_output .= '.zolo_portfolio_slider_area{ width:100%; height:100vh;}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider5 .slick-list,
.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider6 .slick-list{ margin:0 -'.$slider_gutter.'px;}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider5 .zolo_portfolio_slider_box,
.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' .zt_portfolio_slider6 .zolo_portfolio_slider_box{ height:100vh; position:relative; padding:0 '.$slider_gutter.'px;}';

}
$css_output .= '.zolo_portfolio_slider_no_'.$c.' .zolo_portfolio_title a{ color:'.$portfolioslider_title_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.' .zolo_portfolio_title a:hover{color:'.$portfolioslider_title_hover_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.' a.zolo_portfolio_slider_viewmore{ color:'.$portfolioslider_viewmore_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.' a.zolo_portfolio_slider_viewmore:hover{color:'.$portfolioslider_viewmore_hover_color.';}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' a.zolo_portfolio_slider_viewmore:before{ background:'.$portfolioslider_viewmore_color.';}';
$css_output .= '.zolo_portfolio_slider_area.zolo_portfolio_slider_no_'.$c.' a.zolo_portfolio_slider_viewmore:after{ background:'.$portfolioslider_viewmore_hover_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.' .zolo_portfolio_category,.zolo_portfolio_slider_no_'.$c.' .zolo_portfolio_category a{ color:'.$portfolioslider_category_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.' .zolo_portfolio_category a:hover{color:'.$portfolioslider_category_hover_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area .slick-arrow{ color:'.$arrows_color.'}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area .slick-arrow:after{ background:'.$arrows_color.'}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area .arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area .arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area .slick-arrow{ background:'.$arrows_bg.'}';
}
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.';}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area ul.slick-dots li button::after{box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$css_output .= '.zolo_portfolio_slider_no_'.$c.'.zolo_portfolio_slider_area .dots_style3 ul.slick-dots li button::after{ background:'.$bullet_bg.';}
';

apcore_save_plugin_dyn_styles( $css_output );
?>              

<?php
	$c++;
	wp_reset_query();
	$demolp_output = ob_get_clean();
	return $demolp_output;
	}
}
	
	$Apress_Portfolio_Slider_Module = new Apress_Portfolio_Slider_Module;
}
