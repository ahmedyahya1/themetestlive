<?php get_header(); 
global $apress_data;
$blog_comments = isset($apress_data["blog_comments"]) ? $apress_data["blog_comments"] : 'on';
$sidebar_position_class = apress_theme_page_sidebar_class('show','hide');
$show_hide_featured = get_post_meta($post->ID, 'zt_show_hide_featured', true ); 

$page_full_screen_rows = (get_post_meta($post->ID, 'zt_full_screen_rows', true )) ? get_post_meta($post->ID, 'zt_full_screen_rows', true ) : 'off';

$fullpage_scroll_rows_animation = get_post_meta($post->ID, 'zt_fullpage_scroll_rows_animation', true ); 
$fullpage_rows_anchors = get_post_meta($post->ID, 'zt_fullpage_rows_anchors', true);
$fullpage_scroll_dot_navigation = get_post_meta($post->ID, 'zt_fullpage_scroll_dot_navigation', true ); 

if($page_full_screen_rows == 'on'){
	$sidebar_position_class = 'none';
}else{
	$sidebar_position_class = $sidebar_position_class;
}
?>
<!-- Container Main Start-->
<div class="container-main <?php if(isset($sidebar_position_class)){echo esc_attr($sidebar_position_class);}?>">
  <?php if($page_full_screen_rows == 'off'){ echo '<div class="zolo-container">';}?>
      <div class="container-padding">
        <div class="inner-content">
        
          <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
              <?php /* The loop */ ?>
              <?php while ( have_posts() ) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <?php //Post Thumbnail Start  ?>
                  <?php if($show_hide_featured != 'hide'){ ?>
                    <?php apress_theme_single_layout_thumbnail_video();?>
                  <?php } ?>
                  <?php //Post Thumbnail End  ?>
                
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
          <!-- #primary -->    
        <?php
        //Page sidebar
        if($page_full_screen_rows == 'off'){
            apress_theme_page_sidebar_class('hide','show');
        }
        ?>    
        </div>
      </div>
  <?php if($page_full_screen_rows == 'off'){ echo '</div>';}?>
  
</div>
<?php get_footer(); ?>
