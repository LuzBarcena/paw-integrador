<?php 
include_once('../controlador/SesionControlador.php');
include_once('../extras/Config.php');
require_once('TemplateManager.php');

Config::autoload();

$tpl = new TemplateManager();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);

if ($haySesion) {
	header("location:index.php");
	$usuario = SesionControlador::getSesion();
	$tpl->assign('usuario', $usuario);
}

$tpl->assign('pageTitle', 'Registrarse');
$tpl->display("registrarse.tpl");