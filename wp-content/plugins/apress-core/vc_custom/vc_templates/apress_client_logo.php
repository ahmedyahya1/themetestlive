<?php 
/*-----------------------------------------------------------------------------------*/
/* Client Logo
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'style'							=> 'client_logo_style1',
	'images'						=> '',
	'img_size' 						=> 'full',
    'desktop_no_of_items' 			=> '6',
    'small_desktop_no_of_items' 	=> '3',
    'tablet_no_of_items'			=> '2',
	'slider_gutter' 				=> '10',
	'slider_gutter2' 				=> '10',
	'border_width' 					=> '1',
	'border_color' 					=> '#cccccc',
	'logo_hover_style' 				=> 'black_white_color',
	'opacity' 						=> '0.1',
	'hover_opacity' 				=> '1.0',
	'slick_focusonselect'			=> 'no',
    'slick_autoplay' 				=> 'no',
    'slick_autoplay_duration'		=> '2000',
	'slick_hide_arrow_navigation' 	=> 'no',
	'arrows_style'					=> 'arrows_style1',
	'arrows_color'					=> '#ffffff',
	'arrows_bg'						=> '#549ffc',
	'slick_bullet_navigation' 		=> 'no',
    'bullet_navigation_style' 		=> '',
	'bullet_bg'						=> '#000000',
	'class'							=> '',
	'data_animation'				=> 'No Animation',
	'data_delay'					=> '500',
), $atts ) );

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());

$zolo_client_logo_id = 'client_logo_'.$uniqid;
	

$slick_hide_arrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
$slick_bullet_navigation = ($slick_bullet_navigation == 'yes')? 'true' : 'false';

$slidesToShow_desktop_no_of_items = 'slidesToShow: '.$desktop_no_of_items.',';
$slidesToShow_small_desktop_no_of_items = 'slidesToShow: '.$small_desktop_no_of_items.',';
$slidesToShow_tablet_no_of_items = 'slidesToShow: '.$tablet_no_of_items.',';

$slick_focusonselect = ($slick_focusonselect == 'yes')? 'true' : 'false';
$slick_autoplay = ($slick_autoplay == 'yes')? 'true' : 'false';


if($slick_bullet_navigation != 'false'){$wrap_class[] = 'slick_bullet_active';}
$wrap_class[] = $bullet_navigation_style;
$wrap_class[] = $arrows_style;
$wrap_class[] = 'zolo_image_slider';

$wrap_class[] = $logo_hover_style;
$wrap_class[] = $style;
$wrap_class = implode( ' ', $wrap_class );

// settings
$options_array = array(
	'class'						=> 'zolo_slick_slider zolo_client_logo '.$wrap_class.' '.$class.' '.$animatedclass,

	'data-dots'					=> $slick_bullet_navigation,
	'data-infinite'				=> true,
	'data-speed'				=> 900,
	'data-desktop-show'			=> $desktop_no_of_items,
	'data-small-desktop-show'	=> $small_desktop_no_of_items,
	'data-tablet-show'			=> $tablet_no_of_items,
	'data-slidestoscroll'		=> 1,

	'data-autoplay'				=> $slick_autoplay,
	'data-autoplay-speed'		=> $slick_autoplay_duration,
	'data-arrows'				=> $slick_hide_arrow_navigation,
	'data-focusonselect'		=> $slick_focusonselect,
	
	'data-animation'			=> $data_animation,
	'data-delay'				=> $data_delay,
	
);
	

$default_src = vc_asset_url( 'vc/no_image.png' );
$gallery_images = '';
$images = explode( ',', $images );

foreach ( $images as $i => $image ) {
	
	if ( $image > 0 ) {
		$img = wpb_getImageBySize( array(
			'attach_id' => $image,
			'thumb_size' => $img_size,
		) );
		$thumbnail = $img['thumbnail'];
	}
	$gallery_images .= '<li><div>'. $thumbnail .'</div></li>';
}



$output = '<div id="'.$zolo_client_logo_id.'" '.array_to_data( $options_array ).'>';
$output .= '<ul class="zolo_slick_slider_holder client_logo_holder">'.$gallery_images.'</ul>';
$output .= '</div>';
echo $output;

// CSS
$shortcode_css = '';

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo{ width:100%; float:left;}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li img{ opacity:'.$opacity.';}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li:hover img{ opacity:'.$hover_opacity.';}';

if($style == 'client_logo_style1'){

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo .slick-arrow{ color:'.$arrows_color.'}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo .slick-arrow:after{ background:'.$arrows_color.'}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo.arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo.arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo .slick-arrow{ background:'.$arrows_bg.'}';
}

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo ul.client_logo_holder li.slick-slide{ padding:0 '.$slider_gutter.'px;}';

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo{ overflow:hidden;}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo ul{margin:0 '.'-'.$slider_gutter.'px;}';

$arrow_position = $slider_gutter + 46;
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo .slick-arrow{ left:'.$arrow_position.'px}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo .slick-arrow.slick-next{ right:'.$arrow_position.'px; left: auto;}';

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.';}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo ul.slick-dots li button::after{box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo.dots_style3 ul.slick-dots li button::after{ background:'.$bullet_bg.';}';

}else if($style == 'client_logo_style2'){
	
$desktop_no_ofitems = 100/$desktop_no_of_items;
$small_desktop_no_ofitems = 100/$small_desktop_no_of_items;
$tablet_no_ofitems = 100/$tablet_no_of_items;

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo ul{ margin:0 -'.$slider_gutter.'px;}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li{ width:'.$desktop_no_ofitems.'%;padding:'.$slider_gutter2.'px '.$slider_gutter.'px;}';

$shortcode_css .= '@media (max-width:1050px) {';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li{ width:'.$small_desktop_no_ofitems.'%;}';
$shortcode_css .= '}';

$shortcode_css .= '@media (max-width:800px) {';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li{ width:'.$tablet_no_ofitems.'%;}';
$shortcode_css .= '}';

}else if($style == 'client_logo_style3'){
	
$desktop_no_ofitems = 100/$desktop_no_of_items;
$small_desktop_no_ofitems = 100/$small_desktop_no_of_items;
$tablet_no_ofitems = 100/$tablet_no_of_items;

$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo ul{border:'.$border_width.'px solid '.$border_color.'; border-bottom:0px;border-right:0px; float:left;}';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li{ width:'.$desktop_no_ofitems.'%;padding:'.$slider_gutter2.'px '.$slider_gutter.'px;border:'.$border_width.'px solid '.$border_color.'; border-top:0px;border-left:0px;}';

$shortcode_css .= '@media (max-width:1050px) {';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li{ width:'.$small_desktop_no_ofitems.'%;}';
	
$shortcode_css .= '}';
$shortcode_css .= '@media (max-width:800px) {';
$shortcode_css .= '#'.$zolo_client_logo_id.'.zolo_client_logo li{ width:'.$tablet_no_ofitems.'%;}';
	
$shortcode_css .= '}';
}
apcore_save_plugin_dyn_styles( $shortcode_css );


