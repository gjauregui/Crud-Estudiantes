<?php
   // $estudiantes = new Controllers\estudiantesController();
?>
<div class="box-principal">
	<h3 class="titulo">Listado de Estudiantes
		<hr>
	</h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Estudiantes</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Sección</th>
						<th>Promedio</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($datos as $key => $value) {?>
					<tr>
						<td><img class="imagen-avatar"
								src="<?php echo URL;?>Views/template/imagenes/avatars/<?= $value['imagen']?>">
						</td>
						<td><a href="<?= URL; ?>estudiantes/ver/<?= $value['id'];?>"><?= $value['nombre']?></a>
						</td>
						<td><?= $value['edad'] ?>
						</td>
						<td><?= $value['nombre_seccion'] ?>
						</td>
						<td><?= $value['promedio'] ?>
						</td>
						<td>
							<a class="btn btn-warning"
								href="<?= URL;?>estudiantes/editar/<?= $value['id']; ?>">Editar</a>
							<a class="btn btn-danger"
								href="<?= URL;?>estudiantes/eliminar/<?= $value['id'];?>">Eliminar</a>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>