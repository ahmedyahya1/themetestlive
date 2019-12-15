<?php
if ( ! defined( 'ABSPATH' ) ) {	die( '-1' );}

/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $image
 * @var $custom_src
 * @var $onclick
 * @var $img_size
 * @var $external_img_size
 * @var $caption
 * @var $img_link_large
 * @var $link
 * @var $img_link_target
 * @var $alignment
 * @var $el_class
 * @var $style
 * @var $border_color
 * @var $css
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Single_image
 */
$source = $image = $custom_src = $onclick = $img_size = $external_img_size = $caption = $img_link_large = $link = $img_link_target = $alignment = $el_class = $data_animation = $data_delay = $external_style = $style = $css = $max_width = $expanding_image_shadow = $border_radius = $animation_type = $clipping_animation_type = $clipping_color = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
				
$default_src = vc_asset_url( 'vc/no_image.png' );

// backward compatibility. since 4.6
if ( empty( $onclick ) && isset( $img_link_large ) && 'yes' === $img_link_large ) {
	$onclick = 'img_link_large';
} elseif ( empty( $atts['onclick'] ) && ( ! isset( $atts['img_link_large'] ) || 'yes' !== $atts['img_link_large'] ) ) {
	$onclick = 'custom_link';
}


//Animation
if($animation_type == 'clipping'){
	
	$animatedclass = 'animated clipping-hide apcore-clipping-animation';
	$data_animation_value = $clipping_animation_type;

}else{
	
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
		}
	$data_animation_value = $data_animation;	
}


$img = false;

switch ( $source ) {
	case 'media_library':
	case 'featured_image':		
			$img_id = preg_replace( '/[^\d]/', '', $image );
		

		// set rectangular
		if ( preg_match( '/_circle_2$/', $style ) ) {
			$style = preg_replace( '/_circle_2$/', '_circle', $style );
			$img_size = $this->getImageSquareSize( $img_id, $img_size );
		}

		if ( ! $img_size ) {
			$img_size = 'medium';
		}

		$img = wpb_getImageBySize( array(
			'attach_id' => $img_id,
			'thumb_size' => $img_size,
			'class' => 'vc_single_image-img',
		) );

		break;

	case 'external_link':
		$dimensions = vcExtractDimensions( $external_img_size );
		$hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

		$custom_src = $custom_src ? esc_attr( $custom_src ) : $default_src;

		$img = array(
			'thumbnail' => '<img class="vc_single_image-img" ' . $hwstring . ' src="' . $custom_src . '" />',
		);
		break;

	default:
		$img = false;
}

if ( ! $img ) {
	$img['thumbnail'] = '<img class="vc_img-placeholder vc_single_image-img" src="' . $default_src . '" />';
}

$el_class = $this->getExtraClass( $el_class );

// backward compatibility
if ( vc_has_class( 'prettyphoto', $el_class ) ) {
	$onclick = 'link_image';
}

// backward compatibility. will be removed in 4.7+
if ( ! empty( $atts['img_link'] ) ) {
	$link = $atts['img_link'];
	if ( ! preg_match( '/^(https?\:\/\/|\/\/)/', $link ) ) {
		$link = 'http://' . $link;
	}
}

// backward compatibility
if ( in_array( $link, array( 'none', 'link_no' ) ) ) {
	$link = '';
}

$a_attrs = array();

switch ( $onclick ) {
	case 'img_link_large':

		if ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'link_image':
		
		$a_attrs['class'] = 'prettyphoto';
		$a_attrs['data-rel'] = 'prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']';

		// backward compatibility
		if ( vc_has_class( 'prettyphoto', $el_class ) ) {
			// $link is already defined
		} elseif ( 'external_link' === $source ) {
			$link = $custom_src;
		} else {
			$link = wp_get_attachment_image_src( $img_id, 'large' );
			$link = $link[0];
		}

		break;

	case 'custom_link':
		// $link is already defined
		break;
}

$wrapperClass = 'apress_expanding_image';

$uniqid = uniqid(rand());
$expanding_image_id = 'apress_expanding_image_id_'.$uniqid;

if ( $link ) {
	$a_attrs['href'] = $link;
	$a_attrs['target'] = $img_link_target;
	if ( ! empty( $a_attrs['class'] ) ) {
		$wrapperClass .= ' ' . $a_attrs['class'];
		unset( $a_attrs['class'] );
	}
	$html = '<a ' . vc_stringify_attributes( $a_attrs ) . ' class="' . $wrapperClass . '">' . $img['thumbnail'] . '</a>';
} else {
	$html = '<div class="' . $wrapperClass . '">' . $img['thumbnail'] . '</div>';
}

$class_to_filter = 'expanding_image_wrapper '. $alignment. ' ' . $animatedclass ;
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$output = '
	<div id="'.$expanding_image_id.'" class="' . esc_attr( trim( $css_class ) ). '" data-animation ="'.$data_animation_value.'" data-delay ="'.$data_delay.'" data-max-width ="'.$max_width.'">
			' . $html . '
	</div>
';

echo $output;

// CSS
$shortcode_css = '';
$shortcode_css .='#'.$expanding_image_id.' .apcore-clipping-overlay{ background:'.$clipping_color.'}';
if(substr_count($expanding_image_shadow, 'disable') == 0) {
	$expanding_image_shadow = Zolo_Box_Shadow_Param::box_shadow_css($expanding_image_shadow);
	$shortcode_css .= '#'.$expanding_image_id.'.expanding_image_wrapper .apress_expanding_image{'.$expanding_image_shadow.'}';
}
$shortcode_css .= '#'.$expanding_image_id.'.expanding_image_wrapper .apress_expanding_image,
#'.$expanding_image_id.'.expanding_image_wrapper .apress_expanding_image img{border-radius:'.$border_radius.'px;}';

apcore_save_plugin_dyn_styles( $shortcode_css ); 