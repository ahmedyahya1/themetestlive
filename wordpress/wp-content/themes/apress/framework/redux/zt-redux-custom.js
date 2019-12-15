jQuery( '#apress_data-header_layout img' ).on( 'click', function() {

		// Auto adjust main menu height
		var $header_version = jQuery( this ).attr( 'alt' );
		if ($header_version == 'v1' || $header_version == 'v2' || $header_version == 'v7' || $header_version == 'v8') {
			//nav_item_padding-top
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-top' ).val( '40px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-top' ).val( '40' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-bottom' ).val( '40px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-bottom' ).val( '40' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-left' ).val( '20px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-left' ).val( '20' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-right' ).val( '20px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-right' ).val( '20' );
			
		}else if ($header_version == 'v3' || $header_version == 'v4' || $header_version == 'v5' || $header_version == 'v6') {
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-top' ).val( '20px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-top' ).val( '20' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-bottom' ).val( '20px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-bottom' ).val( '20' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-left' ).val( '20px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-left' ).val( '20' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-right' ).val( '20px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-right' ).val( '20' );
			
		}
		
		// Centered Logo
		  if($header_version == 'v8'){
			   jQuery( '#apress_data-middle_menu_break_point #middle_menu_break_point' ).val( '1' );
			   jQuery( '#apress_data-middle_menu_break_point .cb-enable' ).addClass('selected');
			   jQuery( '#apress_data-middle_menu_break_point .cb-disable' ).removeClass('selected');
		  }else{
			   jQuery( '#apress_data-middle_menu_break_point #middle_menu_break_point' ).val( '0' );
			   jQuery( '#apress_data-middle_menu_break_point .cb-enable' ).removeClass('selected');
			   jQuery( '#apress_data-middle_menu_break_point .cb-disable' ).addClass('selected');
		  }


	});
jQuery(document).on('change', 'input[name="apress_data[header_position]"]:radio', function(){
		// Navigation Item Padding according to Headers
		var $header_position = jQuery(this).val();
		
		if($header_position == 'Left' || $header_position == 'Right'){
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-top' ).val( '15px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-top' ).val( '15' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-right' ).val( '0px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-right' ).val( '0' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-bottom' ).val( '15px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-bottom' ).val( '15' );
			
			jQuery( '#apress_data-nav_item_padding #nav_item_padding-left' ).val( '0px' );
			jQuery( '#apress_data-nav_item_padding .redux-spacing-left' ).val( '0' );
			
			}else{
			
				jQuery( '#apress_data-nav_item_padding #nav_item_padding-top' ).val( '40px' );
				jQuery( '#apress_data-nav_item_padding .redux-spacing-top' ).val( '40' );
				
				jQuery( '#apress_data-nav_item_padding #nav_item_padding-right' ).val( '20px' );
				jQuery( '#apress_data-nav_item_padding .redux-spacing-right' ).val( '20' );	
				
				jQuery( '#apress_data-nav_item_padding #nav_item_padding-bottom' ).val( '40px' );
				jQuery( '#apress_data-nav_item_padding .redux-spacing-bottom' ).val( '40' );
				
				jQuery( '#apress_data-nav_item_padding #nav_item_padding-left' ).val( '20px' );
				jQuery( '#apress_data-nav_item_padding .redux-spacing-left' ).val( '20' );				
				
				
			}
		
	});
 
 jQuery( '#apress_data-section_1_layout img' ).on( 'click', function() {  

  var $section_layout = jQuery( this ).attr( 'alt' );
  if ($section_layout == 's1') {
	  
	jQuery( '#apress_data-column_1_value #column_1_value-top' ).val( '100%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-top' ).val( '100' );
	
	jQuery( '#apress_data-column_1_value #column_1_value-right' ).val( '0%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-right' ).val( '0' );	
	
	jQuery( '#apress_data-column_1_value #column_1_value-bottom' ).val( '0%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-bottom' ).val( '0' );  

    
  }else if($section_layout == 's2'){   
	jQuery( '#apress_data-column_1_value #column_1_value-top' ).val( '50%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-top' ).val( '50' );
	
	jQuery( '#apress_data-column_1_value #column_1_value-right' ).val( '0%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-right' ).val( '0' );	
	
	jQuery( '#apress_data-column_1_value #column_1_value-bottom' ).val( '50%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-bottom' ).val( '50' );  

  }else{
	jQuery( '#apress_data-column_1_value #column_1_value-top' ).val( '30%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-top' ).val( '30' );
	
	jQuery( '#apress_data-column_1_value #column_1_value-right' ).val( '40%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-right' ).val( '40' );	
	
	jQuery( '#apress_data-column_1_value #column_1_value-bottom' ).val( '30%' );
	jQuery( '#apress_data-column_1_value .redux-spacing-bottom' ).val( '30' );  
	}

 });
 
 jQuery( '#apress_data-section_2_layout img' ).on( 'click', function() {  

  var $section_layout = jQuery( this ).attr( 'alt' );
  if ($section_layout == 's1') {
	  
	jQuery( '#apress_data-column_2_value #column_2_value-top' ).val( '100%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-top' ).val( '100' );
	
	jQuery( '#apress_data-column_2_value #column_2_value-right' ).val( '0%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-right' ).val( '0' );	
	
	jQuery( '#apress_data-column_2_value #column_2_value-bottom' ).val( '0%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-bottom' ).val( '0' );  

    
  }else if($section_layout == 's2'){   
	jQuery( '#apress_data-column_2_value #column_2_value-top' ).val( '50%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-top' ).val( '50' );
	
	jQuery( '#apress_data-column_2_value #column_2_value-right' ).val( '0%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-right' ).val( '0' );	
	
	jQuery( '#apress_data-column_2_value #column_2_value-bottom' ).val( '50%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-bottom' ).val( '50' );  

  }else{
	jQuery( '#apress_data-column_2_value #column_2_value-top' ).val( '30%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-top' ).val( '30' );
	
	jQuery( '#apress_data-column_2_value #column_2_value-right' ).val( '40%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-right' ).val( '40' );	
	
	jQuery( '#apress_data-column_2_value #column_2_value-bottom' ).val( '30%' );
	jQuery( '#apress_data-column_2_value .redux-spacing-bottom' ).val( '30' );  
	}

 });
 
  jQuery( '#apress_data-section_3_layout img' ).on( 'click', function() {  

  var $section_layout = jQuery( this ).attr( 'alt' );
  if ($section_layout == 's1') {
	  
	jQuery( '#apress_data-column_3_value #column_3_value-top' ).val( '100%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-top' ).val( '100' );
	
	jQuery( '#apress_data-column_3_value #column_3_value-right' ).val( '0%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-right' ).val( '0' );	
	
	jQuery( '#apress_data-column_3_value #column_3_value-bottom' ).val( '0%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-bottom' ).val( '0' );  

    
  }else if($section_layout == 's2'){   
	jQuery( '#apress_data-column_3_value #column_3_value-top' ).val( '50%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-top' ).val( '50' );
	
	jQuery( '#apress_data-column_3_value #column_3_value-right' ).val( '0%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-right' ).val( '0' );	
	
	jQuery( '#apress_data-column_3_value #column_3_value-bottom' ).val( '50%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-bottom' ).val( '50' );  

  }else{
	jQuery( '#apress_data-column_3_value #column_3_value-top' ).val( '30%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-top' ).val( '30' );
	
	jQuery( '#apress_data-column_3_value #column_3_value-right' ).val( '40%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-right' ).val( '40' );	
	
	jQuery( '#apress_data-column_3_value #column_3_value-bottom' ).val( '30%' );
	jQuery( '#apress_data-column_3_value .redux-spacing-bottom' ).val( '30' );  
	}

 });
 