<?php
get_header(); 
include get_template_directory().'/framework/variables/variables-post-layout.php';
?>
<div class="container-main <?php apress_theme_sidebar_and_class('show','hide','team');?>">  
<div class="zolo-container">
<div class="container-padding">
    <div class="inner-content post_layout_style1">
      <div id="primary" class="content-area team_single_page <?php echo esc_attr($team_singlepage_style);?>">
        <div id="content" class="site-content" role="main">
          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>               
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
            <div class="blogpage_content">
            
            <?php //Post Thumbnail Start 
			if($team_singlepage_style == 'team_layout_style_1'){
			if ( has_post_thumbnail() ) {
		        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
            ?>
            <div class="posttype_gallery_slider"><img src="<?php echo esc_url($attachment_image[0]);?>" /></div>
            <?php } }
			//Post Thumbnail End ?>  
              <div class="blog_text_area">
                    <div class="post-content">
                   <?php if($team_singlepage_style == 'team_layout_style_1'){
					   the_title( sprintf( '<h2 class="team-entry-title">', esc_url( get_permalink() ) ), '</h2>' );?>
                   <?php $team_designation = get_post_meta( get_the_ID(), 'zt_team_designation', true ); 
						if($team_designation){ echo '<span class="zolo_team_designation">'.$team_designation.'</span>';}
					?>
                <div class="team_social_icon">
                
					<?php 
					$team_facebook = get_post_meta( get_the_ID(), 'zt_team_facebook', true );
                    $team_twitter = get_post_meta( get_the_ID(), 'zt_team_twitter', true );
                    $team_linkedin = get_post_meta( get_the_ID(), 'zt_team_linkedin', true );
                    $team_pinterest = get_post_meta( get_the_ID(), 'zt_team_pinterest', true );
					
					$team_github = get_post_meta( get_the_ID(), 'zt_team_github', true );
					$team_insta = get_post_meta( get_the_ID(), 'zt_team_insta', true );
					$team_dribble = get_post_meta( get_the_ID(), 'zt_team_dribble', true );
					$team_behance = get_post_meta( get_the_ID(), 'zt_team_behance', true );
					$team_500px = get_post_meta( get_the_ID(), 'zt_team_500px', true );
					$team_deviantart = get_post_meta( get_the_ID(), 'zt_team_deviantart', true );
					$team_xing = get_post_meta( get_the_ID(), 'zt_team_xing', true );
					$team_email = get_post_meta( get_the_ID(), 'zt_team_email', true );					
                    ?>
                    
                    <ul>
                    
                    <?php if($team_facebook){ ?>
                    <li><a href="<?php echo esc_url($team_facebook);?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_twitter){ ?>
                    <li><a href="<?php echo esc_url($team_twitter);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_linkedin){ ?>
                    <li><a href="<?php echo esc_url($team_linkedin);?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_pinterest){ ?>
                    <li><a href="<?php echo esc_url($team_pinterest);?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_github){ ?>
                    <li><a href="<?php echo esc_url($team_github);?>" target="_blank"><i class="fa fa-github"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_insta){ ?>
                    <li><a href="<?php echo esc_url($team_insta);?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_dribble){ ?>
                    <li><a href="<?php echo esc_url($team_dribble);?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_behance){ ?>
                    <li><a href="<?php echo esc_url($team_behance);?>" target="_blank"><i class="fa fa-behance"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_500px){ ?>
                    <li><a href="<?php echo esc_url($team_500px);?>" target="_blank"><i class="fa fa-500px"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_deviantart){ ?>
                    <li><a href="<?php echo esc_url($team_deviantart);?>" target="_blank"><i class="fa fa-deviantart"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_xing){ ?>
                    <li><a href="<?php echo esc_url($team_xing);?>" target="_blank"><i class="fa fa-xing"></i></a></li>
                    <?php } ?>
                    
                    <?php if($team_email){ ?>
                    <li><a href="mailto:<?php echo esc_attr($team_email);?>"><i class="fa fa-envelope-o"></i></a></li>
                    <?php } ?>
                                        
                    </ul>
                    
                </div>
                <?php } ?>
                        <div class="entry-content">
                       		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'apress' ) ); ?>
                            
                       		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div>
                    <!-- .entry-content -->
						<?php 
                        edit_post_link( __( 'Edit', 'apress' ), '<span class="edit-link">', '</span>' );
                        ?>
                    <!-- .entry-meta --> 
                    </div>
                </div>
                
                </div>
          </article>
          
			<?php //Share Box Start ?>
            <?php if( ( $team_social_sharing_box == 'on' && $show_hide_sharing != 'no' ) ||  ( $team_social_sharing_box == 'off' && $show_hide_sharing == 'yes' ) ): ?>
            <div class="share-box">
            <h6><?php echo esc_attr($sharing_social_tagline); ?></h6>
            <?php apress_theme_social_sharing(); ?>
          </div>
            <?php endif; ?>
          <?php //Share Box End ?>
          
        <?php  //Related Post Start ?>
       

        <?php if( ( $team_related_posts == 'on' && $related_posts != 'no' ) ||  ( $team_related_posts == 'off' && $related_posts == 'yes' ) ){
		
        $related_post = apress_theme_get_related_team($post->ID);
		 if($related_post->have_posts()){ ?>
          <div class="related_post_area">
          	<h3><?php echo esc_html__('Related Team', 'apress'); ?></h3>
            <ul class="related_post_list">
              <?php while($related_post->have_posts()): $related_post->the_post(); ?>
              <li class="fitrow_col">
                <div class="entry-thumbnail">
                	<a href="<?php the_permalink(); ?>">
                	<?php  if ( has_post_thumbnail() ) { the_post_thumbnail( 'apress_thumb_blog_medium' ); } ?>
                	</a> 
                </div>
                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>   
              </li>
              <?php endwhile;?>
            </ul>
          </div>
          <?php }} ?>
          
		  <?php  //Related Post End ?>

          <?php endwhile; ?>
        </div>
        <!-- #content --> 
      </div>
      <!-- #primary -->      
		 <?php apress_theme_sidebar_and_class('hide','show','team');?>
    </div>
  </div>
  </div>

<?php 
if($team_pagination == true){
	echo '<nav class="navigation post-navigation team_navigation navigation_style2">';
	$previous_post = get_previous_post();
	$next_post = get_next_post();
	
	if(empty($next_post) && $previous_post){
		$only_class = 'previous_only';
	}else if($next_post && empty($previous_post)){
		$only_class = 'next_only';
	}else{
		$only_class = '';
	}
	
	if($apress_data['team_navigation_button_link_source'] == 'page'){
		$team_navigation_button_link = get_page_link($apress_data['team_navigation_page_select']);
	}else if($apress_data['team_navigation_button_link_source'] == 'url'){
		$team_navigation_button_link = $apress_data['team_navigation_page_url'];
	}else{
		$team_navigation_button_link = '#';
	}
	
	echo '<div class="nav-links '.$only_class.'">';
	previous_post_link( '%link', _x('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'Previous post link', 'apress' ) );
	
	echo '<a href="'.$team_navigation_button_link.'"><i class="fa fa-th"></i></a>';
	
	next_post_link( '%link', _x('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'Next post link', 'apress' ) );
	echo '</div></nav>';
}
?>

</div>

<?php get_footer(); ?>
