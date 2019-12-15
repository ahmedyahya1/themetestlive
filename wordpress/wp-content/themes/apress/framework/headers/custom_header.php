<?php global $apress_data;

//Header Sticky Code Start
if($apress_data["header_sticky_opt"] == 'on'){
	$zolo_header_sticky = 'zolo_header_sticky'; 
}else{
	$zolo_header_sticky = ''; 
} 

if($apress_data["header_sticky_opt"] == 'on'){
$header_sticky_display = isset($apress_data["header_sticky_display"]) ? $apress_data["header_sticky_display"] : 'section2';

if($header_sticky_display == 'section2' || $header_sticky_display == 'section3' || $header_sticky_display == 'section2_3'){
	$header_sticky_wrapper_start = '<div class="sticky_header_wrapper"><div class="sticky_header fadeInDown">';
	$header_sticky_wrapper_end = '</div></div>';
}else{
	$header_sticky_wrapper_start = $header_sticky_wrapper_end = '';
	}
}else{
	$header_sticky_wrapper_start = $header_sticky_wrapper_end = $header_sticky_display = '';
	}
	
	
//Header Sticky Code End

$top_search_design = $apress_data["search_design"];
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area header_background <?php echo esc_attr($zolo_header_sticky);?>"> 
    <!--Top Area Start-->
    <?php 
    if($apress_data["top_bar_show_hide"] == 'on'){        
        get_template_part('framework/headers/header_section_one');        
    }
    ?>
    <!--Top Area End-->
    
    <?php 
	//header_sticky_opt Show/Hide
		if($apress_data["header_sticky_opt"] == 'on'){ 
		echo $header_sticky_display == 'section2_3' ? $header_sticky_wrapper_start : '' ?>
        <?php } ?>
        
        <header class="zolo_header">
          <div class="headercontent">
          	<?php if($apress_data["section2_show_hide"] == 'on'){ ?>
            <?php echo $header_sticky_display == 'section2' ? $header_sticky_wrapper_start : '' ?>
            
            <?php if($apress_data["section2_border_style_width"] == 'border_style_fix_width'){ echo '<div class="zolo-container">'; }?>
                <div class="zolo-header_section2_background">           
                <div class="zolo-container">
                <div class="headercontent_box">
                  <!--Navigation Area Start-->
                  <?php get_template_part('framework/headers/header_section_two'); ?>
                  <!--Navigation Area End--> 
                </div>
            </div> 
            </div>
            <?php if($apress_data["section2_border_style_width"] == 'border_style_fix_width'){ echo '</div>'; }?>
            
            <?php echo $header_sticky_display == 'section2' ? $header_sticky_wrapper_end : '' ?>
            <?php } ?>
            <!--Navigation Area Start-->
            <?php if($apress_data["section3_show_hide"] == 'on'){ ?>
            <?php echo $header_sticky_display == 'section3' ? $header_sticky_wrapper_start : '' ?>
            
            <?php if($apress_data["section3_border_style_width"] == 'border_style_fix_width'){ echo '<div class="zolo-container">'; }?>
            <div class="navigation-area">
              <div class="zolo-container">
              <div class="navigation-padding">
                <div class="zolo-navigation_parent" style="float:left; width:100%;">
                  <?php get_template_part('framework/headers/header_section_three'); ?>
                </div>
                </div>
              </div>
            </div>
            <?php if($apress_data["section3_border_style_width"] == 'border_style_fix_width'){ echo '</div>'; }?>
			
			<?php echo $header_sticky_display == 'section3' ? $header_sticky_wrapper_end : '' ?>
             <?php } ?>
            <!--Navigation Area End--> 
          </div>
        </header>
        
	<?php 
        //header_sticky_opt Show/Hide
        if($apress_data["header_sticky_opt"] == 'on'){ 
        echo $header_sticky_display == 'section2_3' ? $header_sticky_wrapper_end : '' ?>
    <?php } ?>
    <?php 
	// Mobile Menu active
	apress_theme_mobile_menu('');?>
  </div>
  <?php get_template_part('framework/headers/extended_sidebar'); ?>
  <!--Full Screen Search Content Start-->
  <?php if($top_search_design == 'full_screen_search_but'){?>
  <div class="search_overlay">
    <span class="search_close_but"><?php __( 'Close', 'apress' ); ?></span>
    <div class="content_div full_screen_search">
      <div class="zolo-container">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
  <?php }?>
  <!--Full Screen Search Content End--> 
</div>
<?php 
//Mobile Header Code Header 
get_template_part('framework/headers/mobile_header');
?>
