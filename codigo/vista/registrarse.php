<?php 
include_once('../controlador/SesionControlador.php');
include_once('../extras/Config.php');
require_once('TemplateManager.php');

Config::autoload();
/*
class registrarse {

	private $smarty;
	
	function __construct() {
		$this->smarty = new Smarty();
		$this->smarty->addTemplateDir(Config::getTemplatesDir());
		$this->smarty->setCompileDir(Config::getCompileDir());
		$this->smarty->assign('pageTitle', 'Registrarse');
	}

	function display($templateFile) {
		$this->smarty->display($templateFile);
	}

	function assign($name, $value) {
		$this->smarty->assign($name, $value);
	}
}
*/
$tpl = new TemplateManager();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);
if ($haySesion) {
	$usuario = SesionControlador::getSesion();
	$tpl->assign('usuario', $usuario);
}
$tpl->assign('pageTitle', 'Registrarse');
$tpl->display("registrarse.tpl");