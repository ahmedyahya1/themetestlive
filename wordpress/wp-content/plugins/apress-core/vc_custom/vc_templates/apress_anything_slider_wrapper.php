<?php 
/*-----------------------------------------------------------------------------------*/
/* Anything Slider Wrapper
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
$el_class = $output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$uniqid = uniqid(rand());
$apress_anything_slider_class = 'apress_anything_slider_wrapper_'.$uniqid;

?>

<div class="apress_anything_slider_wrapper <?php echo $apress_anything_slider_class;?>">
  <div class="apress_anything_slider_items"> <?php echo do_shortcode($content);?> </div>
</div>
