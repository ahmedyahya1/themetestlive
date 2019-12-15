<?php 
include get_template_directory().'/framework/variables/variables-headers.php';
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area header_background zolo_preset_header1 <?php echo esc_attr($zolo_header_sticky);?>">
    <?php 
	//header_sticky_opt Show/Hide
		if($header_sticky_opt == 'on'){ 
		echo $header_sticky_display == 'section2_3' || $header_sticky_display == 'section2' || $header_sticky_display == 'section3' ? $header_sticky_wrapper_start : '' ?>
    <?php } ?>
    <header class="zolo_header">
      <div class="headercontent">
        
        <?php if($section2_border_style_width == 'border_style_fix_width'){ echo '<div class="zolo-container">'; }?>
        <div class="zolo-header_section2_background">  
          <div class="zolo-container">
          <div class="headercontent_box">
            <div class="header_element header_section_two">
              <?php	
				//Logo - Menu Bar Left
				echo '<div class="header_left"><ul class="header_left_col">'; 
				
			// Header Logo
			 apress_theme_header_logo(); 
			 echo '</ul></div>';

			//Menu Bar Right
			echo '<div class="header_right"><ul class="header_right_col">'; 
	
			// Top Menu
			apress_theme_preset_custom_top_header_main_menu();

			// Cart	
			if ( class_exists( 'WooCommerce' ) ) {				
				echo '<li class="shopping_cart"><div class="shopping-cart-wrapper">'.apress_theme_tiny_cart().'</div></li>';	
			}
			// Multilingual
			if($multilingual_code){ 
				echo '<li class="zolo_multilingual_code">'.apress_theme_execute_text_php($multilingual_code).'</li>';		
			}
				
			// Header Search
			echo '<li class="zolo-search-menu"><div class="zolo_navbar_search '.esc_attr($top_search_design).'"><span class="nav_'.esc_attr($top_search_design).' nav_search-icon"></span>';
			if($top_search_design == 'default_search_but'){
				echo '<div class="nav_search_form_area">';
				get_search_form();
				echo '</div>';
			}
			echo '</div></li>';
			
	echo '</ul></div>'; 
?>
              <!--Expanded Search Content Start-->
              <?php 
            if($top_search_design == 'expanded_search_but'){
                echo '<div class="zolo_navbar_search expanded_search_but"><div class="nav_search_form_area">';
                echo '<span id="nav_expanded_search_but" class="nav_search-icon expanded_close_button"></span>';
                get_search_form();
                echo '</div></div>';
            }?>
              <!--Expanded Search Content End--> 
            </div>
          </div>
        </div>
        </div>
        <?php if($section2_border_style_width == 'border_style_fix_width'){ echo '</div>'; }?>
        
      </div>
    </header>
    <?php 
        //header_sticky_opt Show/Hide
        if($header_sticky_opt == 'on'){ 
        echo $header_sticky_display == 'section2_3' || $header_sticky_display == 'section2' || $header_sticky_display == 'section3' ? $header_sticky_wrapper_end : '' ?>
    <?php } ?>
  </div>
  
  <!--Full Screen Search Content Start-->
  <?php if($top_search_design == 'full_screen_search_but'){?>
  <div class="search_overlay"> <span class="search_close_but">
    <?php __( 'Close', 'apress' ); ?>
    </span>
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
