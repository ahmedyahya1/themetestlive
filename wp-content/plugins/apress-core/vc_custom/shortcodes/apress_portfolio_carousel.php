<?php 
/*-----------------------------------------------------------------------------------*/
/* Portfolio Carousel
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Portfolio_Carousel_Module')) {
	class Apress_Portfolio_Carousel_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_portfolio_carousel_init' ) );
			add_shortcode( 'apress_portfolio_carousel', array( &$this, 'apress_portfolio_carousel' ) );
		}
		
		function apress_portfolio_carousel_init() {			
			$is_admin = is_admin();	
			$portfolio_types = ($is_admin) ? get_terms('catportfolio') : array('All' => 'all');
			$types_options = array("All" => "all");
			if($is_admin) {
				foreach ($portfolio_types as $type) {
					$types_options[$type->name] = $type->slug;
				}
			} else {
				$types_options['All'] = 'all';
			}
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"				=> __("Portfolio Carousel", 'apcore'),
					"base"				=> "apress_portfolio_carousel",
					"class"				=> "",
					"weight"			=> 15,
					"category"			=> __( "Apress", "apcore"),
					"description"		=> __("Beautiful Portfolio Carousel", "apcore"),
					"icon"				=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-portfolio_slider.png",
					"params"			=> array(		
						array(
							'type'        => 'radio_image_select',
							'heading'     => esc_html__( 'Choose Style', 'apcore' ),
							"holder"	  => "div",
							'param_name'  => 'style',
							'simple_mode' => false,
							'admin_label' => true,
							'options'     => array(
								'style1' => array(
									'tooltip' => esc_attr__('Style 1','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_carousel/carousel_style1.jpg'
								),
								'style2' => array(
									'tooltip' => esc_attr__('Style 2','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_carousel/carousel_style2.jpg'
								),
								'style3' => array(
									'tooltip' => esc_attr__('Style 3','apcore'),
									'src' => APRESS_EXTENSIONS_PLUGIN_URL . 'vc_custom/assets/images/portfolio/portfolio_carousel/carousel_style3.jpg'
								),
							),
						),
						array(
							"type"				=> "zolo_taxonomy_multiselect",
							"heading"			=> __("Categories", "apcore"),
							"param_name"		=> "category",
							"admin_label"		=> true,
							"value"				=> $types_options,
							'save_always'		=> true,
							"description"		=> __("Please select the categories you would like to display for your portfolio. <br/> You can select multiple categories too (ctrl + click on PC and command + click on Mac).", "apcore")
						),						
						array(
							"type"				=> "dropdown",
							"class" => "",
							"heading"			=> __("Choose Hover type",'apcore'),
							"param_name"		=> "portfoliohovertype",
							'value'				=> array(
								__("Fade",'apcore') => "hovertype_fade",
								__("Zoom In",'apcore') => "hovertype_zoomin",
								__("Zoom Out",'apcore') => "hovertype_zoomout",
								__("Layla",'apcore') => "hovertype_layla",
								__("Zoe",'apcore') => "hovertype_zoe",
								__("Oscar",'apcore') => "hovertype_oscar",
								__("Roxy",'apcore') => "hovertype_roxy",
								__("Bubba",'apcore') => "hovertype_bubba",
								__("Jazz",'apcore') => "hovertype_jazz"
							),
						),				
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Number of Posts",'apcore'),
							"description"		=> __("Leave blank or -1 to show all.",'apcore'),
							"param_name"		=> "num",
							'value'				=> '4', 
						),
						array(
							"type"				=> "dropdown",
							"class" => "",
							"heading"			=> __("Number of Items per row",'apcore'),
							"param_name"		=> "portfoliocrslcolprw",
							"value"				=> array(
								__("Four",'apcore') => "Four",
								__("Five",'apcore') => "Five",
								__("Six",'apcore') => "Six",
								__("Three",'apcore') => "Three",
								__("Two",'apcore') => "Two"
							),
						),
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Box Background Color",'apcore'),
							"param_name"		=> "portfoliocrslcolbg",
							"value"				=> '#f9f9f9',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Box Border Color",'apcore'),
							"param_name"		=> "portfoliocrslcolbordep",
							"value"				=> '#e6e6e6',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Box Border Radius",'apcore'),
							"param_name"		=> "portfoliocrslcolradi",
							'value'				=> '0', 
						),
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
							"param_name"		=> "portfoliocrslcolpad",
							'value'				=> '15,15,15,15',
							'dependency' => array( 'element' => 'style', 'value' => array('style1','style2'))
						),
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Box Padding(Top, Right, Bottom, Left)",'apcore'),
							"param_name"		=> "portfoliocrslcolpad2",
							'value'				=> '0,0,0,0',
							'dependency' => array( 'element' => 'style', 'value' => array('style3'))
						),	
						array(
						   'type'    => 'zolo_box_shadow_param',
						   'heading'	=> esc_html__('Box Shadow', 'apcore'),
						   'param_name' => 'box_shadow',
						   "value"		=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						),
						array(
							'type'				=> 'zolo_single_checkbox',
							'heading'			=> esc_html__('Box Swing', 'apcore'),
							'param_name'		=> 'box_swing',
							'value'				=> 'no',
							'options'			=> array(
								'yes'			=> array(
									'on'				=> 'Yes',
									'off'				=> 'No',
								),
							),
						),						
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Title Font Size",'apcore'),
							"description"		=> __("Enter value without px.",'apcore'),
							"param_name"		=> "portfoliocrsltitlesize",
							'value'				=> '24', 
						),		
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Title Text Color",'apcore'),
							"param_name"		=> "portfoliocrsltitlecolor",
							"value"				=> '#4c4c4c', 
						),
						
						array(
							"type"			=> "dropdown",
							"heading"		=> __("Select Image Overlay Color Scheme",'apcore'),
							"param_name"	=> "color_scheme",
							"value"			=> array(
								__("Primary Color",'apcore') 	=> "primary_color_scheme",
								__("Color Scheme 1",'apcore') 	=> "color_scheme1",
								__("Color Scheme 2",'apcore') 	=> "color_scheme2",
								__("Gradient Scheme 1",'apcore') 	=> "gradient_scheme1",
								__("Gradient Scheme 2",'apcore') 	=> "gradient_scheme2",
								__("Gradient Scheme 3",'apcore') 	=> "gradient_scheme3",
								__("Custom Color",'apcore') 	=> "design_your_own"
							),
						),						
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Image Overlay Color",'apcore'),
							"param_name"		=> "portfoliocrslimgoverlay",
							"value"				=> 'rgba(0, 0, 0, 0.1)', 
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),									
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Image Overlay Hover Color",'apcore'),
							"param_name"		=> "portfoliocrsloverlayhovercolor",
							"value"				=> 'rgba(0, 0, 0, 0.7)', 
							'dependency'		=> array('element' => 'color_scheme', 'value' => array('design_your_own')),
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',	
						),
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Font Awesome Zoom Icon",'apcore'),
							"param_name"		=> "portfoliocrslzoomicon",
							'value'				=> 'fa fa-search-plus',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "textfield",
							"class" => "",
							"heading"			=> __("Font Awesome Link Icon",'apcore'),
							"param_name"		=> "portfoliocrsllinkicon",
							'value'				=> 'fa fa-link',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Button Background",'apcore'),
							"description"		=> __("for Zoom and Link Icon", "apcore"),
							"param_name"		=> "portfoliocrslbuttonbg",
							"value"				=> '#00c8ec', 
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "colorpicker",
							"class" => "",
							"heading"			=> __("Button Hover Background",'apcore'),
							"description"		=> __("for Zoom and Link Icon", "apcore"),
							"param_name"		=> "portfoliocrslbuttonhovbg",
							"value"				=> '#0187a0', 
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin',
						),
						array(
							"type"				=> "dropdown",
							"class" => "",
							"heading"			=> __("Slider Navigation Design",'apcore'),
							"param_name"		=> "portfoliocrslnav",
							'value'				=> array(__("None",'apcore') => "none",__("Square",'apcore') => "square",__("Round",'apcore') => "round"),
						),
						array(
							'type'				=> 'zolo_param_heading',
							'text'				=> esc_html__('Extra features', 'apcore'),
							'param_name'		=> 'subtitle_margin_heading',
							'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("CSS Animation",'apcore'),
							"param_name"		=> "data_animation",
							"value"				=> apress_data_animations(),
							"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
						),  
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Delay","apcore"),
							"param_name"		=> "data_delay",
							"value"				=> "500",
							"description"		=> __("Delay","apcore"),
							"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
						),
						array(
							'type'				=> 'zolo_video_link_param',
							'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
							'param_name'		=> 'tutorials',
							'doc_link'			=> $doc_link,
							'video_link'		=> 'https://youtu.be/pXGp4hBJU6c',
						),
					),
					) );
			}
		}

		function apress_portfolio_carousel( $atts, $content=null ){
		  ob_start();
		   extract(shortcode_atts(array(
						'style'=>'style1',
						'category' => '',
						'portfoliohovertype'=>'hovertype_fade',
						'num' => '4',
						'portfoliocrslcolprw' => 'Four',
						'portfoliocrslcolbg' => '#f9f9f9',
						'portfoliocrslcolbordep' => '#e6e6e6',
						'portfoliocrslcolradi' => '0',
						'portfoliocrslcolpad' => '15,15,15,15',
						'portfoliocrslcolpad2' => '0,0,0,0',
						'box_shadow'			=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
						'box_swing'				=>'no',
						'portfoliocrsltitlesize' => '24',
						'portfoliocrsltitlecolor' => '#4c4c4c',
						'color_scheme'	=> 'primary_color_scheme',
						'portfoliocrslimgoverlay' => 'rgba(0, 0, 0, 0.1)',
						'portfoliocrsloverlayhovercolor' => 'rgba(0, 0, 0, 0.7)',
						'portfoliocrslzoomicon' => 'fa fa-search-plus',
						'portfoliocrsllinkicon' => 'fa fa-link',
						'portfoliocrslbuttonbg' => '#00c8ec',
						'portfoliocrslbuttonhovbg' =>'#0187a0',
						'portfoliocrslnav' => 'none',
						'data_animation'=>'No Animation',
						'data_delay'=>'500'
						
				), $atts));
				
				if($portfoliocrslcolprw == 'Six'){
					$portfoliocrslcolprw = 6;
				}elseif($portfoliocrslcolprw == 'Five'){
					$portfoliocrslcolprw = 5;
				}elseif($portfoliocrslcolprw == 'Four'){
					$portfoliocrslcolprw = 4;
				}elseif($portfoliocrslcolprw == 'Three'){
					$portfoliocrslcolprw = 3;
				}elseif($portfoliocrslcolprw == 'Two'){
					$portfoliocrslcolprw = 2;
				}
				//Animation
				if($data_animation == 'No Animation'){
						$animatedclass = 'noanimation';
					}else{
						$animatedclass = 'animated hiding';
					}
					
				static $c = 1;
				
				if($color_scheme == 'design_your_own'){
					$key = '';
				}else{
					$key = $color_scheme;
				} 
				$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
				
				
				// settings
				$options_array = array(
					'class'						=> 'owl-carousel zolo_owl_slider zolo_portfolio_slider'.$c.' '.$animatedclass.' zolocarousel'.$c.' '.$portfoliocrslnav,

					'data-margin'               => 0,
					'data-slide-by'             => 1,
					'data-loop'                 => true,
					'data-lazy-load'            => true,
					'data-stage-padding'        => 0,
					'data-auto-height'			=> 0,
					'data-auto-width'           => 0,
					// Navigation
					'data-nav'                  => false,
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
					'data-colums-tablet'        => 2,
					'data-colums-desktop'       => $portfoliocrslcolprw,
					
					// Class for CSS3 animation
					'data-animate-out'			=> false,
					'data-animate-in'			=> false,
					
					'data-animation'			=> $data_animation,
					'data-delay'				=> $data_delay,
					
				);
				
				global $post;
				$portfoliocrslcolpad = explode(",",$portfoliocrslcolpad);
				$portfoliocrslcolpad2 = explode(",",$portfoliocrslcolpad2);
				
				if($category == 'all') {
					$category = null;
				}				
				$portfolio = array(
					'posts_per_page' => $num,
					'post_type' => 'zt_portfolio',
					'catportfolio'=> $category
				);
				$port_query = new WP_Query($portfolio);				   
				 ?>
		
		<?php 
			if($style == 'style1'){
				$class = 'zolo_carouselstyle1';	
			}elseif($style == 'style2'){
				$class = 'zolo_carouselstyle2 zolo_thumb_Carousel';
			}elseif($style == 'style3'){
				$class = 'zolo_carouselstyle3 zolo_thumb_Carousel';
			}elseif($style == 'style4'){
				$class = 'zolo_carouselstyle4 zolo_thumb_Carousel';
			}elseif($style == 'style5'){
				$class = 'zolo_carouselstyle5';
			}
		?>
		
		<?php if($style == 'style1' || $style == 'style2'){
					$classpad = $portfoliocrslcolpad; 
				}else{
					$classpad = $portfoliocrslcolpad2; 
				}
				
		if(substr_count($box_shadow, 'disable') == 0) {
			$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
		}
		?>
		
		<!--Blog carousel1 Area Start-->
		  <div class="zolo_portfolio_slider_area <?php echo $class;?>">
		  <div class="zolo_portfolio_carousel_row">
			<div data-post-number="<?php echo $portfoliocrslcolprw;?>" <?php echo array_to_data( $options_array ); ?>>
			  <?php
			  $i = 1;
			  if ($port_query->have_posts()) : while ($port_query->have_posts()) : $port_query->the_post();  ?>
			  <?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';  ?>
			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_portfoliobox" style="padding:<?php echo $classpad[0];?>px <?php echo $classpad[1];?>px <?php echo $classpad[2];?>px <?php echo $classpad[3];?>px;display:inline-block;">
				<div class="zolo_portfolio_box" style="background:<?php echo $portfoliocrslcolbg;?>; border-color:<?php echo $portfoliocrslcolbordep;?>; border-radius:<?php echo $portfoliocrslcolradi; ?>px;">
		
		
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'apcore_blogstyle_thumb'); ?>
				
			 <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
			
			 <!--Thumb Area Start-->
			 <div class="zolo_portfolio_thumb <?php echo $portfoliohovertype;?>">  
		<?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
			}?>
		
			   <img src="<?php echo $thumb_url ?>" />
			   
			<span class="overlay"></span>
			<div class="overlay_hover"></div>
			
		<?php //style2 Title
				if($style == 'style2' || $style == 'style3'){
				if($portfoliohovertype == 'hovertype_zoe'){ ?>
				<div class="zolo_portfolio_detail" style="background:<?php echo $portfoliocrslcolbg;?>;">
				<h2 class="zolo_portfolio_title entry-title" style="color:<?php echo $portfoliocrsltitlecolor;?>;font-size:<?php echo $portfoliocrsltitlesize; ?>px;">
				<a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;"><?php the_title(); ?></a>
				</h2>
				<span class="zolo_portfolio_date" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
				<?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
				<?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
				<?php } ?>
				</span>
				</div>
				<?php }
				}?>
		
		
			
		<div class="zolo_portfolio_caption">
		<!--Icons Area Start-->
		  
			   <span class="zolo_portfolio_icons">
			   <?php if($portfoliocrslzoomicon){ ?><a href="<?php echo $thumb_url; ?>" rel="prettyPhoto[pretty_photo_gallery]" ><span class="zolo_portfolio_icon portfolio_zoom_icon">
					<i class="<?php echo $portfoliocrslzoomicon;?>"></i>
					</span></a><?php }?>
			   <?php if($portfoliocrsllinkicon){ ?> <a href="<?php the_permalink(); ?>"><span class="zolo_portfolio_icon portfolio_link_icon">
					<i class="<?php echo $portfoliocrsllinkicon;?>"></i>
					</span></a><?php }?> </span> 
			 
		<!--Icons Area End-->
		
		<?php //style2 Title
			 if($style == 'style2' || $style == 'style3'){
				 if($portfoliohovertype != 'hovertype_zoe'){ ?>
			 <div class="zolo_portfolio_detail">
				<h2 class="zolo_portfolio_title entry-title" style="color:<?php echo $portfoliocrsltitlecolor;?>;font-size:<?php echo $portfoliocrsltitlesize; ?>px;">
					<a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;"><?php the_title(); ?></a>
				</h2>
				<span class="zolo_portfolio_date" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
					<?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
					<?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
					<?php } ?>
				</span>
				</div>
				 <?php }
			 }?> 
				 
				 </div>
					 </div>
			 <!--Thumb Area End-->
		
		
		<?php //style1 Title
			 if($style == 'style1'){ ?>
			<div class="zolo_portfolio_detail">
		
				<h2 class="zolo_portfolio_title entry-title" style="color:<?php echo $portfoliocrsltitlecolor;?>;font-size:<?php echo $portfoliocrsltitlesize; ?>px;">
					<a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;"><?php the_title(); ?></a>
				</h2>
				<span class="zolo_portfolio_date" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
					<?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
					<?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
					<?php } ?>
				</span>
			</div>
		 <?php } ?>
				  
				  </div>
			  </div>
			  <!--Blog Box Area End-->
			  <?php $i++;  endwhile; endif; ?>
			</div>
			</div>
			</div>
		
<?php 
// CSS
$shortcode_css = '';
if($box_swing == 'yes'){
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box:hover{ transform:translateY(-3px);-moz-transform:translateY(-3px);-webkit-transform:translateY(-3px);-ms-transform:translateY(-3px);-o-transform:translateY(-3px);}';
}
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box:hover{'.$box_shadow.'}';
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box a{color:'.$portfoliocrsltitlecolor.';}';
if($color_scheme == 'design_your_own'){
		
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb .overlay{background:'.$portfoliocrslimgoverlay.';}';
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb:hover .overlay{background:'.$portfoliocrsloverlayhovercolor.';}';
}else{
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb .overlay{ opacity:0;filter: alpha(opacity=0);}';
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb:hover .overlay{opacity:0.7;filter: alpha(opacity=80);'.$color_scheme_css.'}';
		
}
$shortcode_css .= '.zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_icons .zolo_portfolio_icon{background:'.$portfoliocrslbuttonbg.';}';
$shortcode_css .= '.zolocarousel'.$c.'  .zolo_portfolio_box .zolo_portfolio_icons .zolo_portfolio_icon:hover{background:'.$portfoliocrslbuttonhovbg.';}';
$shortcode_css .= '.zolocarousel'.$c.'.owl-carousel.square .owl-nav button,
		.zolocarousel'.$c.'.owl-carousel.round .owl-nav button{background:'.$portfoliocrslbuttonbg.';}';
$shortcode_css .= '.zolocarousel'.$c.'.owl-carousel.square .owl-nav button:hover,
		.zolocarousel'.$c.'.owl-carousel.round .owl-nav button:hover{background:'.$portfoliocrslbuttonhovbg.';}';
$shortcode_css .= '.zolo_carouselstyle1 zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb .overlay,
		.zolo_carouselstyle1 zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb img{border-top-left-radius:'.$portfoliocrslcolradi.'px;border-top-right-radius:'.$portfoliocrslcolradi.'px; overflow:hidden;}';
$shortcode_css .= '.zolo_carouselstyle2 zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb .overlay,
		.zolo_carouselstyle2 zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb img{border-radius:'.$portfoliocrslcolradi.'px;overflow:hidden;}';
$shortcode_css .= '.zolo_carouselstyle3 zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb .overlay,
		.zolo_carouselstyle3 zolocarousel'.$c.' .zolo_portfolio_box .zolo_portfolio_thumb img{border-radius:'.$portfoliocrslcolradi.'px;overflow:hidden;}';
apcore_save_plugin_dyn_styles( $shortcode_css );
?>		
		  
		<!--Blog carousel1 Area End-->
		<?php
			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Apress_Portfolio_Carousel_Module = new Apress_Portfolio_Carousel_Module;
}
