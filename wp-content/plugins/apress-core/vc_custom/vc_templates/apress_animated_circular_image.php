<?php 
/*-----------------------------------------------------------------------------------*/
/* Animated Circular Image
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

extract( shortcode_atts( array(
	'image1'			=> '',
	'image2'			=> '',
	'image3'			=> '',
	'image4'			=> '',
	'image5'			=> '',
	'image6'			=> '',
	'circle1_scheme'	=> 'primary_color_scheme',
	'circle1_color' 	=> '#549ffc',
	'circle1_opacity' 	=> '0.7',
	'circle1_top' 		=> '',
	'circle1_right' 	=> '',
	'circle1_bottom' 	=> '',
	'circle1_left' 		=> '',
	
	'circle2_scheme' 	=> 'primary_color_scheme',
	'circle2_color' 	=> '#549ffc',
	'circle2_opacity' 	=> '0.7',
	'circle2_top' 		=> '',
	'circle2_right' 	=> '',
	'circle2_bottom' 	=> '',
	'circle2_left' 		=> '',
	'circle2_top2' 		=> '',
	'circle2_right2' 	=> '',
	'circle2_bottom2' 	=> '',
	'circle2_left2' 	=> '',
	
	'circle3_scheme' 	=> 'primary_color_scheme',
	'circle3_color' 	=> '#549ffc',
	'circle3_opacity' 	=> '0.7',
	'circle3_top' 		=> '',
	'circle3_right' 	=> '',
	'circle3_bottom' 	=> '',
	'circle3_left' 		=> '',
	'circle3_top2' 		=> '',
	'circle3_right2' 	=> '',
	'circle3_bottom2' 	=> '',
	'circle3_left2' 	=> '',
	'circle3_top3' 		=> '',
	'circle3_right3' 	=> '',
	'circle3_bottom3' 	=> '',
	'circle3_left3' 	=> '',
	
	'class'				=> '',
	'data_animation'	=> 'No Animation',
	'data_delay'		=> '500',
), $atts ) );


	//Animation
	if($data_animation == 'No Animation'){
		$animatedclass = 'noanimation';
	}else{
		$animatedclass = 'animated hiding';
	}

if($circle1_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $circle1_scheme;
	}
$circle1_background_color = apcore_shortcodes_background_color_scheme($key);


if($circle2_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $circle2_scheme;
	}
$circle2_background_color = apcore_shortcodes_background_color_scheme($key);

if($circle3_scheme == 'design_your_own'){
	$key = '';
}else{
	$key = $circle3_scheme;
	}
$circle3_background_color = apcore_shortcodes_background_color_scheme($key);
	
	
$imageSrc1 = wp_get_attachment_image_src($image1, 'full');
$imageSrc2 = wp_get_attachment_image_src($image2, 'full');
$imageSrc3 = wp_get_attachment_image_src($image3, 'full');
$imageSrc4 = wp_get_attachment_image_src($image4, 'full');
$imageSrc5 = wp_get_attachment_image_src($image5, 'full');
$imageSrc6 = wp_get_attachment_image_src($image6, 'full');

$uniqid = uniqid(rand());
$circular_id = 'apress_circular_id_'.$uniqid;
$wrapperClass = 'apress_team_member_circular_wrap';


//circle1
$circle1_image_position = array();

if ( ! empty( $circle1_top ) ) {
	$circle1_image_position[] = 'top:'.$circle1_top.';';
}
if ( ! empty( $circle1_right ) ) {
	$circle1_image_position[] = 'right:'.$circle1_right.';';
}
if ( ! empty( $circle1_left ) ) {
	$circle1_image_position[] = 'left:'.$circle1_left.';';
}
if ( ! empty( $circle1_bottom ) ) {
	$circle1_image_position[] = 'bottom:'.$circle1_bottom.';';
}

$circle1_image_position = implode( ' ', $circle1_image_position );

//circle2
$circle2_image_position = array();
$circle2_image2_position = array();

if ( ! empty( $circle2_top ) ) {
	$circle2_image_position[] = 'top:'.$circle2_top.';';
}
if ( ! empty( $circle2_right ) ) {
	$circle2_image_position[] = 'right:'.$circle2_right.';';
}
if ( ! empty( $circle2_left ) ) {
	$circle2_image_position[] = 'left:'.$circle2_left.';';
}
if ( ! empty( $circle2_bottom ) ) {
	$circle2_image_position[] = 'bottom:'.$circle2_bottom.';';
}

if ( ! empty( $circle2_top2 ) ) {
	$circle2_image2_position[] = 'top:'.$circle2_top2.';';
}
if ( ! empty( $circle2_right2 ) ) {
	$circle2_image2_position[] = 'right:'.$circle2_right2.';';
}
if ( ! empty( $circle2_left2 ) ) {
	$circle2_image2_position[] = 'left:'.$circle2_left2.';';
}
if ( ! empty( $circle2_bottom2 ) ) {
	$circle2_image2_position[] = 'bottom:'.$circle2_bottom2.';';
}

$circle2_image_position = implode( ' ', $circle2_image_position );
$circle2_image2_position = implode( ' ', $circle2_image2_position );

//circle3
$circle3_image_position = array();
$circle3_image2_position = array();
$circle3_image3_position = array();

if ( ! empty( $circle3_top ) ) {
	$circle3_image_position[] = 'top:'.$circle3_top.';';
}
if ( ! empty( $circle3_right ) ) {
	$circle3_image_position[] = 'right:'.$circle3_right.';';
}
if ( ! empty( $circle3_left ) ) {
	$circle3_image_position[] = 'left:'.$circle3_left.';';
}
if ( ! empty( $circle3_bottom ) ) {
	$circle3_image_position[] = 'bottom:'.$circle3_bottom.';';
}

if ( ! empty( $circle3_top2 ) ) {
	$circle3_image2_position[] = 'top:'.$circle3_top2.';';
}
if ( ! empty( $circle3_right2 ) ) {
	$circle3_image2_position[] = 'right:'.$circle3_right2.';';
}
if ( ! empty( $circle3_left2 ) ) {
	$circle3_image2_position[] = 'left:'.$circle3_left2.';';
}
if ( ! empty( $circle3_bottom2 ) ) {
	$circle3_image2_position[] = 'bottom:'.$circle3_bottom2.';';
}

if ( ! empty( $circle3_top3 ) ) {
	$circle3_image3_position[] = 'top:'.$circle3_top3.';';
}
if ( ! empty( $circle3_right3 ) ) {
	$circle3_image3_position[] = 'right:'.$circle3_right3.';';
}
if ( ! empty( $circle3_left3 ) ) {
	$circle3_image3_position[] = 'left:'.$circle3_left3.';';
}
if ( ! empty( $circle3_bottom3 ) ) {
	$circle3_image3_position[] = 'bottom:'.$circle3_bottom3.';';
}

$circle3_image_position = implode( ' ', $circle3_image_position );
$circle3_image2_position = implode( ' ', $circle3_image2_position );
$circle3_image3_position = implode( ' ', $circle3_image3_position );
?>


<div id="<?php echo $circular_id;?>" class="<?php echo $wrapperClass.' '.$class;?>">
<div class="apress_team_member_circular_box">

<div class="apress_circular apress_team_member_circular1 <?php echo $animatedclass;?>" data-animation = "<?php echo $data_animation;?>" data-delay = "<?php echo $data_delay/3;?>">
<div class="apress_circular_bg"></div>
<?php if($imageSrc1 != ''){ echo '<div class="apress_circular_avatar" style="'.$circle1_image_position.'"><img src="'.$imageSrc1[0].'"></div>'; }?>

</div>
<div class="apress_circular apress_team_member_circular2 <?php echo $animatedclass;?>" data-animation = "<?php echo $data_animation;?>" data-delay = "<?php echo $data_delay/2;?>">

<div class="apress_circular_bg"></div>
<?php if($imageSrc2 != ''){ echo '<div class="apress_circular_avatar" style="'.$circle2_image_position.'"><img src="'.$imageSrc2[0].'"></div>'; }?>
<?php if($imageSrc3 != ''){ echo '<div class="apress_circular_avatar" style="'.$circle2_image2_position.'"><img src="'.$imageSrc3[0].'"></div>'; }?>

</div>
<div class="apress_circular apress_team_member_circular3 <?php echo $animatedclass;?>" data-animation = "<?php echo $data_animation;?>" data-delay = "<?php echo $data_delay;?>">
<div class="apress_circular_bg"></div>
<?php if($imageSrc4 != ''){ echo '<div class="apress_circular_avatar" style="'.$circle3_image_position.'"><img src="'.$imageSrc4[0].'"></div>'; }?>
<?php if($imageSrc5 != ''){ echo '<div class="apress_circular_avatar" style="'.$circle3_image2_position.'"><img src="'.$imageSrc5[0].'"></div>'; }?>
<?php if($imageSrc6 != ''){ echo '<div class="apress_circular_avatar" style="'.$circle3_image3_position.'"><img src="'.$imageSrc6[0].'"></div>'; }?>

</div>

</div>
</div>

<?php
$style = '';

if($circle1_scheme == 'design_your_own'){

$style .= '#'.$circular_id.' .apress_team_member_circular1 .apress_circular_bg{ background:'.$circle1_color.';}';

}else{

$style .= '#'.$circular_id.' .apress_team_member_circular1 .apress_circular_bg{'.$circle1_background_color.'}';

}
$style .= '#'.$circular_id.' .apress_team_member_circular1 .apress_circular_bg{ opacity:'.$circle1_opacity.';}';


if($circle2_scheme == 'design_your_own'){

$style .= '#'.$circular_id.' .apress_team_member_circular2 .apress_circular_bg{ background:'.$circle2_color.';}';

}else{

$style .= '#'.$circular_id.' .apress_team_member_circular2 .apress_circular_bg{'.$circle2_background_color.'}';

}
$style .= '#'.$circular_id.' .apress_team_member_circular2 .apress_circular_bg{ opacity:'.$circle2_opacity.';}';


if($circle3_scheme == 'design_your_own'){

$style .= '#'.$circular_id.' .apress_team_member_circular3 .apress_circular_bg{ background:'.$circle3_color.';}';

}else{

$style .= '#'.$circular_id.' .apress_team_member_circular3 .apress_circular_bg{'.$circle3_background_color.'}';

}
$style .= '#'.$circular_id.' .apress_team_member_circular3 .apress_circular_bg{ opacity:'.$circle3_opacity.';}';


apcore_save_plugin_dyn_styles( $style );