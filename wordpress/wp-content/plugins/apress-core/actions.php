<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Custom post types
require_once APRESS_EXTENSIONS_PLUGIN_PATH.'custom-post-types.php';

// Allow shortcodes in widget text
add_filter('widget_text', 'do_shortcode');

function apress_theme_contact_methods( $profile_fields ) {
	
	 // Add new fields
	 $profile_fields['author_title']		= 'Designation';
	 $profile_fields['author_facebook']		= 'Facebook ';
	 $profile_fields['author_gplus']		= 'Google+';
	 $profile_fields['author_instagram']	= 'Instagram';
	 $profile_fields['author_linkedin']		= 'LinkedIn';
	 $profile_fields['author_pinterest']	= 'Pinterest';
	 $profile_fields['author_twitter']		= 'Twitter'; 
	 $profile_fields['author_vk']			= 'VK'; 
	 $profile_fields['author_youtube']		= 'Youtube'; 
	 
	 return $profile_fields;
}
add_filter( 'user_contactmethods', 'apress_theme_contact_methods' );

// Custom Widgets
require_once APRESS_EXTENSIONS_PLUGIN_PATH.'widgets/widgets.php';

// Default apress Sidebars
function apress_theme_default_widget(){
	if( class_exists('Woocommerce') ) {	
	register_sidebar( array(
		'name'          => __( 'Woocommerce Widgets', 'apcore' ),
		'id'            => 'woo-widgets',
		'description'   => __( 'Appears in the shop page', 'apcore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title widget-shop-title"><span>',
		'after_title'   => '</span></h3>',
	) );	
	}
	register_sidebar( array(
		'name'          => __( 'Extended Sidebar Widget Area', 'apcore' ),
		'id'            => 'extended_sidebar',
		'description'   => __( 'Appears on Extended Sidebar.', 'apcore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
	global $apress_data;  
  	$footer_layout = isset($apress_data['footer_layout_columns']) ? $apress_data['footer_layout_columns'] : 'layout1';
	if($footer_layout=='layout1'){
		$footer_layout_columns = 4;
		}elseif($footer_layout=='layout2' || $footer_layout=='layout3' || $footer_layout=='layout4' || $footer_layout=='layout5'){
			$footer_layout_columns = 3;
			}elseif($footer_layout=='layout6' || $footer_layout=='layout7' || $footer_layout=='layout8'){
				$footer_layout_columns = 2;
				}else{
					$footer_layout_columns = 1;
					}
	
	 $columns = (int)$footer_layout_columns + 1;
	 
	 // Register footer widgets
	 for ( $i = 1; $i < $columns; $i++ ) {	
	 	
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Widget %s', 'apcore' ), $i ),
			'id'            => 'footer_widget'.$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title footer_widget_title"><span>',
			'after_title'   => '</span></h3>',
		) );
	 }
	
	$footer_upper_columns = isset($apress_data['footer_upper_columns']) ? $apress_data['footer_upper_columns'] : '';
	$columns = (int)$footer_upper_columns + 1;

        // Register upper footer widgets
		for ( $i = 1; $i < $columns; $i++ ) {
		
		register_sidebar( array(
			'name'          => sprintf( __( 'Upper Footer Widget %s', 'apcore' ), $i ),
			'id'            => 'upper_footer_widget_' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title footer_widget_title"><span>',
			'after_title'   => '</span></h3>',
			) );
		
		}
		
	$footer_lower_columns = isset($apress_data['footer_lower_columns']) ? $apress_data['footer_lower_columns'] : '';
	$columns = (int)$footer_lower_columns + 1;

        // Register lower footer widgets
	for ( $i = 1; $i < $columns; $i++ ) {
	
	register_sidebar( array(
		'name'          => sprintf( __( 'Lower Footer Widget %s', 'apcore' ), $i ),
		'id'            => 'lower_footer_widget_' . $i,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title footer_widget_title"><span>',
		'after_title'   => '</span></h3>',
		) );
	
	}	
	register_sidebar( array(
		'name'          => __( 'Right Sidebar Widget Area', 'apcore' ),
		'id'            => 'right_sidebar',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'apcore' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	
}
add_action( 'widgets_init', 'apress_theme_default_widget' );

//Add options to wp admin topbar
function apress_theme_admin_bar_options() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array(
		'parent' => 'site-name', // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'apress_options', // link ID, defaults to a sanitized title value
		'title' => __('Theme Options', 'apcore'), // link title
		'href' => admin_url( 'themes.php?page=apress_options'), // name of file
		'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
	));
}
add_action( 'wp_before_admin_bar_render', 'apress_theme_admin_bar_options' );

//Featured Images
if( class_exists( 'kdMultipleFeaturedImages' ) ) {
		$i = 2;

		while($i <= 5) {
			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'post',	  // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$args = array(
					'id' => 'featured-image-'.$i,
					'post_type' => 'page', // Set this to post or page
					'labels' => array(
						'name'	  => 'Featured image '.$i,
						'set'	   => 'Set featured image '.$i,
						'remove'	=> 'Remove featured image '.$i,
						'use'	   => 'Use as featured image '.$i,
					)
			);

			new kdMultipleFeaturedImages( $args );

			$i++;
		}

}
// Current Page ID
if( !function_exists('apress_theme_current_page_id') ){
	function apress_theme_current_page_id() {
		global $apress_data, $woocommerce; 
		if ((is_front_page() && is_home()) ||
		(get_option('page_for_posts') && is_archive() && !is_post_type_archive()) && !(is_tax('product_cat') || is_tax('product_tag')) || (get_option('page_for_posts') && is_search()) || is_tag() || is_archive() ) {
		//echo 'Default homepage';
		$cur_id = get_option( 'page_for_posts' );
		} elseif ( is_front_page() ) {
		//echo 'static homepage';
		$cur_id = get_the_ID();
		} elseif ( is_home() ) {  	
		//echo 'blog page';
		$cur_id = get_option( 'page_for_posts' );
		} else {
		//echo 'everything else';
		$cur_id = get_the_ID();
		}
		return $cur_id;
	}
}
