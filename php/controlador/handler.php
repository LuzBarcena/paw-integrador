<?php
include '../controlador/UsuarioControlador.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['iniciarSesion'])){
		 header("location:../vista/login.php");
	}

	if(isset($_POST['cerrarSesion'])){
		session_start();
		session_destroy();
		header("location:../vista/index.php");
	}	
}

?>