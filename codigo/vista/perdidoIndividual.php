<?php 
include_once('../controlador/SesionControlador.php');
include_once('../controlador/PerdidoControlador.php');
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
$tpl->assign('pageTitle', 'Perdidos');

$resultado = PerdidoControlador::getPerdido($_GET['id']);
if ($resultado != false) {
	$tpl->assign("titulo", $resultado['titulo']);
	$tpl->assign('foto',"img_perdidos/" . $resultado['foto'] . ".jpg");
	$tpl->assign('descripcion',$resultado['descripcion']);
	$tpl->assign('latitud',$resultado['lat']);
	$tpl->assign('longitud',$resultado['lng']);
}

$tpl->display("perdidosIndividual.tpl");