<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Carousel
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Blog_Carousel extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

$is_admin = is_admin();

$blog_types = ($is_admin) ? get_categories() : array('All' => 'all');
$blog_options = array("All" => "all");
if($is_admin){
	foreach ($blog_types as $type) {
		if(isset($type->name) && isset($type->slug))
			$blog_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
	}
} else {
	$blog_options['All'] = 'all';
}

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
				"name"				=> __("Blog Carousel Styles", 'apcore'),
				"base"				=> "apress_blog_carousel",
				"class"				=> "",
				"weight"			=> 1,
				"category"			=> __( "Apress", "apcore"),
				"description"		=> __( "Blog with carousel", "apcore"),
				"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-blog_slider.png",
				"params" 			=> array(		
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
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/carousel/carousel_style1.jpg'
									),
									'style2' => array(
										'tooltip' => esc_attr__('Style 2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/carousel/carousel_style2.jpg'
									),
									'style3' => array(
										'tooltip' => esc_attr__('Style 3','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/carousel/carousel_style3.jpg'
									),
									'style4' => array(
										'tooltip' => esc_attr__('Style 4','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/carousel/carousel_style4.jpg'
									),
									'style5' => array(
										'tooltip' => esc_attr__('Style 5','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/carousel/carousel_style5.jpg'
									),
						
								),
							),
							
							
							array(
								"type"				=> "zolo_taxonomy_multiselect",
								"heading"			=> __("Blog Categories", "apcore"),
								"param_name"		=> "category",
								"admin_label" 		=> true,
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
								"value"				=> "12", 
							),
							array(
								"type"				=> "dropdown",
								"class"				=> "",
								"heading"			=> __("Number of Items per row",'apcore'),
								"param_name"		=> "blgcrslcolprw",
								'value'				=> array(
									__("Four",'apcore') => "Four",
									__("Three",'apcore') => "Three",
									__("Two",'apcore') => "Two"
								),
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Box Background Color",'apcore'),
								"param_name"		=> "blgcrslcolbg",
								"value"				=> '#f9f9f9',
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style5')),
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	 
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Box Border Color",'apcore'),
								"param_name"		=> "blgcrslcolbordep",
								"value"				=> '#e6e6e6', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin', 
							),
							array(
								"type"				=> "textfield",
								"class"				=> "",
								"heading"			=> __("Box Border Radius",'apcore'),
								"description"		=> __("Enter value between 0 - 100", "apcore"),
								"param_name"		=> "blgcrslcolradi",
								'value'				=> '0', 
							),
							array(
								"type"				=> "textfield",
								"class"				=> "",
								"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
								"description"		=> __("e.g - 15,15,15,15",'apcore'),
								"param_name"		=> "blgcrslcolpad",
								'value'				=> '15,15,15,15', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style5'))	
							),
							array(
								"type"				=> "textfield",
								"class"				=> "",
								"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
								"description"		=> __("e.g - 15,15,15,15",'apcore'),
								"param_name"		=> "blgcrslcolpaddep",
								'value'				=> '0,0,0,0', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style3', 'style4'))	 
							),
							array(
								"type"				=> "dropdown",
								"class"				=> "",
								"heading"			=> __("Title Position",'apcore'),
								"param_name"		=> "blgcrsltitleposi",
								'value'				=> array(
									__("Bottom",'apcore') => "bottom",
									__("Top",'apcore') => "top"
								),
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1'))	 
							),
							array(
								"type"				=> "dropdown",
								"class"				=> "",
								"heading"			=> __("Title Position",'apcore'),
								"param_name"		=> "blgcrsltitleposidep",
								'value'				=> array(
									__("Center",'apcore') => "center",
									__("Top",'apcore') => "top",
									__("Bottom",'apcore') => "bottom"
								),
								'dependency'		=> array( 'element' => 'style', 'value' => array('style2', 'style3'))	 
							),
							array(
								"type"				=> "textfield",
								"class"				=> "",
								"heading"			=> __("Title Font Size",'apcore'),
								"description"		=> __("Enter value without px", "apcore"),
								"param_name"		=> "blgcrsltitlesize",
								'value'				=> '24', 
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Text Color",'apcore'),
								"param_name"		=> "blgcrsltitlecolor",
								"value"				=> '#ffffff', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style2','style3', 'style4'))	
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Text Color",'apcore'),
								"param_name"		=> "blgcrsltitlecolordep",
								"value"				=> '#000000', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style5'))	
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Text Hover Color",'apcore'),
								"param_name"		=> "blgcrsltitlehovcolor",
								"value"				=> '#ffffff', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style5'))	 
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Title Hover Background",'apcore'),
								"param_name"		=> "blgcrsltitlebg5dep",
								"value"				=> '#00c8ec', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style4','style5'))	 
							),	
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Post meta Color",'apcore'),
								"param_name"		=> "blgcrslmetacolor",
								'value'				=> '#777777',
								'dependency'		=> array( 'element' => 'style', 'value' => array('style5'))	
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
								"param_name"		=> "blgcrslimgoverlay",
								"value"				=> 'rgba(0, 0, 0, 0.3)', 
								'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),	
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Image Overlay Hover Color",'apcore'),
								"param_name"		=> "blgcrslhovercolor",
								"value"				=> 'rgba(0, 0, 0, 0.8)', 
								'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),			
							array(
								"type"				=> "textfield",
								"class"				=> "",
								"heading"			=> __("Fontawesome Zoom Icon",'apcore'),
								"param_name"		=> "blgcrslzoomicon",
								'value'				=> 'fa fa-search-plus', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style5'))	
							),			
							array(
								"type"				=> "textfield",
								"class"				=> "",
								"heading"			=> __("Fontawesome Link Icon",'apcore'),
								"param_name"		=> "blgcrsllinkicon",
								'value'				=> 'fa fa-link', 
								'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style5'))	
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Button Background",'apcore'),
								"description"		=> __("for Zoom and Link Icon", "apcore"),
								"param_name"		=> "blgcrslbuttonbg",
								"value"				=> '#00c8ec', 
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							),
							array(
								"type"				=> "colorpicker",
								"class"				=> "",
								"heading"			=> __("Button Hover Background",'apcore'),
								"description"		=> __("for Zoom and Link Icon", "apcore"),
								"param_name"		=> "blgcrslbuttonhovbg",
								"value"				=> '#0187a0', 
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							),	
							array(
								"type"				=> "dropdown",
								"class"				=> "",
								"heading"			=> __("Slider Navigation Design",'apcore'),
								"param_name"		=> "blgcrslnav",
								'value'				=> array(
									__("None",'apcore') => "none",
									__("Square",'apcore') => "square",
									__("Round",'apcore') => "round"
								),
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
								'video_link'		=> 'https://youtu.be/LnRK9LrpVKc',
							),
						),
				) );		
		
	}		