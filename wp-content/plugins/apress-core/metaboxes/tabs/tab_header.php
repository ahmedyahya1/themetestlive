<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$menus = get_terms(
	'nav_menu',
	array(
		'hide_empty' => false,
	)
);
$menu_select['default'] = 'Default Menu';

foreach ( $menus as $menu ) { 
	$menu_select[ $menu->term_id ] = $menu->name;
}


$this->radio_buttonset(
		array(
			'title'    => __('Display Header', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the header.','apcore' ),
			'id'       => 'header_display',
			'default'  => 'yes',
			'options'  => array('yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),
			
		)
	);
$this->select(
		array(
			'title'    => __('100% Header Width', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to set header width to 100% of the browser width. Select "No" for site width.','apcore' ),
			'id'       => 'header_100_width',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),
			
		)
	);

$this->image_upload(	
		array(
				'title'    => __('Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Select an image to use for the header background.','apcore' ),
				'id'       => 'header_bg_img',
				'default'  => '',
			)
		); 

$this->color(
		array(
			'title'    => __('Background Color', 'apcore'), 
			'subtitle' => esc_html__( 'Controls the background color of the header.','apcore' ),
			'id'       => 'header_bg_color',
			'default'  => '',
		)
	);

$this->select(
		array(
				'title'    => __('100% Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','apcore' ),
				'id'       => 'header_100per_bg',
				'default'  => 'no',
				'options'  => array('no' => __('No', 'apcore'), 'yes' => __('Yes', 'apcore')),
				
			)
	);

$this->select(
		array(
				'title'    => __('Background Repeat', 'apcore'), 
				'subtitle' => esc_html__( 'Select how the background image repeats.','apcore' ),
				'id'       => 'header_bg_repeat',
				'default'  => 'default',
				'options'  => array('repeat' => __('Repeat', 'apcore'), 'repeat-x' => __('Repeat-x', 'apcore'), 'repeat-y' => __('Repeat-y', 'apcore'), 'no-repeat' => __('No Repeat', 'apcore')),
				
			)
	);

$this->select(
	array(
		'title'    => __('Main Navigation Menu', 'apcore'), 
		'subtitle' => esc_html__( 'Select which menu displays on this page','apcore' ),
		'id'       => 'displayed_menu',
		'default'  => 'default',
		'options'  => $menu_select ,
		),
		array(
			array(
				'field'      => 'header_display',
				'value'      => 'yes',
				'comparison' => '==',
			),
		)
);

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
