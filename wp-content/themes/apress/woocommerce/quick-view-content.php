<?php

/**
 ========================
   Quick View Template
 ========================
**/

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
global $post, $product;
?>
<div class="apress-qv-nxt apressqv-chevron-right apress-qv" qv-nxt-id ="<?php echo  esc_attr($qv_next); ?>"></div>
<div class="apress-qv-prev apressqv-chevron-left apress-qv" qv-prev-id ="<?php echo  esc_attr($qv_prev); ?>"></div>

<div class="apress-qv-inner-modal">
	<div class="apress-qv-container woocommerce single-product">
		<div class="apress-qv-top-panel">
			<div class="apress-qv-close apress-qv apressqv-cross"></div>
			<div class="apress-qv-preloader apress-qv-mpl">
			<div class="apress-qv-speeding-wheel"></div>
			</div>
		</div>
		<div class="apress-qv-main" >
			<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="apress-qv-images" id="apress_qv_slider">
                <div class="qv_image_slider_holder">
					<?php
					if ( has_post_thumbnail() ) {

					  $image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
					  $image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
					  $image       = get_the_post_thumbnail( $post->ID, array(768,768), array(
						'title' => $image_title
						) );
			
					  $attachment_count = count( $product->get_gallery_image_ids() );
			
					  if ( $attachment_count > 0 ) {
						$gallery = '[product-gallery]';
					  } else {
						$gallery = '';
					  }
					  
					  echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div>%s</div>', $image ), $post->ID );
			
					  // additional
					  $attachment_ids = $product->get_gallery_image_ids();
					  if ( $attachment_ids ) {
						  $loop = 0;
						  $columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
			
						  foreach ( $attachment_ids as $attachment_id ) {
							  $image_title  = esc_attr( get_the_title( $attachment_id ) );
							  $image =  wp_get_attachment_image( $attachment_id, array(768,768), array('title' => $image_title,'alt' => $image_title) );
							  echo apply_filters( 'woocommerce_single_product_image_html',sprintf( '<div>%s</div>', $image ), $attachment_id);
						  }
					  }
			
					} else {
			
					  echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'apress' ) ), $post->ID );
			
					}
					?>	
                    </div>		
                    </div>
				
				<div class="apress-qv-summary">
                	
					<?php do_action( 'woocommerce_quick_view_product_summary' ); ?>
				</div>
			</div>
		</div>
	</div>
</div>



