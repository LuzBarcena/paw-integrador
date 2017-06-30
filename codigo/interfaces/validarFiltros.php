<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/PerrosControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';
include_once '../controlador/SesionControlador.php';
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//me fijo que no esten vacios
    if (isset($_POST["titulo"]) && isset($_POST["descripcion"])) {
*/

if ($_POST["do"] == "enviar") {    
    $tamanio = json_decode($_POST['tamanio']);
    $sexo = json_decode($_POST['sexo']);
    $edad = json_decode($_POST['edad']);
  
        $valor = PerrosControlador::enviarFiltros($tamanio, $sexo, $edad);

        if ($valor != false) {
            header('Content-Type: application/json');
            $datos = array(
                "status" =>"ok",
                "registros" =>$valor
            );
            echo json_encode($datos);
        }else {
            header('Content-Type: application/json');
            $datos = array(
                'status' => 'noResultado',
                'descripcion' => 'no hay resultados'
            );
            echo json_encode($datos);
        }
} else {
    $datos = array("status" => "error", "descripcion"=> "ocurrio un error");
    echo json_encode($respuesta);
};
