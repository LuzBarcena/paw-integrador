<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../extras/Validador.php';
include_once 'UsuarioControlador.php';
include_once '../modelo/Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//tienen que estar todos seteados
	echo "antes de setear";
    if (isset($_POST["nombre_usuario"]) && isset($_POST["email"]) && isset($_POST["contrasenia"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["fecha_nacimiento"])) {
    	echo "esta todo ok";
    	$nombreUsuario = Validador::validar_campo($_POST["nombre_usuario"]);
    	$email = Validador::validar_campo($_POST["email"]);
    	$contrasenia = Validador::validar_campo($_POST["contrasenia"]);
    	$nombre = Validador::validar_campo($_POST["nombre"]);
    	$apellido = Validador::validar_campo($_POST["apellido"]);
    	$fechaNacimiento = Validador::validar_campo($_POST["fecha_nacimiento"]);

    	if ( UsuarioControlador::registroUsuario($nombreUsuario, $email, $contrasenia, $nombre, $apellido, $fechaNacimiento) ) {
    		echo "listo";
    	} else {
    		echo "error";
    	}
    } 
}