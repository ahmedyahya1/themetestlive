<?php 
/*-----------------------------------------------------------------------------------*/
/* Image Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

		ob_start();
		extract(shortcode_atts(array(
			'imagebox_style'				=> 'style1',
			'imagebox_image'				=> '',
			'imagebox_title'				=> 'Your Title',
			'imagebox_title_fonsize'		=> '18',
			'imagebox_title_color'			=> '#777777',
			'imagebox_description'			=> 'Your Description Eos movet legimus euripidis ea. Cu eos minim aeque interpretaris, vel te eirmod dissentiet, homero utroque ut mea.',
			'imagebox_description_color'	=> '#777777',
			'imagebox_bg_color'				=> '#ffffff',
			'imagebox_bor_color'			=> '#dddddd',
			'imagebox_align'				=> 'center',
			'imagebox_button_size'			=> 'small',
			'imagebox_button_show_onhover'	=> '',
			'imagebox_button_position'		=> 'middle',
			'imagebox_button_text'			=> 'Read More',
			'imagebox_button_fontsize'		=> '15',
			'imagebox_button_border_radius' => '0',
			'imagebox_button_hover_style'	=> 'hoverstyle1',
			'imagebox_buttonfontcolor'		=> '#eeeeee',
			'imagebox_buttonfontcolorhover' => '#549ffc',
			'imagebox_buttonbackgroundcolor'=> '#549ffc',
			'imagebox_buttonbackgroundcolorhover'	=> '#ffffff',
			'imagebox_buttonbordercolor'	=> '#777777',
			'imagebox_buttonbordercolorhover'		=> '#549ffc',
			'imagebox_link'					=> '',
			'data_animation'				=> 'No Animation',
			'data_delay'					=> '500',
		), $atts));
				
		//Animation
		if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
		
		//imagebox_button_show_on hover
		if($imagebox_button_show_onhover == 1){ 
			$button_show_on_hover = 'button_show_on_hover';
		}else{
			$button_show_on_hover = '';
		}
		
		$uniqid = uniqid(rand());
		$c = 'acp_'.$uniqid;
		
		$img = wp_get_attachment_image_src($imagebox_image,'full');
		$imagebox_image = $img[0];
		$imagebox_link = vc_build_link( $imagebox_link );
		?>

<!--zolo Image Box Row Start-->

<div id="zolo_imagebox_<?php echo $c;?>" class="zolo_imagebox_area <?php echo $imagebox_button_position.' '.$imagebox_style.' '.$button_show_on_hover.' '.$imagebox_button_size.' '.$imagebox_button_hover_style.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="zolo_imagebox"> <a title="<?php echo esc_attr( $imagebox_link['title'] );?>" href="<?php echo esc_attr( $imagebox_link['url'] );?>" target="<?php echo ( strlen( $imagebox_link['target'] ) > 0 ? esc_attr( $imagebox_link['target'] ) : '_self' )?>" rel="<?php if( isset( $imagebox_link['rel'] ) && $imagebox_link['rel'] !== '' ) { echo esc_attr($imagebox_link['rel']); }else{ echo  '';} ?>"> <img src="<?php echo $imagebox_image;?>"/>
    <?php if(($imagebox_style == 'style1') && !empty($imagebox_button_text)){?>
    <span class="imagebox_button zolo_ripplelink"><span class="button_text"><?php echo $imagebox_button_text;?></span></span>
    <?php }?>
    </a> </div>
  <?php if($imagebox_style == 'style2'){?>
  <div class="imagebox_content">
    <?php if($imagebox_title){?>
    <h3><?php echo $imagebox_title;?></h3>
    <?php }?>
    <div><?php echo apply_filters('the_content', $content); ?></div>
    <?php if(!empty($imagebox_button_text)){?>
    <a title="<?php echo esc_attr( $imagebox_link['title'] );?>" href="<?php echo esc_attr( $imagebox_link['url'] );?>" target="<?php echo ( strlen( $imagebox_link['target'] ) > 0 ? esc_attr( $imagebox_link['target'] ) : '_self' )?>"> <span class="imagebox_button zolo_ripplelink"><span class="button_text"><?php echo $imagebox_button_text;?></span></span> </a>
    <?php }?>
  </div>
  <?php }?>
</div>
<?php
$shortcode_css = '';

$shortcode_css .= '#zolo_imagebox_'.$c.'.zolo_imagebox_area{ background:'.$imagebox_bg_color.'; border-color:'.$imagebox_bor_color.'; text-align:'.$imagebox_align.'}';
$shortcode_css .= '#zolo_imagebox_'.$c.'.zolo_imagebox_area:hover{box-shadow: 0 0 7px '.$imagebox_bor_color.';}';
$shortcode_css .= '#zolo_imagebox_'.$c.' .imagebox_content h3{ line-height:normal; font-size:'.$imagebox_title_fonsize.'px;color:'.$imagebox_title_color.'; padding:10px 0 10px 0;}';
$shortcode_css .= '#zolo_imagebox_'.$c.' .imagebox_content p{ padding:10px 0;color:'.$imagebox_description_color.';}';

$shortcode_css .= '#zolo_imagebox_'.$c.' .imagebox_button{ font-size:'.$imagebox_button_fontsize.'px;
-webkit-border-radius:'.$imagebox_button_border_radius.'px;
-moz-border-radius:'.$imagebox_button_border_radius.'px;
-o-border-radius:'.$imagebox_button_border_radius.'px;
-ms-border-radius:'.$imagebox_button_border_radius.'px;
border-radius:'.$imagebox_button_border_radius.'px;
border:1px solid '.$imagebox_buttonbordercolor.'; background:'.$imagebox_buttonbackgroundcolor.'; color:'.$imagebox_buttonfontcolor.';
}';
$shortcode_css .= '#zolo_imagebox_'.$c.' .imagebox_button:hover{ border:1px solid '.$imagebox_buttonbordercolorhover.';color:'.$imagebox_buttonfontcolorhover.'; }';

/*Hover Style CSS Start*/
$shortcode_css .= '#zolo_imagebox_'.$c.'.hoverstyle1 .imagebox_button:hover{background:'.$imagebox_buttonbackgroundcolorhover.';}';

$shortcode_css .= '#zolo_imagebox_'.$c.' .imagebox_button:before{
-webkit-border-radius:'.$imagebox_button_border_radius.'px;
-moz-border-radius:'.$imagebox_button_border_radius.'px;
-o-border-radius:'.$imagebox_button_border_radius.'px;
-ms-border-radius:'.$imagebox_button_border_radius.'px;
border-radius:'.$imagebox_button_border_radius.'px;
background:'.$imagebox_buttonbackgroundcolorhover.';
	}';

apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
<?php
$demolp_output = ob_get_clean();
echo $demolp_output;
			

