<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/PerrosControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';
include_once '../controlador/SesionControlador.php';
include_once '../vista/resultadoBuscador.php';

if ($_POST["do"] == "enviar") {   
    
    $final = json_decode($_POST['final']);
    $raza = $_POST['raza'];
  
    $valor = PerrosControlador::enviarFiltros($final, $raza, $_POST['contador']);

    mostrarResultado($valor);

} else {
    $datos = array("status" => "error", "descripcion"=> "ocurrio un error");
    echo json_encode($respuesta);
};