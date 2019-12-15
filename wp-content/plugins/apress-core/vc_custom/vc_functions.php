<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if( !function_exists ('zolo_shortcodes_scripts') ) :
	function zolo_shortcodes_scripts() {
	$doc_link = 'http://apressthemes.com/apress/documentation';	
	global $post,$doc_link;
	if(!is_object($post)) return;
	if ( is_404() ) {
		$page_full_screen_rows = ''; 
	 }else{
	  	$page_full_screen_rows = get_post_meta($post->ID, 'zt_full_screen_rows', true ); 
	 }
	$scripts_dir = APRESS_EXTENSIONS_PLUGIN_URL;
	
	$theme_info = wp_get_theme();
	
	// CSS Add Here 	
	wp_register_style('twentytwenty', $scripts_dir . 'vc_custom/assets/css/twentytwenty.css', array(), $theme_info->get( 'Version' ) );
	if($page_full_screen_rows == 'on'){
	wp_enqueue_style( 'fullPage', $scripts_dir . 'vc_custom/assets/css/jquery.fullPage.css', array(), $theme_info->get( 'Version' ) );
	}
	wp_enqueue_style('zt-multiscroll', $scripts_dir . 'vc_custom/assets/css/jquery.multiscroll.css', array(), $theme_info->get( 'Version' ) );
	wp_enqueue_style( 'zt-shortcode', $scripts_dir . 'vc_custom/assets/css/zt-shortcode.css', array(), $theme_info->get( 'Version' ) );
	wp_register_style('zt-linea', $scripts_dir . 'vc_custom/assets/css/fonts/svg/font/all_linea_styles.css', array(), $theme_info->get( 'Version' ) );
	
	// JS Add Here
	wp_enqueue_script( 'zt-jquery.countTo', $scripts_dir . 'vc_custom/assets/js/jquery.countTo.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	
	wp_enqueue_script( 'owl.carousel', $scripts_dir . 'vc_custom/assets/js/owl.carousel.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );	
	
	wp_enqueue_script( 'zt-jquery.appear', $scripts_dir . 'vc_custom/assets/js/jquery.appear.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	wp_enqueue_script( 'zt-easy-pie-chart', $scripts_dir . 'vc_custom/assets/js/jquery.easy-pie-chart.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	wp_enqueue_script( 'jquery.justifiedGallery.min', $scripts_dir . 'vc_custom/assets/js/jquery.justifiedGallery.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	
	wp_register_script('twentytwenty', $scripts_dir . 'vc_custom/assets/js/jquery.twentytwenty.js', 'jquery', $theme_info->get( 'Version' ), true );
	wp_register_script('zolowave', $scripts_dir . 'vc_custom/assets/js/jquery.zolowave.js', 'jquery', $theme_info->get( 'Version' ), true );
	wp_register_script('tilt.jquery.min', $scripts_dir . 'vc_custom/assets/js/tilt.jquery.min.js', 'jquery', $theme_info->get( 'Version' ), true );
	wp_register_script('zt-column-parallax-hover', $scripts_dir . 'vc_custom/assets/js/jquery.parallax.js', 'jquery', $theme_info->get( 'Version' ), true );
	wp_register_script('zt-column-parallax', $scripts_dir . 'vc_custom/assets/js/jquery.paroller.js', 'jquery', $theme_info->get( 'Version' ), true );
	wp_register_script('zt-portfolioslider', $scripts_dir . 'vc_custom/assets/js/zt-portfolioslider.js', 'jquery', $theme_info->get( 'Version' ), true );
	

	wp_enqueue_script( 'jquery.easings', $scripts_dir . 'vc_custom/assets/js/jquery.easings.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	wp_enqueue_script( 'jquery.multiscroll', $scripts_dir . 'vc_custom/assets/js/jquery.multiscroll.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	//wp_enqueue_script( 'jquery.equalheight', $scripts_dir . 'vc_custom/assets/js/equalheight.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	if($page_full_screen_rows == 'on'){
		wp_enqueue_script( 'zt-fullPage', $scripts_dir . 'vc_custom/assets/js/jquery.fullPage.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	}
	wp_enqueue_script( 'anime.min', $scripts_dir . 'vc_custom/assets/js/anime.min.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
	wp_register_script('zt-video_lightbox', $scripts_dir . 'vc_custom/assets/js/jquery.youtubeVimeo.js', 'jquery', $theme_info->get( 'Version' ), true );
	
	wp_enqueue_script( 'zt-all_scripts', $scripts_dir . 'vc_custom/assets/js/all_scripts.js', array ( 'jquery' ), $theme_info->get( 'Version' ), true );
}
add_action('wp_enqueue_scripts', 'zolo_shortcodes_scripts');
endif;

if( !function_exists ('isotope_categories') ) : 
function isotope_categories($rnd_id) {
	
	$terms = get_terms("category"); 
	$count = count($terms);  
	
	$html = '<div class="button-group filters-button-group postfilter-'.$rnd_id.'">';
	$html .= '<button class="button is-checked"  data-filter="*">'.__("All", "apcore").'</button>';
	
	if ( $count > 0 ){  
		foreach ( $terms as $term ){
			$termname = strtolower($term->name);
			$termname = str_replace(' ', '-', $termname);
			$html .= '<button class="button" data-filter=".'.$termname.'">'.$term->name.'</button>';
		
		}
		$html .= '</div>';
		echo $html;
	}
}
endif;
if( !function_exists ('isotope_portfolio_categories') ) :
function isotope_portfolio_categories($rnd_id) {
	
	$terms = get_terms("catportfolio"); 
	$count = count($terms);  
	
	$html = '<div class="button-group filters-button-group portfoliofilter-'.$rnd_id.'">';
	$html .= '<button class="button is-checked"  data-filter="*">'.__("All", "apcore").'</button>';
	
	if ( $count > 0 ){  
		foreach ( $terms as $term ) {  
			$termname = strtolower($term->name);  
			$termname = str_replace(' ', '-', $termname);  
			$html .= '<button class="button" data-filter=".'.$termname.'">'.$term->name.'</button>';  
		
		}
	
		$html .= '</div>';	
		echo $html;
	}
}
endif;

if( !function_exists ('apress_data_animations') ) : 
function apress_data_animations() {

	$array = array(__("No Animation",'apcore') => "No Animation",__("bounce",'apcore') => "bounce",__("flash",'apcore') => "flash",__("pulse",'apcore') => "pulse",__("rubberBand",'apcore') => "rubberBand",__("shake",'apcore') => "shake",__("headShake",'apcore') => "headShake",__("swing",'apcore') => "swing",__("tada",'apcore') => "tada",__("wobble",'apcore') => "wobble",__("jello",'apcore') => "jello",__("bounceIn",'apcore') => "bounceIn",__("bounceInDown",'apcore') => "bounceInDown",__("bounceInLeft",'apcore') => "bounceInLeft",__("bounceInRight",'apcore') => "bounceInRight",__("bounceInUp",'apcore') => "bounceInUp",__("bounceOut",'apcore') => "bounceOut",__("bounceOutDown",'apcore') => "bounceOutDown",__("bounceOutLeft",'apcore') => "bounceOutLeft",__("bounceOutRight",'apcore') => "bounceOutRight",__("bounceOutUp",'apcore') => "bounceOutUp",__("fadeIn",'apcore') => "fadeIn",__("fadeInDown",'apcore') => "fadeInDown",__("fadeInDownBig",'apcore') => "fadeInDownBig",__("fadeInLeft",'apcore') => "fadeInLeft",__("fadeInLeftBig",'apcore') => "fadeInLeftBig",__("fadeInRight",'apcore') => "fadeInRight",__("fadeInRightBig",'apcore') => "fadeInRightBig",__("fadeInUp",'apcore') => "fadeInUp",__("fadeInUpBig",'apcore') => "fadeInUpBig",__("fadeOut",'apcore') => "fadeOut",__("fadeOutDown",'apcore') => "fadeOutDown",__("fadeOutDownBig",'apcore') => "fadeOutDownBig",__("fadeOutLeft",'apcore') => "fadeOutLeft",__("fadeOutLeftBig",'apcore') => "fadeOutLeftBig",__("fadeOutRight",'apcore') => "fadeOutRight",__("fadeOutRightBig",'apcore') => "fadeOutRightBig",__("fadeOutUp",'apcore') => "fadeOutUp",__("fadeOutUpBig",'apcore') => "fadeOutUpBig",__("flipInX",'apcore') => "flipInX",__("flipInY",'apcore') => "flipInY",__("flipOutX",'apcore') => "flipOutX",__("flipOutY",'apcore') => "flipOutY",__("lightSpeedIn",'apcore') => "lightSpeedIn",__("lightSpeedOut",'apcore') => "lightSpeedOut",__("rotateIn",'apcore') => "rotateIn",__("rotateInDownLeft",'apcore') => "rotateInDownLeft",__("rotateInDownRight",'apcore') => "rotateInDownRight",__("rotateInUpLeft",'apcore') => "rotateInUpLeft",__("rotateInUpRight",'apcore') => "rotateInUpRight",__("rotateOut",'apcore') => "rotateOut",__("rotateOutDownLeft",'apcore') => "rotateOutDownLeft",__("rotateOutDownRight",'apcore') => "rotateOutDownRight",__("rotateOutUpLeft",'apcore') => "rotateOutUpLeft",__("rotateOutUpRight",'apcore') => "rotateOutUpRight",__("hinge",'apcore') => "hinge",__("rollIn",'apcore') => "rollIn",__("rollOut",'apcore') => "rollOut",__("zoomIn",'apcore') => "zoomIn",__("zoomInDown",'apcore') => "zoomInDown",__("zoomInLeft",'apcore') => "zoomInLeft",__("zoomInRight",'apcore') => "zoomInRight",__("zoomInUp",'apcore') => "zoomInUp",__("zoomOut",'apcore') => "zoomOut",__("zoomOutDown",'apcore') => "zoomOutDown",__("zoomOutLeft",'apcore') => "zoomOutLeft",__("zoomOutRight",'apcore') => "zoomOutRight",__("zoomOutUp",'apcore') => "zoomOutUp",__("slideInDown",'apcore') => "slideInDown",__("slideInLeft",'apcore') => "slideInLeft",__("slideInRight",'apcore') => "slideInRight",__("slideInUp",'apcore') => "slideInUp",__("slideOutDown",'apcore') => "slideOutDown",__("slideOutLeft",'apcore') => "slideOutLeft",__("slideOutRight",'apcore') => "slideOutRight",__("slideOutUp",'apcore') => "slideOutUp");
		
	return $array;
}
endif;

// Generate random string 
if( !function_exists ('RandomString') ) :
function RandomString($length) {
	
	$key = null;
    $keys = array_merge(range(0,9), range('a', 'z'));

    for($i=0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}
endif;

if(!function_exists('_zolo_parse_text_shortcode_params')){
	/**
	 * Parse TEXT params in shortcodes.
	 *
	 * @param $string
	 * @param $tag_class
	 * @param $use_google_fonts
	 * @param $custom_fonts
	 *
	 * @return array
	 */
	function _zolo_parse_text_shortcode_params( $string, $tag_class = '', $use_google_fonts = 'no', $custom_fonts = false, $in_head = false ) {
		$parsed_param =  array();
		$parsed_array = array(
			'style' => '',
			'tag' => 'div',
			'class' => '',
			'color' => '',
		);
		$param_value  = explode( '|', $string );

		if ( is_array( $param_value ) ) {
			foreach ( $param_value as $single_param ) {
				$single_param                     = explode( ':', $single_param );
				if ( isset($single_param[1]) && $single_param[1] != '' ) {
					$parsed_param[ $single_param[0] ] = $single_param[1];
				} else {
					$parsed_param[ $single_param[0] ] = '';
				}
			}
		}

		if ( ! empty( $parsed_param ) && is_array( $parsed_param ) ) {
//			$parsed_array['style'] = 'style="';

			if ( ('yes' === trim($use_google_fonts) || 'show' === trim($use_google_fonts)) && class_exists('Vc_Google_Fonts')) {

				$google_fonts_obj  = new Vc_Google_Fonts();
				$google_fonts_data = strlen( $custom_fonts ) > 0 ? $google_fonts_obj->_vc_google_fonts_parse_attributes( array(), $custom_fonts ) : '';
				
				if($google_fonts_data != '') {
					$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
					$parsed_array['style'] .= 'font-family:' . $google_fonts_family[0] . '; ';
					$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
					$parsed_array['style'] .= 'font-weight:' . $google_fonts_styles[1] . '; ';
					$parsed_array['style'] .= 'font-style:' . $google_fonts_styles[2] . '; ';

					$settings = get_option( 'wpb_js_google_fonts_subsets' );
					if ( is_array( $settings ) && ! empty( $settings ) ) {
						$subsets = '&subset=' . implode( ',', $settings );
					} else {
						$subsets = '';
					}

					if ( isset( $google_fonts_data['values']['font_family'] ) && function_exists('vc_build_safe_css_class') ) {
						wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
					}
				}
			}

			foreach ( $parsed_param as $key => $value ) {

				if ( strlen( $value ) > 0 ) {
					if ( 'font_style_italic' === $key ) {
						$parsed_array['style'] .= 'font-style:italic; ';
					} elseif ( 'font_style_bold' === $key ) {
						$parsed_array['style'] .= 'font-weight:bold; ';
					} elseif ( 'font_style_underline' === $key ) {
						$parsed_array['style'] .= 'text-decoration:underline; ';
					} elseif('font_family' === $key){
						$parsed_array['style'] .= 'font-family: '.$value.'; ';
					} elseif ( 'color' === $key ) {
						$value = str_replace( '%23', '#', $value );
						$value = str_replace( '%2C', ',', $value );
						$parsed_array['style'] .= $key . ':' . $value . '; ';
						$parsed_array['color'] = $value;
					} elseif('tag' === $key){
						$parsed_array['tag'] = $value;
					} else {
						$parsed_array['style'] .= str_replace( '_', '-', $key ) . ': ' . $value . 'px; ';
					}
				}
			}
			if(!$in_head) {
				$parsed_array['style'] = 'style="'.$parsed_array['style'].'"';
			}
			if ( isset($parsed_array['tag']) && ('div' === $parsed_array['tag']) ) {
				$parsed_array['class'] = $tag_class;
			}
		}

		return $parsed_array;
	}
}
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$templates_path = APRESS_EXTENSIONS_PLUGIN_PATH . 'vc_custom/vc_templates/';
	vc_set_shortcodes_templates_dir( $templates_path );
	require_once APRESS_EXTENSIONS_PLUGIN_PATH ."vc_custom/ajax-handlers.php";
}

/*function apress_set_vc_as_theme() {	
	$scripts_dir = APRESS_EXTENSIONS_PLUGIN_PATH;
	vc_set_as_theme($disable_updater = true);
	$template_directory = get_template_directory();

	if(defined( 'APRESS_VC_ACTIVE')) {
	    $parent_dir = $scripts_dir . 'vc_custom/vc_templates';
	    vc_set_shortcodes_templates_dir($parent_dir);
		require_once $scripts_dir ."vc_custom/ajax-handlers.php";
	} else {
	    $parent_dir = $scripts_dir . 'vc_custom/vc_templates';
	    vc_set_shortcodes_templates_dir($parent_dir);	
		require_once $scripts_dir ."vc_custom/ajax-handlers.php";	
	}
	
	//if ( function_exists( 'vc_set_default_editor_post_types' ) ) {
		//vc_set_default_editor_post_types( array( 'page', 'post' ) );
	//}

	//if(function_exists('vc_disable_frontend')) {
		//vc_disable_frontend();
	//}

}
add_action('vc_before_init', 'apress_set_vc_as_theme');*/

/*if(function_exists( 'vc_remove_element' )) {
//	vc_remove_element( 'vc_icon' );  
	vc_remove_element( 'vc_toggle' );  
	vc_remove_element( 'vc_images_carousel' );
	vc_remove_element( 'vc_tabs' ); 
	vc_remove_element( 'vc_tour' );  
	vc_remove_element( 'vc_accordion' );
	vc_remove_element( 'vc_tta_pageable' );  
	vc_remove_element( 'swatch_container' );   
	vc_remove_element( 'ultimate_video_banner' );  
	vc_remove_element( 'vc_posts_slider' );
	vc_remove_element( 'vc_progress_bar' ); 
	vc_remove_element( 'vc_pie' ); 
	vc_remove_element( 'vc_basic_grid' );
	vc_remove_element( 'vc_media_grid' );
	vc_remove_element( 'vc_masonry_grid' );
	vc_remove_element( 'vc_masonry_media_grid' );
	//vc_remove_element( 'vc_button' );
	vc_remove_element( 'vc_button2' ); 
	vc_remove_element( 'vc_cta_button' ); 
	vc_remove_element( 'vc_cta_button2' ); 
	vc_remove_element( 'vc_cta' );  
	vc_remove_element( 'vc_wp_search' );
	vc_remove_element( 'vc_element-description' );
	vc_remove_element( 'vc_wp_recentcomments' );
	vc_remove_element( 'vc_wp_calendar' ); 
	vc_remove_element( 'vc_wp_pages' ); 
	vc_remove_element( 'vc_wp_tagcloud' ); 
	vc_remove_element( 'vc_wp_custommenu' ); 
	vc_remove_element( 'vc_wp_text' ); 
	vc_remove_element( 'vc_wp_posts' ); 
	vc_remove_element( 'vc_wp_categories' ); 
	vc_remove_element( 'vc_wp_archives' ); 
	vc_remove_element( 'vc_wp_rss' );  
	vc_remove_element( 'vc_wp_meta' );
	//vc_remove_element( 'contact-form-7' );
}*/

//Remove WC shortcodes
remove_shortcode('product');
remove_shortcode('products');
remove_shortcode('recent_products');
remove_shortcode('sale_products');
remove_shortcode('best_selling_products');
remove_shortcode('top_rated_products');
remove_shortcode('featured_products');
remove_shortcode('product_attribute');
remove_shortcode('product_categories');
remove_shortcode('product_category');
remove_shortcode('product_page');

if(function_exists('vc_remove_param')) {
	vc_remove_param('vc_tta_accordion', 'style');
	vc_remove_param('vc_tta_accordion', 'shape');
	vc_remove_param('vc_tta_accordion', 'color'); 
	vc_remove_param('vc_tta_accordion', 'no_fill');
	vc_remove_param('vc_tta_accordion', 'spacing');
	vc_remove_param('vc_tta_accordion', 'gap');
	vc_remove_param('vc_tta_accordion', 'mt');
	vc_remove_param('vc_tta_accordion', 'mb');
	//vc_remove_param('vc_tta_accordion', 'c_align');
	//vc_remove_param('vc_tta_accordion', 'c_position');
	
}
///////////////////////////////////////////////////////////////////////////////////////
//////                                                                           /////
/////                            ACCORDION module modifications                 /////
////                                                                           /////
///////////////////////////////////////////////////////////////////////////////////


/* VC settings */
if(function_exists('vc_add_param')){
	
	$row_params = array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __( "Row Name", 'apcore' ),
			"param_name" => "row_name",
			"description" => __( "This will be shown in your dot navigation when using the Fullscreen Row option",'apcore' ),
			'weight' => 2
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __( "Select Color Scheme for Menu and Logo", 'apcore' ),
			"param_name" => "row_text_color",
			"value" => array (__("Dark",'apcore') => "dark",__("Light",'apcore') => "light"),
			"description" => __( "This will only work in Full Screen presentation and Vertical Split page", 'apcore' ),
			'weight' => 1
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __( "Active Class", 'apcore' ),
			"value" => array("Yes" => "true" ),
			"param_name" => "active_onepage_class",
			"description" => __( "Active class in Onepage Navigation", 'apcore' ),
			'weight' => 1
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __( "Overflow Visible", 'apcore' ),
			"value" => array("Yes" => "true" ),
			"param_name" => "overflow_visible",
			'weight' => 1
		),
		array(
			"type" => "textfield",
			"heading" => __( "Z-Index", 'apcore' ),
			"param_name" => "apress_z_index",
			'weight' => 1
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Enable Separator', 'apcore'),
			'param_name'		=> 'apress_enable_separator',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			"group"			=> esc_html__('Separator', 'apcore'),
		),
		array(
			'type'			=> 'zolo_radio_advanced',
			"heading"		=> __( "Separator Type", 'apcore' ),
			'param_name'	=> 'apress_separator_type',
			'value'			=> 'static',
			'options'		=> array(
				esc_html__('Static', 'apcore')		=> 'static',
				esc_html__('Fluid', 'apcore') 		=> 'fluid',
			),
			"group"			=> esc_html__('Separator', 'apcore'),
			'dependency'		=> array('element' => 'apress_enable_separator', 'value' => 'yes'),
		),
		array(
			'type'        => 'radio_image_select',
			'heading'     => esc_html__( 'Style', 'apcore' ),
			'param_name'  => 'apress_separator_style',
			'simple_mode' => false,
			//'admin_label' => true,
			'options'     => array(
			'style1' => array(
				'tooltip' => esc_attr__('Separator Style1','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style1.jpg'
			),
			'style2' => array(
				'tooltip' => esc_attr__('Separator Style2','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style2.jpg'
			),
			'style3' => array(
				'tooltip' => esc_attr__('Separator Style3','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style3.jpg'
			),
			'style4' => array(
				'tooltip' => esc_attr__('Separator Style4','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style4.jpg'
			),
			'style5' => array(
				'tooltip' => esc_attr__('Separator Style5','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style5.jpg'
			),
			'style6' => array(
				'tooltip' => esc_attr__('Separator Style6','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style6.jpg'
			),
			'style7' => array(
				'tooltip' => esc_attr__('Separator Style7','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style7.jpg'
			),
			'style8' => array(
				'tooltip' => esc_attr__('Separator Style8','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style8.jpg'
			),
			'style9' => array(
				'tooltip' => esc_attr__('Separator Style9','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style9.jpg'
			),
			'style10' => array(
				'tooltip' => esc_attr__('Separator Style10','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style10.jpg'
			),
			'style11' => array(
				'tooltip' => esc_attr__('Separator Style11','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style11.jpg'
			),
			'style12' => array(
				'tooltip' => esc_attr__('Separator Style12','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style12.jpg'
			),
			'style13' => array(
				'tooltip' => esc_attr__('Separator Style13','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style13.jpg'
			),
			'style14' => array(
				'tooltip' => esc_attr__('Separator Style14','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style14.jpg'
			),
			'style15' => array(
				'tooltip' => esc_attr__('Separator Style15','apcore'),
				'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/separator/style15.jpg'
			),
		),
		'dependency'		=> array('element' => 'apress_separator_type', 'value' => 'static'),
		"group"			=> esc_html__('Separator', 'apcore'),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("Separator Color",'apcore'),
			'param_name'=> 'apress_separator_color',
			'value' 	=> '#ffffff',
			'dependency'=> array('element' => 'apress_separator_type', 'value' => 'static'),
			'group'		=> esc_html__( 'Separator', 'apcore' ),
		),
		array(
			'type' 		=> 'zolo_number',
			'heading' 	=> __("Separator Height",'apcore'),
			'param_name'=> 'apress_separator_height',
			'value'				=> '150',
			'suffix'			=> 'px',
			'dependency'		=> array('element' => 'apress_separator_type', 'value' => 'static'),
			'group'		=> esc_html__( 'Separator', 'apcore' ),
		),
		array(
			'type'			=> 'zolo_radio_advanced',
			"heading"		=> __( "Separator Position", 'apcore' ),
			'param_name'	=> 'apress_separator_position',
			'value'			=> 'bottom',
			'options'		=> array(
				esc_html__('Bottom', 'apcore')		=> 'bottom',
				esc_html__('Top', 'apcore') 		=> 'top',
				esc_html__('Bottom & Top', 'apcore')=> 'bottom_top',
			),
			'dependency'		=> array('element' => 'apress_separator_type', 'value' => 'static'),
			"group"			=> esc_html__('Separator', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Bring to front?', 'apcore'),
			'param_name'		=> 'apress_separator_tofront',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'dependency'		=> array('element' => 'apress_separator_type', 'value' => 'static'),
			"group"			=> esc_html__('Separator', 'apcore'),
		),
		array(
			'type' 		=> 'zolo_number',
			'heading' 	=> __("Separator Height",'apcore'),
			'param_name'=> 'apress_fluid_separator_height',
			'value'				=> '600',
			'suffix'			=> 'px',
			'dependency'		=> array('element' => 'apress_separator_type', 'value' => 'fluid'),
			'group'		=> esc_html__( 'Separator', 'apcore' ),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("Start Color",'apcore'),
			'param_name'=> 'apress_fluid_start_color',
			'value' 	=> '#5295ea',
			'dependency'=> array('element' => 'apress_separator_type', 'value' => 'fluid'),
			'group'		=> esc_html__( 'Separator', 'apcore' ),
			'edit_field_class'	=> 'vc_col-sm-6 no-top-margin',
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("End Color",'apcore'),
			'param_name'=> 'apress_fluid_end_color',
			'value' 	=> '#5295ea',
			'dependency'=> array('element' => 'apress_separator_type', 'value' => 'fluid'),
			'group'		=> esc_html__( 'Separator', 'apcore' ),
			'edit_field_class'	=> 'vc_col-sm-6 no-top-margin',
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Mouse Hover Enable', 'apcore'),
			'param_name'		=> 'apress_mousehover_enable',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'dependency'		=> array('element' => 'apress_separator_type', 'value' => 'fluid'),
			"group"			=> esc_html__('Separator', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Enable Overlay', 'apcore'),
			'param_name'		=> 'apress_enable_row_overlay',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			"group"			=> esc_html__('Design Options', 'apcore'),
		),
		array(
			'type'			=> 'zolo_radio_advanced',
			"heading"		=> __( "Overlay Color Option", 'apcore' ),
			'param_name'	=> 'apress_overlay_color_option',
			'value'			=> 'color',
			'options'		=> array(
				esc_html__('Color', 'apcore')	=> 'color',
				esc_html__('Gradient', 'apcore')=> 'gradient',
			),
			'dependency'		=> array('element' => 'apress_enable_row_overlay', 'value' => 'yes'),
			"group"			=> esc_html__('Design Options', 'apcore'),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("Overlay Color",'apcore'),
			'param_name'=> 'apress_row_overlay_color',
			'value' 	=> 'rgba(0,0,0,0.38)',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'dependency'	=> array('element' => 'apress_overlay_color_option', 'value' => array('color')),
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("From",'apcore'),
			'param_name'=> 'apress_gradient_color_from',
			'value' 	=> '#42a0ea',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'dependency'	=> array('element' => 'apress_overlay_color_option', 'value' => array('gradient')),
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("To",'apcore'),
			'param_name'=> 'apress_gradient_color_to',
			'value' 	=> '#3dd0ef',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'dependency'	=> array('element' => 'apress_overlay_color_option', 'value' => array('gradient')),
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
			'type'			=> 'zolo_radio_advanced',
			"heading"		=> __( "Gradient Direction", 'apcore' ),
			'param_name'	=> 'apress_gradient_direction',
			'value'			=> 'horizontal',
			'options'		=> array(
				esc_html__('Horizontal', 'apcore')	=> 'horizontal',
				esc_html__('Vertical', 'apcore')=> 'vertical',
			),
			'dependency'	=> array('element' => 'apress_overlay_color_option', 'value' => array('gradient')),
			"group"			=> esc_html__('Design Options', 'apcore'),
		),	
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Add Extended Background Animation', 'apcore'),
			'param_name'		=> 'add_extended',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'group' => esc_html__( 'Extended Animation', 'apcore' ),
		),
		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Values', 'apcore' ),
			'param_name' => 'values',
			'group' => esc_html__( 'Extended Animation', 'apcore' ),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => 'Choose your animation',
					'param_name' => 'extended_animation',
					'value' => array(
						esc_html__( 'Particles', 'apcore' ) => 'particles',
						esc_html__( 'Hexagons', 'apcore' ) => 'hexagons',
						esc_html__( 'Parallax Image', 'apcore' ) => 'parallax',
					),
					'admin_label'   => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Choose Colors Type',
					'param_name' => 'drop_colors',
					'value' => array(
						esc_html__( 'One Color', 'apcore' ) => 'one_color',
						esc_html__( 'Random Colors', 'apcore' ) => 'random_colors',
					),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Particles Color', 'apcore'),
					'param_name' => 'part_color',
					'value' => '#ff7e00',
					'dependency' => array(
						'element' => 'drop_colors',
						'value' => 'one_color'
					),
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Particles Color 1', 'apcore'),
					'param_name' => 'part_color_1',
					'value' => '#ff7e00',
					'dependency' => array(
						'element' => 'drop_colors',
						'value' => 'random_colors'
					),
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Particles Color 2', 'apcore'),
					'param_name' => 'part_color_2',
					'value' => '#3224e9',
					'dependency' => array(
						'element' => 'drop_colors',
						'value' => 'random_colors'
					),
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' => 'colorpicker',
					'heading' => esc_html__('Particles Color 3', 'apcore'),
					'param_name' => 'part_color_3',
					'value' => '#69e9f2',
					'dependency' => array(
						'element' => 'drop_colors',
						'value' => 'random_colors'
					),
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Number of Particles', 'apcore'),
					'param_name' => 'particles_number',
					'value' => '50',
					'description' => esc_html__( 'Set number of particles (default:50)', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Particles Max Size', 'apcore'),
					'param_name' => 'particles_size',
					'value' => '10',
					'description' => esc_html__( 'Set particles max size (default:10)', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Particles Speed', 'apcore'),
					'param_name' => 'particles_speed',
					'value' => '2',
					'description' => esc_html__( 'Set particles speed (default:2)', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
					'edit_field_class' => 'vc_col-sm-4',
				),
				array(
					'type' => 'checkbox',
					'param_name' => 'add_line',                    
					'heading' => esc_html__( 'Add Linked Line', 'apcore' ),
					'std' => '',
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Hover Animation',
					'param_name' => 'hover_anim',
					'value' => array(
						esc_html__( 'Grab', 'apcore' ) => 'grab',
						esc_html__( 'Bubble', 'apcore' ) => 'bubble',
						esc_html__( 'Repulse', 'apcore' ) => 'repulse',
						esc_html__( 'None', 'apcore' ) => 'none',
					),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'attach_image',
					'heading' => esc_html__('Parallax Image', 'apcore'),
					'param_name' => 'image_bg',
					'description' => esc_html__( 'Select image from media library.', 'apcore' ),
					'edit_field_class' => 'vc_col-sm-12',
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => 'parallax'
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => 'Parallax Direction',
					'param_name' => 'parallax_dir',
					'description' => esc_html__( 'This dropdown has two values: vertical, horizontal.', 'apcore' ),
					'value' => array(
						esc_html__( 'Vertical', 'apcore' ) => 'vertical',
						esc_html__( 'Horizontal', 'apcore' ) => 'horizontal',
					),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => 'parallax'
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Parallax Factor', 'apcore'),
					'param_name' => 'parallax_factor',
					'value' => '0.3',
					'description' => esc_html__( 'Set elements offset and speed. It can be positive (0.3) or negative (-0.3). Less means slower.', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => 'parallax'
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Position Top', 'apcore'),
					'param_name' => 'particles_position_top',
					'value' => '0',
					'description' => esc_html__( 'Set canvas vertical position from top to bottom of canvas.', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons','parallax')
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Position Left', 'apcore'),
					'param_name' => 'particles_position_left',
					'value' => '0',
					'description' => esc_html__( 'Set canvas vertical position from left to right side of canvas.', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons','parallax')
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Width in Percent', 'apcore'),
					'param_name' => 'particles_width',
					'value' => '100',
					'description' => esc_html__( 'Set canvas width in percent.', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
					),
					'edit_field_class' => 'vc_col-sm-6',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Height in Percent', 'apcore'),
					'param_name' => 'particles_height',
					'value' => '100',
					'description' => esc_html__( 'Set canvas width in percent.', 'apcore' ),
					'dependency' => array(
						'element' => 'extended_animation',
						'value' => array('particles','hexagons')
						),
					'edit_field_class' => 'vc_col-sm-6',
					),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('z-index', 'apcore'),
					'param_name' => 'particles_zindex',
					'value' => '0',
				),
				),
			'dependency' => array(
				'element' => 'add_extended',
				'value' => 'yes'
			),
		),
		
	);
	
	vc_add_params('vc_row', $row_params);
	
	$row_inner_params = array(
		array(
			"type" => "textfield",
			"heading" => __( "Z-Index", 'apcore' ),
			"param_name" => "inner_row_z_index",
			'weight' => 1
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __( "Overflow Visible", 'apcore' ),
			"value" => array("Yes" => "true" ),
			"param_name" => "inner_row_overflow_visible",
			'weight' => 1
		),
		array(
		   'type'    => 'zolo_box_shadow_param',
		   'heading'	=> esc_html__('Shadow', 'apcore'),
		   'param_name' => 'inner_row_shadow',
		   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		   'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
		   'type'    => 'zolo_box_shadow_param',
		   'heading'	=> esc_html__('Hover Shadow', 'apcore'),
		   'param_name' => 'inner_row_shadow_h',
		   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		   'group'		=> esc_html__( 'Design Options', 'apcore' ),
		)
	);
	vc_add_params('vc_row_inner', $row_inner_params);

	
	$column_params = array(
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __( "Centered Content", 'apcore' ),
			"value" => array("Centered Content Alignment" => "true" ),
			"param_name" => "centered_text",
			"description" => "",
			'weight' => 1
		),
		array(
			"type" => "textfield",
			"heading" => __( "Z-Index", 'apcore' ),
			"param_name" => "apress_zindex",
			'weight' => 1
		),
		array(
			"type" => "textfield",
			"heading" => __( "Column Link", 'apcore' ),
			"description"	=>  __( "If you wish for this column to link somewhere, enter the URL in here", 'apcore' ),
			"param_name" => "apress_column_link",
			'weight' => 1
		),
		array(
			'type'				=> 'zolo_radio_advanced',
			'heading'			=> esc_html__('Animations', 'apcore'),
			'param_name'		=> 'animation_type',
			'value'				=> 'default',
			'options'			=> array(
				esc_html__('Yes', 'apcore')	=> 'clipping',
				esc_html__('No', 'apcore')=> 'default',
			),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> __("Choose Style",'apcore'),
			"param_name"		=> "clipping_animation_type",
			'value' => array(
				__("Clipping left to right",'apcore') 	=> "clipping_left_to_right",
				__("Clipping right to left",'apcore') 	=> "clipping_right_to_left",
				__("Clipping bottom to top",'apcore') 	=> "clipping_bottom_to_top",
				__("Clipping top to bottom",'apcore') 	=> "clipping_top_to_bottom",
			),
			'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'				=> 'colorpicker',
			'heading'			=> esc_html__('Clipping Color', 'apcore'),
			'param_name'		=> 'clipping_color',
			"value" 			=> '#f2f2f2',
			'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			"type"				=> "textfield",
			"class"				=> "",
			"heading"			=> __("Delay","apcore"),
			"param_name"		=> "data_delay",
			"value"				=> "500",
			"description"		=> __("Delay","apcore"),
			"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
			'dependency'		=> array('element' => 'animation_type', 'value' => 'clipping'),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'			=> 'zolo_radio_advanced',
			"heading"		=> __( "Parallax Type", 'apcore' ),
			"description"	=>  __( "Choose Parallax Type Background or Foreground", 'apcore' ),
			'param_name'	=> 'apress_parallax_type',
			'value'			=> 'none',
			'options'		=> array(
				esc_html__('None', 'apcore')		=> 'none',
				esc_html__('Foreground', 'apcore') 	=> 'foreground',
				esc_html__('Background', 'apcore')	=> 'background',
			),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'			=> 'zolo_radio_advanced',
			"heading"		=> __( "Choose Parallax Style", 'apcore' ),
			'param_name'	=> 'apress_choose_parallax_style',
			'value'			=> 'on_scroll_parallax',
			'options'		=> array(
				esc_html__('On Scroll Parallax', 'apcore') 	=> 'on_scroll_parallax',
				esc_html__('Parallax with mouse move', 'apcore')	=> 'parallax_with_mousemove',
			),
			'dependency'	=> array('element' => 'apress_parallax_type', 'value' => array('foreground')),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Move X', 'apcore'),
			'param_name'		=> 'column_move_x',
			'value'				=> 'yes',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Move Y', 'apcore'),
			'param_name'		=> 'column_move_y',
			'value'				=> 'yes',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Invert X', 'apcore'),
			'param_name'		=> 'column_invert_x',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('invert Y', 'apcore'),
			'param_name'		=> 'column_invert_y',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( 'Limit X', 'apcore' ),
			"param_name"		=> "column_limit_x",
			'value'				=> '20',
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( 'Limit Y', 'apcore' ),
			"param_name"		=> "column_limit_y",
			'value'				=> '20',
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( 'Scalar X', 'apcore' ),
			"param_name"		=> "column_scalar_x",
			'value'				=> '200',
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( 'Scalar Y', 'apcore' ),
			"param_name"		=> "column_scalar_y",
			'value'				=> '200',
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__( 'Friction X', 'apcore' ),
			"param_name"		=> "column_friction_x",
			'value'				=> '0.02',
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html__( 'Friction Y', 'apcore' ),
			"param_name"		=> "column_friction_y",
			'value'				=> '0.02',
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('parallax_with_mousemove')),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
		),
		array(
			"type"			=> "zolo_number",
			"heading"		=> esc_html__( "Parallax Speed", 'apcore' ),
			"description"	=> esc_html__( "It can be positive 3 or negative -3. Less means slower.", 'apcore' ),
			"param_name"	=> "apress_parallax_speed",
			'value'			=> '3',
			'min'			=> '-9',
			'max'			=> '9',
			'group' => esc_html__( 'Effect & Positions', 'apcore' ),
			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('on_scroll_parallax')),
		),
		array(
			"type"			=> "zolo_radio_advanced",
			"heading"		=> esc_html__( "Parallax Directions", 'apcore' ),
			"param_name"	=> "apress_parallax_directions",
			'value'			=> 'vertical',
			"options"		=> array(
				esc_html__( "Vertical", 'apcore' )		=> 'vertical',
				esc_html__( "Horizontal", 'apcore' )	=> 'horizontal',
			),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),


			'dependency'	=> array('element' => 'apress_choose_parallax_style', 'value' => array('on_scroll_parallax')),
		),
		array(
			"type"			=> "zolo_number",
			"heading"		=> esc_html__( "Parallax Speed", 'apcore' ),
			"description"	=> esc_html__( "It can be positive 3 or negative -3. Less means slower.", 'apcore' ),
			"param_name"	=> "apress_parallax_speed_bg",
			'value'			=> '3',
			'min'			=> '-9',
			'max'			=> '9',
			'group' => esc_html__( 'Effect & Positions', 'apcore' ),
			'dependency'	=> array('element' => 'apress_parallax_type', 'value' => array('background')),
		),
		array(
			"type"			=> "zolo_radio_advanced",
			"heading"		=> esc_html__( "Parallax Directions", 'apcore' ),
			"param_name"	=> "apress_parallax_directions_bg",
			'value'			=> 'vertical',
			"options"		=> array(
				esc_html__( "Vertical", 'apcore' )		=> 'vertical',
				esc_html__( "Horizontal", 'apcore' )	=> 'horizontal',
			),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
			'dependency'	=> array('element' => 'apress_parallax_type', 'value' => array('background')),
		),
		array(
			"type"			=> "attach_image",
			"heading"		=> esc_html__("Image", "apcore"),
			"param_name"	=> "apress_parallax_image_url",
			"value"			=> "",
			"description"	=> __("Select image from media library.", "apcore"),
			'dependency'	=> array('element' => 'apress_parallax_type', 'value' => 'background'),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
		),
		array(
			'type'				=> 'zolo_single_checkbox',
			'heading'			=> esc_html__('Change column position', 'apcore'),
			'param_name'		=> 'column_custom_position',
			'value'				=> 'no',
			'options'			=> array(
				'yes'			=> array(
					'on'				=> 'Yes',
					'off'				=> 'No',
				),
			),
			"group"			=> esc_html__('Effect & Positions', 'apcore'),
			'dependency'	=> array('element' => 'apress_parallax_type', 'value' => 'foreground'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin',
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( 'Top Position', 'apcore' ),
			"param_name"		=> "position_top",
			'value'				=> '0',
			'suffix'			=> 'px',	
			"description"		=> esc_html__( "Select the top position of the column.", 'apcore' ),
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
			'dependency'		=> array('element' => 'column_custom_position', 'value' => 'yes'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( 'Bottom Position', 'apcore' ),
			"param_name"		=> "position_bottom",
			'value'				=> '0',
			'suffix'			=> 'px',	
			"description"		=> esc_html__( "Select the bottom position of the column.", 'apcore' ),
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
			'dependency'		=> array('element' => 'column_custom_position', 'value' => 'yes'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( "Left Position", 'apcore' ),
			"param_name"		=> "position_left",
			'value'				=> '0',
			'suffix'			=> 'px',	
			"description"		=> esc_html__( "Select the left position of the column.", 'apcore' ),
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
			'dependency'		=> array('element' => 'column_custom_position', 'value' => 'yes'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
		),
		array(
			"type"				=> "zolo_number",
			"heading"			=> esc_html__( "Right Position", 'apcore' ),
			"param_name"		=> "position_right",
			'value'				=> '0',
			'suffix'			=> 'px',	
			"description"		=> esc_html__( "Select the right position of the column.", 'apcore' ),
			'group'				=> esc_html__( 'Effect & Positions', 'apcore' ),
			'dependency'		=> array('element' => 'column_custom_position', 'value' => 'yes'),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("Overlay Color",'apcore'),
			'param_name'=> 'apress_column_overlay_color',
			'value' 	=> '',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("Overlay Hover Color",'apcore'),
			'param_name'=> 'apress_column_overlay_hover_color',
			'value' 	=> '',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
			'type' 		=> 'colorpicker',
			'heading' 	=> __("Font Color",'apcore'),
			'param_name'=> 'apress_column_font_color',
			'value' 	=> '',
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6',
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
			'type' 		=> 'dropdown',
			'heading' 	=> __("Hover Effect",'apcore'),
			'param_name'=> 'apress_column_hover_effect',
			"value" 	=> array (__("None",'apcore') => "none",__("Zoom In - Outside",'apcore') => "zoomin",__("Zoom Out - Outside",'apcore') => "zoomout",__("Zoom In - Inside",'apcore') => "zoomin_Inside",__("Zoom Out - Inside",'apcore') => "zoomout_Inside", __("3D Effect",'apcore') => "3deffect"),
			'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6',
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
		   'type'    => 'zolo_box_shadow_param',
		   'heading'	=> esc_html__('Shadow', 'apcore'),
		   'param_name' => 'column_shadow',
		   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		   'group'		=> esc_html__( 'Design Options', 'apcore' ),
		),
		array(
		   'type'    => 'zolo_box_shadow_param',
		   'heading'	=> esc_html__('Hover Shadow', 'apcore'),
		   'param_name' => 'column_shadow_h',
		   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:4|shadow_vertical:10|shadow_blur:25|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		   'group'		=> esc_html__( 'Design Options', 'apcore' ),
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
			'group'		=> esc_html__( 'Design Options', 'apcore' ),
		)
	);
	vc_add_params('vc_column', $column_params);
	
	
	$attributes = array(
		'type' => 'dropdown',
		'heading' => __("Icon",'apcore'),
		'param_name' => 'c_icon',
		"value" => array (__("Chevron",'apcore') => "chevron",__("None",'apcore') => "icon_none",__("Plus",'apcore') => "plus", __("Triangle",'apcore') => "triangle", __("Cross",'apcore') => "cross"),
		'description' => __("Select accordion shape.",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		"type" => "checkbox",
		"heading" => __("Icon Border",'apcore'),
		"param_name" => "icon_border",
		'value' => array(  'Yes'  => true ),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'dropdown',
		'heading' => __("Accordian Title Border Style",'apcore'),
		'param_name' => 'accordian_titleborder',
		"value" => array (__("Border",'apcore') => "titleborder_all",__("Bottom Border",'apcore') => "titleborder_bottom",__("None",'apcore') => "titleborder_none"),
		'description' => __("Select Title Border style.",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'textfield',
		'heading' => __("Accordian Title Spacing",'apcore'),
		'param_name' => 'c_title_spacing',
		'value' => '2',
		'description' => __("Accordion title to title Spacing",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'textfield',
		'heading' => __("Accordian Content Spacing",'apcore'),
		'param_name' => 'c_content_spacing',
		'value' => '1',
		'description' => __("Accordion title to content Spacing",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'textfield',
		'heading' => __("Title Left padding",'apcore'),
		'param_name' => 'ct_l_padding',
		'value' => '50',
		'description' => __("Accordion title left Padding ( e.g 10 )",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	$attributes = array(
		'type' => 'textfield',
		'heading' => __("Title  Right padding",'apcore'),
		'param_name' => 'ct_r_padding',
		'value' => '50',
		'description' => __("Accordion title right Padding ( e.g 10 )",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'textfield',
		'heading' => __("Title Top and Bottom padding",'apcore'),
		'param_name' => 'ct_tb_padding',
		'value' => '10',
		'description' => __("Accordion title left and right Padding ( e.g 10 )",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'textfield',
		'heading' => __("Content Left and Right padding",'apcore'),
		'param_name' => 'cc_lr_padding',
		'value' => '25',
		'description' => __("Accordion content Left and Right padding ( e.g 10 )",'apcore'),
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'colorpicker',
		'heading' => __("Title color",'apcore'),
		'param_name' => 'title_color',
		'value' => '#aaaaaa',
		'description' => __("Select the Title color",'apcore')
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'colorpicker',
		'heading' => __("Title background color",'apcore'),
		'param_name' => 'title_bg_color',
		'value' => '',
		'description' => __("Select the Title background color",'apcore')
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'colorpicker',
		'heading' => __("Tab border color",'apcore'),
		'param_name' => 'border_color',
		'value' => '#ecebeb',
		'description' => __("Select the border color",'apcore')
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	$attributes = array(
		'type' => 'colorpicker',
		'heading' => __("Content text color",'apcore'),
		'param_name' => 'content_text_color',
		'value' => '#aaaaaa',
		'description' => __("Select the tab content text color",'apcore')
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	
	$attributes = array(
		'type' => 'colorpicker',
		'heading' => __("Content background color",'apcore'),
		'param_name' => 'content_bg_color',
		'value' => '',
		'description' => __("Select the tab content background color",'apcore')
	);
	vc_add_param('vc_tta_accordion', $attributes);
	
	
	$attributes = array(
		'type' => 'colorpicker',
		'heading' => __("Content Border color",'apcore'),
		'param_name' => 'content_border_color',
		'value' => '#ecebeb',
		'description' => __("Select the tab content border color",'apcore')
	);
	
	vc_add_param('vc_tta_accordion', $attributes);
	
	
add_filter( 'vc_iconpicker-type-linea', 'vc_iconpicker_type_linea' );

function vc_iconpicker_type_linea( $icons ) {
	$linea_icons = array(
	array( 'icon-arrows-anticlockwise' => 'icon-arrows-anticlockwise'),
	array('icon-arrows-anticlockwise-dashed' => 'icon-arrows-anticlockwise-dashed'),
	array('icon-arrows-button-down' => 'icon-arrows-button-down'),
	array('icon-arrows-button-off' => 'icon-arrows-button-off'),
	array('icon-arrows-button-on' => 'icon-arrows-button-on'),
	array('icon-arrows-button-up' => 'icon-arrows-button-up'),
	array('icon-arrows-check' => 'icon-arrows-check'),
	array('icon-arrows-circle-check' => 'icon-arrows-circle-check'),
	array('icon-arrows-circle-down' => 'icon-arrows-circle-down'),
	array('icon-arrows-circle-downleft' => 'icon-arrows-circle-downleft'),
	array('icon-arrows-circle-downright' => 'icon-arrows-circle-downright'),
	array('icon-arrows-circle-left' => 'icon-arrows-circle-left'),
	array('icon-arrows-circle-minus' => 'icon-arrows-circle-minus'),
	array('icon-arrows-circle-plus' => 'icon-arrows-circle-plus'),
	array('icon-arrows-circle-remove' => 'icon-arrows-circle-remove'),
	array('icon-arrows-circle-right' => 'icon-arrows-circle-right'),
	array('icon-arrows-circle-up' => 'icon-arrows-circle-up'),
	array('icon-arrows-circle-upleft' => 'icon-arrows-circle-upleft'),
	array('icon-arrows-circle-upright' => 'icon-arrows-circle-upright'),
	array('icon-arrows-clockwise' => 'icon-arrows-clockwise'),
	array('icon-arrows-clockwise-dashed' => 'icon-arrows-clockwise-dashed'),
	array('icon-arrows-compress' => 'icon-arrows-compress'),
	array('icon-arrows-deny' => 'icon-arrows-deny'),
	array('icon-arrows-diagonal' => 'icon-arrows-diagonal'),
	array('icon-arrows-diagonal2' => 'icon-arrows-diagonal2'),
	array('icon-arrows-down' => 'icon-arrows-down'),
	array('icon-arrows-downleft' => 'icon-arrows-down-double'),
	array('icon-arrows-downright' => 'icon-arrows-downleft'),
	array('icon-arrows-drag-down' => 'icon-arrows-drag-down'),
	array('icon-arrows-drag-down-dashed' => 'icon-arrows-drag-down-dashed'),
	array('icon-arrows-drag-horiz' => 'icon-arrows-drag-horiz'),
	array('icon-arrows-drag-left' => 'icon-arrows-drag-left'),
	array('icon-arrows-drag-left-dashed' => 'icon-arrows-drag-left-dashed'),
	array('icon-arrows-drag-right' => 'icon-arrows-drag-right'),
	array('icon-arrows-drag-right-dashed' => 'icon-arrows-drag-right-dashed'),
	array('icon-arrows-drag-up' => 'icon-arrows-drag-up'),
	array('icon-arrows-drag-up-dashed' => 'icon-arrows-drag-up-dashed'),
	array('icon-arrows-exclamation' => 'icon-arrows-exclamation'),
	array('icon-arrows-expand' => 'icon-arrows-expand'),
	array('icon-arrows-expand-diagonal1' => 'icon-arrows-expand-diagonal1'),
	array('icon-arrows-expand-horizontal1' => 'icon-arrows-expand-horizontal1'),
	array('icon-arrows-expand-vertical1' => 'icon-arrows-expand-vertical1'),
	array('icon-arrows-fit-horizontal' => 'icon-arrows-fit-horizontal'),
	array('icon-arrows-fit-vertical' => 'icon-arrows-fit-vertical'),
	array('icon-arrows-glide' => 'icon-arrows-glide'),
	array('icon-arrows-glide-horizontal' => 'icon-arrows-glide-horizontal'),
	array('icon-arrows-glide-vertical' => 'icon-arrows-glide-vertical'),
	array('icon-arrows-hamburger1' => 'icon-arrows-hamburger1'),
	array('icon-arrows-hamburger-2' => 'icon-arrows-hamburger-2'),
	array('icon-arrows-horizontal' => 'icon-arrows-horizontal'),
	array('icon-arrows-info' => 'icon-arrows-info'),
	array('icon-arrows-keyboard-alt' => 'icon-arrows-keyboard-alt'),
	array('icon-arrows-keyboard-cmd' => 'icon-arrows-keyboard-cmd'),
	array('icon-arrows-keyboard-delete' => 'icon-arrows-keyboard-delete'),
	array('icon-arrows-keyboard-down' => 'icon-arrows-keyboard-down'),
	array('icon-arrows-keyboard-left' => 'icon-arrows-keyboard-left'),
	array('icon-arrows-keyboard-return' => 'icon-arrows-keyboard-return'),
	array('icon-arrows-keyboard-right' => 'icon-arrows-keyboard-right'),
	array('icon-arrows-keyboard-shift' => 'icon-arrows-keyboard-shift'),
	array('icon-arrows-keyboard-tab' => 'icon-arrows-keyboard-tab'),
	array('icon-arrows-keyboard-up' => 'icon-arrows-keyboard-up'),
	array('icon-arrows-left' => 'icon-arrows-left'),
	array('icon-arrows-left-double-32' => 'icon-arrows-left-double-32'),
	array('icon-arrows-minus' => 'icon-arrows-minus'),
	array('icon-arrows-move' => 'icon-arrows-move'),
	array('icon-arrows-move2' => 'icon-arrows-move2'),
	array('icon-arrows-move-bottom' => 'icon-arrows-move-bottom'),
	array('icon-arrows-move-left' => 'icon-arrows-move-left'),
	array('icon-arrows-move-right' => 'icon-arrows-move-right'),
	array('icon-arrows-move-top' => 'icon-arrows-move-top'),
	array('icon-arrows-plus' => 'icon-arrows-plus'),
	array('icon-arrows-question' => 'icon-arrows-question'),
	array('icon-arrows-remove' => 'icon-arrows-remove'),
	array('icon-arrows-right' => 'icon-arrows-right'),
	array('icon-arrows-right-double' => 'icon-arrows-right-double'),
	array('icon-arrows-rotate' => 'icon-arrows-rotate'),
	array('icon-arrows-rotate-anti' => 'icon-arrows-rotate-anti'),
	array('icon-arrows-rotate-anti-dashed' => 'icon-arrows-rotate-anti-dashed'),
	array('icon-arrows-rotate-dashed' => 'icon-arrows-rotate-dashed'),
	array('icon-arrows-shrink' => 'icon-arrows-shrink'),
	array('icon-arrows-shrink-diagonal1' => 'icon-arrows-shrink-diagonal1'),
	array('icon-arrows-shrink-diagonal2' => 'icon-arrows-shrink-diagonal2'),
	array('icon-arrows-shrink-horizonal2' => 'icon-arrows-shrink-horizonal2'),
	array('icon-arrows-shrink-horizontal1' => 'icon-arrows-shrink-horizontal1'),
	array('icon-arrows-shrink-vertical1' => 'icon-arrows-shrink-vertical1'),
	array('icon-arrows-shrink-vertical2' => 'icon-arrows-shrink-vertical2'),
	array('icon-arrows-sign-down' => 'icon-arrows-sign-down'),
	array('icon-arrows-sign-left' => 'icon-arrows-sign-left'),
	array('icon-arrows-sign-right' => 'icon-arrows-sign-right'),
	array('icon-arrows-sign-up' => 'icon-arrows-sign-up'),
	array('icon-arrows-slide-down1' => 'icon-arrows-slide-down1'),
	array('icon-arrows-slide-down2' => 'icon-arrows-slide-down2'),
	array('icon-arrows-slide-left1' => 'icon-arrows-slide-left1'),
	array('icon-arrows-slide-left2' => 'icon-arrows-slide-left2'),
	array('icon-arrows-slide-right1' => 'icon-arrows-slide-right1'),
	array('icon-arrows-slide-right2' => 'icon-arrows-slide-right2'),
	array('icon-arrows-slide-up1' => 'icon-arrows-slide-up1'),
	array('icon-arrows-slide-up2' => 'icon-arrows-slide-up2'),
	array('icon-arrows-slim-down' => 'icon-arrows-slim-down'),
	array('icon-arrows-slim-down-dashed' => 'icon-arrows-slim-down-dashed'),
	array('icon-arrows-slim-left' => 'icon-arrows-slim-left'),
	array('icon-arrows-slim-left-dashed' => 'icon-arrows-slim-left-dashed'),
	array('icon-arrows-slim-right' => 'icon-arrows-slim-right'),
	array('icon-arrows-slim-right-dashed' => 'icon-arrows-slim-right-dashed'),
	array('icon-arrows-slim-up' => 'icon-arrows-slim-up'),
	array('icon-arrows-slim-up-dashed' => 'icon-arrows-slim-up-dashed'),
	array('icon-arrows-squares' => 'icon-arrows-squares'),
	array('icon-arrows-square-check' => 'icon-arrows-square-check'),
	array('icon-arrows-square-down' => 'icon-arrows-square-down'),
	array('icon-arrows-square-downleft' => 'icon-arrows-square-downleft'),
	array('icon-arrows-square-downright' => 'icon-arrows-square-downright'),
	array('icon-arrows-square-left' => 'icon-arrows-square-left'),
	array('icon-arrows-square-minus' => 'icon-arrows-square-minus'),
	array('icon-arrows-square-plus' => 'icon-arrows-square-plus'),
	array('icon-arrows-square-remove' => 'icon-arrows-square-remove'),
	array('icon-arrows-square-right' => 'icon-arrows-square-right'),
	array('icon-arrows-square-up' => 'icon-arrows-square-up'),
	array('icon-arrows-square-upleft' => 'icon-arrows-square-upleft'),
	array('icon-arrows-square-upright' => 'icon-arrows-square-upright'),
	array('icon-arrows-stretch-diagonal1' => 'icon-arrows-stretch-diagonal1'),
	array('icon-arrows-stretch-diagonal2' => 'icon-arrows-stretch-diagonal2'),
	array('icon-arrows-stretch-diagonal3' => 'icon-arrows-stretch-diagonal3'),
	array('icon-arrows-stretch-diagonal4' => 'icon-arrows-stretch-diagonal4'),
	array('icon-arrows-stretch-horizontal1' => 'icon-arrows-stretch-horizontal1'),
	array('icon-arrows-stretch-horizontal2' => 'icon-arrows-stretch-horizontal2'),
	array('icon-arrows-stretch-vertical1' => 'icon-arrows-stretch-vertical1'),
	array('icon-arrows-stretch-vertical2' => 'icon-arrows-stretch-vertical2'),
	array('icon-arrows-switch-horizontal' => 'icon-arrows-switch-horizontal'),
	array('icon-arrows-switch-vertical' => 'icon-arrows-switch-vertical'),
	array('icon-arrows-up' => 'icon-arrows-up'),
	array('icon-arrows-upright' => 'icon-arrows-upright'),
	array('icon-arrows-vertical' => 'icon-arrows-vertical'),
	array('icon-basic-accelerator' => 'icon-basic-accelerator'),
	array('icon-basic-alarm' => 'icon-basic-alarm'),
	array('icon-basic-anchor' => 'icon-basic-anchor'),
	array('icon-basic-anticlockwise' => 'icon-basic-anticlockwise'),
	array('icon-basic-archive' => 'icon-basic-archive'),
	array('icon-basic-archive-full' => 'icon-basic-archive-full'),
	array('icon-basic-ban' => 'icon-basic-ban'),
	array('icon-basic-battery-charge' => 'icon-basic-battery-charge'),
	array('icon-basic-battery-empty' => 'icon-basic-battery-empty'),
	array('icon-basic-battery-full' => 'icon-basic-battery-full'),
	array('icon-basic-battery-half' => 'icon-basic-battery-half'),
	array('icon-basic-bolt' => 'icon-basic-bolt'),
	array('icon-basic-book' => 'icon-basic-book'),
	array('icon-basic-bookmark' => 'icon-basic-book-pen'),
	array('icon-basic-book-pen' => 'icon-basic-book-pencil'),
	array('icon-basic-book-pencil' => 'icon-basic-bookmark'),
	array('icon-basic-calculator' => 'icon-basic-calculator'),
	array('icon-basic-calendar' => 'icon-basic-calendar'),
	array('icon-basic-cards-diamonds' => 'icon-basic-cards-diamonds'),
	array('icon-basic-cards-hearts' => 'icon-basic-cards-hearts'),
	array('icon-basic-case' => 'icon-basic-case'),
	array('icon-basic-chronometer' => 'icon-basic-chronometer'),
	array('icon-basic-clessidre' => 'icon-basic-clessidre'),
	array('icon-basic-clock' => 'icon-basic-clock'),
	array('icon-basic-clockwise' => 'icon-basic-clockwise'),
	array('icon-basic-cloud' => 'icon-basic-cloud'),
	array('icon-basic-clubs' => 'icon-basic-clubs'),
	array('icon-basic-compass' => 'icon-basic-compass'),
	array('icon-basic-cup' => 'icon-basic-cup'),
	array('icon-basic-diamonds' => 'icon-basic-diamonds'),
	array('icon-basic-display' => 'icon-basic-display'),
	array('icon-basic-download' => 'icon-basic-download'),
	array('icon-basic-exclamation' => 'icon-basic-exclamation'),
	array('icon-basic-eye' => 'icon-basic-eye'),
	array('icon-basic-eye-closed' => 'icon-basic-eye-closed'),
	array('icon-basic-female' => 'icon-basic-female'),
	array('icon-basic-flag1' => 'icon-basic-flag1'),
	array('icon-basic-flag2' => 'icon-basic-flag2'),
	array('icon-basic-floppydisk' => 'icon-basic-floppydisk'),
	array('icon-basic-folder' => 'icon-basic-folder'),
	array('icon-basic-folder-multiple' => 'icon-basic-folder-multiple'),
	array('icon-basic-gear' => 'icon-basic-gear'),
	array('icon-basic-geolocalize-01' => 'icon-basic-geolocalize-01'),
	array('icon-basic-geolocalize-05' => 'icon-basic-geolocalize-05'),
	array('icon-basic-globe' => 'icon-basic-globe'),
	array('icon-basic-gunsight' => 'icon-basic-gunsight'),
	array('icon-basic-hammer' => 'icon-basic-hammer'),
	array('icon-basic-headset' => 'icon-basic-headset'),
	array('icon-basic-heart' => 'icon-basic-heart'),
	array('icon-basic-heart-broken' => 'icon-basic-heart-broken'),
	array('icon-basic-helm' => 'icon-basic-helm'),
	array('icon-basic-home' => 'icon-basic-home'),
	array('icon-basic-info' => 'icon-basic-info'),
	array('icon-basic-ipod' => 'icon-basic-ipod'),
	array('icon-basic-joypad' => 'icon-basic-joypad'),
	array('icon-basic-key' => 'icon-basic-key'),
	array('icon-basic-keyboard' => 'icon-basic-keyboard'),
	array('icon-basic-laptop' => 'icon-basic-laptop'),
	array('icon-basic-life-buoy' => 'icon-basic-life-buoy'),
	array('icon-basic-lightbulb' => 'icon-basic-lightbulb'),
	array('icon-basic-link' => 'icon-basic-link'),
	array('icon-basic-lock' => 'icon-basic-lock'),
	array('icon-basic-lock-open' => 'icon-basic-lock-open'),
	array('icon-basic-magic-mouse' => 'icon-basic-magic-mouse'),
	array('icon-basic-magnifier' => 'icon-basic-magnifier'),
	array('icon-basic-magnifier-minus' => 'icon-basic-magnifier-minus'),
	array('icon-basic-magnifier-plus' => 'icon-basic-magnifier-plus'),
	array('icon-basic-mail' => 'icon-basic-mail'),
	array('icon-basic-mail-multiple' => 'icon-basic-mail-multiple'),
	array('icon-basic-mail-open' => 'icon-basic-mail-open'),
	array('icon-basic-mail-open-text' => 'icon-basic-mail-open-text'),
	array('icon-basic-male' => 'icon-basic-male'),
	array('icon-basic-map' => 'icon-basic-map'),
	array('icon-basic-message' => 'icon-basic-message'),
	array('icon-basic-message-multiple' => 'icon-basic-message-multiple'),
	array('icon-basic-message-txt' => 'icon-basic-message-txt'),
	array('icon-basic-mixer2' => 'icon-basic-mixer2'),
	array('icon-basic-mouse' => 'icon-basic-mouse'),
	array('icon-basic-notebook' => 'icon-basic-notebook'),
	array('icon-basic-notebook-pen' => 'icon-basic-notebook-pen'),
	array('icon-basic-notebook-pencil' => 'icon-basic-notebook-pencil'),
	array('icon-basic-paperplane' => 'icon-basic-paperplane'),
	array('icon-basic-pencil-ruler' => 'icon-basic-pencil-ruler'),
	array('icon-basic-pencil-ruler-pen ' => 'icon-basic-pencil-ruler-pen'),
	array('icon-basic-photo' => 'icon-basic-photo'),
	array('icon-basic-picture' => 'icon-basic-picture'),
	array('icon-basic-picture-multiple' => 'icon-basic-picture-multiple'),
	array('icon-basic-pin1' => 'icon-basic-pin1'),
	array('icon-basic-pin2' => 'icon-basic-pin2'),
	array('icon-basic-postcard' => 'icon-basic-postcard'),
	array('icon-basic-postcard-multiple' => 'icon-basic-postcard-multiple'),
	array('icon-basic-printer' => 'icon-basic-printer'),
	array('icon-basic-question' => 'icon-basic-question'),
	array('icon-basic-rss' => 'icon-basic-rss'),
	array('icon-basic-server' => 'icon-basic-server'),
	array('icon-basic-server2' => 'icon-basic-server2'),
	array('icon-basic-server-cloud' => 'icon-basic-server-cloud'),
	array('icon-basic-server-download' => 'icon-basic-server-download'),
	array('icon-basic-server-upload' => 'icon-basic-server-upload'),
	array('icon-basic-settings' => 'icon-basic-settings'),
	array('icon-basic-share' => 'icon-basic-share'),
	array('icon-basic-sheet' => 'icon-basic-sheet'),
	array('icon-basic-sheet-multiple ' => 'icon-basic-sheet-multiple'),
	array('icon-basic-sheet-pen' => 'icon-basic-sheet-pen'),
	array('icon-basic-sheet-pencil' => 'icon-basic-sheet-pencil'),
	array('icon-basic-sheet-txt ' => 'icon-basic-sheet-txt'),
	array('icon-basic-signs' => 'icon-basic-signs'),
	array('icon-basic-smartphone' => 'icon-basic-smartphone'),
	array('icon-basic-spades' => 'icon-basic-spades'),
	array('icon-basic-spread' => 'icon-basic-spread'),
	array('icon-basic-spread-bookmark' => 'icon-basic-spread-bookmark'),
	array('icon-basic-spread-text' => 'icon-basic-spread-text'),
	array('icon-basic-spread-text-bookmark' => 'icon-basic-spread-text-bookmark'),
	array('icon-basic-star' => 'icon-basic-star'),
	array('icon-basic-tablet' => 'icon-basic-tablet'),
	array('icon-basic-target' => 'icon-basic-target'),
	array('icon-basic-todo' => 'icon-basic-todo'),
	array('icon-basic-todolist-pen' => 'icon-basic-todo-pen'),
	array('icon-basic-todolist-pencil' => 'icon-basic-todo-pencil'),
	array('icon-basic-todo-pen ' => 'icon-basic-todo-txt'),
	array('icon-basic-todo-pencil' => 'icon-basic-todolist-pen'),
	array('icon-basic-todo-txt' => 'icon-basic-todolist-pencil'),
	array('icon-basic-trashcan' => 'icon-basic-trashcan'),
	array('icon-basic-trashcan-full' => 'icon-basic-trashcan-full'),
	array('icon-basic-trashcan-refresh' => 'icon-basic-trashcan-refresh'),
	array('icon-basic-trashcan-remove' => 'icon-basic-trashcan-remove'),
	array('icon-basic-upload' => 'icon-basic-upload'),
	array('icon-basic-usb' => 'icon-basic-usb'),
	array('icon-basic-video' => 'icon-basic-video'),
	array('icon-basic-watch' => 'icon-basic-watch'),
	array('icon-basic-webpage' => 'icon-basic-webpage'),
	array('icon-basic-webpage-img-txt' => 'icon-basic-webpage-img-txt'),
	array('icon-basic-webpage-multiple' => 'icon-basic-webpage-multiple'),
	array('icon-basic-webpage-txt' => 'icon-basic-webpage-txt'),
	array('icon-basic-world' => 'icon-basic-world'),
	array('icon-basic-elaboration-bookmark-checck' => 'icon-basic-elaboration-bookmark-checck'),
	array('icon-basic-elaboration-bookmark-minus' => 'icon-basic-elaboration-bookmark-minus'),
	array('icon-basic-elaboration-bookmark-plus' => 'icon-basic-elaboration-bookmark-plus'),
	array('icon-basic-elaboration-bookmark-remove' => 'icon-basic-elaboration-bookmark-remove'),
	array('icon-basic-elaboration-briefcase-check' => 'icon-basic-elaboration-briefcase-check'),
	array('icon-basic-elaboration-briefcase-download' => 'icon-basic-elaboration-briefcase-download'),
	array('icon-basic-elaboration-briefcase-flagged' => 'icon-basic-elaboration-briefcase-flagged'),
	array('icon-basic-elaboration-briefcase-minus' => 'icon-basic-elaboration-briefcase-minus'),
	array('icon-basic-elaboration-briefcase-plus' => 'icon-basic-elaboration-briefcase-plus'),
	array('icon-basic-elaboration-briefcase-refresh' => 'icon-basic-elaboration-briefcase-refresh'),
	array('icon-basic-elaboration-briefcase-remove' => 'icon-basic-elaboration-briefcase-remove'),
	array('icon-basic-elaboration-briefcase-search' => 'icon-basic-elaboration-briefcase-search'),
	array('icon-basic-elaboration-briefcase-star' => 'icon-basic-elaboration-briefcase-star'),
	array('icon-basic-elaboration-briefcase-upload' => 'icon-basic-elaboration-briefcase-upload'),
	array('icon-basic-elaboration-browser-check' => 'icon-basic-elaboration-browser-check'),
	array('icon-basic-elaboration-browser-download' => 'icon-basic-elaboration-browser-download'),
	array('icon-basic-elaboration-browser-minus' => 'icon-basic-elaboration-browser-minus'),
	array('icon-basic-elaboration-browser-plus' => 'icon-basic-elaboration-browser-plus'),
	array('icon-basic-elaboration-browser-refresh' => 'icon-basic-elaboration-browser-refresh'),
	array('icon-basic-elaboration-browser-remove' => 'icon-basic-elaboration-browser-remove'),
	array('icon-basic-elaboration-browser-search' => 'icon-basic-elaboration-browser-search'),
	array('icon-basic-elaboration-browser-star' => 'icon-basic-elaboration-browser-star'),
	array('icon-basic-elaboration-browser-upload' => 'icon-basic-elaboration-browser-upload'),
	array('icon-basic-elaboration-calendar-check' => 'icon-basic-elaboration-calendar-check'),
	array('icon-basic-elaboration-calendar-cloud' => 'icon-basic-elaboration-calendar-cloud'),
	array('icon-basic-elaboration-calendar-download' => 'icon-basic-elaboration-calendar-download'),
	array('icon-basic-elaboration-calendar-empty' => 'icon-basic-elaboration-calendar-empty'),
	array('icon-basic-elaboration-calendar-flagged' => 'icon-basic-elaboration-calendar-flagged'),
	array('icon-basic-elaboration-calendar-heart' => 'icon-basic-elaboration-calendar-heart'),
	array('icon-basic-elaboration-calendar-minus' => 'icon-basic-elaboration-calendar-minus'),
	array('icon-basic-elaboration-calendar-next' => 'icon-basic-elaboration-calendar-next'),
	array('icon-basic-elaboration-calendar-noaccess' => 'icon-basic-elaboration-calendar-noaccess'),
	array('icon-basic-elaboration-calendar-pencil' => 'icon-basic-elaboration-calendar-pencil'),
	array('icon-basic-elaboration-calendar-plus' => 'icon-basic-elaboration-calendar-plus'),
	array('icon-basic-elaboration-calendar-previous' => 'icon-basic-elaboration-calendar-previous'),
	array('icon-basic-elaboration-calendar-refresh' => 'icon-basic-elaboration-calendar-refresh'),
	array('icon-basic-elaboration-calendar-remove' => 'icon-basic-elaboration-calendar-remove'),
	array('icon-basic-elaboration-calendar-search' => 'icon-basic-elaboration-calendar-search'),
	array('icon-basic-elaboration-calendar-star' => 'icon-basic-elaboration-calendar-star'),
	array('icon-basic-elaboration-calendar-upload' => 'icon-basic-elaboration-calendar-upload'),
	array('icon-basic-elaboration-cloud-check' => 'icon-basic-elaboration-cloud-check'),
	array('icon-basic-elaboration-cloud-download' => 'icon-basic-elaboration-cloud-download'),
	array('icon-basic-elaboration-cloud-minus' => 'icon-basic-elaboration-cloud-minus'),
	array('icon-basic-elaboration-cloud-noaccess' => 'icon-basic-elaboration-cloud-noaccess'),
	array('icon-basic-elaboration-cloud-plus' => 'icon-basic-elaboration-cloud-plus'),
	array('icon-basic-elaboration-cloud-refresh' => 'icon-basic-elaboration-cloud-refresh'),
	array('icon-basic-elaboration-cloud-remove' => 'icon-basic-elaboration-cloud-remove'),
	array('icon-basic-elaboration-cloud-search' => 'icon-basic-elaboration-cloud-search'),
	array('icon-basic-elaboration-cloud-upload' => 'icon-basic-elaboration-cloud-upload'),
	array('icon-basic-elaboration-document-check' => 'icon-basic-elaboration-document-check'),
	array('icon-basic-elaboration-document-cloud' => 'icon-basic-elaboration-document-cloud'),
	array('icon-basic-elaboration-document-download' => 'icon-basic-elaboration-document-download'),
	array('icon-basic-elaboration-document-flagged' => 'icon-basic-elaboration-document-flagged'),
	array('icon-basic-elaboration-document-graph' => 'icon-basic-elaboration-document-graph'),
	array('icon-basic-elaboration-document-heart' => 'icon-basic-elaboration-document-heart'),
	array('icon-basic-elaboration-document-minus' => 'icon-basic-elaboration-document-minus'),
	array('icon-basic-elaboration-document-next' => 'icon-basic-elaboration-document-next'),
	array('icon-basic-elaboration-document-noaccess' => 'icon-basic-elaboration-document-noaccess'),
	array('icon-basic-elaboration-document-note' => 'icon-basic-elaboration-document-note'),
	array('icon-basic-elaboration-document-pencil' => 'icon-basic-elaboration-document-pencil'),
	array('icon-basic-elaboration-document-picture' => 'icon-basic-elaboration-document-picture'),
	array('icon-basic-elaboration-document-plus' => 'icon-basic-elaboration-document-plus'),
	array('icon-basic-elaboration-document-previous' => 'icon-basic-elaboration-document-previous'),
	array('icon-basic-elaboration-document-refresh' => 'icon-basic-elaboration-document-refresh'),
	array('icon-basic-elaboration-document-remove' => 'icon-basic-elaboration-document-remove'),
	array('icon-basic-elaboration-document-search' => 'icon-basic-elaboration-document-search'),
	array('icon-basic-elaboration-document-star' => 'icon-basic-elaboration-document-star'),
	array('icon-basic-elaboration-document-upload' => 'icon-basic-elaboration-document-upload'),
	array('icon-basic-elaboration-folder-check' => 'icon-basic-elaboration-folder-check'),
	array('icon-basic-elaboration-folder-cloud' => 'icon-basic-elaboration-folder-cloud'),
	array('icon-basic-elaboration-folder-document' => 'icon-basic-elaboration-folder-document'),
	array('icon-basic-elaboration-folder-download' => 'icon-basic-elaboration-folder-download'),
	array('icon-basic-elaboration-folder-flagged' => 'icon-basic-elaboration-folder-flagged'),
	array('icon-basic-elaboration-folder-graph' => 'icon-basic-elaboration-folder-graph'),
	array('icon-basic-elaboration-folder-heart' => 'icon-basic-elaboration-folder-heart'),
	array('icon-basic-elaboration-folder-minus' => 'icon-basic-elaboration-folder-minus'),
	array('icon-basic-elaboration-folder-next' => 'icon-basic-elaboration-folder-next'),
	array('icon-basic-elaboration-folder-noaccess' => 'icon-basic-elaboration-folder-noaccess'),
	array('icon-basic-elaboration-folder-note' => 'icon-basic-elaboration-folder-note'),
	array('icon-basic-elaboration-folder-pencil' => 'icon-basic-elaboration-folder-pencil'),
	array('icon-basic-elaboration-folder-picture' => 'icon-basic-elaboration-folder-picture'),
	array('icon-basic-elaboration-folder-plus' => 'icon-basic-elaboration-folder-plus'),
	array('icon-basic-elaboration-folder-previous' => 'icon-basic-elaboration-folder-previous'),
	array('icon-basic-elaboration-folder-refresh' => 'icon-basic-elaboration-folder-refresh'),
	array('icon-basic-elaboration-folder-remove' => 'icon-basic-elaboration-folder-remove'),
	array('icon-basic-elaboration-folder-search' => 'icon-basic-elaboration-folder-search'),
	array('icon-basic-elaboration-folder-star' => 'icon-basic-elaboration-folder-star'),
	array('icon-basic-elaboration-folder-upload' => 'icon-basic-elaboration-folder-upload'),
	array('icon-basic-elaboration-mail-check' => 'icon-basic-elaboration-mail-check'),
	array('icon-basic-elaboration-mail-cloud' => 'icon-basic-elaboration-mail-cloud'),
	array('icon-basic-elaboration-mail-document' => 'icon-basic-elaboration-mail-document'),
	array('icon-basic-elaboration-mail-download' => 'icon-basic-elaboration-mail-download'),
	array('icon-basic-elaboration-mail-flagged' => 'icon-basic-elaboration-mail-flagged'),
	array('icon-basic-elaboration-mail-heart' => 'icon-basic-elaboration-mail-heart'),
	array('icon-basic-elaboration-mail-next' => 'icon-basic-elaboration-mail-next'),
	array('icon-basic-elaboration-mail-noaccess' => 'icon-basic-elaboration-mail-noaccess'),
	array('icon-basic-elaboration-mail-note' => 'icon-basic-elaboration-mail-note'),
	array('icon-basic-elaboration-mail-pencil' => 'icon-basic-elaboration-mail-pencil'),
	array('icon-basic-elaboration-mail-picture' => 'icon-basic-elaboration-mail-picture'),
	array('icon-basic-elaboration-mail-previous' => 'icon-basic-elaboration-mail-previous'),
	array('icon-basic-elaboration-mail-refresh' => 'icon-basic-elaboration-mail-refresh'),
	array('icon-basic-elaboration-mail-remove' => 'icon-basic-elaboration-mail-remove'),
	array('icon-basic-elaboration-mail-search' => 'icon-basic-elaboration-mail-search'),
	array('icon-basic-elaboration-mail-star' => 'icon-basic-elaboration-mail-star'),
	array('icon-basic-elaboration-mail-upload' => 'icon-basic-elaboration-mail-upload'),
	array('icon-basic-elaboration-message-check' => 'icon-basic-elaboration-message-check'),
	array('icon-basic-elaboration-message-dots' => 'icon-basic-elaboration-message-dots'),
	array('icon-basic-elaboration-message-happy' => 'icon-basic-elaboration-message-happy'),
	array('icon-basic-elaboration-message-heart' => 'icon-basic-elaboration-message-heart'),
	array('icon-basic-elaboration-message-minus' => 'icon-basic-elaboration-message-minus'),
	array('icon-basic-elaboration-message-note' => 'icon-basic-elaboration-message-note'),
	array('icon-basic-elaboration-message-plus' => 'icon-basic-elaboration-message-plus'),
	array('icon-basic-elaboration-message-refresh' => 'icon-basic-elaboration-message-refresh'),
	array('icon-basic-elaboration-message-remove' => 'icon-basic-elaboration-message-remove'),
	array('icon-basic-elaboration-message-sad' => 'icon-basic-elaboration-message-sad'),
	array('icon-basic-elaboration-smartphone-cloud' => 'icon-basic-elaboration-smartphone-cloud'),
	array('icon-basic-elaboration-smartphone-heart' => 'icon-basic-elaboration-smartphone-heart'),
	array('icon-basic-elaboration-smartphone-noaccess' => 'icon-basic-elaboration-smartphone-noaccess'),
	array('icon-basic-elaboration-smartphone-note' => 'icon-basic-elaboration-smartphone-note'),
	array('icon-basic-elaboration-smartphone-pencil' => 'icon-basic-elaboration-smartphone-pencil'),
	array('icon-basic-elaboration-smartphone-picture' => 'icon-basic-elaboration-smartphone-picture'),
	array('icon-basic-elaboration-smartphone-refresh' => 'icon-basic-elaboration-smartphone-refresh'),
	array('icon-basic-elaboration-smartphone-search' => 'icon-basic-elaboration-smartphone-search'),
	array('icon-basic-elaboration-tablet-cloud' => 'icon-basic-elaboration-tablet-cloud'),
	array('icon-basic-elaboration-tablet-heart' => 'icon-basic-elaboration-tablet-heart'),
	array('icon-basic-elaboration-tablet-noaccess' => 'icon-basic-elaboration-tablet-noaccess'),
	array('icon-basic-elaboration-tablet-note' => 'icon-basic-elaboration-tablet-note'),
	array('icon-basic-elaboration-tablet-pencil' => 'icon-basic-elaboration-tablet-pencil'),
	array('icon-basic-elaboration-tablet-picture' => 'icon-basic-elaboration-tablet-picture'),
	array('icon-basic-elaboration-tablet-refresh' => 'icon-basic-elaboration-tablet-refresh'),
	array('icon-basic-elaboration-tablet-search' => 'icon-basic-elaboration-tablet-search'),
	array('icon-basic-elaboration-todolist-2' => 'icon-basic-elaboration-todolist-2'),
	array('icon-basic-elaboration-todolist-check' => 'icon-basic-elaboration-todolist-check'),
	array('icon-basic-elaboration-todolist-cloud' => 'icon-basic-elaboration-todolist-cloud'),
	array('icon-basic-elaboration-todolist-download' => 'icon-basic-elaboration-todolist-download'),
	array('icon-basic-elaboration-todolist-flagged' => 'icon-basic-elaboration-todolist-flagged'),
	array('icon-basic-elaboration-todolist-minus' => 'icon-basic-elaboration-todolist-minus'),
	array('icon-basic-elaboration-todolist-noaccess' => 'icon-basic-elaboration-todolist-noaccess'),
	array('icon-basic-elaboration-todolist-pencil' => 'icon-basic-elaboration-todolist-pencil'),
	array('icon-basic-elaboration-todolist-plus' => 'icon-basic-elaboration-todolist-plus'),
	array('icon-basic-elaboration-todolist-refresh' => 'icon-basic-elaboration-todolist-refresh'),
	array('icon-basic-elaboration-todolist-remove' => 'icon-basic-elaboration-todolist-remove'),
	array('icon-basic-elaboration-todolist-search' => 'icon-basic-elaboration-todolist-search'),
	array('icon-basic-elaboration-todolist-star' => 'icon-basic-elaboration-todolist-star'),
	array('icon-basic-elaboration-todolist-upload' => 'icon-basic-elaboration-todolist-upload'),
	array('icon-ecommerce-bag' => 'icon-ecommerce-bag'),
	array('icon-ecommerce-bag-check' => 'icon-ecommerce-bag-check'),
	array('icon-ecommerce-bag-cloud' => 'icon-ecommerce-bag-cloud'),
	array('icon-ecommerce-bag-download' => 'icon-ecommerce-bag-download'),
	array('icon-ecommerce-bag-minus' => 'icon-ecommerce-bag-minus'),
	array('icon-ecommerce-bag-plus' => 'icon-ecommerce-bag-plus'),
	array('icon-ecommerce-bag-refresh' => 'icon-ecommerce-bag-refresh'),
	array('icon-ecommerce-bag-remove' => 'icon-ecommerce-bag-remove'),
	array('icon-ecommerce-bag-search' => 'icon-ecommerce-bag-search'),
	array('icon-ecommerce-bag-upload' => 'icon-ecommerce-bag-upload'),
	array('icon-ecommerce-banknote' => 'icon-ecommerce-banknote'),
	array('icon-ecommerce-banknotes' => 'icon-ecommerce-banknotes'),
	array('icon-ecommerce-basket' => 'icon-ecommerce-basket'),
	array('icon-ecommerce-basket-check' => 'icon-ecommerce-basket-check'),
	array('icon-ecommerce-basket-cloud' => 'icon-ecommerce-basket-cloud'),
	array('icon-ecommerce-basket-download' => 'icon-ecommerce-basket-download'),
	array('icon-ecommerce-basket-minus' => 'icon-ecommerce-basket-minus'),
	array('icon-ecommerce-basket-plus' => 'icon-ecommerce-basket-plus'),
	array('icon-ecommerce-basket-refresh' => 'icon-ecommerce-basket-refresh'),
	array('icon-ecommerce-basket-remove' => 'icon-ecommerce-basket-remove'),
	array('icon-ecommerce-basket-search' => 'icon-ecommerce-basket-search'),
	array('icon-ecommerce-basket-upload' => 'icon-ecommerce-basket-upload'),
	array('icon-ecommerce-bath' => 'icon-ecommerce-bath'),
	array('icon-ecommerce-cart' => 'icon-ecommerce-cart'),
	array('icon-ecommerce-cart-check' => 'icon-ecommerce-cart-check'),
	array('icon-ecommerce-cart-cloud' => 'icon-ecommerce-cart-cloud'),
	array('icon-ecommerce-cart-content' => 'icon-ecommerce-cart-content'),
	array('icon-ecommerce-cart-download' => 'icon-ecommerce-cart-download'),
	array('icon-ecommerce-cart-minus' => 'icon-ecommerce-cart-minus'),
	array('icon-ecommerce-cart-plus' => 'icon-ecommerce-cart-plus'),
	array('icon-ecommerce-cart-refresh' => 'icon-ecommerce-cart-refresh'),
	array('icon-ecommerce-cart-remove' => 'icon-ecommerce-cart-remove'),
	array('icon-ecommerce-cart-search' => 'icon-ecommerce-cart-search'),
	array('icon-ecommerce-cart-upload' => 'icon-ecommerce-cart-upload'),
	array('icon-ecommerce-cent' => 'icon-ecommerce-cent'),
	array('icon-ecommerce-colon' => 'icon-ecommerce-colon'),
	array('icon-ecommerce-creditcard' => 'icon-ecommerce-creditcard'),
	array('icon-ecommerce-diamond' => 'icon-ecommerce-diamond'),
	array('icon-ecommerce-dollar' => 'icon-ecommerce-dollar'),
	array('icon-ecommerce-euro' => 'icon-ecommerce-euro'),
	array('icon-ecommerce-franc' => 'icon-ecommerce-franc'),
	array('icon-ecommerce-gift' => 'icon-ecommerce-gift'),
	array('icon-ecommerce-graph1' => 'icon-ecommerce-graph1'),
	array('icon-ecommerce-graph2' => 'icon-ecommerce-graph2'),
	array('icon-ecommerce-graph3' => 'icon-ecommerce-graph3'),
	array('icon-ecommerce-graph-decrease' => 'icon-ecommerce-graph-decrease'),
	array('icon-ecommerce-graph-increase' => 'icon-ecommerce-graph-increase'),
	array('icon-ecommerce-guarani' => 'icon-ecommerce-guarani'),
	array('icon-ecommerce-kips' => 'icon-ecommerce-kips'),
	array('icon-ecommerce-lira' => 'icon-ecommerce-lira'),
	array('icon-ecommerce-megaphone' => 'icon-ecommerce-megaphone'),
	array('icon-ecommerce-money' => 'icon-ecommerce-money'),
	array('icon-ecommerce-naira' => 'icon-ecommerce-naira'),
	array('icon-ecommerce-pesos' => 'icon-ecommerce-pesos'),
	array('icon-ecommerce-pound' => 'icon-ecommerce-pound'),
	array('icon-ecommerce-receipt' => 'icon-ecommerce-receipt'),
	array('icon-ecommerce-receipt-bath' => 'icon-ecommerce-receipt-bath'),
	array('icon-ecommerce-receipt-cent' => 'icon-ecommerce-receipt-cent'),
	array('icon-ecommerce-receipt-dollar' => 'icon-ecommerce-receipt-dollar'),
	array('icon-ecommerce-receipt-euro' => 'icon-ecommerce-receipt-euro'),
	array('icon-ecommerce-receipt-franc' => 'icon-ecommerce-receipt-franc'),
	array('icon-ecommerce-receipt-guarani' => 'icon-ecommerce-receipt-guarani'),
	array('icon-ecommerce-receipt-kips' => 'icon-ecommerce-receipt-kips'),
	array('icon-ecommerce-receipt-lira' => 'icon-ecommerce-receipt-lira'),
	array('icon-ecommerce-receipt-naira' => 'icon-ecommerce-receipt-naira'),
	array('icon-ecommerce-receipt-pesos' => 'icon-ecommerce-receipt-pesos'),
	array('icon-ecommerce-receipt-pound' => 'icon-ecommerce-receipt-pound'),
	array('icon-ecommerce-receipt-rublo' => 'icon-ecommerce-receipt-rublo'),
	array('icon-ecommerce-receipt-rupee' => 'icon-ecommerce-receipt-rupee'),
	array('icon-ecommerce-receipt-tugrik' => 'icon-ecommerce-receipt-tugrik'),
	array('icon-ecommerce-receipt-won' => 'icon-ecommerce-receipt-won'),
	array('icon-ecommerce-receipt-yen' => 'icon-ecommerce-receipt-yen'),
	array('icon-ecommerce-receipt-yen2' => 'icon-ecommerce-receipt-yen2'),
	array('icon-ecommerce-recept-colon' => 'icon-ecommerce-recept-colon'),
	array('icon-ecommerce-rublo' => 'icon-ecommerce-rublo'),
	array('icon-ecommerce-rupee' => 'icon-ecommerce-rupee'),
	array('icon-ecommerce-safe' => 'icon-ecommerce-safe'),
	array('icon-ecommerce-sale' => 'icon-ecommerce-sale'),
	array('icon-ecommerce-sales' => 'icon-ecommerce-sales'),
	array('icon-ecommerce-ticket' => 'icon-ecommerce-ticket'),
	array('icon-ecommerce-tugriks' => 'icon-ecommerce-tugriks'),
	array('icon-ecommerce-wallet' => 'icon-ecommerce-wallet'),
	array('icon-ecommerce-won' => 'icon-ecommerce-won'),
	array('icon-ecommerce-yen' => 'icon-ecommerce-yen'),
	array('icon-ecommerce-yen2' => 'icon-ecommerce-yen2'),
	array('icon-music-beginning-button' => 'icon-music-beginning-button'),
	array('icon-music-bell' => 'icon-music-bell'),
	array('icon-music-cd' => 'icon-music-cd'),
	array('icon-music-diapason' => 'icon-music-diapason'),
	array('icon-music-eject-button' => 'icon-music-eject-button'),
	array('icon-music-end-button' => 'icon-music-end-button'),
	array('icon-music-fastforward-button' => 'icon-music-fastforward-button'),
	array('icon-music-headphones' => 'icon-music-headphones'),
	array('icon-music-ipod' => 'icon-music-ipod'),
	array('icon-music-loudspeaker' => 'icon-music-loudspeaker'),
	array('icon-music-microphone' => 'icon-music-microphone'),
	array('icon-music-microphone-old' => 'icon-music-microphone-old'),
	array('icon-music-mixer' => 'icon-music-mixer'),
	array('icon-music-mute' => 'icon-music-mute'),
	array('icon-music-note-multiple' => 'icon-music-note-multiple'),
	array('icon-music-note-single' => 'icon-music-note-single'),
	array('icon-music-pause-button' => 'icon-music-pause-button'),
	array('icon-music-playlist' => 'icon-music-play-button'),
	array('icon-music-play-button' => 'icon-music-playlist'),
	array('icon-music-radio-ghettoblaster' => 'icon-music-radio-ghettoblaster'),
	array('icon-music-radio-portable' => 'icon-music-radio-portable'),
	array('icon-music-record' => 'icon-music-record'),
	array('icon-music-recordplayer' => 'icon-music-recordplayer'),
	array('icon-music-repeat-button' => 'icon-music-repeat-button'),
	array('icon-music-rewind-button' => 'icon-music-rewind-button'),
	array('icon-music-shuffle-button' => 'icon-music-shuffle-button'),
	array('icon-music-stop-button' => 'icon-music-stop-button'),
	array('icon-music-tape' => 'icon-music-tape'),
	array('icon-music-volume-down' => 'icon-music-volume-down'),
	array('icon-music-volume-up' => 'icon-music-volume-up'),
	array('icon-software-add-vectorpoint' => 'icon-software-add-vectorpoint'),
	array('icon-software-box-oval' => 'icon-software-box-oval'),
	array('icon-software-box-polygon' => 'icon-software-box-polygon'),
	array('icon-software-box-rectangle' => 'icon-software-box-rectangle'),
	array('icon-software-box-roundedrectangle' => 'icon-software-box-roundedrectangle'),
	array('icon-software-character' => 'icon-software-character'),
	array('icon-software-crop' => 'icon-software-crop'),
	array('icon-software-eyedropper' => 'icon-software-eyedropper'),
	array('icon-software-font-allcaps' => 'icon-software-font-allcaps'),
	array('icon-software-font-baseline-shift' => 'icon-software-font-baseline-shift'),
	array('icon-software-font-horizontal-scale' => 'icon-software-font-horizontal-scale'),
	array('icon-software-font-kerning' => 'icon-software-font-kerning'),
	array('icon-software-font-leading' => 'icon-software-font-leading'),
	array('icon-software-font-size' => 'icon-software-font-size'),
	array('icon-software-font-smallcapital' => 'icon-software-font-smallcapital'),
	array('icon-software-font-smallcaps' => 'icon-software-font-smallcaps'),
	array('icon-software-font-strikethrough' => 'icon-software-font-strikethrough'),
	array('icon-software-font-tracking' => 'icon-software-font-tracking'),
	array('icon-software-font-underline' => 'icon-software-font-underline'),
	array('icon-software-font-vertical-scale' => 'icon-software-font-vertical-scale'),
	array('icon-software-horizontal-align-center' => 'icon-software-horizontal-align-center'),
	array('icon-software-horizontal-align-left' => 'icon-software-horizontal-align-left'),
	array('icon-software-horizontal-align-right' => 'icon-software-horizontal-align-right'),
	array('icon-software-horizontal-distribute-center' => 'icon-software-horizontal-distribute-center'),
	array('icon-software-horizontal-distribute-left' => 'icon-software-horizontal-distribute-left'),
	array('icon-software-horizontal-distribute-right' => 'icon-software-horizontal-distribute-right'),
	array('icon-software-indent-firstline' => 'icon-software-indent-firstline'),
	array('icon-software-indent-left' => 'icon-software-indent-left'),
	array('icon-software-indent-right' => 'icon-software-indent-right'),
	array('icon-software-lasso' => 'icon-software-lasso'),
	array('icon-software-layers1' => 'icon-software-layers1'),
	array('icon-software-layers2' => 'icon-software-layers2'),
	array('icon-software-layout-8boxes' => 'icon-software-layout'),
	array('icon-software-layout' => 'icon-software-layout-2columns'),
	array('icon-software-layout-2columns' => 'icon-software-layout-3columns'),
	array('icon-software-layout-3columns' => 'icon-software-layout-4boxes'),
	array('icon-software-layout-4boxes' => 'icon-software-layout-4columns'),
	array('icon-software-layout-4columns' => 'icon-software-layout-4lines'),
	array('icon-software-layout-4lines' => 'icon-software-layout-8boxes'),
	array('icon-software-layout-header' => 'icon-software-layout-header'),
	array('icon-software-layout-header-2columns' => 'icon-software-layout-header-2columns'),
	array('icon-software-layout-header-3columns' => 'icon-software-layout-header-3columns'),
	array('icon-software-layout-header-4boxes' => 'icon-software-layout-header-4boxes'),
	array('icon-software-layout-header-4columns' => 'icon-software-layout-header-4columns'),
	array('icon-software-layout-header-complex' => 'icon-software-layout-header-complex'),
	array('icon-software-layout-header-complex2' => 'icon-software-layout-header-complex2'),
	array('icon-software-layout-header-complex3' => 'icon-software-layout-header-complex3'),
	array('icon-software-layout-header-complex4' => 'icon-software-layout-header-complex4'),
	array('icon-software-layout-header-sideleft' => 'icon-software-layout-header-sideleft'),
	array('icon-software-layout-header-sideright' => 'icon-software-layout-header-sideright'),
	array('icon-software-layout-sidebar-left' => 'icon-software-layout-sidebar-left'),
	array('icon-software-layout-sidebar-right' => 'icon-software-layout-sidebar-right'),
	array('icon-software-magnete' => 'icon-software-magnete'),
	array('icon-software-pages' => 'icon-software-pages'),
	array('icon-software-paintbrush' => 'icon-software-paintbrush'),
	array('icon-software-paintbucket' => 'icon-software-paintbucket'),
	array('icon-software-paintroller' => 'icon-software-paintroller'),
	array('icon-software-paragraph' => 'icon-software-paragraph'),
	array('icon-software-paragraph-align-left' => 'icon-software-paragraph-align-left'),
	array('icon-software-paragraph-align-right' => 'icon-software-paragraph-align-right'),
	array('icon-software-paragraph-center' => 'icon-software-paragraph-center'),
	array('icon-software-paragraph-justify-all' => 'icon-software-paragraph-justify-all'),
	array('icon-software-paragraph-justify-center' => 'icon-software-paragraph-justify-center'),
	array('icon-software-paragraph-justify-left' => 'icon-software-paragraph-justify-left'),
	array('icon-software-paragraph-justify-right' => 'icon-software-paragraph-justify-right'),
	array('icon-software-paragraph-space-after' => 'icon-software-paragraph-space-after'),
	array('icon-software-paragraph-space-before' => 'icon-software-paragraph-space-before'),
	array('icon-software-pathfinder-exclude' => 'icon-software-pathfinder-exclude'),
	array('icon-software-pathfinder-intersect' => 'icon-software-pathfinder-intersect'),
	array('icon-software-pathfinder-subtract' => 'icon-software-pathfinder-subtract'),
	array('icon-software-pathfinder-unite' => 'icon-software-pathfinder-unite'),
	array('icon-software-pen' => 'icon-software-pen'),
	array('icon-software-pencil' => 'icon-software-pen-add'),
	array('icon-software-pen-add' => 'icon-software-pen-remove'),
	array('icon-software-pen-remove' => 'icon-software-pencil'),
	array('icon-software-polygonallasso' => 'icon-software-polygonallasso'),
	array('icon-software-reflect-horizontal' => 'icon-software-reflect-horizontal'),
	array('icon-software-reflect-vertical' => 'icon-software-reflect-vertical'),
	array('icon-software-remove-vectorpoint' => 'icon-software-remove-vectorpoint'),
	array('icon-software-scale-expand' => 'icon-software-scale-expand'),
	array('icon-software-scale-reduce' => 'icon-software-scale-reduce'),
	array('icon-software-selection-oval' => 'icon-software-selection-oval'),
	array('icon-software-selection-polygon' => 'icon-software-selection-polygon'),
	array('icon-software-selection-rectangle' => 'icon-software-selection-rectangle'),
	array('icon-software-selection-roundedrectangle' => 'icon-software-selection-roundedrectangle'),
	array('icon-software-shape-oval' => 'icon-software-shape-oval'),
	array('icon-software-shape-polygon' => 'icon-software-shape-polygon'),
	array('icon-software-shape-rectangle' => 'icon-software-shape-rectangle'),
	array('icon-software-shape-roundedrectangle' => 'icon-software-shape-roundedrectangle'),
	array('icon-software-slice' => 'icon-software-slice'),
	array('icon-software-transform-bezier' => 'icon-software-transform-bezier'),
	array('icon-software-vector-box' => 'icon-software-vector-box'),
	array('icon-software-vector-composite' => 'icon-software-vector-composite'),
	array('icon-software-vector-line' => 'icon-software-vector-line'),
	array('icon-software-vertical-align-bottom' => 'icon-software-vertical-align-bottom'),
	array('icon-software-vertical-align-center' => 'icon-software-vertical-align-center'),
	array('icon-software-vertical-align-top' => 'icon-software-vertical-align-top'),
	array('icon-software-vertical-distribute-bottom' => 'icon-software-vertical-distribute-bottom'),
	array('icon-software-vertical-distribute-center' => 'icon-software-vertical-distribute-center'),
	array('icon-software-vertical-distribute-top' => 'icon-software-vertical-distribute-top'),
	array('icon-weather-aquarius' => 'icon-weather-aquarius'),
	array('icon-weather-aries' => 'icon-weather-aries'),
	array('icon-weather-cancer' => 'icon-weather-cancer'),
	array('icon-weather-capricorn' => 'icon-weather-capricorn'),
	array('icon-weather-cloud' => 'icon-weather-cloud'),
	array('icon-weather-cloud-drop' => 'icon-weather-cloud-drop'),
	array('icon-weather-cloud-lightning' => 'icon-weather-cloud-lightning'),
	array('icon-weather-cloud-snowflake' => 'icon-weather-cloud-snowflake'),
	array('icon-weather-downpour-fullmoon' => 'icon-weather-downpour-fullmoon'),
	array('icon-weather-downpour-halfmoon' => 'icon-weather-downpour-halfmoon'),
	array('icon-weather-downpour-sun' => 'icon-weather-downpour-sun'),
	array('icon-weather-drop' => 'icon-weather-drop'),
	array('icon-weather-first-quarter ' => 'icon-weather-first-quarter'),
	array('icon-weather-fog' => 'icon-weather-fog'),
	array('icon-weather-fog-fullmoon' => 'icon-weather-fog-fullmoon'),
	array('icon-weather-fog-halfmoon' => 'icon-weather-fog-halfmoon'),
	array('icon-weather-fog-sun' => 'icon-weather-fog-sun'),
	array('icon-weather-fullmoon' => 'icon-weather-fullmoon'),
	array('icon-weather-gemini' => 'icon-weather-gemini'),
	array('icon-weather-hail' => 'icon-weather-hail'),
	array('icon-weather-hail-fullmoon' => 'icon-weather-hail-fullmoon'),
	array('icon-weather-hail-halfmoon' => 'icon-weather-hail-halfmoon'),
	array('icon-weather-hail-sun' => 'icon-weather-hail-sun'),
	array('icon-weather-last-quarter' => 'icon-weather-last-quarter'),
	array('icon-weather-leo' => 'icon-weather-leo'),
	array('icon-weather-libra' => 'icon-weather-libra'),
	array('icon-weather-lightning' => 'icon-weather-lightning'),
	array('icon-weather-mistyrain' => 'icon-weather-mistyrain'),
	array('icon-weather-mistyrain-fullmoon' => 'icon-weather-mistyrain-fullmoon'),
	array('icon-weather-mistyrain-halfmoon' => 'icon-weather-mistyrain-halfmoon'),
	array('icon-weather-mistyrain-sun' => 'icon-weather-mistyrain-sun'),
	array('icon-weather-moon' => 'icon-weather-moon'),
	array('icon-weather-moondown-full' => 'icon-weather-moondown-full'),
	array('icon-weather-moondown-half' => 'icon-weather-moondown-half'),
	array('icon-weather-moonset-full' => 'icon-weather-moonset-full'),
	array('icon-weather-moonset-half' => 'icon-weather-moonset-half'),
	array('icon-weather-move2' => 'icon-weather-move2'),
	array('icon-weather-newmoon' => 'icon-weather-newmoon'),
	array('icon-weather-pisces' => 'icon-weather-pisces'),
	array('icon-weather-rain' => 'icon-weather-rain'),
	array('icon-weather-rain-fullmoon' => 'icon-weather-rain-fullmoon'),
	array('icon-weather-rain-halfmoon' => 'icon-weather-rain-halfmoon'),
	array('icon-weather-rain-sun' => 'icon-weather-rain-sun'),
	array('icon-weather-sagittarius' => 'icon-weather-sagittarius'),
	array('icon-weather-scorpio' => 'icon-weather-scorpio'),
	array('icon-weather-snow' => 'icon-weather-snow'),
	array('icon-weather-snowflake' => 'icon-weather-snowflake'),
	array('icon-weather-snow-fullmoon' => 'icon-weather-snow-fullmoon'),
	array('icon-weather-snow-halfmoon' => 'icon-weather-snow-halfmoon'),
	array('icon-weather-snow-sun' => 'icon-weather-snow-sun'),
	array('icon-weather-star' => 'icon-weather-star'),
	array('icon-weather-storm-11' => 'icon-weather-storm-11'),
	array('icon-weather-storm-32' => 'icon-weather-storm-32'),
	array('icon-weather-storm-fullmoon' => 'icon-weather-storm-fullmoon'),
	array('icon-weather-storm-halfmoon' => 'icon-weather-storm-halfmoon'),
	array('icon-weather-storm-sun' => 'icon-weather-storm-sun'),
	array('icon-weather-sun' => 'icon-weather-sun'),
	array('icon-weather-sundown' => 'icon-weather-sundown'),
	array('icon-weather-sunset' => 'icon-weather-sunset'),
	array('icon-weather-taurus' => 'icon-weather-taurus'),
	array('icon-weather-tempest' => 'icon-weather-tempest'),
	array('icon-weather-tempest-fullmoon' => 'icon-weather-tempest-fullmoon'),
	array('icon-weather-tempest-halfmoon' => 'icon-weather-tempest-halfmoon'),
	array('icon-weather-tempest-sun' => 'icon-weather-tempest-sun'),
	array('icon-weather-variable-fullmoon' => 'icon-weather-variable-fullmoon'),
	array('icon-weather-variable-halfmoon' => 'icon-weather-variable-halfmoon'),
	array('icon-weather-variable-sun' => 'icon-weather-variable-sun'),
	array('icon-weather-virgo' => 'icon-weather-virgo'),
	array('icon-weather-waning-cresent' => 'icon-weather-waning-cresent'),
	array('icon-weather-waning-gibbous' => 'icon-weather-waning-gibbous'),
	array('icon-weather-waxing-cresent' => 'icon-weather-waxing-cresent'),
	array('icon-weather-waxing-gibbous' => 'icon-weather-waxing-gibbous'),
	array('icon-weather-wind' => 'icon-weather-wind'),
	array('icon-weather-windgust' => 'icon-weather-windgust'),
	array('icon-weather-wind-e' => 'icon-weather-wind-e'),
	array('icon-weather-wind-fullmoon' => 'icon-weather-wind-fullmoon'),
	array('icon-weather-wind-halfmoon' => 'icon-weather-wind-halfmoon'),
	array('icon-weather-wind-n' => 'icon-weather-wind-n'),
	array('icon-weather-wind-ne' => 'icon-weather-wind-ne'),
	array('icon-weather-wind-nw' => 'icon-weather-wind-nw'),
	array('icon-weather-wind-s' => 'icon-weather-wind-s'),
	array('icon-weather-wind-se' => 'icon-weather-wind-se'),
	array('icon-weather-wind-sun' => 'icon-weather-wind-sun'),
	array('icon-weather-wind-sw' => 'icon-weather-wind-sw'),
	array('icon-weather-wind-w' => 'icon-weather-wind-w'),
	);

	return array_merge( $icons, $linea_icons );
}

function apress_getCategoryChildsFull( $parent_id, $pos, $array, $level, &$dropdown ) {

    for ( $i = $pos; $i < count( $array ); $i ++ ) {
        if ( $array[ $i ]->category_parent == $parent_id ) {
            $name = str_repeat( "- ", $level ) . $array[ $i ]->name;
            $value = $array[ $i ]->slug;
			$dropdown[] = array(
				'label' => $name,
				'value' => $value,
			);
            apress_getCategoryChildsFull( $array[ $i ]->term_id, $i, $array, $level + 1, $dropdown );
        }
    }
}

function apress_vc_woo_order_by() {
    return array(
        '',
        __( 'Date', 'apcore' ) => 'date',
        __( 'ID', 'apcore' ) => 'ID',
        __( 'Author', 'apcore' ) => 'author',
        __( 'Title', 'apcore' ) => 'title',
        __( 'Modified', 'apcore' ) => 'modified',
        __( 'Random', 'apcore' ) => 'rand',
        __( 'Comment count', 'apcore' ) => 'comment_count',
        __( 'Menu order', 'apcore' ) => 'menu_order',
    );
}

function apress_vc_woo_order_way() {
    return array(
        '',
        __( 'Descending', 'apcore' ) => 'DESC',
        __( 'Ascending', 'apcore' ) => 'ASC',
    );
}



	require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'vc_custom/params.php');
	
	foreach(glob(APRESS_EXTENSIONS_PLUGIN_PATH.'vc_custom/shortcodes/*.php') as $shortcode) {
		require_once($shortcode);
	}	
	if ( class_exists( 'woocommerce' ) ) {  
		foreach(glob(APRESS_EXTENSIONS_PLUGIN_PATH.'vc_custom/woo/*.php') as $woo_module) {
			require_once($woo_module);
		} 
	}
 
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
			foreach(glob(APRESS_EXTENSIONS_PLUGIN_PATH.'vc_custom/contact_form_7/*.php') as $module) {
				require_once($module);
			}
	}
}


/**
 * Convert array to html attributes
 *
 * @param  array $array
 *
 * @return string
 */
function array_to_data( array $array ) {
	$array_map = array_map( function ( $key, $value ) {
		return sprintf( '%s="%s"', $key, esc_attr( $value ) );

	}, array_keys( $array ), array_values( $array ) );

	return join( " ", $array_map );
}