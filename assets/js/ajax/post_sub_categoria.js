$(function(){
	$('.categoria-ajax').change(function(){
		var idCategoria = $(this).val();
		$('.recarga-sub-categoria').html('<img src="assets/img/loading.GIF" width="40" style="display:block; margin: 10px auto 25px;">');
		$.post( "categorias/ajax_subcategoria", { idCategoria: idCategoria })
			.done(function( data ) {
				$('.recarga-sub-categoria').html(data);
		});
	});
});