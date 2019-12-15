<?php 
include get_template_directory().'/framework/variables/variables-portfolio-layout.php';
?>

<div class="portfolio_featured_area stickysidebar appear_from_bottom">
<div class="portfolio_featured_container">
<?php 

if( ! post_password_required($post->ID) ){
	if( ( $portfolio_featured_images == 'on' && $show_hide_portfolio_featured != 'hide' ) || ( $portfolio_featured_images == 'off' && $show_hide_portfolio_featured == 'show' ) ){ 
	
	  echo '<div class="'.(isset($portfolio_layout_class) ? $portfolio_layout_class : '').'">';

		echo '<ul class="portfolio_featured_list portfolio_gallery_gutter_on '.esc_attr($admin_lightbox_style).' '.(isset($portfolio_layout_ul) ? esc_attr($portfolio_layout_ul) : '').' '.esc_attr($portfolio_hover_effects).'" data-gutter-space="'.$portfolio_gallery_gutter.'">';
		
		if($single_post_video && $portfolio_gallery_layout_value != 'gallery_layout_style4'){
			echo '<li class="'.esc_attr($portfolio_layout_li).'">';
			echo '<div class="zolo_fluid_video_wrapper">'.$single_post_video.'</div>';
			echo '</li>';
		}
		if ( has_post_thumbnail() && $portfolio_gallery_layout_value != 'gallery_layout_style4') {
			$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $thumb_size); 
			
			//lightbox invisible Code
			if($admin_lightbox_style == 'lightbox-none'){
				echo '<li class="'.esc_attr($portfolio_layout_li).'">
				<span class="'.esc_attr($portfolio_featured_thumb).'"><img src='.$attachment_image[0].'></span></li>';
			}else{
				//lightbox visible Code
				$attachment_image_original = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
				$title = get_post(get_post_thumbnail_id())->post_title;
				echo '<li class="'.esc_attr($portfolio_layout_li).'">
				<a class="'.esc_attr($portfolio_featured_thumb).'" title="'.esc_attr($title).'" href="'.$attachment_image_original[0].'" data-size="'.$attachment_image_original[1].'x'.$attachment_image_original[2].'"> <img src='.$attachment_image[0].'> </a></li>';
				}
		} 
		
		if (metadata_exists('post', $post->ID, '_gallery_image_gallery')) {
			$image_gallery = get_post_meta($post->ID, '_gallery_image_gallery', true);
			
			$attachments = array_filter(explode(',', $image_gallery));	
			
			if($attachments) {
				foreach($attachments as $attachment_key => $attachment_id) {
					
					$attachment_meta = wp_get_attachment($attachment_id);
					$masonry_item_sizing = null;
					
					if($portfolio_gallery_layout_value == 'gallery_layout_style4') {
						if(!empty($attachment_meta['packery-image-sizing'])) {
							$thumb_size = $attachment_meta['packery-image-sizing'];
							$portfolio_layout_li = 'packery_item '.$attachment_meta['packery-image-sizing'];
						} else {
							$thumb_size = $thumb_size;
							
						}
					} 
				
			$attachment_image = wp_get_attachment_image_src($attachment_id, $thumb_size);	
					
			//lightbox invisible Code
			if($admin_lightbox_style == 'lightbox-none'){
				echo '<li class="'.$portfolio_layout_li.'">
				<span class="'.$portfolio_featured_thumb.'"><img src="'.$attachment_image[0].'" /></span></li>';
			}else{
			//lightbox visible Code
				$attachment_image_original = wp_get_attachment_image_src($attachment_id, 'full');	
				$attachment = get_post( $attachment_id );
				
				echo '<li class="'.$portfolio_layout_li.'">
				<a class="'.$portfolio_featured_thumb.'" title="'.esc_attr($attachment->post_title).'" href="'.$attachment_image_original[0].'" data-size="'.$attachment_image_original[1].'x'.$attachment_image_original[2].'"><img src="'.$attachment_image[0].'" /></a></li>';
				}
			
				}
			}
		}
			
		echo '</ul>';
		echo '</div>';
	 }
 
 } 
?>
  
</div>
</div>

