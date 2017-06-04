<?php

class Conexion {

    protected static $conexion;
    /**
     * Conexion a la base de datos
     */
    public static function conectar() {
        try {
            $conexion = new PDO("pgsql:dbname=integradorpaw; host=localhost; user=paobar; password=jasluz;");
            return $conexion;
        } catch (PDOException $ex) {
            echo 'ERROR!';
            print_r($ex);
        }
    }
    
}
