<?php global $apress_data, $woocommerce;
$top_search_design = isset($apress_data["search_design"]) ? $apress_data["search_design"] : 'full_screen_search_but';
$header_position = isset($apress_data['header_position']) ? $apress_data["header_position"] : 'Top';
$top_bar_show_hide = isset($apress_data["top_bar_show_hide"]) ? $apress_data["top_bar_show_hide"] : 'on';
?>
<!--Top Area Start-->
<?php if($top_bar_show_hide == 'on'){?>
<?php
if($header_position == 'Left' || $header_position == 'Right'){
	echo '<div class="zolo_vertical_header_topbar">';
}
?>
<?php if($apress_data["topbar_border_style_width"] == 'border_style_fix_width'){ echo '<div class="zolo-container">'; }?>
<div class="zolo-topbar">
    <div class="zolo-container">    
    <div class="headertopcontent_box"> 
    <div class="header_element header_section_one"> 
        <?php			
        //Topbar Left
		if($apress_data['section_1_layout'] == 's1' || $apress_data['section_1_layout'] == 's2' || $apress_data['section_1_layout'] == 's3'){
        $layout_left = $apress_data['header_section_one']['Left'];
		echo '<div class="header_left">';
        if (count($layout_left) > 1): 
            echo '<ul class="header_left_col">';
            
            foreach ($layout_left as $key=>$value) {
                 
            apress_theme_topbar_section($key);
         }
        echo '</ul>'; 
        endif;	 
		echo '</div>';
		// Expanded Search Content Start
			apress_theme_expanded_search($layout_left);
		// Expanded Search Content End  
		}        
		
					
        //Topbar Center
		if($apress_data['section_1_layout'] == 's3'){
        $layout_center = $apress_data['header_section_one']['Center']; 
        echo '<div class="header_center">';
		if (count($layout_center) > 1): 
        echo '<ul class="header_center_col">'; 
            foreach ($layout_center as $key=>$value) {
         
            apress_theme_topbar_section($key);
         }
        echo '</ul>';  
        endif;
		echo '</div>';
		// Expanded Search Content Start
			apress_theme_expanded_search($layout_center);
		// Expanded Search Content End  
		}		
		
					
        //Topbar Right
		if($apress_data['section_1_layout'] == 's2' || $apress_data['section_1_layout'] == 's3'){
        $layout_right = $apress_data['header_section_one']['Right']; 
		echo '<div class="header_right">';
        if (count($layout_right) > 1): 
        echo '<ul class="header_right_col">'; 
            foreach ($layout_right as $key=>$value) {
         
            apress_theme_topbar_section($key);
         }
        echo '</ul>';  
        endif;
		echo '</div>';
        // Expanded Search Content Start
        	apress_theme_expanded_search($layout_right);
        // Expanded Search Content End  
		}
       
		?>
        </div>
    </div>
  </div>
</div>
<?php if($apress_data["topbar_border_style_width"] == 'border_style_fix_width'){ echo '</div>'; }?>

<?php 	
if($header_position == 'Left' || $header_position == 'Right'){
	echo '</div>';
}
?>
<?php }?>
