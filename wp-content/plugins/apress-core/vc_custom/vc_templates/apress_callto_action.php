<?php 
/*-----------------------------------------------------------------------------------*/
/** Call to Action
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

extract(shortcode_atts(array(
		'calltoaction_style' 				=> 'style1',
		'calltoaction_topbottom_pad' 		=> '30',
		'calltoaction_leftright_pad' 		=> '30',
		'calltoaction_title' 				=> 'Box Title',
		'calltoaction_title_size' 			=> '24',
		'calltoaction_title_lineheight'		=> '28',
		'calltoaction_titlecolor' 			=> '#777777',
		'calltoaction_text' 				=> 'This is the main text',
		'calltoaction_textalign'			=> 'left',
		'calltoaction_textcolor' 			=> '#777777',
		'calltoaction_boxbgcolor' 			=> '#f7f7f7',
		'imagebox_image' 					=> '',
		'calltoaction_top_borderwidth' 		=> '1',
		'calltoaction_right_borderwidth'	=> '1',
		'calltoaction_bottom_borderwidth' 	=> '1',
		'calltoaction_left_borderwidth' 	=> '1',
		'calltoaction_boxbordercolor' 		=> '#f0f0f0',
		'calltoaction_buttonposi'			=> 'button_posi_right',
		'calltoaction_button_size'			=> 'small',
		'calltoaction_button_text'			=> 'Button text',
		'calltoaction_buttonstyle' 			=> 'square',
		'calltoaction_button_hoverstyle'	=> 'hoverstyle1',
		'calltoaction_button_border_radius' => '50',
		'calltoaction_button_link' 			=> 'style1',
		'calltoaction_buttonfontcolor' 		=> '#666666',
		'calltoaction_buttonfontcolorhover' => '#666666',
		'calltoaction_buttonbgcolor' 		=> '#ebebeb',
		'calltoaction_buttonbgcolorhover'	=> '#dcdcdc',
		'calltoaction_buttonbordercolor'	=> '#e6e6e6',
		'calltoaction_buttonbordercolorhover' => '#ebebeb',
		'title_font_options'				=> '',
		'title_google_fonts'				=> '',
		'title_custom_fonts'				=> '',
		'description_font_options'			=> '',
		'description_google_fonts'			=> '',
		'description_custom_fonts'			=> '',
		'button_font_options'				=> '',
		'button_google_fonts'				=> '',
		'button_custom_fonts'				=> '',
				
		'class'								=> '',
		'data_animation'					=> 'No Animation',
		'data_delay'						=> '500',
		
), $atts));

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$c = 'acp_'.$uniqid;

$img = wp_get_attachment_image_src($imagebox_image,'full');
$imagebox_image = $img[0];

$calltoaction_button_link = vc_build_link( $calltoaction_button_link );

//RTL Colde
if ( is_rtl() ){
		if($calltoaction_textalign == 'left'){
			$calltoaction_textalign = 'right';
		}else if($calltoaction_textalign == 'right'){
			$calltoaction_textalign = 'left';
		}else{
			$calltoaction_textalign = 'center';
		}
		
		if($calltoaction_buttonposi == 'button_posi_right'){
			$calltoaction_buttonposi = 'button_posi_left';
		}else if($calltoaction_buttonposi == 'button_posi_left'){
			$calltoaction_buttonposi = 'button_posi_right';
		}else{
			$calltoaction_buttonposi = 'button_posi_bottom';
		}
		
	}else{
		$calltoaction_textalign = $calltoaction_textalign;
		$calltoaction_buttonposi = $calltoaction_buttonposi;
	}

// Title Typo
$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
$button_options = _zolo_parse_text_shortcode_params($button_font_options, '', $button_google_fonts, $button_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
?>

<!--zolo calltoaction Row Start-->

<div id="<?php echo 'zolocalltoaction'.$c;?>" class="zolo_calltoaction <?php echo $calltoaction_buttonposi.' '.$calltoaction_button_size.' '.$calltoaction_style.' '.$animatedclass.' '.$calltoaction_button_hoverstyle.' '.$class;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="zolo_calltoaction_content">
    <?php if($calltoaction_title){?>
    <h2 <?php echo $title_options['style']?>><?php echo $calltoaction_title;?></h2>
    <?php }?>
    <?php if($calltoaction_text){?>
    <div class="calltoaction_text" <?php echo $description_options['style']?>><?php echo $calltoaction_text;?></div>
    <?php }?>
  </div>
  <?php if($calltoaction_style == 'style1'){?>
  <?php if($calltoaction_button_text){?>
  <div class="zolo_calltoaction_button <?php echo $calltoaction_buttonstyle;?>"> <a class="button" title="<?php echo esc_attr( $calltoaction_button_link['title'] );?>" href="<?php echo esc_attr( $calltoaction_button_link['url'] );?>" target="<?php echo ( strlen( $calltoaction_button_link['target'] ) > 0 ? esc_attr( $calltoaction_button_link['target'] ) : '_self' )?>"><span class="button_text" <?php echo $button_options['style']?>>
    <?php echo $calltoaction_button_text;?>
    </span> </a> </div>
  <?php }
		 }?>
</div>

<?php
$shortcode_css = '';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.style2:after{ position:absolute; content:""; border:5px solid #fff; bottom:15px;top:15px;left:15px;right:15px;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.style2 .zolo_calltoaction_content{ width:100%;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_content{width:75%;float:left; color:'.$calltoaction_textcolor.';}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_content h2{ padding:0;color:'.$calltoaction_titlecolor.';font-size:'.$calltoaction_title_size.'px; line-height:'.$calltoaction_title_lineheight.'px;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_content .calltoaction_text{padding:25px 0 0;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.button_posi_left .zolo_calltoaction_content{ float:right;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.button_posi_bottom .zolo_calltoaction_content{ width:100%;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.button_posi_bottom .zolo_calltoaction_button{padding-top:20px;position: inherit; width:100%; float:left; right:auto;
-moz-transform: translate(0px,0%);
-webkit-transform: translate(0px,0%);
-ms-transform: translate(0px,0%);
-o-transform: translate(0px,0%);
transform: translate(0px,0%);
}';

$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.button_posi_bottom .zolo_calltoaction_button a.button{float:none;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.button_posi_left .zolo_calltoaction_button{ left:'.$calltoaction_leftright_pad.'px; right:auto;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button{float:right; position:absolute; right:'.$calltoaction_leftright_pad.'px; top:50%;overflow: hidden;
-moz-transform: translate(0px, -50%);
-webkit-transform: translate(0px, -50%);
-ms-transform: translate(0px, -50%);
-o-transform: translate(0px, -50%);
transform: translate(0px, -50%);
}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button.rounded a.button:before,
#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button.rounded a.button{ 
-moz-border-radius:'.$calltoaction_button_border_radius.'px;
-webkit-border-radius:'.$calltoaction_button_border_radius.'px;
-ms-border-radius:'.$calltoaction_button_border_radius.'px;
-o-border-radius:'.$calltoaction_button_border_radius.'px;
border-radius:'.$calltoaction_button_border_radius.'px;
}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button a.button span.button_text{ position:relative;}';
$shortcode_css .= '.zolo_calltoaction.small .zolo_calltoaction_button a.button{padding:8px 15px;}';
$shortcode_css .= '.zolo_calltoaction.medium .zolo_calltoaction_button a.button{ padding:12px 35px;}';
$shortcode_css .= '.zolo_calltoaction.large .zolo_calltoaction_button a.button{padding:15px 50px;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button a.button{position: relative; overflow:hidden;display: inline-block; float:left;background-color:'.$calltoaction_buttonbgcolor.'; border:1px solid '.$calltoaction_buttonbordercolor.'; color:'. $calltoaction_buttonfontcolor.'; height:auto;}';

if($calltoaction_button_text){
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button.button_icon_left a.button .fa{ margin-right:12px;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button.button_icon_right a.button .fa{ margin-left:12px;}';
}
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button a.button:hover{border:1px solid '.$calltoaction_buttonbordercolorhover.'; color:'.$calltoaction_buttonfontcolorhover.';}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.hoverstyle1 a.button:hover{background:'.$calltoaction_buttonbgcolorhover.';}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction a.button:before{background:'.$calltoaction_buttonbgcolorhover.';}';

$shortcode_css .= '@media (max-width:900px) { ';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction{ text-align:center;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_content{ width:100%;}';
$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction.button_posi_left .zolo_calltoaction_button,
#zolocalltoaction'.$c.'.zolo_calltoaction .zolo_calltoaction_button{ position:relative; top:auto; left:auto; right:auto; float:none; display:inline-block; margin-top: 30px;
-moz-transform:translate(0,0);
-ms-transform:translate(0,0);
-o-transform:translate(0,0);
-webkit-transform:translate(0,0);
transform:translate(0,0);
}';

$shortcode_css .= '}';

$shortcode_css .= '#zolocalltoaction'.$c.'.zolo_calltoaction{
	width:100%; 
	float:left; 
	position:relative; 
	text-align:'.$calltoaction_textalign.';
	background-color:'.$calltoaction_boxbgcolor.'; ';	
if($imagebox_image){
	$shortcode_css .= 'background-image:url('.$imagebox_image.');';
}
$shortcode_css .= 'padding:'.$calltoaction_topbottom_pad.'px '.$calltoaction_leftright_pad.'px; 
	border-bottom-width:'.$calltoaction_bottom_borderwidth.'px;
	border-top-width:'.$calltoaction_top_borderwidth.'px;
	border-left-width:'.$calltoaction_left_borderwidth.'px;
	border-right-width:'.$calltoaction_right_borderwidth.'px; 
	border-color:'.$calltoaction_boxbordercolor.'; 
	border-style:solid; 
	background-repeat:no-repeat; 
	background-position:center center; 
	-moz-background-size:cover;
	-webkit-background-size:cover;
	-ms-background-size:cover;
	-o-background-size:cover;
	background-size:cover;
 }';
apcore_save_plugin_dyn_styles( $shortcode_css );
