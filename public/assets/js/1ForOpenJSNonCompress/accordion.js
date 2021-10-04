/*Accordion question*/
$(function () {
	var div = $('.accordion>ul>li');
	div.click(function(){
		div.not($(this).toggleClass('active')).removeClass('active')
	});
});



/*Footer about opened*/
$(document).ready(function(){
	$('#show').click(function(){
		$('.search-result').toggleClass('collapsed').next();
		if($('.search-result').hasClass('collapsed')) {
			$('#show').html('Закрыть <i class="fa fa-angle-up" aria-hidden="true"></i>');
		}
		else {
			$('#show').html('Показать больше <i class="fa fa-angle-down" aria-hidden="true"></i>');
		}
	});
});
