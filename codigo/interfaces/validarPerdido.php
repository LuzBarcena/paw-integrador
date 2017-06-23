<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/PerdidoControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//me fijo que no esten vacios
    if (isset($_POST["titulo"]) && isset($_POST["descripcion"])) {
*/
if ($_POST["do"] == "enviar") {
    if ( ($_POST["titulo"] != '') && ($_POST["descripcion"] != '') && ($_POST["latitud"] != '') && ($_POST["longitud"] != '') ) {
    	//valido las entradas
    	$titulo = Validador::limpiarCampo($_POST["titulo"]);
    	$descripcion = Validador::limpiarCampo($_POST["descripcion"]);

        $todoOk = true;

        $todoOk = Validador::validarLongitud($titulo, 30);
        $todoOk = Validador::validarLongitud($descripcion, 140);

        $todoOk = Validador::letrasNumeros($titulo, "letrasynumeros");
        $todoOk = Validador::letrasNumeros($descripcion, "letrasynumeros");

        if ($todoOk) {
            //SI VALIDO BIEN EL USUARIO CREO LA SESION
            //$valor = PerdidoControlador::setFotoServidor($_FILE['foto']);
            $valor = 1;
            if ($valor == 1) {
                echo '{"status": "ok", "descripcion": "Se agregó el perdido correctamente. Redirigiendo a perdidos...", "data":"' . $_POST["latitud"].'"}';
            } else {
                echo '{"status": "error", "descripcion":' .'"'. $valor .'"'. ', "data":"' . $_POST["latitud"].'"}';
            }
    	} else {
            //error en alguna validacion
            echo '{"status": "error", "descripcion": "Error en una validacion", "data":"' . $_POST["titulo"].'"}';
        }
    } else {
        $respuesta = array("status" => "ok", "descripcion"=> "error");
        echo json_encode($respuesta);
    };
}
