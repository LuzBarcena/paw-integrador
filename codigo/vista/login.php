<?php 
include_once('../controlador/SesionControlador.php');
include_once('../extras/Config.php');
require_once('TemplateManager.php');

Config::autoload();

$tpl = new TemplateManager();
$haySesion = SesionControlador::haySesion();
if ($haySesion) {
	header("location:index.php");
	$usuario = SesionControlador::getSesion();
	$tpl->assign('usuario', $usuario);
}
$tpl->assign('haySesion', $haySesion);
$tpl->assign('pageTitle', 'Login');
$tpl->display("login.tpl");