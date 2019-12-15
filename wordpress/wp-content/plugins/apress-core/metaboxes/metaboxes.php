<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * The Metaboxes class.
 */
class ZOLOThemeFrameworkMetaboxes {

	public function __construct()
	{
		global $apress_data;
		$this->data = $apress_data;

		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}

	// Load backend scripts
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php'|| $pagenow=='widgets.php')) {
			$theme_info = wp_get_theme();

			//wp_enqueue_script('media-upload');
			
			wp_enqueue_script('thickbox');
	   		wp_enqueue_style('thickbox');	
			
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-tabs' );
					
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'color-picker-handle',  APRESS_EXTENSIONS_PLUGIN_URL.'metaboxes/js/color-pic.js',array( 'wp-color-picker' ));
			
			// General JS for fields.
			wp_enqueue_script('apcore-options', APRESS_EXTENSIONS_PLUGIN_URL.'metaboxes/js/apcore-options.js', array( 'jquery' ),	$theme_info->get( 'Version' ) );

		}
	}

	// Adds the metaboxes.
	public function add_meta_boxes()
	{
		/*$post_types = get_post_types( array( 'public' => true ) );
		$disallowed = array( 'page', 'post', 'attachment', 'zt_portfolio', 'zt_team', 'zt_testimonial');		
		foreach ( $post_types as $post_type ) {
			if ( in_array( $post_type, $disallowed ) ){
				continue;
			}
			$this->add_meta_box('post_options', 'APRESS Options', $post_type);
		}
		*/
		$this->add_meta_box('post_options', 'Apress Options', 'post');
		$this->add_meta_box('page_fullscreen_rows', 'Full Screen Rows', array( 'zt_portfolio', 'page'));
		$this->add_meta_box('page_options', 'Apress Options', 'page');		
		$this->add_meta_box('portfolio_options', 'Apress Options', 'zt_portfolio');		
		$this->add_meta_box('team_options', 'Apress Options', 'zt_team');		
		$this->add_meta_box('testimonial_options', 'Apress Options', 'zt_testimonial');

	}

	public function add_meta_box($id, $label, $post_type)
	{
		add_meta_box('zt_' . $id, $label, array($this, $id), $post_type);
	}

	public function save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		foreach($_POST as $key => $value) {
			if(strstr($key, 'zt_')) {
				// Check if post meta already exists.
				$meta_exists = metadata_exists( 'post', $post_id, $key );

				// If post meta exists delete it before updating.
				if ( true === $meta_exists ) {
					delete_post_meta( $post_id, $key );
				}
				
				update_post_meta($post_id, $key, $value);
			}
		}
	}
	
	public function post_options() {
		$this->render_option_tabs( array( 'post', 'page', 'sliders', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}
	public function page_options() {
		$this->render_option_tabs( array( 'sliders', 'page', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}
	public function page_fullscreen_rows() {
		$this->render_fullscreen_rows_option( array( 'sliders', 'page', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}
	public function portfolio_options()
	{
		$this->render_option_tabs( array( 'portfolio', 'page', 'sliders', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}	
	public function team_options()
	{
		$this->render_option_tabs( array( 'team', 'page', 'sliders', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar') );
	}
	public function testimonial_options()
	{
		$this->render_option_tabs( array( 'testimonial', 'page', 'sliders', 'header', 'footer', 'sidebars', 'background', 'pagetitlebar' ) );
	}
	

	public function render_option_tabs( $requested_tabs, $post_type = 'default' ) {
		$screen = get_current_screen();

		$tabs_names = array(
			'sliders'		=> esc_html__( 'Sliders', 'apcore' ),
			'page'			=> esc_html__( 'Page', 'apcore' ),
			'post'			=> esc_html__( 'Post', 'apcore' ),
			'header'		=> esc_html__( 'Header', 'apcore' ),
			'footer'		=> esc_html__( 'Footer', 'apcore' ),
			'sidebars'		=> esc_html__( 'Sidebars', 'apcore' ),
			'background'	=> esc_html__( 'Background', 'apcore' ),
			'pagetitlebar'	=> esc_html__( 'Page Title Bar', 'apcore' ),
			'portfolio'		=> esc_html__( 'Portfolio', 'apcore' ),
			'team'			=> esc_html__( 'Team', 'apcore' ),
			'testimonial'	=> esc_html__( 'Testimonial', 'apcore' ),
		);
		?>
		
        <div id="zt_metabox_tabs">
            <ul class="zt_metabox_tabs">
    
                <?php foreach ( $requested_tabs as $key => $tab_name ) : ?>
                    <?php $class_active = ( 0 === $key ) ? ' class="active"' : ''; ?>				
                        <li<?php echo $class_active; ?>><a href="<?php echo '#'.$tab_name; ?>"><?php echo $tabs_names[ $tab_name ]; ?></a></li>
                    
                <?php endforeach; ?>
    
            </ul>
    
            <div class="zt_metabox">
    
                <?php foreach ( $requested_tabs as $key => $tab_name ) : ?>
                <?php $class_active = ( 0 === $key ) ? ' active' : ''; ?>
                    <div class="zt_metabox_tab <?php echo $class_active; ?>" id="<?php echo $tab_name; ?>">
                        <?php require_once( 'tabs/tab_' . $tab_name . '.php' ); ?>
                    </div>
                <?php endforeach; ?>
    
            </div>
            <div class="clear"></div>
        </div>
		<?php

	}
	public function render_fullscreen_rows_option() {		
		
		echo '<div class="zt_metabox"><div class="fullscreen_tab">';
			require_once( 'tabs/tab_fullscreen.php' );
		echo '</div></div><div class="clear"></div>';       
	
	}
	
	public function text($field = array(), $dependency = array() ) {
		global $post;
				
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];	
		$default = 	$field['default'];	
		
		$db_value = get_post_meta( $post->ID, 'zt_' . $id, true );
		$value = ( $db_value ) ? $db_value : $default;
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<input type="text" id="zt_' . $id . '" name="zt_' . $id . '" value="' . $value . '" />';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
        
	}
	
	public function color($field = array(), $dependency = array() ){
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];	
		$default = 	$field['default'];	
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<input type="text" id="zt_' . $id . '" name="zt_' . $id . '" value="' . get_post_meta($post->ID, 'zt_' . $id, true) . '" class="color-picker apress-color-field" data-alpha="true" data-default="'.$default.'" />';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function select($field = array(), $dependency = array() ) {		
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];	
		$default = 	$field['default'];	
		$options = $field['options'];
				
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<div class="zolo-shortcodes-arrow"></div>';
				$html .= '<select id="zt_' . $id . '" name="zt_' . $id . '">';
				foreach($options as $key => $option) {
					if(get_post_meta($post->ID, 'zt_' . $id, true) == $key) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function multiple($field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		$default = 	$field['default'];	
		$options = $field['options'];
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<select multiple="multiple" id="zt_' . $id . '" name="zt_' . $id . '[]">';
				foreach($options as $key => $option) {
					if(is_array(get_post_meta($post->ID, 'zt_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'zt_' . $id, true))) {
						$selected = 'selected="selected"';
					} else {
						$selected = '';
					}

					$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
				}
				$html .= '</select>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function textarea($field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		$default = 	$field['default'];	
		
		$db_value = get_post_meta( $post->ID, 'zt_' . $id, true );
		$value = ( metadata_exists( 'post', $post->ID, 'zt_' . $id ) ) ? $db_value : $default;

		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<textarea cols="120" rows="10" id="zt_' . $id . '" name="zt_' . $id . '">' . $value . '</textarea>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}

	public function upload($field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];		
		$default = $field['default'];
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
			$html .= '</div>';
			$html .= '<div class="zt_field">';
				$html .= '<div class="zt_upload">';
					$html .= '<div><input name="zt_' . $id . '" class="upload_field" id="zt_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'zt_' . $id, true) . '" /></div>';
					$html .= '<div class="zolo_upload_button_container"><input class="zolo_upload_button" type="button" value="Browse" /></div>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

		echo $html;
	}
	
	public function radio_buttonset( $field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		
		$options = $field['options'];
		$options_reset = $options;
		reset( $options_reset );
		
		$value = ( '' == get_post_meta( $post->ID, 'zt_' . $id, true )  ) ? key( $options_reset ) : get_post_meta( $post->ID, 'zt_' . $id, true );
		
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
					$html .= $label;
					$html .= '</label>';
					if($desc) {
						$html .= '<p>' . $desc . '</p>';
					}
				$html .= '</div>';
			$html .= '<div class="zt_field apress-buttonset">';
				$html .= '<div class="zolo-form-radio-button-set ui-buttonset">';
					$html .= '<input type="hidden" id="zt_'.$id.'" name="zt_'.$id.'" value="'.$value.'" class="button-set-value" />';
						foreach ( $options as $key => $option ) :
							$selected = ( $key == $value ) ? ' ui-state-active' : '';
						$html .= '<a href="#" class="ui-button buttonset-item'.$selected.'" data-value="'.$key.'">'.$option.'</a>';
					endforeach;
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
		echo $html;
	}
	
	public function image_buttonset( $field = array(), $dependency = array() ) {
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];
		
		$options = $field['options'];
		$options_reset = $options;
		reset( $options_reset );
		
		$value = ( '' == get_post_meta( $post->ID, 'zt_' . $id, true )  ) ? key( $options_reset ) : get_post_meta( $post->ID, 'zt_' . $id, true );
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
					$html .= $label;
					$html .= '</label>';
					if($desc) {
						$html .= '<p>' . $desc . '</p>';
					}
				$html .= '</div>';
				$html .= '<div class="zt_field apress-image-buttonset">';
					$html .= '<div class="zolo-form-radio-button-set ui-buttonset">';
						$html .= '<input type="hidden" id="zt_'.$id.'" name="zt_'.$id.'" value="'.$value.'" class="button-set-value" />';
							foreach ( $options as $key => $option ) :							
								$selected = ( $key == $value ) ? ' ui-state-active' : '';
							$html .= '<img src="' . $option['img'] . '" alt="' . $option['alt'] . '" class="ui-button buttonset-item'.$selected.'" data-value="'.$key.'" />';							
						endforeach;
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		
		echo $html;	
		
		}
	
	public function image_upload($field = array(), $dependency = array() ) {
		
		global $post;
		
		$label = $field['title'];
		$desc = $field['subtitle'];
		$id = $field['id'];		
		$default = $field['default'];
		
		$post_meta_value = get_post_meta($post->ID, 'zt_'.$field['id'], true);
		if( $post_meta_value == '' ){
			$post_meta_value = $field['default'];
		}
		
		$post_meta_value = trim($post_meta_value);	
			
		$html = '';
		$html .= '<div class="zt_metabox_field">';
		$html .= $this->dependency( $dependency );
			$html .= '<div class="zt_desc">';
				$html .= '<label for="zt_' . $id . '">';
				$html .= $label;
				$html .= '</label>';
				if($desc) {
					$html .= '<p>' . $desc . '</p>';
				}
				$html .= '</div>';
				$html .= '<div class="zt_field apress_image_upload">';
					$html .= '<input type="text" class="upload_field" name="zt_'.$id.'" id="zt_'.$id.'" value="'.$post_meta_value.'" />';
					$html .= '<input type="button" class="zt_meta_box_upload_button" value="Select Image" />';
					$html .= '<input type="button" class="zt_meta_box_clear_image_button" value="Clear Image" '.($post_meta_value?'':'disabled').' />';
				if( $post_meta_value ){
					$html .= '<img class="preview-image" src="'.$post_meta_value.'" />';
				}
				$html .= '</div>';
		$html .= '</div>';

		echo $html;
		
		}
	
	private function dependency( $dependency = array() ) {
		$data_dependency = '';
		if ( 0 < count( $dependency ) ) {
			$data_dependency .= '<div class="apress-dependency">';
			foreach ( $dependency as $dependence ) {
				$data_dependency .= '<span class="hidden" data-value="' . $dependence['value'] . '" data-field="' . $dependence['field'] . '" data-comparison="' . $dependence['comparison'] . '"></span>';
			}
			$data_dependency .= '</div>';
		}
		return $data_dependency;
	}
	

}

$metaboxes = new ZOLOThemeFrameworkMetaboxes;