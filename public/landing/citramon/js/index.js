$(function(){
   var stickyHeaderTop = $('.view_bottom').offset().top;

   $(window).scroll(function(){
           if( $(window).scrollTop() > stickyHeaderTop ) {
                   $('.view_bottom').css({position: 'fixed', bottom: '0px'});
                   $('#sticky').css('display', 'block');
           } else {
                   $('.view_bottom').css({position: 'absolute', bottom: '0px'});
                   $('#sticky').css('display', 'none');
           }
   });
});

// const accordionItemHeaders = document.querySelectorAll(".tabletka_icon");

// accordionItemHeaders.forEach(accordionItemHeader => {
//   accordionItemHeader.addEventListener("mouseenter", event => {
//     accordionItemHeader.classList.toggle("active");
//   });
// });


var block_show = null;
 
function scrollTracking(){
	var wt = $(window).scrollTop();
	var wh = $(window).height();
	var et = $('.row_item').offset().top;
	var eh = $('.row_item').outerHeight();
	
	if (et >= wt && et + eh <= wh + wt){
		if (block_show == null || block_show == false) {
         $('.sickness_title').addClass('show')
		}
		block_show = true;
	} else {
		if (block_show == null || block_show == true) {
         $('.sickness_title').removeClass('show')
		}
		block_show = false;
	}
}
 
$(window).scroll(function(){
	scrollTracking();
});
	
$(document).ready(function(){ 
	scrollTracking();
});