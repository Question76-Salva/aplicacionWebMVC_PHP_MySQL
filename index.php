<?php
    // ====================================
    // === plantilla principal del crud ===
    // ====================================
    // el index.php se va a encargar de canalizar todos los datos que le envien

    // === que por defecto entre en 'paginas' | y la acción por defecto entre en 'accion' ===
    $controlador = "paginas";
    $accion = "inicio";


    // === acceder a diferentes vistas de forma dinámica | validar si la información está llegando ===
    // comprobar si me están enviando valores del 'controlador' y de la 'accion'
    // si hay solicitud por método GET del 'controlador' que pide el usuario | y me han enviado por GET la instrucción de 'accion'
    // el objetivo es canalizar/capturar esos dos datos -> 'controlador' y 'accion'   
    if (isset($_GET['controlador']) && isset($_GET['accion'])) {

        // === validar si la información viene vacia | o si tiene algo ===
        if (($_GET['controlador'] != "") && ($_GET['accion'] != "")) {

            // si recibmos los datos los vamos a asignar
            $controlador = $_GET['controlador'];
            $accion = $_GET['accion'];
        }
      
        // comprobar que información está llegando
        //print_r($_GET);
        // print_r($controlador);
        // print_r($accion);     

    }

    // === carga la vista | template ===
    require_once 'vistas/template.php';


?>