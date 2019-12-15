<?php 
/*-----------------------------------------------------------------------------------*/
/* New Image Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }


if(!class_exists('Apress_Imagebox_New_Module')) {
	class Apress_Imagebox_New_Module {

function __construct() {
		add_action( 'init', array( &$this, 'apress_imagebox_new_init' ) );
		add_shortcode( 'apress_imagebox_new', array( &$this, 'apress_imagebox_new' ) );
	}
	
	
function apress_imagebox_new_init() {
	
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
	
if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Image Box New", 'apcore'),
					"base"			=> "apress_imagebox_new",
					"weight"		=> 70,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Beautiful New Image Box", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-imagebox.png",
					"params"		=> array(						
						
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Style', 'apcore' ),
							'param_name'  => 'style',
							'simple_mode' => false,
							'options'     => array(
								'new_imagebox_style1' => array(
									'tooltip' => esc_attr__('Image Box Style1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style1.jpg'
								),
								'new_imagebox_style2' => array(
									'tooltip' => esc_attr__('Image Box Style2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style2.jpg'
								),
								'new_imagebox_style3' => array(
									'tooltip' => esc_attr__('Image Box Style3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style3.jpg'
								),
								'new_imagebox_style4' => array(
									'tooltip' => esc_attr__('Image Box Style4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style4.jpg'
								),
								'new_imagebox_style5' => array(
									'tooltip' => esc_attr__('Image Box Style5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style5.jpg'
								),
								'new_imagebox_style6' => array(
									'tooltip' => esc_attr__('Image Box Style6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style6.jpg'
								),
								
								'new_imagebox_style7' => array(
									'tooltip' => esc_attr__('Image Box Style7','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style7.jpg'
								),
								'new_imagebox_style8' => array(
									'tooltip' => esc_attr__('Image Box Style8','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style8.jpg'
								),
								'new_imagebox_style9' => array(
									'tooltip' => esc_attr__('Image Box Style9','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style9.jpg'
								),
								'new_imagebox_style10' => array(
									'tooltip' => esc_attr__('Image Box Style10','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style10.jpg'
								),
								'new_imagebox_style11' => array(
									'tooltip' => esc_attr__('Image Box Style11','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style11.jpg'
								),
								'new_imagebox_style12' => array(
									'tooltip' => esc_attr__('Image Box Style12','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style12.jpg'
								),
								'new_imagebox_style13' => array(
									'tooltip' => esc_attr__('Image Box Style13','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style13.jpg'
								),
								'new_imagebox_style14' => array(
									'tooltip' => esc_attr__('Image Box Style14','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style14.jpg'
								),
								'new_imagebox_style15' => array(
									'tooltip' => esc_attr__('Image Box Style15','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/new_imagebox/new_imagebox_style15.jpg'
								),
							),					
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Post Type Enable', 'apcore'),
							'param_name'		=> 'custom_post_type_enable',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') 	=> 'no',
							),
						),
						array(
							"type"				=> "dropdown",
							"heading"			=> __("Post Type", "apcore"),
							"param_name"		=> "custom_post_type",
							"admin_label"		=> true,
							"value"				=> $post_type_options,
							'save_always'		=> true,
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Categories", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $categories_options,
							'save_always'		=> true,
							"description"		=> __("Please select the categories you would like to display for your POSTS. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore"),
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Number of Post",'apcore'),
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),
							"param_name"		=> "num",
							'value'				=> '4', 
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Column per row",'apcore'),
							"param_name"	=> "post_column",
							"value"			=> array(
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
								),
							'std' => '3',
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Gap Between Column",'apcore'),
							'param_name'=> 'column_gap',
							'value'		=> '15',
							'suffix'	=> 'px',
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Taxonomy Name",'apcore'),
							"description"		=> __("To show category Please enter taxonomy name for the custom type.",'apcore'),
							"param_name"		=> "taxonomy_name",
							'value'				=> '', 
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Category Background Color Scheme",'apcore'),
							"param_name"	=> "taxonomy_bg_color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore') => "gradient_scheme1",
								__("Gradient Scheme 2",'apcore') => "gradient_scheme2",
								__("Gradient Scheme 3",'apcore') => "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'yes'),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Category Background Color",'apcore'),
							"param_name"	=> "taxonomy_bg_color",
							"value"			=> '#549ffc',
							'dependency'	=> array('element' => 'taxonomy_bg_color_scheme', 'value' => array('design_your_own')),
						),
						
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image", "apcore"),
							"param_name"		=> "image",
							"value"				=> "",
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'no'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Image Overlay Color",'apcore'),
							"param_name"		=> "image_overlay_color",
							'value'				=> '#000000',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency' => array( 'element' => 'style', 'value' => 'new_imagebox_style1'),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Featured Text",'apcore'),
							"param_name"		=> "featured_text",
							"value"				=> 'Featured Text',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style1', 'new_imagebox_style15')),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Featured Text Background Color",'apcore'),
							"param_name"		=> "featured_text_bg_color",
							'value'				=> '#549ffc',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency' => array( 'element' => 'style', 'value' => 'new_imagebox_style1'),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Image Overlay Color Scheme",'apcore'),
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
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style2', 'new_imagebox_style3', 'new_imagebox_style13', 'new_imagebox_style14')),
							
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Image Overlay Color",'apcore'),
							"param_name"	=> "image_overlay_color2",
							"value"			=> '#000000',
							'dependency'	=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Opacity",'apcore'),
							'param_name'=> 'opacity',
							"value" => 0.7,
							"min" => 0.0,
							"max" => 1.0,
							"step" => 0.1,
							'suffix'	=> 'px',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style2', 'new_imagebox_style3', 'new_imagebox_style13', 'new_imagebox_style14')),
						),
						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Title",'apcore'),
							"param_name"		=> "title",
							"value"				=> 'Your Title',
							"admin_label"		=> true,
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'no'),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Title Underline Height",'apcore'),
							'param_name'=> 'underline_height',
							"value" => 2,
							"step" => 1,
							'suffix'=> 'px',
							'dependency' => array( 'element' => 'style', 'value' => 'new_imagebox_style2'),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Title Underline Color",'apcore'),
							"param_name"	=> "underline_color",
							"value"			=> '#ffffff',
							'dependency' => array( 'element' => 'style', 'value' => 'new_imagebox_style2'),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Title Hover Underline Color",'apcore'),

							"param_name"	=> "underline_color_h",
							"value"			=> '#549ffc',
							'dependency' => array( 'element' => 'style', 'value' => 'new_imagebox_style2'),
						),
						
						array(
							"type"				=> "textarea",
							"class"				=> "",
							"heading"			=> __("Description",'apcore'),
							"param_name"		=> "description",
							"value"				=> 'Your description text',
							"admin_label"		=> true,
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'no'),
						),
						array(
							'type'				=> 'textfield',
							'heading'			=> esc_html__('Button Text', 'apcore'),
							'param_name'		=> 'button_text',
							'value'				=> esc_html__('Read More','apcore'),
							'admin_label'		=> true,
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style13', 'new_imagebox_style14')),
						),
						array(
							"type"				=> "vc_link",
							"class"				=> "",
							"heading"			=> __("Link",'apcore'),
							"param_name"		=> "box_link",
							"description"		=> __("http://example.com",'apcore'),
							'dependency' => array( 'element' => 'custom_post_type_enable', 'value' => 'no'),
							
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Text Alignment', 'apcore'),
							'param_name'		=> 'text_alignment',
							'value'				=> 'left',
							'options'			=> array(
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Center', 'apcore')	=> 'center',
								esc_html__('Right', 'apcore')	=> 'right',
							),
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style4', 'new_imagebox_style7', 'new_imagebox_style8', 'new_imagebox_style9', 'new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style12')),
						),
						array(
							"type"				=> "dropdown",
							"heading"			=> __("Height Type",'apcore'),
							"param_name"		=> "height_type",
							'value'				=> array(
								__("Auto Height",'apcore') => "auto_height",
								__("Custom Height",'apcore') => "custom_ceight",
							),
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Min Height",'apcore'),
							'param_name'=> 'min_height',
							'value'		=> '300',
							'suffix'	=> 'px',
							'dependency' => array( 'element' => 'height_type', 'value' => 'custom_ceight'),
						),
						 array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box Background Color",'apcore'),
							'param_name'		=> "box_background_color",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style4','new_imagebox_style5', 'new_imagebox_style6', 'new_imagebox_style8', 'new_imagebox_style9', 'new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style13', 'new_imagebox_style14')),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box Border Color",'apcore'),
							'param_name'		=> "box_border_color",
							"value"				=> '#eeeeee',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style4','new_imagebox_style5', 'new_imagebox_style6', 'new_imagebox_style8', 'new_imagebox_style9', 'new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style13', 'new_imagebox_style15')),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Box Hover Border Color",'apcore'),
							'param_name'		=> "box_hover_border_color",
							"value"				=> '#deefc5',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style15')),
						),
						
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Highlight Bar Height",'apcore'),
							'param_name'=> 'highlight_bar_height',
							"value" => 3,
							"step" => 1,
							'suffix'=> 'px',
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style8', 'new_imagebox_style9', 'new_imagebox_style14' )),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Highlight Color",'apcore'),
							"param_name"	=> "highlight_color",
							"value"			=> '#e5e5e5',
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style8', 'new_imagebox_style9', 'new_imagebox_style10', 'new_imagebox_style12', 'new_imagebox_style14')),
						),
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Highlight Hover Color Scheme",'apcore'),
							"param_name"	=> "highlight_hover_color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore') => "gradient_scheme1",
								__("Gradient Scheme 2",'apcore') => "gradient_scheme2",
								__("Gradient Scheme 3",'apcore') => "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style8', 'new_imagebox_style9', 'new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style14')),
						),
						array(
							"type"			=> "colorpicker",
							"heading"		=> __("Highlight Hover Color",'apcore'),
							"param_name"	=> "highlight_hover_color",
							"value"			=> '#549ffc',
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
							'dependency'	=> array('element' => 'highlight_hover_color_scheme', 'value' => array('design_your_own')),
						),
						
						array(
						   'type'    	=> 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
						),
						array(
							'type' 		=> 'zolo_number',
							'heading' 	=> __("Border Radius",'apcore'),
							'param_name'=> 'border_radius',
							'value'		=> '0',
							'suffix'	=> 'px',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style1','new_imagebox_style2', 'new_imagebox_style3', 'new_imagebox_style4','new_imagebox_style5', 'new_imagebox_style6', 'new_imagebox_style7', 'new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style12')),
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
							"doc_link"			=> APCORE_DOCUMENTATION_URL,
							"video_link"		=> "https://youtu.be/4JYsV-7IPME",
						),	
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Featured Text Style', 'apcore'),
							'param_name'		=> 'featured_text_heading',
							'group'				=> esc_html__('Featured Style', 'apcore'),
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style1', 'new_imagebox_style15')),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'featured_text_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'font_size',							
									'line_height',
									'letter_spacing',
									'font_style',
									'color' => '#ffffff',
								),
							),
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style1', 'new_imagebox_style15')),
							'group'			=> esc_html__('Featured Style', 'apcore'),
						),		
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'featured_text_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style1', 'new_imagebox_style15')),
							'group'				=> esc_html__('Featured Style', 'apcore'),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'featured_text_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'featured_text_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Featured Style', 'apcore'),
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
							"type"				=> "colorpicker",
							"heading"			=> __("Title Hover Color",'apcore'),
							'param_name'		=> "title_hover_color",
							"value"				=> '#93cb40',
							'dependency' => array( 'element' => 'style', 'value' => array('new_imagebox_style15')),
							'group'				=> esc_html__('Title Style', 'apcore'),
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
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style13', 'new_imagebox_style14')),
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
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style13', 'new_imagebox_style14')),
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
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style13', 'new_imagebox_style14')),
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
							"value"				=> '#282828',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style11', 'new_imagebox_style13', 'new_imagebox_style14')),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Hover Text Color",'apcore'),
							'param_name'		=> "button_text_color_h",
							"value"				=> '#ffffff',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style13', 'new_imagebox_style14')),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),	

						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Category Style', 'apcore'),
							'param_name'		=> 'category_heading',
							'dependency'		=> array('element' => 'custom_post_type_enable', 'value' => 'yes'),
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
							'dependency'		=> array('element' => 'custom_post_type_enable', 'value' => 'yes'),
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
							'dependency'		=> array('element' => 'custom_post_type_enable', 'value' => 'yes'),
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
							'dependency'		=> array('element' => 'custom_post_type_enable', 'value' => 'yes'),
							'group'				=> esc_html__('Category Style', 'apcore'),
						),
	
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Icon Button Enable', 'apcore'),
							'param_name'		=> 'icon_button_enable',
							'value'				=> 'on',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-4 crum_vc',
							'group'				=> esc_html__('Icon Button', 'apcore'),
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style2', 'new_imagebox_style3', 'new_imagebox_style4', 'new_imagebox_style5', 'new_imagebox_style6', 'new_imagebox_style7', 'new_imagebox_style8', 'new_imagebox_style9')),
						),
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Icon Style', 'apcore' ),
							'param_name'  => 'icon_button_style',
							'simple_mode' => false,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Style1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Style3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style3.jpg'
								),
								'style4' => array(
									'tooltip' => esc_attr__('Style4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style4.jpg'
								),
								'style5' => array(
									'tooltip' => esc_attr__('Style5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style5.jpg'
								),
								'style6' => array(
									'tooltip' => esc_attr__('Style6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style6.jpg'
								),
								'style7' => array(
									'tooltip' => esc_attr__('Style7','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style7.jpg'
								),
								'style8' => array(
									'tooltip' => esc_attr__('Style8','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style8.jpg'
								),
								'style9' => array(
									'tooltip' => esc_attr__('Style9','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style9.jpg'
								),
								'style10' => array(
									'tooltip' => esc_attr__('Style10','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/icon_button/iconbutton_style10.jpg'
								),
							),
							'dependency'		=> array('element' => 'icon_button_enable', 'value' => 'yes'),
							'group'				=> esc_html__('Icon Button', 'apcore'),					
						),
						 array(
							"type"				=> "colorpicker",
							"heading"			=> __("Icon Color",'apcore'),
							'param_name'		=> "icon_color",
							"value"				=> '#e0e0e0',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'icon_button_style', 'value' => array('style1', 'style2', 'style3', 'style5', 'style7', 'style9')),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Icon Hover Color",'apcore'),
							'param_name'		=> "icon_hover_color",
							"value"				=> '#e0e0e0',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'icon_button_style', 'value' => array('style1', 'style2', 'style3', 'style5', 'style7', 'style9')),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Background Color",'apcore'),
							'param_name'		=> "background_color",
							"value"				=> '#0000d6',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'icon_button_style', 'value' => array('style3', 'style5', 'style7', 'style9')),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Hover Background Color",'apcore'),
							'param_name'		=> "hover_background_color",
							"value"				=> '#0000d6',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'icon_button_style', 'value' => array('style3', 'style5', 'style7', 'style9')),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						 array(
							"type"				=> "colorpicker",
							"heading"			=> __("Border Color",'apcore'),
							'param_name'		=> "border_color",
							"value"				=> '#0000d6',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'icon_button_style', 'value' => array('style4', 'style6', 'style8', 'style10')),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Hover Border Color",'apcore'),
							'param_name'		=> "hover_border_color",
							"value"				=> '#0000d6',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'dependency'		=> array('element' => 'icon_button_style', 'value' => array('style4', 'style6', 'style8', 'style10')),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Alignment', 'apcore'),
							'param_name'		=> 'button_alignment',
							'value'				=> 'inline',
							'options'			=> array(
								esc_html__('Inline', 'apcore')	=> 'inline',
								esc_html__('Left', 'apcore') 	=> 'left',
								esc_html__('Right', 'apcore')	=> 'right',
								esc_html__('Center', 'apcore')	=> 'center'
							),
							'dependency'		=> array('element' => 'icon_button_enable', 'value' => 'yes'),
							'group'				=> esc_html__('Icon Button', 'apcore'),
						),
						array(
							'type'				=> 'dropdown',
							'heading'			=> __( 'Icon library', 'apcore' ),
							'value'				=> array(
								__( 'Font Awesome', 'apcore' )	=> 'fontawesome',
								__( 'Open Iconic', 'apcore' )	=> 'openiconic',
								__( 'Typicons', 'apcore' )		=> 'typicons',
								__( 'Entypo', 'apcore' )		=> 'entypo',
								__( 'Linecons', 'apcore' )		=> 'linecons',
								__( 'Mono Social', 'apcore' )	=> 'monosocial',
								__( 'Linea', 'apcore' ) 	=> 'linea',
							),
							'save_always' 		=> true,
							'param_name' 		=> 'icon_family',
							'description' 		=> __( 'Select icon library.', 'apcore' ),
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style11')),
							'group'				=> esc_html__('Icon', 'apcore'),
						),
						array(
							'type'				=> 'iconpicker',
							'heading'			=> __('Icon', 'apcore'),
							'param_name'		=> 'icon_fontawesome',
							'value'				=> 'fa fa-adjust',
							'settings'			=> array( 'emptyIcon' => false, 'iconsPerPage' => 4000),
							'dependency'		=> array('element' => 'icon_family', 'value' => 'fontawesome'),
							'description'		=> __('Select icon from library.', 'apcore'),
							'group'				=> esc_html__('Icon', 'apcore'),
						),	
						array(
							'type'				=> 'iconpicker',
							'heading'			=> __( 'Icon', 'apcore' ),
							'param_name'		=> 'icon_openiconic',
							'value'				=> 'vc-oi vc-oi-dial',
							'settings'			=> array('emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000),
							'dependency'		=> array('element' => 'icon_family','value' => 'openiconic'),
							'description'		=> __( 'Select icon from library.', 'apcore' ),
							'group'				=> esc_html__('Icon', 'apcore'),
						),	
						array(
							'type'				=> 'iconpicker',
							'heading'			=> __( 'Icon', 'apcore' ),
							'param_name'		=> 'icon_typicons',
							'value'				=> 'typcn typcn-adjust-brightness',
							'settings'			=> array('emptyIcon' => false,'type' => 'typicons','iconsPerPage' => 4000),
							'dependency'		=> array('element' => 'icon_family','value' => 'typicons'),
							'description'		=> __( 'Select icon from library.', 'apcore'),
							'group'				=> esc_html__('Icon', 'apcore'),
						),
						array(
							'type' 				=> 'iconpicker',
							'heading' 			=> __( 'Icon', 'apcore' ),
							'param_name' 		=> 'icon_entypo',
							'value' 			=> 'entypo-icon entypo-icon-note',
							'settings' 			=> array('emptyIcon' => false,'type' => 'entypo','iconsPerPage' => 4000),
							'dependency' 		=> array('element' => 'icon_family','value' => 'entypo'),
							'description' 		=> __( 'Select icon from library.', 'apcore' ),
							'group'				=> esc_html__('Icon', 'apcore'),
						),
						array(
							'type' 				=> 'iconpicker',
							'heading' 			=> __( 'Icon', 'apcore' ),
							'param_name' 		=> 'icon_linecons',
							'value' 			=> 'vc_li vc_li-heart',
							'settings' 			=> array('emptyIcon' => false,'type' => 'linecons','iconsPerPage' => 4000),
							'dependency' 		=> array('element' => 'icon_family','value' => 'linecons'),
							'description' 		=> __( 'Select icon from library.', 'apcore' ),
							'group'				=> esc_html__('Icon', 'apcore'),
						),	
						array(
							'type'				=> 'iconpicker',
							'heading'			=> __( 'Icon', 'apcore' ),
							'param_name'		=> 'icon_monosocial',
							'value'				=> 'vc-mono vc-mono-fivehundredpx',
							'settings'			=> array('emptyIcon' => false,'type' => 'monosocial','iconsPerPage' => 4000),
							'dependency'		=> array('element' => 'icon_family','value' => 'monosocial'),
							'description'		=> __( 'Select icon from library.', 'apcore' ),
							'group'				=> esc_html__('Icon', 'apcore'),
						),	
						array(
							'type'				=> 'iconpicker',
							'heading'			=> __('Icon', 'apcore'),
							'param_name'		=> 'icon_linea',
							'value'				=> 'icon-basic-heart',
							'settings'			=> array( 'emptyIcon' => true, 'type' => 'linea', 'iconsPerPage' => 4000),
							'dependency'		=> array('element' => 'icon_family', 'value' => 'linea'),
							'description'		=> __('Select icon from library.', 'apcore'),
							'group'				=> esc_html__( 'Icon', 'apcore' ),
						),
						array(
							'type' 				=> 'zolo_number',
							'heading'			=> esc_html__('Icon size','apcore'),
							'param_name'		=> 'icon_size',
							'value'				=> '18',
							'step'				=> '1',
							'suffix'			=> 'px',
							'dependency'		=> array('element' => 'style', 'value' => array('new_imagebox_style10', 'new_imagebox_style11')),
							'group'				=> esc_html__('Icon', 'apcore'),
						),

					),
					) );		
		
			}		
			
}

function apress_imagebox_new( $atts, $content=null ){
	
	extract(shortcode_atts(array(
				'style'						=> 'new_imagebox_style1',
				'custom_post_type_enable'	=> 'no',
				'custom_post_type'			=> '',
				'category' 					=> '',
				'num' 						=> '4',
				'taxonomy_name'				=> '',
				'taxonomy_bg_color_scheme'	=> 'primary_color_scheme',
				'taxonomy_bg_color'			=> '#549ffc',
				'image' 					=> '',
				'image_overlay_color'		=>'#000000',
				'featured_text' 			=>'Featured Text',
				'featured_text_bg_color'	=>'#549ffc',
				'color_scheme'				=>'primary_color_scheme',
				'image_overlay_color2'		=>'#000000',
				'opacity'					=>'0.7',
				'underline_height'			=>'2',
				'underline_color'			=>'#ffffff',
				'underline_color_h'			=>'#549ffc',
				'box_background_color'		=>'#ffffff',
				'box_border_color'			=>'#eeeeee',
				'box_hover_border_color'	=>'#deefc5',
				'title_hover_color'			=>'#93cb40',
				'title' 					=>'Your Title',
				'description' 				=>'Your description text',
				'box_link' 					=>'',
				'text_alignment' 			=>'left',
				'height_type'				=>'auto_height',
				'min_height'				=>'300',
				'box_shadow'				=>'',
				'border_radius'				=>'0',
				'box_swing'					=>'no',
				'title_font_options'		=> '',
				'title_google_fonts'		=> '',
				'title_custom_fonts'		=> '',
				'featured_text_font_options'=> '',
				'featured_text_google_fonts'=> '',
				'featured_text_custom_fonts'=> '',
				
				'description_font_options'	=> '',
				'description_google_fonts'	=> '',
				'description_custom_fonts'	=> '',
				
				'icon_button_enable'		=> 'no',
				'icon_button_style'			=> 'style1',
				'icon_color'				=> '#e0e0e0',
				'icon_hover_color'			=> '#e0e0e0',
				'background_color'			=> '#0000d6',
				'hover_background_color'	=> '#0000d6',
				'border_color'				=> '#0000d6',
				'hover_border_color'		=> '#0000d6',
				'button_alignment'			=> 'inline',
				
				'highlight_bar_height'		=> '3',
				'highlight_color'			=> '#e5e5e5',
				'highlight_hover_color_scheme'	=> 'primary_color_scheme',
				'highlight_hover_color'		=> '#549ffc',
				
				'icon_family'				=> 'fontawesome',
				'icon_fontawesome'			=> 'fa fa-adjust',
				'icon_openiconic'			=> 'vc-oi vc-oi-dial',
				'icon_typicons'				=> 'typcn typcn-adjust-brightness',
				'icon_entypo'				=> 'entypo-icon entypo-icon-note',
				'icon_linecons'				=> 'vc_li vc_li-heart',
				'icon_monosocial'			=> 'vc-mono vc-mono-fivehundredpx',
				'icon_linea'				=> 'icon-basic-heart',
				'icon_size'					=> '18',
				'button_text'				=> 'Read More',
				'button_font_options'		=> '',
				'button_google_fonts'		=> '',
				'button_custom_fonts'		=> '',
				'button_text_color'			=> '#282828',
				'button_text_color_h'		=> '#ffffff',
				
				'category_font_options'		=> '',
				'category_google_fonts'		=> '',
				'category_custom_fonts'		=> '',
				'category_text_color'		=> '#ffffff',
				
				'post_column'					=> '3',
				'column_gap'				=> '15',
				
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
	
	//icon
	switch($icon_family) {
		case 'fontawesome':
			$icon = $icon_fontawesome;
			break;
		case 'openiconic':
			$icon = $icon_openiconic;
			break;
		case 'typicons':
			$icon = $icon_typicons;
			break;
		case 'entypo':
			$icon = $icon_entypo;
			break;
		case 'linecons':
			$icon = $icon_linecons;
			break;
		case 'monosocial':
			$icon = $icon_monosocial;
			break;
		case 'linea':
			$icon = $icon_linea;
			break;	
		case 'default_arrow':
			$icon = 'icon-button-arrow';
			break;
		default:
			$icon = '';
			break;
	}
	if(!empty($icon_family) && $icon_family != 'none') {
		$circle_icon = $icon;
	} 
	else {
		$circle_icon = null;
	}
	// Enqueue needed icon font.
	vc_icon_element_fonts_enqueue( $icon_family );
	
	//regular(grad) linea
	if(!empty($icon_family) && $icon_family == 'linea') {
		wp_enqueue_style('zt-linea'); 
	}

	
	$uniqid = uniqid(rand());
	$element_id = 'zolo_imagebox_new_'.$uniqid;
	
	$zolo_imagebox_icon_button_id = 'zolo_imagebox_icon_button_'.$uniqid;
	
	//Image
	$img = wp_get_attachment_image_src($image,'full');
	$image = $img[0];
	//link
	$box_link = vc_build_link( $box_link );
	
	if($custom_post_type_enable == 'yes'){
		$key = $taxonomy_bg_color_scheme;
		
		if($taxonomy_bg_color_scheme == 'design_your_own'){
			$taxonomy_background_color_scheme = 'background:'.$taxonomy_bg_color.';';
		}else{
			$taxonomy_background_color_scheme = apcore_shortcodes_background_color_scheme($key);
		}
	}
	
	if($style == 'new_imagebox_style2' || $style == 'new_imagebox_style3' || $style == 'new_imagebox_style13' || $style == 'new_imagebox_style14'){
		$key = $color_scheme;
		if($color_scheme == 'design_your_own'){
			$background_color_scheme = 'background:'.$image_overlay_color2.';';
		}else{
			$background_color_scheme = apcore_shortcodes_background_color_scheme($key);
		}
	}
	
	if($style == 'new_imagebox_style8' || $style == 'new_imagebox_style9' || $style == 'new_imagebox_style10' || $style == 'new_imagebox_style11' || $style == 'new_imagebox_style14'){
		$key = $highlight_hover_color_scheme;
		if($highlight_hover_color_scheme == 'design_your_own'){
			$highlight_hover_color_schem = 'background:'.$highlight_hover_color.';';
		}else{
			$highlight_hover_color_schem = apcore_shortcodes_background_color_scheme($key);
		}
	}
$button_icon = '';

if($icon_button_style == 'style1' || $icon_button_style == 'style2'){
	$button_style = 'button_style_none';
	
}else if($icon_button_style == 'style3' || $icon_button_style == 'style4' || $icon_button_style == 'style7' || $icon_button_style == 'style8'){
	$button_style = 'button_style_circle';

}else if($icon_button_style == 'style5' || $icon_button_style == 'style6' || $icon_button_style == 'style9' || $icon_button_style == 'style10'){
	$button_style = 'button_style_square';
}

if($icon_button_style == 'style1' || $icon_button_style == 'style7' || $icon_button_style == 'style8' || $icon_button_style == 'style9' || $icon_button_style == 'style10'){
	
	$button_icon ='<span class="zolo_button_icon zolo_arrow_icon"></span>';

}else if($icon_button_style == 'style2' || $icon_button_style == 'style3' || $icon_button_style == 'style4' || $icon_button_style == 'style5' || $icon_button_style == 'style6'){
	$button_icon ='<span class="zolo_button_icon zolo_plus_icon"></span>';
	}


$iconbutton_class = 'zolo_iconbutton_tag iconbutton_'.$icon_button_style.' '.$button_style;


// Title Typo
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$featuredtext_options = _zolo_parse_text_shortcode_params($featured_text_font_options, '', $featured_text_google_fonts, $featured_text_custom_fonts);
	$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
	$button_options = _zolo_parse_text_shortcode_params($button_font_options, 'zolo_button_text', $button_google_fonts, $button_custom_fonts);
	$category_options = _zolo_parse_text_shortcode_params($category_font_options, 'zolo_imagebox_category_text', $category_google_fonts, $category_custom_fonts);

?>
<?php if($custom_post_type_enable == 'no'){?>
<?php if($style == 'new_imagebox_style10' || $style == 'new_imagebox_style11'){?>

<!--Image Box Start-->

<div id="<?php echo $element_id;?>" class="zolo_imagebox_new_wrapper <?php echo $style. ' ' .$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="zolo_imagebox_new_box">
    <?php //Thumbnail
 if($height_type == 'auto_height'){?>
    <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
    <?php }else if($height_type == 'custom_ceight'){?>
    <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
    <?php }?>
    <div class="zolo_imagebox_new_content">
      <div class="zolo_imagebox_new_title_des">
        <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
        <?php echo $title;?> <?php echo '</'. $title_options['tag'].'>';?>
        <?php }?>
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?> </div>
      <?php //button_text
if (!empty($button_text)) {?>
      <a class="zolo_readmore_button" title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>"> <span class="zolo_readmore_button_text" <?php echo $button_options['style'];?>><?php echo esc_html($button_text);?></span> <span class="zolo_readmore_button_icon"><i class="<?php echo $icon;?>"></i></span> </a>
      <?php }?>
    </div>
  </div>
</div>
<!--Image Box End-->

<?php }else if($style == 'new_imagebox_style13' || $style == 'new_imagebox_style14'){?>

<!--Image Box Start-->

<div id="<?php echo $element_id;?>" class="zolo_imagebox_new_wrapper <?php echo $style. ' ' .$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <?php //Thumbnail
	if($height_type == 'auto_height'){
			$min_height_value = 'auto';
		}else{
			$min_height_value = $min_height.'px';
			}?>
  <div class="zolo_imagebox_new_box" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover;">
    <div class="zolo_imagebox_new_content_box">
      <div class="zolo_imagebox_new_content" style="min-height:<?php echo $min_height_value;?>;">
        <div class="zolo_imagebox_new_title_des">
          <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
          <?php echo $title;?> <?php echo '</'. $title_options['tag'].'>';?>
          <?php }?>
          <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
          <?php echo $description;?> <?php echo '</span>'; }?> </div>
        <?php //button_text
if (!empty($button_text)) {?>
        <a class="zolo_readmore_button" title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>"> <span class="zolo_readmore_button_text" <?php echo $button_options['style'];?>><?php echo esc_html($button_text);?></span> </a>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<!--Image Box End-->

<?php }else if($style == 'new_imagebox_style15'){?>

<!--Image Box Start-->
<div id="<?php echo $element_id;?>" class="zolo_imagebox_new_wrapper <?php echo $style. ' ' .$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="zolo_imagebox_new_box">
    <?php //Featured Text
if (!empty($featured_text)) {?>
    <?php echo '<span class="zolo_imagebox_featuredtext' . $featuredtext_options['class'] . '" ' . $featuredtext_options['style'] . '>';?> <?php echo $featured_text;?> <?php echo '</span>';?>
    <?php }?>
    <div class="zolo_imagebox_new_thumbnail_titile">
      <?php if($box_link['url'] != ''){?>
      <a title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>">
      <?php }?>
      <?php //Thumbnail
 if($height_type == 'auto_height'){?>
      <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
      <?php }else if($height_type == 'custom_ceight'){?>
      <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
      <?php }?>
      <?php if($box_link['url'] != ''){?>
      </a>
      <?php }?>
      <?php if($box_link['url'] != ''){?>
      <a title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>">
      <?php }?>
      <?php //Title
		if(!empty($title)){
		 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
      <?php echo $title;?> <?php echo '<span class="zolo_arrow"><i class="fa fa-angle-right"></i></span></'. $title_options['tag'].'>';?>
      <?php }?>
      <?php if($box_link['url'] != ''){?>
      </a>
      <?php }?>
    </div>
    <div class="zolo_imagebox_new_content">
      <div class="zolo_imagebox_new_title_des">
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?> </div>
    </div>
  </div>
</div>
<!--Image Box End-->

<?php }else{?>

<!--Image Box Start-->
<div id="<?php echo $element_id;?>" class="zolo_imagebox_new_wrapper <?php echo $style. ' ' .$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <?php if($box_link['url'] != ''){?>
  <a title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>">
  <?php }?>
  <div class="zolo_imagebox_new_box">
    <?php if($style == 'new_imagebox_style1' || $style == 'new_imagebox_style4' || $style == 'new_imagebox_style5' || $style == 'new_imagebox_style7' || $style == 'new_imagebox_style9'){
//Thumbnail
if($image != ''){
 if($height_type == 'auto_height'){?>
    <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
    <?php }else if($height_type == 'custom_ceight'){?>
    <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
    <?php } }?>
    <div class="zolo_imagebox_new_content">
      <?php //Website Name
if($style == 'new_imagebox_style1'){
if (!empty($featured_text)) {?>
      <?php echo '<span class="zolo_imagebox_featuredtext' . $featuredtext_options['class'] . '" ' . $featuredtext_options['style'] . '>';?> <?php echo $featured_text;?> <?php echo '</span>';?>
      <?php }
}?>
      <div class="zolo_imagebox_new_title_des">
        <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
        <?php echo $title;?> <?php echo '</'. $title_options['tag'].'>';?>
        <?php }?>
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?>
        <?php if($icon_button_enable == 'yes'){
	$output = '<div id="'. $zolo_imagebox_icon_button_id .'" class="zolo_imagebox_icon_button_element alignment_'.$button_alignment.'">';
		$output .=  '<span class="'.$iconbutton_class.'">' . $button_icon . '</span>';
	$output .= '</div>';
	echo $output;
}
?>
      </div>
    </div>
    <?php }else if($style == 'new_imagebox_style2' || $style == 'new_imagebox_style3'){ ?>
    <?php //Thumbnail
 if($height_type == 'auto_height'){?>
    <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
    <?php }else if($height_type == 'custom_ceight'){?>
    <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
    <?php }?>
    <div class="zolo_imagebox_new_content">
      <div class="zolo_imagebox_new_title_des">
        <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
        <?php echo $title;?> <?php echo '</'. $title_options['tag'].'>';?>
        <?php }?>
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?> </div>
    </div>
    <?php }else if($style == 'new_imagebox_style8'){ ?>
    <div class="zolo_imagebox_new_title">
      <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
      <?php echo $title;?> <?php echo '</'. $title_options['tag'].'>';?>
      <?php }?>
    </div>
    <?php //Thumbnail
 if($height_type == 'auto_height'){?>
    <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
    <?php }else if($height_type == 'custom_ceight'){?>
    <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
    <?php }?>
    <div class="zolo_imagebox_new_content">
      <div class="zolo_imagebox_new_des">
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?>
        <?php if($icon_button_enable == 'yes'){
		$output = '<div id="'. $zolo_imagebox_icon_button_id .'" class="zolo_imagebox_icon_button_element alignment_'.$button_alignment.'">';
	
			$output .=  '<span class="'.$iconbutton_class.'">' . $button_icon . '</span>';
		
		$output .= '</div>';
		
		echo $output;

	} ?>
      </div>
    </div>
    <?php }else if($style == 'new_imagebox_style12'){ ?>
    <?php //Thumbnail
 if($height_type == 'auto_height'){?>
    <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
    <?php }else if($height_type == 'custom_ceight'){?>
    <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
    <?php }?>
    <div class="zolo_imagebox_new_content">
      <div class="zolo_imagebox_new_title_wrap">
        <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
        <?php echo $title;?> <?php echo '</'. $title_options['tag'].'>';?>
        <?php }?>
      </div>
      <div class="zolo_imagebox_new_des_wrap">
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?> </div>
    </div>
    <?php }else if($style == 'new_imagebox_style6'){ ?>
    <div class="zolo_imagebox_new_content">
      <div class="zolo_imagebox_new_title_des">
        <?php //Title
if(!empty($title)){
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
        <?php echo $title; ?> <?php echo '</'. $title_options['tag'].'>';?>
        <?php }?>
        <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
        <?php echo $description;?> <?php echo '</span>'; }?>
        <?php if($icon_button_enable == 'yes'){

	$output = '<div id="'. $zolo_imagebox_icon_button_id .'" class="zolo_imagebox_icon_button_element alignment_'.$button_alignment.'">';

		$output .=  '<span class="'.$iconbutton_class.'">' . $button_icon . '</span>';
	
	$output .= '</div>';
	
	echo $output;
}
?>
      </div>
    </div>
    <?php //Thumbnail
 if($height_type == 'auto_height'){?>
    <div class="img_thumbnail"><img src="<?php echo $image;?>"/></div>
    <?php }else if($height_type == 'custom_ceight'){?>
    <div class="zolo_thumbnail" style="background:url(<?php echo $image;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"></div>
    <?php }?>
    <?php }?>
    <?php if($style == 'new_imagebox_style2' || $style == 'new_imagebox_style3'){
	if($icon_button_enable == 'yes'){
	$output = '<div id="'. $zolo_imagebox_icon_button_id .'" class="zolo_imagebox_icon_button_element alignment_'.$button_alignment.'">';

		$output .=  '<span class="'.$iconbutton_class.'">' . $button_icon . '</span>';
	
	$output .= '</div>';
	
	echo $output;
	}
}
?>
  </div>
  <?php if($box_link['url'] != ''){?>
  </a>
  <?php } ?>
</div>
<!--Image Box End-->

<?php }?>
<?php }else{?>
<?php if ($category!=="all" && $category!=="") {
			query_posts( 'category_name='.$category.'&post_type='.$custom_post_type.'&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
		}else{
			query_posts( 'post_type='.$custom_post_type.'&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
		}?>
<div class="zolo_imagebox_custom_posttype_wrap <?php echo 'column_'.$post_column;?>">
  <div class="zolo_imagebox_custom_posttype_box" style="margin:0 <?php echo '-'.$column_gap;?>px;">
    <?php while (have_posts()) : the_post(); ?>
    <?php
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	if($thumb) {
	$post_thumb = $thumb['0'];
	} 
	?>
    
    <!--Image Box Start-->
    <div class="zolo_imagebox_new_col" style="padding:<?php echo $column_gap;?>px;">
      <div id="<?php echo $element_id;?>" class="zolo_imagebox_new_wrapper <?php echo $style. ' ' .$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
        <div class="zolo_imagebox_new_box">
          <?php if($style == 'new_imagebox_style1' || $style == 'new_imagebox_style4' || $style == 'new_imagebox_style5' || $style == 'new_imagebox_style7' || $style == 'new_imagebox_style9'){
//Thumbnail
 if($height_type == 'auto_height'){?>
          <div class="img_thumbnail"><img src="<?php echo $post_thumb;?>"/> <?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?> </div>
          <?php }else if($height_type == 'custom_ceight'){?>
          <div class="zolo_thumbnail" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"> <?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?> </div>
          <?php }?>
          <div class="zolo_imagebox_new_content">
            <div class="zolo_imagebox_new_title_des"> <a href="<?php the_permalink(); ?>">
              <?php //Title
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php the_title();?>
              <?php echo '</'. $title_options['tag'].'>';?> </a>
              <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
              <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
              <?php echo '</span>'; }?>
              <?php if($icon_button_enable == 'yes'){?>
              <div id="<?php echo $zolo_imagebox_icon_button_id;?>" class="zolo_imagebox_icon_button_element alignment_<?php echo $button_alignment;?>"> <span class="<?php echo $iconbutton_class;?>"><a href="<?php the_permalink(); ?>"><?php echo $button_icon;?></a></span> </div>
              <?php }?>
            </div>
          </div>
          <?php }else if($style == 'new_imagebox_style2' || $style == 'new_imagebox_style3'){ ?>
          <?php //Thumbnail
 if($height_type == 'auto_height'){?>
          <div class="img_thumbnail"><img src="<?php echo $post_thumb;?>"/> <?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?> </div>
          <?php }else if($height_type == 'custom_ceight'){?>
          <div class="zolo_thumbnail" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }?>
          <div class="zolo_imagebox_new_content">
            <div class="zolo_imagebox_new_title_des"> <a href="<?php the_permalink(); ?>">
              <?php //Title
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php the_title();?>
              <?php echo '</'. $title_options['tag'].'>';?> </a>
              <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
              <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
              <?php echo '</span>'; }?> </div>
          </div>
          <?php }else if($style == 'new_imagebox_style8'){ ?>
          <div class="zolo_imagebox_new_title"> <a href="<?php the_permalink(); ?>">
            <?php //Title
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
            <?php the_title();?>
            <?php echo '</'. $title_options['tag'].'>';?> </a> </div>
          <?php //Thumbnail
 if($height_type == 'auto_height'){?>
          <div class="img_thumbnail"><img src="<?php echo $post_thumb;?>"/><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }else if($height_type == 'custom_ceight'){?>
          <div class="zolo_thumbnail" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }?>
          <div class="zolo_imagebox_new_content">
            <div class="zolo_imagebox_new_des">
              <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
              <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
              <?php echo '</span>'; }?>
              <?php if($icon_button_enable == 'yes'){?>
              <div id="<?php echo $zolo_imagebox_icon_button_id;?>" class="zolo_imagebox_icon_button_element alignment_<?php echo $button_alignment;?>"> <span class="<?php echo $iconbutton_class;?>"><a href="<?php the_permalink(); ?>"><?php echo $button_icon;?></a></span> </div>
              <?php }?>
            </div>
          </div>
          <?php }else if($style == 'new_imagebox_style12'){ ?>
          <?php //Thumbnail
 if($height_type == 'auto_height'){?>
          <div class="img_thumbnail"><img src="<?php echo $post_thumb;?>"/><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }else if($height_type == 'custom_ceight'){?>
          <div class="zolo_thumbnail" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }?>
          <div class="zolo_imagebox_new_content">
            <div class="zolo_imagebox_new_title_wrap"> <a href="<?php the_permalink(); ?>">
              <?php //Title
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php the_title();?>
              <?php echo '</'. $title_options['tag'].'>';?> </a> </div>
            <div class="zolo_imagebox_new_des_wrap">
              <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
              <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
              <?php echo '</span>'; }?> </div>
          </div>
          <?php }else if($style == 'new_imagebox_style10' || $style == 'new_imagebox_style11'){ ?>
          <?php //Thumbnail
 if($height_type == 'auto_height'){?>
          <div class="img_thumbnail"><img src="<?php echo $post_thumb;?>"/> </div>
          <?php }else if($height_type == 'custom_ceight'){?>
          <div class="zolo_thumbnail" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }?>
          <div class="zolo_imagebox_new_content">
            <div class="zolo_imagebox_new_title_des"> <a href="<?php the_permalink(); ?>">
              <?php //Title
     echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php the_title();?>
              <?php echo '</'. $title_options['tag'].'>';?> </a>
              <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
              <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
              <?php echo '</span>'; }?> </div>
            <?php //button_text
if (!empty($button_text)) {?>
            <a class="zolo_readmore_button" title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>"> <span class="zolo_readmore_button_text" <?php echo $button_options['style'];?>><?php echo esc_html($button_text);?></span> <span class="zolo_readmore_button_icon"><i class="<?php echo $icon;?>"></i></span> </a>
            <?php }?>
          </div>
          <?php }else if($style == 'new_imagebox_style13' || $style == 'new_imagebox_style14'){?>
          <?php //Thumbnail
	if($height_type == 'auto_height'){
			$min_height_value = 'auto';
		}else{
			$min_height_value = $min_height.'px';
			}?>
          <div class="zolo_imagebox_new_post_box" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover;">
            <div class="zolo_imagebox_new_content_box">
              <div class="zolo_imagebox_new_content" style="min-height:<?php echo $min_height_value;?>;">
                <div class="zolo_imagebox_new_title_des"> <?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?> <a href="<?php the_permalink(); ?>">
                  <?php //Title
     echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
                  <?php the_title();?>
                  <?php echo '</'. $title_options['tag'].'>';?> </a>
                  <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
                  <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
                  <?php echo '</span>'; }?> </div>
                <?php //button_text
if (!empty($button_text)) {?>
                <a class="zolo_readmore_button" title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? '_blank' : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>"> <span class="zolo_readmore_button_text" <?php echo $button_options['style'];?>><?php echo esc_html($button_text);?></span></a>
                <?php }?>
              </div>
            </div>
          </div>
          <?php }else if($style == 'new_imagebox_style6'){ ?>
          <div class="zolo_imagebox_new_content">
            <div class="zolo_imagebox_new_title_des"> <a href="<?php the_permalink(); ?>">
              <?php //Title
 echo '<'.$title_options['tag']. ' class="entry-title zolo_imagebox_new_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?>
              <?php the_title();?>
              <?php echo '</'. $title_options['tag'].'>';?> </a>
              <?php //Description
if(!empty($description)){
echo '<span class="zolo_imagebox_description' . $description_options['class'] . '" ' . $description_options['style'] . '>';?>
              <?php $content = wp_trim_words( get_the_content(), 15, '' );
	echo  preg_replace( '/\[[^\]]+\]/', '', $content );	?>
              <?php echo '</span>'; }?>
              <?php if($icon_button_enable == 'yes'){?>
              <div id="<?php echo $zolo_imagebox_icon_button_id;?>" class="zolo_imagebox_icon_button_element alignment_<?php echo $button_alignment;?>"> <span class="<?php echo $iconbutton_class;?>"><a href="<?php the_permalink(); ?>"><?php echo $button_icon;?></a></span> </div>
              <?php }?>
            </div>
          </div>
          <?php //Thumbnail
 if($height_type == 'auto_height'){?>
          <div class="img_thumbnail"><img src="<?php echo $post_thumb;?>"/><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }else if($height_type == 'custom_ceight'){?>
          <div class="zolo_thumbnail" style="background:url(<?php echo $post_thumb;?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover; height:<?php echo $min_height;?>px;"><?php echo '<div class="zolo_imagebox_taxonomy_box ' . $category_options['class'] . '" ' . $category_options['style'] . '>'.get_the_term_list(get_the_ID(), $taxonomy_name, '', ' ', '').'</div>'; ?></div>
          <?php }?>
          <?php }?>
          <?php if($style == 'new_imagebox_style2' || $style == 'new_imagebox_style3'){
	if($icon_button_enable == 'yes'){?>
          <div id="<?php echo $zolo_imagebox_icon_button_id;?>" class="zolo_imagebox_icon_button_element alignment_<?php echo $button_alignment;?>"> <span class="<?php echo $iconbutton_class;?>"><a href="<?php the_permalink(); ?>"><?php echo $button_icon;?></a></span> </div>
          <?php }
}
?>
        </div>
      </div>
    </div>
    <!--Image Box End-->
    <?php endwhile;?>
  </div>
</div>
<?php }?>
<?php
$custom_css = '';
 if($custom_post_type_enable == 'yes'){
 $custom_css .= '.zolo_imagebox_custom_posttype_wrap #'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_taxonomy_box a{color:'.$category_text_color.'; '.$taxonomy_background_color_scheme.'}';
}

//box_shadow
if($style == 'new_imagebox_style7'){
	 
	if(substr_count($box_shadow, 'disable') == 0) {
		$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
		$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper:hover .zolo_thumbnail,
		#'.$element_id.'.zolo_imagebox_new_wrapper:hover .img_thumbnail{'.$box_shadow.'}';
	}
	
}else if($style == 'new_imagebox_style15'){
	 
	if(substr_count($box_shadow, 'disable') == 0) {
		$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
		$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper:hover .zolo_thumbnail,
		#'.$element_id.'.zolo_imagebox_new_wrapper:hover .img_thumbnail{'.$box_shadow.'}';
	}
	
}else{
	 
	 if(substr_count($box_shadow, 'disable') == 0) {
		$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
		$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{'.$box_shadow.'}';
	}
	
}

//border_radius Start
if($style == 'new_imagebox_style7'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .img_thumbnail,
#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_thumbnail{
-webkit-border-radius:'.$border_radius.'px;
-moz-border-radius:'.$border_radius.'px;
-o-border-radius:'.$border_radius.'px;
-ms-border-radius:'.$border_radius.'px;
border-radius:'.$border_radius.'px;
overflow:hidden;
}';

}else{

//border_radius
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{
-webkit-border-radius:'.$border_radius.'px;
-moz-border-radius:'.$border_radius.'px;
-o-border-radius:'.$border_radius.'px;
-ms-border-radius:'.$border_radius.'px;
border-radius:'.$border_radius.'px;
}';

}
//border_radius end
//swing Start
if($style == 'new_imagebox_style7'){

//swing
 if($box_swing == 'yes'){
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper:hover .img_thumbnail,
#'.$element_id.'.zolo_imagebox_new_wrapper:hover .zolo_thumbnail{ transform:translateY(-10px);-moz-transform:translateY(-10px);-webkit-transform:translateY(-10px);-ms-transform:translateY(-10px);-o-transform:translateY(-10px);}';
}

}else{

//swing
 if($box_swing == 'yes'){
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper:hover{ transform:translateY(-20px);-moz-transform:translateY(-20px);-webkit-transform:translateY(-20px);-ms-transform:translateY(-20px);-o-transform:translateY(-20px);}';
}

}
//swing end
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content{ text-align:'.$text_alignment.';}';

if($box_border_color != ''){ $border =  'border:1px solid '.$box_border_color;}else{ $border = '';}

if($style == 'new_imagebox_style1'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style1 .zolo_imagebox_featuredtext{background:'.$featured_text_bg_color.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style1 .zolo_imagebox_new_box:after{
background: rgba(0,0,0,0);
background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, '.$image_overlay_color.' 100%);
background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,'.$image_overlay_color.' 100%);
background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,'.$image_overlay_color.' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="rgba(0,0,0,0)", endColorstr='.$image_overlay_color.',GradientType=0 );
}';
}else if($style == 'new_imagebox_style2'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style2 .zolo_imagebox_new_title:before,
#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style2 .zolo_imagebox_new_title:after{background:'.$underline_color_h.';height: '.$underline_height.'px;}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style2 .zolo_imagebox_new_title:before{ background:'.$underline_color.';}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style2 .zolo_imagebox_new_box:after{ content:"";position:absolute; width:100%; height:100%; float:left; left:0; bottom:0; z-index:1; opacity:'.$opacity.';-moz-transition:all 0.4s;-webkit-transition:all 0.4s;-ms-transition:all 0.4s;-o-transition:all 0.4s;transition:all 0.4s;'.$background_color_scheme.'}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style2:hover .zolo_imagebox_new_box:after{ opacity:0;}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.zolo_imagebox_icon_button_element{ position:absolute; left:0; bottom:0; z-index:99;padding:20px;}';

}else if($style == 'new_imagebox_style3'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style3 .zolo_imagebox_new_box:after{ content:"";position:absolute; width:100%; height:100%; float:left; left:0; bottom:0; z-index:1; opacity:'.$opacity.';-moz-transition:all 0.4s;-webkit-transition:all 0.4s;-ms-transition:all 0.4s;-o-transition:all 0.4s;transition:all 0.4s;'.$background_color_scheme.'}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style3:hover .zolo_imagebox_new_box:after{ opacity:0;}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.zolo_imagebox_icon_button_element{ position:absolute; left:0; bottom:0; z-index:99;padding:20px;}';

}else if($style == 'new_imagebox_style4'){
	


$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style4{background:'.$box_background_color.';
 '.$border.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.zolo_imagebox_icon_button_element{padding:15px 0px 0px 0px;}';

}else if($style == 'new_imagebox_style5' || $style == 'new_imagebox_style6'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style6,
#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style5{background:'.$box_background_color.';
 '.$border.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.zolo_imagebox_icon_button_element{padding:20px 0 0 0;}';

}else if($style == 'new_imagebox_style8' || $style == 'new_imagebox_style9'){
	
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{background:'.$box_background_color.';'.$border.';}';
	$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:before{ height:'.$highlight_bar_height.'px;background:'.$highlight_color.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:after{height:'.$highlight_bar_height.'px; '.$highlight_hover_color_schem.'}';
	
}else if($style == 'new_imagebox_style10'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{background:'.$box_background_color.';'.$border.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button{ background:'.$highlight_color.'; color:'.$button_text_color.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button:before{'.$highlight_hover_color_schem.'}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper:hover .zolo_readmore_button{color:'.$button_text_color_h.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button .zolo_readmore_button_icon{ font-size:'.$icon_size.'px;}';

}else if($style == 'new_imagebox_style11'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{background:'.$box_background_color.';'.$border.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button{color:'.$button_text_color.'; '.$highlight_hover_color_schem.' }';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button .zolo_readmore_button_icon{ font-size:'.$icon_size.'px;}';

}else if($style == 'new_imagebox_style12'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content{background:'.$highlight_color.';}';

}else if($style == 'new_imagebox_style13'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{background:'.$box_background_color.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content{background:'.$box_background_color.';'.$border.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:hover{ background:none;}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button{color:'.$button_text_color.';}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:hover .zolo_imagebox_description,
#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:hover .zolo_imagebox_new_title,
#'.$element_id.'.zolo_imagebox_new_wrapper:hover .zolo_readmore_button{color:'.$button_text_color_h.'!important;}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content_box:after{opacity:'.$opacity.';'.$background_color_scheme.'}';


}else if($style == 'new_imagebox_style14'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content{background:'.$box_background_color.';'.$border.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper{background:'.$box_background_color.';}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:hover{ background:none;}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_readmore_button{color:'.$button_text_color.';}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:hover .zolo_imagebox_description,
#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content:hover .zolo_imagebox_new_title,
#'.$element_id.'.zolo_imagebox_new_wrapper:hover .zolo_readmore_button{color:'.$button_text_color_h.'!important;}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style14:before,
#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style14 .zolo_imagebox_new_box:before{ height:'.$highlight_bar_height.'px;'.$highlight_hover_color_schem.'}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style14:after,
#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style14 .zolo_imagebox_new_box:after{ width:'.$highlight_bar_height.'px;'.$highlight_hover_color_schem.'}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper .zolo_imagebox_new_content_box:after{opacity:'.$opacity.';'.$background_color_scheme.'}';


}else if($style == 'new_imagebox_style15'){

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style15 .zolo_imagebox_new_box:hover .zolo_imagebox_new_title{color:'.$title_hover_color.'!important;}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style15 .zolo_imagebox_new_box .zolo_imagebox_new_thumbnail_titile:before{'.$border.'}';
$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style15 .zolo_imagebox_new_box:hover .zolo_imagebox_new_thumbnail_titile:before{'.$border.'}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style15 .zolo_imagebox_new_box:hover .zolo_imagebox_featuredtext{ color:'.$box_hover_border_color.'!important;}';

$custom_css .= '#'.$element_id.'.zolo_imagebox_new_wrapper.new_imagebox_style15 .zolo_imagebox_new_box .zolo_arrow .fa-angle-right:after{ background:'.$title_hover_color.';}';

}

if($icon_button_enable == 'yes'){
if($style == 'new_imagebox_style3' || $style == 'new_imagebox_style2' || $style == 'new_imagebox_style4' || $style == 'new_imagebox_style5' || $style == 'new_imagebox_style6' || $style == 'new_imagebox_style7' || $style == 'new_imagebox_style8' || $style == 'new_imagebox_style9'){

$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.zolo_imagebox_icon_button_element{width:100%; float:left; line-height:0;}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.alignment_center{ text-align:center}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.alignment_right{ text-align:right}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.'.alignment_left{ text-align: left}';
if($icon_button_style == 'style1' || $icon_button_style == 'style2'){
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:before{ color:'.$icon_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:before{ background:'.$icon_color.';}';

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:before{ color:'.$icon_hover_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:before{ background:'.$icon_hover_color.';}';

}else if($icon_button_style == 'style3' || $icon_button_style == 'style5' || $icon_button_style == 'style7' || $icon_button_style == 'style9'){

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:before{ color:'.$icon_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:before{ background:'.$icon_color.';}';

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:before{ color:'.$icon_hover_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:before{ background:'.$icon_hover_color.';}';

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_button_icon{background:'.$background_color.';}
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_button_icon{background:'.$hover_background_color.';}';

}else if($icon_button_style == 'style4' || $icon_button_style == 'style6' || $icon_button_style == 'style8' || $icon_button_style == 'style10'){

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:before{ color:'.$border_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_arrow_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_plus_icon:before{ background:'.$border_color.';}';

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:before{ color:'.$hover_border_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_arrow_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:after,
#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_plus_icon:before{ background:'.$hover_border_color.';}';

$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag .zolo_button_icon{ border:1px solid '.$border_color.';}';
$custom_css .= '#'.$zolo_imagebox_icon_button_id.' .zolo_iconbutton_tag:hover .zolo_button_icon{border:1px solid '.$hover_border_color.';}';

 }

 } }

apcore_save_plugin_dyn_styles( $custom_css );

?>
<?php
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Apress_Imagebox_New_Module = new Apress_Imagebox_New_Module;
}
