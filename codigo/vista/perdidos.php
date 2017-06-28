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

//Para mostrar todos los perdidos que haya
//$resultado = PerdidoControlador::getPerdidos();
if ( isset($_GET["pag"]) ) {
	$pag = $_GET["pag"];
} else {
	$pag = 1;
}
$tpl->assign('pag', $pag);

$elementosPorPagina = 8;

if ($pag == 1) {
	$desde = 0;
} else {
	$desde = (($pag - 1) * $elementosPorPagina);
}

$cantidadPerdidos = PerdidoControlador::getCantidadPerdidos();
$resultado = PerdidoControlador::getPerdidos($desde, $elementosPorPagina);

$cantidad = $cantidadPerdidos/8;

$tpl->assign('cantidad',round($cantidad));
/*$tpl->assign('pagina', 'perdidos.php');
$tpl->assign('var', 'pag');
$tpl->assign('valor', $pag);*/
$tpl->assign("url", 'perdidos.php?'.'pag=');
if ($resultado != false) {
	$tpl->assign("resultado", $resultado);
}else{
	$tpl->assign("resultado", false);
}
$tpl->display("perdidos.tpl");