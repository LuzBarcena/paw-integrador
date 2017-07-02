<?php 
include_once('../controlador/SesionControlador.php');
include_once('../controlador/UsuarioControlador.php');
include_once('../extras/Config.php');
require_once('TemplateManager.php');

Config::autoload();

$tpl = new TemplateManager();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);

if ($haySesion) {
	$usuario = SesionControlador::getSesion();
	$id_usuario = SesionControlador::getId();
	$tpl->assign('usuario', $usuario);

	$resultado = UsuarioControlador::getUsuario($id_usuario);

	if($resultado != false){
		$tpl->assign("resultado", $resultado);
	}
}

$tpl->assign('pageTitle', 'Mi perfil');
$tpl->display("miPerfil.tpl");