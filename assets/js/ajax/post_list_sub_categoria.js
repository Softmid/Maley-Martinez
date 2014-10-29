$(document).ready(function(){
	ajax($('.categoria-ajax').val(), $('.categoria-ajax').attr('data-idSubcategoria'));
});
$(function(){
	$('.categoria-ajax').change(function(){
		var idCategoria = $(this).val();
		var idSubcategoria = $(this).attr('data-idSubcategoria');
		$('.recarga-list-sub-categoria').html('<img src="assets/img/loading.GIF" width="30" style="display:block; margin: 10px auto 25px;">');
		ajax(idCategoria, idSubcategoria);
	});
});

function ajax(idCategoria, idSubcategoria){
	$.post( "categorias/ajax_list_subcategoria", { idCategoria: idCategoria, idSubcategoria: idSubcategoria })
		.done(function( data ) {
			$('.recarga-list-sub-categoria').html(data);
	});
}
