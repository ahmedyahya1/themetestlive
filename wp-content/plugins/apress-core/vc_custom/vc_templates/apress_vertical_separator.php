<?php 
/*-----------------------------------------------------------------------------------*/
/* Vertical Separator
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

	extract( shortcode_atts( array(
		'vertical_separator_width'		=> '1',
		'vertical_separator_height'		=> '100',
		'vertical_separator_style'		=> 'solid',
		'vertical_separator_color'		=> '#cccccc',
		'vertical_separator_align'		=> 'left',				
		'class'							=> '',
		'data_animation'				=> 'No Animation',
		'data_delay'					=> '500'
	
	), $atts ) );
			
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}
			
$uniqid = uniqid(rand());
$apress_vertical_separator_id = 'apress_vertical_separator_element_'.$uniqid;

$output = '<div id="'.$apress_vertical_separator_id.'" class="vertical_separator '.$animatedclass.' '.$class.'" data-animation = "'.$data_animation.'" data-delay = "'.$data_delay.'" style="text-align:'.$vertical_separator_align.'"> <div style="border-left:'.$vertical_separator_width.'px '.$vertical_separator_style.' '.$vertical_separator_color.';height:'.$vertical_separator_height.'px;display:inline-block;"></div> </div>';
		
echo $output;
