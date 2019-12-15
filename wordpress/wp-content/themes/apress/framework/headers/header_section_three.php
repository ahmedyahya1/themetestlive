<?php 
global $apress_data;
$top_search_design = $apress_data["search_design"];
?>
<div class="header_element header_section_three">
<?php	
	//Logo - Menu Bar Left
	if($apress_data['section_3_layout'] == 's1' || $apress_data['section_3_layout'] == 's2' || $apress_data['section_3_layout'] == 's3'){
	$layout_left = $apress_data['header_section_three']['Left'];
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
		
	//Menu Bar Center
	if($apress_data['section_3_layout'] == 's3'){
	$layout_center = $apress_data['header_section_three']['Center'];
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

//Menu Bar Right
	if($apress_data['section_3_layout'] == 's2' || $apress_data['section_3_layout'] == 's3'){
	$layout_right = $apress_data['header_section_three']['Right'];
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