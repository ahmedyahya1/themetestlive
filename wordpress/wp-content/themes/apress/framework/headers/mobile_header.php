<?php 
include get_template_directory().'/framework/variables/variables-headers.php';
$logo_url = isset($apress_data['logo']['url']) ? $apress_data['logo']['url'] : '';
$logo_retina_url = isset($apress_data['logo_retina']['url']) ? $apress_data['logo_retina']['url'] : '';
?>
<!--Header Start-->

<?php if($mobile_header_sticky_show_hide == 'on'){echo '<div class="mobile_sticky_header_wrap">';}?>
<div class="mobile_header_area <?php echo esc_attr($mobile_menu_design.'_mobile_menu');?>">
<div class="zolo-header-area header_background">
		<?php if($mobile_header_multilingual == 'on'){
            if($multilingual_code){ 
            echo '<div class="zolo_mobile_multilingual_code"><div class="zolo_multilingual_code">'.apress_theme_execute_text_php($multilingual_code).'</div></div>';
            }
        }?>
     <!--Top Area Start-->
    <?php if($mobile_header_top_bar_show_hide == 'on'){
		$header_type = isset($apress_data["header_layout"]) ? $apress_data["header_layout"] : 'v1';
		$custom_header_dragdrop = isset($apress_data["custom_header_dragdrop"]) ? $apress_data["custom_header_dragdrop"] : 'preset';
		?>
    
		<?php
		if($custom_header_dragdrop == 'custom'){
		 get_template_part('framework/headers/header_section_one'); 
		}else{
		 ?>
		<div class="zolo-topbar">
          <div class="headertopcontent_box">
            <div class="zolo-container">
            <div class="header_element header_section_one">
    	<?php if($header_type == 'v2'){
						//Topbar Left
						echo '<div class="header_left"><ul class="header_left_col">'; 
							get_template_part('framework/social_icons');	
						echo '</ul></div>'; 
						//Topbar Right
						echo '<div class="header_right"><ul class="header_right_col">'; 
							// Top Menu
							echo  '<li class="zolo-top-menu">';
							wp_nav_menu( array( 'theme_location' => 'top-nav', 'menu_class' => 'top-menu', 'depth' => 2, 'link_before' => '<span class="menu-text">', 'link_after' => '</span>', ) );
							echo '</li>';	
						echo '</ul></div>';  
				}else if($header_type == 'v5'){	
					
						//Topbar Left
						echo '<div class="header_left"><ul class="header_left_col">'; 
						// Header Email
						if($apress_data["header_email"]){
							echo '<li class="top-mail"><i class="fa fa-envelope mail-icon"></i><a href="mailto:'.$apress_data["header_email"].'">'.$apress_data["header_email"].'</a></li>';		
						}
						// Header Phone Number
						if($apress_data["header_phone_number"]){
							echo '<li class="top-phone"><i class="fa fa-phone mail-icon"></i><a href="tel:'.$apress_data["header_phone_number"].'">'.$apress_data["header_phone_number"].'</a></li>';	
						}
						echo '</ul></div>'; 
						//Topbar Right
						echo '<div class="header_right"><ul class="header_right_col">'; 
							// Top Social
							get_template_part('framework/social_icons');
						echo '</ul></div>'; 
                
				}else if($header_type == 'v6'){
						
						//Topbar Left
						echo '<div class="header_left"><ul class="header_left_col">'; 
						// Header Email
						if($apress_data["header_email"]){
							echo '<li class="top-mail"><i class="fa fa-envelope mail-icon"></i><a href="mailto:'.$apress_data["header_email"].'">'.$apress_data["header_email"].'</a></li>';		
						}
						// Header Phone Number
						if($apress_data["header_phone_number"]){
							echo '<li class="top-phone"><i class="fa fa-phone mail-icon"></i><a href="tel:'.$apress_data["header_phone_number"].'">'.$apress_data["header_phone_number"].'</a></li>';	
						}
						echo '</ul></div>'; 
							//Topbar Right
							echo '<div class="header_right"><ul class="header_right_col">'; 
								// Top Social
								get_template_part('framework/social_icons');
								
							echo '</ul></div>';   
				}?>
			</div>
            </div>
          </div>
        </div>
		
		<?php } }?>
    
    <!--Top Area End-->
    <?php if($mobile_menu_design == 'compact'){ ?>
    <header class="zolo_header">
      <div class="headercontent">
        <div class="headercontent_box"> 
          <!-- Logo Area Start -->
		<?php 
		if($mobile_header_logo_showhide == 'on'){        
			echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">'; 		
			echo '<img src="'.esc_url($apress_data['mobile_logo']['url']).'" srcset="'.esc_url($apress_data['mobile_logo']['url']).' 1x, '.esc_url($apress_data['retina_mobile_logo']['url']).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';		
			
			echo '</a></div>';
		}else{
			if($logo_url !== ''){
				echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">';
				echo '<img src="'.esc_url($logo_url).'" srcset="'.esc_url($logo_url).' 1x, '.esc_url($logo_retina_url).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';
				
				echo '</a></div>';
			}else{
				echo '<div class="logo_text"><a href="'.esc_url(home_url('/')).'">';
				echo '<p>'.esc_attr( get_bloginfo( 'name' ) ).'</p>';
				echo '</a></div>';
			} 
		}
        ?>
          <!-- Logo Area End --> 
        </div>
        
        <!-- Navigation Area Start -->
        
        <div class="zolo_mobile_navigation_area"> 
          <!--Menu bar Icon Start-->
          <ul class="mob_nav_icons">
            <?php
            //woocommerce Cart Icon
            apress_theme_mobile_woocommerce();
			?>
            <li class="zolo-search_li">
              <div class="zolo_navbar_search <?php esc_attr($top_search_design);?>"> <a id="mob_full_screen_search_but" class="nav_search-icon"></a> </div>
            </li>
          </ul>
          
          <!--Menu bar Icon End--> 
          
          <!--Menu area Start--> 
          
          <span id="nav_toggle" class="zolo_mobile_menu_icon full_screen_menu_open_responsive"><span class="nav_bar nav_bar_1st"></span><span class="nav_bar nav_bar_2nd"></span><span class="nav_bar nav_bar_3rd"></span></span> 
          
          <!--Menu area End--> 
          
        </div>
        
        <!-- Navigation Area End --> 
        
      </div>
    </header>
    <?php }else{?>
    <header class="zolo_header">
      <div class="headercontent">
        <div class="headercontent_box">           
          <!-- Logo Area Start -->
       <?php 
		if($mobile_header_logo_showhide == 'on'){        
			echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">'; 		
			echo '<img src="'.esc_url($apress_data['mobile_logo']['url']).'" srcset="'.esc_url($apress_data['mobile_logo']['url']).' 1x, '.esc_url($apress_data['retina_mobile_logo']['url']).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';		
			
			echo '</a></div>';
		}else{
			if($logo_url !== ''){
				echo '<div class="logo-box"> <a href="'.esc_url( home_url( '/' ) ).'">';
				echo '<img src="'.esc_url($logo_url).'" srcset="'.esc_url($logo_url).' 1x, '.esc_url($logo_retina_url).' 2x" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" class="logo" />';
				
				echo '</a></div>';
			}else{
				echo '<div class="logo_text"><a href="'.esc_url(home_url('/')).'">';
				echo '<p>'.esc_attr( get_bloginfo( 'name' ) ).'</p>';
				echo '</a></div>';
			} 
		}
        ?>
          <!-- Logo Area End --> 
          
          <!--Menu bar Icon Start-->
          <div class="mob_nav_icon_area"> <span id="nav_toggle" class="zolo_mobile_menu_icon"><span class="nav_bar nav_bar_1st"></span><span class="nav_bar nav_bar_2nd"></span><span class="nav_bar nav_bar_3rd"></span></span>
            <ul class="mob_nav_icons">
              <?php
                //woocommerce Cart Icon
                apress_theme_mobile_woocommerce(); 
			 ?>
              <li class="zolo-search_li">
                <div class="zolo_navbar_search <?php esc_attr($top_search_design);?>"> <span id="mob_full_screen_search_but" class="nav_search-icon"></span> </div>
              </li>
            </ul>
          </div>
          <!--Menu bar Icon End--> 
          
        </div>
      </div>
    </header>
    <?php } ?>
  </div>
  <?php if($mobile_menu_design == 'compact'){ ?>
  <div class="zolo_mobile_navigation_area zolo_mobile_navigation_menu">
    <div class="mobile-nav">
      <div class="mobile-nav-holder main-menu"></div>
      
      <?php // Header Special Button
	  if($mobile_special_button_show_hide == 'on' || $mobile_special_button2_show_hide == 'on'){ echo '<span class="mobile_button_wrap">';}
	  if($mobile_special_button_show_hide == 'on'){
				if($apress_data["special_button_text"]){
				if($apress_data["special_button_bg_option"] == 'color'){
					$special_button_hover_style = isset($apress_data["special_button_hover_style"]) ? $apress_data["special_button_hover_style"] : 'button_hover_style_default';
					}else{$special_button_hover_style = 'button_hover_style_gradient';}
					
				echo '<span class="special_button_area '.$special_button_hover_style.' color_scheme_'.$mobile_header_button_color_scheme.'"><a href="'.esc_url($apress_data["special_button_link_url"]).'" class="special_button"><span class="special_button_text">'.$apress_data["special_button_text"].'</span></a></span>';
				}
		}
		//special_button2
		if($mobile_special_button2_show_hide == 'on'){
				if($apress_data["special_button2_text"]){
				if($apress_data["special_button2_bg_option"] == 'color'){
					$special_button2_hover_style = isset($apress_data["special_button2_hover_style"]) ? $apress_data["special_button2_hover_style"] : 'button_hover_style_default';
					}else{$special_button2_hover_style = 'button_hover_style_gradient';}
					
				echo '<span class="special_button_area '.$special_button2_hover_style.' color_scheme_'.$mobile_header_button2_color_scheme.'"><a href="'.esc_url($apress_data["special_button2_link_url"]).'" class="special_button2"><span class="special_button_text">'.$apress_data["special_button2_text"].'</span></a></span>';
				}
		}
		if($mobile_special_button_show_hide == 'on' || $mobile_special_button2_show_hide == 'on'){echo '</span>';}
	  	 ?>
      
      
    </div>
  </div>
  <?php }else{?>
  <div class="zolo_mobile_navigation_area">
    <div class="mobile-nav">
      <div class="mobile-nav-holder main-menu"></div>
      <?php // Header Special Button
	  if($mobile_special_button_show_hide == 'on' || $mobile_special_button2_show_hide == 'on'){ echo '<span class="mobile_button_wrap">';}
	  if($mobile_special_button_show_hide == 'on'){
				if($apress_data["special_button_text"]){
				if($apress_data["special_button_bg_option"] == 'color'){
					$special_button_hover_style = isset($apress_data["special_button_hover_style"]) ? $apress_data["special_button_hover_style"] : 'button_hover_style_default';
					}else{$special_button_hover_style = 'button_hover_style_gradient';}
					
				echo '<span class="special_button_area '.$special_button_hover_style.' color_scheme_'.$mobile_header_button_color_scheme.'"><a href="'.esc_url($apress_data["special_button_link_url"]).'" class="special_button"><span class="special_button_text">'.$apress_data["special_button_text"].'</span></a></span>';
				}
	  }
	  // Header Special Button
	  if($mobile_special_button2_show_hide == 'on'){
				if($apress_data["special_button2_text"]){
				if($apress_data["special_button2_bg_option"] == 'color'){
					$special_button2_hover_style = isset($apress_data["special_button2_hover_style"]) ? $apress_data["special_button2_hover_style"] : 'button_hover_style_default';
					}else{$special_button2_hover_style = 'button_hover_style_gradient';}
					
				echo '<span class="special_button_area '.$special_button2_hover_style.' color_scheme_'.$mobile_header_button2_color_scheme.'"><a href="'.esc_url($apress_data["special_button2_link_url"]).'" class="special_button2"><span class="special_button_text">'.$apress_data["special_button2_text"].'</span></a></span>';
				}
		
	  	} 
		 if($mobile_special_button_show_hide == 'on' || $mobile_special_button2_show_hide == 'on'){echo '</span>';}
		?>
        
    </div>
  </div>
  <?php } ?>
  <div class="search_overlay"> <span id="mob_search_close_but"><?php echo __('Close','apress');?></span>
    <div class="content_div full_screen_search">
      <?php get_search_form(); ?>
    </div>
  </div>
</div>
<?php if($mobile_header_sticky_show_hide == 'on'){echo '</div>';}?>