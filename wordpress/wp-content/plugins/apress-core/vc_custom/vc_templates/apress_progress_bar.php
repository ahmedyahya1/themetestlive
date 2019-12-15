<?php 
/*-----------------------------------------------------------------------------------*/
/* Progress Bar
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
			
	extract(shortcode_atts(array(
		'style'					=> 'box',
		'cnt_height'			=> '10',
		'cnt_padding'			=> '0',
		'cnt_margin'			=> '14',
		'title'					=> 'Webdesign',
		'title_position'		=> 'top',
		'percentage'			=> '80',
		'percentage_style'		=> 'z_percentage_1',
		'tooltip_bg_color'		=> '#2c3e50',
		'tooltip_bor_color'		=> '#eeeeee',
		'tooltip_text_color'	=> '#eeeeee',
		'tooltip_style'			=> 'tooltip_scroll',
		'title_color'			=> '#777777',
		'pb_color'				=> '#549ffc',
		'pb_alt_color'			=> '',
		'pb_ctn_color'			=> '#f7f7f7',
		'enable_border'			=> 'no',
		'border_color'			=> '#efeff0',		
		'stripe'				=> '',		
		'stripe_animation'		=> '',
		'title_font_options'	=> '',
		'title_google_fonts'	=> '',
		'title_custom_fonts'	=> '',
		'percentage_font_size'	=> '',
	), $atts));
	
	$pb_id = RandomString(20);
	
	if($stripe_animation == 'yes'){
		$stripe_animation = 'moving_stripe';
	}
	
	if($percentage_style == 'z_percentage_1'){
		$percentage_style_class = 'percentage_style1';
	}elseif($percentage_style == 'z_percentage_2'){
		$percentage_style_class = 'percentage_style2';
	}elseif($percentage_style == 'z_percentage_3'){
		$percentage_style_class = 'percentage_style3';
	}
	
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
?>

<div class="z_pb_holder <?php echo 'z_pb_holder_'.$pb_id.' '.$style.' title_position_'.$title_position.' title_position_'.$title_position.' '.$percentage_style_class.' '.$tooltip_style;?>">
  <div id="<?php echo 'pb_'.$pb_id;?>" class="progress_bar_sc" <?php echo $title_options['style']; ?> >
    <?php if($percentage < 101){?>
    <?php if($title_position == 'top'){?>
    <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span>
      <?php if($percentage_style != 'z_percentage_3'){?>
      <span class="pb_percentage"><?php echo $percentage;?>%</span>
      <?php }?>
    </div>
    <?php }?>
    <div class="pb_ctn">
      <div class="pb_ctn_box">
        <div data-percentage-value="<?php echo $percentage;?>" class="pb_bg">
          <?php if($percentage_style == 'z_percentage_3'){?>
          <?php if($title_position == 'center'){?>
          <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> </div>
          <?php }?>
          <span class="pb_percentage"><?php echo $percentage;?>%</span>
          <?php }else{?>
          <?php if($title_position == 'center'){?>
          <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
          <?php }
				}?>
        </div>
        <?php if($stripe == 'yes'){?>
        <div class="pb_stripe <?php echo $stripe_animation;?>"></div>
        <?php } ?>
      </div>
    </div>
    <?php if($title_position == 'bottom'){?>
    <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span>
      <?php if($percentage_style != 'z_percentage_3'){?>
      <span class="pb_percentage"><?php echo $percentage;?>%</span>
      <?php }?>
    </div>
    <?php }?>
    <?php }else{?>
    <?php if($title_position == 'top'){?>
    <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
    <?php }?>
    <div class="pb_ctn">
      <div class="pb_ctn_box">
        <div class="pb_bg"></div>
        <?php if($title_position == 'center'){?>
        <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
        <?php }?>
      </div>
    </div>
    <?php if($title_position == 'bottom'){?>
    <div class="pb_title_area"> <span class="pb_title"><?php echo $title;?></span> <span class="pb_percentage"><?php echo $percentage;?>%</span> </div>
    <?php }?>
    <?php }?>
  </div>
</div>
<?php 
$pb_percentage_bottom = $cnt_height + $cnt_padding + 10;

$custom_css = '';
$custom_css .= '.z_pb_holder #pb_'.$pb_id.' .pb_bg{height:'.$cnt_height.'px;
background:'.$pb_color.'; 
background: -moz-linear-gradient(left, '.$pb_color.' 0%, '.$pb_alt_color.' 100%); 
background: -webkit-gradient(linear, left top, right top, color-stop(0%,'.$pb_color.'), color-stop(100%,'.$pb_alt_color.'));  
background: -webkit-linear-gradient(left, '.$pb_color.' 0%,'.$pb_alt_color.' 100%); 
background: -o-linear-gradient(left, '.$pb_color.' 0%,'.$pb_alt_color.' 100%); 
background: -ms-linear-gradient(left, '.$pb_color.' 0%,'.$pb_alt_color.' 100%); 
background: linear-gradient(to right, '.$pb_color.' 0%,'.$pb_alt_color.' 100%); 
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$pb_color.'", endColorstr="'.$pb_alt_color.'",GradientType=1 ); 
}';	
$custom_css .= '.z_pb_holder #pb_'.$pb_id.' .pb_ctn{background:'.$pb_ctn_color.';padding:'.$cnt_padding.'px;}';
if($enable_border == 'yes'){
$custom_css .= '.z_pb_holder #pb_'.$pb_id.' .pb_ctn{border:1px solid '.$border_color.';}';
}
$custom_css .= '.z_pb_holder #pb_'.$pb_id.' .pb_title_area{color:'.$title_color.';}';
$custom_css .= '.z_pb_holder.percentage_style3 #pb_'.$pb_id.' .pb_percentage{bottom:'.$pb_percentage_bottom.'px;}';
$custom_css .= '.z_pb_holder.percentage_style3 #pb_'.$pb_id.' .pb_percentage{background:'.$tooltip_bg_color.';border:1px solid '.$tooltip_bor_color.';color:'.$tooltip_text_color.';}';
$custom_css .= '.z_pb_holder.percentage_style3 #pb_'.$pb_id.' .pb_percentage:before{border-top: 7px solid '.$tooltip_bor_color.';}';
$custom_css .= '.z_pb_holder.percentage_style3 #pb_'.$pb_id.' .pb_percentage:after{border-top: 7px solid '.$tooltip_bg_color.';}';
$custom_css .= '.z_pb_holder.z_pb_holder_'.$pb_id.'{ margin:'.$cnt_margin.'px 0;}';
$custom_css .= '.z_pb_holder.z_pb_holder_'.$pb_id.' .pb_percentage{font-size:'.$percentage_font_size.'px;}';
apcore_save_plugin_dyn_styles( $custom_css );