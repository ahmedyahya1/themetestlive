<?php
//Portfolio Section Start
add_action('init', 'apress_portfolio_init', 0);  
function apress_portfolio_init(){
	global $apress_data;	
	$labels = array(
		'name'					=> isset($apress_data['portfolio_url_slug']) ? $apress_data['portfolio_url_slug'] : esc_html__( 'Portfolios' , 'apcore' ),
		'singular_name'			=> esc_html__( 'Portfolio' , 'apcore' ),
		'add_new'				=> esc_html__( 'Add New' , 'apcore' ),
		'add_new_item'			=> esc_html__( 'Add New Portfolio' , 'apcore'),
		'edit_item'				=> esc_html__( 'Edit Portfolio' , 'apcore' ),
		'new_item'				=> esc_html__( 'New Portfolio' , 'apcore' ),
		'view_item'				=> esc_html__( 'View Portfolio' , 'apcore' ),
		'search_items'			=> esc_html__( 'Search Portfolios' , 'apcore' ),
		'not_found'				=> esc_html__( 'No portfolios found' , 'apcore' ),
		'not_found_in_trash'	=> esc_html__( 'No portfolios found in Trash' , 'apcore' ),
		'parent_item_colon'		=> '',
		'menu_name'				=> esc_html__( 'Portfolio' , 'apcore' )
	
	);	
	$args = array(
		'labels'        => $labels,
        'description'   => esc_html('Holds our portfolios and portfolio specific data','apcore'),
        'public'        => true,
        'supports'      => array( 'title','editor','author','thumbnail' ),
        'has_archive'   => true,
        'menu_icon'		=> '',
		'menu_position' => 5,
	);
	
	if(isset($apress_data['portfolio_url_slug']) && !empty($apress_data['portfolio_url_slug'])) {
		$args['rewrite'] = array('slug' => $apress_data['portfolio_url_slug']);
	}
	
	register_post_type('zt_portfolio',$args);
}

add_action( 'init', 'apress_taxonomies_portfolio', 0 );
// Initialize New Taxonomy Labels
function apress_taxonomies_portfolio(){
	global $apress_data;
		
	$labels = array(
		'name'				=> _x( 'Category', 'Category general name', 'apcore' ),
		'singular_name'		=> _x( 'Category', 'taxonomy singular name', 'apcore' ),
		'search_items'		=> __( 'Search Category', 'apcore' ),
		'all_items'			=> __( 'All Categories', 'apcore' ),
		'parent_item'		=> __( 'Parent Category', 'apcore' ),
		'parent_item_colon'	=> __( 'Parent Category:', 'apcore' ),
		'edit_item'			=> __( 'Edit Category', 'apcore' ),
		'update_item'		=> __( 'Update Category', 'apcore' ),
		'add_new_item'		=> __( 'Add New Category', 'apcore' ),
		'new_item_name'		=> __( 'New Category Name', 'apcore' ),
	);

    // Custom taxonomy for Portfolio Tags	  
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,	
	);
	
	if(isset($apress_data['portfolio_url_slug']) && !empty($apress_data['portfolio_url_slug'])) {
		$args['rewrite'] = array('slug' => $apress_data['portfolio_url_slug'].'-category');
	}
	register_taxonomy( 'catportfolio', 'zt_portfolio', $args );	  
}

add_filter("manage_edit-zt_portfolio_columns", "portfolio_edit_columns");
function portfolio_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type='checkbox' />",
                    "title" => __("Portfolio", 'apcore'),
                    "photo" => __("Image", 'apcore'),
                    "catportfolio" => __("Categories", 'apcore'),
                    "date" => __("Date", 'apcore')
                   );

   return $columns;
}

add_action("manage_zt_portfolio_posts_custom_column",  "portfolio_custom_columns");

function portfolio_custom_columns($column){
  global $post;
  switch ($column){
	 case "photo":
		 if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
	 break;
	 case "catportfolio":
		 echo get_the_term_list($post->ID, 'catportfolio', '', ', ','');
	 break;
   }
}

/*--- Custom Messages - portfolio_updated_messages ---*/
add_filter('post_updated_messages', 'portfolio_updated_messages');

function portfolio_updated_messages( $messages ) {
	global $post, $post_ID;
	
	$messages['zt_portfolio'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( ('Portfolio updated. <a href="%s">View portfolio</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => ('Custom field updated.'),
		3 => ('Custom field deleted.'),
		4 => ('Portfolio updated.'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( ('Portfolio restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( ('Portfolio published. <a href="%s">View portfolio</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => ('Portfolio saved.'),
		8 => sprintf( ('Portfolio submitted. <a target="_blank" href="%s">Preview portfolio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( ('Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview portfolio</a>'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( ( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( ('Portfolio draft updated. <a target="_blank" href="%s">Preview portfolio</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	return $messages;
}

/*--- #end SECTION - portfolio_updated_messages ---*/



//Testimonial Section Start
add_action('init', 'apress_testimonial_init', 0);  

function apress_testimonial_init(){
	global $apress_data;
	
	$labels = array(
		'name'					=> __( 'Testimonials', 'apcore' ),
		'singular_name'			=> __( 'Testimonial', 'apcore' ),
		'add_new'				=> __( 'Add New', 'apcore' ),
		'add_new_item'			=> __( 'Add New Testimonial', 'apcore' ),
		'edit_item'				=> __( 'Edit Testimonial', 'apcore' ),
		'new_item'				=> __( 'New Testimonial', 'apcore' ),
		'view_item'				=> __( 'View Testimonial', 'apcore' ),
		'search_items'			=> __( 'Search Testimonials', 'apcore' ),
		'not_found'				=> __( 'No testimonials found', 'apcore' ),
		'not_found_in_trash'	=> __( 'No testimonials found in Trash', 'apcore' ),
		'parent_item_colon'		=> '',
		'menu_name'				=> __( 'Testimonials', 'apcore' ),
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable' 	=> true,
		'show_ui'				=> true,
		'query_var'				=> true,
		'menu_icon'				=> '',
		'menu_position'			=> 5,
		'supports'				=> array('title','editor','author','thumbnail')
	);
	
	if(isset($apress_data['testimonial_url_slug']) && !empty($apress_data['testimonial_url_slug'])) {
		$args['rewrite'] = array('slug' => $apress_data['testimonial_url_slug']);
	}
	
	// The following is the main step where we register the post.
	register_post_type('zt_testimonial',$args);

}

add_filter("manage_edit-zt_testimonial_columns", "testimonial_edit_columns");

function testimonial_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type='checkbox' />",
                    "title" => __("Testimonial", 'apcore'),
                    "photo" => __("Image", 'apcore'),
                    "date" => __("Date", 'apcore')
                   );

   return $columns;
}

add_action("manage_zt_testimonial_posts_custom_column",  "testimonial_custom_columns");

function testimonial_custom_columns($column){
  global $post;
  switch ($column){ 
	case "photo":
		if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
		break;
	case "cattestimonial":
		echo get_the_term_list($post->ID, 'cattestimonial', '', ', ','');
		break;
   }
}

/*--- Custom Messages - testimonial_updated_messages ---*/
add_filter('post_updated_messages', 'testimonial_updated_messages');

	function testimonial_updated_messages( $messages ) {
	global $post, $post_ID;
	
	$messages['zt_testimonial'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( ('Testimonial updated. <a href="%s">View testimonial</a>'), esc_url( get_permalink($post_ID) ) ),
	2 => ('Custom field updated.'),
	3 => ('Custom field deleted.'),
	4 => ('Testimonial updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( ('Testimonial restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( ('Testimonial published. <a href="%s">View testimonial</a>'), esc_url( get_permalink($post_ID) ) ),
	7 => ('Testimonial saved.'),
	8 => sprintf( ('Testimonial submitted. <a target="_blank" href="%s">Preview testimonial</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( ('Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview testimonial</a>'),
	// translators: Publish box date format, see http://php.net/date
	date_i18n( ( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( ('Testimonial draft updated. <a target="_blank" href="%s">Preview testimonial</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	return $messages;
}

/*--- #end SECTION - testimonial_updated_messages ---*/

add_action('init', 'apress_team_init', 0);  
//Team Section Start
function apress_team_init(){
	global $apress_data;
	
	$labels = array(
		'name'					=> __( 'Teams', 'apcore' ),
		'singular_name'			=> __( 'Team', 'apcore' ),
		'add_new'				=> __( 'Add New', 'apcore' ),
		'add_new_item'			=> __( 'Add New Team', 'apcore' ),
		'edit_item'				=> __( 'Edit Team', 'apcore' ),
		'new_item'				=> __( 'New Team', 'apcore' ),
		'view_item'				=> __( 'View Team', 'apcore' ),
		'search_items'			=> __( 'Search Teams', 'apcore' ),
		'not_found'				=>  __( 'No teams found', 'apcore' ),
		'not_found_in_trash'	=> __( 'No teams found in Trash', 'apcore' ),
		'parent_item_colon'		=> '',
		'menu_name'				=> __( 'Teams', 'apcore' ),''
	
	);	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true,
		'query_var'				=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> '', 
		'supports'				=> array('title','editor','author','thumbnail')
	);
	
	if(isset($apress_data['team_url_slug']) && !empty($apress_data['team_url_slug'])) {
		$args['rewrite'] = array('slug' => $apress_data['team_url_slug']);
	}	
	// The following is the main step where we register the post.
	register_post_type('zt_team',$args);
}

add_action('init', 'apress_taxonomies_team', 0); 
function apress_taxonomies_team(){
	global $apress_data;
	// Initialize New Taxonomy Labels
	$labels = array(
		'name'				=> _x( 'Category', 'Category general name', 'apcore' ),
		'singular_name'		=> _x( 'Category', 'taxonomy singular name', 'apcore' ),
		'search_items'		=> __( 'Search Category', 'apcore' ),
		'all_items'			=> __( 'All Categories', 'apcore' ),
		'parent_item'		=> __( 'Parent Category', 'apcore' ),
		'parent_item_colon' => __( 'Parent Category:', 'apcore' ),
		'edit_item'			=> __( 'Edit Category', 'apcore' ),
		'update_item'		=> __( 'Update Category', 'apcore' ),
		'add_new_item'		=> __( 'Add New Category', 'apcore' ),
		'new_item_name'		=> __( 'New Category Name', 'apcore' ),
	);
	// Custom taxonomy for Portfolio Tags	  
	$args = array(
		'labels'		=> $labels,
		'hierarchical'	=> true,
		'show_ui'		=> true,	
	);
	
	if(isset($apress_data['team_url_slug']) && !empty($apress_data['team_url_slug'])) {
		$args['rewrite'] = array('slug' => $apress_data['team_url_slug'].'-category');
	}
	register_taxonomy( 'catteam', 'zt_team', $args );
	  
}

add_filter("manage_edit-zt_team_columns", "team_edit_columns");

function team_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type='checkbox' />",
                    "title" => __("Team", 'apcore'),
                    "photo" => __("Image", 'apcore'),
                    "catteam" => __("Categories", 'apcore'),
                    "date" => __("Date", 'apcore')
                   );

   return $columns;
}

add_action("manage_zt_team_posts_custom_column",  "team_custom_columns");

function team_custom_columns($column){
  global $post;
  switch ($column){ 
	case "photo":
		if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
		break;
	case "catteam":
		echo get_the_term_list($post->ID, 'catteam', '', ', ','');
		break;
   }
}

/*--- Custom Messages - testimonial_updated_messages ---*/
add_filter('post_updated_messages', 'team_updated_messages');

	function team_updated_messages( $messages ) {
	global $post, $post_ID;
	
	$messages['zt_team'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( ('Team updated. <a href="%s">View Team</a>'), esc_url( get_permalink($post_ID) ) ),
	2 => ('Custom field updated.'),
	3 => ('Custom field deleted.'),
	4 => ('Team updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( ('Team restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( ('Team published. <a href="%s">View team</a>'), esc_url( get_permalink($post_ID) ) ),
	7 => ('Team saved.'),
	8 => sprintf( ('Team submitted. <a target="_blank" href="%s">Preview team</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( ('Team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team</a>'),
	// translators: Publish box date format, see http://php.net/date
	date_i18n( ( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( ('Team draft updated. <a target="_blank" href="%s">Preview team</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	
	return $messages;
}

/*--- #end SECTION - testimonial_updated_messages ---*/

//Custom query for Portfolio Category
function apress_set_post_filters( $query ) {
	global $apress_data;
	if( ( is_tax( 'catportfolio' ) )&& $query->is_main_query() ) {
		$query->set( 'posts_per_page', $apress_data['portfolio_items'] );
	}
	return $query;
}

add_filter('pre_get_posts', 'apress_set_post_filters');


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function apress_gallery_add_custom_box() {

    $screens = array( 'zt_portfolio' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'apress_gallery_gallery',
            __( 'Images gallery', 'apcore' ),
            'apress_gallery_inner_custom_box',
            $screen,
            'side'
        );
    }
}
add_action( 'add_meta_boxes', 'apress_gallery_add_custom_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function apress_gallery_inner_custom_box( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'apress_gallery_inner_custom_box', 'apress_gallery_inner_custom_box_nonce' );


    ?>

    <div id="gallery_images_container">
        <ul class="gallery_images">
            <?php
            if ( metadata_exists( 'post', $post->ID, '_gallery_image_gallery' ) ) {
                $gallery_image_gallery = get_post_meta( $post->ID, '_gallery_image_gallery', true );
            } else {
                // Backwards compat
                $attachment_ids = get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids' );
                $attachment_ids = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
                $gallery_image_gallery = implode( ',', $attachment_ids );
            }

            $attachments = array_filter( explode( ',', $gallery_image_gallery ) );

            if ( $attachments ) {
                foreach ( $attachments as $attachment_id ) {
                    echo '<li class="image" data-attachment_id="' . esc_attr($attachment_id) . '">
								' . wp_get_attachment_image( $attachment_id ) . '
								<ul class="actions">
									<li><a href="#" class="delete tips" data-tip="' . __( 'Delete image', 'apcore' ) . '">' . __( 'Delete', 'apcore' ) . '</a></li>
								</ul>
							</li>';
                }
			} ?>
        </ul>

        <input type="hidden" id="gallery_image_gallery" name="gallery_image_gallery" value="<?php echo esc_attr( $gallery_image_gallery ); ?>" />

    </div>
    <p class="add_gallery_images hide-if-no-js">
        <a class="button" href="#"><?php _e( 'Add gallery images', 'apcore' ); ?></a>
    </p>
    <script type="text/javascript">
        jQuery(document).ready(function($){

            // Uploading files
            var gallery_gallery_frame;
            var $image_gallery_ids = $('#gallery_image_gallery');
            var $gallery_images = $('#gallery_images_container ul.gallery_images');

            jQuery('.add_gallery_images').on( 'click', 'a', function( event ) {

                var $el = $(this);
                var attachment_ids = $image_gallery_ids.val();

                event.preventDefault();

                // If the media frame already exists, reopen it.
                if ( gallery_gallery_frame ) {
                    gallery_gallery_frame.open();
                    return;
                }

                // Create the media frame.
                gallery_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: '<?php _e( 'Add Images to post Gallery', 'apcore' ); ?>',
                    button: {
                        text: '<?php _e( 'Add to gallery', 'apcore' ); ?>'
                    },
                    multiple: true
                });

                // When an image is selected, run a callback.
                gallery_gallery_frame.on( 'select', function() {

                    var selection = gallery_gallery_frame.state().get('selection');

                    selection.map( function( attachment ) {

                        attachment = attachment.toJSON();

                        if ( attachment.id ) {
                            attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;

                            $gallery_images.append('\
									<li class="image" data-attachment_id="' + attachment.id + '">\
										<img src="' + attachment.url + '" />\
										<ul class="actions">\
											<li><a href="#" class="delete" title="<?php _e( 'Delete image', 'apcore' ); ?>"><?php _e( 'Delete', 'apcore' ); ?></a></li>\
										</ul>\
									</li>');
                        }

                    } );

                    $image_gallery_ids.val( attachment_ids );
                });

                // Finally, open the modal.
                gallery_gallery_frame.open();
            });

            // Image ordering
            $gallery_images.sortable({
                items: 'li.image',
                cursor: 'move',
                scrollSensitivity:40,
                forcePlaceholderSize: true,
                forceHelperSize: false,
                helper: 'clone',
                opacity: 0.65,
                placeholder: 'wc-metabox-sortable-placeholder',
                start:function(event,ui){
                    ui.item.css('background-color','#f6f6f6');
                },
                stop:function(event,ui){
                    ui.item.removeAttr('style');
                },
                update: function(event, ui) {
                    var attachment_ids = '';

                    $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                        var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                        attachment_ids = attachment_ids + attachment_id + ',';
                    });

                    $image_gallery_ids.val( attachment_ids );
                }
            });

            // Remove images
            $('#gallery_images_container').on( 'click', 'a.delete', function() {

                $(this).closest('li.image').remove();

                var attachment_ids = '';

                $('#gallery_images_container ul li.image').css('cursor','default').each(function() {
                    var attachment_id = jQuery(this).attr( 'data-attachment_id' );
                    attachment_ids = attachment_ids + attachment_id + ',';
                });

                $image_gallery_ids.val( attachment_ids );

                return false;
            } );

        });
    </script>


<?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function apress_gallery_save_postdata( $post_id ) {

    /*
     * We need to verify this came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['apress_gallery_inner_custom_box_nonce'] ) )
        return $post_id;

    $nonce = $_POST['apress_gallery_inner_custom_box_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'apress_gallery_inner_custom_box' ) )
        return $post_id;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    // Check the user's permissions.
    if ( 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;
    }

    /* OK, its safe for us to save the data now. */

    // Sanitize user input.
    $mydata = $_POST['gallery_image_gallery'];

    // Update the meta field in the database.
    update_post_meta( $post_id, '_gallery_image_gallery', $mydata );
}
add_action( 'save_post', 'apress_gallery_save_postdata' );



#-----------------------------------------------------------------#
# Add URL option into attachment details for visual composer image gallery element
#-----------------------------------------------------------------#

function apress_add_attachment_field_credit( $form_fields, $post ) {

    $image_gal_masonry_sizing_mapping = null;	
	
    $image_gal_masonry_sizing_mapping_options = array(	'choose' 									=> __('Choose', 'apcore'),
														'apcore_shortcode_portfolio_small_squared' 	=> __('Small Squared', 'apcore'),
														'apcore_shortcode_portfolio_squared' 		=> __('Big Squared', 'apcore'), 
														'apcore_shortcode_portfolio_landscape' 		=> __('Landscape', 'apcore'), 
														'apcore_shortcode_portfolio_portrait' 		=> __('Portrait', 'apcore')
													);
	
    $meta = get_post_meta( $post->ID, 'apress_image_gal_packery_sizing', true );
    foreach( $image_gal_masonry_sizing_mapping_options as $key => $option ) {
		$image_gal_masonry_sizing_mapping .= '<option value="' . $key . '"';
		if( $meta ){
			if( $meta == $key ) $image_gal_masonry_sizing_mapping .= ' selected="selected"'; 
		} 
		$image_gal_masonry_sizing_mapping .=  '>'. $option .'</option>';
	} 

	$form_fields["packery-image-sizing"] = array(
     	'label' => 'Packery Sizing',
     	'input' => 'html',
        'html' => "<select name='attachments[{$post->ID}][packery-image-sizing]' id='attachments[{$post->ID}][packery-image-sizing]'>".$image_gal_masonry_sizing_mapping."</select>",
		'helps' => '',
		'value' => get_post_meta( $post->ID, 'apress_image_gal_packery_sizing', true )
	);

    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'apress_add_attachment_field_credit', 10, 2 );

function apress_add_attachment_field_credit_save( $post, $attachment ) {

	if( isset( $attachment['packery-image-sizing'] ) ) {
		$packery_image_sizing_sanitized = sanitize_text_field($attachment['packery-image-sizing']);
	    update_post_meta( $post['ID'], 'apress_image_gal_packery_sizing', $packery_image_sizing_sanitized );
	}

    return $post;
}
add_filter( 'attachment_fields_to_save', 'apress_add_attachment_field_credit_save', 10, 2 );



// Footer Visual Composer
add_action('init', 'apcore_footer_init', 0);  
function apcore_footer_init(){
	$labels = array(
		'name'                  => _x( 'Footers', 'Post Type General Name', 'apcore' ),
		'singular_name'         => _x( 'Footer', 'Post Type Singular Name', 'apcore' ),
		'menu_name'             => __( 'Footers', 'apcore' ),
		'name_admin_bar'        => __( 'Footers', 'apcore' ),
		'archives'              => __( 'Item Archives', 'apcore' ),
		'parent_item_colon'     => __( 'Parent Item:', 'apcore' ),
		'all_items'             => __( 'All Items', 'apcore' ),
		'add_new_item'          => __( 'Add New Footer', 'apcore' ),
		'add_new'               => __( 'Add New Footer', 'apcore' ),
		'new_item'              => __( 'New Footer', 'apcore' ),
		'edit_item'             => __( 'Edit Footer', 'apcore' ),
		'update_item'           => __( 'Update Footer', 'apcore' ),
		'view_item'             => __( 'View Footer', 'apcore' ),
		'search_items'          => __( 'Search Footer', 'apcore' ),
		'not_found'             => __( 'Not found', 'apcore' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apcore' ),
		'featured_image'        => __( 'Featured Image', 'apcore' ),
		'set_featured_image'    => __( 'Set featured image', 'apcore' ),
		'remove_featured_image' => __( 'Remove featured image', 'apcore' ),
		'use_featured_image'    => __( 'Use as featured image', 'apcore' ),
		'insert_into_item'      => __( 'Insert into item', 'apcore' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apcore' ),
		'items_list'            => __( 'Items list', 'apcore' ),
		'items_list_navigation' => __( 'Items list navigation', 'apcore' ),
		'filter_items_list'     => __( 'Filter items list', 'apcore' ),
	);
	$args = array(
		'label'                 => __( 'Footer', 'apcore' ),
		'labels'        		=> $labels,
		'supports'              => array( 'title', 'editor', 'revisions', ),
		'show_in_rest'			=> true, // Gutenberg Support
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'       		=> true,
		'show_in_menu'          => true,
		'menu_position'         => 25,
		'menu_icon'     		=> 'dashicons-tagcloud',	
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'   		=> false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	
	register_post_type( 'apcore_footer', $args );
}
