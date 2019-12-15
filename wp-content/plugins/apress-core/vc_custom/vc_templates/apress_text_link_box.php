<?php 
/*-----------------------------------------------------------------------------------*/
/* Text Link Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
			extract(shortcode_atts(array(
				'readmore_text' 	=>'Read More',
				'box_link' 			=>'',
				'box_text_align'	=>'left',
				'box_bg_color'		=>'#ffffff',
				'border_top'		=>'0',
				'border_right'		=>'0',
				'border_bottom'		=>'0',
				'border_left'		=>'0',
				'box_border_color'	=>'#eeeeee',
				'box_shadow'		=>'box_shadow_enable:enable|shadow_horizontal:0|shadow_vertical:5|shadow_blur:14|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.1)',
				'border_radius'		=>'0',
				'custom_height_opt'	=>'no',
				'custom_height'		=>'120',
				'box_swing'			=>'no',
				'button_border_color'		=> '#dddddd',
				'color_scheme'				=> 'primary_color_scheme',
				'button_hover_border_color'	=> '#0000ef',
				'button_border_height'		=>'2',
				'title_font_options'=> '',
				'title_google_fonts'=> '',
				'title_custom_fonts'=> '',
				'title_color'		=> '#000000',
				'title_hover_color'	=> '#0000ef',
				'readmore_text_font_options'=> '',
				'readmore_text_google_fonts'=> '',
				'readmore_text_custom_fonts'=> '',
				'readmore_text_color'		=> '#000000',
				'readmore_text_hover_color'	=> '#0000ef',
				
				'class'				=> '',
				'data_animation'	=> 'No Animation',
				'data_delay'		=> '500',
				
				
			), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}

				
				$uniqid = uniqid(rand());
				$c = 'acp_'.$uniqid;
								
				//link
				$box_link = vc_build_link( $box_link );
				
	if($color_scheme == 'design_your_own'){
		$key = '';
	}else{
		$key = $color_scheme;
	}
$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
				
// Title Text HTML.
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$readmore_text_options = _zolo_parse_text_shortcode_params($readmore_text_font_options, '', $readmore_text_google_fonts, $readmore_text_custom_fonts);
?>

<!--zolo Media Post Start-->
<div id="zolo_textlink_box_<?php echo $c;?>" class="zolo_textlink_box_wrapper <?php echo $animatedclass.' '.$class;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
<div class="zolo_textlink_box_content">
<?php //Title 
if (!empty($content)) {
		echo '<'.$title_options['tag']. ' class="entry-title zolo_textlink_box_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';
 		echo wpb_js_remove_wpautop($content);
    	echo '</'. $title_options['tag'].'>';
		}?>

<?php //Read More
if (!empty($readmore_text)) {?>
<a class="zolo_textlink_box_readmore" title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? esc_attr( $box_link['target'] ) : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>">
 <?php echo '<span class="zolo_button_underline' . $readmore_text_options['class'] . '" ' . $readmore_text_options['style'] . '>';?>
   <?php echo $readmore_text;?>
<?php echo '</span>';?>
</a>
<?php }?>

</div>


</div>
<?php

$custom_css = '';

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
}
$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper{ background:'.$box_bg_color.';text-align:'.$box_text_align.'; 
border-top: '.$border_top.'px solid '.$box_border_color.';
border-right: '.$border_right.'px solid '.$box_border_color.';
border-bottom: '.$border_bottom.'px solid '.$box_border_color.';
border-left: '.$border_left.'px solid '.$box_border_color.';
'.$box_shadow.'}';

$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper{
-webkit-border-radius:'.$border_radius.'px;
-moz-border-radius:'.$border_radius.'px;
-o-border-radius:'.$border_radius.'px;
-ms-border-radius:'.$border_radius.'px;
border-radius:'.$border_radius.'px;	}';

$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_textlink_box_readmore{color:'.$readmore_text_color.';}';
$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_textlink_box_readmore:hover{color:'.$readmore_text_hover_color.';}';
$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_button_underline:before{ background:'.$button_border_color.';}';


if($color_scheme == 'design_your_own'){
	$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_button_underline:after{ background:'.$button_hover_border_color.';}';
}else{
	$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_button_underline:after{ '.$color_scheme_css.';}';
}

$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_button_underline:before,
#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_button_underline:after{ height:'.$button_border_height.'px;}';

if($box_swing == 'yes'){
$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper:hover{ transform:translateY(-20px);-moz-transform:translateY(-20px);-webkit-transform:translateY(-20px);-ms-transform:translateY(-20px);-o-transform:translateY(-20px);}';
}

if($custom_height_opt == 'yes'){
$custom_css .= '#zolo_textlink_box_'.$c.'.zolo_textlink_box_wrapper .zolo_textlink_box_content{ min-height:'.$custom_height.'px;}';
}

$custom_css .= '@media (max-width:767px) {
.zolo_textlink_box_wrapper .zolo_textlink_box_content{ min-height:inherit !important;}
}';
apcore_save_plugin_dyn_styles( $custom_css );
