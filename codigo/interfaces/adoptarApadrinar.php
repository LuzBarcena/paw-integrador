<?php
include_once('../controlador/PerrosControlador.php');

if ($_POST["do"] == "adoptar") {
    if (($_POST["usuario"] != '') && ($_POST["perro"] != '')) {
        $usuario = (int)$_POST['usuario'];
        $perro = (int)$_POST['perro'];
        
        $valor = PerrosControlador::setAdopcion($usuario,$perro);
        if ($valor) {
            echo '{"status": "ok", "descripcion": "El perro fue adoptado correctamente. Redirigiendo a perros...", "data":"' . $_POST["perro"].'"}';
        } else {
            echo '{"status": "error", "descripcion":"Error al adoptar", "data":"' . $_POST["perro"].'"}';
        }
    } else {
        $respuesta = array("status" => "ok", "descripcion"=> "error");
        echo json_encode($respuesta);
    };
}

if ($_POST["do"] == "apadrinar") {
    if (($_POST["usuario"] != '') && ($_POST["perro"] != '')) {
        $usuario = (int)$_POST['usuario'];
        $perro = (int)$_POST['perro'];
        
        $valor = PerrosControlador::setApadrinacion($usuario,$perro);
        if ($valor) {
            echo '{"status": "ok", "descripcion": "El perro fue apadrinado correctamente. Redirigiendo a perros...", "data":"' . $_POST["perro"].'"}';
        } else {
            echo '{"status": "error", "descripcion":"No se pudo apadrinar, el perro ya tiene un padrino", "data":"' . $_POST["perro"].'"}';
        }
    } else {
        $respuesta = array("status" => "ok", "descripcion"=> "error");
        echo json_encode($respuesta);
    };
}

?>