<?php
get_header(); 
include get_template_directory().'/framework/variables/variables-portfolio-archive.php';

$sidebar_position_class = apress_theme_archive_sidebar_class('show','hide');
?>
<!-- Container Main Start-->

<div class="container-main portfolio_layout <?php echo esc_attr($sidebar_position_class).' '.esc_attr($portfolio_layout_column_class);?>">
  <div class="zolo-container">
    <div class="container-padding">
      <div class="inner-content">
        <div id="primary" class="content-area">
          <?php if(category_description()): ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="post-content post_category_des"> <?php echo category_description(); ?> </div>
          </div>
          <?php endif; ?>
          <div id="content" class="site-content <?php if(isset($portfolio_layout_class)){echo esc_attr($portfolio_layout_class);} ?>" role="main">
            <?php if ( have_posts() ) : ?>
            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( $masonry_item ); ?>>
              <div class="portfoliopage_content">
                <?php //featured_images End?>
                <div class="portfolio_featured_area">
				<?php  
                apress_theme_catportfolio_thumbnail_video();
                ?>
                </div>
                <?php //featured_images End ?>
                <div class="portfolio_detail">
                  <div class="portfolio-content">
                    <h2 class="portfolio_title entry-title"> <a href="<?php the_permalink(); ?>">
                      <?php the_title(); ?>
                      </a> </h2>
                    <span class="portfolio_categories">
                    <?php if(get_the_term_list($post->ID, 'catportfolio', '', '<br />', '')){ ?>
                    <?php echo get_the_term_list($post->ID, 'catportfolio', '', ', ', ''); ?>
                    <?php } ?>
                    </span> </div>
                </div>
              </div>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <!-- #content --> 
        </div>
        <?php 
	 	apress_theme_archive_sidebar_class('hide','show');	  
	  ?>
        <!-- .widget-area --> 
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
