<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site_layout">
<?php
global $apress_data; 
$extended_sidebar_position = isset($apress_data['extended_sidebar_position']) ? $apress_data['extended_sidebar_position'] : 'right';
$body_preloader = isset($apress_data["body_preloader"]) ? $apress_data["body_preloader"] : 'off';
$header_position = isset($apress_data["header_position"]) ? $apress_data["header_position"] : 'Top';
$left_right_slider_screen = isset($apress_data["left_right_slider_screen"]) ? $apress_data["left_right_slider_screen"] : 'full_screen_slider';

$page_transition_effect = (!empty($apress_data['pagetransition-effect'])) ? $apress_data['pagetransition-effect'] : 'standard';

if($extended_sidebar_position){	
	echo '<div class="extended_sidebar_box '.esc_attr('extended_sidebar_position_'.$extended_sidebar_position).'">';
	echo '<div class="extended_sidebar_mask"></div>';
}
// Preloader  
if($body_preloader == 'on'): ?>

<div class="zolo_loading_screen" id="ajax-loading-screen" data-disable-fade-on-click="<?php echo (!empty($apress_data['disable-transition-fade-on-click'])) ? $apress_data['disable-transition-fade-on-click'] : '0' ; ?>" data-effect="<?php echo $page_transition_effect; ?>" data-method="standard">
	
	<?php if($page_transition_effect == 'horizontal_swipe' || $page_transition_effect == 'horizontal_swipe_basic') { ?>
		<div class="reveal-1"></div>
		<div class="reveal-2"></div>
	<?php } else if($page_transition_effect == 'center_mask_reveal') { ?>
		<span class="mask-top"></span>
		<span class="mask-right"></span>
		<span class="mask-bottom"></span>
		<span class="mask-left"></span>
	<?php } else { ?>
        
            <div id="mask">
            	<div id="loader">
					<?php if($apress_data['preloader_logo']['url']){ ?>
                    <span class="preloader_logo"><img src="<?php echo esc_url($apress_data['preloader_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></span>
					<?php } 
                    if($apress_data['preloader_icon']['url']){ ?>
                    <span class="preloader_icon"><img src="<?php echo esc_url($apress_data['preloader_icon']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) );?>"/></span>
                    <?php } ?>
            	</div>
            </div>
        
			
	<?php } ?>
</div>


<?php endif; ?>










<?php //Site Layout (Div close in Footer File)?>
<div class="layout_design">

<!-- Home Page Section Start -->
<?php 
//call header
apress_theme_header();
?>
<!--zolo_main_content_area Start-->
<div class="zolo_main_content_area">
<!--zolo_content_bg_area Start-->
<div class="zolo_content_bg_area">
<?php 
$c_pageID = apress_theme_current_page_id();
if($header_position == 'Left' || $header_position == 'Right'){ 
//If boxed_slider
	if($left_right_slider_screen == 'boxed_slider'){ 
		echo '<div  class="banner">';
			apress_theme_slider( $c_pageID );
		echo '</div>';
	} 
}
//page title bar
apress_theme_current_page_title_bar( $c_pageID );	
?>