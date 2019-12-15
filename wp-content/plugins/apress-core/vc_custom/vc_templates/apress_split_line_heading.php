<?php 
/*-----------------------------------------------------------------------------------*/
/* Split Line Heading
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

extract(shortcode_atts(array(
	'title_font_options'		=> '',
	'title_google_fonts'		=> '',
	'title_custom_fonts'		=> '',
	'color_scheme'				=> 'primary_color_scheme',
	'main_heading_color'		=> '',
	
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
),$atts));	

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$apcore_split_heading_element_id = 'apcore_split_heading_element_'.$uniqid;
	
if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_css = apcore_shortcodes_text_color_scheme($key);

$title_options = _zolo_parse_text_shortcode_params($title_font_options, 'zolo-content-title-big', $title_google_fonts, $title_custom_fonts);

$array = preg_split("/\r\n|\n|\r/", $content);
$heading_lines = array_filter($array);
$i = 1;
echo '<div id="'.$apcore_split_heading_element_id.'" class="apcore-split-heading '.$class.'">';			
foreach($heading_lines as $k => $v) {
	echo '<'.$title_options['tag'].' class="heading-line '.$animatedclass.'" data-animation = "'.$data_animation.'" data-delay = "'.($data_delay*$i).'" '.$title_options['style'].'>' . do_shortcode($v) . '</'.$title_options['tag'].'>';
	$i++;
}

echo '</div>';	

$custom_css = '';
if($color_scheme == 'design_your_own'){
	/*Design Your Won CSS Start*/
	$custom_css .= '#'.$apcore_split_heading_element_id.'.apcore-split-heading .heading-line{color:'.$main_heading_color.';}';	
	/*Design Your Won CSS End*/
}else{
	$custom_css .= '#'.$apcore_split_heading_element_id.'.apcore-split-heading .heading-line{ display:inline-block;'.$color_scheme_css.'}';	
} 
apcore_save_plugin_dyn_styles( $custom_css );
