
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 class="modal-title">Detalle del la revista</h3>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-12 span-underlined">
					<span class="text-label">Nombre</span>
					<?php echo $nombre ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 span-underlined">
					<span class="text-label">Descripcion</span>
					<?php echo $descripcion ?>
				</div>
				<div class="col-sm-6 span-underlined">
					<span class="text-label">Fecha Publicacion</span>
					<?php echo $fecha_publicacion ?>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		</div>
	</div>
</div>