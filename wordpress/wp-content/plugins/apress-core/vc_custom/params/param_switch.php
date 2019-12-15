<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Zolo_Switch'))
{
	class Zolo_Switch
	{
		function __construct()
		{	
			if(function_exists('vc_add_shortcode_param'))
			{
				vc_add_shortcode_param('zolo_switch' , array($this, 'zolo_switch_field'));
			}
		}
	
		function zolo_switch_field    ($settings, $value){
			//$dependency = vc_generate_dependencies_attributes($settings);
			$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
			$type = isset($settings['type']) ? $settings['type'] : '';
			$options = isset($settings['options']) ? $settings['options'] : '';
			$class = isset($settings['class']) ? $settings['class'] : '';
			$default_set = isset($settings['default_set']) ? $settings['default_set'] : false;
			$output = $checked = '';
			$un = uniqid('zoloswitch-'.rand());
			if(is_array($options) && !empty($options)){
				foreach($options as $key => $opts){
					if($value == $key){
						$checked = "checked";
					} else {
						$checked = "";
					}
					$uid = uniqid('zoloswitchparam-'.rand());
					$output .= '<div class="onoffswitch">
							<input type="checkbox" name="'.$param_name.'" value="'.$value.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . ' onoffswitch-checkbox chk-switch-'.$un.'" id="switch'.$uid.'" '.$checked.'>
							<label class="onoffswitch-label" for="switch'.$uid.'">
								<div class="onoffswitch-inner">
									<div class="onoffswitch-active">
										<div class="onoffswitch-switch">'.$opts['on'].'</div>
									</div>
									<div class="onoffswitch-inactive">
										<div class="onoffswitch-switch">'.$opts['off'].'</div>
									</div>
								</div>
							</label>
						</div>';
						if(isset($opts['label']))
							$lbl = $opts['label'];
						else
							$lbl = '';
					$output .= '<div class="chk-label">'.$lbl.'</div><br/>';
				}
			}
			
			if($default_set)
				$set_value = 'off';
			else
				$set_value = '';
			$output .= '<script type="text/javascript">
				jQuery("#switch'.$uid.'").change(function(){
					 
					 if(jQuery("#switch'.$uid.'").is(":checked")){
						jQuery("#switch'.$uid.'").val("'.$key.'");
						jQuery("#switch'.$uid.'").attr("checked","checked");
					 } else {
						jQuery("#switch'.$uid.'").val("'.$set_value.'");
						jQuery("#switch'.$uid.'").removeAttr("checked");
					 }
					
				});
			</script>';
			
			return $output;
		}
		
	}
}

if(class_exists('Zolo_Switch'))
{
	$Zolo_Switch = new Zolo_Switch();
}
