<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../extras/Validador.php';
include_once 'UsuarioControlador.php';
include_once '../modelo/Usuario.php';
include_once '../extras/variedades.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//tienen que estar todos seteados
    if (isset($_POST["nombre_usuario"]) && isset($_POST["email"]) && isset($_POST["contrasenia"]) && isset($_POST["contrasenia2"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["fecha_nacimiento"])) {
    	$nombreUsuario = Validador::limpiarCampo($_POST["nombre_usuario"]);
    	$email = Validador::limpiarCampo($_POST["email"]);
    	$contrasenia = Validador::limpiarCampo($_POST["contrasenia"]);
        $contrasenia2 = Validador::limpiarCampo($_POST["contrasenia2"]);
    	$nombre = Validador::limpiarCampo($_POST["nombre"]);
    	$apellido = Validador::limpiarCampo($_POST["apellido"]);
        $fechaNacimiento = $_POST["fecha_nacimiento"];

        $todoOk = true;
        $todoOk = Validador::validarLongitud($nombreUsuario, 30);
        $todoOk = Validador::validarLongitud($contrasenia, 30);
        $todoOk = Validador::validarLongitud($contrasenia, 30);
        $todoOk = Validador::validarLongitud($nombre, 50);
        $todoOk = Validador::validarLongitud($apellido, 50);

        $todoOk = Validador::sinEspacios($nombreUsuario);
        $todoOk = Validador::sinEspacios($email);
        $todoOk = Validador::sinEspacios($contrasenia);
        $todoOk = Validador::sinEspacios($contrasenia2);

        $todoOk = Validador::contraseniasIguales($contrasenia, $contrasenia2);

        $todoOk = Validador::esMail($email);

        $todoOk = Validador::fechaValida($fechaNacimiento);

        $todoOk = Validador::letrasNumeros($nombreUsuario, "letrasynumeros");
        $todoOk = Validador::letrasNumeros($nombre, "letras");
        $todoOk = Validador::letrasNumeros($apellido, "letras");

        if ($todoOk) {
            $contrasenaEncriptada = encriptarContrasena($contrasenia);
        	if ( UsuarioControlador::registroUsuario($nombreUsuario, $email, $contrasenaEncriptada, $nombre, $apellido, $fechaNacimiento) ) {
        		header("location:../vista/index.php");
        	} else {
                //aca deberia mostrar el error de por qué no se pudo registrar
        		header("location:../vista/registrarse.php");
        	}
        } else {
            //aca deberia mostrar el error de por qué no se pudo registrar
            header("location:../vista/registrarse.php");
        }
    } 
}