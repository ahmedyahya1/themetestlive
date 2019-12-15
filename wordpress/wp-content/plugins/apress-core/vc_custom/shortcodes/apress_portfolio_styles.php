<?php 
/*-----------------------------------------------------------------------------------*/
/* Portfolio shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Portfolio_Styles_Module')) {
	class Apress_Portfolio_Styles_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_portfolio_styles_init' ) );
			add_shortcode( 'apress_portfolio_styles', array( &$this, 'apress_portfolio_styles' ) );
		}
		
		function apress_portfolio_styles_init() {
			$is_admin = is_admin();	
			$portfolio_types = ($is_admin) ? get_terms('catportfolio') : array('All' => 'all');
			$types_options = array("All" => "all");
			if($is_admin) {
				foreach ($portfolio_types as $type) {
					$types_options[$type->name] = $type->slug;
				}
			} else {
				$types_options['All'] = 'all';
			}
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"				=> __("Portfolio Styles", 'apcore'),
					"base"				=> "apress_portfolio_styles",
					"class"				=> "",
					"weight"			=> 16,
					"category"			=> __( "Apress", "apcore"),
					"description"		=> __("Amazing Portfolio styles", "apcore"),
					"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-portfolio.png",
					"params"			=> array(		
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Choose Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Portfolio Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Portfolio Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Portfolio Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style3.jpg'
								),
								'style4' => array(
									'tooltip' => esc_attr__('Portfolio Style 4','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style4.jpg'
								),
								'style5' => array(
									'tooltip' => esc_attr__('Portfolio Style 5','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style5.jpg'
								),
								'style6' => array(
									'tooltip' => esc_attr__('Portfolio Style 6','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_style/portfolio_style6.jpg'
								),
					
							),
						),
						
						
						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Categories", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $types_options,
							'save_always'		=> true,
							"description"		=> __("Please select the categories you would like to display for your portfolio. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore")
						),	
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Layout",'apcore'),
							"param_name"		=> "layoutstyle",
							'value'				=> array(
								__("Grid square",'apcore') => "grid",
								__("Grid Retangular",'apcore') => "grid_retangular",
								__("Masonry",'apcore') => "masonry"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style4')),
						),							
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Layout",'apcore'),
							"param_name"		=> "layoutstyle2",
							'value'				=> array(
								__("Grid square",'apcore') => "grid",
								__("Grid Retangular",'apcore') => "grid_retangular",
								__("Masonry",'apcore') => "masonry",
								__("Packery",'apcore') => "packery"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style2', 'style3', 'style5', 'style6'))
						),						
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Gutter Space",'apcore'),
							"description"		=> __("Dont leave it blank. Enter value from 0 - 100", "apcore"),
							"param_name"		=> "portfolio_packery_gutter",
							'value'				=> '0',
							'dependency'		=> array( 'element' => 'layoutstyle2', 'value' => array('packery'))
						),						
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Hover type",'apcore'),
							"param_name"		=> "portfoliohovertype",
							'value'				=> array(
								__("Fade",'apcore') => "hovertype_fade",
								__("Zoom In",'apcore') => "hovertype_zoomin",
								__("Zoom Out",'apcore') => "hovertype_zoomout",
								__("Layla",'apcore') => "hovertype_layla",
								__("Zoe",'apcore') => "hovertype_zoe",
								__("Oscar",'apcore') => "hovertype_oscar",
								__("Roxy",'apcore') => "hovertype_roxy",
								__("Bubba",'apcore') => "hovertype_bubba",
								__("Jazz",'apcore') => "hovertype_jazz"
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),	
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Choose Hover type",'apcore'),
							"param_name"		=> "portfoliohovertype_opt2",
							'value'				=> array(
								__("Default",'apcore') 	=> "hover_default",
								__("Zoom In",'apcore') 	=> "hovertype_zoomin",
								__("Zoom Out",'apcore') => "hovertype_zoomout",
								__("BW TO Color",'apcore') => "hover_bwto_color",
							),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style5', 'style6')),
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
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Number of Items per row (Two, Three will not work for Packery)",'apcore'),
							"param_name"		=> "portfoliocrslcolprw",
							'value'				=> array(
								__("Four",'apcore') => "Four",
								__("Five",'apcore') => "Five",
								__("Six",'apcore') => "Six",
								__("Three",'apcore') => "Three",
								__("Two",'apcore') => "Two"
							),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Content alignment', 'apcore'),
							'param_name'		=> 'content_alignment',
							'value'				=> 'left',
							'options'			=> array(
								esc_html__('Left', 'apcore')	=> 'left',
								esc_html__('Center', 'apcore') => 'center',
								esc_html__('Right', 'apcore')	=> 'right'
							),
							'dependency'		=> array('element' => 'style', 'value' => array('style4', 'style5', 'style6')),
						),					
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "portfoliocrslcolbg",
							"value"				=> '#f9f9f9',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style4')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "portfoliocrslcolbordep",
							"value"				=> '#e6e6e6',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style4')),
						),
						array(
							"type"				=> "dropdown",
							'heading'			=> esc_html__('Box Border Radius','apcore'),
							"param_name"		=> "portfoliocrslcolradi",
							'value'				=> array(
								__("Square",'apcore') => "0",
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "10",								
								
								),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
							"param_name"		=> "portfoliocrslcolpad",
							'value'				=> '15,15,15,15',
							'dependency'		=> array( 'element' => 'layoutstyle', 'value' => array('masonry','grid'))
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
							"param_name"		=> "portfoliocrslcolpad2",
							'value'				=> '0,0,0,0',
							'dependency'		=> array( 'element' => 'layoutstyle2', 'value' => array('masonry','grid','grid_retangular'))
						),
						
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
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
							'type'				=> 'zolo_number',
							'heading'			=> __('Title Font Size','apcore'),
							'param_name'		=> 'portfoliocrsltitlesize',
							'step'				=> '1',
							'value'				=> '24',
							'suffix'			=> 'px',
						),		
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Title Text Color",'apcore'),
							"param_name"		=> "portfoliocrsltitlecolor",
							"value"				=> '#4c4c4c', 	
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Caption Background Color",'apcore'),
							"param_name"		=> "captionbg",
							"value"				=> '#ffffff',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style5', 'style6')),
						),
						array(
							'type'				=> 'zolo_number',
							"class"				=> "",
							"heading"			=> __("Caption Border Radius",'apcore'),
							"param_name"		=> "caption_border_radius",
							'step'				=> '1',
							'value'				=> '0',
							'suffix'			=> 'px',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style6')),
						),
						
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Select Color Scheme",'apcore'),
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
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2', 'style3', 'style4', 'style5', 'style6')),
						),	
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Overlay Color",'apcore'),
							"param_name"		=> "portfoliocrslimgoverlay",
							"value"				=> 'rgba(0, 0, 0, 0.1)', 
							'dependency'		=> array( 'element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),								
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Image Overlay Hover Color",'apcore'),
							"param_name"		=> "portfoliocrsloverlayhovercolor",
							"value"				=> 'rgba(0, 0, 0, 0.8)', 
							'dependency'		=> array( 'element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
						),	
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Font Awesome Zoom Icon",'apcore'),
							"param_name"		=> "portfoliocrslzoomicon",
							'value'				=> 'fa fa-search-plus',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Font Awesome Link Icon",'apcore'),
							"param_name"		=> "portfoliocrsllinkicon",
							'value'				=> 'fa fa-link',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Background",'apcore'),
							"description"		=> __("for Zoom and Link Icon", "apcore"),
							"param_name"		=> "portfoliocrslbuttonbg",
							"value"				=> '#00c8ec', 
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Background",'apcore'),
							"description"		=> __("for Zoom and Link Icon", "apcore"),
							"param_name"		=> "portfoliocrslbuttonhovbg",
							"value"				=> '#0187a0', 
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Show filter', 'apcore'),
							'param_name'		=> 'portfoliofilter',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'group'				=> esc_html__('Filter', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Style', 'apcore' ),
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
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Filter button alignment",'apcore'),
							"param_name"		=> "filter_button_align",
							'value'				=> array(__("Left",'apcore') => "left",__("Center",'apcore') => "center",__("Right",'apcore') => "right"),
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),
						array(
							"type"				=> "textarea",
							"class"				=> "",
							"heading"			=> __("Filter Description",'apcore'),
							"param_name"		=> "portfoliofilter_des",
							'value'				=> 'Enter your description',
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),							  
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Filter button Font Size",'apcore'),
							"param_name"		=> "filter_fontsize",
							'value'				=> '16',
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
							'group'				=> esc_html__('Filter', 'apcore'),
						),						 
						array(
							"type"				=> "dropdown",
							'heading'			=> esc_html__('Filter Button Border Radius','apcore'),
							"param_name"		=> "filter_buttonborradi",
							'value'				=> array(
								__("Square",'apcore') => "0",
								__("Rounded",'apcore') => "6",
								__("Round",'apcore') => "10",								
								
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
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
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
							'dependency'		=> array('element' => 'portfoliofilter', 'value' => 'yes'),
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
							"param_name"		=> "portfolio_navigation",
							'value'				=> array(__("None",'apcore') => "none",__("Default",'apcore') => "default",__("Classic navigation",'apcore') => "classic_nav",__("Load more button",'apcore') => "loadmore_nav"),
							"description"		=> __("Load more option will not work with packery style and gutter space.", "apcore"),
							'group'				=> esc_html__('Navigation', 'apcore'),
						),							
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Navigation text color",'apcore'),
							"param_name"		=> "nav_color",
							"value"				=> '#000000',
							"description"		=> __("navigation text color",'apcore'),			
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
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
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('classic_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						 ),				
						 array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Number of post to load on click",'apcore'),
							"param_name"		=> "portfolio_click",
							"value"				=> __("4",'apcore'),
							"description"		=> __("Number of post loaded when Load more clicked",'apcore'),			
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
						 ),
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button background color",'apcore'),
							"param_name"		=> "button_bg",
							"value"				=> '#549ffc',
							"description"		=> __("Choose a color",'apcore'),			
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						 ),	 
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button text color",'apcore'),
							"param_name"		=> "button_title",
							"value"				=> '#fff',
							"description"		=> __("Choose a color",'apcore'),				
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						 ),				 
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button border color",'apcore'),
							"param_name"		=> "button_border",
							"value"				=> '#549ffc',
							"description"		=> __("Choose a color",'apcore'),				
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						 ),		 	 
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button text color hover",'apcore'),
							"param_name"		=> "button_hover_title",
							"value"				=> '#fff',
							"description"		=> __("Choose a color",'apcore'),			
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('loadmore_nav')),
							'group'				=> esc_html__('Navigation', 'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 crum_vc apress-number-wrap',
						 ),				 
						 array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button background color hover",'apcore'),
							"param_name"		=> "button_hover_bg",
							"value"				=> '#549ffc',
							"description"		=> __("Choose a color",'apcore'),				
							'dependency'		=> array( 'element' => 'portfolio_navigation', 'value' => array('loadmore_nav')),
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
							'video_link'		=> 'https://youtu.be/kjPMqC8JVXs',
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
									'letter_spacing',
									'font_style',
								),
							),
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
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Description Style', 'apcore'),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style4')),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'description_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Description Style', 'apcore'),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style4')),
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
							'dependency'		=> array( 'element' => 'style', 'value' => array('style4')),
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
							'text'				=> esc_html__('Categories Style', 'apcore'),
							'param_name'		=> 'categories_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
							'group'				=> esc_html__('Categories Style', 'apcore'),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							'type'				=> 'zolo_font_container',
							'heading'			=> '',
							'param_name'		=> 'categories_font_options',
							'settings'				=> array(
								'fields'				=> array(
									'letter_spacing',
									'font_style',
								),
							),
							'group'			=> esc_html__('Categories Style', 'apcore'),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							'type'				=> 'zolo_radio_advanced',
							'heading'			=> esc_html__('Custom font family', 'apcore'),
							'param_name'		=> 'categories_google_fonts',
							'value'				=> 'no',
							'options'			=> array(
								esc_html__('Yes', 'apcore')	=> 'yes',
								esc_html__('No', 'apcore') => 'no',
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'group'				=> esc_html__('Categories Style', 'apcore'),
							'dependency'		=> array( 'element' => 'style', 'value' => array('style1', 'style2')),
						),
						array(
							'type'				=> 'google_fonts',
							'param_name'		=> 'categories_custom_fonts',
							'settings'			=> array(
								'fields'			=> array(
									'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
									'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
							'dependency' => array( 'element' => 'categories_google_fonts', 'value' => 'yes'),
							'group'				=> esc_html__('Categories Style', 'apcore'),
						),
					),
					) );
				}
		}

		function apress_portfolio_styles( $atts, $content=null ){
		   extract(shortcode_atts(array(
						'style'					=> 'style1',
						'category'				=> '',
						'layoutstyle'			=> 'grid',
						'layoutstyle2'			=> 'grid',
						'portfoliohovertype'	=> 'hovertype_fade',
						'portfoliohovertype_opt2'=> 'hover_default',
						'num'					=> '4',
						'portfoliocrslcolprw'	=> 'Four',
						'portfoliocrslcolbg'	=> '#f9f9f9',
						'portfoliocrslcolbordep'=> '#e6e6e6',
						'portfoliocrslcolradi'	=> '0',
						'portfoliocrslcolpad'	=> '15,15,15,15',
						'portfoliocrslcolpad2'	=> '0,0,0,0',
						'box_shadow'			=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						'box_swing'				=>'no',
						'portfolio_packery_gutter'	=> '0',
						'portfoliocrsltitlesize'	=> '24',
						'portfoliocrsltitlecolor'	=> '#4c4c4c',
						'captionbg'					=> '#ffffff',
						'caption_border_radius'		=> '0',
						'color_scheme'				=> 'primary_color_scheme',
						'portfoliocrslimgoverlay' 	=> '#000000',
						'portfoliocrsloverlayhovercolor'	=> '#000000',
						'portfoliocrslzoomicon'	=> 'fa fa-search-plus',
						'portfoliocrsllinkicon'	=> 'fa fa-link',
						'portfoliocrslbuttonbg'	=> '#00c8ec',
						'portfoliocrslbuttonhovbg'	=> '#0187a0',
										
						'portfolio_navigation'	=> 'none',
						'portfolio_click'		=> '4',
						'nav_bg'				=> '#eeeeee',
						'nav_color'				=> '#000000',
						'nav_border'			=> '#eeeeee',
						'nav_hover_color'		=> '#ffffff',
						'nav_hover_bg'			=> '#549ffc',
						'button_bg'				=> '#549ffc',
						'button_title'			=> '#fff',
						'button_border'			=> '#549ffc',
						'button_hover_title'	=> '#fff',
						'button_hover_bg'		=> '#549ffc',
						'portfoliofilter'		=> 'no',	
						'filter_button_style'	=> 'filter_button_style1',
						'portfoliofilter_des'	=> 'Enter your description',
						'filter_button_align'	=> 'left',
						'filter_fontsize'		=> '16',
						'filter_buttonborradi'	=> '0',
						'filter_button_text_color'	=> '#fff',
						'filter_button_bg_color'	=> '#549ffc',
						'filter_button_border_color'		=> '#3174c8',
						'filter_button_text_hover_color'	=> '#fff',
						'filter_button_bg_hover_color'		=> '#3174c8',	
						
						'title_font_options'				=> '',
						'title_google_fonts'				=> '',
						'title_custom_fonts'				=> '',
						'description_font_options'			=> '',
						'description_google_fonts'			=> '',
						'description_custom_fonts'			=> '',
						'categories_font_options'			=> '',
						'categories_google_fonts'			=> '',
						'categories_custom_fonts'			=> '',		
						'content_alignment'					=> 'left',	
						
						'data_animation'					=> 'No Animation',
						'data_delay'						=> '500'
						
						
				), $atts));
				ob_start();	
				$id = RandomString(20);	
				if($portfoliocrslcolprw == 'Six'){
						$portfoliocrslcolprw = 6;
					}elseif($portfoliocrslcolprw == 'Five'){
							$portfoliocrslcolprw = 5;
						}elseif($portfoliocrslcolprw == 'Four'){
								$portfoliocrslcolprw = 4;
							}elseif($portfoliocrslcolprw == 'Three'){
									$portfoliocrslcolprw = 3;
								}elseif($portfoliocrslcolprw == 'Two'){
										$portfoliocrslcolprw = 2;
									}
				
				//Animation
				if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
					}
									
				static $c = 1;
				
			if($color_scheme == 'design_your_own'){
				$key = '';
			}else{
				$key = $color_scheme;
			} 
			$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
			
			
			
			if($style == 'style1'){
				$class = 'zolo_portfolio_style1 zolo_portfolio_vertical';
				
			}elseif($style == 'style2'){
				$class = 'zolo_portfolio_style2 zolo_portfolio_vertical';
			
			}elseif($style == 'style3'){
				$class = 'zolo_portfolio_style3 zolo_portfolio_vertical';
			
			}elseif($style == 'style4'){
				$class = 'zolo_portfolio_style4 zolo_portfolio_vertical';
				
			}elseif($style == 'style5'){
				$class = 'zolo_portfolio_style5 zolo_portfolio_vertical';
				
			}elseif($style == 'style6'){
				$class = 'zolo_portfolio_style6 zolo_portfolio_vertical';
				
			}
			
			if($style == 'style1'){
					
				//Layout Style
				if($layoutstyle == 'grid' || $layoutstyle == 'grid_retangular'){
					$layoutstyle_class = 'layoutstyle_normal';
					$layout_class = 'grid-item';
					$layoutmode = 'fitRows';
					
				}else if($layoutstyle == 'masonry'){
					$layoutstyle_class = 'shortcode_blog_layout_masonry';
					$layout_class = 'masonry-item';
					$layoutmode = 'masonry';	
					
				}
				
			}elseif($style == 'style2' || $style == 'style3' || $style == 'style5' || $style == 'style6'){
				
				//Layout Style
				if($layoutstyle2 == 'grid' || $layoutstyle2 == 'grid_retangular'){
					$layoutstyle_class = 'layoutstyle_normal';
					$layout_class = 'grid-item';
					$layoutmode = 'fitRows';
					
				}else if($layoutstyle2 == 'masonry'){
					$layoutstyle_class = 'shortcode_blog_layout_masonry';
					$layout_class = 'masonry-item';
					$layoutmode = 'masonry';
					
				}else if($layoutstyle2 == 'packery'){
					$layoutstyle_class = 'shortcode_blog_layout_packery';
					$layout_class = 'packery-item';
					$layoutmode = 'masonry';
				}
				
			}elseif($style == 'style4'){
				
				//Layout Style
				if($layoutstyle == 'grid' || $layoutstyle == 'grid_retangular'){
					$layoutstyle_class = 'layoutstyle_normal';
					$layout_class = 'grid-item';
					$layoutmode = 'fitRows';
					
				}else if($layoutstyle == 'masonry'){
					$layoutstyle_class = 'shortcode_blog_layout_masonry';
					$layout_class = 'masonry-item';
					$layoutmode = 'masonry';	
					
				}
			}
				
			if($portfolio_navigation == 'loadmore_nav'){
				
			$items_on_start = $num; 
			$items_per_click = $portfolio_click;
			$view_type = $layoutmode;    
			$category = $category;
			?>
<script>
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(document).ready(function(){
			
			var html_template = "<?php echo esc_js($view_type); ?>";
			var category = "<?php echo esc_js($category); ?>";
			var now_open_works = 0;
			var first_load = true;	
			var style = "<?php echo esc_js($style); ?>";
			
			var layoutstyle = "<?php echo esc_js($layoutstyle); ?>";
			var layoutstyle2 = "<?php echo esc_js($layoutstyle2); ?>";
			var portfoliohovertype = "<?php echo esc_js($portfoliohovertype); ?>";	
			var portfoliohovertype_opt2 = "<?php echo esc_js($portfoliohovertype_opt2); ?>";	
			var content_alignment = "<?php echo esc_js($content_alignment); ?>";
			var portfoliocrslcolprw = "<?php echo esc_js($portfoliocrslcolprw); ?>";
			
			var portfoliofilter = "<?php echo $portfoliofilter; ?>";
			var portfoliocrslcolbg = "<?php echo esc_js($portfoliocrslcolbg); ?>";
			var portfoliocrslcolbordep = "<?php echo esc_js($portfoliocrslcolbordep); ?>";	
			var portfoliocrslcolradi = "<?php echo esc_js($portfoliocrslcolradi); ?>";
			var portfoliocrslcolpad = "<?php echo $portfoliocrslcolpad; ?>";
			var portfoliocrslcolpad2 = "<?php echo $portfoliocrslcolpad2; ?>";	
			var portfolio_packery_gutter = "<?php echo $portfolio_packery_gutter; ?>";	
			var portfoliocrsltitlesize = "<?php echo esc_js($portfoliocrsltitlesize); ?>";
			var portfoliocrsltitlecolor = "<?php echo esc_js($portfoliocrsltitlecolor); ?>";
			
			var captionbg = "<?php echo esc_js($captionbg); ?>";
			var portfoliocrslimgoverlay = "<?php echo esc_js($portfoliocrslimgoverlay); ?>";
			var portfoliocrsloverlayhovercolor = "<?php echo esc_js($portfoliocrsloverlayhovercolor); ?>";
			var portfoliocrslzoomicon = "<?php echo esc_js($portfoliocrslzoomicon); ?>";
			var portfoliocrsllinkicon = "<?php echo esc_js($portfoliocrsllinkicon); ?>";
			var portfoliocrslbuttonbg = "<?php echo esc_js($portfoliocrslbuttonbg); ?>";
			var portfoliocrslbuttonhovbg = "<?php echo esc_js($portfoliocrslbuttonhovbg); ?>";	
			var layout_class = "<?php echo esc_js($layout_class); ?>";
			var layoutstyle_class = "<?php echo esc_js($layoutstyle_class); ?>";
			
			var title_font_options = "<?php echo esc_js($title_font_options); ?>";
			var title_google_fonts = "<?php echo esc_js($title_google_fonts); ?>";
			var title_custom_fonts = "<?php echo esc_js($title_custom_fonts); ?>";
			var description_font_options = "<?php echo esc_js($description_font_options); ?>";
			var description_google_fonts = "<?php echo esc_js($description_google_fonts); ?>";
			var description_custom_fonts = "<?php echo esc_js($description_custom_fonts); ?>";
			var categories_font_options = "<?php echo esc_js($categories_font_options); ?>";
			var categories_google_fonts = "<?php echo esc_js($categories_google_fonts); ?>";
			var categories_custom_fonts = "<?php echo esc_js($categories_custom_fonts); ?>";
			
			
			function get_portfolio_posts () {
			
				if (first_load == true) {		
					works_per_load = <?php echo esc_js($items_on_start); ?>;
					first_load = false;		
				} else {		
					works_per_load = <?php echo esc_js($items_per_click); ?>;		
				}
			
				j$.ajax({
					
					type: "POST",
					url: zt_post.ajaxurl,
					data: "html_template="+html_template+"&layoutstyle="+layoutstyle+"&layoutstyle2="+layoutstyle2+"&portfoliohovertype="+portfoliohovertype+"&portfoliohovertype_opt2="+portfoliohovertype_opt2+"&content_alignment="+content_alignment+"&style="+style+"&layout_class="+layout_class+"&layoutstyle_class="+layoutstyle_class+"&now_open_works="+now_open_works+"&action=get_portfolio_posts"+"&works_per_load="+works_per_load+"&first_load="+first_load+"&category="+category+"&portfoliocrslcolprw="+portfoliocrslcolprw+"&portfoliocrslcolbg="+portfoliocrslcolbg+"&portfoliocrslcolbordep="+portfoliocrslcolbordep+"&portfoliocrslcolradi="+portfoliocrslcolradi+"&portfoliocrslcolpad="+portfoliocrslcolpad+"&portfoliocrslcolpad2="+portfoliocrslcolpad2+"&portfolio_packery_gutter="+portfolio_packery_gutter+" &portfoliocrsltitlesize="+portfoliocrsltitlesize+"&portfoliocrsltitlecolor="+portfoliocrsltitlecolor+"&captionbg="+captionbg+"&portfoliocrslimgoverlay="+portfoliocrslimgoverlay+"&portfoliocrsloverlayhovercolor="+portfoliocrsloverlayhovercolor+"&portfoliocrslzoomicon="+portfoliocrslzoomicon+"&portfoliocrsllinkicon="+portfoliocrsllinkicon+"&portfoliocrslbuttonbg="+portfoliocrslbuttonbg+"&portfoliocrslbuttonhovbg="+portfoliocrslbuttonhovbg+"&portfoliofilter="+portfoliofilter+"&title_font_options="+title_font_options+"&title_google_fonts="+title_google_fonts+"&title_custom_fonts="+title_custom_fonts+"&description_font_options="+description_font_options+"&description_google_fonts="+description_google_fonts+"&description_custom_fonts="+description_custom_fonts+"&categories_font_options="+categories_font_options+"&categories_google_fonts="+categories_google_fonts+"&categories_custom_fonts="+categories_custom_fonts+"",
					
					success: function(result){
						//alert(result.length);
						if(result.length<10){
						j$(".portfolio_load_more_cont").hide("fast");
						}
						
						now_open_works = now_open_works + works_per_load;
						first_load = false;
						//alert(result);
						var $newItems = j$(result);
						
						var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");				
						
						setTimeout(function(i) {
							$container.imagesLoaded( function() {	
								// init Isotope
								$container.isotope( 'insert', $newItems, function() {
									j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").ready(function(){
										j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');		
									});	
									j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
									j$(window).trigger('resize');
								})
								// Pretty Photo
								j$("a[rel^='prettyPhoto']").prettyPhoto({
									animation_speed: 'normal', /* fast/slow/normal */
									slideshow: false, /* false OR interval time in ms */
									autoplay_slideshow: false, /* true/false */
									opacity: 0.80, /* Value between 0 and 1 */
									show_title: true, /* true/false */
									allow_resize: true, /* Resize the photos bigger than viewport. true/false */
									horizontal_padding: 0,
									default_width: 960,
									default_height: 540,
									counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
									theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
									hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
									wmode: 'opaque', /* Set the flash wmode attribute */
									autoplay: true, /* Automatically start videos: True/False */
									modal: false, /* If set to true, only the close button will close the window */
									overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
									keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
									deeplinking: false,
									social_tools: false
								});
							});
							
							},3000);
						}				
					});	
						
				}
			
				j$(".get_portfolio_posts_btn").click(function(){
					get_portfolio_posts();						
					j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
					return false;
				
				});
			
			
				/* load at start */	
				j$(window).load(function(){
					get_portfolio_posts();
					var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
					
					
					var $window = j$(window);
					if(j$($container).length){
						$container.animate({opacity:1});
						resizeMasonry($container);
					}
					
					var $grid = $container.imagesLoaded( function() {
							// init Isotope
							$container.isotope({
							// options
								itemSelector : '<?php echo '.'.$layout_class;?>',
								layoutMode : '<?php echo $layoutmode; ?>'
							})
						});
						
					if(j$($container).length){
						$window.resize(function() {resizeMasonry($container); });
					}

						// filter functions
						  var filterFns = {
							// show if number is greater than 50
							numberGreaterThan50: function() {
							  var number = j$(this).find('.number').text();
							  return parseInt( number, 10 ) > 50;
							},
							// show if name ends with -ium
							ium: function() {
							  var name = j$(this).find('.name').text();
							  return name.match( /ium$/ );
							}
						  };
						  // bind filter button click
						  j$('.portfoliofilter-<?php echo $id; ?>').on( 'click', 'button', function() {
							var filterValue = j$( this ).attr('data-filter');
							// use filterFn if matches value
							filterValue = filterFns[ filterValue ] || filterValue;
							$grid.isotope({ filter: filterValue });
						  });
						  // change is-checked class on buttons
							j$('.portfoliofilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
							var $buttonGroup = j$( buttonGroup );
							$buttonGroup.on( 'click', 'button', function() {
							  $buttonGroup.find('.is-checked').removeClass('is-checked');
							  j$( this ).addClass('is-checked');
							});
						  });	
						  			
					});
			
					var portfolio_width;
					function resizeMasonry(container){
						
						"use strict";
						
						var $window = j$(window);
						portfolio_width = j$('.zolo_portfolio_area').innerWidth();
						
						container.width(portfolio_width);
						var largeItemHeight = container.find('div[class*="packery_portfolio_squared_small"]:first img').height();
						var largeWidthItemHeight = container.find('div[class*="packery_portfolio_squared_small"]:first img').height();	
						var double = ($window.innerWidth() > 480) ? 2 : 1 ;
						if(container.hasClass('portfolio_gallery_gutter_on')) {
							//var gutter_space = container.data('gutter-space');
							largeItemHeight += <?php echo $portfolio_packery_gutter;?>;
							container.find('div[class*="packery_portfolio_landscape"] img').css('height',(largeWidthItemHeight));
						}
						container.find('div[class*="packery_portfolio_squared_big"] img, div[class*="packery_portfolio_portrait"] img').css('height',(largeItemHeight*double));
						
						container.isotope({
								masonry: { columnWidth: portfolio_width / <?php echo $portfoliocrslcolprw;?>}						
							});
						}
			
			});
			</script>
<?php	
				}else{
					?>
<script type="text/javascript" charset="utf-8">
					jQuery.noConflict();
					var j$ = jQuery;
					"use strict";
					j$(window).load(function() {
					var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
					
					var $window = j$(window);
					if(j$($container).length){
						$container.animate({opacity:1});
						resizeMasonry($container);
					}
					
					
					var $grid = $container.imagesLoaded( function() {
							// init Isotope
							$container.isotope({
							// options
								itemSelector : '<?php echo '.'.$layout_class;?>',
								layoutMode : '<?php echo $layoutmode; ?>'
							})
						});
					
					
					if(j$($container).length){
						$window.resize(function() {resizeMasonry($container); });
					}
						// filter functions
						  var filterFns = {
							// show if number is greater than 50
							numberGreaterThan50: function() {
							  var number = j$(this).find('.number').text();
							  return parseInt( number, 10 ) > 50;
							},
							// show if name ends with -ium
							ium: function() {
							  var name = j$(this).find('.name').text();
							  return name.match( /ium$/ );
							}
						  };
						  // bind filter button click
						  j$('.portfoliofilter-<?php echo $id; ?>').on( 'click', 'button', function() {
							var filterValue = j$( this ).attr('data-filter');
							// use filterFn if matches value
							filterValue = filterFns[ filterValue ] || filterValue;
							$grid.isotope({ filter: filterValue });
						  });
						  // change is-checked class on buttons
						  j$('.portfoliofilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
							var $buttonGroup = j$( buttonGroup );
							$buttonGroup.on( 'click', 'button', function() {
							  $buttonGroup.find('.is-checked').removeClass('is-checked');
							  j$( this ).addClass('is-checked');
							});
						  });  				
					});
					
					
					
					var portfolio_width;
					function resizeMasonry(container){
					"use strict";
					
					var $window = j$(window);
					portfolio_width = j$('.zolo_portfolio_area').innerWidth();
					
					container.width(portfolio_width);
					var largeItemHeight = container.find('div[class*="packery_portfolio_squared_small"]:first img').height();
					var largeWidthItemHeight = container.find('div[class*="packery_portfolio_squared_small"]:first img').height();	
					var double = ($window.innerWidth() > 800) ? 2 : 1 ;
					if(container.hasClass('portfolio_gallery_gutter_on')) {
					//var gutter_space = container.data('gutter-space');
					largeItemHeight += <?php echo $portfolio_packery_gutter;?>;
					container.find('div[class*="packery_portfolio_landscape"] img').css('height',(largeWidthItemHeight));
					}
					container.find('div[class*="packery_portfolio_squared_big"] img, div[class*="packery_portfolio_portrait"] img').css('height',(largeItemHeight*double));
					
					container.isotope({
					masonry: { columnWidth: portfolio_width / <?php echo $portfoliocrslcolprw;?>}
					
					});
					}
					
					</script>
<?php
						
					}
					
					if(substr_count($box_shadow, 'disable') == 0) {
						$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
					}
					?>
<?php
					global $post;
					$portfoliocrslcolpad = explode(",",$portfoliocrslcolpad);
					$portfoliocrslcolpad2 = explode(",",$portfoliocrslcolpad2);
					
					
					
					if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
						elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
						else { $paged = 1; }
					
					
					if($category == 'all') {
						$category = null;
					}				
					$portfolio = array(
						'posts_per_page' => $num,
						'post_type' => 'zt_portfolio',
						'catportfolio'=> $category,
						'post_status' => 'publish',
						'paged' => $paged
					);
					$loop = new WP_Query($portfolio);	
					
					
			// Typo
			$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
			$categories_options = _zolo_parse_text_shortcode_params($categories_font_options, '', $categories_google_fonts, $categories_custom_fonts);
			$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);	
					?>
<!--Blog Row Start-->

<div class="zolo_portfolio_area <?php echo ' zoloportfoliostyle'.$c.' '.$class;?>">
  <?php
			if($portfoliofilter == 'yes'){
				
				if($filter_button_align == 'left'){
				?>
  <div class="filter_button_area filter_button_align-<?php echo $filter_button_align;?>">
    <div class="portfolio_filter_col_2 portfolio_filter_button"> <?php echo isotope_portfolio_categories($id);?> </div>
    <div class="portfolio_filter_col_2 portfolio_filter_des"> <?php echo $portfoliofilter_des;?> </div>
  </div>
  <?php }else{?>
  <div class="filter_button_area filter_button_align-<?php echo $filter_button_align;?>">
    <div class="portfolio_filter_col_2 portfolio_filter_des"> <?php echo $portfoliofilter_des;?> </div>
    <div class="portfolio_filter_col_2 portfolio_filter_button"> <?php echo isotope_portfolio_categories($id);?> </div>
  </div>
  <?php }	
			}?>
  <?php if($style == 'style2' || $style == 'style3' || $style == 'style5' || $style == 'style6'){
            	
				if($layoutstyle2 == 'packery'){
					$portfolio_row_margin = '0px';
					$portfolio_col_padding = $portfolio_packery_gutter.'px';
				}else{
					$portfolio_row_margin = '0 -'.$portfoliocrslcolpad2[1].'px 0 -'.$portfoliocrslcolpad2[3].'px';
					$portfolio_col_padding = $portfoliocrslcolpad2[0].'px '.$portfoliocrslcolpad2[1].'px '.$portfoliocrslcolpad2[2].'px '.$portfoliocrslcolpad2[3].'px';
					}
				
				}else{
					$portfolio_row_margin = '0 -'.$portfoliocrslcolpad[1].'px 0 -'.$portfoliocrslcolpad[3].'px';
					$portfolio_col_padding = $portfoliocrslcolpad[0].'px '.$portfoliocrslcolpad[1].'px '.$portfoliocrslcolpad[2].'px '.$portfoliocrslcolpad[3].'px';
				
				}?>
  <div class="zolo_portfolio_row">
    <div class="zolo_row site-content portfolio_gallery_gutter_on <?php echo $id.$layoutstyle_class;?>">
      <?php if($portfolio_navigation != 'loadmore_nav'){ ?>
      <?php
				$i = 1;
				while ($loop->have_posts()) : $loop->the_post();  
				$current = $loop->query_vars['paged'];
				$maxpages = $loop->max_num_pages;
				?>
      <?php  
					if($portfoliofilter == 'yes'){
					$terms = get_the_terms( $post->ID, 'catportfolio' );  
					
					if ( $terms && ! is_wp_error( $terms ) ) :   
					$links = array();  
					
					foreach ( $terms as $term )   
					{  
					$links[] = $term->name;  
					}  
					$links = str_replace(' ', '-', $links);   
					$tax = join( " ", $links );       
					else :    
					$tax = '';    
					endif; 
					}
					?>
      <?php if($portfoliofilter == 'yes'){$filterclasselector = strtolower($tax);}else{$filterclasselector='';} ?>
      <?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';  ?>
      
      <!--Blog Box Area Start-->
      
      <?php if($style == 'style1' || $style == 'style4'){
				$packery_thumbnail_class = '';	
				// portfoliostyle_thumb Size
				if($layoutstyle == 'grid'){
				$portfoliostyle_thumb = 'apcore_blogstyle_thumb';
				
				}else if($layoutstyle == 'grid_retangular'){
					$portfoliostyle_thumb = 'apcore_blog_medium';
					
				}else if($layoutstyle == 'masonry'){
				$portfoliostyle_thumb = 'full';
				
				}
				
			}elseif($style == 'style2' || $style == 'style3' || $style == 'style5' || $style == 'style6'){
			
			 //Layout Style
				$packery_layout_thumbnail = get_post_meta( $post->ID, 'zt_packery_layout_thumbnail', true ); 	
				$packery_thumbnail_class = '';	
				$portfoliostyle_thumb = '';
				if($layoutstyle2 == 'grid'){	
					$portfoliostyle_thumb = 'apcore_blogstyle_thumb';	
				}else if($layoutstyle2 == 'grid_retangular'){
						$portfoliostyle_thumb = 'apcore_blog_medium';
				}else if($layoutstyle2 == 'masonry'){	
					$portfoliostyle_thumb = 'full';			
				}else if($layoutstyle2 == 'packery'){			
					if($packery_layout_thumbnail == 'portfolio_small_squared'){
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_small_squared';
						$packery_thumbnail_class = 'packery_portfolio_squared_small';				
					}else if($packery_layout_thumbnail == 'portfolio_squared'){				
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_squared';
						$packery_thumbnail_class = 'packery_portfolio_squared_big';				
					}else if($packery_layout_thumbnail == 'portfolio_landscape'){				
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_landscape';
						$packery_thumbnail_class = 'packery_portfolio_landscape';			
					}else if($packery_layout_thumbnail == 'portfolio_portrait'){				
						$portfoliostyle_thumb = 'apcore_shortcode_portfolio_portrait';
						$packery_thumbnail_class = 'packery_portfolio_portrait';			
					}			
				}
				
			}
			?>
      <?php if($style == 'style1' || $style == 'style2'){ ?>
      <div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?>" style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>" style="background:<?php echo $portfoliocrslcolbg;?>; border-color:<?php echo $portfoliocrslcolbordep;?>; border-radius:<?php echo $portfoliocrslcolradi; ?>px;">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb <?php echo $portfoliohovertype;?>">
            <?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
			}?>
            <img src="<?php echo $thumb_url ?>" /> <span class="overlay"><a href="<?php the_permalink(); ?>" class="zolo_portfolio_link"></a></span>
            <?php //style2 Title
				if($style == 'style2'){
				if($portfoliohovertype == 'hovertype_zoe'){ ?>
            <div class="zolo_portfolio_detail" style="background:<?php echo $portfoliocrslcolbg;?>;">
              <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
                <?php the_title(); ?>
                </a> </h2>
              <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
              <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
              <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
              <?php } ?>
              </span> </div>
            <?php }
				}?>
            <div class="zolo_portfolio_caption"> 
              <!--Icons Area Start--> 
              
              <span class="zolo_portfolio_icons">
              <?php if($portfoliocrslzoomicon){ ?>
              <a href="<?php echo $thumb_url; ?>" rel="prettyPhoto[pretty_photo_gallery]" ><span class="zolo_portfolio_icon portfolio_zoom_icon"> <i class="<?php echo $portfoliocrslzoomicon;?>"></i> </span></a>
              <?php }?>
              <?php if($portfoliocrsllinkicon){ ?>
              <a href="<?php the_permalink(); ?>"><span class="zolo_portfolio_icon portfolio_link_icon"> <i class="<?php echo $portfoliocrsllinkicon;?>"></i> </span></a>
              <?php }?>
              </span> 
              
              <!--Icons Area End-->
              
              <?php //style2 Title
			 if($style == 'style2'){
				 if($portfoliohovertype != 'hovertype_zoe'){ ?>
              <div class="zolo_portfolio_detail">
                <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
                  <?php the_title(); ?>
                  </a> </h2>
                <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
                <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
                <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
                <?php } ?>
                </span> </div>
              <?php } }?>
            </div>
          </div>
          <!--Thumb Area End-->
          
          <?php //style1 Title
			 if($style == 'style1'){ ?>
          <div class="zolo_portfolio_detail">
            <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
              <?php the_title(); ?>
              </a> </h2>
            <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
            <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
            <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
            <?php } ?>
            </span> </div>
          <?php } ?>
        </div>
      </div>
      <?php //Portfolio Style 3
	  }else if($style == 'style3'){?>
      <div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb hovertype_fade"> <img src="<?php echo $thumb_url ?>" /> <span class="overlay"><a href="<?php the_permalink(); ?>" class="zolo_portfolio_link"></a></span>
            <div class="zolo_portfolio_caption">
              <div class="zolo_portfolio_detail">
                <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>><a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
                  <?php the_title(); ?>
                  </a></h2>
                <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
                <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
                <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
                <?php } ?>
                </span> </div>
            </div>
            <a href="<?php the_permalink(); ?>" class="zolo_portfolio_link"></a> </div>
          <!--Thumb Area End--> 
          
        </div>
      </div>
      <?php //Portfolio Style 4
	  }else if($style == 'style4'){?>
      <div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>; border-color:<?php echo $portfoliocrslcolbordep;?>;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb"> <a href="<?php the_permalink(); ?>"> <img src="<?php echo $thumb_url ?>" /> <span class="overlay"></span></a> </div>
          <!--Thumb Area End-->
          <div class="zolo_portfolio_detail">
            <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
              <?php the_title(); ?>
              </a></h2>
            <?php 
				$cur_id = apress_theme_current_page_id();
				$portfolio_details = get_post_meta( $cur_id , 'zt_portfolio_details', true );
                  if($portfolio_details){
					  echo '<div class="zolo_portfolio_dsc" ' .$description_options['style']. '>';
                        $content = $portfolio_details;
                        $content = apply_filters('the_content', wp_trim_words( $content, 12, '' ));
                        echo $content.'</div>';
                      }?>
          </div>
        </div>
      </div>
      <?php //Portfolio Style 5
	  }else if($style == 'style5' || $style == 'style6'){?>
      <div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb <?php echo $portfoliohovertype_opt2;?>"> <img src="<?php echo $thumb_url ?>" /> <span class="overlay"></span>
            <div class="zolo_portfolio_caption" style=" background:<?php echo $captionbg;?>">
              <div class="zolo_portfolio_detail" style="text-align:<?php echo $content_alignment;?>;">
                <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>><a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
                  <?php the_title(); ?>
                  </a></h2>
                <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
                <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
                <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
                <?php } ?>
                </span> </div>
            </div>
            <a href="<?php the_permalink(); ?>" class="zolo_portfolio_link"></a> </div>
          <!--Thumb Area End--> 
          
        </div>
      </div>
      <?php }?>
      
      <!--Blog Box Area End-->
      <?php $i++;  endwhile; 
		  }
			  ?>
    </div>
  </div>
  <?php
		 
		if($portfolio_navigation != 'none'){
			if($portfolio_navigation == 'classic_nav'){ 
				if(isset($maxpages)){ apcore_portfolio_pagination($maxpages);}
			}elseif($portfolio_navigation == 'default'){
				?>
  <nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text">
      <?php _e( 'Posts navigation', 'apcore' ); ?>
    </h1>
    <div class="nav-links">
      <div class="nav-previous">
        <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'apcore' ),$loop->max_num_pages ); ?>
      </div>
      <div class="nav-next">
        <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'apcore' ) ); ?>
      </div>
    </div>
    <!-- .nav-links --> 
  </nav>
  <?php
			}elseif($portfolio_navigation == 'loadmore_nav'){
					echo '<div class="portfolio_load_more_cont"><button class="btn_load_more get_portfolio_posts_btn zolo_ripplelink">'.__('Load More','apcore').' </button></div>'; 
				} 
		}?>
  <?php 
			// clean up after the query and pagination
			//wp_reset_postdata(); 
			//wp_reset_query();
			?>
</div>

<?php 
$shortcode_css = '';
if($box_swing == 'yes'){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover{ transform:translateY(-3px);-moz-transform:translateY(-3px);-webkit-transform:translateY(-3px);-ms-transform:translateY(-3px);-o-transform:translateY(-3px);}';
}
$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_title{color:'.$portfoliocrsltitlecolor.';font-size:'.$portfoliocrsltitlesize.'px;}';
$shortcode_css .= '.zoloportfoliostyle'.$c.' a{text-decoration: inherit;}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover{'.$box_shadow.'}';
$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .zolo_portfolio_date,
.zoloportfoliostyle'.$c.' .zolo_portfolio_box .zolo_portfolio_date a{color:'.$portfoliocrsltitlecolor.';}';

if($style == 'style1' || $style == 'style2'){
	if($color_scheme == 'design_your_own'){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{background:'.$portfoliocrslimgoverlay.';}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{background:'.$portfoliocrsloverlayhovercolor.';}';
	
	}else{
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{ opacity:0;filter: alpha(opacity=0);}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{opacity:0.8;filter: alpha(opacity=8);'.$color_scheme_css.'}';
	}
	
}else if($style == 'style3'){
	if($color_scheme == 'design_your_own'){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{background:'.$portfoliocrslimgoverlay.'; width:auto; height:auto; left:25px; right:25px; top:25px; bottom:25px;}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{background:'.$portfoliocrsloverlayhovercolor.';}';
	
	}else{
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{ opacity:0;filter: alpha(opacity=0);width:auto; height:auto; left:25px; right:25px; top:25px; bottom:25px;}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{opacity:1;filter: alpha(opacity=100);'.$color_scheme_css.'}';
	}
	
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover img{-webkit-filter: blur(4px); filter: blur(4px);transform: scale(1.1, 1.1);-webkit-transform: scale(1.1, 1.1); transition: all 0.3s ease 0s;-webkit-transition: all 0.3s ease 0s;}';
	
}else if($style == 'style4'){
	if($color_scheme == 'design_your_own'){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .zolo_portfolio_thumb:after{background:'.$portfoliocrsloverlayhovercolor.';}';
	
	}else{
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb:after{opacity:0.7;filter: alpha(opacity=70);'.$color_scheme_css.'}';
	
	}
	
	
}else if($style == 'style5'){
	
	if($color_scheme == 'design_your_own'){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{background:'.$portfoliocrslimgoverlay.';}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{background:'.$portfoliocrsloverlayhovercolor.';}';	
	}else{
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{ opacity:0;filter: alpha(opacity=0);}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{opacity:0.6;filter: alpha(opacity=60);'.$color_scheme_css.'}';
	}
	
	
}else if($style == 'style6'){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .zolo_portfolio_caption{ -moz-border-radius:'.$caption_border_radius.'px;-ms-border-radius:'.$caption_border_radius.'px; -o-border-radius:'.$caption_border_radius.'px; -webkit-border-radius:'.$caption_border_radius.'px;border-radius:'.$caption_border_radius.'px;}';
	
	if($color_scheme == 'design_your_own'){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{background:'.$portfoliocrslimgoverlay.';}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{background:'.$portfoliocrsloverlayhovercolor.';}';
	
	}else{
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{ opacity:0;filter: alpha(opacity=0);}';
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box:hover .overlay{opacity:0.6;filter: alpha(opacity=60);'.$color_scheme_css.'}';
	}	
}   
$shortcode_css .= '.zoloportfoliostyle'.$c.' .zolo_portfolio_box .zolo_portfolio_icons .zolo_portfolio_icon{background:'.$portfoliocrslbuttonbg.';}';
$shortcode_css .= '.zoloportfoliostyle'.$c.'  .zolo_portfolio_box .zolo_portfolio_icons .zolo_portfolio_icon:hover{background:'.$portfoliocrslbuttonhovbg.';}';

$shortcode_css .= '.zolo_blog_style1'.'.zoloportfoliostyle'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb img,
.zolo_blog_style1'.'.zoloportfoliostyle'.$c.' .zolo_portfolio_box .overlay{ border-radius:'.$portfoliocrslcolradi.'px;}';

$shortcode_css .= '.paging-navigation .nav-next a,
.navigation .nav-previous a{background:'.$portfoliocrslbuttonbg.';}';
$shortcode_css .= '.paging-navigation .nav-next a:hover,
.navigation .nav-previous a:hover{background:'.$portfoliocrslbuttonhovbg.';}';


$shortcode_css .= '.zoloportfoliostyle'.$c.' .portfolio_load_more_cont button.btn_load_more{background:'.$button_bg.';  color:'.$button_title.';}';
if($button_border){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .portfolio_load_more_cont button.btn_load_more{border:1px solid '.$button_border.';}';
}
$shortcode_css .= '.zoloportfoliostyle'.$c.' .portfolio_load_more_cont button.btn_load_more:hover{ background:'.$button_hover_bg.'; color:'.$button_hover_title.';border-color: '.$button_border.';}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .page-numbers li a{background:'.$nav_bg.';  color:'.$nav_color.'!important;border:1px solid '.$nav_border.'!important;}';
$shortcode_css .= '.zoloportfoliostyle'.$c.' .page-numbers li span,
.zoloportfoliostyle'.$c.' .page-numbers li a:hover{background:'.$nav_hover_bg.';color:'.$nav_hover_color.'!important;border:1px solid '.$nav_border.'!important;}';	

/*Filters CSS Start*/
$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group{ text-align:'.$filter_button_align.';}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{color:'.$filter_button_text_color.'; font-size:'.$filter_fontsize.'px; line-height:'.$filter_fontsize.'px;}';

$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button.is-checked,
.zoloportfoliostyle'.$c.' .filters-button-group button.button:hover{color:'.$filter_button_text_hover_color.';opacity:1}';

if($filter_button_style == 'filter_button_style1'){
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{background:'.$filter_button_bg_color.';
	-moz-border-radius:'.$filter_buttonborradi.'px;
	-webkit-border-radius:'.$filter_buttonborradi.'px;
	-ms-border-radius:'.$filter_buttonborradi.'px;
	-o-border-radius:'.$filter_buttonborradi.'px;
	border-radius:'.$filter_buttonborradi.'px;
	}';
	if($filter_button_border_color){
		$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{border:1px solid '.$filter_button_border_color.';}';
	}	
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button.is-checked,
	.zoloportfoliostyle'.$c.' .filters-button-group button.button:hover{background:'.$filter_button_bg_hover_color.';border-color:'.$filter_button_border_color.';}';
	
}else{
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{background: none;box-shadow:none;
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	-ms-border-radius:0px;
	-o-border-radius:0px;
	border-radius:0px;
	}';
	
	$shortcode_css .= '.filter_button_align-center .filters-button-group button.button{ margin:0 10px;}';
	$shortcode_css .= '.filter_button_align-left .filters-button-group button.button{margin-right:20px;}';
	$shortcode_css .= '.filter_button_align-right .filters-button-group button.button{margin-left:20px;}';
	
	
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button{ overflow:hidden; position:relative; padding:10px 2px 10px;}';
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button:before { position:absolute; content:""; transition:all 0.7s;-webkit-transition:all 0.7s;
	left: 0;
	bottom: 0;
	width: 100%;
	border-bottom: 2px  solid '.$filter_button_text_hover_color.';
	-moz-transform:  translateX(-100%);
	-ms-transform:  translateX(-100%);
	-o-transform:  translateX(-100%);
	-webkit-transform:  translateX(-100%);
	transform:  translateX(-100%);
	}';
	$shortcode_css .= '.zoloportfoliostyle'.$c.' .filters-button-group button.button.is-checked:before,
	'.'.zoloportfoliostyle'.$c.' .filters-button-group button.button:hover:before {
	-moz-transform:  translateX(0);
	-ms-transform:  translateX(0);
	-o-transform:  translateX(0);
	-webkit-transform:  translateX(0);
	transform:  translateX(0);
	}';
}		
/*Filters CSS End*/
$shortcode_css .= '.site-content.'.$id.$layoutstyle_class.'{ opacity:0;}	';	  
apcore_save_plugin_dyn_styles( $shortcode_css );
?>
<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Apress_Portfolio_Styles_Module = new Apress_Portfolio_Styles_Module;
}


