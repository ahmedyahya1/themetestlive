<?php 
/*-----------------------------------------------------------------------------------*/
/* Testimonial shortcode
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
extract( shortcode_atts( array(
	'testimonialstyle'   		=> 'testimonials_style1',
	'rating_option'				=> '0%',
	'authorimage'   			=> '',
	'testimonialimgborradi' 	=> '0',
	'by'						=> 'Matt Tucker',
	'designation'				=> 'Designer',
	'testimonialfontcolor'		=> '#777777',
	'testimonialbackgroundcolor'=> '#ffffff',
	'testimonialbordercolor'	=> '#cccccc',
	'testimonialauthorcolor'	=> '#777777',
	'author_font_options'		=> '',
	'author_google_fonts'		=> '',
	'author_custom_fonts'		=> '',
	'designation_font_options'	=> '',
	'designation_google_fonts'	=> '',
	'designation_custom_fonts'	=> '',
	'description_font_options'	=> '',
	'description_google_fonts'	=> '',
	'description_custom_fonts'	=> '',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
), $atts ) );

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$c = 'acp_'.$uniqid;

// Typo
$author_options = _zolo_parse_text_shortcode_params($author_font_options, '', $author_google_fonts, $author_custom_fonts);
$designation_options = _zolo_parse_text_shortcode_params($designation_font_options, '', $designation_google_fonts, $designation_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);

$img_id = preg_replace( '/[^\d]/', '', $authorimage );
$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => '80'  ) );?>

<div class="<?php echo 'zolotestimonial'.$c.' '.$testimonialstyle.' '.$animatedclass.' '.$class;?> zolo-testimonial zolo" data-animation = "<?php echo $data_animation;?>" data-delay = "<?php echo $data_delay;?>">
  <?php if($testimonialstyle == 'testimonials_style3'){?>
  <div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
  <?php }?>
  <div class="zolotestimonial_box">
  <?php if($testimonialstyle != 'testimonials_style1'){
		if($rating_option != '0%'){
		echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
		<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
		</div></div>';
		}} ?>
            
	<div class="zolo-testimonial-content" <?php echo $description_options['style']?>> <?php echo $content;?> </div>
	<?php if($img['thumbnail'] || $by || $designation){?>
	<div class="zolo-testimonial-author">
	  <?php if($testimonialstyle == 'testimonials_style1'){?>
	  <div class="zolo-testimonial-image"><?php echo $img['thumbnail'];?></div>
	  <?php }?>
	  <span class="author"><strong <?php echo $author_options['style']?>><?php echo $by;?></strong> <span class="designation" <?php echo $designation_options['style']?>><?php echo $designation;?></span> 
      <?php if($testimonialstyle == 'testimonials_style1'){
		if($rating_option != '0%'){
		echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
		<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
		</div></div>';
		}}?>
      </span> </div>
	<?php }?>
  </div>
</div>
<?php
$custom_css = '';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style2.zolo-testimonial,.zolotestimonial'.$c.'.testimonials_style3.zolo-testimonial{background:'.$testimonialbackgroundcolor.'; border:1px solid '.$testimonialbordercolor.'; color:'.$testimonialfontcolor.';}';
$custom_css .= '.zolotestimonial'.$c.' .zolo-testimonial-image img{
-moz-border-radius:'.$testimonialimgborradi.'px;
-webkit-border-radius:'.$testimonialimgborradi.'px;
-ms-border-radius:'.$testimonialimgborradi.'px;
-o-border-radius:'.$testimonialimgborradi.'px;
border-radius:'.$testimonialimgborradi.'px;
}';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style1 .zolo-testimonial-content{ background:'.$testimonialbackgroundcolor.'; border:1px solid '.$testimonialbordercolor.'; color:'.$testimonialfontcolor.';}';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style1 .zolo-testimonial-content:after{border-right: 15px solid transparent;border-left: 15px solid transparent;border-top: 15px solid '.$testimonialbordercolor.';}';
$custom_css .= '.zolotestimonial'.$c.'.testimonials_style1 .zolo-testimonial-content:before{border-right: 14px solid transparent;border-left: 14px solid transparent;border-top: 15px solid '.$testimonialbackgroundcolor.';}';
$custom_css .= '.zolotestimonial'.$c.'.'.$testimonialstyle.' .zolo-testimonial-author{color:'.$testimonialauthorcolor.';}';
apcore_save_plugin_dyn_styles( $custom_css );
