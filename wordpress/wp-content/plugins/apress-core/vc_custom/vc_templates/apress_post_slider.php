<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Post Slider
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
extract(shortcode_atts(array(
	'blogpostsliderstyle' 					=> 'postsliderstyle1',	
	'category' 								=> '',
	'num' 									=> '4',
	'postsliderheight'						=> '450',
	'postslidercaptionheight'				=> '206',
	'postslidercaptionwidth'				=> '606',
	'postslidercaptionpad'					=> '50,50,50,50',
	'postslidercaptionbg' 					=> '',
	'blgcrsltitlesize'						=> '20',
	'slidercaptiontextalgin'				=> 'left',
	'blgcrsltitlecolor' 					=> '#777777',
	'title_padding' 						=> 'padding-top:12|padding-right:0|padding-bottom:15|padding-left:0',
	'posttitleseparatorshowhide' 			=> 'hide',
	'titleseparatorimg'						=> '',	
	'slidercategorydesign'					=> 'none',
	'categoryfontcolor'						=> '#ffffff',
	'categoryfontcolorhover'				=> '#ffffff',
	'categorybackgroundcolor'				=> '#549ffc',
	'categorybackgroundcolorhover'			=> '#347ad1',
	'categorybordercolor'					=> '#549ffc',
	'categorybordercolorhover'				=> '#347ad1',
	'excerptlength'							=> '0',
	'continuereadingshowhide'				=> 'hide',
	'continuereadingmodify'					=> 'Continue Reading',
	'buttonfontcolor'						=> '#757575',
	'buttonfontcolorhover'					=> '#549ffc',
	'buttonbackgroundcolor'					=> '#ffffff',
	'buttonbackgroundcolorhover'			=> '#ffffff',
	'buttonbordercolor'						=> '#757575', 
	'buttonbordercolorhover'				=> '#549ffc',
	'postmetashowhide'						=> 'show',
	'blgmodernmetacolor' 					=> '#777777',
	'postmetacolorhover'					=> '#549ffc',
	'postcontentcolor'						=> '#777777',
	'data_animation'						=> 'No Animation',
	'data_delay'							=> '500'
	
	
), $atts));

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}

$uniqid = uniqid(rand());
$c = 'acp_'.$uniqid;

//RTL Colde
if ( is_rtl() ){
		if($slidercaptiontextalgin == 'left'){
			$slidercaptiontextalgin = 'right';
		}else if($slidercaptiontextalgin == 'right'){
			$slidercaptiontextalgin = 'left';
		}else{
			$slidercaptiontextalgin = 'center';
		}
		
	}else{
		$slidercaptiontextalgin = $slidercaptiontextalgin;
	}
	
$img = wp_get_attachment_image_src($titleseparatorimg,'full');
$titleseparatorimg1 = $img[0];

global $post;

if($category == 'all') {
		$category = null;
	}	
	$blog_arr = array(
		'posts_per_page'	=> $num,
		'post_type'			=> 'post',
		'category_name'		=> $category,
		'post_status'		=>'publish'
	);	
	query_posts($blog_arr);
	
$data_margin = 0;
if(($blogpostsliderstyle == 'postsliderstyle2') || ($blogpostsliderstyle == 'postsliderstyle4')){
	$data_margin = 4;
	}else if($blogpostsliderstyle == 'postsliderstyle3'){
		$data_margin = 8;
		}else{
			$data_margin = 0;
			}
$data_colums_desktop = 1;
if($blogpostsliderstyle == 'postsliderstyle2'){
	$data_colums_desktop = 2;
	}else if($blogpostsliderstyle == 'postsliderstyle4'){
		$data_colums_desktop = 3;
		}else{
			$data_colums_desktop = 1;
			}
// settings
$options_array = array(
	'class'                     => 'owl-carousel zolo_owl_slider zolo_blogslider'.$c.' '.$animatedclass.' '.$blogpostsliderstyle,
	
	// General
	'data-margin'               => $data_margin,
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
	'data-colums-desktop'       => $data_colums_desktop,
	
	// Class for CSS3 animation
	'data-animate-out'			=> 'fadeOut',
	'data-animate-in'			=> 'fadeIn',
		
	'data-animation'			=> $data_animation,
	'data-delay'				=> $data_delay,
	
);	
?>

<!--Blog Row Start-->

<div class="zolo_blog_post_slider_area" style="height:<?php if($blogpostsliderstyle != 'postsliderstyle5'){echo $postsliderheight;}?>px;overflow:hidden; width:100%; float:left;">
  <?php /*?><div class="owl-carousel zolo_blogslider<?php echo $c;?> <?php echo $animatedclass.' '.$blogpostsliderstyle;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php echo $data_delay; ?>"><?php */?>
  <div <?php echo array_to_data( $options_array ); ?>>
<?php
while (have_posts()) : the_post();

$img = wp_get_attachment_image_src($postslidercaptionbg,'full');
$postslidercaptionbgimg = $img[0];
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
   
if ( $thumb ){
$thumb_url = $thumb['0'];
} else {
$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_large.jpg';
} 

?>
    <div class="zolo_blog_post_slide" style=" height:<?php if($blogpostsliderstyle != 'postsliderstyle5'){echo $postsliderheight;}?>px;background:url(<?php echo $thumb_url ?>) no-repeat center center; -moz-background-size:cover;-webkit-background-size:cover;-o-background-size:cover;-ms-background-size:cover;background-size:cover;">
      <div class="post_slider_caption <?php echo $slidercaptiontextalgin;?>" style="max-width:<?php echo $postslidercaptionwidth;?>px;min-height:<?php echo $postslidercaptionheight;?>px;background:url(<?php echo $postslidercaptionbgimg ?>) no-repeat center center;<?php echo esc_js(Zolo_Param_Padding::paddings_css($postslidercaptionpad));?>;-moz-background-size:100% 100%;-webkit-background-size:100% 100%;-o-background-size:100% 100%;-ms-background-size:100% 100%;background-size:100% 100%;">
        <div class="post_slider_caption_text">
<?php 
if($slidercategorydesign == 'none'){
	$categories_list = get_the_category_list( __( ', ', 'apcore' ) );
}else{
	$categories_list = get_the_category_list( __( ' ', 'apcore' ) );
} 
if ( $categories_list ) {
	echo '<div class="post_slider_category '.$slidercategorydesign.'">';
	echo '<span class="categories-links">';
	echo $categories_list;
	echo '</span>';
	echo '</div>';
}
?>
          <h2 class="zolo_blog_title entry-title" style=" font-size:<?php echo $blgcrsltitlesize;?>px; color:<?php echo $blgcrsltitlecolor;?>; <?php echo esc_js(Zolo_Param_Padding::paddings_css($title_padding));?>"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
            <?php the_title();?>
            </a> </h2>
          <?php if($titleseparatorimg1){?>
          <div class="postslider_title_separator"><img src="<?php echo $titleseparatorimg1;?>"/></div>
          <?php }?>
          <?php if($postmetashowhide == 'show'){?>
          <ul class="metatag_list">
            <li class="date"><span class="meta_label"><?php __( 'Posted on:', 'apcore' ); ?> </span>
              <?php the_time('F j, Y') ?>
            </li>
            <li class="date"><span class="meta_label"><?php __( 'Posted by:', 'apcore' ); ?> </span> <?php echo get_the_author_posts_link(); ?></li>
            <li class="date">
              <?php 
			  comments_popup_link( __( '0 Comments', 'apcore' ), __( '1 Comment', 'apcore' ), __( '% Comments', 'apcore' ),__( 'comments-link', 'apcore' ), __( 'Comments are off for this post', 'apcore' ) );
			  ?>
            </li>
          </ul>
          <?php }?>
          <?php if($excerptlength != '0'){?>
          <div class="zolo_postslider_description" style="color:<?php echo $postcontentcolor;?>;">
            <?php 
if($continuereadingshowhide == 'show'){
$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.__($continuereadingmodify,'apcore').' </a></span>';
$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
echo  preg_replace( '/\[[^\]]+\]/', '', $content );
}else{
$content = wp_trim_words( get_the_content(), $excerptlength, '' );
echo  preg_replace( '/\[[^\]]+\]/', '', $content );
}
?>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
    
    <!--Blog Box Area End-->
    <?php endwhile;wp_reset_query(); ?>
  </div>
</div>
<?php
$custom_css = '';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' ul.metatag_list,.zolo_blog_post_slider_area .zolo_blogslider'.$c.' ul.metatag_list a{color:'.$blgmodernmetacolor.';}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' ul.metatag_list a:hover{color:'.$postmetacolorhover.';}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' .post_slider_caption{ text-align:'.$slidercaptiontextalgin.';}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' .post_slider_category a{background:'.$categorybackgroundcolor.';border: 1px solid '.$categorybordercolor.';color:'.$categoryfontcolor.';}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' .post_slider_category a:hover{background:'.$categorybackgroundcolorhover.';border: 1px solid '.$categorybordercolorhover.';color:'.$categoryfontcolorhover.';}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' .read_more_area{ text-align:'.$slidercaptiontextalgin.'}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' .read_more_area a.read-more{ color:'.$buttonfontcolor.';background:'.$buttonbackgroundcolor.'; border:1px solid '.$buttonbordercolor.';}';
$custom_css .= '.zolo_blog_post_slider_area .zolo_blogslider'.$c.' .read_more_area a.read-more:hover{ color:'.$buttonfontcolorhover.';background:'.$buttonbackgroundcolorhover.'; border:1px solid '.$buttonbordercolorhover.';}';
apcore_save_plugin_dyn_styles( $custom_css );
