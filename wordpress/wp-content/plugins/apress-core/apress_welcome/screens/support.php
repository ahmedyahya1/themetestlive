<?php
$apress_theme = wp_get_theme();
$apress_version = $apress_theme->get( 'Version' );
?>
<div class="wrap about-wrap apress-wrap">
	<h1><?php echo __( "Welcome to Apress!", "apcore" ); ?></h1>
	<div class="about-text"><?php echo __( "Thank you for purchasing Apress Theme. Design any layout and customize everything without any coding.", "apcore" ); ?>
    </div>
    <div class="apress-logo"><div class="theme_name"><img src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/apress_logo1.jpg'; ?>" alt="apcore"/></div><span class="apress-version"><?php echo __( "Version", "apcore" ); ?> <?php echo esc_html($apress_version); ?></span></div>
	<h2 class="nav-tab-wrapper">
    	<?php
		printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "What's New", "apcore" ) );
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=apress-demos' ), __( "Install Demos", "apcore" ) );
		?>
	</h2>
<?php /*?>    <img class="apress_featured_img" src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/apress_new.png'; ?>" alt="apcore"/><?php */?>

    <div class="apress-logo_box"><div class="theme_name"><img src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/apress_logo1.jpg'; ?>" alt="apcore"/></div><span class="apress-version"><?php echo __( "Version", "apcore" ); ?> <?php echo esc_html($apress_version); ?></span></div>
    <h3 class="apress_featured_title"><?php echo __( "Latest Updates - Apress", "apcore" ); ?></h3>
    <p><?php echo __( "APRESS - True multipurpose theme  to design any kind of site that you want. Its got fully customizable drag n drop header builder, Visual Composer page builder  and a powerful Redux theme options customized for a seamless and fast web designing process. APRESS Theme has  more than 250 + easy to use and readily available content blocks- APRESS Gallery,  designed by experienced designers to minimize your time spent on designing websites and concepts. The list of goodies is vast and lots of new features will be added in upcoming updates.","apcore" ); ?></p>
    
    <div class="apress_admin_feature_section">
    <ul>
    <li>
    <span class="icon_box"><img src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/01.png'; ?>" alt="apcore"/></span>
    <h4><?php echo __( "Submit A Ticket", "apcore" ); ?></h4>
    <p><?php echo __( "With Apress theme purchase, our team is committed to provide all its users all the theme related support.", "apcore" ); ?></p>
    <a href="mailto:apressthemes@gmail.com" class="button" target="_blank"><?php echo __( "Submit A Ticket", "apcore" ); ?></a>
    </li>
    <li>
    <span class="icon_box"><img src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/02.png'; ?>" alt="apcore"/></span>
    <h4><?php echo __( "Documentation", "apcore" ); ?></h4>
    <p><?php echo __( "Everything about how to use Apress Theme is provided in our extensive documentation and we are updating it as we add new features with every release.", "apcore" ); ?></p>
    <a href="http://apressthemes.com/apress/documentation/" class="button" target="_blank"><?php echo __( "Documentation", "apcore" ); ?></a>
    </li>
    
    </ul>
    </div>
    
    <div class="apress-thanks">
    	<p class="description"><?php echo __( "Thank you for choosing Apress. We are honored and are fully dedicated to making your experience perfect.", "apcore" ); ?></p>
    </div>
</div>
