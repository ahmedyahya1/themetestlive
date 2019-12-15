<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

    $this->image_buttonset(
        array(
            'title'    => __('Post Layout', 'apcore'), 
            'subtitle' => esc_html__( 'Select post layout','apcore' ),
            'id'       => 'single_post_layout_style',
            'default'  => 'default',
            'options'  => array(
                    'default'	=> array(
					'alt'   => 'default', 
					'img'   => get_template_directory_uri().'/assets/images/default.jpg',
					), 
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
        )
    );            
    $this->text(
		array(
			'title'    => __('Single Post Content Max Width', 'apcore'), 
			'subtitle' => esc_html__( 'Insert with px ex: 900px. Leave empty for default value.','apcore' ),
			'id'       => 'single_post_layout_width',
			'default'  => '',
		)
	);
    $this->select(
		array(
				'title'    => __('Featured Image', 'apcore'), 
				'subtitle' => esc_html__( 'Show / Hide featured images and videos on single post pages.','apcore' ),
				'id'       => 'show_hide_featured',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'),'hide' => __('Hide', 'apcore'), 'show' => __('Show', 'apcore')),
			)
		);
    
    $this->radio_buttonset(
		array(
				'title'    => __('Use 100% Width Page', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to set this post to 100% browser width.','apcore' ),
				'id'       => 'post_width_100',
				'default'  => 'default',
				'options'  => array('default' => __( 'Default', 'apcore' ),'no' => __( 'No', 'apcore' ),'yes' => __( 'Yes', 'apcore' )),
			)
    );
    
    $this->textarea(
		array(
				'title'    => __('Video Embed Code', 'apcore'), 
				'subtitle' => esc_html__( 'Insert Youtube or Vimeo embed code.','apcore' ),
				'id'       => 'video',
				'default'  => '',
		)
	);
    
    $this->select(
			array(
				'title'    => __('Image Rollover Icons', 'apcore'), 
				'subtitle' => esc_html__( 'Choose Icons Show/Hide on this post.','apcore' ),
				'id'       => 'image_rollover_icons_show_hide',
				'default'  => 'default',
				'options'  => array('show' => __('Show', 'apcore'), 'hide' => __('Hide', 'apcore')),
			)
	);
    
    $this->select(
				array(
				'title'    => __('Show Related Posts', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to show or hide related posts on this post.','apcore' ),
				'id'       => 'related_posts',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),
			)
		);
    
    $this->select(
		array(
				'title'    => __('Show Social Share Box', 'apcore'), 
				'subtitle' => esc_html__( 'Choose to show or hide the social share box.','apcore' ),
				'id'       => 'share_box',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),
			)
		);
    
    $this->select(
		array(
				'title'    => __('Show Previous/Next Pagination', 'apcore'), 
				'subtitle' => esc_html__('Choose to show or hide the post navigation', 'apcore'),
				'id'       => 'post_pagination',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
			)
		);
    $this->radio_buttonset(
		array(
				'title'    => __('Navigation Style', 'apcore'), 
				'subtitle' => esc_html__( 'Controls the Navigation style.','apcore' ),
				'id'       => 'navigation_style',
				'default'  => 'style1',
				'options'  => array('style1' => __( 'Style 1', 'apcore' ),'style2' => __( 'Style 2', 'apcore' ),'style3' => __( 'Style 3', 'apcore' ),'style4' => __( 'Style 4', 'apcore' )),
			),
			array(
			array(
				'field'      => 'post_pagination',
				'value'      => 'yes',
				'comparison' => '==',
				)	
			)
	);	
    $this->select(	
		array(
				'title'    => __('Show Author Info Box', 'apcore'), 
				'subtitle' => esc_html__('Choose to show or hide the author info box', 'apcore'),
				'id'       => 'author_info',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
			)
		);
    
    $this->select(	
		array(
				'title'    => __('Show Post Meta', 'apcore'), 
				'subtitle' => esc_html__('Choose to show or hide the post meta', 'apcore'),
				'id'       => 'post_meta',
				'default'  => 'default',
				'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
			)
		);
    
    $this->select(	
		array(
			'title'    => __('Show Comments', 'apcore'), 
			'subtitle' => esc_html__('Choose to show or hide comments area', 'apcore'),
			'id'       => 'post_comments',
			'default'  => 'default',
			'options'  => array('default' => __('Default', 'apcore'), 'yes' => __('Show', 'apcore'), 'no' => __('Hide', 'apcore')),				
		)
	);
    

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
