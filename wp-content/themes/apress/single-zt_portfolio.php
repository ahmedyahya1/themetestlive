<?php
get_header(); 
include get_template_directory().'/framework/variables/variables-portfolio-layout.php';	
?>
<div class="container-main <?php apress_theme_sidebar_and_class('show','hide','portfolio');?>">
  <div class="<?php echo esc_attr($portfolio_navigation_style); ?>">
    <div class="zolo-container">
      <div class="container-padding">
      <div class="inner-content">
        <div id="primary" class="content-area">
          <div id="content" class="site-content <?php echo esc_attr($portfolio_layout_parent_class);?>" role="main">
            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php //Portfolio Layout
            if($portfolio_layout_style == 'layout_style1'){
            
	            get_template_part( 'portfolio_layout/'.$portfolio_layout_style); 
			
			}else if($portfolio_layout_style == 'layout_style2'){
            
	            get_template_part( 'portfolio_layout/'.$portfolio_layout_style); 
				
			}else if($portfolio_layout_style == 'layout_style3' || $portfolio_layout_style == 'layout_style4'){
            
	            get_template_part( 'portfolio_layout/layout_style3'); 
				
			}else if($portfolio_layout_style == 'design_your_own'){
            
	            get_template_part( 'portfolio_layout/layout_design_your_own'); 
				
			} ?>
            <?php if($portfolio_author == 'on' ){?>
            <div class="about-author">
              <div class="title">
                <h3 class="with-bor"><?php echo __('About the Author:', 'apress'); ?>
                  <?php the_author_posts_link(); ?>
                </h3>
                <div class="title-sep-container">
                  <div class="title-sep"></div>
                </div>
              </div>
              <div class="about-author-container">
                <div class="avatar"> <?php echo get_avatar(get_the_author_meta('email'), '72'); ?> </div>
                <div class="description">
                  <?php the_author_meta("description"); ?>
                </div>
              </div>
            </div>
            <?php }?>
            <?php //Share Box Start ?>
            <?php if( ( $to_portfolio_social_sharing_box == 'on' && $po_portfolio_social_sharing_box != 'no' ) ||  ( $to_portfolio_social_sharing_box == 'off' && $po_portfolio_social_sharing_box == 'yes' ) ): ?>
            <?php $nofollow = ' rel="nofollow"'; ?>
            <div class="share-box">
              <h6><?php echo esc_attr($sharing_social_tagline); ?></h6>
              <?php apress_theme_social_sharing(); ?>
            </div>
            <?php endif; ?>
            <?php //Share Box End  ?>
            <?php endwhile;?>
          </div>
          <?php  //Related Portfolio Start ?>
          <?php if( ( $to_portfolio_related_posts == 'on' && $po_portfolio_related_posts != 'no' ) ||  ( $to_portfolio_related_posts == 'off' && $po_portfolio_related_posts == 'yes' ) ): ?>
          <?php $related_post = apress_theme_get_related_portfolio($post->ID);  ?>
          <?php if($related_post->have_posts()): ?>
          <div class="related_portfolio_area">
            <h3><?php echo __('Related Portfolio', 'apress'); ?></h3>
            <ul class="related_portfolio_list">
              <?php while($related_post->have_posts()): $related_post->the_post(); ?>
              <li>
                <div class="entry-thumbnail">
                 <?php //zolo_zilla_likes
					if( function_exists('zolo_zilla_likes') ){ 
						echo '<span class="zolo_zilla_likes_box">';
						zolo_zilla_likes();
						echo '</span>';
					}?>
                  <a href="<?php the_permalink(); ?>" class="apress_post_thumb">
                  <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( 'apcore_blog_medium' ); } ?>
                  </a> </div>
                <h4 class="entry-title"><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  </a></h4>
              </li>
              <?php endwhile;wp_reset_postdata();?>
            </ul>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <?php  //Related Portfolio End ?>
        </div>
        <?php apress_theme_sidebar_and_class('hide','show','portfolio');?>
      </div>
    </div>
    </div>
  </div>
  <?php  //Pagination 
if($portfolio_navigation_style == 'style1'){
	echo '<div class="zolo-container">';
}
  if( ( $to_zt_portfolio_nav == 'on' && $po_zt_post_pagination != 'no' ) ||  ( $to_zt_portfolio_nav == 'off' && $po_zt_post_pagination == 'yes' ) ): 
   apress_theme_single_page_nav();
endif;
    
if($portfolio_navigation_style == 'style1'){
echo '</div>';
} 
 ?>
</div>
<?php get_footer(); ?>
