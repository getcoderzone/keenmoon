//*********Menu Sticky*********//

jQuery(window).bind('scroll', function (){
  if (jQuery(window).scrollTop() > 100){
	jQuery('.main-menu-wapper').addClass('menu-sticky');
  } else {
	jQuery('.main-menu-wapper').removeClass('menu-sticky');
  }
});	

// 	var url = window.location;
// // Will only work if string in href matches with location
// $('.top-menu ul li a[href="'+ url +'"]').parent().addClass('active');

// // Will also work for relative and absolute hrefs
// $('.top-menu ul li a').filter(function() {
// 	return this.href == url;
// }).parent().addClass('active');
