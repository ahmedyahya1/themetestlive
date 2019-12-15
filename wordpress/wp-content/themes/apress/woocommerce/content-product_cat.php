<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$class = array();

$uniqid = uniqid(rand());
$zolo_woo_categories_id = 'zolo_woo_categories_'.$uniqid;
		

		
$category_box_style = array();

//border-radius
$category_box_style[] = '-moz-border-radius:'.$border_radius.'px; -webkit-border-radius:'.$border_radius.'px; -ms-border-radius:'.$border_radius.'px; border-radius:'.$border_radius.'px;';

//border
if($border == 'yes'){
$category_box_style[] = 'border:1px solid '.$border_color.';';
}

//box_shadow
if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
$category_box_style[] = $box_shadow;
}

$category_box_style = implode( ' ', $category_box_style );	

?>

<style type="text/css" media="all" scoped>
<?php if(strlen(esc_attr($text_hover_color))) {//Changes on hover text color
	echo '#'.$zolo_woo_categories_id.' .zolo_woo_category_box:hover .zolo_woo_category_caption #categories_title'.$category ->term_id.',
	#'.$zolo_woo_categories_id.' .zolo_woo_category_box:hover .zolo_woo_category_caption #categories_title'.$category ->term_id.' mark,
	#'.$zolo_woo_categories_id.' .zolo_woo_category_box:hover .zolo_woo_category_caption #categories_des'.$category ->term_id.'{color:'. esc_attr($text_hover_color).'!important;}'; 
}

//Font Style
if(isset($title_font_options) && $title_font_options != '' || isset($title_custom_fonts) && $title_custom_fonts != '') {
	$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
	echo '#'.$zolo_woo_categories_id.' .zolo_woo_category_box .zolo_woo_category_caption #categories_title'.$category ->term_id.'{'.esc_attr($title_options["style"]).'}'; 
}

if(isset($description_font_options) && $description_font_options != '' || isset($description_custom_fonts) && $description_custom_fonts != '') {
	$description_options = _zolo_parse_text_shortcode_params($description_font_options, '', $description_google_fonts, $description_custom_fonts);
	echo '#'.$zolo_woo_categories_id.' .zolo_woo_category_box .zolo_woo_category_caption #categories_des'.$category ->term_id.'{'.esc_attr($description_options["style"]).'}'; 
}

?>
</style>


<li id="<?php echo esc_attr($zolo_woo_categories_id);?>" <?php wc_product_cat_class($class, $category); ?> style="padding:<?php echo $gutter;?>px!important;">
<div class="zolo_woo_category_box" style=" <?php echo $category_box_style;?> ">
	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
    
		<div class="zolo_category_background_image">
		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			//pass $image_size to acton handler
			do_action( 'woocommerce_before_subcategory_title', $category, $image_size );

		?>
        <div class="category_overlay" style="background-color: <?php echo esc_attr($hover_overlay_color); ?>"> </div>
        
        <?php if($categories_style == 'woo_categories_style2'){?>
        <div class="zolo_woo_category_caption" style="color: <?php echo esc_attr($text_color);?>">
            <h3 id="<?php echo 'categories_title'.$category ->term_id;?>" class="zolo_woo_category_title" style="color: <?php echo esc_attr($text_color);?>">
				<?php
                    echo esc_html($category->name);
                    if ( $count== 'yes' && $category->count > 0 )
                        echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
					?>
		    </h3>
				<?php
                    if($description == 'yes' && $category->description != '')
                    echo '<span id="categories_des'.$category ->term_id.'" class="category_description">' . esc_html($category->description) . '</span>';
                ?>
             </div>
        <?php }?>
		</div>
        
                   
           
         <?php if($categories_style == 'woo_categories_style1'){?>
         	
            <div class="zolo_woo_category_caption" style="color: <?php echo esc_attr($text_color);?>">
              <h3 id="<?php echo 'categories_title'.$category ->term_id;?>" class="zolo_woo_category_title" style="color: <?php echo esc_attr($text_color);?>">
				<?php
                    echo esc_html($category->name);
                    if ( $count== 'yes' && $category->count > 0 )
                        echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
					?>
		    </h3>
				<?php
                    if($description == 'yes' && $category->description != '')
                    echo '<span id="categories_des'.$category ->term_id.'" class="category_description">' . esc_html($category->description) . '</span>';
                ?>
             </div>
         
         <?php }?>
            


		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

	<?php do_action( 'woocommerce_after_subcategory', $category); ?>
    </div>
    

</li>