<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version    3.0.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
    
<?php 
global $apress_data;
$woocommerce_related_columns = isset($apress_data["woocommerce_related_columns"]) ? $apress_data["woocommerce_related_columns"] : '4';
$related_prdct_col = $woocommerce_related_columns ? $woocommerce_related_columns : '4';
$shop_related_columns = 'related_column-'.$related_prdct_col;
$shop_page_layout = isset($apress_data['shop_page_layout']) ? $apress_data['shop_page_layout'] : 'rightsidebar';
?>

</style>
<?php
// Sidebar Position Left/Right/Full
$woocommerce_detail_page_style = isset($apress_data["woocommerce_detail_page_style"]) ? $apress_data["woocommerce_detail_page_style"] : 'woocommerce_detail_page_style1';
$shop_page_sidebar_position = isset($apress_data["shop_page_sidebar_position"]) ? $apress_data["shop_page_sidebar_position"] : 'right';
$sidebar_position_class = '';

if($woocommerce_detail_page_style == 'woocommerce_detail_page_style1'){
	if($shop_page_sidebar_position == 'left'){			
		$sidebar_position_class = 'hassidebar left';					
	}else if($shop_page_sidebar_position == 'right'){			
		$sidebar_position_class = 'hassidebar right';					
	}else if($shop_page_sidebar_position == 'none'){			
		$sidebar_position_class = 'nosidebars';				
	}
}else{
	$sidebar_position_class = 'nosidebars';		
}

?>        
        
<div class="container-main <?php echo esc_attr($sidebar_position_class).' '.esc_attr($shop_related_columns).' '.esc_attr($woocommerce_detail_page_style);?>">

  <?php if($woocommerce_detail_page_style == 'woocommerce_detail_page_style1'){ 
		echo '<div class="zolo-container"><div class="container_padding_left_right container_padding_top">';
	}?>
    <div class="inner-content">
      
		<div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php wc_get_template_part( 'content', 'single-product' ); ?>
          <?php endwhile; // end of the loop. ?>
          <?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );?>
        </div>
        
         </div>
        
		<?php 
		if($woocommerce_detail_page_style == 'woocommerce_detail_page_style1'){
			// Left Sidebar
			if($shop_page_sidebar_position == "left"): ?>
			<div class="sidebar sidebar_container_1 left"><?php get_sidebar( 'shop' ); ?></div>
			<?php endif; 
			
			// Right Sidebar
			if($shop_page_sidebar_position == "right"): ?>
			<div class="sidebar sidebar_container_2 right"><?php get_sidebar( 'shop' ); ?></div>
			<?php endif; 
		}?>
      
      </div>
      
     <?php if($woocommerce_detail_page_style == 'woocommerce_detail_page_style1'){ 
		echo '</div></div>';
	}?>
    </div>

  
<?php get_footer( 'shop' ); ?>
