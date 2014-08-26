$( document ).ready(function() {
	$('#fullpage').fullpage({
		anchors: ['home', 'about', 'podcast', 'articulos', 'conferencias','galeria','contacto'],
		menu: '.menu'
	});
    
    $('.slider-conferencias').bxSlider();

});