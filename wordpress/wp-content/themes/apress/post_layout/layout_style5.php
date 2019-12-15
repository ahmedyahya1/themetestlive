<?php
include get_template_directory().'/framework/variables/variables-post-layout.php';
// post_title_position
$post_title_position = 'below';
?>
<div class="container-main <?php apress_theme_sidebar_and_class('show','hide','post');?>">  

<div class="post_layout_style5">
<div class="zolo-container">
    <div class="container-padding">
    <div class="inner-content">
    <div class="post_layout_content_area">
    <div class="post_layout_content">
            
      <div id="primary" class="content-area">
		<?php
        if( ! post_password_required($post->ID) ):
			if( ( $featured_images_single == 'on' && $show_hide_featured != 'hide' ) || ( $featured_images_single == 'off' && $show_hide_featured == 'show' ) ):
        	   	apress_theme_single_layout_thumbnail_video();
			endif;
        endif;
        ?>
	<?php //Post Thumbnail End ?>
    <div class="single_post_content_wrapper">
        <div id="content" class="site-content" role="main">
		
          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post();
            ?>
        <?php 
            printf( '<div class="apress_postmeta_author vcard author"><a class="url fn n" href="%1$s" title="%2$s" rel="author"><span class="avatar_image">%4$s</span> %3$s</a></div>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', 'apress' ), get_the_author() ) ),
            get_the_author(),
            get_avatar(get_the_author_meta( 'ID' ), 70)
            ); 
        ?> 
          <div class="social_shareing_box stickysidebar"><div class="share-box"><?php apress_theme_social_sharing(); ?></div></div>
               
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
            <div class="blogpage_content">

            <?php if($post_title_position == 'below'){
               		 apress_theme_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
                }?>
                
                <div class="blog_text_area">
                    <div class="post-content">
                   
                        <div class="entry-content">
						<?php if ($format_quote || $format_audio){ 
                        //zolo_zilla_likes
                        if( function_exists('zolo_zilla_likes') ){ 
                        echo '<span class="zolo_zilla_likes_box"> ';
                            zolo_zilla_likes();
                        echo '</span>';
                        }
                        } ?>
                       	<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'apress' ) ); ?>
                            
                       		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'apress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div>
                        <?php apress_theme_tags();?>
                    <!-- .entry-content -->
                    <!-- .entry-meta --> 
                    </div>
                </div>
            
			<?php //Share Box Start ?>
            <?php if( ( $social_sharing_box == 'on' && $show_hide_sharing != 'no' ) ||  ( $social_sharing_box == 'off' && $show_hide_sharing == 'yes' ) ): ?>
                <div class="share-box">
                <h6><?php echo ($sharing_social_tagline)? $sharing_social_tagline : '';?></h6>
                <?php apress_theme_social_sharing(); ?>
                </div>
            <?php endif; ?>
          <?php //Share Box End ?>
          
          
          <?php
            //Author Area Start
            apress_theme_author_info();
            //Author Area End  
            ?>
            
          <?php  //Related Post Start ?>
          <?php if( ( $related_posts == 'on' && $show_hide_related_posts != 'no' ) ||  ( $related_posts == 'off' && $show_hide_related_posts == 'yes' ) ): ?>
        <?php $related_post = apress_theme_get_related_posts($post->ID);  ?>
        
        <?php if($related_post->have_posts()){ ?>
          <div class="related_post_area">
          	<h3><?php echo __('Related Posts', 'apress'); ?></h3>
            <ul class="related_post_list">
              <?php while($related_post->have_posts()): $related_post->the_post(); ?>
              <li class="fitrow_col">
                <div class="entry-thumbnail"> 
                <?php 
                    //zolo_zilla_likes
                    if( function_exists('zolo_zilla_likes') ){ 
                   		echo '<span class="zolo_zilla_likes_box"> ';
                    		zolo_zilla_likes();
                    	echo '</span>';
                    }
                    ?>
                    
                	<a href="<?php the_permalink(); ?>" class="apress_post_thumb">
                	<?php  if ( has_post_thumbnail() ) { the_post_thumbnail( 'apress_thumb_blog_medium' ); } ?>
                	</a> 
                </div>
                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>   
              </li>
              <?php endwhile;?>
            </ul>
          </div>
          <?php } ?>
          
            <?php endif; ?>
            <?php  //Related Post End ?>
          
          <?php //Comments Area Start ?>
          
          <?php if( ( $blog_comments == 'on' && $show_hide_post_comments != 'no' ) || ( $blog_comments == 'off' && $show_hide_post_comments == 'yes' ) ): ?>
				  <?php
				  	wp_reset_postdata();
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }	
          		 ?>
			<?php endif; ?>
          <?php //Comments Area End ?>
          <?php endwhile; ?>
        </div> 
        </article>
        </div>
        </div>
      </div>
      <!-- #primary -->      
		 <?php apress_theme_sidebar_and_class('hide','show','post');?>
       </div>
       </div>
    </div>
  </div>
  </div>
 </div>
<?php // Previous/next post navigation Start 
if($post_navigation_style == 'style1'){
	echo '<div class="zolo-container">';
}
if( ( $blog_pn_nav == 'on' && $show_hide_post_pagination != 'no' ) ||  ( $blog_pn_nav == 'off'  && $show_hide_post_pagination == 'yes' ) ):
apress_theme_single_page_nav();
endif;
if($post_navigation_style == 'style1'){
echo '</div>';
} 
// Previous/next post navigation End ?>	

</div>