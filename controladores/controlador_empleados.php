<?php

    // === incluir modelo ===
    include_once 'modelos/empleado.php';

    // === conexión bbdd ===
    include_once 'conexion.php';

    // === crear instancia de la conexón | clase BD | método crearInstancia() ===
    BD::crearInstancia(); 


    class ControladorEmpleados {

        // ========================================================
        // === acciones a requerir del controlador de empleados ===
        // ========================================================
        
        public function inicio() {

            //* === cargar la vista de incio | inicio.php | vistas/empleados/inicio.php ===

            // === llamar a la consulta sql | para mostrar los empleados de la tabla | modelo 'empleado' ===
            // y alamacenar los datos de la consulta sql que nos llegan del modelo 'empleado'
            $empleados = Empleado::consultar();

            // cargar la vista | para que pueda ser mostrada
            include_once 'vistas/empleados/inicio.php';
        }

        // =========================================================================================

        public function crear() {

            //* === cargar la vista de crear | crear.php | vistas/empleados/crear.php ===

            // === recibir los datos | POST ===            
            if($_POST) {

                // comprobar si hay datos en en envio | comprobar si llegan los datos
                print_r($_POST);

                // nombre y correo van a ser enviados por POST
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];

                // crear un empleado | acceder al modelo empleado
                Empleado::crear($nombre, $correo);

                // === redireccionar | a la misma página para ver los resultados al instante ===
                header("Location: ./?controlador=empleados&accion=inicio");
            }

            // cargar la vista | para que pueda ser mostrada
            include_once 'vistas/empleados/crear.php';
        }

        // =========================================================================================

        public function editar() {

            //* === cargar la vista de editar | editar.php | vistas/empleados/editar.php ===
            
            // === identificar que se pulsa botón 'editar' ===
            // === si hay un envio por POST | hacer la actualización ===
            if ($_POST) {

                // === capturar los datos | id, nombre, correo ===
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];

                // comprobar si viaja la info
                //print_r($_POST);

                // === edita el empleado | acceder al modelo empleado ===
                Empleado::editar($id, $nombre, $correo);

                // === redireccionar | a la página de la tabla para ver los resultados al instante ===
                header("Location: ./?controlador=empleados&accion=inicio");
            }

            // === consultar los datos ===
            // === capturar el id | aquí convendría validar | si es entero, dato... ===
            $id = $_GET['id'];

            // === busca el empleado | acceder al modelo empleado ===
            // $empleado -> contiene el valor del objeto que es de tipo Empleado
            $empleado = (Empleado::buscar($id));

            // cargar la vista | para que pueda ser mostrada
            include_once 'vistas/empleados/editar.php';
        }

        // =========================================================================================

        public function borrar() {

            //* === cargar la vista de borrar | borrar.php | vistas/empleados/borrar.php ===

            // comprobar que llegan los datos
            print_r($_GET);

            // === capturar el id | aquí convendría validar | si es entero, dato... ===
            $id = $_GET['id'];

            // eliminar un empleado | acceder al modelo empleado
            Empleado::borrar($id);

            // === redireccionar | a la misma página para ver los resultados al instante ===
            header("Location: ./?controlador=empleados&accion=inicio");
        }

        // =========================================================================================

    }

?>