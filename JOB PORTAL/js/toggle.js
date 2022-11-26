jQuery(document).ready(function($){

	$('.page-content-toggle').each(function(index, element){
		$(this).find('.toggle-content').show();
	});

	$('.page-content-toggle .toggle-title a').click(function(event){
		event.preventDefault();

		$(this).toggleClass('active').parent().siblings('.toggle-content').slideToggle('fast');

	});
});