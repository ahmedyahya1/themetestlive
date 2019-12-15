<?php 
/*-----------------------------------------------------------------------------------*/
/* Team
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Team_Module')) {
	class Apress_Team_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_team_init' ) );
			add_shortcode( 'apress_team', array( &$this, 'apress_team' ) );
		}
		
		function apress_team_init() {
			
			$is_admin = is_admin();	
			$team_types = ($is_admin) ? get_terms('catteam') : array('All' => 'all');
			$team_options = array("All" => "all");
			if($is_admin) {
				foreach ($team_types as $type) {
					$team_options[$type->name] = $type->slug;
				}
			} else {
				$team_options['All'] = 'all';
			}
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"			=> __("Team", 'apcore'),
					"base"			=> "apress_team",
					"class"			=> "",
					"weight"		=> 23,
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful Teams Post Types", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-team.png",
					"params"		=> array(					
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Team Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'teamstyle',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'team_style1' => array(
									'tooltip' => esc_attr__('Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/team/team_style1.jpg'
								),
								'team_style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/team/team_style2.jpg'
								),
								'team_style3' => array(
									'tooltip' => esc_attr__('Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/team/team_style3.jpg'
								),
								'team_style4' => array(
									'tooltip' => esc_attr__('Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/team/team_style4.jpg'
								),
								'team_style5' => array(
									'tooltip' => esc_attr__('Style 5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/team/team_style5.jpg'
								),
								'team_style6' => array(
									'tooltip' => esc_attr__('Style 6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/team/team_style6.jpg'
								),
							),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Link To Single Team', 'apcore'),
							'param_name'		=> 'link_to_team',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),					
						array(
							"type"			=> "zolo_taxonomy_multiselect",
							"heading"		=> __("Categories", "apcore"),
							"param_name"	=> "category",
							"admin_label"	=> true,
							"value"			=> $team_options,
							'save_always'	=> true,
							"description"	=> __("Please select the categories you would like to display for your team. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore")
						),	
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Number of Posts",'apcore'),
							"description"	=> __("Leave blank or -1 to show all.",'apcore'),
							"param_name"	=> "num",
							'value'			=> '4', 
							),	
						array(
							"type"			=> "dropdown",
							"class"			=> "",
							"heading"		=> __("Number of Items per row",'apcore'),
							"param_name"	=> "teamcrslcolprw",
							"value"			=> array(
								__("Six",'apcore')		=> "Six",
								__("Five",'apcore')		=> "Five",
								__("Four",'apcore')		=> "Four",
								__("Three",'apcore')	=> "Three",
								__("Two",'apcore')		=> "Two"
								),
							'std' => 'Four',
							),
						array(
							"type"			=> "colorpicker",
							"class"			=> "",
							"heading"		=> __("Box Background Color",'apcore'),
							"param_name"	=> "teamboxbgcolor",
							"value"			=> '#ffffff',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style1', 'team_style5')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),	
						 
						array(
							"type"			=> "colorpicker",
							"class"			=> "",
							"heading"		=> __("Box Border Color",'apcore'),
							"param_name"	=> "teamboxborcolor",
							"value"			=> '#eeeeee',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style1', 'team_style5')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),
						 array(
						   'type'    	=> 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'border_radius',
							'value'		=> '0',
							'suffix'	=> 'px',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style2', 'team_style3', 'team_style5', 'team_style6')),
						),
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Title Font Size",'apcore'),
							"description"	=> __("Enter value without px",'apcore'),
							"param_name"	=> "teamnamefontsize",
							"value"			=> '18',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),						
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Designation Font Size",'apcore'),
							"description"	=> __("Enter value without px",'apcore'),
							"param_name"	=> "teamdesignationfontsize",
							"value"			=> '16',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),						 
						 array(
							"type"			=> "dropdown",
							"class"			=> "",
							"heading"		=> __("Text Alignment",'apcore'),
							"param_name"	=> "teamtext_align",
							"value"			=> array(__("Left",'apcore') => "left",__("Center",'apcore') => "center",__("Right",'apcore') => "right"),
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style1', 'team_style3', 'team_style4'))
						),						 
						 array(
							"type"			=> "colorpicker",
							"class"			=> "",
							"heading"		=> __("Title Font Color",'apcore'),
							"param_name"	=> "teamnamefontcolor",
							"value"			=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),						 
						 array(
							"type"			=> "colorpicker",
							"class"			=> "",
							"heading"		=> __("Designation Font Color",'apcore'),
							"param_name"	=> "teamdesignationfontcolor",
							"value"			=> '#747474',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						 ),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Select Image Overlay Color Scheme",'apcore'),
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
						),	
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Overlay Color",'apcore'),
							"param_name"		=> "teamboxoverlaycolor",
							"value"				=> 'rgba(0, 0, 0, 0.3)',
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						 ),
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Overlay Hover Color",'apcore'),
							"param_name"		=> "teamboxoverlayhovercolor",
							"value" 			=> 'rgba(0, 0, 0, 0.7)',
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						 ),
						array(
							"type" 				=> "colorpicker",
							"class" 			=> "",
							"heading" 			=> __("Title Hover Background Color",'apcore'),
							"param_name" 		=> "teamtitlehoverbgcolor",
							"value" 			=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style1'))
						 ),						 
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Title Hover Font Color",'apcore'),
							"param_name"		=> "teamtitlehoverfontcolor",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style1'))
						 ),	 
						array(
							"type"			=> "colorpicker",
							"class"			=> "",
							"heading"		=> __("Caption Background Color",'apcore'),
							"param_name"	=> "teamcaptionbg",
							"value"			=> '#ffffff',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style6')),
						 ),
						array(
							'type'				=> 'zolo_number',
							"class"				=> "",
							"heading"			=> __("Caption Border Radius",'apcore'),
							"param_name"		=> "caption_border_radius",
							'step'				=> '1',
							'value'				=> '0',
							'suffix'			=> 'px',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style6')),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Box space",'apcore'),
							"description"		=> __("Enter value without px",'apcore'),
							"param_name"		=> "teamboxspace",
							"value"				=> '15',
							),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Social Icon Show/Hide",'apcore'),
							"param_name"		=> "teamsocialshowhide",
							"value"				=> array(
								__("Show",'apcore') => "social_show",
								__("Hide",'apcore') => "social_hide"
							),							
						),
						array(
							"type"			=> "colorpicker",
							"class"			=> "",
							"heading"		=> __("Icon Color",'apcore'),
							"param_name"	=> "team_icon_color",
							"value"			=> '#333',
							'dependency'	=> array( 'element' => 'teamstyle', 'value' => array('team_style6')),
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
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/YBVqLqfQr04",
						),						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Title Style', 'apcore'),
							'param_name'		=> 'title_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'title_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'tag' => 'h2',
									'font_size' => '18',
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
							'param_name'		=> 'title_google_fonts',
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
							'param_name'		=> 'title_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'title_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Designation Style', 'apcore'),
							'param_name'		=> 'designation_heading',
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'designation_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size' => '16',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Designation Style', 'apcore'),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'designation_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'designation_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'designation_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Designation Style', 'apcore'),
						),
						
						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Slider Show/Hide",'apcore'),
							"param_name"		=> "teamslidershowhide",
							"value"				=> array(
								__("Hide",'apcore') => "slider_hide",
								__("Show",'apcore') => "slider_show"
							),
							'group'				=> esc_html__('Carousel', 'apcore'),
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
							'std' => '4',
						  "description" => __("No of slides to show.", 'apcore'),
						  'edit_field_class' => 'vc_column vc_col-sm-4',
						  'group'				=> esc_html__('Carousel', 'apcore'),
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
								'std' => '2',
							  "description" => __("No of slides to show.", 'apcore'),
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  'group'				=> esc_html__('Carousel', 'apcore'),
						),
						array(
							  "type"		=> "dropdown",
							  "heading"		=> __("Mobile Items", 'apcore'),
							  "param_name"	=> "mobile_no_of_items",
							  "value"		=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
									"5" => "5",
									"6" => "6",
								),
								'std' => '1',
							  "description" => __("No of slides to show.", 'apcore'),
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  'group'				=> esc_html__('Carousel', 'apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Navigation Appear On Hover', 'apcore'),
							'param_name'		=> 'navigation_appear_on_hover',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency'		=> array( 'element' => 'teamslidershowhide', 'value' => array('slider_show')),
							'group'				=> esc_html__('Carousel', 'apcore'),
						),					
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Arrows Style', 'apcore' ),
							'param_name'  => 'teamcrslnav',
							'simple_mode' => false,
							'options'     => array(
								'none' => array(
									'tooltip' => esc_attr__('Arrows Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style1.jpg'
								),
								'round' => array(
									'tooltip' => esc_attr__('Arrows Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style2.jpg'
								),
								'square' => array(
									'tooltip' => esc_attr__('Arrows Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style3.jpg'
								),
							),
							'dependency'		=> array( 'element' => 'teamslidershowhide', 'value' => array('slider_show')),
							'group'				=> esc_html__('Carousel', 'apcore'),
		
						),						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation Background Color",'apcore'),
							"param_name"		=> "teamnavbgcolor",
							"value"				=> '#549ffc',
							'dependency'		=> array( 'element' => 'teamcrslnav', 'value' => array('square','round')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'group'				=> esc_html__('Carousel', 'apcore'),
						),						 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation Hover Background Color",'apcore'),
							"param_name"		=> "teamnavhoverbgcolor",
							"value"				=> '#3265a3',
							'dependency'		=> array( 'element' => 'teamcrslnav', 'value' => array('square','round')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'group'				=> esc_html__('Carousel', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation Icon Color",'apcore'),
							"param_name"		=> "teamnaviconcolor",
							"value"				=> '#ffffff',
							'dependency'		=> array( 'element' => 'teamcrslnav', 'value' => array('square','round')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'group'				=> esc_html__('Carousel', 'apcore'),
						),						 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation Hover Icon Color",'apcore'),
							"param_name"		=> "teamnavhovericoncolor",
							"value"				=> '#ffffff',
							'dependency'		=> array( 'element' => 'teamcrslnav', 'value' => array('square','round')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
							'group'				=> esc_html__('Carousel', 'apcore'),
						),
					),	
				) );		
			}
		}

		function apress_team( $atts ){		
			ob_start();
			extract( shortcode_atts( array(
				'teamstyle'   				=> 'team_style1',
				'link_to_team'		=> 'no',
				'category' 					=> 'all',
				'num' 						=> '4',
				'teamcrslcolprw'			=> 'Four',
				'teamnamefontsize'			=> '18',
				'teamdesignationfontsize'	=> '16',
				'teamtext_align'			=> 'left',
				'teamnamefontcolor'			=> '#549ffc',
				'teamdesignationfontcolor'	=> '#747474',
				'teamboxbgcolor'			=> '#ffffff',
				'teamboxborcolor'			=> '#eeeeee',
				'box_shadow'				=> '',
				'box_swing'					=> 'no',
				'border_radius'				=> '0',
				'teamtitlehoverbgcolor'		=> '#549ffc',
				'teamtitlehoverfontcolor'	=> '#ffffff',
				'teamsocialshowhide'		=> 'social_show',
				'teamcrslnav'				=> 'none',
				'teamnavbgcolor'			=> '#549ffc',
				'teamnavhoverbgcolor'		=> '#3265a3',
				
				'teamnaviconcolor'			=> '#ffffff',
				'teamnavhovericoncolor'		=> '#ffffff',
				'color_scheme'				=> 'primary_color_scheme',
				'teamboxoverlaycolor'		=> 'rgba(0, 0, 0, 0.3)',
				'teamboxoverlayhovercolor'	=> 'rgba(0, 0, 0, 0.7)',
				'teamboxspace'				=> '15',
				'teamslidershowhide'		=> 'slider_hide',
				'desktop_no_of_items'		=> '4',
				'tablet_no_of_items'		=> '2',
				'mobile_no_of_items'		=> '1',
				'navigation_appear_on_hover'=> 'no',
				
				'title_font_options'		=> '',
				'title_google_fonts'		=> '',
				'title_custom_fonts'		=> '',
				'designation_font_options'	=> '',
				'designation_google_fonts'	=> '',
				'designation_custom_fonts'	=> '',
				'teamcaptionbg'				=> '#ffffff',
				'caption_border_radius'		=> '0',
				'team_icon_color'			=> '#333333',
				
				'data_animation'			=> 'No Animation',
				'data_delay'				=> '500'
			), $atts ) );
			
			if($teamcrslcolprw == 'Six'){
				$teamcrslcolprw = 6;
			}elseif($teamcrslcolprw == 'Five'){
				$teamcrslcolprw = 5;
			}elseif($teamcrslcolprw == 'Four'){
				$teamcrslcolprw = 4;
			}elseif($teamcrslcolprw == 'Three'){
				$teamcrslcolprw = 3;
			}elseif($teamcrslcolprw == 'Two'){
				$teamcrslcolprw = 2;
			}
			
			//Animation
			if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
			
			if($navigation_appear_on_hover == 'yes'){
					$navigation_appear_onhover = 'navigation_appear_on_hover';
				}else{
					$navigation_appear_onhover = '';
				}
			
			
if($teamstyle == 'team_style4'){
	global $apress_data;
	$primary_color_option = isset($apress_data["primary_color_option"]) ? $apress_data["primary_color_option"] : 'color';
	if($primary_color_option == 'gradient'){
		
			$primary_gradient_color_from = isset($apress_data["primary_gradient"]["from"]) ? $apress_data["primary_gradient"]["from"] : '#5295ea';
			$primary_gradient_color_to = isset($apress_data["primary_gradient"]["to"]) ? $apress_data["primary_gradient"]["to"] : '#8b79db';
			
			$primary_color_bg = 'background:'.$primary_gradient_color_from.';
	background: -moz-linear-gradient(0deg, '.$primary_gradient_color_from.' 0%, '.$primary_gradient_color_to.' 100%);
	background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$primary_gradient_color_from.'), color-stop(100%, '.$primary_gradient_color_to.'));
	background: -webkit-linear-gradient(0deg, '.$primary_gradient_color_from.' 0%, '.$primary_gradient_color_to.' 100%);
	background: -o-linear-gradient(0deg, '.$primary_gradient_color_from.' 0%, '.$primary_gradient_color_to.' 100%);
	background: -ms-linear-gradient(0deg, '.$primary_gradient_color_from.' 0%, '.$primary_gradient_color_to.' 100%);
	background: linear-gradient(90deg, '.$primary_gradient_color_from.' 0%, '.$primary_gradient_color_to.' 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$primary_gradient_color_from.', endColorstr='.$primary_gradient_color_to.',GradientType=1 );';
			
	}else{
		$primary_color = isset($apress_data["primary_color"]) ? $apress_data["primary_color"] : '#549ffc';	
		$primary_color_bg = 'background:'.$primary_color.';';	
	}
}
			
	// Title Text HTML.
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$designation_options = _zolo_parse_text_shortcode_params($designation_font_options, '', $designation_google_fonts, $designation_custom_fonts);
				
		//RTL Colde
		if ( is_rtl() ){
			if($teamtext_align == 'left'){
				$teamtextalign = 'right';
			}else if($teamtext_align == 'right'){
				$teamtextalign = 'left';
			}else{
				$teamtextalign = 'center';
			}
		}else{
			$teamtextalign = $teamtext_align;
		}
				
			static $c = 1;
			
			
			if($color_scheme == 'design_your_own'){
				$key = '';
			}else{
				$key = $color_scheme;
			} 
			$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
			
			
			// settings
			$options_array = array(
				'class'                     => 'owl-carousel zolo_owl_slider zolo_teamslider zolo_team_slider'.$c.' '.$teamcrslnav.' '.$navigation_appear_onhover,
				
				'data-margin'               => 0,
				'data-slide-by'             => 1,
				'data-loop'                 => true,
				'data-lazy-load'            => false,
				'data-stage-padding'        => 0,
				'data-auto-height'			=> true,
				'data-auto-width'           => 0,
				// Navigation
				'data-nav'                  => true,
				'data-dots'                 => false,
				'data-dots-container'		=>	0,
				'data-nav-container'		=>	0,
				// Autoplay
				'data-autoplay'             => false,
				'data-autoplay-timeout'     => 5000,
				'data-autoplay-speed'       => false,
				'data-autoplay-hover-pause' => false,
				// Responsive	
				'data-colums-mobile'  		=> $mobile_no_of_items,
				'data-colums-tablet'        => $tablet_no_of_items,
				'data-colums-desktop'       => $desktop_no_of_items,
				
				// Class for CSS3 animation
				'data-animate-out'			=> false,
				'data-animate-in'			=> false,
				
			);
			?>

<div class="zolo_team_area <?php echo $teamstyle.' zoloteam'.$c.' '.$teamslidershowhide;?> <?php if($teamslidershowhide != 'slider_show'){ echo 'zolo_team_col'.$teamcrslcolprw;}?> <?php echo $animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div class="zolo_team_row">
  <?php if($teamslidershowhide == 'slider_show'){?>
  <div <?php echo array_to_data( $options_array ); ?>>
    <?php }else{?>
    <div>
      <?php }?>
      <?php
			$args = array(
			'posts_per_page'=> $num,
			'post_type'=> "zt_team",
			'post_status' => 'publish',
			);
			if ($category !== '' && $category !== "all") {
			$args['tax_query']=array(
			array(
				'taxonomy' => 'catteam',
				'field' => 'slug',
				'terms' => $category
				)
			);
			}
			
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full'); 
			if ( $thumb ){
			$thumb_url = $thumb['0'];
			}
			else {
			$thumb_url = get_stylesheet_directory_uri(). '/assets/images/post_thumb/shortcode_team_thumb.jpg';
			} ?>
      <div class="zolo_teambox_pad">
        <div class="zolo_teambox">
          <?php if($teamstyle == 'team_style1'){?>
          <div class="zolo_team_img"><img src="<?php echo $thumb_url ?>" /></div>
          <div class="zolo_team_info"> 
            
            <!--Team Title-->
            <div class="zolo_team_title"> <?php echo '<'.$title_options['tag']. ' class="zolo_team_name entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php if($link_to_team == 'yes'){?>
              <a href="<?php the_permalink(); ?>">
              <?php }?>
              <?php the_title(); ?>
              <?php if($link_to_team == 'yes'){?>
              </a>
              <?php }?>
              <?php echo '</'. $title_options['tag'].'>';?>
              <?php $team_designation = get_post_meta( get_the_ID(), 'zt_team_designation', true ); 
			if (!empty($team_designation)) { echo '<span class="zolo_team_designation' . $designation_options['class'] . '" ' . $designation_options['style'] . '>'.$team_designation.'</span>';}
			?>
            </div>
            <?php //Social Icon
			if($teamsocialshowhide == 'social_show'){?>
            <div class="social_icon">
              <?php 
				$team_facebook = get_post_meta( get_the_ID(), 'zt_team_facebook', true );
				$team_twitter = get_post_meta( get_the_ID(), 'zt_team_twitter', true );
				$team_linkedin = get_post_meta( get_the_ID(), 'zt_team_linkedin', true );
				$team_pinterest = get_post_meta( get_the_ID(), 'zt_team_pinterest', true );
				
				$team_github = get_post_meta( get_the_ID(), 'zt_team_github', true );
				$team_insta = get_post_meta( get_the_ID(), 'zt_team_insta', true );
				$team_dribble = get_post_meta( get_the_ID(), 'zt_team_dribble', true );
				$team_behance = get_post_meta( get_the_ID(), 'zt_team_behance', true );
				$team_500px = get_post_meta( get_the_ID(), 'zt_team_500px', true );
				$team_deviantart = get_post_meta( get_the_ID(), 'zt_team_deviantart', true );
				$team_xing = get_post_meta( get_the_ID(), 'zt_team_xing', true );
				$team_email = get_post_meta( get_the_ID(), 'zt_team_email', true );		
				?>
              <ul>
                <?php if($team_facebook){ ?>
                <li><a href="<?php echo $team_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if($team_twitter){ ?>
                <li><a href="<?php echo $team_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if($team_linkedin){ ?>
                <li><a href="<?php echo $team_linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if($team_pinterest){ ?>
                <li><a href="<?php echo $team_pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if($team_github){ ?>
                <li><a href="<?php echo esc_url($team_github);?>" target="_blank"><i class="fa fa-github"></i></a></li>
                <?php } ?>
                <?php if($team_insta){ ?>
                <li><a href="<?php echo esc_url($team_insta);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if($team_dribble){ ?>
                <li><a href="<?php echo esc_url($team_dribble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if($team_behance){ ?>
                <li><a href="<?php echo esc_url($team_behance);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                <?php } ?>
                <?php if($team_500px){ ?>
                <li><a href="<?php echo esc_url($team_500px);?>" target="_blank"><i class="fa fa-500px"></i></a></li>
                <?php } ?>
                <?php if($team_deviantart){ ?>
                <li><a href="<?php echo esc_url($team_deviantart);?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                <?php } ?>
                <?php if($team_xing){ ?>
                <li><a href="<?php echo esc_url($team_xing);?>" target="_blank"><i class="fa fa-xing"></i></a></li>
                <?php } ?>
                <?php if($team_email){ ?>
                <li><a href="mailto:<?php echo esc_attr($team_email);?>"><i class="fa fa-envelope-o"></i></a></li>
                <?php } ?>
              </ul>
            </div>
            <?php }?>
          </div>
          <?php }?>
          <?php if($teamstyle == 'team_style2' || $teamstyle == 'team_style3'){?>
          <div class="zolo_team_img"><img src="<?php echo $thumb_url ?>" /></div>
          <div class="zolo_team_info">
            <?php //Social Icon
			if($teamsocialshowhide == 'social_show'){?>
            <div class="social_icon">
              <?php 
				$team_facebook = get_post_meta( get_the_ID(), 'zt_team_facebook', true );
				$team_twitter = get_post_meta( get_the_ID(), 'zt_team_twitter', true );
				$team_linkedin = get_post_meta( get_the_ID(), 'zt_team_linkedin', true );
				$team_pinterest = get_post_meta( get_the_ID(), 'zt_team_pinterest', true );
				
				$team_github = get_post_meta( get_the_ID(), 'zt_team_github', true );
				$team_insta = get_post_meta( get_the_ID(), 'zt_team_insta', true );
				$team_dribble = get_post_meta( get_the_ID(), 'zt_team_dribble', true );
				$team_behance = get_post_meta( get_the_ID(), 'zt_team_behance', true );
				$team_500px = get_post_meta( get_the_ID(), 'zt_team_500px', true );
				$team_deviantart = get_post_meta( get_the_ID(), 'zt_team_deviantart', true );
				$team_xing = get_post_meta( get_the_ID(), 'zt_team_xing', true );
				$team_email = get_post_meta( get_the_ID(), 'zt_team_email', true );		
				?>
              <ul>
                <?php if($team_facebook){ ?>
                <li><a href="<?php echo $team_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if($team_twitter){ ?>
                <li><a href="<?php echo $team_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if($team_linkedin){ ?>
                <li><a href="<?php echo $team_linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if($team_pinterest){ ?>
                <li><a href="<?php echo $team_pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if($team_github){ ?>
                <li><a href="<?php echo esc_url($team_github);?>" target="_blank"><i class="fa fa-github"></i></a></li>
                <?php } ?>
                <?php if($team_insta){ ?>
                <li><a href="<?php echo esc_url($team_insta);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if($team_dribble){ ?>
                <li><a href="<?php echo esc_url($team_dribble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if($team_behance){ ?>
                <li><a href="<?php echo esc_url($team_behance);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                <?php } ?>
                <?php if($team_500px){ ?>
                <li><a href="<?php echo esc_url($team_500px);?>" target="_blank"><i class="fa fa-500px"></i></a></li>
                <?php } ?>
                <?php if($team_deviantart){ ?>
                <li><a href="<?php echo esc_url($team_deviantart);?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                <?php } ?>
                <?php if($team_xing){ ?>
                <li><a href="<?php echo esc_url($team_xing);?>" target="_blank"><i class="fa fa-xing"></i></a></li>
                <?php } ?>
                <?php if($team_email){ ?>
                <li><a href="mailto:<?php echo esc_attr($team_email);?>"><i class="fa fa-envelope-o"></i></a></li>
                <?php } ?>
              </ul>
            </div>
            <?php }?>
            <div class="zolo_team_title"> <?php echo '<'.$title_options['tag']. ' class="zolo_team_name entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php if($link_to_team == 'yes'){?>
              <a href="<?php the_permalink(); ?>">
              <?php }?>
              <?php the_title(); ?>
              <?php if($link_to_team == 'yes'){?>
              </a>
              <?php }?>
              <?php echo '</'. $title_options['tag'].'>';?>
              <?php $team_designation = get_post_meta( get_the_ID(), 'zt_team_designation', true ); 
			if (!empty($team_designation)) { echo '<span class="zolo_team_designation' . $designation_options['class'] . '" ' . $designation_options['style'] . '>'.$team_designation.'</span>';} ?>
            </div>
          </div>
          <?php }?>
          <?php if($teamstyle == 'team_style4'){?>
          <div class="zolo_team_img"><img src="<?php echo $thumb_url ?>" />
            <div class="zolo_team_info">
              <?php //Social Icon
			if($teamsocialshowhide == 'social_show'){?>
              <div class="social_icon">
                <?php 
				$team_facebook = get_post_meta( get_the_ID(), 'zt_team_facebook', true );
				$team_twitter = get_post_meta( get_the_ID(), 'zt_team_twitter', true );
				$team_linkedin = get_post_meta( get_the_ID(), 'zt_team_linkedin', true );
				$team_pinterest = get_post_meta( get_the_ID(), 'zt_team_pinterest', true );
				
				$team_github = get_post_meta( get_the_ID(), 'zt_team_github', true );
				$team_insta = get_post_meta( get_the_ID(), 'zt_team_insta', true );
				$team_dribble = get_post_meta( get_the_ID(), 'zt_team_dribble', true );
				$team_behance = get_post_meta( get_the_ID(), 'zt_team_behance', true );
				$team_500px = get_post_meta( get_the_ID(), 'zt_team_500px', true );
				$team_deviantart = get_post_meta( get_the_ID(), 'zt_team_deviantart', true );
				$team_xing = get_post_meta( get_the_ID(), 'zt_team_xing', true );
				$team_email = get_post_meta( get_the_ID(), 'zt_team_email', true );		
				?>
                <ul>
                  <?php if($team_facebook){ ?>
                  <li><a href="<?php echo $team_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <?php } ?>
                  <?php if($team_twitter){ ?>
                  <li><a href="<?php echo $team_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  <?php } ?>
                  <?php if($team_linkedin){ ?>
                  <li><a href="<?php echo $team_linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                  <?php } ?>
                  <?php if($team_pinterest){ ?>
                  <li><a href="<?php echo $team_pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                  <?php } ?>
                  <?php if($team_github){ ?>
                  <li><a href="<?php echo esc_url($team_github);?>" target="_blank"><i class="fa fa-github"></i></a></li>
                  <?php } ?>
                  <?php if($team_insta){ ?>
                  <li><a href="<?php echo esc_url($team_insta);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  <?php } ?>
                  <?php if($team_dribble){ ?>
                  <li><a href="<?php echo esc_url($team_dribble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                  <?php } ?>
                  <?php if($team_behance){ ?>
                  <li><a href="<?php echo esc_url($team_behance);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                  <?php } ?>
                  <?php if($team_500px){ ?>
                  <li><a href="<?php echo esc_url($team_500px);?>" target="_blank"><i class="fa fa-500px"></i></a></li>
                  <?php } ?>
                  <?php if($team_deviantart){ ?>
                  <li><a href="<?php echo esc_url($team_deviantart);?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                  <?php } ?>
                  <?php if($team_xing){ ?>
                  <li><a href="<?php echo esc_url($team_xing);?>" target="_blank"><i class="fa fa-xing"></i></a></li>
                  <?php } ?>
                  <?php if($team_email){ ?>
                  <li><a href="mailto:<?php echo esc_attr($team_email);?>"><i class="fa fa-envelope-o"></i></a></li>
                  <?php } ?>
                </ul>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="zolo_team_title"> <?php echo '<'.$title_options['tag']. ' class="zolo_team_name entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
            <?php if($link_to_team == 'yes'){?>
            <a href="<?php the_permalink(); ?>">
            <?php }?>
            <?php the_title(); ?>
            <?php if($link_to_team == 'yes'){?>
            </a>
            <?php }?>
            <?php echo '</'. $title_options['tag'].'>';?>
            <?php $team_designation = get_post_meta( get_the_ID(), 'zt_team_designation', true ); 
			if (!empty($team_designation)) { echo '<span class="zolo_team_designation' . $designation_options['class'] . '" ' . $designation_options['style'] . '>'.$team_designation.'</span>';} ?>
          </div>
          <?php }?>
          <?php if($teamstyle == 'team_style5'){?>
          <div class="zolo_team_img"><img src="<?php echo $thumb_url ?>" /></div>
          <div class="zolo_team_info">
            <div class="zolo_team_title"> <?php echo '<'.$title_options['tag']. ' class="zolo_team_name entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php if($link_to_team == 'yes'){?>
              <a href="<?php the_permalink(); ?>">
              <?php }?>
              <?php the_title(); ?>
              <?php if($link_to_team == 'yes'){?>
              </a>
              <?php }?>
              <?php echo '</'. $title_options['tag'].'>';?>
              <?php $team_designation = get_post_meta( get_the_ID(), 'zt_team_designation', true ); 
			if (!empty($team_designation)) { echo '<span class="zolo_team_designation' . $designation_options['class'] . '" ' . $designation_options['style'] . '>'.$team_designation.'</span>';} ?>
            </div>
            <?php //Social Icon
				if($teamsocialshowhide == 'social_show'){?>
            <div class="social_icon">
              <?php 
					$team_facebook = get_post_meta( get_the_ID(), 'zt_team_facebook', true );
					$team_twitter = get_post_meta( get_the_ID(), 'zt_team_twitter', true );
					$team_linkedin = get_post_meta( get_the_ID(), 'zt_team_linkedin', true );
					$team_pinterest = get_post_meta( get_the_ID(), 'zt_team_pinterest', true );
					
					$team_github = get_post_meta( get_the_ID(), 'zt_team_github', true );
					$team_insta = get_post_meta( get_the_ID(), 'zt_team_insta', true );
					$team_dribble = get_post_meta( get_the_ID(), 'zt_team_dribble', true );
					$team_behance = get_post_meta( get_the_ID(), 'zt_team_behance', true );
					$team_500px = get_post_meta( get_the_ID(), 'zt_team_500px', true );
					$team_deviantart = get_post_meta( get_the_ID(), 'zt_team_deviantart', true );
					$team_xing = get_post_meta( get_the_ID(), 'zt_team_xing', true );
					$team_email = get_post_meta( get_the_ID(), 'zt_team_email', true );		
					?>
              <ul>
                <?php if($team_facebook){ ?>
                <li><a href="<?php echo $team_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if($team_twitter){ ?>
                <li><a href="<?php echo $team_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if($team_linkedin){ ?>
                <li><a href="<?php echo $team_linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if($team_pinterest){ ?>
                <li><a href="<?php echo $team_pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if($team_github){ ?>
                <li><a href="<?php echo esc_url($team_github);?>" target="_blank"><i class="fa fa-github"></i></a></li>
                <?php } ?>
                <?php if($team_insta){ ?>
                <li><a href="<?php echo esc_url($team_insta);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if($team_dribble){ ?>
                <li><a href="<?php echo esc_url($team_dribble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if($team_behance){ ?>
                <li><a href="<?php echo esc_url($team_behance);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                <?php } ?>
                <?php if($team_500px){ ?>
                <li><a href="<?php echo esc_url($team_500px);?>" target="_blank"><i class="fa fa-500px"></i></a></li>
                <?php } ?>
                <?php if($team_deviantart){ ?>
                <li><a href="<?php echo esc_url($team_deviantart);?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                <?php } ?>
                <?php if($team_xing){ ?>
                <li><a href="<?php echo esc_url($team_xing);?>" target="_blank"><i class="fa fa-xing"></i></a></li>
                <?php } ?>
                <?php if($team_email){ ?>
                <li><a href="mailto:<?php echo esc_attr($team_email);?>"><i class="fa fa-envelope-o"></i></a></li>
                <?php } ?>
              </ul>
            </div>
            <?php }?>
          </div>
          <?php }?>
          <?php if($teamstyle == 'team_style6'){?>
          <div class="zolo_team_img"><img src="<?php echo $thumb_url ?>" /></div>
          <div class="zolo_team_info">
            <?php //Social Icon
			if($teamsocialshowhide == 'social_show'){?>
            <div class="social_icon">
              <?php 
				$team_facebook = get_post_meta( get_the_ID(), 'zt_team_facebook', true );
				$team_twitter = get_post_meta( get_the_ID(), 'zt_team_twitter', true );
				$team_linkedin = get_post_meta( get_the_ID(), 'zt_team_linkedin', true );
				$team_pinterest = get_post_meta( get_the_ID(), 'zt_team_pinterest', true );
				
				$team_github = get_post_meta( get_the_ID(), 'zt_team_github', true );
				$team_insta = get_post_meta( get_the_ID(), 'zt_team_insta', true );
				$team_dribble = get_post_meta( get_the_ID(), 'zt_team_dribble', true );
				$team_behance = get_post_meta( get_the_ID(), 'zt_team_behance', true );
				$team_500px = get_post_meta( get_the_ID(), 'zt_team_500px', true );
				$team_deviantart = get_post_meta( get_the_ID(), 'zt_team_deviantart', true );
				$team_xing = get_post_meta( get_the_ID(), 'zt_team_xing', true );
				$team_email = get_post_meta( get_the_ID(), 'zt_team_email', true );		
				?>
              <ul>
                <?php if($team_facebook){ ?>
                <li><a href="<?php echo $team_facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if($team_twitter){ ?>
                <li><a href="<?php echo $team_twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if($team_linkedin){ ?>
                <li><a href="<?php echo $team_linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if($team_pinterest){ ?>
                <li><a href="<?php echo $team_pinterest;?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                <?php } ?>
                <?php if($team_github){ ?>
                <li><a href="<?php echo esc_url($team_github);?>" target="_blank"><i class="fa fa-github"></i></a></li>
                <?php } ?>
                <?php if($team_insta){ ?>
                <li><a href="<?php echo esc_url($team_insta);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if($team_dribble){ ?>
                <li><a href="<?php echo esc_url($team_dribble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                <?php } ?>
                <?php if($team_behance){ ?>
                <li><a href="<?php echo esc_url($team_behance);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                <?php } ?>
                <?php if($team_500px){ ?>
                <li><a href="<?php echo esc_url($team_500px);?>" target="_blank"><i class="fa fa-500px"></i></a></li>
                <?php } ?>
                <?php if($team_deviantart){ ?>
                <li><a href="<?php echo esc_url($team_deviantart);?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                <?php } ?>
                <?php if($team_xing){ ?>
                <li><a href="<?php echo esc_url($team_xing);?>" target="_blank"><i class="fa fa-xing"></i></a></li>
                <?php } ?>
                <?php if($team_email){ ?>
                <li><a href="mailto:<?php echo esc_attr($team_email);?>"><i class="fa fa-envelope-o"></i></a></li>
                <?php } ?>
              </ul>
            </div>
            <?php }?>
            <div class="zolo_team_title"> <?php echo '<'.$title_options['tag']. ' class="zolo_team_name entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php if($link_to_team == 'yes'){?>
              <a href="<?php the_permalink(); ?>">
              <?php }?>
              <?php the_title(); ?>
              <?php if($link_to_team == 'yes'){?>
              </a>
              <?php }?>
              <?php echo '</'. $title_options['tag'].'>';?>
              <?php $team_designation = get_post_meta( get_the_ID(), 'zt_team_designation', true ); 
			if (!empty($team_designation)) { echo '<span class="zolo_team_designation' . $designation_options['class'] . '" ' . $designation_options['style'] . '>'.$team_designation.'</span>';} ?>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<?php
// CSS
$shortcode_css = '';
if(substr_count($box_shadow, 'disable') == 0) {
    $box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox{'.$box_shadow.'}';
}
if($box_swing == 'yes'){
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox:hover{ transform:translateY(-10px);-moz-transform:translateY(-10px);-webkit-transform:translateY(-10px);-ms-transform:translateY(-10px);-o-transform:translateY(-10px);}';
}

$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_team_row{ margin:0 -'.$teamboxspace.'px;}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox_pad{ padding:'.$teamboxspace.'px;}';

$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_name a,
.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_name{color:'.$teamnamefontcolor.'; font-size:'.$teamnamefontsize.'px;}';

$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_designation{ color:'.$teamdesignationfontcolor.';font-size:'.$teamdesignationfontsize.'px;}';


if($color_scheme == 'design_your_own'){
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_img:after{background:'.$teamboxoverlaycolor.';}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox:hover .zolo_team_img:after{background:'.$teamboxoverlayhovercolor.';}';

}else{
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_img:after{ opacity:0;filter: alpha(opacity=0);}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox:hover .zolo_team_img:after{opacity:0.8;filter: alpha(opacity=80);'.$color_scheme_css.'}';

}

if($teamslidershowhide == 'slider_show'){
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel.round .owl-nav button,
.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel.square .owl-nav button{background:'.$teamnavbgcolor.'; color:'.$teamnaviconcolor.';}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel.round .owl-nav button:hover,
.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel.square .owl-nav button:hover{background:'.$teamnavhoverbgcolor.'; color:'.$teamnavhovericoncolor.';}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel.round .owl-nav button:after,
.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel.square .owl-nav button:after{background:'.$teamnavhovericoncolor.';}';

	if($navigation_appear_on_hover == 'yes'){
    $nav_position = $teamboxspace + 20;

    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel .owl-nav .owl-next{ right:'.$nav_position.'px;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teamslider.owl-carousel .owl-nav .owl-prev{ left:'.$nav_position.'px;}';
	}
}


//Team style 1
if($teamstyle == 'team_style1'){
$shortcode_css .= '.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox .social_icon{border-top:1px solid '.$teamboxborcolor.';}';
$shortcode_css .= '.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox { background:'.$teamboxbgcolor.'; border:1px solid '.$teamboxborcolor.';}';
$shortcode_css .= '.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox .social_icon li a{color:'.$teamdesignationfontcolor.';}';
$shortcode_css .= '.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox:hover .zolo_team_title{ background:'.$teamtitlehoverbgcolor.'}';
$shortcode_css .= '.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox:hover .zolo_team_designation,
.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox:hover .zolo_team_name a,
.zolo_team_area.team_style1.zoloteam'.$c.' .zolo_teambox:hover .zolo_team_name{color:'.$teamtitlehoverfontcolor.';}';

//Team style 2
}else if($teamstyle == 'team_style2'){		
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox {border-radius:'.$border_radius.'px;-moz-border-radius:'.$border_radius.'px;-webkit-border-radius:'.$border_radius.'px;}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .social_icon li a{color:'.$teamnamefontcolor.';border:1px solid '.$teamnamefontcolor.';}';

//Team style 3
}else if($teamstyle == 'team_style3'){
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox {border-radius:'.$border_radius.'px;-moz-border-radius:'.$border_radius.'px;-webkit-border-radius:'.$border_radius.'px;}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .social_icon li a{color:'.$teamnamefontcolor.';}';
$shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_info{ text-align:'.$teamtextalign.'}';


//Team style 4
}else if($teamstyle == 'team_style4'){
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_title{padding-bottom:24px; padding-top:18px;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_title,
    .zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_info{ text-align:'.$teamtextalign.'}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_designation{display:inline-block; width:auto; float:none;padding: 0 0.6em; border-radius:3px;line-height: 1.9em;margin-top:10px; text-transform:uppercase;'.$primary_color_bg.'}';
    
    if($color_scheme == 'design_your_own'){
    
        $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_designation{'.$primary_color_bg.'}';
        
    }else{
    
        $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_designation{'.$color_scheme_css.'}';
        
    }
    
    
//Team style 5
}else if($teamstyle == 'team_style5'){
    
	if($teamboxborcolor != '') { $border ='1px solid' .$teamboxborcolor; }else{ $border = 'none';}
	
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox { background:'.$teamboxbgcolor.'; border:'.$border.'; border-radius:'.$border_radius.'px;-moz-border-radius:'.$border_radius.'px;-webkit-border-radius:'.$border_radius.'px;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox{display:flex;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_img{ display: flex; flex-direction: column; overflow: hidden;position: relative;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_info{display: flex;flex-direction: column;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_title{-moz-box-flex: 1;flex-grow: 1;padding-top:26px;}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .social_icon li a{color:'.$teamnamefontcolor.';}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .social_icon{ padding-bottom:26px;}';
    
    
    }else if($teamstyle == 'team_style6'){
    
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .social_icon li a{color:'.$team_icon_color.'; background:'.$teamcaptionbg.';}';
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .social_icon li a:hover{color:'.$teamcaptionbg.'; background:'.$team_icon_color.';}';
    
    $shortcode_css .= '.zolo_team_area.zoloteam'.$c.' .zolo_teambox .zolo_team_info .zolo_team_title{background:'.$teamcaptionbg.'; border-radius:'.$caption_border_radius.'px; -moz-border-radius:'.$caption_border_radius.'px;-webkit-border-radius:'.$caption_border_radius.'px;-ms-border-radius:'.$caption_border_radius.'px;-o-border-radius:'.$caption_border_radius.'px;}';

}

apcore_save_plugin_dyn_styles( $shortcode_css );

			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Apress_Team_Module = new Apress_Team_Module;
}