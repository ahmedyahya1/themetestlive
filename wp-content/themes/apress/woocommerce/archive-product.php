<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $apress_data;
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
$woocommerce_shop_page_columns = isset($apress_data["woocommerce_shop_page_columns"]) ? $apress_data["woocommerce_shop_page_columns"] : '4';
$prdct_col = $woocommerce_shop_page_columns ? $woocommerce_shop_page_columns : '4';
$shop_page_columns = 'columns-'.$prdct_col;
$shop_page_layout = isset($apress_data['shop_page_layout']) ? $apress_data['shop_page_layout'] : 'rightsidebar';

$woocommerce_product_title_align = isset($apress_data['woocommerce_product_title_align']) ? $apress_data['woocommerce_product_title_align'] : 'center';

// Sidebar Position Left/Right/Full
$shop_page_sidebar_position = isset($apress_data["shop_page_sidebar_position"]) ? $apress_data["shop_page_sidebar_position"] : 'right';
$sidebar_position_class = '';

if($shop_page_sidebar_position == 'left'){			
	$sidebar_position_class = 'hassidebar left';					
}else if($shop_page_sidebar_position == 'right'){			
	$sidebar_position_class = 'hassidebar right';					
}else if($shop_page_sidebar_position == 'none'){			
	$sidebar_position_class = 'nosidebars';				
}
//Full Width 
?>
        
        
<div class="container-main <?php echo esc_attr($sidebar_position_class).' '.esc_attr($shop_page_columns.' woocommerce_product_title_'.$woocommerce_product_title_align);?>">

  <div class="zolo-container">
  <div class="container-padding">
    <div class="inner-content">
      
        
      
		<div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">
          
            <?php do_action( 'woocommerce_archive_description' ); ?>
            <?php if ( have_posts() ) : ?>
            <?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
            <?php woocommerce_product_loop_start(); ?>
            <?php woocommerce_product_subcategories(); ?>
            <?php while ( have_posts() ) : the_post(); ?>
            
            <?php wc_get_template_part( 'content', 'product' ); ?>
            
            <?php endwhile; // end of the loop. ?>
            <?php woocommerce_product_loop_end(); ?>
            <?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>
            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
            <?php wc_get_template( 'loop/no-products-found.php' ); ?>
            <?php endif; ?>
            <?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
          </div>
        </div>
        
        <?php // Left Sidebar
		 if($shop_page_sidebar_position == "left"): ?>
        <div class="sidebar sidebar_container_1 left"><?php get_sidebar( 'shop' ); ?></div>
        <?php endif; ?>
        
        <?php // Right Sidebar
		 if($shop_page_sidebar_position == "right"): ?>
        <div class="sidebar sidebar_container_2 right"><?php get_sidebar( 'shop' ); ?></div>
        <?php endif; ?>
      
      </div>
    </div>
    </div>
  </div>

<?php get_footer( 'shop' ); ?>
