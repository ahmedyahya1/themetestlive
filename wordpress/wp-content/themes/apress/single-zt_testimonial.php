<?php
get_header(); 
include get_template_directory().'/framework/variables/variables-post-layout.php';
?>

<div class="container-main <?php apress_theme_sidebar_and_class('show','hide','testimonial');?>">
  <div class="zolo-container">
    <div class="container-padding">
      <div class="inner-content post_layout_style1">
        <div id="primary" class="content-area testimonial_single_page <?php echo esc_attr($testimonial_singlepage_style);?>">
          <div id="content" class="site-content" role="main">
            <?php /* The loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
              <div class="blogpage_content">
                <div class="zolo_testimonial_header">
                  <?php //Post Thumbnail Start 
			if ( has_post_thumbnail() ) {
		        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); 
            ?>
                  <div class="zolo_testimonial_author"><img src="<?php echo esc_url($attachment_image[0]);?>" /></div>
                  <?php } 
			//Post Thumbnail End ?>
                  <div class="testimonial_title_area">
                    <?php the_title( sprintf( '<h2 class="testimonial-entry-title">', esc_url( get_permalink() ) ), '</h2>' );?>
                    <?php $testimonial_designation = get_post_meta( get_the_ID(), 'zt_testimonial_designation', true ); 
            if($testimonial_designation){ echo '<span class="zolo_testimonial_designation">'.$testimonial_designation.'</span>';}
			?>
            <?php $rating_option = get_post_meta( get_the_ID(), 'zt_rating_option', true ); 
			if($rating_option != '0%'){
				echo '<div class="testimonial_star_wrap"><div class="testimonial_star">
				<div class="star_rating"><span class="filled" style="width:'.$rating_option.'"></span></div>
				</div></div>';
				} ?>
                  </div>
                </div>
                <div class="blog_text_area">
                  <div class="post-content">
                    <div class="entry-content">
                      <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'apress' ) ); ?>
                      <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                    </div>
                    <!-- .entry-content --> 
                  </div>
                </div>
              </div>
            </article>
            <?php //Share Box Start ?>
            <?php if( ( $testimonial_social_sharing_box == 'on' && $show_hide_sharing != 'no' ) ||  ( $testimonial_social_sharing_box == 'off' && $show_hide_sharing == 'yes' ) ): ?>
            <div class="share-box">
              <h6><?php echo esc_attr($sharing_social_tagline); ?></h6>
              <?php apress_theme_social_sharing(); ?>
            </div>
            <?php endif; ?>
            <?php //Share Box End ?>
            <?php endwhile; ?>
          </div>
          <!-- #content --> 
        </div>
        <!-- #primary -->
        <?php apress_theme_sidebar_and_class('hide','show','testimonial');?>
      </div>
    </div>
  </div>
  <?php 
if($testimonial_pagination == true){
	echo '<nav class="navigation post-navigation testimonial_navigation navigation_style2">';
	$previous_post = get_previous_post();
	$next_post = get_next_post();
	
	if(empty($next_post) && $previous_post){
		$only_class = 'previous_only';
	}else if($next_post && empty($previous_post)){
		$only_class = 'next_only';
	}else{
		$only_class = '';
	}
	
	if($apress_data['testimonial_navigation_button_link_source'] == 'page'){
		$testimonial_navigation_button_link = get_page_link($apress_data['testimonial_navigation_page_select']);
	}else if($apress_data['testimonial_navigation_button_link_source'] == 'url'){
		$testimonial_navigation_button_link = $apress_data['testimonial_navigation_page_url'];
	}else{
		$testimonial_navigation_button_link = '#';
	}
	
	echo '<div class="nav-links '.$only_class.'">';
	previous_post_link( '%link', _x('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'Previous post link', 'apress' ) );
	
	echo '<a href="'.$testimonial_navigation_button_link.'"><i class="fa fa-th"></i></a>';
	
	next_post_link( '%link', _x('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'Next post link', 'apress' ) );
	echo '</div></nav>';
}
?>
</div>
<?php get_footer(); ?>
