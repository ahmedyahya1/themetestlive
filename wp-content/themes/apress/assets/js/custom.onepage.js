(function ($) {
	"use strict";
	//Onepage
	//alert(js_local_vars.headerpositionval);

	if(js_local_vars.headerpositionval == 'Top'){
		
		var sections = $('div.zt_onepage ,div.banner')
		  , nav = $('.zolo_header')
		  , nav_height = nav.outerHeight();
	  
	}else{
				
		var sections = $('div.zt_onepage ,div.banner')
	  , nav = $('.zolo_header')
	  , nav_height = 2;
	  
		}
	
	$(window).on('scroll', function () {
	  var cur_pos = $(this).scrollTop();
	  
	  sections.each(function() {
		var top = $(this).offset().top - nav_height,
			bottom = top + $(this).outerHeight();
		
		if (cur_pos >= top && cur_pos <= bottom) {
		  nav.find('a').removeClass('current');
		  sections.removeClass('current');
		  
		  $(this).addClass('current');
		  nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('current');
		}
	  });
	});
	
	nav.find('a').on('click', function () {
	  var $el = $(this)
		, id = $el.attr('href');
	  
	  $('html, body').animate({
		scrollTop: $(id).offset().top - nav_height + 2
	  }, 900);
	  
	  return false;
	});
	
})(jQuery);

