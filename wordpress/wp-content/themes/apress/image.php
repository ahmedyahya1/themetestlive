<?php
/**
 * The template for displaying image attachments
 */

get_header(); ?>
<div class="container-main">

<div class="zolo-container">
<div class="container-padding">
  <div class="inner-content">

        <div id="primary" class="content-area">
          <div id="content" class="site-content" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
              <header class="entry-header">
                <div class="entry-meta">
                  <?php
							$published_text = __( '<span class="attachment-meta">Published on %1$s in <a href="%2$s" title="Return to %3$s" rel="gallery">%4$s</a></span>', 'apress' );
							$post_title = get_the_title( $post->post_parent );
							if ( empty( $post_title ) || 0 == $post->post_parent )
								$published_text = '<span class="attachment-meta updated">%1$s</span>';

							printf( $published_text,
								esc_html( get_the_date() ),
								esc_url( get_permalink( $post->post_parent ) ),
								esc_attr( strip_tags( $post_title ) ),
								$post_title
							);

							$metadata = wp_get_attachment_metadata();
							printf( '<span class="attachment-meta full-size-link"><a href="%1$s" title="%2$s">%3$s (%4$s &times; %5$s)</a></span>',
								esc_url( wp_get_attachment_url() ),
								esc_attr__( 'Link to full-size image', 'apress' ),
								__( 'Full resolution', 'apress' ),
								$metadata['width'],
								$metadata['height']
							);

						?>
                </div>
                <!-- .entry-meta --> 
              </header>
              <!-- .entry-header -->
              
              <div class="entry-content">
                <nav id="image-navigation" class="navigation image-navigation"> <span class="nav-previous">
                  <?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'apress' ) ); ?>
                  </span> <span class="nav-next">
                  <?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'apress' ) ); ?>
                  </span> </nav>
                <!-- #image-navigation -->
                
                <div class="entry-attachment">
                  <div class="attachment">
                    <?php apress_theme_the_attached_image(); ?>
                    <?php if ( has_excerpt() ) : ?>
                    <div class="entry-caption">
                      <?php the_excerpt(); ?>
                    </div>
                    <?php endif; ?>
                  </div>
                  <!-- .attachment --> 
                </div>
                <!-- .entry-attachment -->
                
                <?php if ( ! empty( $post->post_content ) ) : ?>
                <div class="entry-description">
                  <?php the_content(); ?>
                  <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'apress' ), 'after' => '</div>' ) ); ?>
                </div>
                <!-- .entry-description -->
                <?php endif; ?>
              </div>
              <!-- .entry-content --> 
            </article>
            <!-- #post -->
            
            <?php comments_template(); ?>
          </div>
          <!-- #content --> 
        </div>
        <!-- #primary --> 
  </div>
</div>
</div>
</div>
<?php get_footer(); ?>
