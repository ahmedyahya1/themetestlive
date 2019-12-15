<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog shortcode
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
	extract(shortcode_atts(array(
		'style'									=> 'style1',
		'category'								=> '',
		'layoutstyle'							=> 'fitRows',
		'num' 									=> '4',
		'blgcrslcolprw' 						=> '',
		'blgcrslcolprw15' 						=> 'One',
		'blgcrslcolbg'							=> '#f9f9f9',
		'blgcrslcolbordep'						=> '#e6e6e6',
		'blgcrslcolradi'						=> '0',
		'blgcrslcolpad'							=> '',
		'blgcrsltitlesize'						=> '',
		'blgcrsltitlecolor'						=> '',
		'blgstylemetacolor'						=> '',
		'color_scheme'							=> 'primary_color_scheme',
		'blgcrslimgoverlay'						=> 'rgba(0, 0, 0, 0.1)',
		'blgcrslhovercolor'						=> 'rgba(0, 0, 0, 0.8)',
		'blgstylehovercolor'					=> '#0187a0',
		'blgcrslzoomicon'						=> 'fa fa-search-plus',
		'blgcrsllinkicon'						=> 'fa fa-link',
		'blgcrslbuttonbg'						=> '#00c8ec',
		'blgcrslbuttonhovbg'					=> '#0187a0',				
		'blog_navigation'						=> 'none',
		'blog_click'							=> '4',
		'nav_bg'								=> '#eeeeee',
		'nav_color'								=> '#000000',
		'nav_border'							=> '#eeeeee',
		'nav_hover_color'						=> '#ffffff',
		'nav_hover_bg'							=> '#549ffc',
		'button_bg'								=> '#549ffc',
		'button_title'							=> '#fff',
		'button_border'							=> '#549ffc',
		'button_hover_title'					=> '#fff',
		'button_hover_bg'						=> '#549ffc',				
		'blgshowfilter'							=> 'no',
		'filter_button_style'					=> 'filter_button_style1',
		'filter_button_align'					=> 'left',
		'filter_fontsize'						=> '16',
		'filter_buttonborradi'					=> '0',
		'filter_button_text_color'				=> '#fff',
		'filter_button_bg_color'				=> '#549ffc',
		'filter_button_border_color'			=> '#3174c8',
		'filter_button_text_hover_color'		=> '#fff',
		'filter_button_bg_hover_color'			=> '#3174c8',				
		'data_animation'						=>'No Animation',
		'data_delay'							=>'500',
		
		'posttitleposition'						=>'above',
		'posttitlealignment'					=>'',
		'posttitleseparatorshowhide'			=>'hide',
		'titleseparatorimg'						=>'',
		'categoryposition'						=>'above',
		'categorydesign'						=>'box',
		'categorydesignimg'						=>'',
		'continuereadingshowhide'				=>'show',
		'continuereadingmodify'					=>'Continue Reading',
		'socialsharingshowhide'					=>'show',
		'socialiconborderradius'				=>'6',				
		'postdesign'							=>'none',				
		'postseparatorshowhide'					=>'hide',
		'postseparatorimage'					=>'',
		'titletoppadding'						=>'0',
		'titlebottompadding'					=>'20',
		'postmetashowhide'						=>'show',
		'postmetacolor'							=>'#818181',
		'postmetacolorhover'					=>'#549ffc',
		'postcontentcolor'						=>'#818181',
		'categoryfontcolor'						=>'#757575',
		'categoryfontcolorhover'				=>'#549ffc',
		'categorybackgroundcolor'				=>'#ffffff',
		'categorybackgroundcolorhover'			=>'#ffffff',
		'categorybordercolor'					=>'#757575',
		'categorybordercolorhover'				=>'#549ffc',
		'buttonfontcolor'						=>'#757575',
		'buttonfontcolorhover'					=>'#549ffc',
		'buttonbackgroundcolor'					=>'#ffffff',
		'buttonbackgroundcolorhover'			=>'#ffffff',
		'buttonbordercolor'						=>'#757575',
		'buttonbordercolorhover'				=>'#549ffc',
		'socialiconcolor'						=>'#757575',
		'socialiconcolorhover'					=>'#549ffc',
		'socialiconbackgroundcolor'				=>'#ffffff',
		'socialiconbackgroundcolorhover'		=>'#ffffff',
		'socialiconbordercolor'					=>'#757575',
		'socialiconbordercolorhover'			=>'#549ffc',
		
		'boxbackgroundcolor'					=>'#ffffff',
		'boxbackgroundcolor2'					=>'#ffffff',
		'boxbackgroundcolor3'					=>'#ffffff',
		
		'boxbordercolor'						=>'#eeeeee',
		'boxbordercolor2'						=>'#eeeeee',
		'boxbordercolor3'						=>'#eeeeee',
		
		'box_shadow'							=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		'box_shadow2'							=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		'box_shadow3'							=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		'box_shadow4'							=> 'box_shadow_enable:disable|shadow_horizontal:2|shadow_vertical:2|shadow_blur:7|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		'box_swing'								=>'no',
		'excerptlength'							=>'40',
		'blgcrslcolinnerpad'					=>'35',
		'postdesign2'							=>'none',				
		
		'postmetabordercolor'					=>'#f9f9f9',
		//style 12
		'postmetabordercolor2'					=>'#f9f9f9',
		
		'postmetashowhide2'						=>'show',
		'postmetacolor2'						=>'#818181',
		'postmetacolorhover2'					=>'#549ffc',
		'category_topmargin'					=>'0',
		'posttoppadding'						=>'120',
		'postbottompadding'						=>'120',
		'fullheightpost'						=>'',
		'postcaptionwidth'						=>'800',
		'postcaptionimg'						=>'',
		'title_font_options'					=> '',
		'title_google_fonts'					=> '',
		'title_custom_fonts'					=> '',
			
			
	), $atts));
	
	ob_start();
	$id = RandomString(20);
	
	// Blog row count
	if($style == 'style12' && $blgcrslcolprw == '' || $style == 'style13' && $blgcrslcolprw == '' || $style == 'style15' && $blgcrslcolprw == ''){
			$blgcrslcolprw = 1;
		}elseif($blgcrslcolprw == ''){
			$blgcrslcolprw = 4;
		}else{
			if($blgcrslcolprw == 'Four'){
				$blgcrslcolprw = 4;
			}elseif($blgcrslcolprw == 'Three'){
				$blgcrslcolprw = 3;
			}elseif($blgcrslcolprw == 'Two'){
				$blgcrslcolprw = 2;
			}elseif($blgcrslcolprw == 'One'){
				$blgcrslcolprw = 1;
			}
	}
		
	if($blgcrslcolprw15 == 'Two'){
		$blgcrslcolprw15 = 2;
	}elseif($blgcrslcolprw15 == 'One'){
		$blgcrslcolprw15 = 1;
	}
		
		
	if($fullheightpost == 1){
		$fullheightpost = 'fullheightpost';				
		}else{
			$fullheightpost = '';
			}
	
	if(substr_count($box_shadow, 'disable') == 0) {
		$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	}
	if(substr_count($box_shadow2, 'disable') == 0) {
		$box_shadow2 = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow2);
	}
	if(substr_count($box_shadow3, 'disable') == 0) {
		$box_shadow3 = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow3);
	}
	if(substr_count($box_shadow4, 'disable') == 0) {
		$box_shadow4 = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow4);
	}
	// Title Alignment
	//RTL Colde
	if ( is_rtl() ){
		
		if($style == 'style12' && $posttitlealignment == '' || $style == 'style13' && $posttitlealignment == ''){
			$posttitlealignment = 'center';
		}elseif($posttitlealignment == ''){
			$posttitlealignment = 'right';
		}elseif($posttitlealignment == 'left'){
			$posttitlealignment = 'right';
		}elseif($posttitlealignment == 'right'){
			$posttitlealignment = 'left';
		}elseif($posttitlealignment == 'center'){
			$posttitlealignment = 'center';
		}

	}else{
		
		if($style == 'style12' && $posttitlealignment == '' || $style == 'style13' && $posttitlealignment == ''){
			$posttitlealignment = 'center';
		}elseif($posttitlealignment == ''){
			$posttitlealignment = 'left';
		}else{
			$posttitlealignment = $posttitlealignment;
		}
	}

		
	// Title Color
	if($style == 'style4' && $blgcrsltitlecolor == '' || $style == 'style3' && $blgcrsltitlecolor == ''){
		$blgcrsltitlecolor = '#ffffff';
	}elseif($style == 'style6' && $blgcrsltitlecolor == ''){
		$blgcrsltitlecolor = '#777777';
	}elseif($blgcrsltitlecolor == ''){
		$blgcrsltitlecolor = '#4c4c4c';
	}else{
		$blgcrsltitlecolor = $blgcrsltitlecolor;
	}
		
	// Column Padding
	if($style == 'style4' && $blgcrslcolpad == ''){
		$blgcrslcolpad = '0,0,0,0';
	}elseif($blgcrslcolpad == ''){
		$blgcrslcolpad = '15,15,15,15';
	}else{
		$blgcrslcolpad = $blgcrslcolpad;
	}
		
	// Title font size
	if($style == 'style5' && $blgcrsltitlesize == '' || $style == 'style6' && $blgcrsltitlesize == '' || $style == 'style7' && $blgcrsltitlesize == '' || $style == 'style10' && $blgcrsltitlesize == '' || $style == 'style11' && $blgcrsltitlesize == ''){
		$blgcrsltitlesize = '20';
	}elseif($blgcrsltitlesize == ''){
		$blgcrsltitlesize = '24';
	}else{
		$blgcrsltitlesize = $blgcrsltitlesize;
	}
	
	// Meta color 2,3,5,6,7
	if($style == 'style2' && $blgstylemetacolor == ''){
		$blgstylemetacolor = '#ffffff';				
	}elseif($style == 'style3' && $blgstylemetacolor == ''){
		$blgstylemetacolor = '#4c4c4c';
	}elseif($style == 'style5' && $blgstylemetacolor == '' || $style == 'style6' && $blgstylemetacolor == '' || $style == 'style7' && $blgstylemetacolor == ''){
		$blgstylemetacolor = '#016797';
	}else{
		$blgstylemetacolor = $blgstylemetacolor;
	}
		
	// Custom Image Size
	if($style == 'style_large' || $style == 'style12' || $style == 'style13'){
		$blog_thumb2 = 'apcore_blog_large';
		//$default_image = '<img src="'.get_template_directory_uri().'/assets/images/post_thumb/blog_large.jpg">';		
	}elseif($style == 'style_medium' || $style == 'style_small' || $style == 'style15'){
		$blog_thumb2 = 'apcore_blog_medium';
		//$default_image = '<img src="'.get_template_directory_uri().'/assets/images/post_thumb/blog_medium.jpg">';
	}else{
		$blog_thumb2 = '';
		//$default_image ='';
	}
	
	//Animation
	if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
	
	if($color_scheme == 'design_your_own'){
		$key = '';
	}else{
		$key = $color_scheme;
	} 
	$color_scheme_css = apcore_shortcodes_background_color_scheme($key);
		
	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid;
	
	if($style == 'style1'){
		$class = 'zolo_blog_style1 zolo_blog_vertical';	
	}elseif($style == 'style2'){
		$class = 'zolo_blog_style2 zolo_blog_vertical';
	}elseif($style == 'style3'){
		$class = 'zolo_blog_style3 zolo_blog_vertical';
	}elseif($style == 'style4'){
		$class = 'zolo_blog_style4 zolo_blog_vertical';
	}elseif($style == 'style5'){
		$class = 'zolo_blog_style5 zolo_blog_horizontal';
	}elseif($style == 'style6'){
		$class = 'zolo_blog_style6 zolo_blog_horizontal';
	}elseif($style == 'style7'){
		$class = 'zolo_blog_style7 zolo_blog_horizontal';
	}elseif($style == 'style8'){
		$class = 'zolo_blog_style8 zolo_blog_vertical';
	}elseif($style == 'style_large'){
		$class = 'zolo_blog_large';
	}elseif($style == 'style_medium'){
		$class = 'zolo_blog_medium';
	}elseif($style == 'style_small'){
		$class = 'zolo_blog_small';
	}elseif($style == 'style9'){
		$class = 'zolo_blog_large zolo_blog_style9 zolo_blog_vertical';
	}elseif($style == 'style10'){
		$class = 'zolo_blog_style10';
	}elseif($style == 'style11'){
		$class = 'zolo_blog_style11';
	}elseif($style == 'style12'){
		$class = 'zolo_blog_style12';
	}elseif($style == 'style13'){
		$class = 'zolo_blog_style13';
	}elseif($style == 'style14'){
		$class = 'zolo_blog_style14 zolo_blog_vertical';
	}elseif($style == 'style15'){
		$class = 'zolo_blog_style15';
	}
	
	
	$layoutstyle_class = '';
	
	if($layoutstyle == 'fitRows'){
		$layoutstyle_class = 'layoutstyle_normal';
		$layout_class = 'grid-item';
		
		if($style == 'style9'){
			$blogstyle_thumb = 'apcore_blog_medium';
		}else{
			$blogstyle_thumb = 'apcore_blogstyle_thumb';
		}
	}else if($layoutstyle == 'masonry'){
		$layoutstyle_class = 'shortcode_blog_layout_masonry';
		$layout_class = 'masonry-item';
		$blogstyle_thumb = 'full';
		
	}else{
		$layoutstyle_class = 'default_layout';
		$layout_class = 'element-item';
		$blogstyle_thumb = '';
		
		}
		
			if($blog_navigation == 'loadmore_nav'){
					
				$items_on_start = $num; 
				$items_per_click = $blog_click;
				$view_type = $layoutstyle;    
				$category = $category;
						
		?>
		<script>
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(document).ready(function(){
			
			var html_template = "<?php echo esc_js($view_type); ?>";
			var cat = "<?php echo esc_js($category); ?>";
			var now_open_works = 0;
			var first_load = true;
			var style = "<?php echo esc_js($style); ?>";
			var blgcrslcolprw = "<?php echo esc_js($blgcrslcolprw); ?>";
			var blgcrslcolprw15 = "<?php echo esc_js($blgcrslcolprw15); ?>";
			var blgshowfilter = "<?php echo $blgshowfilter; ?>";
			var blgcrslcolbg = "<?php echo esc_js($blgcrslcolbg); ?>";
			var blgcrslcolbordep = "<?php echo esc_js($blgcrslcolbordep); ?>";
			var blgcrslcolradi = "<?php echo esc_js($blgcrslcolradi); ?>";
			var blgcrslcolpad = "<?php echo $blgcrslcolpad; ?>";
			var blgcrsltitlesize = "<?php echo esc_js($blgcrsltitlesize); ?>";
			var blgcrsltitlecolor = "<?php echo esc_js($blgcrsltitlecolor); ?>";
			var blgstylemetacolor = "<?php echo esc_js($blgstylemetacolor); ?>";
			var blgstylehovercolor = "<?php echo esc_js($blgstylehovercolor); ?>";
			var blgcrslzoomicon = "<?php echo esc_js($blgcrslzoomicon); ?>";
			var blgcrsllinkicon = "<?php echo esc_js($blgcrsllinkicon); ?>";
			var layout_class = "<?php echo esc_js($layout_class); ?>";
			var layoutstyle_class = "<?php echo esc_js($layoutstyle_class); ?>";
			var blogstyle_thumb = "<?php echo esc_js($blogstyle_thumb); ?>";
			var posttitleposition = "<?php echo esc_js($posttitleposition); ?>";
			var posttitlealignment = "<?php echo esc_js($posttitlealignment); ?>";
			var posttitleseparatorshowhide = "<?php echo esc_js($posttitleseparatorshowhide); ?>";
			var titleseparatorimg = "<?php echo esc_js($titleseparatorimg); ?>";
			var categoryposition = "<?php echo esc_js($categoryposition); ?>";
			var categorydesign = "<?php echo esc_js($categorydesign); ?>";
			var categorydesignimg = "<?php echo esc_js($categorydesignimg); ?>";
			var continuereadingshowhide = "<?php echo esc_js($continuereadingshowhide); ?>";
			var continuereadingmodify = "<?php echo esc_js($continuereadingmodify); ?>";
			var socialsharingshowhide = "<?php echo esc_js($socialsharingshowhide); ?>";
			var postdesign = "<?php echo esc_js($postdesign); ?>";
			var postseparatorshowhide = "<?php echo esc_js($postseparatorshowhide); ?>";
			var postseparatorimage = "<?php echo esc_js($postseparatorimage); ?>";
			var titletoppadding = "<?php echo esc_js($titletoppadding); ?>";
			var titlebottompadding = "<?php echo esc_js($titlebottompadding); ?>";
			var postmetashowhide = "<?php echo esc_js($postmetashowhide); ?>";
			var postcontentcolor = "<?php echo esc_js($postcontentcolor); ?>";
			var excerptlength = "<?php echo esc_js($excerptlength); ?>";
			var postdesign2 = "<?php echo esc_js($postdesign2); ?>";
			var postmetashowhide2 = "<?php echo esc_js($postmetashowhide2); ?>";
			var category_topmargin = "<?php echo esc_js($category_topmargin); ?>";
			var fullheightpost = "<?php echo esc_js($fullheightpost); ?>";
			var postcaptionwidth = "<?php echo esc_js($postcaptionwidth); ?>";
			var postcaptionimg = "<?php echo esc_js($postcaptionimg); ?>";
			var title_font_options = "<?php echo esc_js($title_font_options); ?>";
			var title_google_fonts = "<?php echo esc_js($title_google_fonts); ?>";
			var title_custom_fonts = "<?php echo esc_js($title_custom_fonts); ?>";
			
			function get_blog_posts () {
			
				if (first_load == true) {		
					works_per_load = <?php echo esc_js($items_on_start); ?>;
					first_load = false;		
				} else {		
					works_per_load = <?php echo esc_js($items_per_click); ?>;		
				}
			
				j$.ajax({
				
				type: "POST",
				url: zt_post.ajaxurl,
				data: "html_template="+html_template+"&style="+style+"&layout_class="+layout_class+"&layoutstyle_class="+layoutstyle_class+"&blogstyle_thumb="+blogstyle_thumb+"&now_open_works="+now_open_works+"&action=get_blog_posts"+"&works_per_load="+works_per_load+"&first_load="+first_load+"&category="+cat+"&blgcrslcolprw="+blgcrslcolprw+"&blgcrslcolprw15="+blgcrslcolprw15+"&blgcrslcolbg="+blgcrslcolbg+"&blgcrslcolbordep="+blgcrslcolbordep+"&blgcrslcolradi="+blgcrslcolradi+"&blgcrslcolpad="+blgcrslcolpad+"&blgcrsltitlesize="+blgcrsltitlesize+"&blgcrsltitlecolor="+blgcrsltitlecolor+"&blgstylemetacolor="+blgstylemetacolor+"&blgstylehovercolor="+blgstylehovercolor+"&blgcrslzoomicon="+blgcrslzoomicon+"&blgcrsllinkicon="+blgcrsllinkicon+"&blgshowfilter="+blgshowfilter+"&posttitleposition="+posttitleposition+"&posttitlealignment="+posttitlealignment+"&posttitleseparatorshowhide="+posttitleseparatorshowhide+"&titleseparatorimg="+titleseparatorimg+"&categoryposition="+categoryposition+"&categorydesign="+categorydesign+"&categorydesignimg="+categorydesignimg+"&continuereadingshowhide="+continuereadingshowhide+"&continuereadingmodify="+continuereadingmodify+"&socialsharingshowhide="+socialsharingshowhide+"&postdesign="+postdesign+"&postseparatorshowhide="+postseparatorshowhide+"&postseparatorimage="+postseparatorimage+"&titletoppadding="+titletoppadding+"&titlebottompadding="+titlebottompadding+"&postmetashowhide="+postmetashowhide+"&postcontentcolor="+postcontentcolor+"&excerptlength="+excerptlength+"&postdesign2="+postdesign2+"&postmetashowhide2="+postmetashowhide2+"&category_topmargin="+category_topmargin+"&fullheightpost="+fullheightpost+"&postcaptionwidth="+postcaptionwidth+"&postcaptionimg="+postcaptionimg+"&title_font_options="+title_font_options+"&title_google_fonts="+title_google_fonts+"&title_custom_fonts="+title_custom_fonts+"",
				success: function(result){
				//alert(result);
				if(result.length<1){
				j$(".blog_load_more_cont").hide("fast");
				}
				
				now_open_works = now_open_works + works_per_load;
				first_load = false;
				//alert(result);
				var $newItems = j$(result);
				
				var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");
				
				
				setTimeout(function(i) {
				$container.imagesLoaded( function() {
					
					// init Isotope
					$container.isotope( 'insert', $newItems, function() {
						j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").ready(function(){
							j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');		
						});
						j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
						j$(window).trigger('resize');
					})
					// Pretty Photo
					j$("a[rel^='prettyPhoto']").prettyPhoto({
						animation_speed: 'normal', /* fast/slow/normal */
						slideshow: false, /* false OR interval time in ms */
						autoplay_slideshow: false, /* true/false */
						opacity: 0.80, /* Value between 0 and 1 */
						show_title: true, /* true/false */
						allow_resize: true, /* Resize the photos bigger than viewport. true/false */
						horizontal_padding: 0,
						default_width: 960,
						default_height: 540,
						counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
						theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
						hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
						wmode: 'opaque', /* Set the flash wmode attribute */
						autoplay: true, /* Automatically start videos: True/False */
						modal: false, /* If set to true, only the close button will close the window */
						overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
						keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
						deeplinking: false,
						social_tools: false
					});	
				});
				
				  },3000);		
					}   		
				});	
			}
			
				j$(".get_blog_posts_btn").click(function(){
					get_blog_posts();						
					j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
					return false;
				});
			
			
			/* load at start */	
				j$(window).load(function(){
					get_blog_posts();
					var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
					var $grid = $container.imagesLoaded( function() {
							// init Isotope
							$container.isotope({
		
							// options
								itemSelector : '<?php echo '.'.$layout_class;?>',
								layoutMode : '<?php echo $layoutstyle; ?>'
							})
						});
						// filter functions
						  var filterFns = {
							// show if number is greater than 50
							numberGreaterThan50: function() {
							  var number = j$(this).find('.number').text();
							  return parseInt( number, 10 ) > 50;
							},
							// show if name ends with -ium
							ium: function() {
							  var name = j$(this).find('.name').text();
							  return name.match( /ium$/ );
							}
						  };
						  // bind filter button click
						  j$('.postfilter-<?php echo $id; ?>').on( 'click', 'button', function() {
							var filterValue = j$( this ).attr('data-filter');
							// use filterFn if matches value
							filterValue = filterFns[ filterValue ] || filterValue;
							$grid.isotope({ filter: filterValue });
						  });
						  // change is-checked class on buttons
							j$('.postfilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
							var $buttonGroup = j$( buttonGroup );
							$buttonGroup.on( 'click', 'button', function() {
							  $buttonGroup.find('.is-checked').removeClass('is-checked');
							  j$( this ).addClass('is-checked');
							});
						  });				
					});
			
			});
		</script>
		<?php	}else{	?>
		<script type="text/javascript" charset="utf-8">
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(window).load(function() {
			var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
			var $grid = $container.imagesLoaded( function() {
					// init Isotope
					$container.isotope({
					// options
						itemSelector : '<?php echo '.'.$layout_class;?>',
						layoutMode : '<?php echo $layoutstyle; ?>'
					})
				});
				// filter functions
				  var filterFns = {
					// show if number is greater than 50
					numberGreaterThan50: function() {
					  var number = j$(this).find('.number').text();
					  return parseInt( number, 10 ) > 50;
					},
					// show if name ends with -ium
					ium: function() {
					  var name = j$(this).find('.name').text();
					  return name.match( /ium$/ );
					}
				  };
				  // bind filter button click
				  j$('.postfilter-<?php echo $id; ?>').on( 'click', 'button', function() {
					var filterValue = j$( this ).attr('data-filter');
					// use filterFn if matches value
					filterValue = filterFns[ filterValue ] || filterValue;
					$grid.isotope({ filter: filterValue });
				  });
				  // change is-checked class on buttons
				  j$('.postfilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
					var $buttonGroup = j$( buttonGroup );
					$buttonGroup.on( 'click', 'button', function() {
					  $buttonGroup.find('.is-checked').removeClass('is-checked');
					  j$( this ).addClass('is-checked');
					});
				  });				
			});
		</script>
		<?php	}
		
				global $post;
				$blgcrslcolpad = explode(",",$blgcrslcolpad);
				
				if ( get_query_var('paged') ) { 
					$paged = get_query_var('paged'); 
				}elseif ( get_query_var('page') ) { 
					$paged = get_query_var('page'); 
				}else{ 
					$paged = 1; 
				}
				
				if($category == 'all') {
					$category = null;
				}
				
				$blog_arr = array(
					'posts_per_page'	=> $num,
					'post_type'			=> 'post',
					'category_name'		=> $category,
					'paged'				=> $paged,
					'post_status'		=>'publish'
				);
				
				query_posts($blog_arr);
				
				if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small' || $style == 'style9'){ 
					$postdesign = 'blog_layout_'.$postdesign;
				}
				if($style == 'style10' || $style == 'style11'){ 
					$postdesign2 = 'blog_layout_'.$postdesign2;
				}
				
			// Typo
			$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
		?>
		
		<!--Blog Row Start-->
		
		<div class="zolo_blog_area <?php echo ' zoloblogstyle'.$c.' '.$class.' '.$postdesign;?> ">
		<?php
			if($blgshowfilter == 'yes'){
			echo '<div class="filter_button_area filter_button_align-'.$filter_button_align.'">';
				echo isotope_categories($id);
			echo '</div>';
			}
			
			//$default = array('body_font_size' => '60px',);
		
		?>
		<?php 
			if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small'){?>
		<div class="zolo_blog_row" style="margin:0px -15px;">
		  <?php }else{?>
		  <div class="zolo_blog_row" style="margin:0px -<?php echo $blgcrslcolpad[1]; ?>px 0 -<?php echo $blgcrslcolpad[3]; ?>px;">
			<?php } ?>
			<?php 
			if($style == 'style5' || $style == 'style6' || $style == 'style7'){
					$site_wrapper = 'site-content '.$id.$layoutstyle_class;
				}else{
					$site_wrapper = 'site-content '.$id.$layoutstyle_class;
					}
			?>
			<div class="zolo_row <?php echo $site_wrapper;?>">
			  <?php if($blog_navigation != 'loadmore_nav'){?>
			  <?php
				$i = 1;
				while (have_posts()) : the_post();   ?>
			  <?php  
					if($blgshowfilter == 'yes'){
					$terms = get_the_terms( @$post->ID, 'category' );  
					
					if ( $terms && ! is_wp_error( $terms ) ) :   
					$links = array();  
					
					foreach ( $terms as $term )   
					{  
					$links[] = $term->name;  
					}  
					$links = str_replace(' ', '-', $links);   
					$tax = join( " ", $links );       
					else :    
					$tax = '';    
					endif; 
					}
					?>
			  <?php if($blgshowfilter == 'yes'){$filterclasselector = strtolower($tax);}else{$filterclasselector='';} ?>
			  <?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';  ?>
			  <?php 
			if($style == 'style1' || $style == 'style2' || $style == 'style3' || $style == 'style4'){?>
			  
			  <!--Blog Box Area Start-->
			  
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]; ?>px <?php echo $blgcrslcolpad[1]; ?>px <?php echo $blgcrslcolpad[2]; ?>px <?php echo $blgcrslcolpad[3]; ?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_box" style="background:<?php echo $blgcrslcolbg;?>; border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
				  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $blogstyle_thumb ); ?>
				  <?php    
			if ( $thumb ){
				$thumb_url = $thumb['0'];
			}
			else {
				$thumb_url = get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg';
			} ?>
				  
				  <!--Thumb Area Start-->
				  
				  <div class="zolo_blog_thumb">
					<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
						echo '<span class="zolo_zilla_likes_box"> ';
						zolo_zilla_likes();
						echo '</span>';
						}?>
					<?php if($style != 'style1'){ ?>
					<a href="<?php the_permalink(); ?>">
					<?php } ?>
					<img src="<?php echo $thumb_url ?>" /> <span class="overlay"></span> 
					<!--Style 1 Icons Area Start-->
					<?php if($style == 'style1'){ ?>
					<span class="zolo_blog_icons">
					<?php if($blgcrslzoomicon){ ?>
					<a href="<?php echo $thumb_url;?>" rel="prettyPhoto[pretty_photo_gallery]" >
                    <span class="zolo_blog_icon blog_zoom_icon"> <i class="<?php echo $blgcrslzoomicon;?>"></i> 
                    </span></a>
					<?php }?>
					<?php if($blgcrsllinkicon){ ?>
					<a href="<?php the_permalink(); ?>"><span class="zolo_blog_icon blog_link_icon"> <i class="<?php echo $blgcrsllinkicon;?>"></i> </span></a>
					<?php }?>
					</span>
					<?php }?>
					<!--Style 1 Icons Area End--> 
					
					<!--Style 3 Title Start-->
					<?php if($style == 'style3'){ ?>
					<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_title(); ?>
					  </a> </h2>
					<?php }?>
					<!--Style 3 Title End--> 
					
					<!--Style 4 Blog Detail Area Start-->
					<?php if($style == 'style4'){ ?>
					<div class="zolo_blog_detail">
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_time('j F Y') ?>
					  </span> </div>
					<?php }?>
					<!--Style 4 Blog Detail Area End-->
					<?php if($style != 'style1'){ ?>
					</a>
					<?php } ?>
				  </div>
				  
				  <!--Thumb Area End--> 
				  
				  <!--Style 1, 2 & 3 Blog Detail Area Start-->
				  <?php if($style != 'style4'){ ?>
				  <div class="zolo_blog_detail"> 
					
					<!--Style 1 & 2 Title Start-->
					<?php if($style == 'style1' || $style == 'style2'){ ?>
					<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_title(); ?>
					  </a> </h2>
					<?php } ?>
					<!--Style 1 & 2 Title End--> 
					
					<!--Style 1 Meta Tag Start-->
					<?php if($style == 'style1'){ ?>
					<span class="zolo_blog_date" style="color:<?php echo $blgcrsltitlecolor;?>;">
					<?php the_time('F jS, Y') ?>
					</span>
					<?php } ?>
					<!--Style 1 Meta Tag End--> 
					
					<!--Style 2 Meta Tag Start-->
					<?php if($style == 'style2'){ ?>
					<span class="zolo_blog_date" style="color:<?php echo $blgstylemetacolor;?>;border-color:<?php echo $blgstylemetacolor;?>;"><span class="zolo_blog_day" style="border-color:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j') ?>
					</span><span class="zolo_blog_month_year"><span class="zolo_blog_month">
					<?php the_time('F') ?>
					</span><span class="zolo_blog_year">
					<?php the_time('Y') ?>
					</span></span></span>
					<?php } ?>
					<!--Style 2 Meta Tag End--> 
					<!--Style 2 Meta Tag Start-->
					<?php if($style == 'style3'){ ?>
					<span class="zolo_blog_author" style="color:<?php echo $blgstylemetacolor;?>;"><i class="fa fa-user"></i>
					<span class="vcard author post-author"><span class="fn"><?php the_author(); ?></span></span>
					</span> <span class="zolo_blog_date" style="color:<?php echo $blgstylemetacolor;?>;"> <i class="fa fa-calendar"></i>
					<?php the_time('j M Y') ?>
					</span>
					<?php } ?>
				  </div>
				  <?php } ?>
				  <!--Style 1 & 2 Blog Detail Area End--> 
				  
				</div>
			  </div>
			  <!--Blog Box Area End-->
			  
			  <?php }?>
			  <?php 
			if($style == 'style5' || $style == 'style6' || $style == 'style7'){?>
			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_blog_col zolo_blog_col2 <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_box"> <span class="zolo_blog_horizontal_box">
				  <div class="zolo_blog_thumb"> <a href="<?php the_permalink(); ?>">
					<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail($blogstyle_thumb);
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri(). '/assets/images/post_thumb/no_thumb.jpg" />';
			} ?>
					</a>
					<?php if($style == 'style5'){?>
					<span class="zolo_blog_date" style="background:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j M') ?>
					</span>
					<?php } ?>
				  </div>
				  <div class="zolo_blog_detail" style="border-color:<?php if($style == 'style6'){ echo $blgcrslcolbordep; }?>;">
					<?php if($style == 'style5' || $style == 'style7'){?>
					<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_title(); ?>
					  </a> </h2>
					<?php }?>
					<?php if($style == 'style7'){?>
					<span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j M Y') ?>
					</span>&nbsp; / &nbsp;<span class="add-comment"><a href="<?php the_permalink(); ?>#hello" style="color:<?php echo $blgstylemetacolor;?>;">
					<?php comments_number( '0 Comment' ); ?>
					</a></span>&nbsp; / &nbsp;
                    

					<?php //zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zilla_likes_box1"> ';
							zolo_zilla_likes();
							echo '&nbsp; / &nbsp;</span>';
						}?>
					<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgstylemetacolor;?>;"><?php echo esc_html__( 'Read More','apcore' );?></a> </span>
					<?php }?>
					<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolor;?>; border-color:<?php echo $blgcrslcolbordep;?>; background:<?php if($style == 'style6'){ echo $blgcrslcolbg; }?>;">
					  <?php if($style == 'style6'){?>
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style'];?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <?php }?>
					  <?php //the_excerpt() ;?>
					  <?php if($style == 'style6'){
				$content = wp_trim_words( get_the_content(), 16, '' );
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
		}else{
				$content = wp_trim_words( get_the_content(), 20, '' );
				echo  preg_replace( '/\[[^\]]+\]/', '', $content );
		}?>
					</div>
					<?php if($style == 'style5' || $style == 'style6'){?>
					<span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgstylemetacolor;?>;">
					<?php the_time('j M Y') ?>
					</span>&nbsp; / &nbsp;<span class="add-comment"><a href="<?php the_permalink(); ?>#hello" style="color:<?php echo $blgstylemetacolor;?>;">
					<?php comments_number( '0 Comment' ); ?>
					</a></span>&nbsp; / &nbsp;
						<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zilla_likes_box1"> ';
							zolo_zilla_likes();
							echo '&nbsp; / &nbsp;</span>';
						}?>
					<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgstylemetacolor;?>;"><?php echo esc_html__( 'Read More','apcore' );?></a> </span>
					<?php }?>
				  </div>
				  </span> </div>
			  </div>
			  <!--Blog Box Area End-->
			  
			  <?php }?>
			  <?php 
			if($style == 'style8'){?>
			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0];?>px <?php echo $blgcrslcolpad[1];?>px <?php echo $blgcrslcolpad[2];?>px <?php echo $blgcrslcolpad[3];?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_box" style="border-color:<?php echo $blgcrslcolbordep;?>; border-radius:<?php echo $blgcrslcolradi; ?>px;">
				  <div class="zolo_blog_thumb">
        <?php //zolo_zilla_likes
			if( function_exists('zolo_zilla_likes') ){ 
			echo '<span class="zolo_zilla_likes_box"> ';
			zolo_zilla_likes();
			echo '</span>';
			}?>
            
            <a href="<?php the_permalink(); ?>">
            <?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail($blogstyle_thumb);
			}
			else {
				echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/no_thumb.jpg" />';
			} ?>
					</a> </div>
				  <div class="zolo_blog_des_area" style="background:<?php echo $blgcrslcolbg;?>;">
					<div class="zolo_blog_detail" style="border-color:<?php echo $blgcrslcolbordep;?>;"><a href="<?php the_permalink(); ?>">
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>>
						<?php the_title(); ?>
					  </h2>
					  </a> <span class="zolo_blog_meta" style="color:<?php echo $blgcrsltitlecolor;?>;"> <span style="color:<?php echo $blgcrsltitlecolor;?>;">
					  <?php the_time('j M Y') ?>
					  </span>&nbsp; | &nbsp;<span class="add-comment"><a style="color:<?php echo $blgcrsltitlecolor;?>;" href="<?php the_permalink(); ?>#hello" >
					  <?php comments_number( '0 Comment' ); ?>
					  </a></span> </span> </div>
					<div class="zolo_blog_description" style="color:<?php echo $blgcrsltitlecolor;?>;border-color:<?php echo $blgstylehovercolor;?>;">
					  <?php //the_excerpt() ;?>
					  <?php 
			$content = wp_trim_words( get_the_content(), 18, '' );
			echo  preg_replace( '/\[[^\]]+\]/', '', $content );
		?>
					</div>
				  </div>
				</div>
			  </div>
			  <!--Blog Box Area End-->
			  
			  <?php }?>
			  <?php if($style == 'style9'){?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" style="padding:0px 15px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;">
					<div class="zolo_blog_box">
					  <?php
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			
			$format_quote = has_post_format( 'quote' );
			$format_audio = has_post_format( 'audio' ); 
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true ); 	
			
			if($format_quote != 1){
			 if($posttitleposition == 'above'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php }?>
					  <?php
						if($format_audio != 1){
						echo '<div class="zolo_blog_thumb">';
						//zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
						echo '<span class="zolo_zilla_likes_box"> ';
						zolo_zilla_likes();
						echo '</span>';
						}
						if( apress_theme_number_of_featured_images() > 0 || $post_video ){
							echo '<div class="posttype_gallery_slider">';
							echo '<ul class="post_slickslider posttype_gallery">';
							if($post_video){
								echo '<li class="posttype_slide">';
								echo '<div class="zolo_fluid_video_wrapper"> '.$post_video.'</div>';
								echo '</li>';
							}							 
							if ( has_post_thumbnail() ) {
							$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blogstyle_thumb); 						
							echo '<li class="posttype_slide"> <img src="'.$attachment_image[0].'" alt="'.get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true).'"/></li>';
							}						
							$i = 2;
							while($i <= 5): 
							$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
							if($attachment_new_id){
							$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blogstyle_thumb);
							echo '<li class="posttype_slide"><img src="'.$attachment_image[0].'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" /> </li>';
							} $i++; 
							endwhile;
							echo '</ul>';
							echo '</div>';
						}else{						
							echo '<div class="posttype_gallery_slider">';	
							echo '<ul class="post_slickslider posttype_gallery">';				  
							echo '<li class="posttype_slide"><img src="' . get_stylesheet_directory_uri() . '/assets/images/post_thumb/blog_medium.jpg" /></li>';
							echo  '</ul></div>';
						}?>
						</div>
						<?php }?>
					  <?php if($posttitleposition == 'below'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php }?>
					  <?php }?>
					  <div class="zolo_blog_description_area">
						<?php if($format_quote == 1){
							//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box"> ';
							zolo_zilla_likes();
							echo '</span>';
							}?>
						<a href="<?php the_permalink();?>">
						<?php the_content();?>
						</a>
						<?php }elseif($format_audio == 1){
					the_content();
				 }else{
					if($continuereadingshowhide == 'show'){
						$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
						$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );
					}else{
						$content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
					}
				}
						 if($format_quote != 1){if($socialsharingshowhide == 'show'){get_template_part('framework/social_sharing');}}?>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <?php }?>
			  <?php 	
				   
			if($style == 'style_large' || $style == 'style_medium' || $style == 'style_small'){?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;">
					<div class="zolo_blog_box">
				<?php
				$img = wp_get_attachment_image_src($titleseparatorimg,'full');
				$titleseparatorimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($categorydesignimg,'full');
				$categorydesignimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($postseparatorimage,'full');
				$postseparatorimage1 = $img[0];
			
				$format_quote = has_post_format( 'quote' );
				$format_audio = has_post_format( 'audio' ); 
				
				$post_video = get_post_meta( get_the_ID(), 'zt_video', true ); 	 
					
				 if($format_quote != 1){
				 if($posttitleposition == 'above'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php }?>
					  
					  <?php //thumb image code start
						if($format_audio != 1){
						if( apress_theme_number_of_featured_images() > 0 || $post_video ){						
							echo '<div class="zolo_blog_thumb">';
							//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box">';
								zolo_zilla_likes();
								echo '</span>';
							}
								echo '<div class="posttype_gallery_slider">';
									echo '<ul class="post_slickslider posttype_gallery">';
									if($post_video){
										echo '<li class="posttype_slide">';
										echo '<div class="zolo_fluid_video_wrapper">'.$post_video.'</div>';
										echo '</li>';
									}
									if ( has_post_thumbnail() ) {
										$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2); 						
										echo '<li class="posttype_slide"> <img src="'.$attachment_image[0].'" alt="'.get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true).'"/></li>';
									}
									$i = 2;
									while($i <= 5): 
										$attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
										if($attachment_new_id){
											$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_thumb2);
											echo '<li class="posttype_slide"><img src="'.$attachment_image[0].'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" /> </li>';
									} 
									$i++; 
									endwhile;
									echo '</ul>';
								echo '</div>';
							echo '</div>';
						}
						}?>
					  <?php if($posttitleposition == 'below'){?>
					  <?php apcore_shortcodes_entry_meta($posttitlealignment,$posttitleposition, $titleseparatorimg1, $posttitleseparatorshowhide, $categoryposition, $categorydesign, $categorydesignimg1, $postmetashowhide, $title_options['style']); ?>
					  <?php } ?>
					  <?php }?>
					  <div class="zolo_blog_description_area">
						<?php if($format_quote == 1){
						//zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box">';
								zolo_zilla_likes();
								echo '</span>';
							}?>
						<a href="<?php the_permalink(); ?>">
						<?php the_content();?>
						</a>
						
						<?php }elseif($format_audio == 1){
							
						the_content();
						
						}else{ ?>
						<?php 
					if($continuereadingshowhide == 'show'){
						$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
						$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );		  
					}else{
						$content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );	
					}
					?>
						<?php }?>
						<?php if($format_quote != 1){if($socialsharingshowhide == 'show'){get_template_part('framework/social_sharing');}}?>
						<?php //echo wp_trim_words( get_the_content(), 18, '' ); ?>
					  </div>
					</div>
				  </div>
				</div>
				<?php if($postseparatorshowhide == 'show'){echo '<div class="post_separator"><img src="'.$postseparatorimage1.'"/></div>';} ?>
			  </div>
			  <?php }?>
			  <?php if($style == 'style10'){?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php
			
			$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			
			$format_quote = has_post_format( 'quote' );
			$format_audio = has_post_format( 'audio' ); 
				
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
			?>
				  <?php if($format_quote != 1){?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <?php if($posttitleseparatorshowhide == 'show'){
					 if($titleseparatorimg1){ 
						echo '<div class="post_title_separator"><img src="'.$titleseparatorimg1.'"></div>'; 
					 }
					
					 }?>
					  <div class="zolo_blog_description_area">
						<?php 
					 $content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );
					 ?>
					  </div>
					<?php if( $postmetashowhide == 'show'){
                    apcore_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 1, 1, 1, $categorydesign, $posttitlealignment, $categorydesignimg1 );
                    }?>
					</div>
				  </div>
				  <?php }else{?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
					<div class="zolo_blog_box">
					  <div class="zolo_blog_description_area">
						<?php the_content();?>
					  </div>
					</div>
					</a> </div>
				  <?php }?>
				</div>
			  </div>
			  <?php } ?>
			  <?php  //Style 11
			 if($style == 'style11'){
				if($postseparatorshowhide == 'show'){
					$postseparator = 'postseparator_show';
				}else{$postseparator = '';}
				?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php
			$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$img = wp_get_attachment_image_src($postseparatorimage,'full');
			$postseparatorimage1 = $img[0];
			
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			 
			$format_quote = has_post_format( 'quote' );
			$format_audio = has_post_format( 'audio' ); 
			
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
			?>
				  <?php if($format_quote != 1){?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>>
						<?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
						<a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
						<?php the_title(); ?>
						</a> </h2>
					  <?php if($posttitleseparatorshowhide == 'show'){
					 if($titleseparatorimg1){?>
					  <div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
					  <?php } }?>
					  <div class="zolo_blog_description_area">
						<?php 
					 $content = wp_trim_words( get_the_content(), $excerptlength, '' );
						echo  preg_replace( '/\[[^\]]+\]/', '', $content );
					 ?>
					  </div>
					  <?php if( $postmetashowhide == 'show'){
					apcore_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 1, 1, 1, $categorydesign, $posttitlealignment, $categorydesignimg1 );
				}?>
					</div>
					<?php }else{?>
					<div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> <a href="<?php the_permalink(); ?>">
					  <div class="zolo_blog_box">
						<div class="zolo_blog_description_area">
						  <?php the_content();?>
						</div>
					  </div>
					  </a> </div>
					<?php }?>
				  </div>
				</div>
				<?php if($postseparatorshowhide == 'show'){?>
				<div class="post_separator" style="padding-top:<?php echo $blgcrslcolpad[2];?>px;"><img src="<?php echo $postseparatorimage1; ?>"/></div>
				<?php }?>
			  </div>
			  <?php }?>
			  <?php //Style 12 & 13
		if($style == 'style12' || $style == 'style13'){
				if($postseparatorshowhide == 'show'){
					$postseparator = 'postseparator_show';
				}else{$postseparator = '';}
				?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw;?> <?php echo $layout_class.' '.$filterclasselector.' '.$class.' '.$postdesign2.' '.$postseparator.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php if($postseparatorshowhide != 'show'){echo $blgcrslcolpad[2];}else{echo '0';}?>px <?php echo $blgcrslcolpad[3]?>px;" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php
			$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			
			$img = wp_get_attachment_image_src($postseparatorimage,'full');
			$postseparatorimage1 = $img[0];
			
			$img = wp_get_attachment_image_src($titleseparatorimg,'full');
			$titleseparatorimg1 = $img[0];
			
			$img = wp_get_attachment_image_src($categorydesignimg,'full');
			$categorydesignimg1 = $img[0];
			 
			$post_video = get_post_meta( get_the_ID(), 'zt_video', true );
			$format_quote = has_post_format( 'quote' );
			?>
				  <?php if($format_quote != 1){?>
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <div class="zolo_blog_thumb">						
						<?php if( apress_theme_number_of_featured_images() > 0 || $post_video ){                        
                        echo '<div class="posttype_gallery_slider">';
                        //zolo_zilla_likes
                        if( function_exists('zolo_zilla_likes') ){ 
                        	echo '<span class="zolo_zilla_likes_box">';
                        	zolo_zilla_likes();
                        	echo '</span>';
                        }
                        echo '<ul class="post_slickslider posttype_gallery">';
                        if($post_video){ 
                        	echo '<li class="posttype_slide">';
                        	echo '<div class="zolo_fluid_video_wrapper">'.$post_video.'</div>';
                        	echo '</li>';
                        }
                        
                        if ( has_post_thumbnail() ) {
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2);                         
                        echo '<li class="posttype_slide"> <img src="'.$attachment_image[0].'" alt="'.get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true).'" /></li>';
                        }                       
                        $i = 2;
                        while($i <= 5): 
                        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
                        if($attachment_new_id){
                        	$attachment_image = wp_get_attachment_image_src($attachment_new_id, $blog_thumb2);
                        	echo '<li class="posttype_slide"><img src="'.$attachment_image[0].'" alt="'.get_post_meta($attachment_new_id, '_wp_attachment_image_alt', true).'" /> </li>';
                        } 
						$i++; 
						endwhile;
                        echo '</ul>';
                        echo '</div>';                        
                        }?>
					  </div>
					  <div class="post_content_area">
					  <?php if( apress_theme_number_of_featured_images() > 0 || $post_video ){?>
						<div class="post_content_box" style="margin-top:-10%">
						<?php }else{?>
						<div class="post_content_box">
						<?php }?>
						  <div style="margin-top:<?php echo $category_topmargin;?>px;">
							<?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
							<h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
							  <?php the_title(); ?>
							  </a> </h2>
							<?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
							<div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
							<?php } }?>
							<?php if($style == 'style12' && $postmetashowhide2 == 'show'){ apcore_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0); }?>
							<div class="zolo_blog_description_area">
							<?php 
							if($continuereadingshowhide == 'show'){
								$continuereadingmodifytext = '<span class="read_more_area"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
								$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
								echo  preg_replace( '/\[[^\]]+\]/', '', $content );
							}else{
								$content = wp_trim_words( get_the_content(), $excerptlength, '' );
								echo  preg_replace( '/\[[^\]]+\]/', '', $content );
							}
							?>
                            <?php if($style == 'style12'){ get_template_part('framework/social_sharing');}?>
							</div>
						  </div>
						</div>
					  </div>
					  <?php if($style == 'style13' && $postmetashowhide == 'show'){?>
					  <div class="blog_entry_footer">
						<?php apcore_shortcodes_entry_meta_for_shortcode(0, 0 , 0, 1, 0, 0, 1);?>
						<div class="social_sharing_icon_box"><span class="social_sharing_icon"><span><?php echo __('Share','apcore') ?></span> <i class="fa fa-share-alt"></i></span>
						  <?php get_template_part('framework/social_sharing');?>
						</div>
					  </div>
					  <?php }?>
					</div>
				  </div>
				  <?php }else{?>
				  
				  <div class="zolo_blogcontent" style="color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background:#333333 url('<?php echo $attachment_image[0]; ?>') no-repeat center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover; font-size:18px; line-height:26px;"> 
				  
					<?php //zolo_zilla_likes
						if( function_exists('zolo_zilla_likes') ){ 
							echo '<span class="zolo_zilla_likes_box">';
							zolo_zilla_likes();
							echo '</span>';
						}?>
						<a href="<?php the_permalink(); ?>">
					<div class="zolo_blog_box">
					  <div class="zolo_blog_description_area">
					   
						<?php the_content();?>
					  </div>
					</div>
					</a> </div>
				  <?php }?>
				  
				</div>
				<?php if($postseparatorshowhide == 'show'){?>
				<div class="post_separator" style="padding-top:<?php echo $blgcrslcolpad[2];?>px;"><img src="<?php echo $postseparatorimage1; ?>"/></div>
				<?php }?>
			  </div>
			  <?php }?>
			  <?php //Style 14
		 if($style == 'style14'){?>
			  <div class="zolo_blog_col zolo_blog_col1 <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				<?php	
				$attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				if($attachment_image[0]){
					$attachment_image_src = $attachment_image[0];
					}else{
						$attachment_image_src = get_template_directory_uri().'/assets/images/post_thumb/blog_large.jpg';
				}
				$img = wp_get_attachment_image_src($titleseparatorimg,'full');
				$titleseparatorimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($categorydesignimg,'full');
				$categorydesignimg1 = $img[0];
				
				$postcaptionbgimg = wp_get_attachment_image_src($postcaptionimg,'full');
				$postcaptionbgurl = $postcaptionbgimg[0];
				?>
				  <div class="zolo_blogcontent_bg <?php echo $fullheightpost;?>" style=" width:100%; float:left;color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;background-image:url('<?php echo $attachment_image_src; ?>'); background-position:center center; -moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover;">
					<div class="zolo_blog_box"> <span class="overlay"></span> 
					  <!--Start-->
					  
					  <div class="post_content_area" style="max-width:<?php echo $postcaptionwidth; ?>px">
						<div class="post_content_box" style=" background:url('<?php echo $postcaptionbgurl; ?>') center center no-repeat;-moz-background-size:cover; -ms-background-size:cover; -o-background-size:cover; -webkit-background-size:cover; background-size:cover;">
						  <?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
						  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
							<?php the_title(); ?>
							</a> </h2>
						  <?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
						  <div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
						  <?php } }?>
						  <?php  if( $postmetashowhide == 'show'){ apcore_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0); } ?>
						  <div class="zolo_blog_style14_description">
							<?php 
				if($continuereadingshowhide == 'show'){
					$continuereadingmodifytext = '<span class="read_more_area" style="text-align:'.$posttitlealignment.';"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
					$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
					echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				}else{
					$content = wp_trim_words( get_the_content(), $excerptlength, '' );
					echo  preg_replace( '/\[[^\]]+\]/', '', $content );
				}
				?>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <?php }?>
			  <?php //Style 15
		 if($style == 'style15'){?>
			  <div class="zolo_blog_col zolo_blog_col<?php echo $blgcrslcolprw15;?> <?php echo $layout_class.' '.$filterclasselector.' '.$animatedclass;?>" style="padding:<?php echo $blgcrslcolpad[0]?>px <?php echo $blgcrslcolpad[1]?>px <?php echo $blgcrslcolpad[2]?>px <?php echo $blgcrslcolpad[3]?>px" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div <?php post_class(); ?>>
				  <?php	
				$img = wp_get_attachment_image_src($titleseparatorimg,'full');
				$titleseparatorimg1 = $img[0];
				
				$img = wp_get_attachment_image_src($categorydesignimg,'full');
				$categorydesignimg1 = $img[0];
				?>
				  <div class="zolo_blogcontent_bg" style=" width:100%; float:left;color:<?php echo $postcontentcolor;?>;text-align:<?php echo $posttitlealignment;?>;">
					<div class="zolo_blog_box">
					  <div class="zolo_blogcontent">
						<div class="post_content_area">
						  <div class="post_thumbnail">
							<?php //zolo_zilla_likes
							if( function_exists('zolo_zilla_likes') ){ 
								echo '<span class="zolo_zilla_likes_box">';
								zolo_zilla_likes();
								echo '</span>';
							}?>
							<?php  
							if ( has_post_thumbnail() ) {
							$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), $blog_thumb2);
								echo '<img src="'.$attachment_image[0].'"/>';
							}?>
						  </div>
						  <div class="post_content_wrapper">
							<div class="post_content_box">
							  <?php apcore_shortcodes_entry_meta_for_shortcode(0, 1 , 0, 0, 0, 0, 0, $categorydesign, $posttitlealignment, $categorydesignimg1 ); ?>
							  <h2 class="zolo_blog_title entry-title" <?php echo $title_options['style']?>> <a href="<?php the_permalink(); ?>" style="color:<?php echo $blgcrsltitlecolor;?>;">
								<?php the_title(); ?>
								</a> </h2>
							  <?php if($posttitleseparatorshowhide == 'show'){ if($titleseparatorimg1){?>
							  <div class="post_title_separator"><img src="<?php echo $titleseparatorimg1;?>"></div>
							  <?php } }?>
							  <div class="zolo_blog_style15_description">
								<?php 
								if($continuereadingshowhide == 'show'){
									$continuereadingmodifytext = '<span class="read_more_area" style="text-align:'.$posttitlealignment.';"><a class="read-more" href="'. get_permalink($post->ID) . '"> '.$continuereadingmodify.' </a></span>';
									}else{
										$continuereadingmodifytext = '';
									 }
					 
								//$content = wp_trim_words( get_the_content(), $excerptlength, $continuereadingmodifytext);
								//echo  preg_replace( '/\[[^\]]+\]/', '', $content );
								
								$content = wp_trim_words( get_the_content(), $excerptlength, '');
								echo  '<span class="zolo_blog_description_text">'.preg_replace( '/\[[^\]]+\]/', '', $content ).'</span>'.$continuereadingmodifytext;
								?>
							  </div>
							  <?php  if( $postmetashowhide == 'show'){ apcore_shortcodes_entry_meta_for_shortcode(1, 0 , 0, 1, 0, 0, 0, $posttitlealignment); }?>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <?php }?>
              
			  <?php $i++; endwhile; 
			}
			?>
			</div>
		  </div>
		  <!-- .navigation -->
		  
		  <?php 
				if($blog_navigation != 'none'){
					if($blog_navigation == 'classic_nav'){ 
						apress_theme_pagination(); 
					}elseif($blog_navigation == 'default'){
						apcore_paging_nav();
					}elseif($blog_navigation == 'loadmore_nav'){
							echo '<div class="blog_load_more_cont"><a class="btn_load_more get_blog_posts_btn" href="#">'.__('Load More','apcore').' </a></div>'; 
						} 
					}?>
		  
		  <!-- .navigation END --> 
		</div>
<?php
$shortcode_css = '';
	
	if($box_swing == 'yes'){
	$shortcode_css .= '.zoloblogstyle'.$c.' .zolo_blog_col:hover{ transform:translateY(-3px); -moz-transform:translateY(-3px); -webkit-transform:translateY(-3px); -ms-transform:translateY(-3px); -o-transform:translateY(-3px);}';
	 }
		if($fullheightpost != 'fullheightpost'){
			$shortcode_css .= '.zolo_blog_style14.zoloblogstyle'.$c.' .zolo_blog_box{ padding:'.$posttoppadding.'px 0 '.$postbottompadding.'px 0;}';
		}else{
			$shortcode_css .= '.zolo_blog_style14.zoloblogstyle'.$c.' .zolo_blog_box{ padding:0px 0px 0px 0px;}';
			}
		
		
		$shortcode_css .= '.zolo_blog_style11.zoloblogstyle'.$c.' .blog_layout_none .format-quote .zolo_blogcontent .zolo_blog_box,
        .zolo_blog_style10.zoloblogstyle'.$c.' .blog_layout_none .format-quote .zolo_blogcontent .zolo_blog_box,
		.zolo_blog_style11.zoloblogstyle'.$c.' .zolo_blogcontent .zolo_blog_box,
		.zolo_blog_style10.zoloblogstyle'.$c.' .zolo_blogcontent .zolo_blog_box{ padding:'.$blgcrslcolinnerpad.'px;}';
		
		$shortcode_css .= '.zolo_blog_style11.zoloblogstyle'.$c.' .blog_layout_none .zolo_blogcontent .zolo_blog_box,
		.zolo_blog_style10.zoloblogstyle'.$c.' .blog_layout_none .zolo_blogcontent .zolo_blog_box{ padding:0;}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.'.blog_layout_box_withoutpadding .zolo_blogcontent,
		.zoloblogstyle'.$c.'.blog_layout_box .zolo_blogcontent{background:'.$boxbackgroundcolor.';box-shadow: 0 0 2px '.$boxbordercolor.';transition: all 0.5s ease 0s;-moz-transition: all 0.5s ease 0s;-webkit-transition: all 0.5s ease 0s;}';
		$shortcode_css .= '.zoloblogstyle'.$c.'.blog_layout_box_withoutpadding .zolo_blogcontent:hover,
		.zoloblogstyle'.$c.'.blog_layout_box .zolo_blogcontent:hover{'.$box_shadow.'}';
		
		$shortcode_css .= '.zolo_blog_style11.zoloblogstyle'.$c.' .blog_layout_box_withseparator .zolo_blogcontent,
		.zolo_blog_style10.zoloblogstyle'.$c.' .blog_layout_box_withseparator .zolo_blogcontent,
		.zolo_blog_style11.zoloblogstyle'.$c.' .blog_layout_box .zolo_blogcontent,
		.zolo_blog_style10.zoloblogstyle'.$c.' .blog_layout_box .zolo_blogcontent{background:'.$boxbackgroundcolor2.';box-shadow: 0 0 2px '.$boxbordercolor2.';transition: all 0.5s ease 0s;-moz-transition: all 0.5s ease 0s;-webkit-transition: all 0.5s ease 0s;}';
		
		$shortcode_css .= '.zolo_blog_style11.zoloblogstyle'.$c.' .blog_layout_box_withseparator .zolo_blogcontent:hover,
		.zolo_blog_style10.zoloblogstyle'.$c.' .blog_layout_box_withseparator .zolo_blogcontent:hover,
		.zolo_blog_style11.zoloblogstyle'.$c.' .blog_layout_box .zolo_blogcontent:hover,
		.zolo_blog_style10.zoloblogstyle'.$c.' .blog_layout_box .zolo_blogcontent:hover{'.$box_shadow2.'}';
		
		$shortcode_css .= '.zolo_blog_style15.zoloblogstyle'.$c.' .post_content_wrapper:after{ border-color:'.$boxbackgroundcolor3.';}';
		$shortcode_css .= '.zolo_blog_style15.zoloblogstyle'.$c.' .zolo_blogcontent,
		.zolo_blog_style13.zoloblogstyle'.$c.' .zolo_blogcontent,
		.zolo_blog_style12.zoloblogstyle'.$c.' .zolo_blogcontent{background:'.$boxbackgroundcolor3.';box-shadow: 0 0 2px '.$boxbordercolor3.';transition: all 0.5s ease 0s;-moz-transition: all 0.5s ease 0s;-webkit-transition: all 0.5s ease 0s;}';
		$shortcode_css .= '.zolo_blog_style15.zoloblogstyle'.$c.' .zolo_blogcontent:hover,
		.zolo_blog_style13.zoloblogstyle'.$c.' .zolo_blogcontent:hover,
		.zolo_blog_style12.zoloblogstyle'.$c.' .zolo_blogcontent:hover{'.$box_shadow3.'}';
		
		$shortcode_css .= '.zolo_blog_style1.zoloblogstyle'.$c.' .zolo_blog_box:hover,
		.zolo_blog_style2.zoloblogstyle'.$c.' .zolo_blog_box:hover,
		.zolo_blog_style3.zoloblogstyle'.$c.' .zolo_blog_box:hover,
		.zolo_blog_style8.zoloblogstyle'.$c.' .zolo_blog_box:hover{'.$box_shadow4.'}';
				
		$shortcode_css .= '.zolo_blog_style13.zoloblogstyle'.$c.' .blog_entry_footer,
		.zolo_blog_style12.zoloblogstyle'.$c.' .blog_entry_footer{ border-top:1px solid '.$postmetabordercolor2.';}';
		$shortcode_css .= '.zolo_blog_style13.zoloblogstyle'.$c.' .post_content_box,
		.zolo_blog_style12.zoloblogstyle'.$c.' .post_content_box{background:'.$boxbackgroundcolor3.';}';
		
		
		$shortcode_css .= '.zolo_blog_style12.zoloblogstyle'.$c.' .blog_entry_footer .share-box li a,
		.zolo_blog_style12.zoloblogstyle'.$c.' ul.apress_postmeta li a,
		.zolo_blog_style12.zoloblogstyle'.$c.' ul.apress_postmeta li{color:'.$postmetacolor2.';}';
		$shortcode_css .= '.zolo_blog_style12.zoloblogstyle'.$c.' .blog_entry_footer .share-box li a:hover,
		.zolo_blog_style12.zoloblogstyle'.$c.' ul.apress_postmeta li a:hover{color:'.$postmetacolorhover2.';}';
		
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .categories-links a{color:'.$categoryfontcolor.';}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .categories-links a:hover{color:'.$categoryfontcolorhover.';}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .categories-links.rounded a,
		.zoloblogstyle'.$c.' .categories-links.box a{ background:'.$categorybackgroundcolor.'; border:1px solid '.$categorybordercolor.';}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .categories-links.rounded a:hover,
		.zoloblogstyle'.$c.' .categories-links.box a:hover{ background:'.$categorybackgroundcolorhover.'; border:1px solid '.$categorybordercolorhover.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .read_more_area a.read-more{ color:'.$buttonfontcolor.';background:'.$buttonbackgroundcolor.'; border:1px solid '.$buttonbordercolor.';}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .read_more_area a.read-more:hover{ color:'.$buttonfontcolorhover.';background:'.$buttonbackgroundcolorhover.'; border:1px solid '.$buttonbordercolorhover.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .read_more_area,
		.zoloblogstyle'.$c.' .share-box,
		.zoloblogstyle'.$c.' .post_title_area{text-align:'.$posttitlealignment.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .share-box li a{color:'.$socialiconcolor.';background:'.$socialiconbackgroundcolor.'; border:1px solid '.$socialiconbordercolor.';
		-moz-border-radius:'.$socialiconborderradius.'px;
		-webkit-border-radius:'.$socialiconborderradius.'px;
		-ms-border-radius:'.$socialiconborderradius.'px;
		-o-border-radius:'.$socialiconborderradius.'px;
		border-radius:'.$socialiconborderradius.'px;}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .share-box li a:hover{color:'.$socialiconcolorhover.';background:'.$socialiconbackgroundcolorhover.'; border:1px solid '.$socialiconbordercolorhover.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .share-box h4,
		.zoloblogstyle'.$c.' .post_title_area h2,
		.zoloblogstyle'.$c.' .post_title_area h2 a{ color:'.$blgcrsltitlecolor.'; }';
		$shortcode_css .= '.zoloblogstyle'.$c.' .post_title_area h2{font-size:'.$blgcrsltitlesize.'px;padding-top:'.$titletoppadding.'px; padding-bottom:'.$titlebottompadding.'px;}';
		
		$shortcode_css .= '.zolo_blog_style13.zoloblogstyle'.$c.' .blog_entry_footer,
		.zolo_blog_style13.zoloblogstyle'.$c.' .blog_entry_footer .share-box li a,
		.zoloblogstyle'.$c.' ul.apress_postmeta li a,
		.zoloblogstyle'.$c.' ul.apress_postmeta li,
		.zoloblogstyle'.$c.' ul.entry_meta_list li a,
		.zoloblogstyle'.$c.' ul.entry_meta_list li{ color:'.$postmetacolor.';}';
		
		$shortcode_css .= '.zolo_blog_style13.zoloblogstyle'.$c.' .blog_entry_footer .share-box li a:hover,
		.zoloblogstyle'.$c.' ul.apress_postmeta li a:hover,
		.zoloblogstyle'.$c.' ul.entry_meta_list li a:hover{ color:'.$postmetacolorhover.';}';
		
		
		if($color_scheme == 'design_your_own'){
			$shortcode_css .= '.zolo_blog_vertical.zoloblogstyle'.$c.' .zolo_blog_box .overlay{background:'.$blgcrslimgoverlay.';}';
			$shortcode_css .= '.zolo_blog_vertical.zoloblogstyle'.$c.' .zolo_blog_box:hover .overlay{background:'.$blgcrslhovercolor.';}';
			
		}else{
			$shortcode_css .= '.zolo_blog_vertical.zoloblogstyle'.$c.' .zolo_blog_box .overlay{ opacity:0;filter: alpha(opacity=0);}';
			$shortcode_css .= '.zolo_blog_vertical.zoloblogstyle'.$c.' .zolo_blog_box:hover .overlay{opacity:0.8;filter: alpha(opacity=80);'.$color_scheme_css.'}';
			
		}

		$shortcode_css .= '.zolo_blog_vertical.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_icons .zolo_blog_icon{background:'.$blgcrslbuttonbg.';}';
		$shortcode_css .= '.zolo_blog_vertical.zoloblogstyle'.$c.'  .zolo_blog_box .zolo_blog_icons .zolo_blog_icon:hover{background:'.$blgcrslbuttonhovbg.';}';
		$shortcode_css .= '.zolo_blog_style8.zoloblogstyle'.$c.' .zolo_blog_box:hover .zolo_blog_title{ color:'.$blgstylehovercolor.'!important;}';
		$shortcode_css .= '.zolo_blog_style8.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb img,
		.zolo_blog_style3.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style3.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb img,
		.zolo_blog_style2.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style2.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb img,
		.zolo_blog_style1.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style1.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb img{ border-top-left-radius:'.$blgcrslcolradi.'px;border-top-right-radius:'.$blgcrslcolradi.'px;}';
		
		$shortcode_css .= '.zolo_blog_style4.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb .overlay,
		.zolo_blog_style4.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_thumb img{ border-radius:'.$blgcrslcolradi.'px;}';
		
		$shortcode_css .= '.zolo_blog_style7.zoloblogstyle'.$c.' .zolo_blog_meta .zilla-likes:hover,
		.zolo_blog_style7.zoloblogstyle'.$c.' .zolo_blog_meta .zilla-likes.active,
		.zolo_blog_style7.zoloblogstyle'.$c.' .zolo_blog_meta a.zilla-likes,
		.zolo_blog_style6.zoloblogstyle'.$c.' .zolo_blog_meta .zilla-likes:hover,
		.zolo_blog_style6.zoloblogstyle'.$c.' .zolo_blog_meta .zilla-likes.active,
		.zolo_blog_style6.zoloblogstyle'.$c.' .zolo_blog_meta a.zilla-likes,
		.zolo_blog_style5.zoloblogstyle'.$c.' .zolo_blog_meta .zilla-likes:hover,
		.zolo_blog_style5.zoloblogstyle'.$c.' .zolo_blog_meta .zilla-likes.active,
		.zolo_blog_style5.zoloblogstyle'.$c.' .zolo_blog_meta a.zilla-likes{color:'.$blgstylemetacolor.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .blog_load_more_cont a.btn_load_more{background:'.$button_bg.';  color:'.$button_title.';border:1px solid '.$button_border.';}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .blog_load_more_cont a.btn_load_more:hover{ background:'.$button_hover_bg.'; color:'.$button_hover_title.';border:1px solid '.$button_border.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .page-numbers li a{background:'.$nav_bg.';  color:'.$nav_color.'!important;border:1px solid '.$nav_border.'!important;}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .page-numbers li span,
		.zoloblogstyle'.$c.' .page-numbers li a:hover{background:'.$nav_hover_bg.';color:'.$nav_hover_color.'!important;border:1px solid '.$nav_border.'!important;}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .blog_layout_box_withseparator .apress_postmeta_area{ border-top:1px solid '.$postmetabordercolor.';}';
		
		/*Filters CSS Start*/
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group{ text-align:'.$filter_button_align.';}';
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button{color:'.$filter_button_text_color.';font-size:'.$filter_fontsize.'px; line-height:'.$filter_fontsize.'px;}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button.is-checked,
		.zoloblogstyle'.$c.' .filters-button-group button.button:hover{color:'.$filter_button_text_hover_color.';opacity:1}';
		
		
		if($filter_button_style == 'filter_button_style1'){
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button{background:'.$filter_button_bg_color.';border:1px solid '.$filter_button_border_color.';
		-moz-border-radius:'.$filter_buttonborradi.'px;
		-webkit-border-radius:'.$filter_buttonborradi.'px;
		-ms-border-radius:'.$filter_buttonborradi.'px;
		-o-border-radius:'.$filter_buttonborradi.'px;
		border-radius:'.$filter_buttonborradi.'px;
		}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button.is-checked,
		.zoloblogstyle'.$c.' .filters-button-group button.button:hover{background:'.$filter_button_bg_hover_color.';border:1px solid '.$filter_button_border_color.';}';
		
		}else{
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button{background: none;box-shadow:none;}';
		$shortcode_css .= '.filter_button_align-center .filters-button-group button.button{ margin:0 10px;}';
		$shortcode_css .= '.filter_button_align-left .filters-button-group button.button{margin-right:20px;}';
		$shortcode_css .= '.filter_button_align-right .filters-button-group button.button{margin-left:20px;}';
		
		
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button{ overflow:hidden; position:relative; padding:10px 2px 10px;}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button:before { position:absolute; content:""; transition:all 0.7s;-webkit-transition:all 0.7s;
			left: 0;
			bottom: 0;
			width: 100%;
			border-bottom: 2px  solid '.$filter_button_text_hover_color.';
			-moz-transform:  translateX(-100%);
			-ms-transform:  translateX(-100%);
			-o-transform:  translateX(-100%);
			-webkit-transform:  translateX(-100%);
			transform:  translateX(-100%);
		  }';
		$shortcode_css .= '.zoloblogstyle'.$c.' .filters-button-group button.button.is-checked:before,
		.zoloblogstyle'.$c.' .filters-button-group button.button:hover:before {
			-moz-transform:  translateX(0);
			-ms-transform:  translateX(0);
			-o-transform:  translateX(0);
			-webkit-transform:  translateX(0);
			transform:  translateX(0);
		  }';
		}
		$shortcode_css .= '.zolo_blog_box .zolo_blog_title a{ text-decoration:inherit;}';
		$shortcode_css .= '.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_title{color:'.$blgcrsltitlecolor.';font-size:'.$blgcrsltitlesize.'px;}';
		if($style == 'style10' || $style == 'style11' || $style == 'style12' || $style == 'style13' || $style == 'style14' || $style == 'style15'){
		$shortcode_css .= '.zoloblogstyle'.$c.' .zolo_blog_box .zolo_blog_title{font-size:'.$blgcrsltitlesize.'px; padding-top:'.$titletoppadding.'px; padding-bottom:'.$titlebottompadding.'px;}';
		}
		/*Filters CSS End*/
		$shortcode_css .= '@media (max-width:767px) {';
		$shortcode_css .= '.zolo_blog_style15.zoloblogstyle'.$c.' .post_content_wrapper:after{ border-bottom-color:'.$boxbackgroundcolor3.'!important;}';
		$shortcode_css .= '}';
		
apcore_save_plugin_dyn_styles( $shortcode_css ); ?>

<?php			
wp_reset_query();
$demolp_output = ob_get_clean();
echo $demolp_output;
