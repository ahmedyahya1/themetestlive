<?php get_header(); ?>
<!-- Container Main Start-->
<?php 
	$bbpress_sidebar_position = isset($apress_data["bbpress_archive_sidebar_position"]) ? $apress_data["bbpress_archive_sidebar_position"] : '';
	$bbpress_left_sidebar = isset($apress_data["bbpress_archive_left_sidebar"]) ? $apress_data["bbpress_archive_left_sidebar"] : '';
	$bbpress_right_sidebar = isset($apress_data["bbpress_archive_right_sidebar"]) ? $apress_data["bbpress_archive_right_sidebar"] : '';
	
	//Sidebar Show/Hide Condition Class
    
    if($bbpress_sidebar_position == 'left'){
    	$sidebar_position_class = 'hassidebar left';
    
    }elseif($bbpress_sidebar_position == 'right'){
    	$sidebar_position_class = 'hassidebar right';
    
    }elseif($bbpress_sidebar_position == 'both'){
    	$sidebar_position_class = 'hassidebar double_sidebars';
    
    }elseif($bbpress_sidebar_position == 'none'){
    	$sidebar_position_class = 'nosidebars';
    }    
    ?>

<div class="container-main <?php if(isset($sidebar_position_class)){echo esc_attr($sidebar_position_class);}?>">
  
    <div class="zolo-container">
    <div class="container-padding">
      <div class="inner-content">
        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">
            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
              </div>
              <!-- .entry-content -->
            </article>
            <?php endwhile; ?>
          </div>
          <!-- #content --> 
        </div>
        <!-- #primary -->
        
        <?php
		if($bbpress_sidebar_position!='none'){
			if($bbpress_sidebar_position == 'left' || $bbpress_sidebar_position == 'both'){
			?>
        <div class="sidebar sidebar_container_1 left" role="complementary">
          <div class="widget-area">
            <?php 
			generated_dynamic_sidebar($bbpress_left_sidebar ); 
			?>
          </div>
        </div>
        <?php }
			if($bbpress_sidebar_position == 'right' || $bbpress_sidebar_position == 'both'){?>
        <div class="sidebar sidebar_container_2 right" role="complementary">
          <div class="widget-area">
            <?php
			generated_dynamic_sidebar($bbpress_right_sidebar ); 
			
			?>
          </div>
          <!-- .widget-area --> 
        </div>
        <?php
			}
		}
	   ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
