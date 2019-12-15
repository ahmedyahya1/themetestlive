<?php 
/*-----------------------------------------------------------------------------------*/
/* Pricing List
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }

extract(shortcode_atts(array(
			'pricing_list_image'					=> '',
			'pricing_list_title'					=> 'Your Title',
			'pricing_list_price'					=> '$',
			'description_text'						=> 'Your description text',
			'description_text_color'				=> '',
			'enable_highlighted_item'				=> 'no',
			'pricing_list_highlight_title'			=> '',
			'pricing_list_margin'					=> 'margin-bottom:20',
			'color_scheme'							=> 'primary_color_scheme',
			'pricing_list_highlight_title_bg_color'	=> '',
			'title_font_options'					=> '',
			'title_google_fonts'					=> '',
			'title_custom_fonts'					=> '',
			'class' 								=> '',
			'data_animation'						=> 'No Animation',
			'data_delay'							=> '500',			
	), $atts));
	
	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid;
	
	$img = wp_get_attachment_image_src($pricing_list_image,'thumbnail');
	$pricing_list_image = $img[0];
	
$title_html = $price_html = $description_html = $pricing_list_highlight_html = $pricing_list_image_html = '';
	
if($color_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $color_scheme;
} 
$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
if($pricing_list_image == ''){
	$pricing_list_image_class = 'image_not_available';
}else{
	$pricing_list_image_class = 'image_available';
}

if (!empty($pricing_list_image)) {
$pricing_list_image_html = '<div class="zolo_pricing_list_img_holder"><img src="'.$pricing_list_image.'"/></div>';
}

if (!empty($pricing_list_title)) {
$title_options = _zolo_parse_text_shortcode_params($title_font_options,  'zolo_pricinglist_title', $title_google_fonts, $title_custom_fonts);
$title_html = '<span class="zolo_pricing_list_title '.$title_options['class'].'" '.$title_options['style'].'>'.$pricing_list_title.'</span>';
$price_html = '<span class="zolo_pricing_list_price" '.$title_options['style'].'>'.$pricing_list_price.'</span>';
}

if($enable_highlighted_item == 'yes'){
if (!empty($pricing_list_highlight_title)) {
$pricing_list_highlight_html = '<span class="zolo_pricing_list_highlight"><span class="zolo_pricing_list_highlight_text">'.$pricing_list_highlight_title.'</span></span>';
}}
$description_html = '<span class="zolo_pricing_list_description">'.$description_text.'</span>';
?>

<!--zolo Image Box Row Start-->

<div id="zolo_pricing_list_<?php echo $c;?>" class="zolo_pricing_list_area <?php echo $pricing_list_image_class.' '.$class.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>"> <?php echo $pricing_list_image_html;?>
  <div class="zolo_pricing_list_content">
    <div class="zolo_pricing_list_title_holder"> <?php echo $title_html;?> <?php echo $pricing_list_highlight_html;?> <span class="zolo_pricing_list_line"></span> <?php echo $price_html;?> </div>
    <?php echo $description_html;?> </div>
</div>
<?php
$custom_css = '';
$custom_css .= '#zolo_pricing_list_'.$c.'.zolo_pricing_list_area {' . esc_js(Zolo_Param_Margin::margins_css($pricing_list_margin)) . '}';
$custom_css .= '#zolo_pricing_list_'.$c.'.zolo_pricing_list_area .zolo_pricing_list_description{ color:'.$description_text_color.';}';

if($color_scheme == 'design_your_own'){
$custom_css .= '#zolo_pricing_list_'.$c.'.zolo_pricing_list_area .zolo_pricing_list_highlight_text{ background:'.$pricing_list_highlight_title_bg_color.';}';

}else{
$custom_css .= '#zolo_pricing_list_'.$c.'.zolo_pricing_list_area .zolo_pricing_list_highlight_text{'.$color_scheme_css.'}';
}
apcore_save_plugin_dyn_styles( $custom_css );


