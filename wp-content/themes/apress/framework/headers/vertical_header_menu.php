<?php 
global $apress_data; 
$primary_color = isset($apress_data['primary_color']) ? $apress_data['primary_color'] : '#f82eb3';
$nav_highlightborder_color = !empty($apress_data['nav_highlightborder_color']) ? $apress_data['nav_highlightborder_color'] : $primary_color;
$header_main_menu = isset($apress_data["vertical_menu_design"]) ? $apress_data["vertical_menu_design"] : 'menu5'; 


	if($header_main_menu == 'menu5'){  
	
		$menu_design_name = 'menu_hover_design5';
		$menu_hover_styles = 'menu_hover_styles';
		
	}elseif($header_main_menu == 'menu6'){ 
	
		$menu_design_name = 'menu_hover_design6';
		$menu_hover_styles = '';
	
	}elseif($header_main_menu == 'menu7'){ 
		
		$menu_design_name = 'menu_hover_design7';
		$menu_hover_styles = '';
	
	}elseif($header_main_menu == 'vertical_menu_hover_1'){  
		
		$menu_design_name = 'menu_hover_design5';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style1';
	
	}elseif($header_main_menu == 'vertical_menu_hover_2'){  
	
		$menu_design_name = 'menu_hover_design5';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style2';
	
	}elseif($header_main_menu == 'vertical_menu_hover_3'){  
	
		$menu_design_name = 'menu_hover_design5';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style3';
	
	}elseif($header_main_menu == 'vertical_menu_hover_4'){  
		
		$menu_design_name = 'menu_hover_design5';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style4';
		
	}elseif($header_main_menu == 'vertical_menu_hover_5'){  
	
		$menu_design_name = 'menu_hover_design5';	
		$menu_hover_styles = 'menu_hover_styles menu_hover_style5';
		
	}else{
		$menu_design_name = '';
		$menu_hover_styles = '';
	}
?>
<li class="vertical_header_menu">
<div class="navigation <?php echo esc_attr($header_main_menu) .' '.esc_attr($apress_data["dropdown_loading"]).' '.esc_attr($menu_hover_styles);?>">
  <nav id="site-navigation" class="zolo-navigation main-navigation" role="navigation">
	<?php wp_nav_menu(array(
        'theme_location'	=> 'primary-nav',
        'depth'				=> 6,
        'container' 		=> false,
        'menu_id' 			=> 'nav',
        'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'menu_class'        => 'nav zolo-navbar-nav '.esc_attr($menu_design_name),
        'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
		'link_before'    	=> '<span class="menu-text">',
		'link_after'    	=> '</span>',
        'walker'            => new ZOLOCoreFrontendWalker()
    ));
    
    ?>
  </nav>
</div>
</li>