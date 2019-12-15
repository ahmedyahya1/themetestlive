<?php 
/*-----------------------------------------------------------------------------------*/
/* WooCommerce Categories
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Woocommerce_Categories_Module')) {
	class Apress_Woocommerce_Categories_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_product_categories_init' ) );
			add_shortcode( 'apress_product_categories', array( &$this, 'apress_product_categories' ) );
		}
		
		function apress_product_categories_init() {
			
			$order_by_values = apress_vc_woo_order_by();
			$order_way_values = apress_vc_woo_order_way();
		
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"				=> __("Apress Product Categories", 'apcore'),
					"base"				=> "apress_product_categories",
					"class"				=> "",
					//"weight"			=> 16,
					"category"			=> __( "WooCommerce", "apcore"),
					"description"		=> __("Product Categories", "apcore"),
					"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-woo.png",
					"params"			=> array(		
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Categories Style', 'apcore' ),
							'param_name'  => 'categories_style',
							"weight"		=> 1,
							'simple_mode' => false,
							'admin_label' => true,
								'options'     => array(
									'woo_categories_style1' => array(
										'tooltip' => esc_attr__('Style1','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/woo_categories_style1.jpg'
									),
									'woo_categories_style2' => array(
										'tooltip' => esc_attr__('Style2','apcore'),
										'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/woocommerce/woo_categories_style2.jpg'
									),
								),
						),	
						array(
							'type' => 'textfield',
							'heading' => __( 'Number', 'apcore' ),
							'param_name' => 'number',
							'description' => __( 'The `number` field is used to display the number of products.', 'apcore' ),
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
						  'type'				=> 'textfield',
						  'heading'				=> __('Image Size', 'apcore'),
						  'param_name'			=> 'image_size',
						  'value'				=> '',
						  'description'			=> __('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'apcore'),
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
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Hide empty categories', 'apcore'),
							'description'		=> esc_html__('Hide categories that have no any products', 'apcore'),
							'param_name'		=> 'hide_empty',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	
						),
						array(
							'type' => 'textfield',
							'heading' => __( 'Parent Category ID', 'apcore' ),
							'param_name' => 'parent'
						),
						array(
							'type' => 'autocomplete',
							'heading' => __( 'Categories', 'apcore' ),
							'param_name' => 'ids',
							'settings' => array(
								'multiple' => true,
								'sortable' => true,
							),
							'description' => __( 'List of product categories', 'apcore' ),
						),
						array(
							'type'				=> 'colorpicker',
							'heading'			=> esc_html__('Text color', 'apcore'),
							'description'		=> esc_html__('Select category text color', 'apcore'), 
							'admin_label'		=> true,
							'class'				=> '',						
							'param_name'		=> 'text_color',
							'value'				=> '',	
							'group'				=> esc_html__('Style', 'apcore'),	
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin no-top-padding',			
						),
						array(
							'heading'			=> esc_html__('Hover Text Color', 'apcore'),
							'description'		=> esc_html__('This is the font color when category is hovered.', 'apcore'),
							'type'				=> 'colorpicker',
							'class'				=> '',
							'param_name'		=> 'text_hover_color',
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin no-top-padding',	
							'group'				=> esc_html__('Style', 'apcore'),
						),
						array(
							'heading'			=> esc_html__('Image Hover Overlay Color', 'apcore'),
							'description'		=> esc_html__('Enter a custom hover overlay color', 'apcore'), 
							'type'				=> 'colorpicker',
							'class'				=> '',						
							'param_name'		=> 'hover_overlay_color',
							'value'				=> '',	
							'group'				=> esc_html__('Style', 'apcore'),
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
							'value'		=> '20',
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
							'heading'			=> esc_html__('Show Product count', 'apcore'),
							'description'		=> esc_html__('Show product count', 'apcore'),
							'type'				=> 'zolo_single_checkbox',
							'param_name'		=> 'count',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	
						),
						array(						
							'heading'			=> esc_html__('Show category description', 'apcore'),
							'description'		=> esc_html__('Show category description', 'apcore'),
							'type'				=> 'zolo_single_checkbox',
							'param_name'		=> 'description',
							'value'				=> 'yes',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
							'edit_field_class'	=> 'vc_column vc_col-sm-6 no-top-margin',	
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
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Description Style', 'apcore'),
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
								),
							),
							'group'			=> esc_html__('Description Style', 'apcore'),
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
					),
					) );
				}
				//Filters For autocomplete param:
				//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
				add_filter( 'vc_autocomplete_apress_product_categories_ids_callback', 'apress_shortcode_product_categories_ids_callback', 10, 1 ); // Get suggestion(find). Must return an array
				add_filter( 'vc_autocomplete_apress_product_categories_ids_render', 'apress_shortcode_product_categories_ids_render', 10, 1 ); // Render exact category by id. Must return an array (label,value)
				function apress_shortcode_product_categories_ids_callback($query) {
					if (class_exists('Vc_Vendor_Woocommerce')) {
						$vc_vendor_wc = new Vc_Vendor_Woocommerce();
						return $vc_vendor_wc->productCategoryCategoryAutocompleteSuggester($query);
					}
					return '';
				}
				
				function apress_shortcode_product_categories_ids_render($query) {
					if (class_exists('Vc_Vendor_Woocommerce')) {
						$vc_vendor_wc = new Vc_Vendor_Woocommerce();
						return $vc_vendor_wc->productCategoryCategoryRenderByIdExact($query);
					}
					return '';
				}
		}

		function apress_product_categories( $atts, $content=null ){			
			global $woocommerce_loop;
			$output = '';
			$atts = shortcode_atts( array(
				'number'				=> null,
				'orderby'				=> 'name',
				'order'					=> 'ASC',
				'columns'				=> '1',
				'categories_style'		=> 'categories_style1',
				'image_size'			=> '',
				'hide_empty'			=> 'yes',
				'parent'				=> '',
				'ids'					=> '',
				'border'				=> '',
				'border_color'			=> '#dddddd',
				'box_shadow'			=> '',
				'gutter'				=> '20',
				'border_radius'			=> '0',
				'count'					=> 'yes',
				'description'			=> 'yes',
				'hover_overlay_color'	=> '',
				'text_color'			=> '',
				'text_hover_color'		=> '',
				'title_font_options'	=> '',
				'title_google_fonts'	=> '',
				'title_custom_fonts'	=> '',
				'description_font_options'=> '',
				'description_google_fonts'=> '',
				'description_custom_fonts'=> '',
				'data_animation'		=> 'No Animation',
				'data_delay'			=> '0',
				
			), $atts );

        extract($atts);
		if(!class_exists("woocommerce"))
			return;
			
		//Animation
		if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
        if ( isset( $ids ) ) {
            $ids = explode( ',', $ids );
            $ids = array_map( 'trim', $ids );
        } else {
            $ids = array();
        }

        $hide_empty = ( $hide_empty == 'yes' || $hide_empty == 1 ) ? 1 : 0;

        // get terms and workaround WP bug with parents/pad counts
        $args = array(
            'orderby'    => $orderby,
            'order'      => $order,
            'hide_empty' => $hide_empty,
            'include'    => $ids,
            'pad_counts' => true,
            'child_of'   => $parent
        );

        $product_categories = get_terms( 'product_cat', $args );

        if( is_wp_error( $product_categories ) ) {
            return;
        }
		
		
        if ( '' !== $parent ) {
            $product_categories = wp_list_filter( $product_categories, array( 'parent' => $parent ) );
        }

        if ( $hide_empty ) {
            foreach ( $product_categories as $key => $category ) {
                if ( $category->count == 0 ) {
                    unset( $product_categories[ $key ] );
                }
            }
        }

        if ( $number ) {
            $product_categories = array_slice( $product_categories, 0, $number );
        }

        $columns = absint( $columns );
        $woocommerce_loop['columns'] = $columns;

        $class = array();
      

        ob_start();

        // Reset loop/columns globals when starting a new loop
        $woocommerce_loop['loop'] = $woocommerce_loop['column'] = '';

        if ( $product_categories ) {?>
            <ul class="products <?php echo 'woocommerce_' . esc_attr($columns) . 'column' ?>" style=" margin:0 -<?php echo $gutter;?>px;">

            <?php
            foreach ( $product_categories as $category ) {
                wc_get_template( 'content-product_cat.php', array(
                    'category' => $category,
                    'border' => $border,
					'border_color' => $border_color,
					'box_shadow' => $box_shadow,
					'border_radius' => $border_radius,
					'gutter' => $gutter,
                    'count' => $count,
                    'description' => $description,
                    'hover_overlay_color' => $hover_overlay_color,
                    'text_color' => $text_color,
					'text_hover_color'=>$text_hover_color,
                    'image_size' => $image_size,
					'categories_style'=> $categories_style,
					'title_font_options'=> $title_font_options,
					'title_google_fonts'=> $title_google_fonts,
					'title_custom_fonts'=> $title_custom_fonts,
					'description_font_options'=> $description_font_options,
					'description_google_fonts'=> $description_google_fonts,
					'description_custom_fonts'=> $description_custom_fonts,
                ) );
            }
            ?>
            </ul>
            <?php }

        woocommerce_reset_loop();
		
		return '<div class="woocommerce zolo_woo_categories  ' . esc_attr($animatedclass . ' ' .$categories_style. ' ' . implode(' ', $class)) . '"  ' . (strlen(esc_attr($data_animation)) ?  'data-delay="' . esc_attr($data_delay) . '" data-animation="' . esc_attr($data_animation) : '') . '">' . ob_get_clean() . '</div>';
		
    
			}
	}
	
	$Apress_Woocommerce_Categories_Module = new Apress_Woocommerce_Categories_Module;
}

