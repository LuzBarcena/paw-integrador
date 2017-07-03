<?php
include_once('../controlador/PerdidoControlador.php');

if ($_POST["do"] == "enviar") {
    if ($_POST["id"] != ''){
        $id = (int)$_POST['id'];
        
        $valor = PerdidoControlador::setEncontrado($id);
        if ($valor) {
            echo '{"status": "ok", "descripcion": "El perdido se marco como encontrado correctamente. Redirigiendo a perdido...", "data":"' . $_POST["id"].'"}';
        } else {
            echo '{"status": "error", "descripcion":"Error al marcar como encontrado", "data":"' . $_POST["id"].'"}';
        }
    } else {
        $respuesta = array("status" => "ok", "descripcion"=> "error");
        echo json_encode($respuesta);
    };
}

?>