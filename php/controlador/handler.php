<?php
include '../controlador/SesionControlador.php';

//PARA LA SESION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST['iniciarSesion'])){
		 header("location:../vista/login.php");
	}

	if(isset($_POST['cerrarSesion'])){
		//voy al session controlador para destruirla
		if(SesionControlador::destruirSesion()){
			header("location:../vista/index.php");
		}
	}	
}

?>