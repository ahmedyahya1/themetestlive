<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Modern
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {	die( '-1' );}

		  
extract(shortcode_atts(array(
	'style'					=> 'style1',
	'category'				=> '',
	'num'					=> '4',
	'style_num3'			=> '5',
	'style_num4'			=> '3',
	'blgmodernslider'		=> 'none',
	'blgmoderncolbg'		=> '#999999',
	'blgmoderncolhovbg'		=> '#07abaa',
	'blgcrslcolpad'			=> '1,0,1,0',
	'blgcrsltitlesize'		=> '24',
	'blgcrsltitlecolor'		=> '#ffffff',
	'blgmodernmetacolor'	=> '#ffffff',
	'blgmodernimgoverlay'	=> '#000000',
	'blgmodernoverlayopac'	=> '0.3',
	'blgmodernhovercolor'	=> '#000000',
	'blgmodernhoveropac' 	=> '0.7',
	'data_animation'		=> 'No Animation',
	'data_delay'			=> '500'
	
	
), $atts));
ob_start();				
	//Animation
	if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
		
	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid;

	global $post;
	$blgcrslcolpad = explode(",",$blgcrslcolpad);
	
	if($style == 'style1' || $style == 'style2'){
		$num = $num;	
	}elseif($style == 'style3'){
		$num = $style_num3;
	}elseif($style == 'style4'){
		$num = $style_num4;
	}
	
	if ($category!=="all" && $category!=="") {
		query_posts( 'category_name='.$category.'&post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
	}else{
		query_posts( 'post_type=post&ignore_sticky_posts=1&posts_per_page='.$num.'&post_status=publish');
	}
	?>
<?php 
if($style == 'style1'){
	$class = 'zolo_blog_modern1 zolo_blog_modern_1st_2nd';	
}elseif($style == 'style2'){
	$class = 'zolo_blog_modern2 zolo_blog_modern_1st_2nd';
}elseif($style == 'style3'){
	$class = 'zolo_blog_modern3 zolo_blog_modern3zt_4th';
}elseif($style == 'style4'){
	$class = 'zolo_blog_modern4 zolo_blog_modern3zt_4th';
}
?>
<!--Blog Row Start-->

<div class="zolo_blog_area zolo_blog_modern_style <?php echo $animatedclass;?> <?php echo ' zoloblogmodern'.$c.' '. $class;?> " data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>">
<div class="zolo_blog_row" style="margin:0 -<?php echo $blgcrslcolpad[1];?>px 0 -<?php echo $blgcrslcolpad[3];?>px;">
<?php 
if($style == 'style1' || $style == 'style2'){ ?>
<div class="zolo_row">
<?php
	$i = 1;
	while (have_posts()) : the_post(); ?>
<?php 
  if( $i % 4 == 0 )
	$class = 'last';
	else
	$class = '';  ?>
<?php
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
if($thumb) {
$url = $thumb['0'];
} 
?>
<!--Blog Box Area Start-->
<div class="zolo_blog_modern_row <?php echo $class;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;"> <a href="<?php the_permalink(); ?>">
  <?php 
	if($style == 'style1'){ ?>
  <div class="zolo_blog_box" style="background:url(<?php echo $url; ?>) no-repeat center center;">
	<?php }elseif($style == 'style2'){?>
	<div class="zolo_blog_box" style="background:<?php echo $blgmoderncolbg;?>;">
	  <?php }?>
	  <span class="overlay"></span>
	  <div class="zolo_blog_detail">
		<h2 class="zolo_blog_title entry-title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
		  <?php the_title(); ?>
		</h2>
		<span class="zolo_blog_date" style="color:<?php echo $blgmodernmetacolor;?>;border-color:<?php echo $blgmodernmetacolor;?>;"> 
		<span class="zolo_blog_day" style="border-color:<?php echo $blgmodernmetacolor;?>;">
		<?php the_time('j') ?>
		</span> 
		<span class="zolo_blog_month_year">
		<span class="zolo_blog_month">
		<?php the_time('F') ?>
		</span>
		<span class="zolo_blog_year">
		<?php the_time('Y') ?>
		</span>
		</span>
		</span>
		 </div>
	</div>
	</a> </div>
  <!--Blog Box Area End-->
  <?php $i++; endwhile;?>
</div>
<?php }elseif($style == 'style3' || $style == 'style4'){ ?>
<div class="zolo_row">
<?php 
if($blgmodernslider == 'show'){
	$blgmodernsliderclass ='owl-carousel zolo_owl_slider zolo_blog_modern_slider';
}else{
	$blgmodernsliderclass ='';   
}


// settings
$options_array = array(
	'class'                     => 'zolo_blog_modernslider '.$blgmodernsliderclass,
	// General
	'data-margin'               => 0,
	'data-slide-by'             => 1,
	'data-loop'                 => true,
	'data-lazy-load'            => false,
	'data-stage-padding'        => 0,
	'data-auto-height'			=> 0,
	'data-auto-width'           => 0,
	// Navigation
	'data-nav'                  => true,
	'data-dots'                 => false,
	'data-dots-container'		=>	0,
	'data-nav-container'		=>	0,
	// Autoplay
	'data-autoplay'             => true,
	'data-autoplay-timeout'     => 5000,
	'data-autoplay-speed'       => false,
	'data-autoplay-hover-pause' => false,
	// Responsive	
	'data-colums-mobile'  		=> 1,
	'data-colums-tablet'        => 1,
	'data-colums-desktop'       => 1,
	
	// Class for CSS3 animation
	'data-animate-out'			=> false,
	'data-animate-in'			=> false,
	
	//'data-animation'			=> $data_animation,
	//'data-delay'				=> $data_delay,
	
);

?>
  <ul <?php echo array_to_data( $options_array ); ?>>
	<?php
	$i = 1;
	while (have_posts()) : the_post(); ?>
	<?php if($style == 'style3'){ ?>
	<?php 
	if( $i % 5 == 1 || 1 == $i )
	$class = 'last';
	else
	$class = '';  
	if($i%5==1): echo '</li><li>'; endif; 
	} 
	?>
	<?php if($style == 'style4'){ 
	if( $i % 3 == 1 )
	$class = 'last';
	else
	$class = '';
	if($i%3==1): echo '</li><li>'; endif; 
	} ?>
	<!--Blog Box Area Start-->
	<div class="zolo_blog_modern3_col <?php echo $class;?>">
	  <div class="zolo_blog_box">
		<div class="zolo_blog_thumb">
		<?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
			}?>
		<a href="<?php the_permalink(); ?>">
		<?php if($style == 'style3'){ ?>
		<?php 
			if ( $class) { ?>
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('apcore_modern3_thumb_big');
				}else{
					echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern3_thumb_big.jpg" />';
				} ?>
			<?php } else { ?>
			<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('apcore_modern4_thumb_small');
				} else {
					echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern4_thumb_small.jpg" />';
				} ?>
		<?php } ?>
		<?php }elseif($style == 'style4'){ ?>
		<?php 
		if ( $class) { ?>
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('apcore_modern4_thumb_big');
			} else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern4_thumb_big.jpg" />';
			} ?>
			<?php } else { ?>
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('apcore_modern4_thumb_small');
			} else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/modern4_thumb_small.jpg" />';
			} ?>
			<?php } ?>
		<?php }?>
		<span class="overlay"></span>
		<div class="zolo_blog_detail">
		<h2 class="zolo_blog_title entry-title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;">
		<?php the_title(); ?>
		</h2>
		<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
		<?php the_time('j F Y') ?>
		</span> </div>
		</a> </div>
	  </div>
	</div>
	<!--Blog Box Area End-->
	
	<?php 
  $i++; endwhile;?>
  </ul>
</div>
<?php } ?>
</div>
</div>
<?php
$shortcode_css = '';
$shortcode_css .= '.zolo_blog_modern1.zoloblogmodern'.$c.' .zolo_blog_box .overlay{background:'.$blgmodernimgoverlay.'; opacity:'.$blgmodernoverlayopac.';}';
$shortcode_css .= '.zolo_blog_modern1.zoloblogmodern'.$c.' .zolo_blog_box:hover .overlay{background:'.$blgmodernhovercolor.'; opacity:'.$blgmodernhoveropac.';}';
$shortcode_css .= '.zolo_blog_modern2.zoloblogmodern'.$c.' .zolo_blog_box:hover{ background:'.$blgmoderncolhovbg.'!important;}';
$shortcode_css .= '.zolo_blog_modern3zt_4th.zoloblogmodern'.$c.' .zolo_blog_box .overlay:after{ content:""; position:absolute; height:100%; width:100%; float:left;background-color:'.$blgmodernhovercolor.'; opacity:0;}';
$shortcode_css .= '.zolo_blog_modern3zt_4th.zoloblogmodern'.$c.' .zolo_blog_box:hover .overlay:after{opacity:'.$blgmodernhoveropac.';}';

apcore_save_plugin_dyn_styles( $shortcode_css ); ?>

<?php
wp_reset_query();
$demolp_output = ob_get_clean();
echo $demolp_output;