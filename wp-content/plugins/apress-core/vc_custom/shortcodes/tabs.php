<?php

if (!defined('ABSPATH')) {
	exit;
}
/*
 * Add-on Name: Announcement Line
 */
VcShortcodeAutoloader::getInstance()->includeClass('WPBakeryShortCode_VC_Tta_Tabs');

class WPBakeryShortCode_apress_tta_tabs extends WPBakeryShortCode_VC_Tta_Tabs {

	public function getFileName() {
		return 'apress_tta_global';
	}

}

$doc_link = 'http://apressthemes.com/apress/documentation';

vc_map(array(
	'name' => esc_html__('Tabs', 'apcore'),
	'base' => 'apress_tta_tabs',
	"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-tab.png",
	'class' => 'apress_tabs apress_shortcode',
	"weight" => 29,
	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'vc_tta_section',
	),
	'category' => esc_html__('Apress', 'apcore'),
	'description' => esc_html__('Tabbed content', 'apcore'),
	'params' => array(
		array(
			'type'        => 'radio_image_select',
			'heading'     => esc_html__( 'Style', 'apcore' ),
			'param_name'  => 'style',
			'simple_mode' => false,
			'admin_label' => true,
			'options'     => array(
				'tab_style1' => array(
					'tooltip' => esc_attr__('Tab Style1','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style1.jpg'
				),
				'tab_style2' => array(
					'tooltip' => esc_attr__('Tab Style2','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style2.jpg'
				),
				'tab_style3' => array(
					'tooltip' => esc_attr__('Tab Style3','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style3.jpg'
				),
				'tab_style4' => array(
					'tooltip' => esc_attr__('Tab Style4','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style4.jpg'
				),
				'tab_style5' => array(
					'tooltip' => esc_attr__('Tab Style5','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style5.jpg'
				),
				'tab_style6' => array(
					'tooltip' => esc_attr__('Tab Style6','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style6.jpg'
				),
				'tab_style7' => array(
					'tooltip' => esc_attr__('Tab Style7','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style7.jpg'
				),
				'tab_style8' => array(
					'tooltip' => esc_attr__('Tab Style8','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style8.jpg'
				),
				'tab_style9' => array(
					'tooltip' => esc_attr__('Tab Style9','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style9.jpg'
				),
				'tab_style10' => array(
					'tooltip' => esc_attr__('Tab Style10','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style10.jpg'
				),
				'tab_style11' => array(
					'tooltip' => esc_attr__('Tab Style11','apcore'),
					'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/tab/tab_style11.jpg'
				),
			),
		),
		array(
			'type'				=> 'zolo_radio_advanced',
			'heading'			=> esc_html__('Full Width Tabs', 'apcore'),
			'param_name'		=> 'full_width_tabs',
			'value'				=> 'yes',
			'options'			=> array(
				esc_html__('Yes', 'apcore')	=> 'yes',
				esc_html__('No', 'apcore') => 'no',
			),
			'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
			'dependency'	=> array('element' => 'style', 'value' => array('tab_style2', 'tab_style3')),
		),
		
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Position', 'apcore'),
			'param_name' => 'tab_position',
			'value' => array(
				__('Top', 'apcore') => 'top',
				__('Bottom', 'apcore') => 'bottom',
			),
			'description' => esc_html__('Select tabs navigation position.', 'apcore'),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Tabs Section Title Alignment.', 'apcore'),
			'param_name' => 'alignment',
			'value' => array(
				__('Left', 'apcore') => 'left',
				__('Center', 'apcore') => 'center',
				__('Right', 'apcore') => 'right',
			),
			'description' => esc_html__('Select tabs section title alignment.', 'apcore'),
		),
		array(
			'type' => 'dropdown',
			'heading'	=> esc_html__('Auto Play', 'apcore'),
			'param_name' => 'autoplay',
			'value' => array(
				__('None', 'apcore') => 'none',
				'1' => '1',
				'2' => '2',
				'3' => '3', 
				'4' => '4',
				'5' => '5',
				'10' => '10',
				'20' => '20',
				'30' => '30',
				'40' => '40',
				'50' => '50',
				'60' => '60',
			),
			'description' => esc_html__('Select auto rotate for tabs in seconds (Note: disabled by default).', 'apcore'),
		),
		array(
			'type' => 'textfield',
			'heading'			=> esc_html__('Active section', 'apcore'),
			'param_name' => 'active_section',
			'value' => 1,
			'description' => esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'apcore'),
		),
		array(
			"type"				=> "zolo_padding",
			"heading"			=> "Panel Body Padding",
			"param_name"		=> "tab_panel_body_padding",
			"positions"			=> array(
				esc_html__("Top", "apcore")		=> "top",
				esc_html__("Bottom", "apcore")	=> "bottom",
				esc_html__("Left", "apcore")	=> "left",
				esc_html__("Right", "apcore")	=> "right",
			),
			"value"				=> "padding-top:20|padding-bottom:20|padding-left:20|padding-right:20",
			"edit_field_class"	=> "vc_column vc_col-sm-12 no-border-bottom",
		),
 		array(
		   'type'    => 'zolo_box_shadow_param',
		   'heading'	=> esc_html__('Tab Container Shadow', 'apcore'),
		   'param_name' => 'box_shadow',
		   "value"		=> 'box_shadow_enable:enable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		   'dependency'	=> array('element' => 'style', 'value' => array('tab_style4', 'tab_style7', 'tab_style9')), 
		),	
		array(
			'type'				=> 'zolo_param_heading',
			'text'				=> esc_html__('Extra features', 'apcore'),
			'param_name'		=> 'extra_features_elements_heading',
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
			'heading'   	=> esc_html__( 'Tab Background color', 'apcore' ),
			"param_name"	=> "tab_background_color",
			'value'			=> '#e5e5e5',
			'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
			'dependency'	=> array('element' => 'style', 'value' => array('tab_style1', 'tab_style2', 'tab_style4', 'tab_style6', 'tab_style7', 'tab_style8', 'tab_style9', 'tab_style11')), 
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			"type" 			=> "colorpicker",
			'heading'   	=> esc_html__( 'Tab Border color', 'apcore' ),
			"param_name"	=> "tab_border_color",
			'value'			=> '#e5e5e5',
			'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> __("Select Active Tab Color Scheme",'apcore'),
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
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			"type"			=> "colorpicker",
			"heading"		=> __("Active Tab Color",'apcore'),
			"param_name"	=> "active_tab_color",
			"value"			=> '',
			'dependency'	=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			'type'				=> 'zolo_number',
			'heading'			=> esc_html__('Highlight Border height', 'apcore'),
			'param_name'		=> 'active_tab_highlight_border_height',
			'value'				=> 2,
			'suffix' 			=> 'px',
			'dependency'	=> array('element' => 'style', 'value' => array('tab_style3', 'tab_style5', 'tab_style10')),
			'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap vc_column-with-padding',
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			'type'				=> 'zolo_number',
			'heading'			=> esc_html__('Tab Border Radius', 'apcore'),
			'param_name'		=> 'tab_border_radius',
			'value'				=> 50,
			'suffix' 			=> 'px',
			'dependency'	=> array('element' => 'style', 'value' => array('tab_style8')),
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			'type'				=> 'zolo_number',
			'heading'			=> esc_html__('Tab Background Dimension', 'apcore'),
			'param_name'		=> 'tab_background_dimension',
			'value'				=> 70,
			'suffix' 			=> 'px',
			'dependency'	=> array('element' => 'style', 'value' => array('tab_style11')),
			'group'			=> esc_html__('Tabs Style', 'apcore'),
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> __("Icon Position",'apcore'),
			"param_name"	=> "icon_position",
			"value"			=> array(
				__("Default",'apcore') 	=> "default",
				__("Top",'apcore') 	=> "icon_top",
			),
			'group'			=> esc_html__('Icon Style', 'apcore'),
		),
		array(
			"type" 			=> "colorpicker",
			'heading'   	=> esc_html__( 'Tab Icon color', 'apcore' ),
			"param_name"	=> "tab_icon_color",
			'value'			=> '#e5e5e5',
			'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
			'group'			=> esc_html__('Icon Style', 'apcore'),
		),
		
		array(
			"type" 			=> "colorpicker",
			'heading'   	=> esc_html__( 'Active Tab Icon color', 'apcore' ),
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
			'heading'   	=> esc_html__( 'Tab Title color', 'apcore' ),
			"param_name"	=> "tab_title_color",
			'value'			=> '#000000',
			'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc vc_column-with-padding',
			'group'			=> esc_html__('Typography', 'apcore'),
		),
		
		array(
			"type" 			=> "colorpicker",
			'heading'   	=> esc_html__( 'Active Tab Title color', 'apcore' ),
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
	
	'js_view' => 'VcBackendTtaTabsView',
	'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapse">
<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
<div class="vc_tta-tabs-container">'
	. '<ul class="vc_tta-tabs-list">'
	. '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
	. '</ul>
</div>
<div class="vc_tta-panels vc_clearfix {{container-class}}">
{{ content }}
</div>
</div>
</div>',
	'default_content' => '
[vc_tta_section title="' . sprintf('%s %d', esc_html__('Tab', 'apcore'), 1) . '"][/vc_tta_section]
[vc_tta_section title="' . sprintf('%s %d', esc_html__('Tab', 'apcore'), 2) . '"][/vc_tta_section]
',
	'admin_enqueue_js' => array(
		vc_asset_url('lib/vc_tabs/vc-tabs.min.js'),
	),
	//'front_enqueue_js' => get_template_directory_uri() .'/assets/js/tabsModelextended.js'
));
