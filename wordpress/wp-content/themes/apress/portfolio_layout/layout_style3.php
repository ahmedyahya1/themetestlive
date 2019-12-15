<?php 
include get_template_directory().'/framework/variables/variables-portfolio-layout.php';
//Portfolio Layout Style 3
?>

<div class="portfolio_2_column">
  <div class="portfolio_col_row">
    <?php //Portfolio Images 
     get_template_part( 'portfolio_layout/portfolio_images'); ?>
    <div class="portfolio_details stickysidebar">
      <div class="portfolio_details_box">
        <div class="portfolio_descriptions stickysidebar">
          <?php if($portfolio_title == 'yes'){ the_title( '<h3 class="single_page_title">', '</h3>' );}?>
          <?php if($portfolio_descriptions == 'yes'){
                  if($portfolio_details){
                        $content = $portfolio_details;
                        $content = apply_filters('the_content', $content);
                        echo $content;
                      }
               
                }?>
        </div>
        <div class="portfolio_info stickysidebar">
		<?php 
        // Portfolio Details
        apress_theme_portfolio_details(); 
        ?>
        </div>
      </div>
    </div>
  </div>
  <?php if($show_contentarea_details == 'yes'){
echo '<div class="portfolio_content_area">';
the_content();
echo '</div>';
}?>
</div>
