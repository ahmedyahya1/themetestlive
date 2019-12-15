<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog shortcode
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
	extract(shortcode_atts(array(
		'style'									=> 'style1',
		'category'								=> '',
		'num' 									=> '5',
		'gutter'								=> '30',
		'excerptlength'							=> '20',
		'border_radius'							=> '0',
		'post_list_border'						=> '#eeeeee',
		'button_show_hide'						=> 'show',
		'button_modify'							=> 'Read More',
		'button_style'							=> 'style1',
		'button_shape'							=> 'round',
		'button_font_color'						=> '',
		'button_hover_font_color'				=> '',
		'button_bg_color'						=> '#93cb40',
		'button_hover_bg_color'					=> '#93cb40',
		
		'title_font_options'					=> '',
		'title_google_fonts'					=> '',
		'title_custom_fonts'					=> '',
		'title_color'							=> '#333333',
		'title_hover_color'						=> '#93cb40',
		'description_font_options'				=> '',
		'description_google_fonts'				=> '',
		'description_custom_fonts'				=> '',
		'button_font_options'					=> '',
		'button_google_fonts'					=> '',
		'button_custom_fonts'					=> '',
		'meta_font_options'						=> '',
		'meta_google_fonts'						=> '',
		'meta_custom_fonts'						=> '',
		'meta_color'							=> '#999999',
		'meta_hover_color'						=> '#93cb40',
		
		'class'									=> '',
		'data_animation'						=> 'No Animation',
		'data_delay'							=> '500',
			
	), $atts));
	ob_start();
	
	//Animation
	if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}

	$uniqid = uniqid(rand());
	$acp_uniqid = 'acp_'.$uniqid;
	
	// Typo
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
	$button_options = _zolo_parse_text_shortcode_params($button_font_options, '', $button_google_fonts, $button_custom_fonts);
	$meta_options = _zolo_parse_text_shortcode_params($meta_font_options, '', $meta_google_fonts, $meta_custom_fonts);


		
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
		?>

<div id="<?php echo $acp_uniqid?>" class="apress_post_grid_wrap <?php echo $class.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <div class="apress_post_grid_area">
    <ul class="apress_post_grid_list" style="margin:0 <?php echo '-'.$gutter;?>px;">
      <?php $i = 1;
		while (have_posts()) : the_post(); 
		
		if( $i % 25 == 1 || 1 == $i ){
			$class = 'big_box';
		}else{
			$class = '';
		}
		?>
      <li class="<?php echo $class;?>" style="padding:0 <?php echo $gutter;?>px;">
        <div class="apress_post_grid_box">
          <div class="apress_post_grid_thumbnail">
            <div class="apress_post_grid_thumbnail_box">
              <?php if($class){
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('apcore_shortcode_portfolio_landscape');
			}
		}else{
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail');
			}
		}?>
            </div>
          </div>
          <div class="apress_post_grid_info"> <?php echo '<'.$title_options['tag'].' class="apress_post_grid_title entry-title" '.$title_options['style'].'>';?> <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
            </a> <?php echo '</'.$title_options['tag'].'>';?>
            <div class="apress_post_grid_meta" <?php echo $meta_options['style'];?>> <span><span class="icon-basic-chronometer"></span>
              <?php the_time('j F Y') ?>
              </span>
              <?php if($class){?>
              <span> <span class="icon icon-basic-folder-multiple"></span> <?php echo get_the_term_list(get_the_ID(), 'category', '', ' ', '');?></span>
              <?php }?>
            </div>
            <?php if($class){?>
            <div class="apress_post_grid_content" <?php echo $description_options['style'];?>>
              <?php 
		// Content
		if($button_show_hide == 'show'){
			if($button_style == 'style1'){$buttonshape = $button_shape;}else{ $buttonshape = '';}
			$button_modify_text = '<span class="apress_post_grid_button"><a class="apress_post_grid_read_more '.$button_style.' '.$buttonshape.'" href="'. get_permalink($post->ID) . '" '.$button_options['style'].'> '.$button_modify.' <span class="zolo_arrow"><i class="fa fa-angle-right"></i></span></a></span>';
			$content = wp_trim_words( get_the_content(), $excerptlength, $button_modify_text );
			echo  preg_replace( '/\[[^\]]+\]/', '', $content );
		}else{
			$content = wp_trim_words( get_the_content(), $excerptlength, '' );
			echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
		}?>
            </div>
            <?php }?>
          </div>
        </div>
      </li>
      <?php $i++; endwhile;wp_reset_query();?>
    </ul>
  </div>
</div>
<?php
$custom_css = '';
$custom_css .= '#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_box{ border-color:'.$post_list_border.';}';
$custom_css .= '#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_title a{color:'.$title_color.';}';
$custom_css .= '#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_box:hover .apress_post_grid_title a{color:'.$title_hover_color.';}';
$custom_css .= '#'.$acp_uniqid.' .apress_post_grid_read_more{color:'.$button_font_color.';}';
$custom_css .= '#'.$acp_uniqid.' .apress_post_grid_button .zolo_arrow .fa-angle-right,#'.$acp_uniqid.' .apress_post_grid_read_more:hover{color:'.$button_hover_font_color.';}';
$custom_css .= '#'.$acp_uniqid.' .apress_post_grid_read_more.style1{ background:'.$button_bg_color.';}';
$custom_css .= '#'.$acp_uniqid.' .apress_post_grid_read_more.style1:hover{ background:'.$button_hover_bg_color.';}';
$custom_css .= '#'.$acp_uniqid.' .apress_post_grid_button .zolo_arrow .fa-angle-right:after{ background:'.$button_hover_font_color.';}';
$custom_css .= '#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_meta a,#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_meta{color:'.$meta_color.';}';
$custom_css .= '#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_meta a:hover{color:'.$meta_hover_color.';}';
$custom_css .= '#'.$acp_uniqid.'.apress_post_grid_wrap .apress_post_grid_list li .apress_post_grid_thumbnail{ border-radius:'.$border_radius.'px;}';
apcore_save_plugin_dyn_styles( $custom_css );
