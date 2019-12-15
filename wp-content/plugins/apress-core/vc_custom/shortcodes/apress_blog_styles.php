<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Style 
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Blog_Styles extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

$is_admin = is_admin();

$blog_types = ($is_admin) ? get_categories() : array('All' => 'all');
$blog_options = array("All" => "all");
if($is_admin) {
	foreach ($blog_types as $type) {
		if(isset($type->name) && isset($type->slug))
			$blog_options[htmlspecialchars($type->name)] = htmlspecialchars($type->slug);
	}
}else{
	$blog_options['All'] = 'all';
}
if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
					"name"			=> __("Blog Styles", 'apcore'),
					"base"			=> "apress_blog_styles",
					"weight"		=> 3,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __("Different Blog style Presentation", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-blog.png",
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
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style3.jpg'
								),
								'style4' => array(
									'tooltip' => esc_attr__('Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style4.jpg'
								),
								'style5' => array(
									'tooltip' => esc_attr__('Style 5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style5.jpg'
								),
								'style6' => array(
									'tooltip' => esc_attr__('Style 6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style6.jpg'
								),
								'style7' => array(
									'tooltip' => esc_attr__('Style 7','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style7.jpg'
								),
								'style8' => array(
									'tooltip' => esc_attr__('Style 8','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style8.jpg'
								),
								
								'style9' => array(
									'tooltip' => esc_attr__('Style 9','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style9.jpg'
								),
								'style10' => array(
									'tooltip' => esc_attr__('Style 10','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style10.jpg'
								),
								'style11' => array(
									'tooltip' => esc_attr__('Style 11','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style11.jpg'
								),
								'style12' => array(
									'tooltip' => esc_attr__('Style 12','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style12.jpg'
								),
								
								'style13' => array(
									'tooltip' => esc_attr__('Style 13','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style13.jpg'
								),
								'style14' => array(
									'tooltip' => esc_attr__('Style 14','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style14.jpg'
								),
								'style15' => array(
									'tooltip' => esc_attr__('Style 15','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style15.jpg'
								),
								'style_large' => array(
									'tooltip' => esc_attr__('Style 16','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style_large.jpg'
								),
								'style_medium' => array(
									'tooltip' => esc_attr__('Style 17','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style_medium.jpg'
								),
								'style_small' => array(
									'tooltip' => esc_attr__('Style 18','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/blog/blog_style/blog_style_small.jpg'
								),
								
							),
						),

						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Blog Categories", "apcore"),
							"description"		=> __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $blog_options,
							'save_always'		=> true,							
						),	
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Layout",'apcore'),
							"param_name"		=> "layoutstyle",
							'value'				=> array(
								__("Grid",'apcore') => "fitRows",
								__("Masonry",'apcore') => "masonry"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8', 'style9', 'style12', 'style13')),
						),					
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Number of Posts",'apcore'),
							"param_name"		=> "num",
							"value"				=> "4", 
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),   
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Number of Items per row",'apcore'),
							"param_name"		=> "blgcrslcolprw",
							"value"				=> array(
								__("Default",'apcore') => "default",
								__("Four",'apcore') => "Four",
								__("Three",'apcore') => "Three",
								__("Two",'apcore') => "Two", 
								__("One",'apcore') => "One"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8', 'style9', 'style10', 'style12', 'style13'))
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Number of Items per row",'apcore'),
							"param_name"		=> "blgcrslcolprw15",
							"value"				=> array(
								__("One",'apcore') => "One", 
								__("Two",'apcore') => "Two"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style15'))
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "boxbackgroundcolor3",
							'value'				=> '#fff',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12', 'style13', 'style15')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "boxbordercolor3",
							'value'				=> '#eee',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12', 'style13', 'style15')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow3',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						   'dependency'		=> array( 'element' => 'style', 'value' => array('style12', 'style13', 'style15')),
						),
						array(							
							'type'				=> 'zolo_number',
							'heading'			=> esc_html__('Post Caption Width','apcore'),
							'param_name'		=> 'postcaptionwidth',
							'step'				=> '1',
							'value'				=> '800',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style14')),
						),
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Post Caption Background Image", "apcore"),
							"param_name"		=> "postcaptionimg",
							"value"				=> "",
							'dependency'		=> array( 'element' => 'style', 'value' => array('style14')),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Post title position",'apcore'),
							"param_name"		=> "posttitleposition",
							'value'				=> array(
								__("Above",'apcore') => "above",
								__("Below",'apcore') => "below"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Post title alignment",'apcore'),
							"param_name"		=> "posttitlealignment",
							'value'				=> array(
								__("Default",'apcore') => "default",
								__("Left",'apcore') => "left",
								__("Center",'apcore') => "center",
								__("Right",'apcore') => "right"
								),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
						),					
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "blgcrslcolbg",
							"value"				=> '#f9f9f9',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3','style6','style8'))
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "blgcrslcolbordep",
							"value"				=> '#e6e6e6',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1','style2','style3','style5','style6','style8'))
						),
						array(
							"type"				=> "dropdown",
							'heading'			=> esc_html__('Box Border Radius','apcore'),
							"param_name"		=> "blgcrslcolradi",
							'value'				=> array(
								__("Square",'apcore') => "0",
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "100",								
								
								),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style8'))
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
							"param_name"		=> "blgcrslcolpad",
							'value'				=> '', 
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8', 'style10', 'style11', 'style12', 'style13', 'style15')),
							"description"		=> __("e.g - 15,15,15,15",'apcore'),
						),
						array(
							'type'				=> 'zolo_number',
							'heading'			=> __('Box Inner Padding','apcore'),
							'param_name'		=> 'blgcrslcolinnerpad',
							'step'				=> '1',
							'value'				=> '35',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style10')),								
						),
						array(
							'type'				=> 'zolo_number',
							'heading'			=> __('Title Font Size','apcore'),
							'param_name'		=> 'blgcrsltitlesize',
							'step'				=> '1',
							'value'				=> '24',
							'suffix'			=> 'px',							
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Title Text Color",'apcore'),
							"param_name"		=> "blgcrsltitlecolor",
							"value"				=> '', 
						),
						array(
							'type'				=> 'zolo_number',
							'heading'			=> __('Title Top Padding','apcore'),
							'param_name'		=> 'titletoppadding',
							'step'				=> '1',
							'value'				=> '0',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',							
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Title Bottom Padding",'apcore'),
							"param_name"		=> "titlebottompadding",
							'step'				=> '1',
							'value'				=> '20',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',						
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
							'dependency'		=> array( 'element' => 'style', 'value'	=> array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
						),						
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Post title separator Image", "apcore"),
							"param_name"		=> "titleseparatorimg",
							"value"				=> "",
							'dependency'		=> array( 'element' => 'posttitleseparatorshowhide', 'value' => array('show')),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Excerpt Length",'apcore'),
							"param_name"		=> "excerptlength",
							'value'				=> '40',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15'))
						),							
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Category position",'apcore'),
							"param_name"		=> "categoryposition",
							'value'				=> array(
								__("Above",'apcore') => "above",
								__("Below",'apcore') => "below"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
						),									
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Category design",'apcore'),
							"param_name"		=> "categorydesign",
							'value'				=> array(
								__("Box",'apcore') => "box",
								__("Rounded",'apcore') => "rounded",
								__("Image",'apcore') => "image",
								__("None",'apcore') => "none"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Category Item Top Margin",'apcore'),
							"param_name"		=> "category_topmargin",
							'step'				=> '1',
							'value'				=> '0',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12', 'style13'))
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Category Item font Color",'apcore'),
							"param_name"		=> "categoryfontcolor",
							'value'				=> '#757575',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Category Item Hover font Color",'apcore'),
							"param_name"		=> "categoryfontcolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style12', 'style13', 'style14', 'style15')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Category Item Background Color",'apcore'),
							"param_name"		=> "categorybackgroundcolor",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Category Item hover Background Color",'apcore'),
							"param_name"		=> "categorybackgroundcolorhover",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Category Item Border Color",'apcore'),
							"param_name"		=> "categorybordercolor",
							'value' 			=> '#757575',
							'dependency'		=> array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Category Item hover Border Color",'apcore'),
							"param_name"		=> "categorybordercolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'categorydesign', 'value' => array('box','rounded')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image for category design", "apcore"),
							"param_name"		=> "categorydesignimg",
							"value"				=> "",
							'dependency'		=> array( 'element' => 'categorydesign', 'value' => array('image')),
						),							
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Continue Reading Show/Hide",'apcore'),
							"param_name"		=> "continuereadingshowhide",
							'value'				=> array(
								__("Show",'apcore') => "show", 
								__("Hide",'apcore') => "hide"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style12', 'style13', 'style14', 'style15')),
						),							
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Modify the Continue Reading text",'apcore'),
							"param_name"		=> "continuereadingmodify",
							'value'				=> __("Continue Reading",'apcore'),
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-8 crum_vc apress-number-wrap',
						),				
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button font Color",'apcore'),
							"param_name"		=> "buttonfontcolor",
							'value'				=> '#757575',
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover font Color",'apcore'),
							"param_name"		=> "buttonfontcolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Background Color",'apcore'),
							"param_name"		=> "buttonbackgroundcolor",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Background Color",'apcore'),
							"param_name"		=> "buttonbackgroundcolorhover",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button border Color",'apcore'),
							"param_name"		=> "buttonbordercolor",
							'value'				=> '#757575',
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover border Color",'apcore'),
							"param_name"		=> "buttonbordercolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'continuereadingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Post social sharing Show/Hide",'apcore'),
							"param_name"		=> "socialsharingshowhide",
							'value'				=> array(__("Show",'apcore') => "show",__("Hide",'apcore') => "hide"),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
						),
						array(
							"type"				=> "dropdown",
							'heading'			=> esc_html__('Social Icon Border Radius','apcore'),
							"param_name"		=> "socialiconborderradius",
							'value'				=> array(
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "100",								
								__("Square",'apcore') => "0"
								),
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
						),				
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Social Icon Color",'apcore'),
							"param_name"		=> "socialiconcolor",
							'value'				=> '#757575',
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Social Icon Hover Color",'apcore'),
							"param_name"		=> "socialiconcolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Social Icon Background Color",'apcore'),
							"param_name"		=> "socialiconbackgroundcolor",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Social Icon Hover Background Color",'apcore'),
							"param_name"		=> "socialiconbackgroundcolorhover",
							'value'				=> '#ffffff',
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Social Icon border Color",'apcore'),
							"param_name"		=> "socialiconbordercolor",
							'value'				=> '#757575',
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Social Icon Hover border Color",'apcore'),
							"param_name"		=> "socialiconbordercolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'socialsharingshowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Post meta Show/Hide",'apcore'),
							"param_name"		=> "postmetashowhide",
							'value'				=> array(
								__("Show",'apcore') => "show",
								__("Hide",'apcore') => "hide"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9', 'style10', 'style11', 'style13', 'style14', 'style15')),
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Post meta Color",'apcore'),
							"param_name"		=> "postmetacolor",
							'value'				=> '#818181',
							'dependency'		=> array( 'element' => 'postmetashowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Post meta hover Color",'apcore'),
							"param_name"		=> "postmetacolorhover",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'postmetashowhide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Post meta Show/Hide",'apcore'),
							"param_name"		=> "postmetashowhide2",
							'value'				=> array(
								__("Show",'apcore') => "show",
								__("Hide",'apcore') => "hide"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Post meta Color",'apcore'),
							"param_name"		=> "postmetacolor2",
							'value'				=> '#818181',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Post meta hover Color",'apcore'),
							"param_name"		=> "postmetacolorhover2",
							'value'				=> '#549ffc',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Meta Border Color",'apcore'),
							"param_name"		=> "postmetabordercolor2",
							'value'				=> '#f6f5f5',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style12', 'style13')),
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Post content Color",'apcore'),
							"param_name"		=> "postcontentcolor",
							'value'				=> '#818181',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9','style10','style11','style12', 'style13', 'style14')),
						),								
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Blog Post Design",'apcore'),
							"param_name"		=> "postdesign",
							'value'				=> array(
								__("None",'apcore') => "none",
								__("Box",'apcore') => "box",
								__("Box Without Padding",'apcore') => "box_withoutpadding"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small','style9')),
						),
						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "boxbackgroundcolor",
							'value'				=> '#fff',
							'dependency'		=> array( 'element' => 'postdesign', 'value' => array('box','box_withoutpadding')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "boxbordercolor",
							'value'				=> '#eee',
							'dependency'		=> array( 'element' => 'postdesign', 'value' => array('box','box_withoutpadding')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						   'dependency'		=> array( 'element' => 'postdesign', 'value' => array('box','box_withoutpadding')),
						),				
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Blog Post Design",'apcore'),
							"param_name"		=> "postdesign2",
							'value'				=> array(
								__("None",'apcore') => "none",
								__("Box",'apcore') => "box",
								__("Box With Separator",'apcore') => "box_withseparator"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style10', 'style11')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "boxbackgroundcolor2",
							'value'				=> '#fff',
							'dependency'		=> array( 'element' => 'postdesign2', 'value' => array('box','box_withseparator')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "boxbordercolor2",
							'value'				=> '#eee',
							'dependency'		=> array( 'element' => 'postdesign2', 'value' => array('box','box_withseparator')),
						),
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow2',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						   'dependency'		=> array( 'element' => 'postdesign2', 'value' => array('box','box_withseparator')),
						),
						
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow4',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						   'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style8')),
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
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Meta Border Color",'apcore'),
							"param_name"		=> "postmetabordercolor",
							'value'				=> '#f6f5f5',
							'dependency'		=> array( 'element' => 'postdesign2', 'value' => array('box_withseparator')),
						),						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Post separator Show/Hide",'apcore'),
							"param_name"		=> "postseparatorshowhide",
							'value'				=> array(__("Hide",'apcore') => "hide",__("Show",'apcore') => "show"),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style_large','style_medium','style_small', 'style11', 'style12')),
						),
						array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Post separator Image", "apcore"),
							"param_name"		=> "postseparatorimage",
							"value"				=> "",
							'dependency'		=> array( 'element' => 'postseparatorshowhide', 'value' => array('show')),
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Meta Text Color",'apcore'),
							"param_name"		=> "blgstylemetacolor",
							"value"				=> '#ffffff', 
							'dependency'		=> array( 'element' => 'style', 'value' => array('style2', 'style3', 'style5', 'style6', 'style7'))	
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
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style14'))
						),				
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Overlay Color",'apcore'),
							"param_name"		=> "blgcrslimgoverlay",
							"value"				=> 'rgba(0, 0, 0, 0.1)',
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),	
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Overlay Hover color",'apcore'),
							"param_name"		=> "blgcrslhovercolor",
							"value"				=> 'rgba(0, 0, 0, 0.8)',
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),	
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Title Hover Color",'apcore'),
							"param_name"		=> "blgstylehovercolor",
							"value"				=> '#0187a0', 
							'dependency'		=> array( 'element' => 'style', 'value' => array('style8'))
						),						
						array(
							"type"				=> "checkbox",
							"class"				=> "",
							"heading"			=> __("Full Height Post",'apcore'),
							"param_name"		=> "fullheightpost",
						   	'value' 			=> array(  'Yes'  => true ),
						   'dependency'			=> array( 'element' => 'style', 'value' => array('style14'))
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Post Top Padding",'apcore'),
							"param_name"		=> "posttoppadding",
							'step'				=> '1',
							'value'				=> '120',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style14')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Post Bottom Padding",'apcore'),
							"param_name"		=> "postbottompadding",
							'step'				=> '1',
							'value'				=> '120',
							'suffix'			=> 'px',							
							'dependency'		=> array( 'element' => 'style', 'value' => array('style14')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Font Awesome Zoom Icon",'apcore'),
							"param_name"		=> "blgcrslzoomicon",
							'value'				=> 'fa fa-search-plus',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Font Awesome Link Icon",'apcore'),
							"param_name"		=> "blgcrsllinkicon",
							'value'				=> 'fa fa-link',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Background",'apcore'),
							"description"		=> __("for Zoom and Link Icon", "apcore"),
							"param_name"		=> "blgcrslbuttonbg",
							"value"				=> '#00c8ec', 
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Background",'apcore'),
							"description"		=> __("for Zoom and Link Icon", "apcore"),
							"param_name"		=> "blgcrslbuttonhovbg",
							"value"				=> '#0187a0', 
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),						
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Show filter', 'apcore'),
							'param_name'		=> 'blgshowfilter',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Filter Button Style', 'apcore' ),
							'param_name'  => 'filter_button_style',
							'simple_mode' => false,
							'options'     => array(
								'filter_button_style1' => array(
									'tooltip' => esc_attr__('Filter Button Style1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/filter/filter_button_style1.jpg'
								),
								'filter_button_style2' => array(
									'tooltip' => esc_attr__('Filter Button Style2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/filter/filter_button_style2.jpg'
								),
							),
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							'type'				=> 'zolo_number',
							"heading"			=> __("Filter button Font Size",'apcore'),
							"param_name"		=> "filter_fontsize",
							'step'				=> '1',
							'value'				=> '16',
							'suffix'			=> 'px',
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Filter button alignment",'apcore'),
							"param_name"		=> "filter_button_align",
							'value'				=> array(__("Left",'apcore') => "left",__("Center",'apcore') => "center",__("Right",'apcore') => "right"),
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(						
							"type"				=> "dropdown",
							"heading"			=> __("Filter Button Border Radius",'apcore'),
							"param_name"		=> "filter_buttonborradi",
							'value'				=> array(
								__("Square",'apcore') => "0",
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "100",								
								
								),
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button text color",'apcore'),
							"param_name"		=> "filter_button_text_color",
							"value"				=> '#fff',
							"description"		=> __("Filter button text color",'apcore'),	
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),	
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button hover text color",'apcore'),
							"param_name"		=> "filter_button_text_hover_color",
							"value"				=> '#fff',
							"description"		=> __("Filter button hover text color",'apcore'),	
							'dependency'		=> array('element' => 'blgshowfilter', 'value' => 'yes'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button background color",'apcore'),
							"param_name"		=> "filter_button_bg_color",
							"value"				=> '#549ffc',
							"description"		=> __("Filter button background color",'apcore'),	
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),	
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button hover background color",'apcore'),
							"param_name"		=> "filter_button_bg_hover_color",
							"value"				=> '#3174c8',
							"description"		=> __("Filter button hover background color",'apcore'),	
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),	
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Filter', 'apcore'),	
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Filter button border color",'apcore'),
							"param_name"		=> "filter_button_border_color",
							"value"				=> '#3174c8',
							"description"		=> __("Filter button border color",'apcore'),	
							'dependency'		=> array('element' => 'filter_button_style', 'value' => 'filter_button_style1'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',	
							'group'				=> esc_html__('Filter', 'apcore'),	
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Navigation type",'apcore'),
							"param_name"		=> "blog_navigation",
							'value'				=> array(
								__("None",'apcore') => "none",
								__("Default",'apcore') => "default",
								__("Classic navigation",'apcore') => "classic_nav",
								__("Load more button",'apcore') => "loadmore_nav"
							),
							'group'				=> esc_html__('Navigation', 'apcore'),
						),						
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation text color",'apcore'),
							"param_name"		=> "nav_color",
							"value"				=> '#000000',
							"description"		=> __("navigation text color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),		
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation background",'apcore'),
							"param_name"		=> "nav_bg",
							"value"				=> '#eeeeee',
							"description"		=> __("navigation background",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	 			 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation border color",'apcore'),
							"param_name"		=> "nav_border",
							"value"				=> '#eeeeee',
							"description"		=> __("navigation border color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Current navigation text color",'apcore'),
							"param_name"		=> "nav_hover_color",
							"value"				=> '#ffffff',
							"description"		=> __("Current navigation text color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Current navigation background color",'apcore'),
							"param_name"		=> "nav_hover_bg",
							"value"				=> '#549ffc',
							"description"		=> __("Current navigation background color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Number of post to load on click",'apcore'),
							"param_name"		=> "blog_click",
							"value"				=> __("4",'apcore'),
							"description"		=> __("Number of post loaded when Load more clicked",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button background color",'apcore'),
							"param_name"		=> "button_bg",
							"value"				=> '#549ffc',
							"description"		=> __("button background color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),	 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button text color",'apcore'),
							"param_name"		=> "button_title",
							"value"				=> '#fff',
							"description"		=> __("button text color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button border color",'apcore'),
							"param_name"		=> "button_border",
							"value"				=> '#549ffc',
							"description"		=> __("button border color",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),							 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button text color hover",'apcore'),
							"param_name"		=> "button_hover_title",
							"value"				=> '#fff',
							"description"		=> __("Text color on hover",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						),				 
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Loadmore button background color hover",'apcore'),
							"param_name"		=> "button_hover_bg",
							"value"				=> '#549ffc',
							"description"		=> __("Background color on hover",'apcore'),			
							'dependency'		=> array( 'element' => 'blog_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
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
							"value"				=> "500",
							"description"		=> __("Delay","apcore"),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
						),
						array(
							'type'				=> 'zolo_video_link_param',
							'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
							'param_name'		=> 'tutorials',
							'doc_link'			=> $doc_link,
							'video_link'		=> 'https://youtu.be/Z1bRn0uKNvE',
						),	
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Title Style', 'apcore'),
							'param_name'		=> 'title_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Typography', 'apcore'),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'title_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Typography', 'apcore'),
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
							'group'				=> esc_html__('Typography', 'apcore'),
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
							'group'				=> esc_html__('Typography', 'apcore'),
						),
						
					),
				) );		
		
			}		