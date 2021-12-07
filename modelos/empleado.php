<?php

    // =================================================
    // === modelo empleado | interacción con la bbdd ===
    // =================================================

    // el papel o función del modelo es poder interactuar con todos los datos para hacer las 4 operaciones del crud

    class Empleado {

        // === crear valores para recuperar/consultar la info como parte de la clase ===
        // corresponden a las columnas de la tabla 'empleados'
        public $id;
        public $nombre;
        public $correo;

        // =========================================================================================================

        // === constructor ===
        // nos va a ayudar a recibir información | para crear objetos o lista de objetos para poder leer la información
        // las consultas se crearan a partir de objetos del constructor
        public function __construct($id, $nombre, $correo) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->correo = $correo;
        }

        // =========================================================================================================

        public static function consultar() {

            //* === consultar un registro ===

            // === array para guardar todos los empleados que vamos a recuperar de la bbdd ===
            $listaEmpleados = [];

            // === crear instancia de la conexón | clase BD | método crearInstancia() ===
            $conexionBD = BD::crearInstancia(); 

            // === prepara la consulta sql ===
            // selecciona todos los registros (empleados) de la tabla 'empleados'
            $sql = $conexionBD->query("SELECT * FROM empleados");

            // === recuperar los datos que retorna/devuelve la consulta sql ===
            // los iteramos mediante un bucle los datos que retorne la consulta sql | fetchAll -> tiene todos los registros
            // y los guarda en la variable $empleado
            foreach ($sql->fetchAll() as $empleado) {

                // guardar lo que devuelve la consulta en el array $listaEmpleados | creando instancias de cada elemento
                // crear la relación que existe entre los elementos del constructor (id, nombre, correo) y los datos que
                // estan viniendo desde la consulta sql
                $listaEmpleados[] = new Empleado($empleado['id'], $empleado['nombre'], $empleado['correo']); 
            }

            return $listaEmpleados;


        }

        // =========================================================================================================


        public static function crear($nombre, $correo) {

            //* === crear un registro ===
            // $nombre y $correo -> columnas de la tabla 'empleados' de la bbdd 'empleados'

            // === crear instancia de la conexón | clase BD | método crearInstancia() ===
            $conexionBD = BD::crearInstancia(); 

            // === prepara la consulta sql ===
            // (?, ?) -> voy a reemplazar los ? por los nuevos valores que me van a enviar -> $nombre | $correo
            $sql = $conexionBD->prepare("INSERT INTO empleados(nombre, correo) VALUES (?,?)");

            // === ejecuta la consulta sql ===
            $sql->execute(array($nombre, $correo));

        }

        // =========================================================================================================

        public static function borrar($id) {

            //* === borrar un registro ===

            // === crear instancia de la conexón | clase BD | método crearInstancia() ===
            $conexionBD = BD::crearInstancia(); 

            // === prepara la consulta sql ===
            // "?" -> voy a reemplazar el ? por los nuevos valores que me van a enviar -> $id
            $sql = $conexionBD->prepare("DELETE FROM empleados WHERE id = ?");

            // === ejecuta la consulta sql ===
            $sql->execute(array($id));

        }

        // =========================================================================================================

        public static function buscar($id) {

            //* === buscar un registro ===

            // === crear instancia de la conexón | clase BD | método crearInstancia() ===
            $conexionBD = BD::crearInstancia(); 

            // === prepara la consulta sql ===
            // "?" -> voy a reemplazar el ? por los nuevos valores que me van a enviar -> $id
            $sql = $conexionBD->prepare("SELECT * FROM empleados WHERE id = ?");

            // === ejecuta la consulta sql ===
            $sql->execute(array($id));

            // === crear $empleado que va a tener la info del registro buscado ===
            // fetch() -> recuperar el registro que devuelve de la consulta sql
            $empleado = $sql->fetch();

            // === retornar instancia            
            // crear objeto con los datos que devuleve la consulta sql
            return new Empleado($empleado['id'], $empleado['nombre'], $empleado['correo']);

        }

        // =========================================================================================================

        public static function editar($id, $nombre, $correo) {

            //* === editar un registro ===

            // === crear instancia de la conexón | clase BD | método crearInstancia() ===
            $conexionBD = BD::crearInstancia(); 

            // === prepara la consulta sql ===
            // (?, ?) -> voy a reemplazar los ? por los nuevos valores que me van a enviar -> $nombre | $correo
            $sql = $conexionBD->prepare("UPDATE empleados SET nombre = ?, correo = ? WHERE id = ?");

            // === ejecuta la consulta sql ===
            $sql->execute(array($nombre, $correo, $id));
        }

        // =========================================================================================================

    }

?>