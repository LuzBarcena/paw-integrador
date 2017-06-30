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
	$perfil = SesionControlador::getPerfil();
	if ($perfil == "admin") {
		$admin = true;
	} else {
		$admin = false;
	}
	$tpl->assign('usuario', $usuario);
	$tpl->assign('admin', $admin);
} else {
	$tpl->assign('admin', false);
}

$tpl->assign('pageTitle', 'Perros');
$raza = PerrosControlador::getRazas();
$tpl->assign('raza', $raza);
$tpl->assign('resultado', false);

//--------------------------FILTROS----------------------------------
$tpl->assign('resultado', false);

if ($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["registros"])) {
	$registros =json_decode ($_GET["registros"]);
	$tpl->assign('resultado', $registros);
}



$tpl->display("perros.tpl");