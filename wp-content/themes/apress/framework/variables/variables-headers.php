<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $apress_data;

//Header Sticky Code Start
$header_sticky_opt = isset($apress_data["header_sticky_opt"]) ? $apress_data["header_sticky_opt"] : 'on';
$mobile_header_multilingual = isset($apress_data["mobile_header_multilingual"]) ? $apress_data["mobile_header_multilingual"] : 'on';

$header_sticky_display = isset($apress_data["header_sticky_display"]) ? $apress_data["header_sticky_display"] : 'section2';
$top_search_design = isset($apress_data["search_design"]) ? $apress_data["search_design"] : 'full_screen_search_but';

$zolo_header_sticky = $header_sticky_opt ? 'zolo_header_sticky' : '';

if($header_sticky_opt == 'on'){
	if($header_sticky_display == 'section2' || $header_sticky_display == 'section3' || $header_sticky_display == 'section2_3'){
		$header_sticky_wrapper_start = '<div class="sticky_header_wrapper"><div class="sticky_header fadeInDown">';
		$header_sticky_wrapper_end = '</div></div>';
	}else{
		$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
		}
}else{
	$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
	}
//Header Sticky Code End
// Mobile Header
$mobile_menu_design = isset($apress_data["mobile_menu_design"]) ? $apress_data["mobile_menu_design"] : 'compact';
$mobile_header_sticky_show_hide = isset($apress_data["mobile_header_sticky_show_hide"]) ? $apress_data["mobile_header_sticky_show_hide"] : 'off';
$mobile_header_top_bar_show_hide = isset($apress_data["mobile_header_top_bar_show_hide"]) ? $apress_data["mobile_header_top_bar_show_hide"] : 'off';
$mobile_header_logo_showhide = isset($apress_data["mobile_header_logo_showhide"]) ? $apress_data["mobile_header_logo_showhide"] : 'off';
$logo_url = isset($apress_data['logo']['url']) ? $apress_data['logo']['url'] :'';


$header_phone_number = isset($apress_data['header_phone_number']) ? $apress_data['header_phone_number'] : '+1.208.567.1234';
$header_fax_number = isset($apress_data['header_fax_number']) ? $apress_data['header_fax_number'] : '+44-208-1234567';
$header_email = isset($apress_data['header_email']) ? $apress_data['header_email'] : 'admin@yoursite.com';
$header_tagline = isset($apress_data['header_tagline']) ? $apress_data['header_tagline'] : 'Insert Tagline Here';

$mobile_special_button_show_hide = isset($apress_data["mobile_special_button_show_hide"]) ? $apress_data["mobile_special_button_show_hide"] : 'off';
$mobile_special_button2_show_hide = isset($apress_data["mobile_special_button2_show_hide"]) ? $apress_data["mobile_special_button2_show_hide"] : 'off';

$mobile_header_button_color_scheme = isset($apress_data["mobile_header_special_button_color_scheme"]) ? $apress_data["mobile_header_special_button_color_scheme"] : 'default';
$mobile_header_button2_color_scheme = isset($apress_data["mobile_header_special_button2_color_scheme"]) ? $apress_data["mobile_header_special_button2_color_scheme"] : 'default';

$section2_border_style_width = isset($apress_data["section2_border_style_width"]) ? $apress_data["section2_border_style_width"] : 'border_style_full_width';

$multilingual_code = isset($apress_data["multilingual_code"]) ? $apress_data["multilingual_code"] : '';