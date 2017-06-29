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
	$tpl->assign('usuario', $usuario);
} else {
	header("location:perros.php");
}
$raza = PerrosControlador::getRazas();

$tpl->assign('raza', $raza);
$tpl->assign('haySesion', $haySesion);
$tpl->assign('pageTitle', 'Perros');
$tpl->display("altaPerro.tpl");