<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$this->select(
	array(
		'title'    => __('Layout Style', 'apcore'), 
		'subtitle' => esc_html__( 'Choose your single Testimonial page layout style.','apcore' ),
		'id'       => 'testimonial_single_page_style',
		'default'  => 'default',
		'options'  => array(
			'default' => __('Default', 'apcore'), 
			'testimonial_layout_style_1' => __('Layout Style 1', 'apcore'), 
			'testimonial_layout_style_2' => __('Layout Style 2', 'apcore'),
			'testimonial_layout_style_3' => __('Layout Style 3', 'apcore')
		),
	)
);
	
$this->text(
	array(
		'title'    => __('Designation', 'apcore'), 
		'subtitle' => esc_html__( 'Enter Designation.','apcore' ),
		'id'       => 'testimonial_designation',
		'default'  => 'Designation',
	)
);

$this->select(
	array(
		'title'    => __('Rating Option', 'apcore'), 
		'subtitle' => __('Please choose from 1 - 5 or choose None', 'apcore'), 
		'id'       => 'rating_option',
		'default'  => '0star',
		'options'  => array(
			'0%' => __('None', 'apcore'), 
			'20%' => __('1 Star', 'apcore'), 
			'40%' => __('2 Stars', 'apcore'), 
			'60%' => __('3 Stars', 'apcore'), 
			'80%' => __('4 Stars', 'apcore'), 
			'100%' => __('5 Stars', 'apcore')
		),
	)
);

$this->select(
	array(
		'title'    => __('Show Social Share Box', 'apcore'), 
		'subtitle' => esc_html__( 'Choose to show or hide the social share box.','apcore' ),
		'id'       => 'share_box',
		'default'  => 'default',
		'options'  => array(
			'default' 	=> __('Default', 'apcore'), 
			'yes' 		=> __('Show', 'apcore'), 
			'no' 		=> __('Hide', 'apcore')
		),
	)
);

$this->select(
	array(
		'title'    => __('Show Previous/Next Pagination', 'apcore'), 
		'subtitle' => esc_html__( 'Choose to show or hide the post navigation.','apcore' ),
		'id'       => 'post_pagination',
		'default'  => 'default',
		'options'  => array(
			'default' 	=> __('Default', 'apcore'), 
			'yes' 		=> __('Show', 'apcore'), 
			'no' 		=> __('Hide', 'apcore')
		),
	)
);