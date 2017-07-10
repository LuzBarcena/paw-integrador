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
    if ( ($_POST["nombre"] != '') && ($_POST["tamanio"] != '') && ($_POST["raza"] != '')) {
        $tiposValidos = array('jpg', 'jpeg', 'png');
    	//valido las entradas
    	$nombre = Validador::limpiarCampo($_POST["nombre"]);
    	$edad = Validador::limpiarCampo($_POST["edad"]);
        $sexo = Validador::limpiarCampo($_POST["sexo"]);
        $particularidad = Validador::limpiarCampo($_POST["particularidad"]);
        $tamanio = Validador::limpiarCampo($_POST["tamanio"]);
        $raza = Validador::limpiarCampo($_POST["raza"]);
        $peso = Validador::limpiarCampo($_POST["peso"]);

        $todoOk = true;

        $todoOk = Validador::validarLongitud($nombre, 50);
        $todoOk = Validador::validarLongitud($particularidad, 100);
        
        $todoOk = Validador::letrasNumeros($nombre, "letrasynumeros");
        $todoOk = Validador::letrasNumeros($particularidad, "letrasynumeros");

        if ($todoOk) {
            //le saco el encabezado que le agrega JS
            $imagen = explode(',', $_POST['foto']);
            $tipo = explode('/', $imagen[0]);
            $tipoImagen = explode(';', $tipo[1]);
            $dataImagen = base64_decode($imagen[1]);
            
            if ( !(in_array($tipoImagen[0], $tiposValidos) )) {

                echo '{"status": "error", "descripcion":' .'"Formato de imagen no válido. Los formatos válidos son JPG, JPEG, PNG"'. ', "data":"' . $tipoImagen[0] .'"}';

            } else {
                
                //mando los datos obligatorios para el constructor, y nos no obligatorios para el set
                $valor = PerrosControlador::setPerro($dataImagen, $nombre, $edad, $sexo, $particularidad, $tamanio, $peso, $_POST["referencias"], $raza, $tipoImagen[0]);

                if ($valor == 1) {
                    echo '{"status": "ok", "descripcion": "Se agregó el perro correctamente.", "data":"' . $_POST["nombre"].'"}';
                } else {
                    echo '{"status": "error", "descripcion":' .'"'. $valor .'"'. ', "data":"' . $_POST["nombre"].'"}';
                }
            }
    	} else {
            //error en alguna validacion
            echo '{"status": "error", "descripcion": "Error en una validacion", "data":"' . $_POST["nombre"].'"}';
        }
    } else {
        $respuesta = array("status" => "ok", "descripcion"=> "error");
        echo json_encode($respuesta);
    };
}
