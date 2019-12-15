<?php 
/*-----------------------------------------------------------------------------------*/
/* Media Post
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
		extract(shortcode_atts(array(
			'box_image' 		=> '',
			'img_size' 			=> 'full',
			'box_title' 		=> 'Your Title',
			'website_name' 		=> 'google.com',
			'box_link' 			=> '',
			'box_bg_color'		=> '#ffffff',
			'box_text_align'	=> 'left',
			'box_shadow'		=> '',
			'border_radius'		=> '0',
			'custom_height_opt'	=> 'no',
			'custom_height'		=> '130',
			'box_swing'			=> 'no',
			'title_font_options'=> '',
			'title_google_fonts'=> '',
			'title_custom_fonts'=> '',
			'title_color'		=> '#000000',
			'title_hover_color'	=> '#0000ef',
			'website_name_font_options'	=> '',
			'website_name_google_fonts'	=> '',
			'website_name_custom_fonts'	=> '',
			'website_name_color'=> '#000000',
			'website_name_hover_color'	=> '#0000ef',
			
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
		//Image & Image size
		$img_id = preg_replace( '/[^\d]/', '', $box_image );
		if ( ! $img_size ) {
				$img_size = 'medium';
			}
		$img = wpb_getImageBySize( array(
			'attach_id' => $img_id,
			'thumb_size' => $img_size,
			'class' => 'media_post_image_img',
		) );
		$img['thumbnail'] = str_replace( '<img ', '<img ', $img['thumbnail'] );
		$box_img = $img['thumbnail'];
		
		//link
		$box_link = vc_build_link( $box_link );

// Title Text HTML.
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$websitename_options = _zolo_parse_text_shortcode_params($website_name_font_options, '', $website_name_google_fonts, $website_name_custom_fonts);
?>

<!--zolo Media Post Start-->

<div id="zolo_media_post_<?php echo $c;?>" class="zolo_media_post_wrapper <?php echo $animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="zolo_media_post_thumbnail"> <?php echo $box_img;?> </div>
  <div class="zolo_media_post_content">
    <?php //Website Name 
if (!empty($website_name)) {?>
    <?php echo '<span class="entry-title zolo_media_post_subtitle' . $websitename_options['class'] . '" ' . $websitename_options['style'] . '>';?> <a title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? esc_attr( $box_link['target'] ) : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>"> <?php echo $website_name;?> </a> <?php echo '</span>';?>
    <?php }?>
    <?php //Title 
if (!empty($box_title)) {?>
    <?php echo '<'.$title_options['tag']. ' class="entry-title zolo_media_post_title' . $title_options['class'] . '" ' . $title_options['style'] . '>';?> <a title="<?php echo esc_attr( $box_link['title'] );?>" href="<?php echo esc_attr( $box_link['url'] );?>" target="<?php echo ( strlen( $box_link['target'] ) > 0 ? esc_attr( $box_link['target'] ) : '_self' )?>" rel="<?php if( isset( $box_link['rel'] ) && $box_link['rel'] !== '' ) { echo esc_attr($box_link['rel']); }else{ echo  '';} ?>"> <?php echo $box_title;?> </a> <?php echo '</'. $title_options['tag'].'>';?>
    <?php }?>
  </div>
</div>
<?php
// CSS
$style = '';

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper{'.$box_shadow.'}';
}

$style .= '#zolo_media_post_'. $c.'.zolo_media_post_wrapper{ background:'.$box_bg_color.';text-align:'.$box_text_align.'}';

$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper{
-webkit-border-radius:'.$border_radius.'px;
-moz-border-radius:'.$border_radius.'px;
-o-border-radius:'.$border_radius.'px;
-ms-border-radius:'.$border_radius.'px;
border-radius:'.$border_radius.'px;
	}';
$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper .zolo_media_post_title a{color:'.$title_color.';}';	
$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper .zolo_media_post_title a:hover{color:'.$title_hover_color.';}';	
$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper .zolo_media_post_subtitle a{color:'.$website_name_color.';}';	
$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper .zolo_media_post_subtitle a:hover{color:'.$website_name_hover_color.';}';


if($box_swing == 'yes'){
$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper:hover{ transform:translateY(-20px);-moz-transform:translateY(-20px);-webkit-transform:translateY(-20px);-ms-transform:translateY(-20px);-o-transform:translateY(-20px);}';
}

if($custom_height_opt == 'yes'){
$style .= '#zolo_media_post_'.$c.'.zolo_media_post_wrapper .zolo_media_post_content{ min-height:'.$custom_height.'px;}';
}

$style .= '@media (max-width:767px) {.zolo_media_post_wrapper .zolo_media_post_content{ min-height:inherit !important;}}';
	
apcore_save_plugin_dyn_styles( $style );

