<?php

    // ==============
    // === router ===
    // ==============
    // === este archivo me va a ayudar a canalizar ciertos elementos o a entrar directamente al controlador ===

    // este controlador y accion las estamos obteniendo por URL
    // le pido que me muestre el controlador
    // echo $controlador;
    // echo $accion;

    // === carga el controlador | de forma dinámica ===
    include_once "controladores/controlador_" . $controlador . ".php";

    // objeto controlador -> tiene controldor más el nombre del controlador con la primera letra en mayúscula
    // se convierte al nombre de la clase
    $objControlador = "Controlador" . ucfirst($controlador);

    // === crear instancia del controlador | se guarda en varaible $controlador ===
    $controlador = new $objControlador();

    // === accede a lo que se pida en la url es lo que se va a respetar para mostrarse ===
    // el controlador se va a ejecutar cuando se solicite la acción determinada
    $controlador->$accion();

?>