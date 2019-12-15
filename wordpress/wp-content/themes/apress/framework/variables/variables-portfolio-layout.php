<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $apress_data, $post;
$cur_id = apress_theme_current_page_id();


// Single zt portfolio

//Portfolio Layout Details
$portfolio_title = get_post_meta( $cur_id , 'zt_portfolio_title', true );
$portfolio_details = get_post_meta( $cur_id , 'zt_portfolio_details', true );
$portfolio_descriptions = get_post_meta( $cur_id , 'zt_show_portfolio_details', true );
$portfolio_website_url = get_post_meta( $cur_id , 'zt_portfolio_website_url', true );
$portfolio_website_url_text = get_post_meta( $cur_id , 'zt_portfolio_website_url_text', true );
$portfolio_client_name = get_post_meta( $cur_id , 'zt_portfolio_client_name', true );
$portfolio_skills = get_post_meta( $cur_id , 'zt_portfolio_skills', true );
$portfolio_duration = get_post_meta( $cur_id , 'zt_portfolio_duration', true );
$link_icon_target = get_post_meta( $cur_id , 'zt_link_icon_target', true );
$show_contentarea_details = get_post_meta( $cur_id , 'zt_show_contentarea_details', true );	

//Portfolio Video
$single_post_video = get_post_meta( $cur_id, 'zt_video', true );

$single_portfolio_layout = get_post_meta( $cur_id , 'zt_choose_portfolio_layout', true );
$portfolio_gallery_layout = get_post_meta( $cur_id , 'zt_portfolio_gallery_layout', true );

$show_hide_portfolio_featured = get_post_meta( $cur_id, 'zt_show_hide_portfolio_featured', true );
$portfolio_featured_images = isset($apress_data["portfolio_featured_images"]) ? $apress_data["portfolio_featured_images"] : 'on';


$admin_portfolio_layout = isset($apress_data["choose_portfolio_layout"]) ? $apress_data["choose_portfolio_layout"] : 'layout_style1';
$portfolio_navigation_style = isset($apress_data['portfolio_navigation_style'])  ? $apress_data['portfolio_navigation_style'] : 'style1';
$portfolio_author = isset($apress_data['portfolio_author']) ? $apress_data['portfolio_author'] : 'off';
$portfolio_gallery_gutter_admin = !empty($apress_data["portfolio_gallery_gutter"]) ? $apress_data["portfolio_gallery_gutter"] : 0;
$portfolio_gallery_gutter_page = get_post_meta( $cur_id, 'zt_portfolio_gallery_gutter', true );
if($portfolio_gallery_gutter_page == ''){
$portfolio_gallery_gutter = $portfolio_gallery_gutter_admin;
}else{
$portfolio_gallery_gutter = $portfolio_gallery_gutter_page;
}

$to_portfolio_social_sharing_box = isset($apress_data['portfolio_social_sharing_box']) ? $apress_data['portfolio_social_sharing_box'] : 'on';
$po_portfolio_social_sharing_box = get_post_meta($cur_id, 'zt_share_box', true );

$to_portfolio_related_posts = isset($apress_data['portfolio_related_posts']) ? $apress_data['portfolio_related_posts'] : 'on';
$po_portfolio_related_posts = get_post_meta($cur_id, 'zt_related_posts', true );

$to_zt_portfolio_nav = isset($apress_data['zt_portfolio_nav']) ? $apress_data['zt_portfolio_nav'] : 'off';
$po_zt_post_pagination = get_post_meta( $cur_id , 'zt_post_pagination', true );

if($single_portfolio_layout=='default' || $single_portfolio_layout==''){
	$portfolio_layout_parent_class = 'portfolio_'.$admin_portfolio_layout;
	$portfolio_layout_style = $admin_portfolio_layout;
}else{
	$portfolio_layout_parent_class = 'portfolio_'.$single_portfolio_layout;
	$portfolio_layout_style = $single_portfolio_layout;
}

$sharing_social_tagline = isset($apress_data["sharing_social_tagline"]) ? $apress_data["sharing_social_tagline"] : esc_html__( 'Share This Story, Choose Your Platform!', 'apress' );


// Portfolio Image Gallery
if(!function_exists('wp_get_attachment')) {
	function wp_get_attachment( $attachment_id ) {
	
		if(is_numeric($attachment_id) && $attachment_id > 0) {
			$attachment = get_post( $attachment_id );
			return array(
				'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => get_permalink( $attachment->ID ),
				'src' => $attachment->guid,
				'title' => $attachment->post_title,
				'packery-image-sizing' => get_post_meta( $attachment->ID, 'apress_image_gal_packery_sizing', true ),
				'image_url' => get_post_meta( $attachment->ID, 'apress_image_gal_url', true ),
			);
		} else {
			return array(
				'alt' => '',
				'caption' => '',
				'description' => '',
				'href' => '',
				'src' => '',
				'title' => '',
				'packery-image-sizing' => '',
				'image_url' => ''
			);
		}
	}
}
	

$admin_portfolio_gallery_layout = $apress_data["portfolio_gallery_layout"];

if($single_portfolio_layout == 'default' || $single_portfolio_layout == ''){		
	$portfolio_gallery_layout_value = $admin_portfolio_gallery_layout;
}else{
	$portfolio_gallery_layout_value = $portfolio_gallery_layout;
}
	

if($portfolio_gallery_layout_value == 'gallery_layout_style1'){
	
	$portfolio_layout_class = 'posttype_gallery_slider';
	$portfolio_layout_ul = 'post_slickslider posttype_gallery';
	$portfolio_layout_li = 'posttype_slide';
	$thumb_size = 'full';
	
}else if($portfolio_gallery_layout_value == 'gallery_layout_style2'){
	
	$portfolio_layout_class = '';
	$portfolio_layout_ul = 'list_style';
	$portfolio_layout_li = 'slide';
	$thumb_size = 'full';
	
}else if($portfolio_gallery_layout_value == 'gallery_layout_style3'){
	
	$portfolio_layout_class = '';
	$portfolio_layout_ul = 'grid_style fitrow_row';
	$portfolio_layout_li = 'fitrow_columns';
	$thumb_size = 'apcore_modern3_thumb_big';
	
}else if($portfolio_gallery_layout_value == 'gallery_layout_style4'){
	
	$portfolio_layout_class = '';
	$portfolio_layout_ul = 'packery_style';
	$portfolio_layout_li = 'packery_item';
	$thumb_size = '';
	
}else if($portfolio_gallery_layout_value == 'gallery_layout_style5'){
	
	$portfolio_layout_class = '';
	$portfolio_layout_ul = 'masonry_style';
	$portfolio_layout_li = 'masonry-item';
	$thumb_size = 'full';
	
}else if($portfolio_gallery_layout_value == 'gallery_layout_style6'){
	
	$portfolio_layout_class = '';
	$portfolio_layout_ul = 'big_3column_style fitrow_row';
	$portfolio_layout_li = 'fitrow_columns';
	$thumb_size = 'apcore_blog_medium';
	
}else if($portfolio_gallery_layout_value == 'gallery_layout_style7'){
	
	$portfolio_layout_class = '';
	$portfolio_layout_ul = 'big_2column_style fitrow_row';
	$portfolio_layout_li = 'fitrow_columns';
	$thumb_size = 'apcore_blog_medium';
	
}

$portfolio_hover_effects_admin = isset($apress_data['portfolio_hover_effects']) ? $apress_data['portfolio_hover_effects'] : 'fade_effect';
$portfolio_hover_effects_page = get_post_meta( $cur_id, 'zt_portfolio_hover_effects', true );


if($apress_data["deactivate_hover_effect"] == true){
		if($portfolio_hover_effects_page == '' || $portfolio_hover_effects_page == 'default'){
			$portfolio_hover_effects = $portfolio_hover_effects_admin;
		}else{
			$portfolio_hover_effects = $portfolio_hover_effects_page;
			}
	$portfolio_featured_thumb = 'portfolio_featured_thumb';
}else{
	$portfolio_hover_effects = '';
	$portfolio_featured_thumb = '';
}

$admin_lightbox_style = isset($apress_data["lightbox_style"]) ? $apress_data["lightbox_style"] : 'photo-swipe-gallery';
