<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
 * List of the files included into theme
 */
#helpers
require_once get_template_directory().'/framework/helpers.php';

if(is_admin()) {
    require_once get_template_directory().'/framework/plugins/plugins.php';	
}
# Theme options panel
if(!isset($redux_demo)) {
	include_once( get_template_directory() . '/framework/redux/redux-custom-fonts/redux-use-any-font.php' );
	include_once( get_template_directory() . '/framework/redux/redux-custom-fonts/redux-custom-fonts.php' );
	require_once get_template_directory().'/framework/redux/redux-config.php';
}

// Custom Breadcrumb
require_once get_template_directory().'/framework/breadcrumb.php';

// Custom Functions
require_once get_template_directory().'/framework/custom_functions.php';

// Include scripts ans styles
require_once get_template_directory().'/framework/assets.php';


// Mega menu framework
require_once get_template_directory() . '/framework/mega-menu-framework.php';

// Woocommerce support
if(class_exists('WooCommerce')) {
	require_once get_template_directory().'/framework/woo-config.php';
}
