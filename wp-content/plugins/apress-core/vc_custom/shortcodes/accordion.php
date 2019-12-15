<?php
if (!defined('ABSPATH')) {exit;}
/*
 * Add-on Name: Announcement Line
 */
VcShortcodeAutoloader::getInstance()->includeClass('WPBakeryShortCode_VC_Tta_Accordion');

class WPBakeryShortCode_apress_accordion extends WPBakeryShortCode_VC_Tta_Accordion {
	public function getFileName() {
		return 'apress_tta_global';
	}
}

$doc_link = 'http://apressthemes.com/apress/documentation';

vc_map(
	array (
		'name'						=> esc_html__('Accordion', 'apcore'),
		'base'						=> 'apress_accordion',
		'class'						=> 'apress_accordion apress_shortcode',
		"icon"						=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-accordion.png",
		"weight"					=> 31,
		'is_container'				=> true,
		'show_settings_on_create'	=> true,
		'as_parent'					=> array ('only' => 'vc_tta_section',),
		'category'					=> esc_html__('Apress', 'apcore'),
		'description'				=> esc_html__('Collapsible content panels', 'apcore'),
		'params'					=> array (
			array(
				'type'        => 'radio_image_select',
				'heading'     => esc_html__( 'Style', 'apcore' ),
				'param_name'  => 'style',
				'simple_mode' => false,
				'admin_label' => true,
				'options'     => array(
				'accordion_style1' => array(
					'tooltip' => esc_attr__('Accordion Style1','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style1.jpg'
				),
				'accordion_style2' => array(
					'tooltip' => esc_attr__('Accordion Style2','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style2.jpg'
				),
				'accordion_style3' => array(
					'tooltip' => esc_attr__('Accordion Style3','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style3.jpg'
				),
				'accordion_style4' => array(
					'tooltip' => esc_attr__('Accordion Style4','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style4.jpg'
				),
				'accordion_style5' => array(
					'tooltip' => esc_attr__('Accordion Style5','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style5.jpg'
				),
				'accordion_style6' => array(
					'tooltip' => esc_attr__('Accordion Style6','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style6.jpg'
				),
				'accordion_style7' => array(
					'tooltip' => esc_attr__('Accordion Style7','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style7.jpg'
				),
				'accordion_style8' => array(
					'tooltip' => esc_attr__('Accordion Style8','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style8.jpg'
				),
				'accordion_style9' => array(
					'tooltip' => esc_attr__('Accordion Style9','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/accordion/accordion_style9.jpg'
				),
			),
			),
			array(
				'type'				=> 'zolo_number',
				'heading'			=> esc_html__('Top & Bottom Padding', 'apcore'),
				'param_name'		=> 'top_bottom_padding',
				'value'				=> '',
				'suffix' 			=> 'px',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
			),

			array(
				'type'				=> 'zolo_number',
				'heading'			=> esc_html__('Gutter Space', 'apcore'),
				'param_name'		=> 'gutter_space',
				'value'				=> 20,
				'suffix' 			=> 'px',
			),
			array(
			   'type'				=> 'zolo_box_shadow_param',
			   'heading'			=> esc_html__('Tab Container Shadow', 'apcore'),
			   'param_name'			=> 'box_shadow',
			   "value"				=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
			   'dependency'			=> array('element' => 'style', 'value' => array( 'accordion_style1', 'accordion_style2', 'accordion_style3', 'accordion_style4', 'accordion_style5', 'accordion_style6')),
			),
			array (
				'type'				=> 'checkbox',
				'heading'			=> esc_html__('Allow collapse all?', 'apcore'),
				'param_name'		=> 'collapsible_all',
				'description'		=> esc_html__('Allow collapse all accordion sections.', 'apcore'),
			),			
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__('Auto Play', 'apcore'),
				'param_name'		=> 'autoplay',
				'value'				=> array(
					__('None', 'apcore') => 'none',
					'1'  => '1',
					'2'  => '2',
					'3'  => '3', 
					'4'  => '4',
					'5'  => '5',
					'10'  => '10',
					'20'  => '20',
					'30'  => '30',
					'40'  => '40',
					'50'  => '50',
					'60'  => '60',
				),
				'description'		=> esc_html__('Select auto rotate for tabs in seconds (Note: disabled by default).', 'apcore'),
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Active section', 'apcore'),
				'param_name'		=> 'active_section',
				'value'				=> 1,
				'description'		=> esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'apcore'),
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
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin',
			),  
			array(
				"type"				=> "textfield",
				"class"				=> "",
				"heading"			=> __("Delay",'apcore'),
				"param_name"		=> "data_delay",
				"value"				=> '500',
				"description"		=> __("Delay",'apcore'),
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin',
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
				'video_link'		=> 'https://youtu.be/uE3CsoShEd0',
			),
			
			array(
				"type" 			=> "colorpicker",
				'heading'   	=> esc_html__( 'Accordion Background color', 'apcore' ),
				"param_name"	=> "tab_background_color",
				'value'			=> '#e5e5e5',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'dependency'	=> array('element' => 'style', 'value' => array( 'accordion_style1', 'accordion_style2', 'accordion_style3', 'accordion_style4', 'accordion_style5', 'accordion_style6')),
				'group'			=> esc_html__('Accordions Style', 'apcore'),
			),
			array(
				"type" 			=> "colorpicker",
				'heading'   	=> esc_html__( 'Accordion Border color', 'apcore' ),
				"param_name"	=> "tab_border_color",
				'value'			=> '#e5e5e5',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'dependency'	=> array('element' => 'style', 'value' => array('accordion_style4', 'accordion_style5', 'accordion_style6', 'accordion_style7', 'accordion_style8', 'accordion_style9')),
				'group'			=> esc_html__('Accordions Style', 'apcore'),
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> __("Select Active Accordion Color Scheme",'apcore'),
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
				'group'			=> esc_html__('Accordions Style', 'apcore'),
			),
			array(
				"type"			=> "colorpicker",
				"heading"		=> __("Active Accordion Color",'apcore'),
				"param_name"	=> "active_tab_color",
				"value"			=> '',
				'dependency'	=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
				'group'			=> esc_html__('Accordions Style', 'apcore'),
			),
			array(
				'type'				=> 'zolo_number',
				'heading'			=> esc_html__('Highlight Border height', 'apcore'),
				'param_name'		=> 'active_tab_highlight_border_height',
				'value'				=> 2,
				'suffix' 			=> 'px',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap vc_column-with-padding',
				'dependency'	=> array('element' => 'style', 'value' => array('accordion_style7', 'accordion_style8', 'accordion_style9')),
				'group'			=> esc_html__('Accordions Style', 'apcore'),
			),
			array(
				"type" 			=> "colorpicker",
				'heading'   	=> esc_html__( 'Accordion Icon color', 'apcore' ),
				"param_name"	=> "tab_icon_color",
				'value'			=> '#e5e5e5',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'group'			=> esc_html__('Icon Style', 'apcore'),
			),
			
			array(
				"type" 			=> "colorpicker",
				'heading'   	=> esc_html__( 'Active Accordion Icon color', 'apcore' ),
				"param_name"	=> "active_tab_icon_color",
				'value'			=> '#0000ef',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'group'			=> esc_html__('Icon Style', 'apcore'),
			),
			array(
				'type'				=> 'zolo_number',
				'heading'			=> esc_html__('Icon size', 'apcore'),
				'param_name'		=> 'icon_size',
				'value'				=> 16,
				'suffix' 			=> 'px',
				'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'group'			=> esc_html__('Icon Style', 'apcore'),
			),
			array(
				'type'				=> 'zolo_param_heading',
				'text'				=> esc_html__('Title Style', 'apcore'),
				'param_name'		=> 'tab_title_heading',
				'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type'				=> 'zolo_font_container',
				'heading'			=> '',
				'param_name'		=> 'tab_title_font_options',
				'settings'				=> array(
					'fields'				=> array(
						'font_size',							
						'line_height',
						'letter_spacing',
						'font_style',
					),
				),
				'group'			=> esc_html__('Typography', 'apcore'),
			),		
			array(
				'type'				=> 'zolo_radio_advanced',
				'heading'			=> esc_html__('Custom font family', 'apcore'),
				'param_name'		=> 'tab_title_google_fonts',
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
				'param_name'		=> 'tab_title_custom_fonts',
				'settings'			=> array(
					'fields'			=> array(
						'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
						'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
					),
				),
				'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
				'dependency' => array( 'element' => 'tab_title_google_fonts', 'value' => 'yes'),
				'group'				=> esc_html__('Typography', 'apcore'),
			),
			array(
				"type" 			=> "colorpicker",
				'heading'   	=> esc_html__( 'Accordion Title color', 'apcore' ),
				"param_name"	=> "tab_title_color",
				'value'			=> '#000000',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'group'			=> esc_html__('Typography', 'apcore'),
			),
			
			array(
				"type" 			=> "colorpicker",
				'heading'   	=> esc_html__( 'Active Accordion Title color', 'apcore' ),
				"param_name"	=> "active_tab_title_color",
				'value'			=> '#0000ef',
				'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
				'group'			=> esc_html__('Typography', 'apcore'),
			),
			array(
				'type' => 'css_editor',
				'heading' => esc_html__('CSS box', 'apcore'),
				'param_name' => 'css',
				'group' => esc_html__('Design Options', 'apcore'),
			),

		),
		'js_view' => 'VcBackendTtaAccordionView',
		'custom_markup' => '
			<div class="vc_tta-container" data-vc-action="collapseAll">
				<div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
					<div class="vc_tta-panels vc_clearfix {{container-class}}">
					{{ content }}
						<div class="vc_tta-panel vc_tta-section-append">
							<div class="vc_tta-panel-heading">
								<h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
								   <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
										<span class="vc_tta-title-text">' . esc_html__('Add Section', 'apcore') . '</span>
										<i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
									</a>
								</h4>
							</div>
						</div>
					</div>
				</div>
			</div>',
		'default_content' => '[vc_tta_section title="' . sprintf('%s %d', esc_html__('Section', 'apcore'), 1) . '"][/vc_tta_section][vc_tta_section title="' . sprintf('%s %d', esc_html__('Section', 'apcore'), 2) . '"][/vc_tta_section]',
	)
);