<a name="" id="" class="btn btn-success mt-3 shadow" href="?controlador=empleados&accion=crear" role="button">Agregar empleado</a>

<table class="table table-bordered mt-4 shadow">
    
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        <!-- mostrar los datos de la consulta sql | del modelo 'empleado.php' -->
        <?php foreach ($empleados as $empleado) { ?>
        <tr>
            <td><?php echo $empleado->id; ?></td>
            <td><?php echo $empleado->nombre; ?></td>
            <td><?php echo $empleado->correo; ?></td>
            <td>
                <div class="btn-group" role="group" aria-label="">
                    <a href="?controlador=empleados&accion=editar&id=<?php echo $empleado->id; ?>" class="btn btn-warning">Editar</a>
                    <a href="?controlador=empleados&accion=borrar&id=<?php echo $empleado->id; ?>" class="btn btn-danger">Borrar</a>                
                </div>              
            </td>
        </tr>
        <?php } ?>

    </tbody>

</table>
