<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Carousel
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) {	die( '-1' );}
	extract(shortcode_atts(array(
		'style'					=> 'style1',
		'category'				=> '',
		'num'					=> '12',
		'blgcrslcolprw'			=> 'Four',
		'blgcrslcolbg'			=> '#f9f9f9',
		'blgcrslcolbordep'		=> '#e6e6e6',
		'blgcrslcolradi'		=> '0',
		'blgcrslcolpad'			=> '15,15,15,15',
		'blgcrslcolpaddep'		=> '0,0,0,0',
		'blgcrsltitleposi'		=> 'bottom',
		'blgcrsltitleposidep'	=> 'center',
		'blgcrsltitlesize'		=> '24',
		'blgcrsltitlecolor' 	=> '#ffffff',
		'blgcrsltitlecolordep'	=> '#000000',
		'blgcrsltitlehovcolor'	=> '#ffffff',
		'blgcrslmetacolor'		=> '#777777',				
		'blgcrsltitlebg5dep'	=> '#00c8ec',
		'color_scheme'			=> 'primary_color_scheme',
		'blgcrslimgoverlay'		=> 'rgba(0, 0, 0, 0.3)',
		'blgcrslhovercolor'		=> 'rgba(0, 0, 0, 0.8)',
		'blgcrslzoomicon'		=> 'fa fa-search-plus',
		'blgcrsllinkicon'		=> 'fa fa-link',
		'blgcrslbuttonbg'		=> '#00c8ec',
		'blgcrslbuttonhovbg'	=> '#0187a0',
		'blgcrslnav'			=> 'none',				
		'data_animation'		=> 'No Animation',
		'data_delay'			=> '500'
		
	), $atts));
	
	ob_start();
	
	if($blgcrslcolprw == 'Four'){
			$blgcrslcolprw = 4;
		}elseif($blgcrslcolprw == 'Three'){
				$blgcrslcolprw = 3;
			}elseif($blgcrslcolprw == 'Two'){
					$blgcrslcolprw = 2;
				}
	
	//Animation
	if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
		
	if($color_scheme == 'design_your_own'){
		$key = '';
	}else{
		$key = $color_scheme;
	} 
	$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
	
	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid;
	
	
// settings
$options_array = array(
	'class'                     => 'owl-carousel zolo_owl_slider zolo_blog_slider'.$c.' '.$animatedclass.' zolocarousel'.$c.' '.$blgcrslnav,
	'data-margin'               => 0,
	'data-slide-by'             => 1,
	'data-loop'                 => true,
	'data-lazy-load'            => false,
	'data-stage-padding'        => 0,
	'data-auto-height'			=> 0,
	'data-auto-width'           => 0,
	// Navigation
	'data-nav'                  => '',
	'data-dots'                 => '',
	'data-dots-container'		=>	0,
	'data-nav-container'		=>	0,
	// Autoplay
	'data-autoplay'             => true,
	'data-autoplay-timeout'     => 5000,
	'data-autoplay-speed'       => false,
	'data-autoplay-hover-pause' => false,
	// Responsive	
	'data-colums-mobile'  		=> 1,
	'data-colums-tablet'        => 2,
	'data-colums-desktop'       => $blgcrslcolprw,
	
	// Class for CSS3 animation
	'data-animate-out'			=> false,
	'data-animate-in'			=> false,
	
	'data-animation'			=> $data_animation,
	'data-delay'				=> $data_delay,
	
);
	
	global $post;
	$blgcrslcolpaddep = explode(",",$blgcrslcolpaddep);
	$blgcrslcolpad = explode(",",$blgcrslcolpad);
	
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
	
	?>
<?php 
if($style == 'style1'){
	$class = 'zolo_carouselstyle1';	
	$blogstylethumb = 'apcore_blogstyle_thumb';
	$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
}elseif($style == 'style2'){
	$class = 'zolo_carouselstyle2 zolo_thumb_Carousel';
	$blogstylethumb = 'apcore_blogstyle_thumb';
	$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
}elseif($style == 'style3'){
	$class = 'zolo_carouselstyle3 zolo_thumb_Carousel';
	$blogstylethumb = 'apcore_blogstyle_thumb';
	$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
}elseif($style == 'style4'){
	$class = 'zolo_carouselstyle4 zolo_thumb_Carousel';
	$blogstylethumb = 'apcore_blogstyle_thumb';
	$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
}elseif($style == 'style5'){
	$class = 'zolo_carouselstyle5';
	$blogstylethumb = 'apcore_blog_medium';
	$blogstylethumb_img = get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_medium.jpg';
}
?>
<?php 
	if($style == 'style1'){ 
		$crsltitleposi = $blgcrsltitleposi;
	}elseif($style == 'style2' || $style == 'style3'){
		$crsltitleposi = $blgcrsltitleposidep;
	}elseif($style == 'style4'){
		$crsltitleposi = 'bottom';
	}else{
		$crsltitleposi = 'none';
		}
  
	if($style == 'style3' || $style == 'style4'){
		$classpad = $blgcrslcolpaddep; 
	}else{
		$classpad = $blgcrslcolpad; 	
	}
  ?>

<!--Blog carousel1 Area Start-->

<div class="zolo_blog_slider_area <?php echo $class;?>">
  <div class="zolo_blog_carousel_row" style="margin:0 -<?php echo $classpad[1];?>px 0 -<?php echo $classpad[3];?>px;">
    <div data-post-number="<?php echo $blgcrslcolprw;?>" <?php echo array_to_data( $options_array ); ?>>
      <?php
  $i = 1;
  while (have_posts()) : the_post(); ?>
      <?php 
  if( $i % 4 == 0 )
	$class = 'last';
	else
	$class = '';  ?>
      <div class="zolo_blogbox" style="padding:<?php echo $classpad[0];?>px <?php echo $classpad[1];?>px <?php echo $classpad[2];?>px <?php echo $classpad[3];?>px;">
        <div class="zolo_blog_box <?php echo $crsltitleposi; ?>" style="background:<?php echo $blgcrslcolbg;?>; border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;"> 
          
          <?php
		 //Blog carousel Style 1 Detail Start 
		 if($style == 'style1' && $blgcrsltitleposi == 'top'){ ?>
          <div class="zolo_blog_detail">
            <h2 class="zolo_blog_title entry-title" style="color:<?php echo $blgcrsltitlecolordep;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"><a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolordep;?>;">
              <?php if (strlen($post->post_title) > 50) {
			echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
			the_title();
			} ?>
              </a></h2>
            <span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolordep;?>;">
            <?php the_time('F jS, Y') ?>
            </span></div>
          <?php }?>
          
			<?php 
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $blogstylethumb ); 
            
            if ( $thumb ){
                $thumb_url = $thumb['0'];
            } else {
                $thumb_url = $blogstylethumb_img;
            } 
            ?>
          <div class="zolo_blog_thumb">
			<?php 
            //zolo_zilla_likes
            if( function_exists('zolo_zilla_likes') ){ 
                echo '<span class="zolo_zilla_likes_box"> ';
                zolo_zilla_likes();
                echo '</span>';
            }
            ?>
            <img src="<?php echo $thumb_url; ?>" /> <span class="overlay"></span> 
            
            <!-- Blog carousel Style 2, 3 & 4 Detail Start -->
            <?php if($style == 'style2' || $style == 'style3' || $style == 'style4'){ ?>
            <div class="zolo_blog_detail">
              <h2 class="zolo_blog_title entry-title" style="color:<?php echo $blgcrsltitlecolor;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"><a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
                <?php if (strlen($post->post_title) > 50) {
				echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
				the_title();
			} ?>
                </a></h2>
              <span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
              <?php the_time('F jS, Y') ?>
              </span> 
              <?php 
			  //Blog carousel Style 2 & 3 Icon Start
			  if($style == 'style2' || $style == 'style3'){ ?>
              <span class="zolo_blog_icons"> <a href="<?php echo $thumb_url ?>" rel="prettyPhoto[pretty_photo_gallery]" ><span class="zolo_blog_icon blog_zoom_icon"> <i class="<?php if($blgcrslzoomicon){ echo $blgcrslzoomicon; }?>"></i> </span></a> <a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon"> <i class="<?php if($blgcrsllinkicon){ echo $blgcrsllinkicon; }?>"></i> </span></a> </span>
              <?php }?>
              
              
            </div>
            <?php }?>
            <?php 
			//Blog carousel Style 1 Icon Start
			if($style == 'style1' || $style == 'style5'){ ?>
            <span class="zolo_blog_icons"> <a href="<?php echo $thumb_url; ?>" rel="prettyPhoto[pretty_photo_gallery]" ><span class="zolo_blog_icon blog_zoom_icon"> <i class="<?php if($blgcrslzoomicon){ echo $blgcrslzoomicon; }?>"></i> </span></a> <a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon"> <i class="<?php if($blgcrsllinkicon){ echo $blgcrsllinkicon; }?>"></i> </span></a> </span>
            <?php }?>
            <!-- Blog carousel Style 1 Icon End --> 
            
          </div>
          
          <!-- Blog carousel Style 1 Detail Start -->
          <?php
		 if($style == 'style1' && $blgcrsltitleposi == 'bottom'){ ?>
          <div class="zolo_blog_detail">
            <h2 class="zolo_blog_title entry-title" style="color:<?php echo $blgcrsltitlecolordep;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolordep;?>;">
              <?php if (strlen($post->post_title) > 50) {
			echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
			the_title();
		  } ?>
              </a> </h2>
            <span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolordep;?>;">
            <?php the_time('F jS, Y') ?>
            </span></div>
          <?php }?>
          
          <?php
		 if($style == 'style5'){ ?>
          <div class="zolo_blog_detail">
            <h2 class="zolo_blog_title entry-title" style="color:<?php echo $blgcrsltitlecolordep;?>;font-size:<?php echo $blgcrsltitlesize; ?>px;"> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolordep;?>;">
              <?php if (strlen($post->post_title) > 50) {
			echo substr(the_title($before = '', $after = '', FALSE), 0, 50) . '...'; } else {
			the_title();
			} ?>
              </a> </h2>
            <div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolordep;?>;">
              <?php $content = wp_trim_words( get_the_content(), 16, '' );
			  echo  preg_replace( '/\[[^\]]+\]/', '', $content );	 ?>
            </div>
            <span class="zolo_blog_date_style5" style="color:<?php echo $blgcrslmetacolor;?>;">
            <?php the_time('F jS, Y') ?>
            </span> </div>
          <?php }?>
          
        </div>
      </div>
      <?php $i++; endwhile; ?>
    </div>
  </div>
</div>
<?php
$shortcode_css = '';

if($color_scheme == 'design_your_own'){
	$shortcode_css .= '.zolocarousel'.$c.' .zolo_blog_box .overlay{background:'.$blgcrslimgoverlay.';}';
	$shortcode_css .= '.zolocarousel'.$c.' .zolo_blog_box:hover .overlay{background:'.$blgcrslhovercolor.';}';
		
}else{
	$shortcode_css .= '.zolocarousel'.$c.' .zolo_blog_box .overlay{ opacity:0;filter: alpha(opacity=0);}';
	$shortcode_css .= '.zolocarousel'.$c.' .zolo_blog_box:hover .overlay{opacity:0.8;filter: alpha(opacity=80);'.$color_scheme_css.'}';
		
}
		
$shortcode_css .= '.zolocarousel'.$c.' .zolo_blog_box .zolo_blog_icons .zolo_blog_icon{background:'.$blgcrslbuttonbg.';}';

$shortcode_css .= '.zolocarousel'.$c.'  .zolo_blog_box .zolo_blog_icons .zolo_blog_icon:hover{background:'.$blgcrslbuttonhovbg.';}';

$shortcode_css .= '.zolocarousel'.$c.'.owl-carousel.square .owl-nav button,
.zolocarousel'.$c.'.owl-carousel.round .owl-nav button{background:'.$blgcrslbuttonbg.';}';

$shortcode_css .= '.zolocarousel'.$c.'.owl-carousel.square .owl-nav button:hover,
.zolocarousel'.$c.'.owl-carousel.round .owl-nav button:hover{background:'.$blgcrslbuttonhovbg.';}';

$shortcode_css .= '.zolo_thumb_Carousel.zolo_carouselstyle4 .zolo_blog_box.bottom:hover .zolo_blog_detail{background:'.$blgcrsltitlebg5dep.'; border-bottom-left-radius:'.$blgcrslcolradi.'px;border-bottom-right-radius:'.$blgcrslcolradi.'px;}';

$shortcode_css .= '.zolo_thumb_Carousel.zolo_carouselstyle4 .zolo_blog_box.bottom .zolo_blog_detail{border-bottom-left-radius:'.$blgcrslcolradi.'px; border-bottom-right-radius:'.$blgcrslcolradi.'px;}';

$shortcode_css .= '.zolo_carouselstyle1 .zolocarousel'.$c.' .zolo_blog_box.top .overlay,
.zolo_carouselstyle1 .zolocarousel'.$c.' .zolo_blog_box.top .zolo_blog_thumb img{border-bottom-left-radius:'.$blgcrslcolradi.'px;
border-bottom-right-radius:'.$blgcrslcolradi.'px; overflow:hidden;}';

$shortcode_css .= '.zolo_carouselstyle1 .zolocarousel'.$c.' .zolo_blog_box.bottom .zolo_blog_thumb .overlay,
.zolo_carouselstyle1 .zolocarousel'.$c.' .zolo_blog_box.bottom .zolo_blog_thumb img{border-top-left-radius:'.$blgcrslcolradi.'px;
border-top-right-radius:'.$blgcrslcolradi.'px; overflow:hidden;}';

$shortcode_css .= '.zolo_carouselstyle2 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
.zolo_carouselstyle2 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb img{border-radius:'.$blgcrslcolradi.'px;overflow:hidden;}';

$shortcode_css .= '.zolo_carouselstyle3 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
.zolo_carouselstyle3 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb img{border-radius:'.$blgcrslcolradi.'px;overflow:hidden;}';

$shortcode_css .= '.zolo_carouselstyle4 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
.zolo_carouselstyle4 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb img{border-radius:'.$blgcrslcolradi.'px;overflow:hidden;}';

$shortcode_css .= '.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_thumb img{border-top-left-radius:'.$blgcrslcolradi.'px;border-top-right-radius:'.$blgcrslcolradi.'px;}';

$shortcode_css .= '.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box .zolo_blog_detail{border-bottom-left-radius:'.$blgcrslcolradi.'px; border-bottom-right-radius:'.$blgcrslcolradi.'px;}';

$shortcode_css .= '.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box:hover .zolo_blog_detail{background:'.$blgcrsltitlebg5dep.';}';

$shortcode_css .= '.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box:hover .zolo_blog_detail span.zolo_blog_date_style5,
.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box:hover .zolo_blog_detail .zolo_blog_description,
.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box:hover .zolo_blog_detail .zolo_blog_title a,
.zolo_carouselstyle5 .zolocarousel'.$c.' .zolo_blog_box:hover .zolo_blog_detail .zolo_blog_title{color:'.$blgcrsltitlehovcolor.'!important;}';

apcore_save_plugin_dyn_styles( $shortcode_css ); ?>
<?php
wp_reset_query();
$demolp_output = ob_get_clean();
echo $demolp_output;
			
