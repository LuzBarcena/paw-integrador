<?php 

include_once '../extras/Validador.php';
include_once '../controlador/UsuarioControlador.php';
include_once '../modelo/Usuario.php';
include_once '../extras/variedades.php';
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//tienen que estar todos seteados
    if (isset($_POST["nombre_usuario"]) && isset($_POST["email"]) && isset($_POST["contrasenia"]) && isset($_POST["contrasenia2"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["fecha_nacimiento"])) {
*/
    if ($_POST["do"] == "guardarUsuario") {
//if ( ($_POST["nombre_usuario"] != '') && ($_POST["email" != '') && ($_POST["contrasenia"] != '') && ($_POST["contrasenia2"] != '') && ($_POST["nombre"] != '') && ($_POST["apellido"] != '') && ($_POST["fecha_nacimiento"] != '') ) {
        if ( ($_POST["nombre_usuario"] != '') ) {
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
                $valor = UsuarioControlador::registroUsuario($nombreUsuario, $email, $contrasenaEncriptada, $nombre, $apellido, $fechaNacimiento);
            	if ( $valor == 1 ) {
            		//header("location:../vista/index.php");
                    echo '{"status": "ok", "descripcion": "Usuario Registrado. Redirigiendo al index...", "data":"' . $_POST["nombre_usuario"].'"}';
            	} else {
                    echo '{"status": "error", "descripcion":' .'"'. $valor .'"'. ', "data":"' . $_POST["nombre_usuario"].'"}';
                    //error en la bd
            		//echo "<script language='javascript'>window.location='../vista/registrarse.php'</script>"; 
            	}
            } else {
                //error por validaciones
                echo '{"status": "error", "descripcion": "Error en una validacion", "data":"' . $_POST["nombre_usuario"].'"}';
                //echo "<script language='javascript'>window.location='../vista/registrarse.php'</script>"; 
            }
        } else {
            $respuesta = array("status" => "ok", "descripcion"=> "error");
            echo json_encode($respuesta);
        };
    }

//}