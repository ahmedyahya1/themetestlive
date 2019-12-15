<?php 
/*-----------------------------------------------------------------------------------*/
/* Photo Gallery
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'images'					=> '',
	'images_size'				=> 'full',
	'photo_gallery_type'		=> 'image_grid',
	'number_items_per_row'		=> 'four',
	'image_justify_row_height'	=> '150',
	'image_justify_lastrow'		=> 'nojustify',
	'image_gutter'				=> '10',
	'use_lightbox'				=> 'no',
	'color_scheme'				=> 'primary_color_scheme',
	'hover_effects'				=> 'fade_effect',
	'overlay_color'				=> 'rgba(0,0,0,0.1)',
	'overlay_color_h'			=> 'rgba(0,0,0,0.3)',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '100',
), $atts ) );
			
//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

global $apress_data;


$uniqid = uniqid(rand());
$zolo_photo_gallery_id = 'number_items_per_row'.$uniqid;
$number_items_per_row = 'zolo_photo_gallery_col_'.$number_items_per_row;
	

if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_background_css = apcore_shortcodes_background_color_scheme($key);


//Layout Style
if($photo_gallery_type == 'image_grid'){
	$tag_name			= 'ul';
	$child_tag_name		= 'li';
	$layoutstyle_class	= 'photo_gallery_layout_grid';
	$layout_class		= 'grid-item';
	$layoutmode			= 'fitRows';
	$images_size		= $images_size;
	$image_space		= $image_gutter;
	$layout_wrap_class	= 'photo_layout_wrap';
	
}else if($photo_gallery_type == 'image_masonry'){
	$tag_name			= 'ul';
	$child_tag_name		= 'li';
	$layoutstyle_class	= 'photo_gallery_layout_masonry';
	$layout_class		= 'masonry-item';
	$layoutmode			= 'masonry';
	$images_size		= 'full';
	$image_space		= $image_gutter;
	$layout_wrap_class	= 'photo_layout_wrap';
	
}else if($photo_gallery_type == 'image_justify'){
	$tag_name			= 'ul';
	$child_tag_name		= 'li';
	$layoutstyle_class	= 'photo_gallery_layout_justify';
	$layout_class		= '';
	$layoutmode			= '';
	$images_size		= 'full';
	$image_space		= '';
	$layout_wrap_class	= 'layout_justify_wrap';
}

if($photo_gallery_type == 'image_justify'){		
	// settings
	$options_array = array(
		'data-class'				=> '#'.$zolo_photo_gallery_id.' .'.$layoutstyle_class,
		'data-rowheight'			=> $image_justify_row_height,
		'data-lastrow'				=> $image_justify_lastrow,
		'data-margins'				=> $image_gutter,	
	);

}else{	
	// settings
	$options_array = array(
		'data-class'				=> '#'.$zolo_photo_gallery_id.' .'.$layoutstyle_class,
		'data-layoutmode'			=> $layoutmode,
		'data-itemselector'			=> $layout_class,
	);
}


global $apress_data;
$lightbox_style = isset($apress_data["lightbox_style"]) ? $apress_data["lightbox_style"] : 'lightbox-none';		

$default_src = vc_asset_url( 'vc/no_image.png' );
$gallery_images = '';
$images = explode( ',', $images );
$j = 1;
foreach ( $images as $i => $image ) {
	
	if ( $image > 0 ) {
		$img = wpb_getImageBySize( array(
			'attach_id' => $image,
			'thumb_size' => $images_size,			
		) );
		
		$image_attributes = wp_get_attachment_image_src( $image, 'full' );		
		
		$large_img_src = $image_attributes[0];
		$large_img_src_width = $image_attributes[1];
		$large_img_src_height = $image_attributes[2];
		
		$thumbnail = $img['thumbnail'];
		//$large_img_src = $img['p_img_large'][0];
		//$large_img_src_width = $img['p_img_large'][1];
		//$large_img_src_height = $img['p_img_large'][2];
		
		
	} else {
		$large_img_src = $default_src;
		$thumbnail = '<img src="' . $default_src . '"/>';
	}
	
	if($data_delay <= 200){
		$data_delay_new = $j*$data_delay; 
	}else{ 
		$data_delay_new = $data_delay; 
	}
	
	if($use_lightbox == 'no'){
		$link_start = '<span class="gallery_thumb">';
		$link_end = '</span>';
	}else{
		$link_start = '<a class="gallery_thumb" href="' . $large_img_src . '" data-size="'.$large_img_src_width.'x'.$large_img_src_height.'">';
		$link_end = '</a>';
	}
	if($photo_gallery_type == 'image_justify'){
	 $gallery_images .= '<'.$child_tag_name.' class="'.$layout_class.'">'.$link_start . $thumbnail . $link_end.'</'.$child_tag_name.'>';
	}else{
		$gallery_images .= '<'.$child_tag_name.' class="'.$layout_class.' '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay_new.'">'.$link_start . $thumbnail . $link_end.'</'.$child_tag_name.'>';
		}
$j++;
}

$output = '<div id="'.$zolo_photo_gallery_id.'" class="'.$layout_wrap_class.' zolo_photo_gallery '.$color_scheme.' '.$class.' appear_from_bottom" '.array_to_data( $options_array ).'>';

$output .= '<'.$tag_name.' class="gallery_holder '.$lightbox_style.' '.$hover_effects.' '.$number_items_per_row.' '.$layoutstyle_class.'">'.$gallery_images.'</'.$tag_name.'>';


$output .= '</div>';

echo $output; 
// CSS
$custom_css = '';
$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery{ width:100%; float:left;}';
$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery ul.gallery_holder{ margin:-'.$image_space.'px;}';
$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery ul.gallery_holder li{padding:'.$image_space.'px;}';
if($color_scheme== 'design_your_own'){

	$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery ul.gallery_holder li .gallery_thumb:after{background:'.$overlay_color.'; visibility:visible; opacity:1;}';
	$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery ul.gallery_holder li .gallery_thumb:hover:after{background:'.$overlay_color_h.'}';

}else{

	$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery ul.gallery_holder li .gallery_thumb:after{'.$color_scheme_background_css.'}';
	$custom_css .= '#'.$zolo_photo_gallery_id.'.zolo_photo_gallery ul.gallery_holder li .gallery_thumb:hover:after{opacity: 0.7;}';

}
apcore_save_plugin_dyn_styles( $custom_css );