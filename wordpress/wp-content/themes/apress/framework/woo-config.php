<?php
// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) {
    die;
}

// Woocommerce Settings
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
function wp_enqueue_woocommerce_style(){
	wp_register_style( 'woocommerce', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );
	wp_enqueue_style('woo-layout-css', get_template_directory_uri() . '/woocommerce/css/woocommerce-layout.css' );
	if ( class_exists( 'woocommerce' ) ) {
 		wp_enqueue_style( 'woocommerce' );
 	}
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_woocommerce_style' );
add_filter( 'woocommerce_enqueue_styles', 'apress_theme_dequeue_styles' );
function apress_theme_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-layout'] ); 
	return $enqueue_styles;
}
 
add_filter( 'woocommerce_breadcrumb_defaults', 'apress_theme_change_breadcrumb_delimiter' );
function apress_theme_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ' &raquo; ';
	return $defaults;
}

// Display numbeer of products per page.
add_filter('loop_shop_per_page', 'apress_theme_loop_shop_per_page');
function apress_theme_loop_shop_per_page(){
	global $apress_data;

	parse_str($_SERVER['QUERY_STRING'], $params);

	if($apress_data["woo_items"]){
		$prdct_per_page = $apress_data["woo_items"];
	}else{
		$prdct_per_page = 4;
		}

	$pc = !empty($params['product_count']) ? $params['product_count'] : $prdct_per_page;

	return $pc;
}

// Related Products

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action('woocommerce_after_single_product_summary', 'apress_theme_woocommerce_output_related_products', 15);

function apress_theme_woocommerce_output_related_products(){
	global $apress_data;
	if($apress_data["woocommerce_related_columns"]){
		$related_prdct_col = $apress_data["woocommerce_related_columns"];
	}else{
		$related_prdct_col = 4;
	}
	$args = array(
		'posts_per_page' => $related_prdct_col,
		'columns' => $related_prdct_col,
		'orderby' => 'rand'
	);
	
	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

/*** Tiny Cart ***/
if( !function_exists('apress_theme_tiny_cart') ){
	function apress_theme_tiny_cart(){
		$cart_empty = sizeof( WC()->cart->get_cart() ) > 0 ? false : true ;
		$cart_url = wc_get_cart_url();
		$checkout_url = wc_get_checkout_url();
		$cart_number = WC()->cart->cart_contents_count;
		ob_start();
		?>

<div class="zt-tiny-cart-wrapper"> <a class="cart-control" href="<?php echo esc_url($cart_url); ?>" title="<?php esc_html_e('View your shopping bag','apress');?>"> <span class="ic-cart"><span class="ic"></span></span>
  <?php /*?><span class="cart-total"><?php echo WC()->cart->get_cart_subtotal(); ?></span><?php */?>
  <span class="cart-number"><?php echo esc_html($cart_number) ?></span> </a> <span class="cart-drop-icon drop-icon"></span>
  <div class="cart-dropdown-form dropdown-container">
    <div class="form-content">
      <?php if( $cart_empty ): ?>
      <label>
        <?php esc_html_e('Your shopping cart is empty', 'apress'); ?>
      </label>
      <?php else: ?>
      <ul class="cart-list">
		<?php 
        $cart = WC()->cart->get_cart();
        foreach( $cart as $cart_item_key => $cart_item ):
            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            if ( !( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) ){
                continue;
            }
                
            $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
            
        ?>
        <li> <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"> <?php echo  $_product->get_image(); ?> </a>
          <div class="cart-item-wrapper">
            <h3 class="product-name"> <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"> <?php echo  esc_html($_product->get_title()); ?> </a> </h3>
            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . $cart_item['quantity'] . '</span> ', $cart_item, $cart_item_key ); ?> <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="price"><span class="amount icon"> x </span> ' . $product_price . '</span>', $cart_item, $cart_item_key ); ?> <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s" data-key="%s">&times;</a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'apress' ), $cart_item_key ), $cart_item_key ); ?> </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <div class="dropdown-footer">
        <div class="total"><span class="total-title">
          <?php esc_html_e('Subtotal :', 'apress');?>
          </span><?php echo WC()->cart->get_cart_subtotal(); ?> </div>
        <a href="<?php echo esc_url($cart_url); ?>" class="button view-cart">
        <?php esc_html_e('View cart', 'apress'); ?>
        </a> <a href="<?php echo esc_url($checkout_url); ?>" class="button checkout button-secondary">
        <?php esc_html_e('Checkout', 'apress'); ?>
        </a> </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
		return ob_get_clean();
	}
}

add_filter('woocommerce_add_to_cart_fragments', 'apress_theme_tiny_cart_filter');
function apress_theme_tiny_cart_filter($fragments){
	$fragments['.zt-tiny-cart-wrapper'] = apress_theme_tiny_cart();
	return $fragments;
}


//Product categories thumbnail images
if(!function_exists('apress_theme_woocommerce_subcategory_thumbnail')) {
    function apress_theme_woocommerce_subcategory_thumbnail( $category, $image_size ) {
        $image = '';
        $attachment_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
        $width = $height = 0;
  
		$img = wpb_getImageBySize( array(
			'attach_id' => $attachment_id,
			'thumb_size' => $image_size,
			'class' => 'media_post_image_img',
		) );
		$img['thumbnail'] = str_replace( '<img ', '<img ', $img['thumbnail'] );
		$image = $img['thumbnail'];
		echo $image;//Sanitization performed in above lines!
    }
}

//Product categories images
if(!function_exists('apress_theme_woocommerce_subcategory_thumbnail_action')) {
function apress_theme_woocommerce_subcategory_thumbnail_action() {
	remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
	add_action( 'woocommerce_before_subcategory_title', 'apress_theme_woocommerce_subcategory_thumbnail', 10 , 2);
	}
}
apress_theme_woocommerce_subcategory_thumbnail_action();


//Product
if(!function_exists('apress_theme_woocommerce_shop_loop_action')){
	function apress_theme_woocommerce_shop_loop_action(){
		global $product, $woocommerce_loop;
		//Product buttons
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'apcore_woocommerce_shop_loop_buttons', 'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'apcore_woocommerce_shop_addtocart', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 0 );
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 2 );
	}
}

apress_theme_woocommerce_shop_loop_action();


/*---------------------------------
     WooCommerce product title - linked to product page
------------------------------------*/
if ( ! function_exists( 'apress_theme_woocommerce_product_title' ) ) {
    function apress_theme_woocommerce_product_title() {
		global $product;
		echo '<a href="' . get_the_permalink() . '" ><h3 class="entry-title woocommerce-loop-product__title">' . get_the_title() . '</h3></a>';
    }
}

if(!function_exists('apress_theme_woocommerce_product_title_action')){
	function apress_theme_woocommerce_product_title_action(){
		remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
		add_action( 'woocommerce_shop_loop_item_title', 'apress_theme_woocommerce_product_title', 10 );

	}
}

apress_theme_woocommerce_product_title_action();


/*-----------------------------------------------------------------*/
// Woocommerce loop - add-to-cart buttons
/*-----------------------------------------------------------------*/
if ( ! function_exists( 'apress_theme_woocommerce_loop_add_to_cart_link_action' ) ) {
    function apress_theme_woocommerce_loop_add_to_cart_link_action() {
		add_filter('woocommerce_product_add_to_cart_text', 'apress_theme_woocommerce_loop_add_to_cart_text', 100, 1);
        add_filter( 'woocommerce_loop_add_to_cart_link', 'apress_theme_woocommerce_loop_add_to_cart_link', 100, 2 );
	}
}
apress_theme_woocommerce_loop_add_to_cart_link_action();

/* Add a wrapper around add-to-cart link */
if ( ! function_exists( 'apress_theme_woocommerce_loop_add_to_cart_link' ) ) {
    function apress_theme_woocommerce_loop_add_to_cart_link($link, $product) {
		
		//Add some class for compatibility with 3rd-party plugins such as wooZone
		$class = sprintf( 'class="button %s product_type_%s %s"',
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			esc_attr( $product->get_type() ),
			esc_attr( $product->get_type() == 'simple' && 'yes'  === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ? 'ajax_add_to_cart':'')
		);

        $link = str_replace('class="button"', $class, $link);
		$link = str_replace('class="ajax_add_to_cart button"', $class, $link);
		
		return '<span class="product_cart_button product_type_' . $product->get_type() .'" title="Cart">' . $link .'</span>';
	}
}


/* Change inner structure of add-to-cart button */
if ( ! function_exists( 'apress_theme_woocommerce_loop_add_to_cart_text' ) ) {
    function apress_theme_woocommerce_loop_add_to_cart_text($text) {
		return '<span class="wc_tooltip">' . $text .'</span>';
	}
}

/* Wishlist button in Shop page */

if ( ! function_exists( 'apress_theme_shop_page_wishlist_button' ) ) {
    function apress_theme_shop_page_wishlist_button() {
        if (class_exists('YITH_WCWL')){
            global $product,$yith_wcwl,$apress_data; 
			$woo_product_wishlist = isset($apress_data["woo_product_wishlist"]) ? $apress_data["woo_product_wishlist"] : 'on';

            $default_wishlists = is_user_logged_in() ? YITH_WCWL()->get_wishlists( array( 'is_default' => true ) ) : false;

            if( ! empty( $default_wishlists ) ){
                $default_wishlist = $default_wishlists[0]['ID'];
            }
            else{
                $default_wishlist = false;
            }

            //We put 2 buttons inside a tag to similify css codes
            $output  = '<span class="product_shop_wishlist_button">';
            $output .= '<a href="'. esc_url( add_query_arg( "add_to_wishlist", $product->get_id() ) ) .'" rel="nofollow" data-product-id="' . esc_attr($product->get_id()) . '" data-product-type="' . esc_attr($product->get_type()) . '" class="add_to_wishlist shop_wishlist_button ' . esc_attr(($yith_wcwl->is_product_in_wishlist($product->get_id() , $default_wishlist) == true ? "exist_in_wishlist ": "")) .'" title="' . esc_attr__('Add to wishlist','apress') .'"><span class="wc-loading hide"><span class="wc-loading-spiner"></span></span><span class="wc_tooltip">'.esc_attr__('Add to wishlist','apress').'</span></a>';
            $output .= '<a href="'. esc_url($yith_wcwl->get_wishlist_url()) . '" rel="nofollow" class="wishlist-link shop_wishlist_button" style="' . esc_attr(($yith_wcwl->is_product_in_wishlist($product->get_id() , $default_wishlist) == true ? "display:block; ": "")) .'" title="' . esc_attr__('Go to wishlist','apress') .'"><span class="wc_tooltip">'.esc_attr__('Go to wishlist','apress').'</span></a>';
            $output .= '</span>';

            if($woo_product_wishlist == 'on'){echo $output;}
        }
    }
}

if ( ! function_exists( 'apress_theme_shop_page_wishlist_button_action' ) ) {
    function apress_theme_shop_page_wishlist_button_action() {
		add_action('apcore_woocommerce_shop_loop_buttons','apress_theme_shop_page_wishlist_button',11);
	}
}
apress_theme_shop_page_wishlist_button_action();


if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
	function yith_wcwl_ajax_update_count(){
		wp_send_json( 
			array(
				'count' => yith_wcwl_count_all_products()
				)
			);
	}
	
	add_action( 'wp_ajax_apress_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_apress_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}


/* Compare button */

if(!function_exists('apress_theme_add_compare_button')) {
	function apress_theme_add_compare_button() {
		if ( class_exists('YITH_Woocompare') && get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ) {
			global $product,$yith_woocompare,$apress_data;
			$woo_product_compare = isset($apress_data["woo_product_compare"]) ? $apress_data["woo_product_compare"] : 'on';
			
			$product_id = ! is_null( $product ) ? yit_get_prop( $product, 'id', true ) : 0;
			// return if product doesn't exist
			if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
			return;
			$is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;
			if ( ! isset( $button_text ) || $button_text == 'default' ) {
				$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'apress' ) );
				do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text );
				$button_text = apply_filters( 'wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text' );
			}
			if($woo_product_compare == 'on'){
			printf( '<span class="product_compare_button" title="%s"><a href="%s" class="%s" data-product_id="%d" data-tip="%s" rel="nofollow"><span class="wc_tooltip">%s</span></a></span>', $button_text, $yith_woocompare->obj->add_product_url( $product_id ), 'compare tip-top' . ( $is_button == 'button' ? ' button' : '' ), $product_id, $button_text, $button_text );
			}
		}
		
	}
}
			
if(!function_exists('apress_theme_add_yith_compare_button')){
	function apress_theme_add_yith_compare_button(){
		if ( class_exists('YITH_Woocompare') && get_option('yith_woocompare_compare_button_in_products_list') == 'yes' ) {
			global $yith_woocompare;
			remove_action( 'woocommerce_after_shop_loop_item', array( $yith_woocompare->obj, 'add_compare_link' ), 20 );
			add_action( 'apcore_woocommerce_shop_loop_buttons', 'apress_theme_add_compare_button', 20 );

		}
	}
}

apress_theme_add_yith_compare_button();



if(!function_exists('apress_theme_summery_add_compare_link')) {
	function apress_theme_summery_add_compare_link() {
		if(class_exists('YITH_Woocompare'))
		{
			global $product,$yith_woocompare;
			$product_id = ! is_null( $product ) ? yit_get_prop( $product, 'id', true ) : 0;
			// return if product doesn't exist
			if ( empty( $product_id ) || apply_filters( 'yith_woocompare_remove_compare_link_by_cat', false, $product_id ) )
			return;
			$is_button = ! isset( $button_or_link ) || ! $button_or_link ? get_option( 'yith_woocompare_is_button' ) : $button_or_link;
			if ( ! isset( $button_text ) || $button_text == 'default' ) {
				$button_text = get_option( 'yith_woocompare_button_text', __( 'Compare', 'apress' ) );
				do_action ( 'wpml_register_single_string', 'Plugins', 'plugin_yit_compare_button_text', $button_text );
				$button_text = apply_filters( 'wpml_translate_single_string', $button_text, 'Plugins', 'plugin_yit_compare_button_text' );
			}
			
			printf( '<span class="product_compare_button" title="%s"><a href="%s" class="%s" data-product_id="%d" rel="nofollow"><span class="wc_tooltip">%s</span></a></span>', $button_text, $yith_woocompare->obj->add_product_url( $product_id ), 'compare no_djax' . ( $is_button == 'button' ? ' button' : '' ), $product_id, $button_text );
		}
	}
}
			
if(!function_exists('apress_theme_yith_woocompare_button')){
	function apress_theme_yith_woocompare_button(){
		if ( class_exists('YITH_Woocompare') && get_option('yith_woocompare_compare_button_in_product_page') == 'yes' )
		{
			global $yith_woocompare;

			remove_action( 'woocommerce_single_product_summary', array( $yith_woocompare->obj, 'add_compare_link' ), 35 );
			add_action( 'woocommerce_single_product_summary', 'apress_theme_summery_add_compare_link', 35 );
		}
	}
}
apress_theme_yith_woocompare_button();




/*-----------------------------------------------------------------*/
/* WooCommerce Quick view button
/*-----------------------------------------------------------------*/


//Quick View Panel
function apress_qv_panel(){
	$html  = '<div class="apress-qv-opac"></div>';
	$html .= '<div class="apress-qv-panel">';
	$html .= '<div class="apress-qv-preloader apress-qv-opl">';
	$html .= '<div class="apress-qv-speeding-wheel"></div>';
	$html .= '</div>';
	$html .= '<div class="apress-qv-modal"></div>';
	$html .= '</div>';
	echo $html;
}
add_action('wp_footer','apress_qv_panel');



if ( ! function_exists( 'apress_add_quick_view_button' ) ) {
    function apress_add_quick_view_button() {
		
	global $product,$apress_data;   
	$woo_product_quick_view = isset($apress_data["woo_product_quick_view"]) ? $apress_data["woo_product_quick_view"] : 'on';
	$html  = '<span class="product_quickview_button" title="Quick View"><a class="apress-qv-button" apress-qv="'.get_the_ID().'" data-product_id="'.get_the_ID().'">';
	$html .= '<span class="wc_tooltip">'.esc_attr__('Quick View','apress').'</span>';
	$html .= '</a></span>';
	if($woo_product_quick_view == 'on'){echo $html;}

    }
}

add_action('apcore_woocommerce_shop_loop_buttons', 'apress_add_quick_view_button', 15);

// Summary
add_action( 'woocommerce_quick_view_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_quick_view_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_quick_view_product_summary', 'woocommerce_template_single_price', 15 );
add_action( 'woocommerce_quick_view_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_quick_view_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
add_action( 'woocommerce_quick_view_product_summary', 'woocommerce_template_single_meta', 30 );


//Quick View Template.
function apress_qv_ajax(){
	$product_id = (int) $_POST['product_id'];
	$qv_next 	= (int) $_POST['qv_next'];
	$qv_prev 	= (int) $_POST['qv_prev'];

	
	$params = array('p' => $product_id,
					'post_type' => array('product','product_variation'));
	$query = new WP_Query($params);
	if($query->have_posts()){
		while ($query->have_posts()){
			$query->the_post();
			require_once( get_template_directory() . '/woocommerce/quick-view-content.php' );

		}
	}
	wp_reset_postdata();
	die();
}
add_action('wp_ajax_apress_qv_ajax','apress_qv_ajax');
add_action('wp_ajax_nopriv_apress_qv_ajax','apress_qv_ajax');



// WooCommerce Shop Page Product Thumbnail
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'apress_theme_woocommerce_template_loop_product_thumbnail', 10);


if ( ! function_exists( 'apress_theme_woocommerce_template_loop_product_thumbnail' ) ) {
    function apress_theme_woocommerce_template_loop_product_thumbnail() {
        echo apress_theme_woocommerce_get_product_thumbnail();
    } 
}
if ( ! function_exists( 'apress_theme_woocommerce_get_product_thumbnail' ) ) {   
    function apress_theme_woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $product, $woocommerce,$apress_data;
		
		$attachment_ids = $product->get_gallery_image_ids();
		$product_hover_image = isset($apress_data["product_hover_image"]) ? $apress_data["product_hover_image"] : 'off';			
			$output = '<div class="imagewrapper">';
	
			if ( has_post_thumbnail() ) {               
				$output .= get_the_post_thumbnail( $post->ID, $size );              
			} 
			//Apress codes
			if( $product_hover_image == 'on' ) {	
				$first_gallery_img = reset($attachment_ids); //get the first image of gallery
				$image_link = wp_get_attachment_url( $first_gallery_img );	
				if (isset($image_link)){
					$output .= '<div class="zolo_product_hover_thumbnail" style="background:url('.$image_link.');"></div>';
				}
			
			}
			$output .= '<a href="' . get_the_permalink() . '" class="zolo_product_img_link"></a></div>';
			
			return $output;
		}
}

//Social Sharing
add_action('woocommerce_product_meta_end', 'action_woocommerce_after_shop_loop_item', 10, 0);
function action_woocommerce_after_shop_loop_item( ) {   
 echo '<div class="share-box woocommerce_share_box">';
  apress_theme_social_sharing();
 echo '</div>';
 };