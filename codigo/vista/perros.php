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
}
$tpl->assign('pageTitle', 'Perros');

$tpl->assign('resultado', false);

$tpl->display("perros.tpl");