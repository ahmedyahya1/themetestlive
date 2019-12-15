<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
$this->select(
	array(
			'title'    => __('Slider Position', 'apcore'), 
			'subtitle' => esc_html__( 'Select if the slider shows below or above the header. Only works for top header position.','apcore' ),
			'id'       => 'page_slider_pos',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'below' => __('Below', 'apcore'), 'above' => __('Above', 'apcore'),'from_top' => __('From Top', 'apcore')),
			
		)
	);

$this->select(
	array(
			'title'    => __('Slider Type', 'apcore'), 
			'subtitle' => esc_html__( 'Select the type of slider that displays.','apcore' ),
			'id'       => 'page_slider_type',
			'default'  => 'no',
			'options'  => array('no' => __('No Slider', 'apcore'), 'rev' => 'Revolution Slider'),
			
		)

);

global $wpdb;
$revsliders[0] = __(  'Select a slider', 'apcore');
if(function_exists('rev_slider_shortcode')) {
	$get_sliders = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'revslider_sliders');
	if($get_sliders) {
		foreach($get_sliders as $slider) {
			$revsliders[$slider->alias] = $slider->title;
		}
	}
}
$this->select(
	array(
			'title'    => __('Select Revolution Slider', 'apcore'), 
			'subtitle' => __('Select the unique name of the slider.', 'apcore'),
			'id'       => 'revslider',
			'default'  => 'no',
			'options'  => $revsliders,			
		),
	array(
			array(
				'field'      => 'page_slider_type',
				'value'      => 'rev',
				'comparison' => '==',
			),
		)	
	);
