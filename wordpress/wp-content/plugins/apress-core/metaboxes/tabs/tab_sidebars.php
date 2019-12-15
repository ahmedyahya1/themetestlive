<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
$this->select(
		array(
			'title'    => __('Sidebar Position', 'apcore'), 
			'subtitle' => esc_html__( 'Select the sidebar position.','apcore' ),
			'id'       => 'sidebar_position',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'none' => __('None', 'apcore'), 'right' => __('Right', 'apcore'), 'left' => __('Left', 'apcore'), 'both' => __('Both', 'apcore') ),
		)
	);
global $wp_registered_sidebars;
$sidebar_options[''] = 'None';

	$sidebars = $wp_registered_sidebars;
	if(is_array($sidebars) && !empty($sidebars)){
		foreach($sidebars as $sidebar){
			$sidebar_options[$sidebar['name']] = $sidebar['name'];
		}
	}
		
			
$this->select(
		array(
			'title'    => __('Left Sidebar', 'apcore'), 
			'subtitle' => esc_html__( 'Select the left sidebar position.','apcore' ),
			'id'       => 'sidebar_left_position',
			'default'  => 'default',
			'options'  => $sidebar_options ,
		),
		array(
			array(
				'field'      => 'sidebar_position',
				'value'      => 'default',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'none',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'right',
				'comparison' => '!=',
				),		
			)
	);
$this->select(
		array(
				'title'    => __('Right Sidebar', 'apcore'), 
				'subtitle' => esc_html__( 'Select the right sidebar position.','apcore' ),
				'id'       => 'sidebar_right_position',
				'default'  => 'default',
				'options'  => $sidebar_options ,
			),
		array(
			array(
				'field'      => 'sidebar_position',
				'value'      => 'default',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'none',
				'comparison' => '!=',
				),
			array(
				'field'      => 'sidebar_position',
				'value'      => 'left',
				'comparison' => '!=',
			),		
		)
	);						

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
