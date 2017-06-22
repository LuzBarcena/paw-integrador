<?php
include_once '../controlador/UsuarioControlador.php';
include_once '../controlador/PerdidoControlador.php';
include_once '../extras/Validador.php';
include_once '../extras/variedades.php';


/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//me fijo que no esten vacios
    if (isset($_POST["nombre_usuario"]) && isset($_POST["contrasenia"])) {
*/
if ($_POST["do"] == "enviar") {
    if ( ($_POST["titulo"] != '') && ($_POST["descripcion"] != '')) {
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
            $valor = PerdidoControlador::setFotoServidor($_FILE['foto']);
            if ($valor == 1) {
                echo '{"status": "ok", "descripcion": "Se cargo la foto correctamente. Redirigiendo a perdidos...", "data":"' . $_POST["titulo"].'"}';
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
