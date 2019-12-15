<?php global $apress_data;
$side_menu_design = $apress_data["side_menu_action_header4"];
?>

<!-- Sidebar Menu Content Start -->

<?php if($side_menu_design == 'fullscreen_menu_open_button'){?>

<div class="full_screen_menu_area"> <a class="fullscreen_menu_close_button">Close</a>
  <div class="full_screen_menu">
    <div class="zolo-container">
      <div class="zolo-navigation">
        <?php	
        wp_nav_menu(  
        array(  
        'theme_location'  => 'primary-nav', 
        'container'       => false, 			        
        'container_id'    => 'main-nav',  
        'container_class' => '',  
        'menu_class' => 'nav zolo-navbar-nav ',
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'menu_id'         => 'primary' ,
		'depth'  			=> 1,
        'fallback_cb'       => 'ZOLOCoreFrontendWalker::fallback',
		'link_before'    	=> '<span class="menu-text">',
		'link_after'    	=> '</span>',
        'walker' 			=> new ZOLOCoreFrontendWalker()
        )
        );  
        ?>
      </div>
    </div>
  </div>
</div>
<?php }elseif($side_menu_design == 'extended_sidebar_button'){?>
<div class="extended_sidebar_area">
  <div class="extended_sidebar_content">
    <?php if ( is_active_sidebar( 'extended_sidebar' ) ) : ?>
    <div class="extended_sidebar_area">
      <?php dynamic_sidebar( 'extended_sidebar' ); ?>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php } ?>

<!-- Sidebar Menu Content End --> 
