<?php if ( ! defined( 'ABSPATH' ) ) { exit; } 

if ( ! class_exists( 'apress_admin' ) ) {

	class apress_admin{

		function __construct(){

			add_action( 'admin_menu', array( $this, 'apress_admin_menu' ) );
			add_action( 'admin_head', array( $this, 'apress_admin_scripts' ) );
			add_action( 'admin_menu', array( $this, 'edit_admin_menus' ) );
			add_action( 'after_switch_theme', array( $this, 'apress_activation_redirect' ) );

		}


		/**
		 * Add the top-level menu item to the adminbar.
		 */
		function apress_add_wp_toolbar_menu_item( $title, $parent = FALSE, $href = '', $custom_meta = array(), $custom_id = '' ) {

			global $wp_admin_bar;

			if ( current_user_can( 'edit_theme_options' ) ) {
				if ( ! is_super_admin() || ! is_admin_bar_showing() ) {
					return;
				}

				// Set custom ID
				if ( $custom_id ) {
					$id = $custom_id;
				// Generate ID based on $title
				} else {
					$id = strtolower( str_replace( ' ', '-', $title ) );
				}

				// links from the current host will open in the current window
				$meta = strpos( $href, site_url() ) !== false ? array() : array( 'target' => '_blank' ); // external links open in new tab/window
				$meta = array_merge( $meta, $custom_meta );

				$wp_admin_bar->add_node( array(
					'parent' => $parent,
					'id'     => $id,
					'title'  => $title,
					'href'   => $href,
					'meta'   => $meta,
				) );
			}

		}

		/**
		 * Modify the menu
		 */
		function edit_admin_menus() {
			global $submenu;

			if ( current_user_can( 'edit_theme_options' ) ) {
				$submenu['apcore'][0][0] = 'Support'; // Change apress to WELCOME
			}
		}

		/**
		 * Redirect to admin page on theme activation
		 */
		function apress_activation_redirect() {
			if ( current_user_can( 'edit_theme_options' ) ) {
				wp_redirect(admin_url("admin.php?page=apcore"));
			}
		}


		function apress_admin_menu(){

			if ( current_user_can( 'edit_theme_options' ) ) {
				// Work around for theme check
				$apress_menu_page_creation_method    = 'add_menu_page';
				$apress_submenu_page_creation_method = 'add_submenu_page';

				$welcome_screen = $apress_menu_page_creation_method( 'Apress', 'Apress', 'administrator', 'apcore', array( $this, 'apress_support_tab' ), 'dashicons-apress-logo', 3 );

				$demos          = $apress_submenu_page_creation_method( 'apcore', __( 'Install Apress Demos', 'apcore' ), __( 'Install Demos', 'apcore' ), 'administrator', 'apress-demos', array( $this, 'apress_demos_tab' ) );
				$theme_options  = $apress_submenu_page_creation_method( 'apcore', __( 'Theme Options', 'apcore' ), __( 'Theme Options', 'apcore' ), 'administrator', 'themes.php?page=apress_options' );

				add_action( 'admin_print_scripts-'.$welcome_screen, array( $this, 'support_screen_scripts' ) );
				add_action( 'admin_print_scripts-'.$demos, array( $this, 'demos_screen_scripts' ) );
			}
		}


		function apress_support_tab() {
			require_once( APRESS_EXTENSIONS_PLUGIN_PATH.'apress_welcome/screens/support.php' );
		}
		
		function apress_demos_tab() {
			require_once( APRESS_EXTENSIONS_PLUGIN_PATH.'apress_welcome/screens/install-demos.php' );
		}


		function apress_admin_scripts() {
			if ( is_admin() && current_user_can( 'edit_theme_options' ) ) {
			?>
			<style type="text/css">
			@media screen and (max-width: 782px) {
				#wp-toolbar > ul > .apress-menu {
					display: block;
				}

				/*#wpadminbar .apress-menu > .ab-item .ab-icon {
					padding-top: 6px !important;
					height: 40px !important;
					font-size: 30px !important;
				}*/
			}
			/*
			#menu-appearance a[href="themes.php?page=apress_options"] {
				display: none;
			}
			*/
            </style>
            <?php
			}
		}

		function support_screen_scripts(){
			wp_enqueue_style( 'apress_admin_css', APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/css/apress-admin.css' );
		}

		function demos_screen_scripts(){
			wp_enqueue_style( 'apress_admin_css', APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/css/apress-admin.css' );
		}

	}

	new apress_admin;

}

// Omit closing PHP tag to avoid "Headers already sent" issues.
