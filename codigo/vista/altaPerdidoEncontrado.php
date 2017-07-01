<?php 
include_once('../controlador/SesionControlador.php');
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
	header("location:perdidos.php");
}
$tpl->assign('haySesion', $haySesion);
$tpl->assign('pageTitle', 'Perdidos');

$cantidadSiluetas = 26;
$siluetas = array();
for ($i = 1; $i <= 26; $i++) {
	$siluetas[] = array(
		"id" => "silueta".$i,
		"path" => "img_siluetas/silueta".$i.".png"
	);
}
$tpl->assign('siluetas', $siluetas);
$tpl->display("altaPerdidoEncontrado.tpl");