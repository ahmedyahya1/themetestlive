<?php 
/*-----------------------------------------------------------------------------------*/
/* Woocommerce Product Category
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Product_Category_Module')) {
	class Apress_Product_Category_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_product_category_init' ) );			
			add_shortcode('apress_product_category', array( &$this, 'apress_product_category' ) );
		}
		
		function apress_product_category_init() {
			
			$order_by_values = apress_vc_woo_order_by();
			$order_way_values = apress_vc_woo_order_way();
			
			$args = array(
				'type' => 'post',
				'child_of' => 0,
				'parent' => '',
				'orderby' => 'id',
				'order' => 'ASC',
				'hide_empty' => false,
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'number' => '',
				'taxonomy' => 'product_cat',
				'pad_counts' => false,
			
			);
			$categories = get_categories( $args );
			
			$product_categories_dropdown = array(
				array( 'label' => __('Select', 'apcore'), 'value' => '' )
			);
			apress_getCategoryChildsFull( 0, 0, $categories, 0, $product_categories_dropdown );
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"			=> __("Apress Product Category", 'apcore'),
					"base"			=> "apress_product_category",
					"class"			=> "",
					//"weight"		=> 23,
					"category"		=> __( "WooCommerce", "apcore"),
					"description"	=> __( "Product Category", "apcore"),
					"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-woo.png",
					"params"		=> array(					
							array(
								'type'				=> 'radio_image_select',
								'heading'			=> esc_html__( 'Product Style', 'apcore' ),
								'param_name'		=> 'products_style',
								'weight'			=> 1,
								'simple_mode'		=> false,
								'admin_label'		=> true,
								'options'			=> array(
								'woocommerce_product_style1'	=> array(
										'tooltip'	=> esc_attr__('Style1','apcore'),
										'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style1.jpg'
									),
								'woocommerce_product_style2'	=> array(
										'tooltip'	=> esc_attr__('Style2','apcore'),
										'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style2.jpg'
									),
									'woocommerce_product_style3'	=> array(
										'tooltip'	=> esc_attr__('Style3','apcore'),
										'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style3.jpg'
									),
								'woocommerce_product_style4'	=> array(
										'tooltip'	=> esc_attr__('Style4','apcore'),
										'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style4.jpg'
									),
								'woocommerce_product_style5'	=> array(
									'tooltip'	=> esc_attr__('Style5','apcore'),
									'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style5.jpg'
									),
								'woocommerce_product_style6'	=> array(
									'tooltip'	=> esc_attr__('Style6','apcore'),
									'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style6.jpg'
									),
								'woocommerce_product_style7'	=> array(
									'tooltip'	=> esc_attr__('Style7','apcore'),
									'src'		=> APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/product/woo_product_style7.jpg'
									),
									
								),
							),
							array(
								'type'				=> 'textfield',
								'heading'			=> __( 'Per page', 'apcore' ),
								'param_name'		=> 'per_page',
								'description'		=> __( 'The "per_page" shortcode determines how many products to show on the page', 'apcore' ),
							),
							array(
								'type'				=> 'dropdown',
								'holder'			=> '',
								'class'				=> '',
								'admin_label'		=> true,
								'heading'			=> esc_html__('Columns', 'apcore'), 
								'param_name'		=> 'columns',
								'description'		=> esc_html__('Select number of columns', 'apcore') ,
								'value'				=> array(
											'1' => '1',
											'2' => '2',
											'3' => '3',
											'4' => '4',
											'5' => '5',
										),
							),				
							array(
								'type'				=> 'dropdown',
								'heading'			=> __( 'Order by', 'apcore' ),
								'param_name'		=> 'orderby',
								'value'				=> $order_by_values,
								'description'		=> sprintf( __( 'Select how to sort retrieved products. More at %s.', 'apcore' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
							),
							array(
								'type'				=> 'dropdown',
								'heading'			=> __( 'Sort Order', 'apcore' ),
								'param_name'		=> 'order',
								'value'				=> $order_way_values,
								'description'		=> sprintf( __( 'Designates the ascending or descending order. More at %s.', 'apcore' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
							),
							array(
								'type'				=> 'dropdown',
								'heading'			=> __( 'Category', 'apcore' ),
								'value'				=> $product_categories_dropdown,
								'param_name'		=> 'category',
								'save_always'		=> true,
								'description'		=> __( 'Product category list', 'apcore' ),
							),
							array(
							  'type'				=> 'textfield',
							  'heading'				=> __('Image Size', 'apcore'),
							  'param_name'			=> 'image_size',
							  'value'				=> '',
							  'description'			=> __('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'apcore'),
							),
							array(
							  "type"				=> "dropdown",
							  "heading"				=> __("Product Title Alignment", 'apcore'),
							  "param_name"			=> "woo_title_alignment",
							  "value"				=> array(
											"Left" 		=> "left",
											"Center" 	=> "center",
											"right" 	=> "right",
											),
							  'save_always'			=> true,
							  'std'					=> 'center',
							),
							array(
								"type"				=> "dropdown",
								"class"				=> "",
								"heading"			=> esc_html__("Carousel/Grid Mode", "apcore"),
								"description"		=> esc_html__("Enable Carousel/Grid mode for products", "apcore"),
								"param_name"		=> "carousel",                
								"value"				=> array(
										"Grid"		=> "disable",
										"Carousel"	=> "enable",
										
									),
							),
							array(
								"type"				=> "dropdown",
								"class"				=> "",
								"heading"			=> esc_html__("Layout Mode", "apcore"),
								"param_name"		=> "layout_mode",                
								"value"				=> array(
										"Fit Rows"	=> "fitrows",
										"Masonry"	=> "masonry",
									),
								"dependency"	=> array('element' => "carousel", 'value' => array('disable')),
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Enable Auto Play', 'apcore'),
								"description"	=> __("Will cause your images to auto play until user interaction", 'apcore'),
								'param_name'		=> 'slick_autoplay',
								'value'				=> 'no',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								"dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),
							array(
								"type"			=> 'textfield',
								"heading"		=> __("Auto Play Duration", 'apcore'),
								"param_name"	=> "slick_autoplay_duration",
								"description"	=> __("Enter a custom duration in milliseconds between auto play advances e.g. 5000", 'apcore'),
								"value"			=> '2000',
								'save_always'	=> true,
								"dependency"	=> array('element' => "slick_autoplay", 'value' => array('yes')),
							),
							array(
							  "type"		=> "dropdown",
							  "heading"		=> __("Desktop Items", 'apcore'),
							  "param_name"	=> "desktop_no_of_items",
							  "value"		=> array(
									"1" => "1",
									"2" => "2",
									"3" => "3",
									"4" => "4",
									"5" => "5",
									"6" => "6",
									"7" => "7",
									"8" => "8",
									"9" => "9",
									"10" => "10"
								),
							  "description" => __("No of slides to show.", 'apcore'),
							  'save_always'	=> true,
							  'std'  => '3',
							  'edit_field_class' => 'vc_column vc_col-sm-4',
							  "dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),
							array(
								  "type"		=> "dropdown",
								  "heading"		=> __("Small Desktop Items", 'apcore'),
								  "param_name"	=> "small_desktop_no_of_items",
								  "value"		=> array(
										"1" => "1",
										"2" => "2",
										"3" => "3",
										"4" => "4",
										"5" => "5",
										"6" => "6",
									),
								  "description" => __("No of slides to show.", 'apcore'),
								  'save_always'	=> true,
								  'edit_field_class' => 'vc_column vc_col-sm-4',
								  "dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),
							array(
								  "type"		=> "dropdown",
								  "heading"		=> __("Tablet Items", 'apcore'),
								  "param_name"	=> "tablet_no_of_items",
								  "value"		=> array(
										"1" => "1",
										"2" => "2",
										"3" => "3",
										"4" => "4",
										"5" => "5",
										"6" => "6",
									),
								  "description" => __("No of slides to show.", 'apcore'),
								  'save_always'	=> true,
								  'edit_field_class' => 'vc_column vc_col-sm-4',
								  "dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								"heading"			=> __( "Hover Image", 'apcore' ),
								'description'		=> __('If you enable this, The first image of gallery will be shown as hover of each product', 'apcore'),
								'param_name'		=> 'hover_image',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Rating', 'apcore'),
								"description"	=> __("Disable rating", 'apcore'),
								'param_name'		=> 'woo_rating',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Quick View Button', 'apcore'),
								"description"	=> __("Disable quick view button", 'apcore'),
								'param_name'		=> 'woo_quick_view',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Wishlist Button', 'apcore'),
								"description"	=> __("Disable wishlist button", 'apcore'),
								'param_name'		=> 'woo_wishlist',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Compare Button', 'apcore'),
								"description"	=> __("Disable compare button", 'apcore'),
								'param_name'		=> 'woo_compare',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Badges', 'apcore'),
								"description"	=> __("Disable badges ( sales , out of stock ...)", 'apcore'),
								'param_name'		=> 'woo_badges',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
							),
							
							array(
								"type"             => "zolo_param_heading",
								"param_name"       => "navigation_arrows",
								"text"             => __( "Navigation Arrows", 'apcore' ),
								'group'=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),
							
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Arrow Navigation?', 'apcore'),
								'param_name'		=> 'slick_hide_arrow_navigation',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								"dependency"	=> array('element' => "carousel", 'value' => array('enable')),
								'group'			=> esc_html__('Navigation','apcore'),
							),
													
							array(
								'type'        => 'radio_image_select',
								'heading'     => esc_html__( 'Arrows Style', 'apcore' ),
								'param_name'  => 'arrows_style',
								'simple_mode' => false,
								'options'     => array(
									'arrows_style1' => array(
										'tooltip' => esc_attr__('Arrows Style 1','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style1.jpg'
									),
									'arrows_style2' => array(
										'tooltip' => esc_attr__('Arrows Style 2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style2.jpg'
									),
									'arrows_style3' => array(
										'tooltip' => esc_attr__('Arrows Style 3','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style3.jpg'
									),
									'arrows_style4' => array(
										'tooltip' => esc_attr__('Arrows Style 4','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/nav/nav_style4.jpg'
									),
								),
								'group'=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))
							
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Arrows color",'apcore'),
								"param_name" => "arrows_color",
								"value" => '#ffffff',
								'group'=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "slick_hide_arrow_navigation", 'value' => array('yes'))
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Arrows background",'apcore'),
								"param_name" => "arrows_bg",
								"value" => '#549ffc',
								'dependency' => array( 'element' => 'arrows_style', 'value' => array('arrows_style2', 'arrows_style3')),
								'group'=> esc_html__('Navigation','apcore'),
							),			
							array(
								"type"             => "zolo_param_heading",
								"param_name"       => "navigation_dots",
								"text"             => __( "Navigation dots", 'apcore' ),
								'group'=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),							
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Dots Navigation?', 'apcore'),
								"description"	=> __("Would you like this slider to display bullets on the bottom?", 'apcore'),
								'param_name'		=> 'slick_bullet_navigation',
								'value'				=> 'yes',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									), 				
								),
								'group'			=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "carousel", 'value' => array('enable')),
							),							
							array(
								'type'        => 'radio_image_select',
								'heading'     => esc_html__( 'Bullet Style', 'apcore' ),
								'param_name'  => 'bullet_navigation_style', 	
								'simple_mode' => false,
								'options'     => array(
									'dots_style1' => array(
										'tooltip' => esc_attr__('Dots Style 1','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style1.jpg'
									),
									'dots_style2' => array(
										'tooltip' => esc_attr__('Dots Style 2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style2.jpg'
									),
									'dots_style3' => array(
										'tooltip' => esc_attr__('Dots Style 3','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/image_slider/dots/dots_style3.jpg'
									),	
								),
								'group'=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
							),							
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Bullet background",'apcore'),
								"param_name" => "bullet_bg",
								"value" => '#000000',
								'group'=> esc_html__('Navigation','apcore'),
								"dependency"	=> array('element' => "slick_bullet_navigation", 'value' => array('yes'))
							),
							array(
								'heading'			=> esc_html__('Hover Overlay Color', 'apcore'),
								'description'		=> esc_html__('Enter a custom hover overlay color', 'apcore'), 
								'type'				=> 'colorpicker',
								'class'				=> '',						
								'param_name'		=> 'hover_overlay_color',
								'value'				=> '',	
								'group'				=> esc_html__('Style', 'apcore'),
							),
							array(
								'heading'			=> esc_html__('Icon Color', 'apcore'),
								'type'				=> 'colorpicker',
								'class'				=> '',						
								'param_name'		=> 'icon_color',
								'value'				=> '',	
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding',	
								'group'				=> esc_html__('Icon', 'apcore'),
							),
							array(
								'heading'			=> esc_html__('Hover Icon Color', 'apcore'),
								'type'				=> 'colorpicker',
								'class'				=> '',						
								'param_name'		=> 'hover_icon_color',
								'value'				=> '',	
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding',	
								'group'				=> esc_html__('Icon', 'apcore'),
							),
							array(
								'heading'			=> esc_html__('Icon Background Color', 'apcore'),
								'type'				=> 'colorpicker',
								'class'				=> '',						
								'param_name'		=> 'icon_background_color',
								'value'				=> '',	
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding',	
								'group'				=> esc_html__('Icon', 'apcore'),
							),
							array(
								'heading'			=> esc_html__('Hover Icon Background Color', 'apcore'),
								'type'				=> 'colorpicker',
								'class'				=> '',						
								'param_name'		=> 'hover_icon_background_color',
								'value'				=> '',	
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding',	
								'group'				=> esc_html__('Icon', 'apcore'),
							),														
							array(
								'type'				=> 'zolo_single_checkbox',
								'heading'			=> esc_html__('Border', 'apcore'),
								'description'		=> esc_html__('Disable border around the product box', 'apcore') ,
								'param_name'		=> 'border',
								'value'				=> 'no',
								'options'			=> array(
									'yes'			=> array(
										'on'				=> 'Yes',
										'off'				=> 'No',
									),
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	
								'group'				=> esc_html__('Style', 'apcore'),					
							),
							array(
								'heading'			=> esc_html__('Border color', 'apcore'),
								'description'		=> esc_html__('Enter a custom hover color', 'apcore'), 
								'type'				=> 'colorpicker',			
								'param_name'		=> 'border_color',
								'value'				=> '#dddddd',
								'dependency'		=> array('element' => 'border', 'value' => array('yes')),
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	
								'group'				=> esc_html__('Style', 'apcore'),				
							),
							array(
							   'type'    	=> 'zolo_box_shadow_param',
							   'heading'	=> esc_html__('Shadow', 'apcore'),
							   'param_name' => 'box_shadow',
							   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
							   'group'				=> esc_html__('Style', 'apcore'),
							),
							array(
								'type' 		=> 'zolo_number',
								'heading' 	=> __("Gutter",'apcore'),
								'param_name'=> 'gutter',
								'value'		=> '15',
								'suffix'	=> 'px',
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	
								'group'				=> esc_html__('Style', 'apcore'),
							),
							array(
								'type' 		=> 'zolo_number',
								'heading' 	=> __("Border Radius",'apcore'),
								'param_name'=> 'border_radius',
								'value'		=> '0',
								'suffix'	=> 'px',
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',
								'group'				=> esc_html__('Style', 'apcore'),
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
								"value"				=> "0",
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
										'font_size',							
										'line_height',
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
								'type'				=> 'colorpicker',
								'heading'			=> esc_html__('Text color', 'apcore'),
								'description'		=> esc_html__('Select category text color', 'apcore'), 
								'admin_label'		=> true,
								'class'				=> '',						
								'param_name'		=> 'text_color',
								'value'				=> '',	
								'group'				=> esc_html__('Title Style', 'apcore'),		
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding',	
							),
							array(
								'heading'			=> esc_html__('Hover Text Color', 'apcore'),
								'description'		=> esc_html__('This is the font color when category is hovered.', 'apcore'),
								'type'				=> 'colorpicker',
								'class'				=> '',
								'param_name'		=> 'text_hover_color',
								'value'				=> '',
								'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-padding',	
								'group'				=> esc_html__('Title Style', 'apcore'),
							),
							array(
								'type'				=> 'zolo_param_heading',
								'text'				=> esc_html__('Price Style', 'apcore'),
								'param_name'		=> 'price_heading',
								'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
								'group'				=> esc_html__('Price Style', 'apcore'),
							),
							array(
								'type'				=> 'zolo_font_container',
								'heading'			=> '',
								'param_name'		=> 'price_font_options',
								'settings'				=> array(
									'fields'				=> array(
										'font_size',							
										'line_height',
										'letter_spacing',
										'font_style',
										'color',
									),
								),
								'group'			=> esc_html__('Price Style', 'apcore'),
							),
							
							array(
								'type'				=> 'zolo_radio_advanced',
								'heading'			=> esc_html__('Custom font family', 'apcore'),
								'param_name'		=> 'price_google_fonts',
								'value'				=> 'no',
								'options'			=> array(
									esc_html__('Yes', 'apcore')	=> 'yes',
									esc_html__('No', 'apcore') => 'no',
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
								'group'				=> esc_html__('Price Style', 'apcore'),
							),
							array(
								'type'				=> 'google_fonts',
								'param_name'		=> 'price_custom_fonts',
								'settings'			=> array(
									'fields'			=> array(
										'font_family_description'	=> esc_html__('Select font family.', 'apcore'),
										'font_style_description'	=> esc_html__('Select font style.', 'apcore'),
									),
								),
								'edit_field_class'	=> 'vc_column vc_col-sm-12 no-border-bottom',
								'dependency' => array( 'element' => 'price_google_fonts', 'value' => 'yes'),
								'group'				=> esc_html__('Price Style', 'apcore'),
							),
						
					),	
				) );		
			}
		}

		function apress_product_category( $atts ){		
			ob_start();
			extract( shortcode_atts( array(			
				'products_style'		=> 'woocommerce_product_style1',
				'per_page' 				=>'',
				'orderby'				=> 'name',
				'order'					=> 'ASC',
				'category' 				=> '',
				'columns'				=> '3',
				'image_size'			=> 'full',
				'woo_title_alignment'	=> 'center',
				'hover_image'			=> 'yes',
				'carousel'				=> 'disable',
				'layout_mode'			=> 'fitrows',
				'slick_autoplay'		=> 'no',
				'slick_autoplay_duration' => '2000',
				'desktop_no_of_items' 	=> '3',
				'small_desktop_no_of_items' => '1',
				'tablet_no_of_items'	=> '1',
				'woo_rating'			=> 'yes',
				'woo_quick_view'		=> 'yes',
				'woo_wishlist'			=> 'yes',
				'woo_compare'			=> 'yes',
				'woo_badges'			=> 'yes',
				'slick_hide_arrow_navigation'=> 'yes',
				'arrows_style'			=> 'arrows_style1',
				'arrows_color'			=> '#ffffff',
				'arrows_bg'				=> '#549ffc',
				'slick_bullet_navigation' => 'yes',
				'bullet_navigation_style' => 'dots_style1',
				'bullet_bg'				=> '#000000',
				'border'				=> 'yes',
				'border_color'			=> '#dddddd',
				'box_shadow'			=> '',
				'gutter'				=> '20',
				'border_radius'			=> '0',
				'hover_overlay_color'	=> 'rgba(0, 0, 0, 0.4)',
				'icon_color'			=> '#999999',
				'hover_icon_color'		=> '#ffffff',
				'icon_background_color'	=> '#ffffff',
				'hover_icon_background_color' => '#999999',
				
				'title_font_options'	=> '',
				'title_google_fonts'	=> '',
				'title_custom_fonts'	=> '',
				'text_color'			=> '',
				'text_hover_color'		=> '',
				'price_font_options'	=> '',
				'price_google_fonts'	=> '',
				'price_custom_fonts'	=> '',
				'class'					=> '',
				'data_animation'		=> 'No Animation',
				'data_delay'			=> '500',			
			), $atts ) );
			
			
			
			//Animation
			if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
			
			// Default ordering args
			$ordering_args = WC()->query->get_catalog_ordering_args( $orderby, $order );
			$meta_query    = WC()->query->get_meta_query();
			
			$args	= array(
				'post_type'             => 'product',
				'post_status'           => 'publish',
				'ignore_sticky_posts'   => 1,
				'orderby'               => $ordering_args['orderby'],
				'order'                 => $ordering_args['order'],
				'posts_per_page'        => $per_page,
				'meta_query'            => $meta_query,
				'tax_query'             => array(
					array(
						'taxonomy'      => 'product_cat',
						'terms'         => array_map( 'sanitize_title', explode( ',', $category ) ),
						'field'         => 'slug',
						'operator'      => 'IN'
					)
				)
			);
	
			if ( isset( $ordering_args['meta_key'] ) ) {
				$args['meta_key'] = $ordering_args['meta_key'];
			}
			
			
			$products = new WP_Query( $args );
			
			ob_start();
			
			if ( $products->have_posts() ) : 

				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
				
				$uniqid = uniqid(rand());
				$products_class = 'products_class_'.$uniqid;

				$carousel_class = $woo_layout = $carousel_wrap = '';
				
				if($carousel == 'enable'){
					
					$wrap_class[] = 'zolo_image_slider';
					$carousel_class = 'zolo_slick_slider_holder image_slider_holder';
					
				}else{
					
					if($layout_mode == 'fitrows'){
						$woo_layout = 'woo_fitrows';
					}else{
						$woo_layout = 'woo_masonry';
					}
				}

				$wrap_class[] = $bullet_navigation_style;
				$wrap_class[] = $arrows_style;
				$wrap_class[] = 'woocommerce_product_title_'.$woo_title_alignment;
				
				$wrap_class = implode( ' ', $wrap_class );
				
// CSS  
$css_output ='';
	
if($border == 'yes'){
		$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .product_list_item{ border:1px solid '.$border_color.'!important;}';
	}else{
		$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .product_list_item{ border:0;}';
		}
if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .product_list_item:hover{'.$box_shadow.'}';
}

if($gutter != ''){
	if($carousel == 'enable'){
		$gutter_bottom = 0;
	}else{
		$gutter_bottom = $gutter + $gutter;
		}
	
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product{padding:0 '.$gutter.'px '.$gutter_bottom.'px}';
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products{margin:0 -'.$gutter.'px;}';
	}
if($border_radius != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .product_list_item{border-radius:'.$border_radius.'px; overflow: hidden;}';
	}


//Font Style
if(isset($title_font_options) && $title_font_options != '' || isset($title_custom_fonts) && $title_custom_fonts != '') {
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .woocommerce-loop-product__title{'.esc_attr($title_options["style"]).'}'; 
}

if(isset($price_font_options) && $price_font_options != '' || isset($price_custom_fonts) && $price_custom_fonts != '') {
	$price_options = _zolo_parse_text_shortcode_params($price_font_options, '', $price_google_fonts, $price_custom_fonts);
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product span.price,
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style5 li.product span.zolo_woo_price,
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style5 li.product span.zolo_woo_hover_price,
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style5 li.product span.zolo_woo_hover_price del{'.esc_attr($price_options["style"]).'}'; 
}
if($text_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .woocommerce-loop-product__title{ color:'.$text_color.';}';
}
if($text_hover_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .woocommerce-loop-product__title:hover{ color:'.$text_hover_color.';}';
}
if($hover_overlay_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element ul.products li.product .zolo_product_thumbnail:after{ background:' .$hover_overlay_color. '!important;}';
}
if($icon_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_shop_wishlist_button a.shop_wishlist_button,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_cart_button a.button, 
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style7 li.product a.button, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_compare_button a.button.compare, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_quickview_button a.apress-qv-button { color:'.$icon_color.'!important;}';
}
if($hover_icon_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_shop_wishlist_button:hover a.shop_wishlist_button,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_cart_button:hover a.button, 
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style7 li.product a.button:hover, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_compare_button:hover a.button.compare, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_quickview_button:hover a.apress-qv-button,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_shop_wishlist_button a.shop_wishlist_button.wishlist-link { color:' .$hover_icon_color. '!important;}';
}

if($icon_background_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_shop_wishlist_button,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_cart_button, 
	
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style7 li.product a.button, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_quickview_button, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_compare_button{ background:' .$icon_background_color. ';}';
}
if($hover_icon_background_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_shop_wishlist_button:hover,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_cart_button:hover, 
	#'.$products_class.'.woocommerce_products_element ul.products.woocommerce_product_style7 li.product a.button:hover,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_quickview_button:hover, 
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_compare_button:hover,
	#'.$products_class.'.woocommerce_products_element .woo_product_button_group .product_shop_wishlist_button a.shop_wishlist_button.wishlist-link{ background:' .$hover_icon_background_color. '!important;}';
}
if($arrows_color != ''){
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-arrow{ color:' .$arrows_color. ';}';
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-arrow:after{ background:' .$arrows_color. ';}';
}
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
	if($arrows_bg != ''){
		$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-arrow{ background:' .$arrows_bg. ';}';
	}
}
$arrow_position = $gutter + 46;
$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-arrow{ left:'.$arrow_position.'px;}';
$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-arrow.slick-next{left:auto; right:'.$arrow_position.'px;}';

if($slick_bullet_navigation == 'yes'){
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-track{ margin:80px 0 80px 0;}';
	
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.' }';
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider ul.slick-dots li button::after{ box-shadow:0 0 0 5px '.$bullet_bg.' inset; }';
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider.dots_style3 ul.slick-dots li button::after{background:'.$bullet_bg.'; }';
	
}else{
	$css_output .= '#'.$products_class.'.woocommerce_products_element.zolo_image_slider .slick-track{ margin:10px 0;}';
	}
apcore_save_plugin_dyn_styles( $css_output );


$slick_bullet_navigation = ($slick_bullet_navigation == 'yes')? 'true' : 'false';
$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
$slick_autoplay_true = ($slick_autoplay == 'yes')? 'true' : 'false';

// settings
$options_array = array(
	'class'						=> 'zolo_slick_slider woocommerce_products_element '.$wrap_class.' '.$class.' '.$animatedclass,

	'data-dots'					=> $slick_bullet_navigation,
	
	'data-infinite'				=> true,
	'data-speed'				=> 900,
	'data-desktop-show'			=> $desktop_no_of_items,
	'data-small-desktop-show'	=> $small_desktop_no_of_items,
	'data-tablet-show'			=> $tablet_no_of_items,
	'data-slidestoscroll'		=> 1,

	'data-autoplay'				=> $slick_autoplay_true,
	'data-autoplay-speed'		=> $slick_autoplay_duration,
	'data-arrows'				=> $slick_hide_arrow_navigation,
	'data-focusonselect'		=> true,
	
	'data-animation'			=> $data_animation,
	'data-delay'				=> $data_delay,
	
);
?>
<?php // Use <ul> tag instead of calling woocommerce_product_loop_start(); to detect WC shortcodes  
global $apress_data;
$woo_badges_shape = isset($apress_data["woo_badges_shape"]) ? $apress_data["woo_badges_shape"] : 'rectangle';
?>

<ul class="products <?php echo $products_style.' '.$woo_layout.' '.$carousel_class.' woo_badges_shape_'.$woo_badges_shape;?>">
	<?php
    while ( $products->have_posts() ) : $products->the_post();
        
    global $product,$post;
    $classes = array(); 
    
        if($layout_mode == 'fitrows'){
            $classes[] = 'fitrow_columns';
        }else{
            $classes[] = 'masonry-item';
            }
    
    ?>
  <li <?php post_class( $classes );?>>
    <?php if($products_style == 'woocommerce_product_style1'){?>
    <div class="product_list_item">
	<?php 
    if($woo_badges == 'yes'){
        if ( $product->is_in_stock() ) { 
        if ( $product->is_on_sale() ) {
         echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'apcore' ) . '</span>', $post, $product );
        }
        }else{
            echo '<div class="out_of_stock_badge_loop">' . esc_html__( 'Out of stock', 'apcore' ) .'</div>';            
        }
    }
    ?>
      <div class="zolo_product_thumbnail alternate_image_on_hover"> <span class="zolo_product_img">
		<?php
        $img = wpb_getImageBySize( array(
        'attach_id' => get_post_thumbnail_id(),
        'thumb_size' => $image_size,   
        ) );
        echo $thumbnail = $img['thumbnail'];
        
        if($hover_image == 'yes'){
            $attachment_ids = $product->get_gallery_image_ids();
            $first_gallery_img = reset($attachment_ids); //get the first image of gallery
            $image_link = wp_get_attachment_url( $first_gallery_img );	
            if (isset($image_link)){
                echo '<div class="zolo_product_hover_thumbnail" style="background:url('.$image_link.');"></div>';
            }
        }
        
        ?>
        <a href="<?php the_permalink(); ?>" class="zolo_product_img_link"></a> </span>
        <div class="zolo_cart_but"> 
          <!--button_group-->
          <div class="woo_product_button_group">
			<?php 
            //do_action( 'apcore_woocommerce_shop_loop_buttons' );
            $button	= apply_filters( 'woocommerce_loop_add_to_cart_link',
            sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s %s">%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->get_id() ),
                esc_attr( $product->get_sku() ),
                esc_attr( isset( $quantity ) ? $quantity : 1 ),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                esc_attr( $product->get_type() ),
                esc_attr( $product->get_type() == 'simple' && 'yes'  === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''),
                ( $product->add_to_cart_text() )
            ),
            $product );
            echo $button;	
            
            if($woo_wishlist == 'yes'){
                apress_theme_shop_page_wishlist_button();	
            }
            if($woo_quick_view == 'yes'){
                apress_add_quick_view_button();
            }
            if($woo_compare == 'yes'){
                apress_theme_add_compare_button();
            }
            ?>
          </div>
          <?php //do_action( 'woocommerce_after_shop_loop_item' ); ?>
          <?php do_action( 'apcore_woocommerce_shop_addtocart' ); ?>
        </div>
      </div>
      <!--product_details-->
      <div class="zolo_product_details">
		<?php
        echo '<a href="' . get_the_permalink() . '" ><h3 class="entry-title woocommerce-loop-product__title">' . get_the_title() . '</h3></a>';
        if ( $price_html = $product->get_price_html() ) { 
            echo '<span class="price">'.$price_html.'</span>';
        }
        if($woo_rating == 'yes'){
            echo '<span class="zolo_woo_rating">'.wc_get_rating_html( $product->get_average_rating()).'</span>';
        }
        ?>
      </div>
    </div>
    <?php }else if($products_style == 'woocommerce_product_style2' || $products_style == 'woocommerce_product_style3' || $products_style == 'woocommerce_product_style4'){?>
    <div class="product_list_item">
	<?php 
    if($woo_badges == 'yes'){
        if ( $product->is_in_stock() ) { 
        if ( $product->is_on_sale() ) {
         echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'apcore' ) . '</span>', $post, $product );
        }
        }else{
            echo '<div class="out_of_stock_badge_loop">' . esc_html__( 'Out of stock', 'apcore' ) .'</div>';            
        }
    }
    ?>
      <div class="zolo_product_thumbnail_wrapper">
        <div class="zolo_product_thumbnail alternate_image_on_hover">
		<?php
        $img = wpb_getImageBySize( array(
        'attach_id' => get_post_thumbnail_id(),
        'thumb_size' => $image_size,   
        ) );
        echo $thumbnail = $img['thumbnail'];
        if($hover_image == 'yes'){
            $attachment_ids = $product->get_gallery_image_ids();
            $first_gallery_img = reset($attachment_ids); //get the first image of gallery
            $image_link = wp_get_attachment_url( $first_gallery_img );	
            if (isset($image_link)){
                echo '<div class="zolo_product_hover_thumbnail" style="background:url('.$image_link.');"></div>';
            }
        }
        ?>
          <a href="<?php the_permalink(); ?>" class="zolo_product_img_link"></a> </div>
        
        <!--button_group-->
        <div class="woo_product_button_group">
		<?php 
        //do_action( 'apcore_woocommerce_shop_loop_buttons' );
        $button	= apply_filters( 'woocommerce_loop_add_to_cart_link',
        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s %s">%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( $product->get_id() ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            esc_attr( $product->get_type() ),
            esc_attr( $product->get_type() == 'simple' && 'yes'  === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''),
            ( $product->add_to_cart_text() )
        ),
        $product );
        echo $button;	
        
        if($woo_wishlist == 'yes'){
            apress_theme_shop_page_wishlist_button();	
        }
        if($woo_quick_view == 'yes'){
            apress_add_quick_view_button();
        }
        if($woo_compare == 'yes'){
            apress_theme_add_compare_button();
        }
        ?>
        </div>
      </div>
      
      <!--product_details-->
      <div class="zolo_product_details">
		<?php
        echo '<a href="' . get_the_permalink() . '" ><h3 class="entry-title woocommerce-loop-product__title">' . get_the_title() . '</h3></a>';
        if ( $price_html = $product->get_price_html() ) { 
            echo '<span class="price">'.$price_html.'</span>';
        }
        if($woo_rating == 'yes'){
            echo '<span class="zolo_woo_rating">'.wc_get_rating_html( $product->get_average_rating()).'</span>';
        }
        ?>
      </div>
    </div>
    <?php }else if($products_style == 'woocommerce_product_style5'){?>
    <div class="product_list_item">
	<?php 
    if($woo_badges == 'yes'){
        if ( $product->is_in_stock() ) { 
        if ( $product->is_on_sale() ) {
         echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'apcore' ) . '</span>', $post, $product );
        }
        }else{
            echo '<div class="out_of_stock_badge_loop">' . esc_html__( 'Out of stock', 'apcore' ) .'</div>';            
        }
    }
    ?>
      <div class="zolo_product_thumbnail_wrapper">
        <div class="zolo_product_thumbnail alternate_image_on_hover">
		<?php
        $img = wpb_getImageBySize( array(
        'attach_id' => get_post_thumbnail_id(),
        'thumb_size' => $image_size,   
        ) );
        echo $thumbnail = $img['thumbnail'];
        if($hover_image == 'yes'){
            $attachment_ids = $product->get_gallery_image_ids();
            $first_gallery_img = reset($attachment_ids); //get the first image of gallery
            $image_link = wp_get_attachment_url( $first_gallery_img );	
            if (isset($image_link)){
                echo '<div class="zolo_product_hover_thumbnail" style="background:url('.$image_link.');"></div>';
            }
        }
        ?>
          <a href="<?php the_permalink(); ?>" class="zolo_product_img_link"></a> </div>
        <!--caption-->
        <div class="woo_product_caption">
		<?php
        echo '<span class="zolo_woo_title">';
        echo '<a href="' . get_the_permalink() . '" ><h3 class="entry-title woocommerce-loop-product__title">' . get_the_title() . '</h3></a>';
        echo '</span>';
        if ( $price_html = $product->get_price_html() ) { 
            echo '<span class="zolo_woo_price">'.$price_html.'</span>';
        }
        echo '<span class="zolo_woo_hover_price">';
        if ( $price_html) {
            if(strpos($price_html,"amount") > 0){
                $price_html = str_replace("&ndash;","",$price_html); // remove dash "-" used in variable products
            }
            echo $price_html;
        }
        
        if($woo_rating == 'yes'){
            echo '<span class="zolo_woo_rating">'.wc_get_rating_html( $product->get_average_rating()).'</span>';
        }
        echo '</span>';
        ?>
        </div>
        
        <!--button_group-->
        <div class="woo_product_button_group">
		<?php 
        //do_action( 'apcore_woocommerce_shop_loop_buttons' );
        $button	= apply_filters( 'woocommerce_loop_add_to_cart_link',
        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s %s">%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( $product->get_id() ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            esc_attr( $product->get_type() ),
            esc_attr( $product->get_type() == 'simple' && 'yes'  === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''),
            ( $product->add_to_cart_text() )
        ),
        $product );
        echo $button;	
        
        if($woo_wishlist == 'yes'){
            apress_theme_shop_page_wishlist_button();	
        }
        if($woo_quick_view == 'yes'){
            apress_add_quick_view_button();
        }
        if($woo_compare == 'yes'){
            apress_theme_add_compare_button();
        }
        ?>
        </div>
      </div>
    </div>
    <?php }else if($products_style == 'woocommerce_product_style6' || $products_style == 'woocommerce_product_style7'){?>
    <div class="product_list_item">
	<?php 
    if($woo_badges == 'yes'){
        if ( $product->is_in_stock() ) { 
        if ( $product->is_on_sale() ) {
         echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'apcore' ) . '</span>', $post, $product );
        }
        }else{
            echo '<div class="out_of_stock_badge_loop">' . esc_html__( 'Out of stock', 'apcore' ) .'</div>';            
        }
    }
    ?>
    <div class="zolo_product_thumbnail alternate_image_on_hover"> <span class="zolo_product_img">
    <?php
            $img = wpb_getImageBySize( array(
            'attach_id' => get_post_thumbnail_id(),
            'thumb_size' => $image_size,   
            ) );
            echo $thumbnail = $img['thumbnail'];
            
            if($hover_image == 'yes'){
                $attachment_ids = $product->get_gallery_image_ids();
                $first_gallery_img = reset($attachment_ids); //get the first image of gallery
                $image_link = wp_get_attachment_url( $first_gallery_img );	
                if (isset($image_link)){
                    echo '<div class="zolo_product_hover_thumbnail" style="background:url('.$image_link.');"></div>';
                }
            }
            
            ?>
        <a href="<?php the_permalink(); ?>" class="zolo_product_img_link"></a> </span> 
        
        <!--button_group-->
        <div class="woo_product_button_group">
		<?php 
        //do_action( 'apcore_woocommerce_shop_loop_buttons' );
        $button	= apply_filters( 'woocommerce_loop_add_to_cart_link',
        sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s %s">%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( $product->get_id() ),
            esc_attr( $product->get_sku() ),
            esc_attr( isset( $quantity ) ? $quantity : 1 ),
            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
            esc_attr( $product->get_type() ),
            esc_attr( $product->get_type() == 'simple' && 'yes'  === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''),
            ( $product->add_to_cart_text() )
        ),
        $product );
        echo $button;	
        
        if($woo_wishlist == 'yes'){
            apress_theme_shop_page_wishlist_button();	
        }
        if($woo_quick_view == 'yes'){
            apress_add_quick_view_button();
        }
        if($woo_compare == 'yes'){
            apress_theme_add_compare_button();
        }
        ?>
        </div>
        <div class="zolo_cart_but">
          <?php do_action( 'apcore_woocommerce_shop_addtocart' ); ?>
        </div>
      </div>
      <!--product_details-->
      <div class="zolo_product_details">
		<?php
            echo '<a href="' . get_the_permalink() . '" ><h3 class="entry-title woocommerce-loop-product__title">' . get_the_title() . '</h3></a>';
            if ( $price_html = $product->get_price_html() ) { 
                echo '<span class="price">'.$price_html.'</span>';
            }
            if($woo_rating == 'yes'){
                echo '<span class="zolo_woo_rating">'.wc_get_rating_html( $product->get_average_rating()).'</span>';
            }
        ?>
      </div>
    </div>
    <?php }?>
  </li>
  <?php endwhile; // end of the loop. ?>
</ul>
<?php //Use </ul> tag instead of calling woocommerce_product_loop_end(); to detect WC shortcodes ?>
<?php 
		wp_reset_query();
		
		return '<div id="'.$products_class.'" '.array_to_data( $options_array ).'><div class="column_'.$columns.'">' . ob_get_clean() . '</div></div>';
		
		//echo 'Product loop started';
		
		else:
		
		return 'No produts found';
		
		endif;
		
			}
	}
	
	$Apress_Product_Category_Module = new Apress_Product_Category_Module;
}

