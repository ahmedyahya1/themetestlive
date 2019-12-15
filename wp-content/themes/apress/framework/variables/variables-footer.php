<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $apress_data;
$cur_id = apress_theme_current_page_id();
  
// Changes made 12thDec18
$display_footer_to = isset($apress_data["display_footer"]) ? $apress_data["display_footer"] : 'off';
$footer_builder_to = isset($apress_data["footer_builder"]) ? $apress_data["footer_builder"] : 'widgets';
$footer_builder_page_id_to = (!empty($apress_data["footer_builder_template"])) ? $apress_data["footer_builder_template"] : '';

$main_footer_widgets = isset($apress_data["footer_widgets"]) ? $apress_data["footer_widgets"] : 'off';
$upper_footer_widgets = isset($apress_data["upper_footer_widgets"]) ? $apress_data["upper_footer_widgets"] : 'off';
$lower_footer_widgets = isset($apress_data["lower_footer_widgets"]) ? $apress_data["lower_footer_widgets"] : 'off';

$footer_layout_columns = isset($apress_data['footer_layout_columns']) ? $apress_data['footer_layout_columns'] : 'layout1';
$footer_upper_columns = isset($apress_data['footer_upper_columns']) ? $apress_data['footer_upper_columns'] : '0';
$footer_lower_columns = isset($apress_data['footer_lower_columns']) ? $apress_data['footer_lower_columns'] : '0';

$display_footer_po = get_post_meta( $cur_id, 'zt_display_footer', true ); 
$footer_builder_po = get_post_meta( $cur_id, 'zt_footer_builder', true ); 
$footer_builder_page_id_po = get_post_meta( $cur_id, 'zt_footer_builder_template', true ); 


$footer_layout_style_po = get_post_meta( $cur_id, 'zt_footer_layout_style', true ); 
$footer_layout_style_to = isset($apress_data["footer_layout_style"]) ? $apress_data["footer_layout_style"] : 'footer_default';

if($footer_layout_style_po == 'default' || $footer_layout_style_po == ''){
	 $footer_layout_style = $footer_layout_style_to;		
 }else if($footer_layout_style_po == 'footer_fixed' || $footer_layout_style_po == 'footer_parallax'){
	 $footer_layout_style = $footer_layout_style_po;	
	 }else{
		  $footer_layout_style = $footer_layout_style_to;
		 }


$back_to_top = isset($apress_data["back_to_top"]) ? $apress_data["back_to_top"] : 'default_backtotop';


$footer_copyright = isset($apress_data["footer_copyright"]) ? $apress_data["footer_copyright"] : 'on';
$footer_social_icon = isset($apress_data["footer_social_icon"]) ? $apress_data["footer_social_icon"] : 'off';
$copyright_text = isset($apress_data["copyright_text"]) ? $apress_data["copyright_text"] : esc_html__('Copyright 2018 Apress','apress');
$back_to_top_style = isset($apress_data["back_to_top_style"]) ? $apress_data["back_to_top_style"] : 'backtotop_style_none';
$copyright_social_align = isset($apress_data["copyright_social_align"]) ? $apress_data["copyright_social_align"] : 'default';

$display_copyright = get_post_meta( $cur_id, 'zt_display_copyright', true ); 


// Footer Show and hide
if($display_footer_po == 'default' || $display_footer_po == ''){
	
		$footer_show_hide = $display_footer_to == 'on' ? 'show' : 'hide';	
		$footer_builder_type = $footer_builder_to;
		$footer_builder_page_id = $footer_builder_page_id_to;
			
	}else if($display_footer_po == 'on'  || $display_footer_po == 'off'){
			
		$footer_show_hide = $display_footer_po == 'on' ? 'show' : 'hide';	
		$footer_builder_type = $footer_builder_po;
		$footer_builder_page_id = $footer_builder_page_id_po;
			
		} else {
			
			$footer_show_hide = $display_footer_to == 'on' ? 'show' : 'hide';	
			$footer_builder_type = $footer_builder_to;
			$footer_builder_page_id = $footer_builder_page_id_to;
			}


// Footer Show and hide
/*if($display_footer == 'default' || $display_footer == ''){
	 $footer_show_hide = $footer_widgets == 'on' ? 'show' : 'hide';		
 }else if($display_footer == 'yes' || $display_footer == 'no'){
	 $footer_show_hide = ($display_footer == 'yes') ? 'show' : 'hide';		
	 }else{
		  $footer_show_hide = $footer_widgets == 'on' ? 'show' : 'hide';
		 }
		 
		 */
			 
// Copyright Section Show and hide
if($display_copyright == 'default' || $display_copyright == ''){
	 $copyright_show_hide = $footer_copyright == 'on' ? 'show' : 'hide';		
 }else if($display_copyright == 'yes' || $display_copyright == 'no'){
	 $copyright_show_hide = ($display_copyright == 'yes') ? 'show' : 'hide';		
	 }else{
		  $copyright_show_hide = $footer_copyright == 'on' ? 'show' : 'hide';
		 }

if($footer_layout_columns == 'layout1'){	
	$layout_columns_class = 'footer_layout_columns_4';
}else if($footer_layout_columns == 'layout2' || $footer_layout_columns == 'layout3' || $footer_layout_columns == 'layout4' || $footer_layout_columns == 'layout5'){		
	$layout_columns_class = 'footer_layout_columns_3';
}else if($footer_layout_columns == 'layout6' || $footer_layout_columns == 'layout7' || $footer_layout_columns == 'layout8'){		
	$layout_columns_class = 'footer_layout_columns_2';
}else if($footer_layout_columns == 'layout9'){		
	$layout_columns_class = 'footer_layout_columns_1';
}

$copyright_border_style_width = isset($apress_data["copyright_border_style_width"]) ? $apress_data["copyright_border_style_width"] : 'border_style_full_width';

if(esc_attr($footer_layout_style) == 'footer_parallax'){ 
	$footer_bg_image = esc_url($apress_data["footer_bg_image"]["background-image"]); 
}else{
	$footer_bg_image = '';
}
