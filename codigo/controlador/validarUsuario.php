<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/SesionControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//me fijo que no esten vacios
    if (isset($_POST["nombre_usuario"]) && isset($_POST["contrasenia"])) {
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
    	   if (UsuarioControlador::login($usuario, $contrasenia)) {
                //A LA SESION LE PONGO EL NOMBRE DEL USUARIO
                SesionControlador::setSesion($usuario);
                header("location:../vista/index.php");
    	   } else {
                //error en la bd
                echo "<script language='javascript'>window.location='../vista/login.php'</script>"; 
            }
    	} else {
            //error en alguna validacion
            echo "<script language='javascript'>window.location='../vista/login.php'</script>"; 
        }
    }
 }


?>