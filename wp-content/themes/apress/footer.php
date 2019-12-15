<?php
include get_template_directory().'/framework/variables/variables-footer.php';
?>
<?php 
if ($footer_layout_style == 'footer_fixed'){
	echo '<div class="zolo_footer_fixed_content_mar"></div>';
}
?>
</div>
<!--zolo_content_bg_area End-->
</div>
<!--zolo_main_content_area End-->
<?php 
if($back_to_top !== 'hide_backtotop'){	
	if($back_to_top == 'sticky_backtotop' || $back_to_top == 'sticky_on_scroll_backtotop'){ 
		echo '<a href="#" class="'.esc_attr($back_to_top.' '.$back_to_top_style).' back-to-top"><i class="fa fa-angle-up"></i></a>';
	}
}
?>
<?php if($footer_show_hide == 'show'):?>
<!--Footer Area Start-->

<footer class="main-footer site-footer zolo_footer_area" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
  <div class="zolo_footer_container_area " id="<?php echo esc_attr($footer_layout_style == 'footer_fixed') ? 'footer_fixed' : 'none'; ?>">
    <?php
    if ( $footer_builder_type == 'page_editor' &&  $footer_builder_page_id ) {
    	echo '<div class="footer" data-parallax="'.$footer_bg_image.'">';
		$getFooterPost = get_post( $footer_builder_page_id );  
		if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
			$vc_enabled	  = ( $getFooterPost->post_content && ('<p>[vc_' || substr( $getFooterPost->post_content, 0, 4 ) === '[vc_' ) ) ? true : false;
			if ( ! $vc_enabled ) {
				echo '<div class="zolo-container"><div class="zolo_footer_padding">'.$getFooterPost->post_content.'</div></div>';
			} else {
				echo '<div class="zolo-container"><div class="zolo_footer_padding">'.do_shortcode( $getFooterPost->post_content ).'</div></div>';
			}		
		}
    	echo '</div>';
    }else {
    	echo '<div class="footer" data-parallax="'.$footer_bg_image.'">';
		if($back_to_top!== 'hide_backtotop'){
			if($back_to_top == 'default_backtotop'){ 
				echo '<a href="#" class="default_back-to-top '.esc_attr($back_to_top_style).'"><i class="fa fa-angle-up"></i></a>';
			}
		}
	if($footer_builder_type == 'widgets'){ 
	  if($upper_footer_widgets == 'on') { ?>
      <div class="footer-layout-upper <?php echo esc_attr('upperfooter_layout_columns_'.$footer_upper_columns);?>">
        <div class="zolo-container">
          <?php get_template_part('framework/footers/footer-layout-upper'); ?>
        </div>
      </div>
      <?php } ?>
      <?php if ( is_active_sidebar( 'footer_widget1' ) || is_active_sidebar( 'footer_widget2' ) || is_active_sidebar( 'footer_widget3' ) || is_active_sidebar( 'footer_widget4' ) ) { ?>
      <div class="footer-widgets <?php echo esc_attr($layout_columns_class);?>">
        <div class="zolo-container">
          <div class="zolo_footer_padding">
            <?php   
            $footer_type = $footer_layout_columns;
            get_template_part('framework/footers/footer',$footer_type); 
            ?>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php 
	  if($lower_footer_widgets == 'on'){ ?>
      <div class="footer-layout-lower <?php echo esc_attr('lowerfooter_layout_columns_'.$footer_lower_columns);?>">
        <div class="zolo-container">
          <?php get_template_part('framework/footers/footer-layout-lower'); ?>
        </div>
      </div>
      <?php } ?>
      <?php }?>
    </div>
    <?php if($copyright_show_hide == 'show'){ ?>
    <div class="copyright_wrap">
      <?php if($copyright_border_style_width == 'border_style_fix_width'){ echo '<div class="zolo-container">';}?>
      <div class="copyright <?php echo (esc_attr($copyright_social_align) == 'center') ? 'copyright_social_center': ''; ?>">
        <div class="zolo-container">
          <div class="zolo_copyright_padding">
            <?php if($footer_social_icon == 'on'){?>
            <div class="copyright_social">
              <?php get_template_part('framework/footer_social_icons'); ?>
            </div>
            <?php }?>
            <div class="copyright_text">
              <?php 
				echo wp_kses($copyright_text,array(
								'span' => array(
									'class' => array(),
								),
								'i' => array(
									'class' => array(),
								),
								'img' => array(
									'src' => array(),
									'class' => array(),
									'alt' => array(),
								),
								'strong' => array(),
								'em' => array(),
								'br' => array(),
								'a' => array(
									'href' => array(),
									'class' => array(),
									'mailto' => array(),
									'callto' => array(),
									'target' => array()
								)
							)); 
				?>
            </div>
          </div>
        </div>
      </div>
      <?php if($copyright_border_style_width == 'border_style_fix_width'){ echo '</div>';}?>
    </div>
    <?php }
	}?>
  </div>
</footer>
<?php endif;?>
<!--Footer Area End-->
</div>
</div>
</div>
<?php wp_footer(); ?>
</body></html>