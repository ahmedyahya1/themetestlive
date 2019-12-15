<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


$this->select(
		array(
				'title'    => __('Layout', 'apcore'), 
				'subtitle' => esc_html__( 'Select boxed or wide layout.','apcore' ),
				'id'       => 'bg_layout',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'wide' => __('Wide', 'apcore'), 'boxed' => __('Boxed', 'apcore'), 'theater' => __('Theater', 'apcore')),
				
			)
	);
?>
<h3><?php _e('Following options only work in boxed mode:', 'apcore'); ?></h3>
<?php
$this->image_upload(
		array(
			'title'    => __('Background Image for Outer Area', 'apcore'), 
			'subtitle' => esc_html__( 'Select an image to use for the outer background.','apcore' ),
			'id'       => 'bg_img',
			'default'  => '',			
		)
	); 

$this->color(
		array(
			'title'    => __('Background Color', 'apcore'), 
			'subtitle' => esc_html__( 'Controls the background color for the outer background.','apcore' ),
			'id'       => 'bg_color',
			'default'  => '',
			
		)
	);

$this->select(
			array(
				'title'    => __('100% Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','apcore' ),
				'id'       => 'bg_img_100per',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'no' => __('No', 'apcore'), 'yes' => __('Yes', 'apcore')),
				
			)
	);

$this->select(
			array(
				'title'    => __('Background Repeat', 'apcore'), 
				'subtitle' => esc_html__( 'Select how the background image repeats.','apcore' ),
				'id'       => 'bg_repeat',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'repeat' => __('Repeat', 'apcore'), 'repeat-x' => __('Repeat-x', 'apcore'), 'repeat-y' => __('Repeat-y', 'apcore'), 'no-repeat' => __('No Repeat', 'apcore')),
				
			)
	);
?>
<h3><?php _e('Following options work in boxed and wide mode:', 'apcore'); ?></h3>
<?php 
$this->image_upload(
		array(
			'title'    => __('Background Image for Main Content Area', 'apcore'), 
			'subtitle' => esc_html__( 'Select an image to use for the main content area.','apcore' ),
			'id'       => 'wide_bg_img',
			'default'  => '',	
		)
	); 

$this->color(
		array(
				'title'    => __('Background Color', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the background color for the main content area.','apcore' ),
				'id'       => 'wide_bg_color',
				'default'  => '',			
			)
	);

$this->select(
		array(
				'title'    => __('100% Background Image', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to have the background image display at 100%.','apcore' ),
				'id'       => 'wide_bg_img_100per',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'no' => __('No', 'apcore'), 'yes' => __('Yes', 'apcore')),
			)
		);

$this->select(
		array(
			'title'    => __('Background Repeat', 'apcore'), 
			'subtitle' => esc_html__( 'Select how the background image repeats.','apcore' ),
			'id'       => 'wide_bg_repeat',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'repeat' => __('Repeat', 'apcore'), 'repeat-x' => __('Repeat-x', 'apcore'), 'repeat-y' => __('Repeat-y', 'apcore'), 'no-repeat' => __('No Repeat', 'apcore')),
		)
		
	);


/* Omit closing PHP tag to avoid "Headers already sent" issues. */
