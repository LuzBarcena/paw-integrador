<?php

class Conexion {

    protected static $conexion;

    /**
     * Conexion a la base de datos
     */
    public static function conectar() {
        try {
            $conexion = new PDO("pgsql:dbname=; host=; user=; password=;");
            return $conexion;
        } catch (PDOException $ex) {
            echo 'ERROR!';
            print_r($ex);
        }
    }

}
