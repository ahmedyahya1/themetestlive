<?php 
global $apress_data; 
$top_search_design = $apress_data["search_design"];
?>
<!--Header Start-->

<div class="fullscreen_header_area">
  <div class="zolo-header-area zolo_vertical_header"> 

    <!--Top Area Start-->
    <?php 
	if($apress_data['custom_header_dragdrop'] == 'custom'){
    if($apress_data["top_bar_show_hide"] == 'on'){        
        get_template_part('framework/headers/header_section_one');        
    }
	}else{echo '<div class="zolo-container"></div>';}
    ?>
    <!--Top Area End-->
      
    <header class="zolo_header vertical_fix_menu">
      <div class="zolo_vertical_header_box">
          <div class="vertical_headercontent_box header_element">
          
            
    <?php $verticalheader_arrangement = $apress_data['vertical-header-arrangement']['Enabled'];
	
	if($apress_data['custom_header_dragdrop'] == 'preset'){
			
			echo '<div class="header_left">';
			echo '<ul class="header_left_col">'; 
					// Header Logo
					apress_theme_header_logo();
					// Menu
					get_template_part('framework/headers/vertical_header_menu');
			
			echo '</ul>'; 
			echo '</div>';
		
		}else{

			echo '<div class="header_left">';
			if (count($verticalheader_arrangement) > 1): 
			echo '<ul class="header_left_col">'; 
			
			foreach ($verticalheader_arrangement as $key=>$value) {
				 
				apress_theme_vertical_header_section($key);
			}
			echo '</ul>'; 
			endif;
			echo '</div>';
		}
	
	?>
    
          </div>
      </div>

	<div class="headerbackground"></div>
    
    </header>
  </div>
    
</div>
<?php //Mobile Header Code Header 
get_template_part('framework/headers/mobile_header');
?>
