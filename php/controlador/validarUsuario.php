<?php
include '../controlador/UsuarioControlador.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//VOY A VALIDAR QUE LOS DATOS QUE INGRESO CORRESPONDAN A DATOS EN LA BD
    if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {
    	//DESPUES TENGO Q VALIDAR LAS ENTRADAS
    	$usuario = $_POST["usuario"];
    	$contrasenia = $_POST["contrasenia"];
    	if(UsuarioControlador::login($usuario,$contrasenia)){
            //A LA SESION LE PONGO EL NOMBRE DEL USUARIO
            $_SESSION['login'] = $_POST['usuario'];
            header("location:../vista/index.php");
    	}else{
    		echo "error en los datos";
    	}
    }
 }


?>