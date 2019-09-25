<div class="box-principal">
<h3 class="titulo">Estudiante <?= $datos->nombre; ?><hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Perfil del estudiante<b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3">
          <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/avatars/<?= $datos->imagen ?>">
        </div>
        <div class="col-md-9">
          <ul class="list-group">
            <li class="list-group-item">
              <b>Nombre: </b> <?= $datos->nombre; ?>
            </li>
            <li class="list-group-item">
              <b>Edad: </b> <?= $datos->edad; ?>
            </li>
            <li class="list-group-item">
              <b>Promedio: </b> <?= $datos->promedio; ?>
            </li>
            <li class="list-group-item">
              <b>Sección: </b> <?= $datos->nombre_seccion; ?>
            </li>
            <li class="list-group-item">
              <b>Fecha de registro: </b> <?= $datos->fecha; ?>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>