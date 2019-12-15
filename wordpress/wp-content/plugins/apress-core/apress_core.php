<?php
/*
Plugin Name: Apress Core
Plugin URI: http://apressthemes.com/plugins
Description: Apress theme extensions plugin contains custom shortcodes for Visual Composer, custom shortcodes, custom sidebars, custom widgets
Version: 2.1.1
Author: Apress Themes
Author URI: https://themeforest.net/user/apressthemes
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('APRESS_EXTENSIONS_PLUGIN_URL',plugins_url().'/apress-core/');
define('APRESS_EXTENSIONS_PLUGIN_PATH',plugin_dir_path(__FILE__));

define('APCORE_DEMO_EXTENSIONS_PLUGIN_URL',plugins_url().'/apress-importer/');

define('APCORE_DOCUMENTATION_URL','http://apressthemes.com/apress/documentation');

class Apress_Core {
	/**
	 * Core singleton class
	 * @var self - pattern realization
	 */
	private static $_instance;
	
	/**
	 * Get the instane of Apress_Core
	 *
	 * @return self
	 */
	public static function getInstance() {
		if ( ! ( self::$_instance instanceof self ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	
	/**
	 * Constructor
	 *
	 */
	public function __construct() {
		$theme = wp_get_theme()->get( 'Name' );
		if(substr_count($theme, 'Apress') > 0) {
			add_action( 'after_setup_theme', array( $this, 'load_apress_core_text_domain' ) );
			$this->extensionsLoader();
			$this->loadRedux();
			$this->activeCustomizer();
			$this->welcomeApress();
			$this->mataboxGenerator();
			$this->multipleFeaturedImages();
			$this->addActions();
			add_action('after_setup_theme', array($this, 'addVcCustomElements'));
			add_action('init', array($this, 'init'), 10);			
			$this->sidebarGenerator();
			$this->zillaLikes();
			register_activation_hook( __FILE__, array($this,'apressReduxHook',) );
		} else {
			add_action('admin_notices', array($this, '_admin_notice__error'));
		}
	}
	
	
	/**
	 * Enables to add hooks in activation process.
	 *
	 */
	public function apressReduxHook(  ) {
		do_action( 'apress_activation_hook' );
	}
	
	/**
	 * Callback function for WP init action hook. Loads required objects.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function init() {
		
		
		if ( class_exists( 'Vc_Manager' ) && class_exists( 'WPBakeryShortCode' ) ) {
			//$this->init_vc();
			//$this->vc_integration();
			//$this->load_shortcodes();
			$this->vc_apress_templates();
		}
		
	}
	
	public function vc_apress_templates() {

		$apress_templates = new Apress_Vc_Templates_Panel_Editor();
		return $apress_templates->init();

	}
	/**
	 * Register the plugin text domain.
	 *
	 * @access public
	 * @return void
	 */
	public function load_apress_core_text_domain() {
		load_plugin_textdomain( 'apcore', false, APRESS_EXTENSIONS_PLUGIN_PATH . '/languages' );
	}
	/*
	 * Add Redux extensions
	 */
	public function extensionsLoader() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'redux_extensions/extensions-loader.php');
	}
	
	/*
	 * Load Redux Core
	 */
	public function loadRedux() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'redux_framework/ReduxCore/framework.php');
	}
	/*
	 * Load Redux Core Required
	 */
	public function activeCustomizer() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'redux_customizer/active-customizer.php');
	}
	/*
	 * Load Apress Welcome 
	 */
	public function welcomeApress() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'apress_welcome/apress_welcome.php');
	}
	/*
	 * Load Metabox
	 */
	public function mataboxGenerator() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'metaboxes/metaboxes.php');
	}
	/*
	 * Multiple Featured Images
	 */
	public function multipleFeaturedImages() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'multiple-featured-images/multiple-featured-images.php');
	}
	/*
	 * Register custom Functions
	 */
	public function addActions() {
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'actions.php');
	}
	
	/*
	 * Add custom VC elements
	 */
	public function addVcCustomElements() {
		if ( class_exists( 'Vc_Manager' ) && class_exists( 'WPBakeryShortCode' ) ) {						
			add_action('admin_enqueue_scripts', 'apress_vc_styles');
			add_action( 'admin_print_scripts-post.php', 'enqueue', 99 );
			add_action( 'admin_print_scripts-post-new.php', 'enqueue', 99 );
			function apress_vc_styles() {
				// Template Import Css
				wp_enqueue_style('apress_vc', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/css/vc-custom.css', array(), time(), 'all');
				wp_enqueue_style('apress_linea', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/css/fonts/svg/font/all_linea_styles.css', array(), time(), 'all');
			}
			function enqueue() {
				wp_enqueue_script('apress_vc_script', APRESS_EXTENSIONS_PLUGIN_URL.'vc_custom/assets/admin/js/vc-script.js', array('jquery'), '1.0.0', true );
			}
			require_once APRESS_EXTENSIONS_PLUGIN_PATH. 'vc_custom/vc_functions.php';
			require_once APRESS_EXTENSIONS_PLUGIN_PATH. 'mce/zolo_shortcodes_tinymce.php';
			if( class_exists( 'WPBakeryVisualComposerAbstract' )) {
				require_once APRESS_EXTENSIONS_PLUGIN_PATH.'/vc_custom/theme-vc-templates-panel-editor.php';
				require_once APRESS_EXTENSIONS_PLUGIN_PATH.'/vc_custom/theme-studio-templates.php';
			}	
		}
	}
	/*
	 * Sidebar Generator
	 */
	public function sidebarGenerator() {
		// Inlude sidebar generator plugin
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'sidebar_generator.php');
	}	
	/*
	 * Zilla Likes
	 */
	public function zillaLikes() {
		// Include Like plugin
		require_once(APRESS_EXTENSIONS_PLUGIN_PATH.'zilla-likes.php');
	}
	/*
	 * Admin notice text
	 */
	public function _admin_notice__error() {
		echo '<div class="notice notice-error is-dismissible">';
			echo '<p>'. esc_html__( 'Apress Theme Extensions is enabled but not effective. It requires Apress theme in order to work.', 'apcore' ) .'</p>';
		echo '</div>';
	}
}

$Apress_Core = new Apress_Core();