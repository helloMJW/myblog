jQuery.noConflict()(function($){

/* ===============================================
   HEADER CART
   ============================================= */
	
	$('section.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);
	
/* ===============================================
   FIXED HEADER
   =============================================== */

	function venicelite_header() {
	
		var body_width = $(window).width();
		var header_h = $('#header-wrapper .row').innerHeight();

		if ( body_width >= 992 ){
			$('#header-wrapper, #header').css({'height':header_h});
		} else {
			$('#header-wrapper, #header').css({'height':'auto'});
		}

	}
	
	$( window ).load(venicelite_header);
	$( window ).resize(venicelite_header);

/* ===============================================
   FOOTER
   =============================================== */

	function venicelite_footer() {
	
		var footer_h = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footer_h});
	}
	
	$( document ).ready(venicelite_footer);
	$( window ).resize(venicelite_footer);

/* ===============================================
   SCROLL SIDEBAR
   =============================================== */

	$(window).load(function() {

		$("#scroll-sidebar").niceScroll({smoothscroll: false});
		$("#scroll-sidebar").getNiceScroll().hide();

		var pw = $(window).width();
		
		$("#header .mobile-navigation").click(function() {

			$('#overlay-body').fadeIn(600).addClass('visible');
			$('body').addClass('overlay-active');
			$('#wrapper').addClass('open-sidebar');

		});

		if ( pw < 992 ) {

			$("#sidebar-wrapper .mobile-navigation, #overlay-body").click(function() {
	
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active');
				$('#wrapper').removeClass('open-sidebar');
		
			});

			$("#overlay-body").swipe({
	
				swipeRight:function(event, direction, distance, duration, fingerCount) {
	
					$('#overlay-body').fadeOut(600);
					$('body').removeClass('overlay-active');
					$('#wrapper').removeClass('open-sidebar');
	
				},
	
				threshold:0
		
			});
		
		} else if ( pw > 992 ) {

			$("#sidebar-wrapper .mobile-navigation, #overlay-body").click(function() {
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active');
				$('#wrapper').removeClass('open-sidebar');
			});

		}
		
	});
	
/* ===============================================
   MAIN MENU
   =============================================== */

	$('nav#mainmenu li').hover(
		
		function () {
			$(this).children('ul').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('ul').stop(true, true).fadeOut(400);		
		}
			
	);
	
	$('nav#mainmenu.sneak li').children('ul').css({ 'top' : $('nav#mainmenu.sneak li a').innerHeight() + 10 });

/* ===============================================
   SUBMENU
   =============================================== */

	function venicelite_submenu() {
	
		var height = $('nav#mainmenu ul li a').innerHeight();
		$('nav#mainmenu ul ul').css({'top':height});
	
	}
	
	$( document ).ready(venicelite_submenu);
	$( window ).resize(venicelite_submenu);

/* ===============================================
   MOBILE MENU
   =============================================== */

	$('nav#mobilemenu ul > li').each(function(){
    	if( $('ul', this).length > 0 )
        $(this).children('a').append('<span class="sf-sub-indicator"> <i class="fa fa-plus"></i> </span>').removeAttr("href");
	}); 

	$('nav#mobilemenu ul > li ul').click(function(e){
		e.stopPropagation();
    })
	
    .filter(':not(:first)')
    .hide();
    
	$('nav#mobilemenu ul > li, nav#mobilemenu ul > li > ul > li').click(function(){

		var selfClick = $(this).find('ul:first').is(':visible');
		
		if(!selfClick) {
		  
		  $(this).parent().find('> li ul:visible').slideToggle('low');
		
		}
		
		$(this).find('ul:first').stop(true, true).slideToggle();

	});

/* ===============================================
   MASONRY
   =============================================== */

	function venicelite_masonry() {

		if ( $(window).width() >= 992 ) {

			$('.masonry').imagesLoaded(function () {

				$('.masonry').masonry({
					itemSelector: '.masonry-item',
					isAnimated: true
				});

			});
	
		} else {

			$('.masonry').imagesLoaded(function () {

				$('.masonry').masonry( 'destroy' );

			});

		}
	
	}
					
	$(window).resize(function(){
		venicelite_masonry();
	});
						
	$(document).ready(function(){
		venicelite_masonry();
	});

/* ===============================================
   SWIPEBOX GALLERY
   =============================================== */

	$(document).ready(function(){
		
		var counter = 0;

		$('div.gallery').each(function(){
			
			counter++;
			
			$(this).find('.swipebox').attr('data-rel', 'gallery-' + counter );
		
		});
		
		$('.swipebox').swipebox();

	});

/* ===============================================
   SCROLL TO TOP
   =============================================== */

	$('#back-to-top').click(function(){
		$.scrollTo(0,'slow');
		return false;
	});

/* ===============================================
   COMMENTS
   =============================================== */

	$(".comment-container a.comment-reply-link").click(function() {
		$(this).closest(".comment-container").next().addClass('respond-form');
	});

});          