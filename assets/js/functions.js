$( document ).ready(function() {
	$('#fullpage').fullpage({
		anchors: ['home', 'about', 'podcast', 'articulos', 'conferencias','contacto','socio'],
		menu: '.menu'
	});
    
    $('.slider-conferencias').bxSlider(
        {
            pager: false,
            adaptiveHeight:true
        }
    );

});