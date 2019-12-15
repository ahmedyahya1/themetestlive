<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->radio_buttonset(
		array(
				'title'    => __('Activate Fullscreen Rows', 'apcore'), 
				'subtitle' => esc_html__( 'This will cause all rows to be fullscreen. Please choose Full Width Template from Page Attributes.','apcore' ),
				'id'       => 'full_screen_rows',
				'default'  => 'off',
				'options'  => array('off' => __( 'Off', 'apcore' ),'on' => __( 'On', 'apcore' )),
			)
			
);	

					
// Dependency check that fullscreen bar not hidden.
$full_screen_rows_dependency = array(
	array(
		'field'      => 'full_screen_rows',
		'value'      => 'on',
		'comparison' => '==',
	),
);

$this->select(
		array(
			'title'    => __('Animation Bewteen Rows', 'apcore'), 
			'subtitle' => esc_html__( 'Select your desired animation between rows.','apcore' ),
			'id'       => 'fullpage_scroll_rows_animation',
			'default'  => 'default',
			'options'  => array('default' => __('Default Scroll', 'apcore'), 'zoom_out' => __('Zoom Out', 'apcore')),
			
		),
		$full_screen_rows_dependency
	);
$this->select(
		array(
			'title'    => __('Dot Navigation', 'apcore'), 
			'subtitle' => esc_html__( 'Select your desired dot navigation style.','apcore' ),
			'id'       => 'fullpage_scroll_dot_navigation',
			'default'  => 'transparent',
			'options'  => array('transparent' => __('Transparent', 'apcore'), 'tooltip' => __('Transparent With Tooltip', 'apcore'), 'tooltip_alt' => __('Background With Tooltip', 'apcore'), 'hidden' => __('None (Hidden)', 'apcore')),
			
		),
		$full_screen_rows_dependency
	);
$this->radio_buttonset(
	array(
			'title'    => __('Add Row Anchors to URL', 'apcore'), 
			'subtitle' => esc_html__( 'Enable this to add anchors into your URL for each row.','apcore' ),
			'id'       => 'fullpage_rows_anchors',
			'default'  => 'off',
			'options'  => array('off' => __( 'Off', 'apcore' ),'on' => __( 'On', 'apcore' )),
		),
		$full_screen_rows_dependency
			
);	

$this->color(
		array(
			'title'    => __('Tooltip Color', 'apcore'), 
			'subtitle' => esc_html__( 'Controls the Tooltip color.','apcore' ),
			'id'       => 'fullpage_tooltip_color',
			'default'  => '',
			
		),
		$full_screen_rows_dependency
	);
