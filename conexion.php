<?php

    // =====================
    // === conexión bbdd ===
    // =====================

    class BD {

        // === $instancia -> guarda la conexión para trabajar con ella ===
        private static $instancia = NULL;

        public static function crearInstancia() {
            
            // === crear una instancia a partir de una conexión ===

            // === comprobar conexión ===
            // si no hay ninguna conexión...
            if(!isset(self::$instancia)) {

                // === crear conexión ===
                // para notificar de errores que puedan suceder
                $opcionesPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

                // crear instancia de la conexión
                self::$instancia = new PDO('mysql:host=localhost;dbname=empleados','root','', $opcionesPDO);

                // si nos podemos conectar | comentar | sólo probar la primera vez
                //echo "conexión realizada con éxito";
            }

            return self::$instancia;
        }
    }

?>