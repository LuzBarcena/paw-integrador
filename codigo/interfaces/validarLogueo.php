<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/SesionControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';


/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//me fijo que no esten vacios
    if (isset($_POST["nombre_usuario"]) && isset($_POST["contrasenia"])) {
*/
if ($_POST["do"] == "iniciarSesion") {
    if ( ($_POST["nombre_usuario"] != '') && ($_POST["contrasenia"] != '')) {
    	//valido las entradas
    	$usuario = Validador::limpiarCampo($_POST["nombre_usuario"]);
    	$contrasenia = Validador::limpiarCampo($_POST["contrasenia"]);

        $todoOk = true;

        $todoOk = Validador::validarLongitud($usuario, 30);
        $todoOk = Validador::validarLongitud($contrasenia, 30);

        $todoOk = Validador::sinEspacios($usuario);
        $todoOk = Validador::sinEspacios($contrasenia);

        $todoOk = Validador::letrasNumeros($usuario, "letrasynumeros");

        if ($todoOk) {
            //SI VALIDO BIEN EL USUARIO CREO LA SESION
            $valor = UsuarioControlador::login($usuario, $contrasenia);
            if ($valor == 1) {
                //A LA SESION LE PONGO EL NOMBRE DEL USUARIO
                SesionControlador::setSesion($usuario);
                echo '{"status": "ok", "descripcion": "Inicio de sesión exitoso. Redirigiendo al index...", "data":"' . $_POST["nombre_usuario"].'"}';
            } else {
                //error en la bd
                echo '{"status": "error", "descripcion":' .'"'. $valor .'"'. ', "data":"' . $_POST["nombre_usuario"].'"}';
            }
    	} else {
            //error en alguna validacion
            echo '{"status": "error", "descripcion": "Error en una validacion", "data":"' . $_POST["nombre_usuario"].'"}';
        }
    } else {
        $respuesta = array("status" => "ok", "descripcion"=> "error");
        echo json_encode($respuesta);
    };
}
