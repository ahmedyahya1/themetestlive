<?php 
/*-----------------------------------------------------------------------------------*/
/* Drop Caps
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Apress_Dropcaps_Module')) {
	class Apress_Dropcaps_Module {
		function __construct() {
			add_shortcode( 'apress_dropcaps', array( &$this, 'apress_dropcaps' ) );
		}
		

		function apress_dropcaps( $atts, $content=null ){		
			extract(shortcode_atts(array(
					'dropcap'	=> 'A',
					'dropcap_fontsize'	=> '24',
					'dropcapstyle'	=> 'none',
					'dropcapcolor' => '#ffffff',
					'dropcapbackground' => '#333333'
			), $atts));
			
		ob_start();
		?>
		
		<span class="zolo_dropcaps zolo_dropcap_circle <?php echo $dropcapstyle; ?>" style=" background:<?php if($dropcapstyle != 'none'){ echo $dropcapbackground; }?>;color:<?php echo $dropcapcolor;?>; font-size:<?php echo $dropcap_fontsize;?>px;"><?php echo $dropcap; ?></span>
		
		<?php 
		$output_string = ob_get_contents();
		ob_end_clean();
		return $output_string;
		} 
	}
	
	$Apress_Dropcaps_Module = new Apress_Dropcaps_Module;
}
?>