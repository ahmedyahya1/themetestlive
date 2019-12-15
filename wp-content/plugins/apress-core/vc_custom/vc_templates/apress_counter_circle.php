<?php 
/*-----------------------------------------------------------------------------------*/
/* Counter Circle
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

			
	extract(shortcode_atts(array(
		'data_percent_value'	=> '42',
		'bar_color'				=> '#ccc',
		'track_color'			=> '#f2f2f2',
		'scale_color'			=> '',
		'line_cap'				=> 'butt',
		'line_width'			=> '10',
		'size'					=> '170',
		'c_circle_data'			=> 'zt_circle_number',
		'icon_family'			=> '',
		'icon_fontawesome'		=> 'fa fa-adjust',
		'icon_openiconic'		=> 'vc-oi vc-oi-dial',
		'icon_typicons'			=> 'typcn typcn-adjust-brightness',
		'icon_entypo'			=> 'entypo-icon entypo-icon-note',
		'icon_linecons'			=> 'vc_li vc_li-heart',
		'icon_monosocial'		=> 'vc-mono vc-mono-fivehundredpx',
		'icon_linea'			=> 'icon-basic-heart',
		'circle_image'			=> '',
		'circle_text'			=> 'APRESS',
		'circlefontsize'		=> '26',
		'circlefontcolor'		=> '#777777'
	), $atts));
		
ob_start();
$ccid = RandomString(20);
		
//icon
switch($icon_family) {
	case 'fontawesome':
		$icon = $icon_fontawesome;
		break;
	case 'openiconic':
		$icon = $icon_openiconic;
		break;
	case 'typicons':
		$icon = $icon_typicons;
		break;
	case 'entypo':
		$icon = $icon_entypo;
		break;
	case 'linecons':
		$icon = $icon_linecons;
		break;
	case 'monosocial':
		$icon = $icon_monosocial;
		break;
	case 'linea':
		$icon = $icon_linea;
		break;	
	case 'default_arrow':
		$icon = 'icon-button-arrow';
		break;
	default:
		$icon = '';
		break;
}

if(!empty($icon_family) && $icon_family != 'none') {
	$circle_icon = $icon;
} 
else {
	$circle_icon = null;
}
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $icon_family );

//regular(grad) linea
if(!empty($icon_family) && $icon_family == 'linea') {
	wp_enqueue_style('zt-linea'); 
}

if($scale_color){$scale_color = "'".$scale_color."'";}else{	$scale_color = 'false';};

// CSS
$shortcode_css = '';
$shortcode_css .= '.counter_circle'.$ccid.'{position:relative;text-align: center;}';
$shortcode_css .= '.counter_circle'.$ccid.' canvas {position: absolute;top: 0;left: 0;}';
$shortcode_css .= '.counter_circle'.$ccid.' img{max-width: 100%;max-height: 100%;-moz-border-radius: 50%;-webkit-border-radius: 50%;-ms-border-radius: 50%;-o-border-radius: 50%;border-radius: 50%;}';
$shortcode_css .= '.counter_circle'.$ccid.'{font-size:'.$circlefontsize.'px;color:'.$circlefontcolor.';}';
apcore_save_plugin_dyn_styles( $shortcode_css );

echo '<script type="text/javascript" charset="utf-8">
		var j$ = jQuery;
		j$.noConflict();
		"use strict";
		j$(document).ready(function() {
			j$(".z_cc_holder'.$ccid.'").appear(function(){
				j$(".counter_circle'.$ccid.'").easyPieChart({
					animate: 2000,
					barColor: "'.$bar_color.'",
					trackColor: "'.$track_color.'",
					scaleColor: '.$scale_color.',
					lineCap:"'.$line_cap.'",
					lineWidth: '.$line_width.',
					size:'.$size.',
					onStep: function(value) {
						j$(this.el).find("span").text(Math.round(value));
					},
				});
			
			});			
		
		});
		</script>';


echo "\n".'<div style=" text-align:center;" class="z_cc_holder'.$ccid.'">';



if($c_circle_data == 'zt_circle_number'){
		echo '<div style="display:inline-block;" class="counter_circle'.$ccid.'" data-percent="'.$data_percent_value.'"><span></span>%</div>';
	}elseif($c_circle_data == 'zt_circle_icon'){?>
		<div style="display:inline-block;" class="counter_circle<?php echo $ccid;?>" data-percent="<?php echo $data_percent_value;?>">
		<div id="rand_<?php echo $ccid; ?>">
			<i class="<?php echo $circle_icon; ?>"></i>
		</div>
</div>
<?php }elseif($c_circle_data == 'zt_circle_image'){?>


<div style="display:inline-block;" class="counter_circle<?php echo $ccid;?>" data-percent="<?php echo $data_percent_value;?>">
<?php $img = wp_get_attachment_image_src($circle_image,'full');
	  $circle_image = $img[0];?>
<img src="<?php echo $circle_image; ?>" style="padding-bottom:4px;">
</div>

<?php }else{?>
<div style="display:inline-block;" class="counter_circle<?php echo $ccid;?>" data-percent="<?php echo $data_percent_value;?>">
<?php echo $circle_text; ?>
</div>
<?php }?>

<?php
	echo '</div>'; 
		
	$output_string = ob_get_contents();
	ob_end_clean();
	echo $output_string; 
		