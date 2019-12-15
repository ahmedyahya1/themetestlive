<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$output .= '<div class="apress_cascading_image_wrap">';
$output .= do_shortcode($content);
$output .= '</div>';

print $output;


?>

