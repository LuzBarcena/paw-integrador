<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/PerrosControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';
include_once '../controlador/SesionControlador.php';
include_once '../vista/resultadoBuscador.php';

if ($_POST["do"] == "enviar") {   
    
	if(empty($_POST['tamanio'])){
		$tamanio = array();
	}else{
		$tamanio = $_POST['tamanio'];
	}
	if(empty($_POST['sexo'])){
		$sexo = array();
	}else{
		$sexo = $_POST['sexo'];
	}
	if(empty($_POST['edad'])){
		$edad = array();
	}else{
		$edad = $_POST['edad'];
	}

	$raza = $_POST['raza'];
  
    $valor = PerrosControlador::enviarFiltros($tamanio, $sexo, $edad, $raza, $_POST['contador']);

    mostrarResultado($valor);

} else {
    $datos = array("status" => "error", "descripcion"=> "ocurrio un error");
    echo json_encode($respuesta);
};