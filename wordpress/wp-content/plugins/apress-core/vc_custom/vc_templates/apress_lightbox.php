<?php 
/*-----------------------------------------------------------------------------------*/
/* Light Box
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
extract(shortcode_atts(array(
		'lightbox_type'				=> 'image',
		'link'						=> '',
		'link_style'				=> '',
		'link_text'					=> '',
		'link_hover_caption' 		=> '',
		'image_url'					=> '',
		'select_button_style'		=> 'video_icon_style1',
		'button_icon_color'			=> '#8E54E9',
		'button_imageicon_color'	=> '#8E54E9',
		'button_icon_hover_color'	=> '#000000',
		'lightbox_hover_effect'		=> 'no',
		'videolink_font_options'	=> '',
		'videolink_google_fonts'	=> '',
		'videolink_custom_fonts'	=> '',		
		'class'						=> '',	
), $atts));

if($lightbox_type == 'video'){
	wp_enqueue_script('zt-video_lightbox');
}

$uniqid = uniqid(rand());
$zolo_lightbox_id = 'zolo_lightbox_'.$uniqid;
	
$preview_image = null;

if(!empty($image_url)) {
	if(!preg_match('/^\d+$/',$image_url)){
		$preview_image = '<img src="'.$image_url.'" alt="" />';
	} else {
		$preview_image = wp_get_attachment_image($image_url, 'full');
	}  
}
$videolink_html = $videolink_hover_html = '';
// Button Text HTML.
	if (!empty($link_text)) {
		$videolink_options = _zolo_parse_text_shortcode_params($videolink_font_options, 'zolo_videolink_text', $videolink_google_fonts, $videolink_custom_fonts);
		$videolink_html .= '<span class="videolink-text" ' . $videolink_options['style'] . '>' . esc_html($link_text) . '</span>';
	}
	if (!empty($link_hover_caption)) {
		$videolink_options = _zolo_parse_text_shortcode_params($videolink_font_options, 'zolo_videolink_hovercaption', $videolink_google_fonts, $videolink_custom_fonts);
		$videolink_hover_html .= '<span class="zolo_videolink_hover_caption" ' . $videolink_options['style'] . '>' . esc_html($link_hover_caption) . '</span>';
	}

if($lightbox_type == 'video'){
echo '<div id="'.$zolo_lightbox_id.'" class="zolo_lightbox_wrap '.$link_style.' lightbox_type_'.$lightbox_type.' '.$class.'">';
echo '<a href="'.$link.'" class="full-link video_lightbox '.$zolo_lightbox_id.'">';
	}else{
echo '<div id="'.$zolo_lightbox_id.'" class="zolo_lightbox_wrap '.$link_style.' lightbox_type_'.$lightbox_type.' '.$class.'">';
echo '<a href="'.$link.'" class="full-link pp" rel="prettyPhoto">';
}

if($link_style == 'link_icon_preview_image'){
echo '<span class="video_preview_image">'.$preview_image.'</span>';
}

echo '<span class="zolo_link_button '.$select_button_style.'">';


if($lightbox_type == 'video'){
if($select_button_style == 'video_icon_style1'){
	echo '<span class="zolo_play_btn">
	<span class="playBut">
	<svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="80px" height="80px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
	 xml:space="preserve">
<polygon class="playButtriangle" id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
	73.5,62.5 148.5,105.8 73.5,149.1 "/>
</svg>
</span>
</span>';
	
}else if($select_button_style == 'video_icon_style2'){
	echo '<span class="zolo_play_btn">
	<span class="playBut">
	<svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="50px" height="50px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
	 xml:space="preserve">
<polygon class="playButtriangle" id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
	73.5,62.5 148.5,105.8 73.5,149.1 "/>
</svg>
</span>
	</span>';
	
}else if($select_button_style == 'video_icon_style3'){
	echo '<span class="zolo_play_btn">
	<span class="playBut">
	<svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="50px" height="50px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
	 xml:space="preserve">
<polygon class="playButtriangle" id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
	73.5,62.5 148.5,105.8 73.5,149.1 "/>
</svg>
</span>
</span>';
	
}else if($select_button_style == 'video_icon_style4'){
	echo '<span class="zolo_play_btn">
	<span class="playBut">
	<svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="50px" height="50px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
	 xml:space="preserve">
<polygon class="playButtriangle" id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
	73.5,62.5 148.5,105.8 73.5,149.1 "/>
</svg>
</span>
</span>';
	
}else if($select_button_style == 'video_icon_style5'){
	echo '<span class="zolo_play_btn">
	
<span class="playBut">
<svg version="1.1"
	 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
	 x="0px" y="0px" width="100px" height="100px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7"
	 xml:space="preserve">

<polygon class="playButtriangle" id="XMLID_18_" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
	73.5,62.5 148.5,105.8 73.5,149.1 "/>
  
<circle class="playButcircle" id="XMLID_17_" fill="none"  stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3"/>
</svg>
  </span>

	
	</span>';
}
}else{
	echo '<span class="zolo_image_btn"><span class="zolo_image_icon"></span></span>';
	
	}

if($link_hover_caption != '' || $link_style != 'link_icon_with_text'){
echo $videolink_hover_html;
}

echo '</span>';

if($link_style == 'link_icon_with_text'){
echo '<span class="link-text">'.$videolink_html.'</span>';
}

echo '</a></div>';
?>
<?php
$custom_css = '';
if($select_button_style == 'video_icon_style1'){
$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style1 .playBut .playButtriangle{ fill:'.$button_icon_color.';}';

}else if($select_button_style == 'video_icon_style2'){
$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style2 .playBut .playButtriangle{ fill:'.$button_icon_color.';}';
$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style2 .zolo_play_btn{border-color:'.$button_icon_color.';}';

}else if($select_button_style == 'video_icon_style3'){

$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style3 .zolo_play_btn{ background:'.$button_icon_color.';}';

}else if($select_button_style == 'video_icon_style4'){

$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style4 .zolo_play_btn:after,#'.$zolo_lightbox_id.' .video_icon_style4 .zolo_play_btn:before{border-color:'.$button_icon_color.';}';
$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style4 .zolo_play_btn{background: radial-gradient( '.$button_icon_color.' 50%, rgba(255, 255, 255, 0.15) 52%);}';

}else if($select_button_style == 'video_icon_style5'){
$custom_css .= '#'.$zolo_lightbox_id.' .video_icon_style5 .playBut .playButtriangle{stroke:'.$button_icon_color.';}';
$custom_css .= '#'.$zolo_lightbox_id.'.zolo_lightbox_wrap a:hover .playBut .playButtriangle,#'.$zolo_lightbox_id.' .video_icon_style5 .playButcircle{stroke:'.$button_icon_hover_color.';}';	
}

if($lightbox_hover_effect == 'yes'){
	
	$custom_css .= '#'.$zolo_lightbox_id.'.zolo_lightbox_wrap a:hover .video_icon_style3 .zolo_play_btn,
	#'.$zolo_lightbox_id.'.zolo_lightbox_wrap a:hover .video_icon_style2 .zolo_play_btn,
	#'.$zolo_lightbox_id.'.zolo_lightbox_wrap a:hover .video_icon_style1 .zolo_play_btn{ 
	-moz-transform: scale(1.1);
	-webkit-transform: scale(1.1);
	-ms-transform: scale(1.1);
	-o-transform: scale(1.1);
	transform: scale(1.1);
	}';
}


$custom_css .= '#'.$zolo_lightbox_id.' .zolo_image_icon:after{color:'.$button_imageicon_color.';}';
apcore_save_plugin_dyn_styles( $custom_css );