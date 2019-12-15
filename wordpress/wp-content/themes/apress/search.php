<?php
get_header(); 
global $apress_data; 
$sidebar_position_class = apress_theme_search_sidebar_class('show','hide');
?>

<div class="container-main <?php if($sidebar_position_class){echo esc_attr($sidebar_position_class);}?>">
  
  <div class="zolo-container">
  <div class="container-padding">
    <div class="inner-content">
      <div id="primary" class="content-area">
      <p><?php echo __("If you didn't find what you were looking for, try again!", "apress" ); ?></p>
      <?php get_search_form(); ?>
      
        <div id="content" class="site-content" role="main">
          <?php if ( have_posts() ) : ?>
          <?php /* The loop */ ?>
          <ul class="searchpage_list">
		  <?php while ( have_posts() ) : the_post(); ?>
          <li>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="blogpage_content"> 
              
              <h3 class="entry-title with-bor"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php esc_attr(the_title()); ?></a></h3>
              <div class="post-bottom-info">
              <?php _e('On :','apress');?>  <span class="updated"><?php echo get_the_date(); ?></span> , <?php _e('By :','apress');?> <span class="vcard author post-author"><span class="fn"><?php the_author(); ?></span></span>
              </div>
              
            </div>
          </article>
          </li>
          <?php endwhile; ?>
          </ul>
          <?php //apress_theme_paging_nav(); ?>
          <?php apress_theme_pagination(); ?>
          <?php endif; ?>
        </div>
        <!-- #content --> 
      </div>
      <!-- #primary -->
      
      <?php
		apress_theme_search_sidebar_class('hide','show');
	  ?>
    </div>
  </div>
  </div>
</div>
<?php get_footer(); ?>
