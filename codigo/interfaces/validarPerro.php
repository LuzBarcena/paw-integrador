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
    if ( ($_POST["nombre"] != '') && ($_POST["edad"] != '') && ($_POST["particularidad"] != '') && ($_POST["tamaño"] != '') && ($_POST["peso"] != '') && ($_POST["sexo"] != '') ) {
    	//valido las entradas
    	$nombre = Validador::limpiarCampo($_POST["nombre"]);
    	$edad = Validador::limpiarCampo($_POST["edad"]);
        $sexo = Validador::limpiarCampo($_POST["sexo"]);
        $particularidad = Validador::limpiarCampo($_POST["particularidad"]);
        $tamaño = Validador::limpiarCampo($_POST["tamaño"]);
        
        $todoOk = true;

        $todoOk = Validador::validarLongitud($nombre, 50);
        $todoOk = Validador::validarLongitud($particularidad, 100);
        
        $todoOk = Validador::letrasNumeros($nombre, "letrasynumeros");
        $todoOk = Validador::letrasNumeros($particularidad, "letrasynumeros");


        if ($todoOk) {
            //le saco el encabezado que le agrega JS
            $imagen = explode(',', $_POST['foto']);

            $dataImagen = base64_decode($imagen[1]);
            

            //mando los datos obligatorios para el constructor, y nos no obligatorios para el set
            $valor = PerrosControlador::setPerro($dataImagen, $_POST["nombre"],$_POST["edad"], $_POST["sexo"], $_POST["particularidad"], $_POST["tamaño"], $_POST["peso"]);

            if ($valor) {
                echo '{"status": "ok", "descripcion": "Se agregó el perro correctamente. Redirigiendo a perros...", "data":"' . $_POST["nombre"].'"}';
            }else {
                echo '{"status": "error", "descripcion":' .'"'. $valor .'"'. ', "data":"' . $_POST["nombre"].'"}';
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
