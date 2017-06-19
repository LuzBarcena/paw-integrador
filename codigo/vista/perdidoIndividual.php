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
}
$tpl->assign('pageTitle', 'Perdidos');

/*echo $_GET['titulo'];
echo $_GET['foto'];
echo $_GET['descripcion'];
echo $_GET['contacto'];
echo $_GET['ultima_direccion'];
*/


$tpl->assign('titulo',$_GET['titulo']);
$tpl->assign('foto',$_GET['foto']);
$tpl->assign('descripcion',$_GET['descripcion']);
$tpl->assign('info_contacto',$_GET['contacto']);
$tpl->assign('ultima_direccion',$_GET['ultima_direccion']);

$tpl->display("perdidosIndividual.tpl");