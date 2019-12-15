<?php 
global $apress_data; 
$columns = $apress_data['footer_lower_columns'];
?>

<div class="zolo_footer_row">
  <?php 
// Render as many widget columns as have been chosen in Theme Options
for ( $i = 1; $i < 5; $i++ ) {
    if ( $apress_data['footer_lower_columns'] >= $i ) {
		echo sprintf( '<div class="footercolumn footer_column%s">', $apress_data['footer_lower_columns'] );
            if ( function_exists( 'dynamic_sidebar' ) &&
                 dynamic_sidebar( 'lower_footer_widget_' . $i )
            ) {
            }
        echo '</div>';
    }
}
?>
</div>
