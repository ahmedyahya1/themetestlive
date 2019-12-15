<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Modern
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Blog_Modern extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

$is_admin = is_admin();

$blog_types = ($is_admin) ? get_categories() : array('All' => 'all');
$blog_options = array("All" => "all");
if($is_admin) {
	foreach ($blog_types as $type) {
		if(isset($type->name) && isset($type->slug))
			$blog_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
	}
} else {
	$blog_options['All'] = 'all';
}

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
				"name"			=> __("Blog Modern Styles", 'apcore'),
				"base"			=> "apress_blog_modern",
				"class"			=> "",
				"weight"		=> 2,
				"category"		=> __( "Apress", "apcore"),
				"description"	=> __("Modern Blog with/without slider", "apcore"),
				"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-blog_modern.png",
				"params"		=> array(		
					array(
						'type'        => 'radio_image_select',
						'heading'     => esc_html__( 'Choose Style', 'apcore' ),
						"holder"	  => "div",
						'param_name'  => 'style',
						'simple_mode' => false,
						'admin_label' => true,
						'options'     => array(
							'style1' => array(
								'tooltip' => esc_attr__('Style 1','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/modern/blog_modern_style1.jpg'
							),
							'style2' => array(
								'tooltip' => esc_attr__('Style 2','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/modern/blog_modern_style2.jpg'
							),
							'style3' => array(
								'tooltip' => esc_attr__('Style 3','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/modern/blog_modern_style3.jpg'
							),
							'style4' => array(
								'tooltip' => esc_attr__('Style 4','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/modern/blog_modern_style4.jpg'
							),
						),
					),
							
					array(
						"type"				=> "zolo_taxonomy_multiselect",
						"heading"			=> __("Blog Categories", "apcore"),
						"param_name"		=> "category",
						"admin_label"		=> true,
						"value"				=> $blog_options,
						'save_always'		=> true,
						"description"		=> __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore")
					),	
					 array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Number of Posts",'apcore'),
						"description"		=> __("Leave blank or -1 to show all.",'apcore'),
						"param_name"		=> "num",
						'value'				=> '4', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style1','style2')),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
						),
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Number of Posts",'apcore'),
						"param_name"		=> "style_num3",
						'value'				=> array(__("5",'apcore') => "5",__("10",'apcore') => "10",__("15",'apcore') => "15",__("20",'apcore') => "20",__("25",'apcore') => "25"),
						'dependency'		=> array( 'element' => 'style', 'value' => array('style3')),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
						),
						
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Number of Posts",'apcore'),
						"param_name"		=> "style_num4",
						'value'				=> array(__("3",'apcore') => "3",__("6",'apcore') => "6",__("9",'apcore') => "9",__("12",'apcore') => "12",__("15",'apcore') => "15"),
						'dependency'		=> array( 'element' => 'style', 'value' => array('style4')),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
						),
						
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Slider",'apcore'),
						"param_name"		=> "blgmodernslider",
						'value'				=> array(__("None",'apcore') => "none",__("Hide",'apcore') => "hide",__("Show",'apcore') => "show"),
						'dependency'		=> array( 'element' => 'style', 'value' => array('style3', 'style4')),
						'edit_field_class'	=> 'vc_column vc_col-sm-4 no-top-margin',
						),	
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Box Background",'apcore'),
						"param_name"		=> "blgmoderncolbg",
						"value"				=> '#999999', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style2')),
						'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Box Hover Background",'apcore'),
						"param_name"		=> "blgmoderncolhovbg",
						"value"				=> '#07abaa', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style2')),
						'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Box Padding (top, right, bottom, left)",'apcore'),
						"description"		=> __("Enter the value like 5,5,5,5. Don't leave it blank", "apcore"),
						"param_name"		=> "blgcrslcolpad",
						'value'				=> '1,0,1,0', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Title Font Size",'apcore'),
						"description"		=> __("Enter value without px.", "apcore"),
						"param_name"		=> "blgcrsltitlesize",
						'value'				=> '24', 
					),	
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Title Text Color",'apcore'),
						"param_name"		=> "blgcrsltitlecolor",
						"value"				=> '#ffffff', 
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
					),
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Meta Text Color",'apcore'),
						"param_name"		=> "blgmodernmetacolor",
						"value"				=> '#ffffff', 
						'dependency'		=> array( 'element' => 'style',  'value' => array('style1', 'style2')),
						'edit_field_class'	=> 'vc_column vc_col-sm-4 no-top-margin',
					),			
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Image Overlay Color",'apcore'),
						"param_name"		=> "blgmodernimgoverlay",
						"value"				=> '#000000', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
					),	
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Image Overlay Opacity",'apcore'),
						"param_name"		=> "blgmodernoverlayopac",
						'value'				=> '0.3', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
						'edit_field_class'	=> 'vc_column vc_col-sm-4 no-top-margin',
					),		
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Hover Background",'apcore'),
						"param_name"		=> "blgmodernhovercolor",
						"value"				=> '#000000', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style3', 'style4')),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
					),	
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Hover Opacity",'apcore'),
						"param_name"		=> "blgmodernhoveropac",
						'value'				=> '0.7', 
						'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style3', 'style4')),
						'edit_field_class'	=> 'vc_column vc_col-sm-4 no-top-margin',
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
						'type'				=> 'zolo_video_link_param',
						'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
						'param_name'		=> 'tutorials',
						'doc_link'			=> $doc_link,
						'video_link'		=> 'https://youtu.be/KNMkJsHn5Q4',
					),	
				),
			) );		
		
	}		