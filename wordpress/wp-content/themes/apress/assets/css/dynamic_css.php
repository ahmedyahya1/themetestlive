<?php
global $apress_data;	
$cur_id = apress_theme_current_page_id();		
$output = '';

function dynamic_css_parser(){
	$final_css = '';
	return apply_filters( 'apcore_dynamic_css', $final_css );
} 
$output = dynamic_css_parser();

if(is_singular( 'zt_portfolio' )){
$posttype = 'portfolio';
}else{
$posttype = 'post';
}

$p_title_align = get_post_meta( $cur_id, 'zt_titlebar_text_alignment', true );
$t_title_align = isset($apress_data["page_title_alignment"]) ? $apress_data["page_title_alignment"] : 'left' ;


if ( is_front_page() && is_home() ) {
	$titlebar_text_alignment = $t_title_align;
} else {
	if($p_title_align == 'Default' || $p_title_align == ''){
		$titlebar_text_alignment = $t_title_align;
	}else{
		$titlebar_text_alignment = $p_title_align;
	}
}

$apress_theme_button_background_color_scheme = apress_theme_button_background_color_scheme();
$apress_theme_primary_background_color = apress_theme_primary_background_color();
$apress_theme_primary_text_color = apress_theme_primary_text_color();
$apress_theme_primary_border_color = apress_theme_primary_border_color();
$apress_theme_link_text_color = apress_theme_link_text_color();
$apress_theme_link_border_color = apress_theme_link_border_color();

$apress_theme_sticky_header_hover_color = apress_theme_sticky_header_hover_color();
$apress_theme_main_menu_hover_color = apress_theme_main_menu_hover_color();
$apress_theme_submenu_hover_color = apress_theme_submenu_hover_color();
$apress_theme_preloader_bg_color = apress_theme_preloader_bg_color();

$apress_theme_header_top_bg_color = apress_theme_header_top_bg_color();
$apress_theme_section2_header_bg_color = apress_theme_section2_header_bg_color();
$apress_theme_section3_header_bg_color = apress_theme_section3_header_bg_color();
$apress_theme_sticky_header_bg_color = apress_theme_sticky_header_bg_color();
$apress_theme_mobile_header_bg_color = apress_theme_mobile_header_bg_color();


$button_text_color = isset($apress_data['button_text_color']) ? $apress_data['button_text_color'] : '#ffffff';


$site_width = isset($apress_data['site_width']['width']) ? $apress_data['site_width']['width'] : '1280px';
$sitelayout_padding_top = isset($apress_data["sitelayout_padding"]["padding-top"]) ? $apress_data["sitelayout_padding"]["padding-top"] :'0px';
$sitelayout_padding_bottom = isset($apress_data["sitelayout_padding"]["padding-bottom"]) ? $apress_data["sitelayout_padding"]["padding-bottom"] :'0px';

$top_bar_l_height = isset($apress_data["top_bar_lh"]["height"]) ? $apress_data["top_bar_lh"]["height"] : '40px';
$section_2_height = isset($apress_data["section_2_height"]["height"]) ? $apress_data["section_2_height"]["height"] : '94px';
$section_3_height = isset($apress_data["section_3_height"]["height"]) ? $apress_data["section_3_height"]["height"] : '54px';

$column_1_value_padding_top = isset($apress_data["column_1_value"]["padding-top"]) ? $apress_data["column_1_value"]["padding-top"] : '50%';
$column_1_value_padding_right = isset($apress_data["column_1_value"]["padding-right"]) ? $apress_data["column_1_value"]["padding-right"] : '0%';
$column_1_value_padding_bottom = isset($apress_data["column_1_value"]["padding-bottom"]) ? $apress_data["column_1_value"]["padding-bottom"] : '50%';

$column_2_value_padding_top = isset($apress_data["column_2_value"]["padding-top"]) ? $apress_data["column_2_value"]["padding-top"] : '30%';
$column_2_value_padding_right = isset($apress_data["column_2_value"]["padding-right"]) ? $apress_data["column_2_value"]["padding-right"] : '40%';
$column_2_value_padding_bottom = isset($apress_data["column_2_value"]["padding-bottom"]) ? $apress_data["column_2_value"]["padding-bottom"] : '30%';

$column_3_value_padding_top = isset($apress_data["column_3_value"]["padding-top"]) ? $apress_data["column_3_value"]["padding-top"] : '15%';
$column_3_value_padding_right = isset($apress_data["column_3_value"]["padding-right"]) ? $apress_data["column_3_value"]["padding-right"] : '70%';
$column_3_value_padding_bottom = isset($apress_data["column_3_value"]["padding-bottom"]) ? $apress_data["column_3_value"]["padding-bottom"] : '15%';

$page_header_bg_img = get_post_meta( $cur_id, 'zt_header_bg_img', true ); 
$page_header_bg_color = get_post_meta( $cur_id, 'zt_header_bg_color', true ); 

$header_background_img_background_color = isset($apress_data['header_background_img']['background-color']) ? $apress_data['header_background_img']['background-color'] : '#ffffff';
$vertical_header_shadow = isset($apress_data['vertical_header_shadow']) ? $apress_data['vertical_header_shadow'] : 'on';

$header_border_color = isset($apress_data["header_border_color"]) ? $apress_data["header_border_color"] : '#e5e5e5';
$header_border_style = isset($apress_data["header_border"]["border-style"]) ? $apress_data["header_border"]["border-style"] : 'solid';
$header_border_top = isset($apress_data["header_border"]["border-top"]) ? $apress_data["header_border"]["border-top"] : '0px';
$header_border_right = isset($apress_data["header_border"]["border-right"]) ? $apress_data["header_border"]["border-right"] : '0px';
$header_border_bottom = isset($apress_data["header_border"]["border-bottom"]) ? $apress_data["header_border"]["border-bottom"] : '0px';
$header_border_left = isset($apress_data["header_border"]["border-left"]) ? $apress_data["header_border"]["border-left"] : '0px';

$searchbox_position = isset($apress_data['searchbox_position']) ? $apress_data['searchbox_position'] : '54';
$section2_font_color_regular = isset($apress_data["section2_font_color"]["regular"]) ? $apress_data["section2_font_color"]["regular"] : '#555555';
$section2_font_color_hover = isset($apress_data["section2_font_color"]["hover"]) ? $apress_data["section2_font_color"]["hover"] : '#999999';
$section2_font_size = isset($apress_data['section2_font_size']) ? $apress_data['section2_font_size'] : '16';
$section2_line_height = isset($apress_data['section2_line_height']) ? $apress_data['section2_line_height'] : '26';
$section3_font_color_regular = isset($apress_data["section3_font_color"]["regular"]) ? $apress_data["section3_font_color"]["regular"] : '';
$section3_font_color_hover = isset($apress_data["section3_font_color"]["hover"]) ? $apress_data["section3_font_color"]["hover"] : '';
$section3_font_size = isset($apress_data['section3_font_size']) ? $apress_data['section3_font_size'] : '16';
$section3_line_height = isset($apress_data['section3_line_height']) ? $apress_data['section3_line_height'] : '26';
$vertical_hd_font_color_regular = isset($apress_data["vertical_hd_font_color"]["regular"]) ? $apress_data["vertical_hd_font_color"]["regular"] : '#555555';
$vertical_hd_font_color_hover = isset($apress_data["vertical_hd_font_color"]["hover"]) ? $apress_data["vertical_hd_font_color"]["hover"] : '#999999';
$vertical_hd_font_size = isset($apress_data['vertical_hd_font_size']) ? $apress_data['vertical_hd_font_size'] : '16';
$vertical_hd_line_height = isset($apress_data['vertical_hd_line_height']) ? $apress_data['vertical_hd_line_height'] : '26';

$section1_element_separator = isset($apress_data["section1_element_separator"]) ? $apress_data["section1_element_separator"] : 'no_separator'; 
$section2_element_separator = isset($apress_data["section2_element_separator"]) ? $apress_data["section2_element_separator"] : 'no_separator'; 
$section3_element_separator = isset($apress_data["section3_element_separator"]) ? $apress_data["section3_element_separator"] : 'no_separator';

$section1_element_space = isset($apress_data["section1_element_space"]) ? $apress_data["section1_element_space"] : '30';
$section2_element_space = isset($apress_data["section2_element_space"]) ? $apress_data["section2_element_space"] : '40';
$section3_element_space = isset($apress_data["section3_element_space"]) ? $apress_data["section3_element_space"] : '40';

$section1_element_separator_color = isset($apress_data["section1_element_separator_color"]) ? $apress_data["section1_element_separator_color"] : '#e5e5e5';
$section2_element_separator_color = isset($apress_data["section2_element_separator_color"]) ? $apress_data["section2_element_separator_color"] : '#e5e5e5';
$section3_element_separator_color = isset($apress_data["section3_element_separator_color"]) ? $apress_data["section3_element_separator_color"] : '#e5e5e5';

$menu_separator = isset($apress_data["menu_separator"]) ? $apress_data["menu_separator"] : 'no_separator';
$menu_separator_color = isset($apress_data["menu_separator_color"]) ? $apress_data["menu_separator_color"] : '#e5e5e5';

$header_social_separator = isset($apress_data["header_social_separator"]) ? $apress_data["header_social_separator"] : 'no_separator';
$header_social_separator_color = isset($apress_data["header_social_separator_color"]) ? $apress_data["header_social_separator_color"] : '#e5e5e5';

$element_separator = isset($apress_data["element_separator"]) ? $apress_data["element_separator"] : 'no_separator';
$element_separator_color = isset($apress_data["element_separator_color"]) ? $apress_data["element_separator_color"] : '#e5e5e5';
$primary_color = isset($apress_data['primary_color']) ? $apress_data['primary_color'] : '#f82eb3';

$header_top_border_color = isset($apress_data["header_top_border_color"]) ? $apress_data["header_top_border_color"] : '#eeeeee';
$header_top_border_style = isset($apress_data["header_top_border"]["border-style"]) ? $apress_data["header_top_border"]["border-style"] : 'solid';
$header_top_border_top = isset($apress_data["header_top_border"]["border-top"]) ? $apress_data["header_top_border"]["border-top"] : '0px';
$header_top_border_right = isset($apress_data["header_top_border"]["border-right"]) ? $apress_data["header_top_border"]["border-right"] : '0px';
$header_top_border_bottom = isset($apress_data["header_top_border"]["border-bottom"]) ? $apress_data["header_top_border"]["border-bottom"] : '1px';
$header_top_border_left = isset($apress_data["header_top_border"]["border-left"]) ? $apress_data["header_top_border"]["border-left"] : '0px';
$top_bar_font_color_regular = isset($apress_data["top_bar_font_color"]["regular"]) ? $apress_data["top_bar_font_color"]["regular"] : '#555555';
$top_bar_font_color_hover = isset($apress_data["top_bar_font_color"]["hover"]) ? $apress_data["top_bar_font_color"]["hover"] : '#999999';
$header_top_menu_sub_sep_color = isset($apress_data["header_top_menu_sub_sep_color"]) ? $apress_data["header_top_menu_sub_sep_color"] : '#e5e5e5';
$topbar_font_size = isset($apress_data["topbar_font_size"]) ? $apress_data["topbar_font_size"] : '13';
$header_social_links_icon_color_regular = isset($apress_data["header_social_links_icon_color"]["regular"]) ? $apress_data["header_social_links_icon_color"]["regular"] : '#555555';
$header_social_links_icon_color_hover = isset($apress_data["header_social_links_icon_color"]["hover"]) ? $apress_data["header_social_links_icon_color"]["hover"] : '#999999';
$header_social_icon_width = isset($apress_data["header_social_icon_width"]) ? $apress_data["header_social_icon_width"] : '34';
$header_social_links_box_color = isset($apress_data["header_social_links_box_color"]) ? $apress_data["header_social_links_box_color"] : 'rgba(54,56,57,0)';
$header_social_box_border_color = isset($apress_data["header_social_box_border_color"]) ? $apress_data["header_social_box_border_color"] : '#363839';
$header_social_links_boxed_radius = isset($apress_data["header_social_links_boxed_radius"]) ? $apress_data["header_social_links_boxed_radius"] : '4';
$header_social_boxed_padding_top = isset($apress_data["header_social_boxed_padding"]["padding-top"]) ? $apress_data["header_social_boxed_padding"]["padding-top"] : '8px';
$header_social_boxed_padding_bottom = isset($apress_data["header_social_boxed_padding"]["padding-bottom"]) ? $apress_data["header_social_boxed_padding"]["padding-bottom"] : '8px';
$header_social_font_size = isset($apress_data["header_social_font_size"]) ? $apress_data["header_social_font_size"] : '14';
$header_social_boxed_margin_padding_left = isset($apress_data["header_social_boxed_margin"]["padding-left"]) ? $apress_data["header_social_boxed_margin"]["padding-left"] : '12px';
$header_social_boxed_margin_padding_right = isset($apress_data["header_social_boxed_margin"]["padding-right"]) ? $apress_data["header_social_boxed_margin"]["padding-right"] : '12px';
$topmenu_dropwdown_width = isset($apress_data["topmenu_dropwdown_width"]["width"]) ? $apress_data["topmenu_dropwdown_width"]["width"] : '160px';
$header_top_sub_bg_color_regular = isset($apress_data["header_top_sub_bg_color"]["regular"]) ? $apress_data["header_top_sub_bg_color"]["regular"] : '#ffffff';
$header_top_sub_bg_color_hover = isset($apress_data["header_top_sub_bg_color"]["hover"]) ? $apress_data["header_top_sub_bg_color"]["hover"] : '#fafafa';
$header_top_menu_sub_color_regular = isset($apress_data["header_top_menu_sub_color"]["regular"]) ? $apress_data["header_top_menu_sub_color"]["regular"] : '#747474';
$header_top_menu_sub_color_hover = isset($apress_data["header_top_menu_sub_color"]["hover"]) ? $apress_data["header_top_menu_sub_color"]["hover"] : '#333333';
$fullscreen_expanded_search_bg = isset($apress_data["fullscreen_expanded_search_bg"]) ? $apress_data["fullscreen_expanded_search_bg"] : '#ffffff';
$fullscreen_expanded_search_font_color = isset($apress_data["fullscreen_expanded_search_font_color"]) ? $apress_data["fullscreen_expanded_search_font_color"] : '#555555';

$nav_highlightborder_color = !empty($apress_data['nav_highlightborder_color']) ? 'border-color:'.$apress_data['nav_highlightborder_color'].';' : $apress_theme_primary_border_color;
$main_menu_design = isset($apress_data["main_menu_design"]) ? $apress_data["main_menu_design"] : "menu1";

$menu_dropdown_topborder_color = !empty($apress_data['menu_dropdown_topborder']['border-color']) ? $apress_data['menu_dropdown_topborder']['border-color'] : $primary_color;
$menu_dropdown_topborder_top = isset($apress_data["menu_dropdown_topborder"]["border-top"]) ? $apress_data["menu_dropdown_topborder"]["border-top"] : '3px';
$menu_dropdown_topborder_style = isset($apress_data["menu_dropdown_topborder"]["border-style"]) ? $apress_data["menu_dropdown_topborder"]["border-style"] : 'solid';
$nav_highlight_border = isset($apress_data["nav_highlight_border"]) ? $apress_data["nav_highlight_border"] : '2';
$vertical_menu_bg_color = isset($apress_data["vertical_menu_bg_color"]) ? $apress_data["vertical_menu_bg_color"] : 'rgba(0,0,0,0.8)';

$menu_hover_bg_first_level = !empty($apress_data["menu_hover_bg_first_level"]) ? 'background:'.$apress_data["menu_hover_bg_first_level"].';' : $apress_theme_primary_background_color;

$menu_first_level_color_regular = isset($apress_data["menu_first_level_color"]) ? $apress_data["menu_first_level_color"] : '';

$dropdown_menu_width = isset($apress_data["dropdown_menu_width"]["width"]) ? $apress_data["dropdown_menu_width"]["width"] : '160px';
$nav_item_margin_padding_top = isset($apress_data["nav_item_margin"]["padding-top"]) ? $apress_data["nav_item_margin"]["padding-top"] : "0px";
$nav_item_margin_padding_right = isset($apress_data["nav_item_margin"]["padding-right"]) ? $apress_data["nav_item_margin"]["padding-right"] : "0px";
$nav_item_margin_padding_bottom = isset($apress_data["nav_item_margin"]["padding-bottom"]) ? $apress_data["nav_item_margin"]["padding-bottom"] : "0px";
$nav_item_margin_padding_left = isset($apress_data["nav_item_margin"]["padding-left"]) ? $apress_data["nav_item_margin"]["padding-left"] : "0px";
$dropdown_item_top_bottom_padding_top = isset($apress_data["dropdown_item_top_bottom_pad"]["padding-top"]) ? $apress_data["dropdown_item_top_bottom_pad"]["padding-top"] : "10px";
$dropdown_item_top_bottom_padding_bottom = isset($apress_data["dropdown_item_top_bottom_pad"]["padding-bottom"]) ? $apress_data["dropdown_item_top_bottom_pad"]["padding-bottom"] : "10px";
$menu_sub_bg_color_regular = isset($apress_data["menu_sub_bg_color"]["regular"]) ? $apress_data["menu_sub_bg_color"]["regular"] : "#ffffff";
$menu_sub_bg_color_hover = isset($apress_data["menu_sub_bg_color"]["hover"]) ? $apress_data["menu_sub_bg_color"]["hover"] : "#f8f8f8";
$submenu_font_color_regular = isset($apress_data["submenu_font_color"]) ? $apress_data["submenu_font_color"] : "#333333"; 

$megamenu_shadow = isset($apress_data["megamenu_shadow"]) ? $apress_data["megamenu_shadow"] : "on";
$menu_sub_sep_color = isset($apress_data["menu_sub_sep_color"]) ? $apress_data["menu_sub_sep_color"] : "#dcdadb";
$fullscreen_hosizontal_menu_bg_color = isset($apress_data["fullscreen_hosizontal_menu_bg_color"]) ? $apress_data["fullscreen_hosizontal_menu_bg_color"] : "rgba(255,255,255,1)";
$fullscreen_menu_font_color = isset($apress_data["fullscreen_menu_font_color"]) ? $apress_data["fullscreen_menu_font_color"] : "#555555";
$nav_item_padding_top = isset($apress_data["nav_item_padding"]["padding-top"]) ? $apress_data["nav_item_padding"]["padding-top"] : '40px';
$nav_item_padding_right = isset($apress_data["nav_item_padding"]["padding-right"]) ? $apress_data["nav_item_padding"]["padding-right"] : '20px';
$nav_item_padding_bottom = isset($apress_data["nav_item_padding"]["padding-bottom"]) ? $apress_data["nav_item_padding"]["padding-bottom"] : '40px';
$nav_item_padding_left = isset($apress_data["nav_item_padding"]["padding-left"]) ? $apress_data["nav_item_padding"]["padding-left"] : '20px';
$nav_dropdown_font_size = isset($apress_data["nav_dropdown_font_size"]) ? $apress_data["nav_dropdown_font_size"] : '14';
$megamenu_title_size = isset($apress_data["megamenu_title_size"]) ? $apress_data["megamenu_title_size"] : '18';
$navbar_border_width_style = isset($apress_data["navbar_border_width"]["border-style"]) ? $apress_data["navbar_border_width"]["border-style"] : 'solid';
$navbar_border_width_top = isset($apress_data["navbar_border_width"]["border-top"]) ? $apress_data["navbar_border_width"]["border-top"] : '1px';
$navbar_border_width_right = isset($apress_data["navbar_border_width"]["border-right"]) ? $apress_data["navbar_border_width"]["border-right"] : '0px';
$navbar_border_width_bottom = isset($apress_data["navbar_border_width"]["border-bottom"]) ? $apress_data["navbar_border_width"]["border-bottom"] : '0px';
$navbar_border_width_left = isset($apress_data["navbar_border_width"]["border-left"]) ? $apress_data["navbar_border_width"]["border-left"] : '0px';
$navbar_border_color = isset($apress_data["navbar_border_color"]) ? $apress_data["navbar_border_color"] : '#e5e5e5';
$ver_header_align = isset($apress_data["ver_header_align"]) ? $apress_data["ver_header_align"] : 'left';

$likebox_on_off = isset($apress_data["likebox_on_off"]) ? $apress_data["likebox_on_off"] : 'on';

if ( is_rtl() ){
	if($ver_header_align == 'left'){
		$ver_header_align = 'right';
	}else if($ver_header_align == 'right'){
		$ver_header_align = 'left';
	}else{
		$ver_header_align = 'center';
	}
}else{
	$ver_header_align = $ver_header_align;
}


$menu_icon_color = isset($apress_data["menu_icon_color"]) ? $apress_data["menu_icon_color"] : '#555555';
$vertical_header_menu_sep_color = isset($apress_data["vertical_header_menu_sep_color"]) ? $apress_data["vertical_header_menu_sep_color"] : 'rgba(204,204,204,0.0)';

$horizontal_menu_max_width = isset($apress_data["horizontal_menu_max_width"]["width"]) ? $apress_data["horizontal_menu_max_width"]["width"] : '800px';
$vertical_menu_max_width = isset($apress_data["vertical_menu_max_width"]["width"]) ? $apress_data["vertical_menu_max_width"]["width"] : '360px';
$vertical_menu_space_top = isset($apress_data["vertical_menu_space_top"]) ? $apress_data["vertical_menu_space_top"] : '53';

$side_header_width = isset($apress_data["side_header_width"]["width"]) ? $apress_data["side_header_width"]["width"] : '280px';
$vertical_element_space_padding_top = isset($apress_data["vertical_element_space"]["padding-top"]) ? $apress_data["vertical_element_space"]["padding-top"] : '20px';
$vertical_element_space_padding_right = isset($apress_data["vertical_element_space"]["padding-right"]) ? $apress_data["vertical_element_space"]["padding-right"] : '40px';
$vertical_element_space_padding_bottom = isset($apress_data["vertical_element_space"]["padding-bottom"]) ? $apress_data["vertical_element_space"]["padding-bottom"] : '20px';
$vertical_element_space_padding_left = isset($apress_data["vertical_element_space"]["padding-left"]) ? $apress_data["vertical_element_space"]["padding-left"] : '40px';

$header_sticky_effect = isset($apress_data["header_sticky_effect"]) ? $apress_data["header_sticky_effect"] : 'default';
$sticky_header_srink_height = isset($apress_data["sticky_header_srink_height"]["height"]) ? $apress_data["sticky_header_srink_height"]["height"] : '66px';
$sticky_header_nav_item_margin_padding_top = isset($apress_data["sticky_header_nav_item_margin"]["padding-top"]) ? $apress_data["sticky_header_nav_item_margin"]["padding-top"] : '0px';
$sticky_header_nav_item_margin_padding_right = isset($apress_data["sticky_header_nav_item_margin"]["padding-right"]) ? $apress_data["sticky_header_nav_item_margin"]["padding-right"] : '0px';
$sticky_header_nav_item_margin_padding_bottom = isset($apress_data["sticky_header_nav_item_margin"]["padding-bottom"]) ? $apress_data["sticky_header_nav_item_margin"]["padding-bottom"] : '0px';
$sticky_header_nav_item_margin_padding_left = isset($apress_data["sticky_header_nav_item_margin"]["padding-left"]) ? $apress_data["sticky_header_nav_item_margin"]["padding-left"] : '0px';

$sticky_header_nav_item_padding_top = isset($apress_data["sticky_header_nav_item_padding"]["padding-top"]) ? $apress_data["sticky_header_nav_item_padding"]["padding-top"] : '20px';
$sticky_header_nav_item_padding_right = isset($apress_data["sticky_header_nav_item_padding"]["padding-right"]) ? $apress_data["sticky_header_nav_item_padding"]["padding-right"] : '20px';
$sticky_header_nav_item_padding_bottom = isset($apress_data["sticky_header_nav_item_padding"]["padding-top"]) ? $apress_data["sticky_header_nav_item_padding"]["padding-bottom"] : '20px';
$sticky_header_nav_item_padding_left = isset($apress_data["sticky_header_nav_item_padding"]["padding-left"]) ? $apress_data["sticky_header_nav_item_padding"]["padding-left"] : '20px';
$section_2_height = isset($apress_data["section_2_height"]["height"]) ? $apress_data["section_2_height"]["height"] : '94px';
$sticky_header_font_color_regular = isset($apress_data["sticky_header_font_color"]) ? $apress_data["sticky_header_font_color"] : '#555555';

$header_layout = isset($apress_data["header_layout"]) ? $apress_data["header_layout"] : 'v1';

//special_button 1
$special_button_padding_top = isset($apress_data["special_button_padding"]["padding-top"]) ? $apress_data["special_button_padding"]["padding-top"] : '10px';
$special_button_padding_right = isset($apress_data["special_button_padding"]["padding-right"]) ? $apress_data["special_button_padding"]["padding-right"] : '25px';
$special_button_padding_bottom = isset($apress_data["special_button_padding"]["padding-bottom"]) ? $apress_data["special_button_padding"]["padding-bottom"] : '10px';
$special_button_padding_left = isset($apress_data["special_button_padding"]["padding-left"]) ? $apress_data["special_button_padding"]["padding-left"] : '25px';

$special_button_font_color_regular = isset($apress_data["special_button_font_color"]["regular"]) ? $apress_data["special_button_font_color"]["regular"] : '#555555';
$special_button_font_color_hover = isset($apress_data["special_button_font_color"]["hover"]) ? $apress_data["special_button_font_color"]["hover"] : '#999999';
$special_button_font_size = isset($apress_data["special_button_font_size"]) ? $apress_data["special_button_font_size"] : '14';
$special_button_letter_spacing = isset($apress_data["special_button_letter_spacing"]) ? $apress_data["special_button_letter_spacing"] : '0.9';

$special_button_border_radius = isset($apress_data["special_button_border_radius"]) ? $apress_data["special_button_border_radius"] : '25';
$special_button_bg_option = isset($apress_data["special_button_bg_option"]) ? $apress_data["special_button_bg_option"] : 'color';

$special_button_bg_color = isset($apress_data["special_button_bg_color"]) ? $apress_data["special_button_bg_color"] : 'rgba(54,56,57,0)';
$special_button_border_color = isset($apress_data["special_button_border_color"]) ? $apress_data["special_button_border_color"] : 'rgba(85,85,85,1)';

$special_button_border_width_style = isset($apress_data["special_button_border_width"]["border-style"]) ? $apress_data["special_button_border_width"]["border-style"] : 'solid';
$special_button_border_top = isset($apress_data["special_button_border_width"]["border-top"]) ? $apress_data["special_button_border_width"]["border-top"] : '1px';
$special_button_border_right = isset($apress_data["special_button_border_width"]["border-right"]) ? $apress_data["special_button_border_width"]["border-right"] : '1px';
$special_button_border_bottom = isset($apress_data["special_button_border_width"]["border-bottom"]) ? $apress_data["special_button_border_width"]["border-bottom"] : '1px';
$special_button_border_left = isset($apress_data["special_button_border_width"]["border-left"]) ? $apress_data["special_button_border_width"]["border-left"] : '1px';

$special_button_bg_color_h = isset($apress_data["special_button_bg_color_h"]) ? $apress_data["special_button_bg_color_h"] : 'rgba(54,56,57,0)';
$special_button_border_color_h = isset($apress_data["special_button_border_color_h"]) ? $apress_data["special_button_border_color_h"] : 'rgba(153,153,153,1)';

$special_button_gradient_bg_from = isset($apress_data["special_button_gradient_bg"]["from"]) ? $apress_data["special_button_gradient_bg"]["from"] : '#5295ea';
$special_button_gradient_bg_to = isset($apress_data["special_button_gradient_bg"]["to"]) ? $apress_data["special_button_gradient_bg"]["to"] : '#8b79db';


//Special Button 2
$special_button2_padding_top = isset($apress_data["special_button2_padding"]["padding-top"]) ? $apress_data["special_button2_padding"]["padding-top"] : '10px';
$special_button2_padding_right = isset($apress_data["special_button2_padding"]["padding-right"]) ? $apress_data["special_button2_padding"]["padding-right"] : '25px';
$special_button2_padding_bottom = isset($apress_data["special_button2_padding"]["padding-bottom"]) ? $apress_data["special_button2_padding"]["padding-bottom"] : '10px';
$special_button2_padding_left = isset($apress_data["special_button2_padding"]["padding-left"]) ? $apress_data["special_button2_padding"]["padding-left"] : '25px';
$special_button2_font_color_regular = isset($apress_data["special_button2_font_color"]["regular"]) ? $apress_data["special_button2_font_color"]["regular"] : '#555555';
$special_button2_font_color_hover = isset($apress_data["special_button2_font_color"]["hover"]) ? $apress_data["special_button2_font_color"]["hover"] : '#999999';
$special_button2_font_size = isset($apress_data["special_button2_font_size"]) ? $apress_data["special_button2_font_size"] : '14';
$special_button2_letter_spacing = isset($apress_data["special_button2_letter_spacing"]) ? $apress_data["special_button2_letter_spacing"] : '0.9';
$special_button2_border_radius = isset($apress_data["special_button2_border_radius"]) ? $apress_data["special_button2_border_radius"] : '25';
$special_button2_bg_option = isset($apress_data["special_button2_bg_option"]) ? $apress_data["special_button2_bg_option"] : 'color';
$special_button2_bg_color = isset($apress_data["special_button2_bg_color"]) ? $apress_data["special_button2_bg_color"] : 'rgba(54,56,57,0)';
$special_button2_border_color = isset($apress_data["special_button2_border_color"]) ? $apress_data["special_button2_border_color"] : 'rgba(85,85,85,1)';
$special_button2_border_width_style = isset($apress_data["special_button2_border_width"]["border-style"]) ? $apress_data["special_button2_border_width"]["border-style"] : 'solid';
$special_button2_border_top = isset($apress_data["special_button2_border_width"]["border-top"]) ? $apress_data["special_button2_border_width"]["border-top"] : '1px';
$special_button2_border_right = isset($apress_data["special_button2_border_width"]["border-right"]) ? $apress_data["special_button2_border_width"]["border-right"] : '1px';
$special_button2_border_bottom = isset($apress_data["special_button2_border_width"]["border-bottom"]) ? $apress_data["special_button2_border_width"]["border-bottom"] : '1px';
$special_button2_border_left = isset($apress_data["special_button2_border_width"]["border-left"]) ? $apress_data["special_button2_border_width"]["border-left"] : '1px';
$special_button2_bg_color_h = isset($apress_data["special_button2_bg_color_h"]) ? $apress_data["special_button2_bg_color_h"] : 'rgba(54,56,57,0)';
$special_button2_border_color_h = isset($apress_data["special_button2_border_color_h"]) ? $apress_data["special_button2_border_color_h"] : 'rgba(153,153,153,1)';
$special_button2_gradient_bg_from = isset($apress_data["special_button2_gradient_bg"]["from"]) ? $apress_data["special_button2_gradient_bg"]["from"] : '#5295ea';
$special_button2_gradient_bg_to = isset($apress_data["special_button2_gradient_bg"]["to"]) ? $apress_data["special_button2_gradient_bg"]["to"] : '#8b79db';

$footer_bg_image_background_color = isset($apress_data['footer_bg_image']['background-color']) ? $apress_data['footer_bg_image']['background-color'] : '#2b3034';
$footer_layout_style = isset($apress_data["footer_layout_style"]) ? $apress_data["footer_layout_style"] : 'footer_default';
$footer_area_bor_width_border_style = isset($apress_data["footer_area_bor_width"]["border-style"]) ? $apress_data["footer_area_bor_width"]["border-style"] : 'solid';
$footer_area_bor_width_border_color = isset($apress_data["footer_area_bor_width"]["border-color"]) ? $apress_data["footer_area_bor_width"]["border-color"] : '#e9eaee';
$footer_area_bor_width_border_top = isset($apress_data["footer_area_bor_width"]["border-top"]) ? $apress_data["footer_area_bor_width"]["border-top"] : '1px';
$footer_area_bor_width_border_right = isset($apress_data["footer_area_bor_width"]["border-right"]) ? $apress_data["footer_area_bor_width"]["border-right"] : '0px';
$footer_area_bor_width_border_bottom = isset($apress_data["footer_area_bor_width"]["border-bottom"]) ? $apress_data["footer_area_bor_width"]["border-bottom"] : '0px';
$footer_area_bor_width_border_left = isset($apress_data["footer_area_bor_width"]["border-left"]) ? $apress_data["footer_area_bor_width"]["border-left"] : '0px';
$footer_area_padding_top = isset($apress_data["footer_area_padding"]["padding-top"]) ? $apress_data["footer_area_padding"]["padding-top"] : '40px';
$footer_area_padding_right = isset($apress_data["footer_area_padding"]["padding-right"]) ? $apress_data["footer_area_padding"]["padding-right"] : '30px';
$footer_area_padding_bottom = isset($apress_data["footer_area_padding"]["padding-bottom"]) ? $apress_data["footer_area_padding"]["padding-bottom"] : '40px';
$footer_area_padding_left = isset($apress_data["footer_area_padding"]["padding-left"]) ? $apress_data["footer_area_padding"]["padding-left"] : '30px';
$upper_footer_area_padding_top = isset($apress_data["upper_footer_area_padding"]["padding-top"]) ? $apress_data["upper_footer_area_padding"]["padding-top"] : '0px';
$upper_footer_area_padding_bottom = isset($apress_data["upper_footer_area_padding"]["padding-bottom"]) ? $apress_data["upper_footer_area_padding"]["padding-bottom"] : '40px';
$footer_item_border_color = isset($apress_data["footer_item_border_color"]) ? $apress_data["footer_item_border_color"] : '#707070';
$sidebar_item_border_color = isset($apress_data["sidebar_item_border_color"]) ? $apress_data["sidebar_item_border_color"] : '#dadada';
$footer_widgets_title_padding_top = isset($apress_data["footer_widgets_title_padding"]["padding-top"]) ? $apress_data["footer_widgets_title_padding"]["padding-top"] : '10px';
$footer_widgets_title_padding_bottom = isset($apress_data["footer_widgets_title_padding"]["padding-bottom"]) ? $apress_data["footer_widgets_title_padding"]["padding-bottom"] : '10px';
$footer_title_seperator_bottom_padding = isset($apress_data["footer_title_seperator_bottom_mar"]["padding-bottom"]) ? $apress_data["footer_title_seperator_bottom_mar"]["padding-bottom"] : '10px';
$footer_widgets_title_seperator_show = isset($apress_data["footer_widgets_title_seperator_show"]) ? $apress_data["footer_widgets_title_seperator_show"] : 'on';
$footer_widgets_title_seperator_dimensions_height = isset($apress_data["footer_widgets_title_seperator_dimensions"]["height"]) ? $apress_data["footer_widgets_title_seperator_dimensions"]["height"] : '2px';
$footer_widgets_title_seperator_dimensions_width = isset($apress_data["footer_widgets_title_seperator_dimensions"]["width"]) ? $apress_data["footer_widgets_title_seperator_dimensions"]["width"] : '80px';
$footer_widgets_title_seperator_color = isset($apress_data["footer_widgets_title_seperator_color"]) ? $apress_data["footer_widgets_title_seperator_color"] : '#dddddd';

$footer_copyright_bg_color = isset($apress_data["footer_copyright_bg_color"]) ? $apress_data["footer_copyright_bg_color"] : '#282a2b';

$footer_custommenu_style_show = isset($apress_data["footer_custommenu_style_show"]) ? $apress_data["footer_custommenu_style_show"] : 'off';
$footer_custommenu_list_style = isset($apress_data["footer_custommenu_list_style"]) ? $apress_data["footer_custommenu_list_style"] : 'list_style1';

$footer_custommenu_item_icon_color = isset($apress_data["footer_custommenu_item_icon_color"]) ? $apress_data["footer_custommenu_item_icon_color"] : '#707070';
$footer_custommenu_color_option = isset($apress_data["footer_custommenu_color_option"]) ? $apress_data["footer_custommenu_color_option"] : 'primary';



$copyright_area_border_color = isset($apress_data["copyright_area_border"]["border-color"]) ? $apress_data["copyright_area_border"]["border-color"] : '#4b4c4d';
$copyright_area_border_style = isset($apress_data["copyright_area_border"]["border-style"]) ? $apress_data["copyright_area_border"]["border-style"] : 'solid';
$copyright_area_border_top = isset($apress_data["copyright_area_border"]["border-top"]) ? $apress_data["copyright_area_border"]["border-top"] : '1px';
$copyright_area_border_right = isset($apress_data["copyright_area_border"]["border-right"]) ? $apress_data["copyright_area_border"]["border-right"] : '0px';
$copyright_area_border_bottom = isset($apress_data["copyright_area_border"]["border-bottom"]) ? $apress_data["copyright_area_border"]["border-bottom"] : '0px';
$copyright_area_border_left = isset($apress_data["copyright_area_border"]["border-left"]) ? $apress_data["copyright_area_border"]["border-left"] : '0px';
$copyright_padding_top = isset($apress_data["copyright_padding"]["padding-top"]) ? $apress_data["copyright_padding"]["padding-top"] : '18px';
$copyright_padding_bottom = isset($apress_data["copyright_padding"]["padding-bottom"]) ? $apress_data["copyright_padding"]["padding-bottom"] : '18px';

$footer_social_links_icon_color_regular = isset($apress_data["footer_social_links_icon_color"]["regular"]) ? $apress_data["footer_social_links_icon_color"]["regular"] : '#e7e7e7';
$footer_social_links_icon_color_hover = isset($apress_data["footer_social_links_icon_color"]["hover"]) ? $apress_data["footer_social_links_icon_color"]["hover"] : '#c5c5c5';
$footer_social_links_box_color = isset($apress_data["footer_social_links_box_color"]) ? $apress_data["footer_social_links_box_color"] : 'rgba(34,34,34,0)';
$footer_social_box_border_color = isset($apress_data["footer_social_box_border_color"]) ? $apress_data["footer_social_box_border_color"] : '#e7e7e7';
$footer_social_links_boxed_radius = isset($apress_data["footer_social_links_boxed_radius"]) ? $apress_data["footer_social_links_boxed_radius"] : '';
$footer_social_icon_width = isset($apress_data["footer_social_icon_width"]["width"]) ? $apress_data["footer_social_icon_width"]["width"] : '34px';
$footer_social_boxed_padding_top = isset($apress_data["footer_social_boxed_padding"]["padding-top"]) ? $apress_data["footer_social_boxed_padding"]["padding-top"] : '8px';
$footer_social_boxed_padding_bottom = isset($apress_data["footer_social_boxed_padding"]["padding-bottom"]) ? $apress_data["footer_social_boxed_padding"]["padding-bottom"] : '8px';
$footer_social_font_size = isset($apress_data["footer_social_font_size"]) ? $apress_data["footer_social_font_size"] : '14';
$footer_social_boxed_margin_padding_left = isset($apress_data["footer_social_boxed_margin"]["padding-left"]) ? $apress_data["footer_social_boxed_margin"]["padding-left"] : '12px';
$footer_social_boxed_margin_padding_right = isset($apress_data["footer_social_boxed_margin"]["padding-right"]) ? $apress_data["footer_social_boxed_margin"]["padding-right"] : '12px';
$page_padding_top = isset($apress_data["page_padding"]['padding-top']) ? $apress_data["page_padding"]['padding-top'] : '60px';
$page_padding_bottom = isset($apress_data["page_padding"]['padding-bottom']) ? $apress_data["page_padding"]['padding-bottom'] : '50px';
$hundredp_padding_left = isset($apress_data["hundredp_padding"]['padding-left']) ? $apress_data["hundredp_padding"]['padding-left'] : '30px';
$hundredp_padding_right = isset($apress_data["hundredp_padding"]['padding-right']) ? $apress_data["hundredp_padding"]['padding-right'] : '30px';
$header_width_100per_padding_left = isset($apress_data["header_width_100per_padding"]['padding-left']) ? $apress_data["header_width_100per_padding"]['padding-left'] : '0px';
$header_width_100per_padding_right = isset($apress_data["header_width_100per_padding"]['padding-right']) ? $apress_data["header_width_100per_padding"]['padding-right'] : '0px';
$header_100_width = isset($apress_data["header_100_width"]) ? $apress_data["header_100_width"] : 'off';

$top_bar_left_padding = !empty($apress_data["top_bar_left_right_padding"]['padding-left']) ? $apress_data["top_bar_left_right_padding"]['padding-left'] : $hundredp_padding_left;
$top_bar_right_padding = !empty($apress_data["top_bar_left_right_padding"]['padding-right']) ? $apress_data["top_bar_left_right_padding"]['padding-right'] : $hundredp_padding_right;

$section_two_left_padding = !empty($apress_data["section_two_left_right_padding"]['padding-left']) ? $apress_data["section_two_left_right_padding"]['padding-left'] : $hundredp_padding_left;
$section_two_right_padding = !empty($apress_data["section_two_left_right_padding"]['padding-right']) ? $apress_data["section_two_left_right_padding"]['padding-right'] : $hundredp_padding_right;

$section_three_left_padding = !empty($apress_data["section_three_left_right_padding"]['padding-left']) ? $apress_data["section_three_left_right_padding"]['padding-left'] : $hundredp_padding_left;
$section_three_right_padding = !empty($apress_data["section_three_left_right_padding"]['padding-right']) ? $apress_data["section_three_left_right_padding"]['padding-right'] : $hundredp_padding_right;


$content_width_2 = isset($apress_data["content_width_2"]['width']) ? $apress_data["content_width_2"]['width'] : '58%';;
$sidebar_2_1_width = isset($apress_data["sidebar_2_1_width"]['width']) ? $apress_data["sidebar_2_1_width"]['width'] : '21%';
$sidebar_2_2_width = isset($apress_data["sidebar_2_2_width"]['width']) ? $apress_data["sidebar_2_2_width"]['width'] : '21%';
$content_width = isset($apress_data["content_width"]["width"]) ? $apress_data["content_width"]["width"] : '77%';
$sidebar_width = isset($apress_data["sidebar_width"]["width"]) ? $apress_data["sidebar_width"]["width"] : '23%';
$sidebar_widgets_title_padding_top = isset($apress_data["sidebar_widgets_title_padding"]["padding-top"]) ? $apress_data["sidebar_widgets_title_padding"]["padding-top"] : '10px';
$sidebar_widgets_title_padding_bottom = isset($apress_data["sidebar_widgets_title_padding"]["padding-bottom"]) ? $apress_data["sidebar_widgets_title_padding"]["padding-bottom"] : '10px';
$sidebar_title_seperator_bottom_mar = isset($apress_data["sidebar_title_seperator_bottom_mar"]["padding-bottom"]) ? $apress_data["sidebar_title_seperator_bottom_mar"]["padding-bottom"] : '10px';
$sidebar_link_color_regular = isset($apress_data['sidebar_link_color']["regular"]) ? $apress_data['sidebar_link_color']["regular"] : '#888888';
$sidebar_link_color_hover = isset($apress_data['sidebar_link_color']["hover"]) ? $apress_data['sidebar_link_color']["hover"] : '#333333';
$sidebar_widgets_title_design = isset($apress_data["sidebar_widgets_title_design"]) ? $apress_data["sidebar_widgets_title_design"] : 'none';
$sidebar_widgets_title_seperator_height = isset($apress_data["sidebar_widgets_title_seperator_height"]) ? $apress_data["sidebar_widgets_title_seperator_height"] : '2px';
$sidebar_widgets_title_seperator_width = isset($apress_data["sidebar_widgets_title_seperator_width"]) ? $apress_data["sidebar_widgets_title_seperator_width"] : '80px';
$sidebar_widget_title_bg_color = isset($apress_data["sidebar_widget_title_bg_color"]) ? $apress_data["sidebar_widget_title_bg_color"] : '#e4e4e4';
$sidebar_widget_title_border_color = isset($apress_data["sidebar_widget_title_border_color"]) ? $apress_data["sidebar_widget_title_border_color"] : '#e4e4e4';
$sidebar_widgets_title_separator_img_url = isset($apress_data["sidebar_widgets_title_separator_img"]["url"]) ? $apress_data["sidebar_widgets_title_separator_img"]["url"] : '';
$sidebar_widge_bg_color = isset($apress_data["sidebar_widge_bg_color"]) ? $apress_data["sidebar_widge_bg_color"] : '#f8f8f8';
$sidebar_widget_border_color = isset($apress_data["sidebar_widget_border_color"]) ? $apress_data["sidebar_widget_border_color"] : '#f4f4f4';
$sidebar_widgets_title_align = isset($apress_data["sidebar_widgets_title_align"]) ? $apress_data["sidebar_widgets_title_align"] : 'left';
$sidebar_widgets_style = isset($apress_data["sidebar_widgets_style"]) ? $apress_data["sidebar_widgets_style"] : 'none';

$page_title_height = isset($apress_data["page_title_height"]["height"]) ? $apress_data["page_title_height"]["height"] : '100px';
$page_title_bar_overlay_color = isset($apress_data["page_title_bar_overlay_color"]) ? $apress_data["page_title_bar_overlay_color"] : 'rgba(0,0,0,0.15)';

$titlebar_height = get_post_meta( $cur_id, 'zt_titlebar_height', true ); 

$page_titlebar_typography_line_height = isset($apress_data['page_titlebar_typography']['line-height']) ? $apress_data['page_titlebar_typography']['line-height'] : '36px';
$page_titlebar_typography_font_size = isset($apress_data['page_titlebar_typography']['font-size']) ? $apress_data['page_titlebar_typography']['font-size'] : '30px';
$page_title_color = isset($apress_data["page_title_color"]) ? $apress_data["page_title_color"] : '#ffffff';
$page_title_padding_top = isset($apress_data["page_title_padding"]["padding-top"]) ? $apress_data["page_title_padding"]["padding-top"] : '30px';

$page_title_padding_right = !empty($apress_data["page_title_padding"]["padding-right"]) ? $apress_data["page_title_padding"]["padding-right"] : $hundredp_padding_right;
$page_title_padding_bottom = isset($apress_data["page_title_padding"]["padding-bottom"]) ? $apress_data["page_title_padding"]["padding-bottom"] : '30px';
$page_title_padding_left = !empty($apress_data["page_title_padding"]["padding-left"]) ? $apress_data["page_title_padding"]["padding-left"] : $hundredp_padding_left;;
$breadcrumbs_font_size = isset($apress_data['breadcrumbs_font_size']) ? $apress_data['breadcrumbs_font_size'] : '13';

$title_text_size = get_post_meta( $cur_id, 'zt_title_text_size', true ); 

$titlebar_bg_img_100per = get_post_meta( $cur_id, 'zt_titlebar_bg_img_100per', true ); 
$bg_img = get_post_meta( $cur_id, 'zt_bg_img', true );
$bg_color = get_post_meta( $cur_id, 'zt_bg_color', true );
$bg_repeat = get_post_meta( $cur_id, 'zt_bg_repeat', true ); 
$bg_img_100per = get_post_meta( $cur_id, 'zt_bg_img_100per', true );
$body_bg_image_background_size = isset($apress_data['body_bg_image']['background-size']) ? $apress_data['body_bg_image']['background-size'] : '';
$body_bg_image_background_color = isset($apress_data['body_bg_image']['background-color']) ? $apress_data['body_bg_image']['background-color'] : '#ffffff';

$wide_bg_img = get_post_meta( $cur_id, 'zt_wide_bg_img', true );
$wide_bg_color = get_post_meta( $cur_id, 'zt_wide_bg_color', true );
$wide_bg_img_100per = get_post_meta( $cur_id, 'zt_wide_bg_img_100per', true ); 
$wide_bg_repeat = get_post_meta( $cur_id, 'zt_wide_bg_repeat', true ); 
$layout = isset($apress_data["layout"]) ? $apress_data["layout"] : 'wide';

$header_h1_typography_font_size = isset($apress_data['header_h1_typography']['font-size']) ? $apress_data['header_h1_typography']['font-size'] : '30px';
$header_h1_typography_line_height = isset($apress_data['header_h1_typography']['line-height']) ? $apress_data['header_h1_typography']['line-height'] : '40px';

$header_h2_typography_font_size = isset($apress_data['header_h2_typography']['font-size']) ? $apress_data['header_h1_typography']['font-size'] : '26px';
$header_h2_typography_line_height = isset($apress_data['header_h2_typography']['line-height']) ? $apress_data['header_h1_typography']['line-height'] : '36px';

$header_h3_typography_font_size = isset($apress_data['header_h3_typography']['font-size']) ? $apress_data['header_h3_typography']['font-size'] : '24px';
$header_h3_typography_line_height = isset($apress_data['header_h3_typography']['line-height']) ? $apress_data['header_h3_typography']['line-height'] : '34px';

$header_h4_typography_font_size = isset($apress_data['header_h4_typography']['font-size']) ? $apress_data['header_h4_typography']['font-size'] : '22px';
$header_h4_typography_line_height = isset($apress_data['header_h4_typography']['line-height']) ? $apress_data['header_h4_typography']['line-height'] : '30px';

$header_h5_typography_font_size = isset($apress_data['header_h5_typography']['font-size']) ? $apress_data['header_h5_typography']['font-size'] : '20px';
$header_h5_typography_line_height = isset($apress_data['header_h5_typography']['line-height']) ? $apress_data['header_h5_typography']['line-height'] : '30px';

$header_h6_typography_font_size = isset($apress_data['header_h6_typography']['font-size']) ? $apress_data['header_h6_typography']['font-size'] : '18px';
$header_h6_typography_line_height = isset($apress_data['header_h6_typography']['line-height']) ? $apress_data['header_h6_typography']['line-height'] : '28px';


$footer_link_color_regular = isset($apress_data['footer_link_color']['regular']) ? $apress_data['footer_link_color']['regular'] : '#bfbfbf';
$footer_link_color_hover = isset($apress_data['footer_link_color']['hover']) ? $apress_data['footer_link_color']['hover'] : '#919191';
$copyright_text_color = isset($apress_data['copyright_text_color']) ? $apress_data['copyright_text_color'] : '#8C8989';
$copyright_font_size = isset($apress_data['copyright_font_size']) ? $apress_data['copyright_font_size'] : '12';
$copyright_link_color_regular = isset($apress_data['copyright_link_color']["regular"]) ? $apress_data['copyright_link_color']["regular"] : '#bfbfbf';
$copyright_link_color_hover = isset($apress_data['copyright_link_color']["hover"]) ? $apress_data['copyright_link_color']["hover"] : '#919191';
$pagination_font_size = isset($apress_data['pagination_font_size']) ? $apress_data['pagination_font_size'] : '12';

$body_link_color_regular = isset($apress_data['body-link-color']) ? $apress_data['body-link-color'] : '#888888';

$body_typography_color = isset($apress_data['body_typography']['color']) ? $apress_data['body_typography']['color'] : '#747474';
$Pagi_font_regular_color = isset($apress_data['Pagi_font_color']['regular']) ? $apress_data['Pagi_font_color']['regular'] : '#333333';
$Pagi_font_hover_color = isset($apress_data['Pagi_font_color']['hover']) ? $apress_data['Pagi_font_color']['hover'] : '#ffffff';
$Pagi_background_color_regular = isset($apress_data['Pagi_background_color']['regular']) ? $apress_data['Pagi_background_color']['regular'] : '#eeeeee';
$Pagi_background_color_hover = !empty($apress_data['Pagi_background_color']['hover']) ? 'background:'.$apress_data['Pagi_background_color']['hover'].';' : $apress_theme_primary_background_color;
$Pagi_border_color_regular = isset($apress_data['Pagi_border_color']['regular']) ? $apress_data['Pagi_border_color']['regular'] : '#e1e1e1';
$Pagi_border_color_hover = isset($apress_data['Pagi_border_color']['hover']) ? $apress_data['Pagi_border_color']['hover'] : '#cccccc';
$header_h4_typography_font_size = isset($apress_data["header_h4_typography"]["font-size"]) ? $apress_data["header_h4_typography"]["font-size"] : '22px';
$header_h4_typography_line_height = isset($apress_data["header_h4_typography"]["line-height"]) ? $apress_data["header_h4_typography"]["line-height"] : '30px';
$backtotop_hoverbg_color = !empty($apress_data['backtotop_hoverbg_color']) ? 'background:'.$apress_data['backtotop_hoverbg_color'].';' : $apress_theme_primary_background_color;
$backtotop_hoverborder_color = !empty($apress_data['backtotop_hoverborder_color']) ? $apress_data['backtotop_hoverborder_color'] : $primary_color;

$backtotop_background_color = !empty($apress_data["backtotop_background_color"]) ? 'background:'.$apress_data["backtotop_background_color"].';' :$apress_theme_primary_background_color ;
$backtotop_font_color_regular = isset($apress_data['backtotop_font_color']["regular"]) ? $apress_data['backtotop_font_color']["regular"] : '#ffffff';
$backtotop_font_color_hover = isset($apress_data['backtotop_font_color']["hover"]) ? $apress_data['backtotop_font_color']["hover"] : '#ffffff';
$backtotop_border_color = isset($apress_data["backtotop_border_color"]) ? $apress_data["backtotop_border_color"] : '#e1e1e1';
$header_position = isset($apress_data["header_position"]) ? $apress_data["header_position"] : 'Top';
$extended_sidebar_width = isset($apress_data['extended_sidebar_width']['width']) ? $apress_data['extended_sidebar_width']['width'] : '300px';
$extended_font_color = isset($apress_data["extended_font_color"]) ? $apress_data["extended_font_color"] : '#333333';
$extended_link_color_regular = isset($apress_data['extended_link_color']['regular']) ? $apress_data['extended_link_color']['regular'] : '#333333';

$extended_link_color_hover = !empty($apress_data['extended_link_color']['hover']) ? 'color:'.$apress_data['extended_link_color']['hover'].';' : $apress_theme_link_text_color ;

$single_post_layout_width_page = get_post_meta( $cur_id, 'zt_single_post_layout_width', true );
$single_post_layout_width_admin = isset($apress_data['single_post_layout_width']['width']) ? $apress_data['single_post_layout_width']['width'] : '900px';

$post_navigation_font_color_regular = isset($apress_data[$posttype.'_navigation_font_color']['regular']) ? $apress_data[$posttype.'_navigation_font_color']['regular'] : '#888888';
$post_navigation_font_color_hover = isset($apress_data[$posttype.'_navigation_font_color']['hover']) ? $apress_data[$posttype.'_navigation_font_color']['hover'] : '#333333';
$post_navigation_bg_color_regular = isset($apress_data[$posttype.'_navigation_bg_color']['regular']) ? $apress_data[$posttype.'_navigation_bg_color']['regular'] : '#f7f7f7';
$post_navigation_bg_color_hover = isset($apress_data[$posttype.'_navigation_bg_color']['hover']) ? $apress_data[$posttype.'_navigation_bg_color']['hover'] : '#eeeeee';
$post_navigation_font_color4_w = isset($apress_data[$posttype.'_navigation_font_color4-w']) ? $apress_data[$posttype.'_navigation_font_color4-w'] : '#ffffff';
$post_navigation_overlay_color = isset($apress_data[$posttype.'_navigation_overlay_color']) ? $apress_data[$posttype.'_navigation_overlay_color'] : '#888888';
$portfolio_column_spacing = isset($apress_data['portfolio_column_spacing']) ? $apress_data['portfolio_column_spacing'] : '15px';
$portfolio_gallery_layout_admin = isset($apress_data['portfolio_gallery_layout']) ? $apress_data['portfolio_gallery_layout'] : 'gallery_layout_style1';
$portfolio_gallery_layout_page = get_post_meta( $cur_id, 'zt_portfolio_gallery_layout', true );

if($portfolio_gallery_layout_page == '' || $portfolio_gallery_layout_page == 'default'){
	$portfolio_gallery_layout = $portfolio_gallery_layout_admin;
}else{
	$portfolio_gallery_layout = $portfolio_gallery_layout_page;
	}

$portfolio_gallery_gutter_admin = isset($apress_data['portfolio_gallery_gutter']) ? $apress_data['portfolio_gallery_gutter'] : '';
$portfolio_gallery_gutter_page = get_post_meta( $cur_id, 'zt_portfolio_gallery_gutter', true );
if($portfolio_gallery_gutter_page == ''){
	$portfolio_gallery_gutter = $portfolio_gallery_gutter_admin;
}else{
	$portfolio_gallery_gutter = $portfolio_gallery_gutter_page;
}

$portfolio_hover_effects_admin = isset($apress_data['portfolio_hover_effects']) ? $apress_data['portfolio_hover_effects'] : 'fade_effect';
$portfolio_hover_effects_page = get_post_meta( $cur_id, 'zt_portfolio_hover_effects', true );

if($portfolio_hover_effects_page == '' || $portfolio_hover_effects_page == 'default'){
	$portfolio_hover_effects = $portfolio_hover_effects_admin;
}else{
	$portfolio_hover_effects = $portfolio_hover_effects_page;
	}
$portfolio_overlay_color = isset($apress_data['portfolio_overlay_color']) ? $apress_data['portfolio_overlay_color'] : 'rgba(0,0,0,0.4)';
$portfolio_overlay_gradient_from = isset($apress_data["portfolio_overlay_gradient"]["from"]) ? $apress_data["portfolio_overlay_gradient"]["from"] : '#5295ea';
$portfolio_overlay_gradient_to = isset($apress_data["portfolio_overlay_gradient"]["to"]) ? $apress_data["portfolio_overlay_gradient"]["to"] : '#8b79db';


$woo_minicart_button_bg_color = !empty($apress_data["woo_minicart_button_bg_color"]) ? 'background:'.$apress_data["woo_minicart_button_bg_color"].';' : $apress_theme_primary_background_color;

$woo_minicart_button_remove_color = !empty($apress_data["woo_minicart_button_bg_color"]) ? 'color:'.$apress_data["woo_minicart_button_bg_color"].';' : $apress_theme_primary_text_color;

$woo_product_detail_bg_color = isset($apress_data['woo_product_detail_bg_color']) ? $apress_data['woo_product_detail_bg_color'] : '#f2f2f2';

$woo_minicart_button_text_color = isset($apress_data['woo_minicart_button_text_color']) ? $apress_data['woo_minicart_button_text_color'] : '#ffffff';
$woo_minicart_font_color = isset($apress_data['woo_minicart_font_color']) ? $apress_data['woo_minicart_font_color'] : '#555555';
$woo_minicart_box_color = isset($apress_data['woo_minicart_box_color']) ? $apress_data['woo_minicart_box_color'] : '#ffffff';
$woo_product_button_bg_color = !empty($apress_data["woo_product_button_color"]) ? 'background:'.$apress_data["woo_product_button_color"].';' : $apress_theme_button_background_color_scheme;

$woo_product_button_color = !empty($apress_data["woo_product_button_color"]) ? 'color:'.$apress_data["woo_product_button_color"].';' : $apress_theme_primary_text_color;
$woo_product_button_color2 = !empty($apress_data["woo_product_button_color"]) ? $apress_data["woo_product_button_color"] : $primary_color;


$woo_product_icon_bg_color_regular = isset($apress_data['woo_product_icon_bg_color']['regular']) ? $apress_data['woo_product_icon_bg_color']['regular'] : '#ffffff';
$woo_product_icon_bg_color_hover = isset($apress_data['woo_product_icon_bg_color']['hover']) ? $apress_data['woo_product_icon_bg_color']['hover'] : '#999999';
$woo_product_icon_color_regular = isset($apress_data['woo_product_icon_color']['regular']) ? $apress_data['woo_product_icon_color']['regular'] : '#999999';
$woo_product_icon_color_hover = isset($apress_data['woo_product_icon_color']['hover']) ? $apress_data['woo_product_icon_color']['hover'] : '#ffffff';

$woo_product_icon_tooltip_bg = isset($apress_data['woo_product_icon_tooltip_bg']) ? $apress_data['woo_product_icon_tooltip_bg'] : 'rgba(0,0,0,1)';
$woo_product_icon_tooltip_text_color = isset($apress_data['woo_product_icon_tooltip_text_color']) ? $apress_data['woo_product_icon_tooltip_text_color'] : '#ffffff';
$woocommerce_product_gutter = isset($apress_data['woocommerce_product_gutter']) ? $apress_data['woocommerce_product_gutter'] : '15';

$woo_minicart_separator_color = isset($apress_data['woo_minicart_separator_color']) ? $apress_data['woo_minicart_separator_color'] : 'rgba(0,0,0,0.08)';
$woo_product_bg_color = isset($apress_data["woo_product_bg_color"]) ? $apress_data["woo_product_bg_color"] : '#ffffff';
$woo_product_bor_color = isset($apress_data["woo_product_bor_color"]) ? $apress_data["woo_product_bor_color"] : '#e8e8e8';
$woo_product_shadow_showhide = isset($apress_data["woo_product_shadow_showhide"]) ? $apress_data["woo_product_shadow_showhide"] : 'hide';

$woo_product_overlaybg_color = isset($apress_data["woo_product_overlaybg_color"]) ? $apress_data["woo_product_overlaybg_color"] : 'rgba(0,0,0,0.5)';
$body_typography_color = isset($apress_data["body_typography"]["color"]) ? $apress_data["body_typography"]["color"] : '#747474';
$bloggrid_box_bg_color = isset($apress_data["bloggrid_box_bg_color"]) ? $apress_data["bloggrid_box_bg_color"] : 'rgba(255,255,255,0.9)';
$bloggrid_box_shadow_color = isset($apress_data["bloggrid_box_shadow_color"]) ? $apress_data["bloggrid_box_shadow_color"] : 'rgba(0,0,0,0.15)';
$post_title_alignment = isset($apress_data["post_title_alignment"]) ? $apress_data["post_title_alignment"] : 'left';
$post_category_bg = isset($apress_data["post_category_bg"]) ? $apress_data["post_category_bg"] : 'rgba(117,117,117,0.0)';
$post_category_border = isset($apress_data["post_category_border"]) ? $apress_data["post_category_border"] : '#757575';
$post_category_font_regular = isset($apress_data["post_category_font"]["regular"]) ? $apress_data["post_category_font"]["regular"] : '#757575';
$post_category_font_hover = !empty($apress_data['post_category_font']["hover"]) ? $apress_data['post_category_font']["hover"] : '#ffffff';
$post_category_bg_hover = !empty($apress_data["post_category_bg_hover"]) ? 'background:'.$apress_data["post_category_bg_hover"].';' : $apress_theme_primary_background_color;

$post_category_border_hover = !empty($apress_data['post_category_border_hover']) ? $apress_data['post_category_border_hover'] : 'transparent';
$post_continuereading_bg = isset($apress_data["post_continuereading_bg"]) ? $apress_data["post_continuereading_bg"] : 'rgba(117,117,117,0.0)';
$post_continuereading_border = isset($apress_data["post_continuereading_border"]) ? $apress_data["post_continuereading_border"] : '#757575';
$post_continuereading_font_regular = isset($apress_data["post_continuereading_font"]["regular"]) ? $apress_data["post_continuereading_font"]["regular"] : '#757575';

$post_continuereading_font_hover = !empty($apress_data["post_continuereading_font"]["hover"]) ? $apress_data["post_continuereading_font"]["hover"] : $button_text_color;

$post_continuereading_bg_hover = !empty($apress_data["post_continuereading_bg_hover"]) ? 'background:'.$apress_data["post_continuereading_bg_hover"].';' : $apress_theme_button_background_color_scheme;

$post_continuereading_border_hover = !empty($apress_data["post_continuereading_border_hover"]) ? $apress_data["post_continuereading_border_hover"] : 'rgba(117,117,117,0.0)';

$post_social_sharing_border_radius = isset($apress_data["post_social_sharing_border_radius"]) ? $apress_data["post_social_sharing_border_radius"] : '0px';
$social_share_style = isset($apress_data["social_share_style"]) ? $apress_data["social_share_style"] : 'default';
$post_social_share_bg = isset($apress_data["post_social_share_bg"]) ? $apress_data["post_social_share_bg"] : 'rgba(117,117,117,0.0)';

$post_social_share_bg_hover = !empty($apress_data["post_social_share_bg_hover"]) ? 'background:'.$apress_data["post_social_share_bg_hover"].';' : $apress_theme_primary_background_color;

$post_social_share_border_regular = isset($apress_data["post_social_share_border"]["regular"]) ? $apress_data["post_social_share_border"]["regular"] : '#757575';
$post_social_share_border_hover = !empty($apress_data["post_social_share_border"]["hover"]) ? $apress_data["post_social_share_border"]["hover"] : 'transparent';
$post_social_share_font_regular = isset($apress_data["post_social_share_font"]["regular"]) ? $apress_data["post_social_share_font"]["regular"] : '#757575';
$post_social_share_font_hover = !empty($apress_data["post_social_share_font"]["hover"]) ? $apress_data["post_social_share_font"]["hover"] : '#ffffff';

$contact_form_input_focus_color = isset($apress_data["contact_form_input_focus_color"]) ? $apress_data["contact_form_input_focus_color"] : $primary_color;
$contact_form_input_bor_color = isset($apress_data["contact_form_input_bor_color"]) ? $apress_data["contact_form_input_bor_color"] : '#cccccc';
$contact_form_input_bg_color = isset($apress_data["contact_form_input_bg_color"]) ? $apress_data["contact_form_input_bg_color"] : 'rgba(255,255,255,0.0)';
$contact_form_text_color = isset($apress_data["contact_form_text_color"]) ? $apress_data["contact_form_text_color"] : '#747474';
$contact_form_button_bor_color = !empty($apress_data["contact_form_button_bor_color"]) ? $apress_data["contact_form_button_bor_color"] : 'transparent';
$contact_form_button_bor_color_h = !empty($apress_data["contact_form_button_bor_color_h"]) ? $apress_data["contact_form_button_bor_color_h"] : 'transparent';

$contact_form_button_bg_color = !empty($apress_data["contact_form_button_bg_color"]) ? 'background:'.$apress_data["contact_form_button_bg_color"].'!important;' : $apress_theme_button_background_color_scheme;
$contact_form_button_bg_color_h = !empty($apress_data["contact_form_button_bg_color_h"]) ? 'background:'.$apress_data["contact_form_button_bg_color_h"].'!important;' : $apress_theme_button_background_color_scheme;

$contact_form_button_font_color_regular = isset($apress_data["contact_form_button_font_color"]["regular"]) ? $apress_data["contact_form_button_font_color"]["regular"] : '#ffffff';
$contact_form_button_font_color_hover = isset($apress_data["contact_form_button_font_color"]["hover"]) ? $apress_data["contact_form_button_font_color"]["hover"] : '#F6F6F6';

$light_text_color = isset($apress_data["light_text_color"]) ? $apress_data["light_text_color"] : '#ffffff';
$dark_text_color = isset($apress_data["dark_text_color"]) ? $apress_data["dark_text_color"] : '#000000';

$mobile_header_padding_top = isset($apress_data['mobile_header_padding']['padding-top']) ? $apress_data['mobile_header_padding']['padding-top'] : '0px';
$mobile_header_padding_right = isset($apress_data['mobile_header_padding']['padding-right']) ? $apress_data['mobile_header_padding']['padding-right'] : '30px';
$mobile_header_padding_bottom = isset($apress_data['mobile_header_padding']['padding-bottom']) ? $apress_data['mobile_header_padding']['padding-bottom'] : '0px';
$mobile_header_padding_left = isset($apress_data['mobile_header_padding']['padding-left']) ? $apress_data['mobile_header_padding']['padding-left'] : '30px';

$mobile_logo_margin_top = isset($apress_data['mobile_logo_margin']['padding-top']) ? $apress_data['mobile_logo_margin']['padding-top'] : '38px';
$mobile_logo_margin_right = isset($apress_data['mobile_logo_margin']['padding-right']) ? $apress_data['mobile_logo_margin']['padding-right'] : '0';
$mobile_logo_margin_bottom = isset($apress_data['mobile_logo_margin']['padding-bottom']) ? $apress_data['mobile_logo_margin']['padding-bottom'] : '38px';
$mobile_logo_margin_left = isset($apress_data['mobile_logo_margin']['padding-left']) ? $apress_data['mobile_logo_margin']['padding-left'] : '0';


$mobile_menu_background_color = !empty($apress_data['mobile_menu_background_color']['regular']) ? 'background:'.$apress_data['mobile_menu_background_color']['regular'].';' : $apress_theme_primary_background_color;


$mobile_menu_background_color_hover = !empty($apress_data['mobile_menu_background_color']['hover']) ? $apress_data['mobile_menu_background_color']['hover'] : $primary_color;
$mobile_font_size = isset($apress_data["mobile_font_size"]) ? $apress_data["mobile_font_size"] : '14';
$mob_menu_lh = isset($apress_data["mob_menu_lh"]) ? $apress_data["mob_menu_lh"] : '40';
$mobile_navbar_icon_color = isset($apress_data['mobile_navbar_icon_color']) ? $apress_data['mobile_navbar_icon_color'] : '#e5e5e5';
$mobile_menu_font_color_reular = isset($apress_data['mobile_menu_font_color']['regular']) ? $apress_data['mobile_menu_font_color']['regular'] : '#ffffff';
$mobile_menu_font_color_hover = !empty($apress_data['mobile_menu_font_color']['hover']) ? $apress_data['mobile_menu_font_color']['hover'] : $primary_color;
$mobile_menu_border_color = !empty($apress_data['mobile_menu_border_color']) ? $apress_data['mobile_menu_border_color'] : $primary_color ;


//Testimonial
$rating_star_color = !empty($apress_data["rating_star_color"]) ? 'color:'.$apress_data["rating_star_color"].';' : $apress_theme_primary_text_color;
$testimonial_navigation_font_color_regular = !empty($apress_data["testimonial_navigation_font_color"]["regular"]) ? $apress_data["testimonial_navigation_font_color"]["regular"] : '#888888';
$testimonial_navigation_font_color_hover = !empty($apress_data["testimonial_navigation_font_color"]["hover"]) ? $apress_data["testimonial_navigation_font_color"]["hover"] : '#333333';

$testimonial_navigation_bg_color_regular = !empty($apress_data["testimonial_navigation_bg_color"]["regular"]) ? $apress_data["testimonial_navigation_bg_color"]["regular"] : '#888888';
$testimonial_navigation_bg_color_hover = !empty($apress_data["testimonial_navigation_bg_color"]["hover"]) ? $apress_data["testimonial_navigation_bg_color"]["hover"] : '#333333';

//Team
$team_navigation_font_color_regular = !empty($apress_data["team_navigation_font_color"]["regular"]) ? $apress_data["team_navigation_font_color"]["regular"] : '#888888';
$team_navigation_font_color_hover = !empty($apress_data["team_navigation_font_color"]["hover"]) ? $apress_data["team_navigation_font_color"]["hover"] : '#333333';

$team_navigation_bg_color_regular = !empty($apress_data["team_navigation_bg_color"]["regular"]) ? $apress_data["team_navigation_bg_color"]["regular"] : '#888888';
$team_navigation_bg_color_hover = !empty($apress_data["team_navigation_bg_color"]["hover"]) ? $apress_data["team_navigation_bg_color"]["hover"] : '#333333';

// Site Layout CSS Start 
if ( is_rtl() ){

	if($titlebar_text_alignment == 'Left'){
		$titlebartext_alignment = 'right';
	}else if($titlebar_text_alignment == 'Right'){
		$titlebartext_alignment = 'left';
	}else{
		$titlebartext_alignment = 'center';
	}

}else{
	
	if($titlebar_text_alignment == 'Left'){
		$titlebartext_alignment = 'left';
	}elseif($titlebar_text_alignment == 'Right'){
		$titlebartext_alignment = 'right';
	}else{
		$titlebartext_alignment = 'center';
	}
}
$output .= '.zolo-container,body.boxed_layout .layout_design{max-width:'.$site_width.';}';
$output .= '.body.boxed_layout .sticky_header.fixed{max-width:'.$site_width.';}';
$output .= '.pagetitle_parallax_content h1,.pagetitle_parallax{text-align:'.$titlebartext_alignment.';}';

	if($titlebartext_alignment == 'left' || $titlebartext_alignment == 'center'){
	$output .= '.pagetitle_parallax_section.titlebar_style2 h1.entry-title{ float:left;}.pagetitle_parallax_section.titlebar_style2 #crumbs{ float:right;}';
	}else if($titlebartext_alignment == 'right'){
	$output .= '.pagetitle_parallax_section.titlebar_style2 h1.entry-title{ float:right;}.pagetitle_parallax_section.titlebar_style2 #crumbs{ float:left;}';
	}
// Site Layout CSS End 

$output .= '#ajax-loading-screen[data-effect="center_mask_reveal"] span,
#ajax-loading-screen,
#ajax-loading-screen .reveal-1,
#ajax-loading-screen .reveal-2,
#mask{'.$apress_theme_preloader_bg_color.'}';
$output .= '.site_layout{padding-top:'.$sitelayout_padding_top.'; padding-bottom:'.$sitelayout_padding_bottom.';}';

// Top Area CSS Start
$header_typography_css = '';
if(isset($apress_data['header_typography']) && $apress_data['header_typography'] && is_array($apress_data['header_typography'])) {
	if(isset($apress_data['header_typography']['font-family']) && !empty($apress_data['header_typography']['font-family'])) {
		$header_typography_css .= 'font-family: '.esc_attr($apress_data['header_typography']['font-family']).';';
	}
	if(isset($apress_data['header_typography']['font-size']) && !empty($apress_data['header_typography']['font-size'])) {
		$header_typography_css .= 'font-size: '.esc_attr($apress_data['header_typography']['font-size']).';';
	}
	if(isset($apress_data['header_typography']['font-style']) && !empty($apress_data['header_typography']['font-style'])) {
		$header_typography_css .= 'font-style: '.esc_attr($apress_data['header_typography']['font-style']).';';
	}
	if(isset($apress_data['header_typography']['font-weight']) && !empty($apress_data['header_typography']['font-weight'])) {
		$header_typography_css .= 'font-weight: '.esc_attr($apress_data['header_typography']['font-weight']).';';
	}
	if(isset($apress_data['header_typography']['letter-spacing']) && !empty($apress_data['header_typography']['letter-spacing'])) {
		$header_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_typography']['letter-spacing']).';';
	}
	if(isset($apress_data['header_typography']['text-transform']) && !empty($apress_data['header_typography']['text-transform'])) {
		$header_typography_css .= 'text-transform: '.esc_attr($apress_data['header_typography']['text-transform']).';';
	}
	$output .= '.zolo-header-area{'.$header_typography_css.'}';
}

$output .= '.zolo-topbar .zolo_navbar_search.expanded_search_but .nav_search_form_area,.zolo-topbar{'.$apress_theme_header_top_bg_color.'}';
$output .= '.zolo-topbar{
	border-style:'.$header_top_border_style.';
	border-color:'.$header_top_border_color.';
	border-top-width:'.$header_top_border_top.';
	border-right-width:'.$header_top_border_right.';
	border-bottom-width:'.$header_top_border_bottom.';
	border-left-width:'.$header_top_border_left.';}';
$output .= '.zolo-topbar input,.zolo-header-area #lang_sel a.lang_sel_sel,.zolo-topbar a,.zolo-topbar{color:'.$top_bar_font_color_regular.'}';
$output .= '.zolo-topbar .cart-control:before,.zolo-topbar .cart-control:after,.zolo-topbar .nav_search-icon:after{border-color:'.$top_bar_font_color_regular.'}';
$output .= '.zolo-topbar .nav_search-icon.search_close_icon:after,.zolo-topbar .nav_search-icon:before{background:'.$top_bar_font_color_regular.'}';
$output .= '.zolo-topbar a:hover,.zolo-topbar .current-menu-item a{color:'.$top_bar_font_color_hover.';}';
$output .= '.zolo-top-menu ul.sub-menu li a{ border-bottom: 1px solid '.$header_top_menu_sub_sep_color.';}';
$output .= '.zolo-topbar{font-size:'.$topbar_font_size.'px;}';

/*if($apress_data["top_bar_lh"]){
$output .= '.zolo-topbar ul li{line-height:'.$top_bar_l_height.';}';
}*/
$output .= '.zolo-header-area .zolo-social ul.social-icon li a{color:'.$header_social_links_icon_color_regular.';}';
$output .= '.zolo-header-area .zolo-social ul.social-icon li a:hover{color:'.$header_social_links_icon_color_hover.';}';
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{width:'.$header_social_icon_width.'px;}';
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{background:'.$header_social_links_box_color.';}';
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{border:1px solid '.$header_social_box_border_color.';}';
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{-moz-border-radius:'.$header_social_links_boxed_radius.'px;-webkit-border-radius:'.$header_social_links_boxed_radius.'px;-ms-border-radius:'.$header_social_links_boxed_radius.'px;-o-border-radius:'.$header_social_links_boxed_radius.'px;border-radius:'.$header_social_links_boxed_radius.'px; }';
$output .= '.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{padding-top:'.$header_social_boxed_padding_top.';padding-bottom:'.$header_social_boxed_padding_bottom.';}';
$output .= '.zolo-header-area .zolo-social li a,.zolo-header-area .zolo-social.boxed-icons ul.social-icon li a{font-size:'.$header_social_font_size.'px;line-height:'.$header_social_font_size.'px;}';
$output .= '.zolo-header-area .header_element .zolo-social li{padding-left:'.$header_social_boxed_margin_padding_left.';padding-right:'.$header_social_boxed_margin_padding_right.';}';
$output .= '.header_element ul.social-icon{margin-left:-'.$header_social_boxed_margin_padding_left.';margin-right:-'.$header_social_boxed_margin_padding_right.';}';
$output .= '.zolo-top-menu ul.sub-menu{width:'.$topmenu_dropwdown_width.';}';
$output .= '.zolo-top-menu .top-menu li ul.sub-menu li ul.sub-menu{left:'.$topmenu_dropwdown_width.';}';
$output .= '.zolo-top-menu ul.top-menu > li > a{line-height:'.$top_bar_l_height.';}';
$output .= '.zolo-top-menu ul.sub-menu{background:'.$header_top_sub_bg_color_regular.';}';
$output .= '.zolo-top-menu li ul.sub-menu li a:hover{background:'.$header_top_sub_bg_color_hover.';}';
$output .= '.zolo-top-menu li ul.sub-menu li a{color:'.$header_top_menu_sub_color_regular.';}';
$output .= '.zolo-top-menu li ul.sub-menu li a:hover{color:'.$header_top_menu_sub_color_hover.';}';
$output .= '.search_overlay,.header_element .zolo_navbar_search.expanded_search_but .nav_search_form_area{background:'.$fullscreen_expanded_search_bg.'!important; }';
$output .= '.full_screen_search input,.full_screen_search .search-form::after{ color:'.$fullscreen_expanded_search_font_color.'!important; }';
$output .= '.search_overlay #mob_search_close_but:after, .search_overlay .search_close_but:after,
.search_overlay #mob_search_close_but:before, .search_overlay .search_close_but:before{ border-color:'.$fullscreen_expanded_search_font_color.'!important; }';
$output .= '.full_screen_search input{border-color:'.$fullscreen_expanded_search_font_color.'!important;}';
$output .= '.full_screen_search input::-webkit-input-placeholder{color:'.$fullscreen_expanded_search_font_color.';}';
$output .= '.full_screen_search input::-moz-placeholder{color:'.$fullscreen_expanded_search_font_color.';}';
$output .= '.full_screen_search input::-ms-input-placeholder{color:'.$fullscreen_expanded_search_font_color.';}';
$output .= '.full_screen_search input:-o-placeholder{color:'.$fullscreen_expanded_search_font_color.';}';

// Top Area CSS End 

// Header Area CSS Start

$output .= '.header_section_one .header_left{width:'.$column_1_value_padding_top.';}';
$output .= '.header_section_one .header_center{width:'.$column_1_value_padding_right.';}';
$output .= '.header_section_one .header_right{width:'.$column_1_value_padding_bottom.';}';

$output .= '.header_section_two .header_left{width:'.$column_2_value_padding_top.';}';
$output .= '.header_section_two .header_center{width:'.$column_2_value_padding_right.';}';
$output .= '.header_section_two .header_right{width:'.$column_2_value_padding_bottom.';}';

$output .= '.header_section_three .header_left{width:'.$column_3_value_padding_top.';}';
$output .= '.header_section_three .header_center{width:'.$column_3_value_padding_right.';}';
$output .= '.header_section_three .header_right{width:'.$column_3_value_padding_bottom.';}';

$output .= '.header_section_one{height:'.$top_bar_l_height.';}';
$output .= '.header_section_two .zolo-navigation ul li.zolo-middle-logo-menu-logo,.header_section_two{height:'.$section_2_height.';}';
$output .= '.header_section_three .zolo-navigation ul li.zolo-middle-logo-menu-logo,.header_section_three{height:'.$section_3_height.';}';
$output .= '.header_section_one li.shopping_cart{line-height:'.$top_bar_l_height.';}';
$output .= '.header_section_two li.shopping_cart{line-height:'.$section_2_height.';}';
$output .= '.header_section_three li.shopping_cart{line-height:'.$section_3_height.';}';

//Header Img Background 

if($page_header_bg_img || $page_header_bg_color){
	
	$output .= '.headerbackground,.header_background{
		background-image:url("'.$page_header_bg_img.'");
		background-color:'.$page_header_bg_color.';
	}';
	//Header Img Background Repeat(page option)
	$header_bg_repeat = get_post_meta( $cur_id, 'zt_header_bg_repeat', true ); 
	if($header_bg_repeat != 'default' || $header_bg_repeat != ''){ 
		$output .= '.headerbackground,.header_background{background-repeat:'.$header_bg_repeat.';}';
	}
	//Header Img Background 100% (page option)
	$header_100per_bg = get_post_meta( $cur_id, 'zt_header_100per_bg', true ); 
	if($header_100per_bg == 'yes'){
	$output .='.headerbackground, .header_background {-moz-background-size:cover;-webkit-background-size:cover;-ms-background-size:cover;-o-background-size:cover;background-size:cover;}';
	}elseif($header_100per_bg == 'no'){
	$output .= '.headerbackground,.header_background{-moz-background-size:inherit;-webkit-background-size:inherit;-ms-background-size:inherit;-o-background-size:inherit;background-size:inherit;}';
	}
	
	
	}else{
		
		$header_bg_css = '';
		if(isset($apress_data['header_background_img']['background-image']) && !empty($apress_data['header_background_img']['background-image'])){
			$header_bg_css .= 'background-image: url('.esc_url($apress_data['header_background_img']['background-image']).');';
			}
		if(isset($apress_data['header_background_img']['background-color']) && !empty($apress_data['header_background_img']['background-color'])){
			$header_bg_css .= 'background-color: '.esc_attr($apress_data['header_background_img']['background-color']).';';
			}
		if(isset($apress_data['header_background_img']['background-repeat']) && !empty($apress_data['header_background_img']['background-repeat'])){
			$header_bg_css .= 'background-repeat:'.$apress_data['header_background_img']['background-repeat'].';';
			}
		if(isset($apress_data['header_background_img']['background-size']) && !empty($apress_data['header_background_img']['background-size'])){
			$header_bg_css .= 'background-size:'.$apress_data['header_background_img']['background-size'].';';
			}
		if(isset($apress_data['header_background_img']['background-position']) && !empty($apress_data['header_background_img']['background-position'])){
			$header_bg_css .= 'background-position:'.$apress_data["header_background_img"]["background-position"].';';
			}
		if(isset($apress_data['header_background_img']['background-attachment']) && !empty($apress_data['header_background_img']['background-attachment'])){
			$header_bg_css .= 'background-attachment:'.$apress_data["header_background_img"]["background-attachment"].';';
			}
		$output .= '.headerbackground,.header_background{'.$header_bg_css.'}';
		
		
//Header Color Background 

$output .= '.header_category_search_wrapper select option,.headerbackground,.header_background{background-color:'.$header_background_img_background_color.';}';
}

//Header section two Background Color
$output .= 'header.zolo_header .zolo-header_section2_background{'.$apress_theme_section2_header_bg_color.'}';

$output .= 'header.zolo_header .zolo-header_section2_background{
	border-style:'.$header_border_style.';
	border-color:'.$header_border_color.';
	border-top-width:'.$header_border_top.';
	border-right-width:'.$header_border_right.';
	border-bottom-width:'.$header_border_bottom.';
	border-left-width:'.$header_border_left.';}';


if($vertical_header_shadow == 'on'){
$output .= '.zolo_vertical_header .header_category_search_wrapper select option,.zolo_vertical_header .headerbackground,.zolo_vertical_header .header_background{box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);}';
}
$output .= '.header_element .zolo_navbar_search.default_search_but .nav_search_form_area{top:'.$searchbox_position.'px;}';
$output .= '.header_section_two a,.header_section_two{color:'.$section2_font_color_regular.';}';
$output .= '.header_section_two a:hover{color:'.$section2_font_color_hover.';}';
$output .= '.header_section_two .cart-control:before,.header_section_two .cart-control:after,.header_section_two .nav_search-icon:after{border-color:'.$section2_font_color_regular.'}';
$output .= '.header_section_two .nav_search-icon.search_close_icon:after,.header_section_two .nav_search-icon:before{background:'.$section2_font_color_regular.'}';
$output .= '.header_section_two{font-size:'.$section2_font_size.'px;}';
$output .= '.zolo-header-area .header_section_two .top-tagline, .zolo-header-area .header_section_two .header_right_img, .zolo-header-area .header_section_two .header_htmltext, .zolo-header-area .header_section_two .header_working_hours, .zolo-header-area .header_section_two .header_address{line-height:'.$section2_line_height.'px;}';
$output .= '.header_section_three a,.header_section_three{color:'.$section3_font_color_regular.';}';
$output .= '.header_section_three a:hover{color:'.$section3_font_color_hover.';}';
$output .= '.header_section_three .cart-control:before,.header_section_three .cart-control:after,.header_section_three .nav_search-icon:after{border-color:'.$section3_font_color_regular.'}';
$output .= '.header_section_three .nav_search-icon.search_close_icon:after,.header_section_three .nav_search-icon:before{background:'.$section3_font_color_regular.'}';
$output .= '.header_section_three{font-size:'.$section3_font_size.'px;}';
$output .= '.zolo-header-area .header_section_three .top-tagline, .zolo-header-area .header_section_three .header_right_img, .zolo-header-area .header_section_three .header_htmltext, .zolo-header-area .header_section_three .header_working_hours, .zolo-header-area .header_section_three .header_address{line-height:'.$section3_line_height.'px;}';
$output .= '.zolo_vertical_header a,.zolo_vertical_header{color:'.$vertical_hd_font_color_regular.';}';
$output .= '.zolo_vertical_header a:hover{color:'.$vertical_hd_font_color_hover.';}';
$output .= '.zolo_vertical_header{font-size:'.$vertical_hd_font_size.'px;}';
$output .= '.zolo_vertical_header .vertical_fix_menu .top-tagline, .zolo_vertical_header .vertical_fix_menu .header_right_img{line-height:'.$vertical_hd_line_height.'px;}';

// Header Area CSS End

//Logo CSS Here Start
if(isset($apress_data["logo_margin"])){
$output .= '.logo-box{padding:'.$apress_data["logo_margin"]["padding-top"].' '.$apress_data["logo_margin"]["padding-right"].' '.$apress_data["logo_margin"]["padding-bottom"].' '.$apress_data["logo_margin"]["padding-left"].';}';
}

if(isset($apress_data["retina_logo_height_width"])){
$output .= '.logo-box a{max-width:'.$apress_data["retina_logo_height_width"]["width"].';}';
}
if(isset($apress_data["retina_logo_height_width"])){
$output .= '.logo-box a{max-height:'.$apress_data["retina_logo_height_width"]["height"].';}';
$output .= '.logo-box a img{max-height:'.$apress_data["retina_logo_height_width"]["height"].';}';
}

//Logo CSS Here End

$section1element_space = $section1_element_space / 2;
$output .= '.header_section_one ul.header_center_col > li, .header_section_one ul.header_left_col > li, .header_section_one ul.header_right_col > li{padding:0 '.$section1element_space.'px;}';
if($section1_element_separator != 'large_separator'){
$output .= '.header_section_one .zolo-top-menu ul,.header_section_one ul.header_left_col,.header_section_one ul.header_right_col,.header_section_one ul.header_center_col{margin:0 -'.$section1element_space.'px;}';
}

$section2element_space = $section2_element_space / 2;
$section2element_space2 = $section2_element_space / 2 + 60;
$output .= '.header_section_two ul.header_center_col > li, .header_section_two ul.header_left_col > li, .header_section_two ul.header_right_col > li{padding:0 '.$section2element_space.'px;}';
if($section2_element_separator != 'large_separator'){
$output .= '.header_section_two .zolo-navigation > ul,.header_section_two ul.header_left_col,.header_section_two ul.header_right_col,.header_section_two ul.header_center_col{margin:0 -'.$section2element_space.'px;}';
}

$output .= '.header_section_two .zolo-navigation > ul{margin:0 -'.$section2element_space.'px;}';
$output .= '.header_section_two .vertical_menu_area.vertical_menu_open{right:'.$section2element_space.'px;}';
$output .= '.header_section_two .header_left .vertical_menu_area.vertical_menu_open{left:'.$section2element_space.'px;}';
$output .= '.header_section_two .horizontal_menu_area{padding-right:'.$section2element_space2.'px;}';
$output .= '.header_section_two .header_left .horizontal_menu_area{padding-left:'.$section2element_space2.'px;}';

$section3element_space = $section3_element_space / 2;
$section3element_space2 = $section3_element_space / 2 + 60;
$output .= '.header_section_three ul.header_center_col > li, .header_section_three ul.header_left_col > li, .header_section_three ul.header_right_col > li{padding:0 '.$section3element_space.'px;}';
if($section3_element_separator != 'large_separator'){
$output .= '.header_section_three .zolo-navigation > ul,.header_section_three ul.header_left_col,.header_section_three ul.header_right_col,.header_section_three ul.header_center_col{margin:0 -'.$section3element_space.'px;}';
}
$output .= '.header_section_three .zolo-navigation > ul{margin:0 -'.$section3element_space.'px;}';
$output .= '.header_section_three .vertical_menu_area.vertical_menu_open{right:'.$section3element_space.'px;}';
$output .= '.header_section_three .header_left .vertical_menu_area.vertical_menu_open{left:'.$section3element_space.'px;}';
$output .= '.header_section_three .horizontal_menu_area{padding-right:'.$section3element_space2.'px;}';
$output .= '.header_section_three .header_left .horizontal_menu_area{padding-left:'.$section3element_space2.'px;}';


//Element Separator CSS Start
if($element_separator != 'no_separator'){
$output .= 'ul.header_center_col > li.element_separator .element_separator_bar,
ul.header_left_col > li.element_separator .element_separator_bar,
ul.header_right_col > li.element_separator .element_separator_bar{background:'.$element_separator_color.';}';
}
if($element_separator == 'large_separator'){
$output .= '.header_section_one ul.header_center_col > li.element_separator .element_separator_bar.large_separator,
.header_section_one ul.header_left_col > li.element_separator .element_separator_bar.large_separator,
.header_section_one ul.header_right_col > li.element_separator .element_separator_bar.large_separator{height:'.$top_bar_l_height.';}';
$output .= '.header_section_two ul.header_center_col > li.element_separator .element_separator_bar.large_separator,
.header_section_two ul.header_left_col > li.element_separator .element_separator_bar.large_separator,
.header_section_two ul.header_right_col > li.element_separator .element_separator_bar.large_separator{height:'.$section_2_height.';}';
$output .= '.header_section_three ul.header_center_col > li.element_separator .element_separator_bar.large_separator,
.header_section_three ul.header_left_col > li.element_separator .element_separator_bar.large_separator,
.header_section_three ul.header_right_col > li.element_separator .element_separator_bar.large_separator{height:'.$section_3_height.';}';
}

if($section1_element_separator){
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:first-child:before, .header_section_one ul.header_left_col > li:first-child:before, .header_section_one ul.header_right_col > li:first-child:before, .header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{background:'.$section1_element_separator_color.';}';
}
if($section1_element_separator == 'large_separator'){
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:first-child:before, .header_section_one ul.header_left_col > li:first-child:before, .header_section_one ul.header_right_col > li:first-child:before,.header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{height:'.$top_bar_l_height.';}';
$output .= '.zolo-top-menu ul > li:last-child:after{display:none;}';

}else if($section1_element_separator == 'small_separator'){
	
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{height:15px;}';
$output .= '.zolo-top-menu ul > li:last-child:after,
.header_section_one ul.header_center_col > li:last-child:after, .header_section_one ul.header_left_col > li:last-child:after, .header_section_one ul.header_right_col > li:last-child:after{display:none;}';

}else if($section1_element_separator == 'oblique_separator'){
$output .= '.zolo-top-menu ul > li:after,
.header_section_one ul.header_center_col > li:after, .header_section_one ul.header_left_col > li:after, .header_section_one ul.header_right_col > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.zolo-top-menu ul > li:last-child:after,
.header_section_one ul.header_center_col > li:last-child:after, .header_section_one ul.header_left_col > li:last-child:after, .header_section_one ul.header_right_col > li:last-child:after{display:none;}';
}


if($section2_element_separator){
$output .= '.header_section_two ul.header_center_col > li:first-child:before, .header_section_two ul.header_left_col > li:first-child:before, .header_section_two ul.header_right_col > li:first-child:before, .header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{background:'.$section2_element_separator_color.';}';
}
if($section2_element_separator == 'large_separator'){
$output .= '.header_section_two ul.header_center_col > li:first-child:before, .header_section_two ul.header_left_col > li:first-child:before, .header_section_two ul.header_right_col > li:first-child:before,.header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{height:'.$section_2_height.';}';

}else if($section2_element_separator == 'small_separator'){
	
$output .= '.header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{height:15px;}';
$output .= '.header_section_two ul.header_center_col > li:last-child:after, .header_section_two ul.header_left_col > li:last-child:after, .header_section_two ul.header_right_col > li:last-child:after{display:none;}';

}else if($section2_element_separator == 'oblique_separator'){
	
$output .= '.header_section_two ul.header_center_col > li:after, .header_section_two ul.header_left_col > li:after, .header_section_two ul.header_right_col > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.header_section_two ul.header_center_col > li:last-child:after, .header_section_two ul.header_left_col > li:last-child:after, .header_section_two ul.header_right_col > li:last-child:after{display:none;}';
}

if($section3_element_separator){
$output .= '.header_section_three ul.header_center_col > li:first-child:before, .header_section_three ul.header_left_col > li:first-child:before, .header_section_three ul.header_right_col > li:first-child:before,.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{background:'.$section3_element_separator_color.';}';
}
if($section3_element_separator == 'large_separator'){
	
$output .= '.header_section_three ul.header_center_col > li:first-child:before, .header_section_three ul.header_left_col > li:first-child:before, .header_section_three ul.header_right_col > li:first-child:before,.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{height:'.$section_3_height.';}';
}else if($section3_element_separator == 'small_separator'){
	
$output .= '.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{height:15px;}';
$output .= '.header_section_three ul.header_center_col > li:last-child:after, .header_section_three ul.header_left_col > li:last-child:after, .header_section_three ul.header_right_col > li:last-child:after{display:none;}';

}else if($section3_element_separator == 'oblique_separator'){
	
$output .= '.header_section_three ul.header_center_col > li:after, .header_section_three ul.header_left_col > li:after, .header_section_three ul.header_right_col > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.header_section_three ul.header_center_col > li:last-child:after, .header_section_three ul.header_left_col > li:last-child:after, .header_section_three ul.header_right_col > li:last-child:after{display:none;}';
}


if($menu_separator){
$output .= '.zolo-navigation ul > li:first-child:before,
.zolo-navigation ul > li:after{background:'.$menu_separator_color.';}';
}
if($menu_separator == 'large_separator'){

$output .= '.header_section_three .zolo-navigation ul > li:after, .header_section_three .zolo-navigation ul > li:first-child:before{height:'.$section_3_height.';}';

$output .= '.header_section_two .zolo-navigation ul > li:after, .header_section_two .zolo-navigation ul > li:first-child:before{height:'.$section_2_height.';}';

}else if($menu_separator == 'small_separator'){

$output .= '.zolo-navigation ul > li:after{height:15px;}';
$output .= '.zolo-navigation ul > li:last-child:after{display:none;}';

}else if($menu_separator == 'oblique_separator'){
	
$output .= '.zolo-navigation ul > li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.zolo-navigation ul > li:last-child:after{display:none;}';
}
//Social Separator CSS Start
if($header_social_separator){
$output .= '.zolo-header-area ul .zolo-social li:first-child:before,
.zolo-header-area ul .zolo-social li:after{background:'.$header_social_separator_color.';}';
}
if($header_social_separator == 'large_separator'){

$output .= '.zolo-header-area .header_section_three ul .zolo-social li:after{height:'.$section_3_height.';}';
$output .= '.zolo-header-area .header_section_two ul .zolo-social li:after{height:'.$section_2_height.';}';
$output .= '.zolo-header-area .header_section_one ul .zolo-social li:after{height:'.$top_bar_l_height.';}';
$output .= '.zolo-header-area ul .zolo-social li:last-child:after{display:none;}';

}else if($header_social_separator == 'small_separator'){

$output .= '.zolo-header-area ul .zolo-social li:after{height:15px;}';
$output .= '.zolo-header-area ul .zolo-social li:last-child:after{display:none;}';

}else if($header_social_separator == 'oblique_separator'){
	
$output .= '.zolo-header-area ul .zolo-social li:after{height:15px;-moz-transform:translate(0px, -50%) rotate(18deg);-webkit-transform:translate(0px, -50%) rotate(18deg);-ms-transform:translate(0px, -50%) rotate(18deg);-o-transform:translate(0px, -50%) rotate(18deg);transform:translate(0px, -50%) rotate(18deg);}';
$output .= '.zolo-header-area ul .zolo-social li:last-child:after{display:none;}';
}
//Social Separator CSS End
//Element Separator CSS End



// Navigation CSS Here Start

// Vertical Menu Css Start
$header_main_menu = isset($apress_data['vertical_menu_design']) ? $apress_data['vertical_menu_design'] : 'menu5' ;
if($header_main_menu == 'menu5' || $header_main_menu == 'vertical_menu_hover_5'){ 
	$output .= '.menu_hover_style5 .zolo-navigation ul > li a:after {'.$menu_hover_bg_first_level.' border-right:'.$nav_highlight_border.'px solid transparent;'.$nav_highlightborder_color.'height: 100%;width: 100%;position: absolute;top: 0;left: -150%;content: "";transition: 0.4s all;-webkit-transition: 0.4s all;-moz-transition: 0.4s all;z-index: -1;
	}';
	$output .= '.menu_hover_style5 .zolo-navigation ul > .current-menu-ancestor a:after, .menu_hover_style5 .zolo-navigation ul > .current_page_item a:after, .menu_hover_style5 .zolo-navigation ul > .current-menu-item a:after, .menu_hover_style5 .zolo-navigation ul > .current-menu-parent a:after, .menu_hover_style5 .zolo-navigation ul > li:hover a:after {left: 0;}';
	$output .= '.menu_hover_style5 .zolo-navigation ul > li ul > li a:after, .menu_hover_style5 .zolo-navigation ul > li.current-menu-ancestor ul > li a:after {display: none;}';
	$output .= '.zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul > li a:after {border-right: 0;border-left:'.$nav_highlight_border.'px solid transparent;'.$nav_highlightborder_color.'left: 150%;}';	
	$output .= '.zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul > .current-menu-ancestor a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul .current_page_item a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul .current-menu-item a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul > .current-menu-parent a:after, .zolo_right_vertical_header .menu_hover_style5 .zolo-navigation ul li:hover a:after {
		left: 0;
	}';
}elseif($header_main_menu == 'menu6'){ 
	$output .= '.zolo-navigation ul > li a {overflow: hidden;}';
	$output .= '.zolo-navigation ul > li a:after {'.$menu_hover_bg_first_level.' border-right:'.$nav_highlight_border.'px solid transparent;'.$nav_highlightborder_color.'height: 100%;width: 100%;position: absolute;top: 0;right: 100%;content: "";z-index: -1;}';
	$output .= '.zolo_right_vertical_header .zolo-navigation ul > li a:after {border-left:'.$nav_highlight_border.'px solid transparent; '.$nav_highlightborder_color.' border-right: 0;}';
	$output .= '.zolo-navigation ul > .current-menu-ancestor a:after, .zolo-navigation ul > .current_page_item a:after, .zolo-navigation ul > .current-menu-item a:after, .zolo-navigation ul > .current-menu-parent a:after, .zolo-navigation ul > li:hover a:after {left: 0;}';
	$output .= '.zolo-navigation ul > li ul > li a:after, .zolo-navigation ul > li.current-menu-ancestor ul > li a:after {display: none;}';
	
}elseif($header_main_menu == 'menu7'){
	$output .= '.zolo_vertical_header .zolo-navigation ul.menu_hover_design7 li a {display: inline-block;}';	
	$output .= '.zolo_vertical_header .zolo-navigation ul.menu_hover_design7 li ul a {display: block;}';
	
	$output .= '.zolo_vertical_header .zolo-navigation ul.menu_hover_design7 li.current_page_item a:after,.zolo_vertical_header .zolo-navigation ul.menu_hover_design7 li.current-menu-item a:after, .zolo-navigation ul > .current-menu-parent a:after, .zolo-navigation ul li:hover a:after {border-bottom:'.$nav_highlight_border.'px solid transparent; '.$nav_highlightborder_color.'position: absolute;bottom: 0;left: 0;content: "";width: 100%;}';
	$output .= '.zolo-navigation ul > li ul > li a:after, .zolo-navigation ul > li.current-menu-ancestor ul > li a:after {display: none;}';
} 
// Vertical Menu Css End

if(!empty($apress_data["nav_typography"])){
$output .= '.mobile-nav ul li,.zolo-navigation,.zolo-navigation ul li, .zolo-navigation ul li a{font-family:'.$apress_data["nav_typography"]["font-family"].','.$apress_data["nav_typography"]["font-backup"].';font-size:'.$apress_data["nav_typography"]["font-size"].';line-height:'.$apress_data["nav_typography"]["line-height"].';font-style:'.$apress_data["nav_typography"]["font-style"].';font-weight:'.$apress_data["nav_typography"]["font-weight"].';letter-spacing:'.$apress_data["nav_typography"]["letter-spacing"].';
text-transform:'.$apress_data["nav_typography"]["text-transform"].';}';
$output .= '.zolo-navigation ul li{text-align:'.$apress_data["nav_typography"]["text-align"].';}';
}

$output .= '.header_element .zolo-navigation > ul > li{padding:'.$nav_item_margin_padding_top.' '.$nav_item_margin_padding_right.' '.$nav_item_margin_padding_bottom.' '.$nav_item_margin_padding_left.';}';
$output .= '.zolo-navigation ul li a{padding:'.$nav_item_padding_top.' '.$nav_item_padding_right.' '.$nav_item_padding_bottom.' '.$nav_item_padding_left.';}';
$output .= '.zolo-navigation .zolo-megamenu-wrapper .zolo-megamenu-widgets-container ul li a,.zolo-navigation .zolo-megamenu-wrapper,.zolo-navigation .zolo-megamenu-wrapper a,.zolo-navigation ul li ul.sub-menu li a{font-size:'.$nav_dropdown_font_size.'px;line-height:normal;}';
$output .= '.zolo-navigation .zolo-megamenu-wrapper div.zolo-megamenu-title{font-size:'.$megamenu_title_size.'px;}';
$output .= '.header_element.header_section_three .zolo_navbar_search.expanded_search_but .nav_search_form_area, .navigation-area{'.$apress_theme_section3_header_bg_color.';}';
$output .= '.navigation-area{border-style:'.$navbar_border_width_style.';border-top-width:'.$navbar_border_width_top.';border-right-width:'.$navbar_border_width_right.';border-bottom-width:'.$navbar_border_width_bottom.';border-left-width:'.$navbar_border_width_left.';}';
$output .= '.navigation-area{border-color:'.$navbar_border_color.';}';
$output .= '.zolo_vertical_header,.zolo-navigation ul li{text-align:'.$ver_header_align.';}';
$output .= '.zolo_vertical_header .zolo-navigation ul li ul li{text-align:left;}';

// Navigation Color 
$output .= '.zolo-navigation ul li.navbar_cart a,.zolo-navigation ul li.navbar_cart a:hover,.zolo-navigation ul li.navbar_cart:hover a,.zolo-navigation ul li.zolo-small-menu span,.zolo-navigation ul li.zolo-search-menu span{color:'.$menu_icon_color.';cursor:pointer;}';
$output .= '.nav_button_toggle .nav_bar{background:'.$menu_icon_color.'!important;}';
$output .= '.zolo-navigation ul li a{color:'.$menu_first_level_color_regular.';}';
$output .= '.zolo-navigation ul li a.current,.zolo-navigation ul .current-menu-ancestor a,.zolo-navigation ul .current_page_item a, .zolo-navigation ul .current-menu-item a,.zolo-navigation ul > .current-menu-parent a,.zolo-navigation ul li:hover a{'.$apress_theme_main_menu_hover_color.';}';
$output .= '.zolo_vertical_header .zolo-navigation ul > li{border-right:0;border-bottom:1px solid '.$vertical_header_menu_sep_color.';}';
$output .= '.zolo_vertical_header .zolo-navigation ul > li ul li{border-right:0;border-bottom:0;}';

// Sub Menu 
$output .= '.zolo-navigation ul li ul.sub-menu,ul.sub-menu{width:'.$dropdown_menu_width.';}';

if ( is_rtl() ){
	$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li ul.sub-menu,.zolo-navigation ul li ul.sub-menu li ul.sub-menu{left:auto;right:'.$dropdown_menu_width.';}';
}else{
	$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li ul.sub-menu,.zolo-navigation ul li ul.sub-menu li ul.sub-menu{left:'.$dropdown_menu_width.';}';
}

$output .= '.zolo_right_vertical_header .zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li ul.sub-menu{right:'.$dropdown_menu_width.'; left:auto;}';
$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu,.zolo-navigation ul li ul.sub-menu,.zolo-navigation .zolo-megamenu-wrapper{margin-top:'.$nav_item_margin_padding_bottom.';}';
$output .= '.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu ul.sub-menu,.zolo-navigation ul li ul.sub-menu ul.sub-menu{margin-top:0;}';
$output .= '.zolo-navigation .zolo-megamenu-wrapper a,.zolo-navigation .zolo-megamenu-wrapper li ul.sub-menu li a,.zolo-navigation ul li.zolo-dropdown-menu ul.sub-menu li a,.zolo-navigation ul li ul.sub-menu li a{padding-top:'.$dropdown_item_top_bottom_padding_top.';padding-bottom:'.$dropdown_item_top_bottom_padding_bottom.';}';
$output .= '.zolo-navigation ul li ul.sub-menu li a{padding-left:20px;padding-right:20px;}';
if($megamenu_shadow == 'on'){
$output .= '.zolo-navigation ul ul.sub-menu,.zolo-megamenu-wrapper .zolo-megamenu-holder,.zolo-megamenu-wrapper .zolo-megamenu-holder,li.zolo-dropdown-menu ul.sub-menu{box-shadow:0 0 4px rgba(0, 0, 0, 0.15);}';
}
$output .= '.zolo-megamenu-wrapper .zolo-megamenu-holder,ul.sub-menu,.zolo-navigation ul li ul li a{background:'.$menu_sub_bg_color_regular.';}';
$output .= '.zolo-navigation ul li ul li a:hover, .zolo-navigation ul li ul li.current-menu-item > a{background:'.$menu_sub_bg_color_hover.';}';
$output .= '.zolo-navigation ul .current-menu-ancestor ul.zolo-megamenu li div.zolo-megamenu-title a span.menu-text, .sticky_header.fixed.header_background .zolo-navigation ul li:hover ul li a span.menu-text,.zolo-navigation .zolo-megamenu-wrapper,.zolo-navigation .zolo-megamenu-wrapper h3 span.menu-text,.zolo-navigation ul .current-menu-ancestor ul .current-menu-item li a span.menu-text,.zolo-navigation ul .current-menu-ancestor ul li a span.menu-text,.zolo-navigation ul li:hover ul li a span.menu-text{color:'.$submenu_font_color_regular.';}';
$output .= '.zolo-navigation ul .current-menu-ancestor ul.zolo-megamenu li div.zolo-megamenu-title a:hover span.menu-text, .sticky_header.fixed.header_background .zolo-navigation ul li:hover ul li a:hover span.menu-text, .zolo-navigation ul .current-menu-ancestor ul .current-menu-item li a:hover span.menu-text, .zolo-navigation ul .current-menu-ancestor ul .current-menu-item a span.menu-text, .zolo-navigation ul li:hover ul li a:hover span.menu-text{'.$apress_theme_submenu_hover_color.';}';
$output .= '.zolo-navigation ul li ul.sub-menu li a{border-bottom:1px solid '.$menu_sub_sep_color.';}';
$output .= '.zolo-navigation .zolo-megamenu-wrapper .zolo-megamenu-submenu{border-color:'.$menu_sub_sep_color.'!important;}'; 
$output .= '.horizontal_menu_area,.full_screen_menu_area, .full_screen_menu_area_responsive{background:'.$fullscreen_hosizontal_menu_bg_color.';}'; 
$output .= '.full_screen_menu li a{color:'.$fullscreen_menu_font_color.'!important;}';
$output .= '.full_screen_menu_area .fullscreen_menu_close_button::after, .full_screen_menu_area .fullscreen_menu_close_button::before, #full_screen_menu_close_responsive::after, #full_screen_menu_close_responsive::before{border-color:'.$fullscreen_menu_font_color.'!important;}';
$output .= '.navigation .zolo_navbar_search.expanded_search_but .nav_search_form_area input{color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input::-webkit-input-placeholder {color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input::-moz-placeholder {color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input:-ms-input-placeholder {color:'.$menu_first_level_color_regular.';}';
$output .= '.navigation .zolo_navbar_search .nav_search_form_area input:-moz-placeholder{color:'.$menu_first_level_color_regular.';}';
$output .= '.zolo-navigation ul ul.sub-menu,.zolo-megamenu-wrapper .zolo-megamenu-holder{border-top: '.$menu_dropdown_topborder_top.'  '.$menu_dropdown_topborder_style.' '.$menu_dropdown_topborder_color.';}';
$output .= '.zolo-navigation ul ul.sub-menu ul.sub-menu{top:-'.$menu_dropdown_topborder_top.';}';
$output .= '.zolo_vertical_header .zolo-navigation ul ul.sub-menu, .zolo_vertical_header .zolo-megamenu-wrapper .zolo-megamenu-holder{border-top:0;border-left:'.$menu_dropdown_topborder_top.'  '.$menu_dropdown_topborder_style.' '.$menu_dropdown_topborder_color.';}';
$output .= '.zolo_right_vertical_header .zolo_vertical_header .zolo-navigation ul ul.sub-menu,.zolo_right_vertical_header .zolo_vertical_header .zolo-megamenu-wrapper .zolo-megamenu-holder{border-top:0;border-left:0;border-right: '.$menu_dropdown_topborder_top.'  '.$menu_dropdown_topborder_style.' '.$menu_dropdown_topborder_color.';}';
$output .= '.menu_hover_style4 .zolo-navigation ul li a:before,.menu_hover_style3 .zolo-navigation ul li a:before,.menu_hover_style1 .zolo-navigation ul li a:before{border-bottom: '.$nav_highlight_border.'px solid transparent;'.$nav_highlightborder_color.'}';
$output .= '.menu_hover_style4 .zolo-navigation ul li a:after{border-top: '.$nav_highlight_border.'px solid transparent; '.$nav_highlightborder_color.'}';
$output .= '.menu_hover_style2 .zolo-navigation ul li a:before{border-width: '.$nav_highlight_border.'px 0 '.$nav_highlight_border.'px 0!important;}';
$output .= '.menu_hover_style2 .zolo-navigation ul li a:after{border-width: 0 '.$nav_highlight_border.'px 0 '.$nav_highlight_border.'px!important;}';
$output .= '.menu_hover_style2 .zolo-navigation ul li a:before, .menu_hover_style2 .zolo-navigation ul li a:after{'.$nav_highlightborder_color.'}';
$output .= '.vertical_menu_area .zolo-navigation li a{background:'.$vertical_menu_bg_color.';}';
$output .= '.vertical_menu_area .zolo-navigation li a:hover{'.$menu_hover_bg_first_level.'}';

$output .= '.zolo_header4 .vertical_menu_box .zolo-navigation .vertical_menu_area li a{color:'.$menu_first_level_color_regular.';}';
$output .= '.zolo_header4 .vertical_menu_box .zolo-navigation .vertical_menu_area li a:hover{'.$apress_theme_main_menu_hover_color.';}';

// Main menu design start
if($main_menu_design == 'menu2'){
$output .= '.zolo-navigation ul .current-menu-ancestor a,.zolo-navigation ul li a.current,.zolo-navigation ul .current_page_item a,.zolo-navigation ul .current-menu-item a,.zolo-navigation ul .current-menu-parent a,.zolo-navigation ul li:hover a{'.$menu_hover_bg_first_level.'}';
}else if($main_menu_design == 'menu3'){	
 $output .= '.zolo-navigation ul li a.current:after,.zolo-navigation ul .current_page_item a:after,.zolo-navigation ul .current-menu-item a:after,.zolo-navigation ul > .current-menu-parent a:after,.zolo-navigation ul li:hover a:after{border-top:'.$nav_highlight_border.'px solid transparent;'.$nav_highlightborder_color.' position:absolute; top:0; left:0; content:""; width:100%;}';
 $output .= '.zolo-navigation ul li ul li a:after{ display:none;}';
}else if($main_menu_design == 'menu4'){	
 $output .= '.zolo-navigation ul li a.current:before,.zolo-navigation ul .current_page_item a:before,.zolo-navigation ul .current-menu-item a:before,.zolo-navigation ul > .current-menu-parent a:before,.zolo-navigation ul li:hover a:before{ border-top:'.$nav_highlight_border.'px solid transparent; '.$nav_highlightborder_color.' position:absolute; bottom:0; left:0; content:""; width:100%;}';
 $output .= '.zolo-navigation ul li ul li a:before{ display:none;}';
}
// Main menu design end

// Navigation CSS Here End 

// Horizontal and Vertical Menu CSS Start 

$output .= '.horizontal_menu_area{width:'.$horizontal_menu_max_width.';}';
$output .= '.vertical_menu_area{width:'.$vertical_menu_max_width.';}';
$output .= '.vertical_menu_area{top:'.$vertical_menu_space_top.'px;}';


// Vertical Header CSS Start 
$output .= '.zolo_vertical_header .vertical_fix_header_box,.zolo_vertical_header header.zolo_header{width:'.$side_header_width.';}';
$output .= '.zolo_left_vertical_header .zolo_vertical_header_topbar,.zolo_left_vertical_header .zolo_footer_area,.zolo_left_vertical_header .zolo_main_content_area{margin-left:'.$side_header_width.';}';
$output .= '.zolo_right_vertical_header .zolo_vertical_header_topbar,.zolo_right_vertical_header .zolo_footer_area,.zolo_right_vertical_header .zolo_main_content_area{margin-right:'.$side_header_width.';}';

if(isset($apress_data["vertical_element_space"])){
$output .= '.zolo_vertical_header .vertical_fix_menu .header_left ul.header_left_col > li{padding:'.$vertical_element_space_padding_top.' '.$vertical_element_space_padding_right.' '.$vertical_element_space_padding_bottom.' '.$vertical_element_space_padding_left.';}';
$output .= '.vertical_header_menu .zolo-navigation ul li a,.vertical_header_menu .zolo-navigation ul.menu_hover_design7 > li{padding-left:'.$vertical_element_space_padding_left.';padding-right:'.$vertical_element_space_padding_right.';}';
$output .= '.vertical_header_menu .zolo-navigation ul.menu_hover_design7 > li > a{padding-left:0;padding-right:0;}';
}
$output .= '.zolo_vertical_header .zolo-navigation ul li.zolo-dropdown-menu ul ul{top:0; margin-left:-'.$menu_dropdown_topborder_top.';}';
$output .= '.zolo_right_vertical_header .zolo_vertical_header .zolo-navigation ul li.zolo-dropdown-menu ul ul{top:0; margin-right:-'.$menu_dropdown_topborder_top.';}';
// Vertical Header CSS End 

// Sticky Header CSS Start 

$output .= '.sticky_header_area{'.$apress_theme_sticky_header_bg_color.'}';
$output .= '.sticky_header_area .navigation-area,
.sticky_header_area header.zolo_header .zolo-header_section2_background,
.mobile_header_area header.zolo_header .zolo-header_section2_background{background:rgb(229, 229, 229,0.0);}';

if($header_sticky_effect == 'shrink'){
$output .= '.sticky_header_fixed.sticky-header-shrunk .header_section_two .zolo-navigation ul li.zolo-middle-logo-menu-logo,
.sticky_header_fixed.sticky-header-shrunk .header_section_two{height:'.$sticky_header_srink_height.';}';
$output .= '.sticky_header_fixed.sticky-header-shrunk .logo-box{padding-top:0px; padding-bottom:0px;}';
$output .= '.sticky_header_fixed.sticky-header-shrunk .logo-box img{max-width:90%;}';

$output .= '.sticky_header_fixed.sticky-header-shrunk .header_element .zolo-navigation > ul > li{padding:'.$sticky_header_nav_item_margin_padding_top.' '.$sticky_header_nav_item_margin_padding_right.' '.$sticky_header_nav_item_margin_padding_bottom.' '.$sticky_header_nav_item_margin_padding_left.';
}';
$output .= '.sticky_header_fixed.sticky-header-shrunk .header_element .zolo-navigation > ul > li > a{padding:'.$sticky_header_nav_item_padding_top.' '.$sticky_header_nav_item_padding_right.' '.$sticky_header_nav_item_padding_bottom.' '.$sticky_header_nav_item_padding_left.';}';
}else{
$output .= '.sticky_header_fixed .header_section_two{height:'.$section_2_height.';}';
}


if(isset($apress_data["sticky_header_font_color"])){
$output .= '.sticky_header.sticky_header_area .zolo-navigation > ul > li > a,
.sticky_header_area .header_section_two a, .sticky_header_area .header_section_two,
.zolo-header-area .sticky_header_area .zolo-social ul.social-icon li a{color:'.$sticky_header_font_color_regular.';}';

$output .= '.sticky_header.sticky_header_area .zolo-navigation ul li a.current,.sticky_header.sticky_header_area .zolo-navigation ul .current-menu-ancestor a,.sticky_header.sticky_header_area .zolo-navigation ul .current_page_item a, .sticky_header.sticky_header_area .zolo-navigation ul .current-menu-item a,.sticky_header.sticky_header_area .zolo-navigation ul > .current-menu-parent a,.sticky_header.sticky_header_area .zolo-navigation ul li:hover a,
.sticky_header.sticky_header_area .zolo-navigation > ul > li > a:hover,
.sticky_header_area .header_section_two a:hover,
.zolo-header-area .sticky_header_area .zolo-social ul.social-icon li a:hover{'.$apress_theme_sticky_header_hover_color.';}';

$output .= '.sticky_header_area .header_element .nav_search-icon:after{border-color:'.$sticky_header_font_color_regular.'}';
$output .= '.sticky_header_area .header_element .nav_search-icon.search_close_icon:after,.sticky_header_area .header_element .nav_search-icon:before{background:'.$sticky_header_font_color_regular.'}';
}
// Sticky Header CSS End



if($header_layout == 'v1'){
$output .= '.zolo_preset_header1 .header_section_two .header_left{width:20%;}';
$output .= '.zolo_preset_header1 .header_section_two .header_right{width:80%;}';
}
if($header_layout == 'v2'){
$output .= '.zolo_preset_header2 .header_section_one .header_left{width:40%;}';
$output .= '.zolo_preset_header2 .header_section_one .header_right{width:60%;}';
$output .= '.zolo_preset_header2 .header_section_two .header_left{width:20%;}';
$output .= '.zolo_preset_header2 .header_section_two .header_right{width:80%;}';
}
if($header_layout == 'v3'){
$output .= '.zolo_preset_header3 .header_section_one .header_center{width:100%;}';
$output .= '.zolo_preset_header3 .header_section_two .header_center{width:40%;}';
$output .= '.zolo_preset_header3 .header_section_two .header_left{width:30%;}';
$output .= '.zolo_preset_header3 .header_section_two .header_right{width:30%;}';
}
if($header_layout == 'v4'){
$output .= '.zolo_preset_header4 .header_section_three .header_center{width:100%;}';
$output .= '.zolo_preset_header4 .header_section_two .header_center{width:40%;}';
$output .= '.zolo_preset_header4 .header_section_two .header_left{width:30%;}';
$output .= '.zolo_preset_header4 .header_section_two .header_right{width:30%;}';
}
if($header_layout == 'v5'){
$output .= '.zolo_preset_header5 .header_section_three .header_center{width:100%;}';
$output .= '.zolo_preset_header5 .header_section_two .header_center{width:100%;}';
$output .= '.zolo_preset_header5 .header_section_one .header_left{width:50%;}';
$output .= '.zolo_preset_header5 .header_section_one .header_right{width:50%;}';
}
if($header_layout == 'v6'){
$output .= '.zolo_preset_header6 .header_section_three .header_center{width:100%;}';
$output .= '.zolo_preset_header6 .header_section_two .header_left{width:30%;}';
$output .= '.zolo_preset_header6 .header_section_two .header_right{width:70%;}';
$output .= '.zolo_preset_header6 .header_section_one .header_left{width:50%;}';
$output .= '.zolo_preset_header6 .header_section_one .header_right{width:50%;}';
}
if($header_layout == 'v7'){
$output .= '.zolo_preset_header7 .header_section_two .header_left{width:50%;}';
$output .= '.zolo_preset_header7 .header_section_two .header_right{width:50%;}';
}
if($header_layout == 'v8'){
$output .= '.zolo_preset_header8 .header_section_two .header_center{width:100%;}';
}

//Special Button CSS Start
$output .= '.special_button_area .special_button{
padding:'.$special_button_padding_top.' '.$special_button_padding_right.' '.$special_button_padding_bottom.' '.$special_button_padding_left.';
color:'.$special_button_font_color_regular.'!important; font-size:'.$special_button_font_size.'px; line-height:'.$special_button_font_size.'px;letter-spacing:'.$special_button_letter_spacing.'px;
-moz-border-radius:'.$special_button_border_radius.'px;
-ms-border-radius:'.$special_button_border_radius.'px;
-o-border-radius:'.$special_button_border_radius.'px;
-webkit-border-radius:'.$special_button_border_radius.'px;
border-radius:'.$special_button_border_radius.'px;
}';
$output .= '.special_button_area .special_button:hover{color:'.$special_button_font_color_hover.'!important;}';

if($special_button_bg_option == 'color'){	
$output .= '.special_button_area .special_button:hover, .special_button_area .special_button{background:'.$special_button_bg_color.';
border-color:'.$special_button_border_color.';
border-style:'.$special_button_border_width_style.';
border-top-width:'.$special_button_border_top.';
border-right-width:'.$special_button_border_right.';
border-bottom-width:'.$special_button_border_bottom.';
border-left-width:'.$special_button_border_left.';
}';
$output .= '.special_button_area.button_hover_style1 .special_button:hover{background:'.$special_button_bg_color_h.';border-color:'.$special_button_border_color_h.';}';
$output .= '.special_button_area .special_button:after{background:'.$special_button_bg_color_h.';}';
}else{

$output .= '.special_button_area .special_button:hover, .special_button_area .special_button{
background:'.$special_button_gradient_bg_from.'!important;
background: -moz-linear-gradient(0deg, '.$special_button_gradient_bg_from.' 0%, '.$special_button_gradient_bg_to.' 100%)!important;
background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$special_button_gradient_bg_from.'), color-stop(100%, '.$special_button_gradient_bg_to.'))!important;
background: -webkit-linear-gradient(0deg, '.$special_button_gradient_bg_from.' 0%, '.$special_button_gradient_bg_to.' 100%)!important;
background: -o-linear-gradient(0deg, '.$special_button_gradient_bg_from.' 0%, '.$special_button_gradient_bg_to.' 100%)!important;
background: -ms-linear-gradient(0deg, '.$special_button_gradient_bg_from.' 0%, '.$special_button_gradient_bg_to.' 100%)!important;
background: linear-gradient(90deg, '.$special_button_gradient_bg_from.' 0%, '.$special_button_gradient_bg_to.' 100%)!important;
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$special_button_gradient_bg_from.', endColorstr='.$special_button_gradient_bg_to.',GradientType=1 )!important;
}';

}

//Special Button 2 CSS Start
$output .= '.special_button_area .special_button2{
padding:'.$special_button2_padding_top.' '.$special_button2_padding_right.' '.$special_button2_padding_bottom.' '.$special_button2_padding_left.';
color:'.$special_button2_font_color_regular.'!important; font-size:'.$special_button2_font_size.'px; line-height:'.$special_button2_font_size.'px;letter-spacing:'.$special_button2_letter_spacing.'px;
-moz-border-radius:'.$special_button2_border_radius.'px;
-ms-border-radius:'.$special_button2_border_radius.'px;
-o-border-radius:'.$special_button2_border_radius.'px;
-webkit-border-radius:'.$special_button2_border_radius.'px;
border-radius:'.$special_button2_border_radius.'px;
}';
$output .= '.special_button_area .special_button2:hover{color:'.$special_button2_font_color_hover.'!important;}';

if($special_button2_bg_option == 'color'){	
$output .= '.special_button_area .special_button2:hover, .special_button_area .special_button2{background:'.$special_button2_bg_color.';
border-color:'.$special_button2_border_color.';
border-style:'.$special_button2_border_width_style.';
border-top-width:'.$special_button2_border_top.';
border-right-width:'.$special_button2_border_right.';
border-bottom-width:'.$special_button2_border_bottom.';
border-left-width:'.$special_button2_border_left.';
}';
$output .= '.special_button_area.button_hover_style1 .special_button2:hover{background:'.$special_button2_bg_color_h.';border-color:'.$special_button2_border_color_h.';}';
$output .= '.special_button_area .special_button2:after{background:'.$special_button2_bg_color_h.';}';

}else{

$output .= '.special_button_area .special_button2:hover, .special_button_area .special_button2{
background:'.$special_button2_gradient_bg_from.';
background: -moz-linear-gradient(0deg, '.$special_button2_gradient_bg_from.' 0%, '.$special_button2_gradient_bg_to.' 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$special_button2_gradient_bg_from.'), color-stop(100%, '.$special_button2_gradient_bg_to.'));
background: -webkit-linear-gradient(0deg, '.$special_button2_gradient_bg_from.' 0%, '.$special_button2_gradient_bg_to.' 100%);
background: -o-linear-gradient(0deg, '.$special_button2_gradient_bg_from.' 0%, '.$special_button2_gradient_bg_to.' 100%);
background: -ms-linear-gradient(0deg, '.$special_button2_gradient_bg_from.' 0%, '.$special_button2_gradient_bg_to.' 100%);
background: linear-gradient(90deg, '.$special_button2_gradient_bg_from.' 0%, '.$special_button2_gradient_bg_to.' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$special_button2_gradient_bg_from.', endColorstr='.$special_button2_gradient_bg_to.',GradientType=1 );
}';

}
//Special Button CSS End

// Header CSS Here End 
// Footer CSS Here Start


$footer_bg_css = '';
if(isset($apress_data['footer_bg_image']['background-image']) && !empty($apress_data['footer_bg_image']['background-image'])){
	$footer_bg_css .= 'background-image: url('.esc_url($apress_data['footer_bg_image']['background-image']).');';
	}
if($footer_bg_image_background_color){
	$footer_bg_css .= 'background-color: '.esc_attr($footer_bg_image_background_color).'!important;';
	}
if(isset($apress_data['footer_bg_image']['background-repeat']) && !empty($apress_data['footer_bg_image']['background-repeat'])){
	$footer_bg_css .= 'background-repeat:'.esc_attr($apress_data['footer_bg_image']['background-repeat']).'!important;';
	}
if(isset($apress_data['footer_bg_image']['background-size']) && !empty($apress_data['footer_bg_image']['background-size'])){
	$footer_bg_css .= 'background-size:'.esc_attr($apress_data['footer_bg_image']['background-size']).'!important;';
	}
if(isset($apress_data['footer_bg_image']['background-position']) && !empty($apress_data['footer_bg_image']['background-position'])){
	$footer_bg_css .= 'background-position:'.esc_attr($apress_data["footer_bg_image"]["background-position"]).';';
	}
if(isset($apress_data['footer_bg_image']['background-attachment']) && !empty($apress_data['footer_bg_image']['background-attachment'])){
	$footer_bg_css .= 'background-attachment:'.esc_attr($apress_data["footer_bg_image"]["background-attachment"]).'!important;';
	}
$output .= '.footer{'.$footer_bg_css.'}';

if($footer_layout_style != 'footer_parallax' && isset($apress_data['footer_bg_image']['background-attachment']) && !empty($apress_data['footer_bg_image']['background-attachment'])){
$output .= '.footer{background-position:'.esc_attr($apress_data["footer_bg_image"]["background-position"]).'!important;}';
}
if(isset($apress_data["footer_area_bor_width"])){
$output .= '.footer{border-style:'.$footer_area_bor_width_border_style.';border-color:'.$footer_area_bor_width_border_color.';border-top-width:'.$footer_area_bor_width_border_top.';border-right-width:'.$footer_area_bor_width_border_right.';border-bottom-width:'.$footer_area_bor_width_border_bottom.';border-left-width:'.$footer_area_bor_width_border_left.';
}';
}	
$output .= '.footer-widgets{padding-top:'.$footer_area_padding_top.'}';
$output .= '.footer-widgets{padding-bottom:'.$footer_area_padding_bottom.';}';
$output .= '.zolo_copyright_padding,.zolo_footer_padding{padding-right:'.$footer_area_padding_right.';}';
$output .= '.zolo_copyright_padding,.zolo_footer_padding{padding-left:'.$footer_area_padding_left.';}';


if(isset($apress_data["upper_footer_area_padding"])){
$output .= '.footer-layout-upper{padding-top:'.$upper_footer_area_padding_top.'}';
$output .= '.footer-layout-upper{padding-bottom:'.$upper_footer_area_padding_bottom.';}';
$output .= '.footer-layout-lower{padding-top:'.$upper_footer_area_padding_top.'}';
$output .= '.footer-layout-lower{padding-bottom:'.$upper_footer_area_padding_bottom.';}';
}

$output .= '.zolo_footer_area .widget .tagcloud a,.zolo_footer_area .widget li,.zolo_footer_area .widget.widget_nav_menu li a{border-color:'.$footer_item_border_color.'!important;}';
$output .= '.widget.widget_pages li a,.widget .tagcloud a,.widget li,.widget.widget_nav_menu li a{border-color:'.$sidebar_item_border_color.'!important;}';

$output .= '.footer h3.widget-title{padding-top:'.$footer_widgets_title_padding_top.';}';
$output .= '.footer h3.widget-title{padding-bottom:'.$footer_widgets_title_padding_bottom.';}';
$output .= '.footer h3.widget-title{margin-bottom:'.$footer_title_seperator_bottom_padding.';}';

if($footer_widgets_title_seperator_show == 'on'){
$output .= '.footer h3.widget-title{position: relative;}
.footer h3.widget-title:after{height:'.$footer_widgets_title_seperator_dimensions_height.'; width:'.$footer_widgets_title_seperator_dimensions_width.'; background:'.$footer_widgets_title_seperator_color.';position: absolute;bottom:0px;content: ""; left:0;}';
}
// Footer CSS Here End

// Copyright CSS Here Start


$output .= '.copyright_wrap{background:'.$footer_copyright_bg_color.';float: left;width: 100%;}';
$output .= '.copyright{border-style:'.$copyright_area_border_style.';border-color:'.$copyright_area_border_color.';border-top-width:'.$copyright_area_border_top.';border-right-width:'.$copyright_area_border_right.';border-bottom-width:'.$copyright_area_border_bottom.';border-left-width:'.$copyright_area_border_left.';}';
$output .= '.copyright{padding-top:'.$copyright_padding_top.'}';
$output .= '.copyright{padding-bottom:'.$copyright_padding_bottom.';}';

// Copyright Social CSS End
$output .= '.copyright_social .zolo-social ul.social-icon li a{color:'.$footer_social_links_icon_color_regular.';}';
$output .= '.copyright_social .zolo-social ul.social-icon li a:hover{color:'.$footer_social_links_icon_color_hover.';}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{background:'.$footer_social_links_box_color.';}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{border:1px solid '.$footer_social_box_border_color.';}';

$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{-moz-border-radius:'.$footer_social_links_boxed_radius.'px;-webkit-border-radius:'.$footer_social_links_boxed_radius.'px;-ms-border-radius:'.$footer_social_links_boxed_radius.'px;-o-border-radius:'.$footer_social_links_boxed_radius.'px;border-radius:'.$footer_social_links_boxed_radius.'px;}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{min-width:'.$footer_social_icon_width.';}';
$output .= '.copyright_social .zolo-social.boxed-icons ul.social-icon li a{padding-top:'.$footer_social_boxed_padding_top.';padding-bottom:'.$footer_social_boxed_padding_bottom.';}';
$output .= '.copyright_social .zolo-social li a,
.copyright_social .zolo-social.boxed-icons ul.social-icon li a{font-size:'.$footer_social_font_size.'px;line-height:'.$footer_social_font_size.'px;}';

$output .= '.copyright_social .zolo-social li{padding-left:'.$footer_social_boxed_margin_padding_left.';}';
$output .= '.copyright_social .zolo-social li{padding-right:'.$footer_social_boxed_margin_padding_right.';}';

// Copyright CSS Here End

// Page Area CSS Start 

if( is_home() || is_page() || is_singular( array( 'post','zt_portfolio','zt_testimonial','zt_team') ) ) {
$content_top_pad = get_post_meta( $cur_id, 'zt_content_top_pad', true ); 
if($content_top_pad){
	$output .= '.container_padding_top, .container-padding{padding-top:'.$content_top_pad.';}';
}else{	
	$output .= '.container_padding_top, .container-padding{padding-top:'.$page_padding_top.';}';	
}
}else{
	$output .= '.container_padding_top, .container-padding{padding-top:'.$page_padding_top.';}';
}

if( is_home() || is_page() || is_singular( array( 'post','zt_portfolio','zt_testimonial','zt_team') ) ) {
$content_bottom_pad = get_post_meta( $cur_id, 'zt_content_bottom_pad', true ); 
if($content_bottom_pad){
	$output .= '.container_padding_bottom, .container-padding{padding-bottom:'.$content_bottom_pad.';}';
}else{
	$output .= '.container_padding_bottom, .container-padding{padding-bottom:'.$page_padding_bottom.';}';
	}
}else{
$output .= '.container_padding_bottom, .container-padding{padding-bottom:'.$page_padding_bottom.';}';
}

if( is_home() || is_page() || is_singular( array( 'post','zt_portfolio','zt_testimonial','zt_team') ) ) {
$content_left_right_pad = get_post_meta( $cur_id, 'zt_content_left_right_pad', true ); 
	if($content_left_right_pad){	
		$output .= '.container_padding_left_right, .container-padding{padding-left:'.$content_left_right_pad.';padding-right:'.$content_left_right_pad.';}';
	}else{
		$output .= '.container_padding_left_right, .container-padding{padding-left:'.$hundredp_padding_left.';padding-right:'.$hundredp_padding_right.';}';
		}
}else{
		$output .= '.container_padding_left_right, .container-padding{padding-left:'.$hundredp_padding_left.';padding-right:'.$hundredp_padding_right.';}';
}



$output .= '.zolo-topbar .headertopcontent_box{padding-left:'.$top_bar_left_padding.';padding-right:'.$top_bar_right_padding.';}';
$output .= '.headercontent_box{padding-left:'.$section_two_left_padding.';padding-right:'.$section_two_right_padding.';}';
$output .= '.navigation-padding{padding-left:'.$section_three_left_padding.';padding-right:'.$section_three_right_padding.';}';


$section_two_shadow_showhide = isset($apress_data["section_two_shadow_showhide"]) ? $apress_data["section_two_shadow_showhide"] : 'hide';
$section_three_shadow_showhide = isset($apress_data["section_three_shadow_showhide"]) ? $apress_data["section_three_shadow_showhide"] : 'hide';
$sticky_header_shadow_showhide = isset($apress_data["sticky_header_shadow_showhide"]) ? $apress_data["sticky_header_shadow_showhide"] : 'hide';


if($section_two_shadow_showhide == 'show'){
$output .= '.zolo-header_section2_background{ box-shadow:'.$apress_data["section_two_shadow_parameters"]["padding-top"].' '.$apress_data["section_two_shadow_parameters"]["padding-right"].' '.$apress_data["section_two_shadow_parameters"]["padding-bottom"].' '.$apress_data["section_two_shadow_parameters"]["padding-left"].' '.$apress_data["section_two_shadow_color"].';}';
}
if($section_three_shadow_showhide == 'show'){
$output .= '.navigation-area{ box-shadow:'.$apress_data["section_three_shadow_parameters"]["padding-top"].' '.$apress_data["section_three_shadow_parameters"]["padding-right"].' '.$apress_data["section_three_shadow_parameters"]["padding-bottom"].' '.$apress_data["section_three_shadow_parameters"]["padding-left"].' '.$apress_data["section_three_shadow_color"].';}';
}
if($sticky_header_shadow_showhide == 'show'){
$output .= '.sticky_header_area{ box-shadow:'.$apress_data["sticky_header_shadow_parameters"]["padding-top"].' '.$apress_data["sticky_header_shadow_parameters"]["padding-right"].' '.$apress_data["sticky_header_shadow_parameters"]["padding-bottom"].' '.$apress_data["sticky_header_shadow_parameters"]["padding-left"].' '.$apress_data["sticky_header_shadow_color"].';}';
}


if( is_home() || is_page() || is_singular( array( 'post','zt_portfolio') ) ) {		
	$page_header_100_width = get_post_meta( $cur_id, 'zt_header_100_width', true ); 
	$page_header_width_100per_padding = get_post_meta( $cur_id, 'zt_header_width_100per_padding', true );
	
	if($page_header_100_width == 'yes'){		
		$output .= '.zolo-topbar .zolo-container,.zolo-header_section2_background .zolo-container,.navigation-area .zolo-container{padding-left:'.$page_header_width_100per_padding.';padding-right:'.$page_header_width_100per_padding.';}';	
	}else if($page_header_100_width == 'no'){
		$output .= '';
		}else{
			if($header_100_width == 'on'){
				$output .= '.zolo-topbar .zolo-container,.zolo-header_section2_background .zolo-container,.navigation-area .zolo-container{padding-left:'.$header_width_100per_padding_left.';padding-right:'.$header_width_100per_padding_right.';}';
			}	
		}
}else{
	if($header_100_width == 'on'){
		$output .= '.zolo-topbar .zolo-container,.zolo-header_section2_background .zolo-container,.navigation-area .zolo-container{padding-left:'.$header_width_100per_padding_left.';padding-right:'.$header_width_100per_padding_right.';}';
	}
}
//Page sidebar Area CSS Start

$output .= '.hassidebar.double_sidebars .content-area{width: calc('.$content_width_2.');padding:0 50px;	float:left;	margin-left:calc('.$sidebar_2_1_width.');}';
$output .= '.hassidebar.double_sidebars .sidebar_container_1{width:'.$sidebar_2_1_width.';margin-left:calc(1px - ('.$sidebar_2_1_width.' + '.$content_width_2.'));float:left;}';
$output .= '.hassidebar.double_sidebars .sidebar_container_2{width:'.$sidebar_2_2_width.';float:left;}';
$output .= '.hassidebar .content-area{width:'.$content_width.';}';
$output .= '.hassidebar .sidebar_container_1{width:'.$sidebar_width.';}';
$output .= '.hassidebar .sidebar_container_2{width:'.$sidebar_width.';} ';
$output .= '.sidebar .widget h3.widget-title span{padding-top:'.$sidebar_widgets_title_padding_top.';}';
$output .= '.sidebar .widget h3.widget-title span{padding-bottom:'.$sidebar_widgets_title_padding_bottom.';}';
$output .= '.sidebar .widget h3.widget-title{margin-bottom:'.$sidebar_title_seperator_bottom_mar.';}';


$output .= '.sidebar a{color:'.$sidebar_link_color_regular.';}';
$output .= '.sidebar .widget.widget_nav_menu li.current-menu-item a,.sidebar .widget.widget_pages li.current_page_item a,.sidebar a:hover{color:'.$sidebar_link_color_hover.';}';
//sidebar_widgets_title_design
if($sidebar_widgets_title_design == 'bottomborder'){
	
$output .= '.sidebar .widget h3.widget-title{position: relative;}';
$output .= '.sidebar .widget h3.widget-title:after{ height:'.$sidebar_widgets_title_seperator_height.'px; width:'.$sidebar_widgets_title_seperator_width.';background:'.$apress_data["sidebar_widgets_title_seperator_color"].';position: absolute;bottom:0px;content: ""; left:0;}';

}elseif($sidebar_widgets_title_design == 'box' || $sidebar_widgets_title_design == 'boxfullwidth'){
	
$output .= '.sidebar .widget h3.widget-title span{padding-left:15px;padding-right:15px; min-width:100px;background:'.$sidebar_widget_title_bg_color.';border: 1px solid '.$sidebar_widget_title_border_color.';}';

}elseif($sidebar_widgets_title_design == 'image'){
	
$output .= '.sidebar .widget h3.widget-title{position: relative;}';
$output .= '.sidebar .widget h3.widget-title:after{ height:'.$sidebar_widgets_title_seperator_height.'px; width:100%; background-image:url("'.$sidebar_widgets_title_separator_img_url.'");position: absolute;bottom:0px;content: ""; left:0;background-repeat: no-repeat;background-position:center center;}';

}

if($sidebar_widgets_title_design == 'box'){
	$output .= '.sidebar .widget h3.widget-title span{text-align: center;}';
}
if($sidebar_widgets_title_design == 'boxfullwidth'){
	$output .= '.sidebar .widget h3.widget-title span{ width:100%;}';
}
if($sidebar_widgets_title_align == 'left'){
$output .= '.sidebar .widget h3.widget-title{text-align: left;}';
$output .= '.rtl .sidebar .widget h3.widget-title{text-align:right;}';

}elseif($sidebar_widgets_title_align == 'center'){
$output .= '.sidebar .widget h3.widget-title{text-align: center;}';
$output .= '.sidebar .widget h3.widget-title:after{left:50%;-moz-transform: translate(-50%, 0px);-webkit-transform: translate(-50%, 0px);-ms-transform: translate(-50%, 0px);-o-transform: translate(-50%, 0px);transform: translate(-50%, 0px);}';
}elseif($sidebar_widgets_title_align == 'right'){
$output .= '.sidebar .widget h3.widget-title:after{right:0; left:auto;}';
$output .= '.sidebar .widget h3.widget-title{text-align: right;}';
$output .= '.rtl .sidebar .widget h3.widget-title{text-align: right;}';
}
if($sidebar_widgets_style == 'box'){
$output .= '.sidebar_widget_style_box .sidebar .widget{background:'.$sidebar_widge_bg_color.';border: 1px solid '.$sidebar_widget_border_color.';}';
}
//Page sidebar Area CSS End
// Page Area CSS End //

// Page Title Bar Area CSS Start //

if($titlebar_height){
$output .= '.pagetitle_parallax_content_box{height:'.$titlebar_height.'px;}';
}else{	 
	$output .= '.pagetitle_parallax_content_box{height:'.$page_title_height.';}';
}    
if($page_title_bar_overlay_color){
	$output .= '.pagetitle_parallax:after{background:'.$page_title_bar_overlay_color.'!important;}';
}

//Page Title background
$pagetitle_bg_css = '';
if(isset($apress_data['page_title_bg']['background-repeat']) && !empty($apress_data['page_title_bg']['background-repeat'])){
	$pagetitle_bg_css .= 'background-repeat:'.$apress_data['page_title_bg']['background-repeat'].'!important;';
	}
if(isset($apress_data['page_title_bg']['background-position']) && !empty($apress_data['page_title_bg']['background-position'])){
	$pagetitle_bg_css .= 'background-position:'.$apress_data["page_title_bg"]["background-position"].'!important;';
	}
if(isset($apress_data['page_title_bg']['background-attachment']) && !empty($apress_data['page_title_bg']['background-attachment'])){
	$pagetitle_bg_css .= 'background-attachment:'.$apress_data["page_title_bg"]["background-attachment"].'!important;';
	}
$output .= '.pagetitle_parallax_1{'.$pagetitle_bg_css.'}';

//Page Title background Size
if($titlebar_bg_img_100per == 'No'){
$output .= '.pagetitle_parallax{-moz-background-size:inherit!important;-webkit-background-size:inherit!important;-ms-background-size:inherit!important;-o-background-size:inherit!important;background-size:inherit!important;}';
}else if($titlebar_bg_img_100per == 'Yes'){
$output .= '.pagetitle_parallax{-moz-background-size:cover!important;-webkit-background-size:cover!important;-ms-background-size:cover!important;-o-background-size:cover!important;background-size:cover!important;}';
}else{

if(isset($apress_data['page_title_bg']['background-size']) && !empty($apress_data['page_title_bg']['background-size'])){
		$output .= '.pagetitle_parallax{-moz-background-size:'.$apress_data["page_title_bg"]["background-size"].'!important; -webkit-background-size:'.$apress_data["page_title_bg"]["background-size"].'!important ;-ms-background-size:'.$apress_data["page_title_bg"]["background-size"].'!important; -o-background-size:'.$apress_data["page_title_bg"]["background-size"].'!important; background-size:'.$apress_data["page_title_bg"]["background-size"].'!important;}';
	}
} 

//Page Title Font Size

if($title_text_size){
$output .= '.pagetitle_parallax_content h1{font-size:'.$title_text_size.'px;line-height:'.$title_text_size.'px;}';
}else{
	 if($page_titlebar_typography_line_height || $page_titlebar_typography_font_size){
	$output .= '.pagetitle_parallax_content h1{font-size:'.$page_titlebar_typography_font_size.';line-height:'.$page_titlebar_typography_line_height.';}';
} 	} 	
//Page Title Font Color
$title_text_color = get_post_meta( $cur_id, 'zt_title_text_color', true ); 
if($title_text_color == '#' || $title_text_color == ''){
	if($page_title_color){
    $output .= '#crumbs, #crumbs a,	.pagetitle_parallax_content h1{color:'.$page_title_color.';}';
	} 
}else if($title_text_color){
$output .= '#crumbs, #crumbs a, .pagetitle_parallax_content h1{color:'.$title_text_color.';}';
}
$output .= '.pagetitle_parallax_content{padding:'.$page_title_padding_top.' '.$page_title_padding_right.' '.$page_title_padding_bottom.' '.$page_title_padding_left.';}';

$output .= '#crumbs,#crumbs a{font-size:'.$breadcrumbs_font_size.'px;}';
// Page Title Bar Area CSS End  

//Boxed Layout Body Img Background Repeat

if($bg_img || $bg_color){
$output .= 'body.boxed_layout .site_layout{background-color:'.$bg_color.';}';
if($bg_img){
$output .= 'body.boxed_layout .site_layout{background-image:url("'.$bg_img.'");}';
$output .= 'body.boxed_layout .site_layout{background-repeat:'.$bg_repeat.';}';
if($bg_img_100per == 'yes'){
$output .= 'body.boxed_layout .site_layout{ background-attachment: fixed; -moz-background-size:cover;-webkit-background-size:cover;-ms-background-size:cover;-o-background-size:cover;background-size:cover;background-attachment:fixed;}';
}elseif($bg_img_100per == 'no'){
$output .= 'body.boxed_layout .site_layout{ -moz-background-size:inherit;-webkit-background-size:inherit;-ms-background-size:inherit;-o-background-size:inherit;background-size:inherit;}';
}

}

 }else{	 	
	
	if($body_bg_image_background_color && !empty($body_bg_image_background_color)){
		$output .= 'body.boxed_layout .site_layout{background-color:'.esc_attr($body_bg_image_background_color).';}';
		}		
		
	$body_bg_css = '';
	if(isset($apress_data['body_bg_image']['background-image']) && !empty($apress_data['body_bg_image']['background-image'])){
		$body_bg_css .= 'background-image: url('.esc_url($apress_data['body_bg_image']['background-image']).');';
		}	
	if(isset($apress_data['body_bg_image']['background-repeat']) && !empty($apress_data['body_bg_image']['background-repeat'])){
		$body_bg_css .= 'background-repeat:'.$apress_data['body_bg_image']['background-repeat'].';';
		}
	if(isset($apress_data['body_bg_image']['background-size']) && !empty($apress_data['body_bg_image']['background-size'])){
		$body_bg_css .= 'background-size:'.$apress_data['body_bg_image']['background-size'].';';
		}
	if(isset($apress_data['body_bg_image']['background-position']) && !empty($apress_data['body_bg_image']['background-position'])){
		$body_bg_css .= 'background-position:'.$apress_data["body_bg_image"]["background-position"].';';
		}
	if(isset($apress_data['body_bg_image']['background-attachment']) && !empty($apress_data['body_bg_image']['background-attachment'])){
		$body_bg_css .= 'background-attachment:'.$apress_data["body_bg_image"]["background-attachment"].';';
		}
	$output .= 'body.boxed_layout .site_layout{'.$body_bg_css.'}';
	
}
//Wide Layout Body Background
$container_bg_class = '';
//Site Layout Style
$bg_layout = get_post_meta( $cur_id, 'zt_bg_layout', true ); 
if($bg_layout == 'wide'){        
	$container_bg_class = '.container-main';
	}elseif($bg_layout == 'boxed'){
		$container_bg_class = '.container-main';
	 }elseif($bg_layout == 'theater'){
		$container_bg_class = '.container-main';
	 }else{
if($layout=='boxed'){
	$container_bg_class = '.container-main';
}elseif($layout=='wide'){
	$container_bg_class = '.container-main';
 }elseif($layout=='theater'){
	$container_bg_class = '.container-main';
 }	
	}

if($wide_bg_img || $wide_bg_color){
$output .= $container_bg_class.'{background-color:'.$wide_bg_color.';}';
if($wide_bg_img){
$output .= $container_bg_class.'{background-image:url("'.$wide_bg_img.'");}';
$output .= $container_bg_class.'{background-repeat:'.$wide_bg_repeat.';}';
if($wide_bg_img_100per == 'yes'){
	$output .= $container_bg_class.'{-moz-background-size:cover; -webkit-background-size:cover;-ms-background-size:cover; -o-background-size:cover; background-size:cover;background-attachment:fixed;}';
}elseif($wide_bg_img_100per == 'no'){
	$output .= $container_bg_class.'{-moz-background-size:inherit;-webkit-background-size:inherit;-ms-background-size:inherit; -o-background-size:inherit; background-size:inherit;}';
}
	}
}else{
$main_content_bg_css = '';
if(isset($apress_data['main_content_bg_image']['background-image']) && !empty($apress_data['main_content_bg_image']['background-image'])){
	$main_content_bg_css .= 'background-image: url('.esc_url($apress_data['main_content_bg_image']['background-image']).');';
	}
if(isset($apress_data['main_content_bg_image']['background-color']) && !empty($apress_data['main_content_bg_image']['background-color'])){
	$main_content_bg_css .= 'background-color: '.esc_attr($apress_data['main_content_bg_image']['background-color']).';';
	}
if(isset($apress_data['main_content_bg_image']['background-repeat']) && !empty($apress_data['main_content_bg_image']['background-repeat'])){
	$main_content_bg_css .= 'background-repeat:'.$apress_data['main_content_bg_image']['background-repeat'].';';
	}
if(isset($apress_data['main_content_bg_image']['background-size']) && !empty($apress_data['main_content_bg_image']['background-size'])){
	$main_content_bg_css .= 'background-size:'.$apress_data['main_content_bg_image']['background-size'].';';
	}
if(isset($apress_data['main_content_bg_image']['background-position']) && !empty($apress_data['main_content_bg_image']['background-position'])){
	$main_content_bg_css .= 'background-position:'.$apress_data["main_content_bg_image"]["background-position"].';';
	}
if(isset($apress_data['main_content_bg_image']['background-attachment']) && !empty($apress_data['main_content_bg_image']['background-attachment'])){
	$main_content_bg_css .= 'background-attachment:'.$apress_data["main_content_bg_image"]["background-attachment"].';';
	}
$output .= $container_bg_class.'{'.$main_content_bg_css.'}';
}

//Wide Layout Body Img Background 


//Typography Area Start
//Font Size
$body_typography_css = '';
if(isset($apress_data['body_typography']) && $apress_data['body_typography'] && is_array($apress_data['body_typography'])) {
if(isset($apress_data['body_typography']['font-family']) && !empty($apress_data['body_typography']['font-family'])) {
	$body_typography_css .= 'font-family: '.esc_attr($apress_data['body_typography']['font-family']).';';
}
if(isset($apress_data['body_typography']['font-size']) && !empty($apress_data['body_typography']['font-size'])) {
	$body_typography_css .= 'font-size: '.esc_attr($apress_data['body_typography']['font-size']).';';
}
if(isset($apress_data['body_typography']['line-height']) && !empty($apress_data['body_typography']['line-height'])) {
	$body_typography_css .= 'line-height: '.esc_attr($apress_data['body_typography']['line-height']).';';
}
if(isset($apress_data['body_typography']['font-style']) && !empty($apress_data['body_typography']['font-style'])) {
	$body_typography_css .= 'font-style: '.esc_attr($apress_data['body_typography']['font-style']).';';
}
if(isset($apress_data['body_typography']['font-weight']) && !empty($apress_data['body_typography']['font-weight'])) {
	$body_typography_css .= 'font-weight: '.esc_attr($apress_data['body_typography']['font-weight']).';';
}
if(isset($apress_data['body_typography']['letter-spacing']) && !empty($apress_data['body_typography']['letter-spacing'])) {
	$body_typography_css .= 'letter-spacing: '.esc_attr($apress_data['body_typography']['letter-spacing']).';';
}
if(isset($apress_data['body_typography']['text-align']) && !empty($apress_data['body_typography']['text-align'])) {
	$body_typography_css .= 'text-align: '.esc_attr($apress_data['body_typography']['text-align']).';';
}
if(isset($apress_data['body_typography']['text-transform']) && !empty($apress_data['body_typography']['text-transform'])) {
	$body_typography_css .= 'text-transform: '.esc_attr($apress_data['body_typography']['text-transform']).';';
}
if(isset($apress_data['body_typography']['color']) && !empty($apress_data['body_typography']['color'])) {
	$body_typography_css .= 'color: '.esc_attr($apress_data['body_typography']['color']).';';
}
$output .= 'body,input,select,textarea{'.$body_typography_css.'}';
}


$header_h1_typography_css = '';

if(isset($apress_data['header_h1_typography']['font-family']) && !empty($apress_data['header_h1_typography']['font-family'])) {
	$header_h1_typography_css .= 'font-family: '.esc_attr($apress_data['header_h1_typography']['font-family']).';';
}
if($header_h1_typography_font_size){
	$header_h1_typography_css .= 'font-size: '.esc_attr($header_h1_typography_font_size).';';
}
if($header_h1_typography_line_height) {
	$header_h1_typography_css .= 'line-height: '.esc_attr($header_h1_typography_line_height).';';
}
if(isset($apress_data['header_h1_typography']['font-style']) && !empty($apress_data['header_h1_typography']['font-style'])) {
	$header_h1_typography_css .= 'font-style: '.esc_attr($apress_data['header_h1_typography']['font-style']).';';
}
if(isset($apress_data['header_h1_typography']['font-weight']) && !empty($apress_data['header_h1_typography']['font-weight'])) {
	$header_h1_typography_css .= 'font-weight: '.esc_attr($apress_data['header_h1_typography']['font-weight']).';';
}
if(isset($apress_data['header_h1_typography']['letter-spacing']) && !empty($apress_data['header_h1_typography']['letter-spacing'])) {
	$header_h1_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_h1_typography']['letter-spacing']).';';
}
if(isset($apress_data['header_h1_typography']['text-transform']) && !empty($apress_data['header_h1_typography']['text-transform'])) {
	$header_h1_typography_css .= 'text-transform: '.esc_attr($apress_data['header_h1_typography']['text-transform']).';';
}
if(isset($apress_data['header_h1_typography']['color']) && !empty($apress_data['header_h1_typography']['color'])) {
	$header_h1_typography_css .= 'color: '.esc_attr($apress_data['header_h1_typography']['color']).';';
}
$output .= 'h1{'.$header_h1_typography_css.'}';


$header_h2_typography_css = '';

if(isset($apress_data['header_h2_typography']['font-family']) && !empty($apress_data['header_h2_typography']['font-family'])) {
	$header_h2_typography_css .= 'font-family: '.esc_attr($apress_data['header_h2_typography']['font-family']).';';
}
if($header_h2_typography_font_size) {
	$header_h2_typography_css .= 'font-size: '.esc_attr($header_h2_typography_font_size).';';
}
if($header_h2_typography_line_height) {
	$header_h2_typography_css .= 'line-height: '.esc_attr($header_h2_typography_line_height).';';
}
if(isset($apress_data['header_h2_typography']['font-style']) && !empty($apress_data['header_h2_typography']['font-style'])) {
	$header_h2_typography_css .= 'font-style: '.esc_attr($apress_data['header_h2_typography']['font-style']).';';
}
if(isset($apress_data['header_h2_typography']['font-weight']) && !empty($apress_data['header_h2_typography']['font-weight'])) {
	$header_h2_typography_css .= 'font-weight: '.esc_attr($apress_data['header_h2_typography']['font-weight']).';';
}
if(isset($apress_data['header_h2_typography']['letter-spacing']) && !empty($apress_data['header_h2_typography']['letter-spacing'])) {
	$header_h2_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_h2_typography']['letter-spacing']).';';
}
if(isset($apress_data['header_h2_typography']['text-transform']) && !empty($apress_data['header_h2_typography']['text-transform'])) {
	$header_h2_typography_css .= 'text-transform: '.esc_attr($apress_data['header_h2_typography']['text-transform']).';';
}
if(isset($apress_data['header_h2_typography']['color']) && !empty($apress_data['header_h2_typography']['color'])) {
	$header_h2_typography_css .= 'color: '.esc_attr($apress_data['header_h2_typography']['color']).';';
}
$output .= 'h2{'.$header_h2_typography_css.'}';


$header_h3_typography_css = '';

if(isset($apress_data['header_h3_typography']['font-family']) && !empty($apress_data['header_h3_typography']['font-family'])) {
	$header_h3_typography_css .= 'font-family: '.esc_attr($apress_data['header_h3_typography']['font-family']).';';
}
if($header_h3_typography_font_size) {
	$header_h3_typography_css .= 'font-size: '.esc_attr($header_h3_typography_font_size).';';
}
if($header_h3_typography_line_height) {
	$header_h3_typography_css .= 'line-height: '.esc_attr($header_h3_typography_line_height).';';
}
if(isset($apress_data['header_h3_typography']['font-style']) && !empty($apress_data['header_h3_typography']['font-style'])) {
	$header_h3_typography_css .= 'font-style: '.esc_attr($apress_data['header_h3_typography']['font-style']).';';
}
if(isset($apress_data['header_h3_typography']['font-weight']) && !empty($apress_data['header_h3_typography']['font-weight'])) {
	$header_h3_typography_css .= 'font-weight: '.esc_attr($apress_data['header_h3_typography']['font-weight']).';';
}
if(isset($apress_data['header_h3_typography']['letter-spacing']) && !empty($apress_data['header_h3_typography']['letter-spacing'])) {
	$header_h3_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_h3_typography']['letter-spacing']).';';
}
if(isset($apress_data['header_h3_typography']['text-transform']) && !empty($apress_data['header_h3_typography']['text-transform'])) {
	$header_h3_typography_css .= 'text-transform: '.esc_attr($apress_data['header_h3_typography']['text-transform']).';';
}
if(isset($apress_data['header_h3_typography']['color']) && !empty($apress_data['header_h3_typography']['color'])) {
	$header_h3_typography_css .= 'color: '.esc_attr($apress_data['header_h3_typography']['color']).';';
}
$output .= 'h3{'.$header_h3_typography_css.'}';


$header_h4_typography_css = '';

if(isset($apress_data['header_h4_typography']['font-family']) && !empty($apress_data['header_h4_typography']['font-family'])) {
	$header_h4_typography_css .= 'font-family: '.esc_attr($apress_data['header_h4_typography']['font-family']).';';
}
if($header_h4_typography_font_size) {
	$header_h4_typography_css .= 'font-size: '.esc_attr($header_h4_typography_font_size).';';
}
if($header_h4_typography_line_height) {
	$header_h4_typography_css .= 'line-height: '.esc_attr($header_h4_typography_line_height).';';
}
if(isset($apress_data['header_h4_typography']['font-style']) && !empty($apress_data['header_h4_typography']['font-style'])) {
	$header_h4_typography_css .= 'font-style: '.esc_attr($apress_data['header_h4_typography']['font-style']).';';
}
if(isset($apress_data['header_h4_typography']['font-weight']) && !empty($apress_data['header_h4_typography']['font-weight'])) {
	$header_h4_typography_css .= 'font-weight: '.esc_attr($apress_data['header_h4_typography']['font-weight']).';';
}
if(isset($apress_data['header_h4_typography']['letter-spacing']) && !empty($apress_data['header_h4_typography']['letter-spacing'])) {
	$header_h4_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_h4_typography']['letter-spacing']).';';
}
if(isset($apress_data['header_h4_typography']['text-transform']) && !empty($apress_data['header_h4_typography']['text-transform'])) {
	$header_h4_typography_css .= 'text-transform: '.esc_attr($apress_data['header_h4_typography']['text-transform']).';';
}
if(isset($apress_data['header_h4_typography']['color']) && !empty($apress_data['header_h4_typography']['color'])) {
	$header_h4_typography_css .= 'color: '.esc_attr($apress_data['header_h4_typography']['color']).';';
}
$output .= 'h4{'.$header_h4_typography_css.'}';


$header_h5_typography_css = '';

if(isset($apress_data['header_h5_typography']['font-family']) && !empty($apress_data['header_h5_typography']['font-family'])) {
	$header_h5_typography_css .= 'font-family: '.esc_attr($apress_data['header_h5_typography']['font-family']).';';
}
if($header_h5_typography_font_size) {
	$header_h5_typography_css .= 'font-size: '.esc_attr($header_h5_typography_font_size).';';
}
if($header_h5_typography_line_height) {
	$header_h5_typography_css .= 'line-height: '.esc_attr($header_h5_typography_line_height).';';
}
if(isset($apress_data['header_h5_typography']['font-style']) && !empty($apress_data['header_h5_typography']['font-style'])) {
	$header_h5_typography_css .= 'font-style: '.esc_attr($apress_data['header_h5_typography']['font-style']).';';
}
if(isset($apress_data['header_h5_typography']['font-weight']) && !empty($apress_data['header_h5_typography']['font-weight'])) {
	$header_h5_typography_css .= 'font-weight: '.esc_attr($apress_data['header_h5_typography']['font-weight']).';';
}
if(isset($apress_data['header_h5_typography']['letter-spacing']) && !empty($apress_data['header_h5_typography']['letter-spacing'])) {
	$header_h5_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_h5_typography']['letter-spacing']).';';
}
if(isset($apress_data['header_h5_typography']['text-transform']) && !empty($apress_data['header_h5_typography']['text-transform'])) {
	$header_h5_typography_css .= 'text-transform: '.esc_attr($apress_data['header_h5_typography']['text-transform']).';';
}
if(isset($apress_data['header_h5_typography']['color']) && !empty($apress_data['header_h5_typography']['color'])) {
	$header_h5_typography_css .= 'color: '.esc_attr($apress_data['header_h5_typography']['color']).';';
}
$output .= 'h5{'.$header_h5_typography_css.'}';


$header_h6_typography_css = '';

if(isset($apress_data['header_h6_typography']['font-family']) && !empty($apress_data['header_h6_typography']['font-family'])) {
	$header_h6_typography_css .= 'font-family: '.esc_attr($apress_data['header_h6_typography']['font-family']).';';
}
if($header_h6_typography_font_size) {
	$header_h6_typography_css .= 'font-size: '.esc_attr($header_h6_typography_font_size).';';
}
if($header_h6_typography_line_height) {
	$header_h6_typography_css .= 'line-height: '.esc_attr($header_h6_typography_line_height).';';
}
if(isset($apress_data['header_h6_typography']['font-style']) && !empty($apress_data['header_h6_typography']['font-style'])) {
	$header_h6_typography_css .= 'font-style: '.esc_attr($apress_data['header_h6_typography']['font-style']).';';
}
if(isset($apress_data['header_h6_typography']['font-weight']) && !empty($apress_data['header_h6_typography']['font-weight'])) {
	$header_h6_typography_css .= 'font-weight: '.esc_attr($apress_data['header_h6_typography']['font-weight']).';';
}
if(isset($apress_data['header_h6_typography']['letter-spacing']) && !empty($apress_data['header_h6_typography']['letter-spacing'])) {
	$header_h6_typography_css .= 'letter-spacing: '.esc_attr($apress_data['header_h6_typography']['letter-spacing']).';';
}
if(isset($apress_data['header_h6_typography']['text-transform']) && !empty($apress_data['header_h6_typography']['text-transform'])) {
	$header_h6_typography_css .= 'text-transform: '.esc_attr($apress_data['header_h6_typography']['text-transform']).';';
}
if(isset($apress_data['header_h6_typography']['color']) && !empty($apress_data['header_h6_typography']['color'])) {
	$header_h6_typography_css .= 'color: '.esc_attr($apress_data['header_h6_typography']['color']).';';
}
$output .= 'h6{'.$header_h6_typography_css.'}';

$italic_typography_css = '';
if(isset($apress_data['italic_typography']['font-family']) && !empty($apress_data['italic_typography']['font-family'])) {
	$italic_typography_css .= 'font-family: '.esc_attr($apress_data['italic_typography']['font-family']).';';
}

if(isset($apress_data['italic_typography']['font-style']) && !empty($apress_data['italic_typography']['font-style'])) {
	$italic_typography_css .= 'font-style: '.esc_attr($apress_data['italic_typography']['font-style']).';';
}
$output .= 'i, em, var{'.$italic_typography_css.'}';

$bold_typography_css = '';
if(isset($apress_data['bold_typography']['font-family']) && !empty($apress_data['bold_typography']['font-family'])) {
	$bold_typography_css .= 'font-family: '.esc_attr($apress_data['bold_typography']['font-family']).';';
}
if(isset($apress_data['bold_typography']['font-weight']) && !empty($apress_data['bold_typography']['font-weight'])) {
	$bold_typography_css .= 'font-weight: '.esc_attr($apress_data['bold_typography']['font-weight']).';';
}
$output .= 'b, strong{'.$bold_typography_css.'}';

$sidebar_title_typography_css = '';
if(isset($apress_data['sidebar_title_typography']) && $apress_data['sidebar_title_typography'] && is_array($apress_data['sidebar_title_typography'])) {
if(isset($apress_data['sidebar_title_typography']['font-family']) && !empty($apress_data['sidebar_title_typography']['font-family'])) {
	$sidebar_title_typography_css .= 'font-family: '.esc_attr($apress_data['sidebar_title_typography']['font-family']).';';
}
if(isset($apress_data['sidebar_title_typography']['font-size']) && !empty($apress_data['sidebar_title_typography']['font-size'])) {
	$sidebar_title_typography_css .= 'font-size: '.esc_attr($apress_data['sidebar_title_typography']['font-size']).';';
}
if(isset($apress_data['sidebar_title_typography']['line-height']) && !empty($apress_data['sidebar_title_typography']['line-height'])) {
	$sidebar_title_typography_css .= 'line-height: '.esc_attr($apress_data['sidebar_title_typography']['line-height']).';';
}
if(isset($apress_data['sidebar_title_typography']['font-style']) && !empty($apress_data['sidebar_title_typography']['font-style'])) {
	$sidebar_title_typography_css .= 'font-style: '.esc_attr($apress_data['sidebar_title_typography']['font-style']).';';
}
if(isset($apress_data['sidebar_title_typography']['text-transform']) && !empty($apress_data['sidebar_title_typography']['text-transform'])) {
	$sidebar_title_typography_css .= 'text-transform: '.esc_attr($apress_data['sidebar_title_typography']['text-transform']).';';
}
if(isset($apress_data['sidebar_title_typography']['font-weight']) && !empty($apress_data['sidebar_title_typography']['font-weight'])) {
	$sidebar_title_typography_css .= 'font-weight: '.esc_attr($apress_data['sidebar_title_typography']['font-weight']).';';
}
if(isset($apress_data['sidebar_title_typography']['letter-spacing']) && !empty($apress_data['sidebar_title_typography']['letter-spacing'])) {
	$sidebar_title_typography_css .= 'letter-spacing: '.esc_attr($apress_data['sidebar_title_typography']['letter-spacing']).';';
}
if(isset($apress_data['sidebar_title_typography']['color']) && !empty($apress_data['sidebar_title_typography']['color'])) {
	$sidebar_title_typography_css .= 'color: '.esc_attr($apress_data['sidebar_title_typography']['color']).';';
}
$output .= '.sidebar .widget h3.widget-title{'.$sidebar_title_typography_css.'}';
}

$sidebar_typography_css = '';
if(isset($apress_data['sidebar_typography']) && $apress_data['sidebar_typography'] && is_array($apress_data['sidebar_typography'])) {
if(isset($apress_data['sidebar_typography']['font-family']) && !empty($apress_data['sidebar_typography']['font-family'])) {
	$sidebar_typography_css .= 'font-family: '.esc_attr($apress_data['sidebar_typography']['font-family']).';';
}
if(isset($apress_data['sidebar_typography']['font-size']) && !empty($apress_data['sidebar_typography']['font-size'])) {
	$sidebar_typography_css .= 'font-size: '.esc_attr($apress_data['sidebar_typography']['font-size']).';';
}
if(isset($apress_data['sidebar_typography']['line-height']) && !empty($apress_data['sidebar_typography']['line-height'])) {
	$sidebar_typography_css .= 'line-height: '.esc_attr($apress_data['sidebar_typography']['line-height']).';';
}
if(isset($apress_data['sidebar_typography']['font-style']) && !empty($apress_data['sidebar_typography']['font-style'])) {
	$sidebar_typography_css .= 'font-style: '.esc_attr($apress_data['sidebar_typography']['font-style']).';';
}
if(isset($apress_data['sidebar_typography']['font-weight']) && !empty($apress_data['sidebar_typography']['font-weight'])) {
	$sidebar_typography_css .= 'font-weight: '.esc_attr($apress_data['sidebar_typography']['font-weight']).';';
}
if(isset($apress_data['sidebar_typography']['text-transform']) && !empty($apress_data['sidebar_typography']['text-transform'])) {
	$sidebar_typography_css .= 'text-transform: '.esc_attr($apress_data['sidebar_typography']['text-transform']).';';
}
if(isset($apress_data['sidebar_typography']['letter-spacing']) && !empty($apress_data['sidebar_typography']['letter-spacing'])) {
	$sidebar_typography_css .= 'letter-spacing: '.esc_attr($apress_data['sidebar_typography']['letter-spacing']).';';
}
if(isset($apress_data['sidebar_typography']['text-align']) && !empty($apress_data['sidebar_typography']['text-align'])) {
	$sidebar_typography_css .= 'text-align: '.esc_attr($apress_data['sidebar_typography']['text-align']).';';
}
if(isset($apress_data['sidebar_typography']['color']) && !empty($apress_data['sidebar_typography']['color'])) {
	$sidebar_typography_css .= 'color: '.esc_attr($apress_data['sidebar_typography']['color']).';';
}

$output .= '.sidebar,.sidebar h1,.sidebar h2,.sidebar h3,.sidebar h4,.sidebar h5,.sidebar h6{'.$sidebar_typography_css.'}';
}

$footer_title_typography_css = '';
$footer_title_typography_color = isset($apress_data['footer_title_typography']['color']) ? $apress_data['footer_title_typography']['color'] : '#dddddd';

if(isset($apress_data['footer_title_typography']['font-family']) && !empty($apress_data['footer_title_typography']['font-family'])) {
	$footer_title_typography_css .= 'font-family: '.esc_attr($apress_data['footer_title_typography']['font-family']).';';
}
if(isset($apress_data['footer_title_typography']['font-size']) && !empty($apress_data['footer_title_typography']['font-size'])) {
	$footer_title_typography_css .= 'font-size: '.esc_attr($apress_data['footer_title_typography']['font-size']).';';
}
if(isset($apress_data['footer_title_typography']['line-height']) && !empty($apress_data['footer_title_typography']['line-height'])) {
	$footer_title_typography_css .= 'line-height: '.esc_attr($apress_data['footer_title_typography']['line-height']).';';
}
if(isset($apress_data['footer_title_typography']['font-style']) && !empty($apress_data['footer_title_typography']['font-style'])) {
	$footer_title_typography_css .= 'font-style: '.esc_attr($apress_data['footer_title_typography']['font-style']).';';
}
if(isset($apress_data['footer_title_typography']['font-weight']) && !empty($apress_data['footer_title_typography']['font-weight'])) {
	$footer_title_typography_css .= 'font-weight: '.esc_attr($apress_data['footer_title_typography']['font-weight']).';';
}
if(isset($apress_data['footer_title_typography']['letter-spacing']) && !empty($apress_data['footer_title_typography']['letter-spacing'])) {
	$footer_title_typography_css .= 'letter-spacing: '.esc_attr($apress_data['footer_title_typography']['letter-spacing']).';';
}
if(isset($apress_data['footer_title_typography']['text-align']) && !empty($apress_data['footer_title_typography']['text-align'])) {
	
	if ( is_rtl() ){

	if($apress_data['footer_title_typography']['text-align'] == 'left'){
		$footer_title_alignment = 'right';
	}else if($apress_data['footer_title_typography']['text-align'] == 'right'){
		$footer_title_alignment = 'left';
	}else{
		$footer_title_alignment = 'center';
	}

}else{
	
	if($apress_data['footer_title_typography']['text-align'] == 'left'){
		$footer_title_alignment = 'left';
	}else if($apress_data['footer_title_typography']['text-align'] == 'right'){
		$footer_title_alignment = 'right';
	}else{
		$footer_title_alignment = 'center';
	}
}
	
	$footer_title_typography_css .= 'text-align: '.esc_attr($footer_title_alignment).';';
}
if(isset($apress_data['footer_title_typography']['text-transform']) && !empty($apress_data['footer_title_typography']['text-transform'])) {
	$footer_title_typography_css .= 'text-transform: '.esc_attr($apress_data['footer_title_typography']['text-transform']).';';
}
if($footer_title_typography_color && !empty($footer_title_typography_color)) {
	$footer_title_typography_css .= 'color: '.esc_attr($footer_title_typography_color).';';
}

$output .= '.footer h3.widget-title{'.$footer_title_typography_css.'}';


$footer_typography_css = '';
$footer_typography_color = isset($apress_data['footer_typography']['color']) ? $apress_data['footer_typography']['color'] : '#dddddd';

if(isset($apress_data['footer_typography']['font-family']) && !empty($apress_data['footer_typography']['font-family'])) {
	$footer_typography_css .= 'font-family: '.esc_attr($apress_data['footer_typography']['font-family']).';';
}
if(isset($apress_data['footer_typography']['font-style']) && !empty($apress_data['footer_typography']['font-style'])) {
	$footer_typography_css .= 'font-style: '.esc_attr($apress_data['footer_typography']['font-style']).';';
}
if(isset($apress_data['footer_typography']['font-weight']) && !empty($apress_data['footer_typography']['font-weight'])) {
	$footer_typography_css .= 'font-weight: '.esc_attr($apress_data['footer_typography']['font-weight']).';';
}
if(isset($apress_data['footer_typography']['letter-spacing']) && !empty($apress_data['footer_typography']['letter-spacing'])) {
	$footer_typography_css .= 'letter-spacing: '.esc_attr($apress_data['footer_typography']['letter-spacing']).';';
}
if(isset($apress_data['footer_typography']['text-align']) && !empty($apress_data['footer_typography']['text-align'])) {
	$footer_typography_css .= 'text-align: '.esc_attr($apress_data['footer_typography']['text-align']).';';
}
if(isset($apress_data['footer_typography']['text-transform']) && !empty($apress_data['footer_typography']['text-transform'])) {
	$footer_typography_css .= 'text-transform: '.esc_attr($apress_data['footer_typography']['text-transform']).';';
}
if($footer_typography_color && !empty($footer_typography_color)) {
	$footer_typography_css .= 'color: '.esc_attr($footer_typography_color).';';
}

$output .= '.footer,.footer h1,.footer h2,.footer h3,.footer h4,.footer h5,.footer h6{'.$footer_typography_css.'}';
$footer_typography_font_size_line_height = '';
if(isset($apress_data['footer_typography']['font-size']) && !empty($apress_data['footer_typography']['font-size'])) {
	$footer_typography_font_size_line_height .= 'font-size: '.esc_attr($apress_data['footer_typography']['font-size']).';';

}
if(isset($apress_data['footer_typography']['line-height']) && !empty($apress_data['footer_typography']['line-height'])) {
	$footer_typography_font_size_line_height .= 'line-height: '.esc_attr($apress_data['footer_typography']['line-height']).';';
}
$output .= '.footer{'.$footer_typography_font_size_line_height.'}';


$page_titlebar_typography_css = '';
if(isset($apress_data['page_titlebar_typography']) && $apress_data['page_titlebar_typography'] && is_array($apress_data['page_titlebar_typography'])) {
if(isset($apress_data['page_titlebar_typography']['font-family']) && !empty($apress_data['page_titlebar_typography']['font-family'])) {
	$page_titlebar_typography_css .= 'font-family: '.esc_attr($apress_data['page_titlebar_typography']['font-family']).';';
}
if(isset($apress_data['page_titlebar_typography']['font-style']) && !empty($apress_data['page_titlebar_typography']['font-style'])) {
	$page_titlebar_typography_css .= 'font-style: '.esc_attr($apress_data['page_titlebar_typography']['font-style']).';';
}
if(isset($apress_data['page_titlebar_typography']['font-weight']) && !empty($apress_data['page_titlebar_typography']['font-weight'])) {
	$page_titlebar_typography_css .= 'font-weight: '.esc_attr($apress_data['page_titlebar_typography']['font-weight']).';';
}
if(isset($apress_data['page_titlebar_typography']['letter-spacing']) && !empty($apress_data['page_titlebar_typography']['letter-spacing'])) {
	$page_titlebar_typography_css .= 'letter-spacing: '.esc_attr($apress_data['page_titlebar_typography']['letter-spacing']).';';
}
if(isset($apress_data['page_titlebar_typography']['text-transform']) && !empty($apress_data['page_titlebar_typography']['text-transform'])) {
	$page_titlebar_typography_css .= 'text-transform: '.esc_attr($apress_data['page_titlebar_typography']['text-transform']).';';
}
$output .= '.pagetitle_parallax_content h1{'.$page_titlebar_typography_css.'}';
}


$archive_title_typography_css = '';
if(isset($apress_data['archive_title_typography']) && $apress_data['archive_title_typography'] && is_array($apress_data['archive_title_typography'])) {
if(isset($apress_data['archive_title_typography']['font-family']) && !empty($apress_data['archive_title_typography']['font-family'])) {
	$archive_title_typography_css .= 'font-family: '.esc_attr($apress_data['archive_title_typography']['font-family']).';';
}
if(isset($apress_data['archive_title_typography']['font-size']) && !empty($apress_data['archive_title_typography']['font-size'])) {
	$archive_title_typography_css .= 'font-size: '.esc_attr($apress_data['archive_title_typography']['font-size']).';';
}
if(isset($apress_data['archive_title_typography']['line-height']) && !empty($apress_data['archive_title_typography']['line-height'])) {
	$archive_title_typography_css .= 'line-height: '.esc_attr($apress_data['archive_title_typography']['line-height']).';';
}
if(isset($apress_data['archive_title_typography']['font-style']) && !empty($apress_data['archive_title_typography']['font-style'])) {
	$archive_title_typography_css .= 'font-style: '.esc_attr($apress_data['archive_title_typography']['font-style']).';';
}
if(isset($apress_data['archive_title_typography']['font-weight']) && !empty($apress_data['archive_title_typography']['font-weight'])) {
	$archive_title_typography_css .= 'font-weight: '.esc_attr($apress_data['archive_title_typography']['font-weight']).';';
}
if(isset($apress_data['archive_title_typography']['letter-spacing']) && !empty($apress_data['archive_title_typography']['letter-spacing'])) {
	$archive_title_typography_css .= 'letter-spacing: '.esc_attr($apress_data['archive_title_typography']['letter-spacing']).';';
}
if(isset($apress_data['archive_title_typography']['text-transform']) && !empty($apress_data['archive_title_typography']['text-transform'])) {
	$archive_title_typography_css .= 'text-transform: '.esc_attr($apress_data['archive_title_typography']['text-transform']).';';
}
if(isset($apress_data['archive_title_typography']['color']) && !empty($apress_data['archive_title_typography']['color'])) {
	$archive_title_typography_css .= 'color: '.esc_attr($apress_data['archive_title_typography']['color']).';';
}
$output .= '.post_title_area h2,
.portfolio_detail h2.portfolio_title{'.$archive_title_typography_css.'}';
}

$single_post_title_typography_css = '';
if(isset($apress_data['single_post_title_typography']) && $apress_data['single_post_title_typography'] && is_array($apress_data['single_post_title_typography'])) {
if(isset($apress_data['single_post_title_typography']['font-family']) && !empty($apress_data['single_post_title_typography']['font-family'])) {
	$single_post_title_typography_css .= 'font-family: '.esc_attr($apress_data['single_post_title_typography']['font-family']).';';
}
if(isset($apress_data['single_post_title_typography']['font-size']) && !empty($apress_data['single_post_title_typography']['font-size'])) {
	$single_post_title_typography_css .= 'font-size: '.esc_attr($apress_data['single_post_title_typography']['font-size']).';';
}
if(isset($apress_data['single_post_title_typography']['line-height']) && !empty($apress_data['single_post_title_typography']['line-height'])) {
	$single_post_title_typography_css .= 'line-height: '.esc_attr($apress_data['single_post_title_typography']['line-height']).';';
}
if(isset($apress_data['single_post_title_typography']['font-style']) && !empty($apress_data['single_post_title_typography']['font-style'])) {
	$single_post_title_typography_css .= 'font-style: '.esc_attr($apress_data['single_post_title_typography']['font-style']).';';
}
if(isset($apress_data['single_post_title_typography']['font-weight']) && !empty($apress_data['single_post_title_typography']['font-weight'])) {
	$single_post_title_typography_css .= 'font-weight: '.esc_attr($apress_data['single_post_title_typography']['font-weight']).';';
}
if(isset($apress_data['single_post_title_typography']['letter-spacing']) && !empty($apress_data['single_post_title_typography']['letter-spacing'])) {
	$single_post_title_typography_css .= 'letter-spacing: '.esc_attr($apress_data['single_post_title_typography']['letter-spacing']).';';
}
if(isset($apress_data['single_post_title_typography']['text-transform']) && !empty($apress_data['single_post_title_typography']['text-transform'])) {
	$single_post_title_typography_css .= 'text-transform: '.esc_attr($apress_data['single_post_title_typography']['text-transform']).';';
}
if(isset($apress_data['single_post_title_typography']['color']) && !empty($apress_data['single_post_title_typography']['color'])) {
	$single_post_title_typography_css .= 'color: '.esc_attr($apress_data['single_post_title_typography']['color']).';';
}
$output .= '.testimonial_single_page h2.testimonial-entry-title, .team_single_page h2.team-entry-title, body.single .post_title_area h1,.single_page_title{'.$single_post_title_typography_css.'}';
}

$post_meta_typography_css = '';
if(isset($apress_data['post_meta_typography']) && $apress_data['post_meta_typography'] && is_array($apress_data['post_meta_typography'])) {
if(isset($apress_data['post_meta_typography']['font-family']) && !empty($apress_data['post_meta_typography']['font-family'])) {
	$post_meta_typography_css .= 'font-family: '.esc_attr($apress_data['post_meta_typography']['font-family']).';';
}
if(isset($apress_data['post_meta_typography']['font-size']) && !empty($apress_data['post_meta_typography']['font-size'])) {
	$post_meta_typography_css .= 'font-size: '.esc_attr($apress_data['post_meta_typography']['font-size']).';';
}
if(isset($apress_data['post_meta_typography']['line-height']) && !empty($apress_data['post_meta_typography']['line-height'])) {
	$post_meta_typography_css .= 'line-height: '.esc_attr($apress_data['post_meta_typography']['line-height']).';';
}
if(isset($apress_data['post_meta_typography']['font-style']) && !empty($apress_data['post_meta_typography']['font-style'])) {
	$post_meta_typography_css .= 'font-style: '.esc_attr($apress_data['post_meta_typography']['font-style']).';';
}
if(isset($apress_data['post_meta_typography']['font-weight']) && !empty($apress_data['post_meta_typography']['font-weight'])) {
	$post_meta_typography_css .= 'font-weight: '.esc_attr($apress_data['post_meta_typography']['font-weight']).';';

}
if(isset($apress_data['post_meta_typography']['letter-spacing']) && !empty($apress_data['post_meta_typography']['letter-spacing'])) {
	$post_meta_typography_css .= 'letter-spacing: '.esc_attr($apress_data['post_meta_typography']['letter-spacing']).';';
}
if(isset($apress_data['post_meta_typography']['text-transform']) && !empty($apress_data['post_meta_typography']['text-transform'])) {
	$post_meta_typography_css .= 'text-transform: '.esc_attr($apress_data['post_meta_typography']['text-transform']).';';
}
if(isset($apress_data['post_meta_typography']['color']) && !empty($apress_data['post_meta_typography']['color'])) {
	$post_meta_typography_css .= 'color: '.esc_attr($apress_data['post_meta_typography']['color']).';';
}
$output .= '.zolo_blog_date_style5,.apress_postmeta_area,.zolo_blog_meta,.post-bottom-info,.zolo_blog_post_slider_area ul.metatag_list,ul.entry_meta_list,.entry-meta,.zolo_blog_box .zolo_blog_author, .zolo_blog_box .zolo_blog_date,.social_sharing_icon{'.$post_meta_typography_css.'}';
}

$output .= '.footer .zolo-about-me ul.zolo-about-me-social li a,
.footer a{color:'.$footer_link_color_regular.'}';
$output .= '.footer .zolo-about-me ul.zolo-about-me-social li a:hover, .footer .widget.widget_nav_menu li.current-menu-item a, .footer .widget.widget_pages li.current_page_item a,
.footer a:hover{color:'.$footer_link_color_hover.';}';
$output .= '.vertical_copyright,.copyright{font-size:'.$copyright_font_size.'px;color:'.$copyright_text_color.';}';
$output .= '.copyright a{color:'.$copyright_link_color_regular.';}';
$output .= '.copyright a:hover{color:'.$copyright_link_color_hover.';}';
$output .= '.pagination,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li span, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li span,
.page-numbers{font-size:'.$pagination_font_size.'px;line-height:'.$pagination_font_size.'px;}';
//Typography Area End

//Styling Area Start
//Primary Color Start
$output .= '.widget_calendar caption,.widget_calendar th,.widget_calendar tbody td#today,.widget_calendar a:hover, .zolo_zilla_likes_box, .posttype_gallery_slider .zolo_blog_icons .zolo_blog_icon, .navigation .nav-next a, .navigation .nav-previous a, .paging-navigation .nav-next a:hover, .navigation .nav-previous a:hover, #bbpress-forums fieldset.bbp-form legend, .favorite-toggle,a.subscription-toggle, .subscription-toggle{'.$apress_theme_primary_background_color.';}';

$output .= '::-moz-selection{background:'.$primary_color.';color:#fff;}';
$output .= '::selection{background:'.$primary_color.';color:#fff;}';

$output .= '.wp-block-quote:not(.is-large):not(.is-style-large), article blockquote,.zolo_navbar_search.default_search_but .nav_search_form_area .search-form .search-submit{border-color:'.$primary_color.';}';
$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,.title404,.zoloblogstyle1 .post_title_area h2 a:hover,.zolo-about-me ul.zolo-about-me-social li a,nav.woocommerce-MyAccount-navigation ul li.is-active a,nav.woocommerce-MyAccount-navigation ul li a:hover{color:'.$primary_color.';}';
$output .= '.zolo_navbar_search.expanded_search_but .nav_search_form_area input,.zolo-about-me ul.zolo-about-me-social li a{border-color:'.$primary_color.'!important;}';
//Primary Color End

$output .= 'a{color:'.$body_link_color_regular.';}';
$output .= '.widget.widget_nav_menu li.current-menu-item a,.widget.widget_pages li.current_page_item a,a:hover{'.$apress_theme_link_text_color.'}';
$output .= '.woocommerce div.product .stock, .woocommerce #content div.product .stock, .woocommerce-page div.product .stock, .woocommerce-page #content div.product .stock,
.woocommerce div.product span.price del, .woocommerce div.product p.price del, .woocommerce #content div.product span.price del, .woocommerce #content div.product p.price del, .woocommerce-page div.product span.price del, .woocommerce-page div.product p.price del, .woocommerce-page #content div.product span.price del, .woocommerce-page #content div.product p.price del,.woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce #content div.product span.price, .woocommerce #content div.product p.price, .woocommerce-page div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page #content div.product p.price,
.woocommerce ul.products li.product .price{color:'.$body_typography_color.'!important;}';
// Pagination Start
$output .= '.page-numbers li a,.page-numbers li span.dots,.woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li span, .woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li span{color:'.$Pagi_font_regular_color.'!important;background:'.$Pagi_background_color_regular.';border: 1px solid '.$Pagi_border_color_regular.';}';
// Hover
$output .= '.zolo_blog_area .page-numbers li span,.zolo_blog_area .page-numbers li a:hover,.zolo_portfolio_area .page-numbers li a:hover,.page-numbers li span,.page-numbers li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus{color:'.$Pagi_font_hover_color.'!important;'.$Pagi_background_color_hover.'border: 1px solid '.$Pagi_border_color_hover.';}';
// Pagination End 
$output .= 'body.single .post-navigation .post-meta-nav-title{font-size:'.$header_h4_typography_font_size.'; line-height:'.$header_h4_typography_line_height.';}';
$output .= 'body.single .post-navigation .post-meta-nav{border-color:'.$body_link_color_regular.';}';
$output .= 'body.single .post-navigation a:hover .post-meta-nav{border-color:'.$post_navigation_font_color_hover.';}';

// Back to top Start 

$output .= 'a.default_back-to-top,a.back-to-top{'.$backtotop_background_color.'color:'.$backtotop_font_color_regular.';border:1px solid '.$backtotop_border_color.';}';
$output .= 'a.default_back-to-top:hover,a.back-to-top:hover{'.$backtotop_hoverbg_color.'color:'.$backtotop_font_color_hover.';border:1px solid '.$backtotop_hoverborder_color.';}';

if($header_position == 'Right'){
$backtotop_position_from_right = $side_header_width + 20;
$output .= '.back-to-top{right:'.$backtotop_position_from_right.'px;}';
}
// Back to top End

// Extended Sidebar Start


if(isset($apress_data["extended_sidebar_width"])){
$output .= '.extended_sidebar_box.extended_sidebar_position_right.extended_sidebar_mask_open{right:'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_position_right .extended_sidebar_area{right:-'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_area{width:'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_box.extended_sidebar_position_left.extended_sidebar_mask_open{left:'.$extended_sidebar_width.';}';
$output .= '.extended_sidebar_position_left .extended_sidebar_area{left:-'.$extended_sidebar_width.';}';
}
if(isset($apress_data["sitelayout_padding"])){
$output .= '.extended_sidebar_box .extended_sidebar_mask{top:-'.$sitelayout_padding_top.';}';
}
if(isset($apress_data["extended_sidebar_bg"])){
	
	$extended_sidebar_bg_css = '';
	if(isset($apress_data['extended_sidebar_bg']['background-image']) && !empty($apress_data['extended_sidebar_bg']['background-image'])){
		$extended_sidebar_bg_css .= 'background-image: url('.esc_url($apress_data['extended_sidebar_bg']['background-image']).');';
		}
	if(isset($apress_data['extended_sidebar_bg']['background-color']) && !empty($apress_data['extended_sidebar_bg']['background-color'])){
		$extended_sidebar_bg_css .= 'background-color: '.esc_attr($apress_data['extended_sidebar_bg']['background-color']).';';
		}
	if(isset($apress_data['extended_sidebar_bg']['background-repeat']) && !empty($apress_data['extended_sidebar_bg']['background-repeat'])){
		$extended_sidebar_bg_css .= 'background-repeat:'.$apress_data['extended_sidebar_bg']['background-repeat'].';';
		}
	if(isset($apress_data['extended_sidebar_bg']['background-size']) && !empty($apress_data['extended_sidebar_bg']['background-size'])){
		$extended_sidebar_bg_css .= 'background-size:'.$apress_data['extended_sidebar_bg']['background-size'].';';
		}
	if(isset($apress_data['extended_sidebar_bg']['background-position']) && !empty($apress_data['extended_sidebar_bg']['background-position'])){
		$extended_sidebar_bg_css .= 'background-position:'.$apress_data["extended_sidebar_bg"]["background-position"].';';
		}
	$output .= '.extended_sidebar_area{'.$extended_sidebar_bg_css.'}';
}

if($extended_font_color){
$output .= '.extended_sidebar_area h1,.extended_sidebar_area h2,.extended_sidebar_area h3,.extended_sidebar_area h4,.extended_sidebar_area h5,.extended_sidebar_area h6,.extended_sidebar_area,.extended_sidebar_area .widget,.extended_sidebar_area .widget h3.widget-title{color:'.$extended_font_color.';}';
}
if(isset($apress_data["extended_link_color"])){
$output .= '.extended_sidebar_area a,.extended_sidebar_area .widget a{color:'.$extended_link_color_regular.';}';
}


$output .= '.extended_sidebar_area a:hover,.extended_sidebar_area .widget a:hover{'.$extended_link_color_hover.';}';

if(isset($apress_data["extended_border_color"])){
$output .= '.extended_sidebar_area .widget li,.extended_sidebar_area .widget.widget_nav_menu li a{border-color:'.$apress_data['extended_border_color'].'!important;}';
}
// Extended Sidebar End

//Single Post CSS Start

if($single_post_layout_width_page == ''){
$single_post_layout_width = $single_post_layout_width_admin;
}else{
$single_post_layout_width = $single_post_layout_width_page;
}
$output .= '.single_post_content_wrapper{ max-width:'.$single_post_layout_width.';}';

//Single Post CSS End

//Post & Portfolio Navigation CSS Start
if(is_singular( 'zt_portfolio' )){
$posttype = 'portfolio';
}else{
$posttype = 'post';
}

$output .= 'body.single .post-navigation.navigation_style1 a{color:'.$post_navigation_font_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style1 a:hover{color:'.$post_navigation_font_color_hover.';}';
$output .= 'body.single .post-navigation.navigation_style1 .post-meta-nav{border-color:'.$post_navigation_font_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style1 a:hover .post-meta-nav{border-color:'.$post_navigation_font_color_hover.';}';

$output .= 'body.single .post-navigation.navigation_style2,body.single .post-navigation.navigation_style2 a{color:'.$post_navigation_font_color_regular.';background-color:'.$post_navigation_bg_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style2 a:hover{color:'.$post_navigation_font_color_hover.';background-color:'.$post_navigation_bg_color_hover.';}';

$output .= 'body.single .post-navigation.navigation_style3 a.pagination_button{color:'.$post_navigation_font_color_regular.';background-color:'.$post_navigation_bg_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style3 a.pagination_button:hover,
body.single .post-navigation.navigation_style3 .pagination_thumb_area{color:'.$post_navigation_font_color_hover.';background-color:'.$post_navigation_bg_color_hover.';}';

$output .= 'body.single .post-navigation.navigation_style4 .pagination_caption{color:'.$post_navigation_font_color4_w.';}';
$output .= 'body.single .post-navigation.navigation_style4 a .pagination_bg:after{background:'.$post_navigation_overlay_color.';}';

//Post & Portfolio Navigation CSS End

//Portfolio CSS Start

$output .= '.portfolio_layout article{padding:'.$portfolio_column_spacing.'px;}';
$output .= '.portfolio_layout .site-content{margin:0 -'.$portfolio_column_spacing.'px;}';
if($portfolio_gallery_layout != 'gallery_layout_style1' && $portfolio_gallery_gutter){
$output .= 'ul.portfolio_featured_list.big_2column_style, ul.portfolio_featured_list.big_3column_style, ul.portfolio_featured_list.masonry_style, ul.portfolio_featured_list.grid_style{margin:-'.$portfolio_gallery_gutter.'px;}';
$output .= 'ul.portfolio_featured_list.big_3column_style li, ul.portfolio_featured_list.big_2column_style li, ul.portfolio_featured_list.masonry_style li, ul.portfolio_featured_list.masonry_style.packery_style li,ul.portfolio_featured_list.grid_style li, ul.portfolio_featured_list.packery_style.portfolio_gallery_gutter_on li{padding:'.$portfolio_gallery_gutter.'px;}';

$output .= 'ul.portfolio_featured_list.list_style li{padding:0 0 '.$portfolio_gallery_gutter.'px 0;}';
$output .= 'ul.portfolio_featured_list.list_style{margin:0 0 -'.$portfolio_gallery_gutter.'px 0;display: inline-block;}';
}

//Portfolio Hover Effects CSS Start
if($portfolio_hover_effects == 'fade_effect' || $portfolio_hover_effects == 'zoomin_effect' || $portfolio_hover_effects == 'zoomout_effect'){
$output .= '.portfolio_featured_area .portfolio_featured_thumb:hover:after{background:'.$portfolio_overlay_color.';}';

}else if($portfolio_hover_effects == 'gradient_effect'){
$output .= '.portfolio_featured_area .portfolio_featured_thumb:hover:after{
background:'.$portfolio_overlay_gradient_from.';
background: -moz-linear-gradient(0deg, '.$portfolio_overlay_gradient_from.' 0%, '.$portfolio_overlay_gradient_to.' 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%, '.$portfolio_overlay_gradient_from.'), color-stop(100%, '.$portfolio_overlay_gradient_to.'));
background: -webkit-linear-gradient(0deg, '.$portfolio_overlay_gradient_from.' 0%, '.$portfolio_overlay_gradient_to.' 100%);
background: -o-linear-gradient(0deg, '.$portfolio_overlay_gradient_from.' 0%, '.$portfolio_overlay_gradient_to.' 100%);
background: -ms-linear-gradient(0deg, '.$portfolio_overlay_gradient_from.' 0%, '.$portfolio_overlay_gradient_to.' 100%);
background: linear-gradient(90deg, '.$portfolio_overlay_gradient_from.' 0%, '.$portfolio_overlay_gradient_to.' 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$portfolio_overlay_gradient_from.', endColorstr='.$portfolio_overlay_gradient_to.',GradientType=1 );opacity: 0.8;}';
}
//Portfolio Hover Effects CSS End


//Testimonial CSS Start
$output .= '.testimonial_star .star_rating .filled::before{'.$rating_star_color.'}';

$output .= 'body.single .post-navigation.navigation_style2.testimonial_navigation,body.single .post-navigation.navigation_style2.testimonial_navigation a{color:'.$testimonial_navigation_font_color_regular.';background-color:'.$testimonial_navigation_bg_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style2.testimonial_navigation a:hover{color:'.$testimonial_navigation_font_color_hover.';background-color:'.$testimonial_navigation_bg_color_hover.';}';
//Testimonial CSS End

//Team CSS Start
$output .= 'body.single .post-navigation.navigation_style2.team_navigation,body.single .post-navigation.navigation_style2.team_navigation a{color:'.$team_navigation_font_color_regular.';background-color:'.$team_navigation_bg_color_regular.';}';
$output .= 'body.single .post-navigation.navigation_style2.team_navigation a:hover{color:'.$team_navigation_font_color_hover.';background-color:'.$team_navigation_bg_color_hover.';}';
//Team CSS End


//Styling Area End

if( class_exists('Woocommerce') ) {	
//WooCommerce  Start
$output .= '.apress_wish_counter, .cart-number,.woocommerce .zt-tiny-cart-wrapper .cart-dropdown-form .dropdown-footer a.button,
.zt-tiny-cart-wrapper .cart-dropdown-form .dropdown-footer a.button{'.$woo_minicart_button_bg_color.'color:'.$woo_minicart_button_text_color.';}';

$output .= '.woocommerce .zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li a.remove, .zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li a.remove, .woocommerce .zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li a.remove:hover{'.$woo_minicart_button_remove_color.';}';

$output .= '.zt-tiny-cart-wrapper:hover .cart-dropdown-form,
.zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li h3.product-name a{color:'.$woo_minicart_font_color.';background:'.$woo_minicart_box_color.';}';

$output .= '.zt-tiny-cart-wrapper .cart-dropdown-form ul.cart-list li{border-color:'.$woo_minicart_separator_color.';}';

$output .= 'ul.products li.product .button, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover,
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce #content input.button:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page #content input.button:hover,
.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .out_of_stock_badge_loop, .woocommerce-page .out_of_stock_badge_loop,
.woocommerce ul.products li.product span.onsale,.woocommerce .product_image_wrap span.onsale, .woocommerce_products_element .out_of_stock_badge_loop, .woocommerce_products_element span.onsale, .woocommerce-page ul.products li.product span.onsale,.woocommerce span.onsale::after, .woocommerce-page span.onsale::after,.woocommerce-page ul.products li.product .zolo_product_thumbnail .zolo_cart_but a.added_to_cart, .woocommerce ul.products li.product .zolo_product_thumbnail .zolo_cart_but a.added_to_cart, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button{'.$woo_product_button_bg_color.';}';

$output .= '.star-rating span:before, .woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before{'.$woo_product_button_color.';}';

$output .= '.woocommerce p.stars.selected a,.woocommerce p.stars a,.woocommerce p.stars.selected a:not(.active):before{color:'.$woo_product_button_color2.';}';

if($woo_product_bg_color){ 
$output .= '.woocommerce-page ul.products li.product .product_list_item, .woocommerce ul.products li.product .product_list_item{background:'.$woo_product_bg_color.';}';
}
if($woo_product_bor_color){
$output .= '.woocommerce-page ul.products li.product .product_list_item, .woocommerce ul.products li.product .product_list_item{border-color:'.$woo_product_bor_color.'!important;}';
}
if($woo_product_shadow_showhide == 'show'){
$output .= '.woocommerce-page ul.products li.product .product_list_item:hover, .woocommerce ul.products li.product .product_list_item:hover{ box-shadow:'.$apress_data["woo_product_shadow_parameters"]["padding-top"].' '.$apress_data["woo_product_shadow_parameters"]["padding-right"].' '.$apress_data["woo_product_shadow_parameters"]["padding-bottom"].' '.$apress_data["woo_product_shadow_parameters"]["padding-left"].' '.$apress_data["woo_product_shadow_color"].';}';
}

if($woo_product_overlaybg_color){ 
$output .= 'ul.products li.product .zolo_product_thumbnail:after{background:'.$woo_product_overlaybg_color.'!important;}';
}
$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a{color:'.$body_typography_color.'!important;}';
$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a{color:'.$primary_color.'!important;}';

$output .= '.woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active{border-bottom-color:'.$primary_color.'!important;}';


$output .= 'ul.products.woocommerce_product_style7 li.product a.button, .woo_product_button_group .product_shop_wishlist_button, .woo_product_button_group .product_cart_button, .woo_product_button_group .product_quickview_button, .woo_product_button_group .product_compare_button{background:'.$woo_product_icon_bg_color_regular.';}';

$output .= 'ul.products.woocommerce_product_style7 li.product a.button:hover, .woo_product_button_group .product_shop_wishlist_button:hover, .woo_product_button_group .product_cart_button:hover, .woo_product_button_group .product_quickview_button:hover, .woo_product_button_group .product_compare_button:hover{background:'.$woo_product_icon_bg_color_hover.';}';

$output .= 'ul.products.woocommerce_product_style7 li.product a.button, .woo_product_button_group .product_shop_wishlist_button a.shop_wishlist_button, .woo_product_button_group .product_cart_button a.button, .woo_product_button_group .product_compare_button a.button.compare, .woo_product_button_group .product_quickview_button a.apress-qv-button{color:'.$woo_product_icon_color_regular.'!important;}';

$output .= 'ul.products.woocommerce_product_style7 li.product a.button:hover, .woo_product_button_group .product_shop_wishlist_button:hover a.shop_wishlist_button, .woo_product_button_group .product_cart_button:hover a.button, .woo_product_button_group .product_compare_button:hover a.button.compare, .woo_product_button_group .product_quickview_button:hover a.apress-qv-button{color:'.$woo_product_icon_color_hover.'!important;}';

$output .= '.woo_product_button_group .product_shop_wishlist_button a.shop_wishlist_button.wishlist-link{background:'.$primary_color.' !important;color:#fff!important;}';
$output .= '.woocommerce div.product .stock, .woocommerce #content div.product .stock, .woocommerce-page div.product .stock, .woocommerce-page #content div.product .stock{color:'.$primary_color.'!important;}';

$output .= '.woocommerce ul.products li.product .product_list_item .woo_product_button_group .wc_tooltip::before{border-color: '.$woo_product_icon_tooltip_bg.' transparent transparent;}';
$output .= '.woocommerce ul.products.woocommerce_product_style6 li.product .product_list_item .woo_product_button_group .wc_tooltip::before{border-color:  transparent transparent transparent '.$woo_product_icon_tooltip_bg.';}';

$output .= '.woocommerce ul.products.woocommerce_product_style7 li.product .product_list_item .woo_product_button_group .wc_tooltip::before{border-color:  transparent '.$woo_product_icon_tooltip_bg.' transparent transparent;}';
$output .= '.woocommerce ul.products li.product .product_list_item .woo_product_button_group .wc_tooltip{background:'.$woo_product_icon_tooltip_bg.';color:'.$woo_product_icon_tooltip_text_color.';}';

$output .= 'body.woocommerce .product .summary .product_compare_button a.compare{color:'.$body_link_color_regular.';}';
$output .= '.woocommerce .product .summary .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover:after,
.woocommerce .product .summary .product_compare_button a.compare:hover:after,
body.woocommerce .product .summary .product_compare_button a.compare:hover{'.$apress_theme_link_text_color.'}';

$woocommerce_product_gutter_bottom = $woocommerce_product_gutter + $woocommerce_product_gutter;
$output .= 'ul.products li.product{padding:0 '.$woocommerce_product_gutter.'px '.$woocommerce_product_gutter_bottom.'px;}';
$output .= '.woocommerce .related ul, .woocommerce .related ul.products, .woocommerce .upsells.products ul, .woocommerce .upsells.products ul.products, .woocommerce-page .related ul, .woocommerce-page .related ul.products, .woocommerce-page .upsells.products ul, .woocommerce-page .upsells.products ul.products,
.woocommerce .products ul, .woocommerce ul.products, .woocommerce-page .products ul, .woocommerce-page ul.products{margin:0 -'.$woocommerce_product_gutter.'px 1em;padding-top:15px;}';

$output .= '.product_detail_bg{background:'.$woo_product_detail_bg_color.';}';

//WooCommerce  End
}

//Blog Grid Box CSS Start
$output .= '.portfolio_layout article .portfoliopage_content,.blog_layout .blog_layout_box .blogpage_content,.blog_layout .blog_layout_box_withoutpadding .blogpage_content{background:'.$bloggrid_box_bg_color.';}';
$output .= '.portfolio_layout article .portfoliopage_content,.blog_layout .blog_layout_box .blogpage_content,.blog_layout .blog_layout_box_withoutpadding .blogpage_content{box-shadow: 0 0px 2px '.$bloggrid_box_shadow_color.';}';
$output .= '.blog_layout .blog_layout_box .blogpage_content:hover,.blog_layout .blog_layout_box_withoutpadding .blogpage_content:hover{box-shadow: 0 0px 7px '.$bloggrid_box_shadow_color.';}';

if ( is_rtl() ){

	if($post_title_alignment == 'left'){
		$posttitle_alignment = 'right';
	}else if($post_title_alignment == 'right'){
		$posttitle_alignment = 'left';
	}else{
		$posttitle_alignment = 'center';
	}

}else{
	
	if($post_title_alignment == 'left'){
		$posttitle_alignment = 'left';
	}else if($post_title_alignment == 'right'){
		$posttitle_alignment = 'right';
	}else{
		$posttitle_alignment = 'center';
	}
}
$output .= '.read_more_area,.blog_layout .share-box,.post_title_area{text-align:'.$posttitle_alignment.'}';
//Categories area CSS
$output .= '.categories-links.rounded a,.categories-links.box a{background:'.$post_category_bg.';}';
$output .= '.categories-links.rounded a,.categories-links.box a{border: 1px solid '.$post_category_border.';}';
$output .= '.categories-links.rounded a,.categories-links.box a{color:'.$post_category_font_regular.'}';
$output .= '.categories-links.rounded a:hover,.categories-links.box a:hover{color:'.$post_category_font_hover.'}';
$output .= '.categories-links.rounded a:hover,.categories-links.box a:hover{'.$post_category_bg_hover.';}';
$output .= '.categories-links.rounded a:hover, .categories-links.box a:hover{border: 1px solid '.$post_category_border_hover.';}';

//Continue Reading Button
$output .= 'a.more-link,.read_more_area a.read-more{background:'.$post_continuereading_bg.';}';
$output .= 'a.more-link,.read_more_area a.read-more{border: 1px solid '.$post_continuereading_border.';}';
$output .= 'a.more-link,.read_more_area a.read-more{color:'.$post_continuereading_font_regular.'}';
$output .= 'a.more-link:hover,.read_more_area a.read-more:hover{color:'.$post_continuereading_font_hover.'}';
$output .= 'a.more-link:hover,.read_more_area a.read-more:hover{'.$post_continuereading_bg_hover.'}';
$output .= 'a.more-link:hover,.read_more_area a.read-more:hover{border: 1px solid '.$post_continuereading_border_hover.';}';
//Share Box
$output .= '.share-box li a{-moz-border-radius:'.$post_social_sharing_border_radius.'px;-webkit-border-radius:'.$post_social_sharing_border_radius.'px;-ms-border-radius:'.$post_social_sharing_border_radius.'px;-o-border-radius:'.$post_social_sharing_border_radius.'px;border-radius:'.$post_social_sharing_border_radius.'px;}';

if($social_share_style == 'default'){ 
$output .= '.share-box li a{background:'.$post_social_share_bg.';}';
$output .= '.share-box li a:hover{'.$post_social_share_bg_hover.'}';
$output .= '.share-box li a{border: 1px solid '.$post_social_share_border_regular.';}';
$output .= '.share-box li a:hover{border: 1px solid '.$post_social_share_border_hover.';}';
$output .= '.share-box li a{color:'.$post_social_share_font_regular.'}';
$output .= '.share-box li a:hover{color:'.$post_social_share_font_hover.'}';
}else{
$output .= '.share-box ul.social_share_style_metro li a{color:#fff;background:none;border:0!important;}';
$output .= '.share-box ul.social_share_style_metro li.facebook a{background:#37589b;}';
$output .= '.share-box ul.social_share_style_metro li.twitter a{background:#58ccff;}';
$output .= '.share-box ul.social_share_style_metro li.linkedin a{background:#419cca;}';
$output .= '.share-box ul.social_share_style_metro li.tumblr a{background:#36465d;}';
$output .= '.share-box ul.social_share_style_metro li.google a{background:#de5a49;}';
$output .= '.share-box ul.social_share_style_metro li.pinterest a{background:#bd081c;}';
$output .= '.share-box ul.social_share_style_metro li.email a{background:#aaaaaa;}';

}
//Blog Grid Box CSS End
//Contact Form CSS Start
$output .= '.wpcf7-form input:focus, .wpcf7-form textarea:focus{border-color:'.$contact_form_input_focus_color.'!important;}';
$output .= '.wpcf7-form select,.wpcf7-form .uneditable-input,.wpcf7-form input,.wpcf7-form textarea{border-color:'.$contact_form_input_bor_color.';background:'.$contact_form_input_bg_color.';}';
$output .= '.wpcf7-form select,.wpcf7-form .uneditable-input, .wpcf7-form input, .wpcf7-form textarea,.wpcf7-form{color:'.$contact_form_text_color.';}';
$output .= '.wpcf7-form button, .wpcf7-form input[type=reset], .wpcf7-form input[type=submit], html .wpcf7-form input[type=button]{border:1px solid '.$contact_form_button_bor_color.'!important;}';
$output .= '.wpcf7-form button:hover, .wpcf7-form input[type=reset]:hover, .wpcf7-form input[type=submit]:hover, html .wpcf7-form input[type=button]:hover{border-color:'.$contact_form_button_bor_color_h.'!important;}';

$output .= '.wpcf7-form button, .wpcf7-form input[type=reset], .wpcf7-form input[type=submit], html .wpcf7-form input[type=button]{'.$contact_form_button_bg_color.'}';

$output .= '.wpcf7-form button:hover, .wpcf7-form input[type=reset]:hover, .wpcf7-form input[type=submit]:hover, html .wpcf7-form input[type=button]:hover{'.$contact_form_button_bg_color_h.'opacity:1;}';

$output .= '.zt_button_icon,.zt_button_icon_right,.wpcf7-form button, .wpcf7-form input[type=reset], .wpcf7-form input[type=submit], html .wpcf7-form input[type=button]{color:'.$contact_form_button_font_color_regular.'!important;}';
$output .= '.zt_button_icon:hover,.zt_button_icon_right:hover,.wpcf7-form button:hover, .wpcf7-form input[type=reset]:hover, .wpcf7-form input[type=submit]:hover, html .wpcf7-form input[type=button]:hover{color:'.$contact_form_button_font_color_hover.'!important;}';
//Contact Form CSS End

//Full Page Scroll CSS Start
$page_full_screen_rows = get_post_meta($cur_id, 'zt_full_screen_rows', true ); 
if($page_full_screen_rows == 'on'){
$fullpage_tooltip_color = get_post_meta( $cur_id, 'zt_fullpage_tooltip_color', true );
$output .= '#fp-nav ul li .fp-tooltip{color:'.$fullpage_tooltip_color.'}';
$output .= '#fp-nav ul li .fp-tooltip.right:after{background:'.$fullpage_tooltip_color.'}';
$output .= '#fp-nav ul li a.active span,.fp-slidesNav ul li a.active span,#fp-nav ul li:hover a.active span,.fp-slidesNav ul li:hover a.active span{box-shadow:inset 0 0 0 1px '.$fullpage_tooltip_color.';}';
$output .= '#fp-nav ul li a span,.fp-slidesNav ul li a span {box-shadow: 0 0 0 5px '.$fullpage_tooltip_color.' inset;}';

$output .= '.header_show_with_light_row #fp-nav ul li .fp-tooltip,
.header_show_with_light_row .header_section_three a, .header_show_with_light_row .header_section_three,
.header_show_with_light_row .zolo-topbar input, 
.header_show_with_light_row .zolo-header-area #lang_sel a.lang_sel_sel,
.header_show_with_light_row .zolo-topbar a, .header_show_with_light_row .zolo-topbar,
.header_show_with_light_row .zolo-header-area .zolo-social ul.social-icon li a,
.header_show_with_light_row .header_section_two a, .header_show_with_light_row .header_section_two,
.header_show_with_light_row .zolo-navigation ul li > a{color:'.$light_text_color.'}';

$output .= '.header_show_with_light_row #fp-nav ul li .fp-tooltip.right:after,
.header_show_with_light_row .header_section_two .nav_search-icon.search_close_icon::after, 
.header_show_with_light_row .header_section_two .nav_search-icon::before{background:'.$light_text_color.'}';
$output .= '.header_show_with_light_row .header_section_two .cart-control::before, .header_show_with_light_row .header_section_two .cart-control::after, .header_show_with_light_row .header_section_two .nav_search-icon::after{border-color:'.$light_text_color.'}';

$output .= '.header_show_with_light_row #fp-nav ul li a.active span,.header_show_with_light_row .fp-slidesNav ul li a.active span,.header_show_with_light_row #fp-nav ul li:hover a.active span,.header_show_with_light_row .fp-slidesNav ul li:hover a.active span{box-shadow:inset 0 0 0 1px '.$light_text_color.';}';
$output .= '.header_show_with_light_row #fp-nav ul li a span,.header_show_with_light_row .fp-slidesNav ul li a span {box-shadow: 0 0 0 5px '.$light_text_color.' inset;}';

$output .= '.header_show_with_dark_row #fp-nav ul li .fp-tooltip,
.header_show_with_dark_row .header_section_three a, .header_show_with_dark_row .header_section_three,
.header_show_with_dark_row .zolo-topbar input, 
.header_show_with_dark_row .zolo-header-area #lang_sel a.lang_sel_sel, 
.header_show_with_dark_row .zolo-topbar a, .header_show_with_dark_row .zolo-topbar,
.header_show_with_dark_row .zolo-header-area .zolo-social ul.social-icon li a,
.header_show_with_dark_row .header_section_two a, .header_show_with_dark_row .header_section_two,
.header_show_with_dark_row .zolo-navigation ul li > a{color:'.$dark_text_color.'}';

$output .= '.header_show_with_dark_row #fp-nav ul li .fp-tooltip.right:after,
.header_show_with_dark_row .header_section_two .nav_search-icon.search_close_icon::after, 
.header_show_with_dark_row .header_section_two .nav_search-icon::before{background:'.$dark_text_color.'}';
$output .= '.header_show_with_dark_row .header_section_two .cart-control::before, .header_show_with_dark_row .header_section_two .cart-control::after, .header_show_with_dark_row .header_section_two .nav_search-icon::after{border-color:'.$dark_text_color.'}';

$output .= '.header_show_with_dark_row #fp-nav ul li a.active span,.header_show_with_dark_row .fp-slidesNav ul li a.active span,.header_show_with_dark_row #fp-nav ul li:hover a.active span,.header_show_with_dark_row .fp-slidesNav ul li:hover a.active span{box-shadow:inset 0 0 0 1px '.$dark_text_color.';}';
$output .= '.header_show_with_dark_row #fp-nav ul li a span,.header_show_with_dark_row .fp-slidesNav ul li a span {box-shadow: 0 0 0 5px '.$dark_text_color.' inset;}';
}
$fullpage_scroll_logo_showhide = isset($apress_data["fullpage_scroll_logo_showhide"]) ? $apress_data["fullpage_scroll_logo_showhide"] : 'on';
if($fullpage_scroll_logo_showhide == 'on'){
$output .= '.header_show_with_dark_row .logo{opacity: 0;visibility: hidden;}';
}

//Full Page Scroll CSS End

//Mobile Site CSS Start
$output .= '.mobile_header_area header.zolo_header .headercontent_box{padding-top:'.$mobile_header_padding_top.';}';
$output .= '.mobile_header_area header.zolo_header .headercontent_box{padding-bottom:'.$mobile_header_padding_bottom.';}';
$output .= '.mobile_header_area header.zolo_header .headercontent_box{padding-right:'.$mobile_header_padding_right.';padding-left:'.$mobile_header_padding_left.';}';

$output .= '.mobile_header_area .logo-box{padding:'.$mobile_logo_margin_top.' '.$mobile_logo_margin_right.' '.$mobile_logo_margin_bottom.' '.$mobile_logo_margin_left.';}';

$output .= '.zolo_mobile_navigation_area{'.$mobile_menu_background_color.'}';
$output .= '.mobile-nav ul li a:hover{background:'.$mobile_menu_background_color_hover.';}';
$output .= '.mobile-nav ul li a{font-size:'.$mobile_font_size.'px;line-height:'.$mob_menu_lh.'px;}';
$output .= '.open-submenu{height:'.$mob_menu_lh.'px;}';
$output .= '.mobile_header_area ul.mob_nav_icons li a{color:'.$mobile_navbar_icon_color.'!important;}';
$output .= '.mobile_header_area .nav_search-icon.search_close_icon:after,.mobile_header_area .nav_search-icon:before,#nav_toggle .nav_bar{background:'.$mobile_navbar_icon_color.'!important;}';
$output .= '.mobile_header_area .nav_search-icon:after{border-color:'.$mobile_navbar_icon_color.'!important;}';
$output .= '.open-submenu:after,.mobile-nav ul li a{color:'.$mobile_menu_font_color_reular.'!important;}';
$output .= '.mobile-nav ul li a:hover{color:'.$mobile_menu_font_color_hover.'!important;}';
$output .= '.mobile-nav ul li a{border-bottom:1px solid '.$mobile_menu_border_color.'!important;}';
$output .= '.mobile_header_area .headerbackground,.mobile_header_area .header_background{'.$apress_theme_mobile_header_bg_color.'}';

//Mobile Site CSS End 

if($footer_custommenu_style_show == 'on'){

$output .= '.apress-widget-menu-vertical li{padding-left:15px;}';
$output .= '.apress-widget-menu-vertical li:after{ position:absolute; content:"\f105";font-family: FontAwesome; left:0; top:50%;font-size:14px; 
-moz-transform:translate(0px, -50%) translateX(0px);
-webkit-transform:translate(0px, -50%) translateX(0px);
-ms-transform:translate(0px, -50%) translateX(0px);
-o-transform:translate(0px, -50%) translateX(0px);
transform:translate(0px, -50%) translateX(0px);
}';

if($footer_custommenu_color_option == 'primary'){
		$footer_custommenu_icon_bg_color = $apress_theme_primary_background_color;
		$footer_custommenu_icon_text_color = $apress_theme_primary_text_color;
	}else if($footer_custommenu_color_option == 'custom'){
		$footer_custommenu_icon_bg_color = 'background:'.$footer_custommenu_item_icon_color.';';
		$footer_custommenu_icon_text_color = 'color:'.$footer_custommenu_item_icon_color.';';
	}
if($footer_custommenu_list_style == 'list_style1'){
$output .= '.apress-widget-menu-vertical li:after{'.$footer_custommenu_icon_text_color.'}';
}

if($footer_custommenu_list_style == 'list_style2' || $footer_custommenu_list_style == 'list_style3' || $footer_custommenu_list_style == 'list_style4'){
$output .= '.apress-widget-menu-vertical li{padding-left:26px;}';
$output .= '.apress-widget-menu-vertical li:after{'.$footer_custommenu_icon_bg_color.'line-height:13px;height:14px;width:14px;text-align: center;font-size:12px;color:#fff;}';
}
if($footer_custommenu_list_style == 'list_style3'){
$output .= '.apress-widget-menu-vertical li:after{-moz-border-radius:3px; -webkit-border-radius:3px;-o-border-radius:3px; -ms-border-radius:3px; border-radius:3px;color:#fff;}';
}
if($footer_custommenu_list_style == 'list_style4'){
$output .= '.apress-widget-menu-vertical li:after{-moz-border-radius:50px; -webkit-border-radius:50px;-o-border-radius:50px; -ms-border-radius:50px; border-radius:50px;color:#fff;}';
}
}

//Button CSS Start
$output .= '.launch_button,.launch_button:hover, button:hover, button:focus, input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:focus, input[type="button"]:focus, input[type="reset"]:focus, button, input[type="submit"], input[type="button"], input[type="reset"], .zolo_navbar_search.default_search_but .nav_search_form_area .search-form .search-submit{'.$apress_theme_button_background_color_scheme.'color:'.$button_text_color.'}';
$admin_button_shape = isset($apress_data['admin_button_shape']) ? $apress_data['admin_button_shape'] : 'square';
if($admin_button_shape == 'square'){
$output .= 'a.launch_button, .woocommerce-page #respond input#submit, button, input[type="submit"], input[type="button"], input[type="reset"]{
-moz-border-radius:0px;
-webkit-border-radius:0px;
-ms-border-radius:0px;
-o-border-radius:0px;
border-radius:0px;}';
}else if($admin_button_shape == 'rounded'){
$output .= 'a.launch_button, .woocommerce-page #respond input#submit, button, input[type="submit"], input[type="button"], input[type="reset"]{
-moz-border-radius:6px;
-webkit-border-radius:6px;
-ms-border-radius:6px;
-o-border-radius:6px;
border-radius:6px;}';
}else if($admin_button_shape == 'round'){

$output .= 'a.launch_button, .woocommerce-page #respond input#submit, button, input[type="submit"], input[type="button"], input[type="reset"]{
-moz-border-radius:5em;
-webkit-border-radius:5em;
-ms-border-radius:5em;
-o-border-radius:5em;
border-radius:5em;}';
	}

$admin_button_size = isset($apress_data['admin_button_size']) ? $apress_data['admin_button_size'] : 'small';
if($admin_button_size == 'small'){
	$output .= '.woocommerce-page #respond input#submit, button, input[type="submit"], input[type="button"], input[type="reset"]{padding: 9px 16px;font-size:13px;height: auto; line-height: normal;}';

}else if($admin_button_size == 'medium'){
	$output .= '.woocommerce-page #respond input#submit, button, input[type="submit"], input[type="button"], input[type="reset"]{padding: 12px 24px;font-size:16px;height: auto; line-height: normal;}';
	
}else if($admin_button_size == 'large'){
	$output .= '.woocommerce-page #respond input#submit, button, input[type="submit"], input[type="button"], input[type="reset"]{padding:14px 34px; font-size:20px;height: auto; line-height: normal;}';
	}
	
$admin_button_shadow = isset($apress_data['admin_button_shadow']) ? $apress_data['admin_button_shadow'] : 'on';
if($admin_button_shadow == 'on'){
	$output .= 'button, input[type="submit"], input[type="button"], input[type="reset"]{box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);}';
	$output .= 'button:hover, input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover{box-shadow: 0 3px 3px 0 rgba(0, 0, 0, 0.14), 0 1px 7px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -1px rgba(0, 0, 0, 0.2);}';
	}

//Button CSS End

$output .= '@media (max-width:1050px) {
.zolo_left_vertical_header .zolo_vertical_header_topbar,.zolo_left_vertical_header .zolo_footer_area,.zolo_left_vertical_header .zolo_main_content_area{margin-left:0px!important;}
.zolo_right_vertical_header .zolo_vertical_header_topbar,.zolo_right_vertical_header .zolo_footer_area,.zolo_right_vertical_header .zolo_main_content_area{margin-right:0px!important;}
.header_section_one{line-height:'.$top_bar_l_height.';}
}
@media (max-width:800px){
.hassidebar.double_sidebars .content-area{width:100%;padding:0;float:left;margin-left:0;}
.hassidebar.double_sidebars .sidebar_container_1{width:100%;margin-left:0;float:left;}
.hassidebar.double_sidebars .sidebar_container_2{width:100%;float:left;}
.hassidebar.right .content-area,.hassidebar.left .content-area,.hassidebar .content-area{width:100%; padding:0!important;}
.hassidebar .sidebar_container_1{width:100%;}
.hassidebar .sidebar_container_2{width:100%;} 
.hassidebar .sidebar{ padding-top:40px;}
}
@media (max-width:767px){
.zolo-container{max-width:440px;}
}
@media (max-width:500px){
.zolo-container{max-width:330px;}
}';

if($likebox_on_off == 'off'){
	$output .='.zolo_zilla_likes_box {display: none;}';
}

if(isset($apress_data['custom_css'])){
		$output .= wp_strip_all_tags($apress_data['custom_css']);
	}

//wp_add_inline_style( 'acp-common', $output );
if ( ! get_option( 'apcore_dynamic_css' ) ) {
  add_option( 'apcore_dynamic_css', '', '', 'yes' );
}
update_option( 'apcore_dynamic_css', $output, 'yes' );