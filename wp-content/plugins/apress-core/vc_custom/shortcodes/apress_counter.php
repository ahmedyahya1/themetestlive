<?php 
/*-----------------------------------------------------------------------------------*/
/* Counter
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!class_exists('Apress_Counter')) {
	class Apress_Counter {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_counter_init' ) );
			add_shortcode( 'apress_counter', array( &$this, 'apress_counter' ) );
		}
		
		function apress_counter_init() {	
			
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
			
			$post_type_options = array();
			foreach ( get_post_types( '', 'names' ) as $post_type ) {
				$post_type_options[] = $post_type;
			}
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
				"name"				=> __("Counter", 'apcore'),
				"base"				=> "apress_counter",
				"class"			=> "",
				"weight"		=> 2,
				"category"		=> __( "Apress", "apcore"),
				"description"	=> __("Beutiful Counter Design", "apcore"),
				"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-counter.png",
				"params"		=> array(					
					
					array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Choose Style', 'apcore' ),
							'param_name'  => 'style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Counter Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/counter/counter_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Counter Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/counter/counter_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Counter Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/counter/counter_style3.jpg'
								),
								'style4' => array(
									'tooltip' => esc_attr__('Counter Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/counter/counter_style4.jpg'
								),
					
							),
						),
						
					array(
						'type'				=> 'zolo_radio_advanced',
						'heading'			=> esc_html__('Alignment', 'apcore'),
						'param_name'		=> 'counter_alignment',
						'value'				=> 'center',
						'options'			=> array(
							esc_html__('Left', 'apcore')	=> 'left',
							esc_html__('Center', 'apcore') 	=> 'center',
							esc_html__('Right', 'apcore')	=> 'right',
						),
					),
					array(
						'type'				=> 'zolo_radio_advanced',
						'heading'			=> esc_html__('Icon', 'apcore'),
						'param_name'		=> 'icon_type_enable',
						'value'				=> 'font_icon',
						'options'			=> array(
							esc_html__('Icon', 'apcore')	=> 'font_icon',
							esc_html__('Image', 'apcore') 	=> 'image_icon',
						),
						'dependency'		=> array('element' => 'style', "value" => array('style2', 'style3', 'style4')),
					),
					array(
							"type"				=> "attach_image",
							"class"				=> "",
							"heading"			=> __("Image", "apcore"),
							"param_name"		=> "image",
							"value"				=> "",
							'dependency'		=> array('element' => 'icon_type_enable', "value" => 'image_icon'),
						),
					array(
						"type"				=> "dropdown",
						"heading"			=> __( "Icon library", "apcore" ),
						"value"				=> array(
							__( "Font Awesome", "apcore" ) => "fontawesome",
							__( "Open Iconic", "apcore" ) => "openiconic",
							__( "Typicons", "apcore" ) => "typicons",
							__( "Entypo", "apcore" ) => "entypo",
							__( "Linecons", "apcore" ) => "linecons",
							__( "Mono Social", "apcore" ) => "monosocial",
							__( 'Linea', 'apcore' ) => 'linea',
						),
						"save_always"		=> true,
						"param_name"		=> "icon_family",
						"description"		=> __( "Select icon library.", "apcore" ),
						'dependency'		=> array('element' => 'icon_type_enable', "value" => 'font_icon'),
					),
					array(
						'type'				=> 'iconpicker',
						"heading"			=> __('Icon', 'apcore'),
						"param_name"		=> 'icon_fontawesome',
						"value"				=> 'fa fa-adjust',
						'settings'			=> array( 'emptyIcon' => false, 'iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family', "value" => 'fontawesome'),
						'description'		=> __('Select icon from library.', 'apcore'),
						//'group'				=> __( 'Main content', 'apcore' ),
					),	
					array(
						'type'				=> 'iconpicker',
						"heading"			=> __( 'Icon', 'apcore' ),
						"param_name"		=> 'icon_openiconic',
						"value"				=> 'vc-oi vc-oi-dial',
						'settings'			=> array('emptyIcon' => false, 'type' => 'openiconic', 'iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family','value' => 'openiconic'),
						'description'		=> __( 'Select icon from library.', 'apcore' ),
						//'group'				=> __( 'Main content', 'apcore' ),
					),	
					array(
						'type'				=> 'iconpicker',
						"heading"			=> __( 'Icon', 'apcore' ),
						"param_name"		=> 'icon_typicons',
						"value"				=> 'typcn typcn-adjust-brightness',
						'settings'			=> array('emptyIcon' => false,'type' => 'typicons','iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family','value' => 'typicons'),
						'description'		=> __( 'Select icon from library.', 'apcore'),
						//'group'				=> __( 'Main content', 'apcore' ),
					),
					array(
						'type'				=> 'iconpicker',
						"heading"			=> __( 'Icon', 'apcore' ),
						"param_name"		=> 'icon_entypo',
						"value"				=> 'entypo-icon entypo-icon-note',
						'settings'			=> array('emptyIcon' => false,'type' => 'entypo','iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family','value' => 'entypo'),
						'description'		=> __( 'Select icon from library.', 'apcore' ),
						//'group'				=> __( 'Main content', 'apcore' ),
					),
					array(
						'type'				=> 'iconpicker',
						"heading"			=> __( 'Icon', 'apcore' ),
						"param_name"		=> 'icon_linecons',
						"value"				=> 'vc_li vc_li-heart',
						'settings'			=> array('emptyIcon' => false,'type' => 'linecons','iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family','value' => 'linecons'),
						'description'		=> __( 'Select icon from library.', 'apcore' ),
						//'group'				=> __( 'Main content', 'apcore' ),
					),	
					array(
						'type'				=> 'iconpicker',
						"heading"			=> __( 'Icon', 'apcore' ),
						"param_name"		=> 'icon_monosocial',
						"value"				=> 'vc-mono vc-mono-fivehundredpx',
						'settings'			=> array('emptyIcon' => false,'type' => 'monosocial','iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family','value' => 'monosocial'),
						'description'		=> __( 'Select icon from library.', 'apcore' ),
						//'group'				=> __( 'Main content', 'apcore' ),
					),	
					array(
						'type'				=> 'iconpicker',
						'heading'			=> __('Icon', 'apcore'),
						'param_name'		=> 'icon_linea',
						'value'				=> 'icon-basic-heart',
						'settings'			=> array( 'emptyIcon' => true, 'type' => 'linea', 'iconsPerPage' => 4000),
						'dependency'		=> array('element' => 'icon_family', 'value' => 'linea'),
						'description'		=> __('Select icon from library.', 'apcore'),
						//'group'				=> __( 'Main content', 'apcore' ),
					),
					array(
						 "type" 			=> "zolo_number",
						 'suffix' 			=> 'px',
						 "class" 			=> "",
						 "heading" 			=> __("Icon Size", "apcore"),
						 "param_name" 		=> "icon_size",
						 "admin_label" 		=> true,
						 "value" 			=> "40",
						 'dependency'		=> array('element' => 'style', "value" => array('style2', 'style3', 'style4')),
					),
					
					array(
						"type"				=> "dropdown",
						"heading"			=> __("Select Color Scheme",'apcore'),
						"param_name"		=> "color_scheme",
						"value"				=> array(
							__("Primary Color",'apcore') 	=> "primary_color_scheme",
							__("Color Scheme 1",'apcore') 	=> "color_scheme1",
							__("Color Scheme 2",'apcore') 	=> "color_scheme2",
							__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
							__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
							__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
							__("Custom Color",'apcore') 		=> "design_your_own"
						),
						'dependency'		=> array('element' => 'icon_type_enable', "value" => 'font_icon'),
					),	
					array(
						"type"				=> "colorpicker",
						"heading"			=> __("Icon Color",'apcore'),
						"param_name"		=> "custom_color",
						"value"				=> '#549ffc',
						'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
					),
					
					array(
						 "type" => "textfield",
						 "class" => "",
						 "heading" => __("Counter Title ", "apcore"),
						 "param_name" => "counter_title",
						 "admin_label" => true,
						 "value" => "",
						 "description" => __("Enter title for stats counter block", "apcore")
					),
					array(
						 "type" => "textfield",
						 "class" => "",
						 "heading" => __("Counter Start Value", "apcore"),
						 "param_name" => "counter_from",
						 "value" => "0",
						 "description" => __("Enter number for counter without any special character. You may enter a decimal number. Eg 67.89", "apcore")
					),
					array(
						 "type" => "textfield",
						 "class" => "",
						 "heading" => __("Counter End Value", "apcore"),
						 "param_name" => "counter_to",
						 "value" => "170",
						 "description" => __("Enter number for counter without any special character. You may enter a decimal number. Eg 1009.95", "apcore")
					),
					array(
						 "type" => "textfield",
						 "class" => "",
						 "heading" => __("Thousands Separator", "apcore"),
						 "param_name" => "counter_sep",
						 "value" => ",",
						 "description" => __("Enter character for thousand separator. e.g. ',' will separate 125000 into 125,000", "apcore")
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Decimal Place", "apcore"),
						"param_name" => "decimal_place",
						"value" => '',
						"description" => __("The Number of decimals place to show. e.g - 2", "apcore")
					),
					array(
						 "type" => "textfield",
						 "class" => "",
						 "heading" => __("Counter Value Prefix", "apcore"),
						 "param_name" => "counter_prefix",
						 "value" => "",
						 "description" => __("Enter prefix for counter value", "apcore")
					),
					array(
						 "type" => "textfield",
						 "class" => "",
						 "heading" => __("Counter Value Suffix", "apcore"),
						 "param_name" => "counter_suffix",
						 "value" => "",
						 "description" => __("Enter suffix for counter value", "apcore")
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Counter rolling time", "apcore"),
						"param_name" => "speed",
						"value" => "2000",
						"description" => __("How many seconds the counter should roll?", "apcore")
					),
					array(
						"type"				=> "zolo_param_heading",
						"text"				=> esc_html__("Extra features", "apcore"),
						"param_name"		=> "subtitle_margin_heading",
						"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin",
					),
					array(
						"type"				=> "dropdown",
						"class"				=> "",
						"heading"			=> __("CSS Animation","apcore"),
						"param_name"		=> "data_animation ",
						"value"				=> apress_data_animations(),
						"description"		=> __("Select type of animation. Note: Works only in modern browsers.","apcore"),
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
						"video_link"		=> "https://youtu.be/3sFaLsVDXeo",
					),
					array(
						"type"				=> "css_editor",
						"heading"			=> __( "CSS box", "apcore" ),
						"param_name"		=> "css",
						"group"				=> __( "Design Options", "apcore" ),
					),
					
					
					
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Title Typography', 'apcore'),
					'param_name'		=> 'title_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Title Style', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'title_font_options',
					'settings'			=> array(
						'fields'			=> array(
							'font_size',
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
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
					'text'				=> esc_html__('Counter Number Typography', 'apcore'),
					'param_name'		=> 'number_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Number Style', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'number_font_options',
					'settings'			=> array(
						'fields'			=> array(
							'font_size',
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
					'group'				=> esc_html__('Number Style', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'number_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Number Style', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'number_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'dependency' => array( 'element' => 'number_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Number Style', 'apcore'),
				),
				
				
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Counter Prefix & Suffix Typography', 'apcore'),
					'param_name'		=> 'pre_suf_heading',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Prefix & Suffix Style', 'apcore'),
				),
				array(
					'type'				=> 'zolo_font_container',
					'heading'			=> '',
					'param_name'		=> 'pre_suf_font_options',
					'settings'			=> array(
						'fields'			=> array(
							'font_size',
							'line_height',
							'letter_spacing',
							'font_style',
							'color',
						),
					),
					'group'				=> esc_html__('Prefix & Suffix Style', 'apcore'),
				),
				array(
					'type'				=> 'zolo_radio_advanced',
					'heading'			=> esc_html__('Custom font family', 'apcore'),
					'param_name'		=> 'pre_suf_google_fonts',
					'value'				=> 'no',
					'options'			=> array(
						esc_html__('Yes', 'apcore')	=> 'yes',
						esc_html__('No', 'apcore') => 'no',
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'group'				=> esc_html__('Prefix & Suffix Style', 'apcore'),
				),
				array(
					'type'				=> 'google_fonts',
					'param_name'		=> 'pre_suf_custom_fonts',
					'settings'			=> array(
						'fields'			=> array(
							'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
							'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
						),
					),
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
					'dependency' => array( 'element' => 'pre_suf_google_fonts', 'value' => 'yes'),
					'group'				=> esc_html__('Prefix & Suffix Style', 'apcore'),
				),
				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Counter Title responsive settings', 'apcore'),
					'param_name'		=> 'title_heading_responsive',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_responsive_text',
					//'heading'			=> esc_html__('Title responsive settings', 'apcore'),
					'param_name'		=> 'title_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Counter Number responsive settings', 'apcore'),
					'param_name'		=> 'number_heading_responsive',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_responsive_text',
					//'heading'			=> esc_html__('Title responsive settings', 'apcore'),
					'param_name'		=> 'number_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),	
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Counter Prefix & Suffix responsive settings', 'apcore'),
					'param_name'		=> 'pre_suf_heading_responsive',
					'class'				=> 'zolo-param-heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),
				array(
					'type'				=> 'zolo_param_responsive_text',
					//'heading'			=> esc_html__('Title responsive settings', 'apcore'),
					'param_name'		=> 'pre_suf_responsive',
					'edit_field_class'	=> 'vc_column vc_col-sm-12 no-bottom-padding no-border-bottom',
					'group'				=> esc_html__('Responsive', 'apcore'),
				),		
					
					
					
					
				),
			) 
				);
			}
		}

function apress_counter( $atts, $content=null ){
			$height = $output = $height_on_tabs = $height_on_mob = '';
			extract(shortcode_atts(array(
				'style'									=> 'style1',
				'counter_alignment'						=> 'center',
				'icon_type_enable'						=> 'font_icon',
				'image'									=> '',
				'icon_size'								=> '40',
				'color_scheme'							=> 'primary_color_scheme',
				'custom_color'							=> '#549ffc',
				'icon_family'							=> '',
				'icon_fontawesome'						=> 'fa fa-adjust',
				'icon_openiconic'						=> 'vc-oi vc-oi-dial',
				'icon_typicons'							=> 'typcn typcn-adjust-brightness',
				'icon_entypo'							=> 'entypo-icon entypo-icon-note',
				'icon_linecons'							=> 'vc_li vc_li-heart',
				'icon_monosocial'						=> 'vc-mono vc-mono-fivehundredpx',
				'icon_linea'							=> 'icon-basic-heart',
				'counter_title'							=> '',
				'counter_from'							=> '0',
				'counter_to'							=> '170',
				'counter_sep'							=> ',',
				'counter_suffix'						=> '',
				'counter_prefix'						=> '',
				'decimal_place'							=> '',
				'speed'									=> '2000',
				
				'title_font_options'					=> '',
				'title_google_fonts'					=> '',
				'title_custom_fonts'					=> '',
				'title_responsive'						=> '',
				
				'number_font_options'					=> '',
				'number_google_fonts'					=> '',
				'number_custom_fonts'					=> '',
				'number_responsive'						=> '',
				
				'pre_suf_font_options'					=> '',
				'pre_suf_google_fonts'					=> '',
				'pre_suf_custom_fonts'					=> '',
				'pre_suf_responsive'					=> '',
				
				'data_animation'						=> 'No Animation',
				'data_delay'							=> '500',	
				'css'									=> '',
				
			),$atts));
			ob_start();	
			
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
				$icon = $icon;
			} 
			else {
				$icon = null;
			}
			// Enqueue needed icon font.
			vc_icon_element_fonts_enqueue( $icon_family );
			
			//regular(grad) linea
			if(!empty($icon_family) && $icon_family == 'linea') {
				wp_enqueue_style('zt-linea'); 
			}
			
			$key = $color_scheme;
			$text_color_scheme = apcore_shortcodes_text_color_scheme($key);
			
			if($color_scheme == 'design_your_own'){
				$icon_color = 'color:'.$custom_color.'';
			}else{ 
				
				$icon_color = $text_color_scheme;
			}
			
			//Image
			$img = wp_get_attachment_image_src($image,'full');
			$image = $img[0];
			
			static $c = 1;
			//Animation			
			$animatedclass = ($data_animation == 'No Animation') ? 'noanimation' : 'animated hiding';	
			
			$class_to_filter = '';
			$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, 'zolo_icon_box', $atts );
			$css_class = esc_attr( trim( $css_class ) );
			
			// Title HTML.
			$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo_counter_title_text', $title_google_fonts, $title_custom_fonts);
			// Number HTML.
			$number_options = _zolo_parse_text_shortcode_params($number_font_options, 'zolo_counter_number_text', $number_google_fonts, $number_custom_fonts);
			// pre_suf HTML.
			$pre_suf_options = _zolo_parse_text_shortcode_params($pre_suf_font_options, 'zolo_counter_pre_suf_text', $pre_suf_google_fonts, $pre_suf_custom_fonts);
			
			
			$output = '<div id="zolo_counter_'.$c.'" class="zolo_counter_wrap zolo_counter_'.$style.'" style="text-align:'.$counter_alignment.';"><div class="zolo_counter_box">';
			
			//Counter Icon
			if($style == 'style2' || $style == 'style3'){
				if($icon_type_enable == 'font_icon'){
					$output .= '<div class="zolo_counter_icon_wrap"><div class="zolo_counter_icon" style="font-size:'.$icon_size.'px;"><i class="'.$icon.'"></i></div></div>';
				}else{
					$output .= '<div class="zolo_counter_icon_wrap"><div class="zolo_counter_icon" style="max-width:'.$icon_size.'px;"><img src="'.$image.'"/></div></div>';
					}
			}
			
			//Counter number
			$output .= '<div class="zolo_counter_number_wrap">';
			
			$output .= '<div class="zolo_counter_number_box">';
			if($counter_prefix !== ''){
				$output .= '<div class="zolo_counter_prefix apress-responsive" ' . $pre_suf_options['style'] . '>'.$counter_prefix.'</div>';
			}
			
			$output .='<div class="zolo_counter_number counter '. $animatedclass .' '. $css_class .'" data-animation="'. $data_animation .'" data-delay="'. $data_delay .'" ' . $number_options['style'] . '><span class="value" data-from="'. $counter_from .'" data-to="'. $counter_to .'" data-speed="'.$speed.'" data-decimals="'.$decimal_place.'" data-separator="'.$counter_sep.'">'. $counter_to .'</span></div>';
			
			if($counter_suffix !== ''){
				$output .= '<div class="zolo_counter_suffix apress-responsive" ' . $pre_suf_options['style'] . '>'.$counter_suffix.'</div>';
			}
			$output .= '</div>';
			
			//Counter Title
			$output .= '<div class="zolo_counter_title" ' . $title_options['style'] . '>'. $counter_title .'</div> ';
			$output .= '</div>';
			
			//Counter Icon
			if($style == 'style4'){
				if($icon_type_enable == 'font_icon'){
					$output .= '<div class="zolo_counter_icon_wrap"><div class="zolo_counter_icon" style="font-size:'.$icon_size.'px;"><i class="'.$icon.'"></i></div></div>';
				}else{
					$output .= '<div class="zolo_counter_icon_wrap"><div class="zolo_counter_icon" style="max-width:'.$icon_size.'px;"><img src="'.$image.'"/></div></div>';
					}
			}
			
			$output .= '</div></div>';
			
			
			echo $output;
			
			?>
            
<?php 
	$module_css = ''; 
	if(isset($title_responsive) && $title_responsive != '') {
		$module_css .= Zolo_Resposive_Text_Param::responsive_css($title_responsive, '#zolo_counter_' . esc_js($c) . ' .zolo_counter_title');
	}
	if(isset($number_responsive) && $number_responsive != '') {
		$module_css .= Zolo_Resposive_Text_Param::responsive_css($number_responsive, '#zolo_counter_' . esc_js($c) . ' .zolo_counter_number');
	}
	if(isset($pre_suf_responsive) && $pre_suf_responsive != '') {
		$module_css .= Zolo_Resposive_Text_Param::responsive_css($pre_suf_responsive, '#zolo_counter_' . esc_js($c) . ' .zolo_counter_suffix, #zolo_counter_' . esc_js($c) . ' .zolo_counter_prefix');
	}
	

$module_css .= '#zolo_counter_'.$c.' .zolo_counter_icon,
#zolo_counter_'.$c.' .zolo_counter_icon i,
#zolo_counter_'.$c.' .zolo_counter_icon i:before{display:inline-block;'.$icon_color.'}';
apcore_save_plugin_dyn_styles( $module_css );
?>
<?php 
		$c++;
		$demolp_output = ob_get_clean();
		return $demolp_output;
		}
	}
	
	$Apress_Counter = new Apress_Counter;
}
