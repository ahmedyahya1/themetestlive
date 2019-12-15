<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $row_name 
 * @var $row_text_color
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = $active_onepage_class = $apress_z_index_var = $overflow_visible_var = '';

$disable_element = '';
$output = $after_output = $apress_z_index = $apress_enable_separator = $apress_separator_style = $apress_separator_color = $apress_separator_height = $apress_separator_position = $apress_separator_tofront = $apress_enable_row_overlay = $apress_overlay_color_option = $apress_row_overlay_color = $apress_gradient_color_from = $apress_gradient_color_to = $bottom_separator_html = $top_separator_html = $overflow_visible = '';

$apress_separator_type = $apress_fluid_separator_height = $apress_fluid_start_color = $apress_fluid_end_color = $apress_mousehover_enable = $fluid_wave_separator = $particles_zindex = '';


$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
wp_enqueue_script('zolowave');
wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$uniqid = uniqid(rand());
$apress_row_class = 'apress_row_class_'.$uniqid;

$css_classes = array(
	'vc_row',
	'wpb_row',
	'zolo_wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	$apress_row_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}


if ( ! empty( $active_onepage_class ) ) {
	$css_classes[] = 'zt_onepage';
}

global $post;
$page_full_screen_rows = (isset($post->ID)) ? get_post_meta($post->ID, 'zt_full_screen_rows', true) : '';



$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	
	if( $page_full_screen_rows == 'on' ){
		$wrapper_attributes[] = 'id="' . esc_attr( 'fp'.$el_id ) . '"';
	}else{
		$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
	}
	
	$wrapper_attributes[] = 'data-fullscreen-anchor-id="' . esc_attr( $el_id ) . '"';
}

if ( ! empty( $row_name ) ) {
	$wrapper_attributes[] = 'data-tooltip-name="'.esc_attr($row_name).'"';
}
//row_text_color
if ( ! empty( $row_text_color ) ) {
	$wrapper_attributes[] = 'data-row-text-color="'.esc_attr($row_text_color).'"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}
if ( ! empty( $row_name ) ) {
	$wrapper_attributes[] = 'data-tooltip-name="'.$row_name.'"';
}
if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}


if(! empty( $apress_z_index )) {
	$apress_z_index_var = 'position: relative;z-index:'.$apress_z_index.';'; 
}
if( $overflow_visible == 'true' ) {
	$overflow_visible_var = 'overflow:visible;'; 
}

$wrapper_attributes[] = 'style="'.$apress_z_index_var.' '.$overflow_visible_var.'"'; 


$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$shape_divider_html = '';

if($apress_enable_separator == 'yes'){
		if($apress_separator_type == 'static'){
	if($apress_separator_style == 'style1'){
	$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
				<path d="M 1014 264 v 122 h -808 l -172 -86 s 310.42 -22.84 402 -79 c 106 -65 154 -61 268 -12 c 107 46 195.11 5.94 275 137 z"/>   <path d="M -302 55 s 235.27 208.25 352 159 c 128 -54 233 -98 303 -73 c 92.68 33.1 181.28 115.19 235 108 c 104.9 -14 176.52 -173.06 267 -118 c 85.61 52.09 145 123 145 123 v 74 l -1306 10 z"/>  
				<path d="M -286 255 s 214 -103 338 -129 s 203 29 384 101 c 145.57 57.91 178.7 50.79 272 0 c 79 -43 301 -224 385 -63 c 53 101.63 -62 129 -62 129 l -107 84 l -1212 12 z"/>  
				<path d="M -24 69 s 299.68 301.66 413 245 c 8 -4 233 2 284 42 c 17.47 13.7 172 -132 217 -174 c 54.8 -51.15 128 -90 188 -39 c 76.12 64.7 118 99 118 99 l -12 132 l -1212 12 z"/>  
				<path d="M -12 201 s 70 83 194 57 s 160.29 -36.77 274 6 c 109 41 184.82 24.36 265 -15 c 55 -27 116.5 -57.69 214 4 c 49 31 95 26 95 26 l -6 151 l -1036 10 z"/> </svg>';
		
		}else if($apress_separator_style == 'style2'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1003.92 91" preserveAspectRatio="none">  <polygon class="cls-1" points="502.46 46.31 1 85.67 1 91.89 1002.91 91.89 1002.91 85.78 502.46 46.31"/><polygon class="cls-2" points="502.46 45.8 1 0 1 91.38 1002.91 91.38 1002.91 0.1 502.46 45.8"/><rect class="cls-3" y="45.81" width="1003.92" height="46.09"/>
				</svg>';
			
		}else if($apress_separator_style == 'style3'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  
				<path d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"/> <path d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"/> <path d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"/>
				 </svg>';
			
		}else if($apress_separator_style == 'style4'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">  <path d="M 850.23 235.79 a 1.83 1.83 0 0 0 -0.8 -3.24 c -10.23 -2 -53.38 -23.41 -97.44 -43.55 c -244.99 -112 -337.79 97.38 -432.99 104 c -115 8 -217 -87 -330 -37 c 0 0 9 15 9 42 v -1 h 849 l 2 -55 s -2.87 -3 1.23 -6.21 z"/>  <path d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"/> </svg>';
			
		}else if($apress_separator_style == 'style5'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none"> <path d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path> </svg>';
			
		}else if($apress_separator_style == 'style6'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path d="M 0 14 s 88.64 3.48 300 36 c 260 40 514 27 703 -10 l 12 28 l 3 36 h -1018 z"></path> <path d="M 0 45 s 271 45.13 500 32 c 157 -9 330 -47 515 -63 v 86 h -1015 z"></path> <path d="M 0 58 s 188.29 32 508 32 c 290 0 494 -35 494 -35 v 45 h -1002 z"></path> </svg>';
			
		}else if($apress_separator_style == 'style7'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" viewBox="0 0 2e3 422.09" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
	<path id="XMLID_2_" class="st0" d="m0 176.82s203.76-137.14 316.72 58.021c0 0 93.023-170.77 250.28-52.419 0 0 120.43-219.23 394.24-177.03 0 0 96.068-5.394 230.34 166.15 0 0 217.05-189.89 347.73 76.483 0 0 95.238-79.12 166.11 47.472 0 0 128.46-163.52 294.57-71.208v150.33h-2e3v-197.8z"/><path id="XMLID_1_" class="st0" d="m0 224.29s203.76-137.14 316.72 58.021c0 0 93.023-170.77 250.28-52.419 0 0 120.43-219.23 394.24-177.03 0 0 96.068-5.394 230.34 166.15 0 0 217.05-189.89 347.73 76.483 0 0 95.238-79.12 166.11 47.472 0 0 128.46-163.52 294.57-71.208v150.33h-2e3v-197.8z"/></svg>';
			
		}else if($apress_separator_style == 'style8'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"> <polygon points="104 10 0 0 0 10"></polygon> </svg>';
			
		}else if($apress_separator_style == 'style9'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"> <polygon points="100 10 100 0 -4 10"></polygon> </svg>';
			
		}else if($apress_separator_style == 'style10'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z"></path> </svg>';
			
		}else if($apress_separator_style == 'style11'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"> <path d="M0 100 C 50 0 80 0 100 100 Z"></path> </svg>';
			
		}else if($apress_separator_style == 'style12'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"> <path d="M0 100 C 20 0 50 0 100 100 Z"></path> </svg>';
			
		}else if($apress_separator_style == 'style13'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <polygon  points="501 53.27 0.5 0.56 0.5 100 1000.5 100 1000.5 0.66 501 53.27"/></svg>';
			
		}else if($apress_separator_style == 'style14'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"> <path d="M 0 45.86 h 458 c 29 0 42 19.27 42 19.27 s 13 -19.27 42.74 -19.27 h 457.26 v 54.14 h -1000 z"></path>  </svg>';
			
		}else if($apress_separator_style == 'style15'){
			$shape_divider_html = '<svg class="apress-separator" fill="'.$apress_separator_color.'" viewBox="0 0 1024 220.16" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
	<path class="st0" d="m0 86.321s114.5-68 311-12c0 0 47.368 11.625 109.77 29.453 71.166 20.331 161.89 47.826 224.23 59.547 0 0 90 18.5 186.5 11.5 0 0 101.5-10.333 122.17-21 0 0 61-19 70.333-27v93.333h-1024v-133.83z"/><path class="st0" d="m0 73.321s39-26.5 111.88-41.775c50.332-10.548 117.92-4.069 199.12 17.775 0 0 47.924 10.781 109.77 30.453 71.95 22.885 143.73 50.547 214.23 66.547 0 0 129.5 35 228.5 24.5 0 0 69.5-6.333 90.167-17 0 0 61-18 70.333-26v68.333h-1024v-122.83z"/><path class="st0" d="m0 47.821s132-84 355.33-7.333c0 0 223.33 77 265.67 92.667 0 0 89.333 26.333 132 30 0 0 82.667 10.333 150-3.333 0 0 57.333-7 121-38.667v99h-1024v-172.33z"/><path class="st0" d="m0 47.488s33.502-19.979 90.716-31.457c42.644-8.555 98.461-11.944 163.4-1.2 0 0 61.771 9.981 107.25 27.736 0 0 115.48 30.922 130.98 36.088 0 0 134.83 44.5 184.5 54.667 0 0 95.833 28.833 200.67 22.333 0 0 82.833-5.167 146.5-42.833v107.33h-1024v-172.67z"/><path class="st0" d="m0 47.488s134.67-74.333 332-37c0 0 161 40.333 247 81.833 0 0 97.333 35.833 159.33 46.5 0 0 100.63 16.044 189-2.642 0 0 49.667-8.358 96.667-29.358v113.33h-1024v-172.67z"/></svg>';
		}
		
	if($apress_separator_position == 'top' && $apress_separator_position != ''){
		$top_separator_html = '<div class="apress-separator-wrap row_top_separator '.$apress_separator_style.'" style=" height:'.$apress_separator_height.'px;">'.$shape_divider_html.'</div>';
	}else if($apress_separator_position == 'bottom' && $apress_separator_position != ''){
		$bottom_separator_html = '<div class="apress-separator-wrap row_bottom_separator '.$apress_separator_style.'" style=" height:'.$apress_separator_height.'px;">'.$shape_divider_html.'</div>';
	}else if($apress_separator_position == 'bottom_top' && $apress_separator_position != ''){
		$bottom_separator_html = '<div class="apress-separator-wrap row_bottom_separator '.$apress_separator_style.'" style=" height:'.$apress_separator_height.'px;">'.$shape_divider_html.'</div>';
		$top_separator_html = '<div class="apress-separator-wrap row_top_separator '.$apress_separator_style.'" style=" height:'.$apress_separator_height.'px;">'.$shape_divider_html.'</div>';
		}
		
			
		if($apress_separator_tofront == 'yes'){
				$separator_index = 99;
			}else{
				$separator_index = 2;
			}	
	}
		
	if($apress_separator_type == 'fluid'){
		if($apress_mousehover_enable == 'yes'){
				$fluid_separator_index = 99;
				$mousehover_truefalse = 'true';
			}else{
				$fluid_separator_index = 2;
				$mousehover_truefalse = 'false';
			}
	$fluid_wave_separator = '<canvas id="zolowave'.$apress_row_class.'" class="zolowave" style="z-index:'.$fluid_separator_index.';"></canvas>';
	}
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

// Particle jquery

if($add_extended == 'yes'){

	$values = (array) vc_param_group_parse_atts( $values );
	$item_data = array();

	foreach ( $values as $data ) {
	    $new_data = $data;
	    $new_data['extended_animation'] = isset( $data['extended_animation'] ) ? $data['extended_animation'] : 'particles';
	    $new_data['drop_colors'] = isset( $data['drop_colors'] ) ? $data['drop_colors'] : 'one_color';
	    $new_data['part_color'] = isset( $data['part_color'] ) ? $data['part_color'] : '#ff7e00';
	    $new_data['part_color_1'] = isset( $data['part_color_1'] ) ? $data['part_color_1'] : '#ff7e00';
	    $new_data['part_color_2'] = isset( $data['part_color_2'] ) ? $data['part_color_2'] : '#3224e9';
	    $new_data['part_color_3'] = isset( $data['part_color_3'] ) ? $data['part_color_3'] : '#69e9f2';
	    $new_data['particles_number'] = isset( $data['particles_number'] ) ? $data['particles_number'] : '50';
	    $new_data['particles_size'] = isset( $data['particles_size'] ) ? $data['particles_size'] : '10';
	    $new_data['particles_speed'] = isset( $data['particles_speed'] ) ? $data['particles_speed'] : '2';
	    $new_data['add_line'] = isset( $data['add_line'] ) ? $data['add_line'] : false;
	    $new_data['hover_anim'] = isset( $data['hover_anim'] ) ? $data['hover_anim'] : 'grab';
	    $new_data['image_bg'] = isset( $data['image_bg'] ) ? $data['image_bg'] : '';
	    $new_data['parallax_dir'] = isset( $data['parallax_dir'] ) ? $data['parallax_dir'] : 'horizontal';
	    $new_data['parallax_factor'] = isset( $data['parallax_factor'] ) ? $data['parallax_factor'] : '0.3';
	    $new_data['particles_position_top'] = isset( $data['particles_position_top'] ) ? $data['particles_position_top'] : '0';
	    $new_data['particles_position_left'] = isset( $data['particles_position_left'] ) ? $data['particles_position_left'] : '0';
	    $new_data['particles_width'] = isset( $data['particles_width'] ) ? $data['particles_width'] : '100';
	    $new_data['particles_height'] = isset( $data['particles_height'] ) ? $data['particles_height'] : '100';
		$new_data['particles_zindex;'] = isset( $data['particles_zindex'] ) ? $data['particles_zindex'] : '0';

	    $item_data[] = $new_data;
	}
	$counter = 0;
	foreach ( $item_data as $item_d ) {

		if ($item_d['extended_animation'] == 'particles' || $item_d['extended_animation'] == 'hexagons') {
			wp_enqueue_script( 'particles', APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/js/particles.min.js', array ( 'jquery' ), false, true);
		}

		// Add Animation particles
		if ('particles' == $item_d['extended_animation'] || 'hexagons' == $item_d['extended_animation']) {

			// data attributes
			$color_1 = !empty($item_d['part_color_1']) ? esc_attr($item_d['part_color_1']) : '#ff7e00';
			$color_2 = !empty($item_d['part_color_2']) ? esc_attr($item_d['part_color_2']) : '#3224e9';
			$color_3 = !empty($item_d['part_color_3']) ? esc_attr($item_d['part_color_3']) : '#69e9f2';
			$data_colors_type = 'data-particles-colors-type="'.esc_attr($item_d['drop_colors']).'" ';
			$data_type = 'data-particles-type="'.esc_attr($item_d['extended_animation']).'" ';
			$data_number = 'data-particles-number="'.esc_attr((int)$item_d['particles_number']).'" ';
			$data_size = 'data-particles-size="'.esc_attr((int)$item_d['particles_size']).'" ';
			$data_speed = 'data-particles-speed="'.esc_attr((int)$item_d['particles_speed']).'" ';
			$data_line = (bool)$item_d['add_line'] ? 'data-particles-line="true" ' : 'data-particles-line="false" ';
			$data_hover = $item_d['hover_anim'] == 'none' ? 'data-particles-hover="false" ' : 'data-particles-hover="true" ';
			$data_hover_mode = $item_d['hover_anim'] !== 'none' ? 'data-particles-hover-mode="'.esc_attr($item_d['hover_anim']).'" ' : 'data-particles-hover-mode="grab" ';
			switch ($item_d['drop_colors']) {
				case 'one_color':
					$data_color = 'data-particles-color="'.esc_attr($item_d['part_color']).'" ';
					break;
				case 'random_colors':
					$data_color = 'data-particles-color="'.$color_1.','.$color_2.','.$color_3.'" ';
					break;
				default:
					$data_color = 'data-particles-color="'.esc_attr($item_d['part_color']).'" ';
					break;
			} 
			
			$particles_data = $data_type.$data_number.$data_color.$data_line.$data_size.$data_speed.$data_hover.$data_hover_mode.$data_colors_type;

			// position
			$particles_position_top = 'top:'.((int)$item_d['particles_position_top']).'%; ';
			$particles_position_left = 'left:'.((int)$item_d['particles_position_left']).'%; ';
			$particles_width = 'width:'.((int)$item_d['particles_width']).'%; ';
			$particles_height = 'height:'.((int)$item_d['particles_height']).'%; ';
			$particleszindex = 'z-index:'.((int)$item_d['particles_zindex']).';';
			$particles_style = $particles_position_top . $particles_position_left . $particles_width . $particles_height . $particleszindex;

			$particles_id = uniqid( 'particles_' );
			$output .= '<div id="'.esc_attr($particles_id.$counter).'" class="particles-js apress_particle_wrap" style="'.$particles_style.'" '.$particles_data.'></div>';
		}

		// Add Animation parallax
		if ('parallax' == $item_d['extended_animation'] && !empty($item_d['image_bg'])) {

			// position
			$parallax_position_top = 'top:'.((int)$item_d['particles_position_top']).'%; ';
			$parallax_position_left = 'left:'.((int)$item_d['particles_position_left']).'%; ';
			$parallax_style = $parallax_position_top . $parallax_position_left;

			// data attributes
			$data_direction = 'data-paroller-direction="'.esc_attr($item_d['parallax_dir']).'" ';
			$data_factor = 'data-paroller-factor="'.esc_attr($item_d['parallax_factor']).'" ';
			
			$parallax_data = $data_direction.$data_factor;

			// image
			$image_src = wp_get_attachment_image_src($item_d['image_bg'], 'full');
			$img_alt = get_post_meta($item_d['image_bg'], '_wp_attachment_image_alt', true);

			$output .= '<div class="extended-parallax" data-paroller-type="foreground" style="'.$parallax_style.'" '.$parallax_data.'><img src="'.esc_url($image_src[0]).'" alt="'.(!empty($img_alt) ? esc_attr($img_alt) : '').'" /></div>';

		}
		$counter++;
	}
	
}

$output .= $top_separator_html;
$output .=  wpb_js_remove_wpautop($content) ;
$output .= $bottom_separator_html;
$output .= $fluid_wave_separator;

// jQuery
if($apress_separator_type == 'fluid'){
$output .= '<script type="text/javascript" charset="utf-8">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).ready(function() {
		j$("#zolowave'.$apress_row_class.'").zolowave({
			colorStart: "'.$apress_fluid_start_color.'",
			colorEnd: "'.$apress_fluid_end_color.'",
			height:'.$apress_fluid_separator_height.',
			mousehover:'.$mousehover_truefalse.',
		});
	});
</script>';
}
// Style
$style = '';
if($apress_enable_row_overlay == 'yes' || $apress_enable_separator == 'yes'){
	$style .= '.'.$apress_row_class.'.vc_row{ position:relative;}';
	$style .= '.wpb_column{ position:relative; z-index:4;}';
	if($apress_enable_row_overlay == 'yes'){
			
		$style .=  '.'.$apress_row_class.'.vc_row:before{ position:absolute; top:0; left:0px; width:100%; height:100%; content:""; display:block;z-index: 1;}';
		
		if($apress_overlay_color_option == 'color'){
			$style .= '.'.$apress_row_class.'.vc_row:before{background:'.$apress_row_overlay_color.';}';
		}else if($apress_overlay_color_option == 'gradient'){
			if($apress_gradient_direction == 'horizontal'){		
				$style .= '.'.$apress_row_class.'.vc_row:before{background:'.$apress_gradient_color_from.';
				background: -moz-linear-gradient(0deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$apress_gradient_color_from.'), color-stop(100%, '.$apress_gradient_color_to.'));
				background: -webkit-linear-gradient(0deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: -o-linear-gradient(0deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: -ms-linear-gradient(0deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: linear-gradient(90deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$apress_gradient_color_from.', endColorstr='.$apress_gradient_color_to.',GradientType=1 );}';
			}else if($apress_gradient_direction == 'vertical'){
				$style .= '.'.$apress_row_class.'.vc_row:before{background:'.$apress_gradient_color_from.';
				background: -moz-linear-gradient(90deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$apress_gradient_color_from.'), color-stop(100%, '.$apress_gradient_color_to.'));
				background: -webkit-linear-gradient(90deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: -o-linear-gradient(90deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: -ms-linear-gradient(90deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				background: linear-gradient(0deg, '.$apress_gradient_color_from.' 0%, '.$apress_gradient_color_to.' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$apress_gradient_color_from.', endColorstr='.$apress_gradient_color_to.',GradientType=1 );}';		
			}
		}
	}
	if($apress_enable_separator == 'yes'){
	//Separator Type Static
		if($apress_separator_type == 'static'){
			
			$style .= '.'.$apress_row_class.' .apress-separator-wrap{ position:absolute; bottom:-1px; left:0;right: 0;z-index:'.$separator_index.';}';
			$style .= '.'.$apress_row_class.' .apress-separator-wrap.row_top_separator{ top:-1px;-moz-transform: rotate(180deg);-webkit-transform: rotate(180deg);-ms-transform: rotate(180deg);-o-transform: rotate(180deg);transform: rotate(180deg);}';
			$style .= '.'.$apress_row_class.' .apress-separator-wrap svg{ width:100%; height:100%;}';
			
			if($apress_separator_style == 'style1'){
				$style .= '.apress-separator-wrap.style1 svg path:first-child{opacity:0.1;}';
				$style .= '.apress-separator-wrap.style1 svg path:nth-child(2){opacity:0.12;}';
				$style .= '.apress-separator-wrap.style1 svg path:nth-child(3){opacity:0.18;}';
				$style .= '.apress-separator-wrap.style1 svg path:nth-child(4){opacity:0.33;}';
			}else if($apress_separator_style == 'style2'){
				$style .= '.apress-separator-wrap.style2 svg polygon:nth-child(2) { opacity: 0.15; }';
				$style .= '.apress-separator-wrap.style2 svg rect { opacity: 0.3; }';
			}else if($apress_separator_style == 'style7' || $apress_separator_style == 'style6' || $apress_separator_style == 'style3'){
				$style .= '.apress-separator-wrap.style6 svg path:nth-child(1),.apress-separator-wrap.style3 svg path:nth-child(1){ opacity: 0.15; }';
				$style .= '.apress-separator-wrap.style7 svg path:first-child,.apress-separator-wrap.style6 svg path:nth-child(2),.apress-separator-wrap.style3 svg path:nth-child(2){ opacity: 0.3;}';
			}else if($apress_separator_style == 'style4'){
				$style .= '.apress-separator-wrap.style4 svg path:first-child {opacity: 0.6;}';
			}else if($apress_separator_style == 'style15'){
				$style .= '.apress-separator-wrap.style15 svg path:nth-child(5){opacity: 0.15;}';
				$style .= '.apress-separator-wrap.style15 svg path:nth-child(4){opacity: 0.2;}';
				$style .= '.apress-separator-wrap.style15 svg path:nth-child(3){opacity: 0.3;}';
				$style .= '.apress-separator-wrap.style15 svg path:nth-child(2){opacity: 0.4;}';
			}
			$style .= '@media (max-width:650px) {.apress-separator-wrap{ height:150px !important;}}';
		}else if($apress_separator_type == 'fluid'){
			$style .= '.zolowave{ width:100%; position:absolute; left:0; bottom:-1px;}';
		}
	}
}
apcore_save_plugin_dyn_styles( $style );
$output .= '</div>';
//$output .= '</div>'.$this->endBlockComment('row');
$output .= $after_output;
echo $output;