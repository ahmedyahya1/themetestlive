<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * About Me Widget
*/
if( ! class_exists( 'ZOLO_Custom_Menu_Widget' ) ) {
	add_action('widgets_init', 'custom_menu_load_widgets');
	
	function custom_menu_load_widgets()
	{
		register_widget('ZOLO_Custom_Menu_Widget');
	}
	
	class ZOLO_Custom_Menu_Widget extends WP_Widget {
	
		public function __construct() {
			
			$widget_ops = array('classname' => 'zolo_custom_menu', 'description' => __( 'Custom Menu Presentations', 'apcore' ));
			$control_ops = array('id_base' => 'zolo_custom_menu-widget');
			parent::__construct('zolo_custom_menu-widget', 'Apress: Custom Menu', $widget_ops, $control_ops);
		}
		
		public function widget($args, $instance){
		
			extract($args);
			
			$title 				= apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );
			$class_wrap 		= isset( $instance['class_wrap'] ) ? $instance['class_wrap'] : '';
			$style 				= isset( $instance['style'] ) ? $instance['style'] : '';
			$vertical_col		= isset( $instance['vertical_col'] ) ? $instance['vertical_col'] : '';
			
			// Class wrap
			if ( '' != $class_wrap ) {
				$class_widget = $class_wrap;
			} else {
				$class_widget = '';
			}
	
			// no 'class' attribute
			if( strpos($before_widget, 'class') === false ) {
				$before_widget = str_replace('>', 'class="'. $class_widget . '"', $before_widget);
			}
			// there is 'class' attribute
			else {
				$before_widget = str_replace('class="', 'class="'. $class_widget . ' ', $before_widget);
			}
			
			echo $before_widget;
			
			if($title) { ?>
				<h3 class="zolo-title widget-title">
					<span><?php echo esc_attr( $title ); ?></span>
				</h3>
			<?php }
			
			// Get menu.
			$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
	
			if ( ! $nav_menu ) {
				return;
			}
			
			echo '<style type="text/css">';		
				// delete the following css code
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.one ul li{width: 100%;}';
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.one ul li a{display:block;}';
				
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.two ul li{width:47.5%; margin-left:5%;}';
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.two ul li:nth-child(2n+1){margin-left:0;}';
				
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.three ul li{width: 30%;margin-left:5%;}';
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.three ul li:nth-child(3n+1){margin-left:0;}';
				
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.four ul li{width:21.25%;margin-left:5%;}';
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.four ul li:nth-child(4n+1){margin-left:0;}';
				
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-horizontal ul li{width:auto;display:inline-block; padding-right:10px; padding-left:10px;border:0;float:none;}';
				echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-horizontal ul li a{padding-right:10px; padding-left:10px; border:0;}';
				
				echo '@media (max-width:500px){';
					echo '#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.two ul li, 
					#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.three ul li,
					#' . esc_attr( $this->id ) . ' > .apress-widget-menu-vertical.four ul li{width:100%; margin-left:0%;}';
				echo '}';
				
			echo '</style>';	
			
			$nav_menu_args = array(
				'fallback_cb' 	  => '',
				'menu'        	  => $nav_menu,
				'depth'		  	  => -1,
				'container_class' => 'apress-widget-menu-'.$style.' '.$vertical_col,
				'container'       => 'nav',
				'item_spacing'    => 'discard',
			);
	
			wp_nav_menu( $nav_menu_args );
	
			echo $after_widget;
	}
	
		public function update($new_instance, $old_instance){
						
			$instance = $old_instance;
			
			$instance['title']    			= isset( $new_instance['title'] ) ? $new_instance['title'] : '';
			$instance['class_wrap'] 		= isset( $new_instance['class_wrap'] ) ? $new_instance['class_wrap'] : '';
			$instance['style']				= isset( $new_instance['style'] ) ? $new_instance['style'] : '';
			$instance['nav_menu']			= isset( $new_instance['nav_menu'] ) ? $new_instance['nav_menu'] : '';			
			$instance['vertical_col']		= isset( $new_instance['vertical_col'] ) ? $new_instance['vertical_col'] : '';
			
			return $instance;
			
		}
	
		public function form($instance){			

			$defaults = array(
				'title' 				=> '',
				'class_wrap'			=> '',
				'style'					=> 'vertical',
				'nav_menu' 				=> '',
				'vertical_col'			=> 'one',
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
	
			// Get menus.
			$menus = wp_get_nav_menus();
			$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'apcore'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
			</p>
            <p>
				<label for="<?php echo $this->get_field_id('class_wrap'); ?>"><?php _e('Class Wrap (optional):', 'apcore'); ?></label>			
				<input class="widefat" id="<?php echo $this->get_field_id('class_wrap'); ?>" name="<?php echo $this->get_field_name('class_wrap'); ?>" type="text" value="<?php echo $instance['class_wrap']; ?>" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('style'); ?>"><?php _e( 'Style:', 'apcore' ); ?></label>
			<select class='zt-select widefat' name="<?php echo $this->get_field_name('style'); ?>" id="zt-menu-style-select">
				<option value="vertical" <?php if($instance['style'] == 'vertical') { ?>selected="selected"<?php } ?>><?php _e( 'Vertical Menu', 'apcore' ); ?></option>
				<option value="horizontal" <?php if($instance['style'] == 'horizontal') { ?>selected="selected"<?php } ?>><?php _e( 'Horizontal Menu', 'apcore' ); ?></option>
			</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"><?php esc_attr_e( 'Select Menu:', 'apcore' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nav_menu' ) ); ?>" class="widefat" style="width:100%;">
					<option value="0"><?php esc_attr_e( '&mdash; Select &mdash;', 'apcore' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option value="<?php echo esc_attr( $menu->slug ); ?>" <?php selected( $nav_menu, $menu->slug ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>
			<label for="<?php echo $this->get_field_id('vertical_col'); ?>"><?php _e( 'Column(Only work for Vertical Menu):', 'apcore' ); ?></label>
			<select class='zt-select widefat' name="<?php echo $this->get_field_name('vertical_col'); ?>" id="zt-vertical-menu-select">
				<option value="one" <?php if($instance['vertical_col'] == 'one') { ?>selected="selected"<?php } ?>><?php _e( 'One', 'apcore' ); ?></option>
				<option value="two" <?php if($instance['vertical_col'] == 'two') { ?>selected="selected"<?php } ?>><?php _e( 'Two', 'apcore' ); ?></option>
				<option value="three" <?php if($instance['vertical_col'] == 'three') { ?>selected="selected"<?php } ?>><?php _e( 'Three', 'apcore' ); ?></option>
				<option value="four" <?php if($instance['vertical_col'] == 'four') { ?>selected="selected"<?php } ?>><?php _e( 'Four', 'apcore' ); ?></option>
			</select>
			</p>
			<?php
				
			}
	}
}
?>