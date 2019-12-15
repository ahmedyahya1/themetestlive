<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>
<div class="container-main">
  <div class="zolo-container">
  <div class="container-padding">
    <div class="inner-content">
          <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main"> 
              <div class="page-wrapper">
                <h1 class="title404"><?php _e( '404', 'apress' ); ?></h1>
                <div class="page-content">
                  <h2>
                    <?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'apress' ); ?>
                  </h2>
                  <p>
                    <?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'apress' ); ?>
                  </p>
                  <?php get_search_form(); ?>
                </div>
                <!-- .page-content --> 
              </div>
              <!-- .page-wrapper --> 
              
            </div>
            <!-- #content --> 
          </div>
    </div>
  </div>
</div>
</div>
<?php get_footer(); ?>