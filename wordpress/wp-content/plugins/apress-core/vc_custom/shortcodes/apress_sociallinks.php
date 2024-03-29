<?php 
/*-----------------------------------------------------------------------------------*/
/* Social links
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
class WPBakeryShortCode_Apress_Sociallinks extends WPBakeryShortCode {}

$doc_link = 'http://apressthemes.com/apress/documentation';

if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
				"name"			=> __("Social Links", 'apcore'),
				"base"			=> "apress_sociallinks",
				"class"			=> "",
				"weight"		=> 22,
				"category"		=> __( "Apress", "apcore"),
				"description"	=> __( "Beautiful Social Links", "apcore"),
				"icon"			=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-social.png",
				"params" 		=> array(		
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("Social Icon Style",'apcore'),
					"param_name" 		=> "socialicon_style",
					"value"				=> array (
						__("Simple",'apcore')	=> "simple",
						__("Color",'apcore')	=> "color",
					), 
					"admin_label"	=> true,
				),
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("Social Icon Design",'apcore'),
					"param_name"		=> "socialicon_design",
					"value"			=> array (
						"None" 		=> "none",
						"Square" 	=> "square", 
						"Rounded" 	=> "rounded", 
						"Round" 	=> "round" 
					), 
					"admin_label"	=> true,
				),				
				array(
					"type"				=> "colorpicker",
					"class"				=> "",
					"heading"			=> __("Social Icon Color",'apcore'),
					"param_name"		=> "socialicon_color",
					"value"				=> "#bebdbd",
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
				),
				array(
					"type"				=> "colorpicker",
					"class"				=> "",
					"heading"			=> __("Social Icon Hover Color","apcore"),
					"param_name"		=> "socialicon_hover_color",
					"value"				=> "#afaeae",
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
				),					
				array(
					"type"				=> "colorpicker",
					"class"				=> "",
					"heading"			=> __("Box Background Color","apcore"),
					"param_name"		=> "socialicon_box_bg",
					"value"				=> "#e8e8e8",
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
				),
				array(
					"type"				=> "colorpicker",
					"class"				=> "",
					"heading"			=> __("Box Hover Background Color","apcore"),
					"param_name"		=> "socialicon_box_hover_bg",
					"value"				=> "#dbdada",
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
				),
				array(
					"type"				=> "colorpicker",
					"class"				=> "",
					"heading"			=> __("Box Border Color","apcore"),
					"param_name"		=> "socialicon_box_bor",
					"value"				=> "#e8e8e8",
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
				),
				array(
					"type"				=> "colorpicker",
					"class"				=> "",
					"heading"			=> __("Box Hover Border Color","apcore"),
					"param_name"		=> "socialicon_box_hover_bor",
					"value"				=> "#dbdada",
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-6 no-top-margin",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Facebook Link","apcore"),
					"param_name"		=> "socialicon_facebook",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Twitter Link","apcore"),
					"param_name"		=> "socialicon_twitter",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Instagram Link","apcore"),
					"param_name"		=> "socialicon_instagram",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Dribbble Link","apcore"),
					"param_name"		=> "socialicon_dribbble",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Google+ Link","apcore"),
					"param_name"		=> "socialicon_googleplus",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("LinkedIn Link","apcore"),
					"param_name"		=> "socialicon_linkedin",
					"value"				=> "",
				),				
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Tumblr Link","apcore"),
					"param_name"		=> "socialicon_tumblr",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Reddit Link","apcore"),
					"param_name"		=> "socialicon_reddit",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Yahoo Link","apcore"),
					"param_name"		=> "socialicon_yahoo",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Deviantart Link","apcore"),
					"param_name"		=> "socialicon_deviantart",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Vimeo Link","apcore"),
					"param_name"		=> "socialicon_vimeo",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Youtube Link","apcore"),
					"param_name"		=> "socialicon_youtube",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Pinterest Link","apcore"),
					"param_name"		=> "socialicon_pinterest",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("RSS Link","apcore"),
					"param_name"		=> "socialicon_rss",
					"value"				=> "",
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Digg Link",'apcore'),
					"param_name"		=> "socialicon_digg",
					"value"				=> '',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Flickr Link",'apcore'),
					"param_name"		=> "socialicon_flickr",
					"value"				=> '',
				),				
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Skype Link",'apcore'),
					"param_name"		=> "socialicon_skype",
					"value"				=> '',
				),			
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Dropbox Link",'apcore'),
					"param_name"		=> "socialicon_dropbox",
					"value"				=> '',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("SoundCloud Link",'apcore'),
					"param_name"		=> "socialicon_soundcloud",
					"value"				=> '',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("VK Link",'apcore'),
					"param_name"		=> "socialicon_vk",
					"value"				=> '',
				),
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Email Address",'apcore'),
					"param_name"		=> "socialicon_email",
					"value"				=> '',
				),				
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("Social Icon's Alignment",'apcore'),
					"param_name"		=> "socialicon_alignment",
					"value"				=> array (
						"Left" => "left",
						"Center" => "center", 
						"Right" => "right"
					), 
				),				
				array(
					'type'				=> 'zolo_param_heading',
					'text'				=> esc_html__('Extra features', 'apcore'),
					'param_name'		=> 'subtitle_margin_heading',
					'edit_field_class'	=> 'apress-heading-param-wrapper vc_column vc_col-sm-12 no-top-margin',
				),
				array(
					"type"				=> "dropdown",
					"class"				=> "",
					"heading"			=> __("CSS Animation",'apcore'),
					"param_name"		=> "data_animation",
					"value"				=> apress_data_animations(),
					"description"		=> __("Select type of animation. Note: Works only in modern browsers.",'apcore'),
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-8 no-top-margin",
				),  
				array(
					"type"				=> "textfield",
					"class"				=> "",
					"heading"			=> __("Delay","apcore"),
					"param_name"		=> "data_delay",
					"value"				=> "500",
					"description"		=> __("Delay","apcore"),
					"edit_field_class"	=> "apress-heading-param-wrapper vc_column vc_col-sm-4 no-top-margin",
				),
				array(
					"type"				=> "textfield",
					"heading"			=> __("Extra class name", "apcore"),
					"param_name"		=> "class",
					"description"		=> __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "apcore")
				),
				array(
					"type"				=> "zolo_video_link_param",
					"heading"			=> esc_html__("Video tutorial and theme documentation article","apcore"),
					"param_name"		=> "tutorials",
					"doc_link"			=> $doc_link,
					"video_link"		=> "https://youtu.be/eYri4Yf0b8M",
				),				
				),
				) );		
		
			}		