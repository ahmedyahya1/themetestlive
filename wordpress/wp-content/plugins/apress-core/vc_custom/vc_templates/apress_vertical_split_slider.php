<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$output .= '<div class="vertical_split_slider '.esc_attr($el_class).'">';
$output .= do_shortcode($content);
$output .= '</div>';

print $output;

global $apress_data;
$light_text_color = isset($apress_data["light_text_color"]) ? $apress_data["light_text_color"] : '#ffffff';
$dark_text_color = isset($apress_data["dark_text_color"]) ? $apress_data["dark_text_color"] : '#000000';
$style = '';
$style .= '.apress_split_slider_enable body .container-padding{ padding:0 !important;}';
$style .= '.apress_splitpage_light .multiscroll-tooltip,
.apress_splitpage_header_light .header_section_three a, 
.apress_splitpage_header_light .header_section_three,
.apress_splitpage_header_light .zolo-topbar input, 
.apress_splitpage_header_light .zolo-header-area #lang_sel a.lang_sel_sel, 
.apress_splitpage_header_light .zolo-topbar a, 
.apress_splitpage_header_light .zolo-topbar,
.apress_splitpage_header_light .zolo-social ul.social-icon li a,
.apress_splitpage_header_light .header_section_two a, 
.apress_splitpage_header_light .header_section_two,
.apress_splitpage_header_light .zolo-navigation ul li > a{color:'.$light_text_color.';}';
$style .= '.apress_splitpage_header_light #fp-nav ul li .fp-tooltip.right:after,
.apress_splitpage_header_light .header_section_two .nav_search-icon.search_close_icon::after, 
.apress_splitpage_header_light .header_section_two .nav_search-icon::before{background:'.$light_text_color.';}';

$style .= '.apress_splitpage_header_light .header_section_two .cart-control::before, 
.apress_splitpage_header_light .header_section_two .cart-control::after, 
.apress_splitpage_header_light .header_section_two .nav_search-icon::after{border-color:'.$light_text_color.';}';

$style .= '.apress_splitpage_light #multiscroll-nav li .active span{box-shadow:inset 0 0 0 1px '.$light_text_color.';}';
$style .= '.apress_splitpage_light #multiscroll-nav span{box-shadow: 0 0 0 5px '.$light_text_color.' inset;}';

$style .= '.apress_splitpage_dark .multiscroll-tooltip,
.apress_splitpage_header_dark .header_section_three a, 
.apress_splitpage_header_dark .header_section_three,
.apress_splitpage_header_dark .zolo-topbar input, 
.apress_splitpage_header_dark .zolo-header-area #lang_sel a.lang_sel_sel, 
.apress_splitpage_header_dark .zolo-topbar a, 
.apress_splitpage_header_dark .zolo-topbar,
.apress_splitpage_header_dark .zolo-social ul.social-icon li a,
.apress_splitpage_header_dark .header_section_two a, 
.apress_splitpage_header_dark .header_section_two,
.apress_splitpage_header_dark .zolo-navigation ul li > a{color:'.$dark_text_color.';}';

$style .= '.apress_splitpage_header_dark #fp-nav ul li .fp-tooltip.right:after,
.apress_splitpage_header_dark .header_section_two .nav_search-icon.search_close_icon::after, 
.apress_splitpage_header_dark .header_section_two .nav_search-icon::before{background:'.$dark_text_color.';}';

$style .= '.apress_splitpage_header_dark .header_section_two .cart-control::before, 
.apress_splitpage_header_dark .header_section_two .cart-control::after, 
.apress_splitpage_header_dark .header_section_two .nav_search-icon::after{border-color:'.$dark_text_color.';}';

$style .= '.apress_splitpage_dark #multiscroll-nav li .active span{box-shadow:inset 0 0 0 1px '.$dark_text_color.';}';
$style .= '.apress_splitpage_dark #multiscroll-nav span{box-shadow: 0 0 0 5px '.$dark_text_color.' inset;}';

apcore_save_plugin_dyn_styles( $style );
