<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Post Slider
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Post_Slider extends WPBakeryShortCode {}
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
	
	$doc_link = 'http://apressthemes.com/apress/documentation';

	if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Post Slider", 'apcore'),
					"base"			=> "apress_post_slider",
					"class"			=> "",
					"weight"		=> 17,
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __( "Responsive Post Slider", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-post_slider.png",
					"params" 		=> array(					
					
					array(
						'type'        => 'radio_image_select',
						'heading'     => esc_html__( 'Slider Style', 'apcore' ),
						"holder"	  => "div",
						'param_name'  => 'blogpostsliderstyle',
						'simple_mode' => false,
						'admin_label' => true,
						'options'     => array(
							'postsliderstyle1' => array(
								'tooltip' => esc_attr__('Style 1','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_slider/blog_slider_style1.jpg'
							),
							'postsliderstyle2' => array(
								'tooltip' => esc_attr__('Style 2','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_slider/blog_slider_style2.jpg'
							),
							'postsliderstyle3' => array(
								'tooltip' => esc_attr__('Style 3','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_slider/blog_slider_style3.jpg'
							),
							'postsliderstyle4' => array(
								'tooltip' => esc_attr__('Style 4','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_slider/blog_slider_style4.jpg'
							),
							'postsliderstyle5' => array(
								'tooltip' => esc_attr__('Style 5','apcore'),
								'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_slider/blog_slider_style5.jpg'
							),
				
						),
					),
							
					array(
						"type"				=> "zolo_taxonomy_multiselect",
						"heading" 			=> __("Blog Categories", "apcore"),
						"description"		=> __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore"),
						"param_name"		=> "category",
						"admin_label"		=> true,
						"value"				=> $blog_options,
						'save_always'		=> true,						
					),						
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Number of Posts",'apcore'),
						"description"		=> __("Leave blank or -1 to show all.",'apcore'),
						"param_name"		=> "num",
						'value'				=> '4', 
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Slider height",'apcore'),
						"description"		=> __("Enter value without px", "apcore"),
						"param_name"		=> "postsliderheight",
						'value'				=> '450', 
						'dependency'		=> array( 'element' => 'blogpostsliderstyle', 'value' => array('postsliderstyle1','postsliderstyle2','postsliderstyle3','postsliderstyle3','postsliderstyle4','postsliderstyle4'))
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Slider Caption height",'apcore'),
						"description"		=> __("Enter value without px", "apcore"),
						"param_name"		=> "postslidercaptionheight",
						'value'				=> '206', 
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Slider Caption width",'apcore'),
						"description"		=> __("Enter value without px", "apcore"),
						"param_name"		=> "postslidercaptionwidth",
						'value'				=> '606', 
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						'type'				=> 'zolo_padding',
						"heading"			=> __("Slider Caption Padding",'apcore'),
						'param_name'		=> 'postslidercaptionpad',
						'positions'			=> array(
							esc_html__('Top', 'apcore')		=> "top",
							esc_html__('Right', 'apcore')	=> "right",
							esc_html__('Bottom', 'apcore')	=> "bottom",
							esc_html__('Left', 'apcore')	=> "left",
						),
						'value'				=> 'padding-top:10|padding-right:10|padding-bottom:10|padding-left:10',
					),					
					array(
						"type"				=> "attach_image",
						"class" 			=> "",
						"heading"			=> __("Slider Caption Background Image", "apcore"),
						"param_name" 		=> "postslidercaptionbg",
						"value"				=> "",
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Title Font Size",'apcore'),
						"description"		=> __("Enter value without px", "apcore"),
						"param_name"		=> "blgcrsltitlesize",
						'value'				=> '20', 
					),
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Text Align",'apcore'),
						"description"		=> __("Content alignment", "apcore"),
						"param_name"		=> "slidercaptiontextalgin",
						'value'				=> array(
							__("Left",'apcore')		=> "left",
							__("Center",'apcore')	=> "center",
							__("Right",'apcore')	=> "right"
						), 
					),	
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Title Text Color",'apcore'),
						"param_name"		=> "blgcrsltitlecolor",
						"value"				=> '#777777', 
					),
					array(
						'type'				=> 'zolo_padding',
						"heading"			=> __("Title Padding",'apcore'),
						'param_name'		=> 'title_padding',
						'positions'			=> array(
							esc_html__('Top', 'apcore')		=> "top",
							esc_html__('Right', 'apcore')	=> "right",
							esc_html__('Bottom', 'apcore')	=> "bottom",
							esc_html__('Left', 'apcore')	=> "left",
						),
						'value'				=> 'padding-top:12|padding-right:0|padding-bottom:15|padding-left:0',
					),
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Post title separator Show/Hide",'apcore'),
						"param_name"		=> "posttitleseparatorshowhide",
						'value'				=> array(
							__("Hide",'apcore') => "hide",
							__("Show",'apcore') => "show"
						),
					),
					array(
						"type"				=> "attach_image",
						"class"				=> "",
						"heading"			=> __("Title separator Image", "apcore"),
						"param_name"		=> "titleseparatorimg",
						"value"				=> "",					
						'dependency'		=> array( 'element' => 'posttitleseparatorshowhide', 'value' => array('show')),
					),					
					array(
						"type" 				=> "dropdown",
						"class" 			=> "",
						"heading" 			=> __("Category Design",'apcore'),
						"param_name" 		=> "slidercategorydesign",
						'value' 			=> array(
							__("None",'apcore')		=> "none",
							__("Box",'apcore')		=> "box",
							__("Rounded",'apcore')	=> "rounded"
						),
					),
					array(
						"type" 				=> "colorpicker",
						"class" 			=> "",
						"heading" 			=> __("Category Item font Color",'apcore'),
						"param_name" 		=> "categoryfontcolor",
						'value' 			=> '#ffffff',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type" 				=> "colorpicker",
						"class" 			=> "",
						"heading" 			=> __("Category Item Hover font Color",'apcore'),
						"param_name" 		=> "categoryfontcolorhover",
						'value' 			=> '#ffffff',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),					
					array(
						"type" 				=> "colorpicker",
						"class" 			=> "",
						"heading" 			=> __("Category Item Background Color",'apcore'),
						"param_name"		=> "categorybackgroundcolor",
						'value' 			=> '#549ffc',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type" 				=> "colorpicker",
						"class" 			=> "",
						"heading" 			=> __("Category Item hover Background Color",'apcore'),
						"param_name" 		=> "categorybackgroundcolorhover",
						'value' 			=> '#347ad1',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "colorpicker",
						"class" 			=> "",
						"heading" 			=> __("Category Item Border Color",'apcore'),
						"param_name" 		=> "categorybordercolor",
						'value' 			=> '#549ffc',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Category Item hover Border Color",'apcore'),
						"param_name"		=> "categorybordercolorhover",
						'value'				=> '#347ad1',
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Excerpt Length",'apcore'),
						"description"		=> __("Please enter excerpt length to see content.",'apcore'),
						"param_name"		=> "excerptlength",
						'value'				=> '0',
					),
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Continue Reading Show/Hide",'apcore'),
						"param_name"		=> "continuereadingshowhide",
						'value'				=> array(
							__("Hide",'apcore') => "hide",
							__("Show",'apcore') => "show"
						),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
					),
					array(
						"type"				=> "textfield",
						"class"				=> "",
						"heading"			=> __("Modify the Continue Reading text",'apcore'),
						"param_name"		=> "continuereadingmodify",
						'value'				=> 'Continue Reading',
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
					),					
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Button font Color",'apcore'),
						"param_name"		=> "buttonfontcolor",
						'value'				=> '#777777',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Button Hover font Color",'apcore'),
						"param_name"		=> "buttonfontcolorhover",
						'value'				=> '#549ffc',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),						
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Button Background Color",'apcore'),
						"param_name"		=> "buttonbackgroundcolor",
						'value'				=> '#ffffff',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Button Hover Background Color",'apcore'),
						"param_name"		=> "buttonbackgroundcolorhover",
						'value'				=> '#ffffff',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),						
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Button border Color",'apcore'),
						"param_name"		=> "buttonbordercolor",
						'value'				=> '#777777',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),						
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Button Hover border Color",'apcore'),
						"param_name"		=> "buttonbordercolorhover",
						'value'				=> '#549ffc',
						'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
						'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
					),								
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("Meta Show/Hide",'apcore'),
						"param_name"		=> "postmetashowhide",
						'value'				=> array(
							__("Show",'apcore') => "show",
							__("Hide",'apcore') => "hide"
						),
						'edit_field_class'	=> 'vc_column vc_col-sm-8 no-top-margin',
					),						
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Meta Text Color",'apcore'),
						"param_name"		=> "blgmodernmetacolor",
						"value"				=> '#777777', 
						'dependency'		=> array( 'element' => 'postmetashowhide', 'value' => array('show')),
					),
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Meta Text hover Color",'apcore'),
						"param_name"		=> "postmetacolorhover",
						'value'				=> '#777777',
						'dependency'		=> array( 'element' => 'postmetashowhide', 'value' => array('show')),
					),		
					array(
						"type"				=> "colorpicker",
						"class"				=> "",
						"heading"			=> __("Post content Color",'apcore'),
						"param_name"		=> "postcontentcolor",
						'value'				=> '#777777',
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
						"type"				=> "zolo_video_link_param",
						"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
						"param_name"		=> "tutorials",
						"doc_link"			=> $doc_link,
						"video_link"		=> "https://youtu.be/SQPWOx5U_XY",
					),		
					),
					) );		
		
			}		