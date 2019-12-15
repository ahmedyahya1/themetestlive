<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}
global $apress_data;
$cur_id = apress_theme_current_page_id();		

$portfolio_archive_layout = isset($apress_data["portfolio_archive_layout"]) ? $apress_data["portfolio_archive_layout"] : 'portfolio_grid';
$portfolio_layout_columns = isset($apress_data["portfolio_layout_columns"]) ? $apress_data["portfolio_layout_columns"] : '4';	 

$portfolio_hover_effects_admin = isset($apress_data['portfolio_hover_effects']) ? $apress_data['portfolio_hover_effects'] : 'fade_effect';
$portfolio_hover_effects_page = get_post_meta( $cur_id, 'zt_portfolio_hover_effects', true );

if($portfolio_hover_effects_page == '' || $portfolio_hover_effects_page == 'default'){
	$portfolio_hover_effects = $portfolio_hover_effects_admin;
}else{
	$portfolio_hover_effects = $portfolio_hover_effects_page;
	}

//Portfolio Layout Class
	if($portfolio_archive_layout == 'portfolio_grid'){
		$blog_layout_thumb = 'apcore_blog_medium';
		$masonry_item = 'grid-item fitrow_columns';
		$portfolio_layout_class = 'blog_layout_grid fitrow_row';
	
	}elseif($portfolio_archive_layout == 'portfolio_masonry'){
		$blog_layout_thumb = 'full';
		$masonry_item = 'masonry-item';
		$portfolio_layout_class = 'blog_layout_masonry';
	}

//Portfolio Layout Columns Class

	if($portfolio_layout_columns == '2'){
		$portfolio_layout_column_class = 'blog_column_2';
		
	}elseif($portfolio_layout_columns == '3'){
		$portfolio_layout_column_class = 'blog_column_3';
		
	}elseif($portfolio_layout_columns == '4'){
		$portfolio_layout_column_class = 'blog_column_4';
		
	}elseif($portfolio_layout_columns == '5'){
		$portfolio_layout_column_class = 'blog_column_5';
		
	}elseif($portfolio_layout_columns == '6'){
		$portfolio_layout_column_class = 'blog_column_6';
	}