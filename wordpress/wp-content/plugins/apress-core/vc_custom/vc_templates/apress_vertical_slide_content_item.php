<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$html = $css = $split_navigation_tool_tip = $slide_bg_check = $el_class = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class .= ($slide_bg_check == 'light') ? ' light' : ' dark';


$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$html .= '<div class="ms-section ms_tool_tips'.esc_attr($css_class).'" data-tool-tip="'.$split_navigation_tool_tip.'">';
$html .= do_shortcode($content);
$html .= '</div>';
print $html;


