<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/PerdidoControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';
include_once '../controlador/SesionControlador.php';
/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//me fijo que no esten vacios
    if (isset($_POST["titulo"]) && isset($_POST["descripcion"])) {
*/
if ($_POST["do"] == "enviar") {
    if ( ($_POST["titulo"] != '') && ($_POST["descripcion"] != '') && ($_POST["latitud"] != '') && ($_POST["longitud"] != '') && ($_POST["tel"] != '')) {
    	//valido las entradas
    	$titulo = Validador::limpiarCampo($_POST["titulo"]);
    	$descripcion = Validador::limpiarCampo($_POST["descripcion"]);
        $sexo = Validador::limpiarCampo($_POST["sexo"]);
        $nombre = Validador::limpiarCampo($_POST["nombre"]);
        $fechaDesaparicion = $_POST["fechaDesaparicion"];
		$tel = Validador::limpiarCampo($_POST["tel"]);
        
        $todoOk = true;

        $todoOk = Validador::validarLongitud($titulo, 50);
        $todoOk = Validador::validarLongitud($descripcion, 250);
        $todoOk = Validador::validarLongitud($nombre, 250);
		$todoOk = Validador::validarLongitud($tel, 50);
        
        $todoOk = Validador::letrasNumeros($titulo, "letrasynumeros");
        $todoOk = Validador::letrasNumeros($descripcion, "letrasynumeros");
        

        if ($todoOk) {
            if ($_POST["tipoFoto"] == 'foto') {
                //le saco el encabezado que le agrega JS
                $imagen = explode(',', $_POST['foto']);
                $dataImagen = base64_decode($imagen[1]);
            } else {
                if ($_POST["tipoFoto"] == 'silueta') {
                    $dataImagen = $_POST["foto"];
                }
            }
            
            
            $fechaAlta = date("Y-m-d");

            //mando los datos obligatorios para el constructor, y nos no obligatorios para el set
            $valor = PerdidoControlador::setPerdido(SesionControlador::getId(), $_POST["titulo"], $_POST["descripcion"], $dataImagen, $_POST["latitud"], $_POST["longitud"], $fechaAlta, $fechaDesaparicion, $sexo, $nombre, $_POST["tipoFoto"], $_POST["tel"]);

            if ($valor) {
                echo '{"status": "ok", "descripcion": "Se agregó el perdido correctamente. Redirigiendo a perdidos...", "data":"' . $_POST["latitud"].'"}';
            }else {
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
