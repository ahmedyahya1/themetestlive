<?php
/**
 * Template Name: Full Width Template
 */

get_header(); 
global $apress_data;
$blog_comments = isset($apress_data["blog_comments"]) ? $apress_data["blog_comments"] : 'on';
$page_full_screen_rows = get_post_meta($post->ID, 'zt_full_screen_rows', true ); 
$fullpage_scroll_rows_animation = get_post_meta($post->ID, 'zt_fullpage_scroll_rows_animation', true ); 
$fullpage_rows_anchors = (isset($post->ID)) ? get_post_meta($post->ID, 'zt_fullpage_rows_anchors', true) : '';
$fullpage_scroll_dot_navigation = get_post_meta($post->ID, 'zt_fullpage_scroll_dot_navigation', true ); 
?>

<div class="container-main">
  <div class="container-padding">
  <div class="inner-content">
    <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main">
        <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php
			//fullscreen rows
			 if($page_full_screen_rows == 'on') echo '<div id="apress_fullscreen_rows" data-fullpage-animation="'.$fullpage_scroll_rows_animation.'" data-anchors="'.$fullpage_rows_anchors.'" data-dotnavigation="'.$fullpage_scroll_dot_navigation.'">';
			 
			 the_content();
			 
			 wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); 
			 
			 if($page_full_screen_rows == 'on') echo '</div>';
			 ?>
          </div>
          <!-- .entry-content -->
          <!-- .entry-meta --> 
        </article>
        <!-- #post -->
        <?php //Comments Area Start ?>
            <?php if($blog_comments == 'on'): ?>
				  <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }	
          		 ?>
                 <?php endif; ?>
          <?php //Comments Area End ?>
        <?php endwhile; ?>
      </div>
      <!-- #content --> 
    </div>
  </div>
  </div>
</div>
<?php get_footer(); ?>
