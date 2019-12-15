<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $apress_data, $post;
$post_title_position = isset($apress_data['post_title_position']) ? $apress_data['post_title_position'] : 'above';
$post_title_alignment = isset($apress_data['post_title_alignment']) ? $apress_data['post_title_alignment'] : 'left';

$post_separator_show_hide = isset($apress_data['post_separator_show_hide']) ? $apress_data['post_separator_show_hide'] : 'hide';
$single_post_title_position = isset($apress_data['single_post_title_position']) ? $apress_data['single_post_title_position'] : 'title_position_middle';	

$panel_post_meta = get_post_meta( $post->ID , 'zt_post_meta', true );
$adminpanel_post_meta = isset($apress_data["post_meta"]) ? $apress_data["post_meta"] : 'on';

$featured_images_single = isset($apress_data["featured_images_single"]) ? $apress_data["featured_images_single"] : 'on';
$social_sharing_box = isset($apress_data["social_sharing_box"]) ? $apress_data["social_sharing_box"] : 'off';
$sharing_social_tagline = isset($apress_data["sharing_social_tagline"]) ? $apress_data["sharing_social_tagline"] : esc_html__( 'Share This Story, Choose Your Platform!', 'apress' );
$related_posts = isset($apress_data["related_posts"]) ? $apress_data["related_posts"] : 'on';
$blog_comments = isset($apress_data["blog_comments"]) ? $apress_data["blog_comments"] : 'on';

$show_hide_sharing = get_post_meta($post->ID, 'zt_share_box', true );
$show_hide_related_posts = get_post_meta($post->ID, 'zt_related_posts', true);
$show_hide_post_comments = get_post_meta($post->ID, 'zt_post_comments', true );

$show_hide_post_pagination = get_post_meta( $post->ID , 'zt_post_pagination', true );
if($show_hide_post_pagination == 'yes'){
	$post_navigation_style = get_post_meta( $post->ID , 'zt_navigation_style', true );
}else{
	$post_navigation_style = isset($apress_data['post_navigation_style']) ? $apress_data['post_navigation_style'] : 'style1';
}
$blog_pn_nav = isset($apress_data["blog_pn_nav"]) ? $apress_data["blog_pn_nav"] : 'on';

$show_hide_featured = get_post_meta($post->ID, 'zt_show_hide_featured', true ); 
$post_video = get_post_meta($post->ID, 'zt_video', true );

$format_quote = has_post_format( 'quote' );
$format_audio = has_post_format( 'audio' ); 
			
// Post Meta
if($panel_post_meta == 'default'){			
	if($adminpanel_post_meta == 'on'){
			$post_meta = true;
		}else{
			$post_meta = false;
		}
			  
}elseif($panel_post_meta == 'yes' || $panel_post_meta == 'no'){
	 if($panel_post_meta == 'yes'){
			$post_meta = true;
		 }else{
			 $post_meta = false;
			 }
	}else{
			$post_meta = true;
		}	
		
if( apress_theme_number_of_featured_images() > 0 || $post_video ){
	$posthasno_thumb = 'posthas_thumb';
}else{
	$posthasno_thumb = 'posthas_no_thumb';
	}


//Testimonials Start
$testimonial_social_sharing_box = isset($apress_data["testimonial_social_sharing_box"]) ? $apress_data["testimonial_social_sharing_box"] : 'on';
$testimonial_pn_nav = isset($apress_data["testimonial_pn_nav"]) ? $apress_data["testimonial_pn_nav"] : 'on';
$testimonial_post_pagination = get_post_meta($post->ID, 'zt_post_pagination', true );

if($testimonial_post_pagination == '' || $testimonial_post_pagination == 'default'){
	if($testimonial_pn_nav == 'on'){
		$testimonial_pagination = true;
	}else{
		$testimonial_pagination = false;
	}
}elseif($testimonial_post_pagination == 'yes') {
	$testimonial_pagination = true;
}else{
	$testimonial_pagination = false;
}

$testimonial_single_page_style_admin = isset($apress_data["testimonial_single_page_style"]) ? $apress_data["testimonial_single_page_style"] : 'testimonial_layout_style_1';
$testimonial_single_page_style_page = get_post_meta($post->ID, 'zt_testimonial_single_page_style', true ); 

if($testimonial_single_page_style_page == '' || $testimonial_single_page_style_page == 'default'){
	$testimonial_singlepage_style = $testimonial_single_page_style_admin;
}else{
	$testimonial_singlepage_style = $testimonial_single_page_style_page;
}


//Team Start
$team_social_sharing_box = isset($apress_data["team_social_sharing_box"]) ? $apress_data["team_social_sharing_box"] : 'on';

$team_single_page_style_admin = isset($apress_data["team_single_page_style"]) ? $apress_data["team_single_page_style"] : 'team_layout_style_1';
$team_single_page_style_page = get_post_meta($post->ID, 'zt_team_single_page_style', true ); 

if($team_single_page_style_page == '' || $team_single_page_style_page == 'default'){
	$team_singlepage_style = $team_single_page_style_admin;
}else{
	$team_singlepage_style = $team_single_page_style_page;
}

$team_pn_nav = isset($apress_data["team_pn_nav"]) ? $apress_data["team_pn_nav"] : 'on';
$team_post_pagination = get_post_meta($post->ID, 'zt_team_pagination', true );

if($team_post_pagination == '' || $team_post_pagination == 'default'){
	if($team_pn_nav == 'on'){
		$team_pagination = true;
	}else{
		$team_pagination = false;
	}
}elseif($team_post_pagination == 'yes') {
	$team_pagination = true;
}else{
	$team_pagination = false;
}
$team_related_posts = isset($apress_data["team_related_posts"]) ? $apress_data["team_related_posts"] : 'off';