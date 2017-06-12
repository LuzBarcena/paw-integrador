<?php 
include_once('../controlador/SesionControlador.php');
include_once('Configuracion.php');


Configuracion::getSmarty();


class index {

	private $smarty;
	
	function __construct() {
		$this->smarty = new SmartyBC();
		$this->smarty->addTemplateDir(Configuracion::getTemplatesDir());
		$this->smarty->setCompileDir(Configuracion::getCompileDir());
		$this->smarty->assign('pageTitle', 'Home');
	}

	function display($templateFile) {
		$this->smarty->display($templateFile);
	}

	function assign($name, $value) {
		$this->smarty->assign($name, $value);
	}


}

$tpl = new index();
$haySesion = SesionControlador::haySesion();
$tpl->assign('haySesion', $haySesion);
if ($haySesion) {
	$usuario = SesionControlador::getSesion();
	$tpl->assign('usuario', $usuario);
}
$tpl->display("index.tpl");