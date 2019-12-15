<?php

#Load blog posts

add_action('wp_ajax_get_blog_posts', 'get_blog_posts');

add_action('wp_ajax_nopriv_get_blog_posts', 'get_blog_posts');

if (!function_exists('get_blog_posts')) {

    function get_blog_posts()

    {

        $html_template = $_POST['html_template'];
		$style = $_POST['style'];
        $now_open_works = $_POST['now_open_works'];
        $works_per_load = $_POST['works_per_load'];
        $first_load = $_POST['first_load'];
		$layout_class = $_POST['layout_class'];
		$layoutstyle_class = $_POST['layoutstyle_class'];
		$blogstyle_thumb = $_POST['blogstyle_thumb'];
		
		$blgcrslcolprw = $_POST['blgcrslcolprw'];
		$blgcrslcolprw15 = $_POST['blgcrslcolprw15'];
		$blgcrslcolbg = $_POST['blgcrslcolbg'];
		$blgcrslcolbordep = $_POST['blgcrslcolbordep'];
		$blgcrslcolradi = $_POST['blgcrslcolradi'];
		$blgcrslcolpad = $_POST['blgcrslcolpad'];
		$blgcrsltitlesize = $_POST['blgcrsltitlesize'];
		$blgcrsltitlecolor = $_POST['blgcrsltitlecolor'];
		$blgstylemetacolor = $_POST['blgstylemetacolor'];
		$blgstylehovercolor = $_POST['blgstylehovercolor'];
		$blgcrslzoomicon = $_POST['blgcrslzoomicon'];
		$blgcrsllinkicon = $_POST['blgcrsllinkicon'];
		$blgshowfilter = $_POST['blgshowfilter'];
		$posttitleposition = $_POST['posttitleposition'];
		$posttitlealignment = $_POST['posttitlealignment'];
		$posttitleseparatorshowhide = $_POST['posttitleseparatorshowhide'];
		$titleseparatorimg = $_POST['titleseparatorimg'];
		$categoryposition = $_POST['categoryposition'];
		$categorydesign = $_POST['categorydesign'];
		$categorydesignimg = $_POST['categorydesignimg'];
		$continuereadingshowhide = $_POST['continuereadingshowhide'];
		$continuereadingmodify = $_POST['continuereadingmodify'];
		$socialsharingshowhide = $_POST['socialsharingshowhide'];
		$postdesign = $_POST['postdesign'];
		$postseparatorshowhide = $_POST['postseparatorshowhide'];
		$postseparatorimage = $_POST['postseparatorimage'];
		$titletoppadding = $_POST['titletoppadding'];
		$titlebottompadding = $_POST['titlebottompadding'];
		$postmetashowhide = $_POST['postmetashowhide'];
		$postcontentcolor = $_POST['postcontentcolor'];
		$excerptlength = $_POST['excerptlength'];
		$postdesign2 = $_POST['postdesign2'];
		$postmetashowhide2 = $_POST['postmetashowhide2'];
		$category_topmargin = $_POST['category_topmargin'];
		$fullheightpost = $_POST['fullheightpost'];
		$postcaptionwidth = $_POST['postcaptionwidth'];
		$postcaptionimg = $_POST['postcaptionimg'];
		$title_font_options = $_POST['title_font_options'];
		$title_google_fonts = $_POST['title_google_fonts'];
		$title_custom_fonts = $_POST['title_custom_fonts'];
		
		$data_animation = 'No Animation';
		if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
		$data_delay = '500';
		
		$category = ($_POST['category']!=="all" ? $_POST['category'] : '');

if( $now_open_works == 0 ){

	if ( get_query_var('paged') ) {
			$paged = get_query_var('paged'); 
		}elseif ( get_query_var('page') ) {
				$paged = get_query_var('page'); 
			}else{ 
				$paged = 1;
			}
		if ($category!=="all" && $category!=="") {
			query_posts('category_name='.$category.'&posts_per_page=1');
		}else{
			query_posts('posts_per_page=1');			 
		}	
	
	global $more,$post;
	$more = 0;


}else {

	$last_post = $now_open_works-1;
	
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page'); 
			} else { 
				$paged = 1; 
				}
	if ($category!=="all" && $category!=="") {
		query_posts('offset='.$last_post.'&category_name='.$category.'&posts_per_page=1');
	}else{
		query_posts('offset='.$last_post.'&posts_per_page=1');	
	}	
	
	global $more,$post;
	$more = 0;

}
?>
<?php	

global $post;
$blgcrslcolpad = explode(",",$blgcrslcolpad);
$blgcrslcolpad4 = explode(",",$blgcrslcolpad4);
// Typo
$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);

$wp_query = null;
$wp_query = new WP_Query();
$args = array(
	'post_type' => 'post',
	'order' => 'DESC',
	'offset' => $now_open_works,
	'posts_per_page' => $works_per_load,
	'post_status' => 'publish',
);
if ($category !== '' && $category !== "all") {
	$args['category_name']= $category;
}	   
$wp_query->query($args);

$i = 1;
while ($wp_query->have_posts()) : $wp_query->the_post();
 
if($blgshowfilter == 'yes'){
	$terms = get_the_terms( @$post->ID, 'category' );  

if ( $terms && ! is_wp_error( $terms ) ) :   
	$links = array();  

	foreach ( $terms as $term )   
	{  
		$links[] = $term->name;  
	}  
	$links = str_replace(' ', '-', $links);   
	$tax = join( " ", $links );       
else :    
	$tax = '';    
endif; 
}
            
if($blgshowfilter == 'yes'){$filterclasselector = strtolower($tax);}else{$filterclasselector='';}
	
if( $i % 4 == 0 )
	$class = 'last';
else
	$class = ''; 
?>
<?php 
// Custom Image Size
if($style == 'style_large' || $style == 'style12' || $style == 'style13'){
	$blog_thumb2 = 'apcore_blog_large';
	$default_image = '<img src="'.get_template_directory_uri().'/images/post_thumb/blog_large.jpg">';		
}elseif($style == 'style_medium' || $style == 'style_small' || $style == 'style15'){
	$blog_thumb2 = 'apcore_blog_medium';
	$default_image = '<img src="'.get_template_directory_uri().'/images/post_thumb/blog_medium.jpg">';
}else{
	$blog_thumb2 = '';
	$default_image ='';
}

if($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4'){?>
			  
			  <!--Blog Box Area Start-->
			  
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]; ?>px <?php echo $blgcrslcolpad[1]; ?>px <?php echo $blgcrslcolpad[2]; ?>px <?php echo $blgcrslcolpad[3]; ?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_box" style="background:<?php echo $blgcrslcolbg;?>; border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
				  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $blogstyle_thumb ); ?>
				  <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
				  
				  <!--Thumb Area Start-->
				  
				  <div class="zolo_blog_thumb">
					<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
						echo '<span class="zolo_zilla_likes_box"> ';
						zolo_zilla_likes();
						echo '</span>';
						}?>
					<?php if($style != 'style1'){ ?>
					<a href="<?php the_permalink(); ?>">
					<?php } ?>
					<img src="<?php echo $thumb_url ?>" /> <span class="overlay"></span> 
					<!--Style 1 Icons Area Start-->
					<?php if($style == 'style1'){ ?>
					<span class="zolo_blog_icons">
					<?php if($blgcrslzoomicon){ ?>
					<a href="<?php echo $thumb_url;?>" rel="prettyPhoto[pretty_photo_gallery]" >
                    <span class="zolo_blog_icon blog_zoom_icon"> <i class="<?php echo $blgcrslzoomicon;?>"></i> 
                    </span></a>
					<?php }?>
					<?php if($blgcrsllinkicon){ ?>
					<a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon"> <i class="<?php echo $blgcrsllinkicon;?>"></i> </span></a>
					<?php }?>
					</span>
					<?php }?>
					<!--Style 1 Icons Area End--> 
					
					<!--Style 3 Title Start-->
					<?php if($style == 'style3'){ ?>
					<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_title(); ?>
					  </a> </h2>
					<?php }?>
					<!--Style 3 Title End--> 
					
					<!--Style 4 Blog Detail Area Start-->
					<?php if($style == 'style4'){ ?>
					<div class="zolo_blog_detail">
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_time('j F Y') ?>
					  </span> </div>
					<?php }?>
					<!--Style 4 Blog Detail Area End-->
					<?php if($style != 'style1'){ ?>
					</a>
					<?php } ?>
				  </div>
				  
				  <!--Thumb Area End--> 
				  
				  <!--Style 1, 2 & 3 Blog Detail Area Start-->
				  <?php if($style != 'style4'){ ?>
				  <div class="zolo_blog_detail"> 
					
					<!--Style 1 & 2 Title Start-->
					<?php if($style == 'style1' || $style == 'style2'){ ?>
					<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_title(); ?>
					  </a> </h2>
					<?php } ?>
					<!--Style 1 & 2 Title End--> 
					
					<!--Style 1 Meta Tag Start-->
					<?php if($style == 'style1'){ ?>
					<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
					<?php the_time('F jS, Y') ?>
					</span>
					<?php } ?>
					<!--Style 1 Meta Tag End--> 
					
					<!--Style 2 Meta Tag Start-->
					<?php if($style == 'style2'){ ?>
					<span class="zolo_blog_date" style="color:<?php echo $blgstylemetacolor;?>;border-color:<?php echo $blgstylemetacolor;?>;"><span class="zolo_blog_day" style="border-color:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j') ?>
					</span><span class="zolo_blog_month_year"><span class="zolo_blog_month">
					<?php the_time('F') ?>
					</span><span class="zolo_blog_year">
					<?php the_time('Y') ?>
					</span></span></span>
					<?php } ?>
					<!--Style 2 Meta Tag End--> 
					<!--Style 2 Meta Tag Start-->
					<?php if($style == 'style3'){ ?>
					<span class="zolo_blog_author" style="color:<?php echo $blgstylemetacolor;?>;"><i class="fa fa-user"></i>
					<span class="vcard author post-author"><span class="fn"><?php the_author(); ?></span></span>
					</span> <span class="zolo_blog_date" style="color:<?php echo $blgstylemetacolor;?>;"> <i class="fa fa-calendar"></i>
					<?php the_time('j M Y') ?>
					</span>
					<?php } ?>
				  </div>
				  <?php } ?>
				  <!--Style 1 & 2 Blog Detail Area End--> 
				  
				</div>
			  </div>
			  <!--Blog Box Area End-->
			  
			  <?php }?>
			  <?php 
			if($style == 'style5' || $style == 'style6' || $style == 'style7'){?>
			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_blog_col zolo_blog_col2 <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_box"> <span class="zolo_blog_horizontal_box">
				  <div class="zolo_blog_thumb"> <a href="<?php the_permalink(); ?>">
					<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail($blogstyle_thumb);
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri(). '/assets/images/post_thumb/no_thumb.jpg" />';
			} ?>
					</a>
					<?php if($style == 'style5'){?>
					<span class="zolo_blog_date" style="background:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j M') ?>
					</span>
					<?php } ?>
				  </div>
				  <div class="zolo_blog_detail" style="border-color:<?php if($style == 'style6'){ echo $blgcrslcolbordep; }?>;">
					<?php if($style == 'style5' || $style == 'style7'){?>
					<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_title(); ?>
					  </a> </h2>
					<?php }?>
					<?php if($style == 'style7'){?>
					<span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j M Y') ?>
					</span>&nbsp; / &nbsp;<span class="add-comment"><a href="<?php the_permalink(); ?>#hello" style="color:<?php echo $blgstylemetacolor;?>;">
					<?php comments_number( '0 Comment' ); ?>
					</a></span>&nbsp; / &nbsp;
                    

					<?php //zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zilla_likes_box1"> ';
							zolo_zilla_likes();
							echo '&nbsp; / &nbsp;</span>';
						}?>
					<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgstylemetacolor;?>;"><?php echo esc_html__( 'Read More','apcore' );?></a> </span>
					<?php }?>
					<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolor;?>; border-color:<?php echo $blgcrslcolbordep;?>; background:<?php if($style == 'style6'){ echo $blgcrslcolbg; }?>;">
					  <?php if($style == 'style6'){?>
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <?php }?>
					  <?php //the_excerpt() ;?>
					  <?php if($style == 'style6'){
				$content = wp_trim_words( get_the_content(), 16, '' );
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
		}else{
				$content = wp_trim_words( get_the_content(), 20, '' );
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );
		}?>
					</div>
					<?php if($style == 'style5' || $style == 'style6'){?>
					<span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j M Y') ?>
					</span>&nbsp; / &nbsp;<span class="add-comment"><a href="<?php the_permalink(); ?>#hello" style="color:<?php echo $blgstylemetacolor;?>;">
					<?php comments_number( '0 Comment' ); ?>
					</a></span>&nbsp; / &nbsp;
						<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zilla_likes_box1"> ';
							zolo_zilla_likes();
							echo '&nbsp; / &nbsp;</span>';
						}?>
					<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgstylemetacolor;?>;"><?php echo esc_html__( 'Read More','apcore' );?></a> </span>
					<?php }?>
				  </div>
				  </span> </div>
			  </div>
			  <!--Blog Box Area End-->
			  
			  <?php }?>
			  <?php 
			if($style == 'style8'){?>
			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_box" style="border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
				  <div class="zolo_blog_thumb">
        <?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
			}?>
            
            <a href="<?php the_permalink(); ?>">
            <?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail($blogstyle_thumb);
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg" />';
			} ?>
					</a> </div>
				  <div class="zolo_blog_des_area" style="background:<?php echo $blgcrslcolbg;?>;">
					<div class="zolo_blog_detail" style="border-color:<?php echo $blgcrslcolbordep;?>;"><a href="<?php the_permalink(); ?>">
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>>
						<?php the_title(); ?>
					  </h2>
					  </a> <span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_time('j M Y') ?>
					  </span>&nbsp; | &nbsp;<span class="add-comment"><a style="color:<?php echo $blgcrsltitlecolor;?>;" href="<?php the_permalink(); ?>#hello" >
					  <?php comments_number( '0 Comment' ); ?>
					  </a></span> </span> </div>
					<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolor;?>;border-color:<?php echo $blgstylehovercolor;?>;">
					  <?php //the_excerpt() ;?>
					  <?php 
			$content = wp_trim_words( get_the_content(), 18, '' );
			echo  preg_replace( '/\[[^\]]+\]/', '', $content );
		?>
					</div>
				  </div>
				</div>
			  </div>
			  <!--Blog Box Area End-->
			  
			  <?php }?>
			  <?php if($style == 'style9'){?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" style="padding:0px 15px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;">
					<div class="zolo_blog_box">
					  <?php
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			
			$format_quote = has_post_format( 'quote' );
			$format_audio = has_post_format( 'audio' ); 
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true ); 	
			
			if($format_quote != 1){
			 if($posttitleposition == 'above'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php }?>
					  <?php
						if($format_audio != 1){
						echo '<div class="zolo_blog_thumb">';
						//zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
						echo '<span class="zolo_zilla_likes_box"> ';
						zolo_zilla_likes();
						echo '</span>';
						}
						if( apress_theme_number_of_featured_images() > 0 || $post_video ){
							echo '<div class="posttype_gallery_slider">';
							echo '<ul class="post_slickslider posttype_gallery">';
							if($post_video){
								echo '<li class="posttype_slide">';
								echo '<div class="zolo_fluid_video_wrapper"> '.$post_video.'</div>';
								echo '</li>';
							}							 
							if ( has_post_thumbnail() ) {
							$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blogstyle_thumb); 						
							echo '<li class="posttype_slide"> <img src="'.$attachment_image[0].'" alt="'.get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true).'"/></li>';
							}						
							$i = 2;
							while($i <= 5): 
							$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
							if($attachment_new_id){
							$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blogstyle_thumb);
							echo '<li class="posttype_slide"><img src="'.$attachment_image[0].'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" /> </li>';
							} $i++; 
							endwhile;
							echo '</ul>';
							echo '</div>';
						}else{						
							echo '<div class="posttype_gallery_slider">';	
							echo '<ul class="post_slickslider posttype_gallery">';				  
							echo '<li class="posttype_slide"><img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_medium.jpg" /></li>';
							echo  '</ul></div>';
						}?>
						</div>
						<?php }?>
					  <?php if($posttitleposition == 'below'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php }?>
					  <?php }?>
					  <div class="zolo_blog_description_area">
						<?php if($format_quote == 1){
							//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box"> ';
							zolo_zilla_likes();
							echo '</span>';
							}?>
						<a href="<?php the_permalink();?>">
						<?php the_content();?>
						</a>
						<?php }elseif($format_audio == 1){
					the_content();
				 }else{
					if($continuereadingshowhide == 'show'){
						$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
						$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );
					}else{
						$content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
					}
				}
						 if($format_quote != 1){if($socialsharingshowhide == 'show'){get_template_part('framework/social_sharing');}}?>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <?php }?>
			  <?php 	
				   
			if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small'){?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;">
					<div class="zolo_blog_box">
				<?php
				$img = wp_get_attachment_image_src($titleseparatorimg,'full');
				$titleseparatorimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($categorydesignimg,'full');
				$categorydesignimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($postseparatorimage,'full');
				$postseparatorimage1 = $img[0];
			
				$format_quote = has_post_format( 'quote' );
				$format_audio = has_post_format( 'audio' ); 
				
				$post_video = get_post_meta( get_the_ID(), 'zt_video', true ); 	 
					
				 if($format_quote != 1){
				 if($posttitleposition == 'above'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php }?>
					  
					  <?php //thumb image code start
						if($format_audio != 1){
						if( apress_theme_number_of_featured_images() > 0 || $post_video ){						
							echo '<div class="zolo_blog_thumb">';
							//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box">';
								zolo_zilla_likes();
								echo '</span>';
							}
								echo '<div class="posttype_gallery_slider">';
									echo '<ul class="post_slickslider posttype_gallery">';
									if($post_video){
										echo '<li class="posttype_slide">';
										echo '<div class="zolo_fluid_video_wrapper">'.$post_video.'</div>';
										echo '</li>';
									}
									if ( has_post_thumbnail() ) {
										$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2); 						
										echo '<li class="posttype_slide"> <img src="'.$attachment_image[0].'" alt="'.get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true).'"/></li>';
									}
									$i = 2;
									while($i <= 5): 
										$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
										if($attachment_new_id){
											$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_thumb2);
											echo '<li class="posttype_slide"><img src="'.$attachment_image[0].'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" /> </li>';
									} 
									$i++; 
									endwhile;
									echo '</ul>';
								echo '</div>';
							echo '</div>';
						}
						}?>
					  <?php if($posttitleposition == 'below'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php } ?>
					  <?php }?>
					  <div class="zolo_blog_description_area">
						<?php if($format_quote == 1){
						//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box">';
								zolo_zilla_likes();
								echo '</span>';
							}?>
						<a href="<?php the_permalink(); ?>">
						<?php the_content();?>
						</a>
						
						<?php }elseif($format_audio == 1){
							
						the_content();
						
						}else{ ?>
						<?php 
					if($continuereadingshowhide == 'show'){
						$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
						$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );		  
					}else{
						$content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
					}
					?>
						<?php }?>
						<?php if($format_quote != 1){if($socialsharingshowhide == 'show'){get_template_part('framework/social_sharing');}}?>
						<?php //echo wp_trim_words( get_the_content(), 18, '' ); ?>
					  </div>
					</div>
				  </div>
				</div>
				<?php if($postseparatorshowhide == 'show'){echo '<div class="post_separator"><img src="'.$postseparatorimage1.'"/></div>';} ?>
			  </div>
			  <?php }?>
			  <?php if($style == 'style10'){?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php
			
			$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			
			$format_quote = has_post_format( 'quote' );
			$format_audio = has_post_format( 'audio' ); 
				
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
			?>
				  <?php if($format_quote != 1){?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <?php if($posttitleseparatorshowhide == 'show'){
					 if($titleseparatorimg1){ 
						echo '<div class="post_title_separator"><img src="'.$titleseparatorimg1.'"></div>'; 
					 }
					// else{
						 //echo '<div class="post_title_separator"><img src="'.get_template_directory_uri().'/assets/images/post_thumb/blog_large.jpg"></div>';
						 //} 
					 
					 }?>
					  <div class="zolo_blog_description_area">
						<?php 
					 $content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );
					 ?>
					  </div>
					  <?php if( $postmetashowhide == 'show'){
				apcore_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 1, 1, 1, $categorydesign, $posttitlealignment, $categorydesignimg1 );
				}?>
					</div>
				  </div>
				  <?php }else{?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
					<div class="zolo_blog_box">
					  <div class="zolo_blog_description_area">
						<?php the_content();?>
					  </div>
					</div>
					</a> </div>
				  <?php }?>
				</div>
			  </div>
			  <?php } ?>
			  <?php  //Style 11
			 if($style == 'style11'){
				if($postseparatorshowhide == 'show'){
					$postseparator = 'postseparator_show';
				}else{$postseparator = '';}
				?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php
			$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$img = wp_get_attachment_image_src($postseparatorimage,'full');
			$postseparatorimage1 = $img[0];
			
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			 
			$format_quote = has_post_format( 'quote' );
			$format_audio = has_post_format( 'audio' ); 
			
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
			?>
				  <?php if($format_quote != 1){?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>>
						<?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
						<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <?php if($posttitleseparatorshowhide == 'show'){
					 if($titleseparatorimg1){?>
					  <div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
					  <?php } }?>
					  <div class="zolo_blog_description_area">
						<?php 
					 $content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );
					 ?>
					  </div>
					  <?php if( $postmetashowhide == 'show'){
					apcore_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 1, 1, 1, $categorydesign, $posttitlealignment, $categorydesignimg1 );
				}?>
					</div>
					<?php }else{?>
					<div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
					  <div class="zolo_blog_box">
						<div class="zolo_blog_description_area">
						  <?php the_content();?>
						</div>
					  </div>
					  </a> </div>
					<?php }?>
				  </div>
				</div>
				<?php if($postseparatorshowhide == 'show'){?>
				<div class="post_separator" style="padding-top:<?php echo $blgcrslcolpad[2];?>px;"><img src="<?php echo $postseparatorimage1; ?>"/></div>
				<?php }?>
			  </div>
			  <?php }?>
			  <?php //Style 12 & 13
		if($style == 'style12' || $style == 'style13'){
				if($postseparatorshowhide == 'show'){
					$postseparator = 'postseparator_show';
				}else{$postseparator = '';}
				?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php
			$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$img = wp_get_attachment_image_src($postseparatorimage,'full');
			$postseparatorimage1 = $img[0];
			
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			 
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
			$format_quote = has_post_format( 'quote' );
			?>
				  <?php if($format_quote != 1){?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <div class="zolo_blog_thumb">						
						<?php if( apress_theme_number_of_featured_images() > 0 || $post_video ){                        
                        echo '<div class="posttype_gallery_slider">';
                        //zolo_zilla_likes
                        if( function_exists('zolo_zilla_likes') ){ 
                        	echo '<span class="zolo_zilla_likes_box">';
                        	zolo_zilla_likes();
                        	echo '</span>';
                        }
                        echo '<ul class="post_slickslider posttype_gallery">';
                        if($post_video){ 
                        	echo '<li class="posttype_slide">';
                        	echo '<div class="zolo_fluid_video_wrapper">'.$post_video.'</div>';
                        	echo '</li>';
                        }
                        
                        if ( has_post_thumbnail() ) {
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2);                         
                        echo '<li class="posttype_slide"> <img src="'.$attachment_image[0].'" alt="'.get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true).'" /></li>';
                        }                       
                        $i = 2;
                        while($i <= 5): 
                        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                        if($attachment_new_id){
                        	$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_thumb2);
                        	echo '<li class="posttype_slide"><img src="'.$attachment_image[0].'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" /> </li>';
                        } 
						$i++; 
						endwhile;
                        echo '</ul>';
                        echo '</div>';                        
                        }?>
					  </div>
					  <div class="post_content_area">
					  <?php if( apress_theme_number_of_featured_images() > 0 || $post_video ){?>
						<div class="post_content_box" style="margin-top:-10%">
						<?php }else{?>
						<div class="post_content_box">
						<?php }?>
						  <div style="margin-top:<?php echo $category_topmargin;?>px;">
							<?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
							<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
							  <?php the_title(); ?>
							  </a> </h2>
							<?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
							<div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
							<?php } }?>
							<?php if($style == 'style12' && $postmetashowhide2 == 'show'){ apcore_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0); }?>
							<div class="zolo_blog_description_area">
							<?php 
							if($continuereadingshowhide == 'show'){
								$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
								$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
								echo  preg_replace( '/\[[^\]]+\]/', '', $content );
							}else{
								$content = wp_trim_words( get_the_content(), $excerptlength, '' );
								echo  preg_replace( '/\[[^\]]+\]/', '', $content );
							}
							?>
                            <?php if($style == 'style12'){ get_template_part('framework/social_sharing');}?>
							</div>
						  </div>
						</div>
					  </div>
					  <?php if($style == 'style13' && $postmetashowhide == 'show'){?>
					  <div class="blog_entry_footer">
						<?php apcore_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 0, 0, 1);?>
						<div class="social_sharing_icon_box"><span class="social_sharing_icon"><span><?php echo __('Share','apcore') ?></span> <i class="fa fa-share-alt"></i></span>
						  <?php get_template_part('framework/social_sharing');?>
						</div>
					  </div>
					  <?php }?>
					</div>
				  </div>
				  <?php }else{?>
				  
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> 
				  
					<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box">';
							zolo_zilla_likes();
							echo '</span>';
						}?>
						<a href="<?php the_permalink(); ?>">
					<div class="zolo_blog_box">
					  <div class="zolo_blog_description_area">
					   
						<?php the_content();?>
					  </div>
					</div>
					</a> </div>
				  <?php }?>
				  
				</div>
				<?php if($postseparatorshowhide == 'show'){?>
				<div class="post_separator" style="padding-top:<?php echo $blgcrslcolpad[2];?>px;"><img src="<?php echo $postseparatorimage1; ?>"/></div>
				<?php }?>
			  </div>
			  <?php }?>
			  <?php //Style 14
		 if($style == 'style14'){?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				<?php	
				$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				if($attachment_image[0]){
					$attachment_image_src = $attachment_image[0];
					}else{
						$attachment_image_src = get_template_directory_uri().'/assets/images/post_thumb/blog_large.jpg';
				}
				$img = wp_get_attachment_image_src($titleseparatorimg,'full');
				$titleseparatorimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($categorydesignimg,'full');
				$categorydesignimg1 = $img[0];
				
				$postcaptionbgimg = wp_get_attachment_image_src($postcaptionimg,'full');
				$postcaptionbgurl = $postcaptionbgimg[0];
				?>
				  <div class="zolo_blogcontent_bg <?php echo $fullheightpost;?>" style=" width:100%; float:left;color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background-image:url('<?php echo $attachment_image_src; ?>'); background-position:center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover;">
					<div class="zolo_blog_box"> <span class="overlay"></span> 
					  <!--Start-->
					  
					  <div class="post_content_area" style="max-width:<?php echo $postcaptionwidth; ?>px">
						<div class="post_content_box" style=" background:url('<?php echo $postcaptionbgurl; ?>') center center no-repeat;-moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover;">
						  <?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
						  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
							<?php the_title(); ?>
							</a> </h2>
						  <?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
						  <div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
						  <?php } }?>
						  <?php  if( $postmetashowhide == 'show'){ apcore_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0); } ?>
						  <div class="zolo_blog_style14_description">
							<?php 
				if($continuereadingshowhide == 'show'){
					$continuereadingmodifytext = '<span class="read_more_area" style="text-align:'.$posttitlealignment.';"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
					$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
					echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				}else{
					$content = wp_trim_words( get_the_content(), $excerptlength, '' );
					echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				}
				?>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <?php }?>
			  <?php //Style 15
		 if($style == 'style15'){?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw15;?> <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php	
				$img = wp_get_attachment_image_src($titleseparatorimg,'full');
				$titleseparatorimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($categorydesignimg,'full');
				$categorydesignimg1 = $img[0];
				?>
				  <div class="zolo_blogcontent_bg" style=" width:100%; float:left;color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <div class="zolo_blogcontent">
						<div class="post_content_area">
						  <div class="post_thumbnail">
							<?php //zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box">';
								zolo_zilla_likes();
								echo '</span>';
							}?>
							<?php  
							if ( has_post_thumbnail() ) {
							$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2);
								echo '<img src="'.$attachment_image[0].'"/>';
							}?>
						  </div>
						  <div class="post_content_wrapper">
							<div class="post_content_box">
							  <?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
							  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
								<?php the_title(); ?>
								</a> </h2>
							  <?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
							  <div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
							  <?php } }?>
							  <div class="zolo_blog_style15_description">
								<?php 
								if($continuereadingshowhide == 'show'){
									$continuereadingmodifytext = '<span class="read_more_area" style="text-align:'.$posttitlealignment.';"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
									}else{
										$continuereadingmodifytext = '';
									 }
					 
								//$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
								//echo  preg_replace( '/\[[^\]]+\]/', '', $content );
								
								$content = wp_trim_words( get_the_content(), $excerptlength, '');
								echo  '<span class="zolo_blog_description_text">'.preg_replace( '/\[[^\]]+\]/', '', $content ).'</span>'.$continuereadingmodifytext;
								?>
							  </div>
							  <?php  if( $postmetashowhide == 'show'){ apcore_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0, $posttitlealignment); }?>
							</div>
						  </div>
						</div>
					  </div>

					</div>
				  </div>
				</div>
			  </div>
			  <?php }?>

<?php
#END Masonry
$now_open_works = 1;


$i++;
endwhile;

?>
<?php
        die();

    }

}


#Load Portfolio Posts

add_action('wp_ajax_get_portfolio_posts', 'get_portfolio_posts');

add_action('wp_ajax_nopriv_get_portfolio_posts', 'get_portfolio_posts');

if (!function_exists('get_portfolio_posts')) {

    function get_portfolio_posts()

    {
		
		$html_template = $_POST['html_template'];
		$style = $_POST['style'];
		$layout_class = $_POST['layout_class'];
		$layoutstyle_class = $_POST['layoutstyle_class'];
		$category = ($_POST['category']!=="all" ? $_POST['category'] : '');
		$now_open_works = $_POST['now_open_works'];
		$works_per_load = $_POST['works_per_load'];				
		$first_load = $_POST['first_load'];
		$layoutstyle = $_POST['layoutstyle'];
		$layoutstyle2 = $_POST['layoutstyle2'];
		$portfoliohovertype = $_POST['portfoliohovertype'];
		$portfoliohovertype_opt2 = $_POST['portfoliohovertype_opt2'];
		$content_alignment = $_POST['content_alignment'];
		$captionbg = $_POST['captionbg'];
		$portfoliocrslcolprw = $_POST['portfoliocrslcolprw'];		
		$portfoliocrslcolbg = $_POST['portfoliocrslcolbg'];		
		$portfoliocrslcolbordep = $_POST['portfoliocrslcolbordep'];		
		$portfoliocrslcolradi = $_POST['portfoliocrslcolradi'];		
		$portfoliocrslcolpad = $_POST['portfoliocrslcolpad'];		
		$portfoliocrslcolpad2 = $_POST['portfoliocrslcolpad2'];	
		$portfolio_packery_gutter = $_POST['portfolio_packery_gutter'];	
		$portfoliocrsltitlesize = $_POST['portfoliocrsltitlesize'];		
		$portfoliocrsltitlecolor = $_POST['portfoliocrsltitlecolor'];		
		$portfoliocrslimgoverlay = $_POST['portfoliocrslimgoverlay'];			
		$portfoliocrsloverlayhovercolor = $_POST['portfoliocrsloverlayhovercolor'];					
		$portfoliocrslzoomicon = $_POST['portfoliocrslzoomicon'];
		$portfoliocrsllinkicon = $_POST['portfoliocrsllinkicon'];
		$portfoliocrslbuttonbg = $_POST['portfoliocrslbuttonbg'];	
		$portfoliofilter = $_POST['portfoliofilter'];
		
		$title_font_options = $_POST['title_font_options'];
		$title_google_fonts = $_POST['title_google_fonts'];
		$title_custom_fonts = $_POST['title_custom_fonts'];
		$description_font_options = $_POST['description_font_options'];
		$description_google_fonts = $_POST['description_google_fonts'];
		$description_custom_fonts = $_POST['description_custom_fonts'];
		$categories_font_options = $_POST['categories_font_options'];
		$categories_google_fonts = $_POST['categories_google_fonts'];
		$categories_custom_fonts = $_POST['categories_custom_fonts'];
		
		$data_animation = 'No Animation';
		if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
		$data_delay = '500';
		
		?>
		
	    <?php	
		global $post;
        $temp = (isset($wp_query) ? $wp_query : '');
        $wp_query = null;
        $wp_query = new WP_Query();
        $args = array(
            'post_type' => 'zt_portfolio',
        	'post_status' => 'publish',
            'offset' => $now_open_works,
            'posts_per_page' => $works_per_load,
        );

        if ($category !== '' && $category !== "all") {
            $args['tax_query']=array(
                array(
                    'taxonomy' => 'catportfolio',
                    'field' => 'slug',
                    'terms' => $category
                )
            );
        }


        $wp_query->query($args);
?>
<?php	

global $post;
$portfoliocrslcolpad = explode(",",$portfoliocrslcolpad);
$portfoliocrslcolpad2 = explode(",",$portfoliocrslcolpad2);

// Typo
$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
$categories_options = _zolo_parse_text_shortcode_params($categories_font_options, '', $categories_google_fonts, $categories_custom_fonts);
$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);


$i = 1;
while ($wp_query->have_posts()) : $wp_query->the_post();
 
if($portfoliofilter == 'yes'){
	$terms = get_the_terms( @$post->ID, 'catportfolio' );  

if ( $terms && ! is_wp_error( $terms ) ) :   
	$links = array();  

	foreach ( $terms as $term )   
	{  
		$links[] = $term->name;  
	}  
	$links = str_replace(' ', '-', $links);   
	$tax = join( " ", $links );       
else :    
	$tax = '';    
endif; 
}
            
if($portfoliofilter == 'yes'){$filterclasselector = strtolower($tax);}else{$filterclasselector='';}
	

      if( $i % 4 == 0 )
        $class = 'last';
        else
        $class = '';  ?>
    
    <!--Blog Box Area Start-->
    
    <?php if($style == 'style1'){
		$packery_thumbnail_class = '';		
		// portfoliostyle_thumb Size
		if($layoutstyle == 'grid'){

		$portfoliostyle_thumb = 'apcore_blogstyle_thumb';
		}else if($layoutstyle == 'grid_retangular'){
			$portfoliostyle_thumb = 'apcore_blog_medium';
		
		}else if($layoutstyle == 'masonry'){

		$portfoliostyle_thumb = 'full';
		
		}
		
	}elseif($style == 'style2' || $style == 'style3' || $style == 'style5'){
	
	 //Layout Style
		$packery_layout_thumbnail = get_post_meta( $post->ID, 'zt_packery_layout_thumbnail', true ); 	
		$packery_thumbnail_class = '';	
		if($layoutstyle2 == 'grid'){	
			$portfoliostyle_thumb = 'apcore_blogstyle_thumb';	
		}else if($layoutstyle2 == 'grid_retangular'){
			$portfoliostyle_thumb = 'apcore_blog_medium';		
		}else if($layoutstyle2 == 'masonry'){	
			$portfoliostyle_thumb = 'full';			
		}else if($layoutstyle2 == 'packery'){			
			if($packery_layout_thumbnail == 'portfolio_small_squared'){				
				$portfoliostyle_thumb = 'apcore_shortcode_portfolio_small_squared';
				$packery_thumbnail_class = 'packery_portfolio_squared_small';				
			}else if($packery_layout_thumbnail == 'portfolio_squared'){				
				$portfoliostyle_thumb = 'apcore_shortcode_portfolio_squared';
				$packery_thumbnail_class = 'packery_portfolio_squared_big';				
			}else if($packery_layout_thumbnail == 'portfolio_landscape'){				
				$portfoliostyle_thumb = 'apcore_shortcode_portfolio_landscape';
				$packery_thumbnail_class = 'packery_portfolio_landscape';			
			}else if($packery_layout_thumbnail == 'portfolio_portrait'){				
				$portfoliostyle_thumb = 'apcore_shortcode_portfolio_portrait';
				$packery_thumbnail_class = 'packery_portfolio_portrait';			
			}			
		}
		
	}
	
	?>
	<?php if($style == 'style2' || $style == 'style3' || $style == 'style5'){
    
    if($layoutstyle2 == 'packery'){
        $portfolio_col_padding = $portfolio_packery_gutter.'px';
    }else{
        $portfolio_col_padding = $portfoliocrslcolpad2[0].'px '.$portfoliocrslcolpad2[1].'px '.$portfoliocrslcolpad2[2].'px '.$portfoliocrslcolpad2[3].'px';
        }
    
    }else{
        $portfolio_col_padding = $portfoliocrslcolpad[0].'px '.$portfoliocrslcolpad[1].'px '.$portfoliocrslcolpad[2].'px '.$portfoliocrslcolpad[3].'px';
    
    }?>
    
    <?php if($style == 'style1' || $style == 'style2'){ ?>
      	<div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>; border-color:<?php echo $portfoliocrslcolbordep;?>; border-radius:<?php echo $portfoliocrslcolradi; ?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
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
            <img src="<?php echo $thumb_url ?>" /> <span class="overlay"></span>
            <div class="overlay_hover"></div>
            <?php //style2 Title
				if($style == 'style2'){
				if($portfoliohovertype == 'hovertype_zoe'){ ?>
            <div class="zolo_portfolio_detail" style="background:<?php echo $portfoliocrslcolbg;?>;">
              <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
                <?php the_title(); ?>
                </a> </h2>
              <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
              <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
              <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
              <?php } ?>
              </span> </div>
            <?php }
				}?>
            <div class="zolo_portfolio_caption"> 
              <!--Icons Area Start--> 
              
              <span class="zolo_portfolio_icons">
              <?php if($portfoliocrslzoomicon){ ?>
              <a href="<?php echo $thumb_url; ?>" rel="prettyPhoto[pretty_photo_gallery]" ><span class="zolo_portfolio_icon portfolio_zoom_icon"> <i class="<?php echo $portfoliocrslzoomicon;?>"></i> </span></a>
              <?php }?>
              <?php if($portfoliocrsllinkicon){ ?>
              <a href="<?php the_permalink(); ?>"><span class="zolo_portfolio_icon portfolio_link_icon"> <i class="<?php echo $portfoliocrsllinkicon;?>"></i> </span></a>
              <?php }?>
              </span> 
              
              <!--Icons Area End-->
              
              <?php //style2 Title
			 if($style == 'style2'){
				 if($portfoliohovertype != 'hovertype_zoe'){ ?>
              <div class="zolo_portfolio_detail">
                <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
                  <?php the_title(); ?>
                  </a> </h2>
                <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
                <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
                <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
                <?php } ?>
                </span> </div>
              <?php } }?>
            </div>
          </div>
          <!--Thumb Area End-->
          
          <?php //style1 Title
			 if($style == 'style1'){ ?>
          <div class="zolo_portfolio_detail">
            <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">
              <?php the_title(); ?>
              </a> </h2>
            <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
            <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
            <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
            <?php } ?>
            </span> </div>
          <?php } ?>
        </div>
      </div>
      
      
      <?php //Portfolio Style 3
	  }else if($style == 'style3'){?>
      	<div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb hovertype_fade">
            <img src="<?php echo $thumb_url ?>" /> 
           
          <span class="overlay"></span>
            <div class="overlay_hover"></div>
            
            <div class="zolo_portfolio_caption"> 
              <div class="zolo_portfolio_detail">
                <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>><a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">  <?php the_title(); ?></a></h2>
                <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
            <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
            <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
            <?php } ?>
            </span>
                 </div>
            </div>
            
          </div>
          <!--Thumb Area End-->
          
        </div>
      </div>
      
      
      <?php //Portfolio Style 4
	  }else if($style == 'style4'){?>
      	<div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>; border-color:<?php echo $portfoliocrslcolbordep;?>;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb">
           <a href="<?php the_permalink(); ?>"> <img src="<?php echo $thumb_url ?>" /> 
          <span class="overlay"></span></a>
          </div>
          <!--Thumb Area End-->
          <div class="zolo_portfolio_detail">
            <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">  <?php the_title(); ?></a></h2>
			<?php 
				$cur_id = apress_theme_current_page_id();
				$portfolio_details = get_post_meta( $cur_id , 'zt_portfolio_details', true );
                  if($portfolio_details){
					  echo '<div class="zolo_portfolio_dsc" ' .$description_options['style']. '>';
                        $content = $portfolio_details;
                        $content = apply_filters('the_content', wp_trim_words( $content, 12, '' ));
                        echo $content.'</div>';
                      }?>
             </div>
        </div>
      </div>
      
      <?php //Portfolio Style 5
	  }else if($style == 'style5' || $style == 'style6'){?>
      
      	<div class="zolo_portfolio_col zolo_portfolio_col<?php echo $portfoliocrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector.' '.$packery_thumbnail_class;?> " style="padding:<?php echo $portfolio_col_padding;?>;" >
        <div class="zolo_portfolio_box <?php echo $animatedclass;?>" style="background:<?php echo $portfoliocrslcolbg;?>;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $portfoliostyle_thumb ); ?>
          <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
          
          <!--Thumb Area Start-->
          <div class="zolo_portfolio_thumb <?php echo $portfoliohovertype_opt2;?>">
            <img src="<?php echo $thumb_url ?>" /> 
           
            <div class="zolo_portfolio_caption" style=" background:<?php echo $captionbg;?>"> 
              <div class="zolo_portfolio_detail" style="text-align:<?php echo $content_alignment;?>;">
                <h2 class="zolo_portfolio_title entry-title" <?php echo $title_options['style']?>><a href="<?php the_permalink(); ?>" style="color:<?php echo $portfoliocrsltitlecolor;?>;">  <?php the_title(); ?></a></h2>
                <span class="zolo_portfolio_date" <?php echo $categories_options['style']?>>
            <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
            <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
            <?php } ?>
            </span>
                 </div>
            </div>
            
            <a href="<?php the_permalink(); ?>" class="zolo_portfolio_link"></a>
          </div>
          <!--Thumb Area End-->
          
        </div>
      </div>
      
      <?php }?>

<?php
#END Masonry
$now_open_works = 1;

$i++;
endwhile;

?>
<?php
        die();

    }

}





