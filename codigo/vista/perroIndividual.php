<?php 
include_once('../controlador/SesionControlador.php');
include_once('../controlador/PerrosControlador.php');
include_once('../extras/Config.php');
require_once('TemplateManager.php');

Config::autoload();

$tpl = new TemplateManager();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);
if ($haySesion) {
	$usuario = SesionControlador::getSesion();
	$id = SesionControlador::getId();
	$tpl->assign('usuario', $usuario);
	$tpl->assign('id', $id);
}

$referencias = PerrosControlador::getReferencias();
if ($referencias != false) {
	$tpl->assign("referencias", $referencias);
} else {
	$tpl->assign("referencias", false);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$idPerro = $_GET['id'];

	$perro = PerrosControlador::getPerro($idPerro);
	if ($perro != false) {
		$path = concatenarPath($perro['foto'], 'perros');
		$path = $path . ".jpg";
		$tpl->assign('foto', $path);

		$tpl->assign('id_perro', $idPerro);

		$tpl->assign('nombre', $perro['nombre']);
		
		$tpl->assign('tamanio', $perro['tamanio']);
		
		$raza = PerrosControlador::getNombreRaza($perro['id_raza']);
		$tpl->assign('raza', $raza);

		/*estos son no obligatorios*/
		$sexo = $perro['sexo'];
		if ($sexo != "") {
			$tpl->assign('sexo', $sexo);
		} else {
			$sexo = "S/D";
			$tpl->assign('sexo', $sexo);
		}

		$particularidad = $perro['particularidad'];
		if ($particularidad != "") {
			$tpl->assign('particularidad', $particularidad);
		} else {
			$particularidad = "S/D";
			$tpl->assign('particularidad', $particularidad);
		}

		$peso = $perro['peso'];
		if ($peso != "") {
			$tpl->assign('peso', $peso);
		} else {
			$peso = "S/D";
			$tpl->assign('peso', $peso);
		}
		$idsReferencias = PerrosControlador::getReferenciasByIdPerro($idPerro);	
		if ($idsReferencias != false) {
			$imgsReferencias = array();
			foreach ($idsReferencias as $ids) {
				$referencia = PerrosControlador::getReferenciasById($ids['id_referencia']);
				$path = concatenarPath($referencia['imagen'], 'referencias');
				$imgsReferencias[] = $path;
			}
		}
		$tpl->assign('referencias_perro', $imgsReferencias);
	}
}



$tpl->assign('pageTitle', 'Perro');
$tpl->display("perroIndividual.tpl");