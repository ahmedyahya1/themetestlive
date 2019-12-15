<?php 
/*-----------------------------------------------------------------------------------*/
/* Bouncing Image
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
			extract(shortcode_atts(array(
				'image' 					=>'',
				'image_max_width' 			=>'260',
				'image_alignment' 			=>'left',
				'class' 					=>'',
				'animation_type'			=>'default',
				'clipping_animation_type'	=>'clipping_left_to_right',
				'clipping_color'			=>'#f2f2f2',
				'data_animation'			=>'No Animation',
				'data_delay'				=>'500',
			), $atts));
				
				//Animation
				if($animation_type == 'clipping'){
					
					$animatedclass = 'animated clipping-hide apcore-clipping-animation';
					$data_animation_value = $clipping_animation_type;
				
				}else{
					
					if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
						}
					$data_animation_value = $data_animation;
					
					}
				
				$uniqid = uniqid(rand());
				$bouncing_image_id = 'zolo_bouncing_image_'.$uniqid;
				
				$img = wp_get_attachment_image_src($image,'full');
				$image = $img[0];

				?>

<!--zolo Image Box Row Start-->

<div id="<?php echo $bouncing_image_id;?>" class="zolo_bouncing_image_wrap <?php echo $animatedclass.' '.$class;?>" style=" text-align:<?php echo $image_alignment;?>;" data-animation ="<?php echo $data_animation_value; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="zolo_bouncing_image" style="max-width:<?php echo $image_max_width;?>px;"> <img src="<?php echo $image;?>"/> </div>
</div>
<?php
$shortcode_css = '';
$shortcode_css .= '#'.$bouncing_image_id.'.zolo_bouncing_image_wrap .apcore-clipping-overlay{ background:'.$clipping_color.'}';		
apcore_save_plugin_dyn_styles( $shortcode_css ); ?>

