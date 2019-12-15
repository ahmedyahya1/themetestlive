<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->select(
		array(
			'title'    => __('Page Title Bar', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the page title bar.','apcore' ),
			'id'       => 'titlebar_show_hide',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'show' => __('Show', 'apcore'), 'hide' => __('Hide', 'apcore')),
			
		)
	);
					
					
// Dependency check that page title bar not hidden.
$page_title_dependency = array(
	array(
		'field'      => 'titlebar_show_hide',
		'value'      => 'hide',
		'comparison' => '!=',
	),
);

$this->select(
		array(
			'title'    => __('Page Title Bar Text Alignment', 'apcore'), 
			'subtitle' => esc_html__( 'Choose the title and subhead text alignment','apcore' ),
			'id'       => 'titlebar_text_alignment',
			'default'  => 'Default',
			'options'  => array('Default' => __('Default', 'apcore'), 'Left' => __('Left', 'apcore'), 'Center' => __('Center', 'apcore'), 'Right' => __('Right', 'apcore')),
			
		),
		$page_title_dependency
	);

$this->text(
		array(
			'title'    => __('Page Title Bar Text Size', 'apcore'), 
			'subtitle' => esc_html__( 'Insert without px','apcore' ),
			'id'       => 'title_text_size',
			'default'  => '',			
		),
		$page_title_dependency
	);

$this->color(
		array(
			'title'    => __('Page Title Font Color', 'apcore'), 
			'subtitle' => esc_html__( 'Controls the text color of the page title fonts.','apcore' ),
			'id'       => 'title_text_color',
			'default'  => '',			
		),
		$page_title_dependency					
	);

$this->text(
		array(
			'title'    => __('Page Title Bar Height', 'apcore'), 
			'subtitle' => esc_html__( 'Set the height of the page title bar. Insert without px ex: 10.','apcore' ),
			'id'       => 'titlebar_height',
			'default'  => '',			
		),
		$page_title_dependency
	);

$this->select(
		array(
				'title'    => __('Page Title Bar Background Position', 'apcore'), 
				'subtitle' => esc_html__( 'Choose the title bar Background Position','apcore' ),
				'id'       => 'titlebar_bg_position',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'below' => __('Below', 'apcore'), 'from_top' => __('From Top', 'apcore')),
				
			),
			$page_title_dependency
	);
	
$this->color(
		array(
			'title'    => __('Page Title Bar Background Color', 'apcore'), 
			'subtitle' => esc_html__( 'Controls the background color of the page title bar.','apcore' ),
			'id'       => 'titlebar_bg_color',
			'default'  => '',			
		),
		$page_title_dependency
	);

$this->image_upload(
		array(
			'title'    => __('Page Title Bar Background Image', 'apcore'), 
			'subtitle' => esc_html__( 'Select an image to use for the page title bar background.','apcore' ),
			'id'       => 'titlebar_bg_img',
			'default'  => '',			
		),
		$page_title_dependency
	); 

$this->select(
		array(
				'title'    => __('100% Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','apcore' ),
				'id'       => 'titlebar_bg_img_100per',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'No' => __('No', 'apcore'), 'Yes' => __('Yes', 'apcore')),
				
			),
			$page_title_dependency
	);

$this->select(
		array(
				'title'    => __('Parallax Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Choose a parallax scrolling effect for the background image.','apcore' ),
				'id'       => 'titlebar_parallax_bg',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'No' => __('No', 'apcore'), 'Yes' => __('Yes', 'apcore')),
				
			),
			$page_title_dependency
	);
		

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
