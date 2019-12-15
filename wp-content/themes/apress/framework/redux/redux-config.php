<?php

/* ------------------------------------------------------------------------ */
/* Redux Configuration
/* ------------------------------------------------------------------------ */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "apress_data";

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(		
		'opt_name'             => $opt_name,
		'disable_tracking'		=> true,
		'global_variable' 	   => $opt_name,
		'display_name'         => $theme->get('Name'), 
		'display_version'      => $theme->get('Version'),
		'menu_type'			   => 'submenu',
		'allow_sub_menu'       => true,
		'menu_title'           => esc_html__( 'Theme Options', 'apress' ),
		'page_title'           => esc_html__( 'Theme Options', 'apress' ),
		'async_typography'     => false, // true to append webfont at start
		'disable_google_fonts_link' => false,// Disable this in case you want to create your own google fonts loader
		'admin_bar'            => false,
		'admin_bar_icon'       => 'dashicons-portfolio',
		'admin_bar_priority'   => 50,
		'global_variable'      => 'apress_data',
		'update_notice'        => true,
		'page_parent'          => 'themes.php',
		'page_slug'            => 'apress_options',
		'page_permissions'     => 'manage_options',
		'dev_mode'             => false,
		'customizer'           => false,
		'default_show'         => false,
		'show_options_object'  => false,
		'forced_dev_mode_off'  => false,
    );
	
    Redux::setArgs( $opt_name, $args );
 
 	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Global', 'apress' ),
        'id'               => 'zolo_global',
		'icon'				=> 'el el-puzzle',
        'fields'           => array(     
				array(
					"title"			=> esc_html__("Pre Loader", "apress"),	
					"subtitle"		=> esc_html__("Check the box to disable Pre Loader.", "apress"),
					"id"			=> "body_preloader",					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',					
				),				
				array(
					'id' => 'pagetransition-effect', 
					'type' => 'select', 
					'title' => __('Transition Effect', "apress"),
					'subtitle' => __('Please select your transition effect here', "apress"),
					'options' => array(
						"standard" => "Fade with loading icon",
						"center_mask_reveal" => "Center mask reveal",
						"horizontal_swipe" => "Horizontal swipe",
					),
					'default' => 'standard',
					'required' 		=> array('body_preloader', '=', 'on'),
				),  
				array(
					"title"			=> esc_html__("Pre Loader Image", "apress"),		
					"subtitle"		=> "Upload Preloader Image (70px x 70px).",
					"id"			=> "preloader_icon",
					'type'			=> 'media',					
					'required'		=> array( 'pagetransition-effect', '=', 'standard' ),
				),
				array(
					"title"			=> esc_html__("Pre Loader screen Logo", "apress"),		
					"subtitle"		=> "Upload site Logo or Image for Preloader screen. This will appear above preloader image.",
					"id"			=> "preloader_logo",
					'type'			=> 'media',
					'required'		=> array( 'pagetransition-effect', '=', 'standard' ),
				),
								
				
				array (				
					'title'		=> esc_html__( 'Preloader Background Option','apress' ),
					'id' 		=> 'preloader_bg_color_option',
					'type'     	=> 'button_set', 				
					'options' => array(
						'color' => 'Color', 
						'gradient' => 'Gradient', 
					), 
					'default' => 'color',
					'required' 		=> array('body_preloader', '=', 'on'),
				),
				array(
					"title"			=> esc_html__("Preloader Background Color", "apress"),
					"subtitle"		=> esc_html__("Choose Preloader screen background color", "apress"),
					"id"			=> "preloader_bg_color",
					"default"		=> "#ffffff",
					"type"			=> "color",
					'transparent'	=> false,
					'required'	=> array('preloader_bg_color_option', '=', 'color'),
				),	
				array(
					'id'       => 'preloader_bg_gradient',
					'type'     => 'color_gradient',
					'title'    => esc_html__('Preloader Background Gradient Color', 'apress'),
					'validate' => 'color',
					'default'  => array(
						'from' => '#5295ea',
						'to'   => '#8b79db', 
					),
					'required'	=> array('preloader_bg_color_option', '=', 'gradient'),
				),
				
				array(
					"title"			=> esc_html__("Like Button", "apress"),	
					"subtitle"		=> esc_html__("Enable or disable Like.", "apress"),
					"id"			=> "likebox_on_off",					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',					
				),	
					
				array (
					'id'			=> 'enable_disable_onepage',
					'icon'			=> true,
					'type'			=> 'info',
					'raw'			=> esc_html__('Enable / Disable Onepage', "apress"),
				),
				array(
					'title'		=> esc_html__( 'Enable onepage','apress' ),
					'id'		=> 'enable_onepage',
					'type'		=> 'button_set',
					'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'apress' ),
					'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'  => 'off',
				),				
				array( 
					"title"		=> esc_html__("Tracking Code", "apress"),
					"subtitle"	=> esc_html__("Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme. Please put code inside script tags.", "apress"),
					"id"		=> "google_analytics",
					"type"		=> "ace_editor",
					'mode' => 'html',
					'theme' => 'chrome',
					'options' => array( 'minLines' => 20, 'maxLines' => 60 )
				),
				
        )
    ) );
 
 	// -> START Logo Section	
	
    Redux::setSection( $opt_name, array(
		'title'     => esc_html__('Logo', 'apress'),
		'subtitle'	=> esc_html__( 'Logo Options', 'apress' ),
		'id' 		=> 'zolo_logo_options',		
		'icon'      => 'el el-bulb',		

    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Logo', 'apress' ),
        'id'               => 'zolo_logo',
        'subsection'       => true,
        'fields'           => array(
				array (
					'title'			=> esc_html__( 'Logo', 'apress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'apress' ),
					'id'			=> 'logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
				),
				array (
					'title' => esc_html__( 'Logo (Retina Version @2x) ', 'apress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo. ', 'apress' ),
					'id' 		=> 'logo_retina',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo-2x.png',
						),
				),
				array(
					'title'          => esc_html__( 'Standard Logo dimensions for Retina Logo', 'apress' ),
					'subtitle'       => esc_html__( 'Please enter logo height and width', 'apress' ),
					'id'             => 'retina_logo_height_width',
					'type'           => 'dimensions',
					'units'          => array( 'px' ),   
					'units_extended' => 'true',
					'default'        => array(
						'height'	=> '34px',
						'width'  	=> '84px',
					),
           		),		
				
				array(
					'title'          => esc_html__( 'Logo Margins', 'apress' ),
					'subtitle'       => esc_html__( 'Controls the top/right/bottom/left margins for the logo. Enter values including any valid CSS unit, ex: 30px, 0px, 29px, 0px.', 'apress' ),
					'id'             => 'logo_margin',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'all'            => false,
					'units'          => array( 'px' ),
					'units_extended' => 'true', 
					'default'        => array(
						'padding-top'    => '0px',
						'padding-right'  => '0px',
						'padding-bottom' => '0px',
						'padding-left'   => '0px',
					),
            	),
				array (
					'raw'	=> esc_html__('Sticky Header Logo', 'apress' ),
					'id'	=> 'sticky_header_logo_options',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'		=> esc_html__( 'Sticky Header Logo','apress' ),
					'id'		=> 'sticky_header_logo_showhide',
					'type'		=> 'button_set',
					'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'apress' ),
					'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'  => 'off',
				),
				array (
					'title'			=> esc_html__( 'Sticky Header Logo', 'apress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'apress' ),
					'id'			=> 'sticky_logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('sticky_header_logo_showhide', '=', 'on')
				),
				array (
					'title' => esc_html__( 'Sticky Header Logo (Retina Version @2x) ', 'apress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo. ', 'apress' ),
					'id' 		=> 'retina_sticky_logo',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('sticky_header_logo_showhide', '=', 'on')
				),
				
				array (
					'raw'	=> esc_html__('Mobile Header Logo', 'apress' ),
					'id'	=> 'mobile_header_logo_options',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'    => esc_html__( 'Mobile Header Logo','apress' ),
					'id'       => 'mobile_header_logo_showhide',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
					'default'     => 'off',
				),
				array (
					'title'			=> esc_html__( 'Mobile Header Logo', 'apress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'apress' ),
					'id'			=> 'mobile_logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('mobile_header_logo_showhide', '=', 'on')
				),
				array (
					'title' => esc_html__( 'Mobile Header Logo (Retina Version @2x) ', 'apress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo. ', 'apress' ),
					'id' 		=> 'retina_mobile_logo',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('mobile_header_logo_showhide', '=', 'on')
				),
				
				array(
					'title'          => esc_html__( 'Mobile Logo Margins', 'apress' ),
					'subtitle'       => esc_html__( 'Controls the top/right/bottom/left margins for the Mobile logo. Enter values including any valid CSS unit, ex: 38px, 0px, 38px, 0px.', 'apress' ),
					'id'             => 'mobile_logo_margin',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'all'            => false,
					'units'          => array( 'px' ),
					'units_extended' => 'true', 
					'default'        => array(
						'padding-top'    => '38px',
						'padding-right'  => '0px',
						'padding-bottom' => '38px',
						'padding-left'   => '0px',
					),
            	),
				
				
				
				array (
					'raw'	=> esc_html__('Fullpage Scroll Logo', 'apress' ),
					'id'	=> 'fullpage_scroll_logo_opt',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'    => esc_html__( 'Fullpage Scroll Logo','apress' ),
					'id'       => 'fullpage_scroll_logo_showhide',
					'type'		=> 'button_set',
					'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
					'default'     => 'off',
				),
				array (
					'title'			=> esc_html__( 'Fullpage Scroll Dark Logo', 'apress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'apress' ),
					'id'			=> 'fullpage_scroll_dark_logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('fullpage_scroll_logo_showhide', '=', 'on')
				),
				array (
					'title' => esc_html__( 'Fullpage Scroll Dark Logo(Retina Version @2x) ', 'apress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo. ', 'apress' ),
					'id' 		=> 'retina_fullpage_scroll_dark_logo',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('fullpage_scroll_logo_showhide', '=', 'on')
				),
				array (
					'title'			=> esc_html__( 'Fullpage Scroll Light Logo', 'apress' ),
					'subtitle'		=> esc_html__( 'Select an image file for your logo.', 'apress' ),
					'id'			=> 'fullpage_scroll_light_logo',
					'type'			=> 'media',
					'default'		=> array(
							'url'	=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('fullpage_scroll_logo_showhide', '=', 'on')
				),
				array (
					'title' => esc_html__( 'Fullpage Scroll Light Logo(Retina Version @2x) ', 'apress' ),
					'subtitle' => esc_html__( 'Select an image file for the retina version of the logo. It should be exactly 2x the size of main logo. ', 'apress' ),
					'id' 		=> 'retina_fullpage_scroll_light_logo',
					'type' 		=> 'media',
					'default' 	=> array(
							'url'=> get_template_directory_uri().'/assets/images/headers/logo/logo.png',
						),
					'required' => array('fullpage_scroll_logo_showhide', '=', 'on')
				),
				
				
				array(
					'id'			=> 'light_text_color',
					'title'			=> esc_html__('Light Text Color', 'apress'),
					'default'		=> '#ffffff',
					'type'			=> 'color',
					'transparent'	=> false,
					'required' => array('fullpage_scroll_logo_showhide', '=', 'on')
				),	
				array(
					'id'			=> 'dark_text_color',
					'title'			=> esc_html__('Dark Text Color', 'apress'),
					'default'		=> '#000000',
					'type'			=> 'color',
					'transparent'	=> false,
					'required' => array('fullpage_scroll_logo_showhide', '=', 'on')
				),
				
				
				
				
				
        )
    ) );
 
	Redux::setSection( $opt_name, array(
	'title'     => esc_html__('Layout', 'apress'),
	'subtitle' 	=> esc_html__( 'Site Width', 'apress' ),
	'id' 		=> 'zolo_site_layout',
	'icon'      => 'el el-website',			
	
	) );
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Layout', 'apress' ),
	'id'               => 'zolo_sitewidth',
	'subsection'       => true,
	'fields'           => array(
			array(
				'title'    => esc_html__( 'Site Layout', 'apress' ),					               
				'subtitle' => esc_html__( 'Controls the site layout.', 'apress' ),
				'id'       => 'layout',
				'type'     => 'button_set', 
				'options'  => array(
					'wide' => esc_html__( 'Wide', 'apress' ),
					'boxed' => esc_html__( 'Boxed', 'apress' ),
					'theater' => esc_html__( 'Theater', 'apress' ),
				),
				'default'  => 'wide',
			),	
			array(
				'title'          => esc_html__( 'Site Width', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the overall site width. In px or %, ex: 100% or 1280px.', 'apress' ),
				'id'             => 'site_width',
				'type'           => 'dimensions',
				'units'          => array( 'px', '%' ),   
				'units_extended' => 'true',					
				'height'         => false,
				'default'        => array(
					'width'	=> '1280px',
				)
			),
			array(
				'title'          => esc_html__( 'Site Layout Padding', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the top/bottom padding for site layout. Enter valid value, ex: 10, 10.', 'apress' ),
				'id'             => 'sitelayout_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'			 => false,
				'right'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-top'    => '0px',
					'padding-bottom' => '0px',
				)
			),	
			array(
				'title'          => esc_html__( 'Page Content Padding', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the top/bottom padding for page content', 'apress' ),
				'id'             => 'page_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'			 => false,
				'right'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-top'    => '60px',
					'padding-bottom' => '50px',
				)
			),
			array(
				'title'          => esc_html__( '100% Width Left/Right Padding', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the left/right padding for page content when using 100% site width or 100% width page template. Enter value including any valid CSS unit, ex: 30px.', 'apress' ),
				'id'             => 'hundredp_padding',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'top'			 => false,
				'bottom'          => false,
				'units'          => array( 'px'),
				'default'        => array(
					'padding-left'    => '30px',
					'padding-right' => '30px',
				)
			),
		)
	) );
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Sidebar Layout', 'apress' ),
	'id'               => 'content_sidebar_width',
	'subsection'       => true,
	'fields'           => array(
			array (
				'title'				=>esc_html__( 'Content Width', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the width of the content area. In px or %, ex: 79% or 1010px.', 'apress' ),
				'id'				=> 'content_width',
				'type'          	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  			=> '77%',
					'units'			 =>	'%',
				)
			),
			array (
				'title' 			=> esc_html__( 'Sidebar Width', 'apress' ),
				'subtitle' 				=> esc_html__( 'Controls the width of the sidebar. In px or %, ex: 21% or 270px.', 'apress' ),
				'id' 				=> 'sidebar_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '23%',
					'units'	 =>	'%',
				)
			),
		)
	) );
	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Dual Sidebar Layouts', 'apress' ),
	'id'               => 'content_sidebar_sidebar_width',
	'subsection'       => true,
	'fields'           => array(
			array (
				'title'				=> 'Content Width',
				'subtitle'			=> 'Controls the width of the content area. In px or %, ex: 58% or 740px.',
				'id'				=> 'content_width_2',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '58%',
					'units'	 =>	'%',
				)
			),
			array (
				'title'				=> 'Sidebar 1 Width',
				'subtitle'			=> 'Controls the width of the sidebar 1. In px or %, ex: 21% or 270px.',
				'id'				=> 'sidebar_2_1_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '21%',
					'units'	 =>	'%',
				)
			),
			array (
				'title'				=> 'Sidebar 2 Width',
				'subtitle'			=> 'Controls the width of the sidebar 2. In px or %, ex: 21% or 270px.',
				'id'				=> 'sidebar_2_2_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px', '%' ),   
				'units_extended' 	=> 'true',					
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '21%',
					'units'	 =>	'%',
				)
			),
		)
	) );
	// -> START Header Section	
    Redux::setSection( $opt_name, array(
		'title'     => esc_html__('Header', 'apress'),
		'id' 		=> 'zolo_header',
		'icon'      => 'el el-arrow-up',			

    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Content', 'apress' ),
        'id'               => 'zolo_header_content',
        'subsection'       => true,
        'fields'           => array(
          	array(
				'title'		=> esc_html__( 'Header Position', 'apress' ),
				'subtitle' 	=> esc_html__( 'Select the position of header. Vertical will work on Desktop only.', 'apress' ),
				'id'          => 'header_position',
				'default'     => 'Top',
				'type'        => 'button_set',
				'options'     => array(					
					'Left'  => esc_html__( 'LEFT', 'apress' ),
					'Top'   => esc_html__( 'TOP', 'apress' ),
					'Right' => esc_html__( 'RIGHT', 'apress' ),
					)
			),
			array (				
				'title'		=> esc_html__( 'Use Custom Setting','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to set up own header','apress' ),
				'id' 		=> 'custom_header_dragdrop',
				'type'     	=> 'button_set', 				
				'options' => array(
					'preset' => 'Preset', 
					'custom' => 'Custom', 
				), 
				'default' => 'preset',
			),
            array(
				'title'    => esc_html__('Select a Header Layout', 'apress'), 
                'id'       => 'header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header1.jpg',	
                    	),
                    	'v2'	=> array(
                        'alt'   => 'v2', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header2.jpg',
                   	 	),
                    	'v3'	=> array(
                        'alt'   => 'v3', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header3.jpg',
                    	),
                    	'v4'	=> array(
                        'alt'   => 'v4', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header4.jpg',
                    	),
						'v5'	=> array(
                        'alt'   => 'v5', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header5.jpg',
                    	),
						'v6'	=> array(
                        'alt'   => 'v6', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header6.jpg',
                    	),
						'v7'	=> array(
                        'alt'   => 'v7', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header7.jpg',
                    	),
						'v8'	=> array(
                        'alt'   => 'v8', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/header8.jpg',
                    	),
                ),
				
				'required' => array( 
					array('header_position', '!=', 'Left'), 
					array('header_position', '!=', 'Right'), 
					array('custom_header_dragdrop', '=', 'preset'),
				),
            ),
			array(
				'title'    => esc_html__('Select a Header Layout', 'apress'), 
                'id'       => 'left_header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/left_header.jpg',
                    	)
                ),
				
				'required' => array( 
					array('header_position', '=', 'Left'), 
					array('custom_header_dragdrop', '=', 'preset'),
				),
            ),
			array(
				'title'    => esc_html__('Select a Header Layout', 'apress'), 
                'id'       => 'right_header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/right_header.jpg',
                    	)
                ),
				
				'required' => array( 
					array('header_position', '=', 'Right'), 
					array('custom_header_dragdrop', '=', 'preset'),
				),
            ),
			array(
				'title'    => esc_html__('Header Sections', 'apress'), 
                'id'       => 'custom_header_layout',
                'type'     => 'image_select',
				'default'  => 'v1',
                'options'  => array(
                    	'v1'	=> array(
                        'alt'   => 'v1', 
                        'img'   => get_template_directory_uri().'/assets/images/headers/custom.jpg',	
                    	),                    	
                ),
				
				'required' => array( 
					array('header_position', '=', 'Top'),
					array('custom_header_dragdrop', '=', 'custom'), 
				),
            ),
			array (
				'raw'	=> esc_html__('Top Bar', 'apress' ),
				'id'	=> 'top_bar_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array( 
					array('custom_header_dragdrop', '=', 'custom'), 
				),
			),
			array(
				'title'    =>  esc_html__( 'Top bar Show/Hide','apress' ),
                'subtitle' => esc_html__( 'Select to show or hide','apress' ),
                'id'       => 'top_bar_show_hide',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'apress' ),
					'off'   => esc_html__( 'OFF', 'apress' ),
				),
				'default'     => 'on',
				'required' => array( 
					array('custom_header_dragdrop', '=', 'custom'), 
				),
			),
			array(
				'title'    => esc_html__('Layout', 'apress'), 
                'id'       => 'section_1_layout',
                'type'     => 'image_select',
				'default'  => 's2',
                'options'  => array(
                    	's1'	=> array(
							'alt'   => 's1', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-1.jpg',	
                    	), 
						's2'	=> array(
							'alt'   => 's2', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-2.jpg',	
                    	), 
						's3'	=> array(
							'alt'   => 's3', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-3.jpg',	
                    	),                    	
                ),
				
				'required' => array( 
					array('top_bar_show_hide', '=', 'on'), 
				),
            ),
			array(
				'title'          => esc_html__( 'Column Value', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the width for left, center and right columns.', 'apress' ),
				'id'             => 'column_1_value',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'		 => false,
				'units'          => array( '%'),
				'default'        => array(
					'padding-top'     => '50%', // Left
					'padding-right'   => '0%', // Center
					'padding-bottom'  => '50%', // Right
					'units'          => '%',
				),
				'required' => array( 
					array('top_bar_show_hide', '=', 'on'), 
				),
			),
			array(
				'title'    => esc_html__( 'Top Bar','apress' ),
                'subtitle' => esc_html__( 'You can add multiple drop areas or columns.','apress' ),
                'id'       => 'header_section_one',
                'type'     => 'sorter',                
                'compiler' => 'true',
                'options'  => array(
                    'Top Bar'	=> array(                        
						'tagline'			=> 'Tagline',
						'cart'				=> 'Cart',
						'multilingual'		=> 'Multilingual',
						'extendedsidebar'	=> 'Extended Sidebar',
						'socialinks' 		=> 'Socials',						
						'faxno'				=> 'Fax Number',
						'search'			=> 'Search',
						'special_button'	=> 'Special Button',
						'special_button2'	=> 'Special Button2',
						'separator'			=> 'Separator',
						'text1'				=> 'Text 1',
						'text2'				=> 'Text 2',
						'text3'				=> 'Text 3',
						'working_hours'		=> 'Working Hours',
						'address'			=> 'Address',
                    ),
                    'Left'			=> array(						
						'email'				=> 'Email Address',
						'phoneno' 			=> 'Phone Number',
					),
					'Center'		=> array(),
					'Right'			=> array(
						'topmenu'			=> 'Top Menu',						
					),
					                 
                ),
                'limits'   => array(
                    'Left' => 9,
					'Center' => 9,
					'Right'   => 9,
                ),
				'required' => array( 
					array('top_bar_show_hide', '=', 'on'), 
				),
				
            ),
			array (
				'raw'	=> esc_html__('Vertical Header', 'apress' ),
				'id'	=> 'vertical_header_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array( 
					array('header_position', '=', array( 'Left', 'Right' )),
					array('custom_header_dragdrop', '=', 'custom'), 
				),
			),			
			array(
				'title'    => esc_html__( 'Vertical Header','apress' ),
                'subtitle' => esc_html__( 'Rearrange vertical header','apress' ),
                'id'       => 'vertical-header-arrangement',
                'type'     => 'sorter',                
                'compiler' => 'true',
                'options'  => array(
                    'Disabled'  => array(
						'socialinks' 		=> 'Socials',
						'tagline'			=> 'Tagline',						
						'email'				=> 'Email Address',
						'phoneno' 			=> 'Phone Number',
						'faxno'				=> 'Fax Number',
						'ad_area'			=> 'Ad Area',
                    ),
                    'Enabled' => array(
						'logo'			=> 'LOGO',
						'menu'			=> 'Menu',
					),
                ),
                'limits'   => array(
                    'Enabled' => 8,
                ),
				
				'required' => array( 
					array('header_position', '=', array( 'Left', 'Right' )), 
					array('custom_header_dragdrop', '=', 'custom'),
				),
            ),
			array(
				'raw'	=> esc_html__('Section Two', 'apress' ),
				'id'	=> 'section_two_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array( 
					array('header_position', '=', 'Top'),
					array('custom_header_dragdrop', '=', 'custom'), 
				),
			),
			array(
				'title'    =>  esc_html__( 'Section Two Show/Hide','apress' ),
                'subtitle' => esc_html__( 'Select to show or hide','apress' ),
                'id'       => 'section2_show_hide',				
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
				'required' => array( 
					array('header_position', '=', 'Top'),
					array('custom_header_dragdrop', '=', 'custom'), 
				)					
			),
			array(
				'title'    => esc_html__('Layout', 'apress'), 
                'id'       => 'section_2_layout',
                'type'     => 'image_select',
				'default'  => 's3',
                'options'  => array(
                    	's1'	=> array(
							'alt'   => 's1', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-1.jpg',	
                    	), 
						's2'	=> array(
							'alt'   => 's2', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-2.jpg',	
                    	), 
						's3'	=> array(
							'alt'   => 's3', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-3.jpg',	
                    	),                    	
                ),
				
				'required' => array( 




					array('section2_show_hide', '=', 'on'), 
				)
            ),
			array(
				'title'          => esc_html__( 'Column Value', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the width for left, center and right columns.', 'apress' ),
				'id'             => 'column_2_value',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'		 => false,
				'units'          => array( '%'),
				'default'        => array(
					'padding-top'     => '30%', // Left
					'padding-right'   => '40%', // Center
					'padding-bottom'  => '30%', // Right
					'units'          => '%',
				),
				'required' => array( 
					array('section2_show_hide', '=', 'on'), 
				)
			),
			array(
				'title'    => esc_html__( 'Header Section Two','apress' ),
				'subtitle' => esc_html__( 'You can add multiple drop areas or columns.','apress' ),
				'id'       => 'header_section_two',
				'type'     => 'sorter',                
				'compiler' => 'false',
				'options'  => array(
					'Section Two'  => array(                        
						'tagline'			=> 'Tagline',						
						'multilingual'		=> 'Multilingual',
						'menu'				=> 'Main Menu',
						'cart'				=> 'Cart',
						'email'				=> 'Email Address',
						'phoneno' 			=> 'Phone Number',
						'faxno'				=> 'Fax Number',
						'ad_area'			=> 'Ad Area',
						'extendedsidebar'	=> 'Extended Sidebar',
						'special_button'	=> 'Special Button',
						'special_button2'	=> 'Special Button2',
						'separator'			=> 'Separator',
						'text1'				=> 'Text 1',
						'text2'				=> 'Text 2',
						'text3'				=> 'Text 3',
						'working_hours'		=> 'Working Hours',
						'address'			=> 'Address',
					),
					'Left' => array(
						'socialinks' 	=> 'Socials',						
					),
					'Center' => array(
						'logo'			=> 'LOGO',
					),
					'Right'   => array(
						'search'		=> 'Search',
						'extendedmenu'	=> 'Extended Menu',
					),					
					
				),
				'limits'   => array(
					'Left' => 10,
					'Center' => 10,
					'Right'   => 10,
				),
				'required' => array( 
					array('section2_show_hide', '=', 'on'), 
				)
				
			),
			array (
				'raw'	=> esc_html__('Section Three', 'apress' ),
				'id'	=> 'section_three_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array( 
					array('header_position', '=', 'Top'),
					array('custom_header_dragdrop', '=', 'custom'), 
				),
			),
			array(
				'title'    =>  esc_html__( 'Section Three Show/Hide','apress' ),
                'subtitle' => esc_html__( 'Select to show or hide','apress' ),
                'id'       => 'section3_show_hide',				
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
				'required' => array( 
					array('header_position', '=', 'Top'),
					array('custom_header_dragdrop', '=', 'custom'), 
				)				
			),			
			array(
				'title'    => esc_html__('Layout', 'apress'), 
                'id'       => 'section_3_layout',
                'type'     => 'image_select',
				'default'  => 's3',
                'options'  => array(
                    	's1'	=> array(
							'alt'   => 's1', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-1.jpg',	
                    	), 
						's2'	=> array(
							'alt'   => 's2', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-2.jpg',	
                    	), 
						's3'	=> array(
							'alt'   => 's3', 
							'img'   => get_template_directory_uri().'/assets/images/headers/layout/column-3.jpg',	
                    	),                    	
                ),
				
				'required' => array( 
					array('section3_show_hide', '=', 'on'), 
				),
            ),
			array(
				'title'          => esc_html__( 'Column Value', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the width for left, center and right columns.', 'apress' ),

				'id'             => 'column_3_value',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'left'		 => false,
				'units'          => array( '%'),
				'default'        => array(
					'padding-top'     => '15%', // Left
					'padding-right'   => '70%', // Center
					'padding-bottom'  => '15%', // Right
					'units'          => '%',
				),
				'required' => array( 
					array('section3_show_hide', '=', 'on'), 
				),
			),
			array(
				'title'    => esc_html__( 'Header Section Three','apress' ),
				'subtitle' => esc_html__( 'You can add multiple drop areas or columns.','apress' ),
				'id'       => 'header_section_three',
				'type'     => 'sorter',                
				'compiler' => 'true',
				'options'  => array(
					'Section Three'  => array(   
						'logo' 				=> 'LOGO',                     
						'tagline'			=> 'Tagline',
						'cart'				=> 'Cart',
						'multilingual'		=> 'Multilingual',	
						'ad_area'			=> 'Ad Area',	
						'extendedsidebar'	=> 'Extended Sidebar',	
						'socialinks' 		=> 'Socials',
						'email'				=> 'Email Address',
						'phoneno' 			=> 'Phone Number',
						'faxno'				=> 'Fax Number',	
						'extendedmenu'		=> 'Extended Menu',
						'search'			=> 'Search',
						'special_button'	=> 'Special Button',	
						'special_button2'	=> 'Special Button2',
						'separator'			=> 'Separator',	
						'text1'				=> 'Text 1',
						'text2'				=> 'Text 2',
						'text3'				=> 'Text 3',
						'working_hours'		=> 'Working Hours',
						'address'			=> 'Address',
					),
					'Left' => array(),
					'Center' => array(
						'menu'				=> 'Main Menu',
					),
					'Right'   => array(),
				),
				'limits'   => array(
					'Left' => 10,
					'Center' => 10,
					'Right'   => 10,
				),
				'required' => array( 
					array('section3_show_hide', '=', 'on'), 
				),
				
			),	
			array (
				'raw'			=> 'Header Options',
				'id'			=> 'header_options',
				'icon'			=> true,
				'type'			=> 'info',					
				//'required'		=> array('header_position', '=', 'Top'),
			),			
			array(
				'title'    => esc_html__( 'Activate Centered Logo','apress' ),
                'subtitle' => esc_html__( 'Logo in between Main Menu','apress' ),
                'id'       => 'middle_menu_break_point',			
				'type'     => 'switch',                
                'default'  => false,	
				'required' => array('header_position', '=', 'Top'),			
			),			
			array (
				'title'		=> esc_html__( 'Search Design', 'apress' ),
				'subtitle'	=> esc_html__( 'Select search design from dropdown.', 'apress' ),
				'id'		=> 'search_design',
				'type'		=> 'select',
				'options' 	=> array (
					'default_search_but' => 'Default',
					'expanded_search_but' => 'Expanded',
					'full_screen_search_but' => 'Full Screen',
				),
				'default' 	=> 'full_screen_search_but',	
			),
			array (
				'title'		=> esc_html__( 'Extended Menu Action', 'apress' ),
				'subtitle'	=> esc_html__('Select the action of extended menu.', 'apress' ),
				'id'		=> 'menu_action_change',
				'type'		=> 'select',
				'options'	=> array (
					'fullscreen_menu_open_button'	=> 'Full Screen Menu',
					'vertical_menu'					=> 'Vertical Menu',
					'horizontal_menu'				=> 'Horizontal Menu',
				),
				'default'							=> 'fullscreen_menu_open_button',
				'required' => array('header_position', '=', 'Top'),
			),			
			
			array (
				'title'		=> esc_html__( 'Header Element Separator', 'apress' ),
				'id'		=> 'element_separator',
				'type'		=> 'select',
				'options' 	=> array (
					'oblique_separator' => 'Oblique Separator',
					'small_separator' => 'Small Separator',
					'large_separator' => 'Large Separator',
				),
				'default' 	=> 'small_separator',
				'required' => array( 
					array('custom_header_dragdrop', '=', 'custom'),
					//array('header_position', '=', 'Top'),
				),
			),
			array( 
				'title'				=> esc_html__('Header Element Separator Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the separator color for the  header element.', 'apress'),
				'id'				=> 'element_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),	
			array (
				'raw'	=> esc_html__('Header Contact Details', 'apress' ),
				'id'	=> 'header_contact_info',
				'icon'	=> true,
				'type'	=> 'info',				
			),	
			array (
				'title'		=> esc_html__( 'Phone Number','apress' ),
				'subtitle'	=>esc_html__( 'Phone number will display in header section.','apress' ),
				'id'		=> 'header_phone_number',
				'type'		=> 'text',
				'default'	=> '+1.208.567.1234',
			),
			array (
				'title'		=> esc_html__( 'Fax Number','apress' ),
				'subtitle'	=>esc_html__( 'Phone number will display in header section.','apress' ),
				'id'		=> 'header_fax_number',
				'type'		=> 'text',
				'default'	=> '+44-208-1234567',
			),
			array (
				'title' => esc_html__( 'Email Address For Contact Info','apress' ),
				'subtitle' => esc_html__( 'Email address will display in header section.','apress' ),
				'id' => 'header_email',
				'type' => 'text',
				'validate' => 'email',
                'msg'      => 'custom error message',
                'default'  => 'admin@yoursite.com',
			),
			array (
				'title' => esc_html__( 'Tagline for header', 'apress' ),
				'subtitle' => esc_html__( 'Insert Tagline to display header section.','apress' ),
				'id' => 'header_tagline',
				'type' => 'text',
				'default' => __( 'Insert Tagline Here', 'apress' ),
			),	
			array (
				'title' => esc_html__( 'Working Hours', 'apress' ),
				'subtitle' => esc_html__( 'Working Hours will display in header section.','apress' ),
				'id' => 'header_working_hours',
				'type' => 'text',
				'default' => __( 'Mon-Fri, 8am - 8pm', 'apress' ),
			),
			array (
				'title' => esc_html__( 'Address', 'apress' ),
				'subtitle' => esc_html__( 'Address will display in header section.','apress' ),
				'id' => 'header_address',
				'type' => 'text',
				'default' => __( '123th Demo Street, Cuba, North America', 'apress' ),
			),
			array (
				'title'		=>  esc_html__( 'Multilingual Code', 'apress' ),
				'subtitle'	=>  esc_html__( 'Add PHP code', 'apress' ),
				'id'		=> 'multilingual_code',
				'type'		=> 'textarea',
				'default'	=> '',
			),
			array (
				'title'		=>  esc_html__( 'Header Ad area', 'apress' ),
				'subtitle'	=>  esc_html__( 'Add HTML code for Header', 'apress' ),
				'id'		=> 'header_ad_section',
				'type'		=> 'textarea',
				'default'	=> '<img src="'.get_template_directory_uri().'/assets/images/headers/default_ad_img.jpg">',
			),	
			array (
				'title'		=>  esc_html__( 'Text 1', 'apress' ),
				'subtitle'	=>  esc_html__( 'Add HTML / PHP code for Header', 'apress' ),
				'id'		=> 'header_html_text1',
				'type'		=> 'textarea',
				'default'	=> 'Insert your HTML code',
			),
			array (
				'title'		=>  esc_html__( 'Text 2', 'apress' ),
				'subtitle'	=>  esc_html__( 'Add HTML / PHP code for Header', 'apress' ),
				'id'		=> 'header_html_text2',
				'type'		=> 'textarea',
				'default'	=> 'Insert your HTML code',
			),
			array (
				'title'		=>  esc_html__( 'Text 3', 'apress' ),
				'subtitle'	=>  esc_html__( 'Add HTML / PHP code for Header', 'apress' ),
				'id'		=> 'header_html_text3',
				'type'		=> 'textarea',
				'default'	=> 'Insert your HTML code',
			),
				
				
        )
    ) );
	// -> Header Styling	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Styling', 'apress' ),
        'id'               => 'zolo_header_styling',
        'subsection'       => true,
        'fields'           => array(		
			array(
                'id'       => 'header_background_img',
                'type'     => 'background',
                'title'    => esc_html__( 'Header Background', 'apress' ),
                'subtitle' => esc_html__( 'Controls the background image, background position, background size, etc for the header.', 'apress' ),
				'preview'  => false,
				'default'  => array(
					'background-color' => '#ffffff',
				),
            ),
			array(
				'title'			=> esc_html__( 'Header Typography', 'apress' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for Header Font.', 'apress' ),
				'id'			=> 'header_typography',
				'type'			=> 'typography',
				'font-backup'	=> false,
				'subsets'       => false, 
				'font-size'     => false,
				'line-height'   => false,               
				'letter-spacing'=> true, 
				'color'         => false,
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-style'	=> true,
				'font-weight'   => true,
				'default'		=> array(
					'font-family'	=> 'Open Sans',
					'font-weight'   => 'Normal 400',
					'google'		=> true,
					'font-style'	=> '400',
					'letter-spacing'=>'0.4px',
					'text-transform'=> 'none',
				),
			),
			array(
				'title'		=> esc_html__( '100% Header Width','apress' ),
				'subtitle'	=> esc_html__( 'Check this box to set the header to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.','apress' ),
				'id'		=> 'header_100_width',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',	
				'required' => array( 
					array('header_position', '=', 'Top'),
				)			
			),
			array (
				'raw'	=> esc_html__('Top Bar Styling', 'apress' ),
				'id'	=> 'header_topbar_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
			),
			array (				
				'title'		=> esc_html__( 'Top Bar Styling','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to change default styling.Work for Preset 2, 5, 6 and Custom Header.','apress' ),
				'id' 		=> 'header_topbar_styling_showhide',
				'type'        => 'button_set',
				'options'     => array(					
					'show'  => esc_html__( 'Show', 'apress' ),
					'hide'   => esc_html__( 'Hide', 'apress' ),
					),
				'default'     => 'hide',
			),
			array(
				'title'          => esc_html__( 'Section Height', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the Section One height. In px ex: 40px.', 'apress' ),
				'id'             => 'top_bar_lh',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'         => false,
				'default'        => array(
					'height'	=> '40px',
				),
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Top Bar Padding', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the right/left padding for top bar.', 'apress' ),
                'id'				=> 'top_bar_left_right_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
				'top'				=> false,
				'bottom'				=> false,			
                'default'			=> array(
					'padding-right'		=> '',
					'padding-left'		=> '',
                ),
            ),
			
			array (				
				'title'		=> esc_html__( 'Top Bar Background Color Option','apress' ),
				'id' 		=> 'header_top_bg_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
				'required' 	=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array (
				'title'		=> esc_html__( 'Top Bar Background Color', 'apress' ),
				'subtitle'	=> esc_html__( 'Controls the background color of the top bar in header.', 'apress' ),
				'id'		=> 'header_top_bg_color',
				'type'		=> 'color_alpha',
				'default'  => "rgba(255,255,255,0.0)",
				'transparent'=> false,
				'required'	=> array('header_top_bg_color_option', '=', 'color'),
			),
			array(
				'title'    => esc_html__('Top Bar Background Color', 'apress'),
				'subtitle'	=> esc_html__( 'Controls the background color of the top bar in header.', 'apress' ),
				'id'       => 'header_top_bg_gradient',
				'type'     => 'color_gradient',
				'validate' => 'color',
				'transparent'=> false,
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array('header_top_bg_color_option', '=', 'gradient'),
			),
			
			
			array(
					'title'          => esc_html__( 'Top Bar Border', 'apress' ),
					'subtitle'       => esc_html__( 'This will work with Top Bar only.', 'apress' ),
					'id'             => 'header_top_border',
					'type'			=> 'border',
					'all'      		=> false,
					'color'  		=> false,
					'default'  		=> array(
						'border-style'  => 'solid',
						'border-top'    => '0px',
						'border-right'  => '0px',
						'border-bottom' => '1px',
						'border-left'   => '0px'
					),
					'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
           	),
			array(
				'title'		=>  esc_html__( 'Top Bar Border Width', 'apress' ),
				'subtitle'	=>  esc_html__( 'Select Border Width for top bar.', 'apress' ),
				'id'		=> 'topbar_border_style_width',
				'type'     => 'image_select',
				'options'  => array( 
					'border_style_full_width'	=> array(
					'alt'   => esc_html__('Border Style Full Width',  'apress' ),
					'img'   => get_template_directory_uri().'/assets/images/border-style-full_width.jpg',
					),      	
					'border_style_fix_width'	=> array(
					'alt'   => esc_html__('Border Style Fix Width',  'apress' ),
					'img'   => get_template_directory_uri().'/assets/images/border-style-fix_width.jpg',
					),						
				),
				'default'	=> 'border_style_full_width',
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'			=> esc_html__('Top Bar Border Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the border colors for the Top Bar.', 'apress'),
				'id'			=> 'header_top_border_color',
				'type'			=> 'color_alpha',
				'default'		=> '#eeeeee',
				'transparent'	=> false,
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array (
				'title'			=> esc_html__( 'Top Bar Font Color', 'apress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the Top Bar Font.', 'apress' ),
				'id'			=> 'top_bar_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section One Element Space', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the space of the section One Element like space between social and tagline.', 'apress' ),
				'id'				=> 'section1_element_space',
				'type'				=> 'text',
				'default'			=> '30',
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array (
				'title'		=> esc_html__( 'Header Element Separator', 'apress' ),
				'id'		=> 'section1_element_separator',
				'type'		=> 'select',
				'options' 	=> array (
					'no_separator' => 'No Separator',
					'oblique_separator' => 'Oblique Separator',
					'small_separator' => 'Small Separator',
					'large_separator' => 'Large Separator',
				),
				'default' 	=> 'no_separator',
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'				=> esc_html__('Header Element Separator Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the separator color for the  header element.', 'apress'),
				'id'				=> 'section1_element_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section1_element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			
			array(
				'title'			=> esc_html__('Top Bar Font Size', 'apress'),
				'subtitle'		=> esc_html__('Insert css code', 'apress'),
				'id'			=> 'topbar_font_size',
				'default'		=> '13',
				'type'			=> 'text', 
				'required' 		=> array( 'header_topbar_styling_showhide', '=', 'show' ),
			),
			array (
				'raw'	=> esc_html__('Section Two Styling', 'apress' ),
				'id'	=> 'section_two_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array('header_position', '=', 'Top'),
			),
			array (				
				'title'		=> esc_html__( 'Section Two Styling','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to change default styling. Work for all preset and custom Header','apress' ),
				'id' 		=> 'section_two_styling_showhide',
				'type'        => 'button_set',
				'options'     => array(					
					'show'  => esc_html__( 'Show', 'apress' ),
					'hide'   => esc_html__( 'Hide', 'apress' ),
					),
				'default'     => 'hide',
				'required' => array('header_position', '=', 'Top'),
			),
			array(
				'title'          => esc_html__( 'Section Height', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the Section Two height. In px, ex: 94px.', 'apress' ),
				'id'             => 'section_2_height',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'         => false,
				'default'        => array(
					'height'	=> '94px',
				),
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section Two Padding', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the right/left padding for section two.', 'apress' ),
                'id'				=> 'section_two_left_right_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
				'top'				=> false,
				'bottom'			=> false,
                'default'			=> array(
					'padding-right'		=> '',
					'padding-left'		=> '',
                ),
            ),
			
			array (				
				'title'		=> esc_html__( 'Section Two Background Color Option','apress' ),
				'id' 		=> 'section2_header_bg_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
				'required' 	=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'    => esc_html__('Section Two Background Color', 'apress'),
				'id'       => 'section2_header_bg_gradient',
				'type'     => 'color_gradient',
				'validate' => 'color',
				'transparent'=> false,
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array('section2_header_bg_color_option', '=', 'gradient'),
			),
			array( 
				'title'				=> esc_html__('Section Two Background Color', 'apress'),
				'id'				=> 'header_bg_color',
				'type'				=> 'color_alpha',
				'default' 		 => "rgba(255,255,255,0.0)",
				'transparent'	=> false,
				'required'	=> array('section2_header_bg_color_option', '=', 'color'),
			),

			array(
					'title'          => esc_html__( 'Header Border', 'apress' ),
					'subtitle'       => esc_html__( 'This will work with top header only.', 'apress' ),
					'id'             => 'header_border',
					'type'			=> 'border',
					'all'      		=> false,
					'color'  		=> false,
					'default'  		=> array(
						'border-style'  => 'solid',
						'border-top'    => '0px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
					'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
           	),
			
			array(
				'title'		=>  esc_html__( 'Section Two Border Width', 'apress' ),
				'subtitle'	=>  esc_html__( 'Select Border Width for Section Two.', 'apress' ),
				'id'		=> 'section2_border_style_width',
				'type'     => 'image_select',
				'options'  => array( 
					'border_style_full_width'	=> array(
						'alt'   => esc_html__('Border Style Full Width',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/border-style-full_width.jpg',
					),      	
					'border_style_fix_width'	=> array(
						'alt'   => esc_html__('Border Style Fix Width',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/border-style-fix_width.jpg',
					),						
				),
				'default'	=> 'border_style_full_width',
				'required' 	=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			
			array( 
				'title'				=> esc_html__('Header Border Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the border colors for the header.', 'apress'),
				'id'				=> 'header_border_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			
			array(
				'title'				=> esc_html__( 'Section Two Element Space', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the space of the section Two Element like space between social and tagline.', 'apress' ),
				'id'				=> 'section2_element_space',
				'type'				=> 'text',
				'default'			=> '40',
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array (
				'title'		=> esc_html__( 'Header Element Separator', 'apress' ),
				'id'		=> 'section2_element_separator',
				'type'		=> 'select',
				'options' 	=> array (
					'no_separator' => 'No Separator',
					'oblique_separator' => 'Oblique Separator',
					'small_separator' => 'Small Separator',
					'large_separator' => 'Large Separator',
				),
				'default' 	=> 'no_separator',
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'				=> esc_html__('Header Element Separator Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the separator color for the  header element.', 'apress'),
				'id'				=> 'section2_element_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section2_element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			array(
				'title'			=> esc_html__('Font Size', 'apress'),
				'subtitle'		=> esc_html__('Insert css code', 'apress'),
				'id'			=> 'section2_font_size',
				'default'		=> '16',
				'type'			=> 'text', 
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__('Line Height', 'apress'),
				'subtitle'		=> esc_html__('This will works only tagline', 'apress'),
				'id'			=> 'section2_line_height',
				'default'		=> '26',
				'type'			=> 'text', 
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array (
				'title'			=> esc_html__( 'Font Color', 'apress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the Section Two Font.', 'apress' ),
				'id'			=> 'section2_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array (				
				'title'		=> esc_html__( 'Section Two Shadow','apress' ),
				'id' 		=> 'section_two_shadow_showhide',
				'type'      => 'button_set',
				'options'   => array(					
					'show'  	=> esc_html__( 'On', 'apress' ),
					'hide'   	=> esc_html__( 'Off', 'apress' ),
					),
				'default'   => 'hide',
				'required' 	=> array( 'section_two_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section Two Shadow Parameters', 'apress' ),
                'id'				=> 'section_two_shadow_parameters',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
                'default'			=> array(
					'padding-top'		=> '0',
					'padding-right'		=> '5',
					'padding-bottom'	=> '5',
					'padding-left'		=> '0',
                ),
				'required' 	=> array( 'section_two_shadow_showhide', '=', 'show' ),
            ),
			array( 
				'title'				=> esc_html__('Shadow Color', 'apress'),
				'id'				=> 'section_two_shadow_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#dddddd",
				'transparent'	=> false,
				'required' 	=> array( 'section_two_shadow_showhide', '=', 'show' ),
			),
			
			array (
				'raw'	=> esc_html__('Section Three Styling', 'apress' ),
				'id'	=> 'section_three_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
				'required' => array('header_position', '=', 'Top'),
			),
			array (				
				'title'		=> esc_html__( 'Section Three Styling','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to change default styling. Work for Preset 3, 4, 5, 6 and Custom Header','apress' ),
				'id' 		=> 'section_three_styling_showhide',
				'type'        => 'button_set',
				'options'     => array(					
					'show'  => esc_html__( 'Show', 'apress' ),
					'hide'   => esc_html__( 'Hide', 'apress' ),
					),
				'default'     => 'hide',
				'required' => array('header_position', '=', 'Top'),
			),
			array(
				'title'          => esc_html__( 'Section Height', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the Section Three height. In px or %, ex: 54px.', 'apress' ),
				'id'             => 'section_3_height',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'         => false,
				'default'        => array(
					'height'	=> '54px',
				),
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section Three Padding', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the right/left padding for section three.', 'apress' ),
                'id'				=> 'section_three_left_right_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
				'top'				=> false,
				'bottom'			=> false,
                'default'			=> array(
					'padding-right'		=> '',
					'padding-left'		=> '',
                ),
            ),
			
			
			
			
			
			
			array (				
				'title'		=> esc_html__( 'Section Three Background Color Option','apress' ),
				'id' 		=> 'section3_header_bg_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
				'required' 	=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'    => esc_html__('Section Three Background Color', 'apress'),
				'id'       => 'section3_header_bg_gradient',
				'type'     => 'color_gradient',
				'validate' => 'color',
				'transparent'=> false,
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array('section3_header_bg_color_option', '=', 'gradient'),
			),

			array(
				'title'			=> esc_html__('Section Three Background Color', 'apress'),
				'id'			=> 'navbar_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> "rgba(255,255,255,0.0)",
				'transparent'	=> false,
				'required'	=> array('section3_header_bg_color_option', '=', 'color'),
			),
			
			
			
			
			
			
			array(
					'title'			=> esc_html__( 'Navbar Border', 'apress' ),
					'subtitle'		=> esc_html__( 'Controls the top/right/bottom/left border for navbar', 'apress' ),
					'id'			=> 'navbar_border_width',
					'type'			=> 'border',
					'all'      		=> false,
					'color'  		=> false,
					'default'  		=> array(
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
					'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
           		),
			array(
				'title'		=>  esc_html__( 'Section Three Border Width', 'apress' ),
				'subtitle'	=>  esc_html__( 'Select Border Width for Section Three.', 'apress' ),
				'id'		=> 'section3_border_style_width',
				'type'     => 'image_select',
				'options'  => array( 
					'border_style_full_width'	=> array(
					'alt'   => esc_html__('Border Style Full Width',  'apress' ),
					'img'   => get_template_directory_uri().'/assets/images/border-style-full_width.jpg',
					),      	
					'border_style_fix_width'	=> array(
					'alt'   => esc_html__('Border Style Fix Width',  'apress' ),
					'img'   => get_template_directory_uri().'/assets/images/border-style-fix_width.jpg',
					),						
				),
				'default'	=> 'border_style_full_width',
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__('Navbar Border Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color of the menu when using header 3 or 5.', 'apress'),
				'id'			=> 'navbar_border_color',
				'type'			=> 'color_alpha',
				'default'  		=> '#e5e5e5',
				'transparent'	=> false,
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section Three Element Space', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the space of the section Three Element like space between social and tagline.', 'apress' ),
				'id'				=> 'section3_element_space',
				'type'				=> 'text',
				'default'			=> '40',
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array (
				'title'		=> esc_html__( 'Header Element Separator', 'apress' ),
				'id'		=> 'section3_element_separator',
				'type'		=> 'select',
				'options' 	=> array (
					'no_separator' => 'No Separator',
					'oblique_separator' => 'Oblique Separator',
					'small_separator' => 'Small Separator',
					'large_separator' => 'Large Separator',
				),
				'default' 	=> 'no_separator',
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array( 
				'title'				=> esc_html__('Header Element Separator Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the separator color for the  header element.', 'apress'),
				'id'				=> 'section3_element_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'section3_element_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),			
			array(
				'title'			=> esc_html__('Font Size', 'apress'),
				'subtitle'		=> esc_html__('Insert css code', 'apress'),
				'id'			=> 'section3_font_size',
				'default'		=> '16',
				'type'			=> 'text', 
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'			=> esc_html__('Line Height', 'apress'),
				'subtitle'		=> esc_html__('This will works only tagline', 'apress'),
				'id'			=> 'section3_line_height',
				'default'		=> '26',
				'type'			=> 'text', 
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array (
				'title'			=> esc_html__( 'Font Color', 'apress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the Section Three Font.', 'apress' ),
				'id'			=> 'section3_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array (				
				'title'		=> esc_html__( 'Section Three Shadow','apress' ),
				'id' 		=> 'section_three_shadow_showhide',
				'type'        => 'button_set',
				'options'     => array(					
					'show'  => esc_html__( 'On', 'apress' ),
					'hide'   => esc_html__( 'Off', 'apress' ),
					),
				'default'     => 'hide',
				'required' 		=> array( 'section_three_styling_showhide', '=', 'show' ),
			),
			array(
				'title'				=> esc_html__( 'Section Two Shadow Parameters', 'apress' ),
                'id'				=> 'section_three_shadow_parameters',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
                'default'			=> array(
					'padding-top'	=> '0',
					'padding-right'	=> '5',
					'padding-bottom'=> '5',
					'padding-left'	=> '0',
                ),
				'required' 	=> array( 'section_three_shadow_showhide', '=', 'show' ),
            ),
			array( 
				'title'		=> esc_html__('Shadow Color', 'apress'),
				'id'		=> 'section_three_shadow_color',
				'type'		=> 'color_alpha',
				'default'  	=> "#dddddd",
				'transparent'=> false,
				'required' 	=> array( 'section_three_shadow_showhide', '=', 'show' ),
			),
			//Left, Right header
			array (
				'raw'	=> esc_html__('Vertical Header Styling', 'apress' ),
				'id'	=> 'vertical_header_styling_options',
				'icon'	=> true,
				'type'	=> 'info',
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'				=> esc_html__( 'Element Space', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left spacing for header Element.', 'apress' ),
				'id'				=> 'vertical_element_space',
				'type'				=> 'spacing',
				'mode'				=> 'padding',
				'all'				=> false,
				'units'				=> array( 'px'), 
				'units_extended'	=> false,  
				'display_units'		=> false,			
				'default'			=> array(
					'padding-top'		=> '20px',
					'padding-right'		=> '40px',
					'padding-bottom'	=> '20px',
					'padding-left'		=> '40px',
				),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
            ),
			array (
				'title' => esc_html__( 'Vertical Header Width','apress' ),
				'subtitle' => esc_html__( 'Controls width of the vertical side header.Insert without \'px\' ex: 280', 'apress' ),
				'id' => 'side_header_width',
				'type'           	=> 'dimensions',
				'units'          	=> array( 'px'),
				'height'         	=> false,
				'default'        	=> array(
					'width'  => '280px',
				),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'			=> esc_html__('Font Size', 'apress'),
				'subtitle'		=> esc_html__('Insert css code', 'apress'),
				'id'			=> 'vertical_hd_font_size',
				'default'		=> '16',
				'type'			=> 'text', 
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array(
				'title'			=> esc_html__('Line Height', 'apress'),
				'subtitle'		=> esc_html__('Insert css code', 'apress'),
				'id'			=> 'vertical_hd_line_height',
				'default'		=> '26',
				'type'			=> 'text', 
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array (
				'title'			=> esc_html__( 'Font Color', 'apress' ),
				'subtitle'		=> esc_html__( 'Controls the color of the vertical header Font.', 'apress' ),
				'id'			=> 'vertical_hd_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                ),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array (
				'title' 		=> esc_html__( 'Text Alignment', 'apress' ),
				'subtitle' 		=> esc_html__( 'Select text alignment for vertical header', 'apress' ),
				'id' 			=> 'ver_header_align',
				'type' 			=> 'select',
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
				'options' 		=> array (
					'left' 		=> 'Left',
					'center' 	=> 'Center',
					'right' 	=> 'Right',
				),					
				'default' 		=> 'left',
			),
			array(
				'title'				=> esc_html__( 'Vertical Header Shadow','apress' ),
				'subtitle'			=> esc_html__( 'This will work only for Vertical Header Shadow.','apress' ),
				'id'				=> 'vertical_header_shadow',				
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),				
			),
			array (
				'title' => esc_html__( 'Left / Right Slider Setting','apress' ),
				'subtitle' => esc_html__( 'Select Revolution Slider on page from Page options to show solid or tranparent with box or fullscreen','apress' ),
				'id' => 'left_right_slider_screen',
				'type' => 'select',
				'default'=> 'full_screen_slider',
				'options' => array (
					'boxed_slider' => 'Boxed Slider',
					'full_screen_slider' => 'Full Screen Slider',
				),
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array (
				'raw'	=> esc_html__('Search Styling', 'apress' ),
				'id'	=> 'search_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
			),
			array (
				'title' => esc_html__( 'Height between Search box and Icon','apress' ),
				'subtitle' =>esc_html__( 'Please enter the height between search box and search icon in px. e.g - 50','apress' ),
				'id' => 'searchbox_position',
				'type' => 'text',
				'default' => '54',
				'required'	=> array('search_design', '=', 'default_search_but'),
			),
			array(
				"title" 		=> esc_html__("Search Font Color.", "apress"),
				"subtitle" 		=> esc_html__("Controls the text color of the Full Screen and expanded Search.", "apress"),
				"id" 			=> "fullscreen_expanded_search_font_color",
				"default" 		=> "#555555",
				"type" 			=> "color",
				'transparent' 	=> false,
				'required'	=> array('search_design', '!=', 'default_search_but'),
			),
			array( 
				'title' 		=> esc_html__('Search Background Color and Opacity.', 'apress'),
				'subtitle' 		=> esc_html__('Controls the background color for the Full Screen and expanded Search.', 'apress'),
				'id' 			=> 'fullscreen_expanded_search_bg',
				'type'			=> 'color_alpha',
				'default'  		=> '#ffffff',
				'transparent'	=> false,
				'required'	=> array('search_design', '!=', 'default_search_but'),
			),
			
			array (
				'id'	=> 'extended_menu_options',
				'icon'	=> true,
				'type'	=> 'info',	
				'raw'	=> esc_html__('Extended Menu Options', 'apress' ),			
			),					
			array(
				'title'				=> esc_html__( 'Horizontal Menu Max-Width', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the the max width of the Horizontal Menu', 'apress' ),
				'id'				=> 'horizontal_menu_max_width',
				'type'				=> 'dimensions',
				'units'				=> array( 'px'), 
				'units_extended'	=> 'true',
				'required'			=> array('menu_action_change', '=', 'horizontal_menu'),
				'height'			=>	false,	
				'default'			=> array(
					'width'	=> '800px',
				),
			),
			array(
				'title'				=> esc_html__( 'Vertical Menu Max-Width', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the max width of the Vertical Menu', 'apress' ),
				'id'				=> 'vertical_menu_max_width',
				'type'				=> 'dimensions',
				'units'				=> array( 'px'), 
				'units_extended'	=> 'true',
				'required'			=> array('menu_action_change', '=', 'vertical_menu'),
				'height'			=>	false,	
				'default'			=> array(
					'width'	=> '360px',
				),
			),
			array(
				'title'			=> esc_html__( 'Vertical Menu Space From Top', 'apress' ),
				'subtitle'		=> esc_html__( 'Controls the space from top of the Vertical Menu', 'apress' ),
				'id'			=> 'vertical_menu_space_top',
				'type'			=> 'text',
				'default'		=> '53',
				'required'		=> array('menu_action_change', '=', 'vertical_menu'),
			),
			array(
				'title'			=> esc_html__('Full Screen and Horizontal Menu Background', 'apress'),
				'subtitle'		=> esc_html__('Controls the color of the full screen and horizontal menu background.', 'apress'),
				'id'			=> 'fullscreen_hosizontal_menu_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(255,255,255,1)',
				'transparent'	=> false,	
				'required'		=> array('menu_action_change', '=', array('fullscreen_menu_open_button', 'horizontal_menu' )),
			),
			array(
				'title'			=> esc_html__('Full Screen Menu Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the Color of the full screen menu font.', 'apress'),
				'id'			=> 'fullscreen_menu_font_color',
				'type'			=> 'color_alpha',
				'default'  		=> '#555555',
				'transparent'	=> false,	
				'required'		=> array('menu_action_change', '=', 'fullscreen_menu_open_button'),
			),
			array (
				'raw'	=> esc_html__('Extended Sidebar Styling', 'apress' ),
				'id'	=> 'extended_styling_info',
				'icon'	=> true,
				'type'	=> 'info',
			),
			array (
				'title'		=> esc_html__( 'Extended Sidebar Position','apress' ),
				'subtitle'	=> esc_html__( 'Controls the Extended Sidebar position.','apress' ),
				'id'		=> 'extended_sidebar_position',
				'type'		=> 'select',
				'options'	=> array (
					'right'	=> 'Right',
					'left'	=> 'Left',
				),
				'default'	=> 'right',
				'required'	=> array('header_position', '=', 'Top'),
			),
			array(
				'title'          => esc_html__( 'Extended Sidebar Width', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the Extended Sidebar Width. In px or %, ex: 100% or 1280px.', 'apress' ),
				'id'             => 'extended_sidebar_width',
				'type'           => 'dimensions',
				'units'          => array( 'px', '%'),   
				'units_extended' => 'true',					
				'height'         => false,
				'default'        => array(
					'width'	=> '300px',
				)
			),
			array(
                'id'       => 'extended_sidebar_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Sidebar Background', 'apress' ),
                'subtitle' => esc_html__( 'Controls the background image, background position, background size, etc for the header.', 'apress' ),
				'preview'  => false,
				'background-attachment' => false,
				'default'  => array(
					'background-color' => '#ffffff',
				),
            ),
			array(
				'title' 		=> esc_html__('Extended Sidebar Font Color', 'apress'),
				'subtitle' 		=> esc_html__('Controls the font color of the Extended Sidebar.', 'apress'),
				'id' 			=> 'extended_font_color',
				'default' 		=> '#333333',
				'type' 			=> 'color',
				'transparent' 	=> false,
			),
			array(
				'title'			=> esc_html__('Extended Sidebar Link Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the link color of the Extended Sidebar.', 'apress'),
				'id'			=> 'extended_link_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
                    'regular' => '#333333',
                    'hover'   => '',
                ),
			),
			array(
				'title' 		=> esc_html__('Extended Sidebar Border Color', 'apress'),
				'subtitle' 		=> esc_html__('Controls the Border color of the Extended Sidebar.', 'apress'),
				'id' 			=> 'extended_border_color',
				'default' 		=> '#eee',
				'type' 			=> 'color',
				'transparent' 	=> false,
			),
        )
    ) );
	// -> Sticky Header Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sticky Header', 'apress' ),
        'id'               => 'zolo_sticky_header',
        'subsection'       => true,
        'fields'           => array(			
			array(
				'title'    => esc_html__('Enable Sticky Header', 'apress'),
				'subtitle' => esc_html__('Turn on to show sticky header.', 'apress'),
				'id'       => 'header_sticky_opt',		
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Sticky Effect', 'apress' ),
				'subtitle' 	=> esc_html__( 'Select the sticky effect.', 'apress' ),
				'id'          => 'header_sticky_effect',
				'default'     => 'default',
				'type'        => 'button_set',
				'options'     => array(
					'default'   => esc_html__( 'Default', 'apress' ),
					'shrink'  => esc_html__( 'Shrink', 'apress' ),
					'slide_down' => esc_html__( 'Slide Down', 'apress' )
					),
				'required'	=> array( 
						array('header_sticky_opt', '=', 'on'),
				),	
			),
			array(
				'title'          => esc_html__( 'Sticky Header Height', 'apress' ),
				'subtitle'       => esc_html__( 'Controls the sticky header height. In px ex: 40px.', 'apress' ),
				'id'             => 'sticky_header_srink_height',
				'type'           => 'dimensions',
				'units'          => array( 'px' ),   
				'units_extended' => 'true',	
				'width'          => false,
				'default'        => array(
					'height'	 => '66px',
				),
				'required' 		=> array( 'header_sticky_effect', '=', 'shrink' ),
			),
			array(
					'title'				=> esc_html__( 'Sticky Header Menu Item Padding', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
					'id'				=> 'sticky_header_nav_item_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'		=> '20px',
						'padding-right'		=> '20px',
						'padding-bottom'	=> '20px',
						'padding-left'		=> '20px',
					),
					'required' 		=> array( 'header_sticky_effect', '=', 'shrink' ),
            	),
				array(
					'title'				=> esc_html__( 'Sticky Header Menu Item margin', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left margin for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
					'id'				=> 'sticky_header_nav_item_margin',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'	=> '0px',
						'padding-right'	=> '0px',
						'padding-bottom'=> '0px',
						'padding-left'	=> '0px',
					),
					'required' 		=> array( 'header_sticky_effect', '=', 'shrink' ),
            	),
			array (
				'title'		=> esc_html__( 'Sticky Header Display For Headers' , 'apress' ),
				'subtitle'	=> esc_html__( 'Controls what to displays in the sticky header', 'apress' ),
				'id'		=> 'header_sticky_display',
				'type'		=> 'select',
				'options'	=> array (
					'section2'		=> 'Section Two',
					'section3'		=> 'Section Three',
					'section2_3'	=> 'Section Two + Section Three',
				),
				'default'	=> 'section2',	
				'required'	=> array( 
						array('header_sticky_opt', '=', 'on'),
				),			
			),
			array (				
				'title'		=> esc_html__( 'Sticky Header Background Color Option','apress' ),
				'id' 		=> 'sticky_header_bg_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
				'required' 	=> array('header_sticky_opt', '=', 'on'),
			),
			array(
				'title'    => esc_html__('Sticky Header Background Color', 'apress'),
				'id'       => 'sticky_header_bg_gradient',
				'type'     => 'color_gradient',
				'validate' => 'color',
				'transparent'=> false,
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),

				'required'	=> array('sticky_header_bg_color_option', '=', 'gradient'),
			),
			array( 
				'title'			=> esc_html__('Sticky Header Background Color.', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color for the sticky header.', 'apress'),
				'id'			=> 'header_sticky_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> '#ffffff',
				'transparent'	=> false,
				'required'	=> array('sticky_header_bg_color_option', '=', 'color'),
			),
			array(
				'title'			=> esc_html__('Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the color of the Sticky Header.', 'apress'),
				'id'			=> 'sticky_header_font_color',
				'default'		=> '#555555',
				'type'			=> 'color',
				'transparent'	=> false,
				'required'	=> array('header_sticky_opt', '=', 'on'),
			),

			array (				
				'title'		=> esc_html__( 'Font Hover Color Option','apress' ),
				'id' 		=> 'sticky_header_font_hover_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color',
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
				'required'	=> array('header_sticky_opt', '=', 'on'),
			),
			array(
				'id'			=> 'sticky_header_font_hover_color',
				'title'			=> esc_html__('Font Hover Color', 'apress'),
				'default'		=> '#999999',
				'type'			=> 'color',
				'transparent'	=> false,
				'required'	=> array('sticky_header_font_hover_color_option', '=', 'color'),
			),
			array(
				'id'       => 'sticky_header_font_hover_gradient',
				'title'    => esc_html__('Font Hover Gradient Color', 'apress'),
				'type'     => 'color_gradient',
				'validate' => 'color',
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array( 'sticky_header_font_hover_color_option', '=', 'gradient' ),
			),
			
			array (				
				'title'		=> esc_html__( 'Sticky Header Shadow','apress' ),
				'id' 		=> 'sticky_header_shadow_showhide',
				'type'      => 'button_set',
				'options'   => array(					
					'show'  	=> esc_html__( 'On', 'apress' ),
					'hide'   	=> esc_html__( 'Off', 'apress' ),
					),
				'default'   => 'hide',
			),
			array(
				'title'				=> esc_html__( 'Sticky Header Shadow Parameters', 'apress' ),
                'id'				=> 'sticky_header_shadow_parameters',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
                'default'			=> array(
					'padding-top'		=> '0',
					'padding-right'		=> '5',
					'padding-bottom'	=> '5',
					'padding-left'		=> '0',
                ),
				'required' 	=> array( 'sticky_header_shadow_showhide', '=', 'show' ),
            ),
			array( 
				'title'				=> esc_html__('Shadow Color', 'apress'),
				'id'				=> 'sticky_header_shadow_color',
				'type'				=> 'color_alpha',
				'default'  		=> "rgba(0,0,0,0.2)",
				'transparent'	=> false,
				'required' 	=> array( 'sticky_header_shadow_showhide', '=', 'show' ),
			),
			
        )
    ) );
	// -> Mobile Header Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mobile Header', 'apress' ),
        'id'               => 'zolo_mobile_header',
        'subsection'       => true,
        'fields'           => array(
            array(
				'title'			=> esc_html__('Enable Sticky Header', 'apress'),
				'subtitle'		=> esc_html__('Turn on to show sticky header.', 'apress'),
				'id'			=> 'mobile_header_sticky_show_hide',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',
			),
			array(
				'title'		=> esc_html__('Show Multilingual Options', 'apress'),
				'subtitle'	=> esc_html__('This will show the language switcher on mobile header.', 'apress'),
				'id'		=> 'mobile_header_multilingual',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',	
			),
			array(
				'title'			=> esc_html__('Show top bar on mobile', 'apress'),
				'subtitle'		=> esc_html__('Select Top bar to show or hide', 'apress'),
				'id'			=> 'mobile_header_top_bar_show_hide',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',
			),	
			array(
				'title'				=> esc_html__( 'Mobile header padding', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for mobile header. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
                'id'				=> 'mobile_header_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ), 
                'units_extended'	=> false,  
                'display_units'		=> false,			
                'default'			=> array(
                    'padding-top'		=> '0px',
					'padding-right'		=> '30px',
                    'padding-bottom'	=> '0px',
					'padding-left'		=> '30px',
                ),
            ),
			array (
				'title'			=> 'Mobile Menu Design Style',
				'subtitle'		=> 'Select mobile header design.',
				'id'			=> 'mobile_menu_design',
				'options'		=> array (
					'compact'	=> 'With Menu Bar',
					'modern'	=> 'Without Menu Bar',
				),
				'type'			=> 'select',
				'default'		=> 'compact',
			),
			array(
				'title'			=> esc_html__('Mobile Menu Font Size', 'apress'),
				'subtitle'		=> esc_html__('Insert css value', 'apress'),
				'id'			=> 'mobile_font_size',
				'default'		=> '14',
				'type'			=> 'text',
			),
			array(
				'title'			=> esc_html__('Mobile Menu Line Height', 'apress'),
				'subtitle'		=> esc_html__('Insert css unit', 'apress'),
				'id'			=> 'mob_menu_lh',
				'default'		=> '40',
				'type'			=> 'text',
			),
			array(
				'title'			=> esc_html__('Special Button', 'apress'),
				'subtitle'		=> esc_html__('Select Special Button to show or hide', 'apress'),
				'id'			=> 'mobile_special_button_show_hide',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',
			),
			array(
				'title'			=> esc_html__('Special Button 2', 'apress'),
				'subtitle'		=> esc_html__('Select Special Button 2 to show or hide', 'apress'),
				'id'			=> 'mobile_special_button2_show_hide',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',
			),	
			array (
				'raw'	=> esc_html__('Mobile Header Styling', 'apress' ),
				'id'	=> 'mobile_header_styling_options',
				'icon'	=> true,
				'type'	=> 'info',
			),	
			
			
			
			
			
			
			
			array (				
				'title'		=> esc_html__( 'Mobile Header Background Color Option','apress' ),
				'id' 		=> 'mobile_header_bg_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
			),
			array(
				'title'    => esc_html__('Mobile Header Background Color', 'apress'),
				'id'       => 'mobile_header_bg_gradient',
				'type'     => 'color_gradient',
				'validate' => 'color',
				'transparent'=> false,
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array('mobile_header_bg_color_option', '=', 'gradient'),
			),
			array(
				'title'			=> esc_html__('Mobile Header Background Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color of the mobile header.', 'apress'),
				'id'			=> 'mobile_header_background_color',
				'default'		=> '#ffffff',
				'type'			=> 'color',
				'transparent' 	=> false,
				'required'	=> array('mobile_header_bg_color_option', '=', 'color'),
			),
			
			
					
			
			array(
				'title'			=> esc_html__('Mobile Menu Background Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color of the mobile menu box and dropdown.', 'apress'),
				'id'			=> 'mobile_menu_background_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '',
					'hover'   => '#ffffff',
				),
			),
			array(
				'title'			=> esc_html__('Mobile Navbar Icon Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the color of the mobile nav bar icon.', 'apress'),
				'id'			=> 'mobile_navbar_icon_color',
				'default'		=> '#e5e5e5',
				'type'			=> 'color',
				'transparent'	=> false,
			),
			array(
				'title'			=> esc_html__('Mobile Menu Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the color of the mobile menu items.', 'apress'),
				'id'			=> 'mobile_menu_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '#ffffff',
					'hover'   => '',
				),
			),
			array(
				'title'			=> esc_html__('Mobile Menu Border Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the border, divider and icon colors of the mobile menu.', 'apress'),
				'id'			=> 'mobile_menu_border_color',
				'type'		=> 'color_alpha',
				'default'  => 'rgba(0,0,0,0)',
				'transparent'	=> false,
			),
        )
    ) );
	// -> Header Social Options
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Social', 'apress' ),
        'id'               => 'zolo_header_social',
        'subsection'       => true,
        'fields'           => array(
			array (
				'title'			=> esc_html__( 'Header Social Icons Font Size', 'apress' ),
				'subtitle'		=> esc_html__( 'Select header social Icons font size. Insert without \'px\' ex: 18.', 'apress' ),
				'id'			=> 'header_social_font_size',
				'type'			=> 'text',
				'default'		=> '14',
			),
			
			array (
				'title'			=> esc_html__( 'Header Social Icon Color Option', 'apress' ),
				'subtitle'		=> esc_html__( 'Select a custom social icon color.', 'apress' ),
				'id'			=> 'header_social_links_icon_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                )
			),
			
			array(
                'title'			=> esc_html__('Header Social Icons Boxed', 'apress'),
				'subtitle'		=> esc_html__('Turn on to show header social icons background.', 'apress'),
				'id'			=> 'header_social_links_boxed',
                'type'     => 'button_set',
                'options'  => array(
                    'Yes' => 'Yes',
					'No' => 'No',
                ),
                'default'  => 'No'
            ),
			
			array (
				'title'			=>  esc_html__( 'Header Social Icons Width', 'apress'),
				'subtitle'		=> esc_html__( 'Enter value without px', 'apress'),
				'id'			=> 'header_social_icon_width',
				'type'			=> 'text',
				'default'		=> '34',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array (
				'title'			=> esc_html__( 'Header Social Icons Box Background Color', 'apress'),
				'subtitle'		=> esc_html__( 'Header Social Icons Box Background Color', 'apress'),
				'id'			=> 'header_social_links_box_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(54,56,57,0)',
				'transparent'	=> false,
				'mode'     		=> 'background',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array (
				'title'			=> esc_html__( 'Header Social Icons Box Border Color', 'apress'),
				'id'			=> 'header_social_box_border_color',
				'type'			=> 'color',
				'default'		=> '#363839',
				'transparent'	=> false,
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),
			array (
				'title'			=> esc_html__( 'Header Social Icons Boxed Radius', 'apress'),
				'id'			=> 'header_social_links_boxed_radius',
				'type' 			=> 'slider',
				'default' 		=> 4,
				'min' 			=> 0,
				'step' 			=> 1,
				'max' 			=> 100,
				'display_value' => 'text',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
			),	
			array(
				'title'          => esc_html__( 'Header Social Icons Box Padding', 'apress' ),
                'subtitle'       => esc_html__( 'Controls the top/bottom padding for Header Social Icons Box. Enter values including any valid CSS unit, ex: 8px, 8px', 'apress' ),
                'id'             => 'header_social_boxed_padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
				'required'		=> array( 'header_social_links_boxed', '=', 'Yes' ),
                'all'            => false,
                'units'          => array( 'px' ), 
                'units_extended' => false,  
                'display_units' => false,
				'left' 			=> false,
				'right' 		=> false,				
                'default'       => array(
                    'padding-top'  => '8px',
                    'padding-bottom'   => '8px'
                )
            ),
			array(
				'title'          => esc_html__( 'Header Social Icons Box Margin', 'apress' ),
                'subtitle'       => esc_html__( 'Controls the right/left margin for Header Social Icons Box. Enter values including any valid CSS unit, ex: 12px, 12px', 'apress' ),
                'id'             => 'header_social_boxed_margin',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'px' ), 
                'units_extended' => false,  
                'display_units' => false,
				'top' 			=> false,
				'bottom' 		=> false,				
                'default'       => array(
                    'padding-right'  => '12px',
                    'padding-left'   => '12px'
                )
            ),	
			array (
				'title'		=> esc_html__( 'Header Social Separator', 'apress' ),
				'id'		=> 'header_social_separator',
				'type'		=> 'select',
				'options' 	=> array (
					'no_separator' => 'No Separator',
					'oblique_separator' => 'Oblique Separator',
					'small_separator' => 'Small Separator',
					'large_separator' => 'Large Separator',
				),
				'default' 	=> 'no_separator',
				'required' => array( 'header_position', '=', 'Top' ),
			),
			array( 
				'title'				=> esc_html__('Header Social Separator Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the separator color for the Header Social.', 'apress'),
				'id'				=> 'header_social_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'header_social_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			
			
        )
    ) );
	
	// -> Header Special Button
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Special Button', 'apress' ),
        'id'               => 'zolo_special_button',
        'subsection'       => true,
        'fields'           => array(
			array (
				'raw'	=> esc_html__('Special Button 1', 'apress' ),
				'id'	=> 'header_special_button1',
				'icon'	=> true,
				'type'	=> 'info',				
			),	
			array (
				'title'			=>  esc_html__( 'Special Button Text', 'apress'),
				'id'			=> 'special_button_text',
				'type'			=> 'text',
				'default'		=> 'BUTTON',
			),
			array (
				'title'			=>  esc_html__( 'Special Button Link Url', 'apress'),
				'id'			=> 'special_button_link_url',
				'type'			=> 'text',
				'default'		=> 'https://www.google.co.in/',
			),
			array (
				'title'		=> esc_html__( 'Link Target' , 'apress' ),
				'id'			=> 'special_button_link_target',
				'type'		=> 'select',
				'options'	=> array (
					'_blank'=> 'Blank',
					'_self'	=> 'Self',
				),
				'default'	=> '_blank',		
			),
			array (
				'title'			=> esc_html__( 'Special Button Font Size', 'apress' ),
				'subtitle'		=> esc_html__( 'Enter value without px', 'apress' ),
				'id'			=> 'special_button_font_size',
				'type'			=> 'text',
				'default'		=> '14',
			),
			array (
				'title'			=> esc_html__( 'Special Button Letter Spacing', 'apress' ),
				'subtitle'		=> esc_html__( 'Enter value without px', 'apress' ),
				'id'			=> 'special_button_letter_spacing',
				'type'			=> 'text',
				'default'		=> '0.9',
			),
			array (
				'title'			=> esc_html__( 'Special Button Font Color', 'apress' ),
				'id'			=> 'special_button_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                )
			),
			array(
				'title'				=> esc_html__( 'Special Button Padding', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for Special Button. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
                'id'				=> 'special_button_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> false,			
                'default'			=> array(
                    'padding-top'		=> '10px',
					'padding-right'		=> '25px',
                    'padding-bottom'	=> '10px',
					'padding-left'		=> '25px',
                ),
            ),
			array (				
				'title'		=> esc_html__( 'Special Button Background Option','apress' ),
				'id' 		=> 'special_button_bg_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
			),
			array (
				'title'			=> esc_html__( 'Special Button Background', 'apress'),
				'id'			=> 'special_button_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(54,56,57,0)',
				'transparent'	=> false,
				'mode'     		=> 'background',
				'required'	=> array('special_button_bg_option', '=', 'color'),
			),
			array (
				'title'			=> esc_html__( 'Special Button Hover Background', 'apress'),
				'id'			=> 'special_button_bg_color_h',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(54,56,57,0)',
				'transparent'	=> false,
				'mode'     		=> 'background',
				'required'	=> array('special_button_bg_option', '=', 'color'),
			),
			array(
				'id'       => 'special_button_gradient_bg',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Special Button Background', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
			'required'	=> array('special_button_bg_option', '=', 'gradient'),
			),
			array(
				'title'          => esc_html__( 'Special Button Border', 'apress' ),
				'id'             => 'special_button_border_width',
				'type'			=> 'border',
				'all'      		=> false,
				'color'  		=> false,
				'default'  		=> array(
					'border-style'  => 'solid',
					'border-top'    => '1px',
					'border-right'  => '1px',
					'border-bottom' => '1px',
					'border-left'   => '1px'
				),
				'required'	=> array('special_button_bg_option', '=', 'color'),
           	),
			array (
				'title'			=> esc_html__( 'Special Button Border Color', 'apress'),
				'id'			=> 'special_button_border_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(85,85,85,1)',
				'transparent'	=> false,
				'required'	=> array('special_button_bg_option', '=', 'color'),
			),
			array (
				'title'			=> esc_html__( 'Special Button Hover Border Color', 'apress'),
				'id'			=> 'special_button_border_color_h',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(153,153,153,1)',
				'transparent'	=> false,
				'required'	=> array('special_button_bg_option', '=', 'color'),
			),
			
			array (
				'title'			=> esc_html__( 'Special Button Border Radius', 'apress'),
				'id'			=> 'special_button_border_radius',
				'type' 			=> 'slider',
				'default' 		=> 25,
				'min' 			=> 0,
				'step' 			=> 1,
				'max' 			=> 75,
				'display_value' => 'text'
			),	
			array (
				'title'		=> esc_html__( 'Button Hover Style' , 'apress' ),
				'id'			=> 'special_button_hover_style',
				'type'		=> 'select',
				'options'	=> array (
					'button_hover_style1'	=> 'Button hover style 1',
					'button_hover_style2'	=> 'Button hover style 2',
					'button_hover_style3'	=> 'Button hover style 3',
					'button_hover_style4'	=> 'Button hover style 4',
					'button_hover_style5'	=> 'Button hover style 5',
				),
				'default'	=> 'button_hover_style1',	
				'required'	=> array('special_button_bg_option', '=', 'color'),	
			),
			
			array (
				'title'		=> esc_html__( 'Select color scheme for sticky header' , 'apress' ),
				'subtitle'			=> esc_html__( 'This color scheme will work only on sticky header', 'apress' ),
				'id'			=> 'sticky_header_special_button_color_scheme',
				'type'		=> 'select',
				'options'	=> array (
					'default'	=> 'Dafault',
					'light'		=> 'Light',
					'dark'		=> 'Dark',
				),
				'default'	=> 'button_hover_style1',
			),
			array (
				'title'		=> esc_html__( 'Select color scheme for mobile menu' , 'apress' ),
				'subtitle'			=> esc_html__( 'This color scheme will work only on mobile menu', 'apress' ),
				'id'			=> 'mobile_header_special_button_color_scheme',
				'type'		=> 'select',
				'options'	=> array (
					'default'	=> 'Dafault',
					'light'		=> 'Light',
					'dark'		=> 'Dark',
				),
				'Default'	=> 'dafault',
			),
			
			
			
			
			
			
			array (
				'raw'	=> esc_html__('Special Button 2', 'apress' ),
				'id'	=> 'header_special_button2',
				'icon'	=> true,
				'type'	=> 'info',				
			),	
			array (
				'title'			=>  esc_html__( 'Special Button Text', 'apress'),
				'id'			=> 'special_button2_text',
				'type'			=> 'text',
				'default'		=> 'BUTTON',
			),
			array (
				'title'			=>  esc_html__( 'Special Button Link Url', 'apress'),
				'id'			=> 'special_button2_link_url',
				'type'			=> 'text',
				'default'		=> 'https://www.google.co.in/',
			),
			array (
				'title'		=> esc_html__( 'Link Target' , 'apress' ),
				'id'			=> 'special_button2_link_target',
				'type'		=> 'select',
				'options'	=> array (
					'_blank'=> 'Blank',
					'_self'	=> 'Self',
				),
				'default'	=> '_blank',		
			),
			array (
				'title'			=> esc_html__( 'Special Button Font Size', 'apress' ),
				'subtitle'		=> esc_html__( 'Enter value without px', 'apress' ),
				'id'			=> 'special_button2_font_size',
				'type'			=> 'text',
				'default'		=> '14',
			),
			array (
				'title'			=> esc_html__( 'Special Button Letter Spacing', 'apress' ),
				'subtitle'		=> esc_html__( 'Enter value without px', 'apress' ),
				'id'			=> 'special_button2_letter_spacing',
				'type'			=> 'text',
				'default'		=> '0.9',
			),
			array (
				'title'			=> esc_html__( 'Special Button Font Color', 'apress' ),
				'id'			=> 'special_button2_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#999999',
                )
			),
			array(
				'title'				=> esc_html__( 'Special Button Padding', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for Special Button. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
                'id'				=> 'special_button2_padding',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> false,			
                'default'			=> array(
                    'padding-top'		=> '10px',
					'padding-right'		=> '25px',
                    'padding-bottom'	=> '10px',
					'padding-left'		=> '25px',
                ),
            ),
			array (				
				'title'		=> esc_html__( 'Special Button Background Option','apress' ),
				'id' 		=> 'special_button2_bg_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
			),
			array (
				'title'			=> esc_html__( 'Special Button Background', 'apress'),
				'id'			=> 'special_button2_bg_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(54,56,57,0)',
				'transparent'	=> false,
				'mode'     		=> 'background',
				'required'	=> array('special_button2_bg_option', '=', 'color'),
			),
			array (
				'title'			=> esc_html__( 'Special Button Hover Background', 'apress'),
				'id'			=> 'special_button2_bg_color_h',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(54,56,57,0)',
				'transparent'	=> false,
				'mode'     		=> 'background',
				'required'	=> array('special_button2_bg_option', '=', 'color'),
			),
			array(
				'id'       => 'special_button2_gradient_bg',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Special Button Background', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
			'required'	=> array('special_button2_bg_option', '=', 'gradient'),
			),
			array(
				'title'          => esc_html__( 'Special Button Border', 'apress' ),
				'id'             => 'special_button2_border_width',
				'type'			=> 'border',
				'all'      		=> false,
				'color'  		=> false,
				'default'  		=> array(
					'border-style'  => 'solid',
					'border-top'    => '1px',
					'border-right'  => '1px',
					'border-bottom' => '1px',
					'border-left'   => '1px'
				),
				'required'	=> array('special_button2_bg_option', '=', 'color'),
           	),
			array (
				'title'			=> esc_html__( 'Special Button Border Color', 'apress'),
				'id'			=> 'special_button2_border_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(85,85,85,1)',
				'transparent'	=> false,
				'required'	=> array('special_button2_bg_option', '=', 'color'),
			),
			array (
				'title'			=> esc_html__( 'Special Button Hover Border Color', 'apress'),
				'id'			=> 'special_button2_border_color_h',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(153,153,153,1)',
				'transparent'	=> false,
				'required'	=> array('special_button2_bg_option', '=', 'color'),
			),
			
			array (
				'title'			=> esc_html__( 'Special Button Border Radius', 'apress'),
				'id'			=> 'special_button2_border_radius',
				'type' 			=> 'slider',
				'default' 		=> 25,
				'min' 			=> 0,
				'step' 			=> 1,
				'max' 			=> 75,
				'display_value' => 'text'
			),	
			array (
				'title'		=> esc_html__( 'Button Hover Style' , 'apress' ),
				'id'			=> 'special_button2_hover_style',
				'type'		=> 'select',
				'options'	=> array (
					'button_hover_style1'	=> 'Button hover style 1',
					'button_hover_style2'	=> 'Button hover style 2',
					'button_hover_style3'	=> 'Button hover style 3',
					'button_hover_style4'	=> 'Button hover style 4',
					'button_hover_style5'	=> 'Button hover style 5',
				),
				'default'	=> 'button_hover_style1',	
				'required'	=> array('special_button2_bg_option', '=', 'color'),	
			),
			
			array (
				'title'		=> esc_html__( 'Select color scheme for sticky header' , 'apress' ),
				'subtitle'			=> esc_html__( 'This color scheme will work only on sticky header', 'apress' ),
				'id'			=> 'sticky_header_special_button2_color_scheme',
				'type'		=> 'select',
				'options'	=> array (
					'default'	=> 'Dafault',
					'light'		=> 'Light',
					'dark'		=> 'Dark',
				),
				'default'	=> 'button_hover_style1',
			),
			array (
				'title'		=> esc_html__( 'Select color scheme for mobile menu' , 'apress' ),
				'subtitle'			=> esc_html__( 'This color scheme will work only on mobile menu', 'apress' ),
				'id'			=> 'mobile_header_special_button2_color_scheme',
				'type'		=> 'select',
				'options'	=> array (
					'default'	=> 'Dafault',
					'light'		=> 'Light',
					'dark'		=> 'Dark',
				),
				'Default'	=> 'dafault',
			),
			
			
			
			
			
        )
    ) );
	
	
	// -> Menu Section
    Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Menu', 'apress' ),
        'subtitle'			=> esc_html__( 'Menu', 'apress' ),
        'id'				=> 'zolo_menu',
        'icon'				=> 'el el-lines'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Options', 'apress' ),
        'id'               => 'menu_option',
        'subsection'       => true,
        'fields'           => array(				
				 array (
					 'title'   => esc_html__( 'Menu Design', 'apress' ),
					 'id'   => 'main_menu_design',
					 'type'    => 'image_select',					 
					 'default'  => 'menu1',
					 'options' => array (					 		
							'menu1'	=> array(
							'alt'   => 'menu1', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design1.jpg',
							),
							'menu2' => array(
							'alt'   => 'menu2', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design2.jpg',
							),
							'menu3' => array(
							'alt'   => 'menu3', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design3.jpg',
							),
							'menu4' => array(
							'alt'   => 'menu4', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design4.jpg',
							),	
							'menu_hover_style1' => array(
							'alt'   => 'Menu Hover Style1', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-1.gif',
							),
							'menu_hover_style2' => array(
							'alt'   => 'Menu Hover Style2', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-2.gif',
							),
							'menu_hover_style3' => array(
							'alt'   => 'Menu Hover Style3', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-3.gif',
							),
							'menu_hover_style4' => array(
							'alt'   => 'Menu Hover Style4', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-hover-style-4.gif',
							),				  
						),	
					 'required' => array( 'header_position', '=', 'Top' ),		 
				),

				array (
					 'title'   => esc_html__( 'Vertical Menu Design', 'apress' ),
					 'id'   => 'vertical_menu_design',
					 'type'    => 'image_select',					 
					 'default'  => 'menu5',
					 'options' => array (
							'menu5' => array(
							'alt'   => 'Menu Five', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design5.jpg',
							),
							'menu6' => array(
							'alt'   => 'Menu Six', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design6.jpg',
							),
							'menu7' => array(
							'alt'   => 'Menu Seven', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/menu-design7.jpg',
							),
							'vertical_menu_hover_1' => array(
							'alt'   => 'Menu Hover Style1', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-1.gif',
							),
							'vertical_menu_hover_2' => array(
							'alt'   => 'Menu Hover Style2', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-2.gif',
							),
							'vertical_menu_hover_3' => array(
							'alt'   => 'Menu Hover Style3', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-3.gif',
							),
							'vertical_menu_hover_4' => array(
							'alt'   => 'Menu Hover Style4', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-4.gif',
							),
							'vertical_menu_hover_5' => array(
							'alt'   => 'Menu Hover Style5', 
							'img'   => get_template_directory_uri().'/assets/images/headers/menu/vertical-menu-hover-style-5.gif',
							),
						),	
					'required' => array( 'header_position', '!=', 'Top' ),
				),
				array (
					'raw'	=> esc_html__('Main Menu Styling', 'apress' ),
					'id'	=> 'main_menu_styling_info',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array (
					'title'			=> esc_html__( 'Main Menu Highlight Border', 'apress'),
					'id'			=> 'nav_highlight_border',
					'type' 			=> 'slider',
					'default' 		=> 2,
					'min' 			=> 0,
					'step' 			=> 1,
					'max' 			=> 20,
					'display_value' => 'text'
				),	
				array(
					'title'			=> esc_html__('Main Menu Highlight Border Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the color of the menu hover Highlight Border.', 'apress'),
					'id'			=> 'nav_highlightborder_color',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,			
				),
				array(
					'title'				=> esc_html__( 'Menu Item Padding', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left padding for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
					'id'				=> 'nav_item_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'		=> '40px',
						'padding-right'		=> '20px',
						'padding-bottom'	=> '40px',
						'padding-left'		=> '20px',
					),
            	),
				array(
					'title'				=> esc_html__( 'Menu Item margin', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the top/right/bottom/left margin for Menu Item. Enter values including any valid CSS unit, ex: 0px, 30px, 10px, 30px', 'apress' ),
					'id'				=> 'nav_item_margin',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended'	=> false,  
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'	=> '0px',
						'padding-right'	=> '0px',
						'padding-bottom'=> '0px',
						'padding-left'	=> '0px',
					),
            	),
				array(
					'title'			=> esc_html__('Main Menu Font Color - First Level', 'apress'),
					'subtitle'		=> esc_html__('Controls the text color of first level menu items.', 'apress'),
					'id'			=> 'menu_first_level_color',
					'default'		=> '#555555',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array (				
					'title'		=> esc_html__( 'Main Menu Font Hover Color Option','apress' ),
					'id' 		=> 'menu_first_level_hover_color_option',
					'type'     	=> 'button_set', 				
					'options' => array(
						'color' => 'Color',
						'gradient' => 'Gradient', 
					), 
					'default' => 'color',
				),
				array(
					'id'			=> 'menu_first_level_hover_color',
					'title'			=> esc_html__('Main Menu Font Hover Color', 'apress'),
					'default'		=> '#999999',
					'type'			=> 'color',
					'transparent'	=> false,
					'required'	=> array('menu_first_level_hover_color_option', '=', 'color'),
				),
				array(
					'id'       => 'menu_first_level_hover_gradient',
					'title'    => esc_html__('Main Menu Font Hover Gradient Color', 'apress'),
					'type'     => 'color_gradient',
					'validate' => 'color',
					'default'  => array(
						'from' => '#5295ea',
						'to'   => '#8b79db', 
					),
					'required'	=> array( 'menu_first_level_hover_color_option', '=', 'gradient' ),
				),

				array(
					'title'			=> esc_html__('Main Menu Background Color - First Level', 'apress'),

					'subtitle'		=> esc_html__('This will only work with vertical expanding menu.', 'apress'),
					'id'			=> 'vertical_menu_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.8)',
					'transparent'	=> false,
					'required' => array( 'menu_action_change', '=', 'vertical_menu' ),
					
				),
				array(
					'title'			=> esc_html__('Main Menu Hover Background Color - First Level', 'apress'),
					'subtitle'		=> esc_html__('Controls the color of the menu hover background color  First Level.', 'apress'),
					'id'			=> 'menu_hover_bg_first_level',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,			
				),
				array (
				'title'		=> esc_html__( 'Menu Separator', 'apress' ),
				'id'		=> 'menu_separator',
				'type'		=> 'select',
				'options' 	=> array (
					'no_separator' => 'No Separator',
					'oblique_separator' => 'Oblique Separator',
					'small_separator' => 'Small Separator',
					'large_separator' => 'Large Separator',
				),
				'default' 	=> 'no_separator',
				'required' => array( 'header_position', '=', 'Top' ),
			),
			array( 
				'title'				=> esc_html__('Menu Separator Color', 'apress'),
				'subtitle'			=> esc_html__('Controls the separator color for the menu item.', 'apress'),
				'id'				=> 'menu_separator_color',
				'type'				=> 'color_alpha',
				'default'  		=> "#e5e5e5",
				'transparent'	=> false,
				'required' 		=> array( 'menu_separator', '=', array('oblique_separator', 'small_separator', 'large_separator') ),
			),
			array(
				'title'			=> esc_html__('Vertical Header Menu Separator', 'apress'),
				'subtitle'		=> esc_html__('Controls the color of the Vertical Header menu separator.', 'apress'),
				'id'			=> 'vertical_header_menu_sep_color',
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(204,204,204,0.0)',
				'transparent'	=> false,	
				'required' 		=> array( 'header_position', '=', array( 'Left', 'Right' ) ),
			),
			array (
				'raw' => esc_html__('Main Menu Typography', 'apress' ),
				'id' => 'main_menu_typography_info',
				'type' => 'info',
			),
			array(
				'title'       => esc_html__( 'Menus Typography', 'apress' ),
				'subtitle' => esc_html__( 'These settings control the typography for all menus.', 'apress' ),
				'id'          => 'nav_typography',
				'type'        => 'typography',
				'font-backup' => true,
				'subsets'       => true, 
				'font-size'     => true,
				'line-height'   => true,               
				'letter-spacing'=> true, 
				'color'         => false,
				'text-align'	=> true, 
				'text-transform'=> true,
				'font-style'  => true,
				'font-weight'   => true,
				'default'     => array(
					'font-family'	=> 'Montserrat',
					'google'		=> true,
					'font-size'		=> '14px',
					'line-height'	=> '14px',
					'text-align'	=> 'inherit',
					'font-style'	=> '400',
					'font-weight'   => 'Normal 400',
					'letter-spacing'=>'1px',
					'text-transform'=> 'uppercase',
					'font-backup'	=> "'Bookman Old Style', serif",
				),
			),				
        )
    ) );
	// -> Menu Dropdown Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Menu Dropdown', 'apress' ),
        'id'               => 'main_dropdown_menu_style',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'				=> esc_html__( 'Menu Dropdown Width', 'apress' ),
					'id'				=> 'dropdown_menu_width',
					'type'				=> 'dimensions',
					'units'				=> 'px', 
					'units_extended'	=> 'true',
					'height'			=>	false,	
					'default'			=> array(
						'width'	=> '160px',
					),
           		),
				array (
					'title' 		=> esc_html__( 'Dropdown loading design', 'apress' ),
					'subtitle' 		=> esc_html__( 'Select Drop down loading design Style', 'apress' ),
					'id' 			=> 'dropdown_loading',
					'type' 			=> 'select',
					'options' => array (
						'dropdown_loading_fade' => 'Fade',
						'dropdown_loading_slide_up' => 'Slide Up',
						'dropdown_loading_slide_down' => 'Slide Down',
					),					
					'default' 		=> 'dropdown_loading_fade',
				),
				array(
					'title'			=> esc_html__('Main Menu Dropdown Font Size', 'apress'),
					'subtitle'		=> esc_html__('Insert css value', 'apress'),
					'id'			=> 'nav_dropdown_font_size',
					'default'		=> '14',
					'type'			=> 'text',
				),
				array (
					'title' 		=> esc_html__( 'Dropdown Menu Indicator', 'apress' ),
					'subtitle' 		=> esc_html__( 'Select Drop Down Menu Indicator show/hide', 'apress' ),
					'id' 			=> 'dropdown_indicator',
					'type' 			=> 'select',
					'options' 		=> array (
						'dropdown_indicator_hide' => 'Hide',
						'dropdown_indicator_show' => 'Show',
					),					
					'default' 		=> 'dropdown_indicator_hide',
				),
				array(
					'title'				=> esc_html__( 'Menu Dropdown Top Border', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the border Height of the menu highlight bar.', 'apress' ),
					'id'				=> 'menu_dropdown_topborder',
					'type'				=> 'border',
					'all'      			=> false,
					'right' 			=> false, 
					'bottom' 			=> false,
					'left' 				=> false,
					'default'			=> array(
						'border-color'  => '',
						'border-style'  => 'solid',
						'border-top'    => '3px',
						
					),
           		),
				array(
					'title'				=> esc_html__( 'Menu Dropdown Item Top/Bottom Padding', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the top/bottom padding for Main Menu Dropdown. Enter values including any valid CSS unit, ex: 0px, 30px', 'apress' ),
					'id'				=> 'dropdown_item_top_bottom_pad',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px' ), 
					'units_extended'	=> false, 
					'right'				=> false,
					'left'				=> false, 
					'display_units'		=> false,			
					'default'			=> array(
						'padding-top'		=> '10px',
						'padding-bottom'	=> '10px',
					),
            	),
				array(
					'title'			=> 'Menu Dropdown Shadow',
					'subtitle'		=> 'Check to enable the dropshadow for menu dropdowns, uncheck to disable.',
					'id'			=> 'megamenu_shadow',	
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'			=> esc_html__('Menu Font Color - Sublevels', 'apress'),
					'subtitle'		=> esc_html__('Controls the color of the menu font sublevels.', 'apress'),
					'id'			=> 'submenu_font_color',
					'default'		=> '#333333',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array (				
					'title'		=> esc_html__( 'Menu Font Hover Color Option - Sublevels','apress' ),
					'id' 		=> 'submenu_font_hover_color_option',
					'type'     	=> 'button_set', 				
					'options' => array(
						'color' => 'Color',
						'gradient' => 'Gradient', 
					), 
					'default' => 'color',
				),
				array(
					'id'			=> 'submenu_font_hover_color',
					'title'			=> esc_html__('Menu Font Hover Color - Sublevels', 'apress'),
					'default'		=> '#333333',
					'type'			=> 'color',
					'transparent'	=> false,
					'required'	=> array('submenu_font_hover_color_option', '=', 'color'),
				),
				array(
					'id'       => 'submenu_font_hover_gradient',
					'title'    => esc_html__('Menu Font Hover Gradient Color - Sublevels', 'apress'),
					'type'     => 'color_gradient',
					'validate' => 'color',
					'default'  => array(
						'from' => '#5295ea',
						'to'   => '#8b79db', 
					),
					'required'	=> array( 'submenu_font_hover_color_option', '=', 'gradient' ),
				),
				array(
					'title'			=> esc_html__('Menu Background Color - Sublevels', 'apress'),
					'subtitle'		=> esc_html__('Controls the color of the menu sublevel background.', 'apress'),
					'id'			=> 'menu_sub_bg_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#ffffff',
						'hover'   => '#f8f8f8',
					)
				),
				array(
					'title'			=> esc_html__('Menu Separator - Sublevels', 'apress'),
					'subtitle'		=> esc_html__('Controls the color of the menu separator sublevels.', 'apress'),
					'id'			=> 'menu_sub_sep_color',
					'default'		=> '#dcdadb',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Menu Icon Color(Cart,Search and Extended Menu Icon)', 'apress'),
					'subtitle'		=> esc_html__('Controls the text color of the Menu Icon.', 'apress'),
					'id'			=> 'menu_icon_color',
					'default'		=> '#555555',
					'type'			=> 'color',
					'transparent'	=> false,
				),
		
		
		
		)
    ) );
	// -> Mega Menu Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Mega Menu', 'apress' ),
        'id'               => 'main_mega_menu',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'				=> esc_html__( 'Mega Menu Max-Width', 'apress' ),
					'subtitle'			=> esc_html__( 'Controls the the max width of the mega menu', 'apress' ),
					'id'				=> 'megamenu_max_width',
					'type'				=> 'dimensions',
					'units'				=> array( 'px'), 
					'units_extended'	=> 'true',
					'height'			=>	false,	
					'default'			=> array(
						'width'	=> '1280',
					),
           		),			
				array (
					'title'			=> 'Mega Menu Column Title Size',
					'subtitle'		=> 'Set the font size for mega menu column titles (menu 2nd level labels). Insert without \'px\' ex: 18',
					'id'			=> 'megamenu_title_size',
					'type'			=> 'text',					
					'default'		=> '18',
				),
		
		
		)
    ) );
	// -> Top Menu Options	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Top Menu Style', 'apress' ),
        'id'               => 'top_menu_style',
        'subsection'       => true,
        'fields'           => array(
			array(
					'title'				=> esc_html__( 'Top Menu Dropdown Width', 'apress' ),
					'id'				=> 'topmenu_dropwdown_width',
					'type'				=> 'dimensions',
					'units'				=> array( 'px' ), 
					'units_extended'	=> 'true',
					'height'			=>	false,	
					'default'			=> array(
						'width'	=> '160',
					),
           		),	
		 	array (
				'title' => esc_html__( 'Top Bar Menu Font Color - Sublevels', 'apress' ),
				'subtitle' => esc_html__( 'Controls the text color of the secondary menu font sublevels.', 'apress' ),
				'id' => 'header_top_menu_sub_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '#747474',
					'hover'   => '#333333',
				),
			),
			array (
				'title' => esc_html__( 'Top Bar Menu Background Color - Sublevels', 'apress' ),
				'subtitle' => esc_html__( 'Controls the background color of the secondary menu sublevels.', 'apress' ),
				'id' => 'header_top_sub_bg_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'  => array(
					'regular' => '#ffffff',
					'hover'   => '#fafafa',
				),
			),
			array (
				'title' => esc_html__( 'Top Menu Border	- Sublevels', 'apress' ),
				'subtitle' => esc_html__( 'Controls the border color of the secondary menu sublevels.', 'apress' ),
				'id' => 'header_top_menu_sub_sep_color',
				'type' => 'color',
				'transparent' => false,
				'default' => '#e5e5e5',
			),		 	
		 	
		 )
    ) );

	// -> Page Title Bar Section
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Title Bar', 'apress' ),
        'id'               => 'zolo_page_title_bar',
        'fields'           => array(
				array(
					'title'		=> esc_html__( 'Page Title Bar','apress' ),
					'subtitle' 	=> esc_html__( 'Controls how the page title bar displays. ','apress' ),
					'id' 		=> 'page_title_bar',	
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				
				
				 array(
				'title'    => esc_html__('Style', 'apress'), 
                'id'       => 'page_titlebar_style',
                'type'     => 'image_select',
				'default'  => 'titlebar_style1',
                'options'  => array(
                    	'titlebar_style1'	=> array(
                        'alt'   => 'titlebar_style1', 
                        'img'   => get_template_directory_uri().'/assets/images/admin/titlebar/titlebar_style1.jpg',	
                    	),
                    	'titlebar_style2'	=> array(
                        'alt'   => 'titlebar_style2', 
                        'img'   => get_template_directory_uri().'/assets/images/admin/titlebar/titlebar_style2.jpg',
                   	 	),
                ),
				'required'		=> array('page_title_bar', '=', 'on'),					
            ),
				
				
				array(
					'title' 	=> esc_html__( '100% Page Title Width', 'apress' ),
					'subtitle' 	=> esc_html__( 'Turn on to have the page title area display at 100% width according to the window size. Turn off to follow site width.','apress' ),
					'id' 		=> 'page_title_100_width',
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',
				),
				array(
					'title' 		=> esc_html__( 'Page Title Bar Height', 'apress' ),
					'subtitle' 		=> esc_html__( 'Insert without \'px\' ex: 100', 'apress' ),
					'id'            => 'page_title_height',
					'type'          => 'dimensions',
					'units'         => array( 'px'), 
					'units_extended'=> 'true',
					'width'			=>	false,	
					'default'       => array(
						'height'  => '100px',
						),
            	),
				array(
				'title'			=> esc_html__( 'Page Title Bar Padding.', 'apress' ),
				'subtitle'		=> esc_html__( 'Controls the top/right/bottom/left padding for Page Title Bar.', 'apress' ),
                'id'			=> 'page_title_padding',
                'type'			=> 'spacing',
                'mode'			=> 'padding',
                'all'			=> false,
                'units'			=> array( 'px'), 
                'units_extended'=> false,  			
					'default'	=> array(
						'padding-top'	=> '30px',
						'padding-right'	=> '30px',
						'padding-bottom'=> '30px',
						'padding-left'	=> '30px',
					),
           		),
				array(
				'title'			=> esc_html__( 'Page Title Bar Text Alignment', 'apress' ),
				'subtitle'		=> esc_html__( 'Choose the title and subheader text alignment', 'apress' ),
				'id'			=> 'page_title_alignment',
				'type'			=> 'button_set',
				'options'		=> array(
					'left'		=> 'Left',
					'center'	=> 'Center',
					'right'		=> 'Right'
					),
				'default'		=> 'left'
				),
				array (
					'title'		=> esc_html__( 'Page Title Bar Background Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Choose the title bar Background Position. Below will start page title bar after header and From top will show page title bar from top same as that of header position.', 'apress' ),
					'id'		=> 'titlebar_bg_position',
					'type'		=> 'select',
					'options'	=> array (
						'below'		=> 'Below',
						'from_top'	=> 'From Top',
					),										
					'default'	=> 'below',
				),
				array(					
					'title'    => esc_html__( 'Page Title Bar Background', 'apress' ),
					'subtitle' => esc_html__( 'Controls the background image for the Title Bar.', 'apress' ),
					'id'       => 'page_title_bg',
					'type'     => 'background',
					'preview'  => false,
					'default'  => array(
						'background-color' => '',
					),
				),
				array(
					'title'		=> esc_html__( 'Parallax Background Image', 'apress' ),
					'subtitle'	=> esc_html__( 'Check to enable parallax background image when scrolling.', 'apress' ),
					'id'		=> 'page_title_bg_parallax',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',	
				),
				array (
					'raw'		=> esc_html__('Page Title Area Styling', 'apress' ),
					'id'		=> 'page_title_area_styling_options',
					'icon'		=> true,
					'type'		=> 'info',
				),
				array(
					'title'			=> esc_html__('Page Title Bar Overlay Color', 'apress'),
					'subtitle'		=> esc_html__('Page Title Bar Overlay Color.', 'apress'),
					'id'			=> 'page_title_bar_overlay_color',					
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.3)',
					'transparent'	=> false,					
				),
				array(
					"title"			=> esc_html__("Page Title And Breadcrumbs Font Color", "apress"),
					"subtitle"		=> esc_html__("Controls the text color of the page title font.", "apress"),
					"id"			=> "page_title_color",
					"default"		=> "#ffffff",
					"type"			=> "color",
					'transparent'	=> false,
				),
				
				array(
					'title'			=> esc_html__( 'Display Breadcrumbs', 'apress' ),
					'subtitle'		=> esc_html__( 'Check to display the breadcrumbs. Uncheck to hide.', 'apress' ),
					'id'			=> 'breadcrumb_show',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
				array(
					'title'			=> esc_html__('Breadcrumbs Font Size', 'apress'),
					'subtitle'		=> esc_html__('Insert css unit', 'apress'),
					'id'			=> 'breadcrumbs_font_size',
					'default'		=> '13',
					'type'			=> 'text',
					'required'		=> array( 
						array('breadcrumb_show', '=', 'on'),					
					),
				),
        )
    ) );
	
	// -> Sidebar Options	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebars', 'apress' ),
        'id'               => 'zolo_sidebars',
        'icon'             => 'el el-th-list'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Pages', 'apress' ),
        'id'               => 'zolo_page_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=>  esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=>  esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'page_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
					
				),
				array(
					'title'		=>  esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=>  esc_html__( 'Select Left Sidebar that will display on the pages.', 'apress' ),
					'id'		=> 'page_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('page_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=>  esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=>  esc_html__( 'Select right Sidebar that will display on the pages.', 'apress' ),
					'id'		=> 'page_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('page_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Posts', 'apress' ),
        'id'               => 'zolo_blog_post_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'blogposts_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array(
					'title'		=> esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the blog posts.', 'apress' ),
					'id'		=> 'blogposts_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('blogposts_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=> esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the blog posts.', 'apress' ),
					'id'		=> 'blogposts_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('blogposts_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Archive/Category', 'apress' ),
        'id'               => 'zolo_blog_archive_category_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__( 'Sidebar Position','apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.','apress' ),
					'id'		=> 'blog_archive_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array(

					'title'		=> esc_html__( 'Left Sidebar','apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the blog archive/category pages.','apress' ),
					'id'		=> 'blog_archive_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('blog_archive_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=> esc_html__( 'Right Sidebar','apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the blog archive/category pages.','apress' ),
					'id'		=> 'blog_archive_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('blog_archive_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Posts', 'apress' ),
        'id'               => 'zolo_portfolio_sidebar',
        'subsection'       => true,
        'fields'           => array(
            array (
					'title'		=> esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'portfolioposts_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => 'full', 
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => 'left', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => 'right', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => 'both', 
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array (
					'title'		=> esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the portfolio.', 'apress' ),
					'id'		=> 'portfolioposts_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('portfolioposts_sidebar_position', '=', array('left','both')),
					),
				),
				array (
					'title'		=> esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the portfolio.', 'apress' ),
					'id'		=> 'portfolioposts_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('portfolioposts_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Archive/Category', 'apress' ),
        'id'               => 'zolo_portfolio_archive_category_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array (
					'title'		=> esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'portfolio_archive_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => 'full', 
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => 'left', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => 'right', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => 'both', 
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array (
					'title'		=> esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the portfolio archive/category pages.', 'apress' ),
					'id'		=> 'portfolio_archive_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('portfolio_archive_sidebar_position', '=', array('left','both')),
					),
				),
				array (
					'title'		=> esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the portfolio archive/category pages.', 'apress' ),
					'id'		=> 'portfolio_archive_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('portfolio_archive_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Testimonial', 'apress' ),
        'id'               => 'zolo_testimonial_sidebar',
        'subsection'       => true,
        'fields'           => array(
            array (
					'title'		=> esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'testimonial_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => 'full', 
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => 'left', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => 'right', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => 'both', 
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array (
					'title'		=> esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the testimonial.', 'apress' ),
					'id'		=> 'testimonial_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('testimonial_sidebar_position', '=', array('left','both')),
					),
				),
				array (
					'title'		=> esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the testimonial.', 'apress' ),
					'id'		=> 'testimonial_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('testimonial_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team', 'apress' ),
        'id'               => 'zolo_team_sidebar',
        'subsection'       => true,
        'fields'           => array(
            array (
					'title'		=> esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'team_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => 'full', 
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => 'left', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => 'right', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => 'both', 
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array (
					'title'		=> esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the team.', 'apress' ),
					'id'		=> 'team_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('team_sidebar_position', '=', array('left','both')),
					),
				),
				array (
					'title'		=> esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the team.', 'apress' ),
					'id'		=> 'team_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',
					'default'	=> 'none',
					'required'	=> array( 
						array('team_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	
	
	
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'BBPress', 'apress' ),
        'id'               => 'zolo_bbpress_sidebar',
        'subsection'       => true,
        'fields'           => array(
           		array (
					'title' 	=>  esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=>  esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'bbpress_archive_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => 'full', 
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => 'left', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => 'right', 
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => 'both', 
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array (
					'title' 		=>  esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle' 		=>  esc_html__( 'Select Left Sidebar that will display on the BBPress posts.', 'apress' ),
					'id'			=> 'bbpress_archive_left_sidebar',
					'type'    		=> 'select',
                	'data'     		=> 'sidebars',					
					'default' 		=> 'sidebar',
					'required'	=> array( 
						array('bbpress_archive_sidebar_position', '=', array('left','both')),
					),
				),
				array (
					'title' 		=>  esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle' 		=>  esc_html__( 'Select right Sidebar that will display on the BBPress posts.', 'apress' ),
					'id' 			=> 'bbpress_archive_right_sidebar',
					'type'     		=> 'select',
                	'data'    		=> 'sidebars',					
					'default' 		=> 'none',
					'required'	=> array( 
						array('bbpress_archive_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Search Page', 'apress' ),
        'id'               => 'zolo_searchpage_sidebar',
        'subsection'       => true,
        'fields'           => array(
            	array(
					'title'		=> esc_html__( 'Sidebar Position', 'apress' ),
					'subtitle'	=> esc_html__( 'Select sidebar position.', 'apress' ),
					'id'		=> 'searchpage_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
						'both'	=> array(
						'alt'   => esc_html__('Both', 'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-double-sidebars.png',
						),
					),
					'default'	=> 'left',
				),
				array(
					'title'		=> esc_html__( 'Left Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select Left Sidebar that will display on the search posts.', 'apress' ),
					'id'		=> 'searchpage_left_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'sidebar',
					'required'	=> array( 
						array('searchpage_sidebar_position', '=', array('left','both')),
					),
				),
				array(
					'title'		=> esc_html__( 'Right Sidebar', 'apress' ),
					'subtitle'	=> esc_html__( 'Select right Sidebar that will display on the search posts.', 'apress' ),
					'id'		=> 'searchpage_right_sidebar',
					'type'		=> 'select',
                	'data'		=> 'sidebars',					
					'default'	=> 'none',
					'required'	=> array(
						array('searchpage_sidebar_position', '=', array('right','both')),
					),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebar Styling', 'apress' ),
        'id'               => 'zolo_sidebar_widget_styling',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'		=> esc_html__('Sidebar Widgets Style', 'apress'),
					'subtitle'	=> esc_html__('Select sidebar design style.', 'apress'),
					'id'		=> 'sidebar_widgets_style',
					'type'		=> 'select',
					'options'	=> array(
						'none'	=> 'None', 
						'box'	=> 'Box',
					),
					'default'	=> 'none',
				),	
				array(
					"title"			=> esc_html__("Sidebar Widget Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the Background color of the Sidebar Widget.", "apress"),
					"id"			=> "sidebar_widge_bg_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#f8f8f8',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_style', '=', 'box'),				
				),
				array(
					"title"			=> esc_html__("Sidebar Widget Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the Border color of the Sidebar Widget.", "apress"),
					"id"			=> "sidebar_widget_border_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#f4f4f4',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_style', '=', 'box'),
				),			
				array(
					'title'		=> esc_html__('Sidebar Title Alignment', 'apress'),
					'subtitle'	=> esc_html__('Select sidebar Widgets Title Alingment.', 'apress'),
					'id'		=> 'sidebar_widgets_title_align',
					'type'		=> 'select',
					'options'	=> array(
						'left'	=> 'Left', 
						'center'=> 'Center', 
						'right' => 'Right',
					),
					'default'	=> 'left',
				),
				array(
					'title'			=> esc_html__( 'Widget title Top & Bottom Padding', 'apress' ),
					'subtitle'		=> esc_html__( 'Controls the widgets title padding', 'apress' ),
					'id'			=> 'sidebar_widgets_title_padding',
					'type'			=> 'spacing',
					'mode'			=> 'padding',
					'all'			=> false,
					'left'			=> false,
					'right'			=> false,
					'units'			=> array( 'px', '%' ), 
					'units_extended'=> false, 	
					'default'	=> array(
						'padding-top'		=> '10px',
						'padding-bottom'	=> '10px',
					),
           		),
				array(
					'title'		=> esc_html__('Sidebar Widgets Title Seperator', 'apress' ),
					'subtitle'	=> esc_html__('Check the box to display sidebar widgets title Seperator.', 'apress' ),
					'id'		=> 'sidebar_widgets_title_seperator_show',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('Sidebar Title Decoration', 'apress'),
					'subtitle'	=> esc_html__('Select sidebar Widgets Title Design.', 'apress'),
					'id'		=> 'sidebar_widgets_title_design',
					'type'		=> 'select',
					'options'	=> array(
						'none'			=> 'None',
						'bottomborder'	=> 'Separator', 
						'box'			=> 'Box', 
						'boxfullwidth'	=> 'Box Full Width', 
						'image'			=> 'Image',
					),
					'default'	=> 'none',
					'required'	=> array( 
						array('sidebar_widgets_title_seperator_show', '=', 'on'),
					),
				),
				array(
					'title'		=> esc_html__('Title separator Image', 'apress'),
					'id'		=> 'sidebar_widgets_title_separator_img',				
					'type'		=> 'media',	
					'url'      => true,				
					'required'	=> array( 
						array('sidebar_widgets_title_design', '=', 'image'),
					),
				),
				array(
					'title'		=> esc_html__('Separator Width', 'apress'),
					'subtitle'	=> esc_html__('Controls the widgets title separator width. In px or %, ex: 100% or 80px.', 'apress'),
					'id'		=> 'sidebar_widgets_title_seperator_width',
					'default'	=> '80px',
					'type'		=> 'text',
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'bottomborder') ),
				),
				array(
					'title'		=> esc_html__('Title separator & Image Height', 'apress'),
					'subtitle'	=> esc_html__('Controls the widgets title separator height. Insert without px ex: 2', 'apress'),
					'id'		=> 'sidebar_widgets_title_seperator_height',
					'default'	=> '2',
					'type'		=> 'text',
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'bottomborder', 'image') ),
				),
				array(
					'title'			=> esc_html__( 'Title Bottom Margin', 'apress' ),
					'subtitle'		=> esc_html__( 'Controls the widgets title Bottom Margin', 'apress' ),
					'id'			=> 'sidebar_title_seperator_bottom_mar',
					'type'			=> 'spacing',
					'mode'			=> 'padding',
					'all'			=> false,
					'top'			=> false,
					'right'			=> false,
					'left'			=> false,
					'units'			=> array( 'px' ), 
					'units_extended'=> false, 	
					'default'		=> array(
						'padding-bottom' 	=> '10px',
					),
					'required'	=> array( 
						array('sidebar_widgets_title_seperator_show', '=', 'on'),
					),
           		),
					
				array(
					"title"			=> esc_html__("Sidebar Widget Headings separator Color", "apress"),
					"subtitle"		=> esc_html__("Controls the sidebar widget separator color.", "apress"),
					"id"			=> "sidebar_widgets_title_seperator_color",
					"default"		=> "#333333",
					"type"			=> "color",
					"transparent"	=> false,
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'bottomborder') ),
				),	
				array(
					"title"			=> esc_html__("Sidebar Widget Title Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the Background color of the Sidebar Widget.", "apress"),
					"id"			=> "sidebar_widget_title_bg_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#e4e4e4',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'box', 'boxfullwidth' ) ),				
				),	
				array(
					"title"			=> esc_html__("Sidebar Widget Title Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the Sidebar Widget.", "apress"),
					"id"			=> "sidebar_widget_title_border_color",
					'type'			=> 'color_alpha',
					'default'  		=> '#e4e4e4',
					'transparent'	=> false,
					'required' 		=> array( 'sidebar_widgets_title_design', '=', array( 'box', 'boxfullwidth' ) ),				
				),	
				array( 
					'title'			=> esc_html__('Sidebar Item Border Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the Border color of the Sidebar item.', 'apress'),
					'id'			=> 'sidebar_item_border_color',				
					'type'			=> 'color_alpha',
					'default'  		=> '#dadada',
					'transparent'	=> false,		
        		),
				array(
					'title'			=> esc_html__('Sidebar Link Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the text color of the Sidebar link font.', 'apress'),
					'id'			=> 'sidebar_link_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#888888',
						'hover'   => '',
					)
				),
				array (
					'raw'	=> esc_html__('Sidebar Typography', 'apress' ),
					'id'	=> 'sidebar_typography_info',
					'icon'	=> true,
					'type'	=> 'info',
				),
				array(
					'title'				=> esc_html__( 'Sidebar Title Typography', 'apress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the Sidebar headings.', 'apress' ),
					'id'				=> 'sidebar_title_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'subsets' 			=> false,
					'all_styles'		=> true,
					'text-align'		=> false,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'font-weight'		=> true,
					'default'			=> array(
						'color'				=> '#333333',
						'font-style'		=> '700',
						'font-family'		=> 'Montserrat',
						'font-weight'   	=> 'Normal 400',
						'google'			=> true,
						'font-size'			=> '18px',
						'line-height'		=> '26px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),
				array(
					'title'				=> esc_html__( 'Sidebar Font Typography', 'apress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the Sidebar.', 'apress' ),
					'id'				=> 'sidebar_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'all_styles'		=> true,
					'text-align'		=> true,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'font-weight'		=> true,
					'subsets' 			=> false, 
					'default'			=> array(
						'color'				=> '#333333',
						'font-style'		=> '700',
						'font-family'		=> 'Lato',
						'font-weight'   	=> 'Normal 400',
						'google'			=> true,
						'font-size'			=> '16px',
						'line-height'		=> '24px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),				
								
			)
    ) );
	
	// -> Footer Section	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'apress' ),
        'id'               => 'zolo_footer',
        'icon'             => 'el el-arrow-down'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Layout', 'apress' ),
        'id'               => 'footer_layout_columns',
        'subsection'       => true,
        'fields'           => array(
			array(
				'title'		=> esc_html__( 'Display Footer','apress' ),
				'subtitle' 	=> esc_html__( 'Show / Hide Footer area','apress' ),
				'id' 		=> 'display_footer',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  	=> esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'	=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Footer Type','apress' ),
				'subtitle' 	=> esc_html__( 'Choose footer type.','apress' ),
				'id' 		=> 'footer_builder',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'widgets'  		=> esc_html__( 'Widgets', 'apress' ),
						'page_editor'   => esc_html__( 'Footer Builder', 'apress' ),
					),
				'default'	=> 'widgets',
				'required'	=> array('display_footer', '=', 'on'),	
			),
			array(
				'id'		=> 'footer_builder_template',
				'type' 		=> 'select',
				'title' 	=> esc_html__('Template', 'apress'),
				'subtitle'	=> esc_html__('First make your footer from footer custom types then select it from here.', 'apress'),
				'data'		=> 'post',
				'args' 		=> array( 'post_type' => 'apcore_footer', 'posts_per_page' => -1 ),
				'required'  => array( 'footer_builder', '=', 'page_editor' ),
			),
			array(
				'title'		=> esc_html__( 'Main Footer Widgets','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to display Main footer widgets.','apress' ),
				'id' 		=> 'footer_widgets',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  	=> esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'	=> 'off',
				'required'	=> array('footer_builder', '=', 'widgets'),	
			),	
			array (
				'title'		=> esc_html__( 'Layout', 'apress' ),
				'subtitle'	=> esc_html__( 'Select the number of columns to display in the footer.', 'apress' ),
				'id'		=> 'footer_layout_columns',
				'type'		=> 'select',	
				'options'	=> array (
					'layout1' => '1/4 1/4 1/4 1/4', 
					'layout2' => '1/4 1/4 1/2', 
					'layout3' => '1/4 1/2 1/4', 
					'layout4' => '1/2 1/4 1/4', 
					'layout5' => '1/3 1/3 1/3', 
					'layout6' => '1/3 2/3', 
					'layout7' => '2/3 1/3', 
					'layout8' => '1/2 1/2', 
					'layout9' => '1/1'),								
				'default'	=> 'layout1',
				'required'	=> array('footer_widgets', '=', 'on'),	
			),
			array(
				'title'		=> esc_html__('100% Footer Width','apress' ),
				'subtitle'	=> esc_html__('Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.','apress' ),
				'id'		=> 'footer_100_width',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'		=> 'off',	
				'required'	=> array('footer_widgets', '=', 'on'),			
			),
			array(
					'title'				=> esc_html__( 'Footer Widgets Top, bottom, left, right Padding', 'apress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 10', 'apress' ),
					'id'				=> 'footer_area_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px'), 
					'units_extended' 	=> false,  
						'default'       => array(
							'padding-top'		=> '40px',
							'padding-right'		=> '30px',
							'padding-bottom'	=> '40px',
							'padding-left'		=> '30px',
						),
					'required'	=> array('footer_widgets', '=', 'on'),
           		),
				
			array(
				'title'		=> esc_html__( 'Upper Footer Widgets','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to display upper footer widgets.','apress' ),
				'id' 		=> 'upper_footer_widgets',				
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'		=> 'off',
				'required'	=> array('footer_builder', '=', 'widgets'),
			),						
			array( 
				'title'		=> esc_html__('Layout For Upper Footer', 'apress'),
				'subtitle'	=> esc_html__('Select the number of columns to display above footer.', 'apress'),
				'id'		=> 'footer_upper_columns',
				'type'		=> 'select',
				'options'	=> array(
						'0' => '0',
						'1' => '1', 
						'2' => '2', 
						'3' => '3', 
						'4' => '4',
				),				
				'default'		=> '0',
				'required'	=> array('upper_footer_widgets', '=', 'on'),
			),
			array(
				"title"		=> esc_html__("100% Layout for Widget Area Above Footer", "apress"),
				"subtitle"	=> esc_html__("Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "apress"),
				"id"		=> "footer_100_width_upper",			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'		=> 'off',	
				'required'	=> array('upper_footer_widgets', '=', 'on'),
			),
			array(
					'title'				=> esc_html__( 'Upper Footer Top & bottom Padding', 'apress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 10', 'apress' ),
					'id'				=> 'upper_footer_area_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'units'				=> array( 'px' ), 
					'units_extended'	=> false, 
					'left'				=> false,
					'right'				=> false,				
						'default'		=> array(
							'padding-top'		=> '0px',
							'padding-bottom'	=> '40px',
					),
					'required'	=> array('upper_footer_widgets', '=', 'on'),
           		),
			array(
				'title'		=> esc_html__( 'Lower Footer Widgets','apress' ),
				'subtitle' 	=> esc_html__( 'Turn on to display lower footer widgets.','apress' ),
				'id' 		=> 'lower_footer_widgets',		
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'		=> 'off',
				'required'	=> array('footer_builder', '=', 'widgets'),
			),
			array( 
				"title"		=> esc_html__("Layout For Lower Footer", "apress"),
				"subtitle"	=> esc_html__("Select the number of columns to display below footer.", "apress"),
				"id"		=> "footer_lower_columns",
				"type"		=> "select",
				"options" => array(
						'0' => '0',
						'1' => '1', 
						'2' => '2', 
						'3' => '3', 
						'4' => '4',
				),				
				'default'	=> '0',
				'required'	=> array( 'lower_footer_widgets', '=', 'on'	),
			),
			array(
				"title"		=> esc_html__("100% Layout for Widget Area Below Footer", "apress"),
				"subtitle"	=> esc_html__("Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.", "apress"),
				"id"		=> "footer_100_width_lower",			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',	
				'required'	=> array( 'lower_footer_widgets', '=', 'on'	),			
			),
			array(
				'title'				=> esc_html__( 'Lower Footer Top & bottom Padding', 'apress' ),
				'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 10', 'apress' ),
				'id'				=> 'lower_footer_area_padding',
				'type'				=> 'spacing',
				'mode'				=> 'padding',
				'all'				=> false,
				'units'				=> array( 'px' ), 
				'units_extended'	=> false, 
				'left'				=> false,
				'right'				=> false,				
					'default'		=> array(
						'padding-top'		=> '40px',
						'padding-bottom'	=> '0px',
					),
				'required'	=> array( 'lower_footer_widgets', '=', 'on'	),
			),
			array (
				'title'		=> esc_html__( 'Style', 'apress' ),
				'subtitle'	=> esc_html__( 'Select the Style display in the footer.', 'apress' ),
				'id'		=> 'footer_layout_style',
				'type'		=> 'select',
				'options'	=> array (
					'footer_default' => 'Default',
					'footer_fixed' => 'Fixed (covers content)',
					'footer_parallax' => 'Parallax',
				),				
				'default'	=> 'footer_default',
				'required'	=> array('display_footer', '=', 'on'),	
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Footer Widgets Title', 'apress' ),
		'subtitle'			=> esc_html__( 'Footer Widgets Title Design', 'apress' ),
		'subsection'		=> true,	
        'id'				=> 'footer_widget_title_design',        	
        'fields'			=> array(			
			array(
				'title'			=> esc_html__( 'Footer Widgets Title Top & bottom Padding', 'apress' ),
				'subtitle'		=> esc_html__( 'Insert without \'px\' ex: 10', 'apress' ),
                'id'			=> 'footer_widgets_title_padding',
                'type'			=> 'spacing',
                'mode'			=> 'padding',
                'all'			=> false,
                'units'			=> array( 'px' ), 
                'units_extended'=> false, 
				'left'			=> false,
				'right'			=> false,				
				'default'		=> array(
						'padding-top'		=> '10px',
						'padding-bottom'	=> '10px'
					),
           		),
			array(
				'title'			=> esc_html__( 'Footer Widgets Title Seperator', 'apress' ),
				'subtitle'		=> esc_html__( 'Check the box to display footer widgets title Seperator.', 'apress' ),
				'id'			=> 'footer_widgets_title_seperator_show',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),	
			array(
				'title'				=> esc_html__( 'Footer Widgets Title Seperator Width', 'apress' ),
				'subtitle'			=> esc_html__( 'Controls the widgets title seperator width. In px or %, ex: 100% or 80px.', 'apress' ),
                'id'				=> 'footer_widgets_title_seperator_dimensions',
                'type'				=> 'dimensions',
                'units'				=> array( 'px' ), 
                'units_extended'	=> 'true',
                'default'			=> array(
					'height'  => '2',
                    'width'  => '80',
                	),
				'required'	=> array( 'footer_widgets_title_seperator_show', '=', 'on'),
            	),
			array(
				'title'				=> esc_html__( 'Seperator Bottom Margin', 'apress' ),
                'subtitle'			=> esc_html__( 'Controls the widgets title seperator Bottom Margin. Insert without \'px\' ex: 10', 'apress' ),
                'id'				=> 'footer_title_seperator_bottom_mar',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ), 
                'units_extended'	=> false,
				'top'				=> false,
				'right'				=> false,
				'left'				=> false,				
                'default'			=> array(
                    'padding-bottom'	=> '10px',
                ),
				'required'	=> array( 'footer_widgets_title_seperator_show', '=', 'on'),
            ),
			array(
				'title'			=> esc_html__('Footer Widget Headings Seperator Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the Footer Widget Seperator color.', 'apress'),
				'id'			=> 'footer_widgets_title_seperator_color',
				'default'		=> '#dddddd',
				'type'			=> 'color',
				'transparent'	=> false,
				'required'	=> array( 'footer_widgets_title_seperator_show', '=', 'on'),
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Styling', 'apress' ),
        'id'               => 'zolo_footer_styling_option',
        'subsection'       => true,
        'fields'           => array(
				
				array(					
					'title'    => esc_html__( 'Footer Background', 'apress' ),
					'subtitle' => esc_html__( 'Controls the background image for the Footer.', 'apress' ),
					'id'       => 'footer_bg_image',
					'type'     => 'background',
					'preview'  => false,
					'default'  => array(
						'background-color' => '#2b3034',
					),
				),
				array(
					'title'          => esc_html__( 'Footer Border', 'apress' ),
					'subtitle'       => esc_html__( 'Controls the Top Footer Border.', 'apress' ),
					'id'             => 'footer_area_bor_width',
					'type'			=> 'border',
					'all'      		=> false,
					'default'  		=> array(
						'border-color'	=> '#e9eaee',
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
           		),
				array(
					'title'			=> esc_html__('Footer Link Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the text color of the footer link font.', 'apress'),
					'id'			=> 'footer_link_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#bfbfbf',
						'hover'   => '',
					)
				),
				array(
					'title'			=> esc_html__('Footer Item Border Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the Border color of the footer item.', 'apress'),
					'id'			=> 'footer_item_border_color',					
					'type'			=> 'color_alpha',
					'default'  		=> '#707070',
					'transparent'	=> false,
				),
				
				array(
					'raw'			=> esc_html__( 'Custom Menu List Style', 'apress' ),
					'id'			=> 'footer_custommenu_style_option',
					'type'			=> 'info',
				),	
				array(
					'title'			=> esc_html__( 'Custom Menu List Style', 'apress' ),
					'id'			=> 'footer_custommenu_style_show',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',
				),	
				array(
					'title'			=> esc_html__('Style', 'apress'),
					'id'			=> 'footer_custommenu_list_style',
					'type'     => 'image_select',
						'options'  => array( 
						'list_style1'	=> array(
						'alt'   => 'list_style1', 
						'img'   => get_template_directory_uri().'/assets/images/themeoption_img/custommenu_style1.jpg',
						),      	
						'list_style2'	=> array(
						'alt'   => 'list_style2', 
						'img'   => get_template_directory_uri().'/assets/images/themeoption_img/custommenu_style2.jpg',
						),						
						'list_style3'	=> array(
						'alt'   => 'list_style3', 
						'img'   => get_template_directory_uri().'/assets/images/themeoption_img/custommenu_style3.jpg',
						),
						'list_style4'	=> array(
						'alt'   => 'list_style4', 
						'img'   => get_template_directory_uri().'/assets/images/themeoption_img/custommenu_style4.jpg',
						),
					),
					'default'	=> 'list_style1',
					'required'	=> array( 'footer_custommenu_style_show', '=', 'on'),
				),
				
				array(
					'title'			=> esc_html__( 'Custom Menu Color Option', 'apress' ),
					'id'			=> 'footer_custommenu_color_option',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'primary'  => esc_html__( 'Primary', 'apress' ),
							'custom'   => esc_html__( 'Custom', 'apress' ),
						),
					"default"		=> 'primary',
					'required'	=> array( 'footer_custommenu_style_show', '=', 'on'),
				),	
				
				array(
					'title'			=> esc_html__('Choose Color', 'apress'),
					'id'			=> 'footer_custommenu_item_icon_color',
					'type'			=> 'color_alpha',
					'default'  		=> '#707070',
					'transparent'	=> false,
					'required'	=> array( 'footer_custommenu_color_option', '=', 'custom'),
				),
				array(
					'raw'			=> esc_html__( 'Footer Typography', 'apress' ),
					'id'			=> 'footer_typography_info',
					'type'			=> 'info',
				),			
				array(
					'title'				=> esc_html__( 'Footer Title Typography', 'apress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the footer headings.', 'apress' ),
					'id'				=> 'footer_title_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'all_styles'		=> true,
					'text-align'		=> true,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'subsets' 			=> false, 
					'default'			=> array(
						'color'				=> '#dddddd',
						'font-style'		=> '700',
						'font-family'		=> 'Roboto',
						'google'			=> true,
						'font-size'			=> '18px',
						'line-height'		=> '26px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),
				array(
					'title'				=> esc_html__( 'Footer Font Typography', 'apress' ),
					'subtitle'			=> esc_html__( 'These settings control the typography for the footer.', 'apress' ),
					'id'				=> 'footer_typography',
					'type'				=> 'typography',
					'font-backup'		=> false,
					'all_styles'		=> true,
					'text-align'		=> true,					
					'letter-spacing'	=> true,
					'text-transform'	=> true,
					'subsets' 			=> false, 
					'default'			=> array(
						'color'				=> '#dddddd',
						'font-style'		=> '400',
						'font-family'		=> 'Roboto',
						'google'			=> true,
						'font-size'			=> '16px',
						'line-height'		=> '24px',
						'letter-spacing'	=> '0px',
						'text-transform'	=> 'none',
					),
				),

        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Copyright', 'apress' ),
        'id'				=> 'copyright_alignment',
        'subsection'		=> true,
        'fields'			=> array(
            array (
					'title'		=> esc_html__( 'Copyright & Social Icon Alignment', 'apress' ),
					'id'		=> 'copyright_social_align',
					'type'		=> 'select',
					'options'	=> array (
						'default'	=> 'Default',
						'center'	=> 'Center',
					),
					'default'	=> 'Default',
				),
				array(
					'title'		=> esc_html__( 'Copyright Bar', 'apress' ),
					'subtitle'	=> esc_html__( 'Check the box to display the copyright bar.', 'apress' ),
					'id'		=> 'footer_copyright',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
				array (
					'title'		=> esc_html__( 'Copyright Text', 'apress' ),
					'subtitle'	=> esc_html__( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'apress' ),
					'id'		=> 'copyright_text',
					'type'		=> 'textarea',					
					'default'	=> 'Copyright 2019 Apress | All Rights Reserved | Powered by <a href="http://wordpress.org">WordPress</a>',
				),				
				array(
					'title'          => esc_html__( 'Copyright Border', 'apress' ),
					'subtitle'       => esc_html__( 'Controls the Copyright Border.', 'apress' ),
					'id'             => 'copyright_area_border',
					'type'			=> 'border',
					'all'      		=> false,
					'default'  		=> array(
						'border-color'	=> '#4b4c4d',
						'border-style'  => 'solid',
						'border-top'    => '1px',
						'border-right'  => '0px',
						'border-bottom' => '0px',
						'border-left'   => '0px'
					),
           		),
				array(
					'title'		=>  esc_html__( 'Copyright Border Width', 'apress' ),
					'subtitle'	=>  esc_html__( 'Select Border Width for copyright.', 'apress' ),
					'id'		=> 'copyright_border_style_width',
					'type'     => 'image_select',
					'options'  => array( 
						'border_style_full_width'	=> array(
						'alt'   => esc_html__('Border Style Full Width',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/border-style-full_width.jpg',
						),      	
						'border_style_fix_width'	=> array(
						'alt'   => esc_html__('Border Style Fix Width',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/border-style-fix_width.jpg',
						),						
					),
					'default'	=> 'border_style_full_width',
				),
				
				array(
					'title'				=> esc_html__( 'Copyright Top & bottom Padding', 'apress' ),
					'subtitle'			=> esc_html__( 'Insert without \'px\' ex: 18px', 'apress' ),
					'id'				=> 'copyright_padding',
					'type'				=> 'spacing',
					'mode'				=> 'padding',
					'all'				=> false,
					'left'				=> false,
					'right'				=> false,
					'units'				=> array( 'px' ), 
					'units_extended'	=> false,  	
						'default'		=> array(
							'padding-top'		=> '18px',
							'padding-bottom'	=> '18px',
						),
           		),
				array(
					'raw'			=> esc_html__( 'Copyright Design', 'apress' ),
					'id'			=> 'footer_copyright_design',
					'type'			=> 'info',
            	),
				array(
					'title'			=> esc_html__('Copyright Background Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the background color of the footer copyright.', 'apress'),
					'id'			=> 'footer_copyright_bg_color',
					'default'		=> '#282a2b',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Copyright Font Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the text color of the Copyright font.', 'apress'),
					'id'			=> 'copyright_text_color',
					'default'		=> '#8C8989',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Copyright Link Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the text color of the Copyright link font.', 'apress'),
					'id'			=> 'copyright_link_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#bfbfbf',
						'hover'   => '',
					)
				),
				array(
					'title'			=> esc_html__('Copyright Font Size', 'apress'),
					'subtitle'		=> esc_html__("Insert without 'px' ex: 12", "apress"),
					'id'			=> 'copyright_font_size',
					'default'		=> '12',
					'type'			=> 'text',
				),			
        )
    ) );	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer Social', 'apress' ),
        'id'               => 'footer_social_icons',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'			=> esc_html__( 'Display Social Icons on Footer of the Page', 'apress' ),
					'subtitle'		=> esc_html__( 'Select the checkbox to show social media icons on the footer of the page.', 'apress' ),
					'id'			=> 'footer_social_icon',				
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
				array (
					'title'			=> esc_html__( 'Footer Social Icons Font Size', 'apress' ),
					'subtitle'		=> esc_html__( 'Insert without \'px\' ex: 18', 'apress' ),
					'id'			=> 'footer_social_font_size',
					'type'			=> 'text',					
					'default'		=> '14',
					'required'	=> array( 'footer_social_icon', '=', 'on'),
				),
				array (
					'title'			=> esc_html__('Footer Social Icon Color', 'apress' ),
					'subtitle'		=> esc_html__('Select a custom social icon color', 'apress' ),
					'id'			=> 'footer_social_links_icon_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#8c8989',
						'hover'   => '#6a6969',
					),
					'required'	=> array( 'footer_social_icon', '=', 'on'),
				),
				array (
					'title'			=> esc_html__( 'Footer Social Icons Boxed', 'apress' ),
					'subtitle'		=> esc_html__( 'Controls the color of the social icons in the footer.', 'apress' ),
					'id'			=> 'footer_social_links_boxed',
					'type'			=> 'button_set',
					'options'		=> array(
						'Yes'	=> 'Yes',
						'No'	=> 'No',
					),
					'default'		=> 'No',
					'required'	=> array( 'footer_social_icon', '=', 'on'),
				),
				array(
					'title'			=> esc_html__( 'Footer Social Icons Width (Only works on icon boxed design set to yes above)', 'apress' ),
					'subtitle'		=> esc_html__( 'In px or %, ex: 100% or 80px.', 'apress' ),
					'id'			=> 'footer_social_icon_width',
					'type'			=> 'dimensions',
					'units'			=> array( 'px', '%' ), 
					'units_extended'=> true,
					'height'		=> false,
					'default'		=> array(
							'width'	=> '34',
						),
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
            	),
				array (
					'title'			=> esc_html__( 'Footer Social Icons Box Background Color', 'apress' ),
					'subtitle'		=> esc_html__( 'Select a custom social icon box color', 'apress' ),
					'id'			=> 'footer_social_links_box_color',					
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(34,34,34,0)',
					'transparent'	=> false,
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
				),
				array (
					'title'			=> esc_html__( 'Footer Social Icons Box Border Color', 'apress' ),
					'subtitle'		=> esc_html__( 'Enter color', 'apress' ),
					'id'			=> 'footer_social_box_border_color',
					'type'			=> 'color',					
					'default'		=> '#797878',
					'transparent'	=> false,
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
				),
				array (
					'title'			=> esc_html__( 'Footer Social Icons Boxed Radius', 'apress' ),
					'subtitle'		=> esc_html__( 'Boxradius for the social icons. Insert without \'px\' ex: 4', 'apress' ),
					'id'			=> 'footer_social_links_boxed_radius',
					'type'			=> 'text',	
					"default"		=> "0",		
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
				),
				
				array(
					'title'			=> esc_html__( 'Footer Social Icons Box Top & Bottom Padding', 'apress' ),
					'subtitle'		=> esc_html__( 'Box Padding for the social icons', 'apress' ),
					'id'			=> 'footer_social_boxed_padding',
					'type'			=> 'spacing',
					'mode'			=> 'padding',
					'all'			=> false,
					'left'			=> false,
					'right'			=> false,
					'units'			=> array( 'px'), 
					'units_extended'=> false, 	
					'default'		=> array(
							'padding-top'		=> '8px',
							'padding-bottom'	=> '8px',
						),
					'required'	=> array( 'footer_social_links_boxed', '=', 'Yes'),
           		),
				array(
				'title'				=> esc_html__( 'Footer Social Icons Box left & right margin', 'apress' ),
				'subtitle'			=> esc_html__( 'Box margin for the social icons', 'apress' ),
                'id'				=> 'footer_social_boxed_margin',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
				'top'				=> false,
				'bottom'			=> false,
                'units'				=> array( 'px'), 
                'units_extended'	=> false, 	
				'default'			=> array(
						'padding-left' 	=> '12px',
						'padding-right'	=> '12px',
					),
				'required'	=> array( 'footer_social_icon', '=', 'on'),
           		),
				
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Back to Top', 'apress' ),
        'id'               => 'zolo_back_to_top',
        'subsection'       => true,
        'fields'           => array(
            array (
				'title'		=> esc_html__( 'Back to Top button', "apress"),
				'subtitle'	=> esc_html__( 'Select Position', "apress"),
				'id'		=> 'back_to_top',
				'type'		=> 'select',
				'options'	=> array (
					'default_backtotop'			=> 'Default | in Copyright area',
					'sticky_backtotop'			=> 'Sticky',
					'sticky_on_scroll_backtotop'=> 'Sticky show on scroll',
					'hide_backtotop'			=> 'Hide',
				),					
				'default'	=> 'sticky_on_scroll_backtotop',
			),
			array(
				"title"		=> esc_html__("Back to Top button Style", "apress"),
				"subtitle"	=> esc_html__("Select Position", "apress"),
				"id"		=> "back_to_top_style",
				"default"	=> "backtotop_style_square",
				"type"		=> "select",
				"options"	=> array(
					'backtotop_style_none' => 'None',
					'backtotop_style_square' => 'Square', 
					'backtotop_style_round' => 'Round', 
					'backtotop_style_rounded' => 'Rounded',
				),
			),
			array(
				"title"			=> esc_html__("Button Font Color", "apress"),
				"subtitle"		=> esc_html__("Controls the font color of the Back To Top Button.", "apress"),
				"id"			=> "backtotop_font_color",
				'type'			=> 'link_color',
                'active'    	=> false,
                'default'  => array(
                    'regular' => '#ffffff',
                    'hover'   => '#ffffff',
                )
            ),
			array(
				"title"			=> esc_html__("Button Background Color and Opacity", "apress"),
				"subtitle"		=> esc_html__("Controls the background color and opacity of the Back To Top Button.", "apress"),
				"id"			=> "backtotop_background_color",
				'type'			=> 'color_alpha',
				'default'  		=> '',
				'transparent'	=> false,
			),
			array(
				"title"			=> esc_html__("Button Hover Background Color and Opacity", "apress"),
				"subtitle"		=> esc_html__("Controls the hover background color and opacity of the Back To Top Button.", "apress"),
				"id"			=> "backtotop_hoverbg_color",
				'type'			=> 'color_alpha',
				'default'  		=> '',
				'transparent'	=> false,			
			),
			array(
				"title"			=> esc_html__("Button border Color and Opacity", "apress"),
				"subtitle"		=> esc_html__("Controls the border color and opacity of the Back To Top Button.", "apress"),
				"id"			=> "backtotop_border_color",
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(122,122,122,0)',
				'transparent'	=> false,
			),
			array(
				"title"			=> esc_html__("Button Hover border Color and Opacity", "apress"),
				"subtitle"		=> esc_html__("Controls the hover border color and opacity of the Back To Top Button.", "apress"),
				"id"			=> "backtotop_hoverborder_color",
				'type'			=> 'color_alpha',
				'default'  		=> 'rgba(122,122,122,0)',
				'transparent'	=> false,			
			),
        )
    ) );
	// -> Background options
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Background', 'apress' ),
        'id'               => 'zolo_background',
        'icon'             => 'el el-photo',
		'fields'           => array(
            	array(
					'raw'		=> esc_html__( 'Options below will work only in boxed mode.', 'apress' ),
					'id'		=> 'boxed_mode_only',
					'type'		=> 'info',
            	),
				
				array(
					'id'       => 'body_bg_image',
					'type'     => 'background',
					'title'    => esc_html__( 'Background', 'apress' ),
					'default'  => array(
						'background-color' => '#ffffff',
					),
				),
				array(
					'raw'		=> esc_html__( 'Options below will work for both Boxed & Wide Mode.', 'apress' ),
					'id'	=> 'boxed_wide_mode_only',
					'type'	=> 'info',
            	),
				array(
					'id'       => 'main_content_bg_image',
					'type'     => 'background',
					'title'    => esc_html__( 'Background', 'apress' ),
					'default'  => array(
						'background-color' => '#ffffff',
					),
				),
        )
    ) );
	
	// -> Typography Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'apress' ),
        'id'               => 'zolo_typography',
        'icon'             => 'el el-fontsize',
		'fields'			=> array(
            array(
                'id'				=> 'body_typography',
                'type'				=> 'typography',
                'title'				=> esc_html__( 'Body Typography', 'apress' ),
				'font-backup'		=> false,
				'subsets' 			=> false,
                'font-size'			=> true,
                'line-height'		=> true, 
                'letter-spacing'	=> true, 
                'color'				=> true,
                'preview'			=> true, 
				'text-align'		=> true,
				'text-transform'	=> true,
				'font-weight'		=> true,
                'subtitle'			=> esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'			=> array(
                    'color'			=> '#747474',
                    'font-style'	=> 'normal',
                    'font-family'	=> 'Lato',
					'font-weight'   => 'Normal 400',
                    'google'		=> true,
                    'font-size'		=> '16px',
                    'line-height'	=> '26px',
					'letter-spacing'=> '0px',
					'text-align'	=> 'inherit',
					'text-transform'=> 'none',
                ),
            ),
			array(
				'raw'	=> esc_html__( 'Headers Typography', 'apress' ),
				'id'	=> 'heading_typography',
				'type'	=> 'info',
			),
			array(
                'id'          => 'header_h1_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H1 Headers Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true, 
				'font-weight'   => true,              
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Roboto',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '30px',
                    'line-height' => '40px',
					'letter-spacing'=> '0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h2_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H2 Headers Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false,  
				'text-transform'=> true, 
				'font-weight'   => true,             
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Roboto',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '26px',
                    'line-height' => '36px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h3_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H3 Headers Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,  
				'font-weight'   => true,             
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Roboto',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '24px',
                    'line-height' => '34px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h4_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H4 Headers Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false, 
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Roboto',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '22px',
                    'line-height' => '30px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h5_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H5 Headers Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false, 
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true, 
				'font-weight'   => true,              
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Roboto',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '30px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'header_h6_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'H6 Headers Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Roboto',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'italic_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Italic Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => false,
                'line-height'   => false,               
                'letter-spacing'=> false, 
                'color'         => false,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> false,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'font-style'  => 'normal',
                    'font-family' => 'Playfair Display',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                ),
            ),
			array(
                'id'          => 'bold_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Bold Font Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => false,
                'line-height'   => false,               
                'letter-spacing'=> false, 
                'color'         => false,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> false,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'font-style'  => 'normal',
                    'font-family' => 'Montserrat',
					'font-weight'   => 'Bold 700',
                    'google'      => true,
                ),
            ),
			array(
				'raw'	=> esc_html__( 'Page Title Bar Typography', 'apress' ),
				'id'	=> 'page_title_bar_typography',
				'type'	=> 'info',
			),
			array(
                'id'				=> 'page_titlebar_typography',
                'type'				=> 'typography',
                'title'				=> esc_html__( 'Typography', 'apress' ),
				'font-backup'		=> false,
				'subsets' 			=> false,
                'font-size'			=> true,
                'line-height'		=> true, 
                'letter-spacing'	=> true, 
                'color'				=> false,
                'preview'			=> true, 
				'text-align'		=> false,
				'text-transform'	=> true,
				'font-weight'		=> true,
                'subtitle'			=> esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'			=> array(
                    'font-style'	=> 'normal',
                    'font-family'	=> 'Montserrat',
					'font-weight'   => 'Normal 400',
                    'google'		=> true,
                    'font-size'		=> '30px',
                    'line-height'	=> '36px',
					'letter-spacing'=> '0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
				'raw'	=> esc_html__( 'Blog Typography', 'apress' ),
				'id'	=> 'blog_typography',
				'type'	=> 'info',
			),
			array(
                'id'          => 'archive_title_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Archive Title Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => false,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'font-style'  => 'normal',
                    'font-family' => 'Montserrat',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '28px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'single_post_title_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Single Post Title Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Montserrat',
					'font-weight'   => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '28px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
                'id'          => 'post_meta_typography',
                'type'        => 'typography',
                'title'       => esc_html__( 'Post Meta Typography', 'apress' ),
                'font-backup'	=> false,
				'subsets' 		=> false,
                'font-size'     => true,
                'line-height'   => true,               
                'letter-spacing'=> true, 
                'color'         => true,
                'preview'       => true, 
				'text-align'	=> false, 
				'text-transform'=> true,
				'font-weight'   => true,               
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'apress' ),
                'default'     => array(
                    'color'       => '#333333',
                    'font-style'  => 'normal',
                    'font-family' => 'Lato',
					'font-weight' => 'Normal 400',
                    'google'      => true,
                    'font-size'   => '14px',
                    'line-height' => '22px',
					'letter-spacing'=>'0px',
					'text-transform'=> 'none',
                ),
            ),
			array(
				'raw' => esc_html__( 'Custom fonts', 'apress' ),
				'id' => 'custom_fonts_typography',
				'type' => 'info',
			   ),
			array(
				'id' => 'apress_custom_fonts',
				'type' => 'repeater',
				'title'    => esc_html__( 'Custom Fonts', 'apress' ),
				'subtitle' => esc_html__( 'Add your custom fonts here', 'apress' ),
				'desc' => esc_html__( 'NOTE: All fonts file should be uploaded via FTP on your server', 'apress' ),
				'sortable' => false,
				'group_values' => false,
				'fields' => array(					 
						array(
							'id' => 'custom_font_title',
							'type' => 'text',
							'title'    => esc_html__( 'Font title', 'apress' ),
							'placeholder' => esc_html__( 'Montserrat', 'apress' ),
							'subtitle' => esc_html__( 'Add title of the font as it will be used in Redux Typography', 'apress' ),
						),					
						array(
							'id'    => 'custom_font_woff2',

							'type'  => 'text', 
							'title' => esc_html__( 'WOFF2 file', 'apress' ),
							'placeholder' => esc_html__( 'http://example.com/wp-content/my-custom-font/my-custom-font.woff2', 'apress' ),
						),					
						array(
							'id'    => 'custom_font_woff',
							'type'  => 'text', 
							'title' => esc_html__( 'WOFF file', 'apress' ),
							'placeholder' => esc_html__( 'http://example.com/wp-content/my-custom-font/my-custom-font.woff', 'apress' ),
						),					
						array(
							'id'    => 'custom_font_ttf',
							'type'  => 'text', 
							'title' => esc_html__( 'TTF file', 'apress' ),
							'placeholder' => esc_html__( 'http://example.com/wp-content/my-custom-font/my-custom-font.ttf', 'apress' ),
						),					
						array(
							'id'    => 'custom_font_svg',
							'type'  => 'text', 
							'title' => esc_html__( 'SVG file', 'apress' ),
							'placeholder' => esc_html__( 'http://example.com/wp-content/my-custom-font/my-custom-font.svg', 'apress' ),
						),					 
					)
			  ),
        )		
    ) );
	
	// -> Colors Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Colors', 'apress' ),
        'id'               => 'zolo_colors',
        'subtitle'             => esc_html__( 'These are really basic fields!', 'apress' ),
        'icon'             => 'el el-brush',
		'fields'           => array(
			
			array (				
				'title'		=> esc_html__( 'Primary Color Option','apress' ),
				'id' 		=> 'primary_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
			),
			array(
				'title'			=> esc_html__('Primary Color', 'apress'),
				'subtitle'		=> esc_html__('Controls several items, ex: link hovers, highlights, and more.', 'apress'),
				'id'			=> 'primary_color',
				'default'		=> '#549ffc',
				'type'			=> 'color',
				'transparent'	=> false,
				'required'	=> array( 
						array('primary_color_option', '=', 'color'),
					),
			),
			array(
				'id'       => 'primary_gradient',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Primary Gradient Color', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array( 
						array('primary_color_option', '=', 'gradient'),
					),
			),
			array(
				'id'			=> 'body-link-color',
				'title'			=> esc_html__('Body Links Color', 'apress'),
				'subtitle'		=> esc_html__('Select body links color.', 'apress'),
				'default'		=> '#888888',
				'type'			=> 'color',
				'transparent'	=> false,
			),
			
			array (				
				'title'		=> esc_html__( 'Body Links Hover Color Option','apress' ),
				'id' 		=> 'body_link_hover_color_option',
				'type'     	=> 'button_set', 				
				'options' => array(
					'color' => 'Color', 
					'gradient' => 'Gradient', 
				), 
				'default' => 'color',
			),
			array(
				'id'			=> 'body_link_hover_color',
				'title'			=> esc_html__('Body Links Hover Color', 'apress'),
				'subtitle'		=> esc_html__('Select body links hover color.', 'apress'),
				'default'		=> '#333333',
				'type'			=> 'color',
				'transparent'	=> false,
				'required'	=> array( 
						array('body_link_hover_color_option', '=', 'color'),
					),
			),
			array(
				'id'       => 'link_hover_gradient',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Body Links Hover Gradient Color', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#5295ea',
					'to'   => '#8b79db', 
				),
				'required'	=> array( 
						array('body_link_hover_color_option', '=', 'gradient'),
					),
			),
			
			
			
			array(
				'id'			=> 'color_scheme_1',
				'title'			=> esc_html__('Color Scheme #1', 'apress'),
				'subtitle'		=> esc_html__('Select Color Scheme.', 'apress'),
				'default'		=> '#2e00af',
				'type'			=> 'color',
				'transparent'	=> false,
			),
			array(
				'id'			=> 'color_scheme_2',
				'title'			=> esc_html__('Color Scheme #2', 'apress'),
				'subtitle'		=> esc_html__('Select Color Scheme.', 'apress'),
				'default'		=> '#8b79db',
				'type'			=> 'color',
				'transparent'	=> false,
			),
			
			array(
				'id'       => 'gradient_scheme_1',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Gradient Scheme #1', 'apress'),
				'subtitle'	=> esc_html__('Select Gradient Scheme.', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#3452ff',
					'to'   => '#ff1053', 
				),
			),
			array(
				'id'       => 'gradient_scheme_2',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Gradient Scheme #2', 'apress'),
				'subtitle'	=> esc_html__('Select Gradient Scheme.', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#452998',
					'to'   => '#8601a8', 
				),
			),
			array(
				'id'       => 'gradient_scheme_3',
				'type'     => 'color_gradient',
				'title'    => esc_html__('Gradient Scheme #3', 'apress'),
				'subtitle'	=> esc_html__('Select Gradient Scheme.', 'apress'),
				'validate' => 'color',
				'default'  => array(
					'from' => '#bf55ec',
					'to'   => '#8601a8', 
				),
			),
			
			
			
			
			
			
		)
    ) );
	
	
	// -> Button Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Button', 'apress' ),
        'id'               => 'zolo_buttons',
        'subtitle'             => esc_html__( 'These are really basic fields!', 'apress' ),
        'icon'             => 'el el-brush',
		'fields'           => array(
			
			array( 
					'title'		=> esc_html__('Button Color Scheme', 'apress'),
					'subtitle'	=> __('Select the color scheme for all buttons <br> (Both Shortcode and site button)', 'apress'),
					'id'		=> 'button_color_scheme',
					'type'		=> 'select',
					'options'	=> array(
						'primary_color_scheme'	=> __("Primary Color",'apress'),
						'color_scheme1'			=> __("Color Scheme 1",'apress'),
						'color_scheme2'			=> __("Color Scheme 2",'apress'),
						'gradient_scheme1'		=> __("Gradient Scheme 1",'apress'),
						'gradient_scheme2'		=> __("Gradient Scheme 2",'apress'),
						'gradient_scheme3'		=> __("Gradient Scheme 3",'apress'),
					),
					'default'	=> 'primary_color_scheme',
				),
			
			array(
				'id'			=> 'button_text_color',
				'title'			=> esc_html__('Button Text Color', 'apress'),
				'subtitle'		=> esc_html__('Select Button Text Color.', 'apress'),
				'default'		=> '#ffffff',
				'type'			=> 'color',
				'transparent'	=> false,
			),			
			
			array (				
				'title'		=> esc_html__( 'Button Shape','apress' ),
				'subtitle'	=> esc_html__('Site button except the shortcode', 'apress'),
				'id' 		=> 'admin_button_shape',
				'type'     	=> 'button_set', 				
				'options' => array(
					'square' 	=> 'Square', 
					'rounded' 	=> 'Rounded',
					'round' 	=> 'Round', 
				), 
				'default' => 'square',
			),
			array( 
				'title'		=> esc_html__('Button Size', 'apress'),
				'subtitle'	=> esc_html__('Site button except the shortcode', 'apress'),
				'id'		=> 'admin_button_size',
				'type'		=> 'select',
				'options'	=> array(
					'small'		=> __("Small",'apress'),
					'medium'	=> __("Medium",'apress'),
					'large'		=> __("Large",'apress'),
				),
				'default'	=> 'small',
			),
			array(
				'title'		=> esc_html__('Button Shadow', 'apress'),
				'subtitle'	=> esc_html__('Show / Hide Button Shadow', 'apress'),
				'id'		=> 'admin_button_shadow',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
			),
			array(
				'title'		=> esc_html__('Button OnClick Effect', 'apress'),
				'subtitle'	=> esc_html__('Show / Hide Button onclick effect', 'apress'),
				'id'		=> 'button_onclick_effect',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
			),
		)
    ) );
	
	// -> Blog Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'apress' ),
        'id'               => 'zolo_blog',
        'subtitle'             => esc_html__( 'These are really basic fields!', 'apress' ),
        'icon'             => 'el el-file-edit'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Page Layout', 'apress' ),
        'id'               => 'zolo_blog_page_layout',
        'subsection'       => true,
        'fields'           => array(
            	array (
					'title'		=> 'Blog Page Title',
					'subtitle'	=> 'This text will display in the page title bar of the assigned blog page.',
					'id'		=> 'blog_title',
					'type'		=> 'text',
					'default'	=> 'Blog',
				),
				array(
					'title'		=> esc_html__('Page Title Bar Show/Hide', 'apress'),
					'subtitle'	=> esc_html__('Turn on to show the page title bar for the assigned blog page in "settings > reading"', 'apress'),
					'id'		=> 'blog_show_page_title_bar',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),	
				array( 
					'title'		=> esc_html__('Blog Layout', 'apress'),
					'subtitle'	=> esc_html__('Select the layout for the assigned blog page in settings > reading.', 'apress'),
					'id'		=> 'blog_layout',
					'type'		=> 'select',
					'options'	=> array(
						'small'		=> 'Small',
						'medium'	=> 'Medium',
						'large'		=> 'Large',
						'grid'		=> 'Grid',
						'masonry'	=> 'Masonry',
					),
					'default'	=> 'masonry',
				),
				array( 
					'title'		=> esc_html__('Blog Archive/Category Layout', 'apress'),
					'subtitle'	=> esc_html__('Select the layout for the blog archive/category pages.', 'apress'),
					'id'		=> 'blog_archive_layout',
					'type'		=> 'select',
					'options'	=> array(
						'small'		=> 'Small',
						'medium'	=> 'Medium',
						'large'		=> 'Large',
						'grid'		=> 'Grid',
						'masonry'	=> 'Masonry',
					),
					'default'		=> 'masonry',
				),
				array( 
					'title'		=> esc_html__('Grid/Masonry Layout # of Columns', 'apress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'apress'),
					'id'		=> 'blog_grid_columns',					
					'type'		=> 'select',
					'options'	=> array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
					),
					'default'	=> '3',
				),
				array(
					'title'		=> esc_html__('Post title position', 'apress'),
					'subtitle'	=> esc_html__('Show Post title below or above featured image', 'apress'),
					'id'		=> 'post_title_position',					
					'type'		=> 'select',
					'options'	=> array(
						'above' => 'Above',
						'below' => 'Below',
					),
					'default'	=> 'above',
				),
				array(
					'title'		=> esc_html__('Post title alignment', 'apress'),
					'subtitle'	=> esc_html__('Please select post title alignment', 'apress'),
					'id'		=> 'post_title_alignment',
					'type'		=> 'select',
					'options'	=> array(
						'left'		=> 'Left',
						'center'	=> 'Center',
						'right'		=> 'Right',
					),
					'default'	=> 'left',
				),
				array(
					'title'		=> esc_html__('Post title separator Show/Hide', 'apress'),
					'subtitle'	=> esc_html__('Select to show or hide post title separator', 'apress'),
					'id'		=> 'post_title_separator_show_hide',
					'type'		=> 'select',
					'options'	=> array(
						'show' => 'Show',
						'hide' => 'Hide',
					),
					'default'	=> 'hide',
				),
				array(
					'title'		=> esc_html__('Post title separator Image', 'apress'),
					'id'		=> 'post_title_separator_img',
					'type'		=> 'media',					
					'required'	=> array( 
						array('post_title_separator_show_hide', '=', 'show'),
					),
				),
				array(
					'title'		=> esc_html__('Category position', 'apress'),
					'subtitle'	=> esc_html__('Select to show category above or below the post title', 'apress'),
					'id'		=> 'post_category_position',					
					'type'		=> 'select',
					'options'	=> array(
						'above' => 'Above',
						'below' => 'Below',
					),
					'default'	=> 'above',
				),
				array(
					'title'		=> esc_html__('Category design', 'apress'),
					'subtitle'	=> esc_html__('Please choose category design', 'apress'),
					'id'		=> 'post_category_design',
					'type'		=> 'select',
					'options'	=> array(
						'box'		=> 'Box',
						'rounded'	=> 'Rounded',
						'image'		=> 'Image',
						'none'		=> 'None',
					),
					'default'	=> 'box',
				),
				array(
					'title'		=> esc_html__('Image for category design', 'apress'),
					'id'		=> 'blog_category_design_img',
					'type'		=> 'media',					
					'required'	=> array( 
						array('post_category_design', '=', 'image'),
					),
				),
				array (
					'title'		=> 'Excerpt Length',
					'subtitle'	=> 'Insert the number of words you want to show in the post excerpts.',
					'id'		=> 'excerpt_length_blog',
					'type'		=> 'text',
					'default'	=> '55',
				),
				array(
					'title'		=> esc_html__('Continue Reading Show/Hide', 'apress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'apress'),
					'id'		=> 'post_continue_reading_show_hide',
					'type'		=> 'select',
					'options'	=> array(
						'show'	=> 'Show',
						'hide'	=> 'Hide',
					),
					'default'	=> 'show',
				),
				array(
					'title'		=> esc_html__('Modify the Continue Reading text ', 'apress'),
					'id'		=> 'post_continue_reading_modify',
					'default'	=> 'Continue Reading',
					'type'		=> 'text',
					'required'	=> array( 
						array('post_continue_reading_show_hide', '=', 'show'),
					),
				),
				array(
					'title'		=> esc_html__('Post social sharing Show/Hide', 'apress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'apress'),
					'id'		=> 'post_social_sharing_show_hide',					
					'type'		=> 'select',
					'options'	=> array(
						'show' => 'Show',
						'hide' => 'Hide',
					),
					'default'	=> 'show',
				),
				
				array(
					'title'		=> esc_html__('Blog Post Design', 'apress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'apress'),
					'id'		=> 'blog_post_design',					
					'type'		=> 'select',
					'options'	=> array(
						'none'	=> 'None',
						'box'	=> 'Box',
						'box_withoutpadding' => 'Box Without Padding',
					),
					'default'	=> 'none',
				),
				array(
					'title'		=> esc_html__('Post separator Show/Hide', 'apress'),
					'subtitle'	=> esc_html__('Select whether to display the grid layout in 2, 3 or 4 columns.', 'apress'),
					'id'		=> 'post_separator_show_hide',					
					'type'		=> 'select',
					'options'	=> array(						
						'show' => 'Show',
						'hide' => 'Hide',				
					),
					'default'	=> 'hide',
				),
				array(
					'title'		=> esc_html__('Post separator Image', 'apress'),
					'id'		=> 'post_separator_img',
					'type'		=> 'media',					
					'required' => array( 
						array('post_separator_show_hide', '=', 'show'),
					),
				),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Single Post', 'apress' ),
        'id'               => 'zolo_blog_single_post',
        'subsection'       => true,
        'fields'           => array(
			array (
				'title'		=>  esc_html__( 'Single Post Layout Style', 'apress' ),
				'subtitle'	=>  esc_html__( 'Select sidebar position.', 'apress' ), 
				'id'		=> 'single_post_layout_style',
				'type'     => 'image_select',
				'options'  => array( 
					'layout_style1'	=> array(
					'alt'   => 'layout_style1', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout1.jpg',
					),      	
					'layout_style2'	=> array(
					'alt'   => 'layout_style2', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout2.jpg',
					),						
					'layout_style3'	=> array(
					'alt'   => 'layout_style3', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout3.jpg',
					),
					'layout_style4'	=> array(
					'alt'   => 'layout_style4', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout4.jpg',
					),
					'layout_style5'	=> array(
					'alt'   => 'layout_style5', 
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout5.jpg',
					),
					'layout_style6'	=> array(
					'alt'   => 'layout_style6',
					'img'   => get_template_directory_uri().'/assets/images/SinglePost_Layout6.jpg',
					),
				),
				'default'	=> 'layout_style1',
				
			),
			array(				
				'title'		=> esc_html__( 'Single Post Title Bar','apress' ),
				'subtitle' 	=> esc_html__( 'Controls how the single post title bar displays. ','apress' ),
				'id' 		=> 'single_post_title_bar',
				'type'		=> 'button_set',
				'options'	=> array(					
					'on'	=> esc_html__( 'ON', 'apress' ),
					'off'   => esc_html__( 'OFF', 'apress' ),
				),
				'default'     => 'off',
			),
			array(
				'title'          => esc_html__( 'Single Post Content Max Width', 'apress' ),
				'id'             => 'single_post_layout_width',
				'type'           => 'dimensions',
				'units'          => array( 'px'),
				'units_extended' => 'true',
				'height'         => false,
				'default'        => array(
					'width'	=> '900',
				),
				'required' => array('single_post_layout_style', '!=', 'layout_style1'),
			),
			array(
				'title'          => esc_html__( 'Single Post Title Position', 'apress' ),
				'id'             => 'single_post_title_position',
				'type'     => 'button_set',
				'options'  => array(
					'title_position_middle' => esc_html__( 'Middle', 'apress' ),
					'title_position_bottom' => esc_html__( 'Bottom', 'apress' ),
				),
				'default'  => 'title_position_middle',
				'required' => array('single_post_layout_style', '=', 'layout_style4'),
			),
			array(
				'title'		=> esc_html__( 'Featured Image / Video on Single Post Page', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display featured images and videos on single blog posts.', 'apress' ),
				'id'		=> 'featured_images_single',		
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Post Title', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display the post title that goes below the featured image area.', 'apress' ),
				'id'		=> 'blog_post_title',	
				'type'		=> 'button_set',
				'options'	=> array(					
						'on'	=> esc_html__( 'ON', 'apress' ),
						'off'	=> esc_html__( 'OFF', 'apress' ),
					),
				"default"	=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Disable Previous/Next Pagination', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display the previous/next post pagination for single blog posts.', 'apress'),
				'id'		=> 'blog_pn_nav',
				'type'		=> 'button_set',
				'options'	=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				'default'	=> 'on',
			),
			array(
				'title'    => esc_html__( 'Navigation Style', 'apress' ),
				'subtitle' => esc_html__( 'Controls the Navigation style.', 'apress' ),
				'id'       => 'post_navigation_style',
				'type'     => 'button_set',
				'options'  => array(
					'style1' => esc_html__( 'Style 1', 'apress' ),
					'style2' => esc_html__( 'Style 2', 'apress' ),
					'style3' => esc_html__( 'Style 3', 'apress' ),
					'style4' => esc_html__( 'Style 4', 'apress' ),
					),
				'default'  => 'style1',
				'required' => array('blog_pn_nav', '=', 'on'),
				),
			array( 
				'title'			=> esc_html__('Navigation Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the Font color of the Navigation.', 'apress'),
				'id'			=> 'post_navigation_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
					'regular' => '#888888',
					'hover'   => '#333333',
					),
				'required'		=> array('post_navigation_style', '!=', 'style4'),
			),
			array( 
				'title'			=> esc_html__('Navigation Background Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color of the Navigation.', 'apress'),
				'id'			=> 'post_navigation_bg_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
					'regular'	=> '#f7f7f7',
					'hover'		=> '#eeeeee',
					),
				'required'		=> array('post_navigation_style', '!=', 'style4'),
			),
			array( 
				'title'			=> esc_html__('Navigation Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the font color of the Navigation.', 'apress'),
				'id'			=> 'post_navigation_font_color4-w',
				'type'			=> 'color',
				'default'  		=> '#ffffff',
				'transparent'	=> false,
				'required' 		=> array('post_navigation_style', '=', 'style4'),
			),
			array( 
				'title'			=> esc_html__('Navigation Image Overlay Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the Overlay color of the Navigation.', 'apress'),
				'id'			=> 'post_navigation_overlay_color',
				'type'			=> 'color',
				'default'  		=> '#888888',
				'transparent'	=> false,
				'required'		=> array('post_navigation_style', '=', 'style4'),
			),
			array( 
				'title'			=> esc_html__('Navigation Button link source', 'apress'),
				'id'			=> 'post_navigation_button_link_source',
				'type'			=> 'select',
				'options' 		=> array(
					'page' 		=> esc_html__('Page', 'apress'),
					'url' 		=> esc_html__('Custom url', 'apress'),
				),
				'default'  		=> 'select',
				'required'		=> array('post_navigation_style', '=', 'style2'),
			),
			array( 
				'title'			=> esc_html__('Navigation Button link source', 'apress'),
				'id'			=> 'post_navigation_button_link_source',
				'type'			=> 'select',
				'options' 		=> array(
					'page' 		=> esc_html__('Page', 'apress'),
					'url' 		=> esc_html__('Custom url', 'apress'),
				),
				'default'  		=> '',
				'required'		=> array('post_navigation_style', '=', 'style2'),
			),
			array( 
				'title'			=> esc_html__('Page select', 'apress'),
				'id'			=> 'post_navigation_page_select',
				'type'			=> 'select',
				'data'     		=> 'pages',
				'required'		=> array('post_navigation_button_link_source', '=', 'page'),
			),
			array( 
				'title'			=> esc_html__('Page url', 'apress'),
				'id'			=> 'post_navigation_page_url',
				'type'			=> 'text',
				'validate' 		=> 'url',
				'default'  		=> '',
				'required'		=> array('post_navigation_button_link_source', '=', 'url'),
			),
			array(
				'title'		=> esc_html__( 'Author Info Box', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display the author info box below posts.', 'apress' ),
				'id'		=> 'post_author_info',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Social Sharing Box', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display the social sharing box.', 'apress' ),
				'id'		=> 'social_sharing_box',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Related Posts', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display related posts.', 'apress' ),
				'id'		=> 'related_posts',		
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
			array(
				'title'		=> esc_html__( 'Comments', 'apress' ),
				'subtitle'	=> esc_html__( 'Turn on to display comments.', 'apress' ),
				'id'		=> 'blog_comments',
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Meta', 'apress' ),
        'id'               => 'zolo_blog_meta',
        'subsection'       => true,
        'fields'           => array(
			array(
				'title'			=> esc_html__( 'Post Meta', 'apress' ),
				'subtitle'		=> esc_html__( 'Turn on to display post meta on blog posts.', 'apress' ),
				'id'			=> 'post_meta',
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',
			),
			array(
				'title'			=> esc_html__('Social Sharing Tagline', 'apress'),
				'subtitle'		=> esc_html__('Change tagline for Single Post, Custom single post type', 'apress'),
				'id'			=> 'sharing_social_tagline',
				'default'		=> esc_html__( 'Share This Story, Choose Your Platform!', 'apress' ),
				'type'			=> 'text',
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Styling', 'apress' ),
        'id'               => 'zolo_blog_styling',
        'subsection'       => true,
        'fields'           => array(
            	
				array(
					"title"			=> esc_html__("Category Item Font Color", "apress"),
					"subtitle"		=> esc_html__("Controls the font color of the Category item.", "apress"),
					"id"			=> "post_category_font",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					)
				),
				array(
					"title"			=> esc_html__("Category item Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the background color of the Category item.", "apress"),
					"id"			=> "post_category_bg",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,					
				),
				array(
					"title"			=> esc_html__("Category item Hover Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the background color of the Category item.", "apress"),
					"id"			=> "post_category_bg_hover",
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Category item Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the Category item.", "apress"),
					"id"			=> "post_category_border",
					'type'			=> 'color_alpha',
					'default'  		=> '#757575',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Category item Hover Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the Category item hover.", "apress"),
					"id"			=> "post_category_border_hover",
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Font Color", "apress"),
					"subtitle"		=> esc_html__("Controls the font color of the continue reading button.", "apress"),
					"id"			=> "post_continuereading_font",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					)
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the background color of the continue reading button.", "apress"),
					"id"			=> "post_continuereading_bg",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,				
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Hover Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the background color of the continue reading button hover.", "apress"),
					"id"			=> "post_continuereading_bg_hover",
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the continue reading button.", "apress"),
					"id"			=> "post_continuereading_border",
					'type'			=> 'color_alpha',
					'default'  		=> '#757575',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Continue Reading Button Hover Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the continue reading button hover.", "apress"),
					"id"			=> "post_continuereading_border_hover",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,
				),
				array( 
					'title'			=> esc_html__('Box Background Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the background color of the grid box.', 'apress'),
					'id'			=> 'bloggrid_box_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(255,255,255,0.9)',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Box Shadow Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the shadow color of the grid box.', 'apress'),
					'id'			=> 'bloggrid_box_shadow_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.15)',
					'transparent'	=> false,
				),
				array( 
					'title'			=> esc_html__('Pagination Background Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the background color of the Pagination.', 'apress'),
					'id'			=> 'Pagi_background_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#eeeeee',
						'hover'   => '',
					)
				),
				array(
					'title'			=> esc_html__('Pagination Font Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the font color of the Pagination.', 'apress'),
					'id'			=> 'Pagi_font_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#333333',
						'hover'   => '#ffffff',
					)
				),
				array(
					"title"			=> esc_html__("Pagination border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the Pagination.", "apress"),
					"id"			=> "Pagi_border_color",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#e1e1e1',
						'hover'   => '#cccccc',
					)
				),
				array(
					'title'			=> esc_html__('Pagination Font Size', 'apress'),
					'subtitle'		=> esc_html__("Insert without 'px' ex: 12", "apress"),
					'id'			=> 'pagination_font_size',
					'default'		=> '12',
					'type'			=> 'text',
				),
				array (
					'raw'			=> 'Social Share Options',
					'id'			=> 'social_share_options',
					'icon'			=> true,
					'type'			=> 'info',					
				),
				array (				
					'title'		=> esc_html__( 'Social Share Style','apress' ),
					'id' 		=> 'social_share_style',
					'type'     	=> 'button_set', 				
					'options' => array(
						'default' => 'Default',
						'metro'   => 'Metro', 
					), 
					'default' => 'default',
				),	
				array(
					"title"			=> esc_html__("Social Share Font Color", "apress"),
					"subtitle"		=> esc_html__("Controls the font color of the social share.", "apress"),
					"id"			=> "post_social_share_font",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					),
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				array(
					"title"			=> esc_html__("Social Share Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the background color of the Social Share.", "apress"),
					"id"			=> "post_social_share_bg",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(117,117,117,0.0)',
					'transparent'	=> false,
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				
				array(
					"title"			=> esc_html__("Social Share Hover Background Color", "apress"),
					"subtitle"		=> esc_html__("Controls the background color of the social share hover.", "apress"),
					"id"			=> "post_social_share_bg_hover",
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				array(
					"title"			=> esc_html__("Social Share Border Color", "apress"),
					"subtitle"		=> esc_html__("Controls the border color of the social share.", "apress"),
					"id"			=> "post_social_share_border",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#757575',
						'hover'   => '',
					),
					'required' 		=> array( 'social_share_style', '=', 'default' ),
				),
				array(
					'title'		=> esc_html__('Social Sharing Border Radius', 'apress'),
					'id'		=> 'post_social_sharing_border_radius',
					'default'	=> '', 
					'type'		=> 'text',
				),
        )
    ) );
	
	// -> Portfolio Section	
    Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Portfolio', 'apress' ),
        'id'				=> 'zolo_portfolio',
        'subtitle'			=> esc_html__( 'These are really basic fields!', 'apress' ),
        'icon'				=> 'el el-th'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Portfolio', 'apress' ),
        'id'               => 'zolo_general_portfolio',
        'subsection'       => true,
        'fields'           => array(
				
				array(
					'title'			=> esc_html__('Portfolio URL slug', 'apress'),
					'subtitle'		=> esc_html__('Please do not forget to save the permalinks in Settings -> Permalinks after changing this option', 'apress'),
					'id'			=> 'portfolio_url_slug',
					'type'			=> 'text',					
					'default'		=> 'zt_portfolio',
				),		
				array(
					'title'			=> esc_html__('Number of Portfolio Items Per Page', 'apress'),
					'subtitle'		=> esc_html__('Insert the number of posts to display per page.', 'apress'),
					'id'			=> 'portfolio_items',
					'default'		=> '10',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__('Portfolio Archive/Category Layout', 'apress'),
					'subtitle'		=> esc_html__('Select the layout for only the portfolio archive/category pages', 'apress'),
					'id'			=> 'portfolio_archive_layout',
					'default'		=> 'portfolio_grid',
					'type'			=> 'select',
					'options'		=> array(			
						'portfolio_grid' => 'Portfolio Grid',
						'portfolio_masonry' => 'Portfolio Masonry',
						),
				),
				array(
					'title'			=> esc_html__('Portfolio Layout Columns', 'apress'),
					'subtitle'		=> esc_html__('Select layout of portfolio items', 'apress'),
					'id'			=> 'portfolio_layout_columns',
					'default'		=> '4',
					'type'			=> 'select',
					'options' => array(			
							'2' => '2',
							'3' => '3',
							'4' => '4',
							'5' => '5',
							'6' => '6',
						),
				),
				array(
					'title'			=> esc_html__('Portfolio Archive/Category Column Spacing', 'apress'),
					'subtitle'		=> esc_html__('Insert the amount of spacing between portfolio items without"px".ex: 12', 'apress'),
					'id'			=> 'portfolio_column_spacing',
					'default'		=> '15',
					'type'			=> 'text',
				),	
				array(
					'title'			=> esc_html__('Hover Effect', 'apress'),
					'subtitle'		=> esc_html__('Select the hover effect', 'apress'),
					'id'			=> 'portfolio_hover_effects',
					'default'		=> 'fade_effect',
					'type'			=> 'select',
					'options'		=> array(			
						'fade_effect' => esc_html__( 'Fade', 'apress'),
						'zoomin_effect' => esc_html__( 'Zoom In', 'apress'),
						'zoomout_effect' => esc_html__( 'Zoom Out', 'apress'),
						'bwtocolor_effect' => esc_html__( 'B/W to Color', 'apress'),
						'colortobw_effect' => esc_html__( 'Color To B/W', 'apress'),
						'gradient_effect' => esc_html__( 'Gradient', 'apress'),
					),
				),
				array(
					"title"			=> esc_html__("Overlay Color", "apress"),
					"id"			=> "portfolio_overlay_color",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.4)',
					'transparent'	=> false,
					'required'	=> array('portfolio_hover_effects', '=', array('fade_effect','zoomin_effect','zoomout_effect')),
				),
				array(
					'title'    => esc_html__('Gradient Overlay Color', 'apress'),
					'id'       => 'portfolio_overlay_gradient',
					'type'     => 'color_gradient',
					'validate' => 'color',
					'transparent'	=> false,
					'default'  => array(
						'from' => '#5295ea',
						'to'   => '#8b79db', 
					),
					'required'	=> array('portfolio_hover_effects', '=', 'gradient_effect'),
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Single Post', 'apress' ),
        'id'               => 'zolo_single_portfolio',
        'subsection'       => true,
        'fields'           => array(
				array(
					'title'			=> esc_html__('Portfolio Layout', 'apress'),
					'subtitle'		=> esc_html__('Choose the default single portfolio layout', 'apress'),
					'id'			=> 'choose_portfolio_layout',
					'type'     => 'image_select',
						'options'  => array( 
						'layout_style1'	=> array(
						'alt'   => 'layout_style1', 
						'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout1.jpg',
						),      	
						'layout_style2'	=> array(
						'alt'   => 'layout_style2', 
						'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout2.jpg',
						),						
						'layout_style3'	=> array(
						'alt'   => 'layout_style3', 
						'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout3.jpg',
						),
						'layout_style4'	=> array(
						'alt'   => 'layout_style4', 
						'img'   => get_template_directory_uri().'/assets/images/SinglePortfolio_Layout4.jpg',
						),
					),
					'default'	=> 'layout_style1',
				),
				array(
					'title'		=> esc_html__('Portfolio Image Gallery Layout', 'apress'),
					'subtitle'	=> esc_html__('Choose the default single portfolio image gallery layout', 'apress'),
					'id'		=> 'portfolio_gallery_layout',
					'type'     => 'image_select',
					'options'  => array( 
						'gallery_layout_style1'	=> array(
						'alt'   => 'gallery_layout_style1', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image1.jpg',
						),      	
						'gallery_layout_style2'	=> array(
						'alt'   => 'gallery_layout_style2', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image2.jpg',
						),						
						'gallery_layout_style3'	=> array(
						'alt'   => 'gallery_layout_style3', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image3.jpg',
						),
						'gallery_layout_style4'	=> array(
						'alt'   => 'gallery_layout_style4', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image4.jpg',
						),
						'gallery_layout_style5'	=> array(
						'alt'   => 'gallery_layout_style5', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image5.jpg',
						),
						'gallery_layout_style6'	=> array(
						'alt'   => 'gallery_layout_style6', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image6.jpg',
						),
						'gallery_layout_style7'	=> array(
						'alt'   => 'gallery_layout_style7', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image7.jpg',
						),
					),
					'default'	=> 'gallery_layout_style1',
				),
				array(
					'title'		=> esc_html__('Portfolio Image Gutter', 'apress'),
					'id'		=> 'portfolio_gallery_gutter',
					'type'     => 'text',
					'validate' => 'numeric',
					'default'	=> '',
					'required' => array('portfolio_gallery_layout', '!=', 'gallery_layout_style1'),
				),
				array(
					'title'		=> esc_html__( 'Lightbox Style','apress' ),
					'id'		=> 'lightbox_style',
					'type'		=> 'button_set',
					'options'	=> array(	
						'lightbox-none'   => esc_html__( 'None', 'apress' ),				
						'photo-swipe-gallery'	=> esc_html__( 'Photo Swipe', 'apress' ),
						'magnific-popup-gallery'	=> esc_html__( 'Magnific Popup', 'apress' ),
						),
					'default'  => 'photo-swipe-gallery',
				),
				array(
					'title'			=> esc_html__('Deactivate Hover Effect', 'apress'),
					'subtitle'		=> esc_html__('Select the option to deactivate hover effect on single portfolio page featured and gallery images.', 'apress'),
					'id'			=> 'deactivate_hover_effect',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
				array(
					'title'			=> esc_html__('Featured Image / Video on Single Portfolio Page', 'apress'),
					'subtitle'		=> esc_html__('Turn off to hide featured images and videos on single Portfolio pages.', 'apress'),
					'id'			=> 'portfolio_featured_images',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
				array(
					'title'			=> esc_html__('Disable Previous/Next Pagination', 'apress'),
					'subtitle'		=> esc_html__('Turn on to disable previous/next pagination.', 'apress'),
					'id'			=> 'zt_portfolio_nav',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',	
				),				
				array(
					'title'    => esc_html__( 'Navigation Style', 'apress' ),
					'subtitle' => esc_html__( 'Controls the Navigation style.', 'apress' ),
					'id'       => 'portfolio_navigation_style',
					'type'     => 'button_set',
					'options'  => array(
						'style1' => esc_html__( 'Style 1', 'apress' ),
						'style2' => esc_html__( 'Style 2', 'apress' ),
						'style3' => esc_html__( 'Style 3', 'apress' ),
						'style4' => esc_html__( 'Style 4', 'apress' ),
						),
					'default'  => 'style1',
					'required' => array('zt_portfolio_nav', '=', 'on'),
				),
				array( 
					'title'			=> esc_html__('Navigation Font Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the Font color of the Navigation.', 'apress'),
					'id'			=> 'portfolio_navigation_font_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#888888',
						'hover'   => '#333333',
					),
					'required' => array('portfolio_navigation_style', '!=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Background Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the background color of the Navigation.', 'apress'),
					'id'			=> 'portfolio_navigation_bg_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#f7f7f7',
						'hover'   => '#eeeeee',
					),
					'required' => array('portfolio_navigation_style', '!=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Font Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the font color of the Navigation.', 'apress'),
					'id'			=> 'portfolio_navigation_font_color4-w',
					'type'			=> 'color',
					'default'  		=> '#ffffff',
					'transparent'	=> false,
					'required' 		=> array('portfolio_navigation_style', '=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Image Overlay Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the Overlay color of the Navigation.', 'apress'),
					'id'			=> 'portfolio_navigation_overlay_color',
					'type'			=> 'color',
					'default'  		=> '#888888',
					'transparent'	=> false,
					'required' => array('portfolio_navigation_style', '=', 'style4'),
				),
				array( 
					'title'			=> esc_html__('Navigation Button link source', 'apress'),
					'id'			=> 'portfolio_navigation_button_link_source',
					'type'			=> 'select',
					'options' 		=> array(
						'page' 		=> esc_html__('Page', 'apress'),
						'url' 		=> esc_html__('Custom url', 'apress'),
					),
					'default'  		=> 'select',
					'required' => array('portfolio_navigation_style', '=', 'style2'),
				),
				array( 
					'title'			=> esc_html__('Navigation Button link source', 'apress'),
					'id'			=> 'portfolio_navigation_button_link_source',
					'type'			=> 'select',
					'options' 		=> array(
						'page' 		=> esc_html__('Page', 'apress'),
						'url' 		=> esc_html__('Custom url', 'apress'),
					),
					'default'  		=> '',
					'required' => array('portfolio_navigation_style', '=', 'style2'),
				),
				array( 
					'title'			=> esc_html__('Page select', 'apress'),
					'id'			=> 'portfolio_navigation_page_select',
					'type'			=> 'select',
					'data'     		=> 'pages',
					'required' => array('portfolio_navigation_button_link_source', '=', 'page'),
				),
				array( 
					'title'			=> esc_html__('Page url', 'apress'),
					'id'			=> 'portfolio_navigation_page_url',
					'type'			=> 'text',
					'validate' 		=> 'url',
					'default'  		=> '',
					'required' => array('portfolio_navigation_button_link_source', '=', 'url'),
				),
				array(
					'title'			=> esc_html__('Show Author', 'apress'),
					'subtitle'		=> esc_html__('Turn on to enable Author on portfolio items.', 'apress'),
					'id'			=> 'portfolio_author',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',	
				),
				array(
					'title'			=> esc_html__('Social Sharing Box', 'apress'),
					'subtitle'		=> esc_html__('Turn off to hide the social sharing box.', 'apress'),
					'id'			=> 'portfolio_social_sharing_box',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
				array(
					'title'			=> esc_html__('Related Posts', 'apress'),
					'subtitle'		=> esc_html__('Turn off to hide related posts.', 'apress'),
					'id'			=> 'portfolio_related_posts',	
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',	
				),
        	)
    ) );
	
	// -> Testimonial Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Testimonial', 'apress' ),
        'id'               => 'zolo_testimonial',
        'subtitle'             => esc_html__( 'Testimonial Single Post Page Options', 'apress' ),
        'icon'             => 'el el-brush',
		'fields'           => array(
			
			array(
				'title'			=> esc_html__('Testimonial URL slug', 'apress'),
				'subtitle'		=> esc_html__('Please do not forget to save the permalinks in Settings -> Permalinks after changing this option', 'apress'),
				'id'			=> 'testimonial_url_slug',
				'type'			=> 'text',					
				'default'		=> 'zt_testimonial',
			),					
			array( 
				'title'		=> esc_html__('Layout Style', 'apress'),
				'id'		=> 'testimonial_single_page_style',
				'type'		=> 'select',
				'options'	=> array(
					'testimonial_layout_style_1' => __('Layout Style 1', 'apress'), 
					'testimonial_layout_style_2' => __('Layout Style 2', 'apress'),
					'testimonial_layout_style_3' => __('Layout Style 3', 'apress')
				),
				'default'	=> 'testimonial_layout_style_1',
			),
			
			array(
				'id'			=> 'rating_star_color',
				'title'			=> esc_html__('Rating Icon Color', 'apress'),
				'subtitle'		=> esc_html__('Select rating icon Color.', 'apress'),
				'default'		=> '',
				'type'			=> 'color',
				'transparent'	=> false,
			),			
			
			array(
				'title'		=> esc_html__('Social Sharing Box', 'apress'),
				'id'		=> 'testimonial_social_sharing_box',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
			),
			array(
				'title'		=> esc_html__('Enable Previous/Next Pagination', 'apress'),
				'id'		=> 'testimonial_pn_nav',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
			),
			array( 
				'title'			=> esc_html__('Navigation Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the Font color of the Navigation.', 'apress'),
				'id'			=> 'testimonial_navigation_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
					'regular' => '#888888',
					'hover'   => '#333333',
					),
				'required'		=> array('testimonial_pn_nav', '=', 'on'),
			),
			array( 
				'title'			=> esc_html__('Navigation Background Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color of the Navigation.', 'apress'),
				'id'			=> 'testimonial_navigation_bg_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
					'regular'	=> '#f7f7f7',
					'hover'		=> '#eeeeee',
					),
				'required'		=> array('testimonial_pn_nav', '=', 'on'),
			),
			array( 
				'title'			=> esc_html__('Navigation Button link source', 'apress'),
				'id'			=> 'testimonial_navigation_button_link_source',
				'type'			=> 'select',
				'options' 		=> array(
					'page' 		=> esc_html__('Page', 'apress'),
					'url' 		=> esc_html__('Custom url', 'apress'),
				),
				'default'  		=> 'page',
				'required'		=> array('testimonial_pn_nav', '=', 'on'),
			),
			array( 
				'title'			=> esc_html__('Page select', 'apress'),
				'id'			=> 'testimonial_navigation_page_select',
				'type'			=> 'select',
				'data'     		=> 'pages',
				'required'		=> array('testimonial_navigation_button_link_source', '=', 'page'),
			),
			array( 
				'title'			=> esc_html__('Page url', 'apress'),
				'id'			=> 'testimonial_navigation_page_url',
				'type'			=> 'text',
				'validate' 		=> 'url',
				'default'  		=> '',
				'required'		=> array('testimonial_navigation_button_link_source', '=', 'url'),
			),
			
		)
    ) );
	// -> Team Section
	
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team', 'apress' ),
        'id'               => 'zolo_team',
        'subtitle'             => esc_html__( 'Team Single Post Page Options', 'apress' ),
        'icon'             => 'el el-brush',
		'fields'           => array(
			
			array(
				'title'			=> esc_html__('Team URL slug', 'apress'),
				'subtitle'		=> esc_html__('Please do not forget to save the permalinks in Settings -> Permalinks after changing this option', 'apress'),
				'id'			=> 'team_url_slug',
				'type'			=> 'text',					
				'default'		=> 'zt_team',
			),					
			array( 
				'title'		=> esc_html__('Layout Style', 'apress'),
				'id'		=> 'team_single_page_style',
				'type'		=> 'select',
				'options'	=> array(
					'team_layout_style_1' => __('Layout Style 1', 'apress'), 
					'team_layout_style_2' => __('Design Your Own', 'apress'),
				),
				'default'	=> 'team_layout_style_1',
			),
			array(
				'title'		=> esc_html__('Social Sharing Box', 'apress'),
				'id'		=> 'team_social_sharing_box',			
				'type'			=> 'button_set',

				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
			),
			array(
				'title'		=> esc_html__('Related Posts', 'apress'),
				'id'		=> 'team_related_posts',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'off',	
			),
			array(
				'title'		=> esc_html__('Enable Previous/Next Pagination', 'apress'),
				'id'		=> 'team_pn_nav',			
				'type'			=> 'button_set',
				'options'		=> array(					
						'on'  => esc_html__( 'ON', 'apress' ),
						'off'   => esc_html__( 'OFF', 'apress' ),
					),
				"default"		=> 'on',	
			),
			array( 
				'title'			=> esc_html__('Navigation Font Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the Font color of the Navigation.', 'apress'),
				'id'			=> 'team_navigation_font_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
					'regular' => '#888888',
					'hover'   => '#333333',
					),
				'required'		=> array('team_pn_nav', '=', 'on'),
			),
			array( 
				'title'			=> esc_html__('Navigation Background Color', 'apress'),
				'subtitle'		=> esc_html__('Controls the background color of the Navigation.', 'apress'),
				'id'			=> 'team_navigation_bg_color',
				'type'			=> 'link_color',
				'active'    	=> false,
				'default'		=> array(
					'regular'	=> '#f7f7f7',
					'hover'		=> '#eeeeee',
					),
				'required'		=> array('team_pn_nav', '=', 'on'),
			),
			array( 
				'title'			=> esc_html__('Navigation Button link source', 'apress'),
				'id'			=> 'team_navigation_button_link_source',
				'type'			=> 'select',
				'options' 		=> array(
					'page' 		=> esc_html__('Page', 'apress'),
					'url' 		=> esc_html__('Custom url', 'apress'),
				),
				'default'  		=> 'page',
				'required'		=> array('team_pn_nav', '=', 'on'),
			),
			array( 
				'title'			=> esc_html__('Page select', 'apress'),
				'id'			=> 'team_navigation_page_select',
				'type'			=> 'select',
				'data'     		=> 'pages',
				'required'		=> array('team_navigation_button_link_source', '=', 'page'),
			),
			array( 
				'title'			=> esc_html__('Page url', 'apress'),
				'id'			=> 'team_navigation_page_url',
				'type'			=> 'text',
				'validate' 		=> 'url',
				'default'  		=> '',
				'required'		=> array('team_navigation_button_link_source', '=', 'url'),
			),
			
			
			
		)
    ) );
	
	// -> Social Section	
    Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Social Media', 'apress' ),
        'id'				=> 'zolo_social_section',
        'subtitle'			=> esc_html__( 'These are really basic fields!', 'apress' ),
        'icon'				=> 'el el-share-alt'
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Media', 'apress' ),
        'id'               => 'zolo_social_media',
        'subsection'       => true,
        'fields'           => array(            	
				array(
					'title'			=> esc_html__( 'Facebook', 'apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Facebook icon. Leave blank to hide icon.', 'apress' ),
					'id'			=> 'facebook_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Flickr','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Flickr icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'flickr_link',
					'type'			=> 'text',					
				),
				array(
					'title'			=> esc_html__( 'RSS','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the RSS icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'rss_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Twitter','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Twitter icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'twitter_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Vimeo','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Vimeo icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'vimeo_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Youtube','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Youtube icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'youtube_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Instagram','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Instagram icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'instagram_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Pinterest','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Pinterest icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'pinterest_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'Tumblr','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Tumblr icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'tumblr_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Google+','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Google+ icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'google_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Dribbble','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Dribbble icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'dribbble_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Digg','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Digg icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'digg_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'LinkedIn','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the LinkedIn icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'linkedin_link',
					'type'			=> 'text',
					'default'		=> '#',
				),
				array(
					'title'			=> esc_html__( 'Skype','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Skype icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'skype_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Deviantart','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Deviantart icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'deviantart_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Yahoo','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Yahoo icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'yahoo_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'Reddit','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Redditt icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'reddit_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Dropbox','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Dropbox icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'dropbox_link',
					'type'			=> 'text',
					
				),
				array(
					'title'			=> esc_html__( 'Soundcloud','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Soundcloud icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'soundcloud_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'VK','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the VK icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'vk_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Github','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Github icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'github_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Behance','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Behance icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'behance_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( '500px','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the 500px icon. Leave blank to hide icon.','apress' ),
					'id'			=> '500px_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Xing','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the Xing icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'xing_link',
					'type'			=> 'text',
				),
				array(
					'title'			=> esc_html__( 'Email Address','apress' ),
					'subtitle'		=> esc_html__( 'Insert your custom link to show the mail icon. Leave blank to hide icon.','apress' ),
					'id'			=> 'email_link',
					'type'			=> 'text',
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Sharing Box', 'apress' ),
        'id'               => 'apress_theme_social_sharing_box',
        'subsection'       => true,
        'fields'           => array(            	
				array(
					'title'		=> esc_html__('Facebook', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the facebook sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_facebook',			
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('Twitter', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the twitter sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_twitter',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('LinkedIn', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the linkedin sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_linkedin',		
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('Google Plus', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the g+ sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_google',	
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('Tumblr', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the tumblr sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_tumblr',	
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('Pinterest', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the pinterest sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_pinterest',	
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'on',
				),
				array(
					'title'		=> esc_html__('Email', 'apress'),
					'subtitle'	=> esc_html__('Turn on to display the email sharing icon in blog posts.', 'apress'),
					'id'		=> 'sharing_email',
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					"default"		=> 'off',
				),
        	)
    ) );
	
	
	// -> Contact Form Section
	
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Contact Form', 'apress' ),
        'id'				=> 'zolo_contact_form',
		'icon'				=> 'el el-address-book',
        'fields'			=> array(
				array( 
					'title'			=> esc_html__('Contact Form Font Color', 'apress'),
					'subtitle'		=> esc_html__('Select a color for the Contact Form Text Color.', 'apress'),
					'id'			=> 'contact_form_text_color',
					'default'		=> '#747474',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Contact Form Border Color', 'apress'),
					'subtitle'		=> esc_html__('Contact Form Input field Border Color.', 'apress'),
					'id'			=> 'contact_form_input_bor_color',
					'type'			=> 'color_alpha',
					'default'  		=> '#cccccc',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Input Field Background Color", "apress"),
					"subtitle"		=> esc_html__("Contact Form Input field Background Color.", "apress"),
					"id"			=> "contact_form_input_bg_color",
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(255,255,255,0.0)',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Input Field Focus Color', 'apress'),
					'subtitle'		=> esc_html__('Contact Form Input field focus Color.', 'apress'),
					'id'			=> 'contact_form_input_focus_color',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					"title"			=> esc_html__("Button Text Color", "apress"),
					"subtitle"		=> esc_html__("Contact Form Button text Color.", "apress"),
					"id"			=> "contact_form_button_font_color",
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'  => array(
						'regular' => '#ffffff',
						'hover'   => '#F6F6F6',
					)
				),
				array(
					'title'			=> esc_html__('Button Background Color', 'apress'),
					'subtitle'		=> esc_html__('Contact Form Button Background Color.', 'apress'),
					'id'			=> 'contact_form_button_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Button Hover Background Color', 'apress'),
					'subtitle'		=> esc_html__('Contact Form Button Background Color.', 'apress'),
					'id'			=> 'contact_form_button_bg_color_h',
					'type'			=> 'color_alpha',
					'default'  		=> '',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Button Border Color', 'apress'),
					'subtitle'		=> esc_html__('Contact Form Border Background Color.', 'apress'),
					'id'			=> 'contact_form_button_bor_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.0)',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Button Hover Border Color', 'apress'),
					'subtitle'		=> esc_html__('Contact Form Border Background Color.', 'apress'),
					'id'			=> 'contact_form_button_bor_color_h',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.0)',
					'transparent'	=> false,				
				),
        	)
    ) );
	
	// check if woocommerce plugin installed
    if ( class_exists('Woocommerce') ) {
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Woocommerce', 'apress' ),
        'id'				=> 'zolo_woocommerce',
        'subtitle'			=> esc_html__( 'These are really basic fields!', 'apress' ),
        'icon'				=> 'el el-shopping-cart'
    ) );	
	// -> Woocommerce Section	
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Shop Page', 'apress' ),
        'id'				=> 'woocommerce_info',
		'subsection'		=> true,
        'fields'			=> array(
				array(
					'title'			=> esc_html__('Full-width Shop page', 'apress'),	
					'subtitle'		=> esc_html__('Check for full width Shop page', 'apress'),
					'id'			=> 'shop_page_full_width',					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'		=> 'off',					
				),			
				array(
					'title'			=> esc_html__('Shop Sidebar Position','apress'),
					'subtitle'		=> esc_html__('Select Shop page layout','apress'),
					'id'		=> 'shop_page_sidebar_position',
					'type'     => 'image_select',
					'options'  => array( 
						'none'	=> array(
						'alt'   => esc_html__('Full',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-full.png',
						),      	
						'left'	=> array(
						'alt'   => esc_html__('Left',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-left.png',
						),						
						'right'	=> array(
						'alt'   => esc_html__('Right',  'apress' ),
						'img'   => get_template_directory_uri().'/assets/images/layout-sidebar-right.png',
						),
					),
					'default'	=> 'right',					
				),
				array(
					'title'			=> esc_html__('Woocommerce Number of Product Columns', 'apress'),
					'subtitle'		=> esc_html__('Insert the number of products to display per page.', 'apress'),
					'id'			=> 'woocommerce_shop_page_columns',
					'default'		=> '4',
					'type'			=> 'select',
					'options'		=> array( 
						'2' => esc_html__('2', 'apress'),
						'3' => esc_html__('3', 'apress'),
						'4' => esc_html__('4', 'apress'),
						'5' => esc_html__('5', 'apress'),
						'6' => esc_html__('6', 'apress'),			   
					),
				),
				array(
					'title'			=> esc_html__('Woocommerce Number of Products per Page', 'apress'),
					'subtitle'		=> esc_html__('Insert the number of posts to display per page.', 'apress'),
					'id'			=> 'woo_items',
					'default'		=> '12',
					'type'			=> 'text',
				),
				array(
					'title'		=> esc_html__('Layout', 'apress'),
					'id'		=> 'woo_layout',
					'type'     => 'image_select',
					'options'  => array( 
						'woo_fitrows'	=> array(
						'alt'   => 'Fit Rows', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image3.jpg',
						),      	
						'woo_masonry'	=> array(
						'alt'   => 'Masonry', 
						'img'   => get_template_directory_uri().'/assets/images/portfolio_gallery_image5.jpg',
						),
					),
					'default'	=> 'woo_fitrows',
				),
				
				array(
					'title'		=> esc_html__('Product style', 'apress'),
					'subtitle'	=> esc_html__('Choose the default Product style', 'apress'),
					'id'		=> 'woocommerce_product_style',
					'type'     => 'image_select',
					'options'  => array( 
						'woocommerce_product_style1'	=> array(
						'alt'   => 'Woocommerce Product Style1', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style1.jpg',
						),      	
						'woocommerce_product_style2'	=> array(
						'alt'   => 'Woocommerce Product Style2', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style2.jpg',
						),
						'woocommerce_product_style3'	=> array(
						'alt'   => 'Woocommerce Product Style3', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style3.jpg',
						),
						'woocommerce_product_style4'	=> array(
						'alt'   => 'Woocommerce Product Style4', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style4.jpg',
						),
						'woocommerce_product_style5'	=> array(
						'alt'   => 'Woocommerce Product Style5', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style5.jpg',
						),
						'woocommerce_product_style6'	=> array(
						'alt'   => 'Woocommerce Product Style6', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style6.jpg',
						),
						'woocommerce_product_style7'	=> array(
						'alt'   => 'Woocommerce Product Style7', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/woo_product_style7.jpg',
						),
					),
					'default'	=> 'woocommerce_product_style1',
				),
				array(
					'title'			=> esc_html__('Woocommerce Archive/Category Gutter Space', 'apress'),
					'subtitle'		=> esc_html__('Insert the amount of spacing between woocommerce items without"px".ex: 15', 'apress'),
					'id'			=> 'woocommerce_product_gutter',
					'default'		=> '15',
					'type'			=> 'text',
				),	
				array(
					'title'			=> esc_html__('Rating', 'apress'),	
					'id'			=> 'woo_product_rating',					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  	=> esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'		=> 'on',					
				),
				array(
					'title'			=> esc_html__('Quick View Button', 'apress'),	
					'id'			=> 'woo_product_quick_view',
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  	=> esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'		=> 'on',					
				),
				array(
					'title'			=> esc_html__('Wishlist Button', 'apress'),	
					'id'			=> 'woo_product_wishlist',					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  	=> esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'		=> 'on',					
				),
				array(
					'title'			=> esc_html__('Compare Button', 'apress'),	
					'id'			=> 'woo_product_compare',					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  	=> esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'		=> 'on',					
				),
				array(
					'title'			=> esc_html__('Badges Shape( sales , out of stock ...)', 'apress'),	
					'id'			=> 'woo_badges_shape',					
					'type'			=> 'button_set',
					'options'		=> array(					
							'rectangle'  	=> esc_html__( 'Rectangle', 'apress' ),
							'circle'   => esc_html__( 'Circle', 'apress' ),
						),
					'default'		=> 'rectangle',					
				),
				
				array(
					'title'			=> esc_html__('Product Title Alignment', 'apress'),
					'id'			=> 'woocommerce_product_title_align',
					'default'		=> 'center',
					'type'			=> 'select',
					'options' => array( 
						'left' => esc_html__('Left', 'apress'),
						'center' => esc_html__('Center', 'apress'),
						'right' => esc_html__('Right', 'apress'),				   
						),
				),
				array(
					'title'			=> esc_html__('Show/Hide hover image of product', 'apress'),	
					'subtitle'		=> esc_html__('If you enable this, The first image of gallery will be shown as hover of each product', 'apress'),
					'id'			=> 'product_hover_image',					
					'type'			=> 'button_set',
					'options'		=> array(					
							'on'  => esc_html__( 'ON', 'apress' ),
							'off'   => esc_html__( 'OFF', 'apress' ),
						),
					'default'		=> 'off',					
				),
				array(
					'title'			=> esc_html__('Woocommerce Related/Up-Sell/Cross-Sell Product Number of Columns', 'apress'),
					'subtitle'		=> esc_html__('Select the number of columns for the related and up-sell products on single post pages and cross-sells on cart page.', 'apress'),
					'id'			=> 'woocommerce_related_columns',
					'default'		=> '4',
					'type'			=> 'select',
					'options' => array( 
						'2' => esc_html__('2', 'apress'),
						'3' => esc_html__('3', 'apress'),
						'4' => esc_html__('4', 'apress'),
						'5' => esc_html__('5', 'apress'),
						'6' => esc_html__('6', 'apress'),					   
						),
				),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Shop Page Style', 'apress' ),
        'id'				=> 'woocommerce_style',
		'subsection'		=> true,
		'fields'           => array(
				array(
					'title'			=> esc_html__('Product Box Background Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the background color of the Product Box', 'apress'),
					'id'			=> 'woo_product_bg_color',
					'type'			=> 'color_alpha',
					'default'  		=> '#ffffff',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Product Box Border Color', 'apress'),
					'subtitle'		=> esc_html__('Controls the Border color of the Product Box', 'apress'),
					'id'			=> 'woo_product_bor_color',
					'default'		=> '#e8e8e8',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Product Image Overlay Background and Opacity', 'apress'),
					'subtitle'		=> esc_html__('Controls the background color and opacity of the Product Box.', 'apress'),
					'id'			=> 'woo_product_overlaybg_color',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,0.5)',
					'transparent'	=> false,					
				),
				array(
					'title'			=> esc_html__('WooCommerce Button Color', 'apress'),
					'subtitle'		=> esc_html__('Select color', 'apress'),
					'id'			=> 'woo_product_button_color',
					'default'		=> '',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				
				array(
					'title'			=> esc_html__('WooCommerce Icon Background Color', 'apress'),
					'id'			=> 'woo_product_icon_bg_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'		=> array(
						'regular' => '#ffffff',
						'hover'   => '#999999',
					),
				),
				array(
					'title'			=> esc_html__('WooCommerce Icon Color', 'apress'),
					'id'			=> 'woo_product_icon_color',
					'type'			=> 'link_color',
					'active'    	=> false,
					'default'		=> array(
						'regular' => '#999999',
						'hover'   => '#ffffff',
					),
				),
				array(
					'title'			=> esc_html__('Product Icon Tooltip background Color', 'apress'),
					'id'			=> 'woo_product_icon_tooltip_bg',
					'type'			=> 'color_alpha',
					'default'  		=> 'rgba(0,0,0,1)',
					'transparent'	=> false,					
				),
				array(
					'title'			=> esc_html__('Product Icon Tooltip Text Color', 'apress'),
					'id'			=> 'woo_product_icon_tooltip_text_color',
					'default'		=> '#ffffff',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array (				
					'title'		=> esc_html__( 'Enable Shadow  on Products on hover','apress' ),
					'id' 		=> 'woo_product_shadow_showhide',
					'type'        => 'button_set',
					'options'     => array(					
						'show'  => esc_html__( 'On', 'apress' ),
						'hide'   => esc_html__( 'Off', 'apress' ),
						),
					'default'     => 'hide',
				),
				array(
				'title'				=> esc_html__( 'Shadow Parameters', 'apress' ),
                'id'				=> 'woo_product_shadow_parameters',
                'type'				=> 'spacing',
                'mode'				=> 'padding',
                'all'				=> false,
                'units'				=> array( 'px' ),
                'units_extended'	=> false,  
                'display_units'		=> true,
                'default'			=> array(
					'padding-top'	=> '0',
					'padding-right'	=> '0',
					'padding-bottom'=> '7',
					'padding-left'	=> '0',
                ),
				'required' 		=> array( 'woo_product_shadow_showhide', '=', 'show' ),
            ),
			array( 
				'title'		=> esc_html__('Shadow Color', 'apress'),
				'id'		=> 'woo_product_shadow_color',
				'type'		=> 'color_alpha',
				'default'  	=> "#e8e8e8",
				'transparent'=> false,
				'required' 		=> array( 'woo_product_shadow_showhide', '=', 'show' ),
			),			
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Single Product', 'apress' ),
        'id'				=> 'zolo_single_product',
		'subsection'		=> true,
        'fields'			=> array(
            	array(
				'title'		=> esc_html__('Product detail style', 'apress'),
				'subtitle'	=> esc_html__('Choose the default Product style', 'apress'),
				'id'		=> 'woocommerce_detail_page_style',
				'type'		=> 'image_select',
				'options'	=> array( 
					'woocommerce_detail_page_style1'	=> array(
						'alt'   => 'Style1', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/single/woo_product_singlepage_style1.jpg',
					),      	
					'woocommerce_detail_page_style2'	=> array(
						'alt'   => 'Style2', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/single/woo_product_singlepage_style2.jpg',
					),
					'woocommerce_detail_page_style3'	=> array(
						'alt'   => 'Style3', 
						'img'   => get_template_directory_uri().'/assets/images/woocommerce/single/woo_product_singlepage_style3.jpg',
					),
				),
				'default'	=> 'woocommerce_detail_page_style1',
			),
			array(
				'title'			=> esc_html__('Product Detail Background Color', 'apress'),
				'subtitle'		=> esc_html__('Select color', 'apress'),
				'id'			=> 'woo_product_detail_bg_color',
				'default'		=> '#f2f2f2',
				'type'			=> 'color_alpha',
				'transparent'	=> false,
			),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'				=> esc_html__( 'Mini Cart Style', 'apress' ),
        'id'				=> 'mini_cart_style',
		'subsection'		=> true,
		'fields'           => array(
			array(
					'title'			=> esc_html__('Mini Cart Box Color', 'apress'),

					'subtitle'		=> esc_html__('Select color', 'apress'),
					'id'			=> 'woo_minicart_box_color',
					'default'		=> '#ffffff',
					'type'			=> 'color_alpha',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Font Color', 'apress'),
					'subtitle'		=> esc_html__('Select color', 'apress'),
					'id'			=> 'woo_minicart_font_color',
					'default'		=> '#555555',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Separator Color', 'apress'),
					'subtitle'		=> esc_html__('Select color', 'apress'),
					'id'			=> 'woo_minicart_separator_color',
					'default'		=> 'rgba(0,0,0,0.08)',
					'type'			=> 'color_alpha',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Button Color', 'apress'),
					'subtitle'		=> esc_html__('Select color', 'apress'),
					'id'			=> 'woo_minicart_button_bg_color',
					'default'		=> '',
					'type'			=> 'color',
					'transparent'	=> false,
				),
				array(
					'title'			=> esc_html__('Mini Cart Button Text Color', 'apress'),
					'subtitle'		=> esc_html__('Select color', 'apress'),
					'id'			=> 'woo_minicart_button_text_color',
					'default'		=> '#ffffff',
					'type'			=> 'color',
					'transparent'	=> false,
				),	
		)
    ) );
	}// end check woocommerce
	
	// -> Custom css Section
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom CSS', 'apress' ),
        'id'               => 'zolo_custom_css',
		'icon'				=> 'el el-css',
        'fields'           => array(
            	array(
					'title'    => esc_html__( 'CSS Code', 'apress' ),
					'subtitle' => esc_html__( 'Paste your CSS code here.', 'apress' ),
					'id'       => 'custom_css',
					'type'     => 'ace_editor',
					'mode'     => 'css',
					'theme'    => 'monokai',
					'default'  => "#header{\n   margin: 0 auto;\n}"
            ),			
        )
    ) );

/* ------------------------------------------------------------------------ */
/*  Custom function for apress's own scripts
/* ------------------------------------------------------------------------ */

function overridePanelScripts() {   
	wp_register_style( 'apressredux-custom', get_template_directory_uri() . '/framework/redux/zt-redux-custom.css', array(), '1', 'all' );    
	wp_enqueue_style('apressredux-custom');
	
	wp_register_script( 'apressredux-custom', trailingslashit( get_template_directory_uri() ) . '/framework/redux/zt-redux-custom.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'apressredux-custom');
}
add_action( 'redux/page/apress_data/enqueue', 'overridePanelScripts' );