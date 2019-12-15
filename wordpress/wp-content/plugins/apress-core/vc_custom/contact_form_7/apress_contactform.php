<?php 
/*-----------------------------------------------------------------------------------*/
/** Contact Form
/*-----------------------------------------------------------------------------------*/
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Contactform_Module')) {
	class Apress_Contactform_Module {
		function __construct() {
			add_action( 'init', array( &$this, 'apress_contactform_init' ) );
			add_shortcode( 'apress_contactform', array( &$this, 'apress_contactform' ) );
		}
		
		function apress_contactform_init() {
		
			$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	
			$contact_forms = array();
			if ( $cf7 ) {
				foreach ( $cf7 as $cform ) {
					$contact_forms[ $cform->post_title ] = $cform->ID;
				}
			} else {
				$contact_forms[ __( 'No contact forms found', 'apcore' ) ] = 0;
			}
			
			$doc_link = 'http://apressthemes.com/apress/documentation';
			
			if ( function_exists( 'vc_map' ) ) {
				vc_map( array(
					"name"					=> __("Contact Form", 'apcore'),
					"base"					=> "apress_contactform",
					"class"					=> "",
					"weight"				=> 25,
					"category"				=> __( "Apress", "apcore"),
					"description"			=> __("Beautiful Contact Form 7", "apcore"),
					"icon"					=> APRESS_EXTENSIONS_PLUGIN_URL . "vc_custom/assets/images/vc_icons/vc-icon-contactform.png",
					"params" 				=> array(
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Select contact form",'apcore'),
							"param_name"		=> "contactform_id",
							'value'				=> $contact_forms,
							'description'		=> __( 'Choose previously created contact form from the drop down list.', 'apcore' ),
							"admin_label"		=> true,
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Text Color",'apcore'),
							"param_name"		=> "contactform_textcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Input Field Background Color",'apcore'),
							"param_name"		=> "contactform_bgcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Input Field Border Color",'apcore'),
							"param_name"		=> "contactform_borcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Input Field Focus Color",'apcore'),
							"param_name"		=> "contactform_focuscolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Text Color",'apcore'),
							"param_name"		=> "contactform_button_textcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Text Color",'apcore'),
							"param_name"		=> "contactform_button_hover_textcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Background Color",'apcore'),
							"param_name"		=> "contactform_button_bgcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Background Color",'apcore'),
							"param_name"		=> "contactform_button_hover_bgcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Border Color",'apcore'),
							"param_name"		=> "contactform_button_borcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "colorpicker",
							"class"				=> "",
							"heading"			=> __("Button Hover Border Color",'apcore'),
							"param_name"		=> "contactform_button_hover_borcolor",
							'value'				=> '',
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							"type"				=> "dropdown",
							"class"				=> "",
							"heading"			=> __("Button Size",'apcore'),
							"param_name"		=> "contactform_button_size",
							"value"				=> array ("Small" => "small","Medium" => "medium_buttton", "Full Width" => "fullwidth_buttton"),
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
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						), 
						array(
							"type"				=> "textfield",
							"class"				=> "",
							"heading"			=> __("Delay",'apcore'),
							"param_name"		=> "data_delay",
							"value"				=> '500',
							"description"		=> __("Delay",'apcore'),
							'edit_field_class'	=> 'vc_column vc_col-sm-6',
						),
						array(
							'type'				=> 'zolo_video_link_param',
							'heading'			=> esc_html__('Video tutorial and theme documentation article','apcore'),
							'param_name'		=> 'tutorials',
							'doc_link'			=> $doc_link,
							'video_link'		=> 'https://youtu.be/Nn7zijKqzIk',
						),					
					),					
				) );
			}
		}
		function apress_contactform($atts, $content = null) {
		  ob_start();
		   extract(shortcode_atts(array(
						'contactform_id' 					=>'',
						'contactform_textcolor' 			=>'',
						'contactform_bgcolor' 				=>'',
						'contactform_borcolor' 				=>'',
						'contactform_focuscolor' 			=>'',
						'contactform_button_textcolor' 		=>'',
						'contactform_button_hover_textcolor'=>'',
						'contactform_button_bgcolor' 		=>'',
						'contactform_button_hover_bgcolor' 	=>'',
						'contactform_button_borcolor' 		=>'',
						'contactform_button_hover_borcolor' =>'',
						'contactform_button_size' 			=>'small',
						'data_animation' 					=>'No Animation',
						'data_delay' 						=>'500'
				), $atts));
				
				//Animation
				if($data_animation == 'No Animation'){
					$animatedclass = 'noanimation';
				}else{
					$animatedclass = 'animated hiding';
				}
				
				static $c = 1;
				
				?>

<!--zolo calltoaction Row Start-->

<div id="apress_contactform_<?php echo $c;?>" class="apress_contactform <?php echo $contactform_button_size.' '.$animatedclass;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>"> 
	<?php echo do_shortcode('[contact-form-7 id="'.$contactform_id.'" ]')?> 
</div>
<?php 
//CSS
$custom_css = '';
if($contactform_textcolor){
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form ::-webkit-input-placeholder{color:'.$contactform_textcolor.';}';
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form ::-moz-input-placeholder{color:'.$contactform_textcolor.';}';
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form ::-ms-input-placeholder{color:'.$contactform_textcolor.';}';
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form ::-o-input-placeholder{color:'.$contactform_textcolor.';}';
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form select,
	#apress_contactform_'.$c.' .wpcf7-form .uneditable-input, 
	#apress_contactform_'.$c.' .wpcf7-form input, 
	#apress_contactform_'.$c.' .wpcf7-form textarea,
	#apress_contactform_'.$c.' .wpcf7-form{color:'.$contactform_textcolor.';}';
}

if($contactform_bgcolor){
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form select,
	#apress_contactform_'.$c.' .wpcf7-form .uneditable-input, 
	#apress_contactform_'.$c.' .wpcf7-form input, 
	#apress_contactform_'.$c.' .wpcf7-form textarea{background:'.$contactform_bgcolor.'!important;}';
}

if($contactform_borcolor){
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form select,
	#apress_contactform_'.$c.' .wpcf7-form .uneditable-input, 
	#apress_contactform_'.$c.' .wpcf7-form input, 
	#apress_contactform_'.$c.' .wpcf7-form textarea{border-color:'.$contactform_borcolor.';}';
}

if($contactform_focuscolor){
	$custom_css .= '#apress_contactform_'.$c.' .wpcf7-form input:focus, 
	#apress_contactform_'.$c.' .wpcf7-form textarea:focus{border-color:'.$contactform_focuscolor.'!important;}';
}

if($contactform_button_textcolor || $contactform_button_bgcolor || $contactform_button_borcolor){
	$custom_css .= '#apress_contactform_'.$c.' .zt_button_icon, 
	#apress_contactform_'.$c.' .zt_button_icon_right, 
	#apress_contactform_'.$c.' .wpcf7-form button, 
	#apress_contactform_'.$c.' .wpcf7-form input[type="reset"], 
	#apress_contactform_'.$c.' .wpcf7-form input[type="submit"], 
	#apress_contactform_'.$c.' .wpcf7-form #submit, 
	html #apress_contactform_'.$c.' .wpcf7-form input[type="button"]{color:'.$contactform_button_textcolor.'!important;background:'.$contactform_button_bgcolor.'!important;border-color:'.$contactform_button_borcolor.'!important;}';
	
	$custom_css .= '#apress_contactform_'.$c.' .apress_svg_arrow_icon .apress_svg_arrow_circle1{ stroke:'.$contactform_button_borcolor.';}';
	$custom_css .= '#apress_contactform_'.$c.' .apress_svg_arrow_icon .apress_svg_arrow{ stroke:'.$contactform_button_textcolor.';}';
}

if($contactform_button_hover_textcolor || $contactform_button_hover_bgcolor || $contactform_button_hover_borcolor){
	$custom_css .= '#apress_contactform_'.$c.' .zt_button_icon:hover, 
	#apress_contactform_'.$c.' .zt_button_icon_right:hover, 
	#apress_contactform_'.$c.' .wpcf7-form button:hover, 
	#apress_contactform_'.$c.' .wpcf7-form input[type="reset"]:hover, 
	#apress_contactform_'.$c.' .wpcf7-form input[type="submit"]:hover, 
	#apress_contactform_'.$c.' .wpcf7-form #submit:hover,
	html #apress_contactform_'.$c.' .wpcf7-form input[type="button"]:hover{color:'.$contactform_button_hover_textcolor.'!important;background:'.$contactform_button_hover_bgcolor.'!important;border-color:'.$contactform_button_hover_borcolor.'!important;}';
	
	$custom_css .= '#apress_contactform_'.$c.' .apress_svg_arrow_icon .apress_svg_arrow_circle{ stroke:'.$contactform_button_hover_borcolor.';}';
}
apcore_save_plugin_dyn_styles( $custom_css );

			$c++;
			wp_reset_query();
			$demolp_output = ob_get_clean();
			return $demolp_output;
			}
	}
	
	$Apress_Contactform_Module = new Apress_Contactform_Module;
}


