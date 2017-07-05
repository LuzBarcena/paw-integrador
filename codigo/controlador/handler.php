<?php
include '../controlador/SesionControlador.php';
/*
//PARA LA SESION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['iniciarSesion'])) {
		 header("location:../vista/login.php");
	}
	if(isset($_POST['cerrarSesion'])) {
		//voy al session controlador para destruirla
		if(SesionControlador::destruirSesion()) {
			header("location:../vista/index.php");
		}
	}
	if(isset($_POST['registrarse'])) {
		if(SesionControlador::destruirSesion()) {
			header("location:../vista/registrarse.php");
		}
	}	
	if(isset($_POST['perfil'])) {
		header("location:../vista/miPerfil.php");
	}		
}
*/
//PARA LA SESION
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$opcion = $_GET['value'];
	if (isset($opcion)) {

		switch ($opcion) {

			case 'iniciarSesion':
				header("location:../vista/login.php");
				break;

			case 'cerrarSesion':
				if (SesionControlador::destruirSesion()) {
					header("location:../vista/index.php");
				}
				break;

			case 'registrarse':
				if (SesionControlador::destruirSesion()) {
					header("location:../vista/registrarse.php");
				}
				break;
			
			case 'perfil':
				header("location:../vista/miPerfil.php");
				break;
				
			default:
				header("location:../vista/index.php");
				break;
		}
	}	
}