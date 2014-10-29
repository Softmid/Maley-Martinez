
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 class="modal-title">Editar Categoría</h3>
		</div>
		<div class="modal-body">
			<form role="form" action="categorias/editar_categoria/<?php echo $id;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<?php $error = form_error('datos[nombre]'); ?>
				<div class="form-group<?php echo ($error != '') ? ' has-error' : ''; ?>">
					<label for="nombre" class="control-label">Nombre de la Noticia</label>
					<input type="text" name="datos[nombre]" id="nombre" class="form-control" value="<?php echo set_value('nombre', $nombre); ?>"> 
					<?php echo $error; ?>
				</div>

				<div class="form-group">
					<label for="archivo" class=" control-label">Imagen Categoría</label>
					<input type="file" name="archivo" id="archivo"> 
				</div>
				<input type="submit" class="btn btn-success" value="Guardar">
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		</div>
	</div>
</div>