<?php 
/*-----------------------------------------------------------------------------------*/
/* Post Grid
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Post_Grid extends WPBakeryShortCode {}

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
					"name"			=> __("Post Grid", 'apcore'),
					"base"			=> "apress_post_grid",
					"weight"		=> 3,
					"class"			=> "",
					"category"		=> __( "Apress", "apcore"),
					"description"	=> __("Different Post Grid Presentation", "apcore"),
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
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/post_grid/post_grid_style1.jpg'
								),
								
							),
						),

						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Post Categories", "apcore"),
							"description"		=> __("Please select the categories you would like to display for your blog. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $blog_options,
							'save_always'		=> true,							
						),				
						array(
							"type"				=> "textfield",
							"heading"			=> __("Number of Posts",'apcore'),
							"param_name"		=> "num",
							"value"				=> "5", 
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),   
						),
						array(
							'type'				=> 'zolo_number',
							'heading'			=> __('Gutter Space','apcore'),
							'param_name'		=> 'gutter',
							'step'				=> '1',
							'value'				=> '30',
							'suffix'			=> 'px',								
						),
						array(
							"type"				=> "textfield",
							"heading"			=> __("Excerpt Length",'apcore'),
							"param_name"		=> "excerptlength",
							'value'				=> '20',
						),	
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("List Border Color",'apcore'),
							"param_name"		=> "post_list_border",
							'value'				=> '#eee',
						),
						array(
							'type'				=> 'zolo_number',
							'heading'			=> __('Border Radius','apcore'),
							'param_name'		=> 'border_radius',
							'step'				=> '1',
							'value'				=> '0',
							'suffix'			=> 'px',								
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
							'video_link'		=> 'https://youtu.be/Z1bRn0uKNvE',
						),	
						
						
						array(
							"type"				=> "dropdown",
							"heading"			=> __("Button Show/Hide",'apcore'),
							"param_name"		=> "button_show_hide",
							'value'				=> array(
								__("Show",'apcore') => "show", 
								__("Hide",'apcore') => "hide"
							),
							'group'				=> esc_html__('Button', 'apcore'),
						),					
						array(
							"type"				=> "textfield",
							"heading"			=> __("Modify the button text",'apcore'),
							"param_name"		=> "button_modify",
							'value'				=> __("Read More",'apcore'),
							'dependency'		=> array( 'element' => 'button_show_hide', 'value' => array('show')),
							'group'				=> esc_html__('Button', 'apcore'),
						),
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Button Style', 'apcore' ),
							'param_name'  => 'button_style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/post_grid/button/button_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/post_grid/button/button_style2.jpg'
								),
							),
							'group'				=> esc_html__('Button', 'apcore'),
						),	
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Button Shape', 'apcore'),
							'param_name'		=> 'button_shape',
							'value'				=> 'round',
							'options'			=> array(
								esc_html__('Square', 'apcore') 	=> 'square',
								esc_html__('Rounded', 'apcore')	=> 'rounded',
								esc_html__('Round', 'apcore')	=> 'round',
							),
							'dependency' => array( 'element' => 'button_style', 'value' => array('style1')),
							'group'				=> esc_html__('Button', 'apcore'),
						),				
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Button font Color",'apcore'),
							"param_name"		=> "button_font_color",
							'value'				=> '',
							'dependency'		=> array( 'element' => 'button_show_hide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Button', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Button Hover font Color",'apcore'),
							"param_name"		=> "button_hover_font_color",
							'value'				=> '',
							'dependency'		=> array( 'element' => 'button_show_hide', 'value' => array('show')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Button', 'apcore'),
						),							
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Button Background Color",'apcore'),
							"param_name"		=> "button_bg_color",
							'value'				=> '#93cb40',
							'dependency' => array( 'element' => 'button_style', 'value' => array('style1')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Button', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Button Hover Background Color",'apcore'),
							"param_name"		=> "button_hover_bg_color",
							'value'				=> '#93cb40',
							'dependency' => array( 'element' => 'button_style', 'value' => array('style1')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
							'group'				=> esc_html__('Button', 'apcore'),
						),	
						
						
						
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Title Typography', 'apcore'),
							'param_name'		=> 'title_t_heading',
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
								),
							),
							'group'				=> esc_html__('Title Style', 'apcore'),
						),

						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Font Color",'apcore'),
							"param_name"		=> "title_color",
							"value"				=> '#333333',
							'group'				=> esc_html__('Title Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Hover Font Color",'apcore'),
							"param_name"		=> "title_hover_color",
							"value"				=> '#93cb40',
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
							'text'				=> esc_html__('Description Typography', 'apcore'),
							'param_name'		=> 'description_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
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
									'color' => '#575757',
								),
							),
							'group'				=> esc_html__('Description Style', 'apcore'),
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
							'text'				=> esc_html__('Button Typography', 'apcore'),
							'param_name'		=> 'button_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
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
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'button_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Button Style', 'apcore'),
						),
						
						
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Post Meta Typography', 'apcore'),
							'param_name'		=> 'meta_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Post Meta Style', 'apcore'),
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
							'group'				=> esc_html__('Post Meta Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Font Color",'apcore'),
							"param_name"		=> "meta_color",
							"value"				=> '#999999',
							'group'				=> esc_html__('Post Meta Style', 'apcore'),
						),
						array(
							"type"				=> "colorpicker",
							"heading"			=> __("Hover Font Color",'apcore'),
							"param_name"		=> "meta_hover_color",
							"value"				=> '#93cb40',
							'group'				=> esc_html__('Post Meta Style', 'apcore'),
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
							'group'				=> esc_html__('Post Meta Style', 'apcore'),
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
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'meta_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Post Meta Style', 'apcore'),
						),
					),
				) );		
		
			}		