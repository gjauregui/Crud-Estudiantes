<?php

    $secciones = new Controllers\seccionesController();
?>
<div class="box-principal">
    <h3 class="titulo">Listado de Secciones
        <hr>
    </h3>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Listado de Secciones</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($secciones->index() as $key => $value) {?>
                    <tr>
                        <td><?= $value['id']?>
                        </td>
                        <td><?= $value['nombre']?>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="<?= URL?>secciones/editar/<?= $value['id'];?>">Editar</a>
                            <a class="btn btn-danger" href="<?= URL?>secciones/eliminar/<?= $value['id'];?>">Eliminar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>