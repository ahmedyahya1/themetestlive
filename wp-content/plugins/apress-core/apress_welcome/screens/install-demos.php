<?php
$apress_theme = wp_get_theme();
$apress_version = $apress_theme->get( 'Version' );

$zolo_url = 'http://apressthemes.com/';
$demos = array(
	'main'			=> array('siteurl'=>'demo1','type'=>'corporate'),
	'twenty18'		=> array('siteurl'=>'twenty18','type'=>'corporate','new'=>true),
	'demo20'		=> array('siteurl'=>'demo20','type'=>'Onepage','new'=>true),
	'demo67'		=> array('siteurl'=>'demo67','type'=>'Modern Corp','new'=>true),
	'demo68'		=> array('siteurl'=>'demo68','type'=>'corporate','new'=>true),	
	'demo69'		=> array('siteurl'=>'demo69','type'=>'App','new'=>true),
	'demo70'		=> array('siteurl'=>'demo70','type'=>'Medical','new'=>true),
	
	'demo91'		=> array('siteurl'=>'apress/twenty19/2019-home','type'=>'Agency','new'=>true),
	'demo92'		=> array('siteurl'=>'apress/twenty19/home-2','type'=>'SAAS','new'=>true),
	'demo93'		=> array('siteurl'=>'apress/twenty19/corporate','type'=>'corporate','new'=>true),
	'demo94'		=> array('siteurl'=>'apress/twenty19/creative-agency','type'=>'Agency','new'=>true),
	'demo95'		=> array('siteurl'=>'apress/twenty19/landing-page','type'=>'Landing Page','new'=>true),
	'demo96'		=> array('siteurl'=>'apress/twenty19/landing-page-2','type'=>'Landing Page','new'=>true),
	'demo97'		=> array('siteurl'=>'apress/twenty19/agency','type'=>'Agency','new'=>true),
	
	'demo79'		=> array('siteurl'=>'apress/demo79','type'=>'Agency1','new'=>true),
	'demo80'		=> array('siteurl'=>'apress/demo79/agency-2/','type'=>'Agency2','new'=>true),
	'demo81'		=> array('siteurl'=>'apress/demo79/architect/','type'=>'architect','new'=>true),
	'demo82'		=> array('siteurl'=>'apress/demo79/beauty/','type'=>'beauty','new'=>true),
	'demo83'		=> array('siteurl'=>'apress/demo79/charity/','type'=>'charity','new'=>true),
	'demo84'		=> array('siteurl'=>'apress/demo79/creative/','type'=>'creative','new'=>true),
	'demo85'		=> array('siteurl'=>'apress/demo79/gym/','type'=>'gym','new'=>true),
	'demo86'		=> array('siteurl'=>'apress/demo79/seo/','type'=>'seo','new'=>true),
	'demo87'		=> array('siteurl'=>'apress/demo79/spa/','type'=>'spa','new'=>true),
	'demo88'		=> array('siteurl'=>'apress/demo79/yoga/','type'=>'yoga','new'=>true),
	'demo89'		=> array('siteurl'=>'apress/demo80','type'=>'woocommerce','new'=>true),
	'demo90'		=> array('siteurl'=>'apress/demo80/home-2','type'=>'woocommerce','new'=>true),
	
	'demo75'		=> array('siteurl'=>'demo75','type'=>'creative','new'=>true),
	'demo76'		=> array('siteurl'=>'demo76','type'=>'creative','new'=>true),
	'demo77'		=> array('siteurl'=>'demo77','type'=>'creative','new'=>true),
	'demo78'		=> array('siteurl'=>'demo78','type'=>'creative','new'=>true),
	'demo2'			=> array('siteurl'=>'demo2','type'=>'cpa'),
	'demo3'			=> array('siteurl'=>'demo3','type'=>'creative'),
	'demo4'			=> array('siteurl'=>'demo4','type'=>'onepage'),
	'demo5'			=> array('siteurl'=>'demo5','type'=>'financial'),
	'demo6'			=> array('siteurl'=>'demo6','type'=>'lawyer'),
	'demo7'			=> array('siteurl'=>'demo7','type'=>'tax'),
	'demo8'			=> array('siteurl'=>'demo8','type'=>'onepage'),
	'demo9'			=> array('siteurl'=>'demo9','type'=>'insurance'),
	'demo10'		=> array('siteurl'=>'demo10','type'=>'barber'),
	'demo11'		=> array('siteurl'=>'demo11','type'=>'industry'),
	'demo12'		=> array('siteurl'=>'demo12','type'=>'architect'),
	'demo13'		=> array('siteurl'=>'demo13','type'=>'onepage health'),
	'demo14'		=> array('siteurl'=>'demo14','type'=>'seo'),
	'demo15'		=> array('siteurl'=>'demo15','type'=>'app'),
	'demo16'		=> array('siteurl'=>'demo16','type'=>'onepage'),
	'demo17'		=> array('siteurl'=>'demo17','type'=>'wocommerce'),
	'demo18'		=> array('siteurl'=>'demo18','type'=>'cafe'),
	'demo19'		=> array('siteurl'=>'demo19','type'=>'doctor'),
	'demo21'		=> array('siteurl'=>'demo21','type'=>'portfolio'),
	'demo22'		=> array('siteurl'=>'demo22','type'=>'blog'),
	'demo23'		=> array('siteurl'=>'demo23','type'=>'onepage'),
	'demo24'		=> array('siteurl'=>'demo24','type'=>'onepage'),
	'demo25'		=> array('siteurl'=>'demo25','type'=>'portfolio'),
	'demo26'		=> array('siteurl'=>'demo26','type'=>'blog'),
	'demo27'		=> array('siteurl'=>'demo27','type'=>'blog'),
	'demo28'		=> array('siteurl'=>'demo28','type'=>'blog'),
	'demo29'		=> array('siteurl'=>'demo29','type'=>'portfolio'),
	'demo30'		=> array('siteurl'=>'demo30','type'=>'blog'),
	'demo31'		=> array('siteurl'=>'demo31','type'=>'wocommerce'),
	'demo32'		=> array('siteurl'=>'demo32','type'=>'blog'),
	'demo33'		=> array('siteurl'=>'demo33','type'=>'blog'),
	'demo34'		=> array('siteurl'=>'demo34','type'=>'portfolio'),
	'demo36'		=> array('siteurl'=>'demo36','type'=>'blog'),
	'demo37'		=> array('siteurl'=>'demo37','type'=>'blog'),
	'demo38'		=> array('siteurl'=>'demo38','type'=>'blog'),
	'demo39'		=> array('siteurl'=>'demo39','type'=>'portfolio'),
	'demo40'		=> array('siteurl'=>'demo40','type'=>'blog'),
	'demo41'		=> array('siteurl'=>'demo41','type'=>'blog'),
	'demo42'		=> array('siteurl'=>'demo42','type'=>'blog'),
	'demo43'		=> array('siteurl'=>'demo43','type'=>'blog'),
	'demo44'		=> array('siteurl'=>'demo44','type'=>'blog'),
	'demo45'		=> array('siteurl'=>'demo45','type'=>'classic'),
	'demo46'		=> array('siteurl'=>'demo46','type'=>'portfolio'),
	'demo47'		=> array('siteurl'=>'demo47','type'=>'blog'),
	'demo48'		=> array('siteurl'=>'demo48','type'=>'blog'),
	'demo49'		=> array('siteurl'=>'demo49','type'=>'onepage'),
	'demo50'		=> array('siteurl'=>'demo50','type'=>'blog'),
	'demo51'		=> array('siteurl'=>'demo51','type'=>'eco'),
	'demo52'		=> array('siteurl'=>'demo52','type'=>'portfolio'),
	'demo53'		=> array('siteurl'=>'demo53','type'=>'construction'),
	'demo54'		=> array('siteurl'=>'demo54','type'=>'blog'),
	'demo56'		=> array('siteurl'=>'demo56','type'=>'onepage'),
	'demo57'		=> array('siteurl'=>'demo57','type'=>'wocommerce'),
	'demo58'		=> array('siteurl'=>'demo58','type'=>'portfolio'),
	'demo59'		=> array('siteurl'=>'demo59','type'=>'portfolio'),
	'demo60'		=> array('siteurl'=>'demo60','type'=>'blog'),
	'demo61'		=> array('siteurl'=>'demo61','type'=>'minimal'),
	'demo62'		=> array('siteurl'=>'demo62','type'=>'blog'),
	'demo63'		=> array('siteurl'=>'demo63','type'=>'onepage'),
	'demo64'		=> array('siteurl'=>'demo64','type'=>'portfolio'),
	'demo65'		=> array('siteurl'=>'demo65','type'=>'onepage'),
	'demo66'		=> array('siteurl'=>'demo66','type'=>'blog'),
);
?>
<div class="wrap about-wrap apress-wrap">
	<h1><?php echo __( "Welcome to Apress!", "apcore" ); ?></h1>

	<div class="updated error importer-notice importer-notice-1" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server. There are two possible solutions.", 'apcore' ); ?></strong></p>

		<p><strong><?php _e( 'Solution 1:', 'apcore' ); ?></strong> <?php _e( 'Import the demo using an alternate method.', 'apcore' ); ?><a href="http://apressthemes.com/documentation/alternate-demo-method/" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'Alternate Method', 'apcore' ); ?></a></p>
		<p><strong><?php _e( 'Solution 2:', 'apcore' ); ?></strong> <?php echo sprintf( __( 'Fix the PHP configurations, then use the %s, then reimport.', 'apcore' ), '<a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=wordpress-reset&amp;TB_iframe=true&amp;width=830&amp;height=472' . '">Reset WordPress Plugin</a>' ); ?><a href="<?php echo admin_url( 'admin.php?page=apress-system-status' ); ?>" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'System Status', 'apcore' ); ?></a></p>
	</div>

	<div class="updated importer-notice importer-notice-2" style="display: none;"><p><strong><?php echo __( "Demo data successfully imported. Now, please install and run", "apcore" ); ?> <a href="<?php echo admin_url();?>plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472" class="thickbox" title="<?php echo __( "Regenerate Thumbnails", "apcore" ); ?>"><?php echo __( "Regenerate Thumbnails", "apcore" ); ?></a> <?php echo __( "plugin once", "apcore" ); ?>.</strong></p></div>

	<div class="updated error importer-notice importer-notice-3" style="display: none;">
		<p><strong><?php echo __( "We're sorry but the demo data could not be imported. It is most likely due to low PHP configurations on your server. There are two possible solutions.", 'apcore' ); ?></strong></p>

		<p><strong><?php _e( 'Solution 1:', 'apcore' ); ?></strong> <?php _e( 'Import the demo using an alternate method.', 'apcore' ); ?><a href="http://apressthemes.com/documentation/alternate-demo-method/" class="button-primary" target="_blank" style="margin-left: 10px;"><?php _e( 'Alternate Method', 'apcore' ); ?></a></p>
		<p><strong><?php _e( 'Solution 2:', 'apcore' ); ?></strong> <?php echo sprintf( __( 'Fix the PHP configurations, then use the %s, then reimport.', 'apcore' ), '<a href="' . admin_url() . 'plugin-install.php?tab=plugin-information&amp;plugin=wordpress-reset&amp;TB_iframe=true&amp;width=830&amp;height=472' . '">Reset WordPress Plugin</a>' ); ?></p>
	</div>

	<div class="about-text"><?php echo __( "Thank you for purchasing Apress Theme. Design any layout and customize everything without any coding.", "apcore" ); ?></div>
	<div class="apress-logo"><div class="theme_name"><img src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/apress_logo1.jpg'; ?>" alt="apcore"/></div><span class="apress-version"><?php echo __( "Version", "apcore" ); ?> <?php echo esc_html($apress_version); ?></span></div>
	<h2 class="nav-tab-wrapper">
		<?php
		printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=apcore' ), __( "What's New", "apcore" ) );
		printf( '<a href="#" class="nav-tab nav-tab-active">%s</a>', __( "Install Demos", "apcore" ) );
		?>
	</h2>
    <?php
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	// check for plugin using plugin name
	if ( is_plugin_active( 'apress-importer/apress-importer.php' ) ) {
		?>
        <div class="apress-important-notice">
		<p class="about-description"><span><?php echo __( "WARNING! This will overwrite all existing option values, please keep backup and proceed with caution!", "apcore" ); ?></span><br /><?php echo __( "IMPORTANT: The included plugins need to be installed and activated before you install a demo.<br />Installing a demo provides pages, posts, images, theme options, widgets, sliders and more.", "apcore" ); ?></p>
	</div>
        <?php
	} 
	?>
	 
	<div class="apress-demo-themes">
		<div class="feature-section theme-browser rendered">
			<?php
			// Loop through all demos
			if ( is_plugin_active( 'apress-importer/apress-importer.php' ) ) {
			foreach ( $demos as $demo => $demo_details ) { ?>
				<div class="theme">
					<div class="theme-screenshot">
						<img src="<?php echo APRESS_EXTENSIONS_PLUGIN_URL . 'apress_welcome/images/' . $demo . '.jpg'; ?>" alt="apcore"/>
					</div>
					<h3 class="theme-name" id="<?php echo esc_attr($demo); ?>"><?php echo 'Apress - ' . esc_attr(ucfirst( $demo )); ?></h3>
					<div class="theme-actions">
						<?php printf( '<a class="button button-primary button-install-demo" data-demo-id="%s" href="#">%s</a>', strtolower( $demo ), __( "Install", "apcore" ) ); ?>
						<?php printf( '<a class="button button-primary" target="_blank" href="%1s">%2s</a>', ( $demo != 'classic' ) ? $zolo_url . $demo_details['siteurl'] : $apress_url, __( "Preview", "apcore" ) ); ?>
					</div>
					<div class="demo-import-loader preview-all"></div>
					<div class="demo-import-loader preview-<?php echo strtolower( $demo ); ?>"><span class="loader"></span></div>
					<?php if( isset( $demo_details['type'] )): ?>
					<div class="demo-type"><?php _e( $demo_details['type'], 'apcore' ); ?></div>
					<?php endif; ?>
                    
					<?php if( isset( $demo_details['new'] ) && $demo_details['new'] == true ): ?>
					<div class="plugin-required"><?php _e( 'New', 'apcore' ); ?></div>
					<?php endif; ?>
				</div>
			<?php }
			}else{
				echo '<h1>';
				_e( 'Please activate Apress Importer', 'apcore' );
				echo '</h1>';
				} ?>
		</div>
	</div>
	<div class="apress-thanks">
		<p class="description"><?php echo __( "Thank you for choosing Apress.", "apcore" ); ?></p>
	</div>
</div>
