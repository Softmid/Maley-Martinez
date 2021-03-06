<?php if (!empty($msg_success)): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<?php echo $msg_success; ?>
	</div>
<?php endif ?>
<h2 class="col-12">Categorías</h2>
<div class="row" style="margin-top:30px;">
	<div class="col-lg-4 col-md-offset-1">
		<div class="panel panel-success">
			<div class="panel-heading">Categoría</div>
			<div class="panel-body clear">
				<form role="form" action="categorias/insert_categoria" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-group">
						<label for="categoria">Categoría</label>
						<input type="text" name="datos[nombre]" class="form-control" id="categoria" placeholder="Introduce la categoría">
					</div>
					<div class="form-group">
						<label for="archivo" class=" control-label">Imagen Categoría</label>
						<input type="file" name="archivo" id="archivo"> 
					</div>
					<button type="submit" class="btn btn-success">Guardar</button>
				</form>
			</div>
		</div>
<?php /*
		<div class="panel panel-success">
			<div class="panel-heading">Sub-Categoría</div>
			<div class="panel-body">
				<form role="form" action="categorias/insert_subcategoria" method="post" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="form-group">
						<label for="categoria">Categoría</label>
						<select name="datos[idCategoria]" id="categoria" class="form-control">
							<option value="">seleccione una opción</option>
							<?php foreach ($categoria->result() as $row): ?>
								<option value="<?php echo $row->id;?>"><?php echo $row->nombre;?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="subcategoria">Sub-Categoría</label>
						<input type="text" name="datos[nombre]" class="form-control" id="subcategoria" placeholder="Introduce la Sub-Categoría">
					</div>
					<button type="submit" class="btn btn-success">Guardar</button>
				</form>
			</div>
		</div>
	
*/ ?>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-success">
			<div class="panel-heading">Lista de Categorías</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="subcategoria">Categoría</label>
					<ul class="list-group">
						<?php foreach ($categoria->result() as $row): ?>
							<li class="list-group-item">
								<div class="checkbox">
									<label>
										<input type="checkbox"> 
										<?php if(!empty($row->foto)){ echo '<img src="/assets/img/'.$class.'/'.$row->foto.'" width="40" class="img-responsive img-rounded img-categoria" alt="Responsive image">';} else{ echo '<img src="/assets/img/sin-foto.jpg" width="40" class="img-responsive img-rounded img-categoria" alt="Responsive image">';} ?>
										<?php echo $row->nombre;?>
										<a href="/categorias/editar_categoria/<?php echo $row->id; ?>" class="btn btn-info list-editar" title="Editar" data-toggle="modal" data-target="#editar-<?php echo $row->id; ?>"><i class="fa fa-cog"></i></a>
										<a href="/categorias/eliminar/<?php echo $row->id; ?>" class="btn btn-danger list-eliminar"><i class="fa fa-times"></i></a>
									</label>
								</div>
							</li>
							<div id="editar-<?php echo $row->id; ?>" class="modal fade">
							    
							</div>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
<?php /*
		<div class="panel panel-success">
			<div class="panel-heading">Lista de Sub-Categorías</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="categoria">Categoría</label>
					<select name="datos[idCategoria]" id="categoria" class="form-control categoria-ajax">
						<option value="">seleccione una opción</option>
						<?php foreach ($categoria->result() as $row): ?>
							<option value="<?php echo $row->id;?>"><?php echo $row->nombre;?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label for="subcategoria">Sub-Categoría</label>
					<div class="col-sm-12 recarga-sub-categoria">
				      <p class="form-control-static">Seleccione una categoría</p>
				    </div>
				</div>
			</div>
		</div>
*/ ?>
	</div>
</div>