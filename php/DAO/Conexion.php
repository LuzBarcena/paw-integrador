<?php

class Conexion {

    protected static $conexion;
    /**
     * Conexion a la base de datos
     */
    public static function conectar() {
        $host="localhost";
        $port=5432;
        $dbname="integradorpaw";
        $user="paobar";
        $password="jasluz";
        try {
            $conexion = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
            return $conexion;
        } catch (PDOException $ex) {
            echo 'ERROR!';
            print_r($ex);
        }
    }
    
}
