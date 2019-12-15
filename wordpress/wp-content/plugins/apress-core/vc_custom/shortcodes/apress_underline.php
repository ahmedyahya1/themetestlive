<?php 
/*-----------------------------------------------------------------------------------*/
/* Underline
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Underline_Module')) {
	class Apress_Underline_Module {
		function __construct() {
			add_shortcode( 'apress_underline', array( &$this, 'apress_underline' ) );
		}
		

		function apress_underline( $atts, $content=null ){		
			extract(shortcode_atts(array(
					'underline'				=> 'A',
					'underlinestyle'		=> 'style1',
					'underlinefirstcolor'	=> '#fed841',
					'underlinesecondcolor' 	=> '#fed841',
					'underlinelink' 		=> '',
					'underlinelinktarget'	=> '_self',
					'underlinetextcolor'	=> '#333333',
					'underlinetexthovercolor' => '#333333',
					'underline_animation' 	=> 'default',
					
			), $atts));
			
		ob_start();
		
		$uniqid = uniqid(rand());
		$zolo_underline_id = 'zolo_underline_id'.$uniqid;
		
		//Animation
		if($underline_animation == 'default'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
		
		?>
<?php if($underlinelink != ''){?>
		<a target="<?php echo $underlinelinktarget;?>" href="<?php echo $underlinelink;?>" id="<?php echo $zolo_underline_id;?>" class="zolo_underline <?php echo 'zolo_underline_'.$underlinestyle;?>"><?php echo $underline; ?></a>
<?php }else{?>


		<span id="<?php echo $zolo_underline_id;?>" class="zolo_underline <?php echo 'zolo_underline_'.$underlinestyle.' '.$animatedclass;?>"  data-animation ="draw_underline" data-delay ="700"> 
		
		<span><?php echo $underline; ?></span> </span>
<?php }?>
<?php        
$custom_css = '';
	$custom_css .= '#'.$zolo_underline_id.'.zolo_underline{ color:'.$underlinetextcolor.'; position:relative;}';
	$custom_css .= '#'.$zolo_underline_id.'.zolo_underline > span{ position:relative; z-index:2;}';
	$custom_css .= '#'.$zolo_underline_id.'.zolo_underline:hover{ color:'.$underlinetexthovercolor.';}';
	$custom_css .= '#'.$zolo_underline_id.'.zolo_underline {
	background-image: -moz-linear-gradient(left, '.$underlinefirstcolor.' 0%, '.$underlinesecondcolor.' 100%);
	background-image: -webkit-gradient(left top, right top, color-stop(0%, '.$underlinefirstcolor.'), color-stop(100%, '.$underlinesecondcolor.'));
	background-image: -webkit-linear-gradient(left, '.$underlinefirstcolor.' 0%, '.$underlinesecondcolor.' 100%);
	background-image: -o-linear-gradient(left, '.$underlinefirstcolor.' 0%, '.$underlinesecondcolor.' 100%);
	background-image: -ms-linear-gradient(left, '.$underlinefirstcolor.' 0%, '.$underlinesecondcolor.' 100%);
	background-image: linear-gradient(to right, '.$underlinefirstcolor.' 0%, '.$underlinesecondcolor.' 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='.$underlinefirstcolor.', endColorstr='.$underlinesecondcolor.', GradientType=1 );}';
	apcore_save_plugin_dyn_styles( $custom_css );
?>	
		<?php 
		$output_string = ob_get_contents();
		ob_end_clean();
		return $output_string;
		} 
	}
	
	$Apress_Underline_Module = new Apress_Underline_Module;
}
?>