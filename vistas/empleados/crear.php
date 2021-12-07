<div class="card mt-5 shadow">
    <div class="card-header">
        Agregar empleado
    </div>
    <div class="card-body">
        
        <form action="" method="post">

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre del empleado" required>              
            </div>

            <div class="mb-3">
              <label for="correo" class="form-label">Correo:</label>
              <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelpId" placeholder="Correo del empleado" required>              
            </div>

            <input name="" id="" class="btn btn-success" type="submit" value="Agregar empleado">

            <!-- botón para regresar a la tabla de empleados -->
            <a href="?controlador=empleados&accion=inicio" class="btn btn-danger">Cancelar</a>

        </form>
    
    </div>
    
</div>