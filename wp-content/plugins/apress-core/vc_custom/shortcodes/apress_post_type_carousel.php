<?php 
/*-----------------------------------------------------------------------------------*/
/* Post Type Carousel
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }


if(!class_exists('Apress_Post_Type_Carousel_Module')) {
	class Apress_Post_Type_Carousel_Module {

function __construct() {
		add_action( 'init', array( &$this, 'apress_post_type_carousel_init' ) );
		add_shortcode( 'apress_post_type_carousel', array( &$this, 'apress_post_type_carousel' ) );
	}
	
	
function apress_post_type_carousel_init() {
	
	$is_admin = is_admin();
	$categories_types = ($is_admin) ? get_categories() : array('All' => 'all');
	$categories_options = array("All" => "all");
	if($is_admin) {
		foreach ($categories_types as $type) {
			if(isset($type->name) && isset($type->slug))
				$categories_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
		}
	} else {
		$categories_options['All'] = 'all';
	}
	
	$post_type_options = array();	
	foreach ( get_post_types( '', 'names' ) as $post_type ) {
		$post_type_options[] = $post_type;
	}
	
	$doc_link = 'http://apressthemes.com/apress/documentation';
	
	
if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Post Type Carousel", 'apcore'),
					"base"			=> "apress_post_type_carousel",
					"weight"		=> 70,
					"class"			=> "",
					"category"		=> __( "Apress", "apress"),
					"description"	=> __( "Beautiful post type carousel designs", "apress"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-imagebox.png",
					"params"		=> array(						
						
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Style', 'apcore' ),
							'param_name'  => 'style',
							'simple_mode' => false,
							'options'     => array(
								'posttype_style1' => array(
									'tooltip' => esc_attr__('Style1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/post_type_carousel/post_type_carousel1.jpg'
								),
								'posttype_style2' => array(
									'tooltip' => esc_attr__('Style2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/post_type_carousel/post_type_carousel2.jpg'
								),
								
							),					
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Box Min Height",'apcore'),
							'param_name'=> 'box_min_height',
							'value'		=> '340',
							'suffix'	=> 'px',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
						),
						array(
							"type"				=> "dropdown",
							"heading"			=> __("Post Type", "apress"),
							"param_name"		=> "custom_post_type",
							"admin_label"		=> true,
							"value"				=> $post_type_options,
							'save_always'		=> true,
						),
						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Categories", "apress"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $categories_options,
							'save_always'		=> true,
							"description"		=> __("Please select the categories you would like to display for your POSTS. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apress"),
						),
						array(
							"type"			=> "textfield",
							"class"			=> "",
							"heading"		=> __("Excerpt Length",'apcore'),
							"param_name"	=> "excerpt_length",
							"value"			=> '20',
						 ),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Number of Post",'apcore'),
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),
							"param_name"		=> "num",
							'value'				=> '6', 
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
							'std' => '3',
						  "description" => __("No of slides to show.", 'apcore'),
						  'edit_field_class' => 'vc_column vc_col-sm-4',
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
						),
						
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Gap Between Column",'apcore'),
							'param_name'=> 'column_gap',
							'value'		=> '20',
							'suffix'	=> 'px',
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Taxonomy Name",'apcore'),
							"description"		=> __("To show category Please enter taxonomy name for the custom type.",'apcore'),
							"param_name"		=> "taxonomy_name",
							'value'				=> '', 
							'dependency' => array( 'element' => 'style', 'value' => array('posttype_style2')),
						),
						array(
							'type'				=> 'textfield',
							'heading'			=> esc_html__('Button Text', 'apcore'),
							'param_name'		=> 'button_text',
							'value'				=> esc_html__('Read More','apcore'),
							'admin_label'		=> true,
							'dependency' => array( 'element' => 'style', 'value' => array('posttype_style1')),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Color Scheme",'apcore'),
							"param_name"	=> "color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore') => "gradient_scheme1",
								__("Gradient Scheme 2",'apcore') => "gradient_scheme2",
								__("Gradient Scheme 3",'apcore') => "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Color",'apcore'),
							"param_name"	=> "button_bg_color",
							"value"			=> '#93cb40',
							'dependency'	=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Button Style', 'apcore'),
							'param_name'		=> 'button_style',
							'value'				=> 'round',
							'options'			=> array(
								esc_html__('Square', 'apcore') 	=> 'square',
								esc_html__('Rounded', 'apcore')	=> 'rounded',
								esc_html__('Round', 'apcore')	=> 'round',
							),
							'dependency' => array( 'element' => 'style', 'value' => array('posttype_style1')),
						),
						
						
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Text Alignment', 'apcore'),
							'param_name'		=> 'text_alignment',
							'value'				=> 'center',
							'options'			=> array(
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Center', 'apcore')	=> 'center',
								esc_html__('Right', 'apcore')	=> 'right',
							),
						),
						 array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box Background Color",'apcore'),
							'param_name'		=> "box_background_color",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency' => array( 'element' => 'style', 'value' => array('posttype_style2')),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box Separator Color",'apcore'),
							'param_name'		=> "box_separator_color",
							"value"				=> '#c6d3e3',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency' => array( 'element' => 'style', 'value' => array('posttype_style2')),
						),
						array(
						   'type'    	=> 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:26|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.18)',
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Image Overlay?', 'apcore'),
							'param_name'		=> 'image_overlay',
							'value'				=> 'on',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'dependency' => array( 'element' => 'style', 'value' => array('posttype_style1')),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'border_radius',
							'value'		=> '0',
							'suffix'	=> 'px',
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing On Hover', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'on',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
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
							"heading"			=> __("Delay","apress"),
							"param_name"		=> "data_delay",
							"value"				=> "500",
							"description"		=> __("Delay","apress"),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Extra class name", "apress"),
							"param_name"		=> "class",
							"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apress")
						),
						array(
							"type"				=> "zolo_video_link_param",
							"heading"			=> esc_html__("Video tutorial and theme documentation article","apress"),
							"param_name"		=> "tutorials",
							"doc_link"			=> $doc_link,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
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
									'tag' => 'h4',
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
									'color' => '#ffffff',
								),
							),
							'group'			=> esc_html__('Title Style', 'apcore'),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Title Hover Color",'apcore'),
							"param_name"	=> "title_hover_color",
							"value"			=> '#93cb40',
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
							'text'				=> esc_html__('Description Style', 'apcore'),
							'param_name'		=> 'description_heading',
							'group'				=> esc_html__('Description Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'description_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
									'color' => '#ffffff',
								),
							),
							'group'			=> esc_html__('Description Style', 'apcore'),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'description_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Description Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'description_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'description_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Description Style', 'apcore'),
						),
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Button Style', 'apcore'),
							'param_name'		=> 'button_heading',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style1'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'button_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style1'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'button_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style1'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'button_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'dependency' => array( 'element' => 'button_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),	
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Text Color",'apcore'),
							'param_name'		=> "button_text_color",
							"value"				=> '#ffffff',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style1'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),

						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Category Style', 'apcore'),
							'param_name'		=> 'category_heading',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'category_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'category_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'category_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'dependency' => array( 'element' => 'category_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),	
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("category Font Color",'apcore'),
							'param_name'		=> "category_text_color",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Meta Style', 'apcore'),
							'param_name'		=> 'meta_heading',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Meta Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'meta_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
								),
							),
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Meta Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Meta Font Color",'apcore'),
							'param_name'		=> "meta_text_color",
							"value"				=> '#8d8ea3',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Meta Style', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'meta_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'style', 'value' => 'posttype_style2'),
							'group'				=> esc_html__('Meta Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'meta_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'dependency' => array( 'element' => 'meta_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Meta Style', 'apcore'),
						),	
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable Loop?', 'apcore'),
							'param_name'		=> 'carousel_loop',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Enable AutoPlay?', 'apcore'),
							'param_name'		=> 'carousel_autoplay',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
						),
						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_arrows",
							"text"             => __( "Navigation Arrows", 'apcore' ),
							'group'=> esc_html__('Carousel','apcore'),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Arrow Navigation?', 'apcore'),
							'param_name'		=> 'hide_arrow_navigation',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
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
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "hide_arrow_navigation", 'value' => array('yes'))
		
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Arrows color",'apcore'),
							"param_name" => "arrows_color",
							"value" => '#000000',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "hide_arrow_navigation", 'value' => array('yes'))
						),
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Arrows background",'apcore'),
							"param_name" => "arrows_bg",
							"value" => '#ffffff',
							'dependency' => array( 'element' => 'arrows_style', 'value' => array('arrows_style2', 'arrows_style3')),
							'group'=> esc_html__('Carousel','apcore'),
						),			
						array(
							"type"             => "zolo_param_heading",
							"param_name"       => "navigation_dots",
							"text"             => __( "Navigation dots", 'apcore' ),
							'group'=> esc_html__('Carousel','apcore'),
						),
						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
							"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
							'param_name'		=> 'bullet_navigation',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'			=> esc_html__('Carousel','apcore'),
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
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "bullet_navigation", 'value' => array('yes'))
						),
						
						array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Bullet background",'apcore'),
							"param_name" => "bullet_bg",
							"value" => '#000000',
							'group'=> esc_html__('Carousel','apcore'),
							"dependency"	=> array('element' => "bullet_navigation", 'value' => array('yes'))
						),
						

					),
					) );		
		
			}		
			
}

function apress_post_type_carousel( $atts, $content=null ){
	
	extract(shortcode_atts(array(
				'style'						=> 'posttype_style1',
				'box_min_height'			=> '340',
				'custom_post_type'			=> '',
				'category' 					=> '',
				'excerpt_length'			=> '20',
				'num' 						=> '6',
				'desktop_no_of_items'		=> '3',
				'tablet_no_of_items'		=> '2',
				'mobile_no_of_items'		=> '1',
				'column_gap'				=> '20',
				
				'taxonomy_name'				=> '',
				'color_scheme'				=> 'primary_color_scheme',
				'button_bg_color'			=> '#93cb40',
				'button_style' 				=> 'round',
				'title_hover_color'			=> '#93cb40',			
				'box_background_color'		=> '#ffffff',
				'box_separator_color'		=> '#c6d3e3',
				
				'text_alignment' 			=> 'center',
				'box_shadow'				=> 'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:26|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.18)',
				'image_overlay'				=> 'no',
				'border_radius'				=> '0',
				'box_swing'					=> 'no',
				'title_font_options'		=> '',
				'title_google_fonts'		=> '',
				'title_custom_fonts'		=> '',
				
				'description_font_options'	=> '',
				'description_google_fonts'	=> '',
				'description_custom_fonts'	=> '',
				
				'button_text'				=> 'Read More',
				'button_font_options'		=> '',
				'button_google_fonts'		=> '',
				'button_custom_fonts'		=> '',
				'button_text_color'			=> '#ffffff',
				
				'category_font_options'		=> '',
				'category_google_fonts'		=> '',
				'category_custom_fonts'		=> '',
				'category_text_color'		=> '#ffffff',
				
				'meta_font_options'			=> '',
				'meta_google_fonts'			=> '',
				'meta_custom_fonts'			=> '',
				'meta_text_color'			=> '#8d8ea3',
				
				'carousel_loop'				=> 'no',
				'carousel_autoplay'			=> 'no',
				'hide_arrow_navigation'		=> 'yes',
				'arrows_style'				=> 'arrows_style1',
				'arrows_color'				=> '#000000',
				'arrows_bg'					=> '#ffffff',
				'bullet_navigation'			=> 'no',
				'bullet_navigation_style'	=> 'dots_style1',
				'bullet_bg'					=> '#000000',
				
				
				'class'						=> '',
				'data_animation'			=> 'No Animation',
				'data_delay'				=> '500',
				
			), $atts));
	ob_start();	
	global $post;
	
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

	static $c = 1;
	$uniqid = uniqid(rand());
	$element_id = 'zolo_posttype_id_'.$uniqid;
	
	
	

	$key = $color_scheme;
	if($color_scheme == 'design_your_own'){
		$background_color_scheme = 'background:'.$button_bg_color.';';
	}else{
		$background_color_scheme = apcore_shortcodes_background_color_scheme($key);
	}

// Title Typo
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
	$button_options = _zolo_parse_text_shortcode_params($button_font_options, 'zolo_button_text', $button_google_fonts, $button_custom_fonts);
	$category_options = _zolo_parse_text_shortcode_params($category_font_options, 'zolo_posttype_category_text', $category_google_fonts, $category_custom_fonts);
	$meta_options = _zolo_parse_text_shortcode_params($meta_font_options, '', $meta_google_fonts, $meta_custom_fonts);

if($carousel_loop == 'yes'){$carousel_loop_val = 'true';}else{$carousel_loop_val = 'false';}
if($carousel_autoplay == 'yes'){$carousel_autoplay_val = 'true';}else{$carousel_autoplay_val = 'false';}
if($hide_arrow_navigation == 'yes'){$arrow_navigation_val = 'true';}else{$arrow_navigation_val = 'false';}
if($bullet_navigation == 'yes'){$bullet_navigation_val = 'true';}else{$bullet_navigation_val = 'false';}

// settings
$options_array = array(
	'class'                     => 'owl-carousel zolo_owl_slider '.$animatedclass,
	// General
	//'data-slide-type'           => $style,
	'data-margin'               => 0,
	'data-slide-by'             => 1,
	'data-loop'                 => $carousel_loop_val,
	'data-lazy-load'            => false,
	'data-stage-padding'        => 0,
	'data-auto-height'			=> 0,
	'data-auto-width'           => 0,
	// Navigation
	'data-nav'                  => $arrow_navigation_val,
	'data-dots'                 => $bullet_navigation_val,
	'data-dots-container'		=>	0,
	'data-nav-container'		=>	0,
	// Autoplay
	'data-autoplay'             => $carousel_autoplay_val,
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
	
	'data-animation'			=> $data_animation,
	'data-delay'				=> $data_delay,
	
);

 if($image_overlay == 'yes'){
	 $image_overlay = 'image_overlay_yes';
 }else{
	 $image_overlay = '';
	 }
?>
<!--Code Start-->
<?php 
if ($category!=="all" && $category!=="") {
	query_posts( 'category_name='.$category.'&post_type='.$custom_post_type.'&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
}else{
	query_posts( 'post_type='.$custom_post_type.'&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
}
?>

<div id="<?php echo $element_id;?>" class="zolo_custom_posttype_carousel_wrap <?php echo 'zolo_custom_'.$style.' '.$bullet_navigation_style.' '.$arrows_style.' '.$image_overlay;?>">
  <div class="zolo_custom_posttype_row">
    <div <?php echo array_to_data( $options_array ); ?>>
      <?php while (have_posts()) : the_post(); ?>
      <?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	if($thumb) {
		$post_thumb = $thumb['0'];
	} 
	?>
      
      <!--Post slide Start-->
      
      <div class="zolo_posttype_slide">
        <?php if($style == 'posttype_style1'){?>
        <div class="zolo_posttype_slide_box">
          <div class="zolo_posttype_slide_content">
            <div class="zolo_posttype_thumbnail"> <img src="<?php echo $post_thumb;?>" alt=""> </div>
            <div class="zolo_posttype_des_area">
              <div class="zolo_posttype_title_des"> <a href="<?php the_permalink(); ?>" class="zolo_posttype_new_title">
                <?php //Title
     echo '<'.$title_options['tag']. ' class="entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
                <?php the_title();?>
                <?php echo '</'. $title_options['tag'].'>';?> </a>
                <?php //Description
		if (get_the_content() != ''){
    	echo '<span class="zolo_posttype_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
                <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
                <?php echo '</span>';}?> </div>
              <?php //button_text
    if (!empty($button_text)) {?>
              <a class="zolo_readmore_button <?php echo $button_style;?>" href="<?php the_permalink(); ?>"><span class="zolo_readmore_button_text" <?php echo $button_options['style'];?>><?php echo esc_html($button_text);?> <span class="zolo_arrow"><i class="icon-arrows-slim-right"></i></span></span></a>
              <?php }?>
            </div>
          </div>
        </div>
        <?php }else if($style == 'posttype_style2'){?>
        <div class="zolo_posttype_slide_box">
          <div class="zolo_posttype_slide_content">
            <div class="zolo_posttype_des_area">
              <div class="zolo_posttype_title_des"> <?php echo '<div class="zolo_posttype_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?> <a href="<?php the_permalink(); ?>" class="zolo_posttype_new_title">
                <?php //Title
     echo '<'.$title_options['tag']. ' class="entry-title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
                <?php the_title();?>
                <?php echo '</'. $title_options['tag'].'>';?> </a>
                <?php //Description
		if (get_the_content() != ''){
    	echo '<span class="zolo_posttype_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
                <?php $content = wp_trim_words( get_the_content(), $excerpt_length, '' );
    	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
                <?php echo '</span>';}?> </div>
              <span class="zolo_posttype_meta" <?php echo $meta_options['style'];?> ><span class="posttype_date"><span class="icon-basic-chronometer"></span>
              <?php $post_date = get_the_date( 'F j, Y' ); echo $post_date;?>
              </span><span class="zolo_arrow"><i class="icon-arrows-slim-right"></i></span></span> </div>
          </div>
        </div>
        <?php }?>
      </div>
      
      <!--Post Slide End-->
      
      <?php endwhile;?>
    </div>
  </div>
</div>
<?php 
$shortcode_css = '';
if($style == 'posttype_style1'){

if($bullet_navigation == 'yes'){
	$bottom_position = $column_gap + 79;
	}else{
		$bottom_position = $column_gap + 25;
		}
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-nav button{ top:'.$column_gap.'px; bottom:'.$bottom_position.'px;}';

//box_shadow
 if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap.zolo_custom_posttype_style1 .zolo_posttype_slide_box .zolo_posttype_thumbnail{'.$box_shadow.'}';
}

//border_radius
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap.zolo_custom_posttype_style1 .zolo_posttype_slide_box .zolo_posttype_thumbnail{
	-webkit-border-radius:'.$border_radius.'px;
	-moz-border-radius:'.$border_radius.'px;
	-o-border-radius:'.$border_radius.'px;
	-ms-border-radius:'.$border_radius.'px;
	border-radius:'.$border_radius.'px;
	}';

//swing
if($box_swing == 'yes'){
	$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide_box:hover{ transform:translateY(-10px);-moz-transform:translateY(-10px);-webkit-transform:translateY(-10px);-ms-transform:translateY(-10px);-o-transform:translateY(-10px);}';
}

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide{padding:'.$column_gap.'px;}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_custom_posttype_row{margin:0 '.'-'.$column_gap.'px; text-align:'.$text_alignment.';}';

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_readmore_button{color:'.$button_text_color.';'.$background_color_scheme.'}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_readmore_button .zolo_arrow:after{background:'.$button_text_color.';}';

if($button_style == 'round'){
	$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_readmore_button{-moz-border-radius:5em;-ms-border-radius:5em;-webkit-border-radius:5em;-o-border-radius:5em;border-radius:5em;}';
}else if($button_style == 'rounded'){
	$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_readmore_button{-moz-border-radius:6px;-ms-border-radius:6px;-webkit-border-radius:6px;-o-border-radius:6px;border-radius:6px;}';
}

}else if($style == 'posttype_style2'){

if($bullet_navigation == 'yes'){
	$bottom_position = 55;
	}else{
		$bottom_position = 0;
}
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-nav button{ top:0px; bottom:'.$bottom_position.'px;}';

//box_shadow
 if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide:hover,
	#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-carousel .owl-stage{'.$box_shadow.'}';
}

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-carousel .owl-stage{ background:'.$box_background_color.';}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide .zolo_posttype_slide_box{padding:0 '.$column_gap.'px;}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide .zolo_posttype_slide_box:after{background:'.$box_separator_color.';}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide:after{border:4px solid '.$box_separator_color.';}';

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_taxonomy_box a{color:'.$category_text_color.';'.$background_color_scheme.'}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide:hover .zolo_posttype_new_title .entry-title{color:'.$title_hover_color.'!important;}';

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide .zolo_posttype_meta{color:'.$meta_text_color.';}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_meta .zolo_arrow:after{background:'.$meta_text_color.';}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .zolo_posttype_slide .zolo_posttype_title_des{ min-height:'.$box_min_height.'px;}';
}

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-dot span:after{ box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-dot.active span:after{ box-shadow: 0 0 0 1px '.$bullet_bg.' inset;}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap.dots_style3 .owl-dot.active span:after{ background:'.$bullet_bg.';}';

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-nav button span:after{background:'.$arrows_color.';}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-nav button span{color:'.$arrows_color.';}';
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap.arrows_style4 .owl-nav button.owl-prev span:before{border-color: transparent '.$arrows_color.' transparent transparent;}';

$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap.arrows_style4 .owl-nav button.owl-next span:before{border-color: transparent transparent transparent '.$arrows_color.';}';

if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$shortcode_css .= '#'.$element_id.'.zolo_custom_posttype_carousel_wrap .owl-nav button span{background:'.$arrows_bg.';}';
}
apcore_save_plugin_dyn_styles( $shortcode_css );
?>
<?php
		$c++;
		wp_reset_query();
		$demolp_output = ob_get_clean();
		return $demolp_output;
		}
	}
	
	$Apress_Post_Type_Carousel_Module = new Apress_Post_Type_Carousel_Module;
}
