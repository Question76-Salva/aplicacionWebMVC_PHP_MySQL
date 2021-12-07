<?php

    class ControladorPaginas {

        // =======================================================================
        // === acciones a requerir del controlador de paginas | inicio y error ===
        // =======================================================================

        public function inicio() {

            // === acceder a la vista de inicio | inicio.php | vistas/paginas/inicio.php ===

            // cargar la vista | para que pueda ser mostrada
            include_once 'vistas/paginas/inicio.php';
        }

        public function error() {

            // === acceder a la vista error.php | vistas/paginas/error.php ===
            
            // cargar la vista | para que pueda ser mostrada
            include_once 'vistas/paginas/error.php';
        }

        public function nosotros() {

            // === acceder a la vista error.php | vistas/paginas/nosotros.php ===
            
            // cargar la vista | para que pueda ser mostrada
            include_once 'vistas/paginas/nosotros.php';
        }
    }

?>