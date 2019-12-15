<?php 
global $apress_data;
$top_search_design = isset($apress_data["search_design"]) ? $apress_data["search_design"] : 'full_screen_search_but';
?>
<div class="header_element header_section_two">
<?php
	//Header Left
	if($apress_data['section_2_layout'] == 's1' || $apress_data['section_2_layout'] == 's2' || $apress_data['section_2_layout'] == 's3'){
		
	$layout_left = $apress_data['header_section_two']['Left'];
	echo '<div class="header_left">';
	if (count($layout_left) > 1): 
	echo '<ul class="header_left_col">'; 
	
	foreach ($layout_left as $key=>$value) {
		 
		apress_theme_header_section($key);
	}
	echo '</ul>'; 
	endif;
	echo '</div>';
	// Expanded Search Content Start
		apress_theme_expanded_search($layout_left);
	// Expanded Search Content End  
	}
	
	//Header Center
	if($apress_data['section_2_layout'] == 's3'){
	$layout_center = $apress_data['header_section_two']['Center'];
	echo '<div class="header_center">';
	if (count($layout_center) > 1): 
	echo '<ul class="header_center_col">'; 
	
	foreach ($layout_center as $key=>$value) {
		 
	apress_theme_header_section($key);
	}
	echo '</ul>'; 
	endif;	
	echo '</div>';
	// Expanded Search Content Start
		apress_theme_expanded_search($layout_center);
	// Expanded Search Content End  
	}

//Header Right
	if($apress_data['section_2_layout'] == 's2' || $apress_data['section_2_layout'] == 's3'){
	$layout_right = $apress_data['header_section_two']['Right'];
	echo '<div class="header_right">';
	if (count($layout_right) > 1): 
	echo '<ul class="header_right_col">'; 
	
	foreach ($layout_right as $key=>$value) {
		 
	apress_theme_header_section($key);
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