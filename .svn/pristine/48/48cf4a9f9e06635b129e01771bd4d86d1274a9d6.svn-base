jQuery(document).ready(function($) {
	//* Search *//
	$(".search-header").on("click", function() {
        $(".search-bar").slideToggle("slow");
    }),
	
	//* Slider *//
	$("#slider").owlCarousel({
		margin:10,
		navigation : true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem : true,
		lazyLoad: false,
		autoHeight:true,
		autoPlay: true,
		pagination : false,
		animateOut: 'fadeOut',
		navigationText:	["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]


		// "singleItem:true" is a shortcut for:
		//items : 1, 
		// itemsDesktop : false,
		// itemsDesktopSmall : false,
		// itemsTablet: false,
		// itemsMobile : false

	});	
	
	//***********Related Post  ************//
	var owl = $(".related-post");
		owl.owlCarousel({
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1000,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
		itemsTablet: [600,1], //2 items between 600 and 0;
		itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
		autoPlay: false,
		navigation: true,
		lazyLoad: true,
		navigationText:	["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
	});
		

	//*********Search Sticky*********//
	jQuery(window).bind('scroll', function (){
	  if (jQuery(window).scrollTop() > 100){
		jQuery('.search-bar').addClass('search-sticky');
	  } else {
		jQuery('.search-bar').removeClass('search-sticky');
	  }
	});
	

	//*********prettyPhoto*********//
	$("area[rel^='prettyPhoto']").prettyPhoto();
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:300000, autoplay_slideshow: true});
	$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',slideshow:100000, hideflash: true});


	
	//********Back Top********//
	$("#back-top").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});


	/********Menu *******/
	(function($) {
		$.fn.menumaker = function(options) {  
		 var cssmenu = $(this), settings = $.extend({
		   format: "dropdown",
		   sticky: false
		 }, options);
		 return this.each(function() {
		   $(this).find(".button").on('click', function(){
		     $(this).toggleClass('menu-opened');
		     var mainmenu = $(this).next('ul');
		     if (mainmenu.hasClass('open')) { 
		       mainmenu.slideToggle().removeClass('open');
		     }
		     else {
		       mainmenu.slideToggle().addClass('open');
		       if (settings.format === "dropdown") {
		         mainmenu.find('ul').show();
		       }
		     }
		   });
		   cssmenu.find('li ul').parent().addClass('has-sub');
		multiTg = function() {
		     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
		     cssmenu.find('.submenu-button').on('click', function() {
		       $(this).toggleClass('submenu-opened');
		       if ($(this).siblings('ul').hasClass('open')) {
		         $(this).siblings('ul').removeClass('open').slideToggle();
		       }
		       else {
		         $(this).siblings('ul').addClass('open').slideToggle();
		       }
		     });
		   };
		   if (settings.format === 'multitoggle') multiTg();
		   else cssmenu.addClass('dropdown');
		   if (settings.sticky === true) cssmenu.css('position', 'fixed');
		resizeFix = function() {
		  var mediasize = 991;
		     if ($( window ).width() > mediasize) {
		       cssmenu.find('ul').show();
		     }
		     if ($(window).width() <= mediasize) {
		       cssmenu.find('ul').hide().removeClass('open');
		     }
		   };
		   resizeFix();
		   return $(window).on('resize', resizeFix);
		 });
		  };
		})(jQuery);

		(function($){
		$(document).ready(function(){
		$("#main-navigation").menumaker({
		   format: "multitoggle"
		});
		});
	})(jQuery);


});