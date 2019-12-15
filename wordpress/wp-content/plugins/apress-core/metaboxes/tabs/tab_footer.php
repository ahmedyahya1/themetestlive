<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$footer_options[''] = 'Select';

$footer_template = get_posts( array( 'post_type' => 'apcore_footer', 'posts_per_page' => -1 ) );

foreach ( $footer_template as $footer_template ) {
	$footer_options[$footer_template->ID] = $footer_template->post_title;
}

// Dependency check that which footer builder active.
$footer_builder_dependency = array(
	array(
		'field'      => 'display_footer',
		'value'      => 'on',
		'comparison' => '==',
	),
	array(
		'field'      => 'footer_builder',
		'value'      => 'widgets',
		'comparison' => '==',
	),
);


$this->radio_buttonset(
		array(
			'title'    => __('Display Footer Area', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the footer.','apcore' ),
			'id'       => 'display_footer',
			'default'  => 'default',
			'options'  => array('default' => __( 'Default', 'apcore' ),'on' => __( 'On', 'apcore' ),'off' => __( 'Off', 'apcore' )),
		)			
);	

$this->radio_buttonset(
		array(
			'title'    => __('Footer Builder', 'apcore'), 
			'subtitle' => esc_html__( 'Choose builder type.','apcore' ),
			'id'       => 'footer_builder',
			'default'  => 'widgets',
			'options'  => array('widgets' => __('Widgets', 'apcore'), 'page_editor' => __('Page Editor', 'apcore')),
		),
		array(
			array(
				'field'      => 'display_footer',
				'value'      => 'on',
				'comparison' => '==',
			),
		)
	);

$this->radio_buttonset(
		array(
			'title'    => __('Display Copyright Area', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to show or hide the copyright area.','apcore' ),
			'id'       => 'display_copyright',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),			
		),
		$footer_builder_dependency
	);

$this->radio_buttonset(
		array(
			'title'    => __('100% Footer Width', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to set footer width to 100% of the browser width. Select "No" for site width.','apcore' ),
			'id'       => 'footer_100per_width',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),			
		),
		$footer_builder_dependency
	);

$this->radio_buttonset(
		array(
			'title'    => __('100% Layout for Widget Area Above Footer', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to set Above Footer Widget Area width to 100% of the browser width. Select "No" for site width.','apcore' ),
			'id'       => 'footer_100per_width_upper',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),			
		),
		$footer_builder_dependency
	);

$this->radio_buttonset(
		array(
			'title'    => __('100% Layout for Widget Area Below Footer', 'apcore'), 
			'subtitle' => esc_html__( 'Choose to set below footer Widget Area width to 100% of the browser width. Select "No" for site width.','apcore' ),
			'id'       => 'footer_100per_width_lower',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Yes', 'apcore'), 'no' => __('No', 'apcore')),			
		),
		$footer_builder_dependency
	);	
$this->select(
	array(
		'title'    => __('Select Footer Page', 'apcore'), 
		'subtitle' => esc_html__( 'First make your footer from footer custom types then select it from here.','apcore' ),
		'id'       => 'footer_builder_template',
		'default'  => 'default',
		'options'  => $footer_options ,
	),
	array(
		array(
			'field'      => 'display_footer',
			'value'      => 'on',
			'comparison' => '==',
		),
		array(
			'field'      => 'footer_builder',
			'value'      => 'page_editor',
			'comparison' => '==',
		),
	)
);	

$this->select(
	array(
		'title'    => __('Style', 'apcore'), 
		'subtitle' => esc_html__( 'Select the Style display in the footer.','apcore' ),
		'id'       => 'footer_layout_style',
		'default'  => 'default',
		'options'  => array('default' => 'Default','footer_default' => 'Normal','footer_fixed' => 'Fixed (covers content)','footer_parallax' => 'Parallax'),			
	),
	array(
		array(
			'field'      => 'display_footer',
			'value'      => 'on',
			'comparison' => '==',
		)
	)
);

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
